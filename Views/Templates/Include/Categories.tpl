<section class="relative bg-[#ececec] py-12" id="categories">
    <div class="max-w-[1480px] mx-auto px-8">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-[36px] font-400 text-[var(--brand-darker)] tracking-tight uppercase">
                {$categories_meta.section_title|escape}</h2>
            <a href="{$categories_meta.see_all_url|escape}"
                class="flex items-center gap-2 text-[18px] text-[#7a7a7a] hover:text-[var(--brand-darker)]">{$categories_meta.see_all_label|escape}<span
                    class="w-7 h-7 border border-black/15 flex items-center justify-center"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-chevron-down w-4 h-4 -rotate-90" aria-hidden="true" style="transform:rotate(-90deg)">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg></span></a>
        </div>
        <div class="relative">
            <div class="swiper" id="hp-cat-swiper">
                <div class="swiper-wrapper">
                    {foreach $categories as $item}
                        <div class="swiper-slide"><a href="{$item.link_url|escape}" class="group block">
                                <div class="aspect-square overflow-hidden"><img src="{$item.image_url|escape}"
                                        alt="{$item.title_line2|escape}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                </div>
                                <div class="text-center mt-4">
                                    <div class="text-[16px] font-normal text-[var(--brand-darker)] leading-tight">{$item.title_line1|escape}</div>
                                    <div class="text-[18px] font-['Montserrat',sans-serif] font-medium text-[var(--brand-darker)] leading-tight mt-0.5">
                                        {$item.title_line2|escape}</div>
                                </div>
                            </a></div>
                    {/foreach}
                </div>
            </div>
            <button type="button" aria-label="Poprzednie" id="hp-cat-prev"
                class="hidden lg:flex absolute -left-10 top-[40%] -translate-y-1/2 w-8 h-8 items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-[#7a7a7a] hover:text-[var(--brand-darker)] z-10 cursor-pointer"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-left w-7 h-7" aria-hidden="true">
                    <path d="m15 18-6-6 6-6"></path>
                </svg></button>
            <button type="button" aria-label="Następne" id="hp-cat-next"
                class="hidden lg:flex absolute -right-10 top-[40%] -translate-y-1/2 w-8 h-8 items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-[#7a7a7a] hover:text-[var(--brand-darker)] z-10 cursor-pointer"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-right w-7 h-7" aria-hidden="true">
                    <path d="m9 18 6-6-6-6"></path>
                </svg></button>
        </div>
        <button type="button"
            class="js-open-search absolute left-1/2 bottom-0 translate-x-[-50%] translate-y-1/2 inline-flex items-center justify-center bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white font-black px-12 py-4 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[16px] uppercase tracking-[0.1em] z-10 border-0 cursor-pointer">{$categories_meta.cta_label|escape}</button>
    </div>
</section>
<script>
    (function() {
        function initCatSwiper() {
            if (typeof Swiper === 'undefined') {
                setTimeout(initCatSwiper, 50);
                return;
            }
            var el = document.getElementById('hp-cat-swiper');
            if (!el || el.swiper) return;
            new Swiper(el, {
                loop: true,
                slidesPerView: 2.4,
                spaceBetween: 12,
                navigation: {
                    prevEl: '#hp-cat-prev',
                    nextEl: '#hp-cat-next'
                },
                breakpoints: {
                    640: { slidesPerView: 3.5, spaceBetween: 14 },
                    768: { slidesPerView: 4.5, spaceBetween: 16 },
                    1024: { slidesPerView: 6, spaceBetween: 16 },
                    1280: { slidesPerView: 7, spaceBetween: 16 },
                    1480: { slidesPerView: 8, spaceBetween: 18 }
                }
            });
        }
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initCatSwiper);
        } else {
            initCatSwiper();
        }
    })();
</script>