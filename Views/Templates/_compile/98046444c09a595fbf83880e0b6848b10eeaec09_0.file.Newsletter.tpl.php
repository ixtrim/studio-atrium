<?php
/* Smarty version 3.1.48, created on 2026-10-01 21:43:04
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Newsletter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abeb7c8e38f80_67005417',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98046444c09a595fbf83880e0b6848b10eeaec09' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Newsletter.tpl',
      1 => 1790673310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abeb7c8e38f80_67005417 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="relative">
    <div class="bg-[var(--brand-blue)] relative overflow-visible">
        <div class="max-w-[1480px] mx-auto <?php if ($_smarty_tpl->tpl_vars['section_px']->value) {
echo $_smarty_tpl->tpl_vars['section_px']->value;?>
 pt-10 pb-10 md:pt-12 md:pb-12<?php } else { ?>px-6 pt-[35px] pb-[42px]<?php }?> grid grid-cols-12 gap-8 items-center relative">
            <div class="col-span-12 md:col-span-7">
                <h2 class="text-white text-[24px] md:text-[36px] font-400 tracking-tight mb-[40px] uppercase">
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['meta']['contest_title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                <p class="text-[var(--brand-darker)] text-[16px] md:text-[20px] leading-[28px] font-bold uppercase">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['meta']['contest_body'], ENT_QUOTES, 'UTF-8', true) ));?>
</p>
            </div>
            <div
                class="hp-newsletter-photos hidden md:block col-span-5 absolute right-0 -top-[34px] w-[min(680px,calc(48%+60px))] h-[220px] overflow-visible pointer-events-none">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['newsletter']->value['photos'], 'photo');
$_smarty_tpl->tpl_vars['photo']->index = -1;
$_smarty_tpl->tpl_vars['photo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
$_smarty_tpl->tpl_vars['photo']->do_else = false;
$_smarty_tpl->tpl_vars['photo']->index++;
$__foreach_photo_19_saved = $_smarty_tpl->tpl_vars['photo'];
?>
                    <?php if ($_smarty_tpl->tpl_vars['photo']->value['image_url'] && $_smarty_tpl->tpl_vars['photo']->index < 3) {?>
                        <div class="hp-newsletter-photo absolute bg-white p-2 pb-8 pointer-events-auto"
                            style="--i:<?php echo $_smarty_tpl->tpl_vars['photo']->index;?>
;transform:rotate(<?php if ($_smarty_tpl->tpl_vars['photo']->index == 0) {?>7<?php } elseif ($_smarty_tpl->tpl_vars['photo']->index == 1) {?>13<?php } else { ?>8<?php }?>deg);width:206px;box-shadow:0 10px 28px -8px rgba(0,0,0,0.35), 0 2px 8px rgba(0,0,0,0.12)">
                            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['photo']->value['image_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['photo']->value['image_alt'], ENT_QUOTES, 'UTF-8', true);?>
"
                                class="w-full h-[160px] object-cover block" loading="lazy">
                            <span class="absolute -top-2 left-1/2 -translate-x-1/2 w-[58px] h-[11px] bg-white/55 shadow-sm"
                                aria-hidden="true"></span>
                        </div>
                    <?php }?>
                <?php
$_smarty_tpl->tpl_vars['photo'] = $__foreach_photo_19_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            <style>
                .hp-newsletter-photos .hp-newsletter-photo {
                    left: calc(2% + (var(--i) * 32%));
                    top: calc(-8px + (var(--i) * 52px));
                }
            </style>
        </div>
    </div>
    <div class="<?php if ($_smarty_tpl->tpl_vars['category_newsletter_bg']->value) {?>bg-[#5d5b5c]<?php } else { ?>bg-[#3a3a3a]<?php }?>" id="hp-newsletter-signup">
        <div class="hp-newsletter-signup-grid max-w-[1480px] <?php if ($_smarty_tpl->tpl_vars['section_px']->value) {
echo $_smarty_tpl->tpl_vars['section_px']->value;
} else { ?>px-4 sm:px-6<?php }?> mx-auto pt-14 <?php if ($_smarty_tpl->tpl_vars['section_px']->value) {?>pb-16<?php } else { ?>pb-[100px]<?php }?> grid grid-cols-1 md:grid-cols-12 md:gap-x-8 gap-y-10 items-start">
            <div class="col-span-12 md:col-span-4 text-white">
                <h2 class="text-[24px] md:text-[36px] font-400 text-white tracking-tight leading-tight uppercase m-0">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['meta']['signup_title'], ENT_QUOTES, 'UTF-8', true) ));?>
</h2>
                <h3 class="text-white text-[22px] md:text-[32px] leading-[1.25] font-normal mt-0 mb-0">
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['meta']['signup_body1'], ENT_QUOTES, 'UTF-8', true);?>
</h3>
                <p class="text-[16px] md:text-[20px] leading-[24px] mt-6 mb-0"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['meta']['signup_body2'], ENT_QUOTES, 'UTF-8', true);?>
</p>
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
                            class="inline-flex items-center justify-center rounded-none bg-[var(--brand-blue)] hover:bg-[var(--brand-blue-strong)] text-white font-bold w-full sm:w-auto px-8 sm:px-16 py-4 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[13px] uppercase tracking-wider border-0 cursor-pointer disabled:opacity-60 disabled:cursor-wait"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['meta']['signup_button_label'], ENT_QUOTES, 'UTF-8', true);?>
</button>
                    </div>
                </form>
                <?php echo '<script'; ?>
>
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
                <?php echo '</script'; ?>
>
            </div>
            <div class="col-span-12 md:col-span-3 text-white">
                <div class="text-[26px] md:text-[34px] font-black uppercase leading-none"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['meta']['reward_line1'], ENT_QUOTES, 'UTF-8', true);?>
</div>
                <div class="text-[32px] md:text-[40px] font-['Montserrat',sans-serif] font-black leading-none mt-3">
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['meta']['reward_amount'], ENT_QUOTES, 'UTF-8', true);?>
</div>
                <div class="text-[26px] md:text-[34px] font-black leading-tight mt-3">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['meta']['reward_line2'], ENT_QUOTES, 'UTF-8', true),'/n','<br>' )) ));?>
</div>
            </div>
        </div>
    </div>
</section><?php }
}
