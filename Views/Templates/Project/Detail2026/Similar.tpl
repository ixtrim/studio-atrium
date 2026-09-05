{if $detailSimilar}
<section id="podobne" class="w-full bg-white py-16 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<h2 class="text-[34px] font-bold text-[#222] mb-10 pl-2">Projekty podobne</h2>
		<div class="relative">
			<button type="button" aria-label="Poprzedni" id="proj-sim-prev"
				class="hidden lg:flex absolute -left-10 top-[40%] -translate-y-1/2 z-10 w-8 h-8 items-center justify-center bg-transparent border-0 p-0 text-[#7a7a7a] hover:text-[var(--brand-darker)] cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="width:28px;height:28px" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
			</button>
			<button type="button" aria-label="Następny" id="proj-sim-next"
				class="hidden lg:flex absolute -right-10 top-[40%] -translate-y-1/2 z-10 w-8 h-8 items-center justify-center bg-transparent border-0 p-0 text-[#7a7a7a] hover:text-[var(--brand-darker)] cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="width:28px;height:28px" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
			</button>
			<div class="swiper [&_.swiper-wrapper]:items-stretch" id="proj-sim-swiper">
				<div class="swiper-wrapper">
					{foreach $detailSimilar as $item}
					<div class="swiper-slide !h-auto">
						<a href="{$item.url|escape}" class="bg-white overflow-hidden h-full flex flex-col group border border-[#f5f5f5]">
							<div class="relative overflow-hidden">
								<img src="{$item.image_url|escape}" alt="{$item.name|escape}" class="w-full h-[280px] object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy"
									onerror="this.onerror=null;this.src='https://media.studioatrium.pl/project/{$item.id}/render-box.jpg';">
								{if $item.badge_label}
								<span class="absolute top-3 left-3 text-[11px] font-bold tracking-wider {if $item.badge_variant == 'discount'}bg-[var(--brand-red)] text-white{else}bg-white/90 text-[var(--brand-red)]{/if} px-2.5 py-1">{$item.badge_label|escape}</span>
								{/if}
							</div>
							<div class="px-5 pt-4 pb-5 flex flex-col gap-3 flex-1">
								<h3 class="text-[22px] font-bold text-[#222] leading-tight">{$item.name|escape}</h3>
								<div class="text-[13px] font-bold tracking-wider text-[var(--brand-red)]">{$item.type_label|escape}</div>
								<div class="pt-1 mt-auto">
									{if $item.price_old}<div class="text-[16px] text-[var(--brand-red)] line-through">{number_format($item.price_old, 0, ',', ' ')} PLN</div>{/if}
									<div class="flex items-baseline gap-2">
										<span class="text-[34px] font-['Montserrat',sans-serif] font-semibold text-[var(--brand-blue-strong)] leading-none">{number_format($item.price, 0, ',', ' ')}</span>
										<span class="text-[16px] text-[var(--brand-blue-strong)] font-semibold">PLN</span>
									</div>
								</div>
							</div>
						</a>
					</div>
					{/foreach}
				</div>
			</div>
		</div>
	</div>
</section>
{/if}
