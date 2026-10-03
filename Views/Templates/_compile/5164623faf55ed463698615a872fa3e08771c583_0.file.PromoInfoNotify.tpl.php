<?php
/* Smarty version 3.1.48, created on 2026-10-03 09:33:21
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/ProjectExtend/PromoInfoNotify.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6ac0afc1ea4df2_74237441',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5164623faf55ed463698615a872fa3e08771c583' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/ProjectExtend/PromoInfoNotify.tpl',
      1 => 1791012371,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6ac0afc1ea4df2_74237441 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="form-wrapper" id="project-promo-notify-box">
	<h4>Powiadom o promocji</h4>
	<p class="pop-lead">Zostaw adres e-mail, a powiadomimy Cię o dodatkowych promocjach związanych z tym projektem.</p>

	<form class="validable" method="post" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project_extend','action'=>'promo_notify'),$_smarty_tpl ) );?>
" id="promo-notify-form" data-call="PromoNotify.onSend">
		<input name="module" type="hidden" value="project_extend">
		<input name="action" type="hidden" value="promo_notify">
		<input name="pid" type="hidden" id="promo-notify-pid" value="">

		<p>
			<label for="promo-notify-email" class="black">Twój adres e-mail</label>
			<input type="email" name="email" id="promo-notify-email" class="long" autocomplete="email">
		</p>

		<p class="accept">
			<input type="checkbox" name="newsletter" id="newsletter-accept" value="on">
			<label for="newsletter-accept">Chcę także otrzymywać newsletter Studio Atrium.</label>
		</p>

		<p class="accept">
			<input type="checkbox" name="accept" id="ppn-accept" value="on">
			<label for="ppn-accept">
				Wyrażam zgodę na przetwarzanie moich danych osobowych w celu otrzymywania informacji o promocjach i ofercie projektowej.
				<span class="ajax-info" data-url="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'ajax','action'=>'get_mailing_regulations'),$_smarty_tpl ) );?>
" data-scroll="ajax-regulations">Szczegóły</span>
			</label>
		</p>

		<p class="msg" id="promo-notify-box" style="display:none">&nbsp;</p>

		<p class="last">
			<img id="promo-notify-waiter" src="/img/waiter-blue.gif" alt="" style="display: none;" width="24" height="24">
			<input type="submit" id="promo-notify-button" class="baton" value="Wyślij">
		</p>
	</form>
</div>
<?php }
}
