<?php /* Smarty version Smarty-3.1.11, created on 2022-06-21 02:08:31
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Ajax/Wolf.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11082659762b1281fc8ac20-22467634%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cfbea6322ca3a1b91e52aae1f8b30333803cd44' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Ajax/Wolf.tpl',
      1 => 1495183359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11082659762b1281fc8ac20-22467634',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'project' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b1281fc8f6b6_43911076',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b1281fc8f6b6_43911076')) {function content_62b1281fc8f6b6_43911076($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.replace.php';
?><div class="wolf">
	<iframe id="wolf-iframe" width="100%" height="1200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://formularz.wolfhaus.com.pl/atrium/?projekt=<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['project']->value['name'],' ','_');?>
&link=<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
"></iframe>
</div><?php }} ?>