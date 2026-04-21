<div class="list-header panel{rand(1,2)}">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Witaj {$user.name} <a href="{if $user.impersonated}{url module=authenticate action=logout_to_backend}{else}{url module=authenticate action=logout}{/if}">wyloguj się</a></h1>
			</div>
		</div>
	</div>
</div>
<nav class="user">
	<div>
		<a href="{url module=panel action=account}"{if $_userMenu == 'account'} class="selected"{/if}><span class="account"></span>Twoje konto</a>
		<a href="{url module=panel action=message}"{if $_userMenu == 'message'} class="selected"{/if}><span class="message{if $notifications.message} notify{/if}"></span>Korespondencja</a>
		{*<a href="{url module=panel action=blog}"{if $_userMenu == 'blog'} class="selected"{/if}><span class="blog{if $notifications.blog} notify{/if}"></span>Blogi</a>*}
		<a href="{url module=panel action=forum}"{if $_userMenu == 'comment'} class="selected"{/if}><span class="comment{if $notifications.comment} notify{/if}"></span>Forum</a>
		<a href="{url module=panel action=promo}"{if $_userMenu == 'promo'} class="selected"{/if}><span class="promo{if $notifications.promo} notify{/if}"></span>Promocje</a>
		<a href="{url module=panel action=transaction}"{if $_userMenu == 'transaction'} class="selected"{/if}><span class="transaction"></span>Zamówienia</a>
	</div>
</nav>