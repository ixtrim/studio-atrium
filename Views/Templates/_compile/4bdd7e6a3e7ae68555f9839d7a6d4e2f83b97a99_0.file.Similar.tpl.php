<?php
/* Smarty version 3.1.48, created on 2026-09-03 14:46:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Similar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a996c165b9d15_47846614',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bdd7e6a3e7ae68555f9839d7a6d4e2f83b97a99' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Similar.tpl',
      1 => 1788439370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a996c165b9d15_47846614 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['detailSimilar']->value) {?>
<section id="podobne" class="w-full bg-white py-16 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<h2 class="text-[34px] font-bold text-[#222] mb-10 pl-2">Projekty podobne</h2>
		<div class="relative">
			<button type="button" aria-label="Poprzedni" id="proj-sim-prev"
				class="hidden lg:flex absolute -left-10 top-[40%] -translate-y-1/2 z-10 w-8 h-8 items-center justify-center bg-transparent border-0 p-0 text-[#7a7a7a] hover:text-[var(--brand-darker)] cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="width:28px;height:28px" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
			</button>
			<button type="button" aria-label="Następny" id="proj-sim-next"
				class="hidden lg:flex absolute -right-10 top-[40%] -translate-y-1/2 z-10 w-8 h-8 items-center justify-center bg-transparent border-0 p-0 text-[#7a7a7a] hover:text-[var(--brand-darker)] cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="width:28px;height:28px" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
			</button>
			<div class="swiper [&_.swiper-wrapper]:items-stretch" id="proj-sim-swiper">
				<div class="swiper-wrapper">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['detailSimilar']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
					<div class="swiper-slide !h-auto">
						<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" class="bg-white overflow-hidden h-full flex flex-col group border border-[#f5f5f5]">
							<div class="relative overflow-hidden">
								<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['image_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="w-full h-[280px] object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy"
									onerror="this.onerror=null;this.src='https://media.studioatrium.pl/project/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/render-box.jpg';">
								<?php if ($_smarty_tpl->tpl_vars['item']->value['badge_label']) {?>
								<span class="absolute top-3 left-3 text-[11px] font-bold tracking-wider <?php if ($_smarty_tpl->tpl_vars['item']->value['badge_variant'] == 'discount') {?>bg-[var(--brand-red)] text-white<?php } else { ?>bg-white/90 text-[var(--brand-red)]<?php }?> px-2.5 py-1"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['badge_label'], ENT_QUOTES, 'UTF-8', true);?>
</span>
								<?php }?>
							</div>
							<div class="px-5 pt-4 pb-5 flex flex-col gap-3 flex-1">
								<h3 class="text-[22px] font-bold text-[#222] leading-tight"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h3>
								<div class="text-[13px] font-bold tracking-wider text-[var(--brand-red)]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['type_label'], ENT_QUOTES, 'UTF-8', true);?>
</div>
								<div class="pt-1 mt-auto">
									<?php if ($_smarty_tpl->tpl_vars['item']->value['price_old']) {?><div class="text-[16px] text-[var(--brand-red)] line-through"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price_old'],0,',',' ');?>
 PLN</div><?php }?>
									<div class="flex items-baseline gap-2">
										<span class="text-[34px] font-bold text-[var(--brand-blue-strong)] leading-none"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],0,',',' ');?>
</span>
										<span class="text-[16px] text-[var(--brand-blue-strong)] font-semibold">PLN</span>
									</div>
								</div>
							</div>
						</a>
					</div>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php }
}
}
