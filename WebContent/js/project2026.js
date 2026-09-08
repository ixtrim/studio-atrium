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
			var svg = qs('.proj-floor-svg', panel);

			function idsOf(el) {
				var out = [];
				var a = el.getAttribute('data-id');
				var b = el.getAttribute('data-ptspid');
				if (a) out.push(String(a));
				if (b && b !== a) out.push(String(b));
				return out;
			}

			function overlaps(el, keys) {
				var ids = idsOf(el);
				for (var i = 0; i < ids.length; i++) {
					if (keys[ids[i]]) return true;
				}
				return false;
			}

			function paintHotspot(el, on) {
				el.classList.toggle('is-on', on);
				el.setAttribute('fill', on ? 'rgba(27,153,225,0.35)' : 'rgba(27,153,225,0)');
				el.setAttribute('stroke', on ? 'rgba(27,153,225,0.95)' : 'rgba(27,153,225,0)');
			}

			function clearHover() {
				hotspots.forEach(function (h) { paintHotspot(h, false); });
				rooms.forEach(function (r) { r.classList.remove('is-on'); });
				if (tooltip) tooltip.classList.add('hidden');
			}

			function setTooltipHtml(el, value) {
				if (!el) return;
				value = String(value || '');
				if (/<[a-z][\s\S]*>/i.test(value) || value.indexOf('&lt;') !== -1) {
					if (value.indexOf('&lt;') !== -1) {
						var ta = document.createElement('textarea');
						ta.innerHTML = value;
						value = ta.value;
					}
					el.innerHTML = value;
				} else {
					el.textContent = value;
				}
			}

			function showHover(fromEl, name, desc) {
				var keys = {};
				idsOf(fromEl).forEach(function (id) { keys[id] = true; });
				hotspots.forEach(function (h) { paintHotspot(h, overlaps(h, keys)); });
				rooms.forEach(function (r) { r.classList.toggle('is-on', overlaps(r, keys)); });
				if (!tooltip) return;
				setTooltipHtml(qs('.tooltip-name', tooltip), name);
				var descEl = qs('.tooltip-desc', tooltip);
				if (descEl) {
					setTooltipHtml(descEl, desc);
					descEl.style.display = desc ? '' : 'none';
				}
				tooltip.classList.remove('hidden');
			}

			if (svg) {
				svg.style.pointerEvents = 'auto';
				svg.style.touchAction = 'manipulation';
			}

			hotspots.forEach(function (hs) {
				hs.style.pointerEvents = 'all';
				hs.addEventListener('pointerenter', function () {
					showHover(hs, hs.getAttribute('data-name'), hs.getAttribute('data-desc'));
				});
				hs.addEventListener('pointerleave', clearHover);
				hs.addEventListener('click', function (e) {
					e.preventDefault();
					showHover(hs, hs.getAttribute('data-name'), hs.getAttribute('data-desc'));
				});
			});
			rooms.forEach(function (row) {
				row.addEventListener('pointerenter', function () {
					var area = row.getAttribute('data-area');
					showHover(row, row.getAttribute('data-name'), area ? (area + ' m²') : '');
				});
				row.addEventListener('pointerleave', clearHover);
			});
		});

		initFloorLightbox(root);
	}

	function initFloorLightbox(root) {
		var lb = document.getElementById('proj-floor-lightbox');
		if (!lb || lb.dataset.init === '1') return;
		lb.dataset.init = '1';

		var triggers = qsa('.proj-floor-zoom', root);
		if (!triggers.length) return;

		var img = qs('#proj-floor-lb-img', lb);
		var labelEl = qs('#proj-floor-lb-label', lb);
		var captionEl = qs('#proj-floor-lb-caption', lb);
		var counterEl = qs('#proj-floor-lb-counter', lb);
		var media = qs('.proj-floor-lb-media', lb);
		var prevBtn = qs('[data-floor-lb-prev]', lb);
		var nextBtn = qs('[data-floor-lb-next]', lb);
		var CLOSE_MS = 360;
		var slides = triggers.map(function (btn) {
			return {
				src: btn.getAttribute('data-floor-src') || '',
				label: btn.getAttribute('data-floor-label') || '',
				caption: btn.getAttribute('data-floor-caption') || ''
			};
		});
		var index = 0;
		var closing = false;
		var swapping = false;

		function preload(i) {
			var slide = slides[i];
			if (!slide || !slide.src) return;
			var pre = new Image();
			pre.decoding = 'async';
			pre.src = slide.src;
		}

		function applyContent(slide) {
			if (!slide) return;
			img.alt = slide.label || 'Rzut';
			if (labelEl) labelEl.textContent = slide.label || '';
			if (captionEl) captionEl.textContent = slide.caption || '';
			if (counterEl) {
				counterEl.textContent = slides.length > 1 ? (index + 1) + ' / ' + slides.length : '';
				counterEl.style.display = slides.length > 1 ? '' : 'none';
			}
			if (img.src !== slide.src) {
				img.src = slide.src;
			}
			preload((index + 1) % slides.length);
			if (slides.length > 1) preload((index - 1 + slides.length) % slides.length);
		}

		function syncNav() {
			var multi = slides.length > 1;
			if (prevBtn) prevBtn.classList.toggle('is-hidden', !multi);
			if (nextBtn) nextBtn.classList.toggle('is-hidden', !multi);
		}

		function openLb(startIndex) {
			if (!slides.length) return;
			closing = false;
			index = Math.max(0, Math.min(startIndex || 0, slides.length - 1));
			if (media) media.classList.remove('is-swap');
			applyContent(slides[index]);
			syncNav();
			if (lb.parentNode !== document.body) {
				document.body.appendChild(lb);
			}
			lb.classList.remove('hidden');
			lb.setAttribute('aria-hidden', 'false');
			document.documentElement.classList.add('overflow-hidden');
			requestAnimationFrame(function () {
				requestAnimationFrame(function () {
					lb.classList.add('is-open');
				});
			});
		}

		function closeLb() {
			if (closing || !lb.classList.contains('is-open')) return;
			closing = true;
			lb.classList.remove('is-open');
			lb.setAttribute('aria-hidden', 'true');
			document.documentElement.classList.remove('overflow-hidden');
			setTimeout(function () {
				lb.classList.add('hidden');
				closing = false;
			}, CLOSE_MS);
		}

		function go(delta) {
			if (swapping || slides.length < 2) return;
			swapping = true;
			if (media) media.classList.add('is-swap');
			setTimeout(function () {
				index = (index + delta + slides.length) % slides.length;
				applyContent(slides[index]);
				requestAnimationFrame(function () {
					if (media) media.classList.remove('is-swap');
					swapping = false;
				});
			}, 160);
		}

		triggers.forEach(function (btn, i) {
			btn.addEventListener('click', function (e) {
				e.preventDefault();
				openLb(parseInt(btn.getAttribute('data-floor-index'), 10) || i);
			});
		});

		qsa('[data-floor-lb-close]', lb).forEach(function (el) {
			el.addEventListener('click', closeLb);
		});
		if (prevBtn) prevBtn.addEventListener('click', function () { go(-1); });
		if (nextBtn) nextBtn.addEventListener('click', function () { go(1); });

		document.addEventListener('keydown', function (e) {
			if (!lb.classList.contains('is-open')) return;
			if (e.key === 'Escape') closeLb();
			else if (e.key === 'ArrowLeft') go(-1);
			else if (e.key === 'ArrowRight') go(1);
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
		bar.style.top = '0px';

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
		initParamInfo(root);
	}

	function initParamInfo(root) {
		var scope = root || document.getElementById('proj-2026') || document;
		var lb = document.getElementById('param-info-lightbox');
		var overBox = document.getElementById('param-info-over-box');
		if (!lb || !overBox) return;
		if (lb.dataset.init === '1') return;
		lb.dataset.init = '1';

		var locked = false;
		var cache = {};
		var CLOSE_MS = 320;

		function decodeMaybeEntities(html) {
			html = String(html || '');
			if (html.indexOf('&lt;') === -1) {
				return html;
			}
			var ta = document.createElement('textarea');
			ta.innerHTML = html;
			return ta.value;
		}

		function openLb() {
			if (lb.parentNode !== document.body) {
				document.body.appendChild(lb);
			}
			lb.classList.remove('hidden');
			lb.classList.add('flex');
			lb.setAttribute('aria-hidden', 'false');
			document.documentElement.classList.add('overflow-hidden');
			requestAnimationFrame(function () {
				requestAnimationFrame(function () {
					lb.classList.add('is-open');
				});
			});
			if (typeof window.Tawk_API !== 'undefined' && typeof window.Tawk_API.hideWidget === 'function') {
				window.Tawk_API.hideWidget();
			}
		}

		function closeLb() {
			if (!lb.classList.contains('is-open') && lb.classList.contains('hidden')) return;
			lb.classList.remove('is-open');
			lb.setAttribute('aria-hidden', 'true');
			document.documentElement.classList.remove('overflow-hidden');
			setTimeout(function () {
				lb.classList.add('hidden');
				lb.classList.remove('flex');
			}, CLOSE_MS);
			if (typeof window.Tawk_API !== 'undefined' && typeof window.Tawk_API.showWidget === 'function') {
				window.Tawk_API.showWidget();
			}
		}

		function showHtml(html) {
			overBox.innerHTML = decodeMaybeEntities(html) || '<p>Brak opisu dla tego parametru.</p>';
			openLb();
		}

		function loadInfo(id) {
			id = String(id || '');
			if (!id || locked) return;
			if (cache[id]) {
				showHtml(cache[id]);
				return;
			}
			locked = true;
			overBox.innerHTML = '<p style="color:#666">Ładowanie…</p>';
			openLb();
			var body = new URLSearchParams();
			body.set('id', id);
			fetch('/index.php?module=ajax&action=get_param_info', {
				method: 'POST',
				headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
				body: body.toString(),
				credentials: 'same-origin'
			}).then(function (res) {
				if (!res.ok) throw new Error('HTTP ' + res.status);
				return res.text();
			}).then(function (html) {
				cache[id] = html;
				showHtml(html);
			}).catch(function () {
				showHtml('<p>Nie udało się pobrać wyjaśnienia parametru.</p>');
			}).then(function () {
				locked = false;
			});
		}

		// Document capture: works even if a late overlay sits above in bubble phase,
		// and survives tech-data re-renders.
		document.addEventListener('click', function (e) {
			var trigger = e.target && e.target.closest ? e.target.closest('.param-info') : null;
			if (!trigger || !scope.contains(trigger)) return;
			e.preventDefault();
			e.stopPropagation();
			loadInfo(trigger.getAttribute('data-id'));
		}, true);

		qsa('[data-param-lb-close]', lb).forEach(function (el) {
			el.addEventListener('click', function (e) {
				e.preventDefault();
				closeLb();
			});
		});
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' && lb.classList.contains('is-open')) closeLb();
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', boot);
	} else {
		boot();
	}
})();
