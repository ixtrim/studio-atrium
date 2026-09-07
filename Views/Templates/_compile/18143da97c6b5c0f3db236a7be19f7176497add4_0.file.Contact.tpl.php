<?php
/* Smarty version 3.1.48, created on 2026-09-07 21:44:43
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Contact.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a9f142b6a59a4_30002035',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18143da97c6b5c0f3db236a7be19f7176497add4' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Contact.tpl',
      1 => 1788766778,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a9f142b6a59a4_30002035 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="w-full<?php if ($_smarty_tpl->tpl_vars['contact_in_container']->value) {?> my-10<?php }?>" id="homepage-contact">
    <?php if ($_smarty_tpl->tpl_vars['contact_in_container']->value) {?><div class="max-w-[1480px] mx-auto px-8"><?php }?>
    <div class="grid grid-cols-1 md:grid-cols-12 md:items-stretch">
        <div class="md:col-span-5 bg-[#1d99e1] text-white py-16 <?php if ($_smarty_tpl->tpl_vars['contact_in_container']->value) {?>px-8<?php } else { ?>pl-8 md:pl-[max(2rem,calc((100vw-1480px)/2+2rem))] pr-8<?php }?> flex flex-col justify-center">
            <div class="flex items-start gap-4">
            <h2 class="text-[36px] font-400 text-[var(--brand-darker)] tracking-tight uppercase"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['call_title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                <?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['hostess_image_url']) {?>
                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['hostess_image_url'], ENT_QUOTES, 'UTF-8', true);?>
"
                    alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['hostess_image_alt'], ENT_QUOTES, 'UTF-8', true);?>
"
                    class="w-[70px] h-[70px] object-cover ml-auto ring-4 ring-white/30" loading="lazy">
                <?php }?>
            </div>
            <div class="space-y-1 text-white">
                <?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['phone1']) {?><div class="text-[44px] font-['Montserrat',sans-serif] font-semibold leading-tight"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['phone1'], ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['phone2']) {?><div class="text-[44px] font-['Montserrat',sans-serif] font-semibold leading-tight"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['phone2'], ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
            </div>
            <div class="mt-[16px] text-[24px] text-[var(--brand-darker)]">
                <?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['hours_label']) {?><div class="font-bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['hours_label'], ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['hours_text']) {?><div class="font-semibold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['hours_text'], ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
            </div>
        </div>
        <div class="md:col-span-7 bg-[#f5f5f5] py-16 <?php if ($_smarty_tpl->tpl_vars['contact_in_container']->value) {?>px-8<?php } else { ?>pr-8 md:pr-[max(2rem,calc((100vw-1480px)/2+2rem))] pl-8<?php }?> flex flex-col justify-center">
            <div class="grid grid-cols-1 lg:grid-cols-7 gap-8 items-center">
                <div class="lg:col-span-3">
                    <h2 class="text-[36px] font-400 text-[var(--brand-darker)] tracking-tight uppercase mb-5"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['question_title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                    <p class="text-[18px] leading-[24px] text-[#333]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['question_body'], ENT_QUOTES, 'UTF-8', true);?>
</p>
                </div>
                <div class="lg:col-span-4">
                    <form class="space-y-3">
                        <input type="email" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['email_placeholder'], ENT_QUOTES, 'UTF-8', true);?>
"
                            class="w-full bg-white px-4 py-3 text-[16px] text-[#333] placeholder:text-[#888] outline-none border-0">
                        <textarea placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['message_placeholder'], ENT_QUOTES, 'UTF-8', true);?>
" rows="4"
                            class="w-full bg-white px-4 py-3 text-[16px] text-[#333] placeholder:text-[#888] outline-none border-0 resize-none"></textarea>
                        <label class="flex items-start gap-2 text-[12px] text-[#666] leading-snug pt-1">
                            <input type="checkbox" class="mt-0.5 w-3 h-3 accent-[#1d99e1]">
                            <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['consent_text'], ENT_QUOTES, 'UTF-8', true);?>

                                <?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['privacy_url']) {?>
                                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['privacy_url'], ENT_QUOTES, 'UTF-8', true);?>
"
                                    title="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['homepage_contact']->value['privacy_title'])===null||$tmp==='' ? 'Szczegóły' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                                    rel="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['homepage_contact']->value['privacy_rel'])===null||$tmp==='' ? 'noopener noreferrer' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
                                    class="underline">Szczegóły</a>
                                <?php }?>
                            </span>
                        </label>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center bg-[#e63329] hover:bg-[#cc2a21] text-white font-bold tracking-wider py-3 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[16px] uppercase transition-colors mt-[32px]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['submit_label'], ENT_QUOTES, 'UTF-8', true);?>
</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['contact_in_container']->value) {?></div><?php }?>
</section>
<?php }
}
