<div id="consultant-form-box" class="blue-overlay help">
	<div id="help-wrapper">
		<h4>Konsultant</h4>

		<p class="pop-lead">
		{if $project}
			Masz dodatkowe pytania dotyczące projektu <strong>{if $project.name}{$project.name|escape}{else}{$project.symbol_alpha|escape} {$project.symbol_num|escape}{/if}</strong>? Napisz do nas — my odpowiemy.
		{else}
			Nie znalazłeś projektu, jakiego szukałeś? Opisz go nam! Postaramy się go znaleźć dla Ciebie. Masz dodatkowe pytania? Wystarczy je napisać — my odpowiemy.
		{/if}
		</p>

		<form method="post" action="{url module='contact' action='send'}" id="consultant-form">
			<input type="hidden" id="cons_project_id" name="project_id" value="{if $project}{$project.id}{else}0{/if}">
			<input name="module" type="hidden" value="contact">
			<input name="action" type="hidden" value="send">

			<p>
				<label for="cons_name" class="black">Twoje imię</label>
				<input type="text" name="name" id="cons_name" class="long" autocomplete="name">
			</p>

			<p>
				<label for="cons_email" class="black">Twój adres e-mail</label>
				<input type="email" name="email" id="cons_email" class="long" autocomplete="email">
			</p>

			<p>
				<label for="cons_query" class="black">Twoje zapytanie</label>
				<textarea name="query" id="cons_query" rows="5" class="long"></textarea>
			</p>

			<p class="accept">
				<input type="checkbox" name="accept" id="consultant-accept" value="on">
				<label for="consultant-accept">
					Wyrażam zgodę na przetwarzanie moich danych osobowych w celu otrzymania odpowiedzi zgodnie z oświadczeniem.
					<span class="ajax-info" data-url="{url module=ajax action=get_consultant_regulations}">Szczegóły</span>
				</label>
			</p>

			<p class="msg" id="contact-fail-box" style="display:none">Wypełnij poprawnie formularz</p>

			<p class="last">
				<img src="/img/waiter-blue.gif" alt="" id="cons-loader" style="display:none" width="24" height="24">
				<input id="cons_button" type="submit" value="Wyślij" class="baton">
			</p>
		</form>

		<p class="pop-foot">
			Możesz także skorzystać z infolinii. Konsultant pomoże Ci wybrać projekt i załatwi formalności z zamówieniem.
			<br>
			Numer konsultanta:
			<a href="tel:+48338229496" rel="nofollow"><strong>33 822 94 96</strong></a>
		</p>
	</div>

	<button type="button" id="help-overlay-close" class="blue-overlay-close">
		<span class="close-x" aria-hidden="true">✖</span>
		<span>Zamknij</span>
	</button>
</div>
