<div class="form-wrapper" id="project-promo-notify-box">
	<p class="nocaps">Zostaw adres e-mail, a powiadomimy Cię o dodatkowych promocjach związanych z tym projektem.</p>
	
	<form class="validable" method="post" action="{url module='project_extend' action='promo_notify'}" id="promo-notify-form" data-call="PromoNotify.onSend">
		<input name="module" type="hidden" value="project_extend">
		<input name="action" type="hidden" value="promo_notify">
		<input name="pid" type="hidden" id="promo-notify-pid">
		
		<p>
			<label for="promo-notify-email" class="black">Twój adres e-mail</label>
			<input type="text" name="email" id="promo-notify-email" class="long">
		</p>

		<p class="accept">
            <input type="checkbox" name="newsletter" id="newsletter-accept" value="on"> <label for="newsletter-accept">Chcę także</label> otrzymywać newsletter Studio Atrium.
        </p>
            
        <p class="accept">
			<input type="checkbox" name="accept" id="ppn-accept" value="on"> <label for="ppn-accept">Wyrażam zgodę</label> na przetwarzanie moich danych osobowych w celu otrzymywania informacji o promocjach i ofercie projektowej. <span class="ajax-info" data-url="{url module=ajax action=get_mailing_regulations}" data-scroll="ajax-regulations">Szczegóły</span>
		</p>
            
        <div class="info-box">
			<p class="nocaps info" id="promo-notify-box">&nbsp;</p>
		</div>
			
		<div class="submit-box">
			<img id="promo-notify-waiter" src="/img/waiter-white.gif" alt="Wysyłanie formularza" style="display: none;">
			<input type="submit" id="promo-notify-button" class="baton" value="wyślij">
		</div>
	</form>
</div>