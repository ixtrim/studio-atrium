{$catalog = 'projekty/'|cat:{$type|projectType:true:true|strtolower}}
<section>
	<div class="box">
		<ul class="detail">
		{foreach $list as $_project}
			<li>
				{if $type == 'small'}
				<ul class="even">
					<li>
						<div>
						<a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$_project.type|projectCatalog}">
							<img src="{image type=render project=$_project size=list}" alt="{$_project.type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num} - wizualizacja 1">
						</a>
						{if $_project.discount}<span class="label discount left">Rabat {$_project.discount} zł</span>{/if}
						</div>
					</li>
					<li>
						<a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$_project.type|projectCatalog}">
							<img src="{image type=render project=$_project size=list no=1}" alt="{$_project.type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num} - wizualizacja 2">
						</a>
					</li>
					<li class="data">
						<h6><a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$_project.type|projectCatalog}">{$_project.type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}</a></h6>
						
						<p>{$_project.short_description}</p>
						
						<ul>
							{if $_project.type == 'fence'}
							<li>wysokość przęsła: {$_project.params_general|fenceSpanHeight:true}</li>
							<li>wysokość zadaszenia: {$_project.params_general|fenceRoofHeight:true}</li>
							{else}
							<li>powierzchnia użytkowa: <span>{$_project.params_general|usableArea}</span> m<sup>2</sup></li>
							<li>powierzchnia całkowita: {$_project.params_general|totalArea:true}</li>
							<li>kąt nachylenia dachu: {$_project.params_general|roofAngle:true}</li>
							{if $_project.type=='carport'}
							<li>wysokość wiaty: {$_project.params_general|carportHeight:true}</li>
							{/if}
							{if $_project.type=='arbor'}
							<li>wysokość altany: {$_project.params_general|arborHeight:true}</li>
							{/if}
							{/if}
							<li>cena projektu: {$_project.price} zł</li>
						</ul>
					</li>
				</ul>
				{else}
				<ul{if $type == 'fence' || $type == 'arbor' || $type == 'carport'} class="even"{/if}>
					<li>
						<div>
						<a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$catalog}">
							<img src="{image type=render project=$_project size=list}" alt="{$type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num} - wizualizacja 1">
						</a>
						{if $_project.discount}<span class="label discount left">Rabat {$_project.discount} zł</span>{/if}
						</div>
					</li>
					{if $type == 'fence' || $type == 'arbor' || $type == 'carport'}
					<li>
						<a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$catalog}">
							<img src="{image type=render project=$_project size=list no=1}" alt="{$type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num} - wizualizacja 2">
						</a>
					</li>
					{else}
					<li class="slide" data-id="{$_project.id}">
						<img id="img-{$_project.id}" data-src="{image type=sketch project=$_project}" src="{image type=sketch project=$_project size=list}" alt="Rzut">
					</li>
					{/if}
					<li class="data">
						<h6><a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$catalog}">{$type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}</a></h6>
						
						<p>{$_project.short_description}</p>
						
						<ul>
							{if $type == 'fence'}
							<li>wysokość przęsła: {$_project.params_general|fenceSpanHeight:true}</li>
							<li>wysokość zadaszenia: {$_project.params_general|fenceRoofHeight:true}</li>
							{else}
							<li>powierzchnia użytkowa: <span>{$_project.params_general|usableArea}</span> m<sup>2</sup></li>
							<li>powierzchnia całkowita: {$_project.params_general|totalArea:true}</li>
							<li>kąt nachylenia dachu: {$_project.params_general|roofAngle:true}</li>
							{if $type=='carport'}
							<li>wysokość wiaty: {$_project.params_general|carportHeight:true}</li>
							{/if}
							{if $type=='arbor'}
							<li>wysokość altany: {$_project.params_general|arborHeight:true}</li>
							{/if}
							{/if}
							<li>cena projektu: {$_project.price} zł</li>
						</ul>
					</li>
				</ul>
				{/if}
			</li>
		{/foreach}
		</ul>
	</div>
</section>