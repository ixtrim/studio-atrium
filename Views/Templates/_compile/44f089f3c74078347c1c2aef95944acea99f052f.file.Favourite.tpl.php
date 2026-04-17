<?php /* Smarty version Smarty-3.1.11, created on 2022-06-21 12:29:57
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Ajax/Favourite.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212841735062b1b9c5a11665-15339773%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44f089f3c74078347c1c2aef95944acea99f052f' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Ajax/Favourite.tpl',
      1 => 1548326918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212841735062b1b9c5a11665-15339773',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    '_project' => 0,
    'compareIds' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b1b9c5a21806_38973649',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b1b9c5a21806_38973649')) {function content_62b1b9c5a21806_38973649($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['list']->value){?>
	<ul id="fav-list" data-count="<?php echo count($_smarty_tpl->tpl_vars['list']->value);?>
">
	<?php  $_smarty_tpl->tpl_vars['_project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_project']->key => $_smarty_tpl->tpl_vars['_project']->value){
$_smarty_tpl->tpl_vars['_project']->_loop = true;
?>
		<li id="fav-box-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
">
			<ul>
				<li>
					<input type="checkbox" name="compare[]" value="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" id="cc-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['compareIds']->value)){?> checked<?php }?>><label for="cc-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
">&nbsp;</label>
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['_project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
">
						<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'thumb'),$_smarty_tpl);?>
" alt="Projekt - <?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>

					</a>
				</li>
				<li><span class="remove fav on" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" data-remove="fav-box-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span></li>
			</ul>
		</li>
	<?php } ?>
	</ul>

	<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'favourite','action'=>'compare'),$_smarty_tpl);?>
" class="framed compare">Porównaj zaznaczone</a>
	<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'favourite','action'=>'list'),$_smarty_tpl);?>
" class="framed fav-list">Lista ulubionych</a>

<?php }else{ ?>
	<p class="msg">Nie masz ulubionych projektów.</p>
<?php }?><?php }} ?>