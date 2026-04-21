<?php /* Smarty version Smarty-3.1.11, created on 2022-06-21 15:06:58
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/Promo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210560585462b1de9226a855-71403979%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fde970c6c6eee0bfb67212ec3688c2120a4addf7' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/Promo.tpl',
      1 => 1544006431,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210560585462b1de9226a855-71403979',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'discount' => 0,
    '_discount' => 0,
    'default_start_date' => 0,
    'default_stop_date' => 0,
    'projects' => 0,
    'list' => 0,
    '_projectId' => 0,
    'promo' => 0,
    '_promo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b1de922897f1_07426478',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b1de922897f1_07426478')) {function content_62b1de922897f1_07426478($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("Panel/_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="content">
	<p class="center uline"><input type="checkbox" name="promo_info" id="promo-info"<?php if (!$_smarty_tpl->tpl_vars['user']->value['props']['noPromoInfo']){?> checked<?php }?>> <label for="promo-info">Chcę otrzymywać na e-maila powiadomienia o nowych promocjach.</label></p>

	<h3>Rabat <strong>100 zł</strong> za rejestrację!</h3>
	<p class="center">W podziękowaniu za rejestrację konta w naszym serwisie, mamy dla Ciebie stały rabat w wysokości <strong>100 zł</strong> na zakupy w naszym serwisie. Rabat zostanie automatycznie uwzględniony w podsumowaniu Twojego koszyka z zakupami. Pamiętaj, że rabat dotyczy zamówienia z minimum jednym projektem domu.</p>

	<?php if ($_smarty_tpl->tpl_vars['discount']->value){?>
		<?php  $_smarty_tpl->tpl_vars['_discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discount']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_discount']->key => $_smarty_tpl->tpl_vars['_discount']->value){
$_smarty_tpl->tpl_vars['_discount']->_loop = true;
?>
			<h3 class="line"><?php echo $_smarty_tpl->tpl_vars['_discount']->value['title'];?>
</h3>
			<div class="center">
				<?php echo $_smarty_tpl->tpl_vars['_discount']->value['description'];?>

				<p>Aby uzyskać rabat w wysokości <?php if ($_smarty_tpl->tpl_vars['_discount']->value['discount_type']=='percent'){?><strong><?php echo $_smarty_tpl->tpl_vars['_discount']->value['discount_value'];?>
 %</strong><?php }else{ ?><strong><?php echo $_smarty_tpl->tpl_vars['_discount']->value['discount_value'];?>
 zł</strong><?php }?>, wpisz podczas finalizowania Twojego zamówienia w koszyku poniższy kod rabatowy:</p>
				<p><h4><?php echo $_smarty_tpl->tpl_vars['_discount']->value['code'];?>
</h4></p>
				<?php if ($_smarty_tpl->tpl_vars['_discount']->value['start_date']!=$_smarty_tpl->tpl_vars['default_start_date']->value||$_smarty_tpl->tpl_vars['_discount']->value['stop_date']!=$_smarty_tpl->tpl_vars['default_stop_date']->value){?>
					<p>Data ważności: <?php if ($_smarty_tpl->tpl_vars['_discount']->value['start_date']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_discount']->value['start_date'],"%d-%m-%Y");?>
<?php }else{ ?>brak daty początkowej<?php }?> - <?php if ($_smarty_tpl->tpl_vars['_discount']->value['stop_date']){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_discount']->value['stop_date'],"%d-%m-%Y");?>
<?php }else{ ?>brak daty końcowej<?php }?></p> 
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['_discount']->value['projects_id']&&$_smarty_tpl->tpl_vars['projects']->value){?>
					<p>Lista projektów objętych promocją:</p>
					<?php $_smarty_tpl->tpl_vars['list'] = new Smarty_variable(explode(",",$_smarty_tpl->tpl_vars['_discount']->value['projects_id']), null, 0);?>
					<ul class="projectList">
						<?php  $_smarty_tpl->tpl_vars['_projectId'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_projectId']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_projectId']->key => $_smarty_tpl->tpl_vars['_projectId']->value){
$_smarty_tpl->tpl_vars['_projectId']->_loop = true;
?>
							<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_projectId']->value,'link_title'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['linkTitle'][0][0]->mLinkTitle($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_projectId']->value]),'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_projectId']->value]['type'])),$_smarty_tpl);?>
" class="external"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_projectId']->value],'size'=>'thumb'),$_smarty_tpl);?>
"><p><?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_projectId']->value]['name'];?>
</p></a></li>
						<?php } ?>	
					</ul>
				<?php }?>	
			</div>
		<?php } ?>
	<?php }?>	

	<?php if ($_smarty_tpl->tpl_vars['promo']->value){?>
		<?php  $_smarty_tpl->tpl_vars['_promo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_promo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['promo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_promo']->key => $_smarty_tpl->tpl_vars['_promo']->value){
$_smarty_tpl->tpl_vars['_promo']->_loop = true;
?>
			<h3 class="line"><?php echo $_smarty_tpl->tpl_vars['_promo']->value['title'];?>
</h3>
			<div class="center">
				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fixArticleContent'][0][0]->mFixArticleContent($_smarty_tpl->tpl_vars['_promo']->value['content'],$_smarty_tpl->tpl_vars['_promo']->value['id']);?>

			</div>
		<?php } ?>
	<?php }?>
</div><?php }} ?>