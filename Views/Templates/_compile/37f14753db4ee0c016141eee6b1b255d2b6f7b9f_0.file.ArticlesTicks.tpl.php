<?php
/* Smarty version 3.1.48, created on 2026-08-24 11:04:25
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/ArticlesTicks.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a8c0919a40ec5_38051819',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37f14753db4ee0c016141eee6b1b255d2b6f7b9f' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/ArticlesTicks.tpl',
      1 => 1787561872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a8c0919a40ec5_38051819 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="py-16 bg-white" id="articles-ticks">
    <div class="max-w-[1280px] mx-auto px-12 space-y-5">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles_ticks']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
        <div class="flex flex-wrap items-baseline gap-4">
            <h3 class="text-[22px] font-bold text-[var(--brand-darker)]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h3>
            <p class="text-[15px] text-[var(--brand-darker)]/80"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['teaser'], ENT_QUOTES, 'UTF-8', true);?>
 -
                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['link_url'], ENT_QUOTES, 'UTF-8', true);?>
" class="text-[var(--brand-blue-strong)] hover:underline"><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['item']->value['link_label'])===null||$tmp==='' ? 'Czytaj dalej...' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</a>
            </p>
        </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
</section>
<?php }
}
