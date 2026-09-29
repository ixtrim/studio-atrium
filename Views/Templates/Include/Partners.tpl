{if $partners.marquee|@count}
<section class="bg-white pt-10 md:pt-16 pb-12 md:pb-[90px] overflow-hidden">
    <div class="max-w-[1480px] mx-auto px-4 sm:px-8 md:px-12">
        <h2 class="text-[24px] md:text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-12 uppercase">{$partners.meta.section_title|escape}</h2>
    </div>
    <div class="relative w-full overflow-hidden">
        <div class="flex gap-10 sm:gap-20 animate-[marquee_90s_linear_infinite] w-max">
            {foreach $partners.marquee as $item}
            <a href="{$item.link_url|escape}"
                target="_blank"
                rel="{$item.link_rel|default:'noopener noreferrer'|escape}"
                title="{$item.link_title|default:$item.name|escape}"
                class="shrink-0 flex items-center justify-center h-20 px-4">
                <img src="{$item.logo_url|escape}" alt="{$item.name|escape}" class="max-h-16 w-auto object-contain" loading="lazy">
            </a>
            {/foreach}
        </div>
    </div>
</section>
{/if}
