<?php
/* Smarty version 3.1.48, created on 2026-10-01 22:14:28
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Article/Item.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abebf24a0ccf5_32858685',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6750fc4faa996045b9bb3af9c4546f61b07b35c1' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Article/Item.tpl',
      1 => 1790885656,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abebf24a0ccf5_32858685 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('backTagId', null);
$_smarty_tpl->_assignInScope('backTagLabel', '');
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['documentTags']->value, 'tag', false, 'tid');
$_smarty_tpl->tpl_vars['tag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tid']->value => $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->do_else = false;
?>
	<?php if ($_smarty_tpl->tpl_vars['allTags']->value['main'][$_smarty_tpl->tpl_vars['tid']->value]) {?>
		<?php $_smarty_tpl->_assignInScope('backTagId', $_smarty_tpl->tpl_vars['tid']->value);?>
		<?php $_smarty_tpl->_assignInScope('backTagLabel', $_smarty_tpl->tpl_vars['allTags']->value['main'][$_smarty_tpl->tpl_vars['tid']->value]);?>
		<?php break 1;?>
	<?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[rgb(229,229,229)] py-[12px]">
	<div class="max-w-[1480px] mx-auto px-8">
		<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[rgb(107,107,107)] font-normal">
			<li><a href="/" class="hover:text-[rgb(34,34,34)] transition-colors">Studio Atrium</a></li>
			<li aria-hidden="true" class="text-[rgb(189,189,189)]">»</li>
			<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'article','action'=>'hash_tag'),$_smarty_tpl ) );?>
" class="hover:text-[rgb(34,34,34)] transition-colors">Baza wiedzy</a></li>
			<?php if ($_smarty_tpl->tpl_vars['backTagId']->value) {?>
			<li aria-hidden="true" class="text-[rgb(189,189,189)]">»</li>
			<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'article','action'=>'hash_tag','id'=>$_smarty_tpl->tpl_vars['backTagId']->value),$_smarty_tpl ) );?>
" class="hover:text-[rgb(34,34,34)] transition-colors"><?php echo htmlspecialchars(ucfirst($_smarty_tpl->tpl_vars['backTagLabel']->value), ENT_QUOTES, 'UTF-8', true);?>
</a></li>
			<?php }?>
			<li aria-hidden="true" class="text-[rgb(189,189,189)]">»</li>
			<li aria-current="page" class="text-[rgb(107,107,107)]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</li>
		</ol>
	</div>
</nav>

<article id="article-2026" class="bg-white py-12">
	<div class="article-shell">
		<div class="flex flex-wrap items-center justify-between gap-4 mb-6">
			<p class="m-0">
				<?php if ($_smarty_tpl->tpl_vars['backTagId']->value) {?>
				<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'article','action'=>'hash_tag','id'=>$_smarty_tpl->tpl_vars['backTagId']->value),$_smarty_tpl ) );?>
" class="text-[14px] text-[var(--brand-blue-strong)] hover:underline">Powrót do „<?php echo htmlspecialchars(ucfirst($_smarty_tpl->tpl_vars['backTagLabel']->value), ENT_QUOTES, 'UTF-8', true);?>
”</a>
				<?php } else { ?>
				<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'article','action'=>'hash_tag'),$_smarty_tpl ) );?>
" class="text-[14px] text-[var(--brand-blue-strong)] hover:underline">Powrót do bazy wiedzy</a>
				<?php }?>
			</p>
			<div class="flex items-center gap-5 text-[14px] text-[var(--brand-blue-strong)]">
				<span class="net cursor-pointer hover:underline" role="button" tabindex="0">Udostępnij</span>
				<span class="print cursor-pointer hover:underline" data-docid="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" title="drukuj artykuł" role="button" tabindex="0">Drukuj</span>
			</div>
		</div>

		<h1 class="article-title text-[32px] md:text-[38px] font-bold text-[var(--brand-darker)] leading-tight mb-5 normal-case tracking-normal"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h1>

		<?php if ($_smarty_tpl->tpl_vars['documentTags']->value) {?>
		<div class="flex flex-wrap items-center gap-3 text-[14px] text-[var(--brand-blue-strong)] mb-10">
			<?php $_smarty_tpl->_assignInScope('tagShown', 0);?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['documentTags']->value, 'tag', false, 'tid');
$_smarty_tpl->tpl_vars['tag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tid']->value => $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->do_else = false;
?>
				<?php if ($_smarty_tpl->tpl_vars['allTags']->value['main'][$_smarty_tpl->tpl_vars['tid']->value]) {?>
					<?php if ($_smarty_tpl->tpl_vars['tagShown']->value) {?><span class="text-black/30" aria-hidden="true">|</span><?php }?>
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'article','action'=>'hash_tag','id'=>$_smarty_tpl->tpl_vars['tid']->value),$_smarty_tpl ) );?>
" class="hover:underline"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['allTags']->value['main'][$_smarty_tpl->tpl_vars['tid']->value], ENT_QUOTES, 'UTF-8', true);?>
</a>
					<?php $_smarty_tpl->_assignInScope('tagShown', 1);?>
				<?php } elseif ($_smarty_tpl->tpl_vars['allTags']->value['normal'][$_smarty_tpl->tpl_vars['tid']->value]) {?>
					<?php if ($_smarty_tpl->tpl_vars['tagShown']->value) {?><span class="text-black/30" aria-hidden="true">|</span><?php }?>
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'article','action'=>'hash_tag','id'=>$_smarty_tpl->tpl_vars['tid']->value),$_smarty_tpl ) );?>
" class="hover:underline"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['allTags']->value['normal'][$_smarty_tpl->tpl_vars['tid']->value], ENT_QUOTES, 'UTF-8', true);?>
</a>
					<?php $_smarty_tpl->_assignInScope('tagShown', 1);?>
				<?php }?>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
		<?php }?>

		<div class="article-content"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'fixArticleContent' ][ 0 ], array( $_smarty_tpl->tpl_vars['article']->value['content'],$_smarty_tpl->tpl_vars['article']->value['id'] ));?>
</div>
	</div>
</article>

<div class="blue-overlay share" id="links-pop">
	<div id="links-wrapper">
		<p class="pop-header">Prześlij znajomemu</p>

		<p class="nocaps">Wypełnij poniższy formularz i prześlij link do artykułu znajomemu.</p>

		<form method="post" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'article','action'=>'send'),$_smarty_tpl ) );?>
" id="links-form" data-docid="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">
			<input name="module" type="hidden" value="article">
			<input name="action" type="hidden" value="send">

			<p>
				<label for="receiver-email" class="black">E-mail odbiorcy</label>
				<input type="text" name="receiver_email" id="receiver-email" class="long">
			</p>

			<p>
				<label for="sender-email" class="black">Twój e-mail</label>
				<input type="text" name="sender_email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
" id="sender-email" class="long">
			</p>

			<p>
				<label for="sender-sign" class="black">Twój podpis</label>
				<input type="text" name="signature" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['surname'];?>
" id="sender-sign" class="long">
			</p>

			<p class="last"><input id="links_button" type="submit" value="wyślij" class="baton"></p>
			<p class="nocaps" id="links-fail-box" style="display: none;">Wypełnij poprawnie formularz</p>
		</form>
	</div>
	<button type="button" id="share-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>
<?php }
}
