<div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Nasz katalog domów</h1>
			</div>
		</div>
	</div>
</div>
{if $isPayAvailable == 0}
{literal}<style>p.pay { display: none;}</style>{/literal}
{/if}

<div class="options">
	<div class="box">
		<ul>
			<li class="selected"><div><a href="{url module=catalog action=form}"><span class="free">Bezpłatny</span></a></div></li>
			<li><div><a href="/katalog-projektow-online.html"><span class="free">Online</span></a></div></li>
			{if $isPayAvailable == 1}<li><div><a href="{url module=catalog action=form_pay}"><span class="nonfree" id="similiar">Płatny</span></a></div></li>{/if}
		</ul>
	</div>
</div>
<div class="wrapper">
	<div class="box">
	
		<div class="text-box">
			{$description.content|fixArticleContent:$description.id}
		</div>
	{*
		<div class="text-box">
			Jeżeli chcesz zamówić <strong>bezpłatny</strong> egzemplarz katalogu z naszymi projektami, wypełnij poniższy formularz.
		</div>
	*}
	{*
		{if $user}
		<form class="validable default" action="{url module=catalog action=order}" method="post" id="catalog-form">
			<fieldset>
				<input name="module" type="hidden" value="catalog">
				<input name="action" type="hidden" value="order">
				<input name="type" type="hidden" value="normal">
			
				<div class="cat-form-box">
					<div>
						<img src="{$staticDocs}/{$description.id}/{$description.extra_data.thumbnail}" alt="Bezpłatny katalog projektów Studio Atrium">
						
						<div class="agree">
							<div><input type="checkbox" name="accept" id="accept"> <label for="accept" class="txt">Wyrażam zgodę</label> na przetwarzanie moich danych osobowych w celu realizacji zamówienia zgodnie z oświadczeniem. <span class="ajax-info" data-url="{url module=ajax action=get_customer_regulations}">Szczegóły</span></div>
							
							<div><input type="checkbox" name="accept2" id="accept2"> <label for="accept2" class="txt">Wyrażam zgodę</label> na otrzymywanie informacji o promocjach i ofercie projektowej. <span class="ajax-info" data-url="{url module=ajax action=get_mailing_regulations}">Szczegóły</span></div>
							
						</div>
					</div>
					
					<div>
						<ul>
							<li>
								<label for="fname">Imię</label>
								<input type="text" name="fname" id="fname" value="{$user.name}">
							</li>
							<li>
								<label for="lname">Nazwisko</label>
								<input type="text" name="lname" id="lname" value="{$user.surname}">
							</li>
							<li>
								<label for="city">Miejscowość</label>
								<input type="text" name="city" id="city">
							</li>
							<li>
								<label for="street">Ulica</label>
								<input type="text" name="street" id="street">
							</li>
							<li>
								<label for="number">Nr domu (lokalu)</label>
								<input type="text" name="number" id="number">
							</li>
							<li>
								<label for="postalcode">Kod pocztowy</label>
								<input type="text" name="postalcode" id="postalcode">
							</li>
							<li>
								<label for="phone">Telefon</label>
								<input type="text" name="phone" id="phone" value="{$user.props.phone}">
							</li>
							<li>
								<label for="customer-email">E-mail</label>
								<input type="text" name="email" id="customer-email" value="{$user.email}">
							</li>
						</ul>
					</div>
				</div>
				
				<div class="center"><input type="submit" value="Zamawiam" class="baton"></div>
			</fieldset>
			
		</form>
		{/if}
		*}
	</div>
</div>