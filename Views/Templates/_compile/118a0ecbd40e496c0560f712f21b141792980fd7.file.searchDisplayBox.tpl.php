<?php /* Smarty version Smarty-3.1.11, created on 2023-03-21 09:57:30
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/searchDisplayBox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73337913162b0302a2fb7c6-06330974%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '118a0ecbd40e496c0560f712f21b141792980fd7' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/searchDisplayBox.tpl',
      1 => 1679392588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73337913162b0302a2fb7c6-06330974',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0302a371d07_33119124',
  'variables' => 
  array (
    'list' => 0,
    '_project' => 0,
    'linkTitle' => 0,
    'isLocal' => 0,
    'usableArea' => 0,
    'compareIds' => 0,
    'favouriteIds' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0302a371d07_33119124')) {function content_62b0302a371d07_33119124($_smarty_tpl) {?><div class="container" id="project-list">
	<section>
		<div class="list-grid fav-wrapper" id="overlay-group">
		<?php  $_smarty_tpl->tpl_vars['_project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_project']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_project']->key => $_smarty_tpl->tpl_vars['_project']->value){
$_smarty_tpl->tpl_vars['_project']->_loop = true;
 $_smarty_tpl->tpl_vars['_project']->index++;
?>
			<div>
				<?php $_smarty_tpl->tpl_vars['usableArea'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']), null, 0);?>
				<?php if ($_smarty_tpl->tpl_vars['_project']->value['name']){?>
					<?php $_smarty_tpl->tpl_vars['linkTitle'] = new Smarty_variable($_smarty_tpl->tpl_vars['_project']->value['name'], null, 0);?>
				<?php }else{ ?>
					<?php $_smarty_tpl->tpl_vars['linkTitle'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']), null, 0);?>
				<?php }?>
				<figure>
					<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'box'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['linkTitle']->value;?>
">
					<figcaption>
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['linkTitle']->value,'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['_project']->value['type'])),$_smarty_tpl);?>
">
							<span><?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='house'||$_smarty_tpl->tpl_vars['_project']->value['type']=='skeleton'){?>projekt domu <?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasFloor'][0][0]->mHasFloor($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?>piętrowego<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasLoft'][0][0]->mHasLoft($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?>z poddaszem<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isGroundFloor'][0][0]->mIsGroundFloor($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?>parterowego<?php }?><?php }else{ ?><?php echo strtolower($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['_project']->value['type'],false,false));?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['isLocal']->value){?> <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
<?php }?></span>
							<strong><?php echo $_smarty_tpl->tpl_vars['linkTitle']->value;?>
<?php if ($_smarty_tpl->tpl_vars['usableArea']->value){?> <span><?php echo $_smarty_tpl->tpl_vars['usableArea']->value;?>
 m<sup>2</sup></span><?php }?></strong>
						</a>
					</figcaption>
				</figure>
			<?php if ($_smarty_tpl->tpl_vars['_project']->value['alternate_name']!='wycofany'){?>
				<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='house'||$_smarty_tpl->tpl_vars['_project']->value['type']=='skeleton'){?>
					<span id="compare-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="compare<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['compareIds']->value)){?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
					<span id="fav-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="fav<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['favouriteIds']->value)){?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='house'||$_smarty_tpl->tpl_vars['_project']->value['type']=='skeleton'){?>
					<span class="overview" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" data-idx="<?php echo $_smarty_tpl->tpl_vars['_project']->index;?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'presentation'),$_smarty_tpl);?>
" data-ground="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasFloor'][0][0]->mHasFloor($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?> data-floor="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value,'storey'=>'1st_floor'),$_smarty_tpl);?>
"<?php }?><?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasLoft'][0][0]->mHasLoft($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?> data-loft="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value,'storey'=>'loft'),$_smarty_tpl);?>
"<?php }?> data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['linkTitle']->value,'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['_project']->value['type'])),$_smarty_tpl);?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['_project']->value['price']){?><?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><strike><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
</strike> <?php echo $_smarty_tpl->tpl_vars['_project']->value['price']-$_smarty_tpl->tpl_vars['_project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
<?php }?><?php }else{ ?>-<?php }?>" data-name="<?php echo $_smarty_tpl->tpl_vars['linkTitle']->value;?>
" data-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-parcel="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelWidth'][0][0]->mParcelWidth($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
 x <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelHeight'][0][0]->mParcelHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-height="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['houseHeight'][0][0]->mHouseHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-angle="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roofAngle'][0][0]->mRoofAngle($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-version="<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='skeleton'){?>wersja szkieletowa<?php }else{ ?>wersja murowana<?php }?>" data-rooms="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roomCount'][0][0]->mRoomCount($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
"></span>
				<?php }elseif($_smarty_tpl->tpl_vars['_project']->value['type']=='fence'){?>
					<span class="overview only" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" data-idx="<?php echo $_smarty_tpl->tpl_vars['_project']->index;?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'presentation'),$_smarty_tpl);?>
" data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['linkTitle']->value,'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['_project']->value['type'])),$_smarty_tpl);?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><strike><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
</strike> <?php echo $_smarty_tpl->tpl_vars['_project']->value['price']-$_smarty_tpl->tpl_vars['_project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
<?php }?>" data-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['_project']->value['type'],false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
" data-span="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fenceSpanHeight'][0][0]->mFenceSpanHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-roofing="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fenceRoofHeight'][0][0]->mFenceRoofHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
"></span>				
				<?php }elseif($_smarty_tpl->tpl_vars['_project']->value['type']=='arbor'){?>
					<span class="overview only" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" data-idx="<?php echo $_smarty_tpl->tpl_vars['_project']->index;?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'presentation'),$_smarty_tpl);?>
" data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['linkTitle']->value,'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['_project']->value['type'])),$_smarty_tpl);?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><strike><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
</strike> <?php echo $_smarty_tpl->tpl_vars['_project']->value['price']-$_smarty_tpl->tpl_vars['_project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
<?php }?>" data-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['_project']->value['type'],false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
" data-area="<?php echo $_smarty_tpl->tpl_vars['usableArea']->value;?>
" data-total-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['totalArea'][0][0]->mTotalArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-height="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['arborHeight'][0][0]->mArborHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-angle="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roofAngle'][0][0]->mRoofAngle($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
"></span>				
				<?php }elseif($_smarty_tpl->tpl_vars['_project']->value['type']=='outbuilding'){?>
					<span class="overview only" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" data-idx="<?php echo $_smarty_tpl->tpl_vars['_project']->index;?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'presentation'),$_smarty_tpl);?>
" data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['linkTitle']->value,'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['_project']->value['type'])),$_smarty_tpl);?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><strike><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
</strike> <?php echo $_smarty_tpl->tpl_vars['_project']->value['price']-$_smarty_tpl->tpl_vars['_project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
<?php }?>" data-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['_project']->value['type'],false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
" data-area="<?php echo $_smarty_tpl->tpl_vars['usableArea']->value;?>
" data-total-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['totalArea'][0][0]->mTotalArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-height="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['houseHeight'][0][0]->mHouseHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-angle="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roofAngle'][0][0]->mRoofAngle($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
"></span>				
				<?php }elseif($_smarty_tpl->tpl_vars['_project']->value['type']=='carport'){?>
					<span class="overview only" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" data-idx="<?php echo $_smarty_tpl->tpl_vars['_project']->index;?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'presentation'),$_smarty_tpl);?>
" data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['linkTitle']->value,'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['_project']->value['type'])),$_smarty_tpl);?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><strike><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
</strike> <?php echo $_smarty_tpl->tpl_vars['_project']->value['price']-$_smarty_tpl->tpl_vars['_project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
<?php }?>" data-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['_project']->value['type'],false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
" data-area="<?php echo $_smarty_tpl->tpl_vars['usableArea']->value;?>
" data-total-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['totalArea'][0][0]->mTotalArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-height="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['carportHeight'][0][0]->mCarportHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-angle="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roofAngle'][0][0]->mRoofAngle($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
"></span>				
				<?php }elseif($_smarty_tpl->tpl_vars['_project']->value['type']=='garage'){?>
					<span class="overview only" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" data-idx="<?php echo $_smarty_tpl->tpl_vars['_project']->index;?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'presentation'),$_smarty_tpl);?>
" data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['linkTitle']->value,'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['_project']->value['type'])),$_smarty_tpl);?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><strike><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
</strike> <?php echo $_smarty_tpl->tpl_vars['_project']->value['price']-$_smarty_tpl->tpl_vars['_project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
<?php }?>" data-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['_project']->value['type'],false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
" data-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-total-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['totalArea'][0][0]->mTotalArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-height="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['garageHeight'][0][0]->mGarageHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-angle="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roofAngle'][0][0]->mRoofAngle($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
"></span>				
				<?php }?>
				
				<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNew'][0][0]->mIsNew($_smarty_tpl->tpl_vars['_project']->value)||$_smarty_tpl->tpl_vars['_project']->value['discount']){?>
				<div>
					<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><span class="discount">rabat <?php echo $_smarty_tpl->tpl_vars['_project']->value['discount'];?>
</span><?php }?><?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNew'][0][0]->mIsNew($_smarty_tpl->tpl_vars['_project']->value)){?><span class="new">nowość</span><?php }?>
				</div> 
				<?php }?>
			<?php }else{ ?>
			<div>
				<span style="background-color: #000; width: 180px; font-weight: bold;">WYCOFANY Z OFERTY!</span>
			</div> 	
			<?php }?>	
			</div>
		<?php } ?>
		</div>

	</section>
</div>

<div class="overlay">
	<div class="overlay-project-box" id="over-pop">
		<div class="fav-wrapper" id="over-img-box">
			<ul id="over-pics">
				<li><span id="over-render" class="selected">Wizualizacja</span></li>
				<li><span id="over-ground" class="noview">Rzut parteru</span></li>
				<li><span id="over-floor" class="noview">Rzut piętra</span></li>
				<li><span id="over-loft" class="noview">Rzut poddasza</span></li>
			</ul>
		
			<a href="">
				<img id="over-img" src="/img/dummy.png" width="1350" height="900" alt="Render">
			</a>
		</div>
		
		<ul id="over-params">
			<li><h6 id="over-name"></h6></li>
			<li class="small"><span id="over-txt"></span></li>
			<li><span id="over-version"></span></li>
			<li id="over-rooms-wrapper"><p>ilość pokoi: <span id="over-rooms"></span></p></li>
			<li id="over-area-wrapper"><p>powierzchnia użytkowa: <span id="over-area"></span> m<sup>2</sup></p></li>
			<li id="over-parcel-wrapper"><p>min. wymiary działki: <span id="over-parcel"></span> m</p></li>
			<li id="over-total-area-wrapper"><p>powierzchnia całkowita: <span id="over-total-area"></span> m</p></li>
			<li id="over-height-wrapper"><p>wysokość: <span id="over-height"></span> m</p></li>
			<li id="over-angle-wrapper"><p>kąt nachylenia dachu: <span id="over-angle"></span></p></li>
			<li id="over-span-height-wrapper"><p>wysokość przęsła: <span id="span-height"></span> cm</p></li>
			<li id="over-roof-height-wrapper"><p>wysokość zadaszenia: <span id="roofing-height"></span> cm</p></li>
			<li id="over-build-area-wrapper"><p>powierzchnia zabudowy: <span id="over-build-area"></span> m<sup>2</sup></p></li>
			<li id="over-cubature-wrapper"><p>kubatura brutto: <span id="over-cubature"></span> m<sup>3</sup></p></li>
			<li><p>cena projektu: <span id="over-price"></span> zł</p></li>
			<li><a href="" class="more">Zobacz szczegóły</a></li>
		</ul>
		
		<button type="button" class="overlay-change prev" id="prev-overlay">poprzedni</button>
		<button type="button" class="overlay-change next" id="next-overlay">następny</button>
	</div>
	
	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div><?php }} ?>