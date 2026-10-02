<?php
/* Smarty version 3.1.48, created on 2026-10-02 15:10:48
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Discuss/Forum.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abfad586a7fa7_84450499',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff76e11c355a93717d111caf716a805941aeb23c' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Discuss/Forum.tpl',
      1 => 1790946436,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Include/ForumSearch.tpl' => 1,
  ),
),false)) {
function content_6abfad586a7fa7_84450499 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="forum-2026" class="bg-white">

	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
		<div class="forum-shell">
			<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
				<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li aria-current="page" class="text-[#6b6b6b]">Forum</li>
			</ol>
		</div>
	</nav>

	<section class="w-full bg-[#f5f6f7] border-b border-black/5">
		<div class="forum-shell py-10 md:py-12">
			<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Społeczność</span>
			<h1 class="mt-3 text-[32px] md:text-[40px] font-400 text-[var(--brand-darker)] tracking-tight uppercase leading-tight">Forum</h1>
			<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
			<p class="mt-5 max-w-3xl text-[15px] md:text-[16px] leading-relaxed text-[#555]">
				Witamy na Forum dyskusyjnym Studia Atrium — miejscu wymiany doświadczeń przy budowie domu według naszych projektów.
				Warto się zalogować: historia dyskusji, powiadomienia i edycja postów są dostępne dla zarejestrowanych użytkowników.
				<span class="ajax-info" data-url="/?module=ajax&action=get_comment_regulations">Regulamin korzystania</span>
			</p>
		</div>
	</section>

	<section class="w-full bg-white py-10 md:py-14">
		<div class="forum-shell space-y-8">
			<?php $_smarty_tpl->_subTemplateRender("file:Include/ForumSearch.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<div>
				<div class="text-[12px] font-bold uppercase tracking-[0.16em] text-[#6b7177] mb-3">Kategorie</div>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, '_item', false, '_key');
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_key']->value => $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
?>
				<div class="forum-cats">
					<ul class="iconized">
						<li class="<?php echo $_smarty_tpl->tpl_vars['_item']->value['class'];?>
">
							<h4><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'category','id'=>$_smarty_tpl->tpl_vars['_key']->value),$_smarty_tpl ) );?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</a></h4>
							<p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['descr'], ENT_QUOTES, 'UTF-8', true);?>
</p>
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'category','id'=>$_smarty_tpl->tpl_vars['_key']->value),$_smarty_tpl ) );?>
">Zobacz wszystkie tematy</a>
						</li>
						<li>
							<?php if ($_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]) {?>
							<ul class="m-0 p-0 list-none grid gap-4 sm:grid-cols-[140px_1fr]">
								<li class="forum-author">
									<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'avatar' ][ 0 ], array( $_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['author_id'] ))) {?>
										<p class="avatar"><img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'avatar' ][ 0 ], array( $_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['author_id'] ));?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['nick'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['nick'], ENT_QUOTES, 'UTF-8', true);?>
</p>
									<?php } else { ?>
										<p <?php if (in_array($_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)) {?> class="nick sa"<?php } else { ?> class="nick" data-initial="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( $_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['nick'],1,'' )), ENT_QUOTES, 'UTF-8', true);?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['nick'], ENT_QUOTES, 'UTF-8', true);?>
</p>
									<?php }?>
									<p class="text-[13px] text-[#6b7177] m-0"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date_format' ][ 0 ], array( $_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['create_date'],"%d-%m-%Y" ));?>
</p>
									<p class="text-[12px] text-[#999] m-0"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date_format' ][ 0 ], array( $_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['create_date'],"%H:%M" ));?>
</p>
								</li>
								<li>
									<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['id']),$_smarty_tpl ) );?>
" class="block no-underline text-inherit hover:text-[var(--brand-red)]">
										<h6 class="m-0 mb-2 text-[16px] font-bold text-[var(--brand-darker)]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['topic'], ENT_QUOTES, 'UTF-8', true);?>
</h6>
										<p class="m-0 text-[14px] leading-relaxed text-[#555]"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hideEmails' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'truncate' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strip_tags' ][ 0 ], array( $_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['content'],false )),160 )) ));?>
</p>
									</a>
								</li>
							</ul>
							<?php } else { ?>
							<p class="m-0 text-[14px] text-[#888]">Brak tematów w tej kategorii.</p>
							<?php }?>
						</li>
					</ul>
				</div>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
		</div>
	</section>

</div>
<?php }
}
