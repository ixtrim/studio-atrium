{$displayMapped = $displayType|mapUrlParam:'display_type'}
{$sortByMapped = $sortBy|mapUrlParam:'sort_by'}
{$sortOrderMapped = $sortOrder|mapUrlParam:'sort_order'}
{$pagerUrl = $url|cat:$displayMapped|cat:','|cat:$sortByMapped|cat:','|cat:$sortOrderMapped}

{if !$isSearch && $listType == 'house'}
	{* ===== 2026 category listing (matches atrium-design-preview /projekty) ===== *}
	<div id="cat-2026">
		<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
			<div class="max-w-[1480px] mx-auto px-8">
				<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
					<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
					<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
					{if $isAllProjects}
						<li aria-current="page" class="text-[#6b6b6b]">Wszystkie projekty domów</li>
					{elseif $category.tree == 'house'}
						<li><a href="/projekty/" class="hover:text-[#222] transition-colors">Projekty Domów</a></li>
						{if $category.link != 'projekty-domow'}
							<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
							<li aria-current="page" class="text-[#6b6b6b]">
								{if $category.alternate_name}{$category.alternate_name|escape}{else}{$category.name|escape}{/if}
							</li>
						{/if}
					{else}
						<li aria-current="page" class="text-[#6b6b6b]">{$category.name|escape}</li>
					{/if}
				</ol>
			</div>
		</nav>

		<section class="w-full bg-white py-8">
			<div class="max-w-[1480px] mx-auto px-8">
				<div class="flex flex-col md:flex-row items-stretch bg-[#3a3d42] text-white mb-6">
					<div class="flex-1 flex items-center px-8 py-5">
						<h3 class="text-[28px] font-semibold uppercase text-white leading-tight">
							{$category_banner.title_text|escape|nl2br}</h3>
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
					<div
						class="bg-white text-[#222] px-8 py-5 flex flex-col items-center justify-center text-center min-w-[220px] md:min-w-[260px] border-t-[5px] border-r-[5px] border-b-[5px] border-[#3a3d42]">
						<div class="text-[34px] font-['Montserrat',sans-serif] font-semibold leading-none">
							{$category_banner.offer_value|escape}</div>
						<div class="text-[14px] text-[#666] mt-1">{$category_banner.offer_note|escape}</div>
					</div>
				</div>

				<div class="flex flex-col lg:flex-row gap-6">
					<aside class="w-full lg:w-[240px] flex-shrink-0 space-y-4">
						{include file="Include/CategoryFilterSidebar.tpl"}

						<div class="bg-[var(--brand-blue)] text-white p-5 text-center">
							<p class="text-[15px] font-bold leading-snug mb-4">
								{$category_sidebar.cta_text|escape}
							</p>
							<a href="{$category_sidebar.cta_button_url|escape}"
								class="inline-flex items-center justify-center bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white text-[12px] font-bold px-4 py-3 w-full tracking-wide">
								{$category_sidebar.cta_button_label|escape}
							</a>
						</div>

						{if $category_sidebar.items}
							<ul class="flex flex-col gap-[12px] mt-[12px]">
								{foreach $category_sidebar.items as $sidebar_item}
									<li class="flex items-center gap-3">
										{if $sidebar_item.icon_svg}
											<div class="w-9 h-9 bg-[var(--brand-blue)] flex items-center justify-center flex-shrink-0">
												{$sidebar_item.icon_svg nofilter}
											</div>
										{/if}
										<span
											class="text-[12px] font-bold text-[#222] leading-tight">{$sidebar_item.item_text|escape|nl2br nofilter}</span>
									</li>
								{/foreach}
							</ul>
						{/if}
					</aside>

					<div class="flex-1 min-w-0" id="cat-results" data-list-url="{$url|escape}"
						data-category="{if $isAllProjects}projekty-domow{else}{$category.link|escape}{/if}"
						data-all="{if $isAllProjects}1{else}0{/if}"
						data-ajax-url="/index.php?module=project&amp;action=filter_list" data-sort-by="{$sortBy|escape}"
						data-sort-order="{$sortOrder|escape}" data-display-type="{$displayType|escape}">
						<div class="bg-[#ececec] px-6 py-5 mb-6">
							<h1 class="text-[26px] font-normal text-[#222]">{if $isAllProjects}Wszystkie projekty
								domów{elseif $category.alternate_name}{$category.alternate_name|escape}
								{else}{$category.name|escape}
								{/if}
							</h1>
							<div class="text-[14px] text-[#222] mt-2">
								<strong>Liczba projektów:</strong> <span id="cat-total-count">{$total}</span>
							</div>
							{if $shortDescription}
								<p class="text-[13px] text-[#444] mt-3 leading-relaxed">{$shortDescription|escape}</p>
							{elseif $description}
								<p class="text-[13px] text-[#444] mt-3 leading-relaxed">{$description|truncate:320|escape}</p>
							{/if}
						</div>

						{if !$sortingDisabled}
							{if $isAllProjects}{$defaultSortOrder = 'DESC'}{else}{$defaultSortOrder = 'ASC'}{/if}
							<div class="cat-sort-bar flex flex-wrap items-center justify-end gap-3 mb-5 w-full ml-auto">
								<form method="post" action="{$url}{$query}" id="projects-filters-form"
									class="flex items-center gap-3 ml-auto">
									<input type="hidden" name="display_type" value="box" id="display-type">
									<input type="hidden" name="sort_by" id="sort-by" value="{$sortBy}">
									<input type="hidden" name="sort_order" id="sort-order" value="{$sortOrder}">
									<span class="text-[13px] text-[#666]">Sortowanie:</span>
									<div class="cat-sort-group flex items-center gap-1" role="group"
										aria-label="Sortowanie projektów">
										<button type="button" class="cat-sort-btn{if $sortBy == 'id'} is-active{/if}"
											data-sort-by="id" data-sort-order="{$defaultSortOrder}"
											title="{if $isAllProjects}Od najnowszych{else}Domyślne{/if}"
											aria-label="{if $isAllProjects}Od najnowszych{else}Domyślne{/if}"
											aria-pressed="{if $sortBy == 'id'}true{else}false{/if}">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
												fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
												stroke-linejoin="round" aria-hidden="true">
												<path d="M3 5h12" />
												<path d="M3 12h9" />
												<path d="M3 19h6" />
												<path d="m17 8 4-4 4 4" />
												<path d="M21 4v12" />
											</svg>
										</button>
										<button type="button"
											class="cat-sort-btn{if $sortBy == 'usable_area' && $sortOrder == 'ASC'} is-active{/if}"
											data-sort-by="usable_area" data-sort-order="ASC" title="Powierzchnia rosnąco"
											aria-label="Powierzchnia rosnąco"
											aria-pressed="{if $sortBy == 'usable_area' && $sortOrder == 'ASC'}true{else}false{/if}">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
												fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
												stroke-linejoin="round" aria-hidden="true">
												<path d="m3 8 4-4 4 4" />
												<path d="M7 4v16" />
												<rect width="10" height="8" x="11" y="12" rx="1" />
												<path d="M15 8h.01" />
												<path d="M19 8h.01" />
											</svg>
										</button>
										<button type="button"
											class="cat-sort-btn{if $sortBy == 'usable_area' && $sortOrder == 'DESC'} is-active{/if}"
											data-sort-by="usable_area" data-sort-order="DESC" title="Powierzchnia malejąco"
											aria-label="Powierzchnia malejąco"
											aria-pressed="{if $sortBy == 'usable_area' && $sortOrder == 'DESC'}true{else}false{/if}">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
												fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
												stroke-linejoin="round" aria-hidden="true">
												<path d="m3 16 4 4 4-4" />
												<path d="M7 20V4" />
												<rect width="10" height="8" x="11" y="4" rx="1" />
												<path d="M15 16h.01" />
												<path d="M19 16h.01" />
											</svg>
										</button>
										<button type="button"
											class="cat-sort-btn{if $sortBy == 'name' && $sortOrder == 'ASC'} is-active{/if}"
											data-sort-by="name" data-sort-order="ASC" title="Nazwa A–Z" aria-label="Nazwa A–Z"
											aria-pressed="{if $sortBy == 'name' && $sortOrder == 'ASC'}true{else}false{/if}">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
												fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
												stroke-linejoin="round" aria-hidden="true">
												<path d="m3 16 4 4 4-4" />
												<path d="M7 20V4" />
												<path d="M20 8h-5" />
												<path d="M15 10V6.5a2.5 2.5 0 0 1 5 0V10" />
												<path d="M15 14h5l-5 6h5" />
											</svg>
										</button>
										<button type="button"
											class="cat-sort-btn{if $sortBy == 'name' && $sortOrder == 'DESC'} is-active{/if}"
											data-sort-by="name" data-sort-order="DESC" title="Nazwa Z–A" aria-label="Nazwa Z–A"
											aria-pressed="{if $sortBy == 'name' && $sortOrder == 'DESC'}true{else}false{/if}">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
												fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
												stroke-linejoin="round" aria-hidden="true">
												<path d="m3 8 4-4 4 4" />
												<path d="M7 4v16" />
												<path d="M15 4h5l-5 6h5" />
												<path d="M15 20v-3.5a2.5 2.5 0 0 1 5 0V20" />
												<path d="M20 18h-5" />
											</svg>
										</button>
									</div>
								</form>
							</div>
						{/if}

						<div id="cat-results-shell">
							<div id="cat-results-loader" aria-hidden="true">
								<div class="cat-loader-card" role="status" aria-live="polite">
									<span class="cat-loader-spinner" aria-hidden="true"></span>
									<span class="cat-loader-copy">
										<span class="cat-loader-title">Filtrowanie projektów</span>
										<span class="cat-loader-sub">Aktualizujemy listę…</span>
									</span>
								</div>
							</div>
							<div id="cat-results-body">
								{include file="Project/Ajax/CategoryFilterResults.tpl"}
							</div>
						</div>

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
		{include file="Include/Partners.tpl"}
		{include file="Include/Newsletter.tpl" category_newsletter_bg=1}
	</div>

{else}
	{* ===== Legacy / search / non-house listings ===== *}
	{if !$isSearch}
		<div class="list-header{if $page == 1 && ($shortDescription || $description)} activated{/if}{if $category.id == 1 || $category.id == 67 || $category.id == 23 || $category.id == 25 || $category.id == 75 || $category.id == 77} on{/if}"
			{if $category.attachments.CategoryBg}
				style="background: #e6e6e6 url({$stockPath}/{$category.attachments.CategoryBg[0].path}/{$category.attachments.CategoryBg[0].filename}) no-repeat center 110px;"
			{/if}>
			<div>
				<div class="header-wrapper">
					<div>
						<h1>
							<span>{if $category.alternate_name}{$category.alternate_name}{else}{$category.name}{/if}</span>
						</h1>
						{if $shortDescription}
							<p>{$shortDescription}{if $description} <a href="javascript:" class="goto"
									data-id="categoryDescription">więcej &raquo;</a>{/if}</p>
							{$string_length = 400}
						{elseif $description}
							{$string_length = strlen($description) - substr_count($description, ' ')}
							<p>{$description|truncate:300}{if $string_length >= 300} <a href="javascript:" class="goto"
									data-id="categoryDescription">więcej &raquo;</a>{/if}</p>
						{/if}
						{if $page == 1 && ($shortDescription || $description)}<div id="goto-box"><a href="javascript:"
								class="goto" data-id="categoryDescription">zobacz opis &raquo;</a></div>{/if}
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
				<li class="path"><a href="/">Studio Atrium</a> &raquo; <a href="/projekty-domow/"
						class="{if $category.link != 'projekty-domow'}all{else}selected{/if}">projekty domów</a> &raquo;
					{if $category.link != 'projekty-domow'}<a href="/{$category.link}/"
						class="selected">{$category.name|strtolower}</a> {/if} <span>znaleziono:
						<strong>{$total}</strong></span></li>
			{else}
				<li class="path"><a href="/">Studio Atrium</a> &raquo; {if $category.name}<a href="/{$category.link}/"
						class="selected">{$category.name|strtolower}</a> {/if}<span>znaleziono: <strong>{$total}</strong></span>
				</li>
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
										<option value="id" data-sort="asc" {if $sortBy == 'id'} selected="selected" {/if}>
											sortowanie domyślne</option>
										<option value="usable_area" data-sort="asc"
											{if $sortBy == 'usable_area' && $sortOrder == 'ASC'} selected="selected" {/if}>po
											powierzchni (rosnąco)</option>
										<option value="usable_area" data-sort="desc"
											{if $sortBy == 'usable_area' && $sortOrder == 'DESC'} selected="selected" {/if}>po
											powierzchni (malejąco)</option>
										{if $listType == 'house'}
											<option value="name" data-sort="asc" {if $sortBy == 'name' && $sortOrder == 'ASC'}
												selected="selected" {/if}>po nazwie (rosnąco)</option>
											<option value="name" data-sort="desc" {if $sortBy == 'name' && $sortOrder == 'DESC'}
												selected="selected" {/if}>po nazwie (malejąco)</option>
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
				<p>Może Twoje kryteria wyszukiwania były zbyt szczegółowe? Zmień je lub przejdź do <a href="/projekty-domow/"
						class="blue">wszystkich projektów domów</a></p>
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
				<div>
					<p>{$description}</p>
				</div>
			</div>
		</section>
	{/if}
{/if}