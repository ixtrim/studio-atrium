<div class="blue-overlay" id="ajax-info-overlay">
	<div class="over-box" id="ajax-info-over-box"></div>
	<button type="button" id="ajax-info-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>

<div class="blue-overlay catalog">
	<div id="over-catalog">
		{*<a href="{url module=catalog action=form}"><img src="/img/catalog_pop.webp" width="600" height="400" alt="Darmowy katalog"></a>
		<a href="/projekty-domow/domy-do-szkieletu"><img src="/img/szkielet-promo.jpg?t=20230102" width="600" height="600" alt="black-week"></a>*}
	</div>
	<button type="button" id="catalog-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>

<footer id="footer">
	<div>
		<p id="back-to-top">Powrót na górę</p>
	</div>
	{if !$user}
	<section class="account">
		<div class="box">
			<ul>
				<li>
					<ul>
						<li>
							<span>100</span>
						</li>
						<li>
							<p>
								Zarejestruj się w naszym serwisie. Nie przegap informacji o nowościach i promocjach. Twoje konto to swoboda korzystania z narzędzi gdziekolwiek jesteś. Dodatkowo za założenie konta otrzymujesz od nas w prezencie 100zł rabatu na zakup projektu domu.
							</p>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:" class="register-trigger">Załóż konto</a>
				</li>
			</ul>
		</div>
	</section>
	{/if}
	<section class="mq-pad">
		<ul class="foot-box">
			<li>
				<ul class="data">
					<li>
						<ul>
							<li class="header address"><span>Nasze adresy</span></li>
							<li>"<span class="uppercase">Studio Atrium</span> Lelek, Godlewski sp. j."</li>
							<li>al. Armii Krajowej 220 (pawilon II, pok. 205)</li>
							<li>43-316 Bielsko-Biała</li>
							<li><span id="map-trigger" class="blue">zobacz dojazd</span></li>
							<li class="sep">tel. <a href="tel:+48338106654" rel="nofollow">33 810 66 54</a>, <a href="tel:+48338164069" rel="nofollow">33 816 40 69</a>, fax w. 108</li>
							<li>tel. kom. <a href="tel:+48602303160" rel="nofollow">602 303 160</a></li>
							<li class="sep">e-mail: <a href="mailto:atrium@studioatrium.pl"><strong>atrium@studioatrium.pl</strong></a></li>
							<li class="sep"><a href="/kontakt/">Kontakt</a></li>
							<li><a href="/dokumenty/Dane-teleadresowe.html">Pełne dane teleadresowe</a></li>
							<li><a href="{url module=varia action=agent}">Przedstawiciele</a></li>
							<li><a href="{url module=varia action=about}">O nas</a></li>
							<li><a href="/dokumenty/Reklama.html">Reklama w Studio Atrium</a></li>
						</ul>
					</li>

					<li>
						<ul>
							<li class="header client"><span>Obsługa klienta</span></li>
							<li><span class="framed"><a href="tel:+48338229496" rel="nofollow">33 822 94 96</a></span></li>
							<li><span class="write consultant">Napisz do nas</span></li>
							<li class="header orders"><span>Zamówienia</span></li>
							<li><a href="/dokumenty/Zasady-sprzedazy.html">Zasady sprzedaży</a> i <a href="/dokumenty/Zasady-sprzedazy.html#regulamin">regulamin</a></li>
							<li><a href="/dokumenty/Polityka-prywatnosci.html">Polityka prywatności</a></li>
							<li><a href="/dokumenty/Co-zawiera-projekt.html">Co zawiera projekt</a></li>
							<li><a href="/dokumenty/Jak-kupowac.html">Jak kupować?</a></li>
							<li><a href="/dodatki/">Dodatki do projektów</a></li>
							<li><a href="/alfabetyczna-lista-projektow/">Projekty domów alfabetycznie</a></li>
						</ul>
					</li>
				</ul>
			</li>

			<li>
				<ul class="cat">
					<li><a href="{url module=catalog action=form}"><img src="/img/catalogue.webp" alt="Katalog z projektami domów" width="235" height="142"></a></li>
					<li>
						<p class="header"><span>Katalog projektów online</span></p>
						<p>Zapoznaj się z naszą ofertą projektową, przeglądając nasz najnowszy katalog projektów online.</p>
						<a href="{url module=catalog action=form}" class="blue">zobacz katalog &raquo;</a>
					</li>
				</ul>

				<ul class="cat">
					<li><a href="/dokumenty/Referencje.html"><img src="/img/medals.webp" alt="Konsumencki lider jakości" width="220" height="147"></a></li>
					<li>
						<p class="header"><span>Konsumencki lider jakości</span></p>
						<p>Marka Studio Atrium przez osiem lat z rzędu została wyróżniona w programie redakcji Strefy Gospodarki.</p>
						<a href="/dokumenty/Referencje.html" class="blue">zobacz więcej &raquo;</a>
					</li>
				</ul>

				{*
				<ul class="cat">
					<li class="droid"><a href='https://play.google.com/store/apps/details?id=pl.studioatrium.studioatrium&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img alt='Pobierz z Google Play' src='https://play.google.com/intl/en_us/badges/images/generic/pl_badge_web_generic.png'/></a>
					<a href="https://apps.apple.com/us/app/studio-atrium/id1474479465?mt=8" style="display:inline-block;overflow:hidden;background:url(https://linkmaker.itunes.apple.com/en-us/badge-lrg.svg?releaseDate=2019-09-02&kind=iossoftware&bubble=ios_apps) no-repeat;width:135px;height:40px;"></a></li>
					<li>
						<p class="header"><span>Aplikacja mobilna</span></p>
						<p>Aplikacja mobilna Studio Atrium. Wygodny sposób na przeglądanie projektów.</p>
						<a href="/dokumenty/Aplikacja-mobilna.html" class="blue">zobacz więcej &raquo;</a>
					</li>
				</ul>
				*}


				{*
				<ul>
					<li class="header partner"><span>Program partnerski</span></li>
					<li>
						Posiadasz swoją stronę internetową, witrynę lub bloga? Chcesz dodatkowo zarobić? Zarejestruj się w naszym <a href="#" class="blue">Programie Partnerskim &raquo;</a>
					</li>
				</ul>
				*}
			</li>
		</ul>

		<ul class="social-media">
			<li><a href="https://www.facebook.com/studioatrium" rel="nofollow">Facebook</a></li>
			<li><a href="https://www.instagram.com/studioatrium.pl/" class="goo" rel="nofollow">Instagram</a></li>
			<li><a href="https://www.pinterest.com/studioatrium/" class="pin" rel="nofollow">Pinterest</a></li>
			<li><a href="https://www.youtube.com/user/StudioAtrium" class="yt" rel="nofollow">YouTube</a></li>
		</ul>

		<p><strong>Copyright © Studio Atrium 1994-{$smarty.now|date_format:"%Y"}</strong> | Korzystamy z danych zapisywanych w cookies. <span class="ajax-info" data-url="{url module=ajax action=get_cookie_info}">Kliknij tutaj</span> jeśli chcesz je zablokować.</p>
	</section>
</footer>

{* if !$user}

<div class="blue-overlay lb">	
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
			<p class="last"><input type="submit" value="zaloguj" class="baton"><a href="javascript:" class="password-trigger">Zapomniałem hasła</a></p>
		</form>
		<h4>Nie masz konta?</h4>
		<p><a href="javascript:" class="register-trigger">Zarejestruj się</a>. Zyskasz większe możliwości, kontrolę nad korespondencją, komentarzami i swoimi transakcjami, a także dostęp do dodatkowych materiałów oraz promocji. </p>
	</div>
	<button type="button" id="lb-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>

<div class="blue-overlay rb">
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
			<p class="last"><input type="submit" value="utwórz" class="baton" id="rb_button"><a href="javascript:" class="ajax-info" data-url="{url module=ajax action=get_user_regulations}">Regulamin</a></p>
		</form>
		<h4>Masz już konto?</h4>
		<p><a href="javascript:" class="login-trigger">Zaloguj się</a></p>
	</div>
	<button type="button" id="rb-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>

{/if *}
{*
<div class="blue-overlay help">	
	<div id="help-wrapper">
		<h4><img src="/img/consultant.png?t=20230403" alt="Studio Atrium" width="60" height="60">Konsultant</h4>
		
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
		
		<p class="nocaps smallmargin">Możesz także skorzystać z infolinii. Konsultant pomoże Ci wybrać projekt i załatwi wszelkie formalności z zamówieneim!</p>
		<p class="nocaps">Numer naszego konsultanta <a href="tel:+48338229496" rel="nofollow"><strong>33 822 94 96</strong></a></p>
	</div>
	
	<button type="button" id="help-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>
*}
<div class="blue-overlay cs">
	<div id="cs-wrapper">
		<div>
			<form method="get" action="{url module='project' action='search'}" id="search-form">
				<div id="search-project">
					<label for="search-name" class="black">Wpisz nazwę projektu</label>
					<input type="text" name="query" id="search-name" class="long">
					<input type="submit" id="search-name-submit" value="Wyszukaj" class="baton disabled" disabled>
					<a href="{url module=varia action=project_helper}" class="wired help">Pomoc</a>
				</div>
			</form>
		</div>

		<div class="form-box">
			<p class="info">Lub wybierz parametry projektu i kliknij przycisk "Pokaż projekty" znajdujący się pod formularzem</p>
			<form id="click-search-form" method="post" action="/">
				<div class="cs-box">
					<ul>
						{if $csCategory}
						<li class="half-spaced">
							<p class="head">kategoria:</p>
							<ul>
								<li>
									<input type="checkbox" id="cs-category" name="kategoria" value="{$csCategory}" checked><label for="cs-category">{$category.name}</label> <span class="count" id="cs-category-count">(0)</span>
								</li>
							</ul>
						</li>
						{/if}
						
						{if $csTag}
						<li class="half-spaced">
							<p class="head">wybrany filtr:</p>
							<ul>
								<li>
									<input type="checkbox" id="{$csTag.id}-1" name="{$csTag.csname}" value="1" checked><label for="{$csTag.id}-1">{$csTag.name}</label> <span class="count" id="{$csTag.id}-1-count">(0)</span>
								</li>
							</ul>
						</li>
						{/if}

						{if $csTagSelect}
						<li class="half-spaced">
							<p class="head">wybrany filtr:</p>
							<ul>
								<li>
									<input type="checkbox" id="{$csTagSelect.id}-{$csTagSelect.value}" name="{$csTagSelect.csname}" value="{$csTagSelect.value}" checked><label for="{$csTagSelect.id}-{$csTagSelect.value}">{$csTagSelect.name} : {$csValueNames[$csTagSelect.value]|default:$csTagSelect.value}</label> <span class="count" id="{$csTagSelect.id}-{$csTagSelect.value}-count">(0)</span>
								</li>
							</ul>
						</li>
						{/if}
					
						<li class="spaced">
							<div class="jui-select-box white cs-select" id="project-type-box">
								<select name="typ_projektu" id="project-type">
									<option value="">typ projektu</option>
									
									{*if $csCustomCategory}
										<option id="{$csCustomCategory}" value="{$csCustomCategory}" selected>{$category.name|truncate:16:"...":true}</option>
									{/if*}
									
									<option id="parterowe" value="parterowe"{if $request.typ_projektu == 'parterowe' || $csType == 'parterowe'} selected{/if}>parterowe</option>
									<option id="z_poddaszem" value="z_poddaszem"{if $request.typ_projektu == 'z_poddaszem' || $csType == 'z_poddaszem'} selected{/if}>z poddaszem</option>
									<option id="pietrowe" value="pietrowe"{if $request.typ_projektu == 'pietrowe' || $csType == 'pietrowe'} selected{/if}>piętrowe</option>
									<option id="nothing" value="" disabled>--------</option>
									<option id="szkieletowe" value="szkieletowe"{if $request.typ_projektu == 'szkieletowe' || $csType == 'szkieletowe'} selected{/if}>szkieletowe</option>
									<option id="blizniacze" value="blizniacze"{if $request.typ_projektu == 'blizniacze' || $csType == 'blizniacze'} selected{/if}>bliźniacze</option>
									<option id="dwulokalowe" value="dwulokalowe"{if $request.typ_projektu == 'dwulokalowe' || $csType == 'dwulokalowe'} selected{/if}>dwulokalowe</option>
									
								</select>
							</div>
							
							<div class="jui-select-box right white cs-select" id="roof-type-box">
								<select name="typdachu" id="54">
									<option value="">typ dachu</option>
									<option id="54-dwuspadowy" value="dwuspadowy"{if $request.typdachu == 'dwuspadowy'} selected{/if}>dwuspadowy</option>
									<option id="54-mansardowy" value="mansardowy"{if $request.typdachu == 'mansardowy'} selected{/if}>mansardowy</option>
									<option id="54-stropodach" value="stropodach"{if $request.typdachu == 'stropodach'} selected{/if}>płaski</option>
									<option id="54-stozkowy" value="stozkowy"{if $request.typdachu == 'stozkowy'} selected{/if}>stożkowy</option>
									<option id="54-wielospadowy" value="wielospadowy"{if $request.typdachu == 'wielospadowy'} selected{/if}>wielospadowy</option>
								</select>
							</div>
						</li>
					
						<li>
							<p class="area">Powierzchnia użytkowa</p>
							 <label for="pow-min">od</label>
							<input type="text" name="pow_min" id="pow-min" value="{$request.pow_min}">
							<span class="sep"><label for="pow-max">do</label></span>
							<input type="text" name="pow_max" id="pow-max" value="{$request.pow_max}"> m<sup>2</sup>
						</li>
						
						<li>
							<p class="area">Powierzchnia zabudowy</p>
							<label for="pow-zab-min">od</label>
							<input type="text" name="pow_zab_min" id="pow-zab-min" value="{$request.pow_zab_min}">
							<span class="sep"><label for="pow-zab-max">do</label></span>
							<input type="text" name="pow_zab_max" id="pow-zab-max" value="{$request.pow_zab_max}"> m<sup>2</sup>
						</li>
						
						<li>
							<p class="area">Powierzchnia całkowita</p>
							<label for="pow-total-min">od</label>
							<input type="text" name="pow_total_min" id="pow-total-min" value="{$request.pow_total_min}">
							<span class="sep"><label for="pow-total-max">do</label></span>
							<input type="text" name="pow_total_max" id="pow-total-max" value="{$request.pow_total_max}"> m<sup>2</sup>
						</li>
						
						<li>
							<p class="dim">Szerokość | długość działki</p>
							<input type="text" name="dzialka_szer" id="parcel-width" value="{$request.dzialka_szer}">
							<span class="sep center">|</span>
							<input type="text" name="dzialka_dl" id="parcel-height" value="{$request.dzialka_dl}"> m
						</li>
						
						<li class="spaced">
							<p class="long">Maks. szerokość elewacji frontowej</p>
							<input type="text" name="front_szer" id="front-width" value="{$request.front_szer}"> m
						</li>
					
						<li class="half-spaced">
							<p class="head">ilość pokoi na parterze:</p>
							<div>
								<input type="radio" id="69-0" name="iloscpokoinaparterze" value="-1"><label for="69-0" class="spaced breaker">Dowolna</label>
								<input type="radio" id="69-1" name="iloscpokoinaparterze" value="1"{if $request.iloscpokoinaparterze == 1} checked{/if}><label for="69-1">1</label> <span class="count" id="69-1-count">(0)</span>
								<input type="radio" id="69-2" name="iloscpokoinaparterze" value="2"{if $request.iloscpokoinaparterze == 2} checked{/if}><label for="69-2">2</label> <span class="count" id="69-2-count">(0)</span>
								<input type="radio" id="69-3" name="iloscpokoinaparterze" value="3"{if $request.iloscpokoinaparterze == 3} checked{/if}><label for="69-3">3</label> <span class="count" id="69-3-count">(0)</span>
								<input type="radio" id="69-4" name="iloscpokoinaparterze" value="4"{if $request.iloscpokoinaparterze == 4} checked{/if}><label for="69-4">4</label> <span class="count" id="69-4-count">(0)</span>
								<input type="radio" id="69-5" name="iloscpokoinaparterze" value="5"{if $request.iloscpokoinaparterze == 5} checked{/if}><label for="69-5">5</label> <span class="count" id="69-5-count">(0)</span>
							</div>
						</li>
						
						<li class="half-spaced">
							<p class="head">ilość pokoi na II kondygnacji:</p>
							<div>
								<input type="radio" id="71-0" name="iloscpokoinaiikondygnacji" value="-1"><label for="71-0" class="spaced breaker">Dowolna</label>
								<input type="radio" id="71-1" name="iloscpokoinaiikondygnacji" value="1"{if $request.iloscpokoinaiikondygnacji == 1} checked{/if}><label for="71-1">1</label> <span class="count" id="71-1-count">(0)</span>
								<input type="radio" id="71-2" name="iloscpokoinaiikondygnacji" value="2"{if $request.iloscpokoinaiikondygnacji == 2} checked{/if}><label for="71-2">2</label> <span class="count" id="71-2-count">(0)</span>
								<input type="radio" id="71-3" name="iloscpokoinaiikondygnacji" value="3"{if $request.iloscpokoinaiikondygnacji == 3} checked{/if}><label for="71-3">3</label> <span class="count" id="71-3-count">(0)</span>
								<input type="radio" id="71-4" name="iloscpokoinaiikondygnacji" value="4"{if $request.iloscpokoinaiikondygnacji == 4} checked{/if}><label for="71-4">4</label> <span class="count" id="71-4-count">(0)</span>
								<input type="radio" id="71-5" name="iloscpokoinaiikondygnacji" value="5"{if $request.iloscpokoinaiikondygnacji == 5} checked{/if}><label for="71-5">5</label> <span class="count" id="71-5-count">(0)</span>
							</div> 
						</li>
						
						<li>
							<p class="head">Ilość łazienek</p>
							<div>
								<span class="dist">Na parterze</span> 
								<input type="radio" name="liczbalazieneknaparterze" value="2" id="45-2"{if $request.liczbalazieneknaparterze == 2} checked{/if}><label for="45-2">2</label> <span class="count" id="45-2-count">(0)</span>
								<input type="radio" name="liczbalazieneknaparterze" value="3" id="45-3"{if $request.liczbalazieneknaparterze == 3} checked{/if}><label for="45-3">3</label> <span class="count" id="45-3-count">(0)</span>
							</div>
							<div>
								<span class="dist">Na II kondygnacji</span>
								<input type="radio" name="liczbalazieneknaiikondygnacji" value="2" id="46-2"{if $request.liczbalazieneknaiikondygnacji == 2} checked{/if}><label for="46-2">2</label> <span class="count" id="46-2-count">(0)</span>
								<input type="radio" name="liczbalazieneknaiikondygnacji" value="3" id="46-3"{if $request.liczbalazieneknaiikondygnacji == 3} checked{/if}><label for="46-3">3</label> <span class="count" id="46-3-count">(0)</span>
							</div>
						</li>
					</ul>
				</div>
			
				<div class="cs-box">
					<ul>
						<li class="half-spaced">
							<div class="jui-select-box white cs-select" id="height-box">
								<select name="wysokoscbudynku" id="26">
									<option value="">maks. wys. budynku</option>
									<option id="26-1" value="1"{if $request.wysokoscbudynku == 1} selected{/if}>do 6 m</option>
									<option id="26-2" value="2"{if $request.wysokoscbudynku == 2} selected{/if}>od 6 m do 7 m</option>
									<option id="26-3" value="3"{if $request.wysokoscbudynku == 3} selected{/if}>od 7 m do 8 m</option>
									<option id="26-4" value="4"{if $request.wysokoscbudynku == 4} selected{/if}>od 8 m do 9 m</option>
									<option id="26-5" value="5"{if $request.wysokoscbudynku == 5} selected{/if}>od 9 m do 10 m</option>
									<option id="26-6" value="6"{if $request.wysokoscbudynku == 6} selected{/if}>powyżej 10 m</option>
								</select>
							</div>
							
							<div class="jui-select-box right white cs-select" id="angle-box">
								<select name="katnachyleniadachu" id="27">
									<option value="">kąt nach. dachu</option>
									<option id="27-1" value="1"{if $request.katnachyleniadachu == 1} selected{/if}>do 30&deg;</option>
									<option id="27-2" value="2"{if $request.katnachyleniadachu == 2} selected{/if}>30&deg; do 35&deg;</option>
									<option id="27-3" value="3"{if $request.katnachyleniadachu == 3} selected{/if}>35&deg; do 40&deg;</option>
									<option id="27-4" value="4"{if $request.katnachyleniadachu == 4} selected{/if}>40&deg; do 45&deg;</option>
									<option id="27-5" value="5"{if $request.katnachyleniadachu == 5} selected{/if}>45&deg; i więcej</option>
								</select>
							</div>
						</li>
						
						<li class="spaced">
							<div class="jui-select-box white cs-select" id="ceiling-box">
								<select name="rodzajstropu" id="28">
									<option value="">strop nad parterem</option>
									<option id="28-lekki" value="lekki"{if $request.rodzajstropu == 'lekki'} selected{/if}>lekki</option>
									<option id="28-gestozebrowy" value="gestozebrowy"{if $request.rodzajstropu == 'gestozebrowy'} selected{/if}>gęstożebrowy</option>
									<option id="28-plyta_zelbetowa" value="plyta_zelbetowa"{if $request.rodzajstropu == 'plyta_zelbetowa'} selected{/if}>płyta żelbetowa</option>
									<option id="28-drewniany_belkowy" value="drewniany_belkowy"{if $request.rodzajstropu == 'drewniany_belkowy'} selected{/if}>drewniany belkowy</option>
								</select>
							</div>
							
							<div class="jui-select-box right white cs-select" id="ridge-box">
								<select name="kalenica" id="103">
									<option value="">kalenica</option>
									<option id="103-rownolegla_do_drogi" value="rownolegla_do_drogi"{if $request.kalenica == 'rownolegla_do_drogi'} selected{/if}>równoległa do drogi</option>
									<option id="103-prostopadla_do_drogi" value="prostopadla_do_drogi"{if $request.kalenica == 'prostopadla_do_drogi'} selected{/if}>prostopadła do drogi</option>
									<option id="103-brak" value="brak"{if $request.kalenica == 'brak'} selected{/if}>brak</option>
								</select>
							</div>
						</li>
						
						<li>
							<p class="head">Funkcja - opcje dodatkowe</p>
							<div>
								<ul class="input-box">
									<li>
										<input type="checkbox" id="65-1" name="spizarnia" value="1"{if $request.spizarnia} checked{/if}><label for="65-1">Spiżarnia</label> <span class="count" id="65-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="57-1" name="garderoba" value="1"{if $request.garderoba} checked{/if}><label for="57-1">Garderoba</label> <span class="count" id="57-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="c18-1" name="duza_kotlownia" value="1"{if $request.duza_kotlownia} checked{/if}><label for="c18-1">Duża kotłownia</label> <span class="count" id="c18-1-count">(0)</span>
									</li>
								</ul>
							</div>
						</li>
						<li>
							<div>
								<ul class="input-box">
									<li>
										<input type="checkbox" id="47-1" name="wiatagarazowa" value="1"{if $request.wiatagarazowa} checked{/if}><label for="47-1">Wiata</label> <span class="count" id="47-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="96-1" name="pralnia" value="1"{if $request.pralnia} checked{/if}><label for="96-1">Pralnia</label> <span class="count" id="96-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="c26-1" name="od_poludnia" value="1"{if $request.od_poludnia} checked{/if}><label for="c26-1">Wjazd od południa</label> <span class="count" id="c26-1-count">(0)</span>
									</li>
								</ul>
							</div>
						</li>
						<li>
							<div>
								<ul class="input-box">
									<li>
										<input type="checkbox" id="104-1" name="balkon" value="1"{if $request.balkon} checked{/if}><label for="104-1">Balkon</label> <span class="count" id="104-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="105-1" name="lukarna" value="1"{if $request.lukarna} checked{/if}><label for="105-1">Lukarna</label> <span class="count" id="105-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="113-1" name="masterbedroom" value="1"{if $request.masterbedroom} checked{/if}><label for="113-1">Master bedroom</label> <span class="count" id="113-1-count">(0)</span>
									</li>
								</ul>
							</div>
						</li>
						<li>
							<div>
								<input type="checkbox" id="59-1" name="kuchniaodfrontu" value="1"{if $request.kuchniaodfrontu} checked{/if}><label for="59-1">Kuchnia od frontu</label> <span class="count" id="59-1-count">(0)</span>
								<div class="fright">
									<input type="checkbox" id="60-1" name="kuchniaodogrodu" value="1"{if $request.kuchniaodogrodu} checked{/if}><label for="60-1">Kuchnia od ogrodu</label> <span class="count" id="60-1-count">(0)</span>
								</div>
							</div>
						</li>
						<li>
							<div>
								<input type="checkbox" id="c19-1" name="kotlownia" value="1"{if $request.kotlownia} checked{/if}><label for="c19-1">Kotłownia na paliwo stałe</label> <span class="count" id="c19-1-count">(0)</span>
								<div class="fright">
									<input type="checkbox" id="67-1" name="zadaszonytaras" value="1"{if $request.zadaszonytaras} checked{/if}><label for="67-1">Zadaszony taras</label> <span class="count" id="67-1-count">(0)</span>
								</div>
							</div>
						</li>
						<li class="half-spaced">
							<div>
								<input type="checkbox" id="94-1" name="antresola" value="1"{if $request.antresola} checked{/if}><label for="94-1">Otwarta przestrzeń</label> <span class="count" id="94-1-count">(0)</span>
								<div class="fright">
									<input type="checkbox" id="119-1" name="osobnewc" value="1"{if $request.osobnewc} checked{/if}><label for="119-1">Osobne w.c.</label> <span class="count" id="119-1-count">(0)</span>
								</div>
							</div>
						</li>
						<li>
							<p class="head">Garaż</p>
							<div>
								<input type="radio" id="78-0" name="garaz" value="0"><label for="78-0" class="spaced">Dowolnie</label>
								<input type="radio" id="78-1" name="garaz" value="1"{if $request.garaz == 1} checked{/if}><label for="78-1">1 stanowisko</label> <span class="count" id="78-1-count">(0)</span>
								<input type="radio" id="78-2" name="garaz" value="2"{if $request.garaz == 2} checked{/if}><label for="78-2">2 i więcej</label> <span class="count" id="78-2-count">(0)</span>
								<input type="radio" id="78-3" name="garaz" value="3"{if $request.garaz == 3} checked{/if}><label for="78-3">nie</label> <span class="count" id="78-3-count">(0)</span>
							</div>
						</li>
						<li class="half-spaced">
							<p class="head">Piwnica</p>
							<div>
								<input type="radio" id="2-0" name="piwnica" value="0"><label for="2-0" class="spaced">Dowolnie</label>
								<input type="radio" id="2-1" name="piwnica" value="1"{if $request.piwnica == 1} checked{/if}><label for="2-1">tak</label> <span class="count" id="2-1-count">(0)</span>
								<input type="radio" id="2-2" name="piwnica" value="2"{if $request.piwnica == 2} checked{/if}><label for="2-2">nie</label> <span class="count" id="2-2-count">(0)</span>
							</div>
						</li>
						<li>
							<button id="cs-reset" class="wired">Resetuj wyszukiwarkę</button>
							<button id="cs-fetch" class="baton">Pokaż projekty</button>
							<p id="data-read" style="display: none;">trwa wczytywanie danych</p>
						</li>
					</ul>
				</div>
			</form>
		</div>
	</div>
	<button type="button" id="cs-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>
{*<script src="/js/app.js"></script>*}
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="/js/jquery.json-2.3.min.js"></script>
<script src="/js/enquire.min.js"></script>
<script src="/js/storage.js"></script>
<script src="/js/clicksearch.js?v={$version}"></script>
<script src="/js/common.js?v={$version}"></script>

{foreach $js_includes as $_js}
	<script src="/js/{$_js}"></script>
{/foreach}
{foreach $js_lazy as $_js}
	<script src="/js/{$_js}"></script>
{/foreach}
{if !$isMobile}
{foreach $js_lazy_nomobie as $_js}
	<script src="/js/{$_js}"></script>
{/foreach}
{/if}

<!-- Facebook Pixel Code -->
{literal}
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '164344025487761');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=164344025487761&ev=PageView&noscript=1"
/></noscript>
{/literal}
<!-- End Facebook Pixel Code -->


{* usuniete na wniosek Eactive - Mateusz Sipa 2017-07-42 *}
{*
{literal}
<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-3627780-2']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

</script>
{/literal}
*}

{if !$nochat}
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/56af3eb5fe87529955d6aa03/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

{*
{literal}
<!-- Messenger Wtyczka czatu Code -->
    <div id="fb-root"></div>

    <!-- Your Wtyczka czatu code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "274320408689");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v15.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/pl_PL/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
{/literal}
*}
{/if}
