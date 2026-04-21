<?php /* Smarty version Smarty-3.1.11, created on 2022-06-21 15:05:57
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42558115362b1de55ed41f5-50860315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ae49567b70e9590caea4262f2eafd937a1bb26d' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/_menu.tpl',
      1 => 1520343358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42558115362b1de55ed41f5-50860315',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    '_userMenu' => 0,
    'notifications' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b1de55ee5634_50265429',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b1de55ee5634_50265429')) {function content_62b1de55ee5634_50265429($_smarty_tpl) {?><div class="list-header panel<?php echo rand(1,2);?>
">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Witaj <?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
 <a href="<?php if ($_smarty_tpl->tpl_vars['user']->value['impersonated']){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'authenticate','action'=>'logout_to_backend'),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'authenticate','action'=>'logout'),$_smarty_tpl);?>
<?php }?>">wyloguj się</a></h1>
			</div>
		</div>
	</div>
</div>
<nav class="user">
	<div>
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'account'),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->tpl_vars['_userMenu']->value=='account'){?> class="selected"<?php }?>><span class="account"></span>Twoje konto</a>
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message'),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->tpl_vars['_userMenu']->value=='message'){?> class="selected"<?php }?>><span class="message<?php if ($_smarty_tpl->tpl_vars['notifications']->value['message']){?> notify<?php }?>"></span>Korespondencja</a>
		
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'forum'),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->tpl_vars['_userMenu']->value=='comment'){?> class="selected"<?php }?>><span class="comment<?php if ($_smarty_tpl->tpl_vars['notifications']->value['comment']){?> notify<?php }?>"></span>Forum</a>
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'promo'),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->tpl_vars['_userMenu']->value=='promo'){?> class="selected"<?php }?>><span class="promo<?php if ($_smarty_tpl->tpl_vars['notifications']->value['promo']){?> notify<?php }?>"></span>Promocje</a>
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'transaction'),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->tpl_vars['_userMenu']->value=='transaction'){?> class="selected"<?php }?>><span class="transaction"></span>Zamówienia</a>
	</div>
</nav><?php }} ?>