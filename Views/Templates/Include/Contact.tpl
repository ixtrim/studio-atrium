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
				{if $homepage_contact.phone1}<div>{$homepage_contact.phone1|escape}</div>{/if}
				{if $homepage_contact.phone2}<div>{$homepage_contact.phone2|escape}</div>{/if}
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
			<form class="hp-contact-form w-[440px] max-w-full">
				<input type="email" placeholder="{$homepage_contact.email_placeholder|escape}"
					class="hp-contact-input">
				<textarea placeholder="{$homepage_contact.message_placeholder|escape}" rows="5"
					class="hp-contact-textarea"></textarea>
				<label class="hp-contact-consent">
					<input type="checkbox">
					<span>{$homepage_contact.consent_text|escape}
						{if $homepage_contact.privacy_url}
						<a href="{$homepage_contact.privacy_url|escape}"
							title="{$homepage_contact.privacy_title|default:'Szczegóły'|escape}"
							rel="{$homepage_contact.privacy_rel|default:'noopener noreferrer'|escape}">Szczegóły</a>
						{/if}
					</span>
				</label>
				<button type="submit" class="hp-contact-submit">{$homepage_contact.submit_label|escape}</button>
			</form>
		</div>
	</div>
	{if $contact_in_container}</div>{/if}
</section>
