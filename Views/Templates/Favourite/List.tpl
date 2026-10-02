{* ===== 2026 favourites list ===== *}
<div id="fav-2026" class="pb-16">
	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
		<div class="max-w-[1480px] mx-auto px-4 sm:px-8">
			<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
				<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li aria-current="page" class="text-[#6b6b6b]">Ulubione</li>
			</ol>
		</div>
	</nav>

	<div class="max-w-[1480px] mx-auto px-4 sm:px-8 mt-8">
		<div class="bg-[#ececec] px-6 py-5 mb-6">
			<h1 class="text-[26px] md:text-[32px] font-normal text-[#222]">Ulubione</h1>
			<p class="text-[14px] text-[#444] mt-2 leading-relaxed max-w-3xl">
				Poniżej znajdują się projekty dodane do ulubionych. Możesz przesłać linki znajomemu albo porównać maksymalnie 3 zaznaczone projekty.
			</p>
			{if $listCards}
			<div class="text-[14px] text-[#222] mt-3">
				<strong>Liczba projektów:</strong> <span>{$listCards|@count}</span>
			</div>
			{/if}
		</div>

		{if $listCards}
		<div class="fav-actions flex flex-col sm:flex-row sm:flex-wrap sm:items-center gap-3 mb-6">
			<button type="button" class="remove-all fav-action-btn fav-action-btn--ghost">Usuń wszystkie</button>
			<button type="button" class="share-links fav-action-btn fav-action-btn--ghost">Prześlij znajomemu</button>
			<a href="{url module=favourite action=compare}" class="fav-action-btn fav-action-btn--primary inline-flex items-center justify-center no-underline">Porównaj zaznaczone</a>
			<span class="text-[12px] text-[#666] sm:ml-auto">Zaznacz projekty ikoną porównania (maks. 3)</span>
		</div>

		<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 items-stretch fav-wrapper" id="project-list">
			{foreach $listCards as $item}
			<div class="fav-card relative flex flex-col h-full min-w-0">
				{include file="Include/ProjectTeaserCard.tpl" item=$item teaser_interactive=true}
				<div class="fav-card-tools absolute top-3 right-3 z-10 flex items-center gap-2">
					<button type="button" id="compare-{$item.id}"
						class="forcompare fav-tool-btn{if $item.is_compare} on{/if}"
						data-id="{$item.id}"
						aria-label="Dodaj do porównania"
						title="Porównaj">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M9 3H5a2 2 0 0 0-2 2v4"/><path d="M15 3h4a2 2 0 0 1 2 2v4"/><path d="M9 21H5a2 2 0 0 1-2-2v-4"/><path d="M15 21h4a2 2 0 0 0 2-2v-4"/><path d="M9 12h6"/></svg>
					</button>
					<button type="button" id="fav-{$item.id}"
						class="forfav fav-tool-btn on isList"
						data-id="{$item.id}"
						aria-label="Usuń z ulubionych"
						title="Usuń z ulubionych">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
					</button>
				</div>
			</div>
			{/foreach}
		</div>

		<div class="fav-actions flex flex-col sm:flex-row sm:flex-wrap sm:items-center gap-3 mt-8">
			<button type="button" class="remove-all fav-action-btn fav-action-btn--ghost">Usuń wszystkie</button>
			<button type="button" class="share-links fav-action-btn fav-action-btn--ghost">Prześlij znajomemu</button>
			<a href="{url module=favourite action=compare}" class="fav-action-btn fav-action-btn--primary inline-flex items-center justify-center no-underline">Porównaj zaznaczone</a>
		</div>

		<div class="blue-overlay share" id="links-pop">
			<div id="links-wrapper">
				<h4>Prześlij znajomemu</h4>
				<p class="nocaps">Wypełnij poniższy formularz i prześlij wiadomość znajomemu.</p>
				<form method="post" action="{url module='favourite' action='send'}" id="links-form">
					<input name="module" type="hidden" value="favourite">
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
						<label for="links-message" class="black">Treść wiadomości</label>
						<textarea name="message" id="links-message" cols="1" rows="1">{$message}</textarea>
					</p>
					<p>
						<label for="sender-sign" class="black">Twój podpis</label>
						<input type="text" name="signature" value="{$user.name} {$user.surname}" id="sender-sign" class="long">
					</p>
					<p class="last"><input id="links_button" type="submit" value="Wyślij" class="baton"></p>
					<p class="nocaps" id="links-fail-box" style="display: none;">Wypełnij poprawnie formularz</p>
				</form>
			</div>
			<button type="button" id="share-overlay-close" class="blue-overlay-close">Zamknij</button>
		</div>

		{else}
		<div class="bg-[#f7f7f7] border border-[#e5e5e5] px-6 sm:px-10 py-14 text-center">
			<p class="text-[20px] font-bold text-[#222] mb-3">Nie masz projektów w ulubionych</p>
			<p class="text-[14px] text-[#555] max-w-xl mx-auto leading-relaxed">
				Znajdź projekty na listach kategorii lub skorzystaj z wyszukiwarki i dodaj je do Ulubionych, by wrócić do nich w każdej chwili.
			</p>
			<div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
				<button type="button" class="js-open-search fav-action-btn fav-action-btn--primary border-0 cursor-pointer">Znajdź projekt</button>
				<a href="/projekty-domow/" class="fav-action-btn fav-action-btn--ghost inline-flex items-center justify-center no-underline">Zobacz projekty domów</a>
			</div>
		</div>
		{/if}
	</div>
</div>
