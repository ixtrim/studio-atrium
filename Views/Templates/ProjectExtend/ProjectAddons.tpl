<div class="wrapper addons" id="addonsContent">
	<p><strong>Darmowe dodatki przy zakupie projektu {$project.name}</strong></p>
	<p>Warto kupować u żródła! Do każdego zakupionego projektu domu dodajemy atrakcyjny pakiet dodatków. Znajdą w nim Państwo projekty idealnie uzupełniające otoczenie domu, przydatne dodatki dla rozpoczynających proces budowlany.</p>

	<ul class="ajax-addons">
	{foreach $extras as $_extra}
		{if $_extra.package_price == 0}
		<li>
			<img src="{$stockPath}/{$_extra.extras.attachments.ExtrasImage[0].path}/{$_extra.extras.attachments.ExtrasImage[0].filename}" alt="{$_extra.extras.name}">
		</li>
			{if $_extra.extras.id == 19}
				{assign var=isVacuum value=1}
			{/if}
			{if $_extra.extras.id == 22}
				{assign var=isPhotovolt value=1}
			{/if}
		{/if}
	{/foreach}
	</ul>
	
	<p>W pakiecie dodatków otrzymują Państwo:</p>
	
	<ul class="dotted">
		<li><a href="/projekty/osadniki/">projekt osadnika</a> o wartości <strong>250 zł</strong></li>
		<li><a href="/projekty/altany">projekt altany ogrodowej</a> o wartości <strong>350 zł</strong></li>
		<li><a href="/projekty/ogrodzenia/">projekt ogrodzenia</a> o wartości <strong>320 zł</strong></li>
		<li>tablicę budowy o wartości <strong>35 zł</strong></li>
		<li>dziennik budowy o wartości <strong>20 zł</strong></li>
		<li>darmową wysyłkę o wartości <strong>25 zł</strong></li>
		<li>zgodę na zmiany</li>
		<li>charakterystykę energetyczną</li>
		<li>zestawienie materiałów</li>
		<li>rzut w skali 1:500 do zagospodarowania działki</li>
		<li><a href="/artykuly/Schematy-elementow-ogrodu-wsrod-gratisow-do-projektow-domow,1441.html" class="external">schematy rabatek ogrodowych</a></li>
		{if $isVacuum == 1}
			<li><a href="/artykuly/Schematy-centralnego-odkurzacza-w-projektach-domow-studia-atrium,1439.html" class="external">schemat centralnego odkurzacza</a> wart <strong>100 zł</strong></li>
		{/if}
		{if $isPhotovolt == 1}
			<li><a href="/artykuly/Projekty-instalacji-fotowoltaicznej-w-projektach-domow-studia-atrium,1449.html" class="external">projekt instalacji fotowoltaicznej</a> wart <strong>300 zł</strong></li>
		{/if}
	</ul>
	
	{if $isVacuum == 1 && $isPhotovolt == 1}<p>o łącznej wartości 1400 zł.</p>{elseif $isPhotovolt == 1}<p>o łącznej wartości 1300 zł.</p>{elseif $isVacuum == 1}<p>o łącznej wartości 1100 zł.</p>{else}<p>o łącznej wartości 1000 zł.</p>{/if}

	{foreach $extras as $_extra}
		{if strpos($_extra.extras.name, 'garaż') !== false}
		<div class="cleared">
			<img src="{$stockPath}/{$_extra.extras.attachments.ExtrasImage[0].path}/{$_extra.extras.attachments.ExtrasImage[0].filename}" alt="{$_extra.extras.name}">
			<p>PROMOCJA DODATKOWA: GARAŻ ZA <strong>{$_extra.extras.price}zł</strong>!</p>
			<p>Uruchomiliśmy specjalną propozycję dla Inwestorów, którzy oprócz budowy swojego nowego domu, przymierzają się do wybudowania teraz lub w przyszłości także niezależnego, dodatkowego garażu wolnostojącego. Kupując w naszej pracowni dowolny projekt domu otrzymacie Państwo możliwość zakupu wybranego projektu garażu wolnostojącego w promocyjnej cenie {$_extra.extras.price}zł!</p>
		</div>
		{/if}
		{if $_extra.id == 26}
		<div class="cleared">
			<img src="{$stockPath}/{$_extra.extras.attachments.ExtrasImage[0].path}/{$_extra.extras.attachments.ExtrasImage[0].filename}" alt="{$_extra.extras.name}">
			<p>PROMOCJA DODATKOWA: REKUPERACJA ZA <strong>{$_extra.package_price}</strong>zł!</p>
			<p>Kolejna ciekawa propozycja dla Inwestorów, którzy chcieliby w swoim nowym domu wykonać instalację rekuperacji. Teraz przy zakupie projektu domu {$project.name} w naszej pracowni, istnieje możliwość zamówienia schematu rekuperacji do tego projektu w promocyjnej cenie {$_extra.package_price}zł!</p>
		</div>
		{/if}
	{/foreach}
	<p class="notice">Uwaga! Wybór darmowych dodatków i/lub skorzystanie z promocji dodatkowych, dotyczy tylko bezpośrednich zamówień zrealizowanych za pośrednictwem strony internetowej oraz zamówień telefonicznych. Dodatki otrzymują tylko klienci indywidualni. Zapraszamy!</p>
	{if $projectParams|isAvailable}
		<p class="spaced"><strong>Płatne dodatki do projektu {$project.name}</strong></p>
	
		{foreach $extras_normal as $_extra}
			{if $_extra.package_price != 0 && strpos($_extra.extras.name, 'garaż') === false}
			<div class="cleared">
				<img src="{$stockPath}/{$_extra.extras.attachments.ExtrasImage[0].path}/{$_extra.extras.attachments.ExtrasImage[0].filename}" alt="{$_extra.extras.name}">
				<p>
					{$_extra.extras.description}
				</p>
				<p class="price">
					{$_extra.extras.price} zł
					<button class="order{if $_extra.extras|extrasInBasket:$project.id} disabled{/if}"{if !$_extra.extras|extrasInBasket:$project.id} data-epid="{$project.id}" data-thumb="{$stockPath}/{$_extra.extras.attachments.ExtrasImage[0].path}/{$_extra.extras.attachments.ExtrasImage[0].filename}" data-name="{$_extra.extras.name}" data-extras="{$_extra.extras.id}" data-price="{if $_extra.package_price > 0}{$_extra.package_price}{else}{$_extra.extras.price}{/if}"{/if}>{if $_extra.extras|extrasInBasket:$project.id}W koszyku{else}Do koszyka{/if}</button>
				</p>
			</div>
			{/if}
		{/foreach}
	{/if}	
</div>