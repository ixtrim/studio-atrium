{assign var=currentTagLabel value=''}
{if $request.tag}
	{if $allTags.main[$request.tag]}
		{assign var=currentTagLabel value=$allTags.main[$request.tag]}
	{elseif $allTags.normal[$request.tag]}
		{assign var=currentTagLabel value=$allTags.normal[$request.tag]}
	{/if}
{/if}

<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[rgb(229,229,229)] py-[12px]">
	<div class="max-w-[1480px] mx-auto px-8">
		<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[rgb(107,107,107)] font-normal">
			<li><a href="/" class="hover:text-[rgb(34,34,34)] transition-colors">Studio Atrium</a></li>
			<li aria-hidden="true" class="text-[rgb(189,189,189)]">»</li>
			{if $currentTagLabel}
			<li><a href="{url module=article action=hash_tag}" class="hover:text-[rgb(34,34,34)] transition-colors">Baza wiedzy</a></li>
			<li aria-hidden="true" class="text-[rgb(189,189,189)]">»</li>
			<li aria-current="page" class="text-[rgb(107,107,107)]">{$currentTagLabel|escape}</li>
			{else}
			<li aria-current="page" class="text-[rgb(107,107,107)]">Baza wiedzy</li>
			{/if}
		</ol>
	</div>
</nav>

<section id="kb-2026" class="bg-white py-14 md:py-16">
	<div class="max-w-[1280px] mx-auto px-8">
		<header class="mb-10 md:mb-12">
			<h1 class="text-[32px] font-bold text-[var(--brand-darker)] mb-3 tracking-normal normal-case">
				{if $currentTagLabel}{$currentTagLabel|escape}{else}Baza wiedzy{/if}
			</h1>
			{if $request.search}
			<p class="text-[15px] text-[rgb(85,85,85)] max-w-3xl m-0">
				Wyniki wyszukiwania dla: <strong class="text-[var(--brand-darker)]">{$request.search|escape}</strong>
			</p>
			{elseif $currentTagLabel}
			<p class="text-[15px] text-[rgb(85,85,85)] max-w-3xl m-0">
				Artykuły i porady w kategorii „{$currentTagLabel|escape}”.
			</p>
			{else}
			<p class="text-[15px] text-[rgb(85,85,85)] max-w-3xl m-0">
				Artykuły i porady z zakresu budowy domu, technologii i aranżacji – najnowsze publikacje z bazy wiedzy Studio Atrium.
			</p>
			{/if}
		</header>

		<div class="flex flex-wrap items-center gap-x-2 gap-y-2 mb-8 text-[14px]">
			<a href="{url module=article action=hash_tag}"
				class="kb-cat{if !$request.tag} is-active{/if}">Wszystkie</a>
			{foreach $allTags.main as $tid => $_tag}
			<a href="{url module=article action=hash_tag id=$tid}"
				class="kb-cat{if $request.tag == $tid} is-active{/if}">{$_tag|escape}</a>
			{/foreach}
			<span class="hidden md:inline text-black/20 mx-1" aria-hidden="true">|</span>
			<a href="/projekty-domow/" class="kb-cat">projekty domów</a>
		</div>

		<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-10 pb-8 border-b border-[rgb(232,232,232)]">
			<p class="m-0 text-[14px] text-[rgb(107,107,107)]">
				Znalezionych tekstów <strong class="text-[22px] text-[var(--brand-darker)] font-bold align-middle">{$total|default:0}</strong>
			</p>

			<form action="{url module=article action=hash_tag}" method="get" class="flex flex-col sm:flex-row gap-2 sm:items-stretch w-full lg:w-auto lg:max-w-xl">
				{if $request.tag}
				<input type="hidden" name="tag" value="{$request.tag|escape}">
				{/if}
				<input
					type="text"
					name="search"
					value="{if $request.search}{$request.search|escape}{/if}"
					placeholder="wpisz szukane wyrażenie"
					class="kb-search-input flex-1 min-w-0 h-[46px] px-4 text-[14px] text-[var(--brand-darker)] bg-white border border-[rgb(213,213,213)] outline-none focus:border-[var(--brand-blue-strong)]"
				>
				<button type="submit"
					class="shrink-0 h-[46px] px-6 bg-[var(--brand-blue-strong)] hover:bg-[var(--brand-blue)] text-white text-[13px] font-bold uppercase tracking-wider border-0 cursor-pointer">
					Szukaj
				</button>
			</form>

			{if $pages > 1}
			<div class="kb-pager lg:ml-auto">
				{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url query=$query}
			</div>
			{/if}
		</div>

		<div class="grid lg:grid-cols-[minmax(0,1fr)_260px] gap-12 xl:gap-16 items-start">
			<div>
				{if $articles}
				<div class="grid md:grid-cols-2 gap-x-12 xl:gap-x-16 gap-y-8">
					{foreach $articles as $article}
					{capture assign=articleHref}{if $article.doctype == 'news'}{url module='news' action='item' docId=$article.id link_title=$article.title}{elseif $article.doctype == 'page'}{url module='document' action='item' docId=$article.id link_title=$article.title}{else}{url module='article' action='item' docId=$article.id link_title=$article.title}{/if}{/capture}
					{capture assign=articleImg}{articleImage document=$article}{/capture}
					{capture assign=articleImgFallback}{$articleImg|replace:'thumb.jpg':'bann.jpg'|replace:'thumb.jpeg':'bann.jpeg'|replace:'thumb.png':'bann.png'}{/capture}
					<article class="flex gap-5 sm:gap-6 items-start">
						<a href="/{$articleHref}" class="group relative block w-[140px] sm:w-[160px] h-[140px] sm:h-[160px] overflow-hidden shrink-0 bg-[rgb(243,243,243)]">
							{if $articleImg}
							<img
								src="{$articleImg|escape}"
								data-fallback="{$articleImgFallback|escape}"
								alt="{$article.title|escape}"
								class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
								loading="lazy"
								onerror="this.onerror=null; if(this.dataset.fallback &amp;&amp; this.src !== this.dataset.fallback) this.src=this.dataset.fallback; else this.style.visibility='hidden';"
							>
							{/if}
							<span class="pointer-events-none absolute inset-0 bg-[var(--brand-blue-strong)] opacity-0 transition-opacity duration-300 group-hover:opacity-60 z-[1]" aria-hidden="true"></span>
						</a>
						<div class="pt-0.5 min-w-0">
							<h2 class="text-[18px] font-bold text-[var(--brand-darker)] leading-snug mb-3 m-0">
								<a href="/{$articleHref}" class="hover:text-[var(--brand-red)] transition-colors">{$article.title|escape}</a>
							</h2>
							<p class="text-[14px] leading-relaxed text-[rgb(85,85,85)] mb-4 m-0">
								{if $article.doctype == 'page' && !$article.teaser}
									{$article.content|strip_tags|truncate:180|escape}
								{else}
									{$article.teaser|strip_tags|truncate:180|escape}
								{/if}
							</p>
							{if $article.tags}
							<div class="flex flex-wrap items-center gap-3 text-[14px] text-[var(--brand-blue-strong)] mb-3">
								{foreach $article.tags as $_tag name=artTags}
									{if !$smarty.foreach.artTags.first}<span class="text-black/30" aria-hidden="true">|</span>{/if}
									<a href="{url module=article action=hash_tag id=$_tag.id}" class="hover:underline{if $request.tag == $_tag.id} font-semibold{/if}">{$_tag.tag|escape}</a>
								{/foreach}
							</div>
							{/if}
							<a href="/{$articleHref}"
								class="inline-block text-[13px] font-bold uppercase tracking-wider text-[var(--brand-red)] hover:underline">
								Zobacz więcej
							</a>
						</div>
					</article>
					{/foreach}
				</div>
				{else}
				<p class="text-[16px] text-[rgb(85,85,85)] py-8 m-0">Brak artykułów spełniających wybrane kryteria.</p>
				{/if}

				{if $pages > 1}
				<div class="kb-pager flex justify-center mt-14 pt-8 border-t border-[rgb(232,232,232)]">
					{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url query=$query}
				</div>
				{/if}
			</div>

			<aside class="kb-aside">
				{if $allTags.main}
				<div class="kb-aside-block">
					<p class="kb-aside-title">Kategorie</p>
					<ul class="kb-cat-list">
						{foreach $allTags.main as $tid => $_tag}
						<li>
							<a href="{url module=article action=hash_tag id=$tid}"
								class="kb-cat-link{if $request.tag == $tid} is-active{/if}">
								{$_tag|escape}
							</a>
						</li>
						{/foreach}
					</ul>
				</div>
				{/if}

				{if $allTags.normal}
				<div class="kb-aside-block" id="tagList">
					<p class="kb-aside-title">Lista tagów</p>
					<ul class="kb-tag-cloud">
						{foreach $allTags.normal as $tid => $_tag}
						<li>
							<a href="{url module=article action=hash_tag id=$tid}"
								class="kb-tag{if $request.tag == $tid} is-active{/if}">{$_tag|escape}</a>
						</li>
						{/foreach}
					</ul>
				</div>
				{/if}

				<div class="kb-aside-block">
					<p class="kb-aside-title">Archiwum forum</p>
					<ul class="kb-archive-list">
						<li><a href="/archiwum/Forum,Dom-studia-atrium,1.html">Dom Studia Atrium</a></li>
						<li><a href="/archiwum/Forum,Budownictwo-ogolne,2.html">Budownictwo ogólne</a></li>
						<li><a href="/archiwum/Forum,Prawo-i-budowa,3.html">Prawo i budowa</a></li>
						<li><a href="/archiwum/Forum,Uwagi-o-serwisie,4.html">Uwagi o serwisie</a></li>
					</ul>
				</div>
			</aside>
		</div>
	</div>
</section>
