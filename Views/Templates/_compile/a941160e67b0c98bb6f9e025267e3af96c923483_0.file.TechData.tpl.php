<?php
/* Smarty version 3.1.48, created on 2026-09-03 14:46:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/TechData.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a996c165b0611_55566287',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a941160e67b0c98bb6f9e025267e3af96c923483' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/TechData.tpl',
      1 => 1788439333,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a996c165b0611_55566287 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="dane-techniczne" class="bg-white pt-16 pb-4 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<div class="mb-10">
			<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Specyfikacja</span>
			<h2 class="mt-3 text-[34px] md:text-[42px] leading-tight text-[#1b2025] font-bold tracking-tight">Dane techniczne</h2>
			<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
		</div>
		<div class="grid lg:grid-cols-2 gap-6">
			<div class="bg-white border border-[#e6e8eb]">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['detailTechLeft']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
				<div class="group flex items-baseline gap-2 px-4 py-2.5 border-b border-[#eee] last:border-b-0 hover:bg-[#fafbfc] transition-colors">
					<span class="text-[14px] text-[#333] shrink-0"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['k'], ENT_QUOTES, 'UTF-8', true);?>
</span>
					<span class="flex-1 border-b border-dotted border-[#ccc] relative -top-[3px] min-w-[24px]"></span>
					<span class="text-[14px] font-semibold text-[#222] tabular-nums whitespace-nowrap"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['v'], ENT_QUOTES, 'UTF-8', true);?>
</span>
					<?php if ($_smarty_tpl->tpl_vars['row']->value['info']) {?><span class="param-info flex h-4 w-4 items-center justify-center bg-[#cfd3d8] text-white text-[10px] font-semibold group-hover:bg-[var(--brand-blue)] transition-colors cursor-help" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"></span><?php }?>
				</div>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
			<div class="bg-white border border-[#e6e8eb]">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['detailTechRight']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
				<div class="group flex items-baseline gap-2 px-4 py-2.5 border-b border-[#eee] last:border-b-0 hover:bg-[#fafbfc] transition-colors">
					<span class="text-[14px] text-[#333] shrink-0"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['k'], ENT_QUOTES, 'UTF-8', true);?>
</span>
					<span class="flex-1 border-b border-dotted border-[#ccc] relative -top-[3px] min-w-[24px]"></span>
					<span class="text-[14px] font-semibold text-[#222] tabular-nums whitespace-nowrap"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['v'], ENT_QUOTES, 'UTF-8', true);?>
</span>
					<?php if ($_smarty_tpl->tpl_vars['row']->value['info']) {?><span class="param-info flex h-4 w-4 items-center justify-center bg-[#cfd3d8] text-white text-[10px] font-semibold group-hover:bg-[var(--brand-blue)] transition-colors cursor-help" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"></span><?php }?>
				</div>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
		</div>
	</div>
</section>
<?php }
}
