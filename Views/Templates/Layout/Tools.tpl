<div id="tool-box" class="off">
	<div id="tool-user">
		{if $user}
			<span class="tab user{if $notifications} notify{/if}"></span>
			<div class="tab-box user padded">
				<p>Twoje konto</p>
				
				<p class="username">Witaj <a href="{url module=panel action=helo}"><span>{$user.name} {$user.surname}</span></a>!

				<nav id="user-menu">
					<p><a href="{url module=panel action=account}">Twoje konto</a></p>
					<p><a href="{url module=panel action=message}">Korespondencja</a></p>
					{*<p><a href="{url module=panel action=blog}">Blogi</a></p>*}
					<p><a href="{url module=panel action=forum}">Forum</a></p>
					<p><a href="{url module=panel action=promo}">Promocje</a></p>
					<p><a href="{url module=panel action=transaction}">Zamówienia</a></p>
				</nav>

				<a href="{url module=authenticate action=logout}" class="framed">Wyloguj</a>
			</div>
		{else}
		<span class="tab login"></span>
		<div class="tab-box login">
			<p>Twoje konto</p>
			<a href="javascript:" id="login" class="login-trigger">Zaloguj</a><span> / </span><a href="javascript:" id="register" class="register-trigger">Zarejestruj</a>
		</div>
		{/if}
	</div>
	
	<div id="tool-fav">
		<span id="tab-fav" class="tab favourite notify{if $favouriteIds|count == 0} hidden{/if}" data-hover="{$favouriteIds|count}"></span>
		<div class="tab-box fav-wrapper" id="tool-fav-box">
			<p id="fav-projects"><a href="{url module=favourite action=list}">Ulubione projekty</a></p>
		</div>
	</div>
	
	<div id="tool-cart">
		<span class="tab cart{if $basket} notify{/if}"></span>
		<div class="tab-box{if $basket} padded{else} emptyCart{/if}" id="tabBasketContent">
			<p>Twój koszyk</p>
			{if $basket}
			<ul id="basketTabContent">
				{foreach from=$basket item=_basket}
				<li>
					<ul>
						{if $_basket.pid}
							<li><a href="{$_basket.link}"><img src="{$_basket.thumb}" alt="{$_basket.name|urldecode|unicode}">{$_basket.name|urldecode|unicode}{if $_basket.version == 'mirror'} <small>(odbicie lustrzane)</small>{/if}</a></li>
							<li><span class="price">{$_basket.price} zł</span></li>
							<li><span class="remove" data-project="{$_basket.pid}" data-version="{$_basket.version}"></span></li>
						{else}
							<li><img src="{$_basket.thumb}" alt="{$_basket.name|urldecode|unicode}" class="extras">{$_basket.name|urldecode|unicode}</li>
							<li><span class="price">{$_basket.price} zł</span></li>
							<li><span class="remove" data-extras="{$_basket.eid}"></span></li>
						{/if}	
					</ul>
				</li>
				{/foreach}
			</ul>
			{else}
				<span id="emptyBasket">Nie masz nic w koszyku</span>
				<ul id="basketTabContent"></ul>
			{/if}
			<a href="{url module=order action=cart}" class="framed" id="finalBasketAction"{if !$basket} style="display: none;"{/if}>Finalizuj zakupy</a>
		</div>
	</div>
	
	<div id="tool-fbook">
		<span class="tab fbook"></span>
		<div class="tab-box">
			<p>Facebook</p>
			<div id="fbook-placeholder"></div>
		</div>
	</div>
</div>