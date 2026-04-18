<?php
/* Smarty version 4.5.6, created on 2026-05-03 21:28:24
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69f7a1d836a6e7_14493067',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70a390c217e84a3be8dce8cc97ada46297181610' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Layout.tpl',
      1 => 1776175188,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Layout/HeadHTML.tpl' => 1,
    'file:Layout/Header.tpl' => 1,
    'file:Layout/Tools.tpl' => 1,
    'file:Layout/Footer.tpl' => 1,
  ),
),false)) {
function content_69f7a1d836a6e7_14493067 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<?php $_smarty_tpl->_subTemplateRender("file:Layout/HeadHTML.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	</head>
	<body data-catalog="<?php if ($_smarty_tpl->tpl_vars['catalogPrompt']->value) {?>1<?php } else { ?>0<?php }?>">
		<?php if ($_smarty_tpl->tpl_vars['messageBox']->value['errors']) {?><div class="messageBox error"><p><?php echo join($_smarty_tpl->tpl_vars['messageBox']->value['errors'],"<br>");?>
</p><a class="close" href="javascript:"></a></div><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['messageBox']->value['messages']) {?><div class="messageBox info"><p><?php echo join($_smarty_tpl->tpl_vars['messageBox']->value['messages'],"<br>");?>
</p><a class="close" href="javascript:"></a></div><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['notifyMessage']->value) {?><div class="notifyBox<?php if ($_smarty_tpl->tpl_vars['notifyStyle']->value == 1) {?> warning<?php }
if ($_smarty_tpl->tpl_vars['notifyBoxHidden']->value) {?> hidden<?php }?>" id="notifyBoxId"><p><?php echo $_smarty_tpl->tpl_vars['notifyMessage']->value;?>
 <a id="closeNotifyBox" href="javascript:"> schowaj &raquo;</a></p></div><?php }?>
		<?php $_smarty_tpl->_subTemplateRender("file:Layout/Header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
		<?php $_smarty_tpl->_subTemplateRender("file:Layout/Tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		<?php $_smarty_tpl->_subTemplateRender("file:Layout/Footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	</body>
</html><?php }
}
