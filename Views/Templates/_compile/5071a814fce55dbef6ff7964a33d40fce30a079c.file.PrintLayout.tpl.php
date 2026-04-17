<?php /* Smarty version Smarty-3.1.11, created on 2022-06-21 05:11:08
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/PrintLayout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198769679862b152ec37be14-84172006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5071a814fce55dbef6ff7964a33d40fce30a079c' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/PrintLayout.tpl',
      1 => 1494316474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198769679862b152ec37be14-84172006',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b152ec3a5466_15176561',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b152ec3a5466_15176561')) {function content_62b152ec3a5466_15176561($_smarty_tpl) {?><!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<?php echo $_smarty_tpl->getSubTemplate ("Layout/PrintHeadHTML.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</body>
</html><?php }} ?>