
document.addEventListener("DOMContentLoaded", () => {
	const labels = document.querySelectorAll('#filter-labels .filter-tab-label');
	const tabs   = document.querySelectorAll('#filter-options .filter-tab');

	function activate(targetSel){
		// prawa kolumna
		tabs.forEach(tab => tab.classList.toggle('active', '#'+tab.id === targetSel));
		// lewa lista
		labels.forEach(l => l.classList.toggle('is-active', l.dataset.target === targetSel));
	}

	labels.forEach(label => {
		label.addEventListener('click', (e) => {
			e.preventDefault();
			const target = label.dataset.target;
			if (!target) return;
			activate(target);
		});
	});

	// start: jeśli któraś ma .is-active, użyj jej; inaczej pierwsza
	const initiallyActive = Array.from(labels).find(l => l.classList.contains('is-active')) || labels[0];
	if (initiallyActive) activate(initiallyActive.dataset.target);



	// Odklikiwanie inputów typu 'radio'
	const wrap = document.querySelector('.blue-overlay.cs');
	if (!wrap) return;

	let lastChecked = null;

	wrap.addEventListener('click', e => {
		const radio = e.target.closest('input[type="radio"]');
		if (!radio || !wrap.contains(radio)) return;

		if (radio === lastChecked) {
			radio.checked = false;
			radio.dispatchEvent(new Event('change', { bubbles: true }));
			lastChecked = null;
		} else {
			lastChecked = radio;
		}
	});


	
	var form  = document.getElementById('click-search-form');
	var left  = document.getElementById('filter-labels');
	var right = document.getElementById('filter-options');
	if (!form || !left || !right) return;

	function getLeftList(panelId) {
		var sel = '.filter-tab-label[data-target="#' + panelId + '"] .active-filters';
		return left.querySelector(sel);
	}

	function getLabelTextById(id) {
		var lab = form.querySelector('label[for="' + CSS.escape(id) + '"]');
		if (!lab) return '';
		var main = lab.querySelector('span') || lab;
		var clone = main.cloneNode(true);
		var cnt = clone.querySelector('.count'); 
		if (cnt && cnt.parentNode) cnt.parentNode.removeChild(cnt);
		return (clone.textContent || '').trim();
	}

	function isAnyRadio(radio) {
		var text = getLabelTextById(radio.id).toLowerCase();
		var lab  = form.querySelector('label[for="' + CSS.escape(radio.id) + '"]');
		var ghost = lab && lab.classList.contains('chip-ghost');
		return ghost || radio.value === '0' || radio.value === '-1' || /dowoln/.test(text);
	}

	function prettyRoomsLabel(radio){
			if (radio.name === 'iloscpokoinaparterze')       return 'Parter: ' + getLabelTextById(radio.id);
			if (radio.name === 'iloscpokoinaiikondygnacji')  return 'Piętro: ' + getLabelTextById(radio.id);
			return getLabelTextById(radio.id);
		}

		function addChip(list, label, onRemove) {
			var li = document.createElement('li'); li.className = 'af-chip';
			var s  = document.createElement('span'); s.appendChild(document.createTextNode(label));
			var x  = document.createElement('span'); x.className = 'af-x'; x.setAttribute('aria-label','Usuń filtr'); x.textContent = '×';
			x.addEventListener('click', function(e){ e.preventDefault(); e.stopPropagation(); onRemove(); renderActive(); recount(); });
			li.appendChild(s);
			li.insertBefore(x, li.firstChild);
			list.appendChild(li);
		}

		function renderActive() {
			var panels = right.querySelectorAll('.filter-tab');
			for (var i = 0; i < panels.length; i++) {
				var panel = panels[i];
				var list  = getLeftList(panel.id);
				if (!list) continue;

				list.innerHTML = '';

				// checkboxy
				var chks = panel.querySelectorAll('input[type="checkbox"]:checked');
				for (var j = 0; j < chks.length; j++) {
					(function(ch){
						addChip(list, getLabelTextById(ch.id), function(){
							var el = document.getElementById(ch.id);
							if (!el) return;
							el.checked = false;
							el.dispatchEvent(new Event('change', { bubbles: true }));
						});
					})(chks[j]);
				}

				// radia ("Dowolna" nie wyświetlane)
				var radios = panel.querySelectorAll('input[type="radio"]');
				var seen   = {};
				for (var r = 0; r < radios.length; r++) {
				var rd = radios[r];
				if (seen[rd.name]) continue;
				seen[rd.name] = true;
				var sel = panel.querySelector('input[type="radio"][name="'+rd.name+'"]:checked');
				if (sel && !isAnyRadio(sel)) {
					(function(selRadio, groupName, panelRef, listRef){
						addChip(listRef, prettyRoomsLabel(selRadio), function(){
						var any = panelRef.querySelector('input[type="radio"][name="'+groupName+'"]');
						var cands = panelRef.querySelectorAll('input[type="radio"][name="'+groupName+'"]');
						var switched = false;
						for (var k=0;k<cands.length;k++){ if (isAnyRadio(cands[k])) { cands[k].click(); switched = true; break; } }
						if (!switched) { selRadio.checked = false; selRadio.dispatchEvent(new Event('change',{bubbles:true})); }
						});
					})(sel, rd.name, panel, list);
				}
				}

				// pola tekstowe proste (szer./dł. działki, front)
				var simpleFields = [
					['#parcel-width','Szer. działki',' m'],
					['#parcel-height','Dł. działki',' m'],
					['#front-width','Front',' m']
				];

				for (var s = 0; s < simpleFields.length; s++) {
					var sel   = simpleFields[s][0];
					var head  = simpleFields[s][1];
					var unit  = simpleFields[s][2];
					var inputRef = panel.querySelector(sel);

					if (inputRef && inputRef.value.trim()) {
						(function(inputFrozen, headFrozen, unitFrozen){
							var label = headFrozen + ': ' + inputFrozen.value.trim() + unitFrozen;
							addChip(list, label, function(){
								// czyść DOKŁADNIE ten input
								inputFrozen.value = '';
								inputFrozen.dispatchEvent(new Event('input',  { bubbles:true }));
								inputFrozen.dispatchEvent(new Event('change', { bubbles:true }));
								// przelicz
								if (window.ClickSearch && ClickSearch.getNumbers) {
									requestAnimationFrame(function(){
										requestAnimationFrame(function(){
										ClickSearch.getNumbers();
										});
									});
								}
							});
						})(inputRef, head, unit);
					}
				}

				function recount(){
				if (window.ClickSearch && typeof ClickSearch.getNumbers === 'function') {
					requestAnimationFrame(function(){
						requestAnimationFrame(function(){
						ClickSearch.getNumbers();
						});
					});
				}
				}

				// POW: chip z selecta #pow-range (jeśli wybrany preset)
				var powSel = panel.querySelector('#pow-range');
				var hasPowPreset = false;
				if (powSel && powSel.value) {
				hasPowPreset = true;
				var powText = powSel.options[powSel.selectedIndex].textContent.trim();

				// Zamrażamy referencje, żeby klik w "×" działał we właściwym panelu
				(function(powSelRef, panelRef){
					addChip(list, 'Użytkowa: ' + powText, function(){
						// reset selecta na "Dowolna"
						powSelRef.value = '';
						powSelRef.dispatchEvent(new Event('change', { bubbles: true }));
						// wyczyść min/max użytkowej
						var a = panelRef.querySelector('#pow-min');
						var b = panelRef.querySelector('#pow-max');
						if (a) { a.value=''; a.dispatchEvent(new Event('input',{bubbles:true})); a.dispatchEvent(new Event('change',{bubbles:true})); }
						if (b) { b.value=''; b.dispatchEvent(new Event('input',{bubbles:true})); b.dispatchEvent(new Event('change',{bubbles:true})); }
						// przelicz
						if (window.ClickSearch && ClickSearch.getNumbers) ClickSearch.getNumbers();
						recount();
					});
				})(powSel, panel);
				}

				// zakresy (min/max): użytkowa, zabudowy, całkowita
				var ranges = [
					['#pow-min','#pow-max','Użytkowa',' m²'],
					['#pow-zab-min','#pow-zab-max','Zabudowy',' m²'],
					['#pow-total-min','#pow-total-max','Całkowita',' m²']
				];

				for (var q = 0; q < ranges.length; q++) {
					var aSel  = ranges[q][0],
							bSel  = ranges[q][1],
							head  = ranges[q][2],
							unit  = ranges[q][3];

					var aRef = panel.querySelector(aSel);
					var bRef = panel.querySelector(bSel);
					var av   = aRef && aRef.value ? aRef.value.trim() : '';
					var bv   = bRef && bRef.value ? bRef.value.trim() : '';

					if (head === 'Użytkowa' && hasPowPreset) continue;

					if (av || bv) {
						(function(aRefFrozen, bRefFrozen, headFrozen, unitFrozen, panelRefFrozen){
							var label = headFrozen + ': ' +
							(av ? ('od ' + av + unitFrozen) : '') +
							(av && bv ? ' – ' : '') +
							(bv ? ('do ' + bv + unitFrozen) : '');

							addChip(list, label, function(){
								// wyczyść pola min/max
								if (aRefFrozen) {
									aRefFrozen.value = '';
									aRefFrozen.dispatchEvent(new Event('input',  { bubbles:true }));
									aRefFrozen.dispatchEvent(new Event('change', { bubbles:true }));
								}
								if (bRefFrozen) {
									bRefFrozen.value = '';
									bRefFrozen.dispatchEvent(new Event('input',  { bubbles:true }));
									bRefFrozen.dispatchEvent(new Event('change', { bubbles:true }));
								}

								// jeżeli to "Użytkowa" -> dodatkowo resetuj select na "Dowolna"
								if (headFrozen === 'Użytkowa') {
									var selPow = panelRefFrozen.querySelector('#pow-range');
									if (selPow && selPow.value) {
										selPow.value = '';
										selPow.dispatchEvent(new Event('change', { bubbles:true }));
									}
								}
								recount();
							});
						})(aRef, bRef, head, unit, panel);
					}
				}

				var labelEl = list.closest('.filter-tab-label');
					if (labelEl) {
					labelEl.classList.toggle('has-active', list.children.length > 0);
				}
			}
		}

	form.addEventListener('change', renderActive, true);
	form.addEventListener('input',  renderActive, true);
	renderActive();



	const box  = document.querySelector('.quick-presets');
	if (!form || !box) return;

	const PT_SELECTOR = 'input[name="typ_projektu"]';
	const types   = [...form.querySelectorAll(PT_SELECTOR)];
	const presets = [...box.querySelectorAll('input[type="radio"]')];
	const typesWrap = form.querySelector('#filters-project-type');

	let applying = false;
	let active   = presets.find(r => r.checked) || null;

	const clearPreset = () => { presets.forEach(r => r.checked = false); active = null; };
	const clearTypes  = () => { types.forEach(i => i.checked = false); };

	const selectType = (val) => {
		clearTypes();
		if (!val) return;
		const el = form.querySelector('#typ_projektu-' + val);
		if (el) {
			el.checked = true;
			el.dispatchEvent(new Event('change', { bubbles: true })); // spójne z innymi presetami
		}
	};

		box.addEventListener('click', e => {
			const r = e.target.closest('input[type="radio"]');
			if (!r) return;

			// toggle: klik w aktywny preset -> odznacz
			if (active === r) { clearPreset(); return; }

			applying = true;
			presets.forEach(x => x.checked = (x === r));
			active = r;

			const val = r.dataset.type || null;
			if (val) {
				selectType(val);
			} else {
				// "Wszystkie": wyczyść typy i od razu przelicz
				clearTypes();
				if (window.ClickSearch?.getNumbers) ClickSearch.getNumbers();
			}
			applying = false;
			// odśwież chipsy i .has-active po zmianach presetów
			document.getElementById('click-search-form')
				?.dispatchEvent(new Event('change', { bubbles: true }));
		});

	// Zmiana w "Typ projektu" -> zdejmij preset jeśli stan nie pasuje
	typesWrap?.addEventListener('change', () => {
		if (applying || !active) return;

		const picked = form.querySelectorAll(PT_SELECTOR + ':checked');
		const target = active.dataset.type || null;

		const matches =
			(target === null && picked.length === 0) ||                		// "Wszystkie": nic nie zaznaczone
			(target && picked.length === 1 && picked[0].value === target); // inny preset: dokładnie jeden typ

		if (!matches) clearPreset();
	}, true);

});



/***
 * Predefiniowane min i max dla powierzchni
 */

// Ustaw hiddeny na podstawie wybranego option
function syncInputsFromSelect(selId, minId, maxId) {
	var sel = document.getElementById(selId);
	var min = document.getElementById(minId);
	var max = document.getElementById(maxId);
	if (!sel || !min || !max) return;

	var opt = sel.options[sel.selectedIndex];
	min.value = opt.getAttribute('data-min') || '';
	max.value = opt.getAttribute('data-max') || '';
}

// dopasuj option do aktualnych wartości pól (gdy wracamy z URL)
function selectOptionByInputs(selId, minId, maxId) {
	var sel = document.getElementById(selId);
	var min = document.getElementById(minId);
	var max = document.getElementById(maxId);
	if (!sel || !min || !max) return;

	var curMin = min.value || '';
	var curMax = max.value || '';

	var found = false;
	for (var i = 0; i < sel.options.length; i++) {
		var o = sel.options[i];
		var oMin = o.getAttribute('data-min') || '';
		var oMax = o.getAttribute('data-max') || '';
		if (oMin === curMin && oMax === curMax) {
			sel.value = o.value;
			found = true;
			break;
		}
	}
	if (!found) sel.value = ''; // "Dowolna"
}

// inicjalizacja + zdarzenia
var syncingPow = false;

(function initPowierzchnia() {
	selectOptionByInputs('pow-range', 'pow-min', 'pow-max');

	var powRange = document.getElementById('pow-range');
	if (powRange) {
		powRange.addEventListener('change', function () {
			syncingPow = true;

			// zsynchronizuj pola z option
			syncInputsFromSelect('pow-range', 'pow-min', 'pow-max');

			// powiadom formularz o zmianach pól
			var a = document.getElementById('pow-min');
			var b = document.getElementById('pow-max');
			if (a) a.dispatchEvent(new Event('change', { bubbles: true }));
			if (b) b.dispatchEvent(new Event('change', { bubbles: true }));

			syncingPow = false;

			// odśwież chipy i licznik
			document.getElementById('click-search-form')
			?.dispatchEvent(new Event('change', { bubbles: true }));

			if (window.ClickSearch && ClickSearch.getNumbers) {
			ClickSearch.getNumbers();
			}
		});
	}

	// wpisy ręczne -> zresetuj select TYLKO gdy to nie jest sync z selecta
	['pow-min','pow-max'].forEach(function(id) {
		var el = document.getElementById(id);
		if (!el) return;

		var handler = function () {
			if (syncingPow) return;
			var sel = document.getElementById('pow-range');
			if (sel && sel.value !== '') sel.value = '';  // ręczne wpisy kasują preset
		};

		el.addEventListener('input',  handler);
		el.addEventListener('change', handler);
	});
})();