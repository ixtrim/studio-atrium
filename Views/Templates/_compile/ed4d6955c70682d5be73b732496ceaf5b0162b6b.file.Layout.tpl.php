<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 08:30:34
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20625732562b0302a1ea715-12487997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed4d6955c70682d5be73b732496ceaf5b0162b6b' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Layout.tpl',
      1 => 1592830069,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20625732562b0302a1ea715-12487997',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'catalogPrompt' => 0,
    'messageBox' => 0,
    'notifyMessage' => 0,
    'notifyStyle' => 0,
    'notifyBoxHidden' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0302a1f93b4_37455791',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0302a1f93b4_37455791')) {function content_62b0302a1f93b4_37455791($_smarty_tpl) {?><!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<?php echo $_smarty_tpl->getSubTemplate ("Layout/HeadHTML.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</head>
	<body data-catalog="<?php if ($_smarty_tpl->tpl_vars['catalogPrompt']->value){?>1<?php }else{ ?>0<?php }?>">
		<?php if ($_smarty_tpl->tpl_vars['messageBox']->value['errors']){?><div class="messageBox error"><p><?php echo join($_smarty_tpl->tpl_vars['messageBox']->value['errors'],"<br>");?>
</p><a class="close" href="javascript:"></a></div><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['messageBox']->value['messages']){?><div class="messageBox info"><p><?php echo join($_smarty_tpl->tpl_vars['messageBox']->value['messages'],"<br>");?>
</p><a class="close" href="javascript:"></a></div><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['notifyMessage']->value){?><div class="notifyBox<?php if ($_smarty_tpl->tpl_vars['notifyStyle']->value==1){?> warning<?php }?><?php if ($_smarty_tpl->tpl_vars['notifyBoxHidden']->value){?> hidden<?php }?>" id="notifyBoxId"><p><?php echo $_smarty_tpl->tpl_vars['notifyMessage']->value;?>
 <a id="closeNotifyBox" href="javascript:"> schowaj &raquo;</a></p></div><?php }?>
		<?php echo $_smarty_tpl->getSubTemplate ("Layout/Header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ("Layout/Tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ("Layout/Footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</body>
</html><?php }} ?>