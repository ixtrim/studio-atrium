<section class="w-full bg-white py-16" id="popular-categories">
    <div class="max-w-[1480px] mx-auto px-8">
        <h2 class="pcg-title text-[34px] font-bold text-[#222] mb-10 pl-2">{$popular_categories_meta.section_title|escape}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {foreach from=$popular_categories item=item}
            <a href="{$item.link_url|escape}"
                target="_blank"
                rel="{$item.link_rel|default:'noopener noreferrer'|escape}"
                title="{$item.link_title|default:$item.label|escape}"
                class="pcg-card group flex flex-col items-center">
                <div class="w-full aspect-square overflow-hidden bg-[#f3f3f3]">
                    {if $item.image_url}
                    <img src="{$item.image_url|escape}"
                        alt="{$item.image_alt|default:$item.label|escape}"
                        loading="lazy"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    {/if}
                </div>
                <div class="mt-5 text-[18px] font-bold tracking-[0.15em] text-[#222]">{$item.label|escape}</div>
            </a>
            {/foreach}
        </div>
    </div>
</section>
