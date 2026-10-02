<?php
/* Smarty version 3.1.48, created on 2026-10-02 15:17:34
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Discuss/Thread.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abfaeeeab4dd0_13505291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27e0c0c6ff4b73765f104b9e5ff97cceb679c106' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Discuss/Thread.tpl',
      1 => 1790946527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Include/ForumSearch.tpl' => 1,
    'file:Include/Pager.tpl' => 2,
    'file:Include/ForumProjectOverlay.tpl' => 1,
  ),
),false)) {
function content_6abfaeeeab4dd0_13505291 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="forum-2026" class="bg-white">

	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
		<div class="forum-shell">
			<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
				<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'forum'),$_smarty_tpl ) );?>
" class="hover:text-[#222] transition-colors">Forum</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'category','id'=>$_smarty_tpl->tpl_vars['post']->value['cat_id']),$_smarty_tpl ) );?>
" class="hover:text-[#222] transition-colors"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['post']->value['cat_id']]['title'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li aria-current="page" class="text-[#6b6b6b]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['topic'], ENT_QUOTES, 'UTF-8', true);?>
</li>
			</ol>
		</div>
	</nav>

	<section class="w-full bg-[#f5f6f7] border-b border-black/5">
		<div class="forum-shell py-10 md:py-12">
			<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['post']->value['cat_id']]['title'], ENT_QUOTES, 'UTF-8', true);?>
</span>
			<h1 class="mt-3 text-[28px] md:text-[36px] font-400 text-[var(--brand-darker)] tracking-tight uppercase leading-tight"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['topic'], ENT_QUOTES, 'UTF-8', true);?>
</h1>
			<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
		</div>
	</section>

	<section class="w-full bg-white py-10 md:py-14">
		<div class="forum-shell space-y-6">
			<?php $_smarty_tpl->_subTemplateRender("file:Include/ForumSearch.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<?php if ($_smarty_tpl->tpl_vars['pages']->value > 1) {?>
			<div class="pager-box">
				<?php $_smarty_tpl->_subTemplateRender("file:Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value), 0, false);
?>
			</div>
			<?php }?>

			<ul class="forum-header thread" id="reply">
				<li><p>Autor</p></li>
				<li>
					<p>Dyskusja: <strong class="normal-case tracking-normal text-[#222]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['topic'], ENT_QUOTES, 'UTF-8', true);?>
</strong></p>
					<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
					<div class="notify-box">
						<form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'set_notification'),$_smarty_tpl ) );?>
" method="post" id="notification-form">
							<fieldset class="border-0 m-0 p-0">
								<input type="hidden" id="notify-pid" name="pid" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
">
								<input type="hidden" id="notify-uid" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
								<input type="checkbox" name="notifyMe" id="notifyMe" autocomplete="off"<?php if ($_smarty_tpl->tpl_vars['postNotifcation']->value) {?> checked<?php }?>><label for="notifyMe">Powiadamiaj mnie o nowych wpisach</label>
								<span><img id="notify-waiter" style="display: none;" src="/img/waiter-blue.gif" alt=""></span>
							</fieldset>
						</form>
					</div>
					<?php }?>
				</li>
			</ul>

			<div class="forum-thread" id="forum-thread">
				<ul class="parent">
					<li>
						<div class="base">
							<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'avatar' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['author_id'] ))) {?>
								<p class="avatar"><img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'avatar' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['author_id'] ));?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['nick'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['nick'], ENT_QUOTES, 'UTF-8', true);?>
</p>
							<?php } else { ?>
								<p<?php if (in_array($_smarty_tpl->tpl_vars['post']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)) {?> class="sa"<?php } else { ?> data-initial="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['nick'],1,'' )), ENT_QUOTES, 'UTF-8', true);?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['nick'], ENT_QUOTES, 'UTF-8', true);?>
</p>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['post']->value['author_id']) {?>
								<?php if (!in_array($_smarty_tpl->tpl_vars['post']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)) {?>
								<ul>
									<li>Posty: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['post']->value['user']['props']['forum']['count'])===null||$tmp==='' ? 0 : $tmp);?>
</li>
									<li>Pierwszy post: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['post']->value['user']['props']['forum']['date'])===null||$tmp==='' ? "-" : $tmp);?>
</li>
								</ul>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['user']->value && $_smarty_tpl->tpl_vars['user']->value['id'] != $_smarty_tpl->tpl_vars['post']->value['author_id']) {?>
									<?php if (in_array($_smarty_tpl->tpl_vars['post']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)) {?>
										<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'panel','action'=>'message'),$_smarty_tpl ) );?>
"><span class="postme2">Napisz wiadomość</span></a>
									<?php } else { ?>
										<span class="postme" data-aid="<?php echo $_smarty_tpl->tpl_vars['post']->value['author_id'];?>
">Napisz wiadomość</span>
									<?php }?>
								<?php }?>
							<?php } else { ?>
								<span class="text-[12px] text-[#888]">Niezarejestrowany</span>
							<?php }?>
						</div>
					</li>
					<li>
						<p id="thread-post" class="text-[15px] leading-relaxed text-[#333] m-0<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'avatar' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['author_id'] ))) {?> avatar<?php }?>">
							<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hideEmails' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['content'] )) ));?>

						</p>
						<?php if ($_smarty_tpl->tpl_vars['post']->value['author_id'] == $_smarty_tpl->tpl_vars['user']->value['id']) {?><p class="mt-3"><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'edit_thread','cid'=>$_smarty_tpl->tpl_vars['post']->value['cat_id'],'id'=>$_smarty_tpl->tpl_vars['request']->value['id']),$_smarty_tpl ) );?>
" class="text-[var(--brand-red)] font-bold text-[13px]">Edytuj post</a></p><?php }?>

						<?php if ($_smarty_tpl->tpl_vars['page']->value > 1) {?><p id="expand-post" class="expand text-[var(--brand-red)] font-bold cursor-pointer text-[13px] mt-3">Rozwiń wpis</p><?php }?>

						<?php if ($_smarty_tpl->tpl_vars['post']->value['attachments']) {?>
							<div class="attList">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post']->value['attachments']['DiscussImage'], '_attachment');
$_smarty_tpl->tpl_vars['_attachment']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_attachment']->value) {
$_smarty_tpl->tpl_vars['_attachment']->do_else = false;
?>
								<a data-fancybox="forum_image" <?php if ($_smarty_tpl->tpl_vars['_attachment']->value['title']) {?> data-caption="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_attachment']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['filename'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['filename'];?>
" alt="Załącznik do wpisu"></a>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</div>
						<?php }?>

						<div class="forum-meta">
							<span>Utworzony: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date_format' ][ 0 ], array( $_smarty_tpl->tpl_vars['post']->value['create_date'],"%d-%m-%Y (%T)" ));?>
</span>
							<?php if ($_smarty_tpl->tpl_vars['project']->value) {?>
								<span class="project overview" data-id="<?php echo $_smarty_tpl->tpl_vars['project_id']->value;?>
" data-img="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'size'=>'presentation'),$_smarty_tpl ) );?>
" data-ground="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value),$_smarty_tpl ) );?>
"<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hasFloor' ][ 0 ], array( $_smarty_tpl->tpl_vars['project']->value['params_general'],true ))) {?> data-floor="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value,'storey'=>'1st_floor'),$_smarty_tpl ) );?>
"<?php }
if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hasLoft' ][ 0 ], array( $_smarty_tpl->tpl_vars['project']->value['params_general'],true ))) {?> data-loft="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value,'storey'=>'loft'),$_smarty_tpl ) );?>
"<?php }?> data-link="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['project']->value['price']) {
if ($_smarty_tpl->tpl_vars['project']->value['discount']) {?><strike><?php echo $_smarty_tpl->tpl_vars['project']->value['price'];?>
</strike> <?php echo $_smarty_tpl->tpl_vars['project']->value['price']-$_smarty_tpl->tpl_vars['project']->value['discount'];
} else {
echo $_smarty_tpl->tpl_vars['project']->value['price'];
}
} else { ?>-<?php }?>" data-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" data-area="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'usableArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['project']->value['params_general'] ));?>
" data-parcel="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'parcelWidth' ][ 0 ], array( $_smarty_tpl->tpl_vars['project']->value['params_general'] ));?>
 x <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'parcelHeight' ][ 0 ], array( $_smarty_tpl->tpl_vars['project']->value['params_general'] ));?>
" data-height="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'houseHeight' ][ 0 ], array( $_smarty_tpl->tpl_vars['project']->value['params_general'] ));?>
" data-angle="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'roofAngle' ][ 0 ], array( $_smarty_tpl->tpl_vars['project']->value['params_general'] ));?>
" data-version="<?php if ($_smarty_tpl->tpl_vars['project']->value['type'] == 'skeleton') {?>wersja szkieletowa<?php } else { ?>wersja murowana<?php }?>" data-rooms="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'roomCount' ][ 0 ], array( $_smarty_tpl->tpl_vars['project']->value['params_general'] ));?>
" data-txt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['short_description'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</span>
							<?php }?>
						</div>

						<span id="reply-trigger">Odpowiedz</span>
					</li>
				</ul>
			</div>

			<div id="post-form-wrapper" style="display: none;">
				<form class="validable" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'add_post'),$_smarty_tpl ) );?>
" method="post" id="post-form" data-validate="Thread.validate">
					<fieldset class="border-0 m-0 p-0">
						<input type="hidden" name="module" value="discuss">
						<input type="hidden" name="action" value="add_post">
						<input type="hidden" name="categoryId" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['cat_id'];?>
">
						<input type="hidden" name="parentId" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['id'];?>
">
						<input type="hidden" id="ownerUid" name="ownerUid" value="<?php echo $_smarty_tpl->tpl_vars['tmpStamp']->value;?>
">
						<input type="hidden" id="isTmpUid" name="isTmpUid" value="1">
						<?php if ($_smarty_tpl->tpl_vars['project']->value) {?>
						<input type="hidden" name="projectId" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
">
						<?php }?>

						<div class="small-space mb-3">
							<textarea id="content" name="content" cols="1" rows="1" placeholder="Wpisz treść*"></textarea>
						</div>
						<div id="Content" style="position: relative;">
							<ul class="inputs-holder">
								<?php if (!$_smarty_tpl->tpl_vars['user']->value) {?><li class="middle"><span><a href="javascript:" class="login-trigger text-[var(--brand-red)] font-bold underline" id="post-login-trigger">Zaloguj się</a> lub wypełnij poniższe dane</span></li><?php }?>
								<li class="mystic"><label for="age">Wiek</label><input type="text" name="age" id="comment-age" value=""></li>
								<li class="spaced short"><label for="nick">Nazwa / Nick*</label><input type="text" name="nick" id="nick" value="<?php if ($_smarty_tpl->tpl_vars['user']->value['nick']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['nick'], ENT_QUOTES, 'UTF-8', true);
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['name'], ENT_QUOTES, 'UTF-8', true);
}?>"<?php if ($_smarty_tpl->tpl_vars['user']->value) {?> readonly<?php }?>></li>
								<li class="rite noPadd short"><input type="checkbox" name="notify" id="notify"<?php if ($_smarty_tpl->tpl_vars['user']->value) {?> class="notShow"<?php }?>><label class="nocaps" for="notify">Chcę otrzymywać powiadomienia o nowych wpisach</label></li>
								<li class="short" id="post-mail-box" style="display: none;"><label for="post-email">E-mail</label><input type="text" name="email" id="post-email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
"<?php if ($_smarty_tpl->tpl_vars['user']->value) {?> readonly<?php }?>></li>
								<li class="middle">
									<?php if ($_smarty_tpl->tpl_vars['uploadedTmp']->value) {?><p class="last">Wgrane grafiki:</p><?php }?>
									<div id="thumbnailFile">
										<img src="/img/progress.gif" alt="" id="thumbnailFileProgress" style="display: none;">
										<?php if ($_smarty_tpl->tpl_vars['uploadedTmp']->value) {?>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['uploadedTmp']->value['DiscussImage'], '_file', false, NULL, 'files', array (
));
$_smarty_tpl->tpl_vars['_file']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_file']->value) {
$_smarty_tpl->tpl_vars['_file']->do_else = false;
?>
												<a href="<?php echo $_smarty_tpl->tpl_vars['tmp_uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['filename'];?>
" target="_blank" style="margin-left: 15px;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_file']->value['props']['original_filename'], ENT_QUOTES, 'UTF-8', true);?>
</a><a href="javascript:" class="remove" onClick="Uploader.removeSingleFile(<?php echo $_smarty_tpl->tpl_vars['_file']->value['id'];?>
);"><img src="/img/x.png" class="remove"></a>
											<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										<?php }?>
									</div>
								</li>
								<li class="rite middle short"><input type="checkbox" name="regulations" id="regulations"><label class="nocaps" for="regulations">Akceptuję </label><span class="ajax-info" data-url="/?module=ajax&action=get_comment_regulations">regulamin korzystania</span></li>
								<li class="submit"><button class="baton" id="publish-trigger">Publikuj</button> <span><img id="post-waiter" style="display: none;" src="/img/waiter-blue.gif" alt=""></span></li>
							</ul>
						</div>
					</fieldset>
				</form>
			</div>

			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['thread']->value, '_item', true);
$_smarty_tpl->tpl_vars['_item']->iteration = 0;
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
$_smarty_tpl->tpl_vars['_item']->iteration++;
$_smarty_tpl->tpl_vars['_item']->last = $_smarty_tpl->tpl_vars['_item']->iteration === $_smarty_tpl->tpl_vars['_item']->total;
$__foreach__item_2_saved = $_smarty_tpl->tpl_vars['_item'];
?>
			<div class="forum-thread post">
				<ul>
					<li>
						<div>
							<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'avatar' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['author_id'] ))) {?>
								<p class="avatar"><img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'avatar' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['author_id'] ));?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['nick'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['nick'], ENT_QUOTES, 'UTF-8', true);?>
</p>
							<?php } else { ?>
								<p<?php if (in_array($_smarty_tpl->tpl_vars['_item']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)) {?> class="sa"<?php } else { ?> data-initial="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['nick'],1,'' )), ENT_QUOTES, 'UTF-8', true);?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['nick'], ENT_QUOTES, 'UTF-8', true);?>
</p>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['_item']->value['author_id']) {?>
								<?php if (!in_array($_smarty_tpl->tpl_vars['_item']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)) {?>
								<ul>
									<li>Posty: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['_item']->value['user']['props']['forum']['count'])===null||$tmp==='' ? 0 : $tmp);?>
</li>
									<li>Pierwszy post: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['_item']->value['user']['props']['forum']['date'])===null||$tmp==='' ? "-" : $tmp);?>
</li>
								</ul>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['user']->value && $_smarty_tpl->tpl_vars['user']->value['id'] != $_smarty_tpl->tpl_vars['_item']->value['author_id']) {?>
									<?php if (in_array($_smarty_tpl->tpl_vars['_item']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)) {?>
										<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'panel','action'=>'message'),$_smarty_tpl ) );?>
"><span class="postme2">Napisz wiadomość</span></a>
									<?php } else { ?>
										<span class="postme" data-aid="<?php echo $_smarty_tpl->tpl_vars['_item']->value['author_id'];?>
">Napisz wiadomość</span>
									<?php }?>
								<?php }?>
							<?php } else { ?>
								<span class="text-[12px] text-[#888]">Niezarejestrowany</span>
							<?php }?>
						</div>
					</li>
					<li>
						<p class="text-[15px] leading-relaxed text-[#333] m-0"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hideEmails' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['content'] )) ));?>
</p>
						<?php if ($_smarty_tpl->tpl_vars['_item']->value['author_id'] == $_smarty_tpl->tpl_vars['user']->value['id']) {?><p class="mt-3"><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'edit_post','cid'=>$_smarty_tpl->tpl_vars['post']->value['cat_id'],'id'=>$_smarty_tpl->tpl_vars['_item']->value['id']),$_smarty_tpl ) );?>
" class="text-[var(--brand-red)] font-bold text-[13px]">Edytuj post</a></p><?php }?>

						<?php if ($_smarty_tpl->tpl_vars['_item']->value['attachments']) {?>
							<div class="attList">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_item']->value['attachments']['DiscussImage'], '_attachment');
$_smarty_tpl->tpl_vars['_attachment']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_attachment']->value) {
$_smarty_tpl->tpl_vars['_attachment']->do_else = false;
?>
								<a data-fancybox="forum_image" <?php if ($_smarty_tpl->tpl_vars['_attachment']->value['title']) {?> data-caption="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_attachment']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['filename'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['filename'];?>
" alt="Załącznik do wpisu"></a>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</div>
						<?php }?>

						<div class="forum-meta">
							<span>Utworzony: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date_format' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['create_date'],"%d-%m-%Y (%T)" ));?>
</span>
						</div>

						<?php if ($_smarty_tpl->tpl_vars['_item']->last) {?>
						<span id="reply-bis-trigger">Odpowiedz</span>
						<?php }?>
					</li>
				</ul>
			</div>
			<?php
$_smarty_tpl->tpl_vars['_item'] = $__foreach__item_2_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

			<?php if ($_smarty_tpl->tpl_vars['pages']->value > 1) {?>
			<div class="pager-box">
				<?php $_smarty_tpl->_subTemplateRender("file:Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value), 0, true);
?>
			</div>
			<?php }?>
		</div>
	</section>
</div>

<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
<div class="blue-overlay message" id="message-overlay">
	<div class="over-box">
		<div>
			<form method="post" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'send_message'),$_smarty_tpl ) );?>
" id="message-form">
				<input name="module" type="hidden" value="discuss">
				<input name="action" type="hidden" value="send_message">
				<input name="senderId" id="message-sender" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
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
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['project']->value) {
$_smarty_tpl->_subTemplateRender("file:Include/ForumProjectOverlay.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
}
