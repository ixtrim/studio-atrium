<div class="wrapper">
	<div class="box spaced">
		<h1><a href="{url module=discuss action=forum}">Forum</a></h1>
		<ul>
			<li><a href="{url module=discuss action=category id=$post.cat_id}">{$categories[$post.cat_id].title}</a></li>
			<li><strong>{$post.topic}</strong></li>
		</ul>

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
										<option value="0">w kategorii</option>
										{foreach $categories as $_key => $_item}
										<option value="{$_key}">{$_item.title}</option>
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
		
		<ul class="forum-header thread" id="reply">
			<li>
				<p>Autor</p>
			</li>
			<li>
				<p>Dyskusja: <strong>{$post.topic}</strong></p>
				{if $user}
					<div class="notify-box">
						<form action="{url module=discuss action=set_notification}" method="post" id="notification-form">
							<fieldset>
								<input type="hidden" id="notify-pid" name="pid" value="{$post.id}">
								<input type="hidden" id="notify-uid" name="uid" value="{$user.id}">
							
									<input type="checkbox" name="notifyMe" id="notifyMe" autocomplete="off"{if $postNotifcation} checked{/if}><label for="notifyMe">powiadamiaj mnie o nowych wpisach</label>
									<span><img id="notify-waiter" style="display: none;" src="/img/waiter-blue.gif" alt=""></span>
							</fieldset>
						</form>
					</div>
				{/if}
			</li>
		</ul>

		<div class="forum-thread" id="forum-thread">
			<ul class="parent">
				<li>
					<div class="base">
						{if $post.author_id|avatar}
							<p class="avatar"><img src="{$post.author_id|avatar}" alt="{$post.nick}">{$post.nick}</p>
						{else}
							<p{if in_array($post.author_id, $adminIds)} class="sa"{else} data-initial="{$post.nick|truncate:1:""}"{/if}>{$post.nick}</p>
						{/if}	
						{if $post.author_id}
							{if !in_array($post.author_id, $adminIds)}
							<ul>
								<li>Posty: {$post.user.props.forum.count|default:0}</li>
								<li>Pierwszy post: {$post.user.props.forum.date|default:"-"}</li>
							</ul>
							{/if}
							{if $user && $user.id != $post.author_id}
								{if in_array($post.author_id, $adminIds)}
									<a href="{url module=panel action=message}"><span class="postme2">napisz wiadomość</span></a>
								{else}
									<span class="postme" data-aid="{$post.author_id}">napisz wiadomość</span>
								{/if}	
							{/if}
						{else}
							<span>niezarejestrowany</span>
						{/if}
					</div>
				</li>
				<li>
					<p id="thread-post"{if $post.author_id|avatar} class="avatar"{/if}>
						{$post.content|nl2br|hideEmails}{if $post.author_id == $user.id}<p><a href="{url module=discuss action=edit_thread cid=$post.cat_id id=$request.id}">edytuj post</a></p>{/if}
					</p>
					
					{if $page > 1}<p id="expand-post" class="expand">rozwiń wpis</p>{/if}
					
					{if $post.attachments}
						<div class="attList">
						{foreach from=$post.attachments.DiscussImage item=_attachment}
							<a data-fancybox="forum_image" {if $_attachment.title} data-caption="{$_attachment.title}"{/if} href="{$uploadsUrl}/{$_attachment.path}/{$_attachment.filename}"><img src="{$uploadsUrl}/{$_attachment.childAttachments.thumb[0].path}/{$_attachment.childAttachments.thumb[0].filename}" alt="Załącznik do wpisu"></a>
						{/foreach}
						</div>
					{/if}
					
					<div>
						<span>utworzony: {$post.create_date|date_format:"%d-%m-%Y (%T)"}</span>
						{if $project}
							{*
							<span class="project"><a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}">{$project.name}</a></span>
							*}
							<span class="project overview" data-id="{$project_id}" data-img="{image type=render project=$project size=presentation}" data-ground="{image type=sketch project=$project}"{if $project.params_general|hasFloor:true} data-floor="{image type=sketch project=$project storey=1st_floor}"{/if}{if $project.params_general|hasLoft:true} data-loft="{image type=sketch project=$project storey=loft}"{/if} data-link="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}" data-price="{if $project.price}{if $project.discount}<strike>{$project.price}</strike> {$project.price-$project.discount}{else}{$project.price}{/if}{else}-{/if}" data-name="{$project.name}" data-area="{$project.params_general|usableArea}" data-parcel="{$project.params_general|parcelWidth} x {$project.params_general|parcelHeight}" data-height="{$project.params_general|houseHeight}" data-angle="{$project.params_general|roofAngle}" data-version="{if $project.type == 'skeleton'}wersja szkieletowa{else}wersja murowana{/if}" data-rooms="{$project.params_general|roomCount}" data-txt="{$project.short_description}">{$project.name}</span>
						{/if}
					</div>
					
					<span id="reply-trigger">Odpowiedz</span>
				</li>
			</ul>
		</div>
		
		<div id="post-form-wrapper" style="display: none;">
			<form class="validable" action="{url module=discuss action=add_post}" method="post" id="post-form" data-validate="Thread.validate">
				<fieldset>
					<input type="hidden" name="module" value="discuss">
					<input type="hidden" name="action" value="add_post">
					<input type="hidden" name="categoryId" value="{$post.cat_id}">
					<input type="hidden" name="parentId" value="{$request.id}">
					<input type="hidden" id="ownerUid" name="ownerUid" value="{$tmpStamp}">
					<input type="hidden" id="isTmpUid" name="isTmpUid" value="1">
					{if $project}
					<input type="hidden" name="projectId" value="{$project.id}">
					{/if}
					
					<div class="small-space">
						<textarea id="content" name="content" cols="1" rows="1" placeholder="wpisz treść*"></textarea>
					</div>
					{*<p class="addFileTrigger"><span class="attach{if !$user} login-trigger{else} uploadTrigger{/if}" id="attachment" data-profile="DiscussImage" data-progressContainer="DiscussImageFileProgress">dodaj grafikę</span></p>*}
					<div id="Content" style="position: relative;">
						<ul class="inputs-holder">
							{if !$user}<li class="middle"><span><a href="javascript:" class="login-trigger" id="post-login-trigger">Zaloguj się</a> lub wypełnij poniższe dane</span></li>{/if}
							<li class="mystic"><label for="age">Wiek</label><input type="text" name="age" id="comment-age" value=""></li>
							<li class="spaced short"><label for="nick">Nazwa / Nick*</label><input type="text" name="nick" id="nick" value="{if $user.nick}{$user.nick}{else}{$user.name}{/if}"{if $user} readonly{/if}></li>
							<li class="rite noPadd short"><input type="checkbox" name="notify" id="notify"{if $user} class="notShow"{/if}><label class="nocaps" for="notify">chcę otrzymywać powiadomienia o nowych wpisach</label></li>
							<li class="short" id="post-mail-box" style="display: none;"><label for="post-email">E-mail</label><input type="text" name="email" id="post-email" value="{$user.email}"{if $user} readonly{/if}></li>
							<li class="middle">
							{if $uploadedTmp}
								<p class="last">wgrane grafiki:</p>
							{/if}
							<div id="thumbnailFile">
								<img src="/img/progress.gif" alt="" id="thumbnailFileProgress" style="display: none;">
								{if $uploadedTmp}
									{foreach from=$uploadedTmp.DiscussImage item=_file name=files}
										<a href="{$tmp_uploadsUrl}/{$_file.path}/{$_file.filename}" target="_blank" style="margin-left: 15px;">{$_file.props.original_filename}</a><a href="javascript:" class="remove" onClick="Uploader.removeSingleFile({$_file.id});"><img src="/img/x.png" class="remove"></a>
									{/foreach}
								{/if}
							</div>
							</li>
							<li class="rite middle short"><input type="checkbox" name="regulations" id="regulations"><label class="nocaps" for="regulations">akceptuję </label><span class="ajax-info" data-url="/?module=ajax&action=get_comment_regulations">regulamin korzystania</span></li>
							<li class="submit"><button class="baton" id="publish-trigger">Publikuj</button> <span><img id="post-waiter" style="display: none;" src="/img/waiter-blue.gif" alt=""></span></li>
						</ul>
					</div>
				</fieldset>
			</form>
		</div>
		
		{foreach $thread as $_item}
		<div class="forum-thread post">
			<ul>
				<li>
					<div>
						{if $_item.author_id|avatar}
							<p class="avatar"><img src="{$_item.author_id|avatar}" alt="{$_item.nick}">{$_item.nick}</p>
						{else}
							<p{if in_array($_item.author_id, $adminIds)} class="sa"{else} data-initial="{$_item.nick|truncate:1:""}"{/if}>{$_item.nick}</p>
						{/if}
						{if $_item.author_id}
							{if !in_array($_item.author_id, $adminIds)}
							<ul>
								<li>Posty: {$_item.user.props.forum.count|default:0}</li>
								<li>Pierwszy post: {$_item.user.props.forum.date|default:"-"}</li>
							</ul>
							{/if}
							{if $user && $user.id != $_item.author_id}
								{if in_array($_item.author_id, $adminIds)}
									<a href="{url module=panel action=message}"><span class="postme2">napisz wiadomość</span></a>
								{else}
									<span class="postme" data-aid="{$_item.author_id}">napisz wiadomość</span>
								{/if}	
							{/if}
						{else}
							<span>niezarejestrowany</span>
						{/if}
					</div>
				</li>
				
				<li>
					<p>{$_item.content|nl2br|hideEmails}{if $_item.author_id == $user.id}<p><a href="{url module=discuss action=edit_post cid=$post.cat_id id=$_item.id}">edytuj post</a></p>{/if}</p>
					
					{if $_item.attachments}
						<div class="attList">
						{foreach from=$_item.attachments.DiscussImage item=_attachment}
							<a data-fancybox="forum_image" {if $_attachment.title} data-caption="{$_attachment.title}"{/if} href="{$uploadsUrl}/{$_attachment.path}/{$_attachment.filename}"><img src="{$uploadsUrl}/{$_attachment.childAttachments.thumb[0].path}/{$_attachment.childAttachments.thumb[0].filename}" alt="Załącznik do wpisu"></a>
						{/foreach}
						</div>
					{/if}
					
					<div>
						<span>utworzony: {$_item.create_date|date_format:"%d-%m-%Y (%T)"}</span>
					</div>
					
					{if $_item@last}
					<span id="reply-bis-trigger">Odpowiedz</span>
					{/if}
				</li>
			</ul>
		</div>
		{/foreach}
		
		{if $pages > 1}
		<div class="pager-box">
			{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url}
		</div>
		{/if}
	</div>
</div>

{if $user}
<div class="blue-overlay message" id="message-overlay">
	<div class="over-box">
		<div>
			<form method="post" action="{url module=discuss action=send_message}" id="message-form">
				<input name="module" type="hidden" value="discuss">
				<input name="action" type="hidden" value="send_message">
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
{/if}

{if $project}
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
{/if}