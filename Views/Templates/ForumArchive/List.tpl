<div class="wrapper">
	<div class="box spaced">
		<h1>Archiwum forum</h1>
		
		<ul class="threads">
			<li><a href="{url module='forum_archive' link_title='Dom Studia Atrium' postId=1}"{if $request.postId == 1 || $forum_thread.parent_id == 1} class="selected"{/if}>Dom Studia Atrium</a> | </li>
			<li><a href="{url module='forum_archive' link_title='Budownictwo ogólne' postId=2}"{if $request.postId == 2 || $forum_thread.parent_id == 2} class="selected"{/if}>Budownictwo ogólne</a> | </li>
			<li><a href="{url module='forum_archive' link_title='Prawo i budowa' postId=3}"{if $request.postId == 3 || $forum_thread.parent_id == 3} class="selected"{/if}>Prawo i budowa</a> | </li>
			<li><a href="{url module='forum_archive' link_title='Uwagi o serwisie' postId=4}"{if $request.postId == 4 || $forum_thread.parent_id == 4} class="selected"{/if}>Uwagi o serwisie</a></li>
		</ul>
		
		{if $archive}	
		<div class="control-box">
			<ul>
				<li><span>Znalezionych wpisów <strong>{$total|default:0}</strong></span></li>
				<li>
				{if $pages > 1}
					{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url query='.html'}
				{/if}
				</li>
			</ul>
		</div>
		{/if}
	</div>
</div>

{if $forum_thread}
	{if $forum_thread.old_user_name}
		{$userName = $forum_thread.old_user_name}
	{else}
		{$userName = $forum_thread.user.login}
	{/if}

	<div class="archive-box">	
		<p>
			{if $userName}
			<span>{if $forum_thread.old_user_name}{$forum_thread.old_user_name}{else}{$forum_thread.user.login}{/if}</span>
			{/if}
			<span>rozpoczęty: <strong>{$forum_thread.date_added}</strong></span>
			<span>odpowiedzi: <strong>{$forum_thread.reply_count}</strong></span>
		</p>
		<div>
			{$forum_thread.content}
		</div>
	</div>
{else if $archive}
	<div class="articles-box">	
		<div class="list-box thread">
			<ul class="list">
				{foreach $archive as $_item}
				<li>
					<td>
						{if !$forum_thread}
							<p><a href="{url module=forum_archive postId=$_item.id link_title=$_item.title|truncate:70|replace:'Odp.:':''}"><strong>{$_item.title}</strong></a>{if $_item.project} ({$_item.project.symbol_alpha}-{$_item.project.symbol_num} {$_item.project.name}){/if}{if $_item.old_user_name} - {$_item.old_user_name}{elseif $_item.user.login} - {$_item.user.login}{/if}</p>
						{/if}
						<p>
							{if $forum_thread}
								{$_item.content}
							{else}
								{$_item.content|truncate:200:"..."}
							{/if}
						</p>
					</td>
				</tr>
				{/foreach}
			</ul>
			
			{if $pages > 1}
			<div class="wrapper">
				<div class="box">
					<div class="control-box">
						<ul>
							<li>
								{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url query='.html'}
							</li>
						</ul>
					</div>
				</div>
			</div>
			{/if}
		</div>
	</div>
{/if}