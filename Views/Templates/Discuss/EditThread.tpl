{* Edit thread — 2026 *}
<div id="forum-2026" class="bg-white">

	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
		<div class="forum-shell">
			<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
				<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li><a href="{url module=discuss action=forum}" class="hover:text-[#222] transition-colors">Forum</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li aria-current="page" class="text-[#6b6b6b]">Edycja wątku</li>
			</ol>
		</div>
	</nav>

	<section class="w-full bg-[#f5f6f7] border-b border-black/5">
		<div class="forum-shell py-10 md:py-12">
			<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Forum</span>
			<h1 class="mt-3 text-[28px] md:text-[36px] font-400 text-[var(--brand-darker)] tracking-tight uppercase leading-tight">Edycja wątku</h1>
			<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
			<p class="mt-5 text-[15px] text-[#555]">
				<a href="{url module=discuss action=thread id=$post.id}" class="text-[var(--brand-red)] font-bold hover:underline">{$post.topic|escape}</a>
			</p>
		</div>
	</section>

	<section class="w-full bg-white py-10 md:py-14">
		<div class="forum-shell max-w-3xl">
			{if $user && $user.id == $post.author_id}
			<div id="post-form-wrapper">
				<form class="validable" action="{url module=discuss action=store_thread}" method="post" id="post-form" data-validate="Forum.validate">
					<fieldset class="border-0 m-0 p-0">
						<input type="hidden" name="module" value="discuss">
						<input type="hidden" name="action" value="store_thread">
						<input type="hidden" name="postId" value="{$post.id}">
						<input type="hidden" name="projectId" id="post-project-id" value="{$post.project_id}">
						<input type="hidden" id="ownerUid" name="ownerUid" value="{$post._uid}">
						<input type="hidden" id="isTmpUid" name="isTmpUid" value="0">

						<div class="mb-3">
							<input type="text" name="subject" id="subject" value="{$post.topic|escape}" placeholder="Wpisz tytuł*">
						</div>
						<div class="small-space mb-3">
							<textarea id="content" name="content" cols="1" rows="1" placeholder="Wpisz treść*">{$post.content|escape}</textarea>
						</div>

						<div class="mb-3">
							<input type="checkbox" name="bindProject" id="bind" autocomplete="off"{if $post.project_id} checked{/if}><label for="bind">Powiąż temat z projektem</label>
						</div>
						<div id="post-project-box"{if !$post.project_id} style="display: none;"{/if} class="mb-3">
							<input type="text" name="project" id="post-project-name" autocomplete="off" value="{$post.project.name|escape}" placeholder="Wpisz nazwę projektu">
							<ul id="names-holder" class="names-holder"></ul>
						</div>

						<div id="Content" style="position: relative;">
							<ul class="inputs-holder">
								<li class="center"><input type="checkbox" name="notify" id="notify"{if $notification} checked{/if}><label class="nocaps" for="notify">Chcę otrzymywać powiadomienia o nowych wpisach</label></li>
								<li class="middle">
									{if $uploadedTmp || $post.attachments}<p class="last strong">Wgrane grafiki:</p>{/if}
									{if $post.attachments}
										<div class="attachmentList attList">
											{foreach from=$post.attachments.DiscussImage item=_attachment}
												<div>
													<a data-fancybox="forum_image" {if $_attachment.title} data-caption="{$_attachment.title|escape}"{/if} href="{$uploadsUrl}/{$_attachment.path}/{$_attachment.filename}"><img src="{$uploadsUrl}/{$_attachment.childAttachments.thumb[0].path}/{$_attachment.childAttachments.thumb[0].filename}" alt="Załącznik do wpisu"></a>
													<p><a href="javascript:" onClick="Uploader.removeSingleFile({$_attachment.id});">Usuń</a></p>
												</div>
											{/foreach}
										</div>
									{/if}
									<div id="thumbnailFile">
										<img src="/img/progress.gif" alt="" id="thumbnailFileProgress" style="display: none;">
										{if $uploadedTmp}
											{foreach from=$uploadedTmp.CommentImage item=_file name=files}
												<a href="{$tmp_uploadsUrl}/{$_file.path}/{$_file.filename}" target="_blank">{$_file.props.original_filename|escape}</a><a href="javascript:" class="remove" onClick="Uploader.removeSingleFile({$_file.id});"><img src="/img/x.png" class="remove"></a>
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
			<p class="text-[15px] text-[#555]">Nie możesz edytować tego wpisu na forum.</p>
			{/if}
		</div>
	</section>
</div>
