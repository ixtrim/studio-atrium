<nav id="proj-anchor-bar" class="sticky z-30 bg-white border-b border-[#e5e5e5]" aria-label="Sekcje projektu" style="top:0">
	<div class="max-w-[1480px] mx-auto px-8 h-12 flex items-center gap-6">
		<div class="shrink-0 text-[13px] font-black tracking-wide text-[#222] uppercase truncate max-w-[220px]">{$project.name|escape}</div>
		<div class="flex-1 min-w-0 overflow-x-auto">
			<ul class="flex items-center gap-1" id="proj-anchor-links">
				<li><a href="#wizualizacje" data-section="wizualizacje" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[var(--brand-red)]">Wizualizacje</a></li>
				{if $detailFloors}<li><a href="#rzuty" data-section="rzuty" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[#666] hover:text-[#222]">Rzuty</a></li>{/if}
				<li><a href="#dane-techniczne" data-section="dane-techniczne" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[#666] hover:text-[#222]">Dane tech.</a></li>
				<li><a href="#opis" data-section="opis" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[#666] hover:text-[#222]">Opis</a></li>
				{if $detailSimilar}<li><a href="#podobne" data-section="podobne" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[#666] hover:text-[#222]">Podobne</a></li>{/if}
				{if $detailCostStages}<li><a href="#koszty" data-section="koszty" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[#666] hover:text-[#222]">Koszty</a></li>{/if}
				<li><a href="#informacje" data-section="informacje" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[#666] hover:text-[#222]">Informacje</a></li>
				<li><a href="#realizacje" data-section="realizacje" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[#666] hover:text-[#222]">Realizacje</a></li>
				<li><a href="#faq" data-section="faq" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[#666] hover:text-[#222]">FAQ</a></li>
			</ul>
		</div>
	</div>
</nav>
