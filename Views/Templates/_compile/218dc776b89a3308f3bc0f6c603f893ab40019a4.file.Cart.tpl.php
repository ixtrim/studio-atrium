<?php /* Smarty version Smarty-3.1.11, created on 2025-08-20 10:54:34
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Order/Cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:161604324262b0302c8a9ce7-26409171%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '218dc776b89a3308f3bc0f6c603f893ab40019a4' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Order/Cart.tpl',
      1 => 1755687269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161604324262b0302c8a9ce7-26409171',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0302c9dd3e9_96520363',
  'variables' => 
  array (
    'basket' => 0,
    '_basket' => 0,
    'projects' => 0,
    'params' => 0,
    'sum' => 0,
    'extras' => 0,
    '_extra' => 0,
    'stockPath' => 0,
    'group' => 0,
    'firstArray' => 0,
    'first' => 0,
    'proId' => 0,
    'projectsForExtras' => 0,
    'fw' => 0,
    'mainExtras' => 0,
    'minPayment' => 0,
    'deliveryMethods' => 0,
    'key' => 0,
    'deliveryCosts' => 0,
    'cost' => 0,
    'dispatchType' => 0,
    'delivery' => 0,
    'paymentMethods' => 0,
    'allProjectsAvailable' => 0,
    'paymentType' => 0,
    'method' => 0,
    'user' => 0,
    'isHouseProjectOnList' => 0,
    'projectsId' => 0,
    'projectsPercentId' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0302c9dd3e9_96520363')) {function content_62b0302c9dd3e9_96520363($_smarty_tpl) {?><div class="list-header">
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
			<li class="selected"><div><span class="cart">Koszyk</span></div></li>
			<li class="disabled"><div><span class="data">Dane osobowe</span></div></li>
			<li class="disabled"><div><span class="summary">Podsumowanie</span></div></li>
		</ul>
	</div>
</div>
<?php $_smarty_tpl->tpl_vars['sum'] = new Smarty_variable(0, null, 0);?>
<div class="wrapper">
	<div class="box" id="basketMainContent">
	<form action="#" method="post" id="basketForm">
	<?php $_smarty_tpl->tpl_vars['isHouseProjectOnList'] = new Smarty_variable(false, null, 0);?>
	<?php $_smarty_tpl->tpl_vars['projectsPercentId'] = new Smarty_variable(null, null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['_basket'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_basket']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['basket']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_basket']->key => $_smarty_tpl->tpl_vars['_basket']->value){
$_smarty_tpl->tpl_vars['_basket']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['_basket']->value['pid']){?>
			<?php $_smarty_tpl->createLocalArrayVariable('projectsId', null, 0);
$_smarty_tpl->tpl_vars['projectsId']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']] = $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
			<?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type']=='house'||$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type']=='skeleton'){?>
				<?php $_smarty_tpl->tpl_vars['isHouseProjectOnList'] = new Smarty_variable(true, null, 0);?>
				<?php $_smarty_tpl->createLocalArrayVariable('projectsPercentId', null, 0);
$_smarty_tpl->tpl_vars['projectsPercentId']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']] = $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
			<?php }elseif($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type']=='garage'){?>
				<?php $_smarty_tpl->createLocalArrayVariable('projectsPercentId', null, 0);
$_smarty_tpl->tpl_vars['projectsPercentId']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']] = $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
			<?php }?>
			<ul class="item">
				<li>
					<div>
					<a href="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['link'];?>
"><img src="<?php if ($_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror'){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']],'mirror'=>1),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']],'size'=>'list'),$_smarty_tpl);?>
<?php }?>" alt="<?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['name']){?><?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'],false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['symbol_num'];?>
<?php }?>"></a>
					
					<p class="title big" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['link'];?>
"><?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['name']){?><?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'],false,true);?>
 <?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['symbol_num'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror'){?> <small>(odbicie lustrzane)</small><?php }else{ ?> <small>(wersja podstawowa)</small><?php }?></a><?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type']=='house'||$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type']=='skeleton'||$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type']=='garage'||$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type']=='outbuilding'){?> <?php if ($_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror'){?><a href="javascript:" class="changeVersion" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
" data-version="normal">zmień wersję na podstawową &raquo;</a><?php }else{ ?><a href="javascript:" class="changeVersion" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
" data-version="mirror">zmień na lustrzane odbicie &raquo;</a><?php }?><?php }?></p>	
					
					<?php if (!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isAvailable'][0][0]->mIsAvailable($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']])){?>
						<p class="notice">Zamawiasz projekt w fazie koncepcyjnej - zapytaj o termin realizacji.</p>
						<p>Po złożeniu zamówienia nasz pracownik skontaktuje się w sprawie ustalenia terminu. Poprosimy Cię także o wpłatę 30% zadatku - wyślemy mailem fakturę proforma do opłacenia.<br /><br /><br /></p>
					<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isWT2021needful'][0][0]->mIsWT2021needful($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']])){?>
						<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isWT2021needfulHeat'][0][0]->mIsWT2021needfulHeat($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']])){?>
							<p class="notice">Uwaga! Ze względu na obowiązujące od 01.01.2021 nowe warunki techniczne <strong>WT2021</strong>, konieczna będzie korekta projektu <strong>w zakresie ogrzewania</strong>, dodatkowo wymiary zewnętrzne bryły mogą ulec zmianie do kilkunastu cm. Zapytaj o termin realizacji!</p>
						<?php }else{ ?>
							<p class="notice">Uwaga! Ze względu na obowiązujące od 01.01.2021 nowe warunki techniczne <strong>WT2021</strong>, konieczna będzie korekta projektu, przez co wymiary zewnętrzne bryły mogą ulec zmianie do kilkunastu cm. Czas realizacji projektu to około 2 miesiące.</p>						
						<?php }?>
					<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isWT2021needfulHeat'][0][0]->mIsWT2021needfulHeat($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']])){?>
						<p class="notice">Uwaga! Ze względu na obowiązujące od 01.01.2021 nowe warunki techniczne <strong>WT2021</strong>, konieczna będzie korekta projektu <strong>w zakresie ogrzewania</strong>. Zapytaj o termin realizacji!</p>
					<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isReady7days'][0][0]->mIsReady7days($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']])){?>
						<p class="notice">Dostępność projektu: <strong>7-14 dni</strong>.</p>
						
					<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isReady14days'][0][0]->mIsReady14days($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']])){?>
						
						<p class="notice">Dostępność projektu: <strong>7-14 dni</strong>.</p>
						
					<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNarrowGarage'][0][0]->mIsNarrowGarage($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']])){?>
						<p class="notice">Uwaga! W związku ze zmianą przepisów, projekt wymaga korekty szerokości garażu - zapytaj o termin realizacji.</p>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type']=='fence'){?>
						<p>Komplet składa się z <strong>dwóch</strong> egzemplarzy projektu architektoniczno-budowlanego.</p>
					<?php }elseif($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type']=='arbor'){?>
						<p>Komplet składa się z <strong>trzech</strong> egzemplarzy projektu architektoniczno-budowlanego.</p>
					<?php }elseif($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type']!='tank'||$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type']!='carport'){?>
						<p>Zawartość dokumentacji projektowej:
						<br>- <strong>3 egzemplarze</strong> projektu architektoniczno-budowlanego,
    					<?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type']=='garage'){?><br>- <strong>3 egzemplarze</strong> projektu technicznego (konstrukcja oraz instalacja elektryczna).<?php }elseif($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type']!='carport'&&$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type']!='tank'){?><br>- <strong>3 egzemplarze</strong> projektu technicznego (konstukcja, charakt. energetyczna oraz instalacje).<?php }?></p>
					<?php }?>
					</div>
				</li>
				<li class="price"><?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['discount']){?><span><?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['price'];?>
 zł</span><br><?php }?><strong><?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['discount']){?><?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['price']-$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['price'];?>
<?php }?></strong> zł</li>
				<li><span class="remove" data-project="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
" data-version="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'];?>
"></span></li>
				<?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['discount']){?>		
					<?php $_smarty_tpl->tpl_vars['sum'] = new Smarty_variable($_smarty_tpl->tpl_vars['sum']->value+($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['price']-$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['discount']), null, 0);?>
				<?php }else{ ?>		
					<?php $_smarty_tpl->tpl_vars['sum'] = new Smarty_variable($_smarty_tpl->tpl_vars['sum']->value+$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['price'], null, 0);?>
				<?php }?>	
			</ul>

			<?php if ($_smarty_tpl->tpl_vars['extras']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]){?>
			<ul class="sub-item pointer">
				<li>
					<p class="header">Dodatki do projektu</p>
				</li>
				<li class="price">&nbsp;</li>
				<li>&nbsp;</li>
			</ul>
			
			<?php  $_smarty_tpl->tpl_vars['_extra'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_extra']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['extras']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_extra']->key => $_smarty_tpl->tpl_vars['_extra']->value){
$_smarty_tpl->tpl_vars['_extra']->_loop = true;
?>
			<ul class="sub-item">
				<li>
					<div<?php if ($_smarty_tpl->tpl_vars['_extra']->value['extras']['id']==23){?> id="fotowoltaika"<?php }?>>
						<img src="<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['filename'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['name'];?>
">
						<p class="title"><?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['name'];?>
</p>
						<p><?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['description'];?>
</p>
						<?php if ($_smarty_tpl->tpl_vars['_extra']->value['extras']['is_group']&&$_smarty_tpl->tpl_vars['_extra']->value['extras']['project_list_id']){?>
							<?php $_smarty_tpl->tpl_vars['group'] = new Smarty_variable(explode(",",$_smarty_tpl->tpl_vars['_extra']->value['extras']['project_list_id']), null, 0);?>
							<?php $_smarty_tpl->tpl_vars['firstArray'] = new Smarty_variable(array_values($_smarty_tpl->tpl_vars['group']->value), null, 0);?>
							<?php $_smarty_tpl->tpl_vars['first'] = new Smarty_variable($_smarty_tpl->tpl_vars['firstArray']->value[0], null, 0);?>
							<input name="extras4project[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
]" id="selector_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['first']->value;?>
">
							<div id="selector-extras_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
" class="selectorExtrasWrapper">
								<p class="subtitle">Wybierz z listy:</p>
								<?php  $_smarty_tpl->tpl_vars['proId'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['proId']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['proId']->key => $_smarty_tpl->tpl_vars['proId']->value){
$_smarty_tpl->tpl_vars['proId']->_loop = true;
?>
									<?php if ($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type']=='garage'){?>
										<span class="overview" id="overview_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
_<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'presentation'),$_smarty_tpl);?>
" data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['proId']->value,'link_title'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['linkTitle'][0][0]->mLinkTitle($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]),'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'])),$_smarty_tpl);?>
" data-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'],false,true);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['linkTitle'][0][0]->mLinkTitle($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]);?>
" data-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-total-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['totalArea'][0][0]->mTotalArea($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-height="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['garageHeight'][0][0]->mGarageHeight($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-angle="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roofAngle'][0][0]->mRoofAngle($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['short_description'];?>
">
											<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'list'),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->tpl_vars['first']->value==$_smarty_tpl->tpl_vars['proId']->value){?> class="selected"<?php }?>>
										</span>
									<?php }elseif($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type']=='house'||$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type']=='skeleton'){?>
										<span class="overview" id="overview_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
_<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'presentation'),$_smarty_tpl);?>
" data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['proId']->value,'link_title'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['linkTitle'][0][0]->mLinkTitle($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]),'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'])),$_smarty_tpl);?>
" data-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['linkTitle'][0][0]->mLinkTitle($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]);?>
" data-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-total-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['totalArea'][0][0]->mTotalArea($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-parcel="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelWidth'][0][0]->mParcelWidth($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
 x <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelHeight'][0][0]->mParcelHeight($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-height="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['houseHeight'][0][0]->mHouseHeight($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-angle="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roofAngle'][0][0]->mRoofAngle($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-version="<?php if ($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type']=='skeleton'){?>wersja szkieletowa<?php }else{ ?>wersja murowana<?php }?>" data-txt="<?php echo $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['short_description'];?>
">
											<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'list'),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->tpl_vars['first']->value==$_smarty_tpl->tpl_vars['proId']->value){?> class="selected"<?php }?>>
										</span>
									<?php }elseif($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type']=='fence'){?>
										<span class="overview" id="overview_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
_<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'presentation'),$_smarty_tpl);?>
" data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['proId']->value,'link_title'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['linkTitle'][0][0]->mLinkTitle($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]),'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'])),$_smarty_tpl);?>
" data-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'],false,true);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['linkTitle'][0][0]->mLinkTitle($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]);?>
" data-span="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fenceSpanHeight'][0][0]->mFenceSpanHeight($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-roofing="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fenceRoofHeight'][0][0]->mFenceRoofHeight($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['short_description'];?>
">
											<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'list'),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->tpl_vars['first']->value==$_smarty_tpl->tpl_vars['proId']->value){?> class="selected"<?php }?>>
										</span>
									<?php }elseif($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type']=='arbor'){?>
										<span class="overview" id="overview_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
_<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'presentation'),$_smarty_tpl);?>
" data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['proId']->value,'link_title'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['linkTitle'][0][0]->mLinkTitle($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]),'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'])),$_smarty_tpl);?>
" data-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'],false,true);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['linkTitle'][0][0]->mLinkTitle($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]);?>
" data-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-total-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['totalArea'][0][0]->mTotalArea($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-height="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['arborHeight'][0][0]->mArborHeight($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-angle="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roofAngle'][0][0]->mRoofAngle($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['short_description'];?>
">
											<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'list'),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->tpl_vars['first']->value==$_smarty_tpl->tpl_vars['proId']->value){?> class="selected"<?php }?>>
										</span>
									<?php }elseif($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type']=='carport'){?>
										<span class="overview" id="overview_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
_<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'presentation'),$_smarty_tpl);?>
" data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['proId']->value,'link_title'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['linkTitle'][0][0]->mLinkTitle($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]),'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'])),$_smarty_tpl);?>
" data-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'],false,true);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['linkTitle'][0][0]->mLinkTitle($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]);?>
" data-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-total-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['totalArea'][0][0]->mTotalArea($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-height="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['carportHeight'][0][0]->mCarportHeight($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-angle="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roofAngle'][0][0]->mRoofAngle($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['short_description'];?>
">
											<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'list'),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->tpl_vars['first']->value==$_smarty_tpl->tpl_vars['proId']->value){?> class="selected"<?php }?>>
										</span>
									<?php }elseif($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type']=='tank'){?>
										<span class="overview" id="overview_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
_<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'presentation'),$_smarty_tpl);?>
" data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['proId']->value,'link_title'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['linkTitle'][0][0]->mLinkTitle($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]),'catalog'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectCatalog'][0][0]->mProjectCatalog($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'])),$_smarty_tpl);?>
" data-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['projectType'][0][0]->mProjectType($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'],false,true);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['linkTitle'][0][0]->mLinkTitle($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]);?>
" data-build-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['buildArea'][0][0]->mBuildArea($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-cubature="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['cubature'][0][0]->mCubature($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general']);?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['short_description'];?>
">
											<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'list'),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->tpl_vars['first']->value==$_smarty_tpl->tpl_vars['proId']->value){?> class="selected"<?php }?>>
										</span>
									<?php }?>	
								<?php } ?>
							</div>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['_extra']->value['extras']['id']==23){?> 
							<div id="selector-extras_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
" class="selectorExtrasWrapper">
								<p class="subtitle" id="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-extrainfo">Aby jak najlepiej dopasawać instalację fotowoltaiczną do wybranego projektu domu prosimy odpowiedzieć na poniższe pytania:</p>
							
								<ul>
									<li class="topic">a) Wymagane do określenia zapotrzebowania energetycznego:</li>
									<li class="spaced">- planowana ilość osób zamieszkująca dom <input type="text" id="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-lodger-count" name="fw[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][lodger_count]" value="<?php echo $_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['lodger_count'];?>
"></li>
									<li class="spaced">- jakie ogrzewanie CO będzie zastosowane (kocioł stałopalny, gazowy, pompa ciepła)</li>
									<li> <input type="radio" id="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-co-1" name="fw[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][co]" value="1"<?php if ($_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['co']==1){?> checked<?php }?>><label for="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-co-1" class="spaced breaker">kocioł stałopalny</label> <input type="radio" id="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-co-2" name="fw[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][co]" value="2"<?php if ($_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['co']==2){?> checked<?php }?>><label for="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-co-2" class="spaced breaker">kocioł gazowy</label> <input type="radio" id="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-co-3" name="fw[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][co]" value="3"<?php if ($_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['co']==3){?> checked<?php }?>><label for="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-co-3" class="spaced breaker">pompa ciepła</label></li>
									<li class="spaced">- jakie ogrzewanie CWU będzie zastosowane (kocioł stałopalny, gazowy, pompa ciepła)</li>
									<li> <input type="radio" id="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-cwu-1" name="fw[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][cwu]" value="1"<?php if ($_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['cwu']==1){?> checked<?php }?>><label for="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-cwu-1" class="spaced breaker">kocioł stałopalny</label> <input type="radio" id="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-cwu-2" name="fw[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][cwu]" value="2"<?php if ($_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['cwu']==2){?> checked<?php }?>><label for="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-cwu-2" class="spaced breaker">kocioł gazowy</label> <input type="radio" id="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-cwu-3" name="fw[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][cwu]" value="3"<?php if ($_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['cwu']==3){?> checked<?php }?>><label for="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-cwu-3" class="spaced breaker">pompa ciepła</label></li>
								
									<li class="topic spaced">b) Wymagane do zaprojektowania instalacji:</li>
									<li>- usytuowanie frontu budynku względem kierunków swiata (wymagane do wyboru połaci do obłożenia) <input type="text" class="wide" id="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-orientation" name="fw[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][orientation]" value="<?php echo $_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['orientation'];?>
"></li>
									<li class="spaced">- ustalenie elementów zacieniających takich jak drzewa, inne budynki itp. (wymień jeżeli są takowe). <input type="text" class="wide" id="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-shaders" name="fw[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][shaders]" value="<?php echo $_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['shaders'];?>
"></li>
								</ul>
							
							</div>
						<?php }?>
					</div>
				</li>
				<li class="price off" id="price-extras_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['_extra']->value['package_price']>=0){?><?php echo $_smarty_tpl->tpl_vars['_extra']->value['package_price'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['price'];?>
<?php }?>"><?php if ($_smarty_tpl->tpl_vars['_extra']->value['package_price']>=0){?><?php if ($_smarty_tpl->tpl_vars['_extra']->value['package_price']<$_smarty_tpl->tpl_vars['_extra']->value['extras']['price']){?><span class="oldPrice"><?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['price'];?>
 zł</span> <?php }?><?php echo $_smarty_tpl->tpl_vars['_extra']->value['package_price'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['price'];?>
<?php }?> zł</li>
				<li><input name="cliSelExtras[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
" type="checkbox" data-type="<?php if ($_smarty_tpl->tpl_vars['_extra']->value['extras']['is_group']&&$_smarty_tpl->tpl_vars['_extra']->value['extras']['project_list_id']){?>group<?php }elseif($_smarty_tpl->tpl_vars['_extra']->value['extras']['id']==23){?>group<?php }else{ ?>normal<?php }?>" id="add-extras_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
"><label for="add-extras_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror';?>
"></label></li>
			</ul>
			<?php } ?>
			<?php }?>
		<?php }else{ ?>
			<ul class="item">
				<li>
					<div>
						<img src="<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['mainExtras']->value[$_smarty_tpl->tpl_vars['_basket']->value['eid']]['attachments']['ExtrasImage'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['mainExtras']->value[$_smarty_tpl->tpl_vars['_basket']->value['eid']]['attachments']['ExtrasImage'][0]['filename'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['mainExtras']->value[$_smarty_tpl->tpl_vars['_basket']->value['eid']]['name'];?>
">
					
						<p class="title big"><?php echo $_smarty_tpl->tpl_vars['mainExtras']->value[$_smarty_tpl->tpl_vars['_basket']->value['eid']]['name'];?>
<?php if ($_smarty_tpl->tpl_vars['_basket']->value['epid']){?> dla projektu <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_basket']->value['epid'],'link_title'=>$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['epid']]['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['epid']]['name'];?>
</a><?php }?></p>
						<p><?php echo $_smarty_tpl->tpl_vars['mainExtras']->value[$_smarty_tpl->tpl_vars['_basket']->value['eid']]['description'];?>
</p>
					</div>
				</li>
				<li class="price"><strong><?php echo $_smarty_tpl->tpl_vars['_basket']->value['price'];?>
</strong> zł</li>
				<li><span class="remove" data-extras="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['eid'];?>
"></span></li>
				<?php $_smarty_tpl->tpl_vars['sum'] = new Smarty_variable($_smarty_tpl->tpl_vars['sum']->value+$_smarty_tpl->tpl_vars['_basket']->value['price'], null, 0);?>
			</ul>
		<?php }?>
	<?php } ?>
	<ul class="item">
		<li>
			<div>
				<p class="up">Sposób wysyłki</p>

				<div class="select-wrapper">
					<div class="jui-select-box dark" id="dispatch-box">
						<select name="dispatch_type" id="dispatch-type" data-min-payment="<?php echo $_smarty_tpl->tpl_vars['minPayment']->value;?>
">
							<?php  $_smarty_tpl->tpl_vars['delivery'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['delivery']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['deliveryMethods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['delivery']->key => $_smarty_tpl->tpl_vars['delivery']->value){
$_smarty_tpl->tpl_vars['delivery']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['delivery']->key;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if (!is_array($_smarty_tpl->tpl_vars['deliveryCosts']->value[$_smarty_tpl->tpl_vars['key']->value])){?> data-payment-<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
="<?php echo $_smarty_tpl->tpl_vars['deliveryCosts']->value[$_smarty_tpl->tpl_vars['key']->value];?>
"<?php }else{ ?><?php  $_smarty_tpl->tpl_vars['cost'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cost']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['deliveryCosts']->value[$_smarty_tpl->tpl_vars['key']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cost']->key => $_smarty_tpl->tpl_vars['cost']->value){
$_smarty_tpl->tpl_vars['cost']->_loop = true;
?> data-payment-<?php echo $_smarty_tpl->tpl_vars['cost']->key;?>
="<?php echo $_smarty_tpl->tpl_vars['cost']->value;?>
"<?php } ?><?php }?><?php if ($_smarty_tpl->tpl_vars['dispatchType']->value==$_smarty_tpl->tpl_vars['key']->value){?> selected<?php }?>>
									<?php echo $_smarty_tpl->tpl_vars['delivery']->value;?>

								</option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			
			<div>
				<p class="up">Sposób płatności</p>

				<div class="select-wrapper">
					<div class="jui-select-box dark" id="payment-box">
						<select name="payment_type" id="payment-type">
							<?php  $_smarty_tpl->tpl_vars['method'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['method']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['paymentMethods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['method']->key => $_smarty_tpl->tpl_vars['method']->value){
$_smarty_tpl->tpl_vars['method']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['method']->key;
?>
								<?php if ($_smarty_tpl->tpl_vars['key']->value!='online'||$_smarty_tpl->tpl_vars['allProjectsAvailable']->value){?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['paymentType']->value==$_smarty_tpl->tpl_vars['key']->value){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['method']->value;?>
</option>
								<?php }?>
							<?php } ?>
							
							
								
						</select>
					</div>
				</div>
				
				
			</div>
			
			<div id="transfer-info" style="display: none;">
				<p>Numer konta: PKO BP O/Bielsko-Biała 81 1020 1390 0000 6102 0134 5404</p>
				<p>W tytule przelewu prosimy podać nazwę projektu lub dodatku.</p>
				<p>Zakupione towary zostaną wysłane po zaksięgowaniu wpłaty.</p>
			</div>
		</li>
		<li class="price"><strong id="deliveryPrice">* 0</strong> zł</li>
		<li>&nbsp;</li>
	</ul>
	<input type="hidden" name="deliveryPrice" id="deliveryPriceField" value="0">
	<?php if ($_smarty_tpl->tpl_vars['user']->value&&$_smarty_tpl->tpl_vars['isHouseProjectOnList']->value){?>
		<ul class="item" id="discount-field-100">
			<li>
				<div>
					<p class="up">Rabat za rejestrację</p>
				</div>
			</li>
			<li class="price"><strong>-100</strong> zł</li>
			<li>&nbsp;</li>
			<?php $_smarty_tpl->tpl_vars['sum'] = new Smarty_variable($_smarty_tpl->tpl_vars['sum']->value-100, null, 0);?>
		</ul>
		<input type="hidden" name="registerUserDiscount" id="registerUserDiscount" value="100">
	<?php }?>
	<ul class="item" id="discount-field" style="display: none;">
		<li>
			<div>
				<p class="up"><span id="discount-name"></span></p>
			</div>
		</li>
		<li class="price"><strong>-<span id="discount-value"></strong> zł</li>
		<li>&nbsp;</li>
	</ul>
		
	<div class="discount-box">
		<?php if ($_smarty_tpl->tpl_vars['projectsId']->value){?>
			<input type="hidden" name="projectsId" value="<?php echo implode(",",$_smarty_tpl->tpl_vars['projectsId']->value);?>
" id="projects-id">
			<input type="hidden" name="projectsPercentId" value="<?php echo implode(",",$_smarty_tpl->tpl_vars['projectsPercentId']->value);?>
" id="projects-percent-id">
			<input type="hidden" name="discountCodeHidden" id="discount-code-hidden">
			<p><label for="discount-code">Kod rabatowy</label><input type="text" name="discount_code" id="discount-code"> <span id="check-code">zatwierdź kod</span></p>
			<p id="discount_result" style="display: none;">Trwa weryfikowanie kodu...</p>
		<?php }?>
		<p class="total">Razem <span id="basketTotal"><?php echo $_smarty_tpl->tpl_vars['sum']->value;?>
</span></p>
	</div>
	
	<p style="margin-top: 32px;">* Promocyjna cena wysyłki dotyczy doręczenia tylko na terenie Polski.</p>
			
	<div class="next">
		<input type="hidden" name="total" id="basketTotalInput" value="<?php echo $_smarty_tpl->tpl_vars['sum']->value;?>
">
		<button class="baton" id="sendButton">Dalej</button>
	</div>
	</form>
	</div>
</div>
<div class="overlay">
	<div class="overlay-project-box" id="over-pop">
		<div id="over-img-box">
			<ul id="over-pics">
				<li><span id="over-render" class="selected">Wizualizacja</span></li>
			</ul>
		
			<a href="" target="_blank">
				<img id="over-img" src="/img/dummy.png" alt="Render">
			</a>
		</div>

		<ul id="over-params">
			<li><h6 id="over-name"></h6></li>
			<li class="small"><span id="over-txt"></span></li>
			<li><span id="over-version"></span></li>
			<li id="over-area-wrapper"><p>powierzchnia użytkowa: <span id="over-area"></span> m<sup>2</sup></p></li>
			<li id="over-total-area-wrapper"><p>powierzchnia całkowita: <span id="over-total-area"></span> m</p></li>
			<li id="over-height-wrapper"><p>wysokość: <span id="over-height"></span> m</p></li>
			<li id="over-angle-wrapper"><p>kąt nachylenia dachu: <span id="over-angle"></span></p></li>
			<li id="over-parcel-wrapper"><p>min. wymiary działki: <span id="over-parcel"></span> m</p></li>
			<li id="over-span-height-wrapper"><p>wysokość przęsła: <span id="over-span-height"></span> cm</p></li>
			<li id="over-roof-height-wrapper"><p>wysokość zadaszenia: <span id="over-roofing-height"></span> cm</p></li>
			<li id="over-build-area-wrapper"><p>powierzchnia zabudowy: <span id="over-build-area"></span> m<sup>2</sup></p></li>
			<li id="over-cubature-wrapper"><p>kubatura brutto: <span id="over-cubature"></span> m<sup>3</sup></p></li>
			<li><a href="" class="more" target="_blank">Zobacz szczegóły</a></li>
			<li><span class="select" id="selectorDataPid">Wybierz</span></li>
		</ul>
	</div>
	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div><?php }} ?>