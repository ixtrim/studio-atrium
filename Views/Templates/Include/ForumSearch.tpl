{* Shared forum search form. Optional: $forum_search_query, $forum_search_cid, $forum_search_show_comments, $forum_search_wrapped *}
<div id="search-forum" class="forum-search-box{if $forum_search_wrapped} wrapped{/if}"{if $forum_search_wrapped} style="display: none;"{/if}>
	<form action="{url module=discuss action=search}" method="get" id="forum-filters-form" class="forum-search-form">
		<fieldset class="border-0 m-0 p-0 min-w-0">
			<div class="filters-box forum-search-grid">
				<div class="forum-search-field-wrap">
					<input id="forum-search-field" name="query" value="{$forum_search_query|default:''|escape}" placeholder="Wpisz szukane słowo" type="text" autocomplete="off" class="forum-input">
				</div>
				<div class="forum-search-select-wrap select-wrapper">
					<div class="jui-select-box dark" id="category-select-box">
						<select id="category-select" name="cid" class="forum-select">
							<option value="0"{if !$forum_search_cid} selected{/if}>W kategorii</option>
							{if $forum_search_show_comments}
							<option value="100"{if $forum_search_cid == 100} selected{/if}>Komentarze</option>
							{/if}
							{foreach $categories as $_key => $_item}
							<option value="{$_key}"{if $forum_search_cid == $_key} selected{/if}>{$_item.title|escape}</option>
							{/foreach}
						</select>
					</div>
				</div>
				<div class="forum-projects-box forum-search-project-wrap">
					<input id="forum-project-field" value="{if $request.project}{$request.project|escape}{/if}" placeholder="{if $request.project}{$request.project|escape}{else}Wpisz nazwę projektu{/if}" type="text" autocomplete="off" class="forum-input">
					<ul id="projects-holder" class="forum-autocomplete" style="display: none;"></ul>
				</div>
				<div class="forum-search-submit-wrap">
					<button type="submit" class="forum-btn forum-btn--primary">Szukaj</button>
				</div>
			</div>
			<input type="hidden" id="search-pid" name="pid" value="{$request.pid|default:0}">
		</fieldset>
	</form>
</div>
