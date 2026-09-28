<section class="w-full max-w-[1300px] mx-auto px-4 my-16 text-center pt-10 pb-16 md:pt-[60px] md:pb-[100px]" id="testimonials">
    <p class="text-[#222] text-[24px] leading-snug sm:text-[32px] md:text-[40px] md:leading-[44px] font-bold">
        <span class="align-top mr-2">“</span>
        {$testimonials.meta.quote_text|escape|nl2br nofilter}
        <span class="align-top ml-2">“</span>
    </p>
    <p class="mt-[50px] text-[20px] leading-[24px] text-[#7a7a7a] mb-[0px]">{$testimonials.meta.attribution|escape}</p>
    <h3 class="mt-10 text-[24px] leading-snug sm:text-[32px] md:text-[40px] md:leading-[44px] font-bold text-[#222] text-center md:text-left -mb-[24px]">{$testimonials.meta.medals_title|escape}</h3>
    <div class="mt-16 flex justify-center">
        {if $testimonials.medals.0.image_url}
            <img src="{$testimonials.medals.0.image_url|escape}" alt="{$testimonials.medals.0.image_alt|escape}"
                class="w-auto h-[105px] object-contain mx-auto" loading="lazy" />
        {/if}
    </div>
</section>