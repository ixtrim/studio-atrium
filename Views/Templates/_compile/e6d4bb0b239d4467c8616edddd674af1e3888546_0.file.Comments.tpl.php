<?php
/* Smarty version 3.1.48, created on 2026-10-02 15:17:34
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Discuss/Comments.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abfaeee7eed15_27736922',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6d4bb0b239d4467c8616edddd674af1e3888546' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Discuss/Comments.tpl',
      1 => 1790946565,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Include/ForumSearch.tpl' => 1,
    'file:Include/Pager.tpl' => 1,
  ),
),false)) {
function content_6abfaeee7eed15_27736922 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="forum-2026" class="bg-white">

	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
		<div class="forum-shell">
			<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
				<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'forum'),$_smarty_tpl ) );?>
" class="hover:text-[#222] transition-colors">Forum</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li aria-current="page" class="text-[#6b6b6b]">Komentarze do projektów</li>
			</ol>
		</div>
	</nav>

	<section class="w-full bg-[#f5f6f7] border-b border-black/5">
		<div class="forum-shell py-10 md:py-12">
			<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Forum</span>
			<h1 class="mt-3 text-[32px] md:text-[40px] font-400 text-[var(--brand-darker)] tracking-tight uppercase leading-tight">Komentarze do projektów</h1>
			<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
			<p class="mt-5 max-w-3xl text-[15px] md:text-[16px] leading-relaxed text-[#555]">
				Komentuj konkretny projekt domu i zadawaj pytania konsultantowi. Żadne pytanie nie zostawiamy bez odpowiedzi —
				wpisz komentarz na stronie wybranego domu i śledź dyskusję tam. Poniżej lista ostatnio dodanych komentarzy.
			</p>
		</div>
	</section>

	<section class="w-full bg-white py-10 md:py-14">
		<div class="forum-shell space-y-6">
			<?php $_smarty_tpl->_subTemplateRender("file:Include/ForumSearch.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('forum_search_cid'=>$_smarty_tpl->tpl_vars['request']->value['cid'],'forum_search_show_comments'=>1), 0, false);
?>

			<?php if ($_smarty_tpl->tpl_vars['pages']->value > 1) {?>
			<div class="pager-box">
				<?php $_smarty_tpl->_subTemplateRender("file:Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value), 0, false);
?>
			</div>
			<?php }?>

			<ul class="forum-header comments">
				<li><p>Komentarz do projektu</p></li>
				<li><p>Ostatnia odpowiedź</p></li>
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
						<h4><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_item']->value['project']['id'],'link_title'=>$_smarty_tpl->tpl_vars['_item']->value['project']['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
#komentarze"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['project']['name'], ENT_QUOTES, 'UTF-8', true);?>
</a></h4>
						<p class="thread"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hideEmails' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['content'],200 )) ));?>
</p>
						<div class="forum-meta">
							<span>Utworzył:</span>
							<span class="nick"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['author'], ENT_QUOTES, 'UTF-8', true);?>
</span>
							<span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date_format' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['publish_date'],"%d-%m-%Y" ));?>
</span>
							<span class="project"><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_item']->value['project']['id'],'link_title'=>$_smarty_tpl->tpl_vars['_item']->value['project']['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['project']['name'], ENT_QUOTES, 'UTF-8', true);?>
</a></span>
						</div>
					</li>
					<?php if ($_smarty_tpl->tpl_vars['_item']->value['children']) {?>
					<li>
						<ul class="m-0 p-0 list-none grid gap-4 sm:grid-cols-[140px_1fr]">
							<li class="forum-author">
								<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'avatar' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['children'][0]['user_id'] ))) {?>
									<p class="avatar"><img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'avatar' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['children'][0]['user_id'] ));?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['children'][0]['author'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['children'][0]['author'], ENT_QUOTES, 'UTF-8', true);?>
</p>
								<?php } else { ?>
									<p<?php if (in_array($_smarty_tpl->tpl_vars['_item']->value['children'][0]['user_id'],$_smarty_tpl->tpl_vars['adminIds']->value)) {?> class="nick sa"<?php } else { ?> class="nick" data-initial="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['children'][0]['author'],1,'' )), ENT_QUOTES, 'UTF-8', true);?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['children'][0]['author'], ENT_QUOTES, 'UTF-8', true);?>
</p>
								<?php }?>
								<p class="text-[13px] text-[#6b7177] m-0"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date_format' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['children'][0]['publish_date'],"%d-%m-%Y" ));?>
</p>
								<p class="text-[12px] text-[#999] m-0"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date_format' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['children'][0]['publish_date'],"%H:%M" ));?>
</p>
							</li>
							<li>
								<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_item']->value['project']['id'],'link_title'=>$_smarty_tpl->tpl_vars['_item']->value['project']['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
#komentarze" class="block no-underline text-inherit hover:text-[var(--brand-red)]">
									<p class="m-0 text-[14px] leading-relaxed text-[#555]"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hideEmails' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strip_tags' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['children'][0]['content'] )),160 )) ));?>
</p>
								</a>
							</li>
						</ul>
					<?php } else { ?>
					<li class="reply">
						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_item']->value['project']['id'],'link_title'=>$_smarty_tpl->tpl_vars['_item']->value['project']['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
#komentarze">Odpowiedz</a>
					<?php }?>
					</li>
				</ul>
			</div>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	</section>
</div>
<?php }
}
