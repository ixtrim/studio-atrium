<div id="consultant-form-box" class="blue-overlay help">	
	<div id="help-wrapper">
		<h4><img src="/img/consultant.png" alt="Studio Atrium" width="60" height="60">Konsultant</h4>
		
		<p class="nocaps">
		{if $project}
			Masz dodatkowe pytania dotyczące projektu <strong>{if $project.name}{$project.name}{else}{$project.symbol_alpha} {$project.symbol_num}{/if}</strong>? Napisz do nas - my odpowiemy.
		{else}
			Nie znalazłeś projektu, jakiego szukałeś? Opisz go nam! Postaramy się go znaleźć dla Ciebie. Masz dodatkowe pytania? Wystarczy je napisać - my odpowiemy.
		{/if}
		</p>
		
			<form method="post" action="{url module='contact' action='send'}" id="consultant-form">
				<input type="hidden" id="cons_project_id" name="project_id" value="{if $project}{$project.id}{else}0{/if}">
				<input name="module" type="hidden" value="contact">
				<input name="action" type="hidden" value="send">

				<p>
					<label for="cons_name" class="black">Twoje imię</label>
					<input type="text" name="name" id="cons_name" class="long">
				</p>

				<p>
					<label for="cons_email" class="black">Twój adres e-mail</label>
					<input type="text" name="email" id="cons_email" class="long">
				</p>
				
				<p>
					<label for="cons_query" class="black">Twoje zapytanie</label>
					<textarea name="query" id="cons_query" cols="1" rows="1"></textarea>
				</p>
				
				<p class="accept">
                    <input type="checkbox" name="accept" id="consultant-accept" value="on"> <label for="consultant-accept">Wyrażam zgodę</label> na przetwarzanie moich danych osobowych w celu otrzymania odpowiedzi zgodnie z oświadczeniem. <span class="ajax-info" data-url="{url module=ajax action=get_consultant_regulations}">Szczegóły</span>
                </p>
				
				<p class="last">
					<span><img src="/img/waiter-white.gif" alt="Wysyłanie formularza" id="cons-loader" style="display: none;"><input id="cons_button" type="submit" value="wyślij" class="baton"></span>
				</p>
				<p class="nocaps" id="contact-fail-box" style="display: none;">Wypełnij poprawnie formularz</p>
			</form>
		
		<p class="nocaps smallmargin">Możesz także skorzystać z infolinii. Konsultant pomoże Ci wybrać projekt i załatwi wszelkie formalności z zamówieniem!</p>
		<p class="nocaps">Numer naszego konsultanta <a href="tel:+48338229496" rel="nofollow"><strong>33 822 94 96</strong></a></p>
	</div>
	
	<button type="button" id="help-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>