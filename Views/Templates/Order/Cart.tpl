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
			<li class="selected"><div><span class="cart">Koszyk</span></div></li>
			<li class="disabled"><div><span class="data">Dane osobowe</span></div></li>
			<li class="disabled"><div><span class="summary">Podsumowanie</span></div></li>
		</ul>
	</div>
</div>
{$sum = 0}
<div class="wrapper">
	<div class="box" id="basketMainContent">
	<form action="#" method="post" id="basketForm">
	{$isHouseProjectOnList = false}
	{$projectsPercentId = null}
	{foreach from=$basket item=_basket}
		{if $_basket.pid}
			{$projectsId[$_basket.pid] = $_basket.pid}
			{if $projects[$_basket.pid].type == 'house' || $projects[$_basket.pid].type == 'skeleton'}
				{$isHouseProjectOnList = true}
				{$projectsPercentId[$_basket.pid] = $_basket.pid}
			{elseif $projects[$_basket.pid].type == 'garage'}
				{$projectsPercentId[$_basket.pid] = $_basket.pid}
			{/if}
			<ul class="item">
				<li>
					<div>
					<a href="{$_basket.link}"><img src="{if $_basket.version == 'mirror'}{image type=render project=$projects[$_basket.pid] mirror=1}{else}{image type=render project=$projects[$_basket.pid] size=list}{/if}" alt="{if $projects[$_basket.pid].name}{$projects[$_basket.pid].name}{else}{$projects[$_basket.pid].type|projectType:false:true} {$projects[$_basket.pid].symbol_alpha} {$projects[$_basket.pid].symbol_num}{/if}"></a>
					
					<p class="title big" data-pid="{$_basket.pid}"><a href="{$_basket.link}">{if $projects[$_basket.pid].name}{$projects[$_basket.pid].name}{else}{$projects[$_basket.pid].type|projectType:false:true} {$projects[$_basket.pid].symbol_alpha} {$projects[$_basket.pid].symbol_num}{/if}{if $_basket.version == 'mirror'} <small>(odbicie lustrzane)</small>{else} <small>(wersja podstawowa)</small>{/if}</a>{if $projects[$_basket.pid].type == 'house' || $projects[$_basket.pid].type == 'skeleton' || $projects[$_basket.pid].type == 'garage' || $projects[$_basket.pid].type == 'outbuilding'} {if $_basket.version == 'mirror'}<a href="javascript:" class="changeVersion" data-pid="{$_basket.pid}" data-version="normal">zmień wersję na podstawową &raquo;</a>{else}<a href="javascript:" class="changeVersion" data-pid="{$_basket.pid}" data-version="mirror">zmień na lustrzane odbicie &raquo;</a>{/if}{/if}</p>	
					
					{if !$params[$_basket.pid]|isAvailable}
						<p class="notice">Zamawiasz projekt w fazie koncepcyjnej - zapytaj o termin realizacji.</p>
						<p>Po złożeniu zamówienia nasz pracownik skontaktuje się w sprawie ustalenia terminu. Poprosimy Cię także o wpłatę 30% zadatku - wyślemy mailem fakturę proforma do opłacenia.<br /><br /><br /></p>
					{else if $params[$_basket.pid]|isWT2021needful}
						{if $params[$_basket.pid]|isWT2021needfulHeat}
							<p class="notice">Uwaga! Ze względu na obowiązujące od 01.01.2021 nowe warunki techniczne <strong>WT2021</strong>, konieczna będzie korekta projektu <strong>w zakresie ogrzewania</strong>, dodatkowo wymiary zewnętrzne bryły mogą ulec zmianie do kilkunastu cm. Zapytaj o termin realizacji!</p>
						{else}
							<p class="notice">Uwaga! Ze względu na obowiązujące od 01.01.2021 nowe warunki techniczne <strong>WT2021</strong>, konieczna będzie korekta projektu, przez co wymiary zewnętrzne bryły mogą ulec zmianie do kilkunastu cm. Czas realizacji projektu to około 2 miesiące.</p>						
						{/if}
					{else if $params[$_basket.pid]|isWT2021needfulHeat}
						<p class="notice">Uwaga! Ze względu na obowiązujące od 01.01.2021 nowe warunki techniczne <strong>WT2021</strong>, konieczna będzie korekta projektu <strong>w zakresie ogrzewania</strong>. Zapytaj o termin realizacji!</p>
					{else if $params[$_basket.pid]|isReady7days}
						<p class="notice">Dostępność projektu: <strong>7-14 dni</strong>.</p>
						{*<p class="notice">Dostępność projektu: <strong>około 30 dni</strong> - zapytaj o termin realizacji.</p>*}
					{else if $params[$_basket.pid]|isReady14days}
						{*<p class="notice">Dostępność projektu: <strong>14-21 dni</strong>.</p>*}
						<p class="notice">Dostępność projektu: <strong>7-14 dni</strong>.</p>
						{*<p class="notice">Dostępność projektu: <strong>około 30 dni</strong> - zapytaj o termin realizacji.</p>*}
					{else if $params[$_basket.pid]|isNarrowGarage}
						<p class="notice">Uwaga! W związku ze zmianą przepisów, projekt wymaga korekty szerokości garażu - zapytaj o termin realizacji.</p>
					{/if}

					{if $projects[$_basket.pid].type == 'fence'}
						<p>Komplet składa się z <strong>dwóch</strong> egzemplarzy projektu architektoniczno-budowlanego.</p>
					{elseif $projects[$_basket.pid].type == 'arbor'}
						<p>Komplet składa się z <strong>trzech</strong> egzemplarzy projektu architektoniczno-budowlanego.</p>
					{elseif $projects[$_basket.pid].type != 'tank' || $projects[$_basket.pid].type != 'carport'}
						<p>Zawartość dokumentacji projektowej:
						<br>- <strong>3 egzemplarze</strong> projektu architektoniczno-budowlanego,
    					{if $projects[$_basket.pid].type == 'garage'}<br>- <strong>3 egzemplarze</strong> projektu technicznego (konstrukcja oraz instalacja elektryczna).{elseif $projects[$_basket.pid].type != 'carport' && $projects[$_basket.pid].type != 'tank'}<br>- <strong>3 egzemplarze</strong> projektu technicznego (konstukcja, charakt. energetyczna oraz instalacje).{/if}</p>
					{/if}
					</div>
				</li>
				<li class="price">{if $projects[$_basket.pid].discount}<span>{$projects[$_basket.pid].price} zł</span><br>{/if}<strong>{if $projects[$_basket.pid].discount}{$projects[$_basket.pid].price-$projects[$_basket.pid].discount}{else}{$projects[$_basket.pid].price}{/if}</strong> zł</li>
				<li><span class="remove" data-project="{$_basket.pid}" data-version="{$_basket.version}"></span></li>
				{if $projects[$_basket.pid].discount}		
					{$sum = $sum + ($projects[$_basket.pid].price-$projects[$_basket.pid].discount)}
				{else}		
					{$sum = $sum + $projects[$_basket.pid].price}
				{/if}	
			</ul>

			{if $extras[$_basket.pid]}
			<ul class="sub-item pointer">
				<li>
					<p class="header">Dodatki do projektu</p>
				</li>
				<li class="price">&nbsp;</li>
				<li>&nbsp;</li>
			</ul>
			
			{foreach from=$extras[$_basket.pid] item=_extra}
			<ul class="sub-item">
				<li>
					<div{if $_extra.extras.id == 23} id="fotowoltaika"{/if}>
						<img src="{$stockPath}/{$_extra.extras.attachments.ExtrasImage[0].path}/{$_extra.extras.attachments.ExtrasImage[0].filename}" alt="{$_extra.extras.name}">
						<p class="title">{$_extra.extras.name}</p>
						<p>{$_extra.extras.description}</p>
						{if $_extra.extras.is_group && $_extra.extras.project_list_id}
							{$group = explode(",", $_extra.extras.project_list_id)}
							{$firstArray = array_values($group)}
							{$first = $firstArray[0]}
							<input name="extras4project[{$_basket.pid}][{$_extra.extras.id}_{$_basket.version == 'mirror'}]" id="selector_{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}" type="hidden" value="{$first}">
							<div id="selector-extras_{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}" class="selectorExtrasWrapper">
								<p class="subtitle">Wybierz z listy:</p>
								{foreach from=$group item=proId name=group}
									{if $projectsForExtras[$proId].type == 'garage'}
										<span class="overview" id="overview_{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}_{$proId}" data-pid="{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}" data-id="{$proId}" data-img="{image type=render project=$projectsForExtras[$proId] size=presentation}" data-link="{url module=project action=item id=$proId link_title=$projectsForExtras[$proId]|linkTitle catalog=$projectsForExtras[$proId].type|projectCatalog}" data-name="{$projectsForExtras[$proId].type|projectType:false:true} {$projectsForExtras[$proId]|linkTitle}" data-area="{$projectsForExtras[$proId].params_general|usableArea}" data-total-area="{$projectsForExtras[$proId].params_general|totalArea}" data-height="{$projectsForExtras[$proId].params_general|garageHeight}" data-angle="{$projectsForExtras[$proId].params_general|roofAngle}" data-txt="{$projectsForExtras[$proId].short_description}">
											<img src="{image type=render project=$projectsForExtras[$proId] size=list}"{if $first == $proId} class="selected"{/if}>
										</span>
									{elseif $projectsForExtras[$proId].type == 'house' || $projectsForExtras[$proId].type == 'skeleton'}
										<span class="overview" id="overview_{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}_{$proId}" data-pid="{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}" data-id="{$proId}" data-img="{image type=render project=$projectsForExtras[$proId] size=presentation}" data-link="{url module=project action=item id=$proId link_title=$projectsForExtras[$proId]|linkTitle catalog=$projectsForExtras[$proId].type|projectCatalog}" data-name="{$projectsForExtras[$proId]|linkTitle}" data-area="{$projectsForExtras[$proId].params_general|usableArea}" data-total-area="{$projectsForExtras[$proId].params_general|totalArea}" data-parcel="{$projectsForExtras[$proId].params_general|parcelWidth} x {$projectsForExtras[$proId].params_general|parcelHeight}" data-height="{$projectsForExtras[$proId].params_general|houseHeight}" data-angle="{$projectsForExtras[$proId].params_general|roofAngle}" data-version="{if $projectsForExtras[$proId].type == 'skeleton'}wersja szkieletowa{else}wersja murowana{/if}" data-txt="{$projectsForExtras[$proId].short_description}">
											<img src="{image type=render project=$projectsForExtras[$proId] size=list}"{if $first == $proId} class="selected"{/if}>
										</span>
									{elseif $projectsForExtras[$proId].type == 'fence'}
										<span class="overview" id="overview_{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}_{$proId}" data-pid="{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}" data-id="{$proId}" data-img="{image type=render project=$projectsForExtras[$proId] size=presentation}" data-link="{url module=project action=item id=$proId link_title=$projectsForExtras[$proId]|linkTitle catalog=$projectsForExtras[$proId].type|projectCatalog}" data-name="{$projectsForExtras[$proId].type|projectType:false:true} {$projectsForExtras[$proId]|linkTitle}" data-span="{$projectsForExtras[$proId].params_general|fenceSpanHeight}" data-roofing="{$projectsForExtras[$proId].params_general|fenceRoofHeight}" data-txt="{$projectsForExtras[$proId].short_description}">
											<img src="{image type=render project=$projectsForExtras[$proId] size=list}"{if $first == $proId} class="selected"{/if}>
										</span>
									{elseif $projectsForExtras[$proId].type == 'arbor'}
										<span class="overview" id="overview_{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}_{$proId}" data-pid="{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}" data-id="{$proId}" data-img="{image type=render project=$projectsForExtras[$proId] size=presentation}" data-link="{url module=project action=item id=$proId link_title=$projectsForExtras[$proId]|linkTitle catalog=$projectsForExtras[$proId].type|projectCatalog}" data-name="{$projectsForExtras[$proId].type|projectType:false:true} {$projectsForExtras[$proId]|linkTitle}" data-area="{$projectsForExtras[$proId].params_general|usableArea}" data-total-area="{$projectsForExtras[$proId].params_general|totalArea}" data-height="{$projectsForExtras[$proId].params_general|arborHeight}" data-angle="{$projectsForExtras[$proId].params_general|roofAngle}" data-txt="{$projectsForExtras[$proId].short_description}">
											<img src="{image type=render project=$projectsForExtras[$proId] size=list}"{if $first == $proId} class="selected"{/if}>
										</span>
									{elseif $projectsForExtras[$proId].type == 'carport'}
										<span class="overview" id="overview_{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}_{$proId}" data-pid="{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}" data-id="{$proId}" data-img="{image type=render project=$projectsForExtras[$proId] size=presentation}" data-link="{url module=project action=item id=$proId link_title=$projectsForExtras[$proId]|linkTitle catalog=$projectsForExtras[$proId].type|projectCatalog}" data-name="{$projectsForExtras[$proId].type|projectType:false:true} {$projectsForExtras[$proId]|linkTitle}" data-area="{$projectsForExtras[$proId].params_general|usableArea}" data-total-area="{$projectsForExtras[$proId].params_general|totalArea}" data-height="{$projectsForExtras[$proId].params_general|carportHeight}" data-angle="{$projectsForExtras[$proId].params_general|roofAngle}" data-txt="{$projectsForExtras[$proId].short_description}">
											<img src="{image type=render project=$projectsForExtras[$proId] size=list}"{if $first == $proId} class="selected"{/if}>
										</span>
									{elseif $projectsForExtras[$proId].type == 'tank'}
										<span class="overview" id="overview_{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}_{$proId}" data-pid="{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}" data-id="{$proId}" data-img="{image type=render project=$projectsForExtras[$proId] size=presentation}" data-link="{url module=project action=item id=$proId link_title=$projectsForExtras[$proId]|linkTitle catalog=$projectsForExtras[$proId].type|projectCatalog}" data-name="{$projectsForExtras[$proId].type|projectType:false:true} {$projectsForExtras[$proId]|linkTitle}" data-build-area="{$projectsForExtras[$proId].params_general|buildArea}" data-cubature="{$projectsForExtras[$proId].params_general|cubature}" data-txt="{$projectsForExtras[$proId].short_description}">
											<img src="{image type=render project=$projectsForExtras[$proId] size=list}"{if $first == $proId} class="selected"{/if}>
										</span>
									{/if}	
								{/foreach}
							</div>
						{/if}
						{if $_extra.extras.id == 23} {* Fotowoltaika *}
							<div id="selector-extras_{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}" class="selectorExtrasWrapper">
								<p class="subtitle" id="{$_basket.pid}-extrainfo">Aby jak najlepiej dopasawać instalację fotowoltaiczną do wybranego projektu domu prosimy odpowiedzieć na poniższe pytania:</p>
							
								<ul>
									<li class="topic">a) Wymagane do określenia zapotrzebowania energetycznego:</li>
									<li class="spaced">- planowana ilość osób zamieszkująca dom <input type="text" id="fw-{$_basket.pid}-lodger-count" name="fw[{$_basket.pid}][lodger_count]" value="{$fw[$_basket.pid]['lodger_count']}"></li>
									<li class="spaced">- jakie ogrzewanie CO będzie zastosowane (kocioł stałopalny, gazowy, pompa ciepła)</li>
									<li> <input type="radio" id="fw-{$_basket.pid}-co-1" name="fw[{$_basket.pid}][co]" value="1"{if $fw[$_basket.pid]['co'] == 1} checked{/if}><label for="fw-{$_basket.pid}-co-1" class="spaced breaker">kocioł stałopalny</label> <input type="radio" id="fw-{$_basket.pid}-co-2" name="fw[{$_basket.pid}][co]" value="2"{if $fw[$_basket.pid]['co'] == 2} checked{/if}><label for="fw-{$_basket.pid}-co-2" class="spaced breaker">kocioł gazowy</label> <input type="radio" id="fw-{$_basket.pid}-co-3" name="fw[{$_basket.pid}][co]" value="3"{if $fw[$_basket.pid]['co'] == 3} checked{/if}><label for="fw-{$_basket.pid}-co-3" class="spaced breaker">pompa ciepła</label></li>
									<li class="spaced">- jakie ogrzewanie CWU będzie zastosowane (kocioł stałopalny, gazowy, pompa ciepła)</li>
									<li> <input type="radio" id="fw-{$_basket.pid}-cwu-1" name="fw[{$_basket.pid}][cwu]" value="1"{if $fw[$_basket.pid]['cwu'] == 1} checked{/if}><label for="fw-{$_basket.pid}-cwu-1" class="spaced breaker">kocioł stałopalny</label> <input type="radio" id="fw-{$_basket.pid}-cwu-2" name="fw[{$_basket.pid}][cwu]" value="2"{if $fw[$_basket.pid]['cwu'] == 2} checked{/if}><label for="fw-{$_basket.pid}-cwu-2" class="spaced breaker">kocioł gazowy</label> <input type="radio" id="fw-{$_basket.pid}-cwu-3" name="fw[{$_basket.pid}][cwu]" value="3"{if $fw[$_basket.pid]['cwu'] == 3} checked{/if}><label for="fw-{$_basket.pid}-cwu-3" class="spaced breaker">pompa ciepła</label></li>
								
									<li class="topic spaced">b) Wymagane do zaprojektowania instalacji:</li>
									<li>- usytuowanie frontu budynku względem kierunków swiata (wymagane do wyboru połaci do obłożenia) <input type="text" class="wide" id="fw-{$_basket.pid}-orientation" name="fw[{$_basket.pid}][orientation]" value="{$fw[$_basket.pid]['orientation']}"></li>
									<li class="spaced">- ustalenie elementów zacieniających takich jak drzewa, inne budynki itp. (wymień jeżeli są takowe). <input type="text" class="wide" id="fw-{$_basket.pid}-shaders" name="fw[{$_basket.pid}][shaders]" value="{$fw[$_basket.pid]['shaders']}"></li>
								</ul>
							
							</div>
						{/if}
					</div>
				</li>
				<li class="price off" id="price-extras_{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}" data-price="{if $_extra.package_price >= 0}{$_extra.package_price}{else}{$_extra.extras.price}{/if}">{if $_extra.package_price >= 0}{if $_extra.package_price < $_extra.extras.price}<span class="oldPrice">{$_extra.extras.price} zł</span> {/if}{$_extra.package_price}{else}{$_extra.extras.price}{/if} zł</li>
				<li><input name="cliSelExtras[{$_basket.pid}][{$_extra.extras.id}]" value="{$_extra.extras.id}" type="checkbox" data-type="{if $_extra.extras.is_group && $_extra.extras.project_list_id}group{elseif $_extra.extras.id==23}group{else}normal{/if}" id="add-extras_{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}"><label for="add-extras_{$_basket.pid}_{$_extra.extras.id}_{$_basket.version == 'mirror'}"></label></li>
			</ul>
			{/foreach}
			{/if}
		{else}
			<ul class="item">
				<li>
					<div>
						<img src="{$stockPath}/{$mainExtras[$_basket.eid].attachments.ExtrasImage[0].path}/{$mainExtras[$_basket.eid].attachments.ExtrasImage[0].filename}" alt="{$mainExtras[$_basket.eid].name}">
					
						<p class="title big">{$mainExtras[$_basket.eid].name}{if $_basket.epid} dla projektu <a href="{url module=project action=item id=$_basket.epid link_title=$projects[$_basket.epid].name catalog='projekty-domow'}">{$projects[$_basket.epid].name}</a>{/if}</p>
						<p>{$mainExtras[$_basket.eid].description}</p>
					</div>
				</li>
				<li class="price"><strong>{$_basket.price}</strong> zł</li>
				<li><span class="remove" data-extras="{$_basket.eid}"></span></li>
				{$sum = $sum + $_basket.price}
			</ul>
		{/if}
	{/foreach}
	<ul class="item">
		<li>
			<div>
				<p class="up">Sposób wysyłki</p>

				<div class="select-wrapper">
					<div class="jui-select-box dark" id="dispatch-box">
						<select name="dispatch_type" id="dispatch-type" data-min-payment="{$minPayment}">
							{foreach $deliveryMethods as $key => $delivery}
								<option value="{$key}"{if !is_array($deliveryCosts[$key])} data-payment-{$key}="{$deliveryCosts[$key]}"{else}{foreach $deliveryCosts[$key] as $cost} data-payment-{$cost@key}="{$cost}"{/foreach}{/if}{if $dispatchType == $key} selected{/if}>
									{$delivery}
								</option>
							{/foreach}
						</select>
					</div>
				</div>
			</div>
			
			<div>
				<p class="up">Sposób płatności</p>

				<div class="select-wrapper">
					<div class="jui-select-box dark" id="payment-box">
						<select name="payment_type" id="payment-type">
							{foreach $paymentMethods as $key => $method}
								{if $key != 'online' || $allProjectsAvailable}
								<option value="{$key}"{if $paymentType == $key} selected{/if}>{$method}</option>
								{/if}
							{/foreach}
							
							{* sandbox test *}
								{* if $allowOnlinePayment == 1}
									<option value="online">Płatność online</option>
								{/if *}
						</select>
					</div>
				</div>
				
				{* if $sandbox == 1}
				<p style="margin-top: 16px; font-size: 1.4rem; color: #cc1000;">Z uwagi na prace techniczne płatność online jest chwilowo niedostępna. W razie potrzeby prosimy o kontakt z konsultantem: tel. 33 822 94 96</p>
				{/if *}
			</div>
			
			<div id="transfer-info" style="display: none;">
				<p>Numer konta: PKO BP O/Bielsko-Biała 81 1020 1390 0000 6102 0134 5404</p>
				<p>W tytule przelewu prosimy podać nazwę projektu lub dodatku.</p>
				<p>Zakupione towary zostaną wysłane po zaksięgowaniu wpłaty.</p>
			</div>
		</li>
		<li class="price"><strong id="deliveryPrice">* 0</strong> zł</li>
		<li>&nbsp;</li>
	</ul>
	<input type="hidden" name="deliveryPrice" id="deliveryPriceField" value="0">
	{if $user && $isHouseProjectOnList}
		<ul class="item" id="discount-field-100">
			<li>
				<div>
					<p class="up">Rabat za rejestrację</p>
				</div>
			</li>
			<li class="price"><strong>-100</strong> zł</li>
			<li>&nbsp;</li>
			{$sum = $sum-100}
		</ul>
		<input type="hidden" name="registerUserDiscount" id="registerUserDiscount" value="100">
	{/if}
	<ul class="item" id="discount-field" style="display: none;">
		<li>
			<div>
				<p class="up"><span id="discount-name"></span></p>
			</div>
		</li>
		<li class="price"><strong>-<span id="discount-value"></strong> zł</li>
		<li>&nbsp;</li>
	</ul>
		
	<div class="discount-box">
		{if $projectsId}
			<input type="hidden" name="projectsId" value="{implode(",", $projectsId)}" id="projects-id">
			<input type="hidden" name="projectsPercentId" value="{implode(",", $projectsPercentId)}" id="projects-percent-id">
			<input type="hidden" name="discountCodeHidden" id="discount-code-hidden">
			<p><label for="discount-code">Kod rabatowy</label><input type="text" name="discount_code" id="discount-code"> <span id="check-code">zatwierdź kod</span></p>
			<p id="discount_result" style="display: none;">Trwa weryfikowanie kodu...</p>
		{/if}
		<p class="total">Razem <span id="basketTotal">{$sum}</span></p>
	</div>
	
	<p style="margin-top: 32px;">* Promocyjna cena wysyłki dotyczy doręczenia tylko na terenie Polski.</p>
			
	<div class="next">
		<input type="hidden" name="total" id="basketTotalInput" value="{$sum}">
		<button class="baton" id="sendButton">Dalej</button>
	</div>
	</form>
	</div>
</div>
<div class="overlay">
	<div class="overlay-project-box" id="over-pop">
		<div id="over-img-box">
			<ul id="over-pics">
				<li><span id="over-render" class="selected">Wizualizacja</span></li>
			</ul>
		
			<a href="" target="_blank">
				<img id="over-img" src="/img/dummy.png" alt="Render">
			</a>
		</div>

		<ul id="over-params">
			<li><h6 id="over-name"></h6></li>
			<li class="small"><span id="over-txt"></span></li>
			<li><span id="over-version"></span></li>
			<li id="over-area-wrapper"><p>powierzchnia użytkowa: <span id="over-area"></span> m<sup>2</sup></p></li>
			<li id="over-total-area-wrapper"><p>powierzchnia całkowita: <span id="over-total-area"></span> m</p></li>
			<li id="over-height-wrapper"><p>wysokość: <span id="over-height"></span> m</p></li>
			<li id="over-angle-wrapper"><p>kąt nachylenia dachu: <span id="over-angle"></span></p></li>
			<li id="over-parcel-wrapper"><p>min. wymiary działki: <span id="over-parcel"></span> m</p></li>
			<li id="over-span-height-wrapper"><p>wysokość przęsła: <span id="over-span-height"></span> cm</p></li>
			<li id="over-roof-height-wrapper"><p>wysokość zadaszenia: <span id="over-roofing-height"></span> cm</p></li>
			<li id="over-build-area-wrapper"><p>powierzchnia zabudowy: <span id="over-build-area"></span> m<sup>2</sup></p></li>
			<li id="over-cubature-wrapper"><p>kubatura brutto: <span id="over-cubature"></span> m<sup>3</sup></p></li>
			<li><a href="" class="more" target="_blank">Zobacz szczegóły</a></li>
			<li><span class="select" id="selectorDataPid">Wybierz</span></li>
		</ul>
	</div>
	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div>