<section class="relative" id="hero-slider">
    <div class="relative">
        <div class="swiper" id="hp-hero-swiper">
            <div class="swiper-wrapper">
                {foreach $hero_slides as $slide}
                <div class="swiper-slide">
                    <a href="{$slide.link_url|escape}" class="block relative h-[640px] bg-cover bg-center"
                        style="background-image:url({$slide.image_url|escape})">
                        <div class="max-w-[1480px] mx-auto px-8 h-full flex items-end pb-20">
                            <div class="bg-black/35 backdrop-blur-[2px] text-white px-12 py-10 max-w-[560px]">
                                <h1 class="text-[42px] md:text-[48px] font-black leading-[1.05] mb-3">{$slide.title|escape}</h1>
                                {if $slide.subtitle}<div class="text-[26px] font-light leading-tight">{$slide.subtitle|escape}</div>{/if}
                                {if $slide.badge}<div class="text-[26px] font-black tracking-wide mb-4">{$slide.badge|escape}</div>{/if}
                                {if $slide.body}<p class="text-[18px] leading-[24px] font-light whitespace-pre-line opacity-95">{$slide.body|escape}</p>{/if}
                            </div>
                        </div>
                    </a>
                </div>
                {/foreach}
            </div>
        </div>
        <button type="button" aria-label="Poprzednie" id="hp-hero-prev"
            class="absolute left-4 top-1/2 -translate-y-1/2 z-10 w-12 h-12 flex items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-white/90 hover:text-white cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-chevron-left w-12 h-12" aria-hidden="true">
                <path d="m15 18-6-6 6-6"></path>
            </svg>
        </button>
        <button type="button" aria-label="Następne" id="hp-hero-next"
            class="absolute right-4 top-1/2 -translate-y-1/2 z-10 w-12 h-12 flex items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-white/90 hover:text-white cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-chevron-right w-12 h-12" aria-hidden="true">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </button>
    </div>
</section>

<section class="bg-[#3a3d42] py-6" id="safety-experience">
    <div class="max-w-[1480px] mx-auto px-8">
        <div class="text-center mb-4">
            <h2 class="text-white text-[20px] md:text-[22px] font-light tracking-wide">
                {if $safety.title_left}<span class="text-[#1ba0e2]">{$safety.title_left|escape} </span>{/if}
                {if $safety.title_bold}<span class="font-bold">{$safety.title_bold|escape} </span>{/if}
                {if $safety.title_right}<span class="text-[#1ba0e2]">{$safety.title_right|escape}</span>{/if}
            </h2>
            {if $safety.subtitle}
            <p class="text-white text-[18px] leading-[24px] font-bold tracking-[0.12em] mt-1.5">{$safety.subtitle|escape}</p>
            {/if}
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
            {foreach $safety_items as $item}
            <div class="flex items-center gap-3">
                <div class="text-white text-[36px] md:text-[44px] font-light leading-none">{$item.item_number|escape}</div>
                <div class="text-white text-[13px] leading-snug whitespace-pre-line">{$item.item_text|escape}</div>
            </div>
            {/foreach}
        </div>
    </div>
</section>
<script>
(function () {
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
