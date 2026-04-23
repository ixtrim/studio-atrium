<section class="w-full max-w-[1200px] mx-auto px-4 my-12 text-center" id="testimonials">
    <p class="text-[#222] text-[26px] leading-[1.45] font-bold"><span
            class="text-[32px] align-top mr-2">“</span>{$testimonials.meta.quote_text|escape|nl2br nofilter}<span
            class="text-[32px] align-top ml-2">“</span></p>
    <p class="mt-6 text-[14px] text-[#7a7a7a]">{$testimonials.meta.attribution|escape}</p>
    <h3 class="mt-16 text-[22px] font-bold text-[#222] text-left">{$testimonials.meta.medals_title|escape}</h3>
    <div class="mt-8 flex justify-center items-center flex-wrap">
        {foreach $testimonials.medals as $medal}
        {if $medal.image_url}
        <img src="{$medal.image_url|escape}" alt="{$medal.image_alt|escape}" class="w-[88px] h-[88px] object-contain -mx-2" loading="lazy" />
        {/if}
        {/foreach}
    </div>
</section>
