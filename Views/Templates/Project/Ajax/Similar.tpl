{if $list}
<div class="wrapper ajaxed" id="similar-list" style="display: none;">
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
						<h6><a href="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}">{$_project.name}</a> {if $isLocal} <span style="font-size: 1.6rem;">({$_project.symbol_alpha} {$_project.symbol_num})</span>{/if}</h6>
						
						<p>{$similiar[$_project.id].description}</p>
						
						<ul>
							<li>powierzchnia użytkowa: {$_project.params_general|usableArea} m<sup>2</sup></li>
							<li>wysokość budynku: {$_project.params_general|houseHeight} m</li>
							{if $_project.params_general|roofAngle}
							<li>kąt nachylenia dachu: {$_project.params_general|roofAngle}&deg;</li>
							{/if}
							<li>min. wymiary działki: {$_project.params_general|parcelWidth} x {$_project.params_general|parcelHeight} m</li>
							{if $_project.alternate_name == 'wycofany'}
							<li><strong>Uwaga! Projekt wycofany z oferty.</strong></li>
							{else}
							<li>cena projektu: {$_project.price} zł</li>
							{/if}
						</ul>
					</li>
				</ul>
			</li>
		{/foreach}
		</ul>
	</div>
</div>
{else}
<div class="wrapper ajaxed" id="similar-list">
	<div class="box">
		<p class="red">Nie znaleziono podobnych projektów.</p>
	</div>
</div>
{/if}