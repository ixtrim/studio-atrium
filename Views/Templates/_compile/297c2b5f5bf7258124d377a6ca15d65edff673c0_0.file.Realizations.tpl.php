<?php
/* Smarty version 3.1.48, created on 2026-09-23 16:51:50
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Realizations.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6ab3e786989a71_96006667',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '297c2b5f5bf7258124d377a6ca15d65edff673c0' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Realizations.tpl',
      1 => 1776175196,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Include/Pager.tpl' => 2,
  ),
),false)) {
function content_6ab3e786989a71_96006667 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="list-header realisation<?php if ($_smarty_tpl->tpl_vars['page']->value == 1) {?> activated<?php }?>">
	<div>
		<div class="header-wrapper">
			<div>
				<h1><span>Realizacje<?php if ($_smarty_tpl->tpl_vars['action']->value == 'Realizations') {?> projektów<?php } elseif ($_smarty_tpl->tpl_vars['action']->value == 'RealizationsInterior') {?> wnętrz<?php } elseif ($_smarty_tpl->tpl_vars['action']->value == 'RealizationsBuilding') {?> w budowie<?php }?></span></h1>
				<p>Poniżej znajdują się zdjęcia<?php if ($_smarty_tpl->tpl_vars['action']->value == 'Realizations') {?> gotowych<?php }?> realizacji <?php if ($_smarty_tpl->tpl_vars['action']->value == 'RealizationsInterior') {?>wnętrz <?php }?>projektów Studia Atrium<?php if ($_smarty_tpl->tpl_vars['action']->value == 'RealizationsBuilding') {?> w trakcie budowy<?php }?>. Jeśli wybudowałeś<?php if ($_smarty_tpl->tpl_vars['action']->value == 'RealizationsBuilding') {?> lub budujesz<?php }?> dom wg naszej dokumentacji i chciałbyś się nim pochwalić, zapraszamy do wzięcia udziału w trwającym nieustannie FOTOKONKURSIE. <a href="/konkurs/fotograficzny.html">Zobacz szczegóły</a></p>
			</div>
		</div>
	</div>
</div>
<div class="control-box">
	<ul>
		<li class="paths"><a href="/">projekty domów</a> &raquo; <a href="/projekty-domow/" class="all">wszystkie</a> <span>znalezionych zdjęć realizacji: <strong><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong></span></li>
		<li><strong>zobacz: </strong>		
		<?php if ($_smarty_tpl->tpl_vars['action']->value != 'Realizations') {?><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'realizations'),$_smarty_tpl ) );?>
">realizacje projektów &raquo;</a> <?php }?>
		<?php if ($_smarty_tpl->tpl_vars['action']->value != 'RealizationsInterior') {?><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'realizations_interior'),$_smarty_tpl ) );?>
">realizacje wnętrz &raquo;</a> <?php }?>
		<?php if ($_smarty_tpl->tpl_vars['action']->value != 'RealizationsBuilding') {?><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'realizations_building'),$_smarty_tpl ) );?>
">domy w budowie &raquo;</a><?php }?></li>
		<?php if ($_smarty_tpl->tpl_vars['pages']->value > 1) {?>
		<li>
			<?php $_smarty_tpl->_subTemplateRender("file:Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value), 0, false);
?>
		</li>
		<?php }?>
	</ul>
</div>

<div class="container" id="realization-list">
	<section>
		<div class="grid">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['realisations']->value, '_item');
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
?>
		<figure class="effect-sadie">
			<?php if ($_smarty_tpl->tpl_vars['action']->value == 'Realizations') {?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['projectPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['path'];?>
/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['filename'],"realizacja-","realizacja-317-" ));?>
" alt="Projekt domu <?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
 - realizacja" width="475" height="317">
			<?php } elseif ($_smarty_tpl->tpl_vars['action']->value == 'RealizationsBuilding') {?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['projectPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['path'];?>
/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['filename'],"budowa-","budowa-317-" ));?>
" alt="Projekt domu <?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
 w budowie" width="475" height="317">
			<?php } elseif ($_smarty_tpl->tpl_vars['action']->value == 'RealizationsInterior') {?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['projectPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['path'];?>
/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['filename'],"budowa-","budowa-317-" ));?>
" alt="Realizacja wnętrza projektu domu <?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
" width="475" height="317">
			<?php }?>			

			<?php if ($_smarty_tpl->tpl_vars['_item']->value['discount']) {?><span class="label discount">rabat <?php echo $_smarty_tpl->tpl_vars['_item']->value['discount'];?>
</span><?php }?>
			<span class="close-sadie"></span>

			<figcaption>
				<h6><?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
</h6>
				<div>
					<p>pow. użytkowa: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'usableArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'] ));?>
 <span>m<sup>2</sup></p>
					<p>działka minimalna: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'parcelWidth' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'] ));?>
 x <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'parcelHeight' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'] ));?>
 m</p>
					<p class="desc"><?php if ($_smarty_tpl->tpl_vars['_item']->value['description']) {
echo $_smarty_tpl->tpl_vars['_item']->value['description'];
} else {
echo $_smarty_tpl->tpl_vars['_item']->value['object']['short_description'];
}?></p>
				</div>
				<span class="framed"><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_item']->value['object']['id'],'link_title'=>$_smarty_tpl->tpl_vars['_item']->value['object']['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
"><span>Zobacz projekt</span></a></span>
				<a href="<?php echo $_smarty_tpl->tpl_vars['projectPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['filename'];?>
" data-fancybox="gallery" data-caption="Projekt domu <?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
 - realizacja<?php if ($_smarty_tpl->tpl_vars['action']->value == 'RealizationsBuilding') {?> w budowie<?php }
if ($_smarty_tpl->tpl_vars['_item']->value['description']) {?>. <?php echo $_smarty_tpl->tpl_vars['_item']->value['description'];
}?>"><span class="mobile-sadie"><?php if ($_smarty_tpl->tpl_vars['action']->value == 'RealizationsBuilding') {?>projekt domu<?php } else { ?>realizacja <?php if ($_smarty_tpl->tpl_vars['action']->value == 'RealizationsInterior') {?>wnętrza <?php }?>projektu domu<?php }?> <?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hasFloor' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'],true ))) {?>piętrowego<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hasLoft' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'],true ))) {?>z poddaszem<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isGroundFloor' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'],true ))) {?>parterowego<?php }
if ($_smarty_tpl->tpl_vars['action']->value == 'RealizationsBuilding') {?> w budowie<?php }?> <strong><?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
 <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'usableArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'] ));?>
 m<sup>2</sup></span></strong></span></a>
			</figcaption>
		</figure>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		<?php if ($_smarty_tpl->tpl_vars['pages']->value > 1 && $_smarty_tpl->tpl_vars['page']->value != $_smarty_tpl->tpl_vars['pages']->value) {?>
			<figure class="effect-sadie nextPage">
				<img src="/img/next.png" alt="następna strona">
				<figcaption>
					<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
">następna strona</a>
				</figcaption>	
			</figure>
		<?php }?>
		</div>
	</section>
</div>

<?php if ($_smarty_tpl->tpl_vars['pages']->value > 1) {?>
<div class="wrapper">
	<div class="box">
		<div class="control-box">
			<ul>
				<li>
					<?php $_smarty_tpl->_subTemplateRender("file:Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value), 0, true);
?>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php }
}
}
