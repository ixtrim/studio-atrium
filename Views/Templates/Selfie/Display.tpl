{*<script>
	Selfie.loadDefault('/img/selfie/mask1_placeholder.png', '/img/selfie/mask1.png', '/index.php?module=ajax&action=get_selfie_render&project_id={$project.id}&mirror={$type}', 750, 295, 600, 150);
</script>
*}
<div id="pro-box">
	<span class="header">Selfie z domem {if $type == 'mirror'}<a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow' version=lustro}">{else}<a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}">{/if}<strong>{$project.name}</strong></a></span>
	{if $selfies}
		<a href="{$gallery_path}/{$selfies[0].selfie_img_url}" class="fancybox" data-fancybox="selfie" data-caption="{$selfies[0].title}">zobacz galerię</a>
		<div style="display: none;">
			{foreach from=$selfies item=_selfie name="selfies"}
				{if !$smarty.foreach.selfies.first}
					<a href="{$gallery_path}/{$_selfie.selfie_img_url}" class="fancybox" data-fancybox="selfie" data-caption="{$_selfie.title}">{$_selfie.title}</a>
				{/if}
			{/foreach}
		</div>
	{else}
		{if $type == 'mirror'}
			<a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow' version=lustro}">powrót &raquo;</a>
		{else}
			<a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}">powrót &raquo;</a>
		{/if}
	{/if}

	<div id="canvas-box">
		<div id="uploadTrigger"></div>
		<div id="selfie-box" style="display: none;"></div>
		<div id="selfie-controls" style="display: none;">
			<span id="rotate"></span>
			<span id="resize"></span>
		</div>
		<canvas id="canvas" width="1024" height="683" data-id="{$project.id}" data-type="{$type|default:'normal'}"></canvas>
		<img src="{image type=render project=$project size=presentation}" alt="{$altTitle} {$project.name|strtoupper}">
	</div>

	<div id="infoTrigger"><img src="/img/info.png" alt="Pomoc w Selfie">POMOC</div>
	<div id="infoBox" style="display: none;">
		Wybierz ulubioną postać. Klikając w ikonę aparatu wgraj swoją podobiznę (najlepiej en face). Użyj narzędzi by manipulować kolorami oraz obracać zdjęciem. Złap za narożnik zdjęcia by zmienić wielkość swojego portretu by wpasować go do wybranej postaci.
	</div>

	<div id="selfieTypesBox">
		<h4>Wybierz postać</h4>
		
		<div id="types-box">
		{foreach from=$types item=_type}
			<a href="javascript:" id="selfie-type-{$_type.id}" class="typeTrigger" data-id="{$_type.id}" data-project="{$project.id}" data-mirror="{$mirror}" data-maskx="{$_type.mask_x}" data-masky="{$_type.mask_y}" data-uploadx="{$_type.upload_x}" data-uploady="{$_type.upload_y}"><img src="/img/selfie/thumb{$_type.id}.jpg" alt="{$_type.name}"></a>
		{/foreach}
		</div>

		<div id="selfie-tools" style="display: none;">
			<h4>Narzędzia</h4>
			<p><input type="checkbox" id="proportionalTrigger" checked> <label for="proportionalTrigger">skalowanie proporcjonalne</label></p>
			<ul>
				<li>jasność: <div id="brightness"></div></li>
				<li>kontrast: <div id="contrast"></div></li>
				<li>nasycenie kolorów: <div id="saturation"></div></li>
			</ul>
		</div>
	</div>
	
	<div id="selfie-functions" style="display: none;">
		<div id="selfie-buttons">
			<p><a href="javascript:" id="selfie-reset" class="button grey">Cofnij zmiany</a></p>
			<p><a href="javascript:" id="reUpload" class="button grey">Zmień zdjęcie</a></p>
			<p><a href="javascript:" id="save" class="button">Zapisz</a></p>
		</div>

		<form id="fileUpload" action="#" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="project_id" value="{$project.id}" id="projectId"/>
			<input type="file" name="upload_photo" id="fileTrigger" style="display: none;" />
			<div id="saveForm" style="display: none;">
				<p>Twój adres e-mail: <input name="email" type="text" id="selfieEmail"></p>
				<p>Nazwa dla Twojego selfie: <input name="name" type="text" id="selfieName"></p>
				<p><input name="accept" type="checkbox" value="1" id="selfieAccept"> <label for="selfieAccept">akceptuję <span class="ajax-info" data-url="{url module=ajax action=selfie_rules}" style="text-decoration: underline;">regulamin</span></label></p>
				<p><a href="javascript:" id="sendSelfie" class="button">Wyślij</a></p>
				<p><a href="javascript:" id="backSelfie" class="button">Wróć</a></p>
			</div>
		</form>
	</div>
</div>

<div class="wrapper" id="selfie-hide">
	<div class="box center">
		{if $type == 'mirror'}
			<p class="info">Selfie z domem <a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow' version=lustro}">{$project.name}</a></p>
		{else}
			<p class="info">Selfie z domem <a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}">{$project.name}</a></p>
		{/if}
		
		<p>Ta funkcja nie jest dostępna dla rozdzielczości z jaką pracuje Twoja przeglądarka.</p>
	</div>
</div>