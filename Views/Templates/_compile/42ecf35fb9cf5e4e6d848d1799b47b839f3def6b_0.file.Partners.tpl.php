<?php
/* Smarty version 3.1.48, created on 2026-09-03 14:46:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Partners.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a996c165d8f62_29213775',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42ecf35fb9cf5e4e6d848d1799b47b839f3def6b' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Partners.tpl',
      1 => 1788088773,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a996c165d8f62_29213775 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="bg-white py-16 overflow-hidden">
    <div class="max-w-[1280px] mx-auto px-12">
        <h2 class="text-[28px] font-bold text-[var(--brand-darker)] mb-12"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['partners']->value['meta']['section_title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
    </div>
    <div class="relative w-full overflow-hidden">
        <div class="flex gap-20 animate-[marquee_30s_linear_infinite] w-max">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['partners']->value['marquee'], 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['link_url'], ENT_QUOTES, 'UTF-8', true);?>
"
                target="_blank"
                rel="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['item']->value['link_rel'])===null||$tmp==='' ? 'noopener noreferrer' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                title="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['item']->value['link_title'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['name'] : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                class="shrink-0 flex items-center justify-center h-20 px-4">
                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['logo_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="max-h-16 w-auto object-contain" loading="lazy">
            </a>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
</section>
<?php }
}
