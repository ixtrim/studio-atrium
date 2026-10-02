{* Shared checkout step rail — $orderStep: cart|data|summary *}
<nav class="order-steps" aria-label="Etapy zamówienia">
	<ol class="order-steps__list">
		<li class="order-steps__item{if $orderStep == 'cart'} is-current{elseif $orderStep == 'data' || $orderStep == 'summary'} is-done{/if}">
			{if $orderStep != 'cart'}
				<a href="{url module=order action=cart}" class="order-steps__link">
					<span class="order-steps__num">1</span>
					<span class="order-steps__label">Koszyk</span>
				</a>
			{else}
				<span class="order-steps__link">
					<span class="order-steps__num">1</span>
					<span class="order-steps__label">Koszyk</span>
				</span>
			{/if}
		</li>
		<li class="order-steps__item{if $orderStep == 'data'} is-current{elseif $orderStep == 'summary'} is-done{else} is-disabled{/if}">
			{if $orderStep == 'summary'}
				<a href="{url module=order action=data}" class="order-steps__link">
					<span class="order-steps__num">2</span>
					<span class="order-steps__label">Dane osobowe</span>
				</a>
			{else}
				<span class="order-steps__link">
					<span class="order-steps__num">2</span>
					<span class="order-steps__label">Dane osobowe</span>
				</span>
			{/if}
		</li>
		<li class="order-steps__item{if $orderStep == 'summary'} is-current{else} is-disabled{/if}">
			<span class="order-steps__link">
				<span class="order-steps__num">3</span>
				<span class="order-steps__label">Podsumowanie</span>
			</span>
		</li>
	</ol>
</nav>
