<?php
/* Smarty version 3.1.48, created on 2026-09-03 14:46:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/NewsletterSubpage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a996c165e91d2_23642832',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cec2d40f4ba40be510b58287749816b9ec6fe1f6' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/NewsletterSubpage.tpl',
      1 => 1788430252,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a996c165e91d2_23642832 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="relative" id="newsletter-subpage">
	<div class="bg-[#3a3a3a]">
		<div class="max-w-[1480px] mx-auto px-12 py-14 grid grid-cols-12 gap-8 items-center">
			<div class="col-span-12 md:col-span-4 text-white">
				<h3 class="text-[22px] font-bold leading-snug">
					<?php if ($_smarty_tpl->tpl_vars['newsletter']->value['meta']['signup_title']) {?>
						<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['meta']['signup_title'], ENT_QUOTES, 'UTF-8', true) ));?>

					<?php } else { ?>
						Zarejestruj się w naszym serwisie.<br>Nie przegap informacji o nowościach<br>i promocjach.
					<?php }?>
				</h3>
				<p class="text-[16px] leading-[24px] mt-6 opacity-90">
					<?php if ($_smarty_tpl->tpl_vars['newsletter']->value['meta']['signup_body1']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['meta']['signup_body1'], ENT_QUOTES, 'UTF-8', true);
} else { ?>Zarejestruj się i korzystaj z dogodnych narzędzi wszędzie gdzie jesteś. Będziemy także zawiadamiać Cię o rabatach i promocjach.<?php }?>
				</p>
				<p class="text-[16px] leading-[24px] mt-4 opacity-90">
					<?php if ($_smarty_tpl->tpl_vars['newsletter']->value['meta']['signup_body2']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['meta']['signup_body2'], ENT_QUOTES, 'UTF-8', true);
} else { ?>Twoje konto to swoboda korzystania z narzędzi gdziekolwiek jesteś.<?php }?>
				</p>
			</div>
			<div class="col-span-12 md:col-span-5">
				<input type="email" placeholder="e-mail"
					class="w-full bg-white px-6 py-4 text-[16px] text-[var(--brand-darker)] focus:outline-none placeholder:text-black/40">
				<div class="flex justify-center mt-8">
					<button type="button"
						class="inline-flex items-center justify-center bg-[var(--brand-blue)] hover:bg-[var(--brand-blue-strong)] text-white font-bold px-16 py-4 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[13px] uppercase tracking-wider">
						<?php if ($_smarty_tpl->tpl_vars['newsletter']->value['meta']['signup_button_label']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['newsletter']->value['meta']['signup_button_label'], ENT_QUOTES, 'UTF-8', true);
} else { ?>Zarejestruj się<?php }?>
					</button>
				</div>
			</div>
			<div class="col-span-12 md:col-span-3 text-white">
				<div class="text-[28px] font-black uppercase leading-none">Odbierz</div>
				<div class="text-[64px] font-black leading-none mt-3">100 zł</div>
				<div class="text-[22px] font-bold leading-tight mt-3">na zakup<br>projektu domu</div>
			</div>
		</div>
	</div>
</section>
<?php }
}
