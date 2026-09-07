<?php
/* Smarty version 3.1.48, created on 2026-09-07 21:44:43
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/LastViewed.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a9f142b688f05_67266148',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f032a2e9dea904cac76f0cda506d1207c137df9c' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/LastViewed.tpl',
      1 => 1788766753,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Include/ProjectTeaserCard.tpl' => 1,
  ),
),false)) {
function content_6a9f142b688f05_67266148 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['last_viewed']->value) {
$_smarty_tpl->_assignInScope('_lvItems', $_smarty_tpl->tpl_vars['last_viewed']->value);
} elseif ($_smarty_tpl->tpl_vars['bestsellers']->value) {
$_smarty_tpl->_assignInScope('_lvItems', $_smarty_tpl->tpl_vars['bestsellers']->value);
} else {
$_smarty_tpl->_assignInScope('_lvItems', null);
}
if ($_smarty_tpl->tpl_vars['_lvItems']->value) {?>
<section id="ostatnio" class="w-full bg-white py-16 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<h2 class="text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-10 pl-2 uppercase">Ostatnio oglądane</h2>
		<div class="relative">
			<button type="button" aria-label="Poprzedni" id="cat-lv-prev"
				class="hidden lg:flex absolute -left-10 top-[40%] -translate-y-1/2 z-10 w-8 h-8 items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-black hover:text-[#179fd4] cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
					stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
					class="lucide lucide-chevron-left w-7 h-7" aria-hidden="true">
					<path d="m15 18-6-6 6-6"></path>
				</svg>
			</button>
			<button type="button" aria-label="Następny" id="cat-lv-next"
				class="hidden lg:flex absolute -right-10 top-[40%] -translate-y-1/2 z-10 w-8 h-8 items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-black hover:text-[#179fd4] cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
					stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
					class="lucide lucide-chevron-right w-7 h-7" aria-hidden="true">
					<path d="m9 18 6-6-6-6"></path>
				</svg>
			</button>
			<div class="swiper [&_.swiper-wrapper]:items-stretch" id="cat-lv-swiper">
				<div class="swiper-wrapper">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_lvItems']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
					<div class="swiper-slide !h-auto">
						<?php $_smarty_tpl->_subTemplateRender("file:Include/ProjectTeaserCard.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('item'=>$_smarty_tpl->tpl_vars['item']->value,'teaser_interactive'=>true), 0, true);
?>
					</div>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php echo '<script'; ?>
>
(function () {
	function initLvSwiper() {
		if (typeof Swiper === 'undefined') {
			setTimeout(initLvSwiper, 50);
			return;
		}
		var el = document.getElementById('cat-lv-swiper');
		if (!el || el.swiper) return;
		new Swiper(el, {
			loop: true,
			slidesPerView: 1.15,
			spaceBetween: 16,
			navigation: {
				prevEl: '#cat-lv-prev',
				nextEl: '#cat-lv-next'
			},
			breakpoints: {
				640: { slidesPerView: 2, spaceBetween: 16 },
				1024: { slidesPerView: 3, spaceBetween: 24 }
			}
		});
	}
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initLvSwiper);
	} else {
		initLvSwiper();
	}
})();
<?php echo '</script'; ?>
>
<?php }
}
}
