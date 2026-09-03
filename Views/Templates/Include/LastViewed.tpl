{if $bestsellers}
<section id="ostatnio" class="w-full bg-white py-16 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<h2 class="text-[34px] font-bold text-[#222] mb-10 pl-2">Ostatnio oglądane</h2>
		<div class="relative">
			<button type="button" aria-label="Poprzedni" id="cat-lv-prev"
				class="hidden lg:flex absolute -left-10 top-[40%] -translate-y-1/2 z-10 w-8 h-8 items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-[#7a7a7a] hover:text-[var(--brand-darker)] cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-7 h-7" aria-hidden="true"><path d="m15 18-6-6 6-6"></path></svg>
			</button>
			<button type="button" aria-label="Następny" id="cat-lv-next"
				class="hidden lg:flex absolute -right-10 top-[40%] -translate-y-1/2 z-10 w-8 h-8 items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-[#7a7a7a] hover:text-[var(--brand-darker)] cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-7 h-7" aria-hidden="true"><path d="m9 18 6-6-6-6"></path></svg>
			</button>
			<div class="swiper [&_.swiper-wrapper]:items-stretch" id="cat-lv-swiper">
				<div class="swiper-wrapper">
					{foreach $bestsellers as $item}
					<div class="swiper-slide !h-auto">
						<a href="{$item.url|escape}" class="bg-white overflow-hidden h-full flex flex-col group border border-[#f5f5f5]">
							<div class="relative overflow-hidden">
								<img src="{$item.image_url|escape}" alt="{$item.name|escape}" class="w-full h-[280px] object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy"
									onerror="this.onerror=null;this.src='https://media.studioatrium.pl/project/{$item.id|escape}/render-box.jpg';">
								{if $item.tag}
								<span class="absolute top-3 left-3 text-[11px] font-bold tracking-wider bg-white/90 text-[var(--brand-red)] px-2.5 py-1">{$item.tag|escape}</span>
								{/if}
							</div>
							<div class="px-5 pt-4 pb-5 flex flex-col gap-3 flex-1">
								<h3 class="text-[22px] font-bold text-[#222] leading-tight">{$item.name|escape}</h3>
								<div class="text-[13px] font-bold tracking-wider text-[var(--brand-red)]">{$item.type_label|escape}</div>
								<div class="pt-1 mt-auto">
									{if $item.price_old}
									<div class="text-[16px] text-[var(--brand-red)] line-through">{$item.price_old|escape} PLN</div>
									{/if}
									<div class="flex items-baseline gap-2">
										<span class="text-[34px] font-bold text-[var(--brand-blue-strong)] leading-none">{$item.price|escape}</span>
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
<script>
(function () {
	function initLvSwiper() {
		if (typeof Swiper === 'undefined') {
			setTimeout(initLvSwiper, 50);
			return;
		}
		var el = document.getElementById('cat-lv-swiper');
		if (!el || el.swiper) return;
		new Swiper(el, {
			loop: true,
			slidesPerView: 1,
			spaceBetween: 24,
			navigation: { prevEl: '#cat-lv-prev', nextEl: '#cat-lv-next' },
			breakpoints: {
				640: { slidesPerView: 2 },
				1024: { slidesPerView: 3 }
			}
		});
	}
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initLvSwiper);
	} else {
		initLvSwiper();
	}
})();
</script>
{/if}
