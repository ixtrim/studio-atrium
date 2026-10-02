<?php
/* Smarty version 3.1.48, created on 2026-10-02 15:17:50
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Discuss/EditThread.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abfaefe213f38_27154530',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c40dceeb68b34dad512e7e1b7b19a78ec37a1d35' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Discuss/EditThread.tpl',
      1 => 1790946579,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abfaefe213f38_27154530 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="forum-2026" class="bg-white">

	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
		<div class="forum-shell">
			<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
				<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'forum'),$_smarty_tpl ) );?>
" class="hover:text-[#222] transition-colors">Forum</a></li>
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
				<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['post']->value['id']),$_smarty_tpl ) );?>
" class="text-[var(--brand-red)] font-bold hover:underline"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['topic'], ENT_QUOTES, 'UTF-8', true);?>
</a>
			</p>
		</div>
	</section>

	<section class="w-full bg-white py-10 md:py-14">
		<div class="forum-shell max-w-3xl">
			<?php if ($_smarty_tpl->tpl_vars['user']->value && $_smarty_tpl->tpl_vars['user']->value['id'] == $_smarty_tpl->tpl_vars['post']->value['author_id']) {?>
			<div id="post-form-wrapper">
				<form class="validable" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'store_thread'),$_smarty_tpl ) );?>
" method="post" id="post-form" data-validate="Forum.validate">
					<fieldset class="border-0 m-0 p-0">
						<input type="hidden" name="module" value="discuss">
						<input type="hidden" name="action" value="store_thread">
						<input type="hidden" name="postId" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
">
						<input type="hidden" name="projectId" id="post-project-id" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['project_id'];?>
">
						<input type="hidden" id="ownerUid" name="ownerUid" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['_uid'];?>
">
						<input type="hidden" id="isTmpUid" name="isTmpUid" value="0">

						<div class="mb-3">
							<input type="text" name="subject" id="subject" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['topic'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Wpisz tytuł*">
						</div>
						<div class="small-space mb-3">
							<textarea id="content" name="content" cols="1" rows="1" placeholder="Wpisz treść*"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['content'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
						</div>

						<div class="mb-3">
							<input type="checkbox" name="bindProject" id="bind" autocomplete="off"<?php if ($_smarty_tpl->tpl_vars['post']->value['project_id']) {?> checked<?php }?>><label for="bind">Powiąż temat z projektem</label>
						</div>
						<div id="post-project-box"<?php if (!$_smarty_tpl->tpl_vars['post']->value['project_id']) {?> style="display: none;"<?php }?> class="mb-3">
							<input type="text" name="project" id="post-project-name" autocomplete="off" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['project']['name'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Wpisz nazwę projektu">
							<ul id="names-holder" class="names-holder"></ul>
						</div>

						<div id="Content" style="position: relative;">
							<ul class="inputs-holder">
								<li class="center"><input type="checkbox" name="notify" id="notify"<?php if ($_smarty_tpl->tpl_vars['notification']->value) {?> checked<?php }?>><label class="nocaps" for="notify">Chcę otrzymywać powiadomienia o nowych wpisach</label></li>
								<li class="middle">
									<?php if ($_smarty_tpl->tpl_vars['uploadedTmp']->value || $_smarty_tpl->tpl_vars['post']->value['attachments']) {?><p class="last strong">Wgrane grafiki:</p><?php }?>
									<?php if ($_smarty_tpl->tpl_vars['post']->value['attachments']) {?>
										<div class="attachmentList attList">
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post']->value['attachments']['DiscussImage'], '_attachment');
$_smarty_tpl->tpl_vars['_attachment']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_attachment']->value) {
$_smarty_tpl->tpl_vars['_attachment']->do_else = false;
?>
												<div>
													<a data-fancybox="forum_image" <?php if ($_smarty_tpl->tpl_vars['_attachment']->value['title']) {?> data-caption="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_attachment']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['filename'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['filename'];?>
" alt="Załącznik do wpisu"></a>
													<p><a href="javascript:" onClick="Uploader.removeSingleFile(<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['id'];?>
);">Usuń</a></p>
												</div>
											<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										</div>
									<?php }?>
									<div id="thumbnailFile">
										<img src="/img/progress.gif" alt="" id="thumbnailFileProgress" style="display: none;">
										<?php if ($_smarty_tpl->tpl_vars['uploadedTmp']->value) {?>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['uploadedTmp']->value['CommentImage'], '_file', false, NULL, 'files', array (
));
$_smarty_tpl->tpl_vars['_file']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_file']->value) {
$_smarty_tpl->tpl_vars['_file']->do_else = false;
?>
												<a href="<?php echo $_smarty_tpl->tpl_vars['tmp_uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['filename'];?>
" target="_blank"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_file']->value['props']['original_filename'], ENT_QUOTES, 'UTF-8', true);?>
</a><a href="javascript:" class="remove" onClick="Uploader.removeSingleFile(<?php echo $_smarty_tpl->tpl_vars['_file']->value['id'];?>
);"><img src="/img/x.png" class="remove"></a>
											<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										<?php }?>
									</div>
								</li>
								<li class="submit"><button class="baton" id="publish-trigger">Zachowaj zmiany</button> <span><img id="post-waiter" style="display: none;" src="/img/waiter-blue.gif" alt=""></span></li>
							</ul>
						</div>
					</fieldset>
				</form>
			</div>
			<?php } else { ?>
			<p class="text-[15px] text-[#555]">Nie możesz edytować tego wpisu na forum.</p>
			<?php }?>
		</div>
	</section>
</div>
<?php }
}
