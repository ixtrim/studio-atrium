<?php
/* Smarty version 3.1.48, created on 2026-09-23 13:49:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/HeroSlider.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6ab3bcbaae70d4_06506177',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0226bc815806cd9ff9db3ee4d8bfd9e6da7b74ff' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/HeroSlider.tpl',
      1 => 1788594897,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6ab3bcbaae70d4_06506177 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="relative" id="hero-slider">
    <div class="relative">
        <div class="swiper" id="hp-hero-swiper">
            <div class="swiper-wrapper">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hero_slides']->value, 'slide');
$_smarty_tpl->tpl_vars['slide']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['slide']->value) {
$_smarty_tpl->tpl_vars['slide']->do_else = false;
?>
                    <div class="swiper-slide">
                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['link_url'], ENT_QUOTES, 'UTF-8', true);?>
" class="block relative h-[480px] bg-cover bg-center"
                            style="background-image:url(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['image_url'], ENT_QUOTES, 'UTF-8', true);?>
)">
                            <div class="max-w-[1480px] mx-auto px-8 h-full flex items-center">
                                <div class="bg-black/35 backdrop-blur-[2px] text-white px-[64px] py-[32px] max-w-[640px]">
                                    <h1 class="text-[42px] md:text-[54px] font-medium leading-[1.05]">
                                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h1>
                                    <?php if ($_smarty_tpl->tpl_vars['slide']->value['subtitle']) {?><div class="text-[36px] leading-[36px] font-500">
                                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['subtitle'], ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['slide']->value['badge']) {?><div class="text-[24px] font-medium my-[12px] uppercase">
                                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['badge'], ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['slide']->value['body']) {?><p
                                            class="text-[20px] leading-[24px] font-normal mt-0">
                                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['body'], ENT_QUOTES, 'UTF-8', true);?>
</p><?php }?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>
        <button type="button" aria-label="Poprzednie" id="hp-hero-prev"
            class="hp-hero-arrow absolute left-4 top-1/2 -translate-y-1/2 z-10 flex items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 cursor-pointer transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-chevron-left" style="width:32px;height:32px;max-width:32px;max-height:32px"
                aria-hidden="true">
                <path d="m15 18-6-6 6-6" />
            </svg>
        </button>
        <button type="button" aria-label="Następne" id="hp-hero-next"
            class="hp-hero-arrow absolute right-4 top-1/2 -translate-y-1/2 z-10 flex items-center justify-center bg-transparent border-0 outline-none appearance-none p-0 cursor-pointer transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-chevron-right" style="width:32px;height:32px;max-width:32px;max-height:32px"
                aria-hidden="true">
                <path d="m9 18 6-6-6-6" />
            </svg>
        </button>
    </div>
</section>

<section class="bg-[#3a3d42] py-6" id="safety-experience">
    <div class="max-w-[1480px] mx-auto px-8">
        <div class="text-center mb-4">
            <h2 class="text-white text-[36px] font-400 tracking-tight uppercase">
                <?php if ($_smarty_tpl->tpl_vars['safety']->value['title_left']) {?><span class="text-[#1ba0e2]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['safety']->value['title_left'], ENT_QUOTES, 'UTF-8', true);?>
 </span><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['safety']->value['title_bold']) {?><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['safety']->value['title_bold'], ENT_QUOTES, 'UTF-8', true);?>
 </span><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['safety']->value['title_right']) {?><span class="text-[#1ba0e2]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['safety']->value['title_right'], ENT_QUOTES, 'UTF-8', true);?>
</span><?php }?>
            </h2>
            <?php if ($_smarty_tpl->tpl_vars['safety']->value['subtitle']) {?>
                <p class="text-white text-[18px] leading-[24px] font-medium tracking-[0.12em]">
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['safety']->value['subtitle'], ENT_QUOTES, 'UTF-8', true);?>
</p>
            <?php }?>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mt-[24px]">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['safety_items']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <div class="flex items-center gap-3">
                    <div class="text-white text-[36px] md:text-[44px] font-bold leading-none"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['item_number'], ENT_QUOTES, 'UTF-8', true);?>

                    </div>
                    <div class="text-white text-[16px] leading-snug whitespace-pre-line"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['item_text'], ENT_QUOTES, 'UTF-8', true);?>
</div>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
</section>
<?php echo '<script'; ?>
>
    (function() {
        function initHeroSwiper() {
            if (typeof Swiper === 'undefined') {
                setTimeout(initHeroSwiper, 50);
                return;
            }
            var el = document.getElementById('hp-hero-swiper');
            if (!el || el.swiper) return;
            new Swiper(el, {
                loop: true,
                speed: 700,
                autoplay: { delay: 5500, disableOnInteraction: false },
                navigation: {
                    prevEl: '#hp-hero-prev',
                    nextEl: '#hp-hero-next'
                }
            });
        }
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initHeroSwiper);
        } else {
            initHeroSwiper();
        }
    })();
<?php echo '</script'; ?>
><?php }
}
