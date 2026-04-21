{foreach $project.attachments.ProjectInterior as $_render}

{if $_render@iteration < 4}{continue}{/if}
<div class="loaded" style="display: none;">
	<a class="gallery" rel="gallery" title="{$_render.title} {$_render.description}" href="{if $_render.props.image_size.width > 1350}{image type=interior project=$project no=$_render@index}{else}{image type=interior no=$_render@index project=$project size=presentation}{/if}"><img src="{image type=interior no=$_render@index project=$project size=presentation}" alt="{$project.name} - wizualizacja wnętrza {$_render@iteration}"></a>
</div>
{/foreach}