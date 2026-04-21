<div class="list-header activated on">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>
					<span>Oferty Budowy Domów</span>
				</h1>
				<p>Poniżej prezentujemy Państwu listę firm, które oferują Państwu <strong>budowę domu według konkretnego projektu z naszej pracowni</strong>. Wybraliśmy dla Państwa najciekawsze domy z oferty, 
				starając się zaprezentować propozycje budów różnego rodzaju budynków. Znajdziecie tu Państwo zarówno oferty firm specjalizujących się w budowie 
				tradycyjnych murowanych domów, jak i w technologii szkieletu drewnianego. Przycisk "zapytaj o ofertę" przy każdej propozycji przekieruje Państwa na stronę wykonawcy i umożliwi bezpośredni kontakt z daną firmą celem ustalenia szczegółów. Zapraszamy!</p>
			</div>
		</div>
	</div>
</div>

<div class="control-box">
	<ul>
		<li class="path"><a href="/">Studio Atrium</a> &raquo; oferty budowy domów</li>
	</ul>
</div>
<section>
	<div class="box">
		{capture $shuffle[0]}
		<div class="companyInfo">
			<a href="https://new-house.com.pl/" target="_blank" rel="nofollow"><img src="/img/company/newHouse.png" alt="New House" class="logo"></a>
			New House to firma posiadająca 25-cio letnie doświadczenie w kompleksowej budowie każdego rodzaju domów jednorodzinnych: parterowych, z poddaszem użytkowym, piętrowych, 
			jak również rezydencji w tradycyjnej oraz nowoczesnej architekturze. Swoją ofertę kieruje do Inwestorów na terenie całej Polski, a działalność opiera na wykwalifikowanych pracownikach, 
			z którymi w większości współpracuje nawet od kilkunastu lat. Stanowią oni fundament firmy i gwarancję dobrze wykonanej pracy. Na realizowane przez New House domy udzielana jest 10-cio letnia gwarancja.
		</div>
		<ul class="detail fav-wrapper">
		{foreach $newHouseList as $_project}
		{if $_project.extra_data.newHouse1}
			{if $_project.params_general|isGroundFloor:true}
				{$altTitle = "Projekt domu parterowego"}
			{elseif $_project.params_general|hasLoft:true}
				{$altTitle = "Projekt domu z poddaszem"}
			{elseif $_project.params_general|hasFloor:true}
				{$altTitle = "Projekt domu piętrowego"}
			{else}
				{$altTitle = "Projekt domu"}
			{/if}
			<li>
				<ul>
					<li class="render">
						<div>
							<a href="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}">
								<img src="{image type=render project=$_project size=list}" alt="{$altTitle} {$_project.name|strtoupper}">
							</a>
							<span id="compare-{$_project.id}" class="compare{if in_array($_project.id, $compareIds)} on{/if}" data-id="{$_project.id}"></span>
							<span id="fav-{$_project.id}" class="fav{if in_array($_project.id, $favouriteIds)} on{/if}" data-id="{$_project.id}"></span>
							{if $_project|isNew}<span class="label">Nowość</span>{/if}
						</div>
					</li>
					<li class="slide" data-id="{$_project.id}">
						<img id="img-{$_project.id}" data-src="{image type=sketch project=$_project}" src="{image type=sketch project=$_project size=list}" alt="Rzut parteru projektu {$_project.name}">
					</li>
					<li class="data">
						<h6><a href="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}">{$_project.name}</a></h6>
						
						<p>{$_project.short_description}</p>
						<ul>
							<li>{if $_project.type == 'skeleton'}wersja szkieletowa{else}wersja murowana{/if}</li>
							<li>powierzchnia użytkowa: <span>{$_project.params_general|usableArea}</span> m<sup>2</sup></li>
							<li>
								cena projektu: {if $_project.discount}<span class="discount">{$_project.price}</span>{$_project.price - $_project.discount}{else}{$_project.price}{/if} zł
							</li>
							<li class="line"></li>
							<li><h5>oferta budowy</h5></li>
							<li class="offer">stan surowy + dach: <strong>{$_project.extra_data.newHouse1|number_format:"0":".":" "} zł netto*</strong></li>
							{if $_project.extra_data.newHouse2}<li class="offer">stan deweloperski: <strong>{$_project.extra_data.newHouse2|number_format:"0":".":" "} zł netto*</strong></li>{/if}
							<li>
								<a href="/img/company/newHouse/{$_project.id}.pdf" target="_blank" class="button yellow">pobierz szczegóły (PDF)</a>
								<a href="/click.php?rel=jf34fvqjweiffh9q3h4f9h34hf384hfh4f" target="_blank" rel="nofollow" class="button red">zapytaj o ofertę</a>
							</li>	
						</ul>
					</li>
				</ul>
			</li>
		{/if}
		{/foreach}
		</ul>
		{/capture}
		
		{capture $shuffle[1]}
		<div class="companyInfo">
			<a href="https://formularz.apissa.pl/Atrium/" target="_blank" rel="nofollow"><img src="/img/company/apis.png" alt="Apis SA" class="logo"></a>
			Przedsiębiorstwo APIS S.A. zajmuje się budową domów według sprawdzonych, tradycyjnych metod z wykorzystaniem najnowocześniejszych technologii. Podczas produkcji oferowanych przez firmę drewnianych 
			domów pod klucz, wykorzystuje się suszone komorowo drewno drzew iglastych. Dzięki temu domy nie tylko wspaniale się prezentują, ale także są odporne na działanie większości negatywnych czynników, 
			w tym grzybów oraz owadów. Oferta przedsiębiorstwa obejmuje budowę zarówno domów w systemie szkieletowym prefabrykowanym, w tym domów kanadyjskich, jak i domów z bala.
		</div>
		<ul class="detail fav-wrapper">
		{foreach $apiList as $_project}
		{if $_project.extra_data.apis}
			{if $_project.params_general|isGroundFloor:true}
				{$altTitle = "Projekt domu parterowego"}
			{elseif $_project.params_general|hasLoft:true}
				{$altTitle = "Projekt domu z poddaszem"}
			{elseif $_project.params_general|hasFloor:true}
				{$altTitle = "Projekt domu piętrowego"}
			{else}
				{$altTitle = "Projekt domu"}
			{/if}
			<li>
				<ul>
					<li class="render">
						<div>
							<a href="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}">
								<img src="{image type=render project=$_project size=list}" alt="{$altTitle} {$_project.name|strtoupper}">
							</a>
							<span id="compare-{$_project.id}" class="compare{if in_array($_project.id, $compareIds)} on{/if}" data-id="{$_project.id}"></span>
							<span id="fav-{$_project.id}" class="fav{if in_array($_project.id, $favouriteIds)} on{/if}" data-id="{$_project.id}"></span>
							{if $_project|isNew}<span class="label">Nowość</span>{/if}
						</div>
					</li>
					<li class="slide" data-id="{$_project.id}">
						<img id="img-{$_project.id}" data-src="{image type=sketch project=$_project}" src="{image type=sketch project=$_project size=list}" alt="Rzut parteru projektu {$_project.name}">
					</li>
					<li class="data">
						<h6><a href="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}">{$_project.name}</a></h6>
						
						<p>{$_project.short_description}</p>
						<ul>
							<li>{if $_project.type == 'skeleton'}wersja szkieletowa{else}wersja murowana{/if}</li>
							<li>powierzchnia użytkowa: <span>{$_project.params_general|usableArea}</span> m<sup>2</sup></li>
							<li>
								cena projektu: {if $_project.discount}<span class="discount">{$_project.price}</span>{$_project.price - $_project.discount}{else}{$_project.price}{/if} zł
							</li>
							<li class="line"></li>
							<li><h5>oferta budowy</h5></li>
							<li class="offer">stan deweloperski z fundamentem i instalacjami<br>od <strong>{$_project.extra_data.apis|number_format:"0":".":" "} zł netto*</strong></li>
							<li>
								<a href="https://formularz.apissa.pl/Atrium/?projekt={$_project.name}&link=https://www.studioatrium.pl/{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}" target="_blank" rel="nofollow" class="button red">zapytaj o bezpłatną ofertę</a>
							</li>	
						</ul>
					</li>
				</ul>
			</li>
		{/if}
		{/foreach}
		</ul>
		{/capture}
	
		{$smarty.capture.company1}
		<br><p class="line">&nbsp;</p><br>
		{$smarty.capture.company2}
		
		<br><p class="line">&nbsp;</p><br>
		<p><strong>* Uwaga! W związku z aktualną dynamiczną sytuacją na rynku budowlanym związaną z ciągłymi zmianami cen materiałów budowlanych oraz usług, podane wyceny mogą ulec zmianie. Staramy się, by firmy uaktualniały je na bieżąco. O szczegóły wybranej oferty zapytaj jednak konsultanta z danej firmy budowlanej.</strong></p>
		<br><p>&nbsp;</p>
	</div>
</section>

	
{if $list}
{include file="Include/HowToBuy.tpl"}
{/if}

{if $isSearch && !$request.query}
<div id="backToTopOnList"></div>
{/if}
