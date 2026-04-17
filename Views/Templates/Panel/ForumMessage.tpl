{include file="Panel/_menu.tpl"}
<div class="content">
	<ul class="choice">
		<li><a href="{url module=panel action=forum}">Twoje wpisy na forum</a></li>
		<li class="last selected"><a href="{url module=panel action=forum_message}">Skrzynka wiadomości</a></li>
	</ul>
	
	<ul class="forum-header thread">
		<li>
			<p>Autor</p>
		</li>
		<li>
			<p>Wiadomość</p>
		</li>
	</ul>

	{if $list}
		{foreach $list as $_thread}
		<div class="message-thread">
			{foreach $_thread as $_message}
			
			{if $senders[$_message.sender_id].nick}
				{$nick = $senders[$_message.sender_id].nick}
			{else}
				{$nick = $senders[$_message.sender_id].name}
			{/if}
			
			<ul{if $_message@iteration > 1} class="reply"{/if}>
				<li>
					{if $_message.sender_id|avatar}
						<p class="avatar"><img src="{$_message.sender_id|avatar}" alt="{$nick}">{$nick}</p>
					{else}
						<p{if in_array($_message.sender_id, $adminIds)} class="sa"{else} data-initial="{$nick|truncate:1:""}"{/if}>
							{$nick}
						</p>
					{/if}
					<span>{$_message.create_date|date_format:"%d-%m-%Y"}</span>
					{if $user.id != $_message.sender_id}
						{if $_message.parent_id}
							{$pid = $_message.parent_id}
						{else}
							{$pid = $_message.id}
						{/if}
						<div>
							<span class="reply-post" data-title="{$_message.topic}" data-parent="{$pid}" data-rid="{$_message.sender_id}">odpowiedz</span>
						</div>
					{/if}
				</li>
				<li>
				
					{if $user.id == $_message.sender_id && $_message@total == 1}
						{if $senders[$_message.receiver_id].nick}
							{$receiver = $senders[$_message.receiver_id].nick}
						{else}
							{$receiver = $senders[$_message.receiver_id].name}
						{/if}
					{/if}
				
					<p><strong>{$_message.topic}</strong>{if $user.id == $_message.sender_id && $_message@total == 1} <span>(wiadomość wysłana do {$receiver})</span>{/if}</p>
					<p>{$_message.content|nl2br}</p>
				</li>
			</ul>
			{/foreach}
		</div>
		{/foreach}
	{else}
		<p class="shout">Nie masz jeszcze żadnych wiadomości na forum.</p>
	{/if}
</div>

<div class="blue-overlay message" id="message-overlay">
	<div class="over-box">
		<div>
			<form method="post" action="{url module=discuss action=send_message}" id="message-form">
				<input name="module" type="hidden" value="discuss">
				<input name="action" type="hidden" value="send_message">
				<input name="parentId" id="message-parent" type="hidden" value="">
				<input name="senderId" id="message-sender" type="hidden" value="{$user.id}">
				<input name="receiverId" id="message-receiver" type="hidden" value="">

				<p>
					<label for="message-title" class="black">Temat</label>
					<input type="text" name="title" id="message-title" class="long">
				</p>
				<p>
					<label for="message-content" class="black">Treść wiadomości</label>
					<textarea id="message-content" name="content" cols="1" rows="1"></textarea>
				</p>
				
				<p class="send-box"><input id="message-trigger" type="submit" value="wyślij" class="baton"></p>
				<p class="nocaps info-box" id="message-res-box" style="display: none;">Wypełnij poprawnie formularz</p>
			</form>
		</div>
	</div>
	<button type="button" id="message-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>