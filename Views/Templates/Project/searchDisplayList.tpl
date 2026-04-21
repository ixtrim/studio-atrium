<section>
	<div class="box">
		<ul class="list">
		{foreach $list as $_project}
		{if $_project.name}
			{$linkTitle = $_project.name}
		{else}
			{$linkTitle = "`$_project.symbol_alpha` `$_project.symbol_num`"}
		{/if}
			<li>
				<ul class="list-item fav-wrapper">
					<li>
						<ul>
							<li>
								<a href="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}">
									<img src="{image type=render project=$_project size=list}" alt="{$linkTitle}">
								</a>
								{if $_project|isNew}<span class="label">Nowość</span>{/if}
								{if $_project.discount && $_project.alternate_name != 'wycofany'}<span class="label discount{if !$_project|isNew} left{/if}">Rabat {$_project.discount} zł</span>{/if}
							</li>
							{if $_project.type != 'tank'}
								<li>
									{if $_project.type == 'house' || $_project.type == 'skeleton'}
										<span id="compare-{$_project.id}" class="compare{if in_array($_project.id, $compareIds)} on{/if}" data-id="{$_project.id}"></span>
										<span id="fav-{$_project.id}" class="fav{if in_array($_project.id, $favouriteIds)} on{/if}" data-id="{$_project.id}"></span>
									{/if}
									<a href="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}">
										<img src="{image type=render project=$_project size=list no=1}" alt="{$linkTitle}">
									</a>
								</li>
							{/if}	
						</ul>
					</li>
					
					<li>
						<h6><a href="{url module=project action=item id=$_project.id link_title=$linkTitle catalog=$_project.type|projectCatalog}">{$linkTitle}</a></h6>
						{if $_project.type == 'tank'}
							<p>kubatura brutto: <span>{$_project.params_general|cubature}</span> m<sup>3</sup></p>
						{elseif $_project.type == 'fence'}
							<p>wysokość przęsła: {$_project.params_general|fenceSpanHeight:true}</p>
							<p>wysokość zadaszenia: {$_project.params_general|fenceRoofHeight:true}</p>
						{else}	
							<p>powierzchnia użytkowa: <span>{$_project.params_general|usableArea}</span> m<sup>2</sup></p>
						{/if}
						<p>{$_project.short_description}</p>
						{if $_project.alternate_name == 'wycofany'}
							<p><strong>Uwaga! Projekt wycofany z oferty.</strong></p>
						{/if}	
					</li>
				</ul>
			</li>
		{/foreach}
		</ul>
	</div>
</section>