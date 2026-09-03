<?php
/* Smarty version 3.1.48, created on 2026-09-03 14:46:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/AnchorBar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a996c165797d3_11762995',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0781ca43c9e6963182129ec9d704a668157bb37' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/AnchorBar.tpl',
      1 => 1788439236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a996c165797d3_11762995 (Smarty_Internal_Template $_smarty_tpl) {
?><nav id="proj-anchor-bar" class="sticky z-30 bg-white border-b border-[#e5e5e5]" aria-label="Sekcje projektu" style="top:0">
	<div class="max-w-[1480px] mx-auto px-8 h-12 flex items-center gap-6">
		<div class="shrink-0 text-[13px] font-black tracking-wide text-[#222] uppercase truncate max-w-[220px]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</div>
		<div class="flex-1 min-w-0 overflow-x-auto">
			<ul class="flex items-center gap-1" id="proj-anchor-links">
				<li><a href="#wizualizacje" data-section="wizualizacje" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[var(--brand-red)]">Wizualizacje</a></li>
				<?php if ($_smarty_tpl->tpl_vars['detailFloors']->value) {?><li><a href="#rzuty" data-section="rzuty" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[#666] hover:text-[#222]">Rzuty</a></li><?php }?>
				<li><a href="#dane-techniczne" data-section="dane-techniczne" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[#666] hover:text-[#222]">Dane tech.</a></li>
				<li><a href="#opis" data-section="opis" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[#666] hover:text-[#222]">Opis</a></li>
				<?php if ($_smarty_tpl->tpl_vars['detailSimilar']->value) {?><li><a href="#podobne" data-section="podobne" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[#666] hover:text-[#222]">Podobne</a></li><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['detailCostStages']->value) {?><li><a href="#koszty" data-section="koszty" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[#666] hover:text-[#222]">Koszty</a></li><?php }?>
				<li><a href="#informacje" data-section="informacje" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[#666] hover:text-[#222]">Informacje</a></li>
				<li><a href="#realizacje" data-section="realizacje" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[#666] hover:text-[#222]">Realizacje</a></li>
				<li><a href="#faq" data-section="faq" class="proj-anchor-link block px-3 py-2 text-[12px] font-bold uppercase tracking-wider whitespace-nowrap text-[#666] hover:text-[#222]">FAQ</a></li>
			</ul>
		</div>
	</div>
</nav>
<?php }
}
