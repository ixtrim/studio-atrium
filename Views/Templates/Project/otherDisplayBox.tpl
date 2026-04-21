{$catalog = 'projekty/'|cat:{$type|projectType:true:true|strtolower}}
<div class="container" id="project-list">
	<section>
		<div class="list-grid" id="overlay-group">
		{foreach $list as $_project}
			{$usableArea = $_project.params_general|usableArea}
			<div>
				<figure class="effect-sadie">
					<img src="{image type=render project=$_project size=box}" alt="{$type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}" width="640" height="427">
					
					<figcaption>
						<a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$catalog}">
							<span>{$type|projectType:false:true}</span>
							<strong>{$_project.symbol_alpha} {$_project.symbol_num}{if $usableArea} <span>{$usableArea} m<sup>2</sup></span>{/if}</strong>
						</a>
					</figcaption>
				</figure>
				
				{if $type == 'fence'}
					<span class="overview only" data-id="{$_project.id}" data-idx="{$_project@index}" data-img="{image type=render project=$_project size=presentation}" data-link="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$catalog}" data-price="{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}" data-name="{$type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}" data-span="{$_project.params_general|fenceSpanHeight}" data-txt="{$_project.short_description}" data-roofing="{$_project.params_general|fenceRoofHeight}"></span>
				{else}
					<span class="overview only" data-id="{$_project.id}" data-idx="{$_project@index}" data-img="{image type=render project=$_project size=presentation}" data-link="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$catalog}" data-price="{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}" data-name="{$type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}" data-area="{$usableArea}" data-txt="{$_project.short_description}" data-total-area="{$_project.params_general|totalArea}" data-height="{$_project.params_general|arborHeight}" data-angle="{$_project.params_general|roofAngle}"></span>
				{/if}
					
				{if $_project.discount}<div><span class="discount">rabat {$_project.discount}</span></div>{/if}
			</div>
		{/foreach}
		</div>
{*
		<div class="grid">
		{foreach $list as $_project}
		{$usableArea = $_project.params_general|usableArea}

		<figure class="effect-sadie">
			<img src="{image type=render project=$_project size=list}" alt="{$type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}">
			{if $_project.discount}<span class="label discount">rabat {$_project.discount}</span>{/if}
			<span class="close-sadie"></span>
			
			<figcaption>
				<h6>{$type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}</h6>
				<div>
					{if $usableArea}
					<p>pow. użytkowa {$usableArea} <span>m<sup>2</sup></span></p>
					{/if}
					<p>{$_project.short_description}</p>
				</div>
				{if $type == 'fence'}
					<span class="framed overview" data-id="{$_project.id}" data-img="{image type=render project=$_project size=presentation}" data-link="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$catalog}" data-price="{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}" data-name="{$type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}" data-span="{$_project.params_general|fenceSpanHeight}" data-roofing="{$_project.params_general|fenceRoofHeight}">
				{else}
					<span class="framed overview" data-id="{$_project.id}" data-img="{image type=render project=$_project size=presentation}" data-link="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$catalog}" data-price="{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}" data-name="{$type|projectType:false:true} {$_project.symbol_alpha} {$_project.symbol_num}" data-area="{$usableArea}" data-total-area="{$_project.params_general|totalArea}" data-height="{$_project.params_general|arborHeight}" data-angle="{$_project.params_general|roofAngle}">
				{/if}
					<span>Szybki podgląd</span>
				</span>
				
				<a href="{url module=project action=item id=$_project.id link_title="`$_project.symbol_alpha` `$_project.symbol_num`" catalog=$catalog}"><span class="mobile-sadie">{$type|projectType:false:true} <strong>{$_project.symbol_alpha} {$_project.symbol_num}{if $usableArea} <span>{$usableArea} m<sup>2</sup></span>{/if}</strong></span></a>
			</figcaption>
		</figure>
		{/foreach}
		</div>
*}
	</section>
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
		{if $type == 'fence'}
			<li><p>wysokość przęsła: <span id="span-height"></span> cm</p></li>
			<li><p>wysokość zadaszenia: <span id="roofing-height"></span> cm</p></li>
		{else}
			<li><p>powierzchnia użytkowa: <span id="over-area"></span> m<sup>2</sup></p></li>
			<li><p>powierzchnia całkowita: <span id="over-total-area"></span> m</p></li>
			{if $type == 'carport'}
			<li><p>wysokość wiaty: <span id="over-height"></span> m</p></li>
			{/if}
			{if $type == 'arbor'}
			<li><p>wysokość altany: <span id="over-height"></span> m</p></li>
			{/if}
			<li><p>kąt nachylenia dachu: <span id="over-angle"></span></p></li>
		{/if}
			<li><p>cena projektu: <span id="over-price"></span> zł</p></li>
			<li><a href="" class="more">Zobacz szczegóły</a></li>
		</ul>
		
		<button type="button" class="overlay-change prev" id="prev-overlay">poprzedni</button>
		<button type="button" class="overlay-change next" id="next-overlay">następny</button>
	</div>
	
	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div>