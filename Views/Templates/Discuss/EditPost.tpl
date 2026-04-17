<div class="wrapper">
	<div class="box spaced{if !$user || $user.id != $post.author_id} long{/if}">
		
		<h1><a href="{url module=discuss action=forum}">Forum</a></h1>
		<ul>
			<li>Edycja wpisu na forum w wątku: <a href="{url module=discuss action=thread id=$post.parent_id}"><strong>{$post.parent.topic}</strong></a></li>
		</ul>
		
		{if $user && $user.id == $post.author_id}
		<div id="post-form-wrapper">
			<form class="validable" action="{url module=discuss action=store_post}" method="post" id="edit-form">
				<fieldset>
					<input type="hidden" name="module" value="discuss">
					<input type="hidden" name="action" value="store_post">
					<input type="hidden" name="postId" value="{$post.id}">
					<input type="hidden" id="ownerUid" name="ownerUid" value="{$post._uid}">
					<input type="hidden" id="isTmpUid" name="isTmpUid" value="0">
					
					<div class="small-space">
						<textarea id="content" name="content" cols="1" rows="1" placeholder="wpisz treść*">{$post.content}</textarea>
					</div>
					
					{*<p class="addFileTrigger"><span class="attach{if !$user} login-trigger{else} uploadTrigger{/if}" id="attachment" data-profile="DiscussImage" data-progressContainer="DiscussImageFileProgress">dodaj grafikę</span></p>*}
					
					<div id="Content" style="position: relative;">
						<ul class="inputs-holder">
							<li class="center"><input type="checkbox" name="notify" id="notify"{if $notification} checked{/if}><label class="nocaps" for="notify">Chcę otrzymywać powiadomienia o nowych wpisach w temacie</label></li>

							<li class="middle">
							{if $uploadedTmp || $post.attachments}
								<p class="last strong">wgrane grafiki:</p>
							{/if}
							
							{if $post.attachments}
								<div class="attachmentList">
									{foreach from=$post.attachments.DiscussImage item=_attachment}
										<div>
											<a data-fancybox="forum_image" {if $_attachment.title} data-caption="{$_attachment.title}"{/if} href="{$uploadsUrl}/{$_attachment.path}/{$_attachment.filename}"><img src="{$uploadsUrl}/{$_attachment.childAttachments.thumb[0].path}/{$_attachment.childAttachments.thumb[0].filename}" alt="Załącznik do wpisu"></a>
											<p><a href="javascript:" onClick="Uploader.removeSingleFile({$_attachment.id});">usuń</a></p>
										</div>
									{/foreach}
								</div>
							{/if}
							<div id="thumbnailFile">
								<img src="/img/progress.gif" alt="" id="thumbnailFileProgress" style="display: none;">
								{if $uploadedTmp}
									{foreach from=$uploadedTmp.DiscussImage item=_file name=files}
										<a href="{$tmp_uploadsUrl}/{$_file.path}/{$_file.filename}" target="_blank">{$_file.props.original_filename}</a><a href="javascript:" class="remove" onClick="Uploader.removeSingleFile({$_file.id});"><img src="/img/x.png" class="remove"></a>
									{/foreach}
								{/if}
							</div>
							</li>
							<li class="submit"><button class="baton" id="publish-trigger">Zachowaj zmiany</button> <span><img id="post-waiter" style="display: none;" src="/img/waiter-blue.gif" alt=""></span></li>
						</ul>
					</div>
				</fieldset>
			</form>
		</div>
		{else}
		<p>Nie możesz edytować tego wpisu na forum.</p>
			{if !$user}
				<p>Musisz zalogować się na swoje konto by móc edytować wpisy.</p>
			{elseif $user.id != $post.author_id}
				<p>Nie jesteś autorem tego wpisu.</p>
			{/if}
		{/if}
	</div>
</div>