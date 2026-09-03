(function () {
	'use strict';

	function qs(sel, root) { return (root || document).querySelector(sel); }
	function qsa(sel, root) { return Array.prototype.slice.call((root || document).querySelectorAll(sel)); }

	function pad2(n) {
		return (n < 10 ? '0' : '') + n;
	}

	function initGallery(root) {
		var slides = qsa('.proj-gallery-slide', root);
		if (!slides.length) return;
		var thumbs = qsa('.proj-thumb', root);
		var counter = qs('#proj-gal-counter', root);
		var track = qs('#proj-thumb-track', root);
		var active = 0;
		var thumbStart = 0;
		var visible = 6;

		function setActive(i) {
			active = (i + slides.length) % slides.length;
			slides.forEach(function (el, idx) {
				el.classList.toggle('opacity-100', idx === active);
				el.classList.toggle('scale-100', idx === active);
				el.classList.toggle('opacity-0', idx !== active);
				el.classList.toggle('scale-105', idx !== active);
			});
			thumbs.forEach(function (el, idx) {
				el.classList.toggle('ring-2', idx === active);
				el.classList.toggle('ring-[var(--brand-red)]', idx === active);
				el.classList.toggle('ring-offset-2', idx === active);
				el.classList.toggle('ring-offset-white', idx === active);
				el.classList.toggle('opacity-70', idx !== active);
			});
			if (counter) {
				counter.textContent = pad2(active + 1) + ' / ' + pad2(slides.length);
			}
			if (active < thumbStart) thumbStart = active;
			else if (active >= thumbStart + visible) thumbStart = active - visible + 1;
			updateThumbs();
		}

		function updateThumbs() {
			if (!track) return;
			var maxStart = Math.max(0, slides.length - visible);
			if (thumbStart > maxStart) thumbStart = maxStart;
			if (thumbStart < 0) thumbStart = 0;
			track.style.transform = 'translateX(-' + (thumbStart * (100 / visible)) + '%)';
			var prev = qs('#proj-thumb-prev', root);
			var next = qs('#proj-thumb-next', root);
			if (prev) prev.disabled = thumbStart === 0;
			if (next) next.disabled = thumbStart >= maxStart;
		}

		var prevBtn = qs('#proj-gal-prev', root);
		var nextBtn = qs('#proj-gal-next', root);
		if (prevBtn) prevBtn.addEventListener('click', function () { setActive(active - 1); });
		if (nextBtn) nextBtn.addEventListener('click', function () { setActive(active + 1); });
		thumbs.forEach(function (el) {
			el.addEventListener('click', function () {
				setActive(parseInt(el.getAttribute('data-index'), 10) || 0);
			});
		});
		var tPrev = qs('#proj-thumb-prev', root);
		var tNext = qs('#proj-thumb-next', root);
		if (tPrev) tPrev.addEventListener('click', function () { thumbStart = Math.max(0, thumbStart - 1); updateThumbs(); });
		if (tNext) tNext.addEventListener('click', function () { thumbStart = Math.min(Math.max(0, slides.length - visible), thumbStart + 1); updateThumbs(); });
		setActive(0);
	}

	function initFloors(root) {
		var tabs = qsa('.proj-floor-tab', root);
		var panels = qsa('.proj-floor-panel', root);
		tabs.forEach(function (tab) {
			tab.addEventListener('click', function () {
				var id = tab.getAttribute('data-floor');
				tabs.forEach(function (t) {
					var on = t === tab;
					t.classList.toggle('bg-[var(--brand-blue)]', on);
					t.classList.toggle('text-white', on);
					t.classList.toggle('text-[#6b7177]', !on);
				});
				panels.forEach(function (p) {
					p.classList.toggle('hidden', p.getAttribute('data-floor') !== id);
				});
			});
		});

		panels.forEach(function (panel) {
			var tooltip = qs('.proj-floor-tooltip', panel);
			var hotspots = qsa('.proj-hotspot', panel);
			var rooms = qsa('.proj-room-row', panel);

			function clearHover() {
				hotspots.forEach(function (h) { h.classList.remove('is-on'); });
				rooms.forEach(function (r) { r.classList.remove('is-on'); });
				if (tooltip) tooltip.classList.add('hidden');
			}

			function setHover(id, name, desc) {
				clearHover();
				hotspots.forEach(function (h) {
					if (h.getAttribute('data-id') === id || h.getAttribute('data-ptspid') === id) {
						h.classList.add('is-on');
					}
				});
				rooms.forEach(function (r) {
					if (r.getAttribute('data-id') === id || r.getAttribute('data-ptspid') === id) {
						r.classList.add('is-on');
					}
				});
				if (tooltip) {
					var n = qs('.tooltip-name', tooltip);
					var d = qs('.tooltip-desc', tooltip);
					if (n) n.textContent = name || '';
					if (d) {
						d.textContent = desc || '';
						d.style.display = desc ? '' : 'none';
					}
					tooltip.classList.remove('hidden');
				}
			}

			hotspots.forEach(function (h) {
				h.addEventListener('pointerenter', function () {
					setHover(h.getAttribute('data-id'), h.getAttribute('data-name'), h.getAttribute('data-desc'));
				});
				h.addEventListener('pointerleave', clearHover);
			});
			rooms.forEach(function (r) {
				r.addEventListener('pointerenter', function () {
					var area = r.getAttribute('data-area');
					setHover(
						r.getAttribute('data-id'),
						r.getAttribute('data-name'),
						area ? (area + ' m²') : ''
					);
				});
				r.addEventListener('pointerleave', clearHover);
			});
		});
	}

	function initAccordion(root, itemSel, toggleSel, openClass) {
		qsa(itemSel, root).forEach(function (item) {
			var btn = qs(toggleSel, item);
			if (!btn) return;
			btn.addEventListener('click', function () {
				var wasOpen = item.classList.contains(openClass) || item.getAttribute('data-open') === '1';
				qsa(itemSel, root).forEach(function (other) {
					other.classList.remove(openClass);
					other.setAttribute('data-open', '0');
					var icon = qs('.proj-faq-icon', other);
					if (icon) icon.textContent = '+';
					var body = qs('.proj-faq-body', other);
					if (body && itemSel.indexOf('faq') !== -1) {
						body.classList.add('max-h-0', 'opacity-0');
						body.classList.remove('max-h-[800px]', 'opacity-100');
					}
				});
				if (!wasOpen) {
					item.classList.add(openClass);
					item.setAttribute('data-open', '1');
					var iconOn = qs('.proj-faq-icon', item);
					if (iconOn) iconOn.textContent = '−';
					var bodyOn = qs('.proj-faq-body', item);
					if (bodyOn && itemSel.indexOf('faq') !== -1) {
						bodyOn.classList.remove('max-h-0', 'opacity-0');
						bodyOn.classList.add('max-h-[800px]', 'opacity-100');
					}
				}
			});
		});
	}

	function initAnchorBar() {
		var bar = qs('#proj-anchor-bar');
		if (!bar) return;
		var header = qs('#site-header');
		function measure() {
			bar.style.top = (header ? header.getBoundingClientRect().height : 0) + 'px';
		}
		measure();
		window.addEventListener('resize', measure);

		var links = qsa('.proj-anchor-link', bar);
		var ids = links.map(function (a) { return a.getAttribute('data-section'); }).filter(Boolean);
		if (!ids.length || !('IntersectionObserver' in window)) return;
		var observer = new IntersectionObserver(function (entries) {
			var visible = entries.filter(function (e) { return e.isIntersecting; })
				.sort(function (a, b) { return b.intersectionRatio - a.intersectionRatio; })[0];
			if (!visible || !visible.target.id) return;
			links.forEach(function (a) {
				var on = a.getAttribute('data-section') === visible.target.id;
				a.classList.toggle('is-active', on);
				a.classList.toggle('text-[var(--brand-red)]', on);
				a.classList.toggle('text-[#666]', !on);
			});
		}, { rootMargin: '-30% 0px -55% 0px', threshold: [0.1, 0.25, 0.5] });
		ids.forEach(function (id) {
			var el = document.getElementById(id);
			if (el) observer.observe(el);
		});
	}

	function initFloatingCart(root) {
		var box = qs('#proj-floating-cart');
		if (!box) return;
		function onScroll() {
			var show = window.scrollY > 520;
			box.classList.toggle('opacity-0', !show);
			box.classList.toggle('pointer-events-none', !show);
			box.setAttribute('aria-hidden', show ? 'false' : 'true');
		}
		window.addEventListener('scroll', onScroll, { passive: true });
		onScroll();
		var btn = qs('#proj-float-cart-btn', box);
		var mainBtn = qs('#addToBasket', root);
		if (btn && mainBtn) {
			btn.addEventListener('click', function () { mainBtn.click(); });
		}
	}

	function initHeatPump(root) {
		var pomp = qs('#pompSel', root);
		var priceEl = qs('#proj-price-display', root);
		var info = qs('#pompInfo', root);
		var cart = qs('#addToBasket', root);
		if (!pomp || !priceEl || !root) return;
		var base = parseInt(root.getAttribute('data-price'), 10) || 0;
		var extra = parseInt(root.getAttribute('data-heat-pump'), 10) || 0;
		function fmt(n) {
			return String(n).replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
		}
		pomp.addEventListener('change', function () {
			var total = base + (pomp.checked ? extra : 0);
			priceEl.textContent = fmt(total);
			if (cart) cart.setAttribute('data-price', String(total));
			if (info) info.style.display = pomp.checked ? '' : 'none';
		});
	}

	function initSimilarSwiper() {
		if (typeof Swiper === 'undefined') {
			setTimeout(initSimilarSwiper, 50);
			return;
		}
		var el = qs('#proj-sim-swiper');
		if (!el || el.swiper) return;
		new Swiper(el, {
			loop: true,
			slidesPerView: 1,
			spaceBetween: 24,
			navigation: { prevEl: '#proj-sim-prev', nextEl: '#proj-sim-next' },
			breakpoints: {
				640: { slidesPerView: 2 },
				1024: { slidesPerView: 3 }
			}
		});
	}

	function boot() {
		var root = qs('#proj-2026');
		if (!root) return;
		initGallery(root);
		initFloors(root);
		initAccordion(root, '.proj-cost-item', '.proj-cost-toggle', 'is-open');
		initAccordion(root, '.proj-faq-item', '.proj-faq-toggle', 'is-open');
		initAnchorBar();
		initFloatingCart(root);
		initHeatPump(root);
		initSimilarSwiper();
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', boot);
	} else {
		boot();
	}
})();
