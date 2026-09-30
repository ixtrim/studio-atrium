/**
 * Studio Atrium — GA4 ecommerce dataLayer helper (additive; does not replace DOM GTM tags).
 */
(function (window) {
	'use strict';

	var dl = function () {
		window.dataLayer = window.dataLayer || [];
		return window.dataLayer;
	};

	function pushEvent(payload) {
		if (!payload || !payload.event) return;
		var layer = dl();
		// Clear previous ecommerce object (GA4 recommended)
		layer.push({ ecommerce: null });
		layer.push(payload);
	}

	function pushQueue(events) {
		if (!events) return;
		if (!Array.isArray(events)) events = [events];
		events.forEach(pushEvent);
	}

	function itemFromAnchor(el) {
		if (!el || !el.getAttribute) return null;
		var id = el.getAttribute('data-sa-item-id');
		if (!id) return null;
		var item = {
			item_id: String(id),
			item_name: el.getAttribute('data-sa-item-name') || '',
			item_brand: 'Studio Atrium',
			price: parseFloat(el.getAttribute('data-sa-item-price') || '0') || 0,
			quantity: 1
		};
		var cat = el.getAttribute('data-sa-item-category');
		if (cat) item.item_category = cat;
		var listId = el.getAttribute('data-sa-item-list-id');
		var listName = el.getAttribute('data-sa-item-list-name');
		if (listId) item.item_list_id = listId;
		if (listName) item.item_list_name = listName;
		var idx = el.getAttribute('data-sa-item-index');
		if (idx) item.index = parseInt(idx, 10) || undefined;
		return item;
	}

	var SAEcommerce = {
		push: pushEvent,
		pushQueue: pushQueue,

		viewItem: function (item) {
			pushEvent({
				event: 'view_item',
				ecommerce: { currency: 'PLN', value: item.price || 0, items: [item] }
			});
		},

		viewItemList: function (items, listId, listName) {
			var list = (items || []).map(function (it, i) {
				var copy = Object.assign({}, it);
				if (listId) copy.item_list_id = listId;
				if (listName) copy.item_list_name = listName;
				if (copy.index == null) copy.index = i + 1;
				return copy;
			});
			pushEvent({
				event: 'view_item_list',
				ecommerce: {
					currency: 'PLN',
					item_list_id: listId || '',
					item_list_name: listName || '',
					items: list
				}
			});
		},

		selectItem: function (item, listId, listName) {
			var copy = Object.assign({}, item);
			if (listId) copy.item_list_id = listId;
			if (listName) copy.item_list_name = listName;
			pushEvent({
				event: 'select_item',
				ecommerce: {
					currency: 'PLN',
					item_list_id: listId || copy.item_list_id || '',
					item_list_name: listName || copy.item_list_name || '',
					items: [copy]
				}
			});
		},

		addToCart: function (item) {
			pushEvent({
				event: 'add_to_cart',
				ecommerce: {
					currency: 'PLN',
					value: (item.price || 0) * (item.quantity || 1),
					items: [item]
				}
			});
		},

		itemFromAnchor: itemFromAnchor,

		bindSelectItem: function (root) {
			var el = typeof root === 'string' ? document.querySelector(root) : root;
			if (!el || el.getAttribute('data-sa-select-bound') === '1') return;
			el.setAttribute('data-sa-select-bound', '1');
			el.addEventListener('click', function (e) {
				var a = e.target && e.target.closest ? e.target.closest('a[data-sa-item-id]') : null;
				if (!a || !el.contains(a)) return;
				var item = itemFromAnchor(a);
				if (!item) return;
				SAEcommerce.selectItem(
					item,
					a.getAttribute('data-sa-item-list-id'),
					a.getAttribute('data-sa-item-list-name')
				);
			}, true);
		}
	};

	window.SAEcommerce = SAEcommerce;

	function boot() {
		if (window.__saEcommerceEvents) {
			pushQueue(window.__saEcommerceEvents);
			window.__saEcommerceEvents = null;
		}
		SAEcommerce.bindSelectItem(document.getElementById('project-list'));
		SAEcommerce.bindSelectItem(document.getElementById('cat-2026'));
		bindAddToCart();
	}

	function bindAddToCart() {
		if (document.documentElement.getAttribute('data-sa-atc-bound') === '1') return;
		document.documentElement.setAttribute('data-sa-atc-bound', '1');
		document.addEventListener('click', function (e) {
			var btn = e.target && e.target.closest ? e.target.closest('#addToBasket') : null;
			if (!btn) return;
			if (btn.classList.contains('disabled')) return;
			var id = btn.getAttribute('data-project');
			if (!id) return;
			SAEcommerce.addToCart({
				item_id: String(id),
				item_name: btn.getAttribute('data-name') || '',
				item_brand: 'Studio Atrium',
				item_category: 'Projekt',
				price: parseFloat(btn.getAttribute('data-price') || '0') || 0,
				quantity: 1
			});
		}, true);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', boot);
	} else {
		boot();
	}
})(window);
