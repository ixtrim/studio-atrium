<?php /* Smarty version Smarty-3.1.11, created on 2023-05-24 09:52:25
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/garageDisplayBox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:161951577362b0462ab76b29-05764807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7a7fd446a368ed30be6585ad4b85ca142ec7fa0' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/garageDisplayBox.tpl',
      1 => 1684921931,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161951577362b0462ab76b29-05764807',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0462ab8e120_86456931',
  'variables' => 
  array (
    'list' => 0,
    '_project' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0462ab8e120_86456931')) {function content_62b0462ab8e120_86456931($_smarty_tpl) {?><div class="container" id="project-list">
	<section>
		<div class="list-grid" id="overlay-group">
		<?php  $_smarty_tpl->tpl_vars['_project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_project']->iteration=0;
 $_smarty_tpl->tpl_vars['_project']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_project']->key => $_smarty_tpl->tpl_vars['_project']->value){
$_smarty_tpl->tpl_vars['_project']->_loop = true;
 $_smarty_tpl->tpl_vars['_project']->iteration++;
 $_smarty_tpl->tpl_vars['_project']->index++;
?>
			<div>
				<figure>
					<?php if ($_smarty_tpl->tpl_vars['_project']->iteration<7){?>
						<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'box'),$_smarty_tpl);?>
" alt="Projekt garażu <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
" width="640" height="427">
					<?php }else{ ?>
						<img class="dummy" src="/img/dummy_list.png" data-uri="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'box'),$_smarty_tpl);?>
" alt="Projekt garażu <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
" width="640" height="427">
					<?php }?>
					<figcaption>
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>'projekty-garazy'),$_smarty_tpl);?>
">
							<span>Projekt garażu</span>
							<strong><?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
 <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
 m<sup>2</sup></span></strong>
						</a>
					</figcaption>
				</figure>
				<?php if ($_smarty_tpl->tpl_vars['_project']->value['alternate_name']!='wycofany'){?>
				<span class="overview only" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" data-idx="<?php echo $_smarty_tpl->tpl_vars['_project']->index;?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'presentation'),$_smarty_tpl);?>
" data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>'projekty-garazy'),$_smarty_tpl);?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
" data-name="Garaż <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
" data-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-total-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['totalArea'][0][0]->mTotalArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-height="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['garageHeight'][0][0]->mGarageHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-angle="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roofAngle'][0][0]->mRoofAngle($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
"></span>
				
				<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><div><span class="discount">rabat <?php echo $_smarty_tpl->tpl_vars['_project']->value['discount'];?>
</span></div><?php }?>
				<?php }else{ ?>
				<div>
					<span style="background-color: #000; width: 180px; font-weight: bold;">WYCOFANY Z OFERTY!</span>
				</div> 	
				<?php }?>	
			</div>
		<?php } ?>
		</div>

</div>

<div class="overlay">
	<div class="overlay-project-box" id="over-pop">
		<div id="over-img-box">
			<ul id="over-pics">
				<li><span id="over-render" class="selected">Wizualizacja</span></li>
			</ul>
			<a href="">
				<img class="preload" id="over-img" src="/img/dummy.png" width="1350" height="900" alt="Render">
			</a>
		</div>
		
		<ul id="over-params">
			<li><h6 id="over-name"></h6></li>
			<li class="small"><span id="over-txt"></span></li>
			<li><p>powierzchnia użytkowa: <span id="over-area"></span> m<sup>2</sup></p></li>
			<li><p>powierzchnia całkowita: <span id="over-total-area"></span> m</p></li>
			<li><p>wysokość garażu: <span id="over-height"></span> m</p></li>
			<li><p>kąt nachylenia dachu: <span id="over-angle"></span></p></li>
			<li><p>cena projektu: <span id="over-price"></span> zł</p></li>
			<li><a href="" class="more">Zobacz szczegóły</a></li>
		</ul>
		
		<button type="button" class="overlay-change prev" id="prev-overlay">poprzedni</button>
		<button type="button" class="overlay-change next" id="next-overlay">następny</button>
	</div>
	
	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div><?php }} ?>