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
	{if $blackWeekBanner && $category.id != 75}
		<div>
			<p style="margin-top: 2px;"><a href="/projekty-domow/promocje"><img src="{$bannerUrl}/{$blackWeekBanner}" alt="Black week" style="max-width: 100%; height: 100%; margin: 0 auto;"></a></p>
			{*<p style="margin-top: 2px;"><a href="/projekty-domow/black-week"><img src="{$bannerUrl}/{$blackWeekBanner}" alt="Black week" style="max-width: 100%; height: 100%; margin: 0 auto;"></a></p>*}
		</div>
	{else}
	<ul class="parted">
		{foreach $partedBanner as $banner}
			{foreach $banner as $key => $value}
				<li class="part{$banner@iteration}"><a href="{$value}"><img src="{$key}" alt="Reklama" width="480" height="240"></a></li>
			{/foreach}
		{/foreach}
	</ul>
	{/if}
</div>



{else}
<div class="cs-header">
	<div>
		<h1>Wynik wyszukiwania</h1>

		{if $request.query}
		<p>dla zapytania: <strong>{$request.query}</strong></p>
		{else}
			<ul id="search-criteria-list">
			{if $category}<li><strong data-param="kategoria">x</strong>{$category.name}</li>{/if}
			{if $csType}<li><strong data-param="typ_projektu">x</strong>{$csType}</li>{/if}
			
			{foreach $csTypedParams as $_key => $value}
				<li><strong data-param="{$_key}">x</strong>{$csTypedParamsNames[$_key]} {$value} {$csParamsUnits[$_key]}</li>
			{/foreach}

			{foreach $csParams as $_key => $_value}
				{if $csParamsNames[$_key]}
				<li>
					<strong data-param="{$paramsMap[$_key]}">x</strong>{$csParamsNames[$_key]}
						{if $csDualParams[$_key]}: {$csDualParamsNames[$_key][$_value]}{/if}
						{if $csTripleParams[$_key]}: {$csTripleParamsNames[$_key][$_value]}{/if}
						{if in_array($_key, $csValueParams)}: {if $_value == -1}dowolna{else}{if in_array($_value, array_keys($csValueNames))}{$csValueNames[$_value]}{else}{$_value}{/if}{/if}{/if}
						{if $csRangeParams[$_key]}: od {$csRangeParams[$_key][$_value][0]} do {$csRangeParams[$_key][$_value][1]} {$csParamsUnits[$_key]}{/if}
				</li>
				{/if}
			{/foreach}
			
				<li id="search-criteria-waiter" class="waiter-box" style="display: none;"><img src="/img/waiter-grey.gif" alt=""></li>
			</ul>
			
			<p id="search-criteria">zmień kryteria wyszukiwania</p>
		{/if}
	</div>
</div>
{/if}

{$displayMapped = $displayType|mapUrlParam:'display_type'}
{$sortByMapped = $sortBy|mapUrlParam:'sort_by'}
{$sortOrderMapped = $sortOrder|mapUrlParam:'sort_order'}

<div class="control-box">
	<ul>
		{if $category.tree == 'house'}
			<li class="path"><a href="/">Studio Atrium</a> &raquo; <a href="/projekty-domow/" class="{if $category.link != 'projekty-domow'}all{else}selected{/if}">projekty domów</a> &raquo; {if $category.link != 'projekty-domow'}<a href="/{$category.link}/" class="selected">{$category.name|strtolower}</a> {/if} <span>znaleziono: <strong>{$total}</strong></span></li>
		{else}
			<li class="path"><a href="/">Studio Atrium</a> &raquo; {if $category.name}<a href="/{$category.link}/" class="selected">{$category.name|strtolower}</a> {/if}<span>znaleziono: <strong>{$total}</strong></span></li>
		{/if}
		{if $type != 'tank'}
		<li class="controls-box">
			<ul class="controls" id="controls">
				{if $page == 1}
					{if !$disableBox}
					<li><a href="{$url}{$query}" class="boxes{if $displayType == 'box'} active{/if}" id="display-box"></a></li>
					{/if}
					
					{if !$disableDetails}
					<li><a href="{$url}{$query}" class="detail{if $displayType == 'detail'} active{/if}" id="display-detail"></a></li>
					{/if}
					<li><a href="{$url}{$query}" class="list{if $displayType == 'list'} active{/if}" id="display-list"></a></li>
				{else}
					{if !$disableBox}
					<li><a href="{$url|cat:b|cat:','|cat:$sortByMapped|cat:','|cat:$sortOrderMapped},{$page}{$query}" class="boxes{if $displayType == 'box'} active{/if}" id="display-box"></a></li>
					{/if}
					{if !$disableDetails}
					<li><a href="{$url|cat:e|cat:','|cat:$sortByMapped|cat:','|cat:$sortOrderMapped},{$page}{$query}" class="detail{if $displayType == 'detail'} active{/if}" id="display-detail"></a></li>
					{/if}
					<li><a href="{$url|cat:l|cat:','|cat:$sortByMapped|cat:','|cat:$sortOrderMapped},{$page}{$query}" class="list{if $displayType == 'list'} active{/if}" id="display-list"></a></li>
				{/if}
			</ul>
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
						<div class="jui-select-box dark" id="sort-select-box">
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
					</div>
				</fieldset>
			</form>
			</div>
			{if $type == 'house'}
				<span id="search-trigger">Filtruj</span>
			{/if}
		</li>
		{/if}
		<li>
		{if $pages > 1}
			{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url url=$url|cat:$displayMapped|cat:','|cat:$sortByMapped|cat:','|cat:$sortOrderMapped query=$query}
		{/if}
		</li>
	</ul>
</div>

{if $list}
	{if $isSearch}
		{include file="Project/searchDisplay%type%.tpl"|replace:'%type%':ucfirst($displayType)}
	{elseif $listType == 'house'}
		{include file="Project/display%type%.tpl"|replace:'%type%':ucfirst($displayType) url=$url|cat:$displayMapped|cat:','|cat:$sortByMapped|cat:','|cat:$sortOrderMapped query=$query}
	{else}
		{include file="Project/%list%Display%type%.tpl"|replace:'%list%':$listType|replace:'%type%':ucfirst($displayType) url=$url|cat:$displayMapped|cat:','|cat:$sortByMapped|cat:','|cat:$sortOrderMapped query=$query}
	{/if}
{else}
<section>
	<div class="box center">
		<p class="no-result">Niestety nic dla Ciebie nie znaleźliśmy</p>
		<p>Może Twoje kryteria wyszukiwania były zbyt szczegółowe? Zmień je lub przejdź do <a href="/projekty-domow/" class="blue">wszystkich projektów domów</a></p>
		
		<p class="no-result-ib"><img src="/img/search.png" alt=""></p>
	</div>
</section>
{/if}

{if $pages > 1}
<div class="control-box">
	<ul>
		<li>{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url url=$url|cat:$displayMapped|cat:','|cat:$sortByMapped|cat:','|cat:$sortOrderMapped query=$query}</li>
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

{if $list}
{include file="Include/HowToBuy.tpl"}
{/if}

{if $isSearch && !$request.query}
<div id="backToTopOnList"></div>
{/if}
