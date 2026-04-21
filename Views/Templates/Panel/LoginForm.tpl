<div id="lb-box" class="blue-overlay lb">	
	<div id="lb-wrapper">
		<h4>Logowanie</h4>
		<form method="post" action="{url module='authenticate' action='login'}" id="login-form" autocomplete="off">
			<p>
				<label for="email" class="black">E-mail</label>
				<input type="text" name="email" id="email" class="long">
			</p>
			<p>
				<label for="password" class="black">Hasło</label>
				<input type="password" name="password" id="password" class="long">
			</p>
			<p class="msg" id="login-fail-box" style="display: none;">Podałeś nieprawidłowy e-mail lub hasło</p>
			<p class="last"><input type="submit" value="zaloguj" class="baton"><a href="javascript:" id="password-trigger">Zapomniałem hasła</a></p>
		</form>
		<h4>Nie masz konta?</h4>
		<p><a href="javascript:" class="register-trigger">Zarejestruj się</a>. Zyskasz większe możliwości, kontrolę nad korespondencją, komentarzami i swoimi transakcjami, a także dostęp do dodatkowych materiałów oraz promocji. </p>
	</div>
	<button type="button" id="lb-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>