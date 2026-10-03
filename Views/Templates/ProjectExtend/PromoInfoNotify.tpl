<div class="form-wrapper" id="project-promo-notify-box">
	<h4>Powiadom o promocji</h4>
	<p class="pop-lead">Zostaw adres e-mail, a powiadomimy Cię o dodatkowych promocjach związanych z tym projektem.</p>

	<form class="validable" method="post" action="{url module='project_extend' action='promo_notify'}" id="promo-notify-form" data-call="PromoNotify.onSend">
		<input name="module" type="hidden" value="project_extend">
		<input name="action" type="hidden" value="promo_notify">
		<input name="pid" type="hidden" id="promo-notify-pid" value="">

		<p>
			<label for="promo-notify-email" class="black">Twój adres e-mail</label>
			<input type="email" name="email" id="promo-notify-email" class="long" autocomplete="email">
		</p>

		<p class="accept">
			<input type="checkbox" name="newsletter" id="newsletter-accept" value="on">
			<label for="newsletter-accept">Chcę także otrzymywać newsletter Studio Atrium.</label>
		</p>

		<p class="accept">
			<input type="checkbox" name="accept" id="ppn-accept" value="on">
			<label for="ppn-accept">
				Wyrażam zgodę na przetwarzanie moich danych osobowych w celu otrzymywania informacji o promocjach i ofercie projektowej.
				<span class="ajax-info" data-url="{url module=ajax action=get_mailing_regulations}" data-scroll="ajax-regulations">Szczegóły</span>
			</label>
		</p>

		<p class="msg" id="promo-notify-box" style="display:none"></p>

		<p class="last">
			<img id="promo-notify-waiter" src="/img/waiter-blue.gif" alt="" style="display: none;" width="24" height="24">
			<input type="submit" id="promo-notify-button" class="baton" value="Wyślij">
		</p>
	</form>
</div>
