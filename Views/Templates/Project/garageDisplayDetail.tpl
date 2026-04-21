<section>
	<div class="box">
		<ul class="detail fav-wrapper">
		{foreach $list as $_project}
			<li>
				<ul>
					<li>
						<div>
						<a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog='projekty-garazy'}">
							<img src="{image type=render project=$_project size=list}" alt="Garaż {$_project.symbol_alpha} {$_project.symbol_num}">
						</a>
						{if $_project.discount}<span class="label discount left">Rabat {$_project.discount} zł</span>{/if}
						</div>
					</li>
					<li class="slide" data-id="{$_project.id}">
						<img id="img-{$_project.id}" data-src="{image type=sketch project=$_project}" src="{image type=sketch project=$_project size=list}" alt="Rzut garażu">
					</li>
					<li class="data">
						<h6><a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog='projekty-garazy'}">Garaż {$_project.symbol_alpha} {$_project.symbol_num}</a></h6>
						
						<p>{$_project.short_description}</p>
						
						<ul>
							<li>powierzchnia użytkowa: <span>{$_project.params_general|usableArea}</span> m<sup>2</sup></li>
							<li>powierzchnia całkowita: {$_project.params_general|totalArea:true}</li>
							<li>kąt nachylenia dachu: {$_project.params_general|roofAngle:true}</li>
							<li>wysokość garażu: {$_project.params_general|garageHeight:true}</li>
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
</section>