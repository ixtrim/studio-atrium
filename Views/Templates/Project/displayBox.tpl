<div class="container" id="project-list">
	<section>
		<div class="list-grid fav-wrapper" id="overlay-group">
		{foreach $list as $_project}
			<div>
				<figure>
					{if $_project@iteration < 7}
						<img src="{image type=render project=$_project size=box}" alt="Projekt domu {$_project.name}" width="640" height="427">
					{else}
						<img class="dummy" src="/img/dummy_list.png" data-uri="{image type=render project=$_project size=box}" alt="Projekt domu {$_project.name}" width="640" height="427">
					{/if}
					<figcaption>
						<a href="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}">
							<span>projekt domu {if $_project.params_general|hasFloor:true}piętrowego{elseif $_project.params_general|hasLoft:true}z poddaszem{elseif $_project.params_general|isGroundFloor:true}parterowego{/if}{if $isLocal} {$_project.symbol_alpha} {$_project.symbol_num}{/if}</span>
							<strong>{$_project.name} <span>{$_project.params_general|usableArea} m<sup>2</sup></span></strong>
						</a>
					</figcaption>
				</figure>
			
				<span class="overview" data-id="{$_project.id}" data-idx="{$_project@index}" data-img="{image type=render project=$_project size=presentation}" data-ground="{image type=sketch project=$_project}"{if $_project.params_general|hasFloor:true} data-floor="{image type=sketch project=$_project storey=1st_floor}"{/if}{if $_project.params_general|hasLoft:true} data-loft="{image type=sketch project=$_project storey=loft}"{/if} data-link="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}" data-price="{if $_project.price}{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}{else}-{/if}" data-name="{$_project.name}" data-area="{$_project.params_general|usableArea}" data-parcel="{$_project.params_general|parcelWidth} x {$_project.params_general|parcelHeight}" data-height="{$_project.params_general|houseHeight}" data-angle="{$_project.params_general|roofAngle}" data-version="{if $_project.type == 'skeleton'}wersja szkieletowa{else}wersja murowana{/if}" data-rooms="{$_project.params_general|roomCount}" data-txt="{$_project.short_description}"></span>
				<span id="compare-{$_project.id}" class="compare{if in_array($_project.id, $compareIds)} on{/if}" data-id="{$_project.id}"></span>
				<span id="fav-{$_project.id}" class="fav{if in_array($_project.id, $favouriteIds)} on{/if}" data-id="{$_project.id}"></span>

				{if $isNarrowCategory}
				<div class="left-label">
					<span>działka min. {$_project.params_general|parcelWidth}</span><span> m</span>
				</div>
				{/if}

				{if $_project|isNew || $_project.discount}
				<div>
					{if $_project.discount}<span class="discount">rabat {$_project.discount}</span>{/if}{if $_project|isNew}<span class="new">nowość</span>{/if}
				</div> 
				{/if}
			</div>
		{/foreach}
		</div>
	</section>
</div>

<div class="overlay">
	<div class="overlay-project-box" id="over-pop">
		<div id="over-img-box">
			<ul id="over-pics">
				<li><span id="over-render" class="selected">Wizualizacja</span></li>
				<li><span id="over-ground" class="noview">Rzut parteru</span></li>
				<li><span id="over-floor" class="noview">Rzut piętra</span></li>
				<li><span id="over-loft" class="noview">Rzut poddasza</span></li>
			</ul>
			<a href="">
				<img class="preload" id="over-img" src="/img/dummy.png" width="1350" height="900" alt="Render">
			</a>
		</div>
		
		<ul id="over-params">
			<li><h6 id="over-name"></h6></li>
			<li class="small"><span id="over-txt"></span></li>
			<li><span id="over-version"></span></li>
			<li><p>ilość pokoi: <span id="over-rooms"></span></p></li>
			<li><p>powierzchnia użytkowa: <strong id="over-area"></strong> m<sup>2</sup></p></li>
			<li><p>min. wymiary działki: <span id="over-parcel"></span> m</p></li>
			<li><p>wysokość budynku: <span id="over-height"></span> m</p></li>
			<li><p>kąt nachylenia dachu: <span id="over-angle"></span></p></li>
			<li><p>cena projektu: <span id="over-price"></span> zł</p></li>
			<li><a href="" class="more">Zobacz szczegóły</a></li>
		</ul>
		
		<button type="button" class="overlay-change prev" id="prev-overlay">poprzedni</button>
		<button type="button" class="overlay-change next" id="next-overlay">następny</button>
	</div>
	
	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div>