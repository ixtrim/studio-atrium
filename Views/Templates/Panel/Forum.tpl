{include file="Panel/_menu.tpl"}
<div class="content">
	<ul class="choice">
		<li class="selected"><a href="{url module=panel action=forum}">Twoje wpisy na forum</a></li>
{*		<li><a href="{url module=panel action=comment}">Twoje komentarze</a></li>	*}
		<li class="last"><a href="{url module=panel action=forum_message}">Skrzynka wiadomości</a></li>
	</ul>

	{if $forum}
	
		{if $pages > 1}
		<div class="pager-box">
			{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url}
		</div>
		{/if}
	
	
		<ul class="comments">
		{foreach $forum as $_item}
			{if $_item.parent_id}
				{$_threadId = $_item.parent_id}
			{else}
				{$_threadId = $_item.id}
			{/if}
		
			<li>
				{if !$_item.parent_id}
					Temat: <a href="{url module=discuss action=thread id=$_threadId}">{$_item.topic}</a> 
				{else}
					Odpowiedź na temat: <a href="{url module=discuss action=thread id=$_threadId}">{$_item.parent.topic}</a>
				{/if}
					
				| {$_item.create_date|date_format:"%d-%m-%Y"}
				
				<p>Kategoria: {$categories[$_item.cat_id].title}</p>
				
				{if $_item.project_id}
					<p>Projekt: <a href="{url module=project action=item id=$_item.project.id link_title=$_item.project.name catalog='projekty-domow'}">{$_item.project.name}</a></p>
				{/if}
				
				<p>
					{$_item.content|nl2br}
					{if !$_item.parent_id}
						<a class="edit-post" href="{url module=discuss action=edit_thread cid=$_item.cat_id id=$_item.id}">edytuj post</a>
					{else}
						<a class="edit-post" href="{url module=discuss action=edit_post cid=$_item.cat_id id=$_item.id}">edytuj post</a>
					{/if}
				</p>

				{if $_item.attachments.DiscussImage}
					<div class="attList">
					{foreach from=$_item.attachments.DiscussImage item=_attachment}
						<a data-fancybox="forum_image" {if $_attachment.title} data-caption="{$_attachment.title}"{/if} href="{$uploadsUrl}/{$_attachment.path}/{$_attachment.filename}"><img src="{$uploadsUrl}/{$_attachment.childAttachments.thumb[0].path}/{$_attachment.childAttachments.thumb[0].filename}" alt="Załącznik do wpisu"></a>
					{/foreach}
					</div>
				{/if}
			</li>
		{/foreach}
		</ul>
	{else}
		<p class="shout">Nie masz jeszcze żadnych wpisów na forum. Napisz coś!</p>
	{/if}
</div>