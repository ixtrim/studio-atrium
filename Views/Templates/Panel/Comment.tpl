{include file="Panel/_menu.tpl"}
<div class="content">
	<ul class="choice">
		<li><a href="{url module=panel action=forum}">Twoje wpisy na forum</a></li>
		<li class="selected"><a href="{url module=panel action=comment}">Twoje komentarze</a></li>
		<li class="last"><a href="{url module=panel action=forum_message}">Skrzynka wiadomości</a></li>
	</ul>

	{if $notifications.comment}<p class="center"><strong>Ktoś dodał odpowiedź do Twojego komentarza</strong></p>{/if}
	{if $comments}
		<ul class="comments">
		{foreach from=$comments item=_comment}
			<li>
				<a href="{url module=project action=item id=$_comment.project_id link_title=$projects[$_comment.project_id].name catalog='projekty-domow'}#extras-wrapper">
					<img src="{image type=render project=$projects[$_comment.project_id] size=thumb}" alt="{$projects[$_comment.project_id].name}">
					{$projects[$_comment.project_id].name} | {$_comment.publish_date|date_format:"%d-%m-%Y"}
				</a>{if $_comment.status == 'new'} <small>(oczekuje na moderację)</small>{elseif $_comment.status == 'deleted'} <small>(usunięty przez moderatora)</small>{/if}
				<p>{$_comment.content}</p>
				{if $_comment.parent_id > 0 && $parents[$_comment.parent_id]}
					<p><small>Odpowiedź do wpisu: <br>{$parents[$_comment.parent_id].content}</small></p>
				{/if}
				{if $_comment.attachments.CommentImage}
					<p class="attachments">
						{foreach from=$_comment.attachments.CommentImage item=_attachment}<a class="external" href="{$projectPath}/{$_attachment.path}/{$_attachment.filename}"><img src="{$projectPath}/{$_attachment.childAttachments.thumb[0].path}/{$_attachment.childAttachments.thumb[0].filename}" alt="Załącznik komentarza"></a>{/foreach}
					</p>
				{/if}
			</li>
		{/foreach}
		</ul>
	{else}
		<p class="shout">Nie masz jeszcze żadnych komentarzy. Napisz coś!</p>
	{/if}
</div>