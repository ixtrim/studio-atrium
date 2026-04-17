<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Szczegóły zamówienia sak-{$transaction_id}</title>
	
	<style>
		body 	 	{ font-family: Tahoma; font-size: 14px; color: #000000; line-height: 16px; }
		body > div	{ padding-left: 32px; }
		div.wrapper { display: inline-block; margin-top: 32px; }
		p			{ margin: 4px 0; }
		p.header	{ font-weight: bold; margin: 16px 0 6px; }
		p.top	 	{ padding-top: 8px; border-top: 1px solid #000; }
		p.bottom	{ padding-bottom: 8px; border-bottom: 1px solid #000; }
		span		{ color: #c00000; }
		a		 	{ color: #0000ff; }
		ul			{ list-style-type: none; padding: 0; margin: 0; }
		ul li + li	{ margin-top: 4px; }
	</style>
</head>
<body>

<p>Informacja o zamówieniu płatnego katalogu STUDIA ATRIUM</p>

<p>Numer zamówienia: <strong>{$transaction_id}</strong></p>


<ul>
	<li><strong>Adres do wysyłki:</strong></li>
	<li>{$user.name} {$user.surname}</li>
	<li>{$user.address}</li>
	<li>{$user.post_code} {$order.city}</li>
	<li>{$user.region}</li>
	<li>{$user.phone}</li>
	<li>{$user.email}</li>
</ul>
</body>
</html>