{if $commentList}
	{foreach $commentList as $_comment}
		{if !$_comment.children}{assign var=class value=" noChildren"}{else}{assign var=class value=''}{/if}
			<li{if $_comment.author_id|avatar} class="avatar"{else}{if in_array($_comment.author_id, $adminIds)} class="sa"{else} data-initial="{$_comment.nick|truncate:1:""}" {/if}{/if}>
			<div>
			<div class="author">
				{if $_comment.author_id|avatar}<img src="{$_comment.author_id|avatar}" alt="{$_comment.nick}">{/if}
				<strong>{$_comment.nick}</strong>
				{if $_comment.author_id}
					{if !in_array($_comment.author_id, $adminIds)}
						{if $commentAuthors[$_comment.author_id]}
							<p>Posty: {$commentAuthors[$_comment.author_id].props.forum.count|default:0}</p>
							<p>Pierwszy post: {$commentAuthors[$_comment.author_id].props.forum.date|default:"-"}</p>
						{else}
							<p>Konto usunięte</p>
						{/if}	
					{/if}
					{if $user && $user.id != $_comment.author_id && $commentAuthors[$_comment.author_id]}
						{if in_array($_comment.author_id, $adminIds)}
							<p class="padd"><a href="{url module=panel action=message}"><span class="postme2">napisz wiadomość</span></a></p>
						{else}
							<p class="padd"><span class="postme" data-aid="{$_comment.author_id}">napisz wiadomość</span></p>
						{/if}	
					{/if}	
				{else}
					<p>niezarejestrowany</p>
				{/if}
			</div>
			<div class="comment">
				<a href="{url module=discuss action=thread id=$_comment.id}" class="title">{$_comment.topic}</a>
				{$_comment.content|unescape|nl2br}
				<p class="date">utworzony: {$_comment.create_date|date_format:"%d-%m-%Y (%H:%M:%S)"} <span>w kategorii: {$discuss_categories[$_comment.cat_id].title}</span></p>
				{if $_comment.attachments.DiscussImage}
					<p class="attachments">
						{foreach from=$_comment.attachments.DiscussImage item=_attachment}<a data-fancybox="forum_image" {if $_attachment.title} data-fancybox-title="{$_attachment.title}"{/if} href="{$uploadsUrl}/{$_attachment.path}/{$_attachment.filename}"><img src="{$uploadsUrl}/{$_attachment.childAttachments.thumb[0].path}/{$_attachment.childAttachments.thumb[0].filename}" alt="{if $_attachment.title}{$_attachment.title}{else}Grafika do wpisu{/if}"></a>{/foreach}
					</p>
				{/if}
			</div>
			
			<div class="reply-box">
				<span class="framed reply-trigger" data-parent="{$_comment.id}" data-parent-type="{$_comment.cat_id}">Odpowiedz</span>
			</div>
			</div>
			
			{if $_comment.children}
				<ul>
				{foreach $_comment.children as $_sub}
					<li{if $_sub.author_id|avatar}
							class="avatar{if $_sub@iteration > 3} covered{/if}"
						{else}
							{if in_array($_sub.author_id, $adminIds)} 
								class="sa{if $_sub@iteration > 3} covered{/if}"
							{else} 
								data-initial="{$_sub.nick|truncate:1:""}"{if $_sub@iteration > 3} class="covered"{/if}
							{/if}
					{/if}>
						<div class="author">
							{if $_sub.author_id|avatar}<img src="{$_sub.author_id|avatar}" alt="{$_sub.nick}">{/if}
							<strong>{$_sub.nick}</strong>
							{if $_sub.author_id}
								{if !in_array($_sub.author_id, $adminIds)}
									{if $commentAuthors[$_sub.author_id]}
										<p>Posty: {$commentAuthors[$_sub.author_id].props.forum.count|default:0}</p>
										<p>Pierwszy post: {$commentAuthors[$_sub.author_id].props.forum.date|default:"-"}</p>
									{else}
										<p>Konto usunięte</p>
									{/if}	
								{/if}
								{if $user && $user.id != $_sub.author_id}
									{if in_array($_sub.author_id, $adminIds)}
										<p class="padd"><a href="{url module=panel action=message}"><span class="postme2">napisz wiadomość</span></a></p>
									{else}
										<p class="padd"><span class="postme" data-aid="{$_sub.author_id}">napisz wiadomość</span></p>
									{/if}	
								{/if}	
							{else}
								<p>niezarejestrowany</p>
							{/if}
						</div>
						<div class="comment">
							{$_sub.content|unescape|nl2br}
							<p class="date">utworzony: {$_sub.create_date|date_format:"%d-%m-%Y (%H:%M:%S)"}</p>
							{if $_sub.attachments.DiscussImage}
								<p class="attachments">
									{foreach from=$_sub.attachments.DiscussImage item=_attachment}<a data-fancybox="forum_image" {if $_attachment.title} data-fancybox-title="{$_attachment.title}"{/if} href="{$uploadsUrl}/{$_attachment.path}/{$_attachment.filename}"><img src="{$uploadsUrl}/{$_attachment.childAttachments.thumb[0].path}/{$_attachment.childAttachments.thumb[0].filename}" alt="{if $_attachment.title}{$_attachment.title}{else}Grafika do wpisu{/if}"></a>{/foreach}
								</p>
							{/if}
						</div>
					</li>
				{/foreach}
				</ul>
				{if $_sub@total > 3}<div class="more-box"><span class="show-more">pokaż więcej odpowiedzi</span></div>{/if}
			{/if}
		</li>
	{/foreach}
{else}
	<li class="empty">
		W tej kategorii jeszcze nie ma wpisów, <a href="javascript:" class="blue" onClick="Project.setForm({$request.cid});">dodaj nowy temat</a>.
	</li>
{/if}