<section id="faq" class="bg-[#f5f6f7] py-14 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<div class="text-center mb-10">
			<div class="text-[12px] font-bold uppercase tracking-[0.2em] text-[var(--brand-red)] mb-2">FAQ</div>
			<h2 class="text-[28px] md:text-[34px] font-bold text-[#1b2025]">Najczęściej zadawane pytania</h2>
		</div>
		<div class="space-y-3 max-w-4xl mx-auto" id="proj-faq-accordion">
			{foreach $detailFaq as $item}
			<div class="proj-faq-item bg-white border border-[#e5e5e5] transition-all duration-300{if $item@first} border-[var(--brand-red)] shadow-sm{/if}" data-open="{if $item@first}1{else}0{/if}">
				<button type="button" class="proj-faq-toggle w-full flex items-center gap-4 px-5 py-4 text-left">
					<span class="flex-1 text-[15px] md:text-[16px] font-semibold text-[#1b2025]">{$item.q|escape}</span>
					<span class="proj-faq-icon w-8 h-8 rounded-full border border-[#ddd] flex items-center justify-center text-[#666] shrink-0 text-[18px] font-light leading-none">
						{if $item@first}−{else}+{/if}
					</span>
				</button>
				<div class="proj-faq-body overflow-hidden transition-all duration-400{if !$item@first} max-h-0 opacity-0{else} max-h-[800px] opacity-100{/if}">
					<div class="px-5 pb-5 text-[14px] leading-relaxed text-[#555]">{$item.a|escape|nl2br nofilter}</div>
				</div>
			</div>
			{/foreach}
		</div>
	</div>
</section>
