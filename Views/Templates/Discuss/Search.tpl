{* Forum search results — 2026 *}
<div id="forum-2026" class="bg-white">

	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
		<div class="forum-shell">
			<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
				<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li><a href="{url module=discuss action=forum}" class="hover:text-[#222] transition-colors">Forum</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li aria-current="page" class="text-[#6b6b6b]">Wyniki wyszukiwania</li>
			</ol>
		</div>
	</nav>

	<section class="w-full bg-[#f5f6f7] border-b border-black/5">
		<div class="forum-shell py-10 md:py-12">
			<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Forum</span>
			<h1 class="mt-3 text-[32px] md:text-[40px] font-400 text-[var(--brand-darker)] tracking-tight uppercase leading-tight">Wyniki wyszukiwania</h1>
			<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
			<p class="mt-5 max-w-3xl text-[15px] leading-relaxed text-[#555]">
				{if $request.query}Zapytanie: <strong class="text-[#222]">{$request.query|escape}</strong>{/if}
				{if $request.cid}{if $request.query} · {/if}Kategoria: <strong class="text-[#222]">{$categories[$request.cid].title|escape}</strong>{/if}
				{if $request.pid}{if $request.query || $request.cid} · {/if}Projekt: <strong class="text-[#222]" id="search-project-name"></strong>{/if}
				<span class="text-[#888]">({$total})</span>
			</p>
		</div>
	</section>

	<section class="w-full bg-white py-10 md:py-14">
		<div class="forum-shell space-y-6">
			{include file="Include/ForumSearch.tpl" forum_search_query=$query forum_search_cid=$request.cid}

			{if $pages > 1}
			<div class="pager-box">
				{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url query=$queryPart}
			</div>
			{/if}

			{foreach $posts.list as $_item}
				{if $_item.parent_id}
					{$_threadId = $_item.parent_id}
				{else}
					{$_threadId = $_item.id}
				{/if}
			<div class="forum-search{if $_item@first} first{/if}">
				<ul>
					<li>
						<div class="forum-author">
							{if $_item.uid|avatar}
								<p class="avatar"><img src="{$_item.uid|avatar}" alt="{$_item.unick|escape}">{$_item.unick|escape}</p>
							{else}
								<p{if in_array($_item.uid, $adminIds)} class="nick sa"{else} class="nick" data-initial="{$_item.unick|truncate:1:""|escape}"{/if}>{$_item.unick|escape}</p>
							{/if}
							<p class="text-[13px] text-[#6b7177] m-0">{$_item.pdate|date_format:"%d-%m-%Y (%T)"}</p>
						</div>
					</li>
					<li class="result">
						<p class="head m-0 mb-2 text-[13px] font-bold uppercase tracking-wider text-[#6b7177]">
							{if !$_item.parent_id}
								Temat: <a href="{url module=discuss action=thread id=$_threadId}" class="normal-case tracking-normal text-[var(--brand-darker)] hover:text-[var(--brand-red)]">{$_item.ptitle|escape}</a>
							{else}
								Odpowiedź w temacie: <a href="{url module=discuss action=thread id=$_threadId}" class="normal-case tracking-normal text-[var(--brand-darker)] hover:text-[var(--brand-red)]">{$_item.dadtopic|escape}</a>
							{/if}
						</p>
						<div class="text-[14px] leading-relaxed text-[#555]">
							{$_item.content|truncate:320|hideEmails}
							<p class="small mt-3 mb-0 text-[12px] text-[#888]">
								W kategorii: {$categories[$_item.cat_id].title|escape}
								{if $_item.project_id}
									{$_project = $projects[$_item.project_id]}
									| Związany z projektem:
									<span class="project overview" data-id="{$_item.project_id}" data-img="{image type=render project=$_project size=presentation}" data-ground="{image type=sketch project=$_project}"{if $_project.params_general|hasFloor:true} data-floor="{image type=sketch project=$_project storey=1st_floor}"{/if}{if $_project.params_general|hasLoft:true} data-loft="{image type=sketch project=$_project storey=loft}"{/if} data-link="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}" data-price="{if $_project.price}{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}{else}-{/if}" data-name="{$_project.name|escape}" data-area="{$_project.params_general|usableArea}" data-parcel="{$_project.params_general|parcelWidth} x {$_project.params_general|parcelHeight}" data-height="{$_project.params_general|houseHeight}" data-angle="{$_project.params_general|roofAngle}" data-version="{if $_project.type == 'skeleton'}wersja szkieletowa{else}wersja murowana{/if}" data-rooms="{$_project.params_general|roomCount}" data-txt="{$_project.short_description|escape}">{$_project.name|escape}</span>
								{/if}
							</p>
						</div>
					</li>
				</ul>
			</div>
			{/foreach}

			{if $pages > 1}
			<div class="pager-box">
				{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url query=$queryPart}
			</div>
			{/if}
		</div>
	</section>
</div>

{include file="Include/ForumProjectOverlay.tpl"}
