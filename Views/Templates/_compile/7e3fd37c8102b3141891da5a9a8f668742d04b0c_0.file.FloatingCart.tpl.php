<?php
/* Smarty version 3.1.48, created on 2026-09-03 14:46:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/FloatingCart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a996c16592c78_10068844',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e3fd37c8102b3141891da5a9a8f668742d04b0c' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/FloatingCart.tpl',
      1 => 1788439309,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a996c16592c78_10068844 (Smarty_Internal_Template $_smarty_tpl) {
?><aside id="proj-floating-cart" class="hidden lg:block fixed right-16 top-1/2 -translate-y-1/2 z-40 w-[240px] bg-white border border-[#e5e5e5] shadow-[0_12px_40px_-16px_rgba(0,0,0,0.35)] opacity-0 pointer-events-none transition-opacity duration-300" aria-hidden="true">
	<div class="px-4 pt-4 pb-3 border-b border-[#eee]">
		<div class="text-[11px] uppercase tracking-wider text-[#888] font-semibold">Projekt</div>
		<div class="mt-1 text-[16px] font-black text-[#222] leading-tight"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</div>
	</div>
	<div class="px-4 py-4">
		<?php if ($_smarty_tpl->tpl_vars['detailThumb']->value) {?>
		<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['detailThumb']->value, ENT_QUOTES, 'UTF-8', true);?>
" alt="" class="w-full aspect-[4/3] object-cover mb-3" loading="lazy">
		<?php }?>
		<div class="text-[22px] font-black text-[var(--brand-red)] tabular-nums"><?php echo number_format($_smarty_tpl->tpl_vars['detailPrice']->value,0,',',' ');?>
 PLN</div>
		<?php if (!call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isWithdrawn' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectParams']->value )) && !call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'inBasket' ][ 0 ], array( $_smarty_tpl->tpl_vars['project']->value,$_smarty_tpl->tpl_vars['request']->value['version'] ))) {?>
		<button type="button" id="proj-float-cart-btn"
			class="mt-3 w-full bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white h-11 text-[11px] font-black tracking-[0.14em] uppercase transition">
			Do koszyka
		</button>
		<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'inBasket' ][ 0 ], array( $_smarty_tpl->tpl_vars['project']->value,$_smarty_tpl->tpl_vars['request']->value['version'] ))) {?>
		<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'order','action'=>'cart'),$_smarty_tpl ) );?>
" class="mt-3 w-full bg-[#1b2025] text-white h-11 text-[11px] font-black tracking-[0.14em] uppercase flex items-center justify-center">W koszyku</a>
		<?php }?>
	</div>
</aside>
<?php }
}
