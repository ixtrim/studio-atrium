<section class="py-20 bg-white" id="tips">
    <div class="max-w-[1280px] mx-auto px-12">
        <h2 class="text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-12 uppercase">{$porady.section_title|escape}</h2>
        <div class="grid md:grid-cols-2 gap-x-16 gap-y-10">
            {foreach $tips as $item name=tips}
            <div class="flex gap-6 items-start{if $smarty.foreach.tips.index < 2} md:pb-10 md:border-b border-black/10{/if}">
                {if $item.article_url}
                <a href="{$item.article_url|escape}" class="block w-[160px] h-[160px] overflow-hidden shrink-0 group">
                    <img src="{$item.image_url|escape}" alt="{$item.image_alt|escape}" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-[1.2]">
                </a>
                {else}
                <div class="w-[160px] h-[160px] overflow-hidden shrink-0">
                    <img src="{$item.image_url|escape}" alt="{$item.image_alt|escape}" class="w-full h-full object-cover">
                </div>
                {/if}
                <div class="pt-1">
                    <h3 class="text-[16px] font-bold text-[var(--brand-darker)] leading-snug mb-4">
                        {if $item.article_url}
                        <a href="{$item.article_url|escape}" class="hover:underline">{$item.title|escape}</a>
                        {else}
                        {$item.title|escape}
                        {/if}
                    </h3>
                    <div class="flex items-center gap-3 text-[16px] text-[var(--brand-blue-strong)]">
                        {if $item.tag1_label}
                        <a href="{$item.tag1_url|escape}" class="hover:underline">{$item.tag1_label|escape}</a>
                        {/if}
                        {if $item.tag1_label && $item.tag2_label}
                        <span class="text-black/30">|</span>
                        {/if}
                        {if $item.tag2_label}
                        <a href="{$item.tag2_url|escape}" class="hover:underline">{$item.tag2_label|escape}</a>
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
