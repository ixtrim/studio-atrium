<?php /* Smarty version Smarty-3.1.11, created on 2022-11-21 15:25:14
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/displayDetail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193824482262b031fb55ea21-60955087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0249e9dddfd85057f146df677b49bc0cd8732ec4' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/displayDetail.tpl',
      1 => 1668767813,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193824482262b031fb55ea21-60955087',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b031fb5869e6_87974229',
  'variables' => 
  array (
    'list' => 0,
    '_project' => 0,
    'altTitle' => 0,
    'compareIds' => 0,
    'favouriteIds' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b031fb5869e6_87974229')) {function content_62b031fb5869e6_87974229($_smarty_tpl) {?><section>
	<div class="box">
		<ul class="detail fav-wrapper">
		<?php  $_smarty_tpl->tpl_vars['_project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_project']->key => $_smarty_tpl->tpl_vars['_project']->value){
$_smarty_tpl->tpl_vars['_project']->_loop = true;
?>
		<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isGroundFloor'][0][0]->mIsGroundFloor($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?>
			<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu parterowego", null, 0);?>
		<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasLoft'][0][0]->mHasLoft($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?>
			<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu z poddaszem", null, 0);?>
		<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasFloor'][0][0]->mHasFloor($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?>
			<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu piętrowego", null, 0);?>
		<?php }else{ ?>
			<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu", null, 0);?>
		<?php }?>
			<li>
				<ul>
					<li>
						<div>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['_project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
">
								<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['altTitle']->value;?>
 <?php echo strtoupper($_smarty_tpl->tpl_vars['_project']->value['name']);?>
">
							</a>
							<span id="compare-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="compare<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['compareIds']->value)){?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
							<span id="fav-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="fav<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['favouriteIds']->value)){?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
							<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNew'][0][0]->mIsNew($_smarty_tpl->tpl_vars['_project']->value)){?><span class="label">Nowość</span><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><span class="label discount<?php if (!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNew'][0][0]->mIsNew($_smarty_tpl->tpl_vars['_project']->value)){?> left<?php }?>">Rabat <?php echo $_smarty_tpl->tpl_vars['_project']->value['discount'];?>
 zł</span><?php }?>
						</div>
					</li>
					<li class="slide" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
">
						<img id="img-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" data-src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value),$_smarty_tpl);?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list'),$_smarty_tpl);?>
" alt="Rzut parteru projektu <?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
">
					</li>
					<li class="data">
						<h6><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['_project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
</a></h6>
						
						<p><?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
</p>
						<ul>
							<li><?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='skeleton'){?>wersja szkieletowa<?php }else{ ?>wersja murowana<?php }?></li>
							<li>powierzchnia użytkowa: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
</span> m<sup>2</sup></li>
							<li>powierzchnia zabudowy: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['buildArea'][0][0]->mBuildArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
 m<sup>2</sup></li>
							<li>ilość pokoi: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roomCount'][0][0]->mRoomCount($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
</li>
							<li>kąt nachylenia dachu: <?php echo (($tmp = @$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roofAngle'][0][0]->mRoofAngle($_smarty_tpl->tpl_vars['_project']->value['params_general'],true))===null||$tmp==='' ? "płaski" : $tmp);?>
</li>
							<li>wysokość budynku: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['houseHeight'][0][0]->mHouseHeight($_smarty_tpl->tpl_vars['_project']->value['params_general'],true);?>
</li>
							<li>działka minimalna: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelWidth'][0][0]->mParcelWidth($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
 x <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelHeight'][0][0]->mParcelHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
 m</li>
							<li>
								cena projektu: <?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><span class="discount"><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
</span><?php echo $_smarty_tpl->tpl_vars['_project']->value['price']-$_smarty_tpl->tpl_vars['_project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
<?php }?> zł
							</li>
						</ul>
					</li>
				</ul>
			</li>
		<?php } ?>
		</ul>
	</div>
</section><?php }} ?>