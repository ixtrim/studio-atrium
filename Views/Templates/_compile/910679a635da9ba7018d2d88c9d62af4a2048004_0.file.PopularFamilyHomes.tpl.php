<?php
/* Smarty version 3.1.48, created on 2026-09-29 09:00:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/PopularFamilyHomes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abb61fe7db0d6_92690833',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '910679a635da9ba7018d2d88c9d62af4a2048004' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/PopularFamilyHomes.tpl',
      1 => 1790634662,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abb61fe7db0d6_92690833 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="w-full bg-white pt-4 pb-16" id="popular-family-homes">
    <div class="max-w-[1480px] mx-auto px-4 sm:px-8">
        <h2 class="pfh-title text-[24px] md:text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-6 md:mb-10 pl-2 uppercase"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['popular_family_homes']->value['meta']['section_title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['popular_family_homes']->value['items'], 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['link_url'], ENT_QUOTES, 'UTF-8', true);?>
"
                target="_blank"
                rel="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['item']->value['link_rel'])===null||$tmp==='' ? 'noopener noreferrer' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                title="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['item']->value['link_title'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['label'] : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                class="pfh-card group flex flex-col items-center">
                <div class="relative w-full aspect-square overflow-hidden bg-[#f3f3f3]">
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['image_url']) {?>
                    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['image_url'], ENT_QUOTES, 'UTF-8', true);?>
"
                        alt="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['item']->value['image_alt'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['label'] : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                        loading="lazy"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <?php }?>
                    <span class="pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-60 bg-[#1D99E1]" aria-hidden="true"></span>
                </div>
                <div class="mt-[8px] text-[18px] font-600 text-[#222]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['label'], ENT_QUOTES, 'UTF-8', true);?>
</div>
            </a>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
</section>
<?php }
}
