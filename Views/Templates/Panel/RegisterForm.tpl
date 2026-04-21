<div id="rb-box" class="blue-overlay rb">
	<div id="rb-wrapper">
		<h4>Rejestracja konta</h4>
		<form method="post" action="{url module='panel' action='register'}" id="register-form">
			<input name="module" type="hidden" value="panel">
			<input name="action" type="hidden" value="register">
			<input id="r_relocate" name="r_relocate" type="hidden">
			<p>
				<label for="r_name" class="black">Imię</label>
				<input type="text" name="r_name" id="r_name" class="long">
			</p>
			<p>
				<label for="r_surname" class="black">Nazwisko</label>
				<input type="text" name="r_surname" id="r_surname" class="long">
			</p>
			<p>
				<label for="r_email" class="black">E-mail</label>
				<input type="text" name="r_email" id="r_email" class="long" autocomplete="off">
			</p>
			<p class="mystic">
				<label for="r_age" class="black">Wiek</label>
				<input type="text" name="r_age" id="r_age" class="long" autocomplete="off">
			</p>
			<p>
				<label for="r_password" class="black">Hasło</label>
				<input type="password" name="r_password" id="r_password" class="long" autocomplete="off">
			</p>
			<p>
				<label for="r_repassword" class="black">Powtórz hasło</label>
				<input type="password" name="r_repassword" id="r_repassword" class="long">
			</p>
			<p class="msg" id="register-fail-box" style="display: none;">Wypełnij poprawnie formularz</p>
			<p>
				<input type="checkbox" name="r_accept_mailing_register" id="r_accept_mailing_register" value="1"><label for="r_accept_mailing_register" class="accept-mailing-register-down">Wyrażam zgodę</label><label for="r_accept_mailing_register" class="accept-mailing-register-down"> na otrzymywanie informacji o promocjach i ofercie projektowej</label>. <span class="ajax-info accept-mailing-register-down" data-url="{url module=ajax action=get_mailing_regulations}">Szczegóły</span>
			</p>
			<p class="last"><input type="submit" value="utwórz" class="baton" id="rb_button">
				<a href="javascript:" class="ajax-info accept-mailing-register" data-url="{url module=ajax action=get_user_regulations}">Regulamin konta</a>
			</p>
		</form>
		<h4>Masz już konto?</h4>
		<p><a href="javascript:" class="login-trigger">Zaloguj się</a></p>
	</div>
	<button type="button" id="rb-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>