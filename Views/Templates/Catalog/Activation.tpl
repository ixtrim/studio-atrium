<div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Nasz katalog domów</h1>
			</div>
		</div>
	</div>
</div>

<div class="options">
	<div class="box">
		<ul>
			<li class="selected"><div><a href="{url module=catalog action=form}"><span class="free">Bezpłatny</span></a></div></li>
			<li><div><a href="{url module=catalog action=form_pay}"><span class="nonfree" id="similiar">Płatny</span></a></div></li>
		</ul>
	</div>
</div>

<div class="wrapper">
	<div class="box info-box">
		<p class="headline">Bezpłatny katalog projektów</p>
	
		{if $result == 'ok'}
			<p>Dziękujemy! Twoje zamówienie bezpłatnego katalogu projektów zostało potwierdzone.</p>
			<p>Zamówiony katalog otrzymasz w ciągu <strong>7 dni</strong>.</p>
		{else}
			<p>Przepraszamy. Wystąpił błąd podczas potwierdzenia zamówienia bezpłatnego katalogu.</p>
			<p>Zamówienie mogło zostać już potwierdzone wcześniej, bądź podano błędne parametry w linku aktywującym zamówienie.</p>
			<p>Jeżeli problem będzie się powtarzał, skontaktuj się z nami: </p/>
			<p>- poprzez e-mail: <a href="mailto:atrium@studioatrium.pl">atrium@studioatrium.pl</a></p>
			<p>- telefonicznie pod numerami telefonów: <a href="tel:338106654"><strong>(33) 810 66 54</strong></a> albo <a href="tel:338164069"><strong>(33) 816 40 69</strong></a>.</p?
		{/if}
	</div>
</div>