{$catalog = 'projekty/'|cat:{$type|projectType:true:true|strtolower}}

<section>
	<div class="box">
		<ul class="list">
		{foreach $list as $_project}
			<li>
			{if $type == 'tank'}
				<ul class="short-list-item">
					<li>
						<a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$catalog}">
							<img src="{image type=render project=$_project size=list}" alt="{$type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}">
						</a>
					</li>
					
					<li>
						<h6><a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$catalog}">{$type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}</a></h6>
						<p>kubatura brutto: <span>{$_project.params_general|cubature}</span> m<sup>3</sup></p>
						<p>{$_project.short_description}</p>
					</li>
				</ul>
			{elseif $type == 'fence'}
				<ul class="short-list-item">
					<li>
						<a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$catalog}">
							<img src="{image type=render project=$_project size=list}" alt="{$type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}">
						</a>
						{if $_project.discount}<span class="label discount left">Rabat {$_project.discount} zł</span>{/if}
					</li>
					
					<li>
						<h6><a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$catalog}">{$type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}</a></h6>
						<p>wysokość przęsła: {$_project.params_general|fenceSpanHeight:true}</p>
						<p>wysokość zadaszenia: {$_project.params_general|fenceRoofHeight:true}</p>
						<p>{$_project.short_description}</p>
					</li>
				</ul>
			{elseif $type == 'small'}
				<ul class="list-item">
					<li>
						<ul>
							<li>
								<a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$_project.type|projectCatalog}">
									<img src="{image type=render project=$_project size=list}" alt="{$_project.type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}">
								</a>
								{if $_project.discount}<span class="label discount left">Rabat {$_project.discount} zł</span>{/if}
							</li>
							<li>
								<a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$_project.type|projectCatalog}">
									<img src="{image type=render project=$_project size=list no=1}" alt="{$_project.type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}">
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<h6><a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$_project.type|projectCatalog}">{$_project.type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}</a></h6>
						<p>powierzchnia użytkowa: <span>{$_project.params_general|usableArea}</span> m<sup>2</sup></p>
						<p>{$_project.short_description}</p>
					</li>
				</ul>	
			{else}
				<ul class="list-item">
					<li>
						<ul>
							<li>
								<a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$catalog}">
									<img src="{image type=render project=$_project size=list}" alt="{$type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}">
								</a>
								{if $_project.discount}<span class="label discount left">Rabat {$_project.discount} zł</span>{/if}
							</li>
							<li>
								<a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$catalog}">
									<img src="{image type=render project=$_project size=list no=1}" alt="{$type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}">
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<h6><a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$catalog}">{$type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}</a></h6>
						<p>powierzchnia użytkowa: <span>{$_project.params_general|usableArea}</span> m<sup>2</sup></p>
						<p>{$_project.short_description}</p>
					</li>
				</ul>
			{/if}
			</li>
		{/foreach}
		</ul>
	</div>
</section>