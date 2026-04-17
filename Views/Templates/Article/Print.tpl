<div class="print-box-header">
	<img src="/img/logo.png" alt="Studio Atrium">
		<ul>
			<li>ul. Malczewskiego 1</li>
			<li>43-300 Bielsko-Biała</li>

			<li>tel. 33 822 94 96,</li>
			<li>602 303 160</li>
		</ul>
</div>

<h1>{$article.title}</h1>

<div class="print-box">
	{$article.content|fixArticleContent:$article.id}
</div>

<p class="copy">Wszelkie prawa zastrzeżone &copy; Studio Atrium 1994-{$smarty.now|date_format:"%Y"}</p>