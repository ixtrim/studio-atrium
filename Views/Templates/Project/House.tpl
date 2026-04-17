<div class="project-box house">
{if $projectParams|isGroundFloor}
	{$altTitle = "Projekt domu parterowego"}
{elseif $projectParams|hasLoft}
	{$altTitle = "Projekt domu z poddaszem"}
{elseif $projectParams|hasFloor}
	{$altTitle = "Projekt domu piętrowego"}
{else}
	{$altTitle = "Projekt domu"}
{/if}
	<div id="render-box" class="render-box{if $request.version == 'mirror'} mirror{/if}">
	<div class="inline-wrapper">
		{foreach $project.attachments.ProjectRender as $_render}
		<div>
			{if $_render@first}
				{if $project|isNew}
					<span>Nowość</span>
				{/if}
				{if $project.discount}
					<span class="discount{if $project|isNew} second{/if}"{*if $projectParams|isBlackWeek*} style="background-color: #ff9600; width: 230px; font-size: 19px; color: #000;"{*/if*}>{if !$projectParams|isBlackWeek}<strong>Rabat {$project.discount}</strong>{else}Rabat {$project.discount}{/if}</span>
				{/if}
				
				<img class="finger" id="finger" src="/img/finger.png" alt="Zobacz galerię projektu {$project.name}">
			{/if}
			{if $request.version == 'mirror'}
				<a class="gallery{if $_render@iteration > 2} dummy{/if}" data-fancybox="gallery" data-caption="{$_render.title} - odbicie lustrzane" href="{image type=render project=$project no=$_render@index mirror=1}">
					{if $_render@iteration < 3}
						<img src="{image type=render project=$project no=$_render@index size=presentation mirror=1}" width="1350" height="900" alt="Projekty domów - {$altTitle} {$project.name|strtoupper} - wizualizacja {$_render@iteration} - wersja lustrzana">
					{else}
						<img class="dummy" src="/img/dummy.jpg" width="1350" height="900" data-uri="{image type=render project=$project no=$_render@index size=presentation mirror=1}" alt="{$altTitle} {$project.name|strtoupper} - wizualizacja {$_render@iteration} - wersja lustrzana">
					{/if}
				</a>
			{else}
				<a class="gallery{if $_render@iteration > 2} dummy{/if}" data-fancybox="gallery" data-caption="{$_render.title}" href="{image type=render project=$project no=$_render@index}">
					{if $_render@iteration < 3}
						<img src="{image type=render project=$project no=$_render@index size=presentation}" width="1350" height="900" alt="Projekty domów - {$altTitle} {$project.name|strtoupper} - wizualizacja {$_render@iteration}">
					{else}
						<img class="dummy" src="/img/dummy.jpg" width="1350" height="900" data-uri="{image type=render project=$project no=$_render@index size=presentation}" alt="{$altTitle} {$project.name|strtoupper} - wizualizacja {$_render@iteration}">
					{/if}
				</a>
			{/if}
		</div>
		{/foreach}
		
		{if $project.attachments.ProjectInterior}
			{foreach $project.attachments.ProjectInterior as $_render}
			<div{if $_render@first} id="interiors"{/if}{if $authorizations[$_render.id]} class="showroom"{/if}>
				{if $_render.props.image_size.width > 1350}
				<a class="gallery dummy" data-fancybox="gallery" data-caption="{$_render.title}: {$_render.description}" href="{image type=interior no=$_render@index project=$project}">
					<img class="dummy" src="/img/dummy.jpg" width="1350" height="900" data-uri="{image type=interior project=$project size=presentation no=$_render@index}" alt="Wnętrze projektu {$project.name} - wizualizacja {$_render@iteration}">
				</a>
				{else}
					<a class="gallery dummy" data-fancybox="gallery" data-caption="{$_render.title}: {$_render.description}" href="{image type=interior project=$project size=presentation no=$_render@index}">
						<img class="dummy" src="/img/dummy.jpg" width="1350" height="900" data-uri="{image type=interior project=$project size=presentation no=$_render@index}" alt="Wnętrze projektu {$project.name} - wizualizacja {$_render@iteration}">
					</a>
				{/if}

				{if $authorizations[$_render.id]}
					{foreach $authorizations[$_render.id] as $key => $value}
						{$filename = $products[$value.id].attachments.ShowroomImage[0].path|cat:'/'|cat:$products[$value.id].attachments.ShowroomImage[0].filename}
						{$iconFilename = $products[$value.id].attachments.ShowroomImage[0].path|cat:'/'|cat:$products[$value.id].attachments.ShowroomImage[0]['childAttachments']['thumb'][0].filename}

						<div class="showroom-box" data-x="{$value.left}" data-y="{$value.top}" data-icon="{$showroomPath}/{$iconFilename}" data-img="{$showroomPath}/{$filename}" data-producer="{$products[$value.id].producer}" data-descript="{$products[$value.id].short_descript}" data-link="{$products[$value.id].link}" style="top: {$value.top}px; left:{$value.left}px;">
							<div class="label">
								<a data-fancybox="showroom" href="{$showroomPath}/{$filename}">{$products[$value.id].name|truncate:30}</a>
							</div>
						</div>
					{/foreach}
					
					<span class="showroom-switch" data-state="on">wyłącz podgląd produktów</span>
				{/if}
			</div>
			
				{*if $_render@iteration == 3}{break}{/if*}
			{/foreach}
			{*if $_render@total > 3}
			<p class="more" id="more-interiors"><span id="all-interiors">pokaż wszystkie wnętrza</span></p>
			{/if*}
		{/if}
		
		{$panoramaLink = $projectParams|panoramaLink}
		{if $panoramaLink}
			<div class="movie-link-box">
				<p class="movie-link panorama">
					<a href="{$panoramaLink}" target="_blank">Zobacz panoramę wnętrza</a>
				</p>
			</div>
		{/if}
		
		{if $project.attachments.ProjectElevation}
			<div id="elevations">
				<ul id="elevations-list" class="shared">
				{foreach $project.attachments.ProjectElevation as $_item}
					{if $request.version == 'mirror'}
						<li>
							<a class="gallery dummy" data-fancybox="gallery" data-caption="{$_item.title} - odbicie lustrzane" href="{image type=elevation no=$_item@index project=$project mirror=1}">
								<img class="dummy" src="/img/dummy.jpg" width="1024" height="683" data-uri="{image type=elevation project=$project no=$_item@index mirror=1}" alt="Projekt domu {$project.name} - widok elewacji {$_item@iteration} - wersja lustrzana">
							</a>
						</li>
					{else}
						<li>
							<a class="gallery dummy" data-fancybox="gallery" data-caption="{$_item.title}" href="{image type=elevation no=$_item@index project=$project}">
								<img class="dummy" src="/img/dummy.jpg" width="1024" height="683" data-uri="{image type=elevation project=$project no=$_item@index}" alt="Projekt domu {$project.name} - widok elewacji {$_item@iteration}">
							</a>
						</li>
					{/if}
				{/foreach}
				</ul>
			</div>
		{/if}
		
		{$movieLink = $projectParams|movieLink}
		{if $movieLink}
			<div class="movie-link-box">
				<p class="movie-link">
					<a data-fancybox="movie" href="https://www.youtube.com/embed/{$movieLink|replace:'https://youtu.be/':''|replace:'http://youtu.be/':''}?rel=0">
						Zobacz animację 3D
					</a>
				</p>
			</div>
		{/if}
	</div>
	</div>
	
	<div class="data-box" id="data-box">
	<div class="inline-wrapper">
		<div class="icons fav-wrapper">
			<div>
				<a href="//pl.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-color="white"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_white_20.png" alt="Studio Atrium Pin"></a>
				{*<iframe src="https://www.facebook.com/plugins/like.php?locale=pl_PL&amp;href={$oldProjectLink}&amp;send=false&amp;layout=button_count&amp;width=110&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=tahoma&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:110px; height:21px;" allowTransparency="true"></iframe>*}
			</div>
		
			<span class="bg fav{if in_array($project.id, $favouriteIds)} on{/if}" id="fav-me" data-id="{$project.id}"></span>
			<span class="bg net" id="social-trigger"></span>
			{*<span class="bg selfie" id="selfie-box"><a href="{url module=project action=item id=$project.id link_title=$project.name catalog=selfie}"></a></span>*}
			
			{$token = $smarty.now|date_format:"%H%M%S"}

			{if $request.version == 'mirror'}
				<a href="{url module=pdf action=project id=$project.id link_title=$project.name version=lustro}?token={$token}" id="print-ico" class="bg print" data-token="{$token}"></a>
			{else}
				<a href="{url module=pdf action=project id=$project.id link_title=$project.name}?token={$token}" id="print-ico" class="bg print" data-token="{$token}"></a>
			{/if}
			
			<img src="/img/loader.gif" alt="Generowanie pliku" id="gen-loader" style="display: none;">
			
		</div>
		
		<div class="breadcrumbs"><a href="/">Studio Atrium</a> &raquo; <a href="/projekty-domow/">projekty domów</a> &raquo; <a href="{$categoryLink}"{if !$subCategory} class="on"{/if}>{$category}</a>{if $subCategory} &raquo; <a class="on" href="{$subCategoryLink}">{$subCategory}</a>{/if}</div>
	
		<div class="head-box">
			<h1 id="title" data-id="{$project.id}">{$project.name}{if $request.version == 'mirror'}<small>odbicie lustrzane</small>{/if}{if $isLocal} <span style="font-size: 1.6rem;">({$project.symbol_alpha} {$project.symbol_num})</span>{/if}</h1>
			{if $projectParams|stairsChange}
				<p class="area{if $projectParams|isMultiApartment && $projectParams|oneFlatArea && $projectParams|oneFlatGarageArea} longest{elseif $projectParams|isMultiApartment && $projectParams|oneFlatArea} longer{/if}">Powierzchnia użytkowa: <span>{$project.params_general|usableArea}</span> m<sup>2</sup><span id="usable-area" class="param-info special" data-id="141"></span></p>
			{else}
				<p class="area{if $projectParams|isMultiApartment && $projectParams|oneFlatArea && $projectParams|oneFlatGarageArea} longest{elseif $projectParams|isMultiApartment && $projectParams|oneFlatArea} longer{/if}">Powierzchnia użytkowa: <span>{$project.params_general|usableArea}</span> m<sup>2</sup><span id="usable-area" class="param-info" data-id="1"></span></p>
			{/if}
			{if $projectParams|isMultiApartment && $projectParams|oneFlatArea}
				<p>pow. użytkowa 1 lokalu w budynku: <span>{$projectParams|oneFlatArea}</span> m<sup>2</sup></p>
				{if $projectParams|oneFlatGarageArea}
					<p>+ garaż dla 1 lokalu: <span>{$projectParams|oneFlatGarageArea}</span> m<sup>2</sup></p>
				{/if}
			{/if}
			
			<h2>{$project.short_description}</h2>
			
			{*if !$projectParams|isBlackWeek && ((!$projectParams|isWT2021needful && !$projectParams|isReady14days && !$projectParams|isReady7days && $projectParams|isAvailable) || $projectParams|isWT2021ready)}
				<p class="info">Zgodny z WT 2021</p>
			{/if*}
		</div>
				
		{if $projectParams|hasMirror && $hasPlot} 
			{$linkBoxClass = 'three'}
		{else}
			{if !$projectParams|hasMirror && !$hasPlot}
				{$linkBoxClass = 'one'}
			{/if}
		{/if}

		<div class="inner-box">
			<ul class="link-box{if $linkBoxClass} {$linkBoxClass}{/if}">
			{if $projectParams|hasMirror}
				{if $request.version == 'mirror'}
					<li><a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}" class="mirror">Zobacz <br>wersję podstawową</a></li>
				{else}
					<li><a href="{url module=project action=item id=$project.id link_title=$project.name version=lustro catalog='projekty-domow'}" class="mirror on">Zobacz <br>odbicie lustrzane</a></li>
				{/if}
			{/if}
			
			{if $hasPlot}
				{if $request.version == 'mirror'}
					<li id="sun-box"><a href="{url module=project action=item id=$project.id link_title=$project.name version=lustro catalog=usytuowanie}" class="sun">Sytuuj na działce<br>Słońce w domu</a></li>
				{else}
					<li id="sun-box"><a href="{url module=project action=item id=$project.id link_title=$project.name catalog=usytuowanie}" class="sun">Sytuuj na działce<br>Słońce w domu</a></li>
				{/if}
			{/if}

				{*<li><a href="{url module=project action=item id=$project.id link_title=$project.name catalog=selfie}" class="selfie">Selfie<br>z projektem</a></li>*}
				<li id="gosketch-box"><a href="javascript:" class="gosketch" id="gosketch-trigger">Zobacz rzuty projektu</a></li>
			</ul>
		</div>
		
		{*if $project.discount == 800}
			<div class="info-box no-border" style="padding-top: 0px; text-align: center;">
				<img src="/img/wiosna-promo-projekt.jpg?t=20240420" alt="Promocja wiosenna" width="350" height="85" class="wolf">
			</div>	
		{/if*}
		
		<div class="inner-box">
			<ul class="contact-box">
				<li><a href="{if $user}{url module=panel action=message project_id=$project.id}{else}javascript:{/if}"{if !$user} class="consultant"{/if}>zapytaj o projekt</a></li>
				<li id="phone-box"><a href="tel:+48338229496" class="phone" rel="nofollow">33 822 94 96</a></li>
			</ul>
		</div>
		
		{if $projectParams|isBlackWeek}
			<div class="info-box no-border" style="padding-top: 0px; text-align: center;">
				<a href="/projekty-domow/black-week/"><img src="/img/blackWeek.png?t=20251201" alt="Promocje Black Friday" width="350" height="85" class="wolf"></a>
			</div>
		{elseif $projectParams|isChristmas}
			<div class="info-box no-border" style="padding-top: 0px; text-align: center;">
				<a href="/projekty-domow/promocja-swiateczna/"><img src="/img/christmas.png" alt="Świąteczna promocja" width="350" height="85" class="wolf"></a>
			</div>
		{/if}
		
		<div id="order-box" class="inner-box order-box"{if $projectParams|isBlackWeek} style="background-color: #FFA800; color: #000;"{elseif $projectParams|isChristmas} style="background-color: #A2D5F2; color: #000;"{/if}>
			<div>
			{if $projectParams|isWithdrawn}
				<p class="price">wycofany z oferty</p>
			{else}
				<p class="version">
					{if $project.type == 'skeleton'}
						<strong>Wersja szkieletowa</strong>
					{else}
						Wersja murowana
					{/if}

					{if $projectParams|isWT2021needfulHeat && $projectParams|isWT2021needful}
						- dostępność <strong>zapytaj o termin</strong></p>
						<p class="info big"><strong>Uwaga!</strong> Ze względu na obowiązujące od 01.01.2021 nowe warunki techniczne <strong><span>WT2021</span></strong><br>konieczna będzie korekta projektu<br><strong>w zakresie ogrzewania</strong>, dodatkowo wymiary zewnętrzne bryły mogą ulec zmianie do kilkunastu cm.</p>
					{elseif $projectParams|isWT2021needful}
						- dostępność <strong>zapytaj o termin</strong></p>
						{*- dostępność <strong>1,5-2 miesięcy</strong></p>*}
						<p class="info big"><strong>Uwaga!</strong> Ze względu na obowiązujące od 01.01.2021 nowe warunki techniczne <strong><span>WT2021</span></strong><br>konieczna będzie korekta projektu,<br>przez co wymiary zewnętrzne bryły<br>mogą ulec zmianie do kilkunastu cm.</p>
					{elseif $projectParams|isWT2021needfulHeat && $projectParams|isAvailable}
						- dostępność <strong>zapytaj o termin</strong></p>
						<p class="info big"><strong>Uwaga!</strong> Ze względu na obowiązujące od 01.01.2021 nowe warunki techniczne <strong><span>WT2021</span></strong><br>konieczna będzie korekta projektu<br><strong>w zakresie ogrzewania</strong>.<br><span class="ajax-info" data-url="{url module=ajax action=get_realisation_info}"><strong>zapytaj o termin realizacji</strong></span></p>
					{elseif $projectParams|isNarrowGarage}
						</p><p class="info">ze względu na zmianę przepisów<br>i konieczność korekty szerokości garażu<br>w projekcie technicznym,<br><strong>zapytaj o termin realizacji</strong>
					{else} 
						{if $projectParams|isReady14days}
							{*- dostępność około 30 dni<br><strong>zapytaj o termin</strong>*}
							- dostępność <strong>3-14 dni</strong>
							{*14.04.21 - na wniosek Zosi zmiana na 7-14 z - dostępność <strong>14-21 dni</strong>*}
						{elseif $projectParams|isReady7days}
							{*- dostępność około 30 dni<br><strong>zapytaj o termin</strong>*}
							- dostępność <strong>3-14 dni</strong>
						{elseif $projectParams|isAvailable}
							- dostępność <strong>3-5 dni</strong>
						{else}
							{if $projectParams|isWT2021needfulHeat}
								</p><p class="info big">Projekt w fazie koncepcyjnej, dostępny na zamówienie.<br>Uwaga! Projekt wymaga korekty<br><strong>w zakresie ogrzewania</strong>.<br><span class="ajax-info" data-url="{url module=ajax action=get_realisation_info}"><strong>zapytaj o termin realizacji</strong></span>
							{else}
								</p><p class="info big">Projekt w fazie koncepcyjnej, dostępny na zamówienie.<br><span class="ajax-info" data-url="{url module=ajax action=get_realisation_info}"><strong>zapytaj o termin realizacji</strong></span>
							{/if}
						{/if}
					{/if}
				</p>
				
				{if $project.price}
				
					{if $projectParams|isHalfPrice}
						<p class="price">{($project.price/2)|number_format:2:",":""} <span>zł</span></p>
						<p class="vatInfo">informacyjna cena za 1 {if $projectParams|isDual}lokal{else}segment{/if}</p>
					{/if}
					<p class="price{if $project.discount} promo{/if}">{if $project.discount}<span class="old-price discount"{if $projectParams|isBlackWeek} style="color:#fff;"{/if}>{$project.price} zł</span><span class="current-price" style="color: #cc1000; font-size:3.6rem; text-align: right; margin: 18px 0 12px; font-family: 'LatoLatinWeb',sans-serif;">{$project.price - $project.discount}</span>{else}{$project.price}{/if} <span class="currency"{if $projectParams|isBlackWeek} style="color:#fff;"{/if}>zł</span></p>
					{*if $projectParams|vatValue}<p class="vatInfo">(w tym {$projectParams|vatValue}% VAT)</p>{/if*}
					{if $projectParams|isHalfPrice}<p class="vatInfo">cena za cały budynek</p>
					<p class="vatInfo">(w tym 23% VAT)</p>
					<p class="promoInfo">sprzedawany wyłącznie w całości</p>{else}<p class="vatInfo">(w tym 23% VAT)</p>{/if}
					{if $projectParams|isBlackWeek && $blackWeekTxt}
						<p class="promoInfo"><strong>{$blackWeekTxt}</strong></p>
					{elseif $promoEnd}
						<p class="promoInfo">{$promoEnd}</p>
					{/if}
					{if $project.discount}
						{if $projectParams|isBlackWeek || $projectParams|isChristmas}<p class="version" style="font-weight: bold;">Tylko dla klientów indywidualnych!</p>{/if}
						{if $projectParams|isBlackWeek}
							<p class="version">Najniższa cena z 30 dni przed obniżką: {$project.price-$project.discount} zł</p>
						{else}
							<p class="version">Najniższa cena z 30 dni przed obniżką: {if $projectParams|lowestPrice}{$projectParams|lowestPrice}{else}{$project.price}{/if} zł</p>
						{/if}	
					{/if}
					<a href="{url module=order action=cart}" class="cart simple" rel="nofollow"><span class="basket{if $project|inBasket:$request.version} disabled{/if}"{if !$project|inBasket:$request.version} id="addToBasket" data-version="{$request.version}" data-project="{$project.id}" data-price="{if $project.discount}{$project.price-$project.discount}{else}{$project.price}{/if}" data-link="{if $request.version == 'mirror'}{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow' version=lustro}{else}{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}{/if}" data-name="{$project.name}" data-thumb="{if $request.version == 'mirror'}{image type=render project=$project mirror=1}{else}{image type=render project=$project size=thumb}{/if}"{/if}>{if $project|inBasket:$request.version}W koszyku{else}Do koszyka{/if}</span></a>					
					{if $projectParams[97] && $projectParams[97].string_value != 'pompa ciepła'}
						<p class="options">
							<input type="checkbox" name="pomp" value="1" id="pompSel"> <label for="pompSel">wersja z pompą ciepła: <strong>+ 690 zł</strong></label>
						</p>
						{if $projectParams|pcforfree}
						<p class="options" style="margin-top: 15px; border: none; height: 80px; background-color: #FFA800; color: #000; padding: 5px;">
							<strong>do 30 grudnia pompa ciepła za 0zł z kodem: <span style="color:#fff;">POMPA25-PC</span></strong>
							<br><span style="font-size: 1.1rem;">* wprowadź powyższy kod po dodaniu projektu do koszyka</span>
						</p>
						<div id="pompInfo" style="display: none;"></div>
						{else}
							<div id="pompInfo" style="display: none; text-align: center; color: #cc1000;">UWAGA!<br>Przed złożeniem zamówienia zapytaj konsultanta o termin realizacji wariantu z pompą ciepła!</div>	
						{/if}
					{/if}
					{*if $project.discount && !$projectParams|isBlackWeek && !$projectParams|isChristmas}
						<p class="vatInfo" style="text-align: center; margin: 0 auto; font-size: 1.5rem;"><strong style="color: #cc1000;">W ramach promocji istnieje możliwość dostosowania kotła na biomasę w cenie</strong> - termin realizacji do 14 dni roboczych.</p>
					{/if*}
				{else}
					<p class="price">projekt pokazowy<br><span>cena do uzgodnienia</span></p>
				{/if}
				{if !$projectParams|isBlackWeek}
					{if $project.price}
						<p class="button strong"><span class="ajax-info" data-url="{url module=project_extend action=promo_info_notify}" data-call="PromoNotify.registerForm">powiadom o dodatkowej promocji</span></p>
						<p class="button"><a href="{if $user}{url module=panel action=message project_id=$project.id}{else}javascript:{/if}"{if !$user} class="consultant"{/if}>znalazłeś ten projekt taniej? napisz</a></p>
					{/if}
					{if !$projectParams|isReady7days && !$projectParams|isAvailable}<p class="button"><span class="ajax-info" data-url="{url module=ajax action=get_realisation_info}">zapytaj o termin realizacji</span></p>{/if}
					{if $projectParams|hasSkeletonOption}
						{if $skeletonPrice && $project.type != 'skeleton'}
							<p class="button" style="background-color: #FFA800; position: relative;"><a href="javascript:" id="skeleton-trigger"><strong>zapytaj o wersję szkieletową</strong> <img src="/img/info2.png" alt="Promocja!" style="position: absolute; right: 5px;"></a></p>
						{elseif $skeletonPrice && $project.type == 'skeleton'}
							<p class="button"><a href="javascript:" id="skeleton-trigger">zapytaj o wersję murowaną</a></p>
						{/if}
					{elseif $project.type == 'skeleton' && $skeletonPrice}
						<p class="button"><a href="javascript:" id="skeleton-trigger">zapytaj o wersję murowaną</a></p>
					{/if}
				{/if}
			{/if}
			</div>
		</div>
		
		
		<div class="addons">
			{if $linkedProjectUrl}
				{if $project.type == 'skeleton'}
					<a href="{$linkedProjectUrl}"><img src="/img/murowany.png?t=20240604" alt="Zobacz wersję murowaną projektu {$project.name}" width="410" height="64" style="max-width: 100%; height: auto;" class="wolf"></a><br>
				{else}
					<a href="{$linkedProjectUrl}"><img src="/img/szkielet.png?t=20240604" alt="Zobacz wersję szkieletową projektu {$project.name}" width="410" height="64" style="max-width: 100%; height: auto;" class="wolf"></a><br>
				{/if}
			{/if}			
			{if !$projectParams|isWithdrawn}<a href="javascript:" class="ajax-info" data-url="{url module=project_extend action=project_addons}&id={$project.id}" data-call="ProjectAddons.register"><img src="/img/dodatki.png" alt="Zobacz dodatki i gratisy do projektu" width="410" height="64" style="max-width: 100%; height: auto;"></a>{/if}
			<br><a href="/znajdziemy-dla-ciebie-projekt.html"><img src="/img/znajdziemy.png" alt="Szukasz innego projektu domu? Znajdziemy go dla Ciebie!" width="410" height="64" style="max-width: 100%; height: auto;" class="wolf"></a>
		</div>
		<div id="technical-data-box" class="technical-data">
			<p class="header">Dane techniczne</p>
			
			{if $withSeparateGarage == 1}
				<p class="subheader">Dom jednorodzinny</p>
			{/if}
			<table class="tech">
			{$nettoSum=0}
			{foreach $technicalList.params as $_item}
			
				{if $params[$_item].value_type == 'string'}
		        	{$paramValue = $projectParams[$_item].string_value}
		        {else}
		        	{$paramValue = $projectParams[$_item].num_value}
		        	
		        	{if $paramValue && $params[$_item].value_type == 'number'}
		        		{$paramValue = number_format($projectParams[$_item].num_value, 2, ',', ' ')}
		        	{/if}
		        {/if}
				{if $paramValue}
					{if $projectParams|stairsChange && ($_item == 1 || $_item == 2)}
						<tr>
							<td>{$params[$_item].name}{if $params[$_item].description}<span class="param-info" data-id="{$params[$_item].id}"></span>{/if}</td>
							<td><div>{$paramValue} {$params[$_item].unit}</div><span class="param-info special" data-id="141"></span></td>
						</tr>
					{else}
						<tr>
							<td>{$params[$_item].name}{if $params[$_item].description}<span class="param-info" data-id="{$params[$_item].id}"></span>{/if}</td>
							<td>{$paramValue} {$params[$_item].unit}</td>
						</tr>
					{/if}
				
				{/if}
				
				{* policz sumę netto *}
				{if $params[$_item].id == 16 || $params[$_item].id == 18 || $params[$_item].id == 20 || $params[$_item].id == 17 || $params[$_item].id == 19 || $params[$_item].id == 21}								
					{$nettoSum=$nettoSum+$projectParams[$_item].num_value|floatval}
				{/if}
			{/foreach}
				{if $project.type == 'skeleton' && $projectParams[152] && $projectParams[153]}
					{$skeletonH = number_format($projectParams[152].num_value, 2, ',', ' ')}
					{$skeletonW = number_format($projectParams[153].num_value, 2, ',', ' ')}
					<tr>
						<td>normatywne wym. działki<span class="param-info" data-id="152"></span></td>
						<td>{$skeletonW} x {$skeletonH} m</td>
					</tr>
				{/if}
				<tr{if $project.type == 'skeleton'} style="color: #CC1000;"{/if}>
					<td>minimalne wym. działki<span class="param-info" data-id="{if $project.type == 'skeleton'}75{else}76{/if}"></span></td>
					<td>{$project.params_general|parcelWidth} x {$project.params_general|parcelHeight} m</td>
				</tr>
				
			</table>
			{if $withSeparateGarage == 1}
				<p class="subheader">Garaż wolnostojący</p>
				<table class="tech">
					{foreach $technicalGarageList.params as $_item}
					
						{if $params[$_item].value_type == 'string'}
				        	{$paramValue = $projectParams[$_item].string_value}
				        {else}
				        	{$paramValue = $projectParams[$_item].num_value}
				        	
				        	{if $paramValue && $params[$_item].value_type == 'number'}
				        		{$paramValue = number_format($projectParams[$_item].num_value, 2, ',', ' ')}
				        	{/if}
				        {/if}
		
						{if $paramValue}
							<tr>
								<td>{$params[$_item].name|replace:"garaż:":""}{if $params[$_item].description}<span class="param-info" data-id="{$params[$_item].id}"></span>{/if}</td>
								<td>{$paramValue} {$params[$_item].unit}</td>
							</tr>
						{/if}
					{/foreach}
				</table>
			{/if}
		</div>
		{if $features}
			{foreach $features as $_item}
				{if ($_item.id == 6 || $_item.id == 7 || $_item.id == 19) && $setF != 1}
					<div class="info-box no-border no-padding"><div class="features">
					{$setF=1}
				{/if}	
				{if $_item.id == 6 || $_item.id == 7 || $_item.id == 19}	
					<p{if $featureIcons && $featureIcons[$_item.id]} class="icon {$featureIcons[$_item.id]}"{/if}>{$_item.description}</p>
				{/if}			
			{/foreach}
				{if $setF == 1}
					</div></div>
				{/if}	
		{/if}	
		
		<div id="info-box" class="info-box no-border">
			<p class="header">Technologia</p>
			
			{if $project.technology}
			<p>
				{$project.technology}
				{if $project.type == 'skeleton'}
					<a href="javascript:" class="ajax-info" data-url="{url module=ajax action=get_skeleton_technology}">więcej</a>
				{/if}
			</p>
			{/if}
			<p>&nbsp;</p>
			<p><a href="/dokumenty/Wspolpraca.html#par1180"><img src="/img/hormann.png" width="410" height="88" alt="Hörmann - drzwi i bramy" class="wolf"></a></p>
			<p>&nbsp;</p>
			<p><a href="/dokumenty/Wspolpraca.html#par1179"><img src="/img/fakro.png" width="410" height="88" alt="Fakro - okna dachowe" class="wolf"></a></p>
			<p>&nbsp;</p>
			<p><a href="/dokumenty/Wspolpraca.html#par1215"><img src="/img/termoorganika.png" width="410" height="88" alt="Termoorganika - Myśl: ciepło" class="wolf"></a></p>
			<p>&nbsp;</p>
			<p><a href="/dokumenty/Wspolpraca.html#par1309"><img src="/img/aluprof.png" width="410" height="88" alt="Aluprof" class="wolf"></a></p>
			<p>&nbsp;</p>
			<p><a href="/dokumenty/Wspolpraca.html#par1525"><img src="/img/braas.png" width="410" height="88" alt="Braas" class="wolf"></a></p>
			
		</div>
		{if $project.build_cost.date != '' && $project.build_cost.open > 0 && !$projectParams|isWithdrawn}
		<div id="cost-box" class="cost-box">
			<p class="header">Koszty budowy</p>

			<p>stan surowy: <span>{number_format($project.build_cost.open, 0, ',', ' ')}</span> zł</p>
			<p>roboty wykończeniowe: {number_format($project.build_cost.finish, 0, ',', ' ')} zł</p>
			<p>instalacje: {number_format($project.build_cost.fitting, 0, ',', ' ')} zł</p>
			<p><span>koszt budowy pod klucz</span>: <span><strong>{number_format($project.build_cost.full, 0, ',', ' ')}</strong></span> zł</p>
			<p>&nbsp;</p>
			<p>Podane ceny są cenami netto.</p>
			<p>{$project.build_cost.date} <span class="ajax-info" data-url="{url module=ajax action=get_estimate_info2}">Zobacz więcej.</span></p>
			<span class="framedB filesDloadTrigger">pobierz kosztorys</span>
		</div>
		
		{elseif $project.type != 'skeleton' && $costs.total != -1 && $costs.rough > 0 && !$projectParams|isWithdrawn}
		
		<div id="cost-box" class="cost-box">
			<p class="header">Koszty budowy</p>

			<p>stan surowy: <span>{number_format($costs.rough, 0, ',', ' ')}</span> zł</p>
			<p>roboty wykończeniowe: {number_format($costs.finish, 0, ',', ' ')} zł</p>
			<p>instalacje: {number_format($costs.installations, 0, ',', ' ')} zł</p>
			<p><span>koszt budowy pod klucz</span>: <span><strong>{number_format($costs.total, 0, ',', ' ')}</strong></span> zł</p>
			<p>&nbsp;</p>
			{if $projectParams|costInfo}
				<p>{$projectParams|costInfo}</p>
			{/if}
			<p>Podane ceny są cenami netto. <span class="ajax-info" data-url="{url module=ajax action=get_estimate_info}">Zobacz więcej.</span></p>
			
			{if !$noestimate && $project.type != 'skeleton'}
				<span class="framedB filesDloadTrigger">pobierz kosztorys</span>
			{/if}
		</div>
		{/if}
{*	
		{if $projectParams|hasEnergyFactor}
			<div class="info-box">
				<p class="header">Energooszczędność</p>
			
				<p>EP = {$projectParams|epEnergyFactor} [kWh/(m<sup>2</sup> . rok)]</p>
				<p>EK = {$projectParams|ekEnergyFactor} [kWh/(m<sup>2</sup> . rok)]</p>
				<p>Wartość EP mniejsza od 95 [kWh/(m<sup>2</sup> . rok)]</p>
			</div>
		{/if}
*}

	{if !$projectParams|isWithdrawn}
		{*
		<div class="info-box">
			<p class="header">Zleć bezpłatną wycenę</p>
			<p><a href="/click.php?rel=jfg398hguhf9834ggjwsdfu234ghwergj&projekt={$project.name|replace:' ':'_'}&link={$projectUrl}" rel="nofollow" target="_blank"><img src="/img/apis-small.png" width="410" height="68" alt="Bezp;łatan wycena budowy - Apis" class="wolf"></a></p>
		</div>
		
		<div class="info-box">
			<p><a href="/click.php?rel=jfg398hguhf9834ggjwsdfu234ghwergj&projekt={$project.name|replace:' ':'_'}&link={$projectUrl}" rel="nofollow" target="_blank"><img src="/img/rg-buduj.gif" width="410" height="102" alt="RG System" class="wolf"></a></p>
		</div>
		*}
		<div class="info-box">
			<p><a href="/click.php?rel=jf9384yhhnv978fhnvw374yn983wfn98w&projekt={$project.name|replace:' ':'_'}&link={$projectUrl}" rel="nofollow" target="_blank"><img src="/img/wolf.webp" width="410" height="102" alt="Wolf Haus" class="wolf"></a></p>
		</div>
		<div class="info-box">
			<p><a href="/click.php?rel=nbcns784bvbanc84nfika89234nwnfns8e" rel="nofollow" target="_blank"><img src="/img/rekuperatory.png" width="411" height="101" alt="Rekuperatory.pl" class="wolf"></a></p>
		</div>
		{*
		<div class="info-box">
			<p><a href="/click.php?rel=jf8394glskdf9324u9gtf9wefwuedf923" rel="nofollow" target="_blank"><img src="/img/maxfliz.png" width="411" height="101" alt="Maxfliz" class="wolf"></a></p>
		</div>
		*}
		
		
		<div class="info-box">
			<p class="header">Informacje</p>
			
			<div class="hilite-box">
				<p>Projekt należy do kategorii</p>
				
				<div>
				{foreach $projectCategories as $_item}
					{if $_item.link}
						<a href="/{$_item.link}/">{$_item.name|strtolower}</a>{if !$_item@last} | {/if}
					{/if}
				{/foreach}
				</div>
				
				<p>Tagi do projektu</p>
				<div class="cloud">
				{foreach $csCloudParams as $_key => $_item}
					{if isset($projectParams[$_key])}
						<a href="{url module=project action=click_search}?{$_item[1]}=1">{$_item[0]}</a>
					{/if}
				{/foreach}
				
				{foreach $csCloudSelectParams as $_key => $_item}
					{if isset($projectParams[$_key])}
						{$paramValue = array_search($projectParams[$_key]['string_value'], $csParamsValueNames)|default:$projectParams[$_key]['string_value']}
						{if !$paramValue}{$paramValue = $projectParams[$_key]['string_value']}{/if}
						<a href="{url module=project action=click_search}?{$_item[1]}={$paramValue}">{$_item[0]} : {$projectParams[$_key]['string_value']}</a>
					{/if}
				{/foreach}
				</div>
			</div>

			{if $features}
			<div class="features">
			{foreach $features as $_item}
				{if $_item.id != 6 &&  $_item.id != 7}
					<p{if $featureIcons && $featureIcons[$_item.id]} class="icon {$featureIcons[$_item.id]}"{/if}>{$_item.description}</p>
				{/if}	
			{/foreach}
			{if $linkedProjectUrl}
				{if $project.type == 'skeleton'}
					<p><a href="{$linkedProjectUrl}"><strong>dostępna wersja murowana projektu</strong></a></p>
				{else}
					<p><a href="{$linkedProjectUrl}"><strong>dostępna wersja szkieletowa projektu</strong></a></p>
				{/if}
			{/if}
			</div>
			{/if}
			
			<p class="spaced">
				{if $projectParams|isAvailable}<span class="framedB filesDloadTrigger">pliki do pobrania</span>{/if}
				<span class="trigger framedB" id="changes" data-txt="Na życzenie Inwestora, wprowadzamy odpłatnie zmiany w naszych projektach. Ceny i możliwość wykonania zmian w wybranym projekcie ustalane są indywidualnie. Na pozostałe zmiany wydajemy bezpłatną zgodę jako autorzy projektu, na podstawie której lokalny projektant może wykonać adaptacje.">Zmiany w projekcie</span>
			</p>
		</div>
	{/if}
		<div id="descript-box" class="info-box">
			<p class="header">Opis</p>
			
			<p class="desc">{$project.description}</p>
			{if $projectParams[145].string_value}
				<p class="header spaced">Realizacja</p>
				<p>{$projectParams[145].string_value}</p>
			{/if}
		</div>
		{*
		<div class="info-box">
			<p class="header">Finansowanie</p>
			<p><a href="/click.php?rel=hf3489hfjdfh93j8fg34ghjfhsdfkj234" target="_blank" rel="nofollow"><img src="/img/company/m3.png" width="375" height="308" alt="mFinanse"></a></p>
			<p><a href="/click.php?rel=jf8394hgjfh9384hfklaf042fgwefj934" target="_blank" rel="nofollow"><img src="/img/company/pko-small.gif" width="375" height="100" alt="PKO - własny kąt hipoteczny"></a></p>
		</div>	
		*}
		
		<div class="info-box addons" id="project-help">
			<p>Potrzebujesz pomocy w znalezieniu wymarzonego projektu?
			<a href="{url module=varia action=project_helper}">znajdziemy dla Ciebie najlepszy projekt domu</a></p>
		</div>
		<div class="info-box addons" id="buyer-benefits-header">
			<p class="header aleft"><strong>Co zyskasz kupując u źródła?</strong></p>
		</div>
		<div class="info-box no-border no-padding" id="buyer-benefits">
			<div class="features normal">
				<p>konsultację z <strong>autorem projektu</strong> na każdym etapie</p>
				<p>gwarancję <strong>najniższej ceny</strong></p>
				<p><strong>bezpłatną</strong> zgodę na zmiany w projekcie</p>
				<p><span class="ajax-info" data-url="{url module=project_extend action=project_addons}&id={$project.id}" data-call="ProjectAddons.register">bezpłatne dodatki</span> o min. wartości <strong>1000 zł</strong></p>
				<p><strong>darmową</strong> dostawę firmą kurierską</p>
				<p>wymianę do <strong>365 dni</strong> lub zwrot projektu do <strong>30 dni</strong></p>
			</div>
		</div>
		</div>	
	</div>
</div>

{foreach $project.attachments.ProjectSketch as $sketch name=sketchList}
<div class="project-box"{if $sketch@first} id="sketch-box"{/if}>
	<div class="render-box sketch-box" id="rzut-{$sketch@iteration}">
		<div>
		{if $sketchAuthorize[$sketch.id]}
			<p class="showSketchAuthorize">dotknij dane pomieszczenie by zobaczyć opis i powierzchnię</p>
			{if $request.version == 'mirror'}
				<img class="sketchImg" id="sketch-{$sketch@iteration}" src="{image type=sketch project=$project storey=$sketch.props.storey mirror=1}" width="{$sketch.props.image_size.width}" height="{$sketch.props.image_size.height}" alt="{$sketch.title} - projekt {$project.name} - wersja lustrzana">
				<svg title="Pomieszczenia - {$sketch.props.storey|mapStorey}" xmlns="http://www.w3.org/2000/svg" class="sketchAuthorize" id="svg-{$sketch@iteration}" data-rooms='{$roomsPoints[$sketch.id]}' data-offsetX='{$sketchAuthorize[$sketch.id].width}' data-offsetY='{$sketchAuthorize[$sketch.id].height}' data-sid='{$sketch@iteration}' data-mirror='1'></svg>
				<p><a class="sketch" data-fancybox="gallery" data-caption="{$sketch.title} - {$project.name} - wersja lustrzana" href="{image type=sketch project=$project storey=$sketch.props.storey mirror=1}">powiększ rzut</a></p>
			{else}
				<img class="sketchImg" id="sketch-{$sketch@iteration}" src="{image type=sketch project=$project storey=$sketch.props.storey}" width="{$sketch.props.image_size.width}" height="{$sketch.props.image_size.height}" alt="{$sketch.title} - projekt {$project.name}">
				<svg title="Pomieszczenia - {$sketch.props.storey|mapStorey}" xmlns="http://www.w3.org/2000/svg" class="sketchAuthorize" id="svg-{$sketch@iteration}" data-rooms='{$roomsPoints[$sketch.id]}' data-offsetX='{$sketchAuthorize[$sketch.id].width}' data-offsetY='{$sketchAuthorize[$sketch.id].height}' data-sid='{$sketch@iteration}' data-mirror='0'></svg>
				<p><a class="sketch" data-fancybox="gallery" data-caption="{$sketch.title} - {$project.name}" href="{image type=sketch project=$project storey=$sketch.props.storey}">powiększ rzut</a></p>
			{/if}
		{else}
			{if $request.version == 'mirror'}
				<a class="sketch" data-fancybox="gallery" data-caption="{$sketch.title} - {$project.name} - wersja lustrzana" href="{image type=sketch project=$project storey=$sketch.props.storey mirror=1}">
					<img id="sketch-{$sketch@iteration}" src="{image type=sketch project=$project storey=$sketch.props.storey mirror=1}" width="{$sketch.props.image_size.width}" height="{$sketch.props.image_size.height}" alt="{$sketch.title} - projekt {$project.name} - wersja lustrzana">
				</a>
			{else}
				<a class="sketch" data-fancybox="gallery" data-caption="{$sketch.title} - {$project.name}" href="{image type=sketch project=$project storey=$sketch.props.storey}">
					<img id="sketch-{$sketch@iteration}" src="{image type=sketch project=$project storey=$sketch.props.storey}" width="{$sketch.props.image_size.width}" height="{$sketch.props.image_size.height}" alt="{$sketch.title} - projekt {$project.name}">
				</a>	
			{/if}	
		{/if}
		
		</div>

	{if $banner && $sketch@first}
		<div>
			<a href="{$banner.link}" target="_blank" rel="nofollow">
				<img src="{$bannerUrl}/{$banner.banner}" width="{$banner.width}" height="{$banner.height}" alt="">
			</a>
		</div>
	{/if}
	</div>
	
	<div class="data-box">
	{capture "chambers"}
		{$total = 0}
		{$total2 = 0}
		<table class="tech">
			{foreach $projectSketchParams as $_param}
				{if $_param.sketch_id == $sketch.id}
				<tr id="sketchParam_{$_param.id}"{if $sketchParams[$_param.sketch_param_id].type == 'info'} style="background-color: #FCFCFC;"{/if}>
					{if $sketchParams[$_param.sketch_param_id].type == 'normal'}
					<td>
						{$_param.room_no}
						{$sketchParams[$_param.sketch_param_id].name}
					</td>
					<td>
						{number_format($_param.area, 2, ',', ' ')}
					</td>
					{else if $sketchParams[$_param.sketch_param_id].type == 'sum'}
						{$total = $_param.area}
						{$total2 = $total2+$total}
						<td>razem:</td>
						<td><strong>{number_format($total, 2, ',', ' ')}</strong></td>
					{else if $sketchParams[$_param.sketch_param_id].type == 'info'}
						<td style="font-style: italic;">{$sketchParams[$_param.sketch_param_id].name}</td>
						<td>&nbsp;</td>
					{/if}
				</tr>
				{/if}
			{/foreach}
		</table>
	{/capture}
	
		{if $projectParams|stairsChange}
			<h3>{$sketch.props.storey|mapStorey}{if $projectParams|isMultiApartment && $total2 > 0}<span>{number_format($total2, 2, ',', ' ')} m<sup>2</sup></span>{elseif !$projectParams|isMultiApartment && $total > 0}<span>{number_format($total, 2, ',', ' ')} m<sup>2</sup></span>{/if} <span class="param-info special" data-id="141"></span></h3>
		{else}
			<h3>{$sketch.props.storey|mapStorey}{if $projectParams|isMultiApartment && $total2 > 0}<span>{number_format($total2, 2, ',', ' ')} m<sup>2</sup></span>{elseif !$projectParams|isMultiApartment && $total > 0}<span>{number_format($total, 2, ',', ' ')} m<sup>2</sup></span>{/if}</h3>
		{/if}
		{$smarty.capture.chambers}
		
		<div class="inner-box measure-link sketch">
			<ul class="link-box{if $projectParams|hasMirror} three{/if} sketch">
			
			{if $projectParams|hasMirror}
				{if $request.version == 'mirror'}
					<li><a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}#rzut-{$sketch@iteration}" class="mirror">Zobacz <br>wersję podstawową</a></li>
				{else}
					<li><a href="{url module=project action=item id=$project.id link_title=$project.name version=lustro catalog='projekty-domow'}#rzut-{$sketch@iteration}" class="mirror on">Zobacz <br>odbicie lustrzane</a></li>
				{/if}
			{/if}
			
			{*if $projectParams|isAvailable}
			
				{if $request.version == 'mirror'}
					<li class="measure-mode"><a href="{url module=project action=item id=$project.id link_title=$project.name version=lustro catalog=$sketch.props.storey|mapStoreyCatalog}" class="distance">Zmierz</a></li>
				{else}
					<li class="measure-mode"><a href="{url module=project action=item id=$project.id link_title=$project.name catalog=$sketch.props.storey|mapStoreyCatalog}" class="distance">Zmierz</a></li>
				{/if}
				
				<li><span class="ajax-info dload" data-url="{url module=project action=get_request_form}" data-call="ProjectRequest.registerRequestForm">Zamów rysunki <br>szczegółowe</span></li> 
			
			{else*}
			
				{if $request.version == 'mirror'}
					<li class="measure-mode"><a href="{url module=project action=item id=$project.id link_title=$project.name version=lustro catalog=$sketch.props.storey|mapStoreyCatalog}" class="distance">Zmierz <br>odległość</a></li>
					<li class="measure-mode"><a href="{url module=project action=item id=$project.id link_title=$project.name version=lustro catalog=$sketch.props.storey|mapStoreyCatalog}#pow" class="area">Zmierz <br>powierzchnię</a></li>
				{else}
					<li class="measure-mode"><a href="{url module=project action=item id=$project.id link_title=$project.name catalog=$sketch.props.storey|mapStoreyCatalog}" class="distance">Zmierz <br>odległość</a></li>
					<li class="measure-mode"><a href="{url module=project action=item id=$project.id link_title=$project.name catalog=$sketch.props.storey|mapStoreyCatalog}#pow" class="area">Zmierz <br>powierzchnię</a></li>
				{/if}
			
				{if $request.version == 'mirror'}
					<li class="measure"><a href="{url module=project action=item id=$project.id link_title=$project.name version=lustro catalog=$sketch.props.storey|mapStoreyCatalog}" class="distance">Zmierz</a></li>
				{else}
					<li class="measure"><a href="{url module=project action=item id=$project.id link_title=$project.name catalog=$sketch.props.storey|mapStoreyCatalog}" class="distance">Zmierz</a></li>
				{/if}
				
			{*/if*}
			</ul>
		</div>
		{if $sketch@first}
			<div class="info-box"><p><a href="/projekt-indywidualny.html"><img src="/img/indywidualne.jpg" width="410" height="176" alt="Indywidualne projekty domów" class="wolf"></a></p></div>
		{/if}
		{*if $nettoSum >= 170 && $sketch@first}
			<div class="info-box"><p><a href="https://formularz.rgsystem.pl/Studio-Atrium/?projekt={$project.name|replace:' ':'_'}&link={$projectUrl}" target="_blank"><img src="/img/rgsystem.jpg" width="410" height="250" alt="RG System" class="wolf"></a></p></div>
		{/if*}
	</div>
</div>
{/foreach}

{foreach $project.attachments.ProjectExtraImage as $extra name=extraList}
<div class="project-box">
	<div class="render-box sketch-box">
		<img class="lazy-image extra" data-uri="{image type=extra project=$project no=$extra@index}" src="/img/xg.png" width="{$extra.props.image_size.width}" height="{$extra.props.image_size.height}" alt="{$extra.title}">
	</div>
	
	<div class="data-box">
		<h4>{$extra.title|replace:$project.name:""}</h4>
		{if $extra.description}
			<p>{$extra.description}</p>
		{/if}
		{if $extra.title == 'Usytuowanie na działce'}
			{if $request.version == 'mirror'}
				<p><strong>UWAGA!<br>Prezentowane usytuwanie dotyczy podstawowej wersji projektu!</strong></p>
			{/if}
		{/if}
	</div>
</div>
{/foreach}

{if $opinions}
<div class="wrapper" id="opinions-box">
	<div class="box">
		<div class="flexslider">
			<ul class="slides" id="opinions">
			{foreach $opinions as $_item}
				<li>
					<p class="txt">{strip_tags($_item.content,"<b><strong><em><span>")}</p>
					<p>{$_item.author} | {$_item.publish_date|date_format:"%d %B %Y"}</p>
				</li>
			{/foreach}
			</ul>
		</div>
	</div>
</div>
{/if}

<div id="option">
	<span id="komentarze"><a href="/forum/">Forum dyskusyjne</a></span>
	<p>Wpisy dla projektu {$project.name}</p>
</div>

<div class="wrapper" id="extras-wrapper">
	<div class="box ajaxed" id="comment-list">
		<p class="just">
			Witamy na Forum dyskusyjnym Studia Atrium. To dział naszego serwisu przeznaczony dla wszystkich zainteresowanych projektami i budową domu według naszych projektów.
			Poniżej znajdują się wszystkie wpisy z Forum związane z projektem domu {$project.name}. Zapraszamy do dyskusji! Przeczytaj <span class="ajax-info" data-url="{url module=ajax action=get_comment_regulations}">regulamin korzystania</span>.
		</p>
	
		<div class="new-comment-trigger">
			<span class="framed blue" id="new-comment-trigger" data-parent="0">dodaj nowy temat</span>
		</div>
		
		<ul class="forum-menu" id="forum-menu">
			<li data-cat="0" class="selected"><span><strong>Wszystkie</strong> ({if $discuss_counter.sum}{$discuss_counter.sum}{else}0{/if})</span></li>
			{foreach $forumCategories as $_key => $_item}
				<li data-cat="{$_key}"><span class="{$_item.class}"><strong>{$_item.short}</strong> ({if $discuss_counter[$_key]}{$discuss_counter[$_key]}{else}0{/if})</span></li>
			{/foreach}
		</ul>
		
		<p class="forum-initial">Wpisy o projekcie {$project.name} <span id="cat-initial">z wszystkich kategorii Forum</span> <img src="/img/waiter-blue.gif" alt="" id="forum-waiter" style="display: none;"></p>
		
		<div id="comment-form-wrapper"{if $commentList} style="display: none;"{/if}>
			<form class="validable" id="comment-form" action="{url module=project action=add_comment}" method="post" data-call="Project.commentError" data-validate="ProjectCommentValidator.validate">
				<fieldset>
					<input type="hidden" name="module" value="project">
					<input type="hidden" name="action" value="add_comment">
					<input type="hidden" name="project_id" value="{$request.id}">
					<input type="hidden" name="parent_id" id="comment-parent-id" value="0">
					<input type="hidden" id="ownerUid" name="ownerUid" value="{$tmpStamp}">
					<input type="hidden" id="isTmpUid" name="isTmpUid" value="1">
					
					<div id="newTopicMsg">Uwaga! Dodajesz temat powiązany z projektem <strong>{$project.name}</strong>. Jeżeli nie chcesz wiązać go z projektem, przejdź do konkretnej kategorii <a href="/forum/">forum</a> i tam dodaj nowy wpis.</div> 
					
					<div>
						<input type="text" name="subject" id="comment-subject" placeholder="wpisz tytuł*" value="">
					</div>
					
					<div>
						<textarea id="comment-txt" name="comment" cols="1" rows="1" placeholder="wpisz treść*"></textarea>
						{*<p class="addFileTrigger"><span class="attach{if !$user} login-trigger{else} uploadTrigger{/if}" id="attachment" data-profile="DiscussImage" data-progressContainer="DiscussImageFileProgress">dodaj grafikę</span></p>*}
					</div>
					<div id="Content" style="position: relative;">
						<ul class="inputs-holder">
							<li class="validator-box short" id="comment-type-wrapper">
								<div class="select-wrapper">
								<label for="comment-type">Kategoria*</label>
									<div class="jui-select-box dark" id="type-box">
										<select name="comment_type" id="comment-type">
											{foreach $discuss_categories as $_key => $_item}
												<option value="{$_key}"{if $_key == 100} selected{/if}>{$_item.title}</option>
											{/foreach}
										</select>
									</div>
								</div>
							</li>
							<li class="mystic"><label for="comment-age">Wiek</label><input type="text" name="age" id="comment-age" value=""></li>
							{if !$user}<li class="middle"><span><a href="javascript:" class="login-trigger" id="post-login-trigger">Zaloguj się</a> lub wypełnij poniższe dane</span></li>{/if}
							<li class="spaced short"><label for="comment-nick">Nazwa / Nick*</label><input type="text" name="nick" id="comment-nick" value="{if $user.nick}{$user.nick}{else}{$user.name}{/if}"{if $user} readonly{/if}></li>
							<li class="rite noPadd short"><input type="checkbox" name="notify" id="notify"{if $user} class="notShow"{/if}><label class="nocaps" for="notify">chcę otrzymywać powiadomienia o nowych wpisach</label></li>
							<li class="short" id="post-mail-box" style="display: none;"><label for="post-email">E-mail</label><input type="text" name="email" id="post-email" value="{$user.email}"{if $user} readonly{/if}></li>
							<li class="middle">
								<p id="thumbnailHeader"{if !$uploadedTmp} style="display: none;"{/if}>wgrane grafiki:</p>
								<div id="thumbnailFile">
									<img src="/img/waiter-blue.gif" alt="" id="thumbnailFileProgress" style="display: none;">
									{if $uploadedTmp}
										{foreach from=$uploadedTmp.DiscussImage item=_file name=files}
											<a href="{$tmp_uploadsUrl}/{$_file.path}/{$_file.filename}" target="_blank" class="fileThmb" data-fileid="{$_file.id}"><img src="{$tmp_uploadsUrl}/{$_file.childAttachments.thumb[0].path}/{$_file.childAttachments.thumb[0].filename}"></a><a href="javascript:" data-fileid="{$_file.id}" class="remove" onClick="Uploader.removeSingleFile({$_file.id},1)"><img src="/img/x.png" class="remove"></a>
										{/foreach}
									{/if}
								</div>
							</li>
							<li class="rite middle short"><input type="checkbox" name="regulations" id="regulations"><label class="nocaps" for="regulations">akceptuję </label><span class="ajax-info" data-url="/?module=ajax&action=get_comment_regulations">regulamin korzystania</span></li>
							<li class="submit"><button class="baton" id="comment-publish-trigger">publikuj</button> <span><img id="comment-waiter" style="display: none;" src="/img/waiter-blue.gif" alt=""></span></li>
						</ul>
					</div>
				</fieldset>
			</form>
		</div>
	
		{if $commentList}
		<ul id="comment-entries">
		{foreach $commentList as $_comment}
			{if !$_comment.children}{assign var=class value=" noChildren"}{else}{assign var=class value=''}{/if}
				<li{if $_comment.author_id|avatar} class="avatar"{else}{if in_array($_comment.author_id, $adminIds)} class="sa"{else} data-initial="{$_comment.nick|truncate:1:""}" {/if}{/if}>
				
				<div>
				<div class="author">
					{if $_comment.author_id|avatar}<img src="{$_comment.author_id|avatar}" alt="{$_comment.nick}">{/if}
					<strong>{$_comment.nick}</strong>
					{if $_comment.author_id}
						{if !in_array($_comment.author_id, $adminIds)}
							{if $commentAuthors[$_comment.author_id]}
								<p>Posty: {$commentAuthors[$_comment.author_id].props.forum.count|default:0}</p>
								<p>Pierwszy post: {$commentAuthors[$_comment.author_id].props.forum.date|default:"-"}</p>
							{else}
								<p>Konto usunięte</p>
							{/if}	
						{/if}
						{if $user && $user.id != $_comment.author_id && $commentAuthors[$_comment.author_id]}
							{if in_array($_comment.author_id, $adminIds)}
								<p class="padd"><a href="{url module=panel action=message}"><span class="postme2">napisz wiadomość</span></a></p>
							{else}
								<p class="padd"><span class="postme" data-aid="{$_comment.author_id}">napisz wiadomość</span></p>
							{/if}	
						{/if}	
					{else}
						<p>niezarejestrowany</p>
					{/if}
				</div>
				<div class="comment">
					<a href="{url module=discuss action=thread id=$_comment.id}" class="title">{$_comment.topic}</a>
					{$_comment.content|unescape|nl2br|hideEmails}
					<p class="date">utworzony: {$_comment.create_date|date_format:"%d-%m-%Y (%H:%M:%S)"} <span>w kategorii: {$discuss_categories[$_comment.cat_id].title}</span></p>
					{if $_comment.attachments.DiscussImage}
						<p class="attachments">
							{foreach from=$_comment.attachments.DiscussImage item=_attachment}<a data-fancybox="forum_image" {if $_attachment.title} data-fancybox-title="{$_attachment.title}"{/if} href="{$uploadsUrl}/{$_attachment.path}/{$_attachment.filename}"><img src="{$uploadsUrl}/{$_attachment.childAttachments.thumb[0].path}/{$_attachment.childAttachments.thumb[0].filename}" alt="{if $_attachment.title}{$_attachment.title}{else}Grafika do wpisu{/if}"></a>{/foreach}
						</p>
					{/if}
				</div>
				
				<div class="reply-box">
					<span class="framed reply-trigger" data-parent="{$_comment.id}" data-parent-type="{$_comment.cat_id}">Odpowiedz</span>
				</div>
				</div>
				{if $_comment.children}
					<ul>
					{foreach $_comment.children as $_sub}
						<li{if $_sub.author_id|avatar} 
								class="avatar{if $_sub@iteration > 3} covered{/if}"{if $_comment@index == 0} style="display: inline-block;"{/if}
							{else}
								{if in_array($_sub.author_id, $adminIds)} 
									class="sa{if $_sub@iteration > 3} covered{/if}"{if $_comment@index == 0} style="display: inline-block;"{/if}
								{else} 
									data-initial="{$_sub.nick|truncate:1:""}"{if $_sub@iteration > 3} class="covered"{/if}{if $_comment@index == 0} style="display: inline-block;"{/if}
								{/if}
							{/if}>
							<div class="author">
								{if $_sub.author_id|avatar}<img src="{$_sub.author_id|avatar}" alt="{$_sub.nick}">{/if}
								<strong>{$_sub.nick}</strong>
								{if $_sub.author_id}
									{if !in_array($_sub.author_id, $adminIds)}
										{if $commentAuthors[$_sub.author_id]}
											<p>Posty: {$commentAuthors[$_sub.author_id].props.forum.count|default:0}</p>
											<p>Pierwszy post: {$commentAuthors[$_sub.author_id].props.forum.date|default:"-"}</p>
										{else}
											<p>Konto usunięte</p>
										{/if}	
									{/if}
									{if $user && $user.id != $_sub.author_id}
										{if in_array($_sub.author_id, $adminIds)}
											<p class="padd"><a href="{url module=panel action=message}"><span class="postme2">napisz wiadomość</span></a></p>
										{else}
											<p class="padd"><span class="postme" data-aid="{$_sub.author_id}">napisz wiadomość</span></p>
										{/if}	
									{/if}	
								{else}
									<p>niezarejestrowany</p>
								{/if}
							</div>
							<div class="comment">
								{$_sub.content|unescape|nl2br|hideEmails}
								<p class="date">utworzony: {$_sub.create_date|date_format:"%d-%m-%Y (%H:%M:%S)"}</p>
								{if $_sub.attachments.DiscussImage}
									<p class="attachments">
										{foreach from=$_sub.attachments.DiscussImage item=_attachment}<a data-fancybox="forum_image" {if $_attachment.title} data-fancybox-title="{$_attachment.title}"{/if} href="{$uploadsUrl}/{$_attachment.path}/{$_attachment.filename}"><img src="{$uploadsUrl}/{$_attachment.childAttachments.thumb[0].path}/{$_attachment.childAttachments.thumb[0].filename}" alt="{if $_attachment.title}{$_attachment.title}{else}Grafika do wpisu{/if}"></a>{/foreach}
									</p>
								{/if}
							</div>
						</li>
					{/foreach}
					</ul>
					{if $_sub@total > 3}
						{if $_comment@index == 0}
							<div class="more-box"><span class="show-more open">pokaż mniej odpowiedzi</span></div>
						{else}
							<div class="more-box"><span class="show-more">pokaż więcej odpowiedzi</span></div>
						{/if}
					{/if}
				{/if}
			</li>
		{/foreach}
		</ul>
		{/if}
		
		<div class="partners">
			<p>Współpracujemy</p>
	
			<div>
				{foreach $partners as $_partner}
					<a href="/dokumenty/Wspolpraca.html#par{$_partner.id}"><img class="lazy-image" src="/img/xg.png" data-uri="{articleImage document=$_partner}" alt="{$_partner.title}" width="1" height="1"></a>
				{/foreach}
			</div>
		</div>
	</div>
	
	<div class="box ajaxed" id="dload-list" style="display: none;">
	{if $user}
			{if $project.attachments.ProjectFile}
				{assign var=isSketch value=false}
				{assign var=isMaterial value=false}
				<ul>
				{*
					{foreach $project.attachments.ProjectFile as $file}
						{if !$file.props.storey || $file.props.storey == 'other'}
							<li><a href="{file project=$project no=$file@index}">pobierz {$file.title}</a></li>
						{elseif $file.props.storey == 'sketch'}
							{assign var=isSketch value=true}
							<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=sketch order=2}" data-call="ProjectRequest.registerRequestForm">Pobierz rysunki szczegółowe</span></li>
						{elseif $file.props.storey == 'materials'}
							{assign var=isMaterial value=true}
							<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=materials order=2}" data-call="ProjectRequest.registerRequestForm">Pobierz zestawienie materiałów</span></li>
						{elseif $file.props.storey == 'parcel_dwg'}
							{assign var=isparcelDwg value=true}
							<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=parcel_dwg order=2}" data-call="ProjectRequest.registerRequestForm">Pobierz obrys dwg</span></li>
						{elseif $file.props.storey == 'parcel_pdf'}
							{assign var=isparcelPdf value=true}
							<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=parcel_pdf order=2}" data-call="ProjectRequest.registerRequestForm">Pobierz obrys pdf</span></li>						
						{elseif $file.props.storey == 'woodwork'}
							{assign var=isWoodwork value=true}
							<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=woodwork order=2}" data-call="ProjectRequest.registerRequestForm">Pobierz zestawienie stolarki</span></li>
						{elseif $file.props.storey == 'cost_extract'}
							{assign var=isCostExtract value=true}
							<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=cost_extract order=2}" data-call="ProjectRequest.registerRequestForm">Pobierz wyciąg z kosztorysu</span></li>
						{/if}	
					{/foreach}
				 *}
					{if $projectParams|isAvailable && !$isSketch}
						<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=sketch order=1}" data-call="ProjectRequest.registerRequestForm">Zamów rysunki szczegółowe</span></li> 
					{/if}
					
					{if $projectParams|isAvailable && !$isMaterial}
						<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=materials order=1}" data-call="ProjectRequest.registerRequestForm">Zamów zestawienie materiałów</span></li> 
					{/if}
					
					{if $project.type != 'skeleton' && $projectParams|isAvailable && !$isparcelDwg}
						<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=parcel_dwg order=1}" data-call="ProjectRequest.registerRequestForm">Zamów obrys dwg</span></li> 
					{/if}
					
					{if $project.type != 'skeleton' && $projectParams|isAvailable && !$isparcelPdf}
						<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=parcel_pdf order=1}" data-call="ProjectRequest.registerRequestForm">Zamów obrys pdf</span></li> 
					{/if}
					
					{if $projectParams|isAvailable && !$isWoodwork}
						<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=woodwork order=1}" data-call="ProjectRequest.registerRequestForm">Zamów zestawienie stolarki</span></li> 
					{/if}
					
					{if !$noestimate && $project.type != 'skeleton'}
					<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=estimate order=2}" data-call="ProjectRequest.registerGenRequestForm">Pobierz szacunkowy kosztorys</span></li>
					{/if}
				</ul>
			{elseif $projectParams|isAvailable}
				<ul>
					<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=sketch order=1}" data-call="ProjectRequest.registerRequestForm">Zamów rysunki szczegółowe</span></li> 
					<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=materials order=1}" data-call="ProjectRequest.registerRequestForm">Zamów zestawienie materiałów</span></li>
					{if $project.type != 'skeleton'}
					<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=parcel_dwg order=1}" data-call="ProjectRequest.registerRequestForm">Zamów obrys dwg</span></li> 
					<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=parcel_pdf order=1}" data-call="ProjectRequest.registerRequestForm">Zamów obrys pdf</span></li> 
					{/if}
					<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=woodwork order=1}" data-call="ProjectRequest.registerRequestForm">Zamów zestawienie stolarki</span></li>
					{if !$noestimate && $project.type != 'skeleton'}
					<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=estimate order=2}" data-call="ProjectRequest.registerGenRequestForm">Pobierz szacunkowy kosztorys</span></li>
					{/if}
				</ul>
			{else}
				{if !$noestimate && $project.type != 'skeleton'}
				<ul>
					<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=estimate order=2}" data-call="ProjectRequest.registerGenRequestForm">Pobierz szacunkowy kosztorys</span></li>
				</ul>
				{else}
					<p>Nie znaleziono plików do pobrania dla tego projektu.</p>
				{/if}
			{/if}
	{elseif $projectParams|isAvailable}
		<p>Aby pobrać <strong>rysunki szczegółowe</strong>{if $project.type != 'skeleton' && $costs.total != -1}, <strong>kosztorys szacunkowy</strong>{/if}, <strong>obrysy domu</strong> lub <strong>zestawienie materiałów</strong> do tego projektu,<br><a href="javascript:" class="account login-trigger blue">zaloguj się do swojego konta</a> i przejdź ponownie do zakładki <strong>PLIKI</strong>.</p>	
	{else}
		{if !$noestimate && $project.type != 'skeleton'}
			<p>Aby pobrać <strong>kosztorys szacunkowy</strong> do tego projektu,<br><a href="javascript:" class="account login-trigger blue">zaloguj się do swojego konta</a> i przejdź ponownie do zakładki <strong>PLIKI</strong>.</p>
		{else}
			<p>Nie znaleziono plików do pobrania dla tego projektu.</p>
		{/if}
	{/if}	
{*
	{if $project.attachments.ProjectFile}
		<ul>
		{foreach $project.attachments.ProjectFile as $file}
			<li><a href="{file project=$project no=$file@index}">{$file.title}</a></li> 
		{/foreach}
		
		{if $projectParams|isAvailable}
			<li><span class="ajax-info" data-url="{url module=project action=get_request_form}" data-call="ProjectRequest.registerRequestForm">Zamów rysunki szczegółowe do projektu</span></li> 
		{/if}
		</ul>
	{else}
		{if $projectParams|isAvailable}
		<ul>
			<li><span class="ajax-info" data-url="{url module=project action=get_request_form}" data-call="ProjectRequest.registerRequestForm">Zamów rysunki szczegółowe do projektu</span></li> 
		</ul>
		{else}
			<p class="red">Nie znaleziono plików dla projektu.</p>
		{/if}
	{/if}
*}
	</div>
</div>

<div id="nav-bar">
	<ul style="display: none;">
		<li class="navi-render"><a href="javascript:" data-target="render-box">Wizualizacje</a></li>
		{if $project.attachments.ProjectInterior}
		<li class="navi-interiors"><a href="javascript:" data-target="interiors">Wnętrza</a></li>
		{/if}
		{if $project.attachments.ProjectElevation}
			<li class="navi-elevations"><a href="javascript:" data-target="elevations">Elewacje</a></li>
		{/if}	
		<li class="navi-sketch"><a href="javascript:" data-target="sketch-box" class="sketch">Rzuty</a></li>
	</ul>
	
	<ul style="display: none;" class="opts">
		<li class="navi-comment"><a href="javascript:" data-target="option" class="comment" data-id="comment">Forum</a></li>
		<li class="navi-similar"><a href="javascript:" data-target="option" class="similar" data-id="similar">Projekty podobne</a></li>
		<li class="navi-addons"><a href="javascript:" class="ajax-info addons" data-url="{url module=project_extend action=project_addons}&id={$project.id}" data-call="ProjectAddons.register" data-target="addons">Dodatki</a></li>
		<li class="navi-real"><a href="javascript:" data-target="option" class="real" data-id="real">Realizacje</a></li>
		<li class="navi-vendors"><a href="javascript:" data-target="option" class="vendors" data-id="vendors">Producenci</a></li>
		<li class="navi-dload"><a href="javascript:" data-target="option" class="dload" data-id="dload" id="dloadTrigger">Pliki</a></li>
		<li class="navi-faq" id="opts-faq"><a href="javascript:" data-target="option" class="faq" data-id="faq">FAQ</a></li>
		<li class="navi-sr" id="opts-sr" style="display: none;"><a href="javascript:" data-target="option" class="sr" data-id="sr">Wyposażenie</a></li>
	</ul>
</div>

<div class="blue-overlay" id="param-info-overlay">
	<div class="over-box" id="param-info-over-box"></div>
	<button type="button" id="param-info-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>

{if $skeletonPrice}
<div class="blue-overlay skeleton" id="skeleton-info-overlay">
	<div class="over-box" id="skeleton-info-over-box">
		<p class="nocaps">
		   Do tego projektu możemy wykonać wersję {if $project.type == 'house'}szkieletową{elseif $project.type == 'skeleton'}murowaną{/if}.
		   <br>Tylko teraz zrobimy to dla Ciebie w cenie <strong style="color: #000;">{$skeletonPrice} zł!</strong><br><br>Wszelkie formalności i termin realizacji ustalony zostanie telefonicznie. Wypełnij poniższy formularz - skontaktujemy się najszybciej jak to możliwe.
			{*Do tego projektu możemy wykonać wersję {if $project.type == 'house'}szkieletową{elseif $project.type == 'skeleton'}murowaną{/if} w cenie {$skeletonPrice} zł. Wszelkie formalności i termin realizacji ustalony zostanie telefonicznie. Wypełnij poniższy formularz - skontaktujemy się najszybciej jak to możliwe.*}
		</p>
		{if $project.type == 'house'}
		<p class="nocaps">
			Informujemy, że ze względu na specyfikę technologii szkieletowej, architektura, konstrukcja i funkcja budynku może ulec niewielkim zmianom w stosunku do wersji murowanej.
		</p>
		{/if}
		<form method="post" action="{url module='contact' action='skeleton'}" id="skeleton-form">
			<input type="hidden" id="skeleton-name" name="project_name" value="{$project.name}">
			<input type="hidden" name="project_type" value="{$project.type}">
			<input name="module" type="hidden" value="contact">
			<input name="action" type="hidden" value="skeleton">

			<p>
				<label for="skel-client" class="black">Imię i nazwisko</label>
				<input type="text" name="client" id="skel-client" class="long">
			</p>

			<p>
				<label for="skel-email" class="black">Twój adres e-mail</label>
				<input type="text" name="email" id="skel-email" class="long">
			</p>
			
			<p>
				<label for="skel-phone" class="black">Twój telefon</label>
				<input type="text" name="phone" id="skel-phone" class="long">
			</p>
			
			<p class="mystic">
				<label for="skel-age" class="black">Wiek</label>
				<input type="text" name="age" id="skel-age" class="long">
			</p>
			
			<p class="last"><input id="skeleton-button" type="submit" value="wyślij" class="baton"></p>
			<p class="nocaps" id="skeleton-fail-box" style="display: none;">Wypełnij poprawnie formularz</p>
		</form>
	</div>
	<button type="button" id="skeleton-info-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>
{/if}

{if $user}
<div class="blue-overlay message" id="message-overlay">
	<div class="over-box">
		<div>
			<form method="post" action="{url module=discuss action=send_message}" id="message-form">
				<input name="module" type="hidden" value="discuss">
				<input name="action" type="hidden" value="send_message">
				<input name="senderId" id="message-sender" type="hidden" value="{$user.id}">
				<input name="receiverId" id="message-receiver" type="hidden" value="">

				<p>
					<label for="message-title" class="black">Temat</label>
					<input type="text" name="title" id="message-title" class="long">
				</p>
				<p>
					<label for="message-content" class="black">Treść wiadomości</label>
					<textarea id="message-content" name="content" cols="1" rows="1"></textarea>
				</p>
				
				<p class="send-box"><input id="message-trigger" type="submit" value="wyślij" class="baton"></p>
				<p class="nocaps info-box" id="message-res-box" style="display: none;">Wypełnij poprawnie formularz</p>
			</form>
		</div>
	</div>
	<button type="button" id="message-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>
{/if}

<div class="blue-overlay share" id="social-overlay">
	<div class="over-box" id="social-over-box">
	
		<p class="share">Udostępnij</p>
	
		<ul id="share-project" class="house" data-url="{$projectUrl}" data-media="{image type=render project=$project}" data-description="{$project.short_description}" data-id="{$project.id}">
			<li><span class="face">facebook</span></li>
			<li><span class="pin">pinterest</span></li>
			<li><span class="url">url</span></li>
			<li><span class="mail">mail</span></li>
			<li>
				{if $request.version == 'mirror'}
					<a href="{url module=pdf action=project id=$project.id link_title=$project.name version=lustro}"><span class="print">print</span></a>
				{else}
					<a href="{url module=pdf action=project id=$project.id link_title=$project.name}"><span class="print">print</span></a>
				{/if}
			</li>
		</ul>
		
		<div class="link-box" id="link-box" style="display: none;">
			<p>skopiuj adres</p>
			<p>{$projectUrl}</p>
		</div>
		
		<div id="links-wrapper" style="display: none;">
			<p class="nocaps">Wypełnij poniższy formularz i prześlij informacje o projekcie znajomemu.</p>
			
			<form method="post" action="{url module='project' action='send'}" id="share-form" data-pid="{$project.id}">
				<input name="module" type="hidden" value="project">
				<input name="action" type="hidden" value="send">

				<p>
					<label for="receiver-email" class="black">E-mail odbiorcy</label>
					<input type="text" name="receiver_email" id="receiver-email" class="long">
				</p>
				<p>
					<label for="sender-email" class="black">Twój e-mail</label>
					<input type="text" name="sender_email" value="{$user.email}" id="sender-email" class="long">
				</p>
				
				<p>
					<label for="sender-sign" class="black">Twój podpis</label>
					<input type="text" name="signature" value="{$user.name} {$user.surname}" id="sender-sign" class="long">
				</p>
				
				<p class="last"><input id="share_button" type="submit" value="wyślij" class="baton"></p>
				<p class="nocaps" id="share-fail-box" style="display: none;">Wypełnij poprawnie formularz</p>
			</form>
		</div>
	</div>
	<button type="button" id="social-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>
<div id="backToTopOnHouse"></div>	
<div id="loader-box">
	<div class="uil-ripple-css" style='transform:scale(0.45);'><div></div><div></div></div>
</div>
{if $sketchAuthorize}
<div id="sketchToolTip" style="display: none;"></div>
{/if}