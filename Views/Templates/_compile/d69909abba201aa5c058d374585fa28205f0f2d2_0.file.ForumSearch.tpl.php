<?php
/* Smarty version 3.1.48, created on 2026-10-02 15:10:48
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/ForumSearch.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abfad586b2a85_33770735',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd69909abba201aa5c058d374585fa28205f0f2d2' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/ForumSearch.tpl',
      1 => 1790946539,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abfad586b2a85_33770735 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="search-forum" class="forum-search-box<?php if ($_smarty_tpl->tpl_vars['forum_search_wrapped']->value) {?> wrapped<?php }?>"<?php if ($_smarty_tpl->tpl_vars['forum_search_wrapped']->value) {?> style="display: none;"<?php }?>>
	<form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'search'),$_smarty_tpl ) );?>
" method="get" id="forum-filters-form" class="forum-search-form">
		<fieldset class="border-0 m-0 p-0 min-w-0">
			<div class="filters-box forum-search-grid">
				<div class="forum-search-field-wrap">
					<input id="forum-search-field" name="query" value="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['forum_search_query']->value)===null||$tmp==='' ? '' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Wpisz szukane słowo" type="text" autocomplete="off" class="forum-input">
				</div>
				<div class="forum-search-select-wrap select-wrapper">
					<div class="jui-select-box dark" id="category-select-box">
						<select id="category-select" name="cid" class="forum-select">
							<option value="0"<?php if (!$_smarty_tpl->tpl_vars['forum_search_cid']->value) {?> selected<?php }?>>W kategorii</option>
							<?php if ($_smarty_tpl->tpl_vars['forum_search_show_comments']->value) {?>
							<option value="100"<?php if ($_smarty_tpl->tpl_vars['forum_search_cid']->value == 100) {?> selected<?php }?>>Komentarze</option>
							<?php }?>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, '_item', false, '_key');
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_key']->value => $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['_key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['forum_search_cid']->value == $_smarty_tpl->tpl_vars['_key']->value) {?> selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['_item']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</option>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</select>
					</div>
				</div>
				<div class="forum-projects-box forum-search-project-wrap">
					<input id="forum-project-field" value="<?php if ($_smarty_tpl->tpl_vars['request']->value['project']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['request']->value['project'], ENT_QUOTES, 'UTF-8', true);
}?>" placeholder="<?php if ($_smarty_tpl->tpl_vars['request']->value['project']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['request']->value['project'], ENT_QUOTES, 'UTF-8', true);
} else { ?>Wpisz nazwę projektu<?php }?>" type="text" autocomplete="off" class="forum-input">
					<ul id="projects-holder" class="forum-autocomplete" style="display: none;"></ul>
				</div>
				<div class="forum-search-submit-wrap">
					<button type="submit" class="forum-btn forum-btn--primary">Szukaj</button>
				</div>
			</div>
			<input type="hidden" id="search-pid" name="pid" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['request']->value['pid'])===null||$tmp==='' ? 0 : $tmp);?>
">
		</fieldset>
	</form>
</div>
<?php }
}
