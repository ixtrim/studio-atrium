{if $last_viewed}
{assign var=_lvItems value=$last_viewed}
{elseif $bestsellers}
{assign var=_lvItems value=$bestsellers}
{else}
{assign var=_lvItems value=null}
{/if}
{if $_lvItems}
<section id="ostatnio" class="w-full bg-white py-16 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<h2 class="text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-10 pl-2 uppercase">Ostatnio oglądane</h2>
		<div class="relative">
			<button type="button" aria-label="Poprzedni" id="cat-lv-prev"
				class="hidden lg:flex absolute -left-10 top-[40%] -translate-y-1/2 z-10 w-8 h-8 items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-black hover:text-[#179fd4] cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
					stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
					class="lucide lucide-chevron-left w-7 h-7" aria-hidden="true">
					<path d="m15 18-6-6 6-6"></path>
				</svg>
			</button>
			<button type="button" aria-label="Następny" id="cat-lv-next"
				class="hidden lg:flex absolute -right-10 top-[40%] -translate-y-1/2 z-10 w-8 h-8 items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-black hover:text-[#179fd4] cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
					stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
					class="lucide lucide-chevron-right w-7 h-7" aria-hidden="true">
					<path d="m9 18 6-6-6-6"></path>
				</svg>
			</button>
			<div class="swiper [&_.swiper-wrapper]:items-stretch" id="cat-lv-swiper">
				<div class="swiper-wrapper">
					{foreach $_lvItems as $item}
					<div class="swiper-slide !h-auto">
						{include file="Include/ProjectTeaserCard.tpl" item=$item teaser_interactive=true}
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
			slidesPerView: 1.15,
			spaceBetween: 16,
			navigation: {
				prevEl: '#cat-lv-prev',
				nextEl: '#cat-lv-next'
			},
			breakpoints: {
				640: { slidesPerView: 2, spaceBetween: 16 },
				1024: { slidesPerView: 3, spaceBetween: 24 }
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
