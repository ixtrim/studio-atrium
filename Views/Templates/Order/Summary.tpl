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
			<li><div><a href="{url module=order action=data}"><span class="data">Dane osobowe</span></a></div></li>
			<li class="selected"><div><span class="summary">Podsumowanie</span></div></li>
		</ul>
	</div>
</div>

<div class="wrapper">
	<div class="box">
		<div class="center">
			<p class="section">Twoje Zakupy</p>
			<table>
				<tbody>
					{foreach from=$basket item=_basket}
						{if $_basket.pid}
							<tr>	
								<td><a href="{$_basket.link}" class="external">{if $projects[$_basket.pid].name}{$projects[$_basket.pid].type|projectType:false:false} {$projects[$_basket.pid].name}{else}{$projects[$_basket.pid].type|projectType:false:false} {$projects[$_basket.pid].symbol_alpha} {$projects[$_basket.pid].symbol_num}{/if}{if $_basket.version == 'mirror'} <small>(odbicie lustrzane)</small>{else} <small>(wersja podstawowa)</small>{/if}</a></td>
								<td>{if $projects[$_basket.pid].discount}<span class="line">{$projects[$_basket.pid].price}</span>{/if} <span>{if $projects[$_basket.pid].discount}{$projects[$_basket.pid].price-$projects[$_basket.pid].discount}{else}{$projects[$_basket.pid].price}{/if}</span></td>
							{if $extras[$_basket.pid]}
								</tr>
								{foreach from=$extras[$_basket.pid] item=_extra}
									{$key = "cliSelExtras[`$_basket.pid`][`$_extra.extras.id`]"}
									{if $basketFormData[$key]}
										<tr class="padded">
											<td>
												- {$_extra.extras.name}{if $projects4extras[$_extra.extras.id]} {$projects4extras[$_extra.extras.id]|linkTitle}{/if}
											</td>
											<td><span>{if $_extra.package_price >= 0}{$_extra.package_price}{else}{$_extra.extras.price}{/if}</span></td>
										</tr>
										
											{if $_extra.extras.id == 23 && $fw[$_basket.pid]}
											<tr class="extrainfo"><td colspan="2">
												<p>Dane do projektu fotowoltaiki: </p>
												<ul>
													<li>planowana ilość osób zamieszkująca dom: <strong>{$fw[$_basket.pid]['lodger_count']}</strong></li>
													<li>ogrzewanie CO: <strong>{if $fw[$_basket.pid]['co'] == 1}kocioł stałopalny{else if $fw[$_basket.pid]['co'] == 2}kocioł gazowy{else}pompa ciepła{/if}</strong></li>
													<li>ogrzewanie CWU: <strong>{if $fw[$_basket.pid]['cwu'] == 1}kocioł stałopalny{else if $fw[$_basket.pid]['cwu'] == 2}kocioł gazowy{else}pompa ciepła{/if}</strong></li>
													<li>usytuowanie frontu budynku względem kierunków swiata: <strong>{$fw[$_basket.pid]['orientation']}</strong></li>
													<li>elementy zacieniające: <strong>{$fw[$_basket.pid]['shaders']}</strong></li>
												</ul>
												</td></tr>
											{/if}
										
										
									{/if}	
								{/foreach}
							{else}
								</tr>								
							{/if}
						{else}
							<tr>
								<td>{$mainExtras[$_basket.eid].name}{if $_basket.epid} dla projektu <a href="{url module=project action=item id=$_basket.epid link_title=$projects[$_basket.epid].name catalog='projekty-domow'}" class="external">{$projects[$_basket.epid].name}</a>{/if}</td>
								<td><span>{$_basket.price}</span></td>
							</tr>
						{/if}
					{/foreach}
					<tr class="line"><td>Koszty wysyłki</td><td><span>* {$basketFormData.deliveryPrice}</span></td></tr>
					{if $basketFormData.registerUserDiscount}
						<tr><td>Rabat za rejestrację</td><td><span class="red">-{$basketFormData.registerUserDiscount}</span></td></tr>
					{/if}
					{if $promoCode}
						<tr><td>{$promoCode.title} <small>(kod: {$promoCode.code})</small></td><td><span class="red">-{if $promoCode.discount_type == 'percent' && $promoCode.percent_discount_value}{$promoCode.percent_discount_value}{else}{$promoCode.discount_value}{/if}</span></td></tr>
					{/if}
					<tr class="line">
						<td>&nbsp;</td>
						<td>Razem <strong class="red">{$basketFormData.total}</strong></td>
					</tr>
				</tbody>
			</table>
			
			<p>* Promocyjna cena wysyłki dotyczy doręczenia tylko na terenie Polski.</p>
		</div>
		<div class="center morespaced">
			<p class="section">Płatność i wysyłka</p>
			<p class="up">{$paymentMethods[$basketFormData.payment_type]} - {$deliveryMethods[$basketFormData.dispatch_type]}</p>
			
			{if $basketFormData.payment_type == 'transfer'}
				<div class="info">
					<p>Numer konta: PKO BP O/Bielsko-Biała 81 1020 1390 0000 6102 0134 5404</p>
					<p>W tytule przelewu prosimy podać nazwę projektu lub dodatku.</p>
					<p>Zakupione towary zostaną wysłane po zaksięgowaniu wpłaty.</p>
				</div>
			{/if}
		</div>
		
		<div class="center morespaced">
			<p class="section">Twoje dane</p>
			<ul>
			{if $basketUserData.client_type == 'company'}
				<li>{$basketUserData.company_name}</li>
				<li>NIP: {$basketUserData.nip}</li>
				<li>&nbsp;</li>
			{/if}
				<li>{$basketUserData.fname} {$basketUserData.lname}</li>
				<li>{$basketUserData.address}</li>
				<li>{$basketUserData.postal_code} {$basketUserData.city}</li>
				<li>&nbsp;</li>
				<li>e-mail: {$basketUserData.email}</li>
				<li>telefon: {$basketUserData.phone}</li>
			{if $basketUserData.send_data == 1}
				<li>&nbsp;</li>
				<li><strong>Dane do wysyłki</strong></li>
				<li>&nbsp;</li>
				<li>{$basketUserData.send_fname} {$basketUserData.send_lname}</li>
				<li>{$basketUserData.send_address}</li>
				<li>{$basketUserData.send_postal_code} {$basketUserData.send_city}</li>
			{/if}
			{if $basketUserData.notes}
				<li>&nbsp;</li>
				<li><strong>Uwagi</strong></li>
				<li>{$basketUserData.notes}</li>
			{/if}
			</ul>
		</div>

		<div class="next">
			<form action="{url module=order action=store_summary}" method="post"><button class="order">Zamawiam</button></form>
		</div>
	</div>
</div>