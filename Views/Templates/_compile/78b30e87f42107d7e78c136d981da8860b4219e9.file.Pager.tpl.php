<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 08:30:34
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Include/Pager.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117327129662b0302a2eec26-03911676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78b30e87f42107d7e78c136d981da8860b4219e9' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Include/Pager.tpl',
      1 => 1489572214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117327129662b0302a2eec26-03911676',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'url' => 0,
    'query' => 0,
    'baseUrl' => 0,
    'pages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0302a2facf7_22222302',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0302a2facf7_22222302')) {function content_62b0302a2facf7_22222302($_smarty_tpl) {?><ol class="pagebar">
<?php if ($_smarty_tpl->tpl_vars['page']->value>1){?>
	<?php if ($_smarty_tpl->tpl_vars['page']->value>2){?>
		<li class="prev"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
"></a></li>
	<?php }else{ ?>
		<li class="prev"><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
"></a></li>
	<?php }?>
<?php }?>
	<li class="page"><span class="page-number" contenteditable="true" data-pages="<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" data-baseurl="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['query']->value){?> data-query="<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</span><span>z <?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
</span></li>
<?php if ($_smarty_tpl->tpl_vars['page']->value<$_smarty_tpl->tpl_vars['pages']->value){?>
	<li class="next"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
"></a></li>
<?php }?>
</ol><?php }} ?>