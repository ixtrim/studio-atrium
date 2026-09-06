<section class="bg-white pb-16 overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-12">
        <h2 class="text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-12 uppercase">{$partners.meta.section_title|escape}</h2>
    </div>
    <div class="relative w-full overflow-hidden">
        <div class="flex gap-20 animate-[marquee_30s_linear_infinite] w-max">
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
