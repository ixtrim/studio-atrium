{if $authorizations}
<div class="wrapper ajaxed" id="showroom" style="display: none;">
	<div class="box">
	{if $project.attachments.ProjectInterior}
		{foreach $project.attachments.ProjectInterior as $_render}
		
			{if $authorizations[$_render.id]}
			<div class="showroom small">
				{if $_render.props.image_size.width > 1350}
					<img class="render" src="{image type=interior project=$project size=presentation no=$_render@index}" width="1350" height="900" alt="Wnętrze projektu {$project.name} - wizualizacja {$_render@iteration}">
				{else}
					<img class="render" src="{image type=interior project=$project size=presentation no=$_render@index}" width="1350" height="900" alt="Wnętrze projektu {$project.name} - wizualizacja {$_render@iteration}">
				{/if}

				{foreach $authorizations[$_render.id] as $key => $value}
					{$filename = $products[$value.id].attachments.ShowroomImage[0].path|cat:'/'|cat:$products[$value.id].attachments.ShowroomImage[0].filename}
					{$iconFilename = $products[$value.id].attachments.ShowroomImage[0].path|cat:'/'|cat:$products[$value.id].attachments.ShowroomImage[0]['childAttachments']['thumb'][0].filename}

					<div class="showroom-box" data-x="{$value.left}" data-y="{$value.top}" data-icon="{$showroomPath}/{$iconFilename}" data-img="{$showroomPath}/{$filename}" data-producer="{$products[$value.id].producer}<p style='color: #000;'>{$products[$value.id].name}</p>" data-descript="{$products[$value.id].short_descript}" data-link="{$products[$value.id].link}" style="top: {$value.top}px; left:{$value.top}px;">
						<div class="label">
							{*<a href="javascript:">{$products[$value.id].name|truncate:30}</a>*}
							<a href="javascript:">&#128309;</a>
						</div>
					</div>
				{/foreach}
				
				<span class="showroom-switch small" data-state="on">wyłącz podgląd produktów</span>
			</div>
			{/if}
		{/foreach}
	{/if}
	</div>
</div>
{else}
<div class="wrapper ajaxed" id="showroom">
	<div class="box">
		<p class="red">Nie znaleziono produktów.</p>
	</div>
</div>
{/if}