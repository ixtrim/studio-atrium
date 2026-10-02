<?php
/* Smarty version 3.1.48, created on 2026-10-01 21:43:04
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Partners.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abeb7c8e19922_14826232',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42ecf35fb9cf5e4e6d848d1799b47b839f3def6b' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Partners.tpl',
      1 => 1790673278,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abeb7c8e19922_14826232 (Smarty_Internal_Template $_smarty_tpl) {
if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['partners']->value['marquee'] ))) {?>
<section class="bg-white <?php if ($_smarty_tpl->tpl_vars['section_py']->value) {
echo $_smarty_tpl->tpl_vars['section_py']->value;
} else { ?>pt-10 md:pt-16 pb-12 md:pb-[90px]<?php }?> overflow-hidden">
    <div class="max-w-[1480px] mx-auto <?php if ($_smarty_tpl->tpl_vars['section_px']->value) {
echo $_smarty_tpl->tpl_vars['section_px']->value;
} else { ?>px-4 sm:px-8 md:px-12<?php }?>">
        <h2 class="text-[24px] md:text-[36px] font-400 text-[var(--brand-darker)] tracking-tight <?php if ($_smarty_tpl->tpl_vars['section_py']->value) {?>mb-10<?php } else { ?>mb-12<?php }?> uppercase"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['partners']->value['meta']['section_title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
    </div>
    <div class="relative w-full overflow-hidden">
        <div class="flex gap-10 sm:gap-20 animate-[marquee_90s_linear_infinite] w-max">
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
}
