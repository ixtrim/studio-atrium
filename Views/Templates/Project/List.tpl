{$displayMapped = $displayType|mapUrlParam:'display_type'}
{$sortByMapped = $sortBy|mapUrlParam:'sort_by'}
{$sortOrderMapped = $sortOrder|mapUrlParam:'sort_order'}
{$pagerUrl = $url|cat:$displayMapped|cat:','|cat:$sortByMapped|cat:','|cat:$sortOrderMapped}

{if !$isSearch && $listType == 'house'}
{* ===== 2026 category listing (matches atrium-design-preview /projekty) ===== *}
<div id="cat-2026">
	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5]">
		<ol class="max-w-[1480px] mx-auto px-8 py-4 flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
			<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
			<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
			{if $isAllProjects}
			<li aria-current="page" class="text-[#6b6b6b]">Wszystkie projekty domów</li>
			{elseif $category.tree == 'house'}
			<li><a href="/projekty/" class="hover:text-[#222] transition-colors">Projekty Domów</a></li>
			{if $category.link != 'projekty-domow'}
			<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
			<li aria-current="page" class="text-[#6b6b6b]">{if $category.alternate_name}{$category.alternate_name|escape}{else}{$category.name|escape}{/if}</li>
			{/if}
			{else}
			<li aria-current="page" class="text-[#6b6b6b]">{$category.name|escape}</li>
			{/if}
		</ol>
	</nav>

	<section class="w-full bg-white py-8">
		<div class="max-w-[1480px] mx-auto px-8">
			<div class="flex flex-col md:flex-row items-stretch bg-[#3a3d42] text-white mb-6">
				<div class="flex-1 flex items-center px-8 py-5">
					<h3 class="text-[22px] font-bold leading-tight">AKTUALNE OFERTY<br>DOTYCZĄCE KATEGORII</h3>
				</div>
				{if $categoryPromoThumbs}
				<div class="flex items-center gap-3 px-4 py-4 md:py-0">
					{foreach $categoryPromoThumbs as $thumb}
					<div class="w-[70px] h-[70px] rounded-full overflow-hidden border-2 border-white/20 shrink-0">
						<img src="{$thumb|escape}" alt="" class="w-full h-full object-cover" loading="lazy">
					</div>
					{/foreach}
				</div>
				{/if}
				<div class="bg-white text-[#222] px-8 py-5 flex flex-col justify-center min-w-[220px] md:min-w-[260px]">
					<div class="text-[34px] font-bold leading-none">-500 zł</div>
					<div class="text-[14px] text-[#666] mt-1">do końca grudnia</div>
				</div>
			</div>

			<div class="flex flex-col lg:flex-row gap-6">
				<aside class="w-full lg:w-[240px] flex-shrink-0 space-y-4">
					{include file="Include/CategoryFilterSidebar.tpl"}

					<div class="bg-[var(--brand-blue)] text-white p-5 text-center">
						<p class="text-[15px] font-bold leading-snug mb-4">
							Bezpłatnie pomożemy wybrać najlepszy projekt domu dla Ciebie.
						</p>
						<a href="/znajdziemy-dla-ciebie-projekt.html"
							class="inline-flex items-center justify-center bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white text-[12px] font-bold px-4 py-3 w-full tracking-wide">
							WYPEŁNIJ FORMULARZ
						</a>
					</div>

					<ul class="space-y-3 pt-2">
						<li class="flex items-center gap-3">
							<div class="w-9 h-9 rounded-full bg-[var(--brand-blue)] flex items-center justify-center flex-shrink-0">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 text-white" aria-hidden="true"><path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"></path></svg>
							</div>
							<span class="text-[12px] font-bold text-[#222] leading-tight">BEZPŁATNE DODATKI<br>DO PROJEKTÓW</span>
						</li>
						<li class="flex items-center gap-3">
							<div class="w-9 h-9 rounded-full bg-[var(--brand-blue)] flex items-center justify-center flex-shrink-0">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 text-white" aria-hidden="true"><path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"></path></svg>
							</div>
							<span class="text-[12px] font-bold text-[#222] leading-tight">BEZPŁATNA KONSULTACJA<br>ARCHITEKTA</span>
						</li>
						<li class="flex items-center gap-3">
							<div class="w-9 h-9 rounded-full bg-[var(--brand-blue)] flex items-center justify-center flex-shrink-0">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 text-white" aria-hidden="true"><path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"></path></svg>
							</div>
							<span class="text-[12px] font-bold text-[#222] leading-tight">POMOC W ADAPTACJI</span>
						</li>
						<li class="flex items-center gap-3">
							<div class="w-9 h-9 rounded-full bg-[var(--brand-blue)] flex items-center justify-center flex-shrink-0">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 text-white" aria-hidden="true"><path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"></path></svg>
							</div>
							<span class="text-[12px] font-bold text-[#222] leading-tight">ZMIANY W PROJEKCIE</span>
						</li>
					</ul>
				</aside>

				<div class="flex-1 min-w-0">
					<div class="bg-[#ececec] px-6 py-5 mb-6">
						<h1 class="text-[26px] font-normal text-[#222]">{if $isAllProjects}Wszystkie projekty domów{elseif $category.alternate_name}{$category.alternate_name|escape}{else}{$category.name|escape}{/if}</h1>
						<div class="text-[14px] text-[#222] mt-2">
							<strong>Liczba projektów:</strong> {$total}
						</div>
						{if $shortDescription}
						<p class="text-[13px] text-[#444] mt-3 leading-relaxed">{$shortDescription|escape}</p>
						{elseif $description}
						<p class="text-[13px] text-[#444] mt-3 leading-relaxed">{$description|truncate:320|escape}</p>
						{/if}
					</div>

					{if !$sortingDisabled}
					<div class="flex flex-wrap items-center justify-between gap-3 mb-5">
						<form method="post" action="{$url}{$query}" id="projects-filters-form" class="flex items-center gap-2">
							<input type="hidden" name="display_type" value="box" id="display-type">
							<input type="hidden" name="sort_order" value="{$sortOrder}" id="sort-order">
							<label for="sort-select" class="text-[13px] text-[#666]">Sortowanie:</label>
							<select id="sort-select" name="sort_by" class="border border-[#ccc] bg-white px-3 py-2 text-[13px] text-[#222]">
								<option value="id" data-sort="{if $isAllProjects}desc{else}asc{/if}"{if $sortBy == 'id'} selected="selected"{/if}>{if $isAllProjects}od najnowszych{else}domyślne{/if}</option>
								<option value="usable_area" data-sort="asc"{if $sortBy == 'usable_area' && $sortOrder == 'ASC'} selected="selected"{/if}>powierzchnia ↑</option>
								<option value="usable_area" data-sort="desc"{if $sortBy == 'usable_area' && $sortOrder == 'DESC'} selected="selected"{/if}>powierzchnia ↓</option>
								<option value="name" data-sort="asc"{if $sortBy == 'name' && $sortOrder == 'ASC'} selected="selected"{/if}>nazwa A–Z</option>
								<option value="name" data-sort="desc"{if $sortBy == 'name' && $sortOrder == 'DESC'} selected="selected"{/if}>nazwa Z–A</option>
							</select>
						</form>
					</div>
					<script>
					(function () {
						var sel = document.getElementById('sort-select');
						var form = document.getElementById('projects-filters-form');
						var order = document.getElementById('sort-order');
						if (!sel || !form) return;
						sel.addEventListener('change', function () {
							var opt = sel.options[sel.selectedIndex];
							if (order && opt) order.value = (opt.getAttribute('data-sort') || 'asc').toUpperCase();
							form.submit();
						});
					})();
					</script>
					{/if}

					{if $list}
						{include file="Project/displayBox.tpl" url=$pagerUrl query=$query}
					{else}
						<div class="bg-[#f7f7f7] px-8 py-16 text-center">
							<p class="text-[18px] font-bold text-[#222] mb-3">Niestety nic dla Ciebie nie znaleźliśmy</p>
							<p class="text-[14px] text-[#555]">Zmień kryteria lub przejdź do <a href="/projekty/" class="text-[var(--brand-blue-strong)] hover:underline">wszystkich projektów domów</a></p>
						</div>
					{/if}

					{if $pages > 1}
					<div class="flex items-center justify-center gap-4 mt-10 text-[14px] text-[#222]">
						{if $page > 1}
							{if $page > 2}
							<a href="{$pagerUrl},{$page-1}{$query}" aria-label="poprzednia" class="hover:text-[var(--brand-red)]">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m15 18-6-6 6-6"></path></svg>
							</a>
							{else}
							<a href="{$url}{$query}" aria-label="poprzednia" class="hover:text-[var(--brand-red)]">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m15 18-6-6 6-6"></path></svg>
							</a>
							{/if}
						{else}
						<span class="opacity-50" aria-hidden="true">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m15 18-6-6 6-6"></path></svg>
						</span>
						{/if}
						<span class="border border-[#bbb] px-3 py-1 bg-white">{$page}</span>
						<span>z {$pages}</span>
						{if $page < $pages}
						<a href="{$pagerUrl},{$page+1}{$query}" aria-label="następna" class="hover:text-[var(--brand-red)]">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m9 18 6-6-6-6"></path></svg>
						</a>
						{else}
						<span class="opacity-50" aria-hidden="true">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m9 18 6-6-6-6"></path></svg>
						</span>
						{/if}
					</div>
					{/if}

					{if $description && $page == 1}
					<div class="mt-12 text-[15px] leading-relaxed text-[#444]" id="categoryDescription">
						<h2 class="text-[22px] font-bold text-[#222] mb-4">{$category.name|escape}</h2>
						<div>{$description}</div>
					</div>
					{/if}
				</div>
			</div>
		</div>
	</section>

	{include file="Include/LastViewed.tpl"}
	{include file="Include/Contact.tpl"}
	{include file="Include/ArticlesTicks.tpl"}
	{include file="Include/NewsletterSubpage.tpl"}
</div>

{else}
{* ===== Legacy / search / non-house listings ===== *}
{if !$isSearch}
<div class="list-header{if $page == 1 && ($shortDescription || $description)} activated{/if}{if $category.id == 1 || $category.id == 67 || $category.id == 23 || $category.id == 25 || $category.id == 75 || $category.id == 77} on{/if}"{if $category.attachments.CategoryBg} style="background: #e6e6e6 url({$stockPath}/{$category.attachments.CategoryBg[0].path}/{$category.attachments.CategoryBg[0].filename}) no-repeat center 110px;"{/if}>
	<div>
		<div class="header-wrapper">
			<div>
				<h1>
					<span>{if $category.alternate_name}{$category.alternate_name}{else}{$category.name}{/if}</span>
				</h1>
				{if $shortDescription}
					<p>{$shortDescription}{if $description} <a href="javascript:" class="goto" data-id="categoryDescription">więcej &raquo;</a>{/if}</p>
					{$string_length = 400}
				{elseif $description}
					{$string_length = strlen($description) - substr_count($description, ' ')}
					<p>{$description|truncate:300}{if $string_length >= 300} <a href="javascript:" class="goto" data-id="categoryDescription">więcej &raquo;</a>{/if}</p>
				{/if}
				{if $page == 1 && ($shortDescription || $description)}<div id="goto-box"><a href="javascript:" class="goto" data-id="categoryDescription">zobacz opis &raquo;</a></div>{/if}
			</div>
		</div>
	</div>
</div>
{else}
<div class="cs-header">
	<div>
		<h1>Wynik wyszukiwania</h1>
		{if $request.query}
		<p>dla zapytania: <strong>{$request.query}</strong></p>
		{/if}
	</div>
</div>
{/if}

<div class="control-box">
	<ul>
		{if $category.tree == 'house'}
			<li class="path"><a href="/">Studio Atrium</a> &raquo; <a href="/projekty-domow/" class="{if $category.link != 'projekty-domow'}all{else}selected{/if}">projekty domów</a> &raquo; {if $category.link != 'projekty-domow'}<a href="/{$category.link}/" class="selected">{$category.name|strtolower}</a> {/if} <span>znaleziono: <strong>{$total}</strong></span></li>
		{else}
			<li class="path"><a href="/">Studio Atrium</a> &raquo; {if $category.name}<a href="/{$category.link}/" class="selected">{$category.name|strtolower}</a> {/if}<span>znaleziono: <strong>{$total}</strong></span></li>
		{/if}
		{if $listType != 'other' && !$sortingDisabled}
		<li class="sort-box">
			<div>
			<form method="post" action="{$url}{$query}" id="projects-filters-form">
				<fieldset>
					<input type="hidden" name="display_type" value="{$displayType}" id="display-type">
					<input type="hidden" name="sort_order" value="{$sortOrder}" id="sort-order">
					<div class="select-wrapper">
						<select id="sort-select" name="sort_by">
							<option value="id" data-sort="asc"{if $sortBy == 'id'} selected="selected"{/if}>sortowanie domyślne</option>
							<option value="usable_area" data-sort="asc"{if $sortBy == 'usable_area' && $sortOrder == 'ASC'} selected="selected"{/if}>po powierzchni (rosnąco)</option>
							<option value="usable_area" data-sort="desc"{if $sortBy == 'usable_area' && $sortOrder == 'DESC'} selected="selected"{/if}>po powierzchni (malejąco)</option>
							{if $listType == 'house'}
							<option value="name" data-sort="asc"{if $sortBy == 'name' && $sortOrder == 'ASC'} selected="selected"{/if}>po nazwie (rosnąco)</option>
							<option value="name" data-sort="desc"{if $sortBy == 'name' && $sortOrder == 'DESC'} selected="selected"{/if}>po nazwie (malejąco)</option>
							{/if}
						</select>
					</div>
				</fieldset>
			</form>
			</div>
		</li>
		{/if}
		<li>
		{if $pages > 1}
			{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url url=$pagerUrl query=$query}
		{/if}
		</li>
	</ul>
</div>

{if $list}
	{if $isSearch}
		{include file="Project/searchDisplay%type%.tpl"|replace:'%type%':ucfirst($displayType)}
	{elseif $listType == 'house'}
		{include file="Project/display%type%.tpl"|replace:'%type%':ucfirst($displayType) url=$pagerUrl query=$query}
	{else}
		{include file="Project/%list%Display%type%.tpl"|replace:'%list%':$listType|replace:'%type%':ucfirst($displayType) url=$pagerUrl query=$query}
	{/if}
{else}
<section>
	<div class="box center">
		<p class="no-result">Niestety nic dla Ciebie nie znaleźliśmy</p>
		<p>Może Twoje kryteria wyszukiwania były zbyt szczegółowe? Zmień je lub przejdź do <a href="/projekty-domow/" class="blue">wszystkich projektów domów</a></p>
	</div>
</section>
{/if}

{if $pages > 1}
<div class="control-box">
	<ul>
		<li>{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url url=$pagerUrl query=$query}</li>
	</ul>
</div>
{/if}

{if $description && $string_length >= 300}
<section>
	<div class="box" id="categoryDescription">
		<h2>{$category.name}</h2>
		<div><p>{$description}</p></div>
	</div>
</section>
{/if}
{/if}
