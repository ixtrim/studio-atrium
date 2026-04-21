<?php /* Smarty version Smarty-3.1.11, created on 2022-06-21 15:06:44
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/Account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140139010062b1de8414dcd3-20142666%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea3aa79b6f1fc6af834ce2c02521972e21e1c5ae' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/Account.tpl',
      1 => 1582711131,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140139010062b1de8414dcd3-20142666',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b1de84155c79_76986263',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b1de84155c79_76986263')) {function content_62b1de84155c79_76986263($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("Panel/_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="content" id="Content">
	<div class="form-box max">
	<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'account_store'),$_smarty_tpl);?>
" method="post" class="validable default">
		<input name="module" value="panel" type="hidden">
		<input name="action" value="account_store" type="hidden">
		<input type="hidden" id="ownerUid" name="ownerUid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['_uid'];?>
">

		<p>
			<label for="a_name">Imię</label>
			<input type="text" name="a_name" id="a_name" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
">
		</p>
		<p>
			<label for="a_surname">Nazwisko</label>
			<input type="text" name="a_surname" id="a_surname" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['surname'];?>
">
		</p>
		<p>
			<label for="a_nick">Nick</label>
			<input type="text" name="a_nick" id="a_nick" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['nick'];?>
">
		</p>
		<p>
			<label for="a_email">E-mail</label>
			<input type="text" name="a_email" id="a_email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
">
		</p>
		<p>
			<label for="a_phone">Numer telefonu</label>
			<input type="text" name="a_phone" id="a_phone" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['props']['phone'];?>
">
		</p>
		<p class="last"><input type="submit" value="aktualizuj" class="baton"></p>
		
	</form>
	</div>
	
	<h3 class="line">Zmiana hasła</h3>
	<p class="txt">Jeżeli chcesz zmienić hasło, wpisz poniżej aktualne hasło oraz dwukrotnie nowe.</p>
	<div class="form-box">
	<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'password_store'),$_smarty_tpl);?>
" method="post" class="validable default">
		<input name="module" value="panel" type="hidden">
		<input name="action" value="password_store" type="hidden">
		<p>
			<label for="a_pass">Aktualne hasło</label>
			<input type="password" name="a_pass" id="a_pass">
		</p>
		<p>
			<label for="a_newpass">Nowe hasło</label>
			<input type="password" name="a_newpass" id="a_newpass">
		</p>
		<p>
			<label for="a_newpass2">Powtórz nowe hasło</label>
			<input type="password" name="a_newpass2" id="a_newpass2">
		</p>
		<p class="last"><input type="submit" value="zmień" class="baton"></p>
	</form>
	</div>
	<p class="block"><a href="javascript:" class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'ajax','action'=>'get_user_regulations'),$_smarty_tpl);?>
">regulamin</a></p>
	
	<h3>Likwidacja konta</h3>
	<p class="txt">Aby usunąć konto w serwisie studioatrium.pl, kliknij poniższy przycisk, a następnie potwierdź likwidację konta klikając OK.</p>
	<p class="txt"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'account_delete'),$_smarty_tpl);?>
" class="baton" onClick="return confirm('Czy na pewno chcesz usunąć konto w serwisie studioatrium.pl?');">usuń konto</a></p>
</div><?php }} ?>