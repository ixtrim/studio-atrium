<?php /* Smarty version Smarty-3.1.11, created on 2023-05-24 09:49:41
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/garageDisplayList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188021933262b6b887c61490-93904999%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3caee28569d28832e3bcede98957100273e32e80' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/garageDisplayList.tpl',
      1 => 1684921703,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188021933262b6b887c61490-93904999',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b6b887c9d088_81289936',
  'variables' => 
  array (
    'list' => 0,
    '_project' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b6b887c9d088_81289936')) {function content_62b6b887c9d088_81289936($_smarty_tpl) {?><section>
	<div class="box">
		<ul class="list">
		<?php  $_smarty_tpl->tpl_vars['_project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_project']->key => $_smarty_tpl->tpl_vars['_project']->value){
$_smarty_tpl->tpl_vars['_project']->_loop = true;
?>
			<li>
				<ul class="list-item fav-wrapper">
					<li>
						<ul>
							<li>
								<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>'projekty-garazy'),$_smarty_tpl);?>
">
									<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list'),$_smarty_tpl);?>
" alt="Garaż <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
">
								</a>
								<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><span class="label discount left">Rabat <?php echo $_smarty_tpl->tpl_vars['_project']->value['discount'];?>
 zł</span><?php }?>
							</li>
							<li>
								<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>'projekty-garazy'),$_smarty_tpl);?>
">
									<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list','no'=>1),$_smarty_tpl);?>
" alt="Garaż <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
">
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<h6><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>'projekty-garazy'),$_smarty_tpl);?>
">Garaż <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
</a></h6>
						<p>powierzchnia użytkowa: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
</span> m<sup>2</sup></p>
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