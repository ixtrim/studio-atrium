<div class="container" id="project-list">
	<section>
		<div class="list-grid" id="overlay-group">
		{foreach $list as $_project}
			<div>
				<figure>
					{if $_project@iteration < 7}
						<img src="{image type=render project=$_project size=box}" alt="Projekt garażu {$_project.symbol_alpha} {$_project.symbol_num}" width="640" height="427">
					{else}
						<img class="dummy" src="/img/dummy_list.png" data-uri="{image type=render project=$_project size=box}" alt="Projekt garażu {$_project.symbol_alpha} {$_project.symbol_num}" width="640" height="427">
					{/if}
					<figcaption>
						<a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog='projekty-garazy'}">
							<span>Projekt garażu</span>
							<strong>{$_project.symbol_alpha} {$_project.symbol_num} <span>{$_project.params_general|usableArea} m<sup>2</sup></span></strong>
						</a>
					</figcaption>
				</figure>
				{if $_project.alternate_name != 'wycofany'}
				<span class="overview only" data-id="{$_project.id}" data-idx="{$_project@index}" data-img="{image type=render project=$_project size=presentation}" data-link="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog='projekty-garazy'}" data-price="{$_project.price}" data-name="Garaż {$_project.symbol_alpha} {$_project.symbol_num}" data-area="{$_project.params_general|usableArea}" data-total-area="{$_project.params_general|totalArea}" data-height="{$_project.params_general|garageHeight}" data-angle="{$_project.params_general|roofAngle}" data-txt="{$_project.short_description}"></span>
				
				{if $_project.discount}<div><span class="discount">rabat {$_project.discount}</span></div>{/if}
				{else}
				<div>
					<span style="background-color: #000; width: 180px; font-weight: bold;">WYCOFANY Z OFERTY!</span>
				</div> 	
				{/if}	
			</div>
		{/foreach}
		</div>
{*
		<div class="grid fav-wrapper">
		{foreach $list as $_project}

		<figure class="effect-sadie">
			<img src="{image type=render project=$_project size=list}" alt="Projekt garażu {$_project.symbol_alpha} {$_project.symbol_num}">
			{if $_project.discount}<span class="label discount">rabat {$_project.discount}</span>{/if}
			<span class="close-sadie"></span>
			
			<figcaption>
				<h6>Garaż {$_project.symbol_alpha} {$_project.symbol_num}</h6>
				<div>
					<p>pow. użytkowa {$_project.params_general|usableArea} <span>m<sup>2</sup></span></p>
					<p>{$_project.short_description}</p>
				</div>
				
				<span class="framed overview" data-id="{$_project.id}" data-img="{image type=render project=$_project size=presentation}" data-link="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog='projekty-garazy'}" data-price="{$_project.price}" data-name="Garaż {$_project.symbol_alpha} {$_project.symbol_num}" data-area="{$_project.params_general|usableArea}" data-total-area="{$_project.params_general|totalArea}" data-height="{$_project.params_general|garageHeight}" data-angle="{$_project.params_general|roofAngle}">
					<span>Szybki podgląd</span>
				</span>
				
				<a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog='projekty-garazy'}"><span class="mobile-sadie">projekt garażu <strong>{$_project.symbol_alpha} {$_project.symbol_num} <span>{$_project.params_general|usableArea} m<sup>2</sup></span></strong></span></a>
			</figcaption>
		</figure>
		{/foreach}
		{if $pages > 1 && $page != $pages}
			<figure class="effect-sadie nextPage">
				<img src="/img/next.png" alt="następna strona">
				<figcaption>
					<a href="{$url},{$page+1}{$query}">następna strona</a>
				</figcaption>	
			</figure>
		{/if}
		</div>
	</section>
*}
</div>

<div class="overlay">
	<div class="overlay-project-box" id="over-pop">
		<div id="over-img-box">
			<ul id="over-pics">
				<li><span id="over-render" class="selected">Wizualizacja</span></li>
			</ul>
			<a href="">
				<img class="preload" id="over-img" src="/img/dummy.png" width="1350" height="900" alt="Render">
			</a>
		</div>
		
		<ul id="over-params">
			<li><h6 id="over-name"></h6></li>
			<li class="small"><span id="over-txt"></span></li>
			<li><p>powierzchnia użytkowa: <span id="over-area"></span> m<sup>2</sup></p></li>
			<li><p>powierzchnia całkowita: <span id="over-total-area"></span> m</p></li>
			<li><p>wysokość garażu: <span id="over-height"></span> m</p></li>
			<li><p>kąt nachylenia dachu: <span id="over-angle"></span></p></li>
			<li><p>cena projektu: <span id="over-price"></span> zł</p></li>
			<li><a href="" class="more">Zobacz szczegóły</a></li>
		</ul>
		
		<button type="button" class="overlay-change prev" id="prev-overlay">poprzedni</button>
		<button type="button" class="overlay-change next" id="next-overlay">następny</button>
	</div>
	
	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div>