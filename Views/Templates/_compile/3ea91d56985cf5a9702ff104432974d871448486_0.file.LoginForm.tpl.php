<?php
/* Smarty version 3.1.48, created on 2026-10-01 22:16:58
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Panel/LoginForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abebfba21fb22_72254882',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ea91d56985cf5a9702ff104432974d871448486' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Panel/LoginForm.tpl',
      1 => 1776175200,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abebfba21fb22_72254882 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="lb-box" class="blue-overlay lb">	
	<div id="lb-wrapper">
		<h4>Logowanie</h4>
		<form method="post" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'authenticate','action'=>'login'),$_smarty_tpl ) );?>
" id="login-form" autocomplete="off">
			<p>
				<label for="email" class="black">E-mail</label>
				<input type="text" name="email" id="email" class="long">
			</p>
			<p>
				<label for="password" class="black">Hasło</label>
				<input type="password" name="password" id="password" class="long">
			</p>
			<p class="msg" id="login-fail-box" style="display: none;">Podałeś nieprawidłowy e-mail lub hasło</p>
			<p class="last"><input type="submit" value="zaloguj" class="baton"><a href="javascript:" id="password-trigger">Zapomniałem hasła</a></p>
		</form>
		<h4>Nie masz konta?</h4>
		<p><a href="javascript:" class="register-trigger">Zarejestruj się</a>. Zyskasz większe możliwości, kontrolę nad korespondencją, komentarzami i swoimi transakcjami, a także dostęp do dodatkowych materiałów oraz promocji. </p>
	</div>
	<button type="button" id="lb-overlay-close" class="blue-overlay-close">Zamknij</button>
</div><?php }
}
