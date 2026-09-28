<?php
/* Smarty version 3.1.48, created on 2026-09-28 23:10:59
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Testimonials.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abad7e3a3c2b0_69096092',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3bb0a3004977b2e02e01c8674c11c881dd717e0d' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Testimonials.tpl',
      1 => 1790610766,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abad7e3a3c2b0_69096092 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="w-full max-w-[1300px] mx-auto px-4 my-16 text-center pt-[60px] pb-[100px]" id="testimonials">
    <p class="text-[#222] text-[40px] leading-[44px] font-bold">
        <span class="align-top mr-2">“</span>
        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( htmlspecialchars($_smarty_tpl->tpl_vars['testimonials']->value['meta']['quote_text'], ENT_QUOTES, 'UTF-8', true) ));?>

        <span class="align-top ml-2">“</span>
    </p>
    <p class="mt-[50px] text-[20px] leading-[24px] text-[#7a7a7a] mb-[0px]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['testimonials']->value['meta']['attribution'], ENT_QUOTES, 'UTF-8', true);?>
</p>
    <h3 class="mt-10 text-[40px] leading-[44px] font-bold text-[#222] text-left -mb-[24px]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['testimonials']->value['meta']['medals_title'], ENT_QUOTES, 'UTF-8', true);?>
</h3>
    <div class="mt-16 flex justify-center">
        <?php if ($_smarty_tpl->tpl_vars['testimonials']->value['medals'][0]['image_url']) {?>
            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['testimonials']->value['medals'][0]['image_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['testimonials']->value['medals'][0]['image_alt'], ENT_QUOTES, 'UTF-8', true);?>
"
                class="w-auto h-[105px] object-contain mx-auto" loading="lazy" />
        <?php }?>
    </div>
</section><?php }
}
