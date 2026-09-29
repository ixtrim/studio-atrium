<?php
/* Smarty version 3.1.48, created on 2026-09-29 09:00:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Tips.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abb61fe84ac14_64951981',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e9a2174d48e945c261a5d29068ba123a2dfb5e2' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Tips.tpl',
      1 => 1790634695,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abb61fe84ac14_64951981 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="pt-12 md:pt-[85px] pb-16 md:pb-[175px] bg-white" id="tips">
    <div class="max-w-[1480px] mx-auto px-4 sm:px-8 md:px-12">
        <h2 class="text-[24px] md:text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-10 md:mb-[80px] uppercase">
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['porady']->value['section_title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
        <div class="grid md:grid-cols-2 gap-x-8 lg:gap-x-[150px] gap-y-9">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tips']->value, 'item', false, NULL, 'tips', array (
  'index' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_tips']->value['index']++;
?>
                <div
                    class="flex flex-col sm:flex-row gap-4 sm:gap-[50px] items-center<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_tips']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tips']->value['index'] : null) < 2) {?> md:pb-10 md:border-b border-black/10<?php }?>">
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['article_url'] && $_smarty_tpl->tpl_vars['item']->value['article_url'] != '#') {?>
                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['article_url'], ENT_QUOTES, 'UTF-8', true);?>
"
                            class="group relative block w-full max-w-[180px] aspect-square sm:w-[180px] sm:h-[180px] overflow-hidden shrink-0 bg-[#f3f3f3]">
                            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['image_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['image_alt'], ENT_QUOTES, 'UTF-8', true);?>
"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
                                loading="lazy">
                            <span
                                class="pointer-events-none absolute inset-0 bg-[#1D99E1] opacity-0 transition-opacity duration-300 group-hover:opacity-60 z-[1]"
                                aria-hidden="true"></span>
                        </a>
                    <?php } else { ?>
                        <div class="relative w-full max-w-[180px] aspect-square sm:w-[180px] sm:h-[180px] overflow-hidden shrink-0 bg-[#f3f3f3]">
                            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['image_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['image_alt'], ENT_QUOTES, 'UTF-8', true);?>
"
                                class="absolute inset-0 w-full h-full object-cover" loading="lazy">
                        </div>
                    <?php }?>
                    <div>
                        <h3 class="text-[24px] leading-[28px] font-semibold text-[var(--brand-darker)] leading-snug mb-4">
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['article_url'] && $_smarty_tpl->tpl_vars['item']->value['article_url'] != '#') {?>
                                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['article_url'], ENT_QUOTES, 'UTF-8', true);?>
" class="hover:underline"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                            <?php } else { ?>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['title'], ENT_QUOTES, 'UTF-8', true);?>

                            <?php }?>
                        </h3>
                        <div class="flex items-center gap-3 text-[18px] text-[var(--brand-blue-strong)]">
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['tag1_label']) {?>
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['tag1_url'] && $_smarty_tpl->tpl_vars['item']->value['tag1_url'] != '#') {?>
                                    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['tag1_url'], ENT_QUOTES, 'UTF-8', true);?>
" class="hover:underline"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['tag1_label'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                                <?php } else { ?>
                                    <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['tag1_label'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                <?php }?>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['tag1_label'] && $_smarty_tpl->tpl_vars['item']->value['tag2_label']) {?>
                                <span class="text-black/30">|</span>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['tag2_label']) {?>
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['tag2_url'] && $_smarty_tpl->tpl_vars['item']->value['tag2_url'] != '#') {?>
                                    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['tag2_url'], ENT_QUOTES, 'UTF-8', true);?>
" class="hover:underline"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['tag2_label'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                                <?php } else { ?>
                                    <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['tag2_label'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                <?php }?>
                            <?php }?>
                        </div>
                    </div>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <div class="flex justify-center mt-6">
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['porady']->value['button_url'], ENT_QUOTES, 'UTF-8', true);?>
"
                class="inline-flex items-center justify-center bg-[var(--brand-blue-strong)] hover:bg-[var(--brand-blue)] text-white font-bold px-12 py-4 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[13px] uppercase tracking-wider"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['porady']->value['button_label'], ENT_QUOTES, 'UTF-8', true);?>
</a>
        </div>
    </div>
</section><?php }
}
