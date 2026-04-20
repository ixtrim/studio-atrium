<?php
/* Smarty version 3.1.48, created on 2026-08-24 15:29:37
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Offer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a8c4741537654_30857388',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7b26a01d30ebd046ed1805624110d032f7e4e37' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Offer.tpl',
      1 => 1787578156,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a8c4741537654_30857388 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="bg-[#3a3a3a] text-white py-20" id="offer">
    <div class="max-w-[1280px] mx-auto px-12 grid md:grid-cols-2 gap-16 items-start">
        <div>
            <h2 class="text-[26px] font-bold tracking-wide uppercase mb-10"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
            <p class="text-[15px] font-bold uppercase leading-relaxed mb-8 max-w-md"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['lead_text'], ENT_QUOTES, 'UTF-8', true) ));?>
</p>
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['button_url'], ENT_QUOTES, 'UTF-8', true);?>
" class="inline-block bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white font-bold px-8 py-3 text-[13px] uppercase tracking-wider mb-12"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['button_label'], ENT_QUOTES, 'UTF-8', true);?>
</a>
            <blockquote class="text-center text-[22px] leading-snug max-w-xl mx-auto px-4"
                style="font-style:normal;font-weight:500"><span>“<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['quote_text'], ENT_QUOTES, 'UTF-8', true);?>
”</span><?php if ($_smarty_tpl->tpl_vars['offer']->value['quote_badge']) {?><span class="ml-2 text-[#ff66cc] text-[13px] font-bold align-middle"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['quote_badge'], ENT_QUOTES, 'UTF-8', true);?>
</span><?php }?>
            </blockquote>
            <div class="text-center text-sm mt-4"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['quote_author'], ENT_QUOTES, 'UTF-8', true);?>
</div>
            <div class="flex justify-center items-center gap-3 mt-4">
                <?php if ($_smarty_tpl->tpl_vars['offer']->value['logo1_url']) {?><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['logo1_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['logo1_alt'], ENT_QUOTES, 'UTF-8', true);?>
" class="w-12 h-10 object-contain bg-white rounded-none p-1"><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['offer']->value['logo2_url']) {?><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['logo2_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['logo2_alt'], ENT_QUOTES, 'UTF-8', true);?>
" class="w-12 h-10 object-contain bg-white rounded-none p-1"><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['offer']->value['logo3_url']) {?><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['logo3_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['logo3_alt'], ENT_QUOTES, 'UTF-8', true);?>
" class="w-12 h-10 object-contain bg-white rounded-none p-1"><?php }?>
            </div>
        </div>
        <div class="flex flex-col items-center">
            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['image_url'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['image_alt'], ENT_QUOTES, 'UTF-8', true);?>
" class="w-full max-w-md aspect-square object-cover">
            <div class="mt-4 text-[15px] font-bold uppercase tracking-wide"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['offer']->value['image_caption'], ENT_QUOTES, 'UTF-8', true);?>
</div>
        </div>
    </div>
</section>
<?php }
}
