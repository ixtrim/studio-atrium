<?php
/* Smarty version 3.1.48, created on 2026-08-24 20:01:23
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Categories.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a8c86f346aef8_65407182',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '49c7153296d266fde95b388f76667137ec9f7abf' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Categories.tpl',
      1 => 1787592394,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a8c86f346aef8_65407182 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="relative bg-[#ececec] py-12" id="categories">
    <div class="max-w-[1480px] mx-auto px-8">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-[32px] font-black text-[var(--brand-darker)] tracking-tight"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categories_meta']->value['section_title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categories_meta']->value['see_all_url'], ENT_QUOTES, 'UTF-8', true);?>
"
                class="flex items-center gap-2 text-[15px] text-[#7a7a7a] hover:text-[var(--brand-darker)]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categories_meta']->value['see_all_label'], ENT_QUOTES, 'UTF-8', true);?>
<span
                    class="w-7 h-7 rounded-full border border-black/15 flex items-center justify-center"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-chevron-down w-4 h-4" aria-hidden="true">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg></span></a>
        </div>
        <div class="relative">
            <div class="swiper" id="hp-cat-swiper">
                <div class="swiper-wrapper">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                    <div class="swiper-slide"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['link_url'], ENT_QUOTES, 'UTF-8', true);?>
" class="group block">
                            <div class="aspect-square overflow-hidden"><img
                                    src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['image_url'], ENT_QUOTES, 'UTF-8', true);?>
"
                                    alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['title_line2'], ENT_QUOTES, 'UTF-8', true);?>
"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            </div>
                            <div class="text-center mt-4">
                                <div class="text-[13px] text-[#7a7a7a] leading-tight"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['title_line1'], ENT_QUOTES, 'UTF-8', true);?>
</div>
                                <div class="text-[17px] font-black text-[var(--brand-darker)] leading-tight mt-0.5"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['title_line2'], ENT_QUOTES, 'UTF-8', true);?>
</div>
                            </div>
                        </a></div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
            <button type="button" aria-label="Poprzednie" id="hp-cat-prev"
                class="hidden lg:flex absolute -left-10 top-[40%] -translate-y-1/2 w-8 h-8 items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-[#7a7a7a] hover:text-[var(--brand-darker)] z-10 cursor-pointer"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-left w-7 h-7" aria-hidden="true">
                    <path d="m15 18-6-6 6-6"></path>
                </svg></button>
            <button type="button" aria-label="Następne" id="hp-cat-next"
                class="hidden lg:flex absolute -right-10 top-[40%] -translate-y-1/2 w-8 h-8 items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-[#7a7a7a] hover:text-[var(--brand-darker)] z-10 cursor-pointer"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-right w-7 h-7" aria-hidden="true">
                    <path d="m9 18 6-6-6-6"></path>
                </svg></button>
        </div>
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categories_meta']->value['cta_url'], ENT_QUOTES, 'UTF-8', true);?>
"
            class="absolute left-1/2 bottom-0 translate-x-[-50%] translate-y-1/2 inline-flex items-center justify-center bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white font-black px-12 py-4 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[14px] uppercase tracking-[0.1em] z-10"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categories_meta']->value['cta_label'], ENT_QUOTES, 'UTF-8', true);?>
</a>
    </div>
</section>
<?php echo '<script'; ?>
>
(function () {
    function initCatSwiper() {
        if (typeof Swiper === 'undefined') {
            setTimeout(initCatSwiper, 50);
            return;
        }
        var el = document.getElementById('hp-cat-swiper');
        if (!el || el.swiper) return;
        new Swiper(el, {
            loop: true,
            slidesPerView: 2.2,
            spaceBetween: 16,
            navigation: {
                prevEl: '#hp-cat-prev',
                nextEl: '#hp-cat-next'
            },
            breakpoints: {
                768: { slidesPerView: 3.5, spaceBetween: 20 },
                1024: { slidesPerView: 5, spaceBetween: 24 },
                1280: { slidesPerView: 6, spaceBetween: 24 }
            }
        });
    }
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCatSwiper);
    } else {
        initCatSwiper();
    }
})();
<?php echo '</script'; ?>
>
<?php }
}
