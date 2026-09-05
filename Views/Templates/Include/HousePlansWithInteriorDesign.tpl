<section class="w-full bg-[#f3f3f3] py-16" id="interior-plans">
    <div class="max-w-[1480px] mx-auto px-8">
        <h2 class="ip-title text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-10 pl-2 uppercase">{$interior_plans.meta.section_title|escape}</h2>
        <div class="relative">
            <button type="button" aria-label="Poprzedni" id="hp-ip-prev"
                class="hidden lg:flex absolute -left-10 top-[40%] -translate-y-1/2 z-10 w-8 h-8 items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-[#7a7a7a] hover:text-[var(--brand-darker)] cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-left w-7 h-7" aria-hidden="true">
                    <path d="m15 18-6-6 6-6"></path>
                </svg>
            </button>
            <button type="button" aria-label="Następny" id="hp-ip-next"
                class="hidden lg:flex absolute -right-10 top-[40%] -translate-y-1/2 z-10 w-8 h-8 items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-[#7a7a7a] hover:text-[var(--brand-darker)] cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-right w-7 h-7" aria-hidden="true">
                    <path d="m9 18 6-6-6-6"></path>
                                    </svg>
            </button>
            <div class="swiper [&_.swiper-wrapper]:items-stretch" id="hp-ip-swiper">
                <div class="swiper-wrapper">
                    {foreach $interior_plans.items as $item}
                    <div class="swiper-slide !h-auto">
                        <a href="{$item.url|escape}" title="{$item.name|escape}" class="bg-white overflow-hidden h-full flex flex-col group">
                            <div class="relative overflow-hidden">
                                <img src="{$item.image_url|escape}" alt="{$item.name|escape}" class="w-full h-[280px] object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
                                {if $item.tag}
                                <span class="absolute top-3 left-3 text-[11px] font-bold tracking-wider bg-white/90 text-[var(--brand-red)] px-2.5 py-1">{$item.tag|escape}</span>
                                {/if}
                            </div>
                            <div class="px-5 pt-4 pb-5 flex flex-col gap-3 flex-1">
                                <div class="flex items-start justify-between gap-3">
                                    <h3 class="text-[22px] font-bold text-[#222] leading-tight">{$item.name|escape}</h3>
                                    <div class="flex items-center gap-2 shrink-0 mt-0.5 text-[#555]">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5" aria-hidden="true"><path d="M12 3v18"></path><path d="m19 8 3 8a5 5 0 0 1-6 0zV7"></path><path d="M3 7h1a17 17 0 0 0 8-2 17 17 0 0 0 8 2h1"></path><path d="m5 8 3 8a5 5 0 0 1-6 0zV7"></path><path d="M7 21h10"></path></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5" aria-hidden="true"><path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"></path></svg>
                                    </div>
                                </div>
                                <div class="text-[13px] font-bold tracking-wider text-[var(--brand-red)]">{$item.type_label|escape}</div>
                                <div class="flex items-center gap-4 py-2 text-[13px] text-[#222]">
                                    {if $item.area}
                                    <div class="flex items-center gap-2"><span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-vector-square" aria-hidden="true"><path d="M17.055 4.533a24 24 0 00-10.11 0"/><path d="M19.467 17.055a24 24 0 000-10.11"/><path d="M4.533 6.945a24 24 0 000 10.11"/><path d="M6.945 19.467a24 24 0 0010.11 0"/><circle cx="19" cy="19" r="2"/><circle cx="19" cy="5" r="2"/><circle cx="5" cy="19" r="2"/><circle cx="5" cy="5" r="2"/></svg></span><span>{$item.area|escape}</span></div>
                                    {/if}
                                    {if $item.rooms != ''}
                                    <div class="flex items-center gap-1.5"><span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 4v16"></path><path d="M2 8h18a2 2 0 0 1 2 2v10"></path><path d="M2 17h20"></path><path d="M6 8v9"></path></svg></span><span>{$item.rooms|escape}</span></div>
                                    {/if}
                                    {if $item.baths > 0}
                                    <div class="flex items-center gap-1.5"><span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 4 8 6"></path><path d="M17 19v2"></path><path d="M2 12h20"></path><path d="M7 19v2"></path><path d="M9 5 7.621 3.621A2.121 2.121 0 0 0 4 5v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"></path></svg></span><span>{$item.baths|escape}</span></div>
                                    {/if}
                                    {if $item.garage > 0}
                                    <div class="flex items-center gap-1.5"><span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path><circle cx="7" cy="17" r="2"></circle><path d="M9 17h6"></path><circle cx="17" cy="17" r="2"></circle></svg></span><span>{$item.garage|escape}</span></div>
                                    {/if}
                                </div>
                                <div class="pt-1 mt-auto">
                                    {if $item.price_old}
                                    <div class="text-[16px] text-[var(--brand-red)] line-through">{$item.price_old|escape} PLN</div>
                                    {/if}
                                    <div class="flex items-baseline gap-2"><span class="text-[34px] font-['Montserrat',sans-serif] font-semibold text-[var(--brand-blue-strong)] leading-none">{$item.price|escape}</span><span class="text-[16px] text-[var(--brand-blue-strong)] font-semibold">PLN</span></div>
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
    function initIpSwiper() {
        if (typeof Swiper === 'undefined') {
            setTimeout(initIpSwiper, 50);
            return;
        }
        var el = document.getElementById('hp-ip-swiper');
        if (!el || el.swiper) return;
        new Swiper(el, {
            loop: true,
            slidesPerView: 1.15,
            spaceBetween: 16,
            navigation: {
                prevEl: '#hp-ip-prev',
                nextEl: '#hp-ip-next'
            },
            breakpoints: {
                640: { slidesPerView: 2, spaceBetween: 16 },
                1024: { slidesPerView: 3, spaceBetween: 20 },
                1280: { slidesPerView: 4, spaceBetween: 24 }
            }
        });
    }
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initIpSwiper);
    } else {
        initIpSwiper();
    }
})();
</script>
