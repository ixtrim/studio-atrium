<?php
/* Smarty version 3.1.48, created on 2026-09-23 13:49:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/OurBestsellers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6ab3bcbaaef8f1_51540807',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60b6b95cd24a849f2261386ffc0a6bc7ac5b6fa4' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/OurBestsellers.tpl',
      1 => 1788807609,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Include/ProjectTeaserCard.tpl' => 1,
  ),
),false)) {
function content_6ab3bcbaaef8f1_51540807 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="w-full bg-white py-16" id="our-bestsellers">
    <div class="max-w-[1480px] mx-auto px-8">
        <h2 class="bs-title text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-10 pl-2 uppercase">
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['bestsellers_meta']->value['section_title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
        <div class="relative">
            <button type="button" aria-label="Poprzedni" id="hp-bs-prev"
                class="hidden lg:flex absolute -left-10 top-[40%] -translate-y-1/2 z-10 w-8 h-8 items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-black hover:text-[#179fd4] cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-left w-7 h-7" aria-hidden="true">
                    <path d="m15 18-6-6 6-6"></path>
                </svg>
            </button>
            <button type="button" aria-label="Następny" id="hp-bs-next"
                class="hidden lg:flex absolute -right-10 top-[40%] -translate-y-1/2 z-10 w-8 h-8 items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-black hover:text-[#179fd4] cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-right w-7 h-7" aria-hidden="true">
                    <path d="m9 18 6-6-6-6"></path>
                                    </svg>
            </button>
            <div class="swiper [&_.swiper-wrapper]:items-stretch" id="hp-bs-swiper">
                <div class="swiper-wrapper">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bestsellers']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                        <div class="swiper-slide !h-auto">
                            <?php $_smarty_tpl->_subTemplateRender("file:Include/ProjectTeaserCard.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('item'=>$_smarty_tpl->tpl_vars['item']->value,'teaser_interactive'=>false), 0, true);
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
    (function() {
        function initBsSwiper() {
            if (typeof Swiper === 'undefined') {
                setTimeout(initBsSwiper, 50);
                return;
            }
            var el = document.getElementById('hp-bs-swiper');
            if (!el || el.swiper) return;
            new Swiper(el, {
                loop: true,
                slidesPerView: 1.15,
                spaceBetween: 16,
                navigation: {
                    prevEl: '#hp-bs-prev',
                    nextEl: '#hp-bs-next'
                },
                breakpoints: {
                    640: { slidesPerView: 2, spaceBetween: 16 },
                    1024: { slidesPerView: 3, spaceBetween: 24 }
                }
            });
        }
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initBsSwiper);
        } else {
            initBsSwiper();
        }
    })();
<?php echo '</script'; ?>
>
<?php }
}
