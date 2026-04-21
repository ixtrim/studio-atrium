<?php /* Smarty version Smarty-3.1.11, created on 2026-04-10 13:09:26
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/House.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70721655063782f2c65e712-57160003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7e17870c5d7368677e63d1b8bc2af6bf941d559' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/House.tpl',
      1 => 1775826564,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70721655063782f2c65e712-57160003',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_63782f2c90fd72_61802485',
  'variables' => 
  array (
    'projectParams' => 0,
    'request' => 0,
    'project' => 0,
    '_render' => 0,
    'altTitle' => 0,
    'authorizations' => 0,
    'value' => 0,
    'products' => 0,
    'showroomPath' => 0,
    'iconFilename' => 0,
    'filename' => 0,
    'panoramaLink' => 0,
    '_item' => 0,
    'movieLink' => 0,
    'favouriteIds' => 0,
    'token' => 0,
    'categoryLink' => 0,
    'subCategory' => 0,
    'category' => 0,
    'subCategoryLink' => 0,
    'isLocal' => 0,
    'hasPlot' => 0,
    'linkBoxClass' => 0,
    'user' => 0,
    'blackWeekTxt' => 0,
    'promoEnd' => 0,
    'skeletonPrice' => 0,
    'linkedProjectUrl' => 0,
    'withSeparateGarage' => 0,
    'technicalList' => 0,
    'params' => 0,
    'paramValue' => 0,
    'nettoSum' => 0,
    'skeletonW' => 0,
    'skeletonH' => 0,
    'technicalGarageList' => 0,
    'features' => 0,
    'setF' => 0,
    'featureIcons' => 0,
    'costs' => 0,
    'noestimate' => 0,
    'projectUrl' => 0,
    'projectCategories' => 0,
    'csCloudParams' => 0,
    '_key' => 0,
    'csCloudSelectParams' => 0,
    'csParamsValueNames' => 0,
    'sketch' => 0,
    'sketchAuthorize' => 0,
    'roomsPoints' => 0,
    'banner' => 0,
    'bannerUrl' => 0,
    'projectSketchParams' => 0,
    '_param' => 0,
    'sketchParams' => 0,
    'total2' => 0,
    'total' => 0,
    'extra' => 0,
    'opinions' => 0,
    'discuss_counter' => 0,
    'forumCategories' => 0,
    'commentList' => 0,
    'tmpStamp' => 0,
    'discuss_categories' => 0,
    'uploadedTmp' => 0,
    'tmp_uploadsUrl' => 0,
    '_file' => 0,
    '_comment' => 0,
    'adminIds' => 0,
    'commentAuthors' => 0,
    '_attachment' => 0,
    'uploadsUrl' => 0,
    '_sub' => 0,
    'partners' => 0,
    '_partner' => 0,
    'isSketch' => 0,
    'isMaterial' => 0,
    'isparcelDwg' => 0,
    'isparcelPdf' => 0,
    'isWoodwork' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63782f2c90fd72_61802485')) {function content_63782f2c90fd72_61802485($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_replace')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.date_format.php';
?><div class="project-box house">
<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isGroundFloor'][0][0]->mIsGroundFloor($_smarty_tpl->tpl_vars['projectParams']->value)){?>
	<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu parterowego", null, 0);?>
<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasLoft'][0][0]->mHasLoft($_smarty_tpl->tpl_vars['projectParams']->value)){?>
	<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu z poddaszem", null, 0);?>
<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasFloor'][0][0]->mHasFloor($_smarty_tpl->tpl_vars['projectParams']->value)){?>
	<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu piętrowego", null, 0);?>
<?php }else{ ?>
	<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu", null, 0);?>
<?php }?>
	<div id="render-box" class="render-box<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?> mirror<?php }?>">
	<div class="inline-wrapper">
		<?php  $_smarty_tpl->tpl_vars['_render'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_render']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectRender']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_render']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_render']->iteration=0;
 $_smarty_tpl->tpl_vars['_render']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_render']->key => $_smarty_tpl->tpl_vars['_render']->value){
$_smarty_tpl->tpl_vars['_render']->_loop = true;
 $_smarty_tpl->tpl_vars['_render']->iteration++;
 $_smarty_tpl->tpl_vars['_render']->index++;
 $_smarty_tpl->tpl_vars['_render']->first = $_smarty_tpl->tpl_vars['_render']->index === 0;
?>
		<div>
			<?php if ($_smarty_tpl->tpl_vars['_render']->first){?>
				<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNew'][0][0]->mIsNew($_smarty_tpl->tpl_vars['project']->value)){?>
					<span>Nowość</span>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['project']->value['discount']){?>
					<span class="discount<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNew'][0][0]->mIsNew($_smarty_tpl->tpl_vars['project']->value)){?> second<?php }?>" style="background-color: #ff9600; width: 230px; font-size: 19px; color: #000;"><?php if (!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isBlackWeek'][0][0]->mIsBlackWeek($_smarty_tpl->tpl_vars['projectParams']->value)){?><strong>Rabat <?php echo $_smarty_tpl->tpl_vars['project']->value['discount'];?>
</strong><?php }else{ ?>Rabat <?php echo $_smarty_tpl->tpl_vars['project']->value['discount'];?>
<?php }?></span>
				<?php }?>
				
				<img class="finger" id="finger" src="/img/finger.png" alt="Zobacz galerię projektu <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
">
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
				<a class="gallery<?php if ($_smarty_tpl->tpl_vars['_render']->iteration>2){?> dummy<?php }?>" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['_render']->value['title'];?>
 - odbicie lustrzane" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'no'=>$_smarty_tpl->tpl_vars['_render']->index,'mirror'=>1),$_smarty_tpl);?>
">
					<?php if ($_smarty_tpl->tpl_vars['_render']->iteration<3){?>
						<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'no'=>$_smarty_tpl->tpl_vars['_render']->index,'size'=>'presentation','mirror'=>1),$_smarty_tpl);?>
" width="1350" height="900" alt="Projekty domów - <?php echo $_smarty_tpl->tpl_vars['altTitle']->value;?>
 <?php echo strtoupper($_smarty_tpl->tpl_vars['project']->value['name']);?>
 - wizualizacja <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
 - wersja lustrzana">
					<?php }else{ ?>
						<img class="dummy" src="/img/dummy.jpg" width="1350" height="900" data-uri="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'no'=>$_smarty_tpl->tpl_vars['_render']->index,'size'=>'presentation','mirror'=>1),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['altTitle']->value;?>
 <?php echo strtoupper($_smarty_tpl->tpl_vars['project']->value['name']);?>
 - wizualizacja <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
 - wersja lustrzana">
					<?php }?>
				</a>
			<?php }else{ ?>
				<a class="gallery<?php if ($_smarty_tpl->tpl_vars['_render']->iteration>2){?> dummy<?php }?>" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['_render']->value['title'];?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'no'=>$_smarty_tpl->tpl_vars['_render']->index),$_smarty_tpl);?>
">
					<?php if ($_smarty_tpl->tpl_vars['_render']->iteration<3){?>
						<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'no'=>$_smarty_tpl->tpl_vars['_render']->index,'size'=>'presentation'),$_smarty_tpl);?>
" width="1350" height="900" alt="Projekty domów - <?php echo $_smarty_tpl->tpl_vars['altTitle']->value;?>
 <?php echo strtoupper($_smarty_tpl->tpl_vars['project']->value['name']);?>
 - wizualizacja <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
">
					<?php }else{ ?>
						<img class="dummy" src="/img/dummy.jpg" width="1350" height="900" data-uri="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'no'=>$_smarty_tpl->tpl_vars['_render']->index,'size'=>'presentation'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['altTitle']->value;?>
 <?php echo strtoupper($_smarty_tpl->tpl_vars['project']->value['name']);?>
 - wizualizacja <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
">
					<?php }?>
				</a>
			<?php }?>
		</div>
		<?php } ?>
		
		<?php if ($_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectInterior']){?>
			<?php  $_smarty_tpl->tpl_vars['_render'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_render']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectInterior']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_render']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_render']->iteration=0;
 $_smarty_tpl->tpl_vars['_render']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_render']->key => $_smarty_tpl->tpl_vars['_render']->value){
$_smarty_tpl->tpl_vars['_render']->_loop = true;
 $_smarty_tpl->tpl_vars['_render']->iteration++;
 $_smarty_tpl->tpl_vars['_render']->index++;
 $_smarty_tpl->tpl_vars['_render']->first = $_smarty_tpl->tpl_vars['_render']->index === 0;
?>
			<div<?php if ($_smarty_tpl->tpl_vars['_render']->first){?> id="interiors"<?php }?><?php if ($_smarty_tpl->tpl_vars['authorizations']->value[$_smarty_tpl->tpl_vars['_render']->value['id']]){?> class="showroom"<?php }?>>
				<?php if ($_smarty_tpl->tpl_vars['_render']->value['props']['image_size']['width']>1350){?>
				<a class="gallery dummy" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['_render']->value['title'];?>
: <?php echo $_smarty_tpl->tpl_vars['_render']->value['description'];?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'interior','no'=>$_smarty_tpl->tpl_vars['_render']->index,'project'=>$_smarty_tpl->tpl_vars['project']->value),$_smarty_tpl);?>
">
					<img class="dummy" src="/img/dummy.jpg" width="1350" height="900" data-uri="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'interior','project'=>$_smarty_tpl->tpl_vars['project']->value,'size'=>'presentation','no'=>$_smarty_tpl->tpl_vars['_render']->index),$_smarty_tpl);?>
" alt="Wnętrze projektu <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
 - wizualizacja <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
">
				</a>
				<?php }else{ ?>
					<a class="gallery dummy" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['_render']->value['title'];?>
: <?php echo $_smarty_tpl->tpl_vars['_render']->value['description'];?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'interior','project'=>$_smarty_tpl->tpl_vars['project']->value,'size'=>'presentation','no'=>$_smarty_tpl->tpl_vars['_render']->index),$_smarty_tpl);?>
">
						<img class="dummy" src="/img/dummy.jpg" width="1350" height="900" data-uri="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'interior','project'=>$_smarty_tpl->tpl_vars['project']->value,'size'=>'presentation','no'=>$_smarty_tpl->tpl_vars['_render']->index),$_smarty_tpl);?>
" alt="Wnętrze projektu <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
 - wizualizacja <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
">
					</a>
				<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['authorizations']->value[$_smarty_tpl->tpl_vars['_render']->value['id']]){?>
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
" data-descript="<?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['short_descript'];?>
" data-link="<?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['link'];?>
" style="top: <?php echo $_smarty_tpl->tpl_vars['value']->value['top'];?>
px; left:<?php echo $_smarty_tpl->tpl_vars['value']->value['left'];?>
px;">
							<div class="label">
								<a data-fancybox="showroom" href="<?php echo $_smarty_tpl->tpl_vars['showroomPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['value']->value['id']]['name'],30);?>
</a>
							</div>
						</div>
					<?php } ?>
					
					<span class="showroom-switch" data-state="on">wyłącz podgląd produktów</span>
				<?php }?>
			</div>
			
				
			<?php } ?>
			
		<?php }?>
		
		<?php $_smarty_tpl->tpl_vars['panoramaLink'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['panoramaLink'][0][0]->mPanoramaLink($_smarty_tpl->tpl_vars['projectParams']->value), null, 0);?>
		<?php if ($_smarty_tpl->tpl_vars['panoramaLink']->value){?>
			<div class="movie-link-box">
				<p class="movie-link panorama">
					<a href="<?php echo $_smarty_tpl->tpl_vars['panoramaLink']->value;?>
" target="_blank">Zobacz panoramę wnętrza</a>
				</p>
			</div>
		<?php }?>
		
		<?php if ($_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectElevation']){?>
			<div id="elevations">
				<ul id="elevations-list" class="shared">
				<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectElevation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_item']->iteration=0;
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_item']->iteration++;
 $_smarty_tpl->tpl_vars['_item']->index++;
 $_smarty_tpl->tpl_vars['_item']->last = $_smarty_tpl->tpl_vars['_item']->iteration === $_smarty_tpl->tpl_vars['_item']->total;
?>
					<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
						<li>
							<a class="gallery dummy" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
 - odbicie lustrzane" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'elevation','no'=>$_smarty_tpl->tpl_vars['_item']->index,'project'=>$_smarty_tpl->tpl_vars['project']->value,'mirror'=>1),$_smarty_tpl);?>
">
								<img class="dummy" src="/img/dummy.jpg" width="1024" height="683" data-uri="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'elevation','project'=>$_smarty_tpl->tpl_vars['project']->value,'no'=>$_smarty_tpl->tpl_vars['_item']->index,'mirror'=>1),$_smarty_tpl);?>
" alt="Projekt domu <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
 - widok elewacji <?php echo $_smarty_tpl->tpl_vars['_item']->iteration;?>
 - wersja lustrzana">
							</a>
						</li>
					<?php }else{ ?>
						<li>
							<a class="gallery dummy" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'elevation','no'=>$_smarty_tpl->tpl_vars['_item']->index,'project'=>$_smarty_tpl->tpl_vars['project']->value),$_smarty_tpl);?>
">
								<img class="dummy" src="/img/dummy.jpg" width="1024" height="683" data-uri="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'elevation','project'=>$_smarty_tpl->tpl_vars['project']->value,'no'=>$_smarty_tpl->tpl_vars['_item']->index),$_smarty_tpl);?>
" alt="Projekt domu <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
 - widok elewacji <?php echo $_smarty_tpl->tpl_vars['_item']->iteration;?>
">
							</a>
						</li>
					<?php }?>
				<?php } ?>
				</ul>
			</div>
		<?php }?>
		
		<?php $_smarty_tpl->tpl_vars['movieLink'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['movieLink'][0][0]->mMovieLink($_smarty_tpl->tpl_vars['projectParams']->value), null, 0);?>
		<?php if ($_smarty_tpl->tpl_vars['movieLink']->value){?>
			<div class="movie-link-box">
				<p class="movie-link">
					<a data-fancybox="movie" href="https://www.youtube.com/embed/<?php echo smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['movieLink']->value,'https://youtu.be/',''),'http://youtu.be/','');?>
?rel=0">
						Zobacz animację 3D
					</a>
				</p>
			</div>
		<?php }?>
	</div>
	</div>
	
	<div class="data-box" id="data-box">
	<div class="inline-wrapper">
		<div class="icons fav-wrapper">
			<div>
				<a href="//pl.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-color="white"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_white_20.png" alt="Studio Atrium Pin"></a>
				
			</div>
		
			<span class="bg fav<?php if (in_array($_smarty_tpl->tpl_vars['project']->value['id'],$_smarty_tpl->tpl_vars['favouriteIds']->value)){?> on<?php }?>" id="fav-me" data-id="<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
"></span>
			<span class="bg net" id="social-trigger"></span>
			
			
			<?php $_smarty_tpl->tpl_vars['token'] = new Smarty_variable(smarty_modifier_date_format(time(),"%H%M%S"), null, 0);?>

			<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
				<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'pdf','action'=>'project','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'version'=>'lustro'),$_smarty_tpl);?>
?token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" id="print-ico" class="bg print" data-token="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
"></a>
			<?php }else{ ?>
				<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'pdf','action'=>'project','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name']),$_smarty_tpl);?>
?token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" id="print-ico" class="bg print" data-token="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
"></a>
			<?php }?>
			
			<img src="/img/loader.gif" alt="Generowanie pliku" id="gen-loader" style="display: none;">
			
		</div>
		
		<div class="breadcrumbs"><a href="/">Studio Atrium</a> &raquo; <a href="/projekty-domow/">projekty domów</a> &raquo; <a href="<?php echo $_smarty_tpl->tpl_vars['categoryLink']->value;?>
"<?php if (!$_smarty_tpl->tpl_vars['subCategory']->value){?> class="on"<?php }?>><?php echo $_smarty_tpl->tpl_vars['category']->value;?>
</a><?php if ($_smarty_tpl->tpl_vars['subCategory']->value){?> &raquo; <a class="on" href="<?php echo $_smarty_tpl->tpl_vars['subCategoryLink']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['subCategory']->value;?>
</a><?php }?></div>
	
		<div class="head-box">
			<h1 id="title" data-id="<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?><small>odbicie lustrzane</small><?php }?><?php if ($_smarty_tpl->tpl_vars['isLocal']->value){?> <span style="font-size: 1.6rem;">(<?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
)</span><?php }?></h1>
			<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['stairsChange'][0][0]->mStairsChange($_smarty_tpl->tpl_vars['projectParams']->value)){?>
				<p class="area<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isMultiApartment'][0][0]->mIsMultiApartment($_smarty_tpl->tpl_vars['projectParams']->value)&&$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['oneFlatArea'][0][0]->mOneFlatArea($_smarty_tpl->tpl_vars['projectParams']->value)&&$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['oneFlatGarageArea'][0][0]->mOneFlatGarageArea($_smarty_tpl->tpl_vars['projectParams']->value)){?> longest<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isMultiApartment'][0][0]->mIsMultiApartment($_smarty_tpl->tpl_vars['projectParams']->value)&&$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['oneFlatArea'][0][0]->mOneFlatArea($_smarty_tpl->tpl_vars['projectParams']->value)){?> longer<?php }?>">Powierzchnia użytkowa: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['project']->value['params_general']);?>
</span> m<sup>2</sup><span id="usable-area" class="param-info special" data-id="141"></span></p>
			<?php }else{ ?>
				<p class="area<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isMultiApartment'][0][0]->mIsMultiApartment($_smarty_tpl->tpl_vars['projectParams']->value)&&$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['oneFlatArea'][0][0]->mOneFlatArea($_smarty_tpl->tpl_vars['projectParams']->value)&&$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['oneFlatGarageArea'][0][0]->mOneFlatGarageArea($_smarty_tpl->tpl_vars['projectParams']->value)){?> longest<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isMultiApartment'][0][0]->mIsMultiApartment($_smarty_tpl->tpl_vars['projectParams']->value)&&$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['oneFlatArea'][0][0]->mOneFlatArea($_smarty_tpl->tpl_vars['projectParams']->value)){?> longer<?php }?>">Powierzchnia użytkowa: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['project']->value['params_general']);?>
</span> m<sup>2</sup><span id="usable-area" class="param-info" data-id="1"></span></p>
			<?php }?>
			<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isMultiApartment'][0][0]->mIsMultiApartment($_smarty_tpl->tpl_vars['projectParams']->value)&&$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['oneFlatArea'][0][0]->mOneFlatArea($_smarty_tpl->tpl_vars['projectParams']->value)){?>
				<p>pow. użytkowa 1 lokalu w budynku: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['oneFlatArea'][0][0]->mOneFlatArea($_smarty_tpl->tpl_vars['projectParams']->value);?>
</span> m<sup>2</sup></p>
				<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['oneFlatGarageArea'][0][0]->mOneFlatGarageArea($_smarty_tpl->tpl_vars['projectParams']->value)){?>
					<p>+ garaż dla 1 lokalu: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['oneFlatGarageArea'][0][0]->mOneFlatGarageArea($_smarty_tpl->tpl_vars['projectParams']->value);?>
</span> m<sup>2</sup></p>
				<?php }?>
			<?php }?>
			
			<h2><?php echo $_smarty_tpl->tpl_vars['project']->value['short_description'];?>
</h2>
			
			
		</div>
				
		<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasMirror'][0][0]->mHasMirror($_smarty_tpl->tpl_vars['projectParams']->value)&&$_smarty_tpl->tpl_vars['hasPlot']->value){?> 
			<?php $_smarty_tpl->tpl_vars['linkBoxClass'] = new Smarty_variable('three', null, 0);?>
		<?php }else{ ?>
			<?php if (!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasMirror'][0][0]->mHasMirror($_smarty_tpl->tpl_vars['projectParams']->value)&&!$_smarty_tpl->tpl_vars['hasPlot']->value){?>
				<?php $_smarty_tpl->tpl_vars['linkBoxClass'] = new Smarty_variable('one', null, 0);?>
			<?php }?>
		<?php }?>

		<div class="inner-box">
			<ul class="link-box<?php if ($_smarty_tpl->tpl_vars['linkBoxClass']->value){?> <?php echo $_smarty_tpl->tpl_vars['linkBoxClass']->value;?>
<?php }?>">
			<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasMirror'][0][0]->mHasMirror($_smarty_tpl->tpl_vars['projectParams']->value)){?>
				<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
					<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
" class="mirror">Zobacz <br>wersję podstawową</a></li>
				<?php }else{ ?>
					<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'version'=>'lustro','catalog'=>'projekty-domow'),$_smarty_tpl);?>
" class="mirror on">Zobacz <br>odbicie lustrzane</a></li>
				<?php }?>
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['hasPlot']->value){?>
				<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
					<li id="sun-box"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'version'=>'lustro','catalog'=>'usytuowanie'),$_smarty_tpl);?>
" class="sun">Sytuuj na działce<br>Słońce w domu</a></li>
				<?php }else{ ?>
					<li id="sun-box"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>'usytuowanie'),$_smarty_tpl);?>
" class="sun">Sytuuj na działce<br>Słońce w domu</a></li>
				<?php }?>
			<?php }?>

				
				<li id="gosketch-box"><a href="javascript:" class="gosketch" id="gosketch-trigger">Zobacz rzuty projektu</a></li>
			</ul>
		</div>
		
		
		
		<div class="inner-box">
			<ul class="contact-box">
				<li><a href="<?php if ($_smarty_tpl->tpl_vars['user']->value){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message','project_id'=>$_smarty_tpl->tpl_vars['project']->value['id']),$_smarty_tpl);?>
<?php }else{ ?>javascript:<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['user']->value){?> class="consultant"<?php }?>>zapytaj o projekt</a></li>
				<li id="phone-box"><a href="tel:+48338229496" class="phone" rel="nofollow">33 822 94 96</a></li>
			</ul>
		</div>
		
		<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isBlackWeek'][0][0]->mIsBlackWeek($_smarty_tpl->tpl_vars['projectParams']->value)){?>
			<div class="info-box no-border" style="padding-top: 0px; text-align: center;">
				<a href="/projekty-domow/black-week/"><img src="/img/blackWeek.png?t=20251201" alt="Promocje Black Friday" width="350" height="85" class="wolf"></a>
			</div>
		<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isChristmas'][0][0]->mIsChristmas($_smarty_tpl->tpl_vars['projectParams']->value)){?>
			<div class="info-box no-border" style="padding-top: 0px; text-align: center;">
				<a href="/projekty-domow/promocja-swiateczna/"><img src="/img/christmas.png" alt="Świąteczna promocja" width="350" height="85" class="wolf"></a>
			</div>
		<?php }?>
		
		<div id="order-box" class="inner-box order-box"<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isBlackWeek'][0][0]->mIsBlackWeek($_smarty_tpl->tpl_vars['projectParams']->value)){?> style="background-color: #FFA800; color: #000;"<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isChristmas'][0][0]->mIsChristmas($_smarty_tpl->tpl_vars['projectParams']->value)){?> style="background-color: #A2D5F2; color: #000;"<?php }?>>
			<div>
			<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isWithdrawn'][0][0]->mIsWithdrawn($_smarty_tpl->tpl_vars['projectParams']->value)){?>
				<p class="price">wycofany z oferty</p>
			<?php }else{ ?>
				<p class="version">
					<?php if ($_smarty_tpl->tpl_vars['project']->value['type']=='skeleton'){?>
						<strong>Wersja szkieletowa</strong>
					<?php }else{ ?>
						Wersja murowana
					<?php }?>

					<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isWT2021needfulHeat'][0][0]->mIsWT2021needfulHeat($_smarty_tpl->tpl_vars['projectParams']->value)&&$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isWT2021needful'][0][0]->mIsWT2021needful($_smarty_tpl->tpl_vars['projectParams']->value)){?>
						- dostępność <strong>zapytaj o termin</strong></p>
						<p class="info big"><strong>Uwaga!</strong> Ze względu na obowiązujące od 01.01.2021 nowe warunki techniczne <strong><span>WT2021</span></strong><br>konieczna będzie korekta projektu<br><strong>w zakresie ogrzewania</strong>, dodatkowo wymiary zewnętrzne bryły mogą ulec zmianie do kilkunastu cm.</p>
					<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isWT2021needful'][0][0]->mIsWT2021needful($_smarty_tpl->tpl_vars['projectParams']->value)){?>
						- dostępność <strong>zapytaj o termin</strong></p>
						
						<p class="info big"><strong>Uwaga!</strong> Ze względu na obowiązujące od 01.01.2021 nowe warunki techniczne <strong><span>WT2021</span></strong><br>konieczna będzie korekta projektu,<br>przez co wymiary zewnętrzne bryły<br>mogą ulec zmianie do kilkunastu cm.</p>
					<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isWT2021needfulHeat'][0][0]->mIsWT2021needfulHeat($_smarty_tpl->tpl_vars['projectParams']->value)&&$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isAvailable'][0][0]->mIsAvailable($_smarty_tpl->tpl_vars['projectParams']->value)){?>
						- dostępność <strong>zapytaj o termin</strong></p>
						<p class="info big"><strong>Uwaga!</strong> Ze względu na obowiązujące od 01.01.2021 nowe warunki techniczne <strong><span>WT2021</span></strong><br>konieczna będzie korekta projektu<br><strong>w zakresie ogrzewania</strong>.<br><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'ajax','action'=>'get_realisation_info'),$_smarty_tpl);?>
"><strong>zapytaj o termin realizacji</strong></span></p>
					<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNarrowGarage'][0][0]->mIsNarrowGarage($_smarty_tpl->tpl_vars['projectParams']->value)){?>
						</p><p class="info">ze względu na zmianę przepisów<br>i konieczność korekty szerokości garażu<br>w projekcie technicznym,<br><strong>zapytaj o termin realizacji</strong>
					<?php }else{ ?> 
						<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isReady14days'][0][0]->mIsReady14days($_smarty_tpl->tpl_vars['projectParams']->value)){?>
							
							- dostępność <strong>3-14 dni</strong>
							
						<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isReady7days'][0][0]->mIsReady7days($_smarty_tpl->tpl_vars['projectParams']->value)){?>
							
							- dostępność <strong>3-14 dni</strong>
						<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isAvailable'][0][0]->mIsAvailable($_smarty_tpl->tpl_vars['projectParams']->value)){?>
							- dostępność <strong>3-5 dni</strong>
						<?php }else{ ?>
							<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isWT2021needfulHeat'][0][0]->mIsWT2021needfulHeat($_smarty_tpl->tpl_vars['projectParams']->value)){?>
								</p><p class="info big">Projekt w fazie koncepcyjnej, dostępny na zamówienie.<br>Uwaga! Projekt wymaga korekty<br><strong>w zakresie ogrzewania</strong>.<br><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'ajax','action'=>'get_realisation_info'),$_smarty_tpl);?>
"><strong>zapytaj o termin realizacji</strong></span>
							<?php }else{ ?>
								</p><p class="info big">Projekt w fazie koncepcyjnej, dostępny na zamówienie.<br><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'ajax','action'=>'get_realisation_info'),$_smarty_tpl);?>
"><strong>zapytaj o termin realizacji</strong></span>
							<?php }?>
						<?php }?>
					<?php }?>
				</p>
				
				<?php if ($_smarty_tpl->tpl_vars['project']->value['price']){?>
				
					<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isHalfPrice'][0][0]->mIsHalfPrice($_smarty_tpl->tpl_vars['projectParams']->value)){?>
						<p class="price"><?php echo number_format(($_smarty_tpl->tpl_vars['project']->value['price']/2),2,",",'');?>
 <span>zł</span></p>
						<p class="vatInfo">informacyjna cena za 1 <?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isDual'][0][0]->mIsDual($_smarty_tpl->tpl_vars['projectParams']->value)){?>lokal<?php }else{ ?>segment<?php }?></p>
					<?php }?>
					<p class="price<?php if ($_smarty_tpl->tpl_vars['project']->value['discount']){?> promo<?php }?>"><?php if ($_smarty_tpl->tpl_vars['project']->value['discount']){?><span class="old-price discount"<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isBlackWeek'][0][0]->mIsBlackWeek($_smarty_tpl->tpl_vars['projectParams']->value)){?> style="color:#fff;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['project']->value['price'];?>
 zł</span><span class="current-price" style="color: #cc1000; font-size:3.6rem; text-align: right; margin: 18px 0 12px; font-family: 'LatoLatinWeb',sans-serif;"><?php echo $_smarty_tpl->tpl_vars['project']->value['price']-$_smarty_tpl->tpl_vars['project']->value['discount'];?>
</span><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['project']->value['price'];?>
<?php }?> <span class="currency"<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isBlackWeek'][0][0]->mIsBlackWeek($_smarty_tpl->tpl_vars['projectParams']->value)){?> style="color:#fff;"<?php }?>>zł</span></p>
					
					<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isHalfPrice'][0][0]->mIsHalfPrice($_smarty_tpl->tpl_vars['projectParams']->value)){?><p class="vatInfo">cena za cały budynek</p>
					<p class="vatInfo">(w tym 23% VAT)</p>
					<p class="promoInfo">sprzedawany wyłącznie w całości</p><?php }else{ ?><p class="vatInfo">(w tym 23% VAT)</p><?php }?>
					<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isBlackWeek'][0][0]->mIsBlackWeek($_smarty_tpl->tpl_vars['projectParams']->value)&&$_smarty_tpl->tpl_vars['blackWeekTxt']->value){?>
						<p class="promoInfo"><strong><?php echo $_smarty_tpl->tpl_vars['blackWeekTxt']->value;?>
</strong></p>
					<?php }elseif($_smarty_tpl->tpl_vars['promoEnd']->value){?>
						<p class="promoInfo"><?php echo $_smarty_tpl->tpl_vars['promoEnd']->value;?>
</p>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['project']->value['discount']){?>
						<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isBlackWeek'][0][0]->mIsBlackWeek($_smarty_tpl->tpl_vars['projectParams']->value)||$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isChristmas'][0][0]->mIsChristmas($_smarty_tpl->tpl_vars['projectParams']->value)){?><p class="version" style="font-weight: bold;">Tylko dla klientów indywidualnych!</p><?php }?>
						<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isBlackWeek'][0][0]->mIsBlackWeek($_smarty_tpl->tpl_vars['projectParams']->value)){?>
							<p class="version">Najniższa cena z 30 dni przed obniżką: <?php echo $_smarty_tpl->tpl_vars['project']->value['price']-$_smarty_tpl->tpl_vars['project']->value['discount'];?>
 zł</p>
						<?php }else{ ?>
							<p class="version">Najniższa cena z 30 dni przed obniżką: <?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['lowestPrice'][0][0]->mLowestPrice($_smarty_tpl->tpl_vars['projectParams']->value)){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['lowestPrice'][0][0]->mLowestPrice($_smarty_tpl->tpl_vars['projectParams']->value);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['project']->value['price'];?>
<?php }?> zł</p>
						<?php }?>	
					<?php }?>
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'order','action'=>'cart'),$_smarty_tpl);?>
" class="cart simple" rel="nofollow"><span class="basket<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['inBasket'][0][0]->mInBasket($_smarty_tpl->tpl_vars['project']->value,$_smarty_tpl->tpl_vars['request']->value['version'])){?> disabled<?php }?>"<?php if (!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['inBasket'][0][0]->mInBasket($_smarty_tpl->tpl_vars['project']->value,$_smarty_tpl->tpl_vars['request']->value['version'])){?> id="addToBasket" data-version="<?php echo $_smarty_tpl->tpl_vars['request']->value['version'];?>
" data-project="<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['project']->value['discount']){?><?php echo $_smarty_tpl->tpl_vars['project']->value['price']-$_smarty_tpl->tpl_vars['project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['project']->value['price'];?>
<?php }?>" data-link="<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>'projekty-domow','version'=>'lustro'),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
<?php }?>" data-name="<?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
" data-thumb="<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'mirror'=>1),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'size'=>'thumb'),$_smarty_tpl);?>
<?php }?>"<?php }?>><?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['inBasket'][0][0]->mInBasket($_smarty_tpl->tpl_vars['project']->value,$_smarty_tpl->tpl_vars['request']->value['version'])){?>W koszyku<?php }else{ ?>Do koszyka<?php }?></span></a>					
					<?php if ($_smarty_tpl->tpl_vars['projectParams']->value[97]&&$_smarty_tpl->tpl_vars['projectParams']->value[97]['string_value']!='pompa ciepła'){?>
						<p class="options">
							<input type="checkbox" name="pomp" value="1" id="pompSel"> <label for="pompSel">wersja z pompą ciepła: <strong>+ 690 zł</strong></label>
						</p>
						<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['pcforfree'][0][0]->mPCForFree($_smarty_tpl->tpl_vars['projectParams']->value)){?>
						<p class="options" style="margin-top: 15px; border: none; height: 80px; background-color: #FFA800; color: #000; padding: 5px;">
							<strong>do 30 grudnia pompa ciepła za 0zł z kodem: <span style="color:#fff;">POMPA25-PC</span></strong>
							<br><span style="font-size: 1.1rem;">* wprowadź powyższy kod po dodaniu projektu do koszyka</span>
						</p>
						<div id="pompInfo" style="display: none;"></div>
						<?php }else{ ?>
							<div id="pompInfo" style="display: none; text-align: center; color: #cc1000;">UWAGA!<br>Przed złożeniem zamówienia zapytaj konsultanta o termin realizacji wariantu z pompą ciepła!</div>	
						<?php }?>
					<?php }?>
					
				<?php }else{ ?>
					<p class="price">projekt pokazowy<br><span>cena do uzgodnienia</span></p>
				<?php }?>
				<?php if (!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isBlackWeek'][0][0]->mIsBlackWeek($_smarty_tpl->tpl_vars['projectParams']->value)){?>
					<?php if ($_smarty_tpl->tpl_vars['project']->value['price']){?>
						<p class="button strong"><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project_extend','action'=>'promo_info_notify'),$_smarty_tpl);?>
" data-call="PromoNotify.registerForm">powiadom o dodatkowej promocji</span></p>
						<p class="button"><a href="<?php if ($_smarty_tpl->tpl_vars['user']->value){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message','project_id'=>$_smarty_tpl->tpl_vars['project']->value['id']),$_smarty_tpl);?>
<?php }else{ ?>javascript:<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['user']->value){?> class="consultant"<?php }?>>znalazłeś ten projekt taniej? napisz</a></p>
					<?php }?>
					<?php if (!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isReady7days'][0][0]->mIsReady7days($_smarty_tpl->tpl_vars['projectParams']->value)&&!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isAvailable'][0][0]->mIsAvailable($_smarty_tpl->tpl_vars['projectParams']->value)){?><p class="button"><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'ajax','action'=>'get_realisation_info'),$_smarty_tpl);?>
">zapytaj o termin realizacji</span></p><?php }?>
					<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasSkeletonOption'][0][0]->mHasSkeletonOption($_smarty_tpl->tpl_vars['projectParams']->value)){?>
						<?php if ($_smarty_tpl->tpl_vars['skeletonPrice']->value&&$_smarty_tpl->tpl_vars['project']->value['type']!='skeleton'){?>
							<p class="button" style="background-color: #FFA800; position: relative;"><a href="javascript:" id="skeleton-trigger"><strong>zapytaj o wersję szkieletową</strong> <img src="/img/info2.png" alt="Promocja!" style="position: absolute; right: 5px;"></a></p>
						<?php }elseif($_smarty_tpl->tpl_vars['skeletonPrice']->value&&$_smarty_tpl->tpl_vars['project']->value['type']=='skeleton'){?>
							<p class="button"><a href="javascript:" id="skeleton-trigger">zapytaj o wersję murowaną</a></p>
						<?php }?>
					<?php }elseif($_smarty_tpl->tpl_vars['project']->value['type']=='skeleton'&&$_smarty_tpl->tpl_vars['skeletonPrice']->value){?>
						<p class="button"><a href="javascript:" id="skeleton-trigger">zapytaj o wersję murowaną</a></p>
					<?php }?>
				<?php }?>
			<?php }?>
			</div>
		</div>
		
		
		<div class="addons">
			<?php if ($_smarty_tpl->tpl_vars['linkedProjectUrl']->value){?>
				<?php if ($_smarty_tpl->tpl_vars['project']->value['type']=='skeleton'){?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['linkedProjectUrl']->value;?>
"><img src="/img/murowany.png?t=20240604" alt="Zobacz wersję murowaną projektu <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
" width="410" height="64" style="max-width: 100%; height: auto;" class="wolf"></a><br>
				<?php }else{ ?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['linkedProjectUrl']->value;?>
"><img src="/img/szkielet.png?t=20240604" alt="Zobacz wersję szkieletową projektu <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
" width="410" height="64" style="max-width: 100%; height: auto;" class="wolf"></a><br>
				<?php }?>
			<?php }?>			
			<?php if (!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isWithdrawn'][0][0]->mIsWithdrawn($_smarty_tpl->tpl_vars['projectParams']->value)){?><a href="javascript:" class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project_extend','action'=>'project_addons'),$_smarty_tpl);?>
&id=<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
" data-call="ProjectAddons.register"><img src="/img/dodatki.png" alt="Zobacz dodatki i gratisy do projektu" width="410" height="64" style="max-width: 100%; height: auto;"></a><?php }?>
			<br><a href="/znajdziemy-dla-ciebie-projekt.html"><img src="/img/znajdziemy.png" alt="Szukasz innego projektu domu? Znajdziemy go dla Ciebie!" width="410" height="64" style="max-width: 100%; height: auto;" class="wolf"></a>
		</div>
		<div id="technical-data-box" class="technical-data">
			<p class="header">Dane techniczne</p>
			
			<?php if ($_smarty_tpl->tpl_vars['withSeparateGarage']->value==1){?>
				<p class="subheader">Dom jednorodzinny</p>
			<?php }?>
			<table class="tech">
			<?php $_smarty_tpl->tpl_vars['nettoSum'] = new Smarty_variable(0, null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['technicalList']->value['params']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_item']->iteration=0;
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_item']->iteration++;
 $_smarty_tpl->tpl_vars['_item']->index++;
 $_smarty_tpl->tpl_vars['_item']->last = $_smarty_tpl->tpl_vars['_item']->iteration === $_smarty_tpl->tpl_vars['_item']->total;
?>
			
				<?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['value_type']=='string'){?>
		        	<?php $_smarty_tpl->tpl_vars['paramValue'] = new Smarty_variable($_smarty_tpl->tpl_vars['projectParams']->value[$_smarty_tpl->tpl_vars['_item']->value]['string_value'], null, 0);?>
		        <?php }else{ ?>
		        	<?php $_smarty_tpl->tpl_vars['paramValue'] = new Smarty_variable($_smarty_tpl->tpl_vars['projectParams']->value[$_smarty_tpl->tpl_vars['_item']->value]['num_value'], null, 0);?>
		        	
		        	<?php if ($_smarty_tpl->tpl_vars['paramValue']->value&&$_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['value_type']=='number'){?>
		        		<?php $_smarty_tpl->tpl_vars['paramValue'] = new Smarty_variable(number_format($_smarty_tpl->tpl_vars['projectParams']->value[$_smarty_tpl->tpl_vars['_item']->value]['num_value'],2,',',' '), null, 0);?>
		        	<?php }?>
		        <?php }?>
				<?php if ($_smarty_tpl->tpl_vars['paramValue']->value){?>
					<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['stairsChange'][0][0]->mStairsChange($_smarty_tpl->tpl_vars['projectParams']->value)&&($_smarty_tpl->tpl_vars['_item']->value==1||$_smarty_tpl->tpl_vars['_item']->value==2)){?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['name'];?>
<?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['description']){?><span class="param-info" data-id="<?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['id'];?>
"></span><?php }?></td>
							<td><div><?php echo $_smarty_tpl->tpl_vars['paramValue']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['unit'];?>
</div><span class="param-info special" data-id="141"></span></td>
						</tr>
					<?php }else{ ?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['name'];?>
<?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['description']){?><span class="param-info" data-id="<?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['id'];?>
"></span><?php }?></td>
							<td><?php echo $_smarty_tpl->tpl_vars['paramValue']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['unit'];?>
</td>
						</tr>
					<?php }?>
				
				<?php }?>
				
				
				<?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['id']==16||$_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['id']==18||$_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['id']==20||$_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['id']==17||$_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['id']==19||$_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['id']==21){?>								
					<?php $_smarty_tpl->tpl_vars['nettoSum'] = new Smarty_variable($_smarty_tpl->tpl_vars['nettoSum']->value+floatval($_smarty_tpl->tpl_vars['projectParams']->value[$_smarty_tpl->tpl_vars['_item']->value]['num_value']), null, 0);?>
				<?php }?>
			<?php } ?>
				<?php if ($_smarty_tpl->tpl_vars['project']->value['type']=='skeleton'&&$_smarty_tpl->tpl_vars['projectParams']->value[152]&&$_smarty_tpl->tpl_vars['projectParams']->value[153]){?>
					<?php $_smarty_tpl->tpl_vars['skeletonH'] = new Smarty_variable(number_format($_smarty_tpl->tpl_vars['projectParams']->value[152]['num_value'],2,',',' '), null, 0);?>
					<?php $_smarty_tpl->tpl_vars['skeletonW'] = new Smarty_variable(number_format($_smarty_tpl->tpl_vars['projectParams']->value[153]['num_value'],2,',',' '), null, 0);?>
					<tr>
						<td>normatywne wym. działki<span class="param-info" data-id="152"></span></td>
						<td><?php echo $_smarty_tpl->tpl_vars['skeletonW']->value;?>
 x <?php echo $_smarty_tpl->tpl_vars['skeletonH']->value;?>
 m</td>
					</tr>
				<?php }?>
				<tr<?php if ($_smarty_tpl->tpl_vars['project']->value['type']=='skeleton'){?> style="color: #CC1000;"<?php }?>>
					<td>minimalne wym. działki<span class="param-info" data-id="<?php if ($_smarty_tpl->tpl_vars['project']->value['type']=='skeleton'){?>75<?php }else{ ?>76<?php }?>"></span></td>
					<td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelWidth'][0][0]->mParcelWidth($_smarty_tpl->tpl_vars['project']->value['params_general']);?>
 x <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelHeight'][0][0]->mParcelHeight($_smarty_tpl->tpl_vars['project']->value['params_general']);?>
 m</td>
				</tr>
				
			</table>
			<?php if ($_smarty_tpl->tpl_vars['withSeparateGarage']->value==1){?>
				<p class="subheader">Garaż wolnostojący</p>
				<table class="tech">
					<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['technicalGarageList']->value['params']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_item']->iteration=0;
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_item']->iteration++;
 $_smarty_tpl->tpl_vars['_item']->index++;
 $_smarty_tpl->tpl_vars['_item']->last = $_smarty_tpl->tpl_vars['_item']->iteration === $_smarty_tpl->tpl_vars['_item']->total;
?>
					
						<?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['value_type']=='string'){?>
				        	<?php $_smarty_tpl->tpl_vars['paramValue'] = new Smarty_variable($_smarty_tpl->tpl_vars['projectParams']->value[$_smarty_tpl->tpl_vars['_item']->value]['string_value'], null, 0);?>
				        <?php }else{ ?>
				        	<?php $_smarty_tpl->tpl_vars['paramValue'] = new Smarty_variable($_smarty_tpl->tpl_vars['projectParams']->value[$_smarty_tpl->tpl_vars['_item']->value]['num_value'], null, 0);?>
				        	
				        	<?php if ($_smarty_tpl->tpl_vars['paramValue']->value&&$_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['value_type']=='number'){?>
				        		<?php $_smarty_tpl->tpl_vars['paramValue'] = new Smarty_variable(number_format($_smarty_tpl->tpl_vars['projectParams']->value[$_smarty_tpl->tpl_vars['_item']->value]['num_value'],2,',',' '), null, 0);?>
				        	<?php }?>
				        <?php }?>
		
						<?php if ($_smarty_tpl->tpl_vars['paramValue']->value){?>
							<tr>
								<td><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['name'],"garaż:",'');?>
<?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['description']){?><span class="param-info" data-id="<?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['id'];?>
"></span><?php }?></td>
								<td><?php echo $_smarty_tpl->tpl_vars['paramValue']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['unit'];?>
</td>
							</tr>
						<?php }?>
					<?php } ?>
				</table>
			<?php }?>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['features']->value){?>
			<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_item']->iteration=0;
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_item']->iteration++;
 $_smarty_tpl->tpl_vars['_item']->index++;
 $_smarty_tpl->tpl_vars['_item']->last = $_smarty_tpl->tpl_vars['_item']->iteration === $_smarty_tpl->tpl_vars['_item']->total;
?>
				<?php if (($_smarty_tpl->tpl_vars['_item']->value['id']==6||$_smarty_tpl->tpl_vars['_item']->value['id']==7||$_smarty_tpl->tpl_vars['_item']->value['id']==19)&&$_smarty_tpl->tpl_vars['setF']->value!=1){?>
					<div class="info-box no-border no-padding"><div class="features">
					<?php $_smarty_tpl->tpl_vars['setF'] = new Smarty_variable(1, null, 0);?>
				<?php }?>	
				<?php if ($_smarty_tpl->tpl_vars['_item']->value['id']==6||$_smarty_tpl->tpl_vars['_item']->value['id']==7||$_smarty_tpl->tpl_vars['_item']->value['id']==19){?>	
					<p<?php if ($_smarty_tpl->tpl_vars['featureIcons']->value&&$_smarty_tpl->tpl_vars['featureIcons']->value[$_smarty_tpl->tpl_vars['_item']->value['id']]){?> class="icon <?php echo $_smarty_tpl->tpl_vars['featureIcons']->value[$_smarty_tpl->tpl_vars['_item']->value['id']];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['_item']->value['description'];?>
</p>
				<?php }?>			
			<?php } ?>
				<?php if ($_smarty_tpl->tpl_vars['setF']->value==1){?>
					</div></div>
				<?php }?>	
		<?php }?>	
		
		<div id="info-box" class="info-box no-border">
			<p class="header">Technologia</p>
			
			<?php if ($_smarty_tpl->tpl_vars['project']->value['technology']){?>
			<p>
				<?php echo $_smarty_tpl->tpl_vars['project']->value['technology'];?>

				<?php if ($_smarty_tpl->tpl_vars['project']->value['type']=='skeleton'){?>
					<a href="javascript:" class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'ajax','action'=>'get_skeleton_technology'),$_smarty_tpl);?>
">więcej</a>
				<?php }?>
			</p>
			<?php }?>
			<p>&nbsp;</p>
			<p><a href="/dokumenty/Wspolpraca.html#par1180"><img src="/img/hormann.png" width="410" height="88" alt="Hörmann - drzwi i bramy" class="wolf"></a></p>
			<p>&nbsp;</p>
			<p><a href="/dokumenty/Wspolpraca.html#par1179"><img src="/img/fakro.png" width="410" height="88" alt="Fakro - okna dachowe" class="wolf"></a></p>
			<p>&nbsp;</p>
			<p><a href="/dokumenty/Wspolpraca.html#par1215"><img src="/img/termoorganika.png" width="410" height="88" alt="Termoorganika - Myśl: ciepło" class="wolf"></a></p>
			<p>&nbsp;</p>
			<p><a href="/dokumenty/Wspolpraca.html#par1309"><img src="/img/aluprof.png" width="410" height="88" alt="Aluprof" class="wolf"></a></p>
			<p>&nbsp;</p>
			<p><a href="/dokumenty/Wspolpraca.html#par1525"><img src="/img/braas.png" width="410" height="88" alt="Braas" class="wolf"></a></p>
			
		</div>
		<?php if ($_smarty_tpl->tpl_vars['project']->value['build_cost']['date']!=''&&$_smarty_tpl->tpl_vars['project']->value['build_cost']['open']>0&&!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isWithdrawn'][0][0]->mIsWithdrawn($_smarty_tpl->tpl_vars['projectParams']->value)){?>
		<div id="cost-box" class="cost-box">
			<p class="header">Koszty budowy</p>

			<p>stan surowy: <span><?php echo number_format($_smarty_tpl->tpl_vars['project']->value['build_cost']['open'],0,',',' ');?>
</span> zł</p>
			<p>roboty wykończeniowe: <?php echo number_format($_smarty_tpl->tpl_vars['project']->value['build_cost']['finish'],0,',',' ');?>
 zł</p>
			<p>instalacje: <?php echo number_format($_smarty_tpl->tpl_vars['project']->value['build_cost']['fitting'],0,',',' ');?>
 zł</p>
			<p><span>koszt budowy pod klucz</span>: <span><strong><?php echo number_format($_smarty_tpl->tpl_vars['project']->value['build_cost']['full'],0,',',' ');?>
</strong></span> zł</p>
			<p>&nbsp;</p>
			<p>Podane ceny są cenami netto.</p>
			<p><?php echo $_smarty_tpl->tpl_vars['project']->value['build_cost']['date'];?>
 <span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'ajax','action'=>'get_estimate_info2'),$_smarty_tpl);?>
">Zobacz więcej.</span></p>
			<span class="framedB filesDloadTrigger">pobierz kosztorys</span>
		</div>
		
		<?php }elseif($_smarty_tpl->tpl_vars['project']->value['type']!='skeleton'&&$_smarty_tpl->tpl_vars['costs']->value['total']!=-1&&$_smarty_tpl->tpl_vars['costs']->value['rough']>0&&!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isWithdrawn'][0][0]->mIsWithdrawn($_smarty_tpl->tpl_vars['projectParams']->value)){?>
		
		<div id="cost-box" class="cost-box">
			<p class="header">Koszty budowy</p>

			<p>stan surowy: <span><?php echo number_format($_smarty_tpl->tpl_vars['costs']->value['rough'],0,',',' ');?>
</span> zł</p>
			<p>roboty wykończeniowe: <?php echo number_format($_smarty_tpl->tpl_vars['costs']->value['finish'],0,',',' ');?>
 zł</p>
			<p>instalacje: <?php echo number_format($_smarty_tpl->tpl_vars['costs']->value['installations'],0,',',' ');?>
 zł</p>
			<p><span>koszt budowy pod klucz</span>: <span><strong><?php echo number_format($_smarty_tpl->tpl_vars['costs']->value['total'],0,',',' ');?>
</strong></span> zł</p>
			<p>&nbsp;</p>
			<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['costInfo'][0][0]->mCostInfo($_smarty_tpl->tpl_vars['projectParams']->value)){?>
				<p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['costInfo'][0][0]->mCostInfo($_smarty_tpl->tpl_vars['projectParams']->value);?>
</p>
			<?php }?>
			<p>Podane ceny są cenami netto. <span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'ajax','action'=>'get_estimate_info'),$_smarty_tpl);?>
">Zobacz więcej.</span></p>
			
			<?php if (!$_smarty_tpl->tpl_vars['noestimate']->value&&$_smarty_tpl->tpl_vars['project']->value['type']!='skeleton'){?>
				<span class="framedB filesDloadTrigger">pobierz kosztorys</span>
			<?php }?>
		</div>
		<?php }?>


	<?php if (!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isWithdrawn'][0][0]->mIsWithdrawn($_smarty_tpl->tpl_vars['projectParams']->value)){?>
		
		<div class="info-box">
			<p><a href="/click.php?rel=jf9384yhhnv978fhnvw374yn983wfn98w&projekt=<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['project']->value['name'],' ','_');?>
&link=<?php echo $_smarty_tpl->tpl_vars['projectUrl']->value;?>
" rel="nofollow" target="_blank"><img src="/img/wolf.webp" width="410" height="102" alt="Wolf Haus" class="wolf"></a></p>
		</div>
		<div class="info-box">
			<p><a href="/click.php?rel=nbcns784bvbanc84nfika89234nwnfns8e" rel="nofollow" target="_blank"><img src="/img/rekuperatory.png" width="411" height="101" alt="Rekuperatory.pl" class="wolf"></a></p>
		</div>
		
		
		
		<div class="info-box">
			<p class="header">Informacje</p>
			
			<div class="hilite-box">
				<p>Projekt należy do kategorii</p>
				
				<div>
				<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projectCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_item']->iteration=0;
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_item']->iteration++;
 $_smarty_tpl->tpl_vars['_item']->index++;
 $_smarty_tpl->tpl_vars['_item']->last = $_smarty_tpl->tpl_vars['_item']->iteration === $_smarty_tpl->tpl_vars['_item']->total;
?>
					<?php if ($_smarty_tpl->tpl_vars['_item']->value['link']){?>
						<a href="/<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];?>
/"><?php echo strtolower($_smarty_tpl->tpl_vars['_item']->value['name']);?>
</a><?php if (!$_smarty_tpl->tpl_vars['_item']->last){?> | <?php }?>
					<?php }?>
				<?php } ?>
				</div>
				
				<p>Tagi do projektu</p>
				<div class="cloud">
				<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_smarty_tpl->tpl_vars['_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['csCloudParams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_item']->iteration=0;
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_key']->value = $_smarty_tpl->tpl_vars['_item']->key;
 $_smarty_tpl->tpl_vars['_item']->iteration++;
 $_smarty_tpl->tpl_vars['_item']->index++;
 $_smarty_tpl->tpl_vars['_item']->last = $_smarty_tpl->tpl_vars['_item']->iteration === $_smarty_tpl->tpl_vars['_item']->total;
?>
					<?php if (isset($_smarty_tpl->tpl_vars['projectParams']->value[$_smarty_tpl->tpl_vars['_key']->value])){?>
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'click_search'),$_smarty_tpl);?>
?<?php echo $_smarty_tpl->tpl_vars['_item']->value[1];?>
=1"><?php echo $_smarty_tpl->tpl_vars['_item']->value[0];?>
</a>
					<?php }?>
				<?php } ?>
				
				<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_smarty_tpl->tpl_vars['_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['csCloudSelectParams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_item']->iteration=0;
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_key']->value = $_smarty_tpl->tpl_vars['_item']->key;
 $_smarty_tpl->tpl_vars['_item']->iteration++;
 $_smarty_tpl->tpl_vars['_item']->index++;
 $_smarty_tpl->tpl_vars['_item']->last = $_smarty_tpl->tpl_vars['_item']->iteration === $_smarty_tpl->tpl_vars['_item']->total;
?>
					<?php if (isset($_smarty_tpl->tpl_vars['projectParams']->value[$_smarty_tpl->tpl_vars['_key']->value])){?>
						<?php $_smarty_tpl->tpl_vars['paramValue'] = new Smarty_variable((($tmp = @array_search($_smarty_tpl->tpl_vars['projectParams']->value[$_smarty_tpl->tpl_vars['_key']->value]['string_value'],$_smarty_tpl->tpl_vars['csParamsValueNames']->value))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['projectParams']->value[$_smarty_tpl->tpl_vars['_key']->value]['string_value'] : $tmp), null, 0);?>
						<?php if (!$_smarty_tpl->tpl_vars['paramValue']->value){?><?php $_smarty_tpl->tpl_vars['paramValue'] = new Smarty_variable($_smarty_tpl->tpl_vars['projectParams']->value[$_smarty_tpl->tpl_vars['_key']->value]['string_value'], null, 0);?><?php }?>
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'click_search'),$_smarty_tpl);?>
?<?php echo $_smarty_tpl->tpl_vars['_item']->value[1];?>
=<?php echo $_smarty_tpl->tpl_vars['paramValue']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value[0];?>
 : <?php echo $_smarty_tpl->tpl_vars['projectParams']->value[$_smarty_tpl->tpl_vars['_key']->value]['string_value'];?>
</a>
					<?php }?>
				<?php } ?>
				</div>
			</div>

			<?php if ($_smarty_tpl->tpl_vars['features']->value){?>
			<div class="features">
			<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_item']->iteration=0;
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_item']->iteration++;
 $_smarty_tpl->tpl_vars['_item']->index++;
 $_smarty_tpl->tpl_vars['_item']->last = $_smarty_tpl->tpl_vars['_item']->iteration === $_smarty_tpl->tpl_vars['_item']->total;
?>
				<?php if ($_smarty_tpl->tpl_vars['_item']->value['id']!=6&&$_smarty_tpl->tpl_vars['_item']->value['id']!=7){?>
					<p<?php if ($_smarty_tpl->tpl_vars['featureIcons']->value&&$_smarty_tpl->tpl_vars['featureIcons']->value[$_smarty_tpl->tpl_vars['_item']->value['id']]){?> class="icon <?php echo $_smarty_tpl->tpl_vars['featureIcons']->value[$_smarty_tpl->tpl_vars['_item']->value['id']];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['_item']->value['description'];?>
</p>
				<?php }?>	
			<?php } ?>
			<?php if ($_smarty_tpl->tpl_vars['linkedProjectUrl']->value){?>
				<?php if ($_smarty_tpl->tpl_vars['project']->value['type']=='skeleton'){?>
					<p><a href="<?php echo $_smarty_tpl->tpl_vars['linkedProjectUrl']->value;?>
"><strong>dostępna wersja murowana projektu</strong></a></p>
				<?php }else{ ?>
					<p><a href="<?php echo $_smarty_tpl->tpl_vars['linkedProjectUrl']->value;?>
"><strong>dostępna wersja szkieletowa projektu</strong></a></p>
				<?php }?>
			<?php }?>
			</div>
			<?php }?>
			
			<p class="spaced">
				<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isAvailable'][0][0]->mIsAvailable($_smarty_tpl->tpl_vars['projectParams']->value)){?><span class="framedB filesDloadTrigger">pliki do pobrania</span><?php }?>
				<span class="trigger framedB" id="changes" data-txt="Na życzenie Inwestora, wprowadzamy odpłatnie zmiany w naszych projektach. Ceny i możliwość wykonania zmian w wybranym projekcie ustalane są indywidualnie. Na pozostałe zmiany wydajemy bezpłatną zgodę jako autorzy projektu, na podstawie której lokalny projektant może wykonać adaptacje.">Zmiany w projekcie</span>
			</p>
		</div>
	<?php }?>
		<div id="descript-box" class="info-box">
			<p class="header">Opis</p>
			
			<p class="desc"><?php echo $_smarty_tpl->tpl_vars['project']->value['description'];?>
</p>
			<?php if ($_smarty_tpl->tpl_vars['projectParams']->value[145]['string_value']){?>
				<p class="header spaced">Realizacja</p>
				<p><?php echo $_smarty_tpl->tpl_vars['projectParams']->value[145]['string_value'];?>
</p>
			<?php }?>
		</div>
		
		
		<div class="info-box addons" id="project-help">
			<p>Potrzebujesz pomocy w znalezieniu wymarzonego projektu?
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'varia','action'=>'project_helper'),$_smarty_tpl);?>
">znajdziemy dla Ciebie najlepszy projekt domu</a></p>
		</div>
		<div class="info-box addons" id="buyer-benefits-header">
			<p class="header aleft"><strong>Co zyskasz kupując u źródła?</strong></p>
		</div>
		<div class="info-box no-border no-padding" id="buyer-benefits">
			<div class="features normal">
				<p>konsultację z <strong>autorem projektu</strong> na każdym etapie</p>
				<p>gwarancję <strong>najniższej ceny</strong></p>
				<p><strong>bezpłatną</strong> zgodę na zmiany w projekcie</p>
				<p><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project_extend','action'=>'project_addons'),$_smarty_tpl);?>
&id=<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
" data-call="ProjectAddons.register">bezpłatne dodatki</span> o min. wartości <strong>1000 zł</strong></p>
				<p><strong>darmową</strong> dostawę firmą kurierską</p>
				<p>wymianę do <strong>365 dni</strong> lub zwrot projektu do <strong>30 dni</strong></p>
			</div>
		</div>
		</div>	
	</div>
</div>

<?php  $_smarty_tpl->tpl_vars['sketch'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sketch']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectSketch']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['sketch']->iteration=0;
 $_smarty_tpl->tpl_vars['sketch']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['sketch']->key => $_smarty_tpl->tpl_vars['sketch']->value){
$_smarty_tpl->tpl_vars['sketch']->_loop = true;
 $_smarty_tpl->tpl_vars['sketch']->iteration++;
 $_smarty_tpl->tpl_vars['sketch']->index++;
 $_smarty_tpl->tpl_vars['sketch']->first = $_smarty_tpl->tpl_vars['sketch']->index === 0;
?>
<div class="project-box"<?php if ($_smarty_tpl->tpl_vars['sketch']->first){?> id="sketch-box"<?php }?>>
	<div class="render-box sketch-box" id="rzut-<?php echo $_smarty_tpl->tpl_vars['sketch']->iteration;?>
">
		<div>
		<?php if ($_smarty_tpl->tpl_vars['sketchAuthorize']->value[$_smarty_tpl->tpl_vars['sketch']->value['id']]){?>
			<p class="showSketchAuthorize">dotknij dane pomieszczenie by zobaczyć opis i powierzchnię</p>
			<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
				<img class="sketchImg" id="sketch-<?php echo $_smarty_tpl->tpl_vars['sketch']->iteration;?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value,'storey'=>$_smarty_tpl->tpl_vars['sketch']->value['props']['storey'],'mirror'=>1),$_smarty_tpl);?>
" width="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['props']['image_size']['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['props']['image_size']['height'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['title'];?>
 - projekt <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
 - wersja lustrzana">
				<svg title="Pomieszczenia - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapStorey'][0][0]->mMapStorey($_smarty_tpl->tpl_vars['sketch']->value['props']['storey']);?>
" xmlns="http://www.w3.org/2000/svg" class="sketchAuthorize" id="svg-<?php echo $_smarty_tpl->tpl_vars['sketch']->iteration;?>
" data-rooms='<?php echo $_smarty_tpl->tpl_vars['roomsPoints']->value[$_smarty_tpl->tpl_vars['sketch']->value['id']];?>
' data-offsetX='<?php echo $_smarty_tpl->tpl_vars['sketchAuthorize']->value[$_smarty_tpl->tpl_vars['sketch']->value['id']]['width'];?>
' data-offsetY='<?php echo $_smarty_tpl->tpl_vars['sketchAuthorize']->value[$_smarty_tpl->tpl_vars['sketch']->value['id']]['height'];?>
' data-sid='<?php echo $_smarty_tpl->tpl_vars['sketch']->iteration;?>
' data-mirror='1'></svg>
				<p><a class="sketch" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['title'];?>
 - <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
 - wersja lustrzana" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value,'storey'=>$_smarty_tpl->tpl_vars['sketch']->value['props']['storey'],'mirror'=>1),$_smarty_tpl);?>
">powiększ rzut</a></p>
			<?php }else{ ?>
				<img class="sketchImg" id="sketch-<?php echo $_smarty_tpl->tpl_vars['sketch']->iteration;?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value,'storey'=>$_smarty_tpl->tpl_vars['sketch']->value['props']['storey']),$_smarty_tpl);?>
" width="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['props']['image_size']['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['props']['image_size']['height'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['title'];?>
 - projekt <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
">
				<svg title="Pomieszczenia - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapStorey'][0][0]->mMapStorey($_smarty_tpl->tpl_vars['sketch']->value['props']['storey']);?>
" xmlns="http://www.w3.org/2000/svg" class="sketchAuthorize" id="svg-<?php echo $_smarty_tpl->tpl_vars['sketch']->iteration;?>
" data-rooms='<?php echo $_smarty_tpl->tpl_vars['roomsPoints']->value[$_smarty_tpl->tpl_vars['sketch']->value['id']];?>
' data-offsetX='<?php echo $_smarty_tpl->tpl_vars['sketchAuthorize']->value[$_smarty_tpl->tpl_vars['sketch']->value['id']]['width'];?>
' data-offsetY='<?php echo $_smarty_tpl->tpl_vars['sketchAuthorize']->value[$_smarty_tpl->tpl_vars['sketch']->value['id']]['height'];?>
' data-sid='<?php echo $_smarty_tpl->tpl_vars['sketch']->iteration;?>
' data-mirror='0'></svg>
				<p><a class="sketch" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['title'];?>
 - <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value,'storey'=>$_smarty_tpl->tpl_vars['sketch']->value['props']['storey']),$_smarty_tpl);?>
">powiększ rzut</a></p>
			<?php }?>
		<?php }else{ ?>
			<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
				<a class="sketch" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['title'];?>
 - <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
 - wersja lustrzana" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value,'storey'=>$_smarty_tpl->tpl_vars['sketch']->value['props']['storey'],'mirror'=>1),$_smarty_tpl);?>
">
					<img id="sketch-<?php echo $_smarty_tpl->tpl_vars['sketch']->iteration;?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value,'storey'=>$_smarty_tpl->tpl_vars['sketch']->value['props']['storey'],'mirror'=>1),$_smarty_tpl);?>
" width="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['props']['image_size']['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['props']['image_size']['height'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['title'];?>
 - projekt <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
 - wersja lustrzana">
				</a>
			<?php }else{ ?>
				<a class="sketch" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['title'];?>
 - <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value,'storey'=>$_smarty_tpl->tpl_vars['sketch']->value['props']['storey']),$_smarty_tpl);?>
">
					<img id="sketch-<?php echo $_smarty_tpl->tpl_vars['sketch']->iteration;?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value,'storey'=>$_smarty_tpl->tpl_vars['sketch']->value['props']['storey']),$_smarty_tpl);?>
" width="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['props']['image_size']['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['props']['image_size']['height'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['title'];?>
 - projekt <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
">
				</a>	
			<?php }?>	
		<?php }?>
		
		</div>

	<?php if ($_smarty_tpl->tpl_vars['banner']->value&&$_smarty_tpl->tpl_vars['sketch']->first){?>
		<div>
			<a href="<?php echo $_smarty_tpl->tpl_vars['banner']->value['link'];?>
" target="_blank" rel="nofollow">
				<img src="<?php echo $_smarty_tpl->tpl_vars['bannerUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['banner']->value['banner'];?>
" width="<?php echo $_smarty_tpl->tpl_vars['banner']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['banner']->value['height'];?>
" alt="">
			</a>
		</div>
	<?php }?>
	</div>
	
	<div class="data-box">
	<?php $_smarty_tpl->_capture_stack[0][] = array("chambers", null, null); ob_start(); ?>
		<?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable(0, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['total2'] = new Smarty_variable(0, null, 0);?>
		<table class="tech">
			<?php  $_smarty_tpl->tpl_vars['_param'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_param']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projectSketchParams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_param']->key => $_smarty_tpl->tpl_vars['_param']->value){
$_smarty_tpl->tpl_vars['_param']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['_param']->value['sketch_id']==$_smarty_tpl->tpl_vars['sketch']->value['id']){?>
				<tr id="sketchParam_<?php echo $_smarty_tpl->tpl_vars['_param']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['sketchParams']->value[$_smarty_tpl->tpl_vars['_param']->value['sketch_param_id']]['type']=='info'){?> style="background-color: #FCFCFC;"<?php }?>>
					<?php if ($_smarty_tpl->tpl_vars['sketchParams']->value[$_smarty_tpl->tpl_vars['_param']->value['sketch_param_id']]['type']=='normal'){?>
					<td>
						<?php echo $_smarty_tpl->tpl_vars['_param']->value['room_no'];?>

						<?php echo $_smarty_tpl->tpl_vars['sketchParams']->value[$_smarty_tpl->tpl_vars['_param']->value['sketch_param_id']]['name'];?>

					</td>
					<td>
						<?php echo number_format($_smarty_tpl->tpl_vars['_param']->value['area'],2,',',' ');?>

					</td>
					<?php }elseif($_smarty_tpl->tpl_vars['sketchParams']->value[$_smarty_tpl->tpl_vars['_param']->value['sketch_param_id']]['type']=='sum'){?>
						<?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['_param']->value['area'], null, 0);?>
						<?php $_smarty_tpl->tpl_vars['total2'] = new Smarty_variable($_smarty_tpl->tpl_vars['total2']->value+$_smarty_tpl->tpl_vars['total']->value, null, 0);?>
						<td>razem:</td>
						<td><strong><?php echo number_format($_smarty_tpl->tpl_vars['total']->value,2,',',' ');?>
</strong></td>
					<?php }elseif($_smarty_tpl->tpl_vars['sketchParams']->value[$_smarty_tpl->tpl_vars['_param']->value['sketch_param_id']]['type']=='info'){?>
						<td style="font-style: italic;"><?php echo $_smarty_tpl->tpl_vars['sketchParams']->value[$_smarty_tpl->tpl_vars['_param']->value['sketch_param_id']]['name'];?>
</td>
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
	
		<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['stairsChange'][0][0]->mStairsChange($_smarty_tpl->tpl_vars['projectParams']->value)){?>
			<h3><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapStorey'][0][0]->mMapStorey($_smarty_tpl->tpl_vars['sketch']->value['props']['storey']);?>
<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isMultiApartment'][0][0]->mIsMultiApartment($_smarty_tpl->tpl_vars['projectParams']->value)&&$_smarty_tpl->tpl_vars['total2']->value>0){?><span><?php echo number_format($_smarty_tpl->tpl_vars['total2']->value,2,',',' ');?>
 m<sup>2</sup></span><?php }elseif(!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isMultiApartment'][0][0]->mIsMultiApartment($_smarty_tpl->tpl_vars['projectParams']->value)&&$_smarty_tpl->tpl_vars['total']->value>0){?><span><?php echo number_format($_smarty_tpl->tpl_vars['total']->value,2,',',' ');?>
 m<sup>2</sup></span><?php }?> <span class="param-info special" data-id="141"></span></h3>
		<?php }else{ ?>
			<h3><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapStorey'][0][0]->mMapStorey($_smarty_tpl->tpl_vars['sketch']->value['props']['storey']);?>
<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isMultiApartment'][0][0]->mIsMultiApartment($_smarty_tpl->tpl_vars['projectParams']->value)&&$_smarty_tpl->tpl_vars['total2']->value>0){?><span><?php echo number_format($_smarty_tpl->tpl_vars['total2']->value,2,',',' ');?>
 m<sup>2</sup></span><?php }elseif(!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isMultiApartment'][0][0]->mIsMultiApartment($_smarty_tpl->tpl_vars['projectParams']->value)&&$_smarty_tpl->tpl_vars['total']->value>0){?><span><?php echo number_format($_smarty_tpl->tpl_vars['total']->value,2,',',' ');?>
 m<sup>2</sup></span><?php }?></h3>
		<?php }?>
		<?php echo Smarty::$_smarty_vars['capture']['chambers'];?>

		
		<div class="inner-box measure-link sketch">
			<ul class="link-box<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasMirror'][0][0]->mHasMirror($_smarty_tpl->tpl_vars['projectParams']->value)){?> three<?php }?> sketch">
			
			<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasMirror'][0][0]->mHasMirror($_smarty_tpl->tpl_vars['projectParams']->value)){?>
				<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
					<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
#rzut-<?php echo $_smarty_tpl->tpl_vars['sketch']->iteration;?>
" class="mirror">Zobacz <br>wersję podstawową</a></li>
				<?php }else{ ?>
					<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'version'=>'lustro','catalog'=>'projekty-domow'),$_smarty_tpl);?>
#rzut-<?php echo $_smarty_tpl->tpl_vars['sketch']->iteration;?>
" class="mirror on">Zobacz <br>odbicie lustrzane</a></li>
				<?php }?>
			<?php }?>
			
			
			
				<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
					<li class="measure-mode"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'version'=>'lustro','catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapStoreyCatalog'][0][0]->mMapStoreyCatalog($_smarty_tpl->tpl_vars['sketch']->value['props']['storey'])),$_smarty_tpl);?>
" class="distance">Zmierz <br>odległość</a></li>
					<li class="measure-mode"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'version'=>'lustro','catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapStoreyCatalog'][0][0]->mMapStoreyCatalog($_smarty_tpl->tpl_vars['sketch']->value['props']['storey'])),$_smarty_tpl);?>
#pow" class="area">Zmierz <br>powierzchnię</a></li>
				<?php }else{ ?>
					<li class="measure-mode"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapStoreyCatalog'][0][0]->mMapStoreyCatalog($_smarty_tpl->tpl_vars['sketch']->value['props']['storey'])),$_smarty_tpl);?>
" class="distance">Zmierz <br>odległość</a></li>
					<li class="measure-mode"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapStoreyCatalog'][0][0]->mMapStoreyCatalog($_smarty_tpl->tpl_vars['sketch']->value['props']['storey'])),$_smarty_tpl);?>
#pow" class="area">Zmierz <br>powierzchnię</a></li>
				<?php }?>
			
				<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
					<li class="measure"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'version'=>'lustro','catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapStoreyCatalog'][0][0]->mMapStoreyCatalog($_smarty_tpl->tpl_vars['sketch']->value['props']['storey'])),$_smarty_tpl);?>
" class="distance">Zmierz</a></li>
				<?php }else{ ?>
					<li class="measure"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapStoreyCatalog'][0][0]->mMapStoreyCatalog($_smarty_tpl->tpl_vars['sketch']->value['props']['storey'])),$_smarty_tpl);?>
" class="distance">Zmierz</a></li>
				<?php }?>
				
			
			</ul>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['sketch']->first){?>
			<div class="info-box"><p><a href="/projekt-indywidualny.html"><img src="/img/indywidualne.jpg" width="410" height="176" alt="Indywidualne projekty domów" class="wolf"></a></p></div>
		<?php }?>
		
	</div>
</div>
<?php } ?>

<?php  $_smarty_tpl->tpl_vars['extra'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['extra']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectExtraImage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['extra']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['extra']->key => $_smarty_tpl->tpl_vars['extra']->value){
$_smarty_tpl->tpl_vars['extra']->_loop = true;
 $_smarty_tpl->tpl_vars['extra']->index++;
?>
<div class="project-box">
	<div class="render-box sketch-box">
		<img class="lazy-image extra" data-uri="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'extra','project'=>$_smarty_tpl->tpl_vars['project']->value,'no'=>$_smarty_tpl->tpl_vars['extra']->index),$_smarty_tpl);?>
" src="/img/xg.png" width="<?php echo $_smarty_tpl->tpl_vars['extra']->value['props']['image_size']['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['extra']->value['props']['image_size']['height'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['extra']->value['title'];?>
">
	</div>
	
	<div class="data-box">
		<h4><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['extra']->value['title'],$_smarty_tpl->tpl_vars['project']->value['name'],'');?>
</h4>
		<?php if ($_smarty_tpl->tpl_vars['extra']->value['description']){?>
			<p><?php echo $_smarty_tpl->tpl_vars['extra']->value['description'];?>
</p>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['extra']->value['title']=='Usytuowanie na działce'){?>
			<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
				<p><strong>UWAGA!<br>Prezentowane usytuwanie dotyczy podstawowej wersji projektu!</strong></p>
			<?php }?>
		<?php }?>
	</div>
</div>
<?php } ?>

<?php if ($_smarty_tpl->tpl_vars['opinions']->value){?>
<div class="wrapper" id="opinions-box">
	<div class="box">
		<div class="flexslider">
			<ul class="slides" id="opinions">
			<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['opinions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_item']->iteration=0;
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_item']->iteration++;
 $_smarty_tpl->tpl_vars['_item']->index++;
 $_smarty_tpl->tpl_vars['_item']->last = $_smarty_tpl->tpl_vars['_item']->iteration === $_smarty_tpl->tpl_vars['_item']->total;
?>
				<li>
					<p class="txt"><?php echo strip_tags($_smarty_tpl->tpl_vars['_item']->value['content'],"<b><strong><em><span>");?>
</p>
					<p><?php echo $_smarty_tpl->tpl_vars['_item']->value['author'];?>
 | <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_item']->value['publish_date'],"%d %B %Y");?>
</p>
				</li>
			<?php } ?>
			</ul>
		</div>
	</div>
</div>
<?php }?>

<div id="option">
	<span id="komentarze"><a href="/forum/">Forum dyskusyjne</a></span>
	<p>Wpisy dla projektu <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
</p>
</div>

<div class="wrapper" id="extras-wrapper">
	<div class="box ajaxed" id="comment-list">
		<p class="just">
			Witamy na Forum dyskusyjnym Studia Atrium. To dział naszego serwisu przeznaczony dla wszystkich zainteresowanych projektami i budową domu według naszych projektów.
			Poniżej znajdują się wszystkie wpisy z Forum związane z projektem domu <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
. Zapraszamy do dyskusji! Przeczytaj <span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'ajax','action'=>'get_comment_regulations'),$_smarty_tpl);?>
">regulamin korzystania</span>.
		</p>
	
		<div class="new-comment-trigger">
			<span class="framed blue" id="new-comment-trigger" data-parent="0">dodaj nowy temat</span>
		</div>
		
		<ul class="forum-menu" id="forum-menu">
			<li data-cat="0" class="selected"><span><strong>Wszystkie</strong> (<?php if ($_smarty_tpl->tpl_vars['discuss_counter']->value['sum']){?><?php echo $_smarty_tpl->tpl_vars['discuss_counter']->value['sum'];?>
<?php }else{ ?>0<?php }?>)</span></li>
			<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_smarty_tpl->tpl_vars['_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['forumCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_item']->iteration=0;
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_key']->value = $_smarty_tpl->tpl_vars['_item']->key;
 $_smarty_tpl->tpl_vars['_item']->iteration++;
 $_smarty_tpl->tpl_vars['_item']->index++;
 $_smarty_tpl->tpl_vars['_item']->last = $_smarty_tpl->tpl_vars['_item']->iteration === $_smarty_tpl->tpl_vars['_item']->total;
?>
				<li data-cat="<?php echo $_smarty_tpl->tpl_vars['_key']->value;?>
"><span class="<?php echo $_smarty_tpl->tpl_vars['_item']->value['class'];?>
"><strong><?php echo $_smarty_tpl->tpl_vars['_item']->value['short'];?>
</strong> (<?php if ($_smarty_tpl->tpl_vars['discuss_counter']->value[$_smarty_tpl->tpl_vars['_key']->value]){?><?php echo $_smarty_tpl->tpl_vars['discuss_counter']->value[$_smarty_tpl->tpl_vars['_key']->value];?>
<?php }else{ ?>0<?php }?>)</span></li>
			<?php } ?>
		</ul>
		
		<p class="forum-initial">Wpisy o projekcie <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
 <span id="cat-initial">z wszystkich kategorii Forum</span> <img src="/img/waiter-blue.gif" alt="" id="forum-waiter" style="display: none;"></p>
		
		<div id="comment-form-wrapper"<?php if ($_smarty_tpl->tpl_vars['commentList']->value){?> style="display: none;"<?php }?>>
			<form class="validable" id="comment-form" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'add_comment'),$_smarty_tpl);?>
" method="post" data-call="Project.commentError" data-validate="ProjectCommentValidator.validate">
				<fieldset>
					<input type="hidden" name="module" value="project">
					<input type="hidden" name="action" value="add_comment">
					<input type="hidden" name="project_id" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['id'];?>
">
					<input type="hidden" name="parent_id" id="comment-parent-id" value="0">
					<input type="hidden" id="ownerUid" name="ownerUid" value="<?php echo $_smarty_tpl->tpl_vars['tmpStamp']->value;?>
">
					<input type="hidden" id="isTmpUid" name="isTmpUid" value="1">
					
					<div id="newTopicMsg">Uwaga! Dodajesz temat powiązany z projektem <strong><?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
</strong>. Jeżeli nie chcesz wiązać go z projektem, przejdź do konkretnej kategorii <a href="/forum/">forum</a> i tam dodaj nowy wpis.</div> 
					
					<div>
						<input type="text" name="subject" id="comment-subject" placeholder="wpisz tytuł*" value="">
					</div>
					
					<div>
						<textarea id="comment-txt" name="comment" cols="1" rows="1" placeholder="wpisz treść*"></textarea>
						
					</div>
					<div id="Content" style="position: relative;">
						<ul class="inputs-holder">
							<li class="validator-box short" id="comment-type-wrapper">
								<div class="select-wrapper">
								<label for="comment-type">Kategoria*</label>
									<div class="jui-select-box dark" id="type-box">
										<select name="comment_type" id="comment-type">
											<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_smarty_tpl->tpl_vars['_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['discuss_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_item']->iteration=0;
 $_smarty_tpl->tpl_vars['_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_key']->value = $_smarty_tpl->tpl_vars['_item']->key;
 $_smarty_tpl->tpl_vars['_item']->iteration++;
 $_smarty_tpl->tpl_vars['_item']->index++;
 $_smarty_tpl->tpl_vars['_item']->last = $_smarty_tpl->tpl_vars['_item']->iteration === $_smarty_tpl->tpl_vars['_item']->total;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['_key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['_key']->value==100){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
</option>
											<?php } ?>
										</select>
									</div>
								</div>
							</li>
							<li class="mystic"><label for="comment-age">Wiek</label><input type="text" name="age" id="comment-age" value=""></li>
							<?php if (!$_smarty_tpl->tpl_vars['user']->value){?><li class="middle"><span><a href="javascript:" class="login-trigger" id="post-login-trigger">Zaloguj się</a> lub wypełnij poniższe dane</span></li><?php }?>
							<li class="spaced short"><label for="comment-nick">Nazwa / Nick*</label><input type="text" name="nick" id="comment-nick" value="<?php if ($_smarty_tpl->tpl_vars['user']->value['nick']){?><?php echo $_smarty_tpl->tpl_vars['user']->value['nick'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
<?php }?>"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> readonly<?php }?>></li>
							<li class="rite noPadd short"><input type="checkbox" name="notify" id="notify"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> class="notShow"<?php }?>><label class="nocaps" for="notify">chcę otrzymywać powiadomienia o nowych wpisach</label></li>
							<li class="short" id="post-mail-box" style="display: none;"><label for="post-email">E-mail</label><input type="text" name="email" id="post-email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> readonly<?php }?>></li>
							<li class="middle">
								<p id="thumbnailHeader"<?php if (!$_smarty_tpl->tpl_vars['uploadedTmp']->value){?> style="display: none;"<?php }?>>wgrane grafiki:</p>
								<div id="thumbnailFile">
									<img src="/img/waiter-blue.gif" alt="" id="thumbnailFileProgress" style="display: none;">
									<?php if ($_smarty_tpl->tpl_vars['uploadedTmp']->value){?>
										<?php  $_smarty_tpl->tpl_vars['_file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['uploadedTmp']->value['DiscussImage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_file']->key => $_smarty_tpl->tpl_vars['_file']->value){
$_smarty_tpl->tpl_vars['_file']->_loop = true;
?>
											<a href="<?php echo $_smarty_tpl->tpl_vars['tmp_uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['filename'];?>
" target="_blank" class="fileThmb" data-fileid="<?php echo $_smarty_tpl->tpl_vars['_file']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['tmp_uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['childAttachments']['thumb'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_file']->value['childAttachments']['thumb'][0]['filename'];?>
"></a><a href="javascript:" data-fileid="<?php echo $_smarty_tpl->tpl_vars['_file']->value['id'];?>
" class="remove" onClick="Uploader.removeSingleFile(<?php echo $_smarty_tpl->tpl_vars['_file']->value['id'];?>
,1)"><img src="/img/x.png" class="remove"></a>
										<?php } ?>
									<?php }?>
								</div>
							</li>
							<li class="rite middle short"><input type="checkbox" name="regulations" id="regulations"><label class="nocaps" for="regulations">akceptuję </label><span class="ajax-info" data-url="/?module=ajax&action=get_comment_regulations">regulamin korzystania</span></li>
							<li class="submit"><button class="baton" id="comment-publish-trigger">publikuj</button> <span><img id="comment-waiter" style="display: none;" src="/img/waiter-blue.gif" alt=""></span></li>
						</ul>
					</div>
				</fieldset>
			</form>
		</div>
	
		<?php if ($_smarty_tpl->tpl_vars['commentList']->value){?>
		<ul id="comment-entries">
		<?php  $_smarty_tpl->tpl_vars['_comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commentList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_comment']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_comment']->key => $_smarty_tpl->tpl_vars['_comment']->value){
$_smarty_tpl->tpl_vars['_comment']->_loop = true;
 $_smarty_tpl->tpl_vars['_comment']->index++;
?>
			<?php if (!$_smarty_tpl->tpl_vars['_comment']->value['children']){?><?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable(" noChildren", null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('', null, 0);?><?php }?>
				<li<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_comment']->value['author_id'])){?> class="avatar"<?php }else{ ?><?php if (in_array($_smarty_tpl->tpl_vars['_comment']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?> class="sa"<?php }else{ ?> data-initial="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['_comment']->value['nick'],1,'');?>
" <?php }?><?php }?>>
				
				<div>
				<div class="author">
					<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_comment']->value['author_id'])){?><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_comment']->value['author_id']);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_comment']->value['nick'];?>
"><?php }?>
					<strong><?php echo $_smarty_tpl->tpl_vars['_comment']->value['nick'];?>
</strong>
					<?php if ($_smarty_tpl->tpl_vars['_comment']->value['author_id']){?>
						<?php if (!in_array($_smarty_tpl->tpl_vars['_comment']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?>
							<?php if ($_smarty_tpl->tpl_vars['commentAuthors']->value[$_smarty_tpl->tpl_vars['_comment']->value['author_id']]){?>
								<p>Posty: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['commentAuthors']->value[$_smarty_tpl->tpl_vars['_comment']->value['author_id']]['props']['forum']['count'])===null||$tmp==='' ? 0 : $tmp);?>
</p>
								<p>Pierwszy post: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['commentAuthors']->value[$_smarty_tpl->tpl_vars['_comment']->value['author_id']]['props']['forum']['date'])===null||$tmp==='' ? "-" : $tmp);?>
</p>
							<?php }else{ ?>
								<p>Konto usunięte</p>
							<?php }?>	
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['user']->value&&$_smarty_tpl->tpl_vars['user']->value['id']!=$_smarty_tpl->tpl_vars['_comment']->value['author_id']&&$_smarty_tpl->tpl_vars['commentAuthors']->value[$_smarty_tpl->tpl_vars['_comment']->value['author_id']]){?>
							<?php if (in_array($_smarty_tpl->tpl_vars['_comment']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?>
								<p class="padd"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message'),$_smarty_tpl);?>
"><span class="postme2">napisz wiadomość</span></a></p>
							<?php }else{ ?>
								<p class="padd"><span class="postme" data-aid="<?php echo $_smarty_tpl->tpl_vars['_comment']->value['author_id'];?>
">napisz wiadomość</span></p>
							<?php }?>	
						<?php }?>	
					<?php }else{ ?>
						<p>niezarejestrowany</p>
					<?php }?>
				</div>
				<div class="comment">
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['_comment']->value['id']),$_smarty_tpl);?>
" class="title"><?php echo $_smarty_tpl->tpl_vars['_comment']->value['topic'];?>
</a>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hideEmails'][0][0]->mHideEmails(nl2br(htmlspecialchars_decode($_smarty_tpl->tpl_vars['_comment']->value['content'], ENT_QUOTES)));?>

					<p class="date">utworzony: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_comment']->value['create_date'],"%d-%m-%Y (%H:%M:%S)");?>
 <span>w kategorii: <?php echo $_smarty_tpl->tpl_vars['discuss_categories']->value[$_smarty_tpl->tpl_vars['_comment']->value['cat_id']]['title'];?>
</span></p>
					<?php if ($_smarty_tpl->tpl_vars['_comment']->value['attachments']['DiscussImage']){?>
						<p class="attachments">
							<?php  $_smarty_tpl->tpl_vars['_attachment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_attachment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_comment']->value['attachments']['DiscussImage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_attachment']->key => $_smarty_tpl->tpl_vars['_attachment']->value){
$_smarty_tpl->tpl_vars['_attachment']->_loop = true;
?><a data-fancybox="forum_image" <?php if ($_smarty_tpl->tpl_vars['_attachment']->value['title']){?> data-fancybox-title="<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['title'];?>
"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['filename'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['filename'];?>
" alt="<?php if ($_smarty_tpl->tpl_vars['_attachment']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['_attachment']->value['title'];?>
<?php }else{ ?>Grafika do wpisu<?php }?>"></a><?php } ?>
						</p>
					<?php }?>
				</div>
				
				<div class="reply-box">
					<span class="framed reply-trigger" data-parent="<?php echo $_smarty_tpl->tpl_vars['_comment']->value['id'];?>
" data-parent-type="<?php echo $_smarty_tpl->tpl_vars['_comment']->value['cat_id'];?>
">Odpowiedz</span>
				</div>
				</div>
				<?php if ($_smarty_tpl->tpl_vars['_comment']->value['children']){?>
					<ul>
					<?php  $_smarty_tpl->tpl_vars['_sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_sub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_comment']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_sub']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_sub']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['_sub']->key => $_smarty_tpl->tpl_vars['_sub']->value){
$_smarty_tpl->tpl_vars['_sub']->_loop = true;
 $_smarty_tpl->tpl_vars['_sub']->iteration++;
?>
						<li<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_sub']->value['author_id'])){?> 
								class="avatar<?php if ($_smarty_tpl->tpl_vars['_sub']->iteration>3){?> covered<?php }?>"<?php if ($_smarty_tpl->tpl_vars['_comment']->index==0){?> style="display: inline-block;"<?php }?>
							<?php }else{ ?>
								<?php if (in_array($_smarty_tpl->tpl_vars['_sub']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?> 
									class="sa<?php if ($_smarty_tpl->tpl_vars['_sub']->iteration>3){?> covered<?php }?>"<?php if ($_smarty_tpl->tpl_vars['_comment']->index==0){?> style="display: inline-block;"<?php }?>
								<?php }else{ ?> 
									data-initial="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['_sub']->value['nick'],1,'');?>
"<?php if ($_smarty_tpl->tpl_vars['_sub']->iteration>3){?> class="covered"<?php }?><?php if ($_smarty_tpl->tpl_vars['_comment']->index==0){?> style="display: inline-block;"<?php }?>
								<?php }?>
							<?php }?>>
							<div class="author">
								<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_sub']->value['author_id'])){?><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_sub']->value['author_id']);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_sub']->value['nick'];?>
"><?php }?>
								<strong><?php echo $_smarty_tpl->tpl_vars['_sub']->value['nick'];?>
</strong>
								<?php if ($_smarty_tpl->tpl_vars['_sub']->value['author_id']){?>
									<?php if (!in_array($_smarty_tpl->tpl_vars['_sub']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?>
										<?php if ($_smarty_tpl->tpl_vars['commentAuthors']->value[$_smarty_tpl->tpl_vars['_sub']->value['author_id']]){?>
											<p>Posty: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['commentAuthors']->value[$_smarty_tpl->tpl_vars['_sub']->value['author_id']]['props']['forum']['count'])===null||$tmp==='' ? 0 : $tmp);?>
</p>
											<p>Pierwszy post: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['commentAuthors']->value[$_smarty_tpl->tpl_vars['_sub']->value['author_id']]['props']['forum']['date'])===null||$tmp==='' ? "-" : $tmp);?>
</p>
										<?php }else{ ?>
											<p>Konto usunięte</p>
										<?php }?>	
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['user']->value&&$_smarty_tpl->tpl_vars['user']->value['id']!=$_smarty_tpl->tpl_vars['_sub']->value['author_id']){?>
										<?php if (in_array($_smarty_tpl->tpl_vars['_sub']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?>
											<p class="padd"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message'),$_smarty_tpl);?>
"><span class="postme2">napisz wiadomość</span></a></p>
										<?php }else{ ?>
											<p class="padd"><span class="postme" data-aid="<?php echo $_smarty_tpl->tpl_vars['_sub']->value['author_id'];?>
">napisz wiadomość</span></p>
										<?php }?>	
									<?php }?>	
								<?php }else{ ?>
									<p>niezarejestrowany</p>
								<?php }?>
							</div>
							<div class="comment">
								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hideEmails'][0][0]->mHideEmails(nl2br(htmlspecialchars_decode($_smarty_tpl->tpl_vars['_sub']->value['content'], ENT_QUOTES)));?>

								<p class="date">utworzony: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_sub']->value['create_date'],"%d-%m-%Y (%H:%M:%S)");?>
</p>
								<?php if ($_smarty_tpl->tpl_vars['_sub']->value['attachments']['DiscussImage']){?>
									<p class="attachments">
										<?php  $_smarty_tpl->tpl_vars['_attachment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_attachment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_sub']->value['attachments']['DiscussImage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_attachment']->key => $_smarty_tpl->tpl_vars['_attachment']->value){
$_smarty_tpl->tpl_vars['_attachment']->_loop = true;
?><a data-fancybox="forum_image" <?php if ($_smarty_tpl->tpl_vars['_attachment']->value['title']){?> data-fancybox-title="<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['title'];?>
"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['filename'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['filename'];?>
" alt="<?php if ($_smarty_tpl->tpl_vars['_attachment']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['_attachment']->value['title'];?>
<?php }else{ ?>Grafika do wpisu<?php }?>"></a><?php } ?>
									</p>
								<?php }?>
							</div>
						</li>
					<?php } ?>
					</ul>
					<?php if ($_smarty_tpl->tpl_vars['_sub']->total>3){?>
						<?php if ($_smarty_tpl->tpl_vars['_comment']->index==0){?>
							<div class="more-box"><span class="show-more open">pokaż mniej odpowiedzi</span></div>
						<?php }else{ ?>
							<div class="more-box"><span class="show-more">pokaż więcej odpowiedzi</span></div>
						<?php }?>
					<?php }?>
				<?php }?>
			</li>
		<?php } ?>
		</ul>
		<?php }?>
		
		<div class="partners">
			<p>Współpracujemy</p>
	
			<div>
				<?php  $_smarty_tpl->tpl_vars['_partner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_partner']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['partners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_partner']->key => $_smarty_tpl->tpl_vars['_partner']->value){
$_smarty_tpl->tpl_vars['_partner']->_loop = true;
?>
					<a href="/dokumenty/Wspolpraca.html#par<?php echo $_smarty_tpl->tpl_vars['_partner']->value['id'];?>
"><img class="lazy-image" src="/img/xg.png" data-uri="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['articleImage'][0][0]->fArticleImage(array('document'=>$_smarty_tpl->tpl_vars['_partner']->value),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_partner']->value['title'];?>
" width="1" height="1"></a>
				<?php } ?>
			</div>
		</div>
	</div>
	
	<div class="box ajaxed" id="dload-list" style="display: none;">
	<?php if ($_smarty_tpl->tpl_vars['user']->value){?>
			<?php if ($_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectFile']){?>
				<?php $_smarty_tpl->tpl_vars['isSketch'] = new Smarty_variable(false, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['isMaterial'] = new Smarty_variable(false, null, 0);?>
				<ul>
				
					<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isAvailable'][0][0]->mIsAvailable($_smarty_tpl->tpl_vars['projectParams']->value)&&!$_smarty_tpl->tpl_vars['isSketch']->value){?>
						<li><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'get_request_form','type'=>'sketch','order'=>1),$_smarty_tpl);?>
" data-call="ProjectRequest.registerRequestForm">Zamów rysunki szczegółowe</span></li> 
					<?php }?>
					
					<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isAvailable'][0][0]->mIsAvailable($_smarty_tpl->tpl_vars['projectParams']->value)&&!$_smarty_tpl->tpl_vars['isMaterial']->value){?>
						<li><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'get_request_form','type'=>'materials','order'=>1),$_smarty_tpl);?>
" data-call="ProjectRequest.registerRequestForm">Zamów zestawienie materiałów</span></li> 
					<?php }?>
					
					<?php if ($_smarty_tpl->tpl_vars['project']->value['type']!='skeleton'&&$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isAvailable'][0][0]->mIsAvailable($_smarty_tpl->tpl_vars['projectParams']->value)&&!$_smarty_tpl->tpl_vars['isparcelDwg']->value){?>
						<li><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'get_request_form','type'=>'parcel_dwg','order'=>1),$_smarty_tpl);?>
" data-call="ProjectRequest.registerRequestForm">Zamów obrys dwg</span></li> 
					<?php }?>
					
					<?php if ($_smarty_tpl->tpl_vars['project']->value['type']!='skeleton'&&$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isAvailable'][0][0]->mIsAvailable($_smarty_tpl->tpl_vars['projectParams']->value)&&!$_smarty_tpl->tpl_vars['isparcelPdf']->value){?>
						<li><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'get_request_form','type'=>'parcel_pdf','order'=>1),$_smarty_tpl);?>
" data-call="ProjectRequest.registerRequestForm">Zamów obrys pdf</span></li> 
					<?php }?>
					
					<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isAvailable'][0][0]->mIsAvailable($_smarty_tpl->tpl_vars['projectParams']->value)&&!$_smarty_tpl->tpl_vars['isWoodwork']->value){?>
						<li><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'get_request_form','type'=>'woodwork','order'=>1),$_smarty_tpl);?>
" data-call="ProjectRequest.registerRequestForm">Zamów zestawienie stolarki</span></li> 
					<?php }?>
					
					<?php if (!$_smarty_tpl->tpl_vars['noestimate']->value&&$_smarty_tpl->tpl_vars['project']->value['type']!='skeleton'){?>
					<li><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'get_request_form','type'=>'estimate','order'=>2),$_smarty_tpl);?>
" data-call="ProjectRequest.registerGenRequestForm">Pobierz szacunkowy kosztorys</span></li>
					<?php }?>
				</ul>
			<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isAvailable'][0][0]->mIsAvailable($_smarty_tpl->tpl_vars['projectParams']->value)){?>
				<ul>
					<li><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'get_request_form','type'=>'sketch','order'=>1),$_smarty_tpl);?>
" data-call="ProjectRequest.registerRequestForm">Zamów rysunki szczegółowe</span></li> 
					<li><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'get_request_form','type'=>'materials','order'=>1),$_smarty_tpl);?>
" data-call="ProjectRequest.registerRequestForm">Zamów zestawienie materiałów</span></li>
					<?php if ($_smarty_tpl->tpl_vars['project']->value['type']!='skeleton'){?>
					<li><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'get_request_form','type'=>'parcel_dwg','order'=>1),$_smarty_tpl);?>
" data-call="ProjectRequest.registerRequestForm">Zamów obrys dwg</span></li> 
					<li><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'get_request_form','type'=>'parcel_pdf','order'=>1),$_smarty_tpl);?>
" data-call="ProjectRequest.registerRequestForm">Zamów obrys pdf</span></li> 
					<?php }?>
					<li><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'get_request_form','type'=>'woodwork','order'=>1),$_smarty_tpl);?>
" data-call="ProjectRequest.registerRequestForm">Zamów zestawienie stolarki</span></li>
					<?php if (!$_smarty_tpl->tpl_vars['noestimate']->value&&$_smarty_tpl->tpl_vars['project']->value['type']!='skeleton'){?>
					<li><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'get_request_form','type'=>'estimate','order'=>2),$_smarty_tpl);?>
" data-call="ProjectRequest.registerGenRequestForm">Pobierz szacunkowy kosztorys</span></li>
					<?php }?>
				</ul>
			<?php }else{ ?>
				<?php if (!$_smarty_tpl->tpl_vars['noestimate']->value&&$_smarty_tpl->tpl_vars['project']->value['type']!='skeleton'){?>
				<ul>
					<li><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'get_request_form','type'=>'estimate','order'=>2),$_smarty_tpl);?>
" data-call="ProjectRequest.registerGenRequestForm">Pobierz szacunkowy kosztorys</span></li>
				</ul>
				<?php }else{ ?>
					<p>Nie znaleziono plików do pobrania dla tego projektu.</p>
				<?php }?>
			<?php }?>
	<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isAvailable'][0][0]->mIsAvailable($_smarty_tpl->tpl_vars['projectParams']->value)){?>
		<p>Aby pobrać <strong>rysunki szczegółowe</strong><?php if ($_smarty_tpl->tpl_vars['project']->value['type']!='skeleton'&&$_smarty_tpl->tpl_vars['costs']->value['total']!=-1){?>, <strong>kosztorys szacunkowy</strong><?php }?>, <strong>obrysy domu</strong> lub <strong>zestawienie materiałów</strong> do tego projektu,<br><a href="javascript:" class="account login-trigger blue">zaloguj się do swojego konta</a> i przejdź ponownie do zakładki <strong>PLIKI</strong>.</p>	
	<?php }else{ ?>
		<?php if (!$_smarty_tpl->tpl_vars['noestimate']->value&&$_smarty_tpl->tpl_vars['project']->value['type']!='skeleton'){?>
			<p>Aby pobrać <strong>kosztorys szacunkowy</strong> do tego projektu,<br><a href="javascript:" class="account login-trigger blue">zaloguj się do swojego konta</a> i przejdź ponownie do zakładki <strong>PLIKI</strong>.</p>
		<?php }else{ ?>
			<p>Nie znaleziono plików do pobrania dla tego projektu.</p>
		<?php }?>
	<?php }?>	

	</div>
</div>

<div id="nav-bar">
	<ul style="display: none;">
		<li class="navi-render"><a href="javascript:" data-target="render-box">Wizualizacje</a></li>
		<?php if ($_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectInterior']){?>
		<li class="navi-interiors"><a href="javascript:" data-target="interiors">Wnętrza</a></li>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectElevation']){?>
			<li class="navi-elevations"><a href="javascript:" data-target="elevations">Elewacje</a></li>
		<?php }?>	
		<li class="navi-sketch"><a href="javascript:" data-target="sketch-box" class="sketch">Rzuty</a></li>
	</ul>
	
	<ul style="display: none;" class="opts">
		<li class="navi-comment"><a href="javascript:" data-target="option" class="comment" data-id="comment">Forum</a></li>
		<li class="navi-similar"><a href="javascript:" data-target="option" class="similar" data-id="similar">Projekty podobne</a></li>
		<li class="navi-addons"><a href="javascript:" class="ajax-info addons" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project_extend','action'=>'project_addons'),$_smarty_tpl);?>
&id=<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
" data-call="ProjectAddons.register" data-target="addons">Dodatki</a></li>
		<li class="navi-real"><a href="javascript:" data-target="option" class="real" data-id="real">Realizacje</a></li>
		<li class="navi-vendors"><a href="javascript:" data-target="option" class="vendors" data-id="vendors">Producenci</a></li>
		<li class="navi-dload"><a href="javascript:" data-target="option" class="dload" data-id="dload" id="dloadTrigger">Pliki</a></li>
		<li class="navi-faq" id="opts-faq"><a href="javascript:" data-target="option" class="faq" data-id="faq">FAQ</a></li>
		<li class="navi-sr" id="opts-sr" style="display: none;"><a href="javascript:" data-target="option" class="sr" data-id="sr">Wyposażenie</a></li>
	</ul>
</div>

<div class="blue-overlay" id="param-info-overlay">
	<div class="over-box" id="param-info-over-box"></div>
	<button type="button" id="param-info-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>

<?php if ($_smarty_tpl->tpl_vars['skeletonPrice']->value){?>
<div class="blue-overlay skeleton" id="skeleton-info-overlay">
	<div class="over-box" id="skeleton-info-over-box">
		<p class="nocaps">
		   Do tego projektu możemy wykonać wersję <?php if ($_smarty_tpl->tpl_vars['project']->value['type']=='house'){?>szkieletową<?php }elseif($_smarty_tpl->tpl_vars['project']->value['type']=='skeleton'){?>murowaną<?php }?>.
		   <br>Tylko teraz zrobimy to dla Ciebie w cenie <strong style="color: #000;"><?php echo $_smarty_tpl->tpl_vars['skeletonPrice']->value;?>
 zł!</strong><br><br>Wszelkie formalności i termin realizacji ustalony zostanie telefonicznie. Wypełnij poniższy formularz - skontaktujemy się najszybciej jak to możliwe.
			
		</p>
		<?php if ($_smarty_tpl->tpl_vars['project']->value['type']=='house'){?>
		<p class="nocaps">
			Informujemy, że ze względu na specyfikę technologii szkieletowej, architektura, konstrukcja i funkcja budynku może ulec niewielkim zmianom w stosunku do wersji murowanej.
		</p>
		<?php }?>
		<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'contact','action'=>'skeleton'),$_smarty_tpl);?>
" id="skeleton-form">
			<input type="hidden" id="skeleton-name" name="project_name" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
">
			<input type="hidden" name="project_type" value="<?php echo $_smarty_tpl->tpl_vars['project']->value['type'];?>
">
			<input name="module" type="hidden" value="contact">
			<input name="action" type="hidden" value="skeleton">

			<p>
				<label for="skel-client" class="black">Imię i nazwisko</label>
				<input type="text" name="client" id="skel-client" class="long">
			</p>

			<p>
				<label for="skel-email" class="black">Twój adres e-mail</label>
				<input type="text" name="email" id="skel-email" class="long">
			</p>
			
			<p>
				<label for="skel-phone" class="black">Twój telefon</label>
				<input type="text" name="phone" id="skel-phone" class="long">
			</p>
			
			<p class="mystic">
				<label for="skel-age" class="black">Wiek</label>
				<input type="text" name="age" id="skel-age" class="long">
			</p>
			
			<p class="last"><input id="skeleton-button" type="submit" value="wyślij" class="baton"></p>
			<p class="nocaps" id="skeleton-fail-box" style="display: none;">Wypełnij poprawnie formularz</p>
		</form>
	</div>
	<button type="button" id="skeleton-info-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['user']->value){?>
<div class="blue-overlay message" id="message-overlay">
	<div class="over-box">
		<div>
			<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'send_message'),$_smarty_tpl);?>
" id="message-form">
				<input name="module" type="hidden" value="discuss">
				<input name="action" type="hidden" value="send_message">
				<input name="senderId" id="message-sender" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
				<input name="receiverId" id="message-receiver" type="hidden" value="">

				<p>
					<label for="message-title" class="black">Temat</label>
					<input type="text" name="title" id="message-title" class="long">
				</p>
				<p>
					<label for="message-content" class="black">Treść wiadomości</label>
					<textarea id="message-content" name="content" cols="1" rows="1"></textarea>
				</p>
				
				<p class="send-box"><input id="message-trigger" type="submit" value="wyślij" class="baton"></p>
				<p class="nocaps info-box" id="message-res-box" style="display: none;">Wypełnij poprawnie formularz</p>
			</form>
		</div>
	</div>
	<button type="button" id="message-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>
<?php }?>

<div class="blue-overlay share" id="social-overlay">
	<div class="over-box" id="social-over-box">
	
		<p class="share">Udostępnij</p>
	
		<ul id="share-project" class="house" data-url="<?php echo $_smarty_tpl->tpl_vars['projectUrl']->value;?>
" data-media="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value),$_smarty_tpl);?>
" data-description="<?php echo $_smarty_tpl->tpl_vars['project']->value['short_description'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
">
			<li><span class="face">facebook</span></li>
			<li><span class="pin">pinterest</span></li>
			<li><span class="url">url</span></li>
			<li><span class="mail">mail</span></li>
			<li>
				<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'pdf','action'=>'project','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'version'=>'lustro'),$_smarty_tpl);?>
"><span class="print">print</span></a>
				<?php }else{ ?>
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'pdf','action'=>'project','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name']),$_smarty_tpl);?>
"><span class="print">print</span></a>
				<?php }?>
			</li>
		</ul>
		
		<div class="link-box" id="link-box" style="display: none;">
			<p>skopiuj adres</p>
			<p><?php echo $_smarty_tpl->tpl_vars['projectUrl']->value;?>
</p>
		</div>
		
		<div id="links-wrapper" style="display: none;">
			<p class="nocaps">Wypełnij poniższy formularz i prześlij informacje o projekcie znajomemu.</p>
			
			<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'send'),$_smarty_tpl);?>
" id="share-form" data-pid="<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
">
				<input name="module" type="hidden" value="project">
				<input name="action" type="hidden" value="send">

				<p>
					<label for="receiver-email" class="black">E-mail odbiorcy</label>
					<input type="text" name="receiver_email" id="receiver-email" class="long">
				</p>
				<p>
					<label for="sender-email" class="black">Twój e-mail</label>
					<input type="text" name="sender_email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
" id="sender-email" class="long">
				</p>
				
				<p>
					<label for="sender-sign" class="black">Twój podpis</label>
					<input type="text" name="signature" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['surname'];?>
" id="sender-sign" class="long">
				</p>
				
				<p class="last"><input id="share_button" type="submit" value="wyślij" class="baton"></p>
				<p class="nocaps" id="share-fail-box" style="display: none;">Wypełnij poprawnie formularz</p>
			</form>
		</div>
	</div>
	<button type="button" id="social-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>
<div id="backToTopOnHouse"></div>	
<div id="loader-box">
	<div class="uil-ripple-css" style='transform:scale(0.45);'><div></div><div></div></div>
</div>
<?php if ($_smarty_tpl->tpl_vars['sketchAuthorize']->value){?>
<div id="sketchToolTip" style="display: none;"></div>
<?php }?><?php }} ?>