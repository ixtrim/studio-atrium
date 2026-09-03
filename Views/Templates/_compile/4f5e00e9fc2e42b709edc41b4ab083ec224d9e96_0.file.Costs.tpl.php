<?php
/* Smarty version 3.1.48, created on 2026-09-03 14:46:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Costs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a996c165c5f37_14157568',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f5e00e9fc2e42b709edc41b4ab083ec224d9e96' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Costs.tpl',
      1 => 1788439384,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a996c165c5f37_14157568 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['detailCostStages']->value) {?>
<section id="koszty" class="bg-[#f5f6f7] py-16 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<div class="mb-10">
			<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Kosztorys</span>
			<h2 class="mt-3 text-[34px] md:text-[42px] leading-tight text-[#222] font-bold tracking-tight">Koszty budowy</h2>
			<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
		</div>
		<div class="bg-white p-6 md:p-7 border border-[#e6e8eb] max-w-4xl">
			<h3 class="text-[13px] uppercase tracking-[0.2em] text-[#6b7177] font-semibold mb-5">Stan budynku</h3>
			<div class="space-y-3" id="proj-cost-accordion">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['detailCostStages']->value, 'stage');
$_smarty_tpl->tpl_vars['stage']->iteration = 0;
$_smarty_tpl->tpl_vars['stage']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['stage']->value) {
$_smarty_tpl->tpl_vars['stage']->do_else = false;
$_smarty_tpl->tpl_vars['stage']->iteration++;
$__foreach_stage_20_saved = $_smarty_tpl->tpl_vars['stage'];
?>
				<div class="proj-cost-item group bg-white border border-[#e6e8eb] hover:border-[#cfd3d8] transition-all duration-300" data-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stage']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">
					<button type="button" class="proj-cost-toggle w-full flex items-center gap-4 px-5 py-4 text-left">
						<span class="text-[#222] text-[15px] font-medium"><?php echo $_smarty_tpl->tpl_vars['stage']->iteration;?>
. <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stage']->value['label'], ENT_QUOTES, 'UTF-8', true);?>
</span>
						<span class="ml-auto text-[#222] text-[15px] font-semibold whitespace-nowrap"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stage']->value['cost'], ENT_QUOTES, 'UTF-8', true);?>
</span>
						<span class="proj-cost-chevron flex h-7 w-7 items-center justify-center border border-[#cfd3d8] text-[#6b7177] shrink-0 transition-all">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
						</span>
					</button>
					<div class="proj-cost-body grid grid-rows-[0fr] opacity-0 transition-all duration-500 ease-out">
						<div class="overflow-hidden">
							<div class="px-5 pb-5 pt-3 text-[14px] leading-relaxed text-[#555] border-t border-[#eee]">
								<p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stage']->value['details'], ENT_QUOTES, 'UTF-8', true);?>
</p>
							</div>
						</div>
					</div>
				</div>
				<?php
$_smarty_tpl->tpl_vars['stage'] = $__foreach_stage_20_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<?php if ($_smarty_tpl->tpl_vars['detailCostTotal']->value) {?>
				<div class="mt-5 flex items-center justify-between bg-[#ececec] text-[#222] px-5 py-4">
					<span class="text-[13px] uppercase tracking-[0.2em] font-semibold">Razem</span>
					<span class="text-[18px] font-bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['detailCostTotal']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
				</div>
				<?php }?>
			</div>
			<?php if (!$_smarty_tpl->tpl_vars['noestimate']->value && $_smarty_tpl->tpl_vars['project']->value['type'] != 'skeleton') {?>
			<button type="button" class="filesDloadTrigger mt-6 text-[12px] font-bold uppercase tracking-wider text-[var(--brand-blue-strong)] hover:text-[var(--brand-red)]">
				Pobierz kosztorys →
			</button>
			<?php }?>
		</div>
	</div>
</section>
<?php }
}
}
