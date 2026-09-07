{$af = []}
{if isset($active_filters) && $active_filters}{$af = $active_filters}{/if}
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

	<form id="cat-filter-form" method="get" action="{$url}" class="contents">
	<div class="flex items-center justify-between px-4 py-3 border-b border-black/10 bg-[#e4e4e4]">
		<div class="flex items-center gap-2 text-[13px] font-bold tracking-wide text-[#222]">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4" aria-hidden="true"><line x1="21" x2="14" y1="4" y2="4"></line><line x1="10" x2="3" y1="4" y2="4"></line><line x1="21" x2="12" y1="12" y2="12"></line><line x1="8" x2="3" y1="12" y2="12"></line><line x1="21" x2="16" y1="20" y2="20"></line><line x1="12" x2="3" y1="20" y2="20"></line><line x1="14" x2="14" y1="2" y2="6"></line><line x1="8" x2="8" y1="10" y2="14"></line><line x1="16" x2="16" y1="18" y2="22"></line></svg>
			FILTRUJ PROJEKTY
		</div>
		<button type="button" id="cat-clear-filters" class="text-[11px] text-[#666] hover:text-[var(--brand-red)] bg-transparent border-0 p-0 cursor-pointer{if !$af} hidden{/if}">Wyczyść</button>
	</div>

	<div class="cat-filter-groups">
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="1">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Typ projektu</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron rotate-180" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5]">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="typ_projektu" value="parterowe" data-group="typ_projektu"{if $af.typ_projektu == 'parterowe'} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Parterowy</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="typ_projektu" value="z_poddaszem" data-group="typ_projektu"{if $af.typ_projektu == 'z_poddaszem'} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Z poddaszem</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="typ_projektu" value="pietrowe" data-group="typ_projektu"{if $af.typ_projektu == 'pietrowe'} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Piętrowy</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="typ_projektu" value="z_garazem" data-group="typ_projektu"{if $af.typ_projektu == 'z_garazem'} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Z garażem</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="typ_projektu" value="szkieletowe" data-group="typ_projektu"{if $af.typ_projektu == 'szkieletowe'} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Szkieletowy</span></label>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Typ dachu</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="typdachu" value="dwuspadowy" data-group="typdachu"{if $af.typdachu == 'dwuspadowy'} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Dwuspadowy</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="typdachu" value="wielospadowy" data-group="typdachu"{if $af.typdachu == 'wielospadowy'} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Czterospadowy / wielospadowy</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="typdachu" value="stropodach" data-group="typdachu"{if $af.typdachu == 'stropodach'} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Płaski</span></label>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Powierzchnia</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="pow_bucket" value="0-100" data-group="pow"{if $af.pow_bucket == '0-100'} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">do 100 m²</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="pow_bucket" value="100-150" data-group="pow"{if $af.pow_bucket == '100-150'} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">100–150 m²</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="pow_bucket" value="150-200" data-group="pow"{if $af.pow_bucket == '150-200'} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">150–200 m²</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="pow_bucket" value="200-" data-group="pow"{if $af.pow_bucket == '200-'} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">powyżej 200 m²</span></label>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Szerokość działki (maks.)</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="dzialka_szer" value="18" data-group="dzialka_szer"{if $af.dzialka_szer == '18' || $af.dzialka_szer == 18} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">wąska (do 18 m)</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="dzialka_szer" value="25" data-group="dzialka_szer"{if $af.dzialka_szer == '25' || $af.dzialka_szer == 25} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">standardowa (do 25 m)</span></label>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Maks. szerokość elewacji</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="front_szer" value="10" data-group="front_szer"{if $af.front_szer == '10' || $af.front_szer == 10} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">do 10 m</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="front_szer" value="14" data-group="front_szer"{if $af.front_szer == '14' || $af.front_szer == 14} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">do 14 m</span></label>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Pomieszczenia</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="iloscpokoinaparterze" value="2" data-group="iloscpokoinaparterze"{if $af.iloscpokoinaparterze == '2' || $af.iloscpokoinaparterze == 2} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">2 pokoje na parterze</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="iloscpokoinaparterze" value="3" data-group="iloscpokoinaparterze"{if $af.iloscpokoinaparterze == '3' || $af.iloscpokoinaparterze == 3} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">3 pokoje na parterze</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="iloscpokoinaparterze" value="4" data-group="iloscpokoinaparterze"{if $af.iloscpokoinaparterze == '4' || $af.iloscpokoinaparterze == 4} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">4 pokoje na parterze</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="spizarnia" value="1"{if $af.spizarnia} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Spiżarnia</span></label>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Wysokość budynku</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="wysokoscbudynku" value="2" data-group="wysokoscbudynku"{if $af.wysokoscbudynku == '2' || $af.wysokoscbudynku == 2} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">do 7 m</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="wysokoscbudynku" value="4" data-group="wysokoscbudynku"{if $af.wysokoscbudynku == '4' || $af.wysokoscbudynku == 4} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">7–9 m</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="wysokoscbudynku" value="6" data-group="wysokoscbudynku"{if $af.wysokoscbudynku == '6' || $af.wysokoscbudynku == 6} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">powyżej 9 m</span></label>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Kąt nachylenia dachu</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="katnachyleniadachu" value="1" data-group="katnachyleniadachu"{if $af.katnachyleniadachu == '1' || $af.katnachyleniadachu == 1} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">do 30°</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="katnachyleniadachu" value="2" data-group="katnachyleniadachu"{if $af.katnachyleniadachu == '2' || $af.katnachyleniadachu == 2} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">30–35°</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="katnachyleniadachu" value="3" data-group="katnachyleniadachu"{if $af.katnachyleniadachu == '3' || $af.katnachyleniadachu == 3} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">35–40°</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="katnachyleniadachu" value="5" data-group="katnachyleniadachu"{if $af.katnachyleniadachu == '5' || $af.katnachyleniadachu == 5} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">powyżej 45°</span></label>
			</div>
		</div>
		<div class="border-b border-black/10 last:border-b-0 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Rodzaj stropu</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="rodzajstropu" value="drewniany_belkowy" data-group="rodzajstropu"{if $af.rodzajstropu == 'drewniany_belkowy'} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Drewniany</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="rodzajstropu" value="plyta_zelbetowa" data-group="rodzajstropu"{if $af.rodzajstropu == 'plyta_zelbetowa'} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Żelbetowy</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="rodzajstropu" value="gestozebrowy" data-group="rodzajstropu"{if $af.rodzajstropu == 'gestozebrowy'} checked{/if}><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Gęstożebrowy / Teriva</span></label>
			</div>
		</div>
	</div>
	<noscript>
		<div class="px-4 py-3 bg-white border-t border-black/10">
			<button type="submit" class="w-full bg-[var(--brand-red)] text-white text-[12px] font-bold py-2">Zastosuj filtry</button>
		</div>
	</noscript>
	</form>
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
})();
</script>
