<?php
/* Smarty version 3.1.48, created on 2026-10-01 21:43:04
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Contact.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abeb7c8e27e15_19243104',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18143da97c6b5c0f3db236a7be19f7176497add4' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/Contact.tpl',
      1 => 1790674263,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abeb7c8e27e15_19243104 (Smarty_Internal_Template $_smarty_tpl) {
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
				<?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['phone1']) {?>
					<a href="tel:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( $_smarty_tpl->tpl_vars['homepage_contact']->value['phone1'],' ','' ));?>
" class="hp-contact-phone-link"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['phone1'], ENT_QUOTES, 'UTF-8', true);?>
</a>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['phone2']) {?>
					<a href="tel:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( $_smarty_tpl->tpl_vars['homepage_contact']->value['phone2'],' ','' ));?>
" class="hp-contact-phone-link"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['phone2'], ENT_QUOTES, 'UTF-8', true);?>
</a>
				<?php }?>
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
			<form id="hp-contact-form" class="hp-contact-form w-[440px] max-w-full py-[30px]" method="post" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'contact','action'=>'send'),$_smarty_tpl ) );?>
" novalidate>
				<input type="email" name="email" id="hp-contact-email" required
					placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['email_placeholder'], ENT_QUOTES, 'UTF-8', true);?>
"
					class="hp-contact-input"
					autocomplete="email">
				<textarea name="query" id="hp-contact-query" required rows="5"
					placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['message_placeholder'], ENT_QUOTES, 'UTF-8', true);?>
"
					class="hp-contact-textarea"></textarea>
				<label class="hp-contact-consent">
					<input type="checkbox" name="accept" id="hp-contact-accept" value="on" required>
					<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['consent_text'], ENT_QUOTES, 'UTF-8', true);?>

						<?php if ($_smarty_tpl->tpl_vars['homepage_contact']->value['privacy_url']) {?>
						<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['privacy_url'], ENT_QUOTES, 'UTF-8', true);?>
"
							title="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['homepage_contact']->value['privacy_title'])===null||$tmp==='' ? 'Szczegóły' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
							rel="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['homepage_contact']->value['privacy_rel'])===null||$tmp==='' ? 'noopener noreferrer' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"
							target="_blank">Szczegóły</a>
						<?php }?>
					</span>
				</label>
				<p id="hp-contact-status" class="hp-contact-status" hidden role="status"></p>
				<button type="submit" class="hp-contact-submit" id="hp-contact-submit"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homepage_contact']->value['submit_label'], ENT_QUOTES, 'UTF-8', true);?>
</button>
			</form>
		</div>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['contact_in_container']->value) {?></div><?php }?>
</section>
<?php echo '<script'; ?>
>

(function () {
	var form = document.getElementById('hp-contact-form');
	if (!form || form.dataset.bound === '1') return;
	form.dataset.bound = '1';
	var statusEl = document.getElementById('hp-contact-status');
	var submitBtn = document.getElementById('hp-contact-submit');
	var defaultLabel = submitBtn ? submitBtn.textContent : 'WYŚLIJ';

	function setStatus(msg, ok) {
		if (!statusEl) return;
		statusEl.hidden = !msg;
		statusEl.textContent = msg || '';
		statusEl.classList.toggle('is-ok', !!ok);
		statusEl.classList.toggle('is-error', !!msg && !ok);
	}

	form.addEventListener('submit', function (e) {
		e.preventDefault();
		var email = (document.getElementById('hp-contact-email') || {}).value || '';
		var query = (document.getElementById('hp-contact-query') || {}).value || '';
		var accept = document.getElementById('hp-contact-accept');
		if (!email.trim() || !query.trim() || !(accept && accept.checked)) {
			setStatus('Wypełnij poprawnie formularz kontaktowy.', false);
			return;
		}
		if (submitBtn) {
			submitBtn.disabled = true;
			submitBtn.textContent = 'Wysyłanie…';
		}
		setStatus('', false);
		var body = new URLSearchParams();
		body.set('email', email.trim());
		body.set('query', query.trim());
		body.set('accept', 'on');
		fetch(form.action, {
			method: 'POST',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8', 'X-Requested-With': 'XMLHttpRequest' },
			body: body.toString(),
			credentials: 'same-origin'
		}).then(function (r) { return r.json().catch(function () { return {}; }); })
		.then(function (data) {
			var status = (data && data.status) || '';
			if (status === 'ok') {
				setStatus('Wiadomość została wysłana. Nasz konsultant odpowie najszybciej jak to będzie możliwe.', true);
				form.reset();
			} else if (status === 'error') {
				setStatus('Nie udało się wysłać wiadomości. Spróbuj ponownie lub zadzwoń do nas.', false);
			} else {
				setStatus('Wypełnij poprawnie formularz kontaktowy.', false);
			}
		}).catch(function () {
			setStatus('Nie udało się wysłać wiadomości. Spróbuj ponownie lub zadzwoń do nas.', false);
		}).finally(function () {
			if (submitBtn) {
				submitBtn.disabled = false;
				submitBtn.textContent = defaultLabel;
			}
		});
	});
})();

<?php echo '</script'; ?>
>
<?php }
}
