<?php
/* Smarty version 3.1.48, created on 2026-09-23 13:49:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/PopularCategories.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6ab3bcbaaf6748_15784230',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14ef0ee710285f6e209f0c1206a1420ad0bb0bd2' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/PopularCategories.tpl',
      1 => 1788597536,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6ab3bcbaaf6748_15784230 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="w-full bg-white py-16" id="popular-categories">
    <div class="max-w-[1480px] mx-auto px-8">
        <h2 class="pcg-title text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-10 pl-2 uppercase"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['popular_categories_meta']->value['section_title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['popular_categories']->value, 'item');
$_smarty_tpl->tpl_vars['item']->index = -1;
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['item']->index++;
$_smarty_tpl->tpl_vars['item']->first = !$_smarty_tpl->tpl_vars['item']->index;
$__foreach_item_4_saved = $_smarty_tpl->tpl_vars['item'];
?>
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['link_url'], ENT_QUOTES, 'UTF-8', true);?>
"
                target="_blank"
                rel="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['item']->value['link_rel'])===null||$tmp==='' ? 'noopener noreferrer' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                title="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['item']->value['link_title'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['label'] : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                class="pcg-card group flex flex-col items-center">
                <div class="relative w-full aspect-square overflow-hidden bg-[#f3f3f3]">
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['image_url']) {?>
                    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['image_url'], ENT_QUOTES, 'UTF-8', true);?>
"
                        alt="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['item']->value['image_alt'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['label'] : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                        loading="lazy"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <?php }?>
                    <span class="pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-300 group-hover:opacity-60 <?php if ($_smarty_tpl->tpl_vars['item']->first) {?>bg-[#009D45]<?php } else { ?>bg-[#1D99E1]<?php }?>" aria-hidden="true"></span>
                </div>
                <div class="mt-[8px] text-[18px] font-600 text-[#222]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['label'], ENT_QUOTES, 'UTF-8', true);?>
</div>
            </a>
            <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_4_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
</section>
<?php }
}
