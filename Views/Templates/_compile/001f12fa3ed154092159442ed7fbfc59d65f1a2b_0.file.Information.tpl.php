<?php
/* Smarty version 3.1.48, created on 2026-09-03 14:46:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Information.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a996c165cc2c3_73603186',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '001f12fa3ed154092159442ed7fbfc59d65f1a2b' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Information.tpl',
      1 => 1788439400,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a996c165cc2c3_73603186 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="informacje" class="bg-white py-14 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<div class="mb-8">
			<h2 class="text-[22px] md:text-[26px] font-bold uppercase tracking-wide text-[#222]">Informacje o projekcie <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
			<div class="w-12 h-[3px] bg-[var(--brand-red)] mt-2"></div>
		</div>
		<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
			<div class="bg-[#ececec] p-6">
				<h3 class="text-[13px] font-bold uppercase tracking-[0.16em] text-[#222] mb-4">Kategorie</h3>
				<div class="flex flex-wrap gap-2">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['detailCategoryChips']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
					<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" class="text-[13px] px-3 py-1.5 bg-white border border-[#e0e0e0] text-[#333] hover:border-[var(--brand-blue)] hover:text-[var(--brand-blue-strong)] transition-colors"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div>
			</div>
			<div class="bg-[#ececec] p-6">
				<h3 class="text-[13px] font-bold uppercase tracking-[0.16em] text-[#222] mb-4">Cechy projektu</h3>
				<div class="flex flex-wrap gap-2">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['detailFeatureTags']->value, 't');
$_smarty_tpl->tpl_vars['t']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->do_else = false;
?>
					<span class="text-[11px] font-bold tracking-wider uppercase px-3 py-1.5 bg-white border border-[#e0e0e0] text-[#222]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['t']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php if ($_smarty_tpl->tpl_vars['features']->value) {?>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['features']->value, '_item');
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
?>
						<span class="text-[11px] font-bold tracking-wider uppercase px-3 py-1.5 bg-white border border-[#e0e0e0] text-[#222]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
</span>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php }?>
				</div>
			</div>
			<div class="bg-[#ececec] p-6 flex flex-col">
				<h3 class="text-[13px] font-bold uppercase tracking-[0.16em] text-[#222] mb-4">Dodatki w cenie</h3>
				<ul class="space-y-3 mb-6">
					<li class="flex items-start gap-3 text-[14px] text-[#333]">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[var(--brand-red)] shrink-0 mt-0.5" style="width:20px;height:20px" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
						schemat centralnego odkurzacza
					</li>
					<li class="flex items-start gap-3 text-[14px] text-[#333]">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-[var(--brand-red)] shrink-0 mt-0.5" style="width:20px;height:20px" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
						projekt instalacji fotowoltaicznej
					</li>
				</ul>
				<div class="grid grid-cols-2 gap-3 mt-auto">
					<button type="button" class="filesDloadTrigger bg-white border border-[#d9dde0] text-[#222] text-[12px] font-bold uppercase tracking-wider py-3 px-3 hover:bg-[var(--brand-blue)] hover:text-white hover:border-[var(--brand-blue)] transition-colors">Pliki do pobrania</button>
					<a href="/dokumenty/Zmiany-w-projekcie.html" class="bg-white border border-[#d9dde0] text-[#222] text-[12px] font-bold uppercase tracking-wider py-3 px-3 hover:bg-[var(--brand-red)] hover:text-white hover:border-[var(--brand-red)] transition-colors text-center">Zmiany w projekcie</a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php }
}
