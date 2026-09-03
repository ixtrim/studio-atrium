<?php
/* Smarty version 3.1.48, created on 2026-09-03 14:46:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Faq.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a996c165e4de8_87230287',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1f2236d4c40c3ca42ae6d14d41f3b3615180ca4' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Faq.tpl',
      1 => 1788439522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a996c165e4de8_87230287 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="faq" class="bg-[#f5f6f7] py-14 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<div class="text-center mb-10">
			<div class="text-[12px] font-bold uppercase tracking-[0.2em] text-[var(--brand-red)] mb-2">FAQ</div>
			<h2 class="text-[28px] md:text-[34px] font-bold text-[#1b2025]">Najczęściej zadawane pytania</h2>
		</div>
		<div class="space-y-3 max-w-4xl mx-auto" id="proj-faq-accordion">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['detailFaq']->value, 'item');
$_smarty_tpl->tpl_vars['item']->index = -1;
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['item']->index++;
$_smarty_tpl->tpl_vars['item']->first = !$_smarty_tpl->tpl_vars['item']->index;
$__foreach_item_27_saved = $_smarty_tpl->tpl_vars['item'];
?>
			<div class="proj-faq-item bg-white border border-[#e5e5e5] transition-all duration-300<?php if ($_smarty_tpl->tpl_vars['item']->first) {?> border-[var(--brand-red)] shadow-sm<?php }?>" data-open="<?php if ($_smarty_tpl->tpl_vars['item']->first) {?>1<?php } else { ?>0<?php }?>">
				<button type="button" class="proj-faq-toggle w-full flex items-center gap-4 px-5 py-4 text-left">
					<span class="flex-1 text-[15px] md:text-[16px] font-semibold text-[#1b2025]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['q'], ENT_QUOTES, 'UTF-8', true);?>
</span>
					<span class="proj-faq-icon w-8 h-8 rounded-full border border-[#ddd] flex items-center justify-center text-[#666] shrink-0 text-[18px] font-light leading-none">
						<?php if ($_smarty_tpl->tpl_vars['item']->first) {?>−<?php } else { ?>+<?php }?>
					</span>
				</button>
				<div class="proj-faq-body overflow-hidden transition-all duration-400<?php if (!$_smarty_tpl->tpl_vars['item']->first) {?> max-h-0 opacity-0<?php } else { ?> max-h-[800px] opacity-100<?php }?>">
					<div class="px-5 pb-5 text-[14px] leading-relaxed text-[#555]"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['a'], ENT_QUOTES, 'UTF-8', true) ));?>
</div>
				</div>
			</div>
			<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_27_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	</div>
</section>
<?php }
}
