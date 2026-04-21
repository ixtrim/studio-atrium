<section>
	<div class="box">
		<ul class="list">
		{foreach $list as $_project}
			<li>
				<ul class="list-item fav-wrapper">
					<li>
						<ul>
							<li>
								<a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog='projekty-garazy'}">
									<img src="{image type=render project=$_project size=list}" alt="Garaż {$_project.symbol_alpha} {$_project.symbol_num}">
								</a>
								{if $_project.discount}<span class="label discount left">Rabat {$_project.discount} zł</span>{/if}
							</li>
							<li>
								<a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog='projekty-garazy'}">
									<img src="{image type=render project=$_project size=list no=1}" alt="Garaż {$_project.symbol_alpha} {$_project.symbol_num}">
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<h6><a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog='projekty-garazy'}">Garaż {$_project.symbol_alpha} {$_project.symbol_num}</a></h6>
						<p>powierzchnia użytkowa: <span>{$_project.params_general|usableArea}</span> m<sup>2</sup></p>
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