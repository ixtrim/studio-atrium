<section id="dane-techniczne" class="bg-white pt-16 pb-4 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<div class="mb-10">
			<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Specyfikacja</span>
			<h2 class="mt-3 text-[34px] md:text-[42px] leading-tight text-[#1b2025] font-bold tracking-tight">Dane techniczne</h2>
			<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
		</div>
		<div class="grid lg:grid-cols-2 gap-6">
			<div class="bg-white border border-[#e6e8eb]">
				{foreach $detailTechLeft as $row}
				<div class="group flex items-baseline gap-2 px-4 py-2.5 border-b border-[#eee] last:border-b-0 hover:bg-[#fafbfc] transition-colors">
					<span class="text-[14px] text-[#333] shrink-0">{$row.k|escape}</span>
					<span class="flex-1 border-b border-dotted border-[#ccc] relative -top-[3px] min-w-[24px]"></span>
					<span class="text-[14px] font-semibold text-[#222] tabular-nums whitespace-nowrap">{$row.v|escape}</span>
					{if $row.info}<span class="param-info flex h-4 w-4 items-center justify-center bg-[#cfd3d8] text-white text-[10px] font-semibold group-hover:bg-[var(--brand-blue)] transition-colors cursor-help" data-id="{$row.id}"></span>{/if}
				</div>
				{/foreach}
			</div>
			<div class="bg-white border border-[#e6e8eb]">
				{foreach $detailTechRight as $row}
				<div class="group flex items-baseline gap-2 px-4 py-2.5 border-b border-[#eee] last:border-b-0 hover:bg-[#fafbfc] transition-colors">
					<span class="text-[14px] text-[#333] shrink-0">{$row.k|escape}</span>
					<span class="flex-1 border-b border-dotted border-[#ccc] relative -top-[3px] min-w-[24px]"></span>
					<span class="text-[14px] font-semibold text-[#222] tabular-nums whitespace-nowrap">{$row.v|escape}</span>
					{if $row.info}<span class="param-info flex h-4 w-4 items-center justify-center bg-[#cfd3d8] text-white text-[10px] font-semibold group-hover:bg-[var(--brand-blue)] transition-colors cursor-help" data-id="{$row.id}"></span>{/if}
				</div>
				{/foreach}
			</div>
		</div>
	</div>
</section>
