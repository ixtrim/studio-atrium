<section class="bg-[#3a3a3a] text-white py-20" id="offer">
    <div class="max-w-[1280px] mx-auto px-12 grid md:grid-cols-2 gap-16 items-start">
        <div>
            <h2 class="text-[26px] font-bold tracking-wide uppercase mb-10">{$offer.title|escape}</h2>
            <p class="text-[18px] leading-[24px] font-bold uppercase mb-8 max-w-md">{$offer.lead_text|escape|nl2br}</p>
            <a href="{$offer.button_url|escape}" class="inline-flex items-center justify-center bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white font-bold px-8 py-3 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[13px] uppercase tracking-wider mb-12">{$offer.button_label|escape}</a>
            <blockquote class="text-center text-[22px] leading-snug max-w-xl mx-auto px-4"
                style="font-style:normal;font-weight:500"><span>“{$offer.quote_text|escape}”</span>
            </blockquote>
            <div class="text-center text-sm mt-4">{$offer.quote_author|escape}</div>
            <div class="flex justify-center items-center gap-3 mt-4">
                {if $offer.logo1_url}<img src="{$offer.logo1_url|escape}" alt="{$offer.logo1_alt|escape}" class="w-12 h-10 object-contain bg-white p-1">{/if}
                {if $offer.logo2_url}<img src="{$offer.logo2_url|escape}" alt="{$offer.logo2_alt|escape}" class="w-12 h-10 object-contain bg-white p-1">{/if}
                {if $offer.logo3_url}<img src="{$offer.logo3_url|escape}" alt="{$offer.logo3_alt|escape}" class="w-12 h-10 object-contain bg-white p-1">{/if}
            </div>
        </div>
        <div class="flex flex-col items-center">
            {if $offer.image_url}
            <img src="{$offer.image_url|escape}" alt="{$offer.image_alt|escape}" class="w-full max-w-md aspect-square object-cover">
            {/if}
            <div class="mt-4 text-[18px] font-bold uppercase tracking-wide">{$offer.image_caption|escape}</div>
        </div>
    </div>
</section>
