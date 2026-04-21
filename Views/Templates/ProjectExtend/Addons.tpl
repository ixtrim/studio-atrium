<div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Dodatki do <a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}">projektu {$project.name}</a></h1>
			</div>
		</div>
	</div>
</div>
{if $extras}
<div class="wrapper">
	<div class="box">
		<ul class="addons-box" id="addonsContent">
			{foreach from=$extras item=_extra}
			<li>
				<img src="{$stockPath}/{$_extra.extras.attachments.ExtrasImage[0].path}/{$_extra.extras.attachments.ExtrasImage[0].filename}" alt="{$_extra.extras.name}">
				<p>
					{$_extra.extras.description}
				</p>
				
				<div>
					<p><strong>{if $_extra.package_price >= 0}{$_extra.package_price}{else}{$_extra.extras.price}{/if}</strong> zł</p>
					<button class="order{if $_extra.extras|extrasInBasket:$project.id} disabled{/if}"{if !$_extra.extras|extrasInBasket:$project.id} data-epid="{$project.id}" data-thumb="{$stockPath}/{$_extra.extras.attachments.ExtrasImage[0].path}/{$_extra.extras.attachments.ExtrasImage[0].filename}" data-name="{$_extra.extras.name}" data-extras="{$_extra.extras.id}" data-price="{if $_extra.package_price > 0}{$_extra.package_price}{else}{$_extra.extras.price}{/if}"{/if}>{if $_extra.extras|extrasInBasket:$project.id}W koszyku{else}Do koszyka{/if}</button>
				</div>
			</li>	
			{/foreach}
		</ul>
	</div>
</div>
{else}
<article>
<h2>Nie znaleziono dodatków</h2>
<p>Niestety dla projektu {$project.name} nie znaleziono żadnych dodatków.</p>
<p>Jeżeli chcesz porozmawiać o jakimś konkretnym dodatku, który Twoim zdaniem powinien się tu znaleźć, <a href="{if $user}{url module=panel action=message project_id=$project.id}{else}javascript:{/if}"{if !$user} class="consultant"{/if}>skontaktuj się z nami!</a></p>
</article>
{/if}		