<section id="informacje" class="bg-white py-14 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<div class="mb-8">
			<h2 class="text-[22px] md:text-[26px] font-bold uppercase tracking-wide text-[#222]">Informacje o projekcie {$project.name|escape}</h2>
			<div class="w-12 h-[3px] bg-[var(--brand-red)] mt-2"></div>
		</div>
		<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
			<div class="bg-[#ececec] p-6">
				<h3 class="text-[13px] font-bold uppercase tracking-[0.16em] text-[#222] mb-4">Kategorie</h3>
				<div class="flex flex-wrap gap-2">
					{foreach $detailCategoryChips as $c}
					<a href="{$c.url|escape}" class="text-[13px] px-3 py-1.5 bg-white border border-[#e0e0e0] text-[#333] hover:border-[var(--brand-blue)] hover:text-[var(--brand-blue-strong)] transition-colors">{$c.name|escape}</a>
					{/foreach}
				</div>
			</div>
			<div class="bg-[#ececec] p-6">
				<h3 class="text-[13px] font-bold uppercase tracking-[0.16em] text-[#222] mb-4">Cechy projektu</h3>
				<div class="flex flex-wrap gap-2">
					{foreach $detailFeatureTags as $t}
					<span class="text-[11px] font-bold tracking-wider uppercase px-3 py-1.5 bg-white border border-[#e0e0e0] text-[#222]">{$t|escape}</span>
					{/foreach}
					{if $features}
						{foreach $features as $_item}
						<span class="text-[11px] font-bold tracking-wider uppercase px-3 py-1.5 bg-white border border-[#e0e0e0] text-[#222]">{$_item.description|escape}</span>
						{/foreach}
					{/if}
				</div>
			</div>
			<div class="bg-[#ececec] p-6 flex flex-col">
				<h3 class="text-[13px] font-bold uppercase tracking-[0.16em] text-[#222] mb-4">Dodatki w cenie</h3>
				<ul class="space-y-3 mb-6">
					<li class="flex items-start gap-3 text-[14px] text-[#333]">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[var(--brand-red)] shrink-0 mt-0.5" style="width:20px;height:20px" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
						schemat centralnego odkurzacza
					</li>
					<li class="flex items-start gap-3 text-[14px] text-[#333]">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[var(--brand-red)] shrink-0 mt-0.5" style="width:20px;height:20px" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
						projekt instalacji fotowoltaicznej
					</li>
				</ul>
				<div class="grid grid-cols-2 gap-3 mt-auto">
					<button type="button" class="filesDloadTrigger bg-white border border-[#d9dde0] text-[#222] text-[12px] font-bold uppercase tracking-wider py-3 px-3 hover:bg-[var(--brand-blue)] hover:text-white hover:border-[var(--brand-blue)] transition-colors">Pliki do pobrania</button>
					<a href="/dokumenty/Zmiany-w-projekcie.html" class="bg-white border border-[#d9dde0] text-[#222] text-[12px] font-bold uppercase tracking-wider py-3 px-3 hover:bg-[var(--brand-red)] hover:text-white hover:border-[var(--brand-red)] transition-colors text-center">Zmiany w projekcie</a>
				</div>
			</div>
		</div>
	</div>
</section>
