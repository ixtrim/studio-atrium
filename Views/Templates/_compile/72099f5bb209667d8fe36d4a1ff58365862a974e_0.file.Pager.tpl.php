<?php
/* Smarty version 3.1.48, created on 2026-09-23 16:51:50
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Pager.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6ab3e7869923f5_61712349',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72099f5bb209667d8fe36d4a1ff58365862a974e' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Pager.tpl',
      1 => 1776175186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6ab3e7869923f5_61712349 (Smarty_Internal_Template $_smarty_tpl) {
?><ol class="pagebar">
<?php if ($_smarty_tpl->tpl_vars['page']->value > 1) {?>
	<?php if ($_smarty_tpl->tpl_vars['page']->value > 2) {?>
		<li class="prev"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value-1;
echo $_smarty_tpl->tpl_vars['query']->value;?>
"></a></li>
	<?php } else { ?>
		<li class="prev"><a href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;
echo $_smarty_tpl->tpl_vars['query']->value;?>
"></a></li>
	<?php }
}?>
	<li class="page"><span class="page-number" contenteditable="true" data-pages="<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" data-baseurl="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['query']->value) {?> data-query="<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</span><span>z <?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
</span></li>
<?php if ($_smarty_tpl->tpl_vars['page']->value < $_smarty_tpl->tpl_vars['pages']->value) {?>
	<li class="next"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value+1;
echo $_smarty_tpl->tpl_vars['query']->value;?>
"></a></li>
<?php }?>
</ol><?php }
}
