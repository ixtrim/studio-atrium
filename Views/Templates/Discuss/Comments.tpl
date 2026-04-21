<div class="wrapper">
	<div class="box spaced">
		
		<h1><a href="{url module=discuss action=forum}">Forum</a></h1>
		<ul>
			<li>Komentarze do projektów</li>
		</ul>
		<p>W tej kategorii można komentować konkretny projekt domu i zadawać pytania odnoszące się do niego naszemu konsultantowi. 
		Żadne pytanie nie pozostawiamy bez odpowiedzi. To kategoria specyficzna, zakładająca partnerstwo Studia Atrium. Masz dla nas uwagi, opinie, czy zapytanie dotyczące ulubionego 
		projektu? Wpisz komentarz na stronie wybranego domu i tam śledź dyskusję lub oczekuj naszej odpowiedzi. Poniżej natomiast znajdziesz listę wszystkich ostatnio dodanych komentarzy.</p>

		<div id="search-forum">
			<form action="{url module=discuss action=search}" method="get" id="forum-filters-form">
				<fieldset>
					<ul class="filters-box">
						<li>
							<input id="forum-search-field" name="query" value="" placeholder="wpisz szukane słowo" type="text" autocomplete="off">
						</li>
						<li>
							<div class="select-wrapper">
								<div class="jui-select-box dark" id="category-select-box">
									<select id="category-select" name="cid">
										<option value="0" {if !$request.cid} selected="selected"{/if}>w kategorii</option>
										<option value="100" {if $request.cid == 100} selected="selected"{/if}>Komentarze</option>
										{foreach $categories as $_key => $_item}
										<option value="{$_key}" {if $request.cid == $_key} selected="selected"{/if}>{$_item.title}</option>
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
			{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url}
		</div>
		{/if}
		
		<ul class="forum-header comments">
			<li>
				<p>Komentarz do projektu</p>
			</li>
			<li>
				<p>Ostatnia odpowiedź</p>
			</li>
		</ul>
		
		{foreach $threads as $_item}
		<div class="forum-cats">
			<ul>
				<li>
					<h4><a href="{url module=project action=item id=$_item.project.id link_title=$_item.project.name catalog='projekty-domow'}#komentarze">{$_item.project.name}</a></h4>
					<p class="thread">{$_item.content|truncate:200|hideEmails}</p>
					<div>
						<span>utworzył:</span>
						<span class="nick">{$_item.author}</span>
						<span>{$_item.publish_date|date_format:"%d-%m-%Y"}</span>
						<span class="project"><a href="{url module=project action=item id=$_item.project.id link_title=$_item.project.name catalog='projekty-domow'}">{$_item.project.name}</a></span>
					</div>
				</li>
				{if $_item.children}
				<li>
					<ul>
						<li>
							{if $_item.children[0].user_id|avatar}
								<p class="avatar"><img src="{$_item.children[0].user_id|avatar}" alt="{$_item.children[0].author}">{$_item.children[0].author}</p>
							{else}
								<p{if in_array($_item.children[0].user_id, $adminIds)} class="nick sa"{else} class="nick" data-initial="{$_item.children[0].author|truncate:1:""}"{/if}>{$_item.children[0].author}</p>
							{/if}
							<p>{$_item.children[0].publish_date|date_format:"%d-%m-%Y"}</p>
							<p>({$_item.children[0].publish_date|date_format:"%H:%M:%S"})</p>
						</li>
						<li>
							<div>
								<a href="{url module=project action=item id=$_item.project.id link_title=$_item.project.name catalog='projekty-domow'}#komentarze">
									<p>{$_item.children[0].content|strip_tags|truncate:160|hideEmails}</p>
								</a>
							</div>
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
</div>