<?php
/* Smarty version 3.1.48, created on 2026-09-07 21:44:50
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/displayBox.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a9f1432258a60_97189606',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c61112168714dd44625611bef892865dc8bbc4d' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/displayBox.tpl',
      1 => 1788766776,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Include/ProjectTeaserCard.tpl' => 1,
  ),
),false)) {
function content_6a9f1432258a60_97189606 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['listCards']->value) {?>
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 items-stretch fav-wrapper" id="project-list">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listCards']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
	<?php $_smarty_tpl->_subTemplateRender("file:Include/ProjectTeaserCard.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('item'=>$_smarty_tpl->tpl_vars['item']->value,'teaser_interactive'=>true), 0, true);
?>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

	<div class="cat-advisor-tile bg-[#ececec] p-6 flex flex-col h-full min-h-[420px] border border-[#f5f5f5]">
		<h3 class="text-[24px] font-bold text-[#222] leading-tight">Porozmawiaj<br>z doradcą</h3>
		<p class="text-[13px] text-[#222] mt-3 leading-relaxed">
			Potrzebujesz porady? Nie wiesz, jaki projekt będzie odpowiedni na swoją działkę. Zadzwoń lub napisz - pomożemy
		</p>
		<div class="mt-4 text-[20px] font-bold text-[#222] leading-tight">
			<?php if ($_smarty_tpl->tpl_vars['contact']->value['phone1']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['contact']->value['phone1'], ENT_QUOTES, 'UTF-8', true);
} else { ?>33 822 94 96<?php }?><br>
			<?php if ($_smarty_tpl->tpl_vars['contact']->value['phone2']) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['contact']->value['phone2'], ENT_QUOTES, 'UTF-8', true);
} else { ?>602 303 160<?php }?>
		</div>
		<a href="/znajdziemy-dla-ciebie-projekt.html"
			class="mt-auto inline-flex items-center justify-center bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white text-[12px] font-bold px-4 py-3 w-full tracking-wide text-center">
			ZNAJDŹ DOM DLA SIEBIE
		</a>
	</div>
</div>
<?php } else { ?>
<div class="container" id="project-list">
	<section>
		<div class="list-grid fav-wrapper" id="overlay-group">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, '_project');
$_smarty_tpl->tpl_vars['_project']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_project']->value) {
$_smarty_tpl->tpl_vars['_project']->do_else = false;
?>
			<div>
				<figure>
					<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'box'),$_smarty_tpl ) );?>
" alt="Projekt domu <?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
" width="640" height="427" loading="lazy">
					<figcaption>
						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['_project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
">
							<span>projekt domu</span>
							<strong><?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
 <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'usableArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'] ));?>
 m<sup>2</sup></span></strong>
						</a>
					</figcaption>
				</figure>
				<span id="compare-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="compare<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['compareIds']->value)) {?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
				<span id="fav-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="fav<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['favouriteIds']->value)) {?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
			</div>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	</section>
</div>
<?php }
}
}
