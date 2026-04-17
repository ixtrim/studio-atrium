<?php /* Smarty version Smarty-3.1.11, created on 2023-03-21 09:58:31
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/searchDisplayList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151182289062b03062b6dc93-29116672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df2d7a4758f3781d4a2d61f7213534c2b4133d29' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/searchDisplayList.tpl',
      1 => 1679392372,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151182289062b03062b6dc93-29116672',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b03062b8e338_71328500',
  'variables' => 
  array (
    'list' => 0,
    '_project' => 0,
    'linkTitle' => 0,
    'compareIds' => 0,
    'favouriteIds' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b03062b8e338_71328500')) {function content_62b03062b8e338_71328500($_smarty_tpl) {?><section>
	<div class="box">
		<ul class="list">
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
				<ul class="list-item fav-wrapper">
					<li>
						<ul>
							<li>
								<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['linkTitle']->value,'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['_project']->value['type'])),$_smarty_tpl);?>
">
									<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['linkTitle']->value;?>
">
								</a>
								<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNew'][0][0]->mIsNew($_smarty_tpl->tpl_vars['_project']->value)){?><span class="label">Nowość</span><?php }?>
								<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']&&$_smarty_tpl->tpl_vars['_project']->value['alternate_name']!='wycofany'){?><span class="label discount<?php if (!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNew'][0][0]->mIsNew($_smarty_tpl->tpl_vars['_project']->value)){?> left<?php }?>">Rabat <?php echo $_smarty_tpl->tpl_vars['_project']->value['discount'];?>
 zł</span><?php }?>
							</li>
							<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']!='tank'){?>
								<li>
									<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='house'||$_smarty_tpl->tpl_vars['_project']->value['type']=='skeleton'){?>
										<span id="compare-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="compare<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['compareIds']->value)){?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
										<span id="fav-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="fav<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['favouriteIds']->value)){?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
									<?php }?>
									<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['linkTitle']->value,'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['_project']->value['type'])),$_smarty_tpl);?>
">
										<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list','no'=>1),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['linkTitle']->value;?>
">
									</a>
								</li>
							<?php }?>	
						</ul>
					</li>
					
					<li>
						<h6><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['linkTitle']->value,'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['_project']->value['type'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['linkTitle']->value;?>
</a></h6>
						<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='tank'){?>
							<p>kubatura brutto: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['cubature'][0][0]->mCubature($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
</span> m<sup>3</sup></p>
						<?php }elseif($_smarty_tpl->tpl_vars['_project']->value['type']=='fence'){?>
							<p>wysokość przęsła: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fenceSpanHeight'][0][0]->mFenceSpanHeight($_smarty_tpl->tpl_vars['_project']->value['params_general'],true);?>
</p>
							<p>wysokość zadaszenia: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fenceRoofHeight'][0][0]->mFenceRoofHeight($_smarty_tpl->tpl_vars['_project']->value['params_general'],true);?>
</p>
						<?php }else{ ?>	
							<p>powierzchnia użytkowa: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
</span> m<sup>2</sup></p>
						<?php }?>
						<p><?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
</p>
						<?php if ($_smarty_tpl->tpl_vars['_project']->value['alternate_name']=='wycofany'){?>
							<p><strong>Uwaga! Projekt wycofany z oferty.</strong></p>
						<?php }?>	
					</li>
				</ul>
			</li>
		<?php } ?>
		</ul>
	</div>
</section><?php }} ?>