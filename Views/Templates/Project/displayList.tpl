<section>
	<div class="box">
		<ul class="list">
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
				<ul class="list-item fav-wrapper">
					<li>
						<ul>
							<li>
								<a href="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}">
									<img src="{image type=render project=$_project size=list}" alt="{$altTitle} {$_project.name|strtoupper} - wizualizacja 1">
								</a>
								{if $_project|isNew}<span class="label">Nowość</span>{/if}
								{if $_project.discount}<span class="label discount{if !$_project|isNew} left{/if}">Rabat {$_project.discount} zł</span>{/if}
							</li>
							<li>
								<span id="compare-{$_project.id}" class="compare{if in_array($_project.id, $compareIds)} on{/if}" data-id="{$_project.id}"></span>
								<span id="fav-{$_project.id}" class="fav{if in_array($_project.id, $favouriteIds)} on{/if}" data-id="{$_project.id}"></span>
								<a href="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}">
									<img src="{image type=render project=$_project size=list no=1}" alt="{$altTitle} {$_project.name|strtoupper} - wizualizacja 2">
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<h6><a href="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}">{$_project.name}</a></h6>
						<p>powierzchnia użytkowa: <span>{$_project.params_general|usableArea}</span> m<sup>2</sup></p>
						<p>działka minimalna: <span>{$_project.params_general|parcelWidth} x {$_project.params_general|parcelHeight}</span> m</p>
						<p>{$_project.short_description}</p>
					</li>
				</ul>
			</li>
		{/foreach}
		</ul>
	</div>
</section>