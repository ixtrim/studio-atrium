<?php
/* Smarty version 3.1.48, created on 2026-10-02 15:17:33
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Discuss/Category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abfaeedab41a2_65468213',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f03dff012621fc78a3063a34fc7882c55742ee3a' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Discuss/Category.tpl',
      1 => 1790946483,
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
function content_6abfaeedab41a2_65468213 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="forum-2026" class="bg-white">

	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
		<div class="forum-shell">
			<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
				<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'forum'),$_smarty_tpl ) );?>
" class="hover:text-[#222] transition-colors">Forum</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li aria-current="page" class="text-[#6b6b6b]" id="post-category" data-cid="<?php echo $_smarty_tpl->tpl_vars['request']->value['id'];?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</li>
			</ol>
		</div>
	</nav>

	<section class="w-full bg-[#f5f6f7] border-b border-black/5">
		<div class="forum-shell py-10 md:py-12">
			<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Forum</span>
			<h1 class="mt-3 text-[32px] md:text-[40px] font-400 text-[var(--brand-darker)] tracking-tight uppercase leading-tight"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h1>
			<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
			<?php if ($_smarty_tpl->tpl_vars['category']->value['descr'] || $_smarty_tpl->tpl_vars['category']->value['long']) {?>
			<p class="mt-5 max-w-3xl text-[15px] md:text-[16px] leading-relaxed text-[#555]">
				<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['category']->value['long'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['category']->value['descr'] : $tmp), ENT_QUOTES, 'UTF-8', true);?>

			</p>
			<?php }?>
		</div>
	</section>

	<section class="w-full bg-white py-10 md:py-14">
		<div class="forum-shell">
			<div class="new-comment-trigger flex justify-end mb-6">
				<span class="framed blue" id="add-thread">Dodaj nowy wpis</span>
			</div>

			<div id="post-form-wrapper"<?php if (!$_smarty_tpl->tpl_vars['cache']->value) {?> style="display: none;"<?php }?>>
				<form class="validable" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'add_thread'),$_smarty_tpl ) );?>
" method="post" id="post-form" data-validate="Forum.validate">
					<fieldset class="border-0 m-0 p-0">
						<input type="hidden" name="module" value="discuss">
						<input type="hidden" name="action" value="add_thread">
						<input type="hidden" name="categoryId" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['id'];?>
">
						<input type="hidden" name="projectId" id="post-project-id" value="">
						<input type="hidden" id="ownerUid" name="ownerUid" value="<?php echo $_smarty_tpl->tpl_vars['tmpStamp']->value;?>
">
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
" target="_blank" style="margin-left: 15px;"><img src="<?php echo $_smarty_tpl->tpl_vars['tmp_uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['childAttachments']['thumb'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['childAttachments']['thumb'][0]['filename'];?>
"></a><a href="javascript:" class="remove" onClick="Uploader.removeSingleFile(<?php echo $_smarty_tpl->tpl_vars['_file']->value['id'];?>
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

			<ul class="forum-menu">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, '_item', false, '_key');
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_key']->value => $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
?>
					<li<?php if ($_smarty_tpl->tpl_vars['request']->value['id'] == $_smarty_tpl->tpl_vars['_key']->value) {?> class="selected"<?php }?>><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'category','id'=>$_smarty_tpl->tpl_vars['_key']->value),$_smarty_tpl ) );?>
"><span class="<?php echo $_smarty_tpl->tpl_vars['_item']->value['class'];?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['short'], ENT_QUOTES, 'UTF-8', true);?>
</span></a></li>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<li id="forum-search-trigger"><span class="fcat-search">Szukaj</span></li>
			</ul>

			<?php $_smarty_tpl->_subTemplateRender("file:Include/ForumSearch.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('forum_search_cid'=>$_smarty_tpl->tpl_vars['request']->value['id'],'forum_search_show_comments'=>1,'forum_search_wrapped'=>1), 0, false);
?>

			<?php if ($_smarty_tpl->tpl_vars['pages']->value > 1) {?>
			<div class="pager-box">
				<?php $_smarty_tpl->_subTemplateRender("file:Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value), 0, false);
?>
			</div>
			<?php }?>

			<ul class="forum-header category">
				<li><p>Tematy</p></li>
				<li><p>Ostatni wpis</p></li>
			</ul>

			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['threads']->value, '_item');
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
?>
			<div class="forum-cats">
				<ul>
					<li>
						<h4><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['_item']->value['id']),$_smarty_tpl ) );?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['topic'], ENT_QUOTES, 'UTF-8', true);?>
</a></h4>
						<p class="thread"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hideEmails' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strip_tags' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['content'] )),200 )) ));?>
</p>
						<div class="forum-meta">
							<span>Utworzył:</span>
							<span class="nick"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['nick'], ENT_QUOTES, 'UTF-8', true);?>
</span>
							<span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date_format' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['create_date'],"%d-%m-%Y" ));?>
</span>
							<?php if ($_smarty_tpl->tpl_vars['_item']->value['project_id'] && (isset($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_item']->value['project_id']]))) {?>
							<?php $_smarty_tpl->_assignInScope('_project', $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_item']->value['project_id']]);?>
							<span class="project overview" data-id="<?php echo $_smarty_tpl->tpl_vars['_item']->value['project_id'];?>
" data-img="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'presentation'),$_smarty_tpl ) );?>
" data-ground="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value),$_smarty_tpl ) );?>
"<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hasFloor' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'],true ))) {?> data-floor="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value,'storey'=>'1st_floor'),$_smarty_tpl ) );?>
"<?php }
if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hasLoft' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'],true ))) {?> data-loft="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value,'storey'=>'loft'),$_smarty_tpl ) );?>
"<?php }?> data-link="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['_project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['_project']->value['price']) {
if ($_smarty_tpl->tpl_vars['_project']->value['discount']) {?><strike><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
</strike> <?php echo $_smarty_tpl->tpl_vars['_project']->value['price']-$_smarty_tpl->tpl_vars['_project']->value['discount'];
} else {
echo $_smarty_tpl->tpl_vars['_project']->value['price'];
}
} else { ?>-<?php }?>" data-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_project']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" data-area="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'usableArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'] ));?>
" data-parcel="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'parcelWidth' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'] ));?>
 x <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'parcelHeight' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'] ));?>
" data-height="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'houseHeight' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'] ));?>
" data-angle="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'roofAngle' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'] ));?>
" data-version="<?php if ($_smarty_tpl->tpl_vars['_project']->value['type'] == 'skeleton') {?>wersja szkieletowa<?php } else { ?>wersja murowana<?php }?>" data-rooms="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'roomCount' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'] ));?>
" data-txt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_project']->value['short_description'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_project']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</span>
							<?php }?>
						</div>
					</li>
					<?php if ($_smarty_tpl->tpl_vars['_item']->value['subid']) {?>
					<li>
						<ul class="m-0 p-0 list-none grid gap-4 sm:grid-cols-[140px_1fr]">
							<li class="forum-author">
								<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'avatar' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['subauthorid'] ))) {?>
									<p class="avatar"><img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'avatar' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['subauthorid'] ));?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['subnick'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['subnick'], ENT_QUOTES, 'UTF-8', true);?>
</p>
								<?php } else { ?>
									<p<?php if (in_array($_smarty_tpl->tpl_vars['_item']->value['subauthorid'],$_smarty_tpl->tpl_vars['adminIds']->value)) {?> class="nick sa"<?php } else { ?> class="nick" data-initial="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['subnick'],1,'' )), ENT_QUOTES, 'UTF-8', true);?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['subnick'], ENT_QUOTES, 'UTF-8', true);?>
</p>
								<?php }?>
								<p class="text-[13px] text-[#6b7177] m-0"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date_format' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['subdate'],"%d-%m-%Y" ));?>
</p>
								<p class="text-[12px] text-[#999] m-0"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date_format' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['subdate'],"%H:%M" ));?>
</p>
							</li>
							<li>
								<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['_item']->value['id']),$_smarty_tpl ) );?>
?ostatni=1" class="block no-underline text-inherit hover:text-[var(--brand-red)]">
									<p class="m-0 text-[14px] leading-relaxed text-[#555]"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hideEmails' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strip_tags' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['subcontent'],false )),160 )) ));?>
</p>
								</a>
							</li>
						</ul>
					<?php } else { ?>
					<li class="reply">
						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['_item']->value['id']),$_smarty_tpl ) );?>
#reply">Odpowiedz</a>
					<?php }?>
					</li>
				</ul>
			</div>
			<?php
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

<?php $_smarty_tpl->_subTemplateRender("file:Include/ForumProjectOverlay.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
