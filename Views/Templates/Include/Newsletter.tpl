<section class="relative">
    <div class="bg-[var(--brand-blue)] relative overflow-visible">
        <div class="max-w-[1480px] mx-auto {if $section_px}{$section_px} pt-10 pb-10 md:pt-12 md:pb-12{else}px-6 pt-[35px] pb-[42px]{/if} grid grid-cols-12 gap-8 items-center relative">
            <div class="col-span-12 md:col-span-7">
                <h2 class="text-white text-[24px] md:text-[36px] font-400 tracking-tight mb-[40px] uppercase">
                    {$newsletter.meta.contest_title|escape}</h2>
                <p class="text-[var(--brand-darker)] text-[16px] md:text-[20px] leading-[28px] font-bold uppercase">
                    {$newsletter.meta.contest_body|escape|nl2br nofilter}</p>
            </div>
            <div
                class="hp-newsletter-photos hidden md:block col-span-5 absolute right-0 -top-[34px] w-[min(680px,calc(48%+60px))] h-[220px] overflow-visible pointer-events-none">
                {foreach $newsletter.photos as $photo}
                    {if $photo.image_url && $photo@index < 3}
                        <div class="hp-newsletter-photo absolute bg-white p-2 pb-8 pointer-events-auto"
                            style="--i:{$photo@index};transform:rotate({if $photo@index == 0}7{elseif $photo@index == 1}13{else}8{/if}deg);width:206px;box-shadow:0 10px 28px -8px rgba(0,0,0,0.35), 0 2px 8px rgba(0,0,0,0.12)">
                            <img src="{$photo.image_url|escape}" alt="{$photo.image_alt|escape}"
                                class="w-full h-[160px] object-cover block" loading="lazy">
                            <span class="absolute -top-2 left-1/2 -translate-x-1/2 w-[58px] h-[11px] bg-white/55 shadow-sm"
                                aria-hidden="true"></span>
                        </div>
                    {/if}
                {/foreach}
            </div>
            <style>
                .hp-newsletter-photos .hp-newsletter-photo {
                    left: calc(2% + (var(--i) * 32%));
                    top: calc(-8px + (var(--i) * 52px));
                }
            </style>
        </div>
    </div>
    <div class="{if $category_newsletter_bg}bg-[#5d5b5c]{else}bg-[#3a3a3a]{/if}" id="hp-newsletter-signup">
        <div class="hp-newsletter-signup-grid max-w-[1480px] {if $section_px}{$section_px}{else}px-4 sm:px-6{/if} mx-auto pt-14 {if $section_px}pb-16{else}pb-[100px]{/if} grid grid-cols-1 md:grid-cols-12 md:gap-x-8 gap-y-10 items-start">
            <div class="col-span-12 md:col-span-4 text-white">
                <h2 class="text-[24px] md:text-[36px] font-400 text-white tracking-tight leading-tight uppercase m-0">
                    {$newsletter.meta.signup_title|escape|nl2br nofilter}</h2>
                <h3 class="text-white text-[22px] md:text-[32px] leading-[1.25] font-normal mt-0 mb-0">
                    {$newsletter.meta.signup_body1|escape}</h3>
                <p class="text-[16px] md:text-[20px] leading-[24px] mt-6 mb-0">{$newsletter.meta.signup_body2|escape}</p>
            </div>
            <div class="col-span-12 md:col-span-5 pt-[45px]">
                <form id="hp-newsletter-form" class="space-y-4 w-full max-w-full text-left" novalidate>
                    <input type="email" name="email" id="hp-newsletter-email" placeholder="e-mail" required
                        class="hp-newsletter-email w-full h-[45px] rounded-none bg-white border border-white px-6 py-0 text-[16px] text-[var(--brand-darker)] focus:outline-none focus:border-[var(--brand-blue)] placeholder:text-black/40">
                    <label class="flex items-start gap-3 text-[11px] leading-snug text-white/90 cursor-pointer">
                        <input type="checkbox" name="consent" id="hp-newsletter-consent" value="1" required
                            class="mt-1 w-4 h-4 shrink-0 accent-[var(--brand-blue)] rounded-none">
                        <span>Wyrażam zgodę na przetwarzanie moich danych osobowych w celach marketingowych i otrzymywanie informacji o promocjach zgodnie z <a href="/polityka-prywatnosci" class="underline hover:text-white" target="_blank" rel="noopener noreferrer">Polityką Prywatności</a></span>
                    </label>
                    <p id="hp-newsletter-error" class="hidden text-[13px] text-[#ffb4b4] leading-snug m-0" role="alert"></p>
                    <p id="hp-newsletter-success" class="hidden text-[13px] text-[#9dffb8] leading-snug m-0" role="status"></p>
                    <div class="flex justify-start mt-4">
                        <button type="submit" id="hp-newsletter-submit"
                            class="inline-flex items-center justify-center rounded-none bg-[var(--brand-blue)] hover:bg-[var(--brand-blue-strong)] text-white font-bold w-full sm:w-auto px-8 sm:px-16 py-4 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[13px] uppercase tracking-wider border-0 cursor-pointer disabled:opacity-60 disabled:cursor-wait">{$newsletter.meta.signup_button_label|escape}</button>
                    </div>
                </form>
                <script>
                (function () {
                    var form = document.getElementById('hp-newsletter-form');
                    if (!form || form.dataset.init === '1') return;
                    form.dataset.init = '1';
                    var emailEl = document.getElementById('hp-newsletter-email');
                    var consentEl = document.getElementById('hp-newsletter-consent');
                    var errEl = document.getElementById('hp-newsletter-error');
                    var okEl = document.getElementById('hp-newsletter-success');
                    var btn = document.getElementById('hp-newsletter-submit');

                    function showError(msg) {
                        errEl.textContent = msg || '';
                        errEl.classList.toggle('hidden', !msg);
                        okEl.classList.add('hidden');
                        okEl.textContent = '';
                    }
                    function showOk(msg) {
                        okEl.textContent = msg || '';
                        okEl.classList.toggle('hidden', !msg);
                        errEl.classList.add('hidden');
                        errEl.textContent = '';
                    }

                    form.addEventListener('submit', function (e) {
                        e.preventDefault();
                        var email = (emailEl.value || '').trim();
                        if (!email) {
                            showError('Podaj adres e-mail.');
                            emailEl.focus();
                            return;
                        }
                        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                            showError('Podaj prawidłowy adres e-mail.');
                            emailEl.focus();
                            return;
                        }
                        if (!consentEl.checked) {
                            showError('Aby się zapisać, zaznacz zgodę na przetwarzanie danych.');
                            consentEl.focus();
                            return;
                        }

                        btn.disabled = true;
                        showError('');
                        fetch('/?module=index&action=newsletter_subscribe', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: 'email=' + encodeURIComponent(email) + '&consent=1'
                        }).then(function (r) { return r.json(); }).then(function (data) {
                            var fb = (data && data.feedback) ? data.feedback : data;
                            if (fb && fb.status === 'ok') {
                                showOk(fb.message || 'Dziękujemy! Zostałeś zapisany do newslettera.');
                                form.reset();
                            } else {
                                showError((fb && fb.message) ? fb.message : 'Nie udało się zapisać. Spróbuj ponownie.');
                            }
                        }).catch(function () {
                            showError('Nie udało się zapisać. Spróbuj ponownie.');
                        }).then(function () {
                            btn.disabled = false;
                        });
                    });
                })();
                </script>
            </div>
            <div class="col-span-12 md:col-span-3 text-white">
                <div class="text-[26px] md:text-[34px] font-black uppercase leading-none">{$newsletter.meta.reward_line1|escape}</div>
                <div class="text-[32px] md:text-[40px] font-['Montserrat',sans-serif] font-black leading-none mt-3">
                    {$newsletter.meta.reward_amount|escape}</div>
                <div class="text-[26px] md:text-[34px] font-black leading-tight mt-3">
                    {$newsletter.meta.reward_line2|escape|replace:'/n':'<br>'|nl2br nofilter}</div>
            </div>
        </div>
    </div>
</section>