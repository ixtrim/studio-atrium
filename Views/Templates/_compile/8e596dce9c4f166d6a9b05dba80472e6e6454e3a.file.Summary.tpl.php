<?php /* Smarty version Smarty-3.1.11, created on 2023-04-12 09:34:07
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Order/Summary.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113825810762b03046453d76-17498369%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e596dce9c4f166d6a9b05dba80472e6e6454e3a' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Order/Summary.tpl',
      1 => 1681283894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113825810762b03046453d76-17498369',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0304649cb69_66978020',
  'variables' => 
  array (
    'basket' => 0,
    '_basket' => 0,
    'projects' => 0,
    'extras' => 0,
    '_extra' => 0,
    'key' => 0,
    'basketFormData' => 0,
    'projects4extras' => 0,
    'fw' => 0,
    'mainExtras' => 0,
    'promoCode' => 0,
    'paymentMethods' => 0,
    'deliveryMethods' => 0,
    'basketUserData' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0304649cb69_66978020')) {function content_62b0304649cb69_66978020($_smarty_tpl) {?><div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Twój koszyk</h1>
			</div>
		</div>
	</div>
</div>

<div class="options">
	<div class="box">
		<ul>
			<li><div><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'order','action'=>'cart'),$_smarty_tpl);?>
"><span class="cart">Koszyk</span></a></div></li>
			<li><div><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'order','action'=>'data'),$_smarty_tpl);?>
"><span class="data">Dane osobowe</span></a></div></li>
			<li class="selected"><div><span class="summary">Podsumowanie</span></div></li>
		</ul>
	</div>
</div>

<div class="wrapper">
	<div class="box">
		<div class="center">
			<p class="section">Twoje Zakupy</p>
			<table>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['_basket'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_basket']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['basket']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_basket']->key => $_smarty_tpl->tpl_vars['_basket']->value){
$_smarty_tpl->tpl_vars['_basket']->_loop = true;
?>
						<?php if ($_smarty_tpl->tpl_vars['_basket']->value['pid']){?>
							<tr>	
								<td><a href="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['link'];?>
" class="external"><?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['name']){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'],false,false);?>
 <?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'],false,false);?>
 <?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['symbol_num'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror'){?> <small>(odbicie lustrzane)</small><?php }else{ ?> <small>(wersja podstawowa)</small><?php }?></a></td>
								<td><?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['discount']){?><span class="line"><?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['price'];?>
</span><?php }?> <span><?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['discount']){?><?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['price']-$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['price'];?>
<?php }?></span></td>
							<?php if ($_smarty_tpl->tpl_vars['extras']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]){?>
								</tr>
								<?php  $_smarty_tpl->tpl_vars['_extra'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_extra']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['extras']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_extra']->key => $_smarty_tpl->tpl_vars['_extra']->value){
$_smarty_tpl->tpl_vars['_extra']->_loop = true;
?>
									<?php $_smarty_tpl->tpl_vars['key'] = new Smarty_variable("cliSelExtras[".((string)$_smarty_tpl->tpl_vars['_basket']->value['pid'])."][".((string)$_smarty_tpl->tpl_vars['_extra']->value['extras']['id'])."]", null, 0);?>
									<?php if ($_smarty_tpl->tpl_vars['basketFormData']->value[$_smarty_tpl->tpl_vars['key']->value]){?>
										<tr class="padded">
											<td>
												- <?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['name'];?>
<?php if ($_smarty_tpl->tpl_vars['projects4extras']->value[$_smarty_tpl->tpl_vars['_extra']->value['extras']['id']]){?> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['linkTitle'][0][0]->mLinkTitle($_smarty_tpl->tpl_vars['projects4extras']->value[$_smarty_tpl->tpl_vars['_extra']->value['extras']['id']]);?>
<?php }?>
											</td>
											<td><span><?php if ($_smarty_tpl->tpl_vars['_extra']->value['package_price']>=0){?><?php echo $_smarty_tpl->tpl_vars['_extra']->value['package_price'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['price'];?>
<?php }?></span></td>
										</tr>
										
											<?php if ($_smarty_tpl->tpl_vars['_extra']->value['extras']['id']==23&&$_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]){?>
											<tr class="extrainfo"><td colspan="2">
												<p>Dane do projektu fotowoltaiki: </p>
												<ul>
													<li>planowana ilość osób zamieszkująca dom: <strong><?php echo $_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['lodger_count'];?>
</strong></li>
													<li>ogrzewanie CO: <strong><?php if ($_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['co']==1){?>kocioł stałopalny<?php }elseif($_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['co']==2){?>kocioł gazowy<?php }else{ ?>pompa ciepła<?php }?></strong></li>
													<li>ogrzewanie CWU: <strong><?php if ($_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['cwu']==1){?>kocioł stałopalny<?php }elseif($_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['cwu']==2){?>kocioł gazowy<?php }else{ ?>pompa ciepła<?php }?></strong></li>
													<li>usytuowanie frontu budynku względem kierunków swiata: <strong><?php echo $_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['orientation'];?>
</strong></li>
													<li>elementy zacieniające: <strong><?php echo $_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['shaders'];?>
</strong></li>
												</ul>
												</td></tr>
											<?php }?>
										
										
									<?php }?>	
								<?php } ?>
							<?php }else{ ?>
								</tr>								
							<?php }?>
						<?php }else{ ?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['mainExtras']->value[$_smarty_tpl->tpl_vars['_basket']->value['eid']]['name'];?>
<?php if ($_smarty_tpl->tpl_vars['_basket']->value['epid']){?> dla projektu <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_basket']->value['epid'],'link_title'=>$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['epid']]['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
" class="external"><?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['epid']]['name'];?>
</a><?php }?></td>
								<td><span><?php echo $_smarty_tpl->tpl_vars['_basket']->value['price'];?>
</span></td>
							</tr>
						<?php }?>
					<?php } ?>
					<tr class="line"><td>Koszty wysyłki</td><td><span>* <?php echo $_smarty_tpl->tpl_vars['basketFormData']->value['deliveryPrice'];?>
</span></td></tr>
					<?php if ($_smarty_tpl->tpl_vars['basketFormData']->value['registerUserDiscount']){?>
						<tr><td>Rabat za rejestrację</td><td><span class="red">-<?php echo $_smarty_tpl->tpl_vars['basketFormData']->value['registerUserDiscount'];?>
</span></td></tr>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['promoCode']->value){?>
						<tr><td><?php echo $_smarty_tpl->tpl_vars['promoCode']->value['title'];?>
 <small>(kod: <?php echo $_smarty_tpl->tpl_vars['promoCode']->value['code'];?>
)</small></td><td><span class="red">-<?php if ($_smarty_tpl->tpl_vars['promoCode']->value['discount_type']=='percent'&&$_smarty_tpl->tpl_vars['promoCode']->value['percent_discount_value']){?><?php echo $_smarty_tpl->tpl_vars['promoCode']->value['percent_discount_value'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['promoCode']->value['discount_value'];?>
<?php }?></span></td></tr>
					<?php }?>
					<tr class="line">
						<td>&nbsp;</td>
						<td>Razem <strong class="red"><?php echo $_smarty_tpl->tpl_vars['basketFormData']->value['total'];?>
</strong></td>
					</tr>
				</tbody>
			</table>
			
			<p>* Promocyjna cena wysyłki dotyczy doręczenia tylko na terenie Polski.</p>
		</div>
		<div class="center morespaced">
			<p class="section">Płatność i wysyłka</p>
			<p class="up"><?php echo $_smarty_tpl->tpl_vars['paymentMethods']->value[$_smarty_tpl->tpl_vars['basketFormData']->value['payment_type']];?>
 - <?php echo $_smarty_tpl->tpl_vars['deliveryMethods']->value[$_smarty_tpl->tpl_vars['basketFormData']->value['dispatch_type']];?>
</p>
			
			<?php if ($_smarty_tpl->tpl_vars['basketFormData']->value['payment_type']=='transfer'){?>
				<div class="info">
					<p>Numer konta: PKO BP O/Bielsko-Biała 81 1020 1390 0000 6102 0134 5404</p>
					<p>W tytule przelewu prosimy podać nazwę projektu lub dodatku.</p>
					<p>Zakupione towary zostaną wysłane po zaksięgowaniu wpłaty.</p>
				</div>
			<?php }?>
		</div>
		
		<div class="center morespaced">
			<p class="section">Twoje dane</p>
			<ul>
			<?php if ($_smarty_tpl->tpl_vars['basketUserData']->value['client_type']=='company'){?>
				<li><?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['company_name'];?>
</li>
				<li>NIP: <?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['nip'];?>
</li>
				<li>&nbsp;</li>
			<?php }?>
				<li><?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['fname'];?>
 <?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['lname'];?>
</li>
				<li><?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['address'];?>
</li>
				<li><?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['postal_code'];?>
 <?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['city'];?>
</li>
				<li>&nbsp;</li>
				<li>e-mail: <?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['email'];?>
</li>
				<li>telefon: <?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['phone'];?>
</li>
			<?php if ($_smarty_tpl->tpl_vars['basketUserData']->value['send_data']==1){?>
				<li>&nbsp;</li>
				<li><strong>Dane do wysyłki</strong></li>
				<li>&nbsp;</li>
				<li><?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['send_fname'];?>
 <?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['send_lname'];?>
</li>
				<li><?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['send_address'];?>
</li>
				<li><?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['send_postal_code'];?>
 <?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['send_city'];?>
</li>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['basketUserData']->value['notes']){?>
				<li>&nbsp;</li>
				<li><strong>Uwagi</strong></li>
				<li><?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['notes'];?>
</li>
			<?php }?>
			</ul>
		</div>

		<div class="next">
			<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'order','action'=>'store_summary'),$_smarty_tpl);?>
" method="post"><button class="order">Zamawiam</button></form>
		</div>
	</div>
</div><?php }} ?>