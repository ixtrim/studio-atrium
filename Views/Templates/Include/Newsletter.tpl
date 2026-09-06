<section class="relative">
    <div class="bg-[var(--brand-blue)] relative overflow-visible">
        <div class="max-w-[1480px] mx-auto px-12 py-[75px] grid grid-cols-12 gap-8 items-center relative">
            <div class="col-span-12 md:col-span-7">
                <h2 class="text-white text-[36px] font-400 tracking-tight mb-[12px] uppercase">
                    {$newsletter.meta.contest_title|escape}</h2>
                <p class="text-[var(--brand-darker)] text-[18px] leading-[24px] font-bold uppercase">
                    {$newsletter.meta.contest_body|escape|nl2br nofilter}</p>
            </div>
            <div
                class="hp-newsletter-photos hidden md:block col-span-5 absolute right-0 top-0 w-[min(620px,48%)] h-[300px] overflow-visible pointer-events-none">
                {foreach $newsletter.photos as $photo}
                    {if $photo.image_url && $photo@index < 3}
                        <div class="hp-newsletter-photo absolute bg-white p-2 pb-8 pointer-events-auto"
                            style="--i:{$photo@index};transform:rotate({if isset($photo.rotate_deg)}{$photo.rotate_deg|escape}{else}{if $photo@index == 0}-7{elseif $photo@index == 1}8{else}-4{/if}{/if}deg);width:186px;box-shadow:0 10px 28px -8px rgba(0,0,0,0.35), 0 2px 8px rgba(0,0,0,0.12)">
                            <img src="{$photo.image_url|escape}" alt="{$photo.image_alt|escape}"
                                class="w-full h-[140px] object-cover block" loading="lazy">
                            <span class="absolute -top-2 left-1/2 -translate-x-1/2 w-[58px] h-[11px] bg-white/55 shadow-sm"
                                aria-hidden="true"></span>
                        </div>
                    {/if}
                {/foreach}
            </div>
            <style>
                .hp-newsletter-photos .hp-newsletter-photo {
                    left: calc(2% + (var(--i) * 32%));
                    top: calc(-42px + (var(--i) * 88px));
                }
            </style>
        </div>
    </div>
    <div class="bg-[#3a3a3a]">
        <div class="max-w-[1480px] mx-auto px-12 py-14 grid grid-cols-12 gap-[72px] items-center">
            <div class="col-span-12 md:col-span-5 text-white">
                <h2 class="text-[36px] font-400 text-white tracking-tight leading-tight uppercase">
                    {$newsletter.meta.signup_title|escape|nl2br nofilter}</h2>
                <h3 class="text-white text-[24px] leading-[1.35] mt-[12px] font-normal">
                    {$newsletter.meta.signup_body1|escape}</h3>
                <p class="text-[18px] leading-[24px] mt-[24px]">{$newsletter.meta.signup_body2|escape}</p>
            </div>
            <div class="col-span-12 md:col-span-4">
                <form id="hp-newsletter-form" class="space-y-4" novalidate>
                    <input type="email" name="email" id="hp-newsletter-email" placeholder="e-mail" required
                        class="hp-newsletter-email w-full bg-white border border-white px-6 py-4 text-[16px] text-[var(--brand-darker)] focus:outline-none focus:border-[var(--brand-blue)] placeholder:text-black/40">
                    <label class="flex items-start gap-3 text-[13px] leading-snug text-white/90 cursor-pointer">
                        <input type="checkbox" name="consent" id="hp-newsletter-consent" value="1" required
                            class="mt-1 w-4 h-4 shrink-0 accent-[var(--brand-blue)]">
                        <span>Wyrażam zgodę na przetwarzanie moich danych osobowych w celach marketingowych i otrzymywanie informacji o promocjach zgodnie z <a href="/polityka-prywatnosci" class="underline hover:text-white" target="_blank" rel="noopener noreferrer">Polityką Prywatności</a></span>
                    </label>
                    <p id="hp-newsletter-error" class="hidden text-[13px] text-[#ffb4b4] leading-snug m-0" role="alert"></p>
                    <p id="hp-newsletter-success" class="hidden text-[13px] text-[#9dffb8] leading-snug m-0" role="status"></p>
                    <div class="flex justify-center mt-4">
                        <button type="submit" id="hp-newsletter-submit"
                            class="inline-flex items-center justify-center bg-[var(--brand-blue)] hover:bg-[var(--brand-blue-strong)] text-white font-bold px-16 py-4 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[13px] uppercase tracking-wider border-0 cursor-pointer disabled:opacity-60 disabled:cursor-wait">{$newsletter.meta.signup_button_label|escape}</button>
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
                <div class="text-[28px] font-black uppercase leading-none">{$newsletter.meta.reward_line1|escape}</div>
                <div class="text-[64px] font-['Montserrat',sans-serif] font-semibold leading-none mt-3">
                    {$newsletter.meta.reward_amount|escape}</div>
                <div class="text-[22px] font-bold leading-tight mt-3">
                    {$newsletter.meta.reward_line2|escape|nl2br nofilter}</div>
            </div>
        </div>
    </div>
</section>