{* Forum category — 2026 *}
<div id="forum-2026" class="bg-white">

	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
		<div class="forum-shell">
			<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
				<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li><a href="{url module=discuss action=forum}" class="hover:text-[#222] transition-colors">Forum</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li aria-current="page" class="text-[#6b6b6b]" id="post-category" data-cid="{$request.id}">{$category.title|escape}</li>
			</ol>
		</div>
	</nav>

	<section class="w-full bg-[#f5f6f7] border-b border-black/5">
		<div class="forum-shell py-10 md:py-12">
			<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Forum</span>
			<h1 class="mt-3 text-[32px] md:text-[40px] font-400 text-[var(--brand-darker)] tracking-tight uppercase leading-tight">{$category.title|escape}</h1>
			<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
			{if $category.descr || $category.long}
			<p class="mt-5 max-w-3xl text-[15px] md:text-[16px] leading-relaxed text-[#555]">
				{$category.long|default:$category.descr|escape}
			</p>
			{/if}
		</div>
	</section>

	<section class="w-full bg-white py-10 md:py-14">
		<div class="forum-shell">
			<div class="new-comment-trigger flex justify-end mb-6">
				<span class="framed blue" id="add-thread">Dodaj nowy wpis</span>
			</div>

			<div id="post-form-wrapper"{if !$cache} style="display: none;"{/if}>
				<form class="validable" action="{url module=discuss action=add_thread}" method="post" id="post-form" data-validate="Forum.validate">
					<fieldset class="border-0 m-0 p-0">
						<input type="hidden" name="module" value="discuss">
						<input type="hidden" name="action" value="add_thread">
						<input type="hidden" name="categoryId" value="{$request.id}">
						<input type="hidden" name="projectId" id="post-project-id" value="">
						<input type="hidden" id="ownerUid" name="ownerUid" value="{$tmpStamp}">
						<input type="hidden" id="isTmpUid" name="isTmpUid" value="1">

						<div class="mb-3">
							<input type="text" name="subject" id="subject" placeholder="Wpisz tytuł*" value="">
						</div>
						<div class="small-space mb-3">
							<textarea id="content" name="content" cols="1" rows="1" placeholder="Wpisz treść*"></textarea>
						</div>

						<div class="mb-3">
							<input type="checkbox" name="bindProject" id="bind" autocomplete="off"><label for="bind">Powiąż temat z projektem</label>
						</div>
						<div id="post-project-box" style="display: none;" class="mb-3">
							<input type="text" name="project" id="post-project-name" autocomplete="off" placeholder="Wpisz nazwę projektu">
							<ul id="names-holder" class="names-holder"></ul>
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
												<a href="{$tmp_uploadsUrl}/{$_file.path}/{$_file.filename}" target="_blank" style="margin-left: 15px;"><img src="{$tmp_uploadsUrl}/{$_file.childAttachments.thumb[0].path}/{$_file.childAttachments.thumb[0].filename}"></a><a href="javascript:" class="remove" onClick="Uploader.removeSingleFile({$_file.id});"><img src="/img/x.png" class="remove"></a>
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

			<ul class="forum-menu">
				{foreach $categories as $_key => $_item}
					<li{if $request.id == $_key} class="selected"{/if}><a href="{url module=discuss action=category id=$_key}"><span class="{$_item.class}">{$_item.short|escape}</span></a></li>
				{/foreach}
				<li id="forum-search-trigger"><span class="fcat-search">Szukaj</span></li>
			</ul>

			{include file="Include/ForumSearch.tpl" forum_search_cid=$request.id forum_search_show_comments=1 forum_search_wrapped=1}

			{if $pages > 1}
			<div class="pager-box">
				{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url}
			</div>
			{/if}

			<ul class="forum-header category">
				<li><p>Tematy</p></li>
				<li><p>Ostatni wpis</p></li>
			</ul>

			{foreach $threads as $_item}
			<div class="forum-cats">
				<ul>
					<li>
						<h4><a href="{url module=discuss action=thread id=$_item.id}">{$_item.topic|escape}</a></h4>
						<p class="thread">{$_item.content|strip_tags|truncate:200|hideEmails}</p>
						<div class="forum-meta">
							<span>Utworzył:</span>
							<span class="nick">{$_item.nick|escape}</span>
							<span>{$_item.create_date|date_format:"%d-%m-%Y"}</span>
							{if $_item.project_id && isset($projects[$_item.project_id])}
							{$_project = $projects[$_item.project_id]}
							<span class="project overview" data-id="{$_item.project_id}" data-img="{image type=render project=$_project size=presentation}" data-ground="{image type=sketch project=$_project}"{if $_project.params_general|hasFloor:true} data-floor="{image type=sketch project=$_project storey=1st_floor}"{/if}{if $_project.params_general|hasLoft:true} data-loft="{image type=sketch project=$_project storey=loft}"{/if} data-link="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}" data-price="{if $_project.price}{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}{else}-{/if}" data-name="{$_project.name|escape}" data-area="{$_project.params_general|usableArea}" data-parcel="{$_project.params_general|parcelWidth} x {$_project.params_general|parcelHeight}" data-height="{$_project.params_general|houseHeight}" data-angle="{$_project.params_general|roofAngle}" data-version="{if $_project.type == 'skeleton'}wersja szkieletowa{else}wersja murowana{/if}" data-rooms="{$_project.params_general|roomCount}" data-txt="{$_project.short_description|escape}">{$_project.name|escape}</span>
							{/if}
						</div>
					</li>
					{if $_item.subid}
					<li>
						<ul class="m-0 p-0 list-none grid gap-4 sm:grid-cols-[140px_1fr]">
							<li class="forum-author">
								{if $_item.subauthorid|avatar}
									<p class="avatar"><img src="{$_item.subauthorid|avatar}" alt="{$_item.subnick|escape}">{$_item.subnick|escape}</p>
								{else}
									<p{if in_array($_item.subauthorid, $adminIds)} class="nick sa"{else} class="nick" data-initial="{$_item.subnick|truncate:1:""|escape}"{/if}>{$_item.subnick|escape}</p>
								{/if}
								<p class="text-[13px] text-[#6b7177] m-0">{$_item.subdate|date_format:"%d-%m-%Y"}</p>
								<p class="text-[12px] text-[#999] m-0">{$_item.subdate|date_format:"%H:%M"}</p>
							</li>
							<li>
								<a href="{url module=discuss action=thread id=$_item.id}?ostatni=1" class="block no-underline text-inherit hover:text-[var(--brand-red)]">
									<p class="m-0 text-[14px] leading-relaxed text-[#555]">{$_item.subcontent|strip_tags:false|truncate:160|hideEmails}</p>
								</a>
							</li>
						</ul>
					{else}
					<li class="reply">
						<a href="{url module=discuss action=thread id=$_item.id}#reply">Odpowiedz</a>
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

{include file="Include/ForumProjectOverlay.tpl"}
