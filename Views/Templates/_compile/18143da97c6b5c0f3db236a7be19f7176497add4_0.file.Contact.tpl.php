<?php
/* Smarty version 3.1.48, created on 2026-09-03 14:46:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Contact.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a996c165e1444_88473824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18143da97c6b5c0f3db236a7be19f7176497add4' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Contact.tpl',
      1 => 1788114863,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a996c165e1444_88473824 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="w-full my-10">
    <div class="grid grid-cols-1 md:grid-cols-12 overflow-hidden">
        <div class="md:col-span-5 bg-[#1ea7e1] text-white px-10 py-10 relative">
            <div class="flex items-start gap-4">
                <h3 class="text-[22px] font-bold tracking-wide pt-3"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['call_title'], ENT_QUOTES, 'UTF-8', true);?>
</h3>
                <?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['hostess_image_url']) {?>
                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['hostess_image_url'], ENT_QUOTES, 'UTF-8', true);?>
"
                    alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['hostess_image_alt'], ENT_QUOTES, 'UTF-8', true);?>
"
                    class="w-[70px] h-[70px] object-cover ml-auto ring-4 ring-white/30" loading="lazy">
                <?php }?>
            </div>
            <div class="mt-4 space-y-1 font-bold leading-tight" style="font-size:44px">
                <?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['phone1']) {?><div><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['phone1'], ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['phone2']) {?><div><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['phone2'], ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
            </div>
            <div class="mt-8 text-[18px]">
                <?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['hours_label']) {?><div class="font-bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['hours_label'], ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['hours_text']) {?><div class="mt-3"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['hours_text'], ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
            </div>
        </div>
        <div class="md:col-span-4 bg-[#f3f3f3] px-10 py-10">
            <h3 class="text-[28px] font-bold text-[#222] mb-5"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['question_title'], ENT_QUOTES, 'UTF-8', true);?>
</h3>
            <p class="text-[18px] leading-[24px] text-[#333]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['question_body'], ENT_QUOTES, 'UTF-8', true);?>
</p>
        </div>
        <div class="md:col-span-3 bg-[#f3f3f3] px-6 py-10">
            <form class="space-y-3"><input type="email" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['email_placeholder'], ENT_QUOTES, 'UTF-8', true);?>
"
                    class="w-full bg-white px-4 py-3 text-[16px] text-[#333] placeholder:text-[#888] outline-none border-0"><textarea
                    placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['message_placeholder'], ENT_QUOTES, 'UTF-8', true);?>
" rows="4"
                    class="w-full bg-white px-4 py-3 text-[16px] text-[#333] placeholder:text-[#888] outline-none border-0 resize-none"></textarea><label
                    class="flex items-start gap-2 text-[11px] text-[#666] leading-snug pt-1"><input type="checkbox"
                        class="mt-0.5 w-3 h-3 accent-[#1ea7e1]"><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['consent_text'], ENT_QUOTES, 'UTF-8', true);?>

                        <?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['privacy_url']) {?>
                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['privacy_url'], ENT_QUOTES, 'UTF-8', true);?>
"
                            title="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['homepage_contact']->value['privacy_title'])===null||$tmp==='' ? 'Szczegóły' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                            rel="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['homepage_contact']->value['privacy_rel'])===null||$tmp==='' ? 'noopener noreferrer' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                            class="underline">Szczegóły</a>
                        <?php }?>
                    </span></label><button type="submit"
                    class="w-full inline-flex items-center justify-center bg-[#e63329] hover:bg-[#cc2a21] text-white font-bold tracking-wider py-3 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[16px] uppercase transition-colors"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['submit_label'], ENT_QUOTES, 'UTF-8', true);?>
</button>
            </form>
        </div>
    </div>
</section>
<?php }
}
