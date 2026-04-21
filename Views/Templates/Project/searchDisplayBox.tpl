<div class="container" id="project-list">
	<section>
		<div class="list-grid fav-wrapper" id="overlay-group">
		{foreach $list as $_project}
			<div>
				{$usableArea = $_project.params_general|usableArea}
				{if $_project.name}
					{$linkTitle = $_project.name}
				{else}
					{$linkTitle = "`$_project.symbol_alpha` `$_project.symbol_num`"}
				{/if}
				<figure>
					<img src="{image type=render project=$_project size=box}" alt="{$linkTitle}">
					<figcaption>
						<a href="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}">
							<span>{if $_project.type == 'house' || $_project.type == 'skeleton'}projekt domu {if $_project.params_general|hasFloor:true}piętrowego{elseif $_project.params_general|hasLoft:true}z poddaszem{elseif $_project.params_general|isGroundFloor:true}parterowego{/if}{else}{$_project.type|projectType:false:false|strtolower}{/if}{if $isLocal} {$_project.symbol_alpha} {$_project.symbol_num}{/if}</span>
							<strong>{$linkTitle}{if $usableArea} <span>{$usableArea} m<sup>2</sup></span>{/if}</strong>
						</a>
					</figcaption>
				</figure>
			{if $_project.alternate_name != 'wycofany'}
				{if $_project.type == 'house' || $_project.type == 'skeleton'}
					<span id="compare-{$_project.id}" class="compare{if in_array($_project.id, $compareIds)} on{/if}" data-id="{$_project.id}"></span>
					<span id="fav-{$_project.id}" class="fav{if in_array($_project.id, $favouriteIds)} on{/if}" data-id="{$_project.id}"></span>
				{/if}
				
				{if $_project.type == 'house' || $_project.type == 'skeleton'}
					<span class="overview" data-id="{$_project.id}" data-idx="{$_project@index}" data-img="{image type=render project=$_project size=presentation}" data-ground="{image type=sketch project=$_project}"{if $_project.params_general|hasFloor:true} data-floor="{image type=sketch project=$_project storey=1st_floor}"{/if}{if $_project.params_general|hasLoft:true} data-loft="{image type=sketch project=$_project storey=loft}"{/if} data-link="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}" data-price="{if $_project.price}{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}{else}-{/if}" data-name="{$linkTitle}" data-area="{$_project.params_general|usableArea}" data-parcel="{$_project.params_general|parcelWidth} x {$_project.params_general|parcelHeight}" data-height="{$_project.params_general|houseHeight}" data-angle="{$_project.params_general|roofAngle}" data-version="{if $_project.type == 'skeleton'}wersja szkieletowa{else}wersja murowana{/if}" data-rooms="{$_project.params_general|roomCount}" data-txt="{$_project.short_description}"></span>
				{elseif $_project.type == 'fence'}
					<span class="overview only" data-id="{$_project.id}" data-idx="{$_project@index}" data-img="{image type=render project=$_project size=presentation}" data-link="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}" data-price="{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}" data-name="{$_project.type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}" data-span="{$_project.params_general|fenceSpanHeight}" data-roofing="{$_project.params_general|fenceRoofHeight}"></span>				
				{elseif $_project.type == 'arbor'}
					<span class="overview only" data-id="{$_project.id}" data-idx="{$_project@index}" data-img="{image type=render project=$_project size=presentation}" data-link="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}" data-price="{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}" data-name="{$_project.type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}" data-area="{$usableArea}" data-total-area="{$_project.params_general|totalArea}" data-height="{$_project.params_general|arborHeight}" data-angle="{$_project.params_general|roofAngle}" data-txt="{$_project.short_description}"></span>				
				{elseif $_project.type == 'outbuilding'}
					<span class="overview only" data-id="{$_project.id}" data-idx="{$_project@index}" data-img="{image type=render project=$_project size=presentation}" data-link="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}" data-price="{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}" data-name="{$_project.type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}" data-area="{$usableArea}" data-total-area="{$_project.params_general|totalArea}" data-height="{$_project.params_general|houseHeight}" data-angle="{$_project.params_general|roofAngle}" data-txt="{$_project.short_description}"></span>				
				{elseif $_project.type == 'carport'}
					<span class="overview only" data-id="{$_project.id}" data-idx="{$_project@index}" data-img="{image type=render project=$_project size=presentation}" data-link="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}" data-price="{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}" data-name="{$_project.type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}" data-area="{$usableArea}" data-total-area="{$_project.params_general|totalArea}" data-height="{$_project.params_general|carportHeight}" data-angle="{$_project.params_general|roofAngle}" data-txt="{$_project.short_description}"></span>				
				{elseif $_project.type == 'garage'}
					<span class="overview only" data-id="{$_project.id}" data-idx="{$_project@index}" data-img="{image type=render project=$_project size=presentation}" data-link="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}" data-price="{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}" data-name="{$_project.type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}" data-area="{$_project.params_general|usableArea}" data-total-area="{$_project.params_general|totalArea}" data-height="{$_project.params_general|garageHeight}" data-angle="{$_project.params_general|roofAngle}" data-txt="{$_project.short_description}"></span>				
				{/if}
				
				{if $_project|isNew || $_project.discount}
				<div>
					{if $_project.discount}<span class="discount">rabat {$_project.discount}</span>{/if}{if $_project|isNew}<span class="new">nowość</span>{/if}
				</div> 
				{/if}
			{else}
			<div>
				<span style="background-color: #000; width: 180px; font-weight: bold;">WYCOFANY Z OFERTY!</span>
			</div> 	
			{/if}	
			</div>
		{/foreach}
		</div>
{*
		<div class="grid fav-wrapper">
		{foreach $list as $_project}
		{$usableArea = $_project.params_general|usableArea}
		{if $_project.name}
			{$linkTitle = $_project.name}
		{else}
			{$linkTitle = "`$_project.symbol_alpha` `$_project.symbol_num`"}
		{/if}
		<figure class="effect-sadie">
			<img src="{image type=render project=$_project size=list}" alt="{$linkTitle}">
			{if $_project.type == 'house' || $_project.type == 'skeleton'}<span id="fav-{$_project.id}" class="fav{if in_array($_project.id, $favouriteIds)} on{/if}" data-id="{$_project.id}"></span>{/if}
			{if $_project|isNew}<span class="label">nowość</span>{/if}
			{if $_project.discount}<span class="label{if !$_project|isNew} discount{/if}">rabat {$_project.discount}</span>{/if}
			<span class="close-sadie"></span>
			
			<figcaption>
				<h6>{if $_project.type == 'house' || $_project.type == 'skeleton'}{$linkTitle}{else}{$_project.type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}{/if}</h6>
				<div>
					{if $_project.type == 'house' || $_project.type == 'skeleton'}
						<p>pow. użytkowa: {$_project.params_general|usableArea} <span>m<sup>2</sup></p>
						<p class="rooms">ilość pokoi: {$_project.params_general|roomCount}</p>
						<p>działka minimalna: {$_project.params_general|parcelWidth} x {$_project.params_general|parcelHeight} m</p>
					{elseif $usableArea}
						<p>pow. użytkowa {$usableArea} <span>m<sup>2</sup></span></p>
					{/if}
					<p class="desc">{$_project.short_description|truncate:100}</p>
				</div>
				{if $_project.type == 'house' || $_project.type == 'skeleton'}
					<span class="framed overview" data-id="{$_project.id}" data-img="{image type=render project=$_project size=presentation}" data-link="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}" data-price="{if $_project.price}{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}{else}-{/if}" data-name="{$linkTitle}" data-area="{$_project.params_general|usableArea}" data-parcel="{$_project.params_general|parcelWidth} x {$_project.params_general|parcelHeight}" data-height="{$_project.params_general|houseHeight}" data-angle="{$_project.params_general|roofAngle}" data-version="{if $_project.type == 'skeleton'}wersja szkieletowa{else}wersja murowana{/if}">
						<span>Szybki podgląd</span>
					</span>
				{elseif $_project.type == 'fence'}
					<span class="framed overview" data-id="{$_project.id}" data-img="{image type=render project=$_project size=presentation}" data-link="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}" data-price="{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}" data-name="{$_project.type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}" data-span="{$_project.params_general|fenceSpanHeight}" data-roofing="{$_project.params_general|fenceRoofHeight}">
						<span>Szybki podgląd</span>
					</span>				
				{elseif $_project.type == 'arbor'}
					<span class="framed overview" data-id="{$_project.id}" data-img="{image type=render project=$_project size=presentation}" data-link="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}" data-price="{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}" data-name="{$_project.type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}" data-area="{$usableArea}" data-total-area="{$_project.params_general|totalArea}" data-height="{$_project.params_general|arborHeight}" data-angle="{$_project.params_general|roofAngle}">
						<span>Szybki podgląd</span>
					</span>				
				{elseif $_project.type == 'carport'}
					<span class="framed overview" data-id="{$_project.id}" data-img="{image type=render project=$_project size=presentation}" data-link="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}" data-price="{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}" data-name="{$_project.type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}" data-area="{$usableArea}" data-total-area="{$_project.params_general|totalArea}" data-height="{$_project.params_general|carportHeight}" data-angle="{$_project.params_general|roofAngle}">
						<span>Szybki podgląd</span>
					</span>				
				{elseif $_project.type == 'garage'}
					<span class="framed overview" data-id="{$_project.id}" data-img="{image type=render project=$_project size=presentation}" data-link="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}" data-price="{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}" data-name="{$_project.type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}" data-area="{$_project.params_general|usableArea}" data-total-area="{$_project.params_general|totalArea}" data-height="{$_project.params_general|garageHeight}" data-angle="{$_project.params_general|roofAngle}">
						<span>Szybki podgląd</span>
					</span>				
				{/if}
				
				<a href="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}"><span class="mobile-sadie">{if $_project.type == 'house' || $_project.type == 'skeleton'}projekt domu {if $_project.params_general|hasFloor:true}piętrowego{elseif $_project.params_general|hasLoft:true}z poddaszem{elseif $_project.params_general|isGroundFloor:true}parterowego{/if}{else}{$_project.type|projectType:false:false|strtolower}{/if}{if $isLocal} {$_project.symbol_alpha} {$_project.symbol_num}{/if} <strong>{$linkTitle}{if $usableArea} <span>{$usableArea} m<sup>2</sup></span>{/if}</strong></span></a>
			</figcaption>
		</figure>
		{/foreach}
		</div>
*}
	</section>
</div>

<div class="overlay">
	<div class="overlay-project-box" id="over-pop">
		<div class="fav-wrapper" id="over-img-box">
			<ul id="over-pics">
				<li><span id="over-render" class="selected">Wizualizacja</span></li>
				<li><span id="over-ground" class="noview">Rzut parteru</span></li>
				<li><span id="over-floor" class="noview">Rzut piętra</span></li>
				<li><span id="over-loft" class="noview">Rzut poddasza</span></li>
			</ul>
		
			<a href="">
				<img id="over-img" src="/img/dummy.png" width="1350" height="900" alt="Render">
			</a>
		</div>
		
		<ul id="over-params">
			<li><h6 id="over-name"></h6></li>
			<li class="small"><span id="over-txt"></span></li>
			<li><span id="over-version"></span></li>
			<li id="over-rooms-wrapper"><p>ilość pokoi: <span id="over-rooms"></span></p></li>
			<li id="over-area-wrapper"><p>powierzchnia użytkowa: <span id="over-area"></span> m<sup>2</sup></p></li>
			<li id="over-parcel-wrapper"><p>min. wymiary działki: <span id="over-parcel"></span> m</p></li>
			<li id="over-total-area-wrapper"><p>powierzchnia całkowita: <span id="over-total-area"></span> m</p></li>
			<li id="over-height-wrapper"><p>wysokość: <span id="over-height"></span> m</p></li>
			<li id="over-angle-wrapper"><p>kąt nachylenia dachu: <span id="over-angle"></span></p></li>
			<li id="over-span-height-wrapper"><p>wysokość przęsła: <span id="span-height"></span> cm</p></li>
			<li id="over-roof-height-wrapper"><p>wysokość zadaszenia: <span id="roofing-height"></span> cm</p></li>
			<li id="over-build-area-wrapper"><p>powierzchnia zabudowy: <span id="over-build-area"></span> m<sup>2</sup></p></li>
			<li id="over-cubature-wrapper"><p>kubatura brutto: <span id="over-cubature"></span> m<sup>3</sup></p></li>
			<li><p>cena projektu: <span id="over-price"></span> zł</p></li>
			<li><a href="" class="more">Zobacz szczegóły</a></li>
		</ul>
		
		<button type="button" class="overlay-change prev" id="prev-overlay">poprzedni</button>
		<button type="button" class="overlay-change next" id="next-overlay">następny</button>
	</div>
	
	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div>