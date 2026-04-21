<?php /* Smarty version Smarty-3.1.11, created on 2026-02-19 11:18:39
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Garage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165767658562b033c264a1c1-54045069%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94d3d4984b1845bdb1fe163fe4ad9c921cd27145' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Garage.tpl',
      1 => 1771499915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165767658562b033c264a1c1-54045069',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b033c26fba44_38336453',
  'variables' => 
  array (
    'project' => 0,
    'request' => 0,
    '_render' => 0,
    'name' => 0,
    'token' => 0,
    'categoryLink' => 0,
    'category' => 0,
    'projectParams' => 0,
    'promoEnd' => 0,
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
<?php if ($_valid && !is_callable('content_62b033c26fba44_38336453')) {function content_62b033c26fba44_38336453($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.date_format.php';
?><div class="project-box">
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
				<?php if ($_smarty_tpl->tpl_vars['project']->value['discount']){?>
					<span class="discount<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNew'][0][0]->mIsNew($_smarty_tpl->tpl_vars['project']->value)){?> second<?php }?>">Rabat <?php echo $_smarty_tpl->tpl_vars['project']->value['discount'];?>
</span>
				<?php }?>
				
				<img class="finger" id="finger" src="/img/finger.png" alt="Galeria">
				
				<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
					<a class="gallery" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['_render']->value['title'];?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'no'=>$_smarty_tpl->tpl_vars['_render']->index,'mirror'=>1),$_smarty_tpl);?>
">
						<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'size'=>'presentation','no'=>$_smarty_tpl->tpl_vars['_render']->index,'mirror'=>1),$_smarty_tpl);?>
" width="1350" height="900" alt="Garaż <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
 - wizualizacja <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
">
					</a>
				<?php }else{ ?>
					<a class="gallery" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['_render']->value['title'];?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'no'=>$_smarty_tpl->tpl_vars['_render']->index),$_smarty_tpl);?>
">
						<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'size'=>'presentation','no'=>$_smarty_tpl->tpl_vars['_render']->index),$_smarty_tpl);?>
" width="1350" height="900" alt="Garaż <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
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
" src="img/xg.png" width="1350" height="900" alt="Garaż <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
 - wizualizacja <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
">
					</a>
				<?php }else{ ?>
					<a class="gallery" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['_render']->value['title'];?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'no'=>$_smarty_tpl->tpl_vars['_render']->index),$_smarty_tpl);?>
">
						<img class="lazy-image" data-uri="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'size'=>'presentation','no'=>$_smarty_tpl->tpl_vars['_render']->index),$_smarty_tpl);?>
" src="img/xg.png" width="1350" height="900" alt="Garaż <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
 - wizualizacja <?php echo $_smarty_tpl->tpl_vars['_render']->iteration;?>
">
					</a>
				<?php }?>

			<?php }?>
		</div>
		<?php } ?>
	</div>
	</div>
	
	<div class="data-box">
		<div class="icons fav-wrapper">
			<div>
				<a href="//pl.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-color="white"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_white_20.png" alt="Studio Atrium Pin"></a>
				<iframe src="https://www.facebook.com/plugins/like.php?locale=pl_PL&amp;href=https://www.studioatrium.pl<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>"project",'action'=>"item",'id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['project']->value['symbol_num']),'catalog'=>"projekty-garazy"),$_smarty_tpl);?>
&amp;send=false&amp;layout=button_count&amp;width=110&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=tahoma&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:110px; height:21px;" allowTransparency="true"></iframe>
			</div>
		
			<span class="bg net" id="social-trigger"></span>
			
			<?php $_smarty_tpl->tpl_vars['token'] = new Smarty_variable(smarty_modifier_date_format(time(),"%H%M%S"), null, 0);?>
			<?php $_smarty_tpl->tpl_vars['name'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['project']->value['symbol_alpha']).((string)$_smarty_tpl->tpl_vars['project']->value['symbol_num']), null, 0);?>

			<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
				<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'pdf','action'=>'project','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['name']->value,'version'=>'lustro'),$_smarty_tpl);?>
?token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" id="print-ico" class="bg print" data-token="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
"></a>
			<?php }else{ ?>
				<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'pdf','action'=>'project','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['name']->value),$_smarty_tpl);?>
?token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" id="print-ico" class="bg print" data-token="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
"></a>
			<?php }?>
		</div>
		
		<div class="breadcrumbs"><a href="/">Studio Atrium</a> &raquo; <a href="/projekty-garazy/">projekty garaży</a> &raquo; <a href="<?php echo $_smarty_tpl->tpl_vars['categoryLink']->value;?>
" class="on"><?php echo $_smarty_tpl->tpl_vars['category']->value;?>
</a></div>
	
		<div class="head-box">
			<h1 id="title" data-id="<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
">Garaż <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?><small>odbicie lustrzane</small><?php }?></h1>
			<p class="area">Powierzchnia użytkowa: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['project']->value['params_general']);?>
</span> m<sup>2</sup></p>
			<h2><?php echo $_smarty_tpl->tpl_vars['project']->value['short_description'];?>
</h2>
		</div>

		<div class="inner-box">
			<ul class="link-box one">
			<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasMirror'][0][0]->mHasMirror($_smarty_tpl->tpl_vars['projectParams']->value)){?>
				<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
					<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['project']->value['symbol_num']),'catalog'=>'projekty-garazy'),$_smarty_tpl);?>
" class="mirror">Zobacz wersję podstawową</a></li>
				<?php }else{ ?>
					<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['project']->value['symbol_num']),'version'=>'lustro','catalog'=>'projekty-garazy'),$_smarty_tpl);?>
" class="mirror on">Zobacz odbicie lustrzane</a></li>
				<?php }?>
			<?php }?>
			</ul>
		</div>
		
		<div id="order-box" class="inner-box order-box">
			<div>
				<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isWithdrawn'][0][0]->mIsWithdrawn($_smarty_tpl->tpl_vars['projectParams']->value)){?>
				<p class="price">wycofany z oferty</p>
				<?php }else{ ?>
				<p class="version">Wersja murowana - <?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isAvailable'][0][0]->mIsAvailable($_smarty_tpl->tpl_vars['projectParams']->value)){?>dostępność 7-14 dni<?php }else{ ?>termin do uzgodnienia<?php }?></p>
				<p class="price"><?php if ($_smarty_tpl->tpl_vars['project']->value['discount']){?><span class="discount"><?php echo $_smarty_tpl->tpl_vars['project']->value['price'];?>
</span><?php echo $_smarty_tpl->tpl_vars['project']->value['price']-$_smarty_tpl->tpl_vars['project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['project']->value['price'];?>
<?php }?> <span>zł</span></p>
				<?php if ($_smarty_tpl->tpl_vars['promoEnd']->value){?><p class="promoInfo"><?php echo $_smarty_tpl->tpl_vars['promoEnd']->value;?>
</p><?php }?>
				<p class="vatInfo">(w tym 23% VAT)</p>
				<span class="basket<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['inBasket'][0][0]->mInBasket($_smarty_tpl->tpl_vars['project']->value,$_smarty_tpl->tpl_vars['request']->value['version'])){?> disabled<?php }?>"<?php if (!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['inBasket'][0][0]->mInBasket($_smarty_tpl->tpl_vars['project']->value,$_smarty_tpl->tpl_vars['request']->value['version'])){?> id="addToBasket" data-version="<?php echo $_smarty_tpl->tpl_vars['request']->value['version'];?>
" data-project="<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['project']->value['discount']){?><?php echo $_smarty_tpl->tpl_vars['project']->value['price']-$_smarty_tpl->tpl_vars['project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['project']->value['price'];?>
<?php }?>" data-link="<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['project']->value['symbol_num']),'catalog'=>'projekty-garazy','version'=>'lustro'),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['project']->value['symbol_num']),'catalog'=>'projekty-garazy'),$_smarty_tpl);?>
<?php }?>" data-name="Garaż <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
" data-thumb="<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'mirror'=>1),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['project']->value,'size'=>'thumb'),$_smarty_tpl);?>
<?php }?>"<?php }?>><?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['inBasket'][0][0]->mInBasket($_smarty_tpl->tpl_vars['project']->value,$_smarty_tpl->tpl_vars['request']->value['version'])){?>W koszyku<?php }else{ ?>Do koszyka<?php }?></span>
				<?php }?>
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
<?php if ($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['description']){?><span class="param-info" data-id="<?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['id'];?>
"></span><?php }?></td>
					<td><?php echo $_smarty_tpl->tpl_vars['paramValue']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_item']->value]['unit'];?>
</td>
				</tr>
				<?php }?>
			<?php } ?>
				<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelWidth'][0][0]->mParcelWidth($_smarty_tpl->tpl_vars['projectParams']->value)&&$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelHeight'][0][0]->mParcelHeight($_smarty_tpl->tpl_vars['projectParams']->value)){?>
					<tr>
						<td>min. wymiary działki<span class="param-info" data-id="75"></span></td>
						<td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelWidth'][0][0]->mParcelWidth($_smarty_tpl->tpl_vars['projectParams']->value);?>
 x <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelHeight'][0][0]->mParcelHeight($_smarty_tpl->tpl_vars['projectParams']->value);?>
 m</td>
					</tr>
				<?php }?>	
			</table>
		</div>
		
		<div id="info-box" class="info-box">
			<p class="header">Technologia</p>
			
			<p>
				<?php if ($_smarty_tpl->tpl_vars['project']->value['technology']){?>
					<?php echo $_smarty_tpl->tpl_vars['project']->value['technology'];?>

				<?php }else{ ?>
					Technologia murowana: Pustak ceramiczny gr. 30 cm + ocieplenie w systemie Termo Organika. Pokrycie dachu dachówką cementową Braas.
				<?php }?>
			</p>
		</div>
		
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
		
		<?php if ($_smarty_tpl->tpl_vars['project']->value['description']){?>
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
			<?php if ($_smarty_tpl->tpl_vars['request']->value['version']=='mirror'){?>
				<img class="lazy-image" data-uri="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value,'storey'=>$_smarty_tpl->tpl_vars['sketch']->value['props']['storey'],'mirror'=>1),$_smarty_tpl);?>
" src="img/xg.png" width="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['props']['image_size']['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['props']['image_size']['height'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['title'];?>
 - Garaż <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
">
			<?php }else{ ?>
				<img class="lazy-image" data-uri="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['project']->value,'storey'=>$_smarty_tpl->tpl_vars['sketch']->value['props']['storey']),$_smarty_tpl);?>
" src="img/xg.png" width="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['props']['image_size']['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['props']['image_size']['height'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['sketch']->value['title'];?>
 - Garaż <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['project']->value['symbol_num'];?>
">
			<?php }?>
		</div>
	</div>
	
	<div class="data-box">
	
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