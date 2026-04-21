<div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Znajdziemy dla Ciebie projekt</h1>
			</div>
		</div>
	</div>
</div>

<div class="wrapper">
	<div class="varia-box">
		<p class="center">Jeśli chcesz, aby konsultanci Studio Atrium pomogli Ci w znalezieniu projektu wypełnij i wyślij poniższy formularz.</p>
		
		<form action="{url module=varia action=send_helper}" method="post" id="project-helper-form" class="validable" data-validate="ProjectHelper.validate">
			<fieldset>
				<input name="module" type="hidden" value="varia">
				<input name="action" type="hidden" value="send_helper">
			
				<ul class="form-wrapper">
					<li>
						<ul>
							<li class="no-margin">
								<p>Rodzaj domu</p>
								<div>
									<input type="checkbox" name="house_type[]" value="ground" id="type-base"><label for="type-base">parterowy</label>
									<input type="checkbox" name="house_type[]" value="loft" id="type-loft"><label for="type-loft">parterowy z poddaszem użytkowym</label>
								</div>
							</li>
							<li>
								<div>
									<input type="checkbox" name="house_type[]" value="attic" id="type-attic"><label for="type-attic">parterowy ze strychem do adaptacji</label>
									<input type="checkbox" name="house_type[]" value="storey" id="type-storey"><label for="type-storey">piętrowy</label>
								</div>
							</li>
							<li>
								<p>Powierzchnia użytkowa</p>
								<div>
									<label class="small">od</label><input type="text" name="area_from" class="short"> 
									<label class="small">do</label><input type="text" name="area_to" class="short"> <span>m<sup>2</sup></span>
								</div>
							</li>
							<li>
								<label>Maks. szerokość działki</label><input type="text" name="parcel_width" class="short"> <span>m</span>
							</li>
							<li>
								<p>Rodzaj dachu</p>
								<div>
									<input type="checkbox" name="roof_type[]" value="two" id="roof-two"><label for="roof-two">dwuspadowy</label>
									<input type="checkbox" name="roof_type[]" value="multi" id="roof-multi"><label for="roof-multi">wielospadowy</label>
									<input type="checkbox" name="roof_type[]" value="flat" id="roof-flat"><label for="roof-flat">płaski</label>
								</div>
							</li>
							<li>
								<label>Ilość pokoi bez salonu</label><input type="text" name="room_count" class="short">
							</li>
							<li>
								<label>Ilość stanowisk garażowych</label><input type="text" name="garage_places" class="short">
							</li>
						</ul>
					</li>
					
					<li>
						<ul>
							<li>
								<p>Funkcjonalność i uwagi</p>
								<textarea name="notice" cols="1" rows="1"></textarea>
							</li>
							<li>
								<label>*E-mail </label><input type="text" name="email">
							</li>
							<li>
								<label>*Telefon </label><input type="text" name="phone">
							</li>
							<li>
								<p class="accept">
									<input type="checkbox" name="accept" id="regulations-accept" value="on"><label for="regulations-accept">* Wyrażam zgodę</label> na przetwarzanie moich danych osobowych w celu otrzymania odpowiedzi zgodnie z oświadczeniem. <span class="ajax-info" data-url="{url module=ajax action=get_consultant_regulations}">Szczegóły</span>
								</p>
							</li>
							<li class="no-margin">
								<input type="checkbox" name="newsletter" value="on" id="newsletter"><label for="newsletter">Chcę się zapisać do newslettera</label>
							</li>
							<li id="accept-newsletter-box" style="display: none;">
								<p class="accept">
									<input type="checkbox" name="accept_newsletter" id="newsletter-accept" value="on"> <label for="newsletter-accept">* Wyrażam zgodę</label> na przetwarzanie moich danych osobowych w celu otrzymywania informacji o promocjach i ofercie projektowej. <span class="ajax-info" data-url="{url module=ajax action=get_mailing_regulations}">Szczegóły</span>
								</p>
							</li>
							<li class="no-margin">
								<span class="small">* pola wymagane</span>
							</li>
							<li class="submit-box">
								<input class="baton" type="submit" value="wyślij">
							</li>
						</ul>
					</li>
				</ul>
			</fieldset>
		</form>
	</div>
</div>