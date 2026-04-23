{foreach $products_sections as $section}
<section class="py-6" id="products-{$section.section_key|escape}">
    <div class="max-w-[1280px] mx-auto px-6">
        <h2 class="text-[22px] font-bold text-[var(--brand-darker)] leading-tight">{$section.section_title|escape}</h2>
        <p class="text-[13px] text-[var(--brand-darker)]/80 mt-1 mb-5">{$section.section_subtitle|escape}</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            {foreach $section.items as $item}
            <a href="{$item.url|escape}" title="{$item.link_title|escape}" class="relative block overflow-hidden group">
                <img src="{$item.image_url|escape}" alt="{$item.name|escape}" class="w-full h-[220px] object-cover" loading="lazy">
                <div class="absolute top-0 left-0 right-0 p-3 text-white">
                    <div class="text-[10px] font-bold uppercase tracking-wider leading-tight"
                        style="text-shadow:0 1px 2px rgba(0,0,0,0.4)">{$item.type_display|escape}</div>
                    <div class="text-[14px] font-bold leading-tight" style="text-shadow:0 1px 2px rgba(0,0,0,0.5)">
                        {$item.name_upper|escape}{if $item.area_display} {$item.area_display|escape}{/if}
                    </div>
                </div>
            </a>
            {/foreach}
        </div>
    </div>
</section>
{/foreach}
