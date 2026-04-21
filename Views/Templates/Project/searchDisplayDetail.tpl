<section>
	<div class="box">
		<ul class="detail fav-wrapper">
		{foreach $list as $_project}
		{if $_project.name}
			{$linkTitle = $_project.name}
		{else}
			{$linkTitle = "`$_project.symbol_alpha` `$_project.symbol_num`"}
		{/if}	
			<li>
				<ul>
					<li>
						<div>
							<a href="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}">
								<img src="{image type=render project=$_project size=list}" alt="{$linkTitle}">
							</a>
							{if $_project.type == 'house' || $_project.type == 'skeleton'}
								<span id="compare-{$_project.id}" class="compare{if in_array($_project.id, $compareIds)} on{/if}" data-id="{$_project.id}"></span>
								<span id="fav-{$_project.id}" class="fav{if in_array($_project.id, $favouriteIds)} on{/if}" data-id="{$_project.id}"></span>
							{/if}	
							{if $_project|isNew}<span class="label">Nowość</span>{/if}
							{if $_project.discount && $_project.alternate_name != 'wycofany'}<span class="label discount{if !$_project|isNew} left{/if}">Rabat {$_project.discount} zł</span>{/if}
						</div>
					</li>
					{if $_project.type == 'house' || $_project.type == 'skeleton' || $_project.type == 'garage'}
						<li class="slide" data-id="{$_project.id}">
							<img id="img-{$_project.id}" data-src="{image type=sketch project=$_project}" src="{image type=sketch project=$_project size=list}" alt="{if $_project.type == 'garage'}Rzut garażu{else}Rzut parteru{/if}">
						</li>
					{/if}
					<li class="data">
						<h6><a href="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}">{if $isLocal}<small style="font-size: 1.2rem;">({$_project.symbol_alpha} {$_project.symbol_num})</small> {/if}{$linkTitle}</a></h6>
						
						<p>{$_project.short_description}</p>
						
						<ul>
							{if $_project.type == 'house'}<li>wersja murowana</li>{elseif $_project.type == 'skeleton'}<li>wersja szkieletowa</li>{/if}
							{if $_project.type == 'tank'}
								<p>kubatura brutto: <span>{$_project.params_general|cubature}</span> m<sup>3</sup></p>
							{else}
								<li>powierzchnia użytkowa: <span>{$_project.params_general|usableArea}</span> m<sup>2</sup></li>
							{/if}
							{if $_project.type != 'house' && $_project.type != 'skeleton' && $_project.type != 'tank'}<li>powierzchnia całkowita: {$_project.params_general|totalArea:true}</li>{/if}
							{if $_project.type == 'house' || $_project.type == 'skeleton'}<li>ilość pokoi: {$_project.params_general|roomCount}</li>{/if}
							{if $_project.type != 'tank' && $_project.type != 'fence'}<li>kąt nachylenia dachu: {$_project.params_general|roofAngle:true}</li>{/if}
							{if $_project.type == 'house' || $_project.type == 'skeleton'}<li>wysokość budynku: {$_project.params_general|houseHeight:true}</li>
								{elseif $_project.type == 'garage'}<li>wysokość garażu: {$_project.params_general|garageHeight:true}</li>
								{elseif $_project.type == 'carport'}<li>wysokość wiaty: {$_project.params_general|carportHeight:true}</li>
								{elseif $_project.type == 'arbor'}<li>wysokość altany: {$_project.params_general|arborHeight:true}</li>{/if}
							{if $_project.type == 'house' || $_project.type == 'skeleton'}<li>działka minimalna: {$_project.params_general|parcelWidth} x {$_project.params_general|parcelHeight} m</li>{/if}
							{if $_project.type == 'fence'}
								<li>wysokość przęsła: {$_project.params_general|fenceSpanHeight:true}</li>
								<li>wysokość zadaszenia: {$_project.params_general|fenceRoofHeight:true}</li>
							{/if}
							{if $_project.alternate_name == 'wycofany'}
							<li><strong>Uwaga! Projekt wycofany z oferty.</strong></li>
							{else}
							<li>cena projektu: {if $_project.discount}<span class="discount">{$_project.price}</span>{$_project.price - $_project.discount}{else}{$_project.price}{/if} zł</li>
							{/if}
						</ul>
					</li>
				</ul>
			</li>
		{/foreach}
		</ul>
	</div>
</section>