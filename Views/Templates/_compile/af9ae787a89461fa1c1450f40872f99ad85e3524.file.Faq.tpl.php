<?php /* Smarty version Smarty-3.1.11, created on 2022-06-22 04:58:28
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Ajax/Faq.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204901479362b2a17465cd78-99620930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af9ae787a89461fa1c1450f40872f99ad85e3524' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Ajax/Faq.tpl',
      1 => 1502968822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204901479362b2a17465cd78-99620930',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    '_faq' => 0,
    '_reply' => 0,
    'defaultFaq' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b2a1746927f4_91357283',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b2a1746927f4_91357283')) {function content_62b2a1746927f4_91357283($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.replace.php';
?><div class="box ajaxed" id="faq-list" style="display: none;">
	<ul>
	<?php if ($_smarty_tpl->tpl_vars['list']->value){?>
		<?php  $_smarty_tpl->tpl_vars['_faq'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_faq']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_faq']->key => $_smarty_tpl->tpl_vars['_faq']->value){
$_smarty_tpl->tpl_vars['_faq']->_loop = true;
?>
			<li>
				<p class="query"><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['_faq']->value['content']);?>
</p>
				<?php  $_smarty_tpl->tpl_vars['_reply'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_reply']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_faq']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_reply']->key => $_smarty_tpl->tpl_vars['_reply']->value){
$_smarty_tpl->tpl_vars['_reply']->_loop = true;
?>
					<p><?php echo $_smarty_tpl->tpl_vars['_reply']->value['content'];?>
</p>
				<?php } ?>
			</li>
		<?php } ?>
	<?php }?>
	<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['defaultFaq']->value['content'],"<ul>",''),"</ul>",'');?>

	</ul>
</div><?php }} ?>