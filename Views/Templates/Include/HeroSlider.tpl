<section class="relative" id="hero-slider">
    <div class="relative">
        <div class="swiper" id="hp-hero-swiper">
            <div class="swiper-wrapper">
                {foreach $hero_slides as $slide}
                    <div class="swiper-slide">
                        <a href="{$slide.link_url|escape}" class="block relative h-[480px] bg-cover bg-center"
                            style="background-image:url({$slide.image_url|escape})">
                            <div class="max-w-[1480px] mx-auto px-8 h-full flex items-center">
                                <div class="bg-black/35 backdrop-blur-[2px] text-white px-[64px] py-[32px] max-w-[640px]">
                                    <h1 class="text-[42px] md:text-[54px] font-medium leading-[1.05]">
                                        {$slide.title|escape}</h1>
                                    {if $slide.subtitle}<div class="text-[36px] leading-[36px] font-500">
                                        {$slide.subtitle|escape}</div>{/if}
                                    {if $slide.badge}<div class="text-[24px] font-medium my-[12px] uppercase">
                                        {$slide.badge|escape}</div>{/if}
                                    {if $slide.body}<p
                                            class="text-[20px] leading-[24px] font-normal mt-0">
                                        {$slide.body|escape}</p>{/if}
                                </div>
                            </div>
                        </a>
                    </div>
                {/foreach}
            </div>
        </div>
        <button type="button" aria-label="Poprzednie" id="hp-hero-prev"
            class="hp-hero-arrow absolute left-4 top-1/2 -translate-y-1/2 z-10 flex items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 cursor-pointer transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-chevron-left" style="width:32px;height:32px;max-width:32px;max-height:32px"
                aria-hidden="true">
                <path d="m15 18-6-6 6-6" />
            </svg>
        </button>
        <button type="button" aria-label="Następne" id="hp-hero-next"
            class="hp-hero-arrow absolute right-4 top-1/2 -translate-y-1/2 z-10 flex items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 cursor-pointer transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-chevron-right" style="width:32px;height:32px;max-width:32px;max-height:32px"
                aria-hidden="true">
                <path d="m9 18 6-6-6-6" />
            </svg>
        </button>
    </div>
</section>

<section class="bg-[#3a3d42] py-6" id="safety-experience">
    <div class="max-w-[1480px] mx-auto px-8">
        <div class="text-center mb-4">
            <h2 class="text-white text-[36px] font-400 tracking-tight uppercase">
                {if $safety.title_left}<span class="text-[#1ba0e2]">{$safety.title_left|escape} </span>{/if}
                {if $safety.title_bold}<span>{$safety.title_bold|escape} </span>{/if}
                {if $safety.title_right}<span class="text-[#1ba0e2]">{$safety.title_right|escape}</span>{/if}
            </h2>
            {if $safety.subtitle}
                <p class="text-white text-[18px] leading-[24px] font-medium tracking-[0.12em]">
                    {$safety.subtitle|escape}</p>
            {/if}
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mt-[24px]">
            {foreach $safety_items as $item}
                <div class="flex items-center gap-3">
                    <div class="text-white text-[36px] md:text-[44px] font-bold leading-none">{$item.item_number|escape}
                    </div>
                    <div class="text-white text-[16px] leading-snug whitespace-pre-line">{$item.item_text|escape}</div>
                </div>
            {/foreach}
        </div>
    </div>
</section>
<script>
    (function() {
        function initHeroSwiper() {
            if (typeof Swiper === 'undefined') {
                setTimeout(initHeroSwiper, 50);
                return;
            }
            var el = document.getElementById('hp-hero-swiper');
            if (!el || el.swiper) return;
            new Swiper(el, {
                loop: true,
                speed: 700,
                autoplay: { delay: 5500, disableOnInteraction: false },
                navigation: {
                    prevEl: '#hp-hero-prev',
                    nextEl: '#hp-hero-next'
                }
            });
        }
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initHeroSwiper);
        } else {
            initHeroSwiper();
        }
    })();
</script>