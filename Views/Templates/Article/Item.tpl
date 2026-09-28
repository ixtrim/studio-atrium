{assign var=backTagId value=null}
{assign var=backTagLabel value=''}
{foreach $documentTags as $tid => $tag}
	{if $allTags.main[$tid]}
		{assign var=backTagId value=$tid}
		{assign var=backTagLabel value=$allTags.main[$tid]}
		{break}
	{/if}
{/foreach}

<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[rgb(229,229,229)] py-[12px]">
	<div class="max-w-[1480px] mx-auto px-8">
		<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[rgb(107,107,107)] font-normal">
			<li><a href="/" class="hover:text-[rgb(34,34,34)] transition-colors">Studio Atrium</a></li>
			<li aria-hidden="true" class="text-[rgb(189,189,189)]">»</li>
			<li><a href="{url module=article action=hash_tag}" class="hover:text-[rgb(34,34,34)] transition-colors">Baza wiedzy</a></li>
			{if $backTagId}
			<li aria-hidden="true" class="text-[rgb(189,189,189)]">»</li>
			<li><a href="{url module=article action=hash_tag id=$backTagId}" class="hover:text-[rgb(34,34,34)] transition-colors">{$backTagLabel|ucfirst|escape}</a></li>
			{/if}
			<li aria-hidden="true" class="text-[rgb(189,189,189)]">»</li>
			<li aria-current="page" class="text-[rgb(107,107,107)]">{$article.title|escape}</li>
		</ol>
	</div>
</nav>

<article id="article-2026" class="bg-white py-12">
	<div class="max-w-[920px] mx-auto px-8">
		<div class="flex flex-wrap items-center justify-between gap-4 mb-6">
			<p class="m-0">
				{if $backTagId}
				<a href="{url module=article action=hash_tag id=$backTagId}" class="text-[14px] text-[var(--brand-blue-strong)] hover:underline">Powrót do „{$backTagLabel|ucfirst|escape}”</a>
				{else}
				<a href="{url module=article action=hash_tag}" class="text-[14px] text-[var(--brand-blue-strong)] hover:underline">Powrót do bazy wiedzy</a>
				{/if}
			</p>
			<div class="flex items-center gap-5 text-[14px] text-[var(--brand-blue-strong)]">
				<span class="net cursor-pointer hover:underline" role="button" tabindex="0">Udostępnij</span>
				<span class="print cursor-pointer hover:underline" data-docid="{$article.id}" title="drukuj artykuł" role="button" tabindex="0">Drukuj</span>
			</div>
		</div>

		<h1 class="article-title text-[32px] md:text-[38px] font-bold text-[var(--brand-darker)] leading-tight mb-5 normal-case tracking-normal">{$article.title|escape}</h1>

		{if $documentTags}
		<div class="flex flex-wrap items-center gap-3 text-[14px] text-[var(--brand-blue-strong)] mb-10">
			{assign var=tagShown value=0}
			{foreach $documentTags as $tid => $tag}
				{if $allTags.main[$tid]}
					{if $tagShown}<span class="text-black/30" aria-hidden="true">|</span>{/if}
					<a href="{url module=article action=hash_tag id=$tid}" class="hover:underline">{$allTags.main[$tid]|escape}</a>
					{assign var=tagShown value=1}
				{elseif $allTags.normal[$tid]}
					{if $tagShown}<span class="text-black/30" aria-hidden="true">|</span>{/if}
					<a href="{url module=article action=hash_tag id=$tid}" class="hover:underline">{$allTags.normal[$tid]|escape}</a>
					{assign var=tagShown value=1}
				{/if}
			{/foreach}
		</div>
		{/if}

		<div class="article-content">{$article.content|fixArticleContent:$article.id}</div>
	</div>
</article>

<div class="blue-overlay share" id="links-pop">
	<div id="links-wrapper">
		<p class="pop-header">Prześlij znajomemu</p>

		<p class="nocaps">Wypełnij poniższy formularz i prześlij link do artykułu znajomemu.</p>

		<form method="post" action="{url module='article' action='send'}" id="links-form" data-docid="{$article.id}">
			<input name="module" type="hidden" value="article">
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
				<label for="sender-sign" class="black">Twój podpis</label>
				<input type="text" name="signature" value="{$user.name} {$user.surname}" id="sender-sign" class="long">
			</p>

			<p class="last"><input id="links_button" type="submit" value="wyślij" class="baton"></p>
			<p class="nocaps" id="links-fail-box" style="display: none;">Wypełnij poprawnie formularz</p>
		</form>
	</div>
	<button type="button" id="share-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>
