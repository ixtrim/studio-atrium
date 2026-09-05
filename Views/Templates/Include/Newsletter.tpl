<section class="relative">
    <div class="bg-[var(--brand-blue)] relative overflow-visible">
        <div class="max-w-[1480px] mx-auto px-12 py-16 grid grid-cols-12 gap-8 items-center">
            <div class="col-span-12 md:col-span-7">
                <h2 class="text-white text-[36px] font-400 tracking-tight mb-8 uppercase">{$newsletter.meta.contest_title|escape}</h2>
                <p class="text-[var(--brand-darker)] text-[18px] leading-[24px] font-bold uppercase">{$newsletter.meta.contest_body|escape|nl2br nofilter}</p>
            </div>
            <div class="hidden md:block col-span-5 relative h-[260px] overflow-visible" style="top:-40px">
                {foreach $newsletter.photos as $photo}
                <div class="absolute bg-white p-2 pb-8"
                    style="left:{$photo.pos_left_pct|escape}%;top:{$photo.pos_top_px|escape}px;transform:rotate({$photo.rotate_deg|escape}deg);width:180px;box-shadow:0 -8px 20px -6px rgba(0,0,0,0.35), 0 14px 24px -8px rgba(0,0,0,0.3)">
                    <img src="{$photo.image_url|escape}"
                        alt="{$photo.image_alt|escape}"
                        class="w-full h-[135px] object-cover" loading="lazy"><span
                        class="absolute -top-2 left-1/2 -translate-x-1/2 w-16 h-3 bg-white/60"></span></div>
                {/foreach}
            </div>
        </div>
    </div>
    <div class="bg-[#3a3a3a]">
        <div class="max-w-[1480px] mx-auto px-12 py-14 grid grid-cols-12 gap-8 items-center">
            <div class="col-span-12 md:col-span-4 text-white">
                <h3 class="text-white text-[22px] font-bold leading-snug">{$newsletter.meta.signup_title|escape|nl2br nofilter}</h3>
                <p class="text-[18px] leading-[24px] mt-6 opacity-90">{$newsletter.meta.signup_body1|escape}</p>
                <p class="text-[18px] leading-[24px] mt-4 opacity-90">{$newsletter.meta.signup_body2|escape}</p>
            </div>
            <div class="col-span-12 md:col-span-5"><input type="email" placeholder="e-mail"
                    class="hp-newsletter-email w-full bg-white border border-white px-6 py-4 text-[16px] text-[var(--brand-darker)] focus:outline-none focus:border-[var(--brand-blue)] placeholder:text-black/40">
                <div class="flex justify-center mt-8"><button
                        class="inline-flex items-center justify-center bg-[var(--brand-blue)] hover:bg-[var(--brand-blue-strong)] text-white font-bold px-16 py-4 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[13px] uppercase tracking-wider">{$newsletter.meta.signup_button_label|escape}</button></div>
            </div>
            <div class="col-span-12 md:col-span-3 text-white">
                <div class="text-[28px] font-black uppercase leading-none">{$newsletter.meta.reward_line1|escape}</div>
                <div class="text-[64px] font-black leading-none mt-3">{$newsletter.meta.reward_amount|escape}</div>
                <div class="text-[22px] font-bold leading-tight mt-3">{$newsletter.meta.reward_line2|escape|nl2br nofilter}</div>
            </div>
        </div>
    </div>
</section>
