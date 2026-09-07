/**
 * Instant category sidebar filters (#cat-2026).
 * Debounced AJAX + history.pushState; SSR handles cold loads.
 * Multi-select within each facet group (OR); groups combined with AND.
 * Sort icons reuse the same loader / fragment refresh.
 */
(function () {
	'use strict';

	var root = document.getElementById('cat-results');
	var form = document.getElementById('cat-filter-form');
	var sidebar = document.getElementById('cat-filter-sidebar');
	if (!root) return;

	var body = document.getElementById('cat-results-body');
	var totalEl = document.getElementById('cat-total-count');
	var clearBtn = document.getElementById('cat-clear-filters');
	var loader = document.getElementById('cat-results-loader');
	var loaderTitle = loader ? loader.querySelector('.cat-loader-title') : null;
	var debounceTimer = null;
	var requestSeq = 0;
	var enterTimer = null;

	function getAjaxUrl() {
		return root.getAttribute('data-ajax-url') || '/index.php?module=project&action=filter_list';
	}

	function getListUrl() {
		return root.getAttribute('data-list-url') || window.location.pathname;
	}

	function setFiltering(on, mode) {
		root.classList.toggle('is-filtering', !!on);
		root.setAttribute('aria-busy', on ? 'true' : 'false');
		if (loader) loader.setAttribute('aria-hidden', on ? 'false' : 'true');
		if (loaderTitle) {
			loaderTitle.textContent = mode === 'sort' ? 'Sortowanie projektów' : 'Filtrowanie projektów';
		}
	}

	function playEnterAnimation() {
		if (!body) return;
		body.classList.remove('cat-results-enter');
		void body.offsetWidth;
		body.classList.add('cat-results-enter');
		clearTimeout(enterTimer);
		enterTimer = setTimeout(function () {
			body.classList.remove('cat-results-enter');
		}, 700);
	}

	function collectFilters() {
		var params = new URLSearchParams();
		if (!form) return params;
		var multi = {};
		form.querySelectorAll('.js-cat-filter:checked').forEach(function (el) {
			var name = el.getAttribute('name');
			var value = el.value;
			if (!name) return;
			if (!multi[name]) multi[name] = [];
			if (multi[name].indexOf(value) === -1) multi[name].push(value);
		});
		Object.keys(multi).forEach(function (name) {
			params.set(name, multi[name].join(','));
		});
		return params;
	}

	function syncClearButton(params) {
		if (!clearBtn) return;
		var empty = true;
		params.forEach(function () { empty = false; });
		clearBtn.classList.toggle('hidden', empty);
	}

	function checkCsv(name, csv) {
		if (!form || csv == null || csv === '') return;
		String(csv).split(',').forEach(function (val) {
			val = String(val).trim();
			if (!val) return;
			var escaped = (window.CSS && CSS.escape) ? CSS.escape(val) : String(val).replace(/"/g, '\\"');
			var input = form.querySelector('.js-cat-filter[name="' + name + '"][value="' + escaped + '"]');
			if (input) input.checked = true;
		});
	}

	function syncCheckboxesFromParams(params) {
		if (!form) return;
		form.querySelectorAll('.js-cat-filter').forEach(function (el) {
			el.checked = false;
		});

		if (params.get('pow_bucket')) {
			checkCsv('pow_bucket', params.get('pow_bucket'));
		} else {
			var powMin = params.get('pow_min');
			var powMax = params.get('pow_max') || '';
			var POW_BUCKETS = {
				'0-100': { pow_min: '0', pow_max: '100' },
				'100-150': { pow_min: '100', pow_max: '150' },
				'150-200': { pow_min: '150', pow_max: '200' },
				'200-': { pow_min: '200', pow_max: '' }
			};
			Object.keys(POW_BUCKETS).forEach(function (key) {
				var b = POW_BUCKETS[key];
				if (String(b.pow_min) === String(powMin) && String(b.pow_max || '') === String(powMax)) {
					var input = form.querySelector('.js-cat-filter[name="pow_bucket"][value="' + key + '"]');
					if (input) input.checked = true;
				}
			});
		}

		['typ_projektu', 'typdachu', 'dzialka_szer', 'front_szer', 'iloscpokoinaparterze',
			'wysokoscbudynku', 'katnachyleniadachu', 'rodzajstropu', 'spizarnia'].forEach(function (name) {
			checkCsv(name, params.get(name));
		});
		syncClearButton(params);
	}

	function syncSortButtons() {
		var sortBy = (root.getAttribute('data-sort-by') || 'id').toLowerCase();
		var sortOrder = (root.getAttribute('data-sort-order') || 'ASC').toUpperCase();
		document.querySelectorAll('.cat-sort-btn').forEach(function (btn) {
			var btnBy = (btn.getAttribute('data-sort-by') || '').toLowerCase();
			var btnOrder = (btn.getAttribute('data-sort-order') || 'ASC').toUpperCase();
			var active = btnBy === sortBy && btnOrder === sortOrder;
			btn.classList.toggle('is-active', active);
			btn.setAttribute('aria-pressed', active ? 'true' : 'false');
		});
		var sortByInput = document.getElementById('sort-by');
		var sortOrderInput = document.getElementById('sort-order');
		if (sortByInput) sortByInput.value = sortBy === 'usable_area' ? 'usable_area' : sortBy;
		if (sortOrderInput) sortOrderInput.value = sortOrder;
	}

	function setSort(sortBy, sortOrder) {
		root.setAttribute('data-sort-by', sortBy);
		root.setAttribute('data-sort-order', String(sortOrder || 'ASC').toUpperCase());
		syncSortButtons();
		scheduleApply(1, true, 'sort');
	}

	function buildFetchUrl(filterParams, page) {
		var url = new URL(getAjaxUrl(), window.location.origin);
		filterParams.forEach(function (value, key) {
			url.searchParams.set(key, value);
		});
		url.searchParams.set('category', root.getAttribute('data-category') || 'projekty-domow');
		url.searchParams.set('all', root.getAttribute('data-all') || '0');
		url.searchParams.set('display_type', root.getAttribute('data-display-type') || 'box');
		url.searchParams.set('sort_by', root.getAttribute('data-sort-by') || 'id');
		url.searchParams.set('sort_order', root.getAttribute('data-sort-order') || 'ASC');
		url.searchParams.set('page', String(page || 1));
		return url.toString();
	}

	function pushListUrl(filterParams, page) {
		var base = getListUrl().replace(/\/?(?:[ble],[inu],[ad](?:,\d+)?)?\/?$/, '/');
		if (base.slice(-1) !== '/') base += '/';

		var display = root.getAttribute('data-display-type') || 'box';
		var sortBy = root.getAttribute('data-sort-by') || 'id';
		var sortOrder = (root.getAttribute('data-sort-order') || 'ASC').toUpperCase();
		var mapDisplay = { box: 'b', list: 'l', detail: 'e' };
		var mapSort = { id: 'i', name: 'n', usable_area: 'u' };
		var mapOrder = { ASC: 'a', DESC: 'd' };
		var isAll = root.getAttribute('data-all') === '1';
		var defaultOrder = isAll ? 'DESC' : 'ASC';
		var pageNum = page || 1;
		var needsSortPath = pageNum > 1 || sortBy !== 'id' || sortOrder !== defaultOrder;

		var path = base;
		if (needsSortPath) {
			path += (mapDisplay[display] || 'b') + ',' +
				(mapSort[sortBy] || 'i') + ',' +
				(mapOrder[sortOrder] || 'a');
			if (pageNum > 1) path += ',' + pageNum;
		}

		var qs = filterParams.toString();
		var next = path + (qs ? ('?' + qs) : '');
		if (next !== window.location.pathname + window.location.search) {
			history.pushState({ catFilters: true }, '', next);
		}
	}

	function applyResponse(data) {
		if (!data || data.status !== 'ok') return;
		if (body && typeof data.html === 'string') {
			body.innerHTML = data.html;
			playEnterAnimation();
		}
		if (totalEl && data.total != null) {
			totalEl.classList.add('cat-total-pulse');
			totalEl.textContent = String(data.total);
			setTimeout(function () {
				totalEl.classList.remove('cat-total-pulse');
			}, 450);
		}
		var sortForm = document.getElementById('projects-filters-form');
		if (sortForm && typeof data.query === 'string') {
			sortForm.setAttribute('action', getListUrl().replace(/\/?(?:[ble],[inu],[ad](?:,\d+)?)?\/?$/, '/') + (data.query || ''));
		}
		if (typeof lucide !== 'undefined' && lucide.createIcons) {
			try { lucide.createIcons(); } catch (e) {}
		}
	}

	function fetchResults(filterParams, page, push, mode) {
		var seq = ++requestSeq;
		setFiltering(true, mode || 'filter');
		fetch(buildFetchUrl(filterParams, page), {
			credentials: 'same-origin',
			headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
		})
			.then(function (res) { return res.json(); })
			.then(function (json) {
				if (seq !== requestSeq) return;
				var data = json.feedback || json;
				applyResponse(data);
				if (push) pushListUrl(filterParams, page || 1);
				syncClearButton(filterParams);
			})
			.catch(function () {})
			.finally(function () {
				if (seq === requestSeq) setFiltering(false);
			});
	}

	function scheduleApply(page, push, mode) {
		clearTimeout(debounceTimer);
		setFiltering(true, mode || 'filter');
		debounceTimer = setTimeout(function () {
			var params = collectFilters();
			fetchResults(params, page || 1, push !== false, mode || 'filter');
		}, mode === 'sort' ? 60 : 180);
	}

	if (form) {
		form.addEventListener('change', function (e) {
			var t = e.target;
			if (!t || !t.classList || !t.classList.contains('js-cat-filter')) return;
			scheduleApply(1, true, 'filter');
		});
	}

	if (clearBtn) {
		clearBtn.addEventListener('click', function () {
			if (form) {
				form.querySelectorAll('.js-cat-filter').forEach(function (el) { el.checked = false; });
			}
			scheduleApply(1, true, 'filter');
		});
	}

	document.querySelectorAll('.cat-sort-btn').forEach(function (btn) {
		btn.addEventListener('click', function () {
			var sortBy = btn.getAttribute('data-sort-by') || 'id';
			var sortOrder = (btn.getAttribute('data-sort-order') || 'ASC').toUpperCase();
			if (
				(root.getAttribute('data-sort-by') || 'id') === sortBy &&
				(root.getAttribute('data-sort-order') || 'ASC').toUpperCase() === sortOrder
			) {
				return;
			}
			setSort(sortBy, sortOrder);
		});
	});

	if (body) {
		body.addEventListener('click', function (e) {
			var link = e.target.closest && e.target.closest('a.cat-pager-link');
			if (!link) return;
			e.preventDefault();
			var page = parseInt(link.getAttribute('data-page') || '1', 10) || 1;
			scheduleApply(page, true, 'filter');
		});
	}

	window.addEventListener('popstate', function () {
		var params = new URLSearchParams(window.location.search);
		syncCheckboxesFromParams(params);
		var page = 1;
		var m = window.location.pathname.match(/,([0-9]+)\/?$/);
		if (m) page = parseInt(m[1], 10) || 1;
		var sortMatch = window.location.pathname.match(/\/([ble]),([inu]),([ad])(?:,\d+)?\/?$/);
		if (sortMatch) {
			var sortByMap = { i: 'id', n: 'name', u: 'usable_area' };
			var sortOrderMap = { a: 'ASC', d: 'DESC' };
			root.setAttribute('data-sort-by', sortByMap[sortMatch[2]] || 'id');
			root.setAttribute('data-sort-order', sortOrderMap[sortMatch[3]] || 'ASC');
			syncSortButtons();
		}
		fetchResults(params, page, false);
	});

	if (sidebar) {
		sidebar.querySelectorAll('.cat-filter-group').forEach(function (group) {
			if (group.querySelector('.js-cat-filter:checked')) {
				group.setAttribute('data-open', '1');
				var opts = group.querySelector('.cat-filter-options');
				var chev = group.querySelector('.cat-filter-chevron');
				if (opts) opts.classList.remove('hidden');
				if (chev) chev.classList.add('rotate-180');
			}
		});
	}
})();
