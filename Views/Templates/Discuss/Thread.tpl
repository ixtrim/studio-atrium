{* Forum thread — 2026 *}
<div id="forum-2026" class="bg-white">

	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
		<div class="forum-shell">
			<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
				<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li><a href="{url module=discuss action=forum}" class="hover:text-[#222] transition-colors">Forum</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li><a href="{url module=discuss action=category id=$post.cat_id}" class="hover:text-[#222] transition-colors">{$categories[$post.cat_id].title|escape}</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li aria-current="page" class="text-[#6b6b6b]">{$post.topic|escape}</li>
			</ol>
		</div>
	</nav>

	<section class="w-full bg-[#f5f6f7] border-b border-black/5">
		<div class="forum-shell py-10 md:py-12">
			<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">{$categories[$post.cat_id].title|escape}</span>
			<h1 class="mt-3 text-[28px] md:text-[36px] font-400 text-[var(--brand-darker)] tracking-tight uppercase leading-tight">{$post.topic|escape}</h1>
			<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
		</div>
	</section>

	<section class="w-full bg-white py-10 md:py-14">
		<div class="forum-shell space-y-6">
			{include file="Include/ForumSearch.tpl"}

			{if $pages > 1}
			<div class="pager-box">
				{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url}
			</div>
			{/if}

			<ul class="forum-header thread" id="reply">
				<li><p>Autor</p></li>
				<li>
					<p>Dyskusja: <strong class="normal-case tracking-normal text-[#222]">{$post.topic|escape}</strong></p>
					{if $user}
					<div class="notify-box">
						<form action="{url module=discuss action=set_notification}" method="post" id="notification-form">
							<fieldset class="border-0 m-0 p-0">
								<input type="hidden" id="notify-pid" name="pid" value="{$post.id}">
								<input type="hidden" id="notify-uid" name="uid" value="{$user.id}">
								<input type="checkbox" name="notifyMe" id="notifyMe" autocomplete="off"{if $postNotifcation} checked{/if}><label for="notifyMe">Powiadamiaj mnie o nowych wpisach</label>
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
								<p class="avatar"><img src="{$post.author_id|avatar}" alt="{$post.nick|escape}">{$post.nick|escape}</p>
							{else}
								<p{if in_array($post.author_id, $adminIds)} class="sa"{else} data-initial="{$post.nick|truncate:1:""|escape}"{/if}>{$post.nick|escape}</p>
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
										<a href="{url module=panel action=message}"><span class="postme2">Napisz wiadomość</span></a>
									{else}
										<span class="postme" data-aid="{$post.author_id}">Napisz wiadomość</span>
									{/if}
								{/if}
							{else}
								<span class="text-[12px] text-[#888]">Niezarejestrowany</span>
							{/if}
						</div>
					</li>
					<li>
						<p id="thread-post" class="text-[15px] leading-relaxed text-[#333] m-0{if $post.author_id|avatar} avatar{/if}">
							{$post.content|nl2br|hideEmails}
						</p>
						{if $post.author_id == $user.id}<p class="mt-3"><a href="{url module=discuss action=edit_thread cid=$post.cat_id id=$request.id}" class="text-[var(--brand-red)] font-bold text-[13px]">Edytuj post</a></p>{/if}

						{if $page > 1}<p id="expand-post" class="expand text-[var(--brand-red)] font-bold cursor-pointer text-[13px] mt-3">Rozwiń wpis</p>{/if}

						{if $post.attachments}
							<div class="attList">
							{foreach from=$post.attachments.DiscussImage item=_attachment}
								<a data-fancybox="forum_image" {if $_attachment.title} data-caption="{$_attachment.title|escape}"{/if} href="{$uploadsUrl}/{$_attachment.path}/{$_attachment.filename}"><img src="{$uploadsUrl}/{$_attachment.childAttachments.thumb[0].path}/{$_attachment.childAttachments.thumb[0].filename}" alt="Załącznik do wpisu"></a>
							{/foreach}
							</div>
						{/if}

						<div class="forum-meta">
							<span>Utworzony: {$post.create_date|date_format:"%d-%m-%Y (%T)"}</span>
							{if $project}
								<span class="project overview" data-id="{$project_id}" data-img="{image type=render project=$project size=presentation}" data-ground="{image type=sketch project=$project}"{if $project.params_general|hasFloor:true} data-floor="{image type=sketch project=$project storey=1st_floor}"{/if}{if $project.params_general|hasLoft:true} data-loft="{image type=sketch project=$project storey=loft}"{/if} data-link="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}" data-price="{if $project.price}{if $project.discount}<strike>{$project.price}</strike> {$project.price-$project.discount}{else}{$project.price}{/if}{else}-{/if}" data-name="{$project.name|escape}" data-area="{$project.params_general|usableArea}" data-parcel="{$project.params_general|parcelWidth} x {$project.params_general|parcelHeight}" data-height="{$project.params_general|houseHeight}" data-angle="{$project.params_general|roofAngle}" data-version="{if $project.type == 'skeleton'}wersja szkieletowa{else}wersja murowana{/if}" data-rooms="{$project.params_general|roomCount}" data-txt="{$project.short_description|escape}">{$project.name|escape}</span>
							{/if}
						</div>

						<span id="reply-trigger">Odpowiedz</span>
					</li>
				</ul>
			</div>

			<div id="post-form-wrapper" style="display: none;">
				<form class="validable" action="{url module=discuss action=add_post}" method="post" id="post-form" data-validate="Thread.validate">
					<fieldset class="border-0 m-0 p-0">
						<input type="hidden" name="module" value="discuss">
						<input type="hidden" name="action" value="add_post">
						<input type="hidden" name="categoryId" value="{$post.cat_id}">
						<input type="hidden" name="parentId" value="{$request.id}">
						<input type="hidden" id="ownerUid" name="ownerUid" value="{$tmpStamp}">
						<input type="hidden" id="isTmpUid" name="isTmpUid" value="1">
						{if $project}
						<input type="hidden" name="projectId" value="{$project.id}">
						{/if}

						<div class="small-space mb-3">
							<textarea id="content" name="content" cols="1" rows="1" placeholder="Wpisz treść*"></textarea>
						</div>
						<div id="Content" style="position: relative;">
							<ul class="inputs-holder">
								{if !$user}<li class="middle"><span><a href="javascript:" class="login-trigger text-[var(--brand-red)] font-bold underline" id="post-login-trigger">Zaloguj się</a> lub wypełnij poniższe dane</span></li>{/if}
								<li class="mystic"><label for="age">Wiek</label><input type="text" name="age" id="comment-age" value=""></li>
								<li class="spaced short"><label for="nick">Nazwa / Nick*</label><input type="text" name="nick" id="nick" value="{if $user.nick}{$user.nick|escape}{else}{$user.name|escape}{/if}"{if $user} readonly{/if}></li>
								<li class="rite noPadd short"><input type="checkbox" name="notify" id="notify"{if $user} class="notShow"{/if}><label class="nocaps" for="notify">Chcę otrzymywać powiadomienia o nowych wpisach</label></li>
								<li class="short" id="post-mail-box" style="display: none;"><label for="post-email">E-mail</label><input type="text" name="email" id="post-email" value="{$user.email|escape}"{if $user} readonly{/if}></li>
								<li class="middle">
									{if $uploadedTmp}<p class="last">Wgrane grafiki:</p>{/if}
									<div id="thumbnailFile">
										<img src="/img/progress.gif" alt="" id="thumbnailFileProgress" style="display: none;">
										{if $uploadedTmp}
											{foreach from=$uploadedTmp.DiscussImage item=_file name=files}
												<a href="{$tmp_uploadsUrl}/{$_file.path}/{$_file.filename}" target="_blank" style="margin-left: 15px;">{$_file.props.original_filename|escape}</a><a href="javascript:" class="remove" onClick="Uploader.removeSingleFile({$_file.id});"><img src="/img/x.png" class="remove"></a>
											{/foreach}
										{/if}
									</div>
								</li>
								<li class="rite middle short"><input type="checkbox" name="regulations" id="regulations"><label class="nocaps" for="regulations">Akceptuję </label><span class="ajax-info" data-url="/?module=ajax&action=get_comment_regulations">regulamin korzystania</span></li>
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
								<p class="avatar"><img src="{$_item.author_id|avatar}" alt="{$_item.nick|escape}">{$_item.nick|escape}</p>
							{else}
								<p{if in_array($_item.author_id, $adminIds)} class="sa"{else} data-initial="{$_item.nick|truncate:1:""|escape}"{/if}>{$_item.nick|escape}</p>
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
										<a href="{url module=panel action=message}"><span class="postme2">Napisz wiadomość</span></a>
									{else}
										<span class="postme" data-aid="{$_item.author_id}">Napisz wiadomość</span>
									{/if}
								{/if}
							{else}
								<span class="text-[12px] text-[#888]">Niezarejestrowany</span>
							{/if}
						</div>
					</li>
					<li>
						<p class="text-[15px] leading-relaxed text-[#333] m-0">{$_item.content|nl2br|hideEmails}</p>
						{if $_item.author_id == $user.id}<p class="mt-3"><a href="{url module=discuss action=edit_post cid=$post.cat_id id=$_item.id}" class="text-[var(--brand-red)] font-bold text-[13px]">Edytuj post</a></p>{/if}

						{if $_item.attachments}
							<div class="attList">
							{foreach from=$_item.attachments.DiscussImage item=_attachment}
								<a data-fancybox="forum_image" {if $_attachment.title} data-caption="{$_attachment.title|escape}"{/if} href="{$uploadsUrl}/{$_attachment.path}/{$_attachment.filename}"><img src="{$uploadsUrl}/{$_attachment.childAttachments.thumb[0].path}/{$_attachment.childAttachments.thumb[0].filename}" alt="Załącznik do wpisu"></a>
							{/foreach}
							</div>
						{/if}

						<div class="forum-meta">
							<span>Utworzony: {$_item.create_date|date_format:"%d-%m-%Y (%T)"}</span>
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
	</section>
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
				<p class="send-box"><input id="message-trigger" type="submit" value="Wyślij" class="baton"></p>
				<p class="nocaps info-box" id="message-res-box" style="display: none;">Wypełnij poprawnie formularz</p>
			</form>
		</div>
	</div>
	<button type="button" id="message-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>
{/if}

{if $project}
{include file="Include/ForumProjectOverlay.tpl"}
{/if}
