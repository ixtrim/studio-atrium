<section class="py-[125px] bg-white" id="articles-ticks">
    <div class="max-w-[1480px] mx-auto px-12 space-y-6">
        {foreach $articles_ticks as $item}
        <div class="flex flex-wrap items-baseline gap-4">
            <h3 class="text-[28px] leading-[30px] font-semibold text-[var(--brand-darker)]">{$item.title|escape}</h3>
            <p class="text-[20px] leading-[30px] text-[var(--brand-darker)]/80">{$item.teaser|escape} -
                <a href="{$item.link_url|escape}" class="text-[var(--brand-blue-strong)] hover:underline">{$item.link_label|default:'Czytaj dalej...'|escape}</a>
            </p>
        </div>
        {/foreach}
    </div>
</section>
