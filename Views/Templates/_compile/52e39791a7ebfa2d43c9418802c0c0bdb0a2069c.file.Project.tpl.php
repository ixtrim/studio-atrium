<?php /* Smarty version Smarty-3.1.11, created on 2025-02-25 08:53:20
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Pdf/Project.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159673917467bd8500584491-26725530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52e39791a7ebfa2d43c9418802c0c0bdb0a2069c' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Pdf/Project.tpl',
      1 => 1561552855,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159673917467bd8500584491-26725530',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'project' => 0,
    'projectPath' => 0,
    'mirrorPathPrefix' => 0,
    'start' => 0,
    'max' => 0,
    'hasBlind' => 0,
    'projectParams' => 0,
    'costs' => 0,
    'projectSketchParams' => 0,
    '_param' => 0,
    'sketchParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_67bd8500602ab3_27895367',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_67bd8500602ab3_27895367')) {function content_67bd8500602ab3_27895367($_smarty_tpl) {?><style>
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

<?php $_smarty_tpl->tpl_vars['start'] = new Smarty_variable(0, null, 0);?>
<?php $_smarty_tpl->tpl_vars['max'] = new Smarty_variable(3, null, 0);?>

<?php if (count($_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectInterior'])>0){?>
	<?php if (count($_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectRender'])>2){?><?php $_smarty_tpl->tpl_vars['start'] = new Smarty_variable(1, null, 0);?><?php }?>
	<?php $_smarty_tpl->tpl_vars['max'] = new Smarty_variable(2, null, 0);?>
<?php }else{ ?>
	<?php if (count($_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectRender'])>3){?>
		<?php $_smarty_tpl->tpl_vars['start'] = new Smarty_variable(1, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['max'] = new Smarty_variable(3, null, 0);?>
	<?php }?>
	
	<?php if (count($_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectRender'])<3){?>
		<?php $_smarty_tpl->tpl_vars['max'] = new Smarty_variable(2, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['hasBlind'] = new Smarty_variable(1, null, 0);?>
	<?php }?>
<?php }?>

<table cellpadding="0">
	<tr>
		<td style="width: 458px;">
			<table cellpadding="0" >
				<tr>
					<td>
						<img src="<?php echo $_smarty_tpl->tpl_vars['projectPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectRender'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['mirrorPathPrefix']->value;?>
<?php echo $_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectRender'][0]['filename'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
">
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>
						<table cellpadding="0" style="width: 742px;">
							<tr>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['_icons'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectRender']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['name'] = '_icons';
$_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['start'] = (int)$_smarty_tpl->tpl_vars['start']->value;
$_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['max'] = (int)$_smarty_tpl->tpl_vars['max']->value;
$_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['_icons']['total']);
?>
									<?php if (!$_smarty_tpl->getVariable('smarty')->value['section']['_icons']['first']){?><td style="width: 6px;"></td><?php }?>
									<td>
										<img src="<?php echo $_smarty_tpl->tpl_vars['projectPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectRender'][$_smarty_tpl->getVariable('smarty')->value['section']['_icons']['index']]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['mirrorPathPrefix']->value;?>
<?php echo $_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectRender'][$_smarty_tpl->getVariable('smarty')->value['section']['_icons']['index']]['filename'];?>
" alt="">
									</td>
								<?php endfor; endif; ?>
								<?php if (count($_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectInterior'])>0){?>
									<td style="width: 6px;"></td>
									<td>
										<img src="<?php echo $_smarty_tpl->tpl_vars['projectPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectInterior'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectInterior'][0]['filename'];?>
" alt="">
									</td>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['hasBlind']->value){?>
									<td style="width: 6px;"></td>
									<td>
										<img src="img/pxl.png" alt=""/>
									</td>
								<?php }?>
							</tr>
						</table>
					</td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
				</tr>

				<tr>
					<td style="height: 482px">
						<img height="482" src="<?php echo $_smarty_tpl->tpl_vars['projectPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectSketch'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['mirrorPathPrefix']->value;?>
<?php echo $_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectSketch'][0]['filename'];?>
" alt="Rzut parteru">
					</td>
				</tr>
			</table>
		</td>
		
		<td style="width: 16px;"></td>
		
		<td>
			<table cellpadding="0">
				<tr><td style="color: #2e63a2; font-size: 18pt;" colspan="2"><?php if ($_smarty_tpl->tpl_vars['project']->value['type']=='garage'){?><?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
<?php }?></td></tr>
				<tr><td style="color: #2e63a2; font-size: 18pt;" colspan="2"><?php echo $_smarty_tpl->tpl_vars['project']->value['params_general'][1]['value'];?>
 m<sup>2</sup></td></tr>
				<?php if ($_smarty_tpl->tpl_vars['projectParams']->value[2]){?>
					<tr><td colspan="2">plus piwnica <span style="color: #2e63a2;"><?php echo number_format($_smarty_tpl->tpl_vars['projectParams']->value[2]['num_value'],2,',',' ');?>
 m<sup>2</sup></span></td></tr>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['projectParams']->value[3]){?>
					<tr><td colspan="2">plus garaż <span style="color: #2e63a2;"><?php echo number_format($_smarty_tpl->tpl_vars['projectParams']->value[3]['num_value'],2,',',' ');?>
 m<sup>2</sup></span></td></tr>
				<?php }?>
				<tr><td colspan="2" style="height: 16px;">&nbsp;</td></tr>
				<tr><td colspan="2"><?php echo $_smarty_tpl->tpl_vars['project']->value['short_description'];?>
</td></tr>
				<tr><td colspan="2" style="height: 16px;">&nbsp;</td></tr>
				<?php if ($_smarty_tpl->tpl_vars['project']->value['type']=='garage'){?>
					<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelWidth'][0][0]->mParcelWidth($_smarty_tpl->tpl_vars['projectParams']->value)>0){?><tr><td style="border-top: 1px solid #cdcdcd; border-bottom: 1px solid #cdcdcd;">&nbsp;<br>min. wymiary działki<br></td><td class="right" style="border-top: 1px solid #cdcdcd; border-bottom: 1px solid #cdcdcd;">&nbsp;<br><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelWidth'][0][0]->mParcelWidth($_smarty_tpl->tpl_vars['projectParams']->value);?>
 x <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelHeight'][0][0]->mParcelHeight($_smarty_tpl->tpl_vars['projectParams']->value);?>
 m</td></tr><?php }?>
				<?php }else{ ?>
					<tr><td style="border-top: 1px solid #cdcdcd; border-bottom: 1px solid #cdcdcd;">&nbsp;<br>min. wymiary działki<br></td><td class="right" style="border-top: 1px solid #cdcdcd; border-bottom: 1px solid #cdcdcd;">&nbsp;<br><?php echo $_smarty_tpl->tpl_vars['project']->value['params_general'][75]['value'];?>
 x <?php echo $_smarty_tpl->tpl_vars['project']->value['params_general'][76]['value'];?>
 m</td></tr>
				<?php }?>
				<tr><td colspan="2" style="height: 16px;">&nbsp;</td></tr>
				<?php if ($_smarty_tpl->tpl_vars['project']->value['type']!='garage'){?>
				<tr><td>pow. netto parteru</td><td class="right"><?php echo number_format($_smarty_tpl->tpl_vars['projectParams']->value[16]['num_value'],2,',',' ');?>
 m<sup>2</sup></td></tr>
				<?php }?>
				<tr><td>pow. całkowita</td><td class="right"><?php echo number_format($_smarty_tpl->tpl_vars['projectParams']->value[22]['num_value'],2,',',' ');?>
 m<sup>2</sup></td></tr>
				<tr><td>pow. zabudowy</td><td class="right"><?php echo number_format($_smarty_tpl->tpl_vars['projectParams']->value[23]['num_value'],2,',',' ');?>
 m<sup>2</sup></td></tr>
				<tr><td>kubatura brutto</td><td class="right"><?php echo number_format($_smarty_tpl->tpl_vars['projectParams']->value[25]['num_value'],2,',',' ');?>
 m<sup>3</sup></td></tr>
				<?php if ($_smarty_tpl->tpl_vars['project']->value['type']=='garage'){?>
					<tr><td>wysokość garażu</td><td class="right"><?php echo number_format($_smarty_tpl->tpl_vars['projectParams']->value[33]['num_value'],2,',',' ');?>
 m</td></tr>
				<?php }else{ ?>
					<tr><td>wysokość budynku</td><td class="right"><?php echo number_format($_smarty_tpl->tpl_vars['projectParams']->value[26]['num_value'],2,',',' ');?>
 m</td></tr>
				<?php }?>
				<tr><td>kąt nachylenia dachu</td><td class="right"><?php echo $_smarty_tpl->tpl_vars['project']->value['params_general'][27]['value'];?>
<?php echo $_smarty_tpl->tpl_vars['project']->value['params_general'][27]['unit'];?>
</td></tr>
				<?php if ($_smarty_tpl->tpl_vars['projectParams']->value[28]){?>
					<tr><td>rodzaj stropu</td><td class="right"><?php echo $_smarty_tpl->tpl_vars['projectParams']->value[28]['string_value'];?>
</td></tr>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['projectParams']->value[39]){?>
					<tr><td>pow. dachu</td><td class="right"><?php echo number_format($_smarty_tpl->tpl_vars['projectParams']->value[39]['num_value'],2,',',' ');?>
 m<sup>2</sup><br></td></tr>
				<?php }?>
			</table>
			
			<table cellpadding="0">
				<tr><td colspan="2" style="border-top: 1px solid #cdcdcd;">&nbsp;<br>TECHNOLOGIA</td></tr>
				
				<?php if ($_smarty_tpl->tpl_vars['project']->value['technology']){?>
					<tr><td colspan="2"><?php echo $_smarty_tpl->tpl_vars['project']->value['technology'];?>
</td></tr>
				<?php }else{ ?>
					<tr><td colspan="2">Technologia murowana: Pustak ceramiczny gr. 30 cm + ocieplenie w systemie Termo Organika. Pokrycie dachu dachówką cementową Braas.</td></tr>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['project']->value['type']!='garage'){?>
					<tr><td colspan="2" style="color: #2e63a2; font-size: 7pt;">&nbsp;<br>Do tego projektu możesz wprowadzić zmiany, na które wyrazimy bezpłatną zgodę. Więcej na www.studioatrium.pl</td></tr>
				
					<?php if ($_smarty_tpl->tpl_vars['costs']->value&&$_smarty_tpl->tpl_vars['costs']->value['total']!=-1){?>
						<tr><td colspan="2">&nbsp;<br>KOSZTY BUDOWY</td></tr>
				
						<tr><td style="font-size: 7pt;">stan surowy</td><td class="right" style="font-size: 7pt;"><?php echo number_format($_smarty_tpl->tpl_vars['costs']->value['rough'],0,',',' ');?>
 zł</td></tr>
						<tr><td style="font-size: 7pt;">roboty wykończeniowe</td><td class="right" style="font-size: 7pt;"><?php echo number_format($_smarty_tpl->tpl_vars['costs']->value['finish'],0,',',' ');?>
 zł</td></tr>
						<tr><td style="font-size: 7pt;">instalacje</td><td class="right" style="font-size: 7pt;"><?php echo number_format($_smarty_tpl->tpl_vars['costs']->value['installations'],0,',',' ');?>
 zł</td></tr>
						<tr><td style="font-size: 7pt;">koszt budowy</td><td class="right" style="font-size: 7pt;"><?php echo number_format($_smarty_tpl->tpl_vars['costs']->value['total'],0,',',' ');?>
 zł</td></tr>
				
						<tr><td colspan="2" style="color: #2e63a2; font-size: 7pt; border-bottom: 1px solid #cdcdcd;">&nbsp;<br>Podane ceny są szacunkowymi cenami netto. Zapytaj o zestawienie materiałów naszego konsultanta na www.studioatrium.pl<br></td></tr>
					<?php }?>
				<?php }?>
			</table>

			<table cellpadding="0">
				<tr>
					<td>&nbsp;<br>RZUT PARTERU</td>
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
				<?php if ($_smarty_tpl->tpl_vars['_param']->value['sketch_id']==$_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectSketch'][0]['id']){?>
				<tr>
					<td class="index"><?php if ($_smarty_tpl->tpl_vars['sketchParams']->value[$_smarty_tpl->tpl_vars['_param']->value['sketch_param_id']]['name']!='razem'){?><?php echo $_smarty_tpl->tpl_vars['_param']->value['room_no'];?>
<?php }?></td>
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