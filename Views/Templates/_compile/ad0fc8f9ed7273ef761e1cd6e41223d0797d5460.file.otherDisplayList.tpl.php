<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 10:05:51
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/otherDisplayList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78143158162b0467f5f1a19-09742619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad0fc8f9ed7273ef761e1cd6e41223d0797d5460' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/otherDisplayList.tpl',
      1 => 1586348716,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78143158162b0467f5f1a19-09742619',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'list' => 0,
    '_project' => 0,
    'catalog' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0467f639916_79221333',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0467f639916_79221333')) {function content_62b0467f639916_79221333($_smarty_tpl) {?><?php ob_start();?><?php echo strtolower($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,true,true));?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['catalog'] = new Smarty_variable(('projekty/').($_tmp1), null, 0);?>

<section>
	<div class="box">
		<ul class="list">
		<?php  $_smarty_tpl->tpl_vars['_project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_project']->key => $_smarty_tpl->tpl_vars['_project']->value){
$_smarty_tpl->tpl_vars['_project']->_loop = true;
?>
			<li>
			<?php if ($_smarty_tpl->tpl_vars['type']->value=='tank'){?>
				<ul class="short-list-item">
					<li>
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>$_smarty_tpl->tpl_vars['catalog']->value),$_smarty_tpl);?>
">
							<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
">
						</a>
					</li>
					
					<li>
						<h6><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>$_smarty_tpl->tpl_vars['catalog']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
</a></h6>
						<p>kubatura brutto: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['cubature'][0][0]->mCubature($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
</span> m<sup>3</sup></p>
						<p><?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
</p>
					</li>
				</ul>
			<?php }elseif($_smarty_tpl->tpl_vars['type']->value=='fence'){?>
				<ul class="short-list-item">
					<li>
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>$_smarty_tpl->tpl_vars['catalog']->value),$_smarty_tpl);?>
">
							<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
">
						</a>
						<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><span class="label discount left">Rabat <?php echo $_smarty_tpl->tpl_vars['_project']->value['discount'];?>
 zł</span><?php }?>
					</li>
					
					<li>
						<h6><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>$_smarty_tpl->tpl_vars['catalog']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
</a></h6>
						<p>wysokość przęsła: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fenceSpanHeight'][0][0]->mFenceSpanHeight($_smarty_tpl->tpl_vars['_project']->value['params_general'],true);?>
</p>
						<p>wysokość zadaszenia: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fenceRoofHeight'][0][0]->mFenceRoofHeight($_smarty_tpl->tpl_vars['_project']->value['params_general'],true);?>
</p>
						<p><?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
</p>
					</li>
				</ul>
			<?php }elseif($_smarty_tpl->tpl_vars['type']->value=='small'){?>
				<ul class="list-item">
					<li>
						<ul>
							<li>
								<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['_project']->value['type'])),$_smarty_tpl);?>
">
									<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['_project']->value['type'],false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
">
								</a>
								<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><span class="label discount left">Rabat <?php echo $_smarty_tpl->tpl_vars['_project']->value['discount'];?>
 zł</span><?php }?>
							</li>
							<li>
								<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['_project']->value['type'])),$_smarty_tpl);?>
">
									<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list','no'=>1),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['_project']->value['type'],false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
">
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<h6><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['_project']->value['type'])),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['_project']->value['type'],false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
</a></h6>
						<p>powierzchnia użytkowa: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
</span> m<sup>2</sup></p>
						<p><?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
</p>
					</li>
				</ul>	
			<?php }else{ ?>
				<ul class="list-item">
					<li>
						<ul>
							<li>
								<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>$_smarty_tpl->tpl_vars['catalog']->value),$_smarty_tpl);?>
">
									<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
">
								</a>
								<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><span class="label discount left">Rabat <?php echo $_smarty_tpl->tpl_vars['_project']->value['discount'];?>
 zł</span><?php }?>
							</li>
							<li>
								<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>$_smarty_tpl->tpl_vars['catalog']->value),$_smarty_tpl);?>
">
									<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list','no'=>1),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
">
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<h6><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>$_smarty_tpl->tpl_vars['catalog']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['type']->value,false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
</a></h6>
						<p>powierzchnia użytkowa: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
</span> m<sup>2</sup></p>
						<p><?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
</p>
					</li>
				</ul>
			<?php }?>
			</li>
		<?php } ?>
		</ul>
	</div>
</section><?php }} ?>