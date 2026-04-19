<section class="py-16 bg-white" id="articles-ticks">
    <div class="max-w-[1280px] mx-auto px-12 space-y-5">
        {foreach $articles_ticks as $item}
        <div class="flex flex-wrap items-baseline gap-4">
            <h3 class="text-[22px] font-bold text-[var(--brand-darker)]">{$item.title|escape}</h3>
            <p class="text-[15px] text-[var(--brand-darker)]/80">{$item.teaser|escape} -
                <a href="{$item.link_url|escape}" class="text-[var(--brand-blue-strong)] hover:underline">{$item.link_label|default:'Czytaj dalej...'|escape}</a>
            </p>
        </div>
        {/foreach}
    </div>
</section>
