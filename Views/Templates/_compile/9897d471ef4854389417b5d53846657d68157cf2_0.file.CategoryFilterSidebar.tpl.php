<?php
/* Smarty version 3.1.48, created on 2026-09-23 17:01:47
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/CategoryFilterSidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6ab3e9db2799f2_68924535',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9897d471ef4854389417b5d53846657d68157cf2' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/CategoryFilterSidebar.tpl',
      1 => 1790175628,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6ab3e9db2799f2_68924535 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('af', array());
if ((isset($_smarty_tpl->tpl_vars['active_filters']->value)) && $_smarty_tpl->tpl_vars['active_filters']->value) {
$_smarty_tpl->_assignInScope('af', $_smarty_tpl->tpl_vars['active_filters']->value);
}
if (!(isset($_smarty_tpl->tpl_vars['filter_groups']->value)) || !$_smarty_tpl->tpl_vars['filter_groups']->value) {
$_smarty_tpl->_assignInScope('filter_groups', array());
}?>
<div class="bg-[#ececec] text-[#222] overflow-hidden border border-[#e0e0e0]" id="cat-filter-sidebar">
	<div class="px-4 pt-4 pb-3 border-b border-black/10 bg-white">
		<div class="text-[14px] font-bold mb-2">Znajdź idealny projekt</div>
		<div class="text-[11px] text-[#666] mb-1.5">Wpisz nazwę projektu</div>
		<form method="get" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'search'),$_smarty_tpl ) );?>
" class="flex overflow-hidden border border-[#d5d5d5]">
			<input type="text" name="query" placeholder="np. Aurora"
				class="flex-1 px-2.5 py-2 text-[12px] text-[#222] placeholder:text-[#888] bg-white outline-none min-w-0">
			<button type="submit" aria-label="Wyszukaj"
				class="bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] transition-colors text-white w-10 self-stretch grid place-items-center leading-none p-0 border-0">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 block" aria-hidden="true"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
			</button>
		</form>
		<div class="flex flex-wrap gap-1.5 mt-3 text-[11px]">
			<a href="/projekty-domow/"
				class="px-2 py-1 transition-colors<?php if ($_smarty_tpl->tpl_vars['category']->value['link'] == 'projekty-domow' || $_smarty_tpl->tpl_vars['category']->value['id'] == 1) {?> bg-[var(--brand-red)] text-white font-bold<?php } else { ?> border border-[#ccc] text-[#444] hover:border-[#888]<?php }?>">Wszystkie projekty</a>
			<a href="/projekty-domow/parterowe/"
				class="px-2 py-1 transition-colors<?php if ($_smarty_tpl->tpl_vars['category']->value['id'] == 5) {?> bg-[var(--brand-red)] text-white font-bold<?php } else { ?> border border-[#ccc] text-[#444] hover:border-[#888]<?php }?>">Parterowe</a>
			<a href="/projekty-domow/z-poddaszem-uzytkowym/"
				class="px-2 py-1 transition-colors<?php if ($_smarty_tpl->tpl_vars['category']->value['id'] == 6) {?> bg-[var(--brand-red)] text-white font-bold<?php } else { ?> border border-[#ccc] text-[#444] hover:border-[#888]<?php }?>">Z poddaszem</a>
		</div>
	</div>

	<form id="cat-filter-form" method="get" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" class="contents">
	<div class="flex items-center justify-between px-4 py-3 border-b border-black/10 bg-[#e4e4e4]">
		<div class="flex items-center gap-2 text-[13px] font-bold tracking-wide text-[#222]">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4" aria-hidden="true"><line x1="21" x2="14" y1="4" y2="4"></line><line x1="10" x2="3" y1="4" y2="4"></line><line x1="21" x2="12" y1="12" y2="12"></line><line x1="8" x2="3" y1="12" y2="12"></line><line x1="21" x2="16" y1="20" y2="20"></line><line x1="12" x2="3" y1="20" y2="20"></line><line x1="14" x2="14" y1="2" y2="6"></line><line x1="8" x2="8" y1="10" y2="14"></line><line x1="16" x2="16" y1="18" y2="22"></line></svg>
			FILTRUJ PROJEKTY
		</div>
		<button type="button" id="cat-clear-filters" class="text-[11px] text-[#666] hover:text-[var(--brand-red)] bg-transparent border-0 p-0 cursor-pointer<?php if (!$_smarty_tpl->tpl_vars['af']->value) {?> hidden<?php }?>">Wyczyść</button>
	</div>

	<div class="cat-filter-groups">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['filter_groups']->value, 'group');
$_smarty_tpl->tpl_vars['group']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->do_else = false;
?>
			<?php $_smarty_tpl->_assignInScope('groupHasActive', false);?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group']->value['options'], 'opt');
$_smarty_tpl->tpl_vars['opt']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['opt']->value) {
$_smarty_tpl->tpl_vars['opt']->do_else = false;
?>
				<?php if ((isset($_smarty_tpl->tpl_vars['af']->value[$_smarty_tpl->tpl_vars['opt']->value['name']])) && in_array($_smarty_tpl->tpl_vars['opt']->value['value'],(array)$_smarty_tpl->tpl_vars['af']->value[$_smarty_tpl->tpl_vars['opt']->value['name']])) {
$_smarty_tpl->_assignInScope('groupHasActive', true);
}?>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<?php $_smarty_tpl->_assignInScope('isOpen', $_smarty_tpl->tpl_vars['group']->value['open'] || $_smarty_tpl->tpl_vars['groupHasActive']->value);?>
			<div class="border-b border-black/10 last:border-b-0 bg-white cat-filter-group" data-open="<?php if ($_smarty_tpl->tpl_vars['isOpen']->value) {?>1<?php } else { ?>0<?php }?>">
				<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]">
					<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</span>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron<?php if ($_smarty_tpl->tpl_vars['isOpen']->value) {?> rotate-180<?php }?>" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg>
				</button>
				<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5]<?php if (!$_smarty_tpl->tpl_vars['isOpen']->value) {?> hidden<?php }?>">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group']->value['options'], 'opt');
$_smarty_tpl->tpl_vars['opt']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['opt']->value) {
$_smarty_tpl->tpl_vars['opt']->do_else = false;
?>
						<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 cursor-pointer">
							<input type="checkbox" class="js-cat-filter sr-only" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['opt']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['opt']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
"<?php if ((isset($_smarty_tpl->tpl_vars['af']->value[$_smarty_tpl->tpl_vars['opt']->value['name']])) && in_array($_smarty_tpl->tpl_vars['opt']->value['value'],(array)$_smarty_tpl->tpl_vars['af']->value[$_smarty_tpl->tpl_vars['opt']->value['name']])) {?> checked<?php }?>>
							<span class="cat-check" aria-hidden="true"></span>
							<span class="cat-filter-label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['opt']->value['label'], ENT_QUOTES, 'UTF-8', true);?>
</span>
							<span class="cat-filter-count" aria-hidden="true">(0)</span>
						</label>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div>
			</div>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</div>
	<noscript>
		<div class="px-4 py-3 bg-white border-t border-black/10">
			<button type="submit" class="w-full bg-[var(--brand-red)] text-white text-[12px] font-bold py-2">Zastosuj filtry</button>
		</div>
	</noscript>
	</form>
</div>
<?php echo '<script'; ?>
>
(function () {
	var root = document.getElementById('cat-filter-sidebar');
	if (!root) return;
	root.querySelectorAll('.cat-filter-toggle').forEach(function (btn) {
		btn.addEventListener('click', function () {
			var group = btn.closest('.cat-filter-group');
			var opts = group.querySelector('.cat-filter-options');
			var chev = group.querySelector('.cat-filter-chevron');
			var open = group.getAttribute('data-open') === '1';
			group.setAttribute('data-open', open ? '0' : '1');
			if (opts) opts.classList.toggle('hidden', open);
			if (chev) chev.classList.toggle('rotate-180', !open);
		});
	});
})();
<?php echo '</script'; ?>
>
<?php }
}
