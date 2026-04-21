<div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Twój koszyk</h1>
			</div>
		</div>
	</div>
</div>

<div class="options">
	<div class="box">
		<ul>
			<li><div><a href="{url module=order action=cart}"><span class="cart">Koszyk</span></a></div></li>
			<li class="selected"><div><span class="data">Dane osobowe</span></div></li>
			<li class="disabled"><div><span class="summary">Podsumowanie</span></div></li>
		</ul>
	</div>
</div>

<div class="wrapper">
	<div class="box">
		<form action="{url module=order action=data_store}" method="post" id="userDataForm" class="validable">
			<input type="hidden" name="module" value="order">
			<input type="hidden" name="action" value="data_store">
			
			<fieldset>
				<div class="rbox" id="radio-company-box">
					<input type="radio" name="client_type" id="client-person" value="person"{if !$basketUserData || $basketUserData.client_type == 'person'} checked{/if}><label for="client-person">Klient indywidualny</label>
					<input type="radio" name="client_type" id="client-company" value="company"{if $basketUserData.client_type == 'company'} checked{/if}><label for="client-company">Firma</label>
				</div>
				
				<div id="company-box" class="downspaced"{if !$basketUserData || $basketUserData.client_type == 'person'} style="display: none;"{/if}>
					<div class="block-box">
					<ul class="form-list">
						<li>
							<label for="company-name">Nazwa firmy</label>
							<input type="text" name="company_name" id="company-name" value="{$basketUserData.company_name}">
						</li>
						<li>
							<label for="nip">NIP</label>
							<input type="text" name="nip" id="nip" value="{$basketUserData.nip}">
						</li>
					</ul>
					</div>
				</div>
			
				<div class="block-box">
				<ul class="form-list">
					<li>
						<label for="fname">Imię</label>
						<input type="text" name="fname" id="fname" value="{$basketUserData.fname|default:$user.name}">
					</li>
					<li>
						<label for="lname">Nazwisko</label>
						<input type="text" name="lname" id="lname" value="{$basketUserData.lname|default:$user.surname}">
					</li>
					<li>
						<label for="postal-code">Kod pocztowy</label>
						<input type="text" name="postal_code" id="postal-code" value="{$basketUserData.postal_code}">
					</li>
					<li>
						<label for="city">Miejscowość</label>
						<input type="text" name="city" id="city" value="{$basketUserData.city}">
					</li>
					<li>
						<label for="address">Adres</label>
						<input type="text" name="address" id="address" value="{$basketUserData.address}">
					</li>
					<li>
						<label for="phone">Telefon</label>
						<input type="text" name="phone" id="phone" value="{$basketUserData.phone}">
					</li>
					<li>
						<label for="customer-email">E-mail</label>
						<input type="text" name="email" id="customer-email" value="{$basketUserData.email|default:$user.email}">
					</li>
				</ul>
				</div>
				
				<div class="cbox address">
					<input type="checkbox" name="send_data" id="send-data" value="1" {if $basketUserData.send_data == 1} checked{/if}><label for="send-data" class="down">Adres wysyłki inny niż na rachunku</label>
				</div>
				
				<div id="send-data-box" class="spaced"{if !$basketUserData || $basketUserData.send_data != 1} style="display: none;"{/if}>
					<div class="block-box">
					<ul class="form-list">
						<li>
							<label for="send-fname">Imię</label>
							<input type="text" name="send_fname" id="send-fname" value="{$basketUserData.send_fname}">
						</li>
						<li>
							<label for="send-lname">Nazwisko</label>
							<input type="text" name="send_lname" id="send-lname" value="{$basketUserData.send_lname}">
						</li>
						<li>
							<label for="send-postal-code">Kod pocztowy</label>
							<input type="text" name="send_postal_code" id="send-postal-code" value="{$basketUserData.send_postal_code}">
						</li>
						<li>
							<label for="send-city">Miejscowość</label>
							<input type="text" name="send_city" id="send-city" value="{$basketUserData.send_city}">
						</li>
						<li>
							<label for="send-address">Adres</label>
							<input type="text" name="send_address" id="send-address" value="{$basketUserData.send_address}">
						</li>
					</ul>
					</div>
				</div>
				
				<div class="tbox">
					<div class="block-box">
						<ul class="form-list">
							<li>
								<label>Uwagi</label>
								<textarea name="notes" cols="1" rows="1">{$basketUserData.notes}</textarea>
							</li>
						</ul>
					</div>
				</div>
				
				<div class="cbox">
					<input type="checkbox" name="accept_marketing" id="accept-marketing" value="1"{if $basketUserData.accept_marketing == 1} checked{/if}><label for="accept-marketing" class="down">* Wyrażam zgodę</label><label for="accept-marketing" class="down noback"> na przetwarzanie moich danych osobowych w celu realizacji zamówienia</label>. <span class="ajax-info" data-url="{url module=ajax action=get_customer_regulations}">Szczegóły</span>
				</div>
				
				<div class="cbox">
					<input type="checkbox" name="accept_mailing" id="accept-mailing" value="1"{if $basketUserData.accept_mailing == 1} checked{/if}><label for="accept-mailing" class="down">Wyrażam zgodę</label><label for="accept-mailing" class="down noback"> na otrzymywanie informacji o promocjach i ofercie projektowej</label>. <span class="ajax-info" data-url="{url module=ajax action=get_mailing_regulations}">Szczegóły</span>
				</div>
				
				{*
				<div class="cbox">
					<input type="checkbox" name="accept_isover" id="accept-isover" value="1"{if $basketUserData.accept_isover == 1} checked{/if}><label for="accept-isover" class="down">Wyrażam zgodę</label><label for="accept-isover" class="down noback"> na kontakt marketingowy przeprowadzany przez firmę ISOVER.</label>
				</div>
				*}
				<div class="cbox">
					<input type="checkbox" name="accept_regulations" id="accept-regulations" value="1"{if $basketUserData.accept_regulations == 1} checked{/if}><label for="accept-regulations" class="down">* Oświadczam</label><label for="accept-regulations" class="down noback">, że zapoznałem się i akceptuję</label> <a class="under" href="/dokumenty/Zasady-sprzedazy.html#regulamin" target="_blank">regulamin sprzedaży</a>
				</div>
				<div class="cbox">* oświadczenia wymagane</div>
			
				<div class="next">
					<button class="baton">Dalej</button>
				</div>
			</fieldset>
		</form>
	</div>
</div>