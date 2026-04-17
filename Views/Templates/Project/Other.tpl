{$catalog = 'projekty/'|cat:{$type|projectType:true:true|strtolower}}
<div class="project-box">
	<div id="render-box" class="render-box">
	<div class="inline-wrapper">
		{foreach $project.attachments.ProjectRender as $_render}
		<div>
			{if $_render@first}
				<img class="finger" id="finger" src="/img/finger.png" alt="Galeria">
				
				{if $request.version == 'mirror'}
					<a class="gallery" data-fancybox="gallery" data-caption="{$_render.title}" href="{image type=render project=$project no=$_render@index mirror=1}">
						<img src="{image type=render project=$project size=presentation no=$_render@index mirror=1}" width="1350" height="900" alt="{$type|projectType:false:true} {$project.symbol_alpha} {$project.symbol_num} - wizualizacja {$_render@iteration}">
					</a>
				{else}
					<a class="gallery" data-fancybox="gallery" data-caption="{$_render.title}" href="{image type=render project=$project no=$_render@index}">
						<img src="{image type=render project=$project size=presentation no=$_render@index}" width="1350" height="900" alt="{$type|projectType:false:true} {$project.symbol_alpha} {$project.symbol_num} - wizualizacja {$_render@iteration}">
					</a>
				{/if}
			{else}
			{*lazy loading*}
				{if $request.version == 'mirror'}
					<a class="gallery" data-fancybox="gallery" data-caption="{$_render.title}" href="{image type=render project=$project no=$_render@index mirror=1}">
						<img class="lazy-image" data-uri="{image type=render project=$project size=presentation no=$_render@index mirror=1}" src="img/xg.png" width="1350" height="900" alt="{$type|projectType:false:true} {$project.symbol_alpha} {$project.symbol_num} - wizualizacja {$_render@iteration}">
					</a>
				{else}
					<a class="gallery" data-fancybox="gallery" data-caption="{$_render.title}" href="{image type=render project=$project no=$_render@index}">
						<img class="lazy-image" data-uri="{image type=render project=$project size=presentation no=$_render@index}" src="img/xg.png" width="1350" height="900" alt="{$type|projectType:false:true} {$project.symbol_alpha} {$project.symbol_num} - wizualizacja {$_render@iteration}">
					</a>
				{/if}
			{/if}
		</div>
		{/foreach}
		
		{if $project.description && $type == 'tank'}
		<div class="info-box">
			<p class="header">Opis</p>
			<p class="desc">{$project.description}</p>
		</div>
		{/if}
	</div>
	</div>
	
	<div class="data-box">
		<div class="icons fav-wrapper">
			<div>
				<a href="//pl.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-color="white"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_white_20.png" alt="Studio Atrium Pin"></a>
				<iframe src="https://www.facebook.com/plugins/like.php?locale=pl_PL&amp;href=https://www.studioatrium.pl{url module="project" action="item" id=$project.id link_title="`$project.symbol_alpha` `$project.symbol_num`" catalog=catalog}&amp;send=false&amp;layout=button_count&amp;width=110&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=tahoma&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:110px; height:21px;" allowTransparency="true"></iframe>
			</div>
		
			<span class="bg net" id="social-trigger"></span>
		</div>
		
		<div class="breadcrumbs"><a href="/">Studio Atrium</a> &raquo; <a href="{$categoryLink}" class="on">{$category}</a></div>
	
		<div class="head-box">
			<h1 id="title" data-id="{$project.id}">{$type|projectType:false:true} {$project.symbol_alpha} {$project.symbol_num}{if $request.version == 'mirror'}<small>odbicie lustrzane</small>{/if}</h1>
			{if $type == 'tank'}
			<p class="area">Kubatura brutto: <span>{$project.params_general|cubature}</span> m<sup>3</sup></p>
			{else if $type == 'fence'}
			<p class="area noContent">&nbsp;</p>
			{else}
			<p class="area">Powierzchnia użytkowa: <span>{$project.params_general|usableArea}</span> m<sup>2</sup></p>
			{/if}
			<h2>{$project.short_description}</h2>
		</div>

		{if $projectParams|hasMirror}
		<div class="inner-box">
			<ul class="link-box one">
				{if $request.version == 'mirror'}
					<li><a href="{url module=project action=item id=$project.id link_title="`$project.symbol_alpha` `$project.symbol_num`" catalog=$catalog}" class="mirror">Zobacz wersję podstawową</a></li>
				{else}
					<li><a href="{url module=project action=item id=$project.id link_title="`$project.symbol_alpha` `$project.symbol_num`" version=lustro catalog=$catalog}" class="mirror on">Zobacz odbicie lustrzane</a></li>
				{/if}
			</ul>
		</div>
		{/if}
		
		<div id="order-box" class="inner-box order-box">
			<div>
				<p class="version">{if $projectParams|isAvailable}dostępność 3-5 dni{else}<span class="ajax-info" data-url="{url module=ajax action=get_realisation_info}">termin do uzgodnienia</span>{/if}</p>
				<p class="price">{if $project.discount}<span class="discount">{$project.price}</span>{$project.price - $project.discount}{else}{$project.price}{/if} <span>zł</span></p>
				<p class="vatInfo">(w tym 23% VAT)</p>
				<a href="{url module=order action=cart}" class="simple" rel="nofollow"><span class="basket{if $project|inBasket:$request.version} disabled{/if}"{if !$project|inBasket:$request.version} id="addToBasket" data-version="{$request.version}" data-project="{$project.id}" data-price="{if $project.discount}{$project.price-$project.discount}{else}{$project.price}{/if}" data-link="{if $request.version == 'mirror'}{url module=project action=item id=$project.id link_title="`$project.symbol_alpha` `$project.symbol_num`" catalog=$catalog version=lustro}{else}{url module=project action=item id=$project.id link_title="`$project.symbol_alpha` `$project.symbol_num`" catalog=$catalog}{/if}" data-name="{$type|projectType:false:true} {$project.symbol_alpha} {$project.symbol_num}" data-thumb="{if $request.version == 'mirror'}{image type=render project=$project mirror=1}{else}{image type=render project=$project size=thumb}{/if}"{/if}>{if $project|inBasket:$request.version}W koszyku{else}Do koszyka{/if}</span></a>
			</div>
		</div>
		
		<div class="inner-box">
			<ul class="contact-box">
				<li><a href="{if $user}{url module=panel action=message project_id=$project.id}{else}javascript:{/if}"{if !$user} class="consultant"{/if}>Zapytaj o projekt</a></li>
				<li id="phone-box"><a href="tel:338229496" class="phone" rel="nofollow">33 822 94 96</a></li>
			</ul>
		</div>
		
		<div id="technical-data-box" class="technical-data">
			<p class="header">Dane techniczne</p>
			
			<table class="tech">
			{foreach $technicalList.params as $_item}
			
				{if $params[$_item].value_type == 'string'}
		        	{$paramValue = $projectParams[$_item].string_value}
		        {else}
		        	{$paramValue = $projectParams[$_item].num_value}
		        	
		        	{if $paramValue && $params[$_item].value_type == 'number'}
		        		{$paramValue = number_format($projectParams[$_item].num_value, 2, ',', ' ')}
		        	{/if}
		        {/if}

				{if $paramValue}
				<tr>
					<td>{$params[$_item].name}{if $params[$_item].description && $type != 'tank' && $type != 'fence'}<span class="param-info" data-id="{$params[$_item].id}"></span>{/if}</td>
					<td>{$paramValue} {$params[$_item].unit}</td>
				</tr>
				{/if}
			{/foreach}
			</table>
		</div>
		
		{if $project.technology}
		<div id="info-box" class="info-box">
			<p class="header">Technologia</p>
			<p>{$project.technology}</p>
		</div>
		{/if}
		
		{if $features}
		<div class="info-box">
			<p class="header">Informacje</p>
			{foreach $features as $_item}
			<p>{$_item.description}</p>
			{/foreach}
		</div>
		{/if}
		
		{if $project.description && $type != 'tank'}
			<div id="descript-box" class="info-box">
				<p class="header">Opis</p>
				<p class="desc">{$project.description}</p>
			</div>
		{/if}
	</div>
</div>


{foreach $project.attachments.ProjectSketch as $sketch name=sketchList}
<div class="project-box"{if $sketch@first} id="sketch-box"{/if}>
	<div class="render-box sketch-box">
		<div>
			<img class="lazy-image" data-uri="{image type=sketch project=$project storey=$sketch.props.storey}" src="img/xg.png" width="1" height="1" alt="{$sketch.title} - Projekt {$project.symbol_alpha} {$project.symbol_num}">
		</div>
	</div>
	
	<div class="data-box">
	{if projectSketchParams}
		{capture "chambers"}
		{$total = 0}
		<table class="tech">
			{foreach $projectSketchParams as $_param}
				{if $_param.sketch_id == $sketch.id}
				<tr>
					{if $sketchParams[$_param.sketch_param_id].type == 'normal'}
					<td>
						{$_param.room_no}
						{$sketchParams[$_param.sketch_param_id].name}
					</td>
					<td>
						{number_format($_param.area, 2, ',', ' ')}
					</td>
					{else if $sketchParams[$_param.sketch_param_id].type == 'sum'}
						{$total = $_param.area}
						<td>razem:</td>
						<td><strong>{number_format($total, 2, ',', ' ')}</strong></td>
					{else if $sketchParams[$_param.sketch_param_id].type == 'info'}
						<td>{$sketchParams[$_param.sketch_param_id].name}</td>
						<td>&nbsp;</td>
					{/if}
				</tr>
				{/if}
			{/foreach}
		</table>
	{/capture}
		<h3>{$sketch.props.storey|mapStorey}{if $total > 0}<span>{number_format($total, 2, ',', ' ')} m<sup>2</sup></span>{/if}</h3>
		{$smarty.capture.chambers}
	{else}
		<h3>Rzut</h3>
	{/if}	
	</div>
</div>
{/foreach}

<div class="blue-overlay" id="param-info-overlay">
	<div class="over-box" id="param-info-over-box"></div>
	<button type="button" id="param-info-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>

<div class="blue-overlay share" id="social-overlay">
	<div class="over-box" id="social-over-box">
	
		<p class="share">Udostępnij</p>
	
		<ul id="share-project" data-url="{$projectUrl}" data-media="{image type=render project=$project}" data-description="{$project.short_description}" data-id="{$project.id}">
			<li><span class="face">facebook</span></li>
			<li><span class="pin">pinterest</span></li>
			<li><span class="url">url</span></li>
			<li><span class="mail">mail</span></li>
		</ul>
		
		<div class="link-box" id="link-box" style="display: none;">
			<p>skopiuj adres</p>
			<p>{$projectUrl}</p>
		</div>
		
		<div id="links-wrapper" style="display: none;">
			<p class="nocaps">Wypełnij poniższy formularz i prześlij informacje o projekcie znajomemu.</p>
			
			<form method="post" action="{url module='project' action='send'}" id="share-form" data-pid="{$project.id}">
				<input name="module" type="hidden" value="project">
				<input name="action" type="hidden" value="send">

				<p>
					<label for="receiver-email" class="black">E-mail odbiorcy</label>
					<input type="text" name="receiver_email" id="receiver-email" class="long">
				</p>

				<p>
					<label for="sender-email" class="black">Twój e-mail</label>
					<input type="text" name="sender_email" value="{$user.email}" id="sender-email" class="long">
				</p>
				
				<p>
					<label for="sender-sign" class="black">Twój podpis</label>
					<input type="text" name="signature" value="{$user.name} {$user.surname}" id="sender-sign" class="long">
				</p>
				
				<p class="last"><input id="share_button" type="submit" value="wyślij" class="baton"></p>
				<p class="nocaps" id="share-fail-box" style="display: none;">Wypełnij poprawnie formularz</p>
			</form>
		</div>
	</div>
	<button type="button" id="social-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>