<?php
/* Smarty version 3.1.48, created on 2026-10-03 09:42:08
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Ajax/ConsultantForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6ac0b1d02ed829_77159227',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33038777e19dadf37d0008ceb4c50427184b098f' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Ajax/ConsultantForm.tpl',
      1 => 1791013078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6ac0b1d02ed829_77159227 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="consultant-form-box" class="blue-overlay help">
	<div id="help-wrapper">
		<h4>Konsultant</h4>

		<p class="pop-lead">
		<?php if ($_smarty_tpl->tpl_vars['project']->value) {?>
			Masz dodatkowe pytania dotyczące projektu <strong><?php if ($_smarty_tpl->tpl_vars['project']->value['name']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['name'], ENT_QUOTES, 'UTF-8', true);
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['symbol_alpha'], ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['symbol_num'], ENT_QUOTES, 'UTF-8', true);
}?></strong>? Napisz do nas — my odpowiemy.
		<?php } else { ?>
			Nie znalazłeś projektu, jakiego szukałeś? Opisz go nam! Postaramy się go znaleźć dla Ciebie. Masz dodatkowe pytania? Wystarczy je napisać — my odpowiemy.
		<?php }?>
		</p>

		<form method="post" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'contact','action'=>'send'),$_smarty_tpl ) );?>
" id="consultant-form">
			<input type="hidden" id="cons_project_id" name="project_id" value="<?php if ($_smarty_tpl->tpl_vars['project']->value) {
echo $_smarty_tpl->tpl_vars['project']->value['id'];
} else { ?>0<?php }?>">
			<input name="module" type="hidden" value="contact">
			<input name="action" type="hidden" value="send">

			<p>
				<label for="cons_name" class="black">Twoje imię</label>
				<input type="text" name="name" id="cons_name" class="long" autocomplete="name">
			</p>

			<p>
				<label for="cons_email" class="black">Twój adres e-mail</label>
				<input type="email" name="email" id="cons_email" class="long" autocomplete="email">
			</p>

			<p>
				<label for="cons_query" class="black">Twoje zapytanie</label>
				<textarea name="query" id="cons_query" rows="5" class="long"></textarea>
			</p>

			<p class="accept">
				<input type="checkbox" name="accept" id="consultant-accept" value="on">
				<label for="consultant-accept">
					Wyrażam zgodę na przetwarzanie moich danych osobowych w celu otrzymania odpowiedzi zgodnie z oświadczeniem.
					<span class="ajax-info" data-url="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'ajax','action'=>'get_consultant_regulations'),$_smarty_tpl ) );?>
">Szczegóły</span>
				</label>
			</p>

			<p class="msg" id="contact-fail-box" style="display:none">Wypełnij poprawnie formularz</p>

			<p class="last">
				<img src="/img/waiter-blue.gif" alt="" id="cons-loader" style="display:none" width="24" height="24">
				<input id="cons_button" type="submit" value="Wyślij" class="baton">
			</p>
		</form>

		<p class="pop-foot">
			Możesz także skorzystać z infolinii. Konsultant pomoże Ci wybrać projekt i załatwi formalności z zamówieniem.
			<br>
			Numer konsultanta:
			<a href="tel:+48338229496" rel="nofollow"><strong>33 822 94 96</strong></a>
		</p>
	</div>

	<button type="button" id="help-overlay-close" class="blue-overlay-close">
		<span class="close-x" aria-hidden="true">✖</span>
		<span>Zamknij</span>
	</button>
</div>
<?php }
}
