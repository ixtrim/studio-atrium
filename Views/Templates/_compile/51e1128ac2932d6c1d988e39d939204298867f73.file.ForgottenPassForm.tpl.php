<?php /* Smarty version Smarty-3.1.11, created on 2022-06-23 13:15:09
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/ForgottenPassForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:51969654762b4675d37ff29-24949066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51e1128ac2932d6c1d988e39d939204298867f73' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/ForgottenPassForm.tpl',
      1 => 1648113979,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '51969654762b4675d37ff29-24949066',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b4675d3aa1d8_68858652',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b4675d3aa1d8_68858652')) {function content_62b4675d3aa1d8_68858652($_smarty_tpl) {?><div id="fp-box" class="blue-overlay">	
	<div id="fp-wrapper">
		<h4>Zapomniałem hasła</h4>
		<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'send_reset_password_link'),$_smarty_tpl);?>
" id="reset-password-form">
			<p>
				<label for="fp_email" class="black">E-mail</label>
				<input type="text" name="email" id="fp_email" class="long">
			</p>
			<p class="last"><input type="submit" value="wyślij nowe hasło" class="baton"></p>
		</form>
	</div>
	<button type="button" id="fp-overlay-close" class="blue-overlay-close">Zamknij</button>
</div><?php }} ?>