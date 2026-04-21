<div class="list-header realisation{if $page == 1} activated{/if}">
	<div>
		<div class="header-wrapper">
			<div>
				<h1><span>Selfie z projektem</span></h1>
				<p>Poniżej znajduje się galeria selfie z ulubionym projektem. Jeśli chciałbyś się w nietypowy sposób pochwalić znajomym, jaki dom sobie wymarzyłeś, zachęcamy do korzystania z tego zabawnego narzędzia. Link do niego znaleźć można przy każdym projekcie.</p>
			</div>
		</div>
	</div>
</div>
<div class="control-box">
	<ul>
		<li class="path"><a href="/">projekty domów</a> &raquo; <a href="/projekty-domow/" class="all">wszystkie</a> <span>znalezionych selfie: <strong>{$total}</strong></span></li>

		{if $pages > 1}
		<li>
			{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url}
		</li>
		{/if}
	</ul>
</div>

<div class="container" id="selfie-list">
	<section>
		<div class="grid">
		{foreach $list as $_item}
		<figure class="effect-sadie">
			<img src="{$gallery_path}/{$_item.selfie_img_url}" alt="{$_item.title}">
			
			{if $_item.discount}<span class="label discount">rabat {$_item.discount}</span>{/if}
			<span class="close-sadie"></span>

			<figcaption>
				<h6>{$_item.project.name}</h6>
				<div>
					<p>pow. użytkowa: {$_item.project.params_general|usableArea} <span>m<sup>2</sup></p>
					<p>działka minimalna: {$_item.project.params_general|parcelWidth} x {$_item.project.params_general|parcelHeight} m</p>
					<p class="desc">{$_item.project.short_description}</p>
				</div>
				<span class="framed"><a href="{url module=project action=item id=$_item.project.id link_title=$_item.project.name catalog='projekty-domow'}"><span>Zobacz projekt</span></a></span>
				<a href="{$gallery_path}/{$_item.selfie_img_url}" data-fancybox="gallery" data-caption="Projekt domu {$_item.project.name} - tytuł selfie: {$_item.title}"><span class="mobile-sadie">Selfie: {$_item.title} <strong>{$_item.project.name} <span>{$_item.project.params_general|usableArea} m<sup>2</sup></span></strong></span></a>
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