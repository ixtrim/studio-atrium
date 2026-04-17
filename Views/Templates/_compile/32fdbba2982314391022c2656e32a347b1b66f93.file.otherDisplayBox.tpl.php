<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 09:00:32
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/otherDisplayBox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131961756762b037302394d2-41858956%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32fdbba2982314391022c2656e32a347b1b66f93' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/otherDisplayBox.tpl',
      1 => 1621940953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131961756762b037302394d2-41858956',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'list' => 0,
    '_project' => 0,
    'catalog' => 0,
    'usableArea' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b03730268530_68881628',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b03730268530_68881628')) {function content_62b03730268530_68881628($_smarty_tpl) {?><?php ob_start();?><?php echo strtolower($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,true,true));?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['catalog'] = new Smarty_variable(('projekty/').($_tmp1), null, 0);?>
<div class="container" id="project-list">
	<section>
		<div class="list-grid" id="overlay-group">
		<?php  $_smarty_tpl->tpl_vars['_project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_project']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_project']->key => $_smarty_tpl->tpl_vars['_project']->value){
$_smarty_tpl->tpl_vars['_project']->_loop = true;
 $_smarty_tpl->tpl_vars['_project']->index++;
?>
			<?php $_smarty_tpl->tpl_vars['usableArea'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']), null, 0);?>
			<div>
				<figure class="effect-sadie">
					<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'box'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
" width="640" height="427">
					
					<figcaption>
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>$_smarty_tpl->tpl_vars['catalog']->value),$_smarty_tpl);?>
">
							<span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,false,true);?>
</span>
							<strong><?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
<?php if ($_smarty_tpl->tpl_vars['usableArea']->value){?> <span><?php echo $_smarty_tpl->tpl_vars['usableArea']->value;?>
 m<sup>2</sup></span><?php }?></strong>
						</a>
					</figcaption>
				</figure>
				
				<?php if ($_smarty_tpl->tpl_vars['type']->value=='fence'){?>
					<span class="overview only" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" data-idx="<?php echo $_smarty_tpl->tpl_vars['_project']->index;?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'presentation'),$_smarty_tpl);?>
" data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>$_smarty_tpl->tpl_vars['catalog']->value),$_smarty_tpl);?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><strike><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
</strike> <?php echo $_smarty_tpl->tpl_vars['_project']->value['price']-$_smarty_tpl->tpl_vars['_project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
<?php }?>" data-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
" data-span="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fenceSpanHeight'][0][0]->mFenceSpanHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
" data-roofing="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fenceRoofHeight'][0][0]->mFenceRoofHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
"></span>
				<?php }else{ ?>
					<span class="overview only" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" data-idx="<?php echo $_smarty_tpl->tpl_vars['_project']->index;?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'presentation'),$_smarty_tpl);?>
" data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>$_smarty_tpl->tpl_vars['catalog']->value),$_smarty_tpl);?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><strike><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
</strike> <?php echo $_smarty_tpl->tpl_vars['_project']->value['price']-$_smarty_tpl->tpl_vars['_project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
<?php }?>" data-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
" data-area="<?php echo $_smarty_tpl->tpl_vars['usableArea']->value;?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
" data-total-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['totalArea'][0][0]->mTotalArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-height="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['arborHeight'][0][0]->mArborHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-angle="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roofAngle'][0][0]->mRoofAngle($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
"></span>
				<?php }?>
					
				<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><div><span class="discount">rabat <?php echo $_smarty_tpl->tpl_vars['_project']->value['discount'];?>
</span></div><?php }?>
			</div>
		<?php } ?>
		</div>

	</section>
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
		<?php if ($_smarty_tpl->tpl_vars['type']->value=='fence'){?>
			<li><p>wysokość przęsła: <span id="span-height"></span> cm</p></li>
			<li><p>wysokość zadaszenia: <span id="roofing-height"></span> cm</p></li>
		<?php }else{ ?>
			<li><p>powierzchnia użytkowa: <span id="over-area"></span> m<sup>2</sup></p></li>
			<li><p>powierzchnia całkowita: <span id="over-total-area"></span> m</p></li>
			<?php if ($_smarty_tpl->tpl_vars['type']->value=='carport'){?>
			<li><p>wysokość wiaty: <span id="over-height"></span> m</p></li>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['type']->value=='arbor'){?>
			<li><p>wysokość altany: <span id="over-height"></span> m</p></li>
			<?php }?>
			<li><p>kąt nachylenia dachu: <span id="over-angle"></span></p></li>
		<?php }?>
			<li><p>cena projektu: <span id="over-price"></span> zł</p></li>
			<li><a href="" class="more">Zobacz szczegóły</a></li>
		</ul>
		
		<button type="button" class="overlay-change prev" id="prev-overlay">poprzedni</button>
		<button type="button" class="overlay-change next" id="next-overlay">następny</button>
	</div>
	
	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div><?php }} ?>