<?php
/* Smarty version 3.1.48, created on 2026-09-07 21:44:43
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Ajax/CategoryFilterResults.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a9f142b1a9d58_56250077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b80b293464e927bcb68952702333e2343febde31' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Ajax/CategoryFilterResults.tpl',
      1 => 1788810036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Project/displayBox.tpl' => 1,
  ),
),false)) {
function content_6a9f142b1a9d58_56250077 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="cat-grid-and-pager">
<?php if ($_smarty_tpl->tpl_vars['listCards']->value) {?>
	<?php $_smarty_tpl->_subTemplateRender("file:Project/displayBox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('url'=>$_smarty_tpl->tpl_vars['pagerUrl']->value,'query'=>$_smarty_tpl->tpl_vars['query']->value), 0, false);
} else { ?>
	<div id="project-list" class="bg-[#f7f7f7] px-8 py-16 text-center">
		<p class="text-[18px] font-bold text-[#222] mb-3">Niestety nic dla Ciebie nie znaleźliśmy</p>
		<p class="text-[14px] text-[#555]">Zmień kryteria lub przejdź do <a href="/projekty/" class="text-[var(--brand-blue-strong)] hover:underline">wszystkich projektów domów</a></p>
	</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['pages']->value > 1) {?>
	<div id="cat-pager" class="flex items-center justify-center gap-4 mt-10 text-[14px] text-[#222]" data-page="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" data-pages="<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
">
		<?php if ($_smarty_tpl->tpl_vars['page']->value > 1) {?>
			<?php if ($_smarty_tpl->tpl_vars['page']->value > 2) {?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['pagerUrl']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value-1;
echo $_smarty_tpl->tpl_vars['query']->value;?>
" data-page="<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
" aria-label="poprzednia" class="cat-pager-link hover:text-[var(--brand-red)]">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m15 18-6-6 6-6"></path></svg>
			</a>
			<?php } else { ?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['query']->value;?>
" data-page="1" aria-label="poprzednia" class="cat-pager-link hover:text-[var(--brand-red)]">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m15 18-6-6 6-6"></path></svg>
			</a>
			<?php }?>
		<?php } else { ?>
		<span class="opacity-50" aria-hidden="true">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m15 18-6-6 6-6"></path></svg>
		</span>
		<?php }?>
		<span class="border border-[#bbb] px-3 py-1 bg-white"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</span>
		<span>z <?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
</span>
		<?php if ($_smarty_tpl->tpl_vars['page']->value < $_smarty_tpl->tpl_vars['pages']->value) {?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['pagerUrl']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value+1;
echo $_smarty_tpl->tpl_vars['query']->value;?>
" data-page="<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
" aria-label="następna" class="cat-pager-link hover:text-[var(--brand-red)]">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m9 18 6-6-6-6"></path></svg>
		</a>
		<?php } else { ?>
		<span class="opacity-50" aria-hidden="true">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m9 18 6-6-6-6"></path></svg>
		</span>
		<?php }?>
	</div>
<?php } else { ?>
	<div id="cat-pager" class="hidden" data-page="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" data-pages="<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>
"></div>
<?php }?>
</div>
<?php }
}
