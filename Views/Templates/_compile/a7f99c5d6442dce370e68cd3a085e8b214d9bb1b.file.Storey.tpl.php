<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 08:30:43
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Pdf/Storey.tpl" */ ?>
<?php /*%%SmartyHeaderCode:152908807762b030333b53b1-97297755%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7f99c5d6442dce370e68cd3a085e8b214d9bb1b' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Pdf/Storey.tpl',
      1 => 1510315335,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152908807762b030333b53b1-97297755',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'projectPath' => 0,
    'cast' => 0,
    'mirrorPathPrefix' => 0,
    'projectSketchParams' => 0,
    '_param' => 0,
    'sketchParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b030333e77d6_38447856',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b030333e77d6_38447856')) {function content_62b030333e77d6_38447856($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.replace.php';
?><style>
	table {
		border-collapse: collapse;
		border-spacing: 0;
		border: none;
		font-size: 8pt;
	}

	table td {
		border: none;
	}
	
	table td.right {
		text-align: right;
	}
	
	table td.index {
		width: 24px;
	}
	
	table td.summary {
		font-weight: bold;
	}
</style>

<table cellpadding="0">
	<tr>
		<td style="width: 458px;">
			<table cellpadding="0" >
				<tr>
					<td>
						<img src="<?php echo $_smarty_tpl->tpl_vars['projectPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['cast']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['mirrorPathPrefix']->value;?>
<?php echo $_smarty_tpl->tpl_vars['cast']->value['filename'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['cast']->value['title'];?>
">
					</td>
				</tr>
			</table>
		</td>
		
		<td style="width: 16px;"></td>
		
		<td>
			<table cellpadding="0">
				<tr>
					<td>&nbsp;<br><?php echo smarty_modifier_replace(strtoupper($_smarty_tpl->tpl_vars['cast']->value['title']),"ę","Ę");?>
</td>
					<td class="right">&nbsp;<br>[m<sup>2</sup>]</td>
				</tr>
			</table>
			
			<table cellpadding="0">
				<tr>
					<td>&nbsp;</td>
				</tr>
			</table>
			
			<table cellpadding="0" style="width: 318px;">
			<?php  $_smarty_tpl->tpl_vars['_param'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_param']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projectSketchParams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_param']->key => $_smarty_tpl->tpl_vars['_param']->value){
$_smarty_tpl->tpl_vars['_param']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['_param']->value['sketch_id']==$_smarty_tpl->tpl_vars['cast']->value['id']){?>
				<tr>
					<td class="index"><?php echo $_smarty_tpl->tpl_vars['_param']->value['room_no'];?>
</td>
					<td<?php if ($_smarty_tpl->tpl_vars['sketchParams']->value[$_smarty_tpl->tpl_vars['_param']->value['sketch_param_id']]['name']=='razem'){?> class="summary"<?php }?>><?php echo $_smarty_tpl->tpl_vars['sketchParams']->value[$_smarty_tpl->tpl_vars['_param']->value['sketch_param_id']]['name'];?>
</td>
					<td class="right"><?php echo sprintf("%01.2f",$_smarty_tpl->tpl_vars['_param']->value['area']);?>
</td>
				</tr>				
				<?php }?>
			<?php } ?>
			</table>
		</td>
	</tr>
</table><?php }} ?>