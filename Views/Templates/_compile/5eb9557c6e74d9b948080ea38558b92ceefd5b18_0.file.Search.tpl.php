<?php
/* Smarty version 3.1.48, created on 2026-10-02 15:17:49
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Discuss/Search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abfaefd013452_41455320',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5eb9557c6e74d9b948080ea38558b92ceefd5b18' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Discuss/Search.tpl',
      1 => 1790946553,
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
function content_6abfaefd013452_41455320 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="forum-2026" class="bg-white">

	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
		<div class="forum-shell">
			<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
				<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'forum'),$_smarty_tpl ) );?>
" class="hover:text-[#222] transition-colors">Forum</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li aria-current="page" class="text-[#6b6b6b]">Wyniki wyszukiwania</li>
			</ol>
		</div>
	</nav>

	<section class="w-full bg-[#f5f6f7] border-b border-black/5">
		<div class="forum-shell py-10 md:py-12">
			<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Forum</span>
			<h1 class="mt-3 text-[32px] md:text-[40px] font-400 text-[var(--brand-darker)] tracking-tight uppercase leading-tight">Wyniki wyszukiwania</h1>
			<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
			<p class="mt-5 max-w-3xl text-[15px] leading-relaxed text-[#555]">
				<?php if ($_smarty_tpl->tpl_vars['request']->value['query']) {?>Zapytanie: <strong class="text-[#222]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['request']->value['query'], ENT_QUOTES, 'UTF-8', true);?>
</strong><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['request']->value['cid']) {
if ($_smarty_tpl->tpl_vars['request']->value['query']) {?> · <?php }?>Kategoria: <strong class="text-[#222]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['request']->value['cid']]['title'], ENT_QUOTES, 'UTF-8', true);?>
</strong><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['request']->value['pid']) {
if ($_smarty_tpl->tpl_vars['request']->value['query'] || $_smarty_tpl->tpl_vars['request']->value['cid']) {?> · <?php }?>Projekt: <strong class="text-[#222]" id="search-project-name"></strong><?php }?>
				<span class="text-[#888]">(<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
)</span>
			</p>
		</div>
	</section>

	<section class="w-full bg-white py-10 md:py-14">
		<div class="forum-shell space-y-6">
			<?php $_smarty_tpl->_subTemplateRender("file:Include/ForumSearch.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('forum_search_query'=>$_smarty_tpl->tpl_vars['query']->value,'forum_search_cid'=>$_smarty_tpl->tpl_vars['request']->value['cid']), 0, false);
?>

			<?php if ($_smarty_tpl->tpl_vars['pages']->value > 1) {?>
			<div class="pager-box">
				<?php $_smarty_tpl->_subTemplateRender("file:Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value,'query'=>$_smarty_tpl->tpl_vars['queryPart']->value), 0, false);
?>
			</div>
			<?php }?>

			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value['list'], '_item');
$_smarty_tpl->tpl_vars['_item']->index = -1;
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
$_smarty_tpl->tpl_vars['_item']->index++;
$_smarty_tpl->tpl_vars['_item']->first = !$_smarty_tpl->tpl_vars['_item']->index;
$__foreach__item_0_saved = $_smarty_tpl->tpl_vars['_item'];
?>
				<?php if ($_smarty_tpl->tpl_vars['_item']->value['parent_id']) {?>
					<?php $_smarty_tpl->_assignInScope('_threadId', $_smarty_tpl->tpl_vars['_item']->value['parent_id']);?>
				<?php } else { ?>
					<?php $_smarty_tpl->_assignInScope('_threadId', $_smarty_tpl->tpl_vars['_item']->value['id']);?>
				<?php }?>
			<div class="forum-search<?php if ($_smarty_tpl->tpl_vars['_item']->first) {?> first<?php }?>">
				<ul>
					<li>
						<div class="forum-author">
							<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'avatar' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['uid'] ))) {?>
								<p class="avatar"><img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'avatar' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['uid'] ));?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['unick'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['unick'], ENT_QUOTES, 'UTF-8', true);?>
</p>
							<?php } else { ?>
								<p<?php if (in_array($_smarty_tpl->tpl_vars['_item']->value['uid'],$_smarty_tpl->tpl_vars['adminIds']->value)) {?> class="nick sa"<?php } else { ?> class="nick" data-initial="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['unick'],1,'' )), ENT_QUOTES, 'UTF-8', true);?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['unick'], ENT_QUOTES, 'UTF-8', true);?>
</p>
							<?php }?>
							<p class="text-[13px] text-[#6b7177] m-0"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date_format' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['pdate'],"%d-%m-%Y (%T)" ));?>
</p>
						</div>
					</li>
					<li class="result">
						<p class="head m-0 mb-2 text-[13px] font-bold uppercase tracking-wider text-[#6b7177]">
							<?php if (!$_smarty_tpl->tpl_vars['_item']->value['parent_id']) {?>
								Temat: <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['_threadId']->value),$_smarty_tpl ) );?>
" class="normal-case tracking-normal text-[var(--brand-darker)] hover:text-[var(--brand-red)]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['ptitle'], ENT_QUOTES, 'UTF-8', true);?>
</a>
							<?php } else { ?>
								Odpowiedź w temacie: <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['_threadId']->value),$_smarty_tpl ) );?>
" class="normal-case tracking-normal text-[var(--brand-darker)] hover:text-[var(--brand-red)]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['dadtopic'], ENT_QUOTES, 'UTF-8', true);?>
</a>
							<?php }?>
						</p>
						<div class="text-[14px] leading-relaxed text-[#555]">
							<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hideEmails' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['content'],320 )) ));?>

							<p class="small mt-3 mb-0 text-[12px] text-[#888]">
								W kategorii: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['_item']->value['cat_id']]['title'], ENT_QUOTES, 'UTF-8', true);?>

								<?php if ($_smarty_tpl->tpl_vars['_item']->value['project_id']) {?>
									<?php $_smarty_tpl->_assignInScope('_project', $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_item']->value['project_id']]);?>
									| Związany z projektem:
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
							</p>
						</div>
					</li>
				</ul>
			</div>
			<?php
$_smarty_tpl->tpl_vars['_item'] = $__foreach__item_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

			<?php if ($_smarty_tpl->tpl_vars['pages']->value > 1) {?>
			<div class="pager-box">
				<?php $_smarty_tpl->_subTemplateRender("file:Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value,'query'=>$_smarty_tpl->tpl_vars['queryPart']->value), 0, true);
?>
			</div>
			<?php }?>
		</div>
	</section>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:Include/ForumProjectOverlay.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
