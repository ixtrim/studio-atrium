<div id="fp-box" class="blue-overlay">	
	<div id="fp-wrapper">
		<h4>Zapomniałem hasła</h4>
		<form method="post" action="{url module='panel' action='send_reset_password_link'}" id="reset-password-form">
			<p>
				<label for="fp_email" class="black">E-mail</label>
				<input type="text" name="email" id="fp_email" class="long">
			</p>
			<p class="last"><input type="submit" value="wyślij nowe hasło" class="baton"></p>
		</form>
	</div>
	<button type="button" id="fp-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>