<?php
/* Smarty version 3.1.48, created on 2026-09-23 13:49:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/HousePlansWithInteriorDesign.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6ab3bcbab04f52_64804911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95ba8bff5047d9e9aaaf56800693256d5b604b6a' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/HousePlansWithInteriorDesign.tpl',
      1 => 1788812642,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6ab3bcbab04f52_64804911 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="w-full bg-[#f3f3f3] py-16" id="interior-plans">
    <div class="max-w-[1480px] mx-auto px-8">
        <h2 class="ip-title text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-10 pl-2 uppercase"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['interior_plans']->value['meta']['section_title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
        <div class="relative">
            <button type="button" aria-label="Poprzedni" id="hp-ip-prev"
                class="hidden lg:flex absolute -left-10 top-[40%] -translate-y-1/2 z-10 w-8 h-8 items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-black hover:text-[#179fd4] cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-left w-7 h-7" aria-hidden="true">
                    <path d="m15 18-6-6 6-6"></path>
                </svg>
            </button>
            <button type="button" aria-label="Następny" id="hp-ip-next"
                class="hidden lg:flex absolute -right-10 top-[40%] -translate-y-1/2 z-10 w-8 h-8 items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 shadow-none text-black hover:text-[#179fd4] cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-right w-7 h-7" aria-hidden="true">
                    <path d="m9 18 6-6-6-6"></path>
                                    </svg>
            </button>
            <div class="swiper [&_.swiper-wrapper]:items-stretch" id="hp-ip-swiper">
                <div class="swiper-wrapper">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['interior_plans']->value['items'], 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                    <div class="swiper-slide !h-auto">
                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="bg-white overflow-hidden h-full flex flex-col group">
                            <div class="relative overflow-hidden">
                                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['image_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="w-full h-[280px] object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['tag']) {?>
                                <span class="absolute top-3 left-3 text-[11px] font-bold tracking-wider bg-white/90 text-[var(--brand-red)] px-2.5 py-1"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['tag'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                <?php }?>
                            </div>
                            <div class="px-5 pt-4 pb-5 flex flex-col gap-3 flex-1">
                                <h3 class="text-[22px] font-bold text-[#222] leading-tight"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h3>
                                <div class="text-[13px] font-bold tracking-wider text-[var(--brand-red)]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['type_label'], ENT_QUOTES, 'UTF-8', true);?>
</div>
                                <div class="flex items-center gap-4 py-2 text-[13px] text-[#222]">
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['area']) {?>
                                    <div class="flex items-center gap-2"><span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-vector-square" aria-hidden="true"><path d="M17.055 4.533a24 24 0 00-10.11 0"/><path d="M19.467 17.055a24 24 0 000-10.11"/><path d="M4.533 6.945a24 24 0 000 10.11"/><path d="M6.945 19.467a24 24 0 0010.11 0"/><circle cx="19" cy="19" r="2"/><circle cx="19" cy="5" r="2"/><circle cx="5" cy="19" r="2"/><circle cx="5" cy="5" r="2"/></svg></span><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['area'], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['rooms'] != '') {?>
                                    <div class="flex items-center gap-1.5"><span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 4v16"></path><path d="M2 8h18a2 2 0 0 1 2 2v10"></path><path d="M2 17h20"></path><path d="M6 8v9"></path></svg></span><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['rooms'], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['baths'] > 0) {?>
                                    <div class="flex items-center gap-1.5"><span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 4 8 6"></path><path d="M17 19v2"></path><path d="M2 12h20"></path><path d="M7 19v2"></path><path d="M9 5 7.621 3.621A2.121 2.121 0 0 0 4 5v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"></path></svg></span><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['baths'], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['garage'] > 0) {?>
                                    <div class="flex items-center gap-1.5"><span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path><circle cx="7" cy="17" r="2"></circle><path d="M9 17h6"></path><circle cx="17" cy="17" r="2"></circle></svg></span><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['garage'], ENT_QUOTES, 'UTF-8', true);?>
</span></div>
                                    <?php }?>
                                </div>
                                <div class="pt-1 mt-auto">
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['price_old']) {?>
                                    <div class="text-[16px] text-[var(--brand-red)] line-through"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['price_old'], ENT_QUOTES, 'UTF-8', true);?>
 PLN</div>
                                    <?php }?>
                                    <div class="flex items-baseline gap-2"><span class="text-[34px] font-['Montserrat',sans-serif] font-semibold text-[var(--brand-blue-strong)] leading-none"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['price'], ENT_QUOTES, 'UTF-8', true);?>
</span><span class="text-[16px] text-[var(--brand-blue-strong)] font-semibold">PLN</span></div>
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
<?php echo '<script'; ?>
>
(function () {
    function initIpSwiper() {
        if (typeof Swiper === 'undefined') {
            setTimeout(initIpSwiper, 50);
            return;
        }
        var el = document.getElementById('hp-ip-swiper');
        if (!el || el.swiper) return;
        new Swiper(el, {
            loop: true,
            slidesPerView: 1.15,
            spaceBetween: 16,
            navigation: {
                prevEl: '#hp-ip-prev',
                nextEl: '#hp-ip-next'
            },
            breakpoints: {
                640: { slidesPerView: 2, spaceBetween: 16 },
                1024: { slidesPerView: 3, spaceBetween: 20 },
                1280: { slidesPerView: 4, spaceBetween: 24 }
            }
        });
    }
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initIpSwiper);
    } else {
        initIpSwiper();
    }
})();
<?php echo '</script'; ?>
>
<?php }
}
