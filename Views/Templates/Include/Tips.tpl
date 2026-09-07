<section class="py-[75px] bg-white" id="tips">
    <div class="max-w-[1480px] mx-auto px-12">
        <h2 class="text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-[36px] uppercase">{$porady.section_title|escape}</h2>
        <div class="grid md:grid-cols-2 gap-x-16 gap-y-10">
            {foreach $tips as $item name=tips}
            <div class="flex gap-6 items-start{if $smarty.foreach.tips.index < 2} md:pb-10 md:border-b border-black/10{/if}">
                {if $item.article_url && $item.article_url != '#'}
                <a href="{$item.article_url|escape}" class="group relative block w-[200px] h-[200px] overflow-hidden shrink-0 bg-[#f3f3f3]">
                    <img src="{$item.image_url|escape}" alt="{$item.image_alt|escape}"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy">
                    <span class="pointer-events-none absolute inset-0 bg-[#1D99E1] opacity-0 transition-opacity duration-300 group-hover:opacity-60 z-[1]" aria-hidden="true"></span>
                </a>
                {else}
                <div class="relative w-[200px] h-[200px] overflow-hidden shrink-0 bg-[#f3f3f3]">
                    <img src="{$item.image_url|escape}" alt="{$item.image_alt|escape}"
                        class="absolute inset-0 w-full h-full object-cover" loading="lazy">
                </div>
                {/if}
                <div class="pt-1">
                    <h3 class="text-[24px] leading-[28px] font-semibold text-[var(--brand-darker)] leading-snug mb-4">
                        {if $item.article_url && $item.article_url != '#'}
                        <a href="{$item.article_url|escape}" class="hover:underline">{$item.title|escape}</a>
                        {else}
                        {$item.title|escape}
                        {/if}
                    </h3>
                    <div class="flex items-center gap-3 text-[18px] text-[var(--brand-blue-strong)]">
                        {if $item.tag1_label}
                            {if $item.tag1_url && $item.tag1_url != '#'}
                            <a href="{$item.tag1_url|escape}" class="hover:underline">{$item.tag1_label|escape}</a>
                            {else}
                            <span>{$item.tag1_label|escape}</span>
                            {/if}
                        {/if}
                        {if $item.tag1_label && $item.tag2_label}
                        <span class="text-black/30">|</span>
                        {/if}
                        {if $item.tag2_label}
                            {if $item.tag2_url && $item.tag2_url != '#'}
                            <a href="{$item.tag2_url|escape}" class="hover:underline">{$item.tag2_label|escape}</a>
                            {else}
                            <span>{$item.tag2_label|escape}</span>
                            {/if}
                        {/if}
                    </div>
                </div>
            </div>
            {/foreach}
        </div>
        <div class="flex justify-center mt-12">
            <a href="{$porady.button_url|escape}" class="inline-flex items-center justify-center bg-[var(--brand-blue-strong)] hover:bg-[var(--brand-blue)] text-white font-bold px-12 py-4 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[13px] uppercase tracking-wider">{$porady.button_label|escape}</a>
        </div>
    </div>
</section>
