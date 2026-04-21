<?php /* Smarty version Smarty-3.1.11, created on 2023-03-21 09:58:03
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/searchDisplayDetail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:43170589762b0305b01a3f2-89032950%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d6031f4fb2a91dd32d355a4db84a52a056f315e' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/searchDisplayDetail.tpl',
      1 => 1679392346,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43170589762b0305b01a3f2-89032950',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0305b0562c8_77875543',
  'variables' => 
  array (
    'list' => 0,
    '_project' => 0,
    'linkTitle' => 0,
    'compareIds' => 0,
    'favouriteIds' => 0,
    'isLocal' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0305b0562c8_77875543')) {function content_62b0305b0562c8_77875543($_smarty_tpl) {?><section>
	<div class="box">
		<ul class="detail fav-wrapper">
		<?php  $_smarty_tpl->tpl_vars['_project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_project']->key => $_smarty_tpl->tpl_vars['_project']->value){
$_smarty_tpl->tpl_vars['_project']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['_project']->value['name']){?>
			<?php $_smarty_tpl->tpl_vars['linkTitle'] = new Smarty_variable($_smarty_tpl->tpl_vars['_project']->value['name'], null, 0);?>
		<?php }else{ ?>
			<?php $_smarty_tpl->tpl_vars['linkTitle'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']), null, 0);?>
		<?php }?>	
			<li>
				<ul>
					<li>
						<div>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['linkTitle']->value,'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['_project']->value['type'])),$_smarty_tpl);?>
">
								<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['linkTitle']->value;?>
">
							</a>
							<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='house'||$_smarty_tpl->tpl_vars['_project']->value['type']=='skeleton'){?>
								<span id="compare-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="compare<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['compareIds']->value)){?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
								<span id="fav-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="fav<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['favouriteIds']->value)){?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
							<?php }?>	
							<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNew'][0][0]->mIsNew($_smarty_tpl->tpl_vars['_project']->value)){?><span class="label">Nowość</span><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']&&$_smarty_tpl->tpl_vars['_project']->value['alternate_name']!='wycofany'){?><span class="label discount<?php if (!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNew'][0][0]->mIsNew($_smarty_tpl->tpl_vars['_project']->value)){?> left<?php }?>">Rabat <?php echo $_smarty_tpl->tpl_vars['_project']->value['discount'];?>
 zł</span><?php }?>
						</div>
					</li>
					<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='house'||$_smarty_tpl->tpl_vars['_project']->value['type']=='skeleton'||$_smarty_tpl->tpl_vars['_project']->value['type']=='garage'){?>
						<li class="slide" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
">
							<img id="img-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" data-src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value),$_smarty_tpl);?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list'),$_smarty_tpl);?>
" alt="<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='garage'){?>Rzut garażu<?php }else{ ?>Rzut parteru<?php }?>">
						</li>
					<?php }?>
					<li class="data">
						<h6><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['linkTitle']->value,'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['_project']->value['type'])),$_smarty_tpl);?>
"><?php if ($_smarty_tpl->tpl_vars['isLocal']->value){?><small style="font-size: 1.2rem;">(<?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
)</small> <?php }?><?php echo $_smarty_tpl->tpl_vars['linkTitle']->value;?>
</a></h6>
						
						<p><?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
</p>
						
						<ul>
							<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='house'){?><li>wersja murowana</li><?php }elseif($_smarty_tpl->tpl_vars['_project']->value['type']=='skeleton'){?><li>wersja szkieletowa</li><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='tank'){?>
								<p>kubatura brutto: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['cubature'][0][0]->mCubature($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
</span> m<sup>3</sup></p>
							<?php }else{ ?>
								<li>powierzchnia użytkowa: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
</span> m<sup>2</sup></li>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']!='house'&&$_smarty_tpl->tpl_vars['_project']->value['type']!='skeleton'&&$_smarty_tpl->tpl_vars['_project']->value['type']!='tank'){?><li>powierzchnia całkowita: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['totalArea'][0][0]->mTotalArea($_smarty_tpl->tpl_vars['_project']->value['params_general'],true);?>
</li><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='house'||$_smarty_tpl->tpl_vars['_project']->value['type']=='skeleton'){?><li>ilość pokoi: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roomCount'][0][0]->mRoomCount($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
</li><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']!='tank'&&$_smarty_tpl->tpl_vars['_project']->value['type']!='fence'){?><li>kąt nachylenia dachu: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roofAngle'][0][0]->mRoofAngle($_smarty_tpl->tpl_vars['_project']->value['params_general'],true);?>
</li><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='house'||$_smarty_tpl->tpl_vars['_project']->value['type']=='skeleton'){?><li>wysokość budynku: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['houseHeight'][0][0]->mHouseHeight($_smarty_tpl->tpl_vars['_project']->value['params_general'],true);?>
</li>
								<?php }elseif($_smarty_tpl->tpl_vars['_project']->value['type']=='garage'){?><li>wysokość garażu: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['garageHeight'][0][0]->mGarageHeight($_smarty_tpl->tpl_vars['_project']->value['params_general'],true);?>
</li>
								<?php }elseif($_smarty_tpl->tpl_vars['_project']->value['type']=='carport'){?><li>wysokość wiaty: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['carportHeight'][0][0]->mCarportHeight($_smarty_tpl->tpl_vars['_project']->value['params_general'],true);?>
</li>
								<?php }elseif($_smarty_tpl->tpl_vars['_project']->value['type']=='arbor'){?><li>wysokość altany: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['arborHeight'][0][0]->mArborHeight($_smarty_tpl->tpl_vars['_project']->value['params_general'],true);?>
</li><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='house'||$_smarty_tpl->tpl_vars['_project']->value['type']=='skeleton'){?><li>działka minimalna: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelWidth'][0][0]->mParcelWidth($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
 x <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelHeight'][0][0]->mParcelHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
 m</li><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='fence'){?>
								<li>wysokość przęsła: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fenceSpanHeight'][0][0]->mFenceSpanHeight($_smarty_tpl->tpl_vars['_project']->value['params_general'],true);?>
</li>
								<li>wysokość zadaszenia: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fenceRoofHeight'][0][0]->mFenceRoofHeight($_smarty_tpl->tpl_vars['_project']->value['params_general'],true);?>
</li>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['_project']->value['alternate_name']=='wycofany'){?>
							<li><strong>Uwaga! Projekt wycofany z oferty.</strong></li>
							<?php }else{ ?>
							<li>cena projektu: <?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><span class="discount"><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
</span><?php echo $_smarty_tpl->tpl_vars['_project']->value['price']-$_smarty_tpl->tpl_vars['_project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
<?php }?> zł</li>
							<?php }?>
						</ul>
					</li>
				</ul>
			</li>
		<?php } ?>
		</ul>
	</div>
</section><?php }} ?>