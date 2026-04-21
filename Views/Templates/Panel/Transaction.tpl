{include file="Panel/_menu.tpl"}
<div class="content">
	{if $transactions}
		<table class="default">
			<colgroup>
				<col style="width: 150px;">
				<col style="width: 170px;">
				<col>
				<col style="width: 200px;">
				<col style="width: 250px;">
			</colgroup>
			<tr class="header">
				<td class="center">Nr zamówienia</td>
				<td class="center">Data zamówienia</td>
				<td>Produkty</td>
				<td class="center">Cena</td>
				<td>Uwagi</td>
			</tr>	
			{foreach from=$transactions item=_transaction}
				<tr>
					<td class="center">{$_transaction.id}/{$smarty.now|date_format:"%y"}</td>
					<td class="center">{$_transaction.add_date|date_format:"%d-%m-%Y"}</td>
					<td>
						{foreach from=$_transaction.transactionItems item=_item}
							<p>{$_item.description} {if $_item.type == 'project'} <span>({$_item.props.projectVersion})</span>{/if}</p>
						{/foreach}
					</td>
					<td class="low center">
						<strong>{$_transaction.props.totalPayment} zł</strong>
						<p class="small">w tym koszt dostawy: <strong>{$_transaction.props.deliveryPrice} zł</strong></p>
					</td>
					<td class="low">
						{if $_transaction.props.registerUserDiscount || $_transaction.props.discountValue || $_transaction.note}
							{if $_transaction.props.registerUserDiscount}<p>rabat za rejestrację: <strong>{$_transaction.props.registerUserDiscount} zł</strong></p>{/if}
							{if $_transaction.props.discountValue}<p>kod rabatowy: <strong>{$_transaction.props.discountValue} {if $_transaction.props.discountType == 'percent'}%{else}zł{/if}</strong></p>{/if}
							{if $_transaction.note}<p>uwagi:</p><p><i>{$_transaction.note}</i></p>{/if}
						{else}
						brak
						{/if}	
					</td>
				</tr>
			{/foreach}	
		</table>
	{else}
		<h3>Brak zamówień</h3>
		<p class="center">Jeszcze nie złożyłeś żadnego zamówienia poprzez stronę www.studioatrium.pl.</p>
	{/if}
</div>