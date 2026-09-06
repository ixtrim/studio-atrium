<section class="w-full max-w-[1200px] mx-auto px-4 my-12 text-center" id="testimonials">
    <p class="text-[#222] text-[32px] leading-[36px] font-bold">
        <span class="align-top mr-2">“</span>
        {$testimonials.meta.quote_text|escape|nl2br nofilter}
        <span class="align-top ml-2">“</span>
    </p>
    <p class="mt-6 text-[24px] leading-[24px] text-[#7a7a7a]">{$testimonials.meta.attribution|escape}</p>
    <h3 class="mt-16 text-[22px] font-bold text-[#222] text-left -mb-[24px]">{$testimonials.meta.medals_title|escape}</h3>
    <div class="mt-8 flex justify-center">
        {if $testimonials.medals.0.image_url}
            <img src="{$testimonials.medals.0.image_url|escape}" alt="{$testimonials.medals.0.image_alt|escape}"
                class="w-auto h-[170px] object-contain mx-auto" loading="lazy" />
        {/if}
    </div>
</section>