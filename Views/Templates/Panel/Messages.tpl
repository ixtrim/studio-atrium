{include file="Panel/_menu.tpl"}
<div class="content" id="Content">
	<h3>Napisz do nas</h3>
	
	<div class="panel-form-wrapper">
		<form action="{url module=panel action=message_store}" method="post" class="validable default long">
			<input name="module" value="panel" type="hidden">
			<input name="action" value="message_store" type="hidden">
			{if $request.pid}
				<input name="pid" value="{$request.pid}" type="hidden">
			{/if}
			<input type="hidden" id="ownerUid" name="ownerUid" value="{$tmpStamp}">
			<input type="hidden" id="isTmpUid" name="isTmpUid" value="1">
			<p>
				<input type="text" name="a_topic" id="a_topic" placeholder="Wpisz temat"{if $project} value="Zapytanie o projekt {if $project.name}{$project.name}{else}{$project.symbol_alpha} {$project.symbol_num}{/if}"{/if}>
			</p>
			<p>
				<textarea name="a_message" id="a_message" placeholder="Treść wiadomości..."></textarea>
			</p>
			<p class="last">
				{*<a href="javascript:" id="addMessageFile" class="uploadTrigger" data-profile="UserMessageFile" data-progressContainer="UserMessageFileProgress">dodaj załącznik</a>*}
				{if $uploadedTmp}
					<p class="last strong">Załączniki:</p>
				{/if}
				<div id="thumbnailFile">
					<img src="/img/progress.gif" alt="" id="thumbnailFileProgress" style="display: none;">
					{if $uploadedTmp}
						{foreach from=$uploadedTmp.UserMessageFile item=_file name=files}
							<a href="{$tmp_uploadsUrl}/{$_file.path}/{$_file.filename}" class="external">{$_file.props.original_filename}</a><a href="javascript:" class="remove" onClick="Uploader.removeSingleFile({$_file.id})"><img src="/img/x.png" class="remove"></a>
						{/foreach}
					{/if}
				</div>
			</p>
			<p class="last"><input type="submit" value="wyślij" class="baton"></p>
		</form>
	</div>
	
	{if $messages}
		<h3 class="line">Historia korespondencji</h3>
		
		<ul class="messages">
		{foreach from=$messages item=_message}
			<li>
				<span>{if $user.id|avatar}<img src="{$user.id|avatar}" alt="avatar">{else}{$user.name|mb_substr:0:1}{/if}</span>
				<div>
					<p class="title">{$_message.parent.title}<span>{$_message.parent.create_date|date_format:"%d-%m-%Y (%T)"}</span>{if $_message.parent.status == 'new'} <i>oczekuje na odpowiedź</i>{elseif $_message.parent.status == 'deleted'} <i>przeczytana</i>{/if}{if $_message.parent.project_id} <a href="{url module=project action=item id=$_message.parent.project_id link_title=$_message.parent.project.name catalog=$_message.parent.project.type|projectCatalog}">zobacz projekt {$_message.parent.project.name}</a>{/if}</p>
					<p>{$_message.parent.message|nl2br}</p>
					{if $_message.parent.attachments.UserMessageFile}
						<p class="attachments"><strong>Załączniki: </strong>
							{foreach from=$_message.parent.attachments.UserMessageFile item=_attachment name=attachment1}{if !$smarty.foreach.attachment1.first}, {/if}<a class="external" href="{$uploadsUrl}/{$_attachment.path}/{$_attachment.filename}">{$_attachment.props.original_filename}</a>{/foreach}
						</p>
					{/if}
				</div>
			</li>
			{if $_message.child && $_message.parent.status != 'deleted'}
				<li class="child">
					<span></span>
					<div>
						<p class="title"><span>{$_message.child.create_date|date_format:"%d-%m-%Y (%T)"}</span></p>
						<div>{$_message.child.message}</div>
						{if $_message.child.attachments.UserMessageFile}
							<p class="attachments"><strong>Załączniki: </strong>
								{foreach from=$_message.child.attachments.UserMessageFile item=_attachment name=attachment2}{if !$smarty.foreach.attachment2.first}, {/if}<a class="external" href="{$uploadsUrl}/{$_attachment.path}/{$_attachment.filename}">{if $_attachment.title}{$_attachment.title}{else}{$_attachment.props.original_filename}{/if}</a>{/foreach}
							</p>
						{/if}
					</div>
				</li>
			{/if}
		{/foreach}
		</ul>
	{/if}	
</div>