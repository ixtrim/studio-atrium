/**
 * Instant category sidebar filters (#cat-2026).
 * Debounced AJAX + history.pushState; SSR handles cold loads.
 */
(function () {
	'use strict';

	var root = document.getElementById('cat-results');
	var form = document.getElementById('cat-filter-form');
	var sidebar = document.getElementById('cat-filter-sidebar');
	if (!root || !form) return;

	var body = document.getElementById('cat-results-body');
	var totalEl = document.getElementById('cat-total-count');
	var clearBtn = document.getElementById('cat-clear-filters');
	var loader = document.getElementById('cat-results-loader');
	var debounceTimer = null;
	var requestSeq = 0;
	var enterTimer = null;
	var POW_BUCKETS = {
		'0-100': { pow_min: '0', pow_max: '100' },
		'100-150': { pow_min: '100', pow_max: '150' },
		'150-200': { pow_min: '150', pow_max: '200' },
		'200-': { pow_min: '200' }
	};

	function getAjaxUrl() {
		return root.getAttribute('data-ajax-url') || '/index.php?module=project&action=filter_list';
	}

	function getListUrl() {
		return root.getAttribute('data-list-url') || window.location.pathname;
	}

	function setFiltering(on) {
		root.classList.toggle('is-filtering', !!on);
		root.setAttribute('aria-busy', on ? 'true' : 'false');
		if (loader) loader.setAttribute('aria-hidden', on ? 'false' : 'true');
	}

	function playEnterAnimation() {
		if (!body) return;
		body.classList.remove('cat-results-enter');
		// Force reflow so the animation can restart
		void body.offsetWidth;
		body.classList.add('cat-results-enter');
		clearTimeout(enterTimer);
		enterTimer = setTimeout(function () {
			body.classList.remove('cat-results-enter');
		}, 700);
	}

	function exclusiveCheck(changed) {
		var group = changed.getAttribute('data-group');
		if (!group || !changed.checked) return;
		form.querySelectorAll('.js-cat-filter[data-group="' + group + '"]').forEach(function (el) {
			if (el !== changed) el.checked = false;
		});
	}

	function collectFilters() {
		var params = new URLSearchParams();
		var seen = {};
		form.querySelectorAll('.js-cat-filter:checked').forEach(function (el) {
			var name = el.getAttribute('name');
			var value = el.value;
			if (!name) return;
			if (name === 'pow_bucket') {
				var bucket = POW_BUCKETS[value];
				if (bucket) {
					if (bucket.pow_min != null) params.set('pow_min', bucket.pow_min);
					if (bucket.pow_max != null) params.set('pow_max', bucket.pow_max);
				}
				return;
			}
			if (seen[name]) return;
			seen[name] = true;
			params.set(name, value);
		});
		return params;
	}

	function syncClearButton(params) {
		if (!clearBtn) return;
		var empty = true;
		params.forEach(function () { empty = false; });
		clearBtn.classList.toggle('hidden', empty);
	}

	function syncCheckboxesFromParams(params) {
		form.querySelectorAll('.js-cat-filter').forEach(function (el) {
			el.checked = false;
		});
		var powMin = params.get('pow_min');
		var powMax = params.get('pow_max') || '';
		Object.keys(POW_BUCKETS).forEach(function (key) {
			var b = POW_BUCKETS[key];
			if (String(b.pow_min) === String(powMin) && String(b.pow_max || '') === String(powMax)) {
				var input = form.querySelector('.js-cat-filter[name="pow_bucket"][value="' + key + '"]');
				if (input) input.checked = true;
			}
		});
		['typ_projektu', 'typdachu', 'dzialka_szer', 'front_szer', 'iloscpokoinaparterze',
			'wysokoscbudynku', 'katnachyleniadachu', 'rodzajstropu', 'spizarnia'].forEach(function (name) {
			var val = params.get(name);
			if (val == null || val === '') return;
			var escaped = (window.CSS && CSS.escape) ? CSS.escape(val) : String(val).replace(/"/g, '\\"');
			var input = form.querySelector('.js-cat-filter[name="' + name + '"][value="' + escaped + '"]');
			if (input) input.checked = true;
		});
		syncClearButton(params);
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
		var path = getListUrl();
		if (page && page > 1) {
			var display = root.getAttribute('data-display-type') || 'box';
			var sortBy = root.getAttribute('data-sort-by') || 'id';
			var sortOrder = root.getAttribute('data-sort-order') || 'ASC';
			var mapDisplay = { box: 'b', list: 'l', detail: 'e' };
			var mapSort = { id: 'i', name: 'n', usable_area: 'u' };
			var mapOrder = { ASC: 'a', DESC: 'd', asc: 'a', desc: 'd' };
			path = path.replace(/\/?$/, '/') +
				(mapDisplay[display] || 'b') + ',' +
				(mapSort[sortBy] || 'i') + ',' +
				(mapOrder[sortOrder] || 'a') + ',' + page;
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
			sortForm.setAttribute('action', getListUrl() + (data.query || ''));
		}
		if (typeof lucide !== 'undefined' && lucide.createIcons) {
			try { lucide.createIcons(); } catch (e) {}
		}
	}

	function fetchResults(filterParams, page, push) {
		var seq = ++requestSeq;
		setFiltering(true);
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

	function scheduleApply(page, push) {
		clearTimeout(debounceTimer);
		// Show loader immediately so the UI feels responsive during debounce
		setFiltering(true);
		debounceTimer = setTimeout(function () {
			var params = collectFilters();
			fetchResults(params, page || 1, push !== false);
		}, 180);
	}

	form.addEventListener('change', function (e) {
		var t = e.target;
		if (!t || !t.classList || !t.classList.contains('js-cat-filter')) return;
		exclusiveCheck(t);
		scheduleApply(1, true);
	});

	if (clearBtn) {
		clearBtn.addEventListener('click', function () {
			form.querySelectorAll('.js-cat-filter').forEach(function (el) { el.checked = false; });
			scheduleApply(1, true);
		});
	}

	if (body) {
		body.addEventListener('click', function (e) {
			var link = e.target.closest && e.target.closest('a.cat-pager-link');
			if (!link) return;
			e.preventDefault();
			var page = parseInt(link.getAttribute('data-page') || '1', 10) || 1;
			scheduleApply(page, true);
		});
	}

	window.addEventListener('popstate', function () {
		var params = new URLSearchParams(window.location.search);
		syncCheckboxesFromParams(params);
		var page = 1;
		var m = window.location.pathname.match(/,([0-9]+)\/?$/);
		if (m) page = parseInt(m[1], 10) || 1;
		fetchResults(params, page, false);
	});

	// Expand open groups that have an active filter
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
