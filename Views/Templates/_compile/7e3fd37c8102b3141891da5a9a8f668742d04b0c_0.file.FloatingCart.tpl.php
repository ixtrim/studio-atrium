<?php
/* Smarty version 3.1.48, created on 2026-10-01 21:46:04
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/FloatingCart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abeb87c5a5075_51489862',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e3fd37c8102b3141891da5a9a8f668742d04b0c' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/FloatingCart.tpl',
      1 => 1790765117,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abeb87c5a5075_51489862 (Smarty_Internal_Template $_smarty_tpl) {
?><aside id="proj-floating-cart"
	class="hidden lg:flex fixed right-5 z-50 flex-col items-end gap-3 opacity-0 pointer-events-none transition-opacity duration-300"
	aria-hidden="true">
	<div id="proj-float-cart-panel"
		class="proj-float-cart-panel w-[280px] bg-white border border-[rgb(229,229,229)]"
		aria-hidden="true">
		<div class="px-4 pt-4 pb-3 border-b border-[rgb(238,238,238)] flex items-start justify-between gap-3">
			<div class="min-w-0">
				<div class="text-[11px] uppercase tracking-wider text-[rgb(136,136,136)] font-semibold">Projekt</div>
				<div class="mt-1 text-[16px] font-black text-[rgb(34,34,34)] leading-tight"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</div>
			</div>
			<button type="button" id="proj-float-cart-close" class="shrink-0 text-[22px] leading-none text-[rgb(136,136,136)] hover:text-[rgb(34,34,34)] border-0 bg-transparent cursor-pointer p-0" aria-label="Zamknij">&times;</button>
		</div>
		<div class="px-4 py-4">
			<?php if ($_smarty_tpl->tpl_vars['detailThumb']->value) {?>
			<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['detailThumb']->value, ENT_QUOTES, 'UTF-8', true);?>
" alt="" class="w-full aspect-[4/3] object-cover mb-3" loading="lazy">
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['detailPriceOld']->value) {?>
			<div class="project-detail-price-old text-[13px] font-medium text-black leading-none mb-1 tabular-nums">
				<s><?php echo number_format($_smarty_tpl->tpl_vars['detailPriceOld']->value,0,',',' ');?>
 PLN</s>
			</div>
			<?php }?>
			<div class="text-[22px] font-black text-[var(--brand-red)] tabular-nums"><?php echo number_format($_smarty_tpl->tpl_vars['detailPrice']->value,0,',',' ');?>
 PLN</div>
			<?php if (!call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isWithdrawn' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectParams']->value )) && !call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'inBasket' ][ 0 ], array( $_smarty_tpl->tpl_vars['project']->value,$_smarty_tpl->tpl_vars['request']->value['version'] ))) {?>
			<button type="button" id="proj-float-cart-btn"
				class="mt-3 w-full bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white h-11 text-[11px] font-black tracking-[0.14em] uppercase transition border-0 cursor-pointer">
				Do koszyka
			</button>
			<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'inBasket' ][ 0 ], array( $_smarty_tpl->tpl_vars['project']->value,$_smarty_tpl->tpl_vars['request']->value['version'] ))) {?>
			<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'order','action'=>'cart'),$_smarty_tpl ) );?>
" class="mt-3 w-full bg-[rgb(27,32,37)] text-white h-11 text-[11px] font-black tracking-[0.14em] uppercase flex items-center justify-center">W koszyku</a>
			<?php }?>
		</div>
	</div>

	<button type="button" id="proj-float-cart-toggle"
		class="proj-float-cart-toggle"
		aria-label="Otwórz koszyk"
		aria-expanded="false"
		aria-controls="proj-float-cart-panel">
		<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
			<circle cx="8" cy="21" r="1"/>
			<circle cx="19" cy="21" r="1"/>
			<path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/>
		</svg>
	</button>
</aside>
<?php }
}
