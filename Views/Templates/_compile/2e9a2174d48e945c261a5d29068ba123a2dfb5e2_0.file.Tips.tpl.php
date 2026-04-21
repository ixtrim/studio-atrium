<?php
/* Smarty version 3.1.48, created on 2026-08-24 16:06:26
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Tips.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a8c4fe26a7f77_41925113',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e9a2174d48e945c261a5d29068ba123a2dfb5e2' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Tips.tpl',
      1 => 1787580242,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a8c4fe26a7f77_41925113 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="py-20 bg-white" id="tips">
    <div class="max-w-[1280px] mx-auto px-12">
        <h2 class="text-[28px] font-bold text-[var(--brand-darker)] mb-12"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['porady']->value['section_title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
        <div class="grid md:grid-cols-2 gap-x-16 gap-y-10">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tips']->value, 'item', false, NULL, 'tips', array (
  'index' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_tips']->value['index']++;
?>
            <div class="flex gap-6 items-start<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_tips']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_tips']->value['index'] : null) < 2) {?> md:pb-10 md:border-b border-black/10<?php }?>">
                <?php if ($_smarty_tpl->tpl_vars['item']->value['article_url']) {?>
                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['article_url'], ENT_QUOTES, 'UTF-8', true);?>
" class="block w-[160px] h-[160px] overflow-hidden shrink-0 group">
                    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['image_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['image_alt'], ENT_QUOTES, 'UTF-8', true);?>
" class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-[1.2]">
                </a>
                <?php } else { ?>
                <div class="w-[160px] h-[160px] overflow-hidden shrink-0">
                    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['image_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['image_alt'], ENT_QUOTES, 'UTF-8', true);?>
" class="w-full h-full object-cover">
                </div>
                <?php }?>
                <div class="pt-1">
                    <h3 class="text-[16px] font-bold text-[var(--brand-darker)] leading-snug mb-4">
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['article_url']) {?>
                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['article_url'], ENT_QUOTES, 'UTF-8', true);?>
" class="hover:underline"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                        <?php } else { ?>
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['title'], ENT_QUOTES, 'UTF-8', true);?>

                        <?php }?>
                    </h3>
                    <div class="flex items-center gap-3 text-[14px] text-[var(--brand-blue-strong)]">
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['tag1_label']) {?>
                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['tag1_url'], ENT_QUOTES, 'UTF-8', true);?>
" class="hover:underline"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['tag1_label'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['tag1_label'] && $_smarty_tpl->tpl_vars['item']->value['tag2_label']) {?>
                        <span class="text-black/30">|</span>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['tag2_label']) {?>
                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['tag2_url'], ENT_QUOTES, 'UTF-8', true);?>
" class="hover:underline"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['tag2_label'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                        <?php }?>
                    </div>
                </div>
            </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <div class="flex justify-center mt-12">
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['porady']->value['button_url'], ENT_QUOTES, 'UTF-8', true);?>
" class="bg-[var(--brand-blue-strong)] hover:bg-[var(--brand-blue)] text-white font-bold px-12 py-4 text-[13px] uppercase tracking-wider"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['porady']->value['button_label'], ENT_QUOTES, 'UTF-8', true);?>
</a>
        </div>
    </div>
</section>
<?php }
}
