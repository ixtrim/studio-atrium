<div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Konkurs fotograficzny</h1>
			</div>
		</div>
	</div>
</div>

<div class="wrapper">
	<div class="box">
		
		<div class="contest-splash">
			<img src="/img/konkurs.jpg" alt="Konkurs fotograficzny" class="resp">
		</div>
	
		<div class="contest">
			<p class="info">Wybudowałeś swój wymarzony dom wg projektu Studia Atrium? Podziel się swoją radością. Chwyć za aparat/smartfona i sfotografuj bryłę budynku z zewnątrz, dołącz także zdjęcia wnętrz - Twoje aranżacje kuchni, salonu, łazienki, sypialni na pewno zainspirują innych. Za pomocą prostego formularza prześlij do nas namiary na siebie, a my w odpowiedzi poprosimy Cię o wysłanie do nas efektu swoich prac. Najlepsze z nich zostaną wyróżnione profesjonalną sesją fotograficzną zorganizowaną przez Studio Atrium, a właściciel domu otrzyma nagrodę w postaci ciśnieniowego ekspresu do kawy. Z Laureatami będziemy się kontaktować indywidualnie, a ich prace zostaną zaprezentowane na łamach naszej strony internetowej oraz wydawnictwa Domy w Tradycji. <a href="/artykuly/Nagrodzone-realizacje,1391.html">Zobacz nagrodzone realizacje &raquo;</a></p>
		
			<div>
				<p class="express">Wygraj ciśnieniowy <span>ekspres do kawy</span></p>
				{*<p>Dodaj konkursowe zdjęcia</p>*}
			</div>
		</div>
{*
		<div id="photos-box">
			<form enctype="multipart/form-data" id="up-form" method="post" action="{url module=contest action=upload}">
				<fieldset>
					<input type="hidden" id="photo_index" name="index" value="1">
					<input type="hidden" id="dir-name" name="dir" value="{$dir}">
					<input type="hidden" name="MAX_FILE_SIZE" value="8388608" />
				
					<div>
						<span id="add-photo">Dodaj zdjęcie</span>
						<input id="up-file" type="file" name="up-file">
					</div>
					
					<ul id="photos"></ul>
					
					<input id="submit" type="submit" value="Wyślij">
				</fieldset>
			</form>
		</div>
*}	
		<div id="person-box">
			<form id="contest-form" class="validable default" method="post" action="{url module=contest action=register}">
				<fieldset>
					<input name="module" type="hidden" value="contest">
					<input name="action" type="hidden" value="register">
					<input type="hidden" id="directory-name" name="dir" value="{$dir}">
					<div class="contest-form-box">
						<div>
							<ul>
								<li>
									<p id="project"><label for="f-project">Nazwa projektu domu</label></p>
									<input type="text" id="f-project" name="project">
								</li>
								
								<li>
									<p id="city"><label for="f-city">Miejscowość</label></p>
									<input type="text" id="f-city" name="city">
								</li>
								
								<li>
									<p id="address"><label for="f-address">Ulica, nr domu</label></p>
									<input type="text" id="f-address" name="address">
								</li>
								
								<li>
									<p id="postalcode"><label for="f-postal">Kod pocztowy</label></p>
									<input type="text" name="postalcode" id="f-postal">
								</li>
								
								<li>
									<p id="region"><label for="f-region">Województwo</label></p>
									<div class="jui-select-box dark" id="region-box">
										<select name="region" id="f-region">
											<option value="">wybierz z listy...</option>
											<option value="dolnośląskie"{if $order.region == 'dolnośląskie'} selected{/if}>dolnośląskie</option>
											<option value="kujawsko-pomorskie"{if $order.region == 'kujawsko-pomorskie'} selected{/if}>kujawsko-pomorskie</option>
											<option value="lubelskie"{if $order.region == 'lubelskie'} selected{/if}>lubelskie</option>
											<option value="lubuskie"{if $order.region == 'lubuskie'} selected{/if}>lubuskie</option>
											<option value="łódzkie"{if $order.region == 'łódzkie'} selected{/if}>łódzkie</option>
											<option value="małopolskie"{if $order.region == 'małopolskie'} selected{/if}>małopolskie</option>
											<option value="mazowieckie"{if $order.region == 'mazowieckie'} selected{/if}>mazowieckie</option>
											<option value="opolskie"{if $order.region == 'opolskie'} selected{/if}>opolskie</option>
											<option value="podlaskie"{if $order.region == 'podlaskie'} selected{/if}>podlaskie</option>
											<option value="pomorskie"{if $order.region == 'pomorskie'} selected{/if}>pomorskie</option>
											<option value="podkarpackie"{if $order.region == 'podkarpackie'} selected{/if}>podkarpackie</option>
											<option value="śląskie"{if $order.region == 'śląskie'} selected{/if}>śląskie</option>
											<option value="świętokrzyskie"{if $order.region == 'świętokrzyskie'} selected{/if}>świętokrzyskie</option>
											<option value="wielkopolskie"{if $order.region == 'wielkopolskie'} selected{/if}>wielkopolskie</option>
											<option value="warmińsko-mazurskie"{if $order.region == 'warmińsko-mazurskie'} selected{/if}>warmińsko-mazurskie</option>
											<option value="zachodniopomorskie"{if $order.region == 'zachodniopomorskie'} selected{/if}>zachodniopomorskie</option>
											<option value="empty"{if $order.region == 'empty'} selected{/if}>nie dotyczy (zam. z zagr.)</option>
									   </select>
									</div>
								</li>
							</ul>
						</div>
					
						<div>
							<ul>
								<li>
									<p id="fname"><label for="f-name">Imię</label></p>
									<input type="text" id="f-name" name="fname">
								</li>
								
								<li>
									<p id="lname"><label for="l-name">Nazwisko</label></p>
									<input type="text" id="l-name" name="lname">
								</li>
								
								<li>
									<ul>
										<li>
											<p id="phone"><label for="f-phone">Telefon</label></p>
											<input type="text" value="" id="f-phone" name="phone">
										</li>
										<li>
											<p id="semail"><label for="f-email">E-mail</label></p>
											<input type="text" value="" id="f-email" name="semail">
										</li>
									</ul>
								</li>
								
								<li>
									<p id="signature"><label for="f-signature">Podpis autora zdjęć (wyświetlany pod każdą publikacją)</label></p>
									<input type="text" id="f-signature" name="signature">
								</li>
							</ul>
						</div>
					</div>
		
					<div id="reg-box">
						<p id="accept-reg">
							<input type="checkbox" name="accept-reg" id="accept-r" value="on"> <label for="accept-r">Zapoznałem się i akceptuję</label> <a href="{$staticStockUrl}/docs/regulamin.pdf" target="_new" style="color: #cc1000;">regulamin konkursu</a>
						</p>
						
						<p id="accept-data">
							<input type="checkbox" name="accept-data" id="accept-d" value="on"> <label for="accept-d">Wyrażam zgodę</label> na przetwarzanie moich danych osobowych przez STUDIO ATRIUM z siedzibą w Bielsku-Białej ul. Malczewskiego 1 w celach marketingowych - zgodnie z ustawą o ochronie danych osobowych z dnia 29 sierpnia 1997 r. (Dz.U. z 97 r. Nr 133 poz. 883).
						</p>
						
						<p id="accept-licence">
							<input type="checkbox" name="accept-licence" id="accept-l" value="on"> <label for="accept-l">Przesyłając zdjęcia do konkursu fotograficznego we wskazany w późniejszej korespondencji sposób, udzielam</label> jednocześnie nieodpłatnej licencji dla STUDIA ATRIUM na korzystanie ze zdjęć na polach eksploatacji wskazanych w <a href="/res/regulamin.pdf" target="_new" style="color: #cc1000;">regulaminie konkursu</a> fotograficznego tj. w szczególności w zakresie publikacji w katalogach, materiałach prasowych oraz na stronach internetowych będących własnością STUDIA ATRIUM.
						</p>
					</div>
					
					<div id="submit-box"><input type="submit" value="Wyślij zgłoszenie"></div>
				</fieldset>
			</form>
		</div>
	</div>
</div>