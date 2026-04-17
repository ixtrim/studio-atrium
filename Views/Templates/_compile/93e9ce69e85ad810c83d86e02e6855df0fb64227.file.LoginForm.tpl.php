<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 11:33:00
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/LoginForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116256309262b05aec649074-38708305%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93e9ce69e85ad810c83d86e02e6855df0fb64227' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/LoginForm.tpl',
      1 => 1648468435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116256309262b05aec649074-38708305',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b05aec64b2a7_16714279',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b05aec64b2a7_16714279')) {function content_62b05aec64b2a7_16714279($_smarty_tpl) {?><div id="lb-box" class="blue-overlay lb">	
	<div id="lb-wrapper">
		<h4>Logowanie</h4>
		<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'authenticate','action'=>'login'),$_smarty_tpl);?>
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
</div><?php }} ?>