<section class="w-full{if $contact_in_container} my-10{/if}" id="homepage-contact">
	{if $contact_in_container}<div class="max-w-[1480px] mx-auto px-8">{/if}
	<div class="hp-contact-grid">
		{* Left — call / phones *}
		<div class="hp-contact-call">
			{if $homepage_contact.hostess_image_url}
				<img src="{$homepage_contact.hostess_image_url|escape}"
					alt="{$homepage_contact.hostess_image_alt|escape}"
					class="hp-contact-hostess"
					loading="lazy">
			{/if}
			<h2 class="hp-contact-call-title pt-7 pb-4">{$homepage_contact.call_title|escape}</h2>
			<div class="hp-contact-phones text-[60px] leading-[64px] font-medium">
				{if $homepage_contact.phone1}
					<a href="tel:{$homepage_contact.phone1|replace:' ':''}" class="hp-contact-phone-link">{$homepage_contact.phone1|escape}</a>
				{/if}
				{if $homepage_contact.phone2}
					<a href="tel:{$homepage_contact.phone2|replace:' ':''}" class="hp-contact-phone-link">{$homepage_contact.phone2|escape}</a>
				{/if}
			</div>
			<div class="hp-contact-hours text-[20px] leading-[24px]">
				{if $homepage_contact.hours_label}<div class="hp-contact-hours-label">{$homepage_contact.hours_label|escape}</div>{/if}
				{if $homepage_contact.hours_text}<div class="hp-contact-hours-text">{$homepage_contact.hours_text|escape}</div>{/if}
			</div>
		</div>

		{* Middle — question copy *}
		<div class="hp-contact-copy">
			<h2 class="hp-contact-question-title text-[40px] leading-[44px] font-bold">{$homepage_contact.question_title|escape}</h2>
			<p class="hp-contact-question-body text-[20px] leading-[28px]">{$homepage_contact.question_body|escape}</p>
		</div>

		{* Right — form *}
		<div class="hp-contact-form-wrap">
			<form id="hp-contact-form" class="hp-contact-form w-[440px] max-w-full py-[30px]" method="post" action="{url module='contact' action='send'}" novalidate>
				<input type="email" name="email" id="hp-contact-email" required
					placeholder="{$homepage_contact.email_placeholder|escape}"
					class="hp-contact-input"
					autocomplete="email">
				<textarea name="query" id="hp-contact-query" required rows="5"
					placeholder="{$homepage_contact.message_placeholder|escape}"
					class="hp-contact-textarea"></textarea>
				<label class="hp-contact-consent">
					<input type="checkbox" name="accept" id="hp-contact-accept" value="on" required>
					<span>{$homepage_contact.consent_text|escape}
						{if $homepage_contact.privacy_url}
						<a href="{$homepage_contact.privacy_url|escape}"
							title="{$homepage_contact.privacy_title|default:'Szczegóły'|escape}"
							rel="{$homepage_contact.privacy_rel|default:'noopener noreferrer'|escape}"
							target="_blank">Szczegóły</a>
						{/if}
					</span>
				</label>
				<p id="hp-contact-status" class="hp-contact-status" hidden role="status"></p>
				<button type="submit" class="hp-contact-submit" id="hp-contact-submit">{$homepage_contact.submit_label|escape}</button>
			</form>
		</div>
	</div>
	{if $contact_in_container}</div>{/if}
</section>
<script>
{literal}
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
{/literal}
</script>
