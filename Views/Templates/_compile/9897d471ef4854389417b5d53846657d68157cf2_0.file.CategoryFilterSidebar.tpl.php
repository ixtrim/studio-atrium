<?php
/* Smarty version 3.1.48, created on 2026-09-07 21:44:43
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/CategoryFilterSidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a9f142b6809a7_44218692',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9897d471ef4854389417b5d53846657d68157cf2' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/CategoryFilterSidebar.tpl',
      1 => 1788810234,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a9f142b6809a7_44218692 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('af', array());
if ((isset($_smarty_tpl->tpl_vars['active_filters']->value)) && $_smarty_tpl->tpl_vars['active_filters']->value) {
$_smarty_tpl->_assignInScope('af', $_smarty_tpl->tpl_vars['active_filters']->value);
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
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="1">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Typ projektu</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron rotate-180" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5]">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="typ_projektu" value="parterowe" data-group="typ_projektu"<?php if ($_smarty_tpl->tpl_vars['af']->value['typ_projektu'] == 'parterowe') {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Parterowy</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="typ_projektu" value="z_poddaszem" data-group="typ_projektu"<?php if ($_smarty_tpl->tpl_vars['af']->value['typ_projektu'] == 'z_poddaszem') {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Z poddaszem</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="typ_projektu" value="pietrowe" data-group="typ_projektu"<?php if ($_smarty_tpl->tpl_vars['af']->value['typ_projektu'] == 'pietrowe') {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Piętrowy</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="typ_projektu" value="z_garazem" data-group="typ_projektu"<?php if ($_smarty_tpl->tpl_vars['af']->value['typ_projektu'] == 'z_garazem') {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Z garażem</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="typ_projektu" value="szkieletowe" data-group="typ_projektu"<?php if ($_smarty_tpl->tpl_vars['af']->value['typ_projektu'] == 'szkieletowe') {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Szkieletowy</span></label>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Typ dachu</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="typdachu" value="dwuspadowy" data-group="typdachu"<?php if ($_smarty_tpl->tpl_vars['af']->value['typdachu'] == 'dwuspadowy') {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Dwuspadowy</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="typdachu" value="wielospadowy" data-group="typdachu"<?php if ($_smarty_tpl->tpl_vars['af']->value['typdachu'] == 'wielospadowy') {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Czterospadowy / wielospadowy</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="typdachu" value="stropodach" data-group="typdachu"<?php if ($_smarty_tpl->tpl_vars['af']->value['typdachu'] == 'stropodach') {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Płaski</span></label>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Powierzchnia</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="pow_bucket" value="0-100" data-group="pow"<?php if ($_smarty_tpl->tpl_vars['af']->value['pow_bucket'] == '0-100') {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">do 100 m²</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="pow_bucket" value="100-150" data-group="pow"<?php if ($_smarty_tpl->tpl_vars['af']->value['pow_bucket'] == '100-150') {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">100–150 m²</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="pow_bucket" value="150-200" data-group="pow"<?php if ($_smarty_tpl->tpl_vars['af']->value['pow_bucket'] == '150-200') {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">150–200 m²</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="pow_bucket" value="200-" data-group="pow"<?php if ($_smarty_tpl->tpl_vars['af']->value['pow_bucket'] == '200-') {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">powyżej 200 m²</span></label>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Szerokość działki (maks.)</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="dzialka_szer" value="18" data-group="dzialka_szer"<?php if ($_smarty_tpl->tpl_vars['af']->value['dzialka_szer'] == '18' || $_smarty_tpl->tpl_vars['af']->value['dzialka_szer'] == 18) {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">wąska (do 18 m)</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="dzialka_szer" value="25" data-group="dzialka_szer"<?php if ($_smarty_tpl->tpl_vars['af']->value['dzialka_szer'] == '25' || $_smarty_tpl->tpl_vars['af']->value['dzialka_szer'] == 25) {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">standardowa (do 25 m)</span></label>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Maks. szerokość elewacji</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="front_szer" value="10" data-group="front_szer"<?php if ($_smarty_tpl->tpl_vars['af']->value['front_szer'] == '10' || $_smarty_tpl->tpl_vars['af']->value['front_szer'] == 10) {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">do 10 m</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="front_szer" value="14" data-group="front_szer"<?php if ($_smarty_tpl->tpl_vars['af']->value['front_szer'] == '14' || $_smarty_tpl->tpl_vars['af']->value['front_szer'] == 14) {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">do 14 m</span></label>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Pomieszczenia</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="iloscpokoinaparterze" value="2" data-group="iloscpokoinaparterze"<?php if ($_smarty_tpl->tpl_vars['af']->value['iloscpokoinaparterze'] == '2' || $_smarty_tpl->tpl_vars['af']->value['iloscpokoinaparterze'] == 2) {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">2 pokoje na parterze</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="iloscpokoinaparterze" value="3" data-group="iloscpokoinaparterze"<?php if ($_smarty_tpl->tpl_vars['af']->value['iloscpokoinaparterze'] == '3' || $_smarty_tpl->tpl_vars['af']->value['iloscpokoinaparterze'] == 3) {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">3 pokoje na parterze</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="iloscpokoinaparterze" value="4" data-group="iloscpokoinaparterze"<?php if ($_smarty_tpl->tpl_vars['af']->value['iloscpokoinaparterze'] == '4' || $_smarty_tpl->tpl_vars['af']->value['iloscpokoinaparterze'] == 4) {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">4 pokoje na parterze</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="spizarnia" value="1"<?php if ($_smarty_tpl->tpl_vars['af']->value['spizarnia']) {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Spiżarnia</span></label>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Wysokość budynku</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="wysokoscbudynku" value="2" data-group="wysokoscbudynku"<?php if ($_smarty_tpl->tpl_vars['af']->value['wysokoscbudynku'] == '2' || $_smarty_tpl->tpl_vars['af']->value['wysokoscbudynku'] == 2) {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">do 7 m</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="wysokoscbudynku" value="4" data-group="wysokoscbudynku"<?php if ($_smarty_tpl->tpl_vars['af']->value['wysokoscbudynku'] == '4' || $_smarty_tpl->tpl_vars['af']->value['wysokoscbudynku'] == 4) {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">7–9 m</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="wysokoscbudynku" value="6" data-group="wysokoscbudynku"<?php if ($_smarty_tpl->tpl_vars['af']->value['wysokoscbudynku'] == '6' || $_smarty_tpl->tpl_vars['af']->value['wysokoscbudynku'] == 6) {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">powyżej 9 m</span></label>
			</div>
		</div>
		<div class="border-b border-black/10 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Kąt nachylenia dachu</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="katnachyleniadachu" value="1" data-group="katnachyleniadachu"<?php if ($_smarty_tpl->tpl_vars['af']->value['katnachyleniadachu'] == '1' || $_smarty_tpl->tpl_vars['af']->value['katnachyleniadachu'] == 1) {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">do 30°</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="katnachyleniadachu" value="2" data-group="katnachyleniadachu"<?php if ($_smarty_tpl->tpl_vars['af']->value['katnachyleniadachu'] == '2' || $_smarty_tpl->tpl_vars['af']->value['katnachyleniadachu'] == 2) {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">30–35°</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="katnachyleniadachu" value="3" data-group="katnachyleniadachu"<?php if ($_smarty_tpl->tpl_vars['af']->value['katnachyleniadachu'] == '3' || $_smarty_tpl->tpl_vars['af']->value['katnachyleniadachu'] == 3) {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">35–40°</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="katnachyleniadachu" value="5" data-group="katnachyleniadachu"<?php if ($_smarty_tpl->tpl_vars['af']->value['katnachyleniadachu'] == '5' || $_smarty_tpl->tpl_vars['af']->value['katnachyleniadachu'] == 5) {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">powyżej 45°</span></label>
			</div>
		</div>
		<div class="border-b border-black/10 last:border-b-0 bg-white cat-filter-group" data-open="0">
			<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]"><span>Rodzaj stropu</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button>
			<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5] hidden">
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="rodzajstropu" value="drewniany_belkowy" data-group="rodzajstropu"<?php if ($_smarty_tpl->tpl_vars['af']->value['rodzajstropu'] == 'drewniany_belkowy') {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Drewniany</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="rodzajstropu" value="plyta_zelbetowa" data-group="rodzajstropu"<?php if ($_smarty_tpl->tpl_vars['af']->value['rodzajstropu'] == 'plyta_zelbetowa') {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Żelbetowy</span></label>
				<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 hover:bg-black/5 cursor-pointer"><input type="checkbox" class="js-cat-filter sr-only peer" name="rodzajstropu" value="gestozebrowy" data-group="rodzajstropu"<?php if ($_smarty_tpl->tpl_vars['af']->value['rodzajstropu'] == 'gestozebrowy') {?> checked<?php }?>><span class="w-4 h-4 border border-[#bbb] bg-white flex-shrink-0 peer-checked:bg-[var(--brand-red)] peer-checked:border-[var(--brand-red)]"></span><span class="text-[#333]">Gęstożebrowy / Teriva</span></label>
			</div>
		</div>
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
