{* Project comments list — 2026 *}
<div id="forum-2026" class="bg-white">

	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
		<div class="forum-shell">
			<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
				<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li><a href="{url module=discuss action=forum}" class="hover:text-[#222] transition-colors">Forum</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li aria-current="page" class="text-[#6b6b6b]">Komentarze do projektów</li>
			</ol>
		</div>
	</nav>

	<section class="w-full bg-[#f5f6f7] border-b border-black/5">
		<div class="forum-shell py-10 md:py-12">
			<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Forum</span>
			<h1 class="mt-3 text-[32px] md:text-[40px] font-400 text-[var(--brand-darker)] tracking-tight uppercase leading-tight">Komentarze do projektów</h1>
			<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
			<p class="mt-5 max-w-3xl text-[15px] md:text-[16px] leading-relaxed text-[#555]">
				Komentuj konkretny projekt domu i zadawaj pytania konsultantowi. Żadne pytanie nie zostawiamy bez odpowiedzi —
				wpisz komentarz na stronie wybranego domu i śledź dyskusję tam. Poniżej lista ostatnio dodanych komentarzy.
			</p>
		</div>
	</section>

	<section class="w-full bg-white py-10 md:py-14">
		<div class="forum-shell space-y-6">
			{include file="Include/ForumSearch.tpl" forum_search_cid=$request.cid forum_search_show_comments=1}

			{if $pages > 1}
			<div class="pager-box">
				{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url}
			</div>
			{/if}

			<ul class="forum-header comments">
				<li><p>Komentarz do projektu</p></li>
				<li><p>Ostatnia odpowiedź</p></li>
			</ul>

			{foreach $threads as $_item}
			<div class="forum-cats">
				<ul>
					<li>
						<h4><a href="{url module=project action=item id=$_item.project.id link_title=$_item.project.name catalog='projekty-domow'}#komentarze">{$_item.project.name|escape}</a></h4>
						<p class="thread">{$_item.content|truncate:200|hideEmails}</p>
						<div class="forum-meta">
							<span>Utworzył:</span>
							<span class="nick">{$_item.author|escape}</span>
							<span>{$_item.publish_date|date_format:"%d-%m-%Y"}</span>
							<span class="project"><a href="{url module=project action=item id=$_item.project.id link_title=$_item.project.name catalog='projekty-domow'}">{$_item.project.name|escape}</a></span>
						</div>
					</li>
					{if $_item.children}
					<li>
						<ul class="m-0 p-0 list-none grid gap-4 sm:grid-cols-[140px_1fr]">
							<li class="forum-author">
								{if $_item.children[0].user_id|avatar}
									<p class="avatar"><img src="{$_item.children[0].user_id|avatar}" alt="{$_item.children[0].author|escape}">{$_item.children[0].author|escape}</p>
								{else}
									<p{if in_array($_item.children[0].user_id, $adminIds)} class="nick sa"{else} class="nick" data-initial="{$_item.children[0].author|truncate:1:""|escape}"{/if}>{$_item.children[0].author|escape}</p>
								{/if}
								<p class="text-[13px] text-[#6b7177] m-0">{$_item.children[0].publish_date|date_format:"%d-%m-%Y"}</p>
								<p class="text-[12px] text-[#999] m-0">{$_item.children[0].publish_date|date_format:"%H:%M"}</p>
							</li>
							<li>
								<a href="{url module=project action=item id=$_item.project.id link_title=$_item.project.name catalog='projekty-domow'}#komentarze" class="block no-underline text-inherit hover:text-[var(--brand-red)]">
									<p class="m-0 text-[14px] leading-relaxed text-[#555]">{$_item.children[0].content|strip_tags|truncate:160|hideEmails}</p>
								</a>
							</li>
						</ul>
					{else}
					<li class="reply">
						<a href="{url module=project action=item id=$_item.project.id link_title=$_item.project.name catalog='projekty-domow'}#komentarze">Odpowiedz</a>
					{/if}
					</li>
				</ul>
			</div>
			{/foreach}
		</div>
	</section>
</div>
