<?php
/* Smarty version 3.1.48, created on 2026-09-03 14:46:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Breadcrumbs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a996c165773d6_64370786',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dcac132b6487a2db7b7522da5994147704710cea' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Breadcrumbs.tpl',
      1 => 1788439190,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a996c165773d6_64370786 (Smarty_Internal_Template $_smarty_tpl) {
?><nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5]">
	<ol class="max-w-[1480px] mx-auto px-8 py-4 flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
		<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
		<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
		<li><a href="/projekty-domow/" class="hover:text-[#222] transition-colors">Projekty Domów</a></li>
		<?php if ($_smarty_tpl->tpl_vars['categoryLink']->value) {?>
		<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
		<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryLink']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="hover:text-[#222] transition-colors"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['detailCategoryTitle']->value, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['subCategory']->value) {?>
		<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
		<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subCategoryLink']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="hover:text-[#222] transition-colors"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subCategory']->value, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
		<?php }?>
		<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
		<li aria-current="page" class="text-[#6b6b6b]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['name'], ENT_QUOTES, 'UTF-8', true);
if ($_smarty_tpl->tpl_vars['detailIsMirror']->value) {?> <span class="text-[#999]">(lustro)</span><?php }?></li>
	</ol>
</nav>
<?php }
}
