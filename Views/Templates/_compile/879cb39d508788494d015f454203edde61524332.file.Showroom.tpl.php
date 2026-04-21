<?php /* Smarty version Smarty-3.1.11, created on 2023-03-09 12:37:21
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Ajax/Showroom.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210722748963f72c384f5728-95584246%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '879cb39d508788494d015f454203edde61524332' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Ajax/Showroom.tpl',
      1 => 1678365412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210722748963f72c384f5728-95584246',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_63f72c38544108_11235964',
  'variables' => 
  array (
    'authorizations' => 0,
    'project' => 0,
    '_render' => 0,
    'value' => 0,
    'products' => 0,
    'showroomPath' => 0,
    'iconFilename' => 0,
    'filename' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63f72c38544108_11235964')) {function content_63f72c38544108_11235964($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['authorizations']->value){?>
<div class="wrapper ajaxed" id="showroom" style="display: none;">
	<div class="box">
	<?php if ($_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectInterior']){?>
		<?php  $_smarty_tpl->tpl_vars['_render'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_render']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectInterior']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_render']->iteration=0;
 $_smarty_tpl->tpl_vars['_render']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_render']->key => $_smarty_tpl->tpl_vars['_render']->value){
$_smarty_tpl->tpl_vars['_render']->_loop = true;
 $_smarty_tpl->tpl_vars['_render']->iteration++;
 $_smarty_tpl->tpl_vars['_render']->index++;
?>
		
			<?php if ($_smarty_tpl->tpl_vars['authorizations']->value[$_smarty_tpl->tpl_vars['_render']->value['id']]){?>
			<div class="showroom small">
				<?php if ($_smarty_tpl->tpl_vars['_render']->value['props']['image_size']['width']>1350){?>
					<img class="render" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'interior','project'=>$_smarty_tpl->tpl_vars['project']->value,'size'=>'presentation','no'=>$_smarty_tpl->tpl_vars['_render']->index),$_smarty_tpl);?>
" width="1350" height="900" alt="Wnętrze projektu <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
 - wizualizacja <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
">
				<?php }else{ ?>
					<img class="render" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'interior','project'=>$_smarty_tpl->tpl_vars['project']->value,'size'=>'presentation','no'=>$_smarty_tpl->tpl_vars['_render']->index),$_smarty_tpl);?>
" width="1350" height="900" alt="Wnętrze projektu <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
 - wizualizacja <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
">
				<?php }?>

				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['authorizations']->value[$_smarty_tpl->tpl_vars['_render']->value['id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
					<?php $_smarty_tpl->tpl_vars['filename'] = new Smarty_variable((($_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['attachments']['ShowroomImage'][0]['path']).('/')).($_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['attachments']['ShowroomImage'][0]['filename']), null, 0);?>
					<?php $_smarty_tpl->tpl_vars['iconFilename'] = new Smarty_variable((($_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['attachments']['ShowroomImage'][0]['path']).('/')).($_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['attachments']['ShowroomImage'][0]['childAttachments']['thumb'][0]['filename']), null, 0);?>

					<div class="showroom-box" data-x="<?php echo $_smarty_tpl->tpl_vars['value']->value['left'];?>
" data-y="<?php echo $_smarty_tpl->tpl_vars['value']->value['top'];?>
" data-icon="<?php echo $_smarty_tpl->tpl_vars['showroomPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['iconFilename']->value;?>
" data-img="<?php echo $_smarty_tpl->tpl_vars['showroomPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
" data-producer="<?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['producer'];?>
<p style='color: #000;'><?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['name'];?>
</p>" data-descript="<?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['short_descript'];?>
" data-link="<?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['link'];?>
" style="top: <?php echo $_smarty_tpl->tpl_vars['value']->value['top'];?>
px; left:<?php echo $_smarty_tpl->tpl_vars['value']->value['top'];?>
px;">
						<div class="label">
							
							<a href="javascript:">&#128309;</a>
						</div>
					</div>
				<?php } ?>
				
				<span class="showroom-switch small" data-state="on">wyłącz podgląd produktów</span>
			</div>
			<?php }?>
		<?php } ?>
	<?php }?>
	</div>
</div>
<?php }else{ ?>
<div class="wrapper ajaxed" id="showroom">
	<div class="box">
		<p class="red">Nie znaleziono produktów.</p>
	</div>
</div>
<?php }?><?php }} ?>