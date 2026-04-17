{include file="Panel/_menu.tpl"}
<div class="content">
	<p class="center uline"><input type="checkbox" name="promo_info" id="promo-info"{if !$user.props.noPromoInfo} checked{/if}> <label for="promo-info">Chcę otrzymywać na e-maila powiadomienia o nowych promocjach.</label></p>

	<h3>Rabat <strong>100 zł</strong> za rejestrację!</h3>
	<p class="center">W podziękowaniu za rejestrację konta w naszym serwisie, mamy dla Ciebie stały rabat w wysokości <strong>100 zł</strong> na zakupy w naszym serwisie. Rabat zostanie automatycznie uwzględniony w podsumowaniu Twojego koszyka z zakupami. Pamiętaj, że rabat dotyczy zamówienia z minimum jednym projektem domu.</p>

	{if $discount}
		{foreach from=$discount item=_discount}
			<h3 class="line">{$_discount.title}</h3>
			<div class="center">
				{$_discount.description}
				<p>Aby uzyskać rabat w wysokości {if $_discount.discount_type == 'percent'}<strong>{$_discount.discount_value} %</strong>{else}<strong>{$_discount.discount_value} zł</strong>{/if}, wpisz podczas finalizowania Twojego zamówienia w koszyku poniższy kod rabatowy:</p>
				<p><h4>{$_discount.code}</h4></p>
				{if $_discount.start_date != $default_start_date || $_discount.stop_date != $default_stop_date}
					<p>Data ważności: {if $_discount.start_date}{$_discount.start_date|date_format:"%d-%m-%Y"}{else}brak daty początkowej{/if} - {if $_discount.stop_date}{$_discount.stop_date|date_format:"%d-%m-%Y"}{else}brak daty końcowej{/if}</p> 
				{/if}
				{if $_discount.projects_id && $projects}
					<p>Lista projektów objętych promocją:</p>
					{$list = explode(",", $_discount.projects_id)}
					<ul class="projectList">
						{foreach from=$list item=_projectId}
							<li><a href="{url module=project action=item id=$_projectId link_title=$projects[$_projectId]|linkTitle catalog=$projects[$_projectId].type|projectCatalog}" class="external"><img src="{image type=render project=$projects[$_projectId] size=thumb}"><p>{$projects[$_projectId].name}</p></a></li>
						{/foreach}	
					</ul>
				{/if}	
			</div>
		{/foreach}
	{/if}	

	{if $promo}
		{foreach from=$promo item=_promo}
			<h3 class="line">{$_promo.title}</h3>
			<div class="center">
				{$_promo.content|fixArticleContent:$_promo.id}
			</div>
		{/foreach}
	{/if}
</div>