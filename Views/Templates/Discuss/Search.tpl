<div class="wrapper spaced">
	<div class="box spaced">
		
		<h1><a href="{url module=discuss action=forum}">Forum</a></h1>
		<ul>
			<li>Wynik wyszukiwania dla 
				{if $request.query}<span>zapytania: </span> <strong>{$request.query}</strong> {/if}
				{if $request.cid}<span>kategorii: </span> <strong>{$categories[$request.cid].title}</strong> {/if}
				{if $request.pid}<span>projektu: </span> <strong id="search-project-name"></strong>{/if}
				<strong>({$total})</strong>
			</li>
		</ul>

		<div id="search-forum">
			<form action="{url module=discuss action=search}" method="get" id="forum-filters-form">
				<fieldset>
					<ul class="filters-box">
						<li>
							<input id="forum-search-field" name="query" value="{$query}" placeholder="wpisz szukane słowo" type="text" autocomplete="off">
						</li>
						<li>
							<div class="select-wrapper">
								<div class="jui-select-box dark" id="category-select-box">
									<select id="category-select" name="cid">
										<option value="0" {if !$request.cid} selected{/if}>w kategorii</option>
										{foreach $categories as $_key => $_item}
										<option value="{$_key}" {if $request.cid == $_key} selected{/if}>{$_item.title}</option>
										{/foreach}
									</select>
								</div>
							</div>
						</li>
						<li class="forum-projects-box">
							<input id="forum-project-field" value="{if $request.project}{$request.project}{/if}" placeholder="{if $request.project}{$request.project}{else}wpisz nazwę projektu{/if}" type="text" autocomplete="off">
							<ul id="projects-holder" style="display: none;"></ul>
						</li>
						<li><input type="submit" class="baton" value="Szukaj"></li>
					</ul>
					
					<input type="hidden" id="search-pid" name="pid" value="{$request.pid|default:0}">
				</fieldset>
			</form>
		</div>
		
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
					<div>
						{if $_item.uid|avatar}
							<p class="avatar"><img src="{$_item.uid|avatar}" alt="{$_item.unick}">{$_item.unick}</p>
						{else}
							<p{if in_array($_item.uid, $adminIds)} class="nick sa"{else} class="nick" data-initial="{$_item.unick|truncate:1:""}"{/if}>{$_item.unick}</p>
						{/if}
						<p>{$_item.pdate|date_format:"%d-%m-%Y (%T)"}</p>
					</div>
				</li>
				<li class="result">
					<p class="head">
						{if !$_item.parent_id}
							Temat: <a href="{url module=discuss action=thread id=$_threadId}">{$_item.ptitle}</a>
						{else}
							Odpowiedź w temacie: <a href="{url module=discuss action=thread id=$_threadId}">{$_item.dadtopic}</a>
						{/if}
					</p>
					<div>{$_item.content|truncate:320|hideEmails}
						<p class="small">w kategorii: {$categories[$_item.cat_id].title}
						{if $_item.project_id}
							{$_project = $projects[$_item.project_id]}
							| związany z projektem: <span class="project overview" data-id="{$_item.project_id}" data-img="{image type=render project=$_project size=presentation}" data-ground="{image type=sketch project=$_project}"{if $_project.params_general|hasFloor:true} data-floor="{image type=sketch project=$_project storey=1st_floor}"{/if}{if $_project.params_general|hasLoft:true} data-loft="{image type=sketch project=$_project storey=loft}"{/if} data-link="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}" data-price="{if $_project.price}{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}{else}-{/if}" data-name="{$_project.name}" data-area="{$_project.params_general|usableArea}" data-parcel="{$_project.params_general|parcelWidth} x {$_project.params_general|parcelHeight}" data-height="{$_project.params_general|houseHeight}" data-angle="{$_project.params_general|roofAngle}" data-version="{if $_project.type == 'skeleton'}wersja szkieletowa{else}wersja murowana{/if}" data-rooms="{$_project.params_general|roomCount}" data-txt="{$_project.short_description}">{$_project.name}</span>
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
</div>

<div class="overlay">
	<div class="overlay-project-box" id="over-pop">
		<div id="over-img-box">
			<ul id="over-pics">
				<li><span id="over-render" class="selected">Wizualizacja</span></li>
				<li><span id="over-ground" class="noview">Rzut parteru</span></li>
				<li><span id="over-floor" class="noview">Rzut piętra</span></li>
				<li><span id="over-loft" class="noview">Rzut poddasza</span></li>
			</ul>
			<a href="">
				<img class="preload" id="over-img" src="/img/dummy.png" alt="Render">
			</a>
		</div>
		
		<ul id="over-params">
			<li><h6 id="over-name"></h6></li>
			<li class="small"><span id="over-txt"></span></li>
			<li><span id="over-version"></span></li>
			<li><p>ilość pokoi: <span id="over-rooms"></span></p></li>
			<li><p>powierzchnia użytkowa: <strong id="over-area"></strong> m<sup>2</sup></p></li>
			<li><p>min. wymiary działki: <span id="over-parcel"></span> m</p></li>
			<li><p>wysokość budynku: <span id="over-height"></span> m</p></li>
			<li><p>kąt nachylenia dachu: <span id="over-angle"></span></p></li>
			<li><p>cena projektu: <span id="over-price"></span> zł</p></li>
			<li><a href="" class="more">Zobacz szczegóły</a></li>
		</ul>
	</div>
	
	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div>