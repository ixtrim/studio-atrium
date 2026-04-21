<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 08:46:45
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/ProjectExtend/Sketch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25241632362b033f5b99022-64519865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8580b013c694b43769723a2014164774e8a6ad80' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/ProjectExtend/Sketch.tpl',
      1 => 1604582708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25241632362b033f5b99022-64519865',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'props' => 0,
    'request' => 0,
    'project' => 0,
    'storey' => 0,
    'projectParams' => 0,
    'projectSketchParams' => 0,
    '_param' => 0,
    'sketchId' => 0,
    'sketchParams' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b033f5bba879_33468371',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b033f5bba879_33468371')) {function content_62b033f5bba879_33468371($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.replace.php';
?><div class="project-box spaced" id="measure-box">
	<div class="render-box measure-box">
		<div id="canvas-box" data-scale="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['props']->value['factor'],',','.');?>
" data-height="<?php echo $_smarty_tpl->tpl_vars['props']->value['height'];?>
">
		<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
			<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value,'storey'=>$_smarty_tpl->tpl_vars['storey']->value,'mirror'=>1),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
 - rzut kondygnacji">
		<?php }else{ ?>
			<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value,'storey'=>$_smarty_tpl->tpl_vars['storey']->value),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
 - rzut kondygnacji">
		<?php }?>
			<canvas id="canvas"></canvas>
			<span id="label" style="display: none;"></span>
			<span id="labelX" class="distance" style="display: none;"></span>
			<span id="labelY" class="distance" style="display: none;"></span>
		</div>
	</div>

	<div class="data-box measure">
		<h1 class="sketch"><?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
 <span>mierzenie projektu</span></h1>
		
		<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>'projekty-domow','version'=>'lustro'),$_smarty_tpl);?>
" class="framed">Powrót do projektu</a>
		<?php }else{ ?>
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
" class="framed">Powrót do projektu</a>
		<?php }?>
		
		<div class="inner-box">
			<ul class="link-box<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasMirror'][0][0]->mHasMirror($_smarty_tpl->tpl_vars['projectParams']->value)){?> three<?php }?>">
			<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasMirror'][0][0]->mHasMirror($_smarty_tpl->tpl_vars['projectParams']->value)){?>
				<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
					<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapStoreyCatalog'][0][0]->mMapStoreyCatalog($_smarty_tpl->tpl_vars['props']->value['storey'])),$_smarty_tpl);?>
" class="mirror">Zobacz <br>wersję podstawową</a></li>
				<?php }else{ ?>
					<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'version'=>'lustro','catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapStoreyCatalog'][0][0]->mMapStoreyCatalog($_smarty_tpl->tpl_vars['props']->value['storey'])),$_smarty_tpl);?>
" class="mirror on">Zobacz <br>odbicie lustrzane</a></li>
				<?php }?>
			<?php }?>
				<li><a href="javascript:" class="distance active" id="line">Zmierz <br>odległość</a></li>
				<li><a href="javascript:" class="area" id="area">Zmierz <br>powierzchnię</a></li>
			</ul>
		</div>
	
		<?php $_smarty_tpl->_capture_stack[0][] = array("chambers", null, null); ob_start(); ?>
			<table class="tech">
				<?php  $_smarty_tpl->tpl_vars['_param'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_param']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projectSketchParams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_param']->key => $_smarty_tpl->tpl_vars['_param']->value){
$_smarty_tpl->tpl_vars['_param']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['_param']->value['sketch_id']==$_smarty_tpl->tpl_vars['sketchId']->value){?>	
					<tr>
						<?php if ($_smarty_tpl->tpl_vars['sketchParams']->value[$_smarty_tpl->tpl_vars['_param']->value['sketch_param_id']]['name']!='razem'){?>
						<td>
							<?php echo $_smarty_tpl->tpl_vars['_param']->value['room_no'];?>

							<?php echo $_smarty_tpl->tpl_vars['sketchParams']->value[$_smarty_tpl->tpl_vars['_param']->value['sketch_param_id']]['name'];?>

						</td>
						<td>
							<?php echo number_format($_smarty_tpl->tpl_vars['_param']->value['area'],2,',',' ');?>

						</td>
						<?php }else{ ?>
							<?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['_param']->value['area'], null, 0);?>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						<?php }?>
					</tr>
				<?php }?>
				<?php } ?>
			</table>
		<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	
		<h4><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapStorey'][0][0]->mMapStorey($_smarty_tpl->tpl_vars['props']->value['storey']);?>
<span><?php echo number_format($_smarty_tpl->tpl_vars['total']->value,2,',',' ');?>
 m<sup>2</sup></span></h4>
		<?php echo Smarty::$_smarty_vars['capture']['chambers'];?>

	</div>
</div><?php }} ?>