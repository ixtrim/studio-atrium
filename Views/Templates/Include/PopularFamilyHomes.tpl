<section class="w-full bg-white pt-[15px] pb-[125px]" id="popular-family-homes">
    <div class="max-w-[1480px] mx-auto px-8">
        <h2 class="pfh-title text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-10 pl-2 uppercase">{$popular_family_homes.meta.section_title|escape}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {foreach $popular_family_homes.items as $item}
            <a href="{$item.link_url|escape}"
                target="_blank"
                rel="{$item.link_rel|default:'noopener noreferrer'|escape}"
                title="{$item.link_title|default:$item.label|escape}"
                class="pfh-card group flex flex-col items-center">
                <div class="relative w-full aspect-square overflow-hidden bg-[#f3f3f3]">
                    {if $item.image_url}
                    <img src="{$item.image_url|escape}"
                        alt="{$item.image_alt|default:$item.label|escape}"
                        loading="lazy"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    {/if}
                    <span class="pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-60 bg-[#1D99E1]" aria-hidden="true"></span>
                </div>
                <div class="mt-[8px] text-[18px] font-600 text-[#222]">{$item.label|escape}</div>
            </a>
            {/foreach}
        </div>
    </div>
</section>
