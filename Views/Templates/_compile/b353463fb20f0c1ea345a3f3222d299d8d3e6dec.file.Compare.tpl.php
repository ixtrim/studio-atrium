<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 10:07:32
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Favourite/Compare.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142260040462b046e430f489-10313657%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b353463fb20f0c1ea345a3f3222d299d8d3e6dec' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Favourite/Compare.tpl',
      1 => 1548757490,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142260040462b046e430f489-10313657',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    '_project' => 0,
    'isLocal' => 0,
    'storeys' => 0,
    'storey' => 0,
    'paramIds' => 0,
    '_paramId' => 0,
    'params' => 0,
    'paramsMap' => 0,
    'isDisplayed' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b046e433ca98_77313194',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b046e433ca98_77313194')) {function content_62b046e433ca98_77313194($_smarty_tpl) {?><div class="wrapper white">
	<div class="box">
		<div class="head-wrapper">
			<h1>Porównanie projektów</h1>
			<a class="framed" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'favourite','action'=>'list'),$_smarty_tpl);?>
">Zamknij porównanie</a>
		</div>
		
		<?php if ($_smarty_tpl->tpl_vars['list']->value){?>
		<div class="swipe-box"><img id="swipe" src="/img/swipe.png" alt="Przesuń by porównać" style="display: none;"></div>
		
		<div class="table-scroll-box" id="table-scroll-box">
		<div class="table-wrapper">
		<table id="compare-table">
			<tr>
				<th>Nazwa</th>
				<?php  $_smarty_tpl->tpl_vars['_project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_project']->key => $_smarty_tpl->tpl_vars['_project']->value){
$_smarty_tpl->tpl_vars['_project']->_loop = true;
?>
				<td><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['_project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
"><?php if ($_smarty_tpl->tpl_vars['isLocal']->value){?><small style="font-size: 1.2rem;">(<?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
)</small> <?php }?><?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
</a></td>
				<?php } ?>
			</tr>
			
			<tr>
				<th>Render</th>
				<?php  $_smarty_tpl->tpl_vars['_project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_project']->key => $_smarty_tpl->tpl_vars['_project']->value){
$_smarty_tpl->tpl_vars['_project']->_loop = true;
?>
				<td>
					<a data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'presentation'),$_smarty_tpl);?>
">
						<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
">
					</a>
				</td>
				<?php } ?>
			</tr>
			
			<?php  $_smarty_tpl->tpl_vars['storey'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['storey']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['storeys']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['storey']->key => $_smarty_tpl->tpl_vars['storey']->value){
$_smarty_tpl->tpl_vars['storey']->_loop = true;
?>
			<tr>
				<th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapStorey'][0][0]->mMapStorey($_smarty_tpl->tpl_vars['storey']->value);?>
</th>
				<?php  $_smarty_tpl->tpl_vars['_project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_project']->key => $_smarty_tpl->tpl_vars['_project']->value){
$_smarty_tpl->tpl_vars['_project']->_loop = true;
?>
					<td>
						<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasSketch'][0][0]->mHasSketch($_smarty_tpl->tpl_vars['_project']->value,$_smarty_tpl->tpl_vars['storey']->value)){?>
						<a data-fancybox="<?php echo $_smarty_tpl->tpl_vars['storey']->value;?>
" data-caption="<?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
 - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapStorey'][0][0]->mMapStorey($_smarty_tpl->tpl_vars['storey']->value);?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value,'storey'=>$_smarty_tpl->tpl_vars['storey']->value),$_smarty_tpl);?>
">
							<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value,'storey'=>$_smarty_tpl->tpl_vars['storey']->value),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapStorey'][0][0]->mMapStorey($_smarty_tpl->tpl_vars['storey']->value);?>
 - rzut kondygnacji - <?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
">
						</a>
						<?php }else{ ?>
							-
						<?php }?>
					</td>
				<?php } ?>
			</tr>			
			<?php } ?>
			
			<tr>
				<th>Cena</th>
				<?php  $_smarty_tpl->tpl_vars['_project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_project']->key => $_smarty_tpl->tpl_vars['_project']->value){
$_smarty_tpl->tpl_vars['_project']->_loop = true;
?>
				<td><?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><strike><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
</strike> <?php echo $_smarty_tpl->tpl_vars['_project']->value['price']-$_smarty_tpl->tpl_vars['_project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
<?php }?> <span>zł</span></td>
				<?php } ?>
			</tr>
			
			<?php  $_smarty_tpl->tpl_vars['_paramId'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_paramId']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['paramIds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_paramId']->key => $_smarty_tpl->tpl_vars['_paramId']->value){
$_smarty_tpl->tpl_vars['_paramId']->_loop = true;
?>
			
			<?php $_smarty_tpl->_capture_stack[0][] = array("params", null, null); ob_start(); ?>
			<?php $_smarty_tpl->tpl_vars['isDisplayed'] = new Smarty_variable(0, null, 0);?>
			<tr>
				<th><?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_paramId']->value]['name'];?>
</th>
				<?php  $_smarty_tpl->tpl_vars['_project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_project']->key => $_smarty_tpl->tpl_vars['_project']->value){
$_smarty_tpl->tpl_vars['_project']->_loop = true;
?>
				<td>
					<?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_paramId']->value]['value_type']=='string'){?>
						<?php if ($_smarty_tpl->tpl_vars['paramsMap']->value[$_smarty_tpl->tpl_vars['_project']->value['id']][$_smarty_tpl->tpl_vars['_paramId']->value]['string_value']){?>
							<?php echo $_smarty_tpl->tpl_vars['paramsMap']->value[$_smarty_tpl->tpl_vars['_project']->value['id']][$_smarty_tpl->tpl_vars['_paramId']->value]['string_value'];?>
 <span><?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_paramId']->value]['unit'];?>
</span>
							<?php $_smarty_tpl->tpl_vars['isDisplayed'] = new Smarty_variable(1, null, 0);?>
						<?php }else{ ?>
							-
						<?php }?>
					<?php }else{ ?>
						<?php if ($_smarty_tpl->tpl_vars['paramsMap']->value[$_smarty_tpl->tpl_vars['_project']->value['id']][$_smarty_tpl->tpl_vars['_paramId']->value]['num_value']){?>
							<?php echo $_smarty_tpl->tpl_vars['paramsMap']->value[$_smarty_tpl->tpl_vars['_project']->value['id']][$_smarty_tpl->tpl_vars['_paramId']->value]['num_value'];?>
 <span><?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_paramId']->value]['unit'];?>
</span>
							<?php $_smarty_tpl->tpl_vars['isDisplayed'] = new Smarty_variable(1, null, 0);?>
						<?php }else{ ?>
							-
						<?php }?>
					<?php }?>
				</td>
				<?php } ?>
			</tr>
			<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
				
			<?php if ($_smarty_tpl->tpl_vars['isDisplayed']->value){?>
				<?php echo Smarty::$_smarty_vars['capture']['params'];?>

			<?php }?>
			
			<?php } ?>
		</table>
		</div>
		</div>
		
		<?php }else{ ?>
			<p class="nope">Nie dodano projektów do porównania</p>
		<?php }?>
	</div>
</div>
<?php }} ?>