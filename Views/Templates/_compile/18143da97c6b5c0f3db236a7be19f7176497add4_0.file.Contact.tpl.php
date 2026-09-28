<?php
/* Smarty version 3.1.48, created on 2026-09-28 23:10:59
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Contact.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abad7e3a491f1_10422839',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18143da97c6b5c0f3db236a7be19f7176497add4' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Contact.tpl',
      1 => 1790613779,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abad7e3a491f1_10422839 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="w-full<?php if ($_smarty_tpl->tpl_vars['contact_in_container']->value) {?> my-10<?php }?>" id="homepage-contact">
	<?php if ($_smarty_tpl->tpl_vars['contact_in_container']->value) {?><div class="max-w-[1480px] mx-auto px-8"><?php }?>
	<div class="hp-contact-grid">
				<div class="hp-contact-call">
			<?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['hostess_image_url']) {?>
				<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['hostess_image_url'], ENT_QUOTES, 'UTF-8', true);?>
"
					alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['hostess_image_alt'], ENT_QUOTES, 'UTF-8', true);?>
"
					class="hp-contact-hostess"
					loading="lazy">
			<?php }?>
			<h2 class="hp-contact-call-title pt-7 pb-4"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['call_title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
			<div class="hp-contact-phones text-[60px] leading-[64px] font-medium">
				<?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['phone1']) {?><div><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['phone1'], ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['phone2']) {?><div><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['phone2'], ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
			</div>
			<div class="hp-contact-hours text-[20px] leading-[24px]">
				<?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['hours_label']) {?><div class="hp-contact-hours-label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['hours_label'], ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['hours_text']) {?><div class="hp-contact-hours-text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['hours_text'], ENT_QUOTES, 'UTF-8', true);?>
</div><?php }?>
			</div>
		</div>

				<div class="hp-contact-copy">
			<h2 class="hp-contact-question-title text-[40px] leading-[44px] font-bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['question_title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
			<p class="hp-contact-question-body text-[20px] leading-[28px]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['question_body'], ENT_QUOTES, 'UTF-8', true);?>
</p>
		</div>

				<div class="hp-contact-form-wrap">
			<form class="hp-contact-form w-[440px] max-w-full py-[30px]">
				<input type="email" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['email_placeholder'], ENT_QUOTES, 'UTF-8', true);?>
"
					class="hp-contact-input">
				<textarea placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['message_placeholder'], ENT_QUOTES, 'UTF-8', true);?>
" rows="5"
					class="hp-contact-textarea"></textarea>
				<label class="hp-contact-consent">
					<input type="checkbox">
					<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['consent_text'], ENT_QUOTES, 'UTF-8', true);?>

						<?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['privacy_url']) {?>
						<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['privacy_url'], ENT_QUOTES, 'UTF-8', true);?>
"
							title="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['homepage_contact']->value['privacy_title'])===null||$tmp==='' ? 'Szczegóły' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
							rel="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['homepage_contact']->value['privacy_rel'])===null||$tmp==='' ? 'noopener noreferrer' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">Szczegóły</a>
						<?php }?>
					</span>
				</label>
				<button type="submit" class="hp-contact-submit"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['submit_label'], ENT_QUOTES, 'UTF-8', true);?>
</button>
			</form>
		</div>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['contact_in_container']->value) {?></div><?php }?>
</section>
<?php }
}
