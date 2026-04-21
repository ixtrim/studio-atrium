<?php /* Smarty version Smarty-3.1.11, created on 2023-05-24 09:49:26
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/garageDisplayDetail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55742660262b1351b4f5213-15032553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb0d2c9dcb5f861321d335562d47af332470be86' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/garageDisplayDetail.tpl',
      1 => 1684921761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55742660262b1351b4f5213-15032553',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b1351b509c82_37556108',
  'variables' => 
  array (
    'list' => 0,
    '_project' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b1351b509c82_37556108')) {function content_62b1351b509c82_37556108($_smarty_tpl) {?><section>
	<div class="box">
		<ul class="detail fav-wrapper">
		<?php  $_smarty_tpl->tpl_vars['_project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_project']->key => $_smarty_tpl->tpl_vars['_project']->value){
$_smarty_tpl->tpl_vars['_project']->_loop = true;
?>
			<li>
				<ul>
					<li>
						<div>
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>'projekty-garazy'),$_smarty_tpl);?>
">
							<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list'),$_smarty_tpl);?>
" alt="Garaż <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
">
						</a>
						<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><span class="label discount left">Rabat <?php echo $_smarty_tpl->tpl_vars['_project']->value['discount'];?>
 zł</span><?php }?>
						</div>
					</li>
					<li class="slide" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
">
						<img id="img-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" data-src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value),$_smarty_tpl);?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list'),$_smarty_tpl);?>
" alt="Rzut garażu">
					</li>
					<li class="data">
						<h6><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'])." ".((string)$_smarty_tpl->tpl_vars['_project']->value['symbol_num']),'catalog'=>'projekty-garazy'),$_smarty_tpl);?>
">Garaż <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
</a></h6>
						
						<p><?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
</p>
						
						<ul>
							<li>powierzchnia użytkowa: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
</span> m<sup>2</sup></li>
							<li>powierzchnia całkowita: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['totalArea'][0][0]->mTotalArea($_smarty_tpl->tpl_vars['_project']->value['params_general'],true);?>
</li>
							<li>kąt nachylenia dachu: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roofAngle'][0][0]->mRoofAngle($_smarty_tpl->tpl_vars['_project']->value['params_general'],true);?>
</li>
							<li>wysokość garażu: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['garageHeight'][0][0]->mGarageHeight($_smarty_tpl->tpl_vars['_project']->value['params_general'],true);?>
</li>
							<?php if ($_smarty_tpl->tpl_vars['_project']->value['alternate_name']=='wycofany'){?>
							<li><strong>Uwaga! Projekt wycofany z oferty.</strong></li>
							<?php }else{ ?>
							<li>cena projektu: <?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
 zł</li>
							<?php }?>
						</ul>
					</li>
				</ul>
			</li>
		<?php } ?>
		</ul>
	</div>
</section><?php }} ?>