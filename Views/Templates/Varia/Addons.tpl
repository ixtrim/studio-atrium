<div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Dodatki</h1>
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
				<img src="{$stockPath}/{$_extra.attachments.ExtrasImage[0].path}/{$_extra.attachments.ExtrasImage[0].filename}" alt="{$_extra.name}">
				<p>
					{$_extra.description}
				</p>
				
				<div>
					<p><strong>{$_extra.price}</strong> zł</p>
					<button class="order{if $_extra|extrasInBasket} disabled{/if}"{if !$_extra|extrasInBasket} data-epid="0" data-thumb="{$stockPath}/{$_extra.attachments.ExtrasImage[0].path}/{$_extra.attachments.ExtrasImage[0].filename}" data-name="{$_extra.name}" data-extras="{$_extra.id}" data-price="{$_extra.price}"{/if}>{if $_extra|extrasInBasket}W koszyku{else}Do koszyka{/if}</button>
				</div>
			</li>	
			{/foreach}
		</ul>
	</div>
</div>
{else}
<article>
<h2>Nie znaleziono dodatków</h2>
<p>Niestety aktualnie nie sprzedajemy żadnych dodatków.</p>
</article>
{/if}		