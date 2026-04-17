<div class="wrapper">
	<div class="box spaced">
		<div class="actions-box">
		{foreach $documentTags as $tid => $tag}
			{if $allTags.main[$tid]}
				<p class="back"><a class="under" href="{url module=article action=hash_tag id=$tid}">Powrót do "{$allTags.main[$tid]|ucfirst}"</a></p>
				{break}
			{/if}
		{/foreach}
		
			<div>
				<span class="net"></span>
				<span data-docid="{$article.id}" title="drukuj artykuł" class="print"></span>
			</div>
		</div>
	
		<h1 class="article-title">{$article.title}</h1>

		{if $documentTags && $allTags.normal|count > 0}
		<ul class="article-tags article">
			<li><a href="/projekty-domow/">projekty domów</a></li>
			{foreach $documentTags as $tid => $tag}
				{if $allTags.main[$tid]}
					<li><a href="{url module=article action=hash_tag id=$tid}">{$allTags.main[$tid]}</a></li>
				{else if $allTags.normal[$tid]}
					<li><a href="{url module=article action=hash_tag id=$tid}">{$allTags.normal[$tid]}</a></li>
				{/if}
			{/foreach}
			
			<li>
				<a href="/{if $article.doctype == 'news'}{url module='news' action='item' docId=$article.id link_title=$article.title}{elseif $article.doctype == 'page'}{url module='document' action='item' docId=$article.id link_title=$article.title}{else}{url module='article' action='item' docId=$article.id link_title=$article.title}{/if}">
					{$article.title}
				</a>
			</li>
		</ul>
		{/if}
		
		
		<div class="article-content">{$article.content|fixArticleContent:$article.id}</div>
	</div>
</div>

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