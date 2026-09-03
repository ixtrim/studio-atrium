<section class="w-full my-10">
    <div class="grid grid-cols-1 md:grid-cols-12 overflow-hidden">
        <div class="md:col-span-5 bg-[#1ea7e1] text-white px-10 py-10 relative">
            <div class="flex items-start gap-4">
                <h3 class="text-[22px] font-bold tracking-wide pt-3">{$homepage_contact.call_title|escape}</h3>
                {if $homepage_contact.hostess_image_url}
                <img src="{$homepage_contact.hostess_image_url|escape}"
                    alt="{$homepage_contact.hostess_image_alt|escape}"
                    class="w-[70px] h-[70px] object-cover ml-auto ring-4 ring-white/30" loading="lazy">
                {/if}
            </div>
            <div class="mt-4 space-y-1 font-bold leading-tight" style="font-size:44px">
                {if $homepage_contact.phone1}<div>{$homepage_contact.phone1|escape}</div>{/if}
                {if $homepage_contact.phone2}<div>{$homepage_contact.phone2|escape}</div>{/if}
            </div>
            <div class="mt-8 text-[18px]">
                {if $homepage_contact.hours_label}<div class="font-bold">{$homepage_contact.hours_label|escape}</div>{/if}
                {if $homepage_contact.hours_text}<div class="mt-3">{$homepage_contact.hours_text|escape}</div>{/if}
            </div>
        </div>
        <div class="md:col-span-4 bg-[#f3f3f3] px-10 py-10">
            <h3 class="text-[28px] font-bold text-[#222] mb-5">{$homepage_contact.question_title|escape}</h3>
            <p class="text-[18px] leading-[24px] text-[#333]">{$homepage_contact.question_body|escape}</p>
        </div>
        <div class="md:col-span-3 bg-[#f3f3f3] px-6 py-10">
            <form class="space-y-3"><input type="email" placeholder="{$homepage_contact.email_placeholder|escape}"
                    class="w-full bg-white px-4 py-3 text-[16px] text-[#333] placeholder:text-[#888] outline-none border-0"><textarea
                    placeholder="{$homepage_contact.message_placeholder|escape}" rows="4"
                    class="w-full bg-white px-4 py-3 text-[16px] text-[#333] placeholder:text-[#888] outline-none border-0 resize-none"></textarea><label
                    class="flex items-start gap-2 text-[11px] text-[#666] leading-snug pt-1"><input type="checkbox"
                        class="mt-0.5 w-3 h-3 accent-[#1ea7e1]"><span>{$homepage_contact.consent_text|escape}
                        {if $homepage_contact.privacy_url}
                        <a href="{$homepage_contact.privacy_url|escape}"
                            title="{$homepage_contact.privacy_title|default:'Szczegóły'|escape}"
                            rel="{$homepage_contact.privacy_rel|default:'noopener noreferrer'|escape}"
                            class="underline">Szczegóły</a>
                        {/if}
                    </span></label><button type="submit"
                    class="w-full inline-flex items-center justify-center bg-[#e63329] hover:bg-[#cc2a21] text-white font-bold tracking-wider py-3 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[16px] uppercase transition-colors">{$homepage_contact.submit_label|escape}</button>
            </form>
        </div>
    </div>
</section>
