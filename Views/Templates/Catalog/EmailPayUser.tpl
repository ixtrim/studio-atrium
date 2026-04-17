<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Szczegóły zamówienia katalogu Studio Atrium</title>
	
	<style>
{literal}
		body 	 	{ font-family: Tahoma; font-size: 14px; color: #000000; line-height: 16px; }
		body > div	{ padding-left: 32px; }
		div.wrapper { display: inline-block; }
		div.wrapper + p { margin-top: 16px; }
		p.spaced 	{ margin-top: 32px; }
		p.last 		{ display: inline-block; padding-bottom: 32px; border-bottom: 1px solid #000; margin-top: 32px; }
		p.top	 	{ padding-top: 8px; border-top: 1px dashed #000; }
		p.bottom	{ padding-bottom: 8px; border-bottom: 1px dashed #000; }
		a		 	{ color: #0000ff; }
		ul			{ list-style-type: none; padding: 0; margin: 32px 0 0; }
		ul.sa		{ margin-top: 24px;  }
		ul li + li	{ margin-top: 8px; }
{/literal}
</style>
	
</head>
<body>
<p>Informacja o zamówieniu płatnego katalogu STUDIA ATRIUM</p>
<p>Dziękujemy za zamówienie katalogu Domy w Tradycji!</p>

<p>Po otrzymaniu przez nas potwierdzenia przelewu, katalog zostanie niezwłocznie wysłany pocztą.</p>

<p>
W razie jakichkolwiek pytań prosimy o kontakt emailowy: <a href="mailto:atrium@studioatrium.pl">atrium@studioatrium.pl</a>
lub telefoniczny pod numerami telefonów: <strong>(33) 810 66 54</strong> albo <strong>(33) 816 40 69</strong>.
Poniżej znajdą Państwo dane z wypełnionego wcześniej formularza.</p>

<p>numer zamówienia: <strong>{$transaction_id}</strong></p>

<ul>
	<li><strong>Dane do przelewu:</strong></li>
	<li>Nazwa konta: STUDIO ATRIUM Lelek, Godlewski Spółka Jawna</li>
	<li>Nr konta: 81 1020 1390 0000 6102 0134 5404</li>
	<li>Tytuł (treść) przelewu: Zamówienie płatnego katalogu nr {$transaction_id}</li>
	<li>Kwota: {$price} zł</li>
</ul>

<ul>
	<li><strong>Dane do wysyłki:</strong></li>
	<li>{$user.name} {$user.surname}</li>
	<li>{$user.address}</li>
	<li>{$user.post_code} {$user.city}</li>
</ul>

<ul class="sa">
	<li>"STUDIO ATRIUM Lelek, Godlewski Spółka Jawna"</li>
	<li>43-300 Bielsko-Biała</li>
	<li>al. Armii Krajowej 220/pawilon II, pok. 205</li>
	<li>tel. 33 822 94 96</li>
	<li>tel. kom. 602 303 160</li>
	<li><a href="mailto:atrium@studioatrium.pl">atrium@studioatrium.pl</a></li>
	<li><a href="https://www.studioatrium.pl">www.studioatrium.pl</a></li>
</ul>
</body>
</html>