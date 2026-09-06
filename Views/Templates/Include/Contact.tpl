<section class="w-full" id="homepage-contact">
    <div class="grid grid-cols-1 md:grid-cols-12 md:items-stretch">
        <div class="md:col-span-5 bg-[#1d99e1] text-white py-16 pl-8 md:pl-[max(2rem,calc((100vw-1320px)/2+2rem))] pr-8 flex flex-col justify-center">
            <div class="flex items-start gap-4">
            <h2 class="text-[36px] font-400 text-[var(--brand-darker)] tracking-tight uppercase">{$homepage_contact.call_title|escape}</h2>
                {if $homepage_contact.hostess_image_url}
                <img src="{$homepage_contact.hostess_image_url|escape}"
                    alt="{$homepage_contact.hostess_image_alt|escape}"
                    class="w-[70px] h-[70px] object-cover ml-auto ring-4 ring-white/30" loading="lazy">
                {/if}
            </div>
            <div class="space-y-1 text-white">
                {if $homepage_contact.phone1}<div class="text-[44px] font-['Montserrat',sans-serif] font-semibold leading-tight">{$homepage_contact.phone1|escape}</div>{/if}
                {if $homepage_contact.phone2}<div class="text-[44px] font-['Montserrat',sans-serif] font-semibold leading-tight">{$homepage_contact.phone2|escape}</div>{/if}
            </div>
            <div class="mt-[16px] text-[24px] text-[var(--brand-darker)]">
                {if $homepage_contact.hours_label}<div class="font-bold">{$homepage_contact.hours_label|escape}</div>{/if}
                {if $homepage_contact.hours_text}<div class="font-semibold">{$homepage_contact.hours_text|escape}</div>{/if}
            </div>
        </div>
        <div class="md:col-span-7 bg-[#f5f5f5] py-16 pr-8 md:pr-[max(2rem,calc((100vw-1320px)/2+2rem))] pl-8 flex flex-col justify-center">
            <div class="grid grid-cols-1 lg:grid-cols-7 gap-8 items-center">
                <div class="lg:col-span-3">
                    <h2 class="text-[36px] font-400 text-[var(--brand-darker)] tracking-tight uppercase mb-5">{$homepage_contact.question_title|escape}</h2>
                    <p class="text-[18px] leading-[24px] text-[#333]">{$homepage_contact.question_body|escape}</p>
                </div>
                <div class="lg:col-span-4">
                    <form class="space-y-3">
                        <input type="email" placeholder="{$homepage_contact.email_placeholder|escape}"
                            class="w-full bg-white px-4 py-3 text-[16px] text-[#333] placeholder:text-[#888] outline-none border-0">
                        <textarea placeholder="{$homepage_contact.message_placeholder|escape}" rows="4"
                            class="w-full bg-white px-4 py-3 text-[16px] text-[#333] placeholder:text-[#888] outline-none border-0 resize-none"></textarea>
                        <label class="flex items-start gap-2 text-[12px] text-[#666] leading-snug pt-1">
                            <input type="checkbox" class="mt-0.5 w-3 h-3 accent-[#1d99e1]">
                            <span>{$homepage_contact.consent_text|escape}
                                {if $homepage_contact.privacy_url}
                                <a href="{$homepage_contact.privacy_url|escape}"
                                    title="{$homepage_contact.privacy_title|default:'Szczegóły'|escape}"
                                    rel="{$homepage_contact.privacy_rel|default:'noopener noreferrer'|escape}"
                                    class="underline">Szczegóły</a>
                                {/if}
                            </span>
                        </label>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center bg-[#e63329] hover:bg-[#cc2a21] text-white font-bold tracking-wider py-3 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[16px] uppercase transition-colors mt-[32px]">{$homepage_contact.submit_label|escape}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
