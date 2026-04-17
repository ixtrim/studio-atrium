<section>
	<div class="box">
		<ul class="detail fav-wrapper">
		{foreach $list as $_project}
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
					<li>
						<div>
							<a href="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}">
								<img src="{image type=render project=$_project size=list}" alt="{$altTitle} {$_project.name|strtoupper}">
							</a>
							<span id="compare-{$_project.id}" class="compare{if in_array($_project.id, $compareIds)} on{/if}" data-id="{$_project.id}"></span>
							<span id="fav-{$_project.id}" class="fav{if in_array($_project.id, $favouriteIds)} on{/if}" data-id="{$_project.id}"></span>
							{if $_project|isNew}<span class="label">Nowość</span>{/if}
							{if $_project.discount}<span class="label discount{if !$_project|isNew} left{/if}">Rabat {$_project.discount} zł</span>{/if}
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
							<li>powierzchnia zabudowy: {$_project.params_general|buildArea} m<sup>2</sup></li>
							<li>ilość pokoi: {$_project.params_general|roomCount}</li>
							<li>kąt nachylenia dachu: {$_project.params_general|roofAngle:true|default:"płaski"}</li>
							<li>wysokość budynku: {$_project.params_general|houseHeight:true}</li>
							<li>działka minimalna: {$_project.params_general|parcelWidth} x {$_project.params_general|parcelHeight} m</li>
							<li>
								cena projektu: {if $_project.discount}<span class="discount">{$_project.price}</span>{$_project.price - $_project.discount}{else}{$_project.price}{/if} zł
							</li>
						</ul>
					</li>
				</ul>
			</li>
		{/foreach}
		</ul>
	</div>
</section>