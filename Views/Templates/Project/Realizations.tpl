<div class="list-header realisation{if $page == 1} activated{/if}">
	<div>
		<div class="header-wrapper">
			<div>
				<h1><span>Realizacje{if $action == 'Realizations'} projektów{elseif $action == 'RealizationsInterior'} wnętrz{elseif $action == 'RealizationsBuilding'} w budowie{/if}</span></h1>
				<p>Poniżej znajdują się zdjęcia{if $action == 'Realizations'} gotowych{/if} realizacji {if $action == 'RealizationsInterior'}wnętrz {/if}projektów Studia Atrium{if $action == 'RealizationsBuilding'} w trakcie budowy{/if}. Jeśli wybudowałeś{if $action == 'RealizationsBuilding'} lub budujesz{/if} dom wg naszej dokumentacji i chciałbyś się nim pochwalić, zapraszamy do wzięcia udziału w trwającym nieustannie FOTOKONKURSIE. <a href="/konkurs/fotograficzny.html">Zobacz szczegóły</a></p>
			</div>
		</div>
	</div>
</div>
<div class="control-box">
	<ul>
		<li class="paths"><a href="/">projekty domów</a> &raquo; <a href="/projekty-domow/" class="all">wszystkie</a> <span>znalezionych zdjęć realizacji: <strong>{$total}</strong></span></li>
		<li><strong>zobacz: </strong>		
		{if $action != 'Realizations'}<a href="{url module=project action=realizations}">realizacje projektów &raquo;</a> {/if}
		{if $action != 'RealizationsInterior'}<a href="{url module=project action=realizations_interior}">realizacje wnętrz &raquo;</a> {/if}
		{if $action != 'RealizationsBuilding'}<a href="{url module=project action=realizations_building}">domy w budowie &raquo;</a>{/if}</li>
		{if $pages > 1}
		<li>
			{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url}
		</li>
		{/if}
	</ul>
</div>

<div class="container" id="realization-list">
	<section>
		<div class="grid">
		{foreach $realisations as $_item}
		<figure class="effect-sadie">
			{if $action == 'Realizations'}
				<img src="{$projectPath}/{$_item.path}/{$_item.filename|replace:"realizacja-":"realizacja-317-"}" alt="Projekt domu {$_item.object.name} - realizacja" width="475" height="317">
			{elseif $action == 'RealizationsBuilding'}
				<img src="{$projectPath}/{$_item.path}/{$_item.filename|replace:"budowa-":"budowa-317-"}" alt="Projekt domu {$_item.object.name} w budowie" width="475" height="317">
			{elseif $action == 'RealizationsInterior'}
				<img src="{$projectPath}/{$_item.path}/{$_item.filename|replace:"budowa-":"budowa-317-"}" alt="Realizacja wnętrza projektu domu {$_item.object.name}" width="475" height="317">
			{/if}			

			{if $_item.discount}<span class="label discount">rabat {$_item.discount}</span>{/if}
			<span class="close-sadie"></span>

			<figcaption>
				<h6>{$_item.object.name}</h6>
				<div>
					<p>pow. użytkowa: {$_item.object.params_general|usableArea} <span>m<sup>2</sup></p>
					<p>działka minimalna: {$_item.object.params_general|parcelWidth} x {$_item.object.params_general|parcelHeight} m</p>
					<p class="desc">{if $_item.description}{$_item.description}{else}{$_item.object.short_description}{/if}</p>
				</div>
				<span class="framed"><a href="{url module=project action=item id=$_item.object.id link_title=$_item.object.name catalog='projekty-domow'}"><span>Zobacz projekt</span></a></span>
				<a href="{$projectPath}/{$_item.path}/{$_item.filename}" data-fancybox="gallery" data-caption="Projekt domu {$_item.object.name} - realizacja{if $action == 'RealizationsBuilding'} w budowie{/if}{if $_item.description}. {$_item.description}{/if}"><span class="mobile-sadie">{if $action == 'RealizationsBuilding'}projekt domu{else}realizacja {if $action == 'RealizationsInterior'}wnętrza {/if}projektu domu{/if} {if $_item.object.params_general|hasFloor:true}piętrowego{elseif $_item.object.params_general|hasLoft:true}z poddaszem{elseif $_item.object.params_general|isGroundFloor:true}parterowego{/if}{if $action == 'RealizationsBuilding'} w budowie{/if} <strong>{$_item.object.name} <span>{$_item.object.params_general|usableArea} m<sup>2</sup></span></strong></span></a>
			</figcaption>
		</figure>
		{/foreach}
		{if $pages > 1 && $page != $pages}
			<figure class="effect-sadie nextPage">
				<img src="/img/next.png" alt="następna strona">
				<figcaption>
					<a href="{$url},{$page+1}">następna strona</a>
				</figcaption>	
			</figure>
		{/if}
		</div>
	</section>
</div>

{if $pages > 1}
<div class="wrapper">
	<div class="box">
		<div class="control-box">
			<ul>
				<li>
					{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url}
				</li>
			</ul>
		</div>
	</div>
</div>
{/if}