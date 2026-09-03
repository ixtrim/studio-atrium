<div class="bg-[#ececec] text-[#222] overflow-hidden border border-[#e0e0e0]" id="cat-filter-sidebar">
	<div class="px-4 pt-4 pb-3 border-b border-black/10 bg-white">
		<div class="text-[14px] font-bold mb-2">Znajdź idealny projekt</div>
		<div class="text-[11px] text-[#666] mb-1.5">Wpisz nazwę projektu</div>
		<form method="get" action="{url module='project' action='search'}" class="flex overflow-hidden border border-[#d5d5d5]">
			<input type="text" name="query" placeholder="np. Aurora"
				class="flex-1 px-2.5 py-2 text-[12px] text-[#222] placeholder:text-[#888] bg-white outline-none min-w-0">
			<button type="submit" aria-label="Wyszukaj"
				class="bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] transition-colors text-white w-10 self-stretch grid place-items-center leading-none p-0 border-0">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 block" aria-hidden="true"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
			</button>
		</form>
		<div class="flex flex-wrap gap-1.5 mt-3 text-[11px]">
			<a href="/projekty-domow/"
				class="px-2 py-1 transition-colors{if $category.link == 'projekty-domow' || $category.id == 1} bg-[var(--brand-red)] text-white font-bold{else} border border-[#ccc] text-[#444] hover:border-[#888]{/if}">Wszystkie projekty</a>
			<a href="/projekty-domow/parterowe/"
				class="px-2 py-1 transition-colors{if $category.id == 5} bg-[var(--brand-red)] text-white font-bold{else} border border-[#ccc] text-[#444] hover:border-[#888]{/if}">Parterowe</a>
			<a href="/projekty-domow/z-poddaszem-uzytkowym/"
				class="px-2 py-1 transition-colors{if $category.id == 6} bg-[var(--brand-red)] text-white font-bold{else} border border-[#ccc] text-[#444] hover:border-[#888]{/if}">Z poddaszem</a>
		</div>
	</div>

	<div class="flex items-center justify-between px-4 py-3 border-b border-black/10 bg-[#e4e4e4]">
		<button type="button" id="cat-open-filters" class="flex items-center gap-2 text-[13px] font-bold tracking-wide bg-transparent border-0 p-0 cursor-pointer text-[#222]">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4" aria-hidden="true"><line x1="21" x2="14" y1="4" y2="4"></line><line x1="10" x2="3" y1="4" y2="4"></line><line x1="21" x2="12" y1="12" y2="12"></line><line x1="8" x2="3" y1="12" y2="12"></line><line x1="21" x2="16" y1="20" y2="20"></line><line x1="12" x2="3" y1="20" y2="20"></line><line x1="14" x2="14" y1="2" y2="6"></line><line x1="8" x2="8" y1="10" y2="14"></line><line x1="16" x2="16" y1="18" y2="22"></line></svg>
			FILTRUJ PROJEKTY
		</button>
	</div>

	<div class="cat-filter-groups">
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="1">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Typ projektu</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron rotate-180" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5]">
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">Parterowy</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">Z poddaszem</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">Piętrowy</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">Z garażem</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">Szkieletowy</span></button>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Typ dachu</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">Dwuspadowy</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">Czterospadowy</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">Płaski</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">Kopertowy</span></button>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Powierzchnia</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">do 100 m²</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">100–150 m²</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">150–200 m²</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">powyżej 200 m²</span></button>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Szerokość | długość działki</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">wąska (&lt;18 m)</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">standardowa (18–25 m)</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">szeroka (&gt;25 m)</span></button>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Maks. szerokość elewacji frontowej</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">do 10 m</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">10–14 m</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">powyżej 14 m</span></button>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Pomieszczenia</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">2 sypialnie</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">3 sypialnie</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">4+ sypialnie</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">Gabinet</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">Spiżarnia</span></button>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Wysokość budynku</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">do 7 m</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">7–9 m</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">powyżej 9 m</span></button>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Kąt nachylenia dachu</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">do 25°</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">25–35°</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">35–45°</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">powyżej 45°</span></button>
			</div>
		</div>
		<div class="border-b border-black/10 last:border-b-0 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Rodzaj stropu</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">Drewniany</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">Żelbetowy</span></button>
				<button type="button" class="cat-filter-opt js-open-search w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 bg-transparent border-0 cursor-pointer"><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0"></span><span class="text-[#333]">Teriva</span></button>
			</div>
		</div>
	</div>
</div>
<script>
(function () {
	var root = document.getElementById('cat-filter-sidebar');
	if (!root) return;
	root.querySelectorAll('.cat-filter-toggle').forEach(function (btn) {
		btn.addEventListener('click', function () {
			var group = btn.closest('.cat-filter-group');
			var opts = group.querySelector('.cat-filter-options');
			var chev = group.querySelector('.cat-filter-chevron');
			var open = group.getAttribute('data-open') === '1';
			group.setAttribute('data-open', open ? '0' : '1');
			if (opts) opts.classList.toggle('hidden', open);
			if (chev) chev.classList.toggle('rotate-180', !open);
		});
	});
	var openFilters = document.getElementById('cat-open-filters');
	if (openFilters) {
		openFilters.addEventListener('click', function () {
			var trigger = document.querySelector('.js-open-search');
			if (trigger) trigger.click();
		});
	}
})();
</script>
