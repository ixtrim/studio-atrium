<?php /* Smarty version Smarty-3.1.11, created on 2026-02-19 11:19:12
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Other.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212449707962b037394f6200-99735788%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70672553395285305fd7ecf840af0c2798a6c8fd' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Other.tpl',
      1 => 1771499947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212449707962b037394f6200-99735788',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b03739578e15_73464384',
  'variables' => 
  array (
    'type' => 0,
    'project' => 0,
    'request' => 0,
    '_render' => 0,
    'categoryLink' => 0,
    'category' => 0,
    'projectParams' => 0,
    'catalog' => 0,
    'user' => 0,
    'technicalList' => 0,
    '_item' => 0,
    'params' => 0,
    'paramValue' => 0,
    'features' => 0,
    'sketch' => 0,
    'projectSketchParams' => 0,
    '_param' => 0,
    'sketchParams' => 0,
    'total' => 0,
    'projectUrl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b03739578e15_73464384')) {function content_62b03739578e15_73464384($_smarty_tpl) {?><?php ob_start();?><?php echo strtolower($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,true,true));?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['catalog'] = new Smarty_variable(('projekty/').($_tmp1), null, 0);?>
<div class="project-box">
	<div id="render-box" class="render-box">
	<div class="inline-wrapper">
		<?php  $_smarty_tpl->tpl_vars['_render'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_render']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectRender']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
				<img class="finger" id="finger" src="/img/finger.png" alt="Galeria">
				
				<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
					<a class="gallery" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['_render']->value['title'];?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'no'=>$_smarty_tpl->tpl_vars['_render']->index,'mirror'=>1),$_smarty_tpl);?>
">
						<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'size'=>'presentation','no'=>$_smarty_tpl->tpl_vars['_render']->index,'mirror'=>1),$_smarty_tpl);?>
" width="1350" height="900" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
 - wizualizacja <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
">
					</a>
				<?php }else{ ?>
					<a class="gallery" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['_render']->value['title'];?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'no'=>$_smarty_tpl->tpl_vars['_render']->index),$_smarty_tpl);?>
">
						<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'size'=>'presentation','no'=>$_smarty_tpl->tpl_vars['_render']->index),$_smarty_tpl);?>
" width="1350" height="900" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
 - wizualizacja <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
">
					</a>
				<?php }?>
			<?php }else{ ?>
			
				<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
					<a class="gallery" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['_render']->value['title'];?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'no'=>$_smarty_tpl->tpl_vars['_render']->index,'mirror'=>1),$_smarty_tpl);?>
">
						<img class="lazy-image" data-uri="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'size'=>'presentation','no'=>$_smarty_tpl->tpl_vars['_render']->index,'mirror'=>1),$_smarty_tpl);?>
" src="img/xg.png" width="1350" height="900" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
 - wizualizacja <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
">
					</a>
				<?php }else{ ?>
					<a class="gallery" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['_render']->value['title'];?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'no'=>$_smarty_tpl->tpl_vars['_render']->index),$_smarty_tpl);?>
">
						<img class="lazy-image" data-uri="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'size'=>'presentation','no'=>$_smarty_tpl->tpl_vars['_render']->index),$_smarty_tpl);?>
" src="img/xg.png" width="1350" height="900" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
 - wizualizacja <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
">
					</a>
				<?php }?>
			<?php }?>
		</div>
		<?php } ?>
		
		<?php if ($_smarty_tpl->tpl_vars['project']->value['description']&&$_smarty_tpl->tpl_vars['type']->value=='tank'){?>
		<div class="info-box">
			<p class="header">Opis</p>
			<p class="desc"><?php echo $_smarty_tpl->tpl_vars['project']->value['description'];?>
</p>
		</div>
		<?php }?>
	</div>
	</div>
	
	<div class="data-box">
		<div class="icons fav-wrapper">
			<div>
				<a href="//pl.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-color="white"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_white_20.png" alt="Studio Atrium Pin"></a>
				<iframe src="https://www.facebook.com/plugins/like.php?locale=pl_PL&amp;href=https://www.studioatrium.pl<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>"project",'action'=>"item",'id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['project']->value['symbol_num']),'catalog'=>'catalog'),$_smarty_tpl);?>
&amp;send=false&amp;layout=button_count&amp;width=110&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=tahoma&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:110px; height:21px;" allowTransparency="true"></iframe>
			</div>
		
			<span class="bg net" id="social-trigger"></span>
		</div>
		
		<div class="breadcrumbs"><a href="/">Studio Atrium</a> &raquo; <a href="<?php echo $_smarty_tpl->tpl_vars['categoryLink']->value;?>
" class="on"><?php echo $_smarty_tpl->tpl_vars['category']->value;?>
</a></div>
	
		<div class="head-box">
			<h1 id="title" data-id="<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?><small>odbicie lustrzane</small><?php }?></h1>
			<?php if ($_smarty_tpl->tpl_vars['type']->value=='tank'){?>
			<p class="area">Kubatura brutto: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['cubature'][0][0]->mCubature($_smarty_tpl->tpl_vars['project']->value['params_general']);?>
</span> m<sup>3</sup></p>
			<?php }elseif($_smarty_tpl->tpl_vars['type']->value=='fence'){?>
			<p class="area noContent">&nbsp;</p>
			<?php }else{ ?>
			<p class="area">Powierzchnia użytkowa: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['project']->value['params_general']);?>
</span> m<sup>2</sup></p>
			<?php }?>
			<h2><?php echo $_smarty_tpl->tpl_vars['project']->value['short_description'];?>
</h2>
		</div>

		<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasMirror'][0][0]->mHasMirror($_smarty_tpl->tpl_vars['projectParams']->value)){?>
		<div class="inner-box">
			<ul class="link-box one">
				<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
					<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['project']->value['symbol_num']),'catalog'=>$_smarty_tpl->tpl_vars['catalog']->value),$_smarty_tpl);?>
" class="mirror">Zobacz wersję podstawową</a></li>
				<?php }else{ ?>
					<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['project']->value['symbol_num']),'version'=>'lustro','catalog'=>$_smarty_tpl->tpl_vars['catalog']->value),$_smarty_tpl);?>
" class="mirror on">Zobacz odbicie lustrzane</a></li>
				<?php }?>
			</ul>
		</div>
		<?php }?>
		
		<div id="order-box" class="inner-box order-box">
			<div>
				<p class="version"><?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isAvailable'][0][0]->mIsAvailable($_smarty_tpl->tpl_vars['projectParams']->value)){?>dostępność 3-5 dni<?php }else{ ?><span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'ajax','action'=>'get_realisation_info'),$_smarty_tpl);?>
">termin do uzgodnienia</span><?php }?></p>
				<p class="price"><?php if ($_smarty_tpl->tpl_vars['project']->value['discount']){?><span class="discount"><?php echo $_smarty_tpl->tpl_vars['project']->value['price'];?>
</span><?php echo $_smarty_tpl->tpl_vars['project']->value['price']-$_smarty_tpl->tpl_vars['project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['project']->value['price'];?>
<?php }?> <span>zł</span></p>
				<p class="vatInfo">(w tym 23% VAT)</p>
				<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'order','action'=>'cart'),$_smarty_tpl);?>
" class="simple" rel="nofollow"><span class="basket<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['inBasket'][0][0]->mInBasket($_smarty_tpl->tpl_vars['project']->value,$_smarty_tpl->tpl_vars['request']->value['version'])){?> disabled<?php }?>"<?php if (!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['inBasket'][0][0]->mInBasket($_smarty_tpl->tpl_vars['project']->value,$_smarty_tpl->tpl_vars['request']->value['version'])){?> id="addToBasket" data-version="<?php echo $_smarty_tpl->tpl_vars['request']->value['version'];?>
" data-project="<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['project']->value['discount']){?><?php echo $_smarty_tpl->tpl_vars['project']->value['price']-$_smarty_tpl->tpl_vars['project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['project']->value['price'];?>
<?php }?>" data-link="<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['project']->value['symbol_num']),'catalog'=>$_smarty_tpl->tpl_vars['catalog']->value,'version'=>'lustro'),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['project']->value['symbol_num']),'catalog'=>$_smarty_tpl->tpl_vars['catalog']->value),$_smarty_tpl);?>
<?php }?>" data-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
" data-thumb="<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'mirror'=>1),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'size'=>'thumb'),$_smarty_tpl);?>
<?php }?>"<?php }?>><?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['inBasket'][0][0]->mInBasket($_smarty_tpl->tpl_vars['project']->value,$_smarty_tpl->tpl_vars['request']->value['version'])){?>W koszyku<?php }else{ ?>Do koszyka<?php }?></span></a>
			</div>
		</div>
		
		<div class="inner-box">
			<ul class="contact-box">
				<li><a href="<?php if ($_smarty_tpl->tpl_vars['user']->value){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message','project_id'=>$_smarty_tpl->tpl_vars['project']->value['id']),$_smarty_tpl);?>
<?php }else{ ?>javascript:<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['user']->value){?> class="consultant"<?php }?>>Zapytaj o projekt</a></li>
				<li id="phone-box"><a href="tel:338229496" class="phone" rel="nofollow">33 822 94 96</a></li>
			</ul>
		</div>
		
		<div id="technical-data-box" class="technical-data">
			<p class="header">Dane techniczne</p>
			
			<table class="tech">
			<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['technicalList']->value['params']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
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
					<td><?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['name'];?>
<?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['description']&&$_smarty_tpl->tpl_vars['type']->value!='tank'&&$_smarty_tpl->tpl_vars['type']->value!='fence'){?><span class="param-info" data-id="<?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['id'];?>
"></span><?php }?></td>
					<td><?php echo $_smarty_tpl->tpl_vars['paramValue']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['unit'];?>
</td>
				</tr>
				<?php }?>
			<?php } ?>
			</table>
		</div>
		
		<?php if ($_smarty_tpl->tpl_vars['project']->value['technology']){?>
		<div id="info-box" class="info-box">
			<p class="header">Technologia</p>
			<p><?php echo $_smarty_tpl->tpl_vars['project']->value['technology'];?>
</p>
		</div>
		<?php }?>
		
		<?php if ($_smarty_tpl->tpl_vars['features']->value){?>
		<div class="info-box">
			<p class="header">Informacje</p>
			<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
?>
			<p><?php echo $_smarty_tpl->tpl_vars['_item']->value['description'];?>
</p>
			<?php } ?>
		</div>
		<?php }?>
		
		<?php if ($_smarty_tpl->tpl_vars['project']->value['description']&&$_smarty_tpl->tpl_vars['type']->value!='tank'){?>
			<div id="descript-box" class="info-box">
				<p class="header">Opis</p>
				<p class="desc"><?php echo $_smarty_tpl->tpl_vars['project']->value['description'];?>
</p>
			</div>
		<?php }?>
	</div>
</div>


<?php  $_smarty_tpl->tpl_vars['sketch'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sketch']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectSketch']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['sketch']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['sketch']->key => $_smarty_tpl->tpl_vars['sketch']->value){
$_smarty_tpl->tpl_vars['sketch']->_loop = true;
 $_smarty_tpl->tpl_vars['sketch']->index++;
 $_smarty_tpl->tpl_vars['sketch']->first = $_smarty_tpl->tpl_vars['sketch']->index === 0;
?>
<div class="project-box"<?php if ($_smarty_tpl->tpl_vars['sketch']->first){?> id="sketch-box"<?php }?>>
	<div class="render-box sketch-box">
		<div>
			<img class="lazy-image" data-uri="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value,'storey'=>$_smarty_tpl->tpl_vars['sketch']->value['props']['storey']),$_smarty_tpl);?>
" src="img/xg.png" width="1" height="1" alt="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['title'];?>
 - Projekt <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
">
		</div>
	</div>
	
	<div class="data-box">
	<?php if ('projectSketchParams'){?>
		<?php $_smarty_tpl->_capture_stack[0][] = array("chambers", null, null); ob_start(); ?>
		<?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable(0, null, 0);?>
		<table class="tech">
			<?php  $_smarty_tpl->tpl_vars['_param'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_param']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projectSketchParams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_param']->key => $_smarty_tpl->tpl_vars['_param']->value){
$_smarty_tpl->tpl_vars['_param']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['_param']->value['sketch_id']==$_smarty_tpl->tpl_vars['sketch']->value['id']){?>
				<tr>
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
						<td>razem:</td>
						<td><strong><?php echo number_format($_smarty_tpl->tpl_vars['total']->value,2,',',' ');?>
</strong></td>
					<?php }elseif($_smarty_tpl->tpl_vars['sketchParams']->value[$_smarty_tpl->tpl_vars['_param']->value['sketch_param_id']]['type']=='info'){?>
						<td><?php echo $_smarty_tpl->tpl_vars['sketchParams']->value[$_smarty_tpl->tpl_vars['_param']->value['sketch_param_id']]['name'];?>
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
		<h3><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['mapStorey'][0][0]->mMapStorey($_smarty_tpl->tpl_vars['sketch']->value['props']['storey']);?>
<?php if ($_smarty_tpl->tpl_vars['total']->value>0){?><span><?php echo number_format($_smarty_tpl->tpl_vars['total']->value,2,',',' ');?>
 m<sup>2</sup></span><?php }?></h3>
		<?php echo Smarty::$_smarty_vars['capture']['chambers'];?>

	<?php }else{ ?>
		<h3>Rzut</h3>
	<?php }?>	
	</div>
</div>
<?php } ?>

<div class="blue-overlay" id="param-info-overlay">
	<div class="over-box" id="param-info-over-box"></div>
	<button type="button" id="param-info-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>

<div class="blue-overlay share" id="social-overlay">
	<div class="over-box" id="social-over-box">
	
		<p class="share">Udostępnij</p>
	
		<ul id="share-project" data-url="<?php echo $_smarty_tpl->tpl_vars['projectUrl']->value;?>
" data-media="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value),$_smarty_tpl);?>
" data-description="<?php echo $_smarty_tpl->tpl_vars['project']->value['short_description'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
">
			<li><span class="face">facebook</span></li>
			<li><span class="pin">pinterest</span></li>
			<li><span class="url">url</span></li>
			<li><span class="mail">mail</span></li>
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
</div><?php }} ?>