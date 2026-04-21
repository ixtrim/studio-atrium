<?php /* Smarty version Smarty-3.1.11, created on 2022-06-21 05:11:08
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Article/Print.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82551380762b152ec3b93d2-71280695%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3a8acbf6d1e8aaa930f49fd108ab0b19d56a3bd' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Article/Print.tpl',
      1 => 1585302439,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82551380762b152ec3b93d2-71280695',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b152ec3be600_96510104',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b152ec3be600_96510104')) {function content_62b152ec3be600_96510104($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.date_format.php';
?><div class="print-box-header">
	<img src="/img/logo.png" alt="Studio Atrium">
		<ul>
			<li>ul. Malczewskiego 1</li>
			<li>43-300 Bielsko-Biała</li>

			<li>tel. 33 822 94 96,</li>
			<li>602 303 160</li>
		</ul>
</div>

<h1><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</h1>

<div class="print-box">
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fixArticleContent'][0][0]->mFixArticleContent($_smarty_tpl->tpl_vars['article']->value['content'],$_smarty_tpl->tpl_vars['article']->value['id']);?>

</div>

<p class="copy">Wszelkie prawa zastrzeżone &copy; Studio Atrium 1994-<?php echo smarty_modifier_date_format(time(),"%Y");?>
</p><?php }} ?>