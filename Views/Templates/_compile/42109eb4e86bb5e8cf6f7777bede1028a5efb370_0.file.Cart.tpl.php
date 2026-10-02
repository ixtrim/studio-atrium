<?php
/* Smarty version 3.1.48, created on 2026-10-01 22:00:08
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Order/Cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abebbc864a339_51457383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42109eb4e86bb5e8cf6f7777bede1028a5efb370' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Order/Cart.tpl',
      1 => 1790884759,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Include/OrderSteps.tpl' => 1,
  ),
),false)) {
function content_6abebbc864a339_51457383 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="order-2026" class="pb-16">
	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
		<div class="max-w-[1480px] mx-auto px-4 sm:px-8">
			<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
				<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li aria-current="page" class="text-[#6b6b6b]">Koszyk</li>
			</ol>
		</div>
	</nav>

	<div class="max-w-[1480px] mx-auto px-4 sm:px-8 mt-8">
		<div class="bg-[#ececec] px-6 py-5 mb-6">
			<h1 class="text-[26px] md:text-[32px] font-normal text-[#222]">Twój koszyk</h1>
			<p class="text-[14px] text-[#444] mt-2 leading-relaxed max-w-3xl">
				Sprawdź wybrane projekty i dodatki, wybierz sposób wysyłki oraz płatności, a następnie przejdź dalej.
			</p>
		</div>

		<?php $_smarty_tpl->_subTemplateRender("file:Include/OrderSteps.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('orderStep'=>"cart"), 0, false);
?>

		<?php $_smarty_tpl->_assignInScope('sum', 0);?>
		<form action="#" method="post" id="basketForm" class="order-panel mt-8">
			<div id="basketMainContent">
			<?php $_smarty_tpl->_assignInScope('isHouseProjectOnList', false);?>
			<?php $_smarty_tpl->_assignInScope('projectsPercentId', null);?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['basket']->value, '_basket');
$_smarty_tpl->tpl_vars['_basket']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_basket']->value) {
$_smarty_tpl->tpl_vars['_basket']->do_else = false;
?>
				<?php if ($_smarty_tpl->tpl_vars['_basket']->value['pid']) {?>
					<?php $_tmp_array = isset($_smarty_tpl->tpl_vars['projectsId']) ? $_smarty_tpl->tpl_vars['projectsId']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array[$_smarty_tpl->tpl_vars['_basket']->value['pid']] = $_smarty_tpl->tpl_vars['_basket']->value['pid'];
$_smarty_tpl->_assignInScope('projectsId', $_tmp_array);?>
					<?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'] == 'house' || $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'] == 'skeleton') {?>
						<?php $_smarty_tpl->_assignInScope('isHouseProjectOnList', true);?>
						<?php $_tmp_array = isset($_smarty_tpl->tpl_vars['projectsPercentId']) ? $_smarty_tpl->tpl_vars['projectsPercentId']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array[$_smarty_tpl->tpl_vars['_basket']->value['pid']] = $_smarty_tpl->tpl_vars['_basket']->value['pid'];
$_smarty_tpl->_assignInScope('projectsPercentId', $_tmp_array);?>
					<?php } elseif ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'] == 'garage') {?>
						<?php $_tmp_array = isset($_smarty_tpl->tpl_vars['projectsPercentId']) ? $_smarty_tpl->tpl_vars['projectsPercentId']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array[$_smarty_tpl->tpl_vars['_basket']->value['pid']] = $_smarty_tpl->tpl_vars['_basket']->value['pid'];
$_smarty_tpl->_assignInScope('projectsPercentId', $_tmp_array);?>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['_basket']->value['link']) {?>
						<?php $_smarty_tpl->_assignInScope('projectHref', $_smarty_tpl->tpl_vars['_basket']->value['link']);?>
					<?php } else { ?>
						<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'projectHref', null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_basket']->value['pid'],'link_title'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'linkTitle' ][ 0 ], array( $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']] )),'catalog'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'projectCatalog' ][ 0 ], array( $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'] ))),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
					<?php }?>
					<ul class="item order-line order-line--product">
						<li>
							<div class="order-line__body">
								<a href="<?php echo $_smarty_tpl->tpl_vars['projectHref']->value;?>
" class="order-thumb">
									<img class="order-thumb__img" src="<?php if ($_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror') {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']],'mirror'=>1,'size'=>'list'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']],'size'=>'list'),$_smarty_tpl ) );
}?>" alt="<?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['name']) {
echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['name'];
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'projectType' ][ 0 ], array( $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'],false,true ));?>
 <?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['symbol_num'];
}?>" width="476" height="317" loading="lazy" decoding="async" onerror="this.onerror=null;this.src='/img/dummy.png';">
								</a>
								<div class="order-line__copy">
									<div class="order-line__head">
										<div class="order-line__title-wrap">
											<p class="title big" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
">
												<a href="<?php echo $_smarty_tpl->tpl_vars['projectHref']->value;?>
"><?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['name']) {
echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['name'];
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'projectType' ][ 0 ], array( $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'],false,true ));?>
 <?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['symbol_num'];
}
if ($_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror') {?> <small>(odbicie lustrzane)</small><?php } else { ?> <small>(wersja podstawowa)</small><?php }?></a>
											</p>
											<?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'] == 'house' || $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'] == 'skeleton' || $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'] == 'garage' || $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'] == 'outbuilding') {?>
												<?php if ($_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror') {?>
													<a href="javascript:" class="changeVersion" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
" data-version="normal">zmień wersję na podstawową »</a>
												<?php } else { ?>
													<a href="javascript:" class="changeVersion" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
" data-version="mirror">zmień na lustrzane odbicie »</a>
												<?php }?>
											<?php }?>
										</div>
										<p class="order-line__price">
											<?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['discount'] > 0) {?>
												<span class="order-price-old"><?php echo round($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['price'],0);?>
 zł</span>
												<strong><?php echo round(($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['price']-$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['discount']),0);?>
</strong>&nbsp;zł
											<?php } else { ?>
												<strong><?php echo round($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['price'],0);?>
</strong>&nbsp;zł
											<?php }?>
										</p>
									</div>

									<?php if (!call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isAvailable' ][ 0 ], array( $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']] ))) {?>
										<p class="notice">Zamawiasz projekt w fazie koncepcyjnej - zapytaj o termin realizacji.</p>
										<p>Po złożeniu zamówienia nasz pracownik skontaktuje się w sprawie ustalenia terminu. Poprosimy Cię także o wpłatę 30% zadatku - wyślemy mailem fakturę proforma do opłacenia.</p>
									<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isWT2021needful' ][ 0 ], array( $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']] ))) {?>
										<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isWT2021needfulHeat' ][ 0 ], array( $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']] ))) {?>
											<p class="notice">Uwaga! Ze względu na obowiązujące od 01.01.2021 nowe warunki techniczne <strong>WT2021</strong>, konieczna będzie korekta projektu <strong>w zakresie ogrzewania</strong>, dodatkowo wymiary zewnętrzne bryły mogą ulec zmianie do kilkunastu cm. Zapytaj o termin realizacji!</p>
										<?php } else { ?>
											<p class="notice">Uwaga! Ze względu na obowiązujące od 01.01.2021 nowe warunki techniczne <strong>WT2021</strong>, konieczna będzie korekta projektu, przez co wymiary zewnętrzne bryły mogą ulec zmianie do kilkunastu cm. Czas realizacji projektu to około 2 miesiące.</p>
										<?php }?>
									<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isWT2021needfulHeat' ][ 0 ], array( $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']] ))) {?>
										<p class="notice">Uwaga! Ze względu na obowiązujące od 01.01.2021 nowe warunki techniczne <strong>WT2021</strong>, konieczna będzie korekta projektu <strong>w zakresie ogrzewania</strong>. Zapytaj o termin realizacji!</p>
									<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isReady7days' ][ 0 ], array( $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']] ))) {?>
										<p class="notice">Dostępność projektu: <strong>7-14 dni</strong>.</p>
									<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isReady14days' ][ 0 ], array( $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']] ))) {?>
										<p class="notice">Dostępność projektu: <strong>7-14 dni</strong>.</p>
									<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isNarrowGarage' ][ 0 ], array( $_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']] ))) {?>
										<p class="notice">Uwaga! W związku ze zmianą przepisów, projekt wymaga korekty szerokości garażu - zapytaj o termin realizacji.</p>
									<?php }?>

									<?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'] == 'fence') {?>
										<p>Komplet składa się z <strong>dwóch</strong> egzemplarzy projektu architektoniczno-budowlanego.</p>
									<?php } elseif ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'] == 'arbor') {?>
										<p>Komplet składa się z <strong>trzech</strong> egzemplarzy projektu architektoniczno-budowlanego.</p>
									<?php } elseif ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'] != 'tank' || $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'] != 'carport') {?>
										<p>Zawartość dokumentacji projektowej:
										<br>- <strong>3 egzemplarze</strong> projektu architektoniczno-budowlanego,
										<?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'] == 'garage') {?><br>- <strong>3 egzemplarze</strong> projektu technicznego (konstrukcja oraz instalacja elektryczna).<?php } elseif ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'] != 'carport' && $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['type'] != 'tank') {?><br>- <strong>3 egzemplarze</strong> projektu technicznego (konstukcja, charakt. energetyczna oraz instalacje).<?php }?></p>
									<?php }?>
								</div>
							</div>
						</li>
						<li>
							<span class="remove" data-project="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
" data-version="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'];?>
" title="Usuń z koszyka" aria-label="Usuń z koszyka"></span>
						</li>
						<?php if ($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['discount'] > 0) {?>
							<?php $_smarty_tpl->_assignInScope('sum', $_smarty_tpl->tpl_vars['sum']->value+($_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['price']-$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['discount']));?>
						<?php } else { ?>
							<?php $_smarty_tpl->_assignInScope('sum', $_smarty_tpl->tpl_vars['sum']->value+$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['price']);?>
						<?php }?>
					</ul>

					<?php if ($_smarty_tpl->tpl_vars['extras']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]) {?>
					<ul class="sub-item pointer">
						<li><p class="header">Dodatki do projektu</p></li>
						<li class="price">&nbsp;</li>
						<li>&nbsp;</li>
					</ul>

					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['extras']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']], '_extra');
$_smarty_tpl->tpl_vars['_extra']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_extra']->value) {
$_smarty_tpl->tpl_vars['_extra']->do_else = false;
?>
					<ul class="sub-item">
						<li>
							<div<?php if ($_smarty_tpl->tpl_vars['_extra']->value['extras']['id'] == 23) {?> id="fotowoltaika"<?php }?> class="order-line__body order-line__body--extra">
								<img src="<?php if ($_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['filename']) {
echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['filename'];
} else { ?>/img/dummy.png<?php }?>" alt="<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['name'];?>
" width="150" height="100" loading="lazy" class="order-thumb--sm" onerror="this.onerror=null;this.src='/img/dummy.png';">
								<div class="order-line__copy">
									<p class="title"><?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['name'];?>
</p>
									<p><?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['description'];?>
</p>
									<?php if ($_smarty_tpl->tpl_vars['_extra']->value['extras']['is_group'] && $_smarty_tpl->tpl_vars['_extra']->value['extras']['project_list_id']) {?>
										<?php $_smarty_tpl->_assignInScope('group', explode(",",$_smarty_tpl->tpl_vars['_extra']->value['extras']['project_list_id']));?>
										<?php $_smarty_tpl->_assignInScope('firstArray', array_values($_smarty_tpl->tpl_vars['group']->value));?>
										<?php $_smarty_tpl->_assignInScope('first', $_smarty_tpl->tpl_vars['firstArray']->value[0]);?>
										<input name="extras4project[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
]" id="selector_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['first']->value;?>
">
										<div id="selector-extras_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
" class="selectorExtrasWrapper">
											<p class="subtitle">Wybierz z listy:</p>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['group']->value, 'proId', false, NULL, 'group', array (
));
$_smarty_tpl->tpl_vars['proId']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['proId']->value) {
$_smarty_tpl->tpl_vars['proId']->do_else = false;
?>
												<?php if ($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'] == 'garage') {?>
													<span class="overview" id="overview_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
_<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-img="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'presentation'),$_smarty_tpl ) );?>
" data-link="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['proId']->value,'link_title'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'linkTitle' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value] )),'catalog'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'projectCatalog' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'] ))),$_smarty_tpl ) );?>
" data-name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'projectType' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'],false,true ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'linkTitle' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value] ));?>
" data-area="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'usableArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-total-area="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'totalArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-height="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'garageHeight' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-angle="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'roofAngle' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['short_description'];?>
">
														<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'list'),$_smarty_tpl ) );?>
"<?php if ($_smarty_tpl->tpl_vars['first']->value == $_smarty_tpl->tpl_vars['proId']->value) {?> class="selected"<?php }?> width="100" height="67" loading="lazy" onerror="this.onerror=null;this.src='/img/dummy.png';">
													</span>
												<?php } elseif ($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'] == 'house' || $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'] == 'skeleton') {?>
													<span class="overview" id="overview_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
_<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-img="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'presentation'),$_smarty_tpl ) );?>
" data-link="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['proId']->value,'link_title'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'linkTitle' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value] )),'catalog'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'projectCatalog' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'] ))),$_smarty_tpl ) );?>
" data-name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'linkTitle' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value] ));?>
" data-area="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'usableArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-total-area="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'totalArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-parcel="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'parcelWidth' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
 x <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'parcelHeight' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-height="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'houseHeight' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-angle="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'roofAngle' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-version="<?php if ($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'] == 'skeleton') {?>wersja szkieletowa<?php } else { ?>wersja murowana<?php }?>" data-txt="<?php echo $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['short_description'];?>
">
														<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'list'),$_smarty_tpl ) );?>
"<?php if ($_smarty_tpl->tpl_vars['first']->value == $_smarty_tpl->tpl_vars['proId']->value) {?> class="selected"<?php }?> width="100" height="67" loading="lazy" onerror="this.onerror=null;this.src='/img/dummy.png';">
													</span>
												<?php } elseif ($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'] == 'fence') {?>
													<span class="overview" id="overview_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
_<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-img="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'presentation'),$_smarty_tpl ) );?>
" data-link="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['proId']->value,'link_title'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'linkTitle' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value] )),'catalog'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'projectCatalog' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'] ))),$_smarty_tpl ) );?>
" data-name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'projectType' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'],false,true ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'linkTitle' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value] ));?>
" data-span="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'fenceSpanHeight' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-roofing="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'fenceRoofHeight' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['short_description'];?>
">
														<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'list'),$_smarty_tpl ) );?>
"<?php if ($_smarty_tpl->tpl_vars['first']->value == $_smarty_tpl->tpl_vars['proId']->value) {?> class="selected"<?php }?> width="100" height="67" loading="lazy" onerror="this.onerror=null;this.src='/img/dummy.png';">
													</span>
												<?php } elseif ($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'] == 'arbor') {?>
													<span class="overview" id="overview_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
_<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-img="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'presentation'),$_smarty_tpl ) );?>
" data-link="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['proId']->value,'link_title'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'linkTitle' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value] )),'catalog'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'projectCatalog' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'] ))),$_smarty_tpl ) );?>
" data-name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'projectType' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'],false,true ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'linkTitle' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value] ));?>
" data-area="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'usableArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-total-area="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'totalArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-height="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'arborHeight' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-angle="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'roofAngle' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['short_description'];?>
">
														<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'list'),$_smarty_tpl ) );?>
"<?php if ($_smarty_tpl->tpl_vars['first']->value == $_smarty_tpl->tpl_vars['proId']->value) {?> class="selected"<?php }?> width="100" height="67" loading="lazy" onerror="this.onerror=null;this.src='/img/dummy.png';">
													</span>
												<?php } elseif ($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'] == 'carport') {?>
													<span class="overview" id="overview_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
_<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-img="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'presentation'),$_smarty_tpl ) );?>
" data-link="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['proId']->value,'link_title'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'linkTitle' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value] )),'catalog'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'projectCatalog' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'] ))),$_smarty_tpl ) );?>
" data-name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'projectType' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'],false,true ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'linkTitle' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value] ));?>
" data-area="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'usableArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-total-area="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'totalArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-height="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'carportHeight' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-angle="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'roofAngle' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['short_description'];?>
">
														<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'list'),$_smarty_tpl ) );?>
"<?php if ($_smarty_tpl->tpl_vars['first']->value == $_smarty_tpl->tpl_vars['proId']->value) {?> class="selected"<?php }?> width="100" height="67" loading="lazy" onerror="this.onerror=null;this.src='/img/dummy.png';">
													</span>
												<?php } elseif ($_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'] == 'tank') {?>
													<span class="overview" id="overview_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
_<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-pid="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['proId']->value;?>
" data-img="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'presentation'),$_smarty_tpl ) );?>
" data-link="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['proId']->value,'link_title'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'linkTitle' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value] )),'catalog'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'projectCatalog' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'] ))),$_smarty_tpl ) );?>
" data-name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'projectType' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['type'],false,true ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'linkTitle' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value] ));?>
" data-build-area="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'buildArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-cubature="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'cubature' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['params_general'] ));?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value]['short_description'];?>
">
														<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['projectsForExtras']->value[$_smarty_tpl->tpl_vars['proId']->value],'size'=>'list'),$_smarty_tpl ) );?>
"<?php if ($_smarty_tpl->tpl_vars['first']->value == $_smarty_tpl->tpl_vars['proId']->value) {?> class="selected"<?php }?> width="100" height="67" loading="lazy" onerror="this.onerror=null;this.src='/img/dummy.png';">
													</span>
												<?php }?>
											<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										</div>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['_extra']->value['extras']['id'] == 23) {?>
										<div id="selector-extras_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
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
][co]" value="1"<?php if ($_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['co'] == 1) {?> checked<?php }?>><label for="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-co-1" class="spaced breaker">kocioł stałopalny</label> <input type="radio" id="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-co-2" name="fw[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][co]" value="2"<?php if ($_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['co'] == 2) {?> checked<?php }?>><label for="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-co-2" class="spaced breaker">kocioł gazowy</label> <input type="radio" id="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-co-3" name="fw[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][co]" value="3"<?php if ($_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['co'] == 3) {?> checked<?php }?>><label for="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-co-3" class="spaced breaker">pompa ciepła</label></li>
												<li class="spaced">- jakie ogrzewanie CWU będzie zastosowane (kocioł stałopalny, gazowy, pompa ciepła)</li>
												<li> <input type="radio" id="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-cwu-1" name="fw[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][cwu]" value="1"<?php if ($_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['cwu'] == 1) {?> checked<?php }?>><label for="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-cwu-1" class="spaced breaker">kocioł stałopalny</label> <input type="radio" id="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-cwu-2" name="fw[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][cwu]" value="2"<?php if ($_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['cwu'] == 2) {?> checked<?php }?>><label for="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-cwu-2" class="spaced breaker">kocioł gazowy</label> <input type="radio" id="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
-cwu-3" name="fw[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][cwu]" value="3"<?php if ($_smarty_tpl->tpl_vars['fw']->value[$_smarty_tpl->tpl_vars['_basket']->value['pid']]['cwu'] == 3) {?> checked<?php }?>><label for="fw-<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
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
							</div>
						</li>
						<li class="price off" id="price-extras_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['_extra']->value['package_price'] >= 0) {
echo $_smarty_tpl->tpl_vars['_extra']->value['package_price'];
} else {
echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['price'];
}?>"><?php if ($_smarty_tpl->tpl_vars['_extra']->value['package_price'] >= 0) {
if ($_smarty_tpl->tpl_vars['_extra']->value['package_price'] < $_smarty_tpl->tpl_vars['_extra']->value['extras']['price']) {?><span class="oldPrice"><?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['price'];?>
 zł</span> <?php }
echo $_smarty_tpl->tpl_vars['_extra']->value['package_price'];
} else {
echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['price'];
}?> zł</li>
						<li>
							<input name="cliSelExtras[<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
][<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
" type="checkbox" data-type="<?php if ($_smarty_tpl->tpl_vars['_extra']->value['extras']['is_group'] && $_smarty_tpl->tpl_vars['_extra']->value['extras']['project_list_id']) {?>group<?php } elseif ($_smarty_tpl->tpl_vars['_extra']->value['extras']['id'] == 23) {?>group<?php } else { ?>normal<?php }?>" id="add-extras_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
">
							<label for="add-extras_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
_<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror';?>
"></label>
						</li>
					</ul>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php }?>
				<?php } else { ?>
					<ul class="item order-line order-line--product">
						<li>
							<div class="order-line__body">
								<img src="<?php if ($_smarty_tpl->tpl_vars['mainExtras']->value[$_smarty_tpl->tpl_vars['_basket']->value['eid']]['attachments']['ExtrasImage'][0]['filename']) {
echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['mainExtras']->value[$_smarty_tpl->tpl_vars['_basket']->value['eid']]['attachments']['ExtrasImage'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['mainExtras']->value[$_smarty_tpl->tpl_vars['_basket']->value['eid']]['attachments']['ExtrasImage'][0]['filename'];
} else { ?>/img/dummy.png<?php }?>" alt="<?php echo $_smarty_tpl->tpl_vars['mainExtras']->value[$_smarty_tpl->tpl_vars['_basket']->value['eid']]['name'];?>
" width="300" height="200" loading="lazy" decoding="async" class="order-thumb order-thumb__img" onerror="this.onerror=null;this.src='/img/dummy.png';">
								<div class="order-line__copy">
									<div class="order-line__head">
										<p class="title big"><?php echo $_smarty_tpl->tpl_vars['mainExtras']->value[$_smarty_tpl->tpl_vars['_basket']->value['eid']]['name'];
if ($_smarty_tpl->tpl_vars['_basket']->value['epid']) {?> dla projektu <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_basket']->value['epid'],'link_title'=>$_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['epid']]['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
"><?php echo $_smarty_tpl->tpl_vars['projects']->value[$_smarty_tpl->tpl_vars['_basket']->value['epid']]['name'];?>
</a><?php }?></p>
										<p class="order-line__price"><strong><?php echo $_smarty_tpl->tpl_vars['_basket']->value['price'];?>
</strong>&nbsp;zł</p>
									</div>
									<p><?php echo $_smarty_tpl->tpl_vars['mainExtras']->value[$_smarty_tpl->tpl_vars['_basket']->value['eid']]['description'];?>
</p>
								</div>
							</div>
						</li>
						<li><span class="remove" data-extras="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['eid'];?>
" title="Usuń z koszyka" aria-label="Usuń z koszyka"></span></li>
						<?php $_smarty_tpl->_assignInScope('sum', $_smarty_tpl->tpl_vars['sum']->value+$_smarty_tpl->tpl_vars['_basket']->value['price']);?>
					</ul>
				<?php }?>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

			<ul class="item order-line order-line--meta">
				<li>
					<div class="order-meta-grid">
						<div class="order-field">
							<p class="up" id="dispatch-label">Sposób wysyłki</p>
							<div class="order-radios" role="radiogroup" aria-labelledby="dispatch-label" data-select="#dispatch-type">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['deliveryMethods']->value, 'delivery', false, 'key');
$_smarty_tpl->tpl_vars['delivery']->index = -1;
$_smarty_tpl->tpl_vars['delivery']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['delivery']->value) {
$_smarty_tpl->tpl_vars['delivery']->do_else = false;
$_smarty_tpl->tpl_vars['delivery']->index++;
$_smarty_tpl->tpl_vars['delivery']->first = !$_smarty_tpl->tpl_vars['delivery']->index;
$__foreach_delivery_3_saved = $_smarty_tpl->tpl_vars['delivery'];
?>
									<label class="order-radio<?php if (($_smarty_tpl->tpl_vars['dispatchType']->value && $_smarty_tpl->tpl_vars['dispatchType']->value == $_smarty_tpl->tpl_vars['key']->value) || (!$_smarty_tpl->tpl_vars['dispatchType']->value && $_smarty_tpl->tpl_vars['delivery']->first)) {?> is-checked<?php }?>">
										<input type="radio" name="dispatch_type_ui" value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if (($_smarty_tpl->tpl_vars['dispatchType']->value && $_smarty_tpl->tpl_vars['dispatchType']->value == $_smarty_tpl->tpl_vars['key']->value) || (!$_smarty_tpl->tpl_vars['dispatchType']->value && $_smarty_tpl->tpl_vars['delivery']->first)) {?> checked<?php }?>>
										<span class="order-radio__control" aria-hidden="true"></span>
										<span class="order-radio__label"><?php echo $_smarty_tpl->tpl_vars['delivery']->value;?>
</span>
									</label>
								<?php
$_smarty_tpl->tpl_vars['delivery'] = $__foreach_delivery_3_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</div>
							<div class="select-wrapper order-select-native" id="dispatch-box">
								<select name="dispatch_type" id="dispatch-type" data-min-payment="<?php echo $_smarty_tpl->tpl_vars['minPayment']->value;?>
" tabindex="-1" aria-hidden="true">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['deliveryMethods']->value, 'delivery', false, 'key');
$_smarty_tpl->tpl_vars['delivery']->index = -1;
$_smarty_tpl->tpl_vars['delivery']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['delivery']->value) {
$_smarty_tpl->tpl_vars['delivery']->do_else = false;
$_smarty_tpl->tpl_vars['delivery']->index++;
$_smarty_tpl->tpl_vars['delivery']->first = !$_smarty_tpl->tpl_vars['delivery']->index;
$__foreach_delivery_4_saved = $_smarty_tpl->tpl_vars['delivery'];
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if (!is_array($_smarty_tpl->tpl_vars['deliveryCosts']->value[$_smarty_tpl->tpl_vars['key']->value])) {?> data-payment-<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
="<?php echo $_smarty_tpl->tpl_vars['deliveryCosts']->value[$_smarty_tpl->tpl_vars['key']->value];?>
"<?php } else {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['deliveryCosts']->value[$_smarty_tpl->tpl_vars['key']->value], 'cost');
$_smarty_tpl->tpl_vars['cost']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cost']->key => $_smarty_tpl->tpl_vars['cost']->value) {
$_smarty_tpl->tpl_vars['cost']->do_else = false;
$__foreach_cost_5_saved = $_smarty_tpl->tpl_vars['cost'];
?> data-payment-<?php echo $_smarty_tpl->tpl_vars['cost']->key;?>
="<?php echo $_smarty_tpl->tpl_vars['cost']->value;?>
"<?php
$_smarty_tpl->tpl_vars['cost'] = $__foreach_cost_5_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
if ($_smarty_tpl->tpl_vars['dispatchType']->value == $_smarty_tpl->tpl_vars['key']->value) {?> selected<?php }?>>
											<?php echo $_smarty_tpl->tpl_vars['delivery']->value;?>

										</option>
									<?php
$_smarty_tpl->tpl_vars['delivery'] = $__foreach_delivery_4_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</select>
							</div>
						</div>
						<div class="order-field">
							<p class="up" id="payment-label">Sposób płatności</p>
							<div class="order-radios" role="radiogroup" aria-labelledby="payment-label" data-select="#payment-type">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['paymentMethods']->value, 'method', false, 'key');
$_smarty_tpl->tpl_vars['method']->index = -1;
$_smarty_tpl->tpl_vars['method']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['method']->value) {
$_smarty_tpl->tpl_vars['method']->do_else = false;
$_smarty_tpl->tpl_vars['method']->index++;
$_smarty_tpl->tpl_vars['method']->first = !$_smarty_tpl->tpl_vars['method']->index;
$__foreach_method_6_saved = $_smarty_tpl->tpl_vars['method'];
?>
									<?php if ($_smarty_tpl->tpl_vars['key']->value != 'online' || $_smarty_tpl->tpl_vars['allProjectsAvailable']->value) {?>
									<label class="order-radio<?php if (($_smarty_tpl->tpl_vars['paymentType']->value && $_smarty_tpl->tpl_vars['paymentType']->value == $_smarty_tpl->tpl_vars['key']->value) || (!$_smarty_tpl->tpl_vars['paymentType']->value && $_smarty_tpl->tpl_vars['method']->first)) {?> is-checked<?php }?>">
										<input type="radio" name="payment_type_ui" value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if (($_smarty_tpl->tpl_vars['paymentType']->value && $_smarty_tpl->tpl_vars['paymentType']->value == $_smarty_tpl->tpl_vars['key']->value) || (!$_smarty_tpl->tpl_vars['paymentType']->value && $_smarty_tpl->tpl_vars['method']->first)) {?> checked<?php }?>>
										<span class="order-radio__control" aria-hidden="true"></span>
										<span class="order-radio__label"><?php echo $_smarty_tpl->tpl_vars['method']->value;?>
</span>
									</label>
									<?php }?>
								<?php
$_smarty_tpl->tpl_vars['method'] = $__foreach_method_6_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</div>
							<div class="select-wrapper order-select-native" id="payment-box">
								<select name="payment_type" id="payment-type" tabindex="-1" aria-hidden="true">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['paymentMethods']->value, 'method', false, 'key');
$_smarty_tpl->tpl_vars['method']->index = -1;
$_smarty_tpl->tpl_vars['method']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['method']->value) {
$_smarty_tpl->tpl_vars['method']->do_else = false;
$_smarty_tpl->tpl_vars['method']->index++;
$_smarty_tpl->tpl_vars['method']->first = !$_smarty_tpl->tpl_vars['method']->index;
$__foreach_method_7_saved = $_smarty_tpl->tpl_vars['method'];
?>
										<?php if ($_smarty_tpl->tpl_vars['key']->value != 'online' || $_smarty_tpl->tpl_vars['allProjectsAvailable']->value) {?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['paymentType']->value == $_smarty_tpl->tpl_vars['key']->value) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['method']->value;?>
</option>
										<?php }?>
									<?php
$_smarty_tpl->tpl_vars['method'] = $__foreach_method_7_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</select>
							</div>
						</div>
						<div id="transfer-info" class="order-transfer" style="display: none;">
							<p>Numer konta: PKO BP O/Bielsko-Biała 81 1020 1390 0000 6102 0134 5404</p>
							<p>W tytule przelewu prosimy podać nazwę projektu lub dodatku.</p>
							<p>Zakupione towary zostaną wysłane po zaksięgowaniu wpłaty.</p>
						</div>
					</div>
				</li>
				<li class="price"><strong id="deliveryPrice">* 0</strong>&nbsp;zł</li>
				<li>&nbsp;</li>
			</ul>
			<input type="hidden" name="deliveryPrice" id="deliveryPriceField" value="0">

			<?php if ($_smarty_tpl->tpl_vars['user']->value && $_smarty_tpl->tpl_vars['isHouseProjectOnList']->value) {?>
				<ul class="item order-line order-line--meta" id="discount-field-100">
					<li><div><p class="up">Rabat za rejestrację</p></div></li>
					<li class="price"><strong>-100</strong> zł</li>
					<li>&nbsp;</li>
					<?php $_smarty_tpl->_assignInScope('sum', $_smarty_tpl->tpl_vars['sum']->value-100);?>
				</ul>
				<input type="hidden" name="registerUserDiscount" id="registerUserDiscount" value="100">
			<?php }?>

			<ul class="item order-line order-line--meta" id="discount-field" style="display: none;">
				<li><div><p class="up"><span id="discount-name"></span></p></div></li>
				<li class="price"><strong>-<span id="discount-value"></span></strong> zł</li>
				<li>&nbsp;</li>
			</ul>

			<div class="discount-box order-footer">
				<?php if ($_smarty_tpl->tpl_vars['projectsId']->value) {?>
					<input type="hidden" name="projectsId" value="<?php echo implode(",",$_smarty_tpl->tpl_vars['projectsId']->value);?>
" id="projects-id">
					<input type="hidden" name="projectsPercentId" value="<?php echo implode(",",$_smarty_tpl->tpl_vars['projectsPercentId']->value);?>
" id="projects-percent-id">
					<input type="hidden" name="discountCodeHidden" id="discount-code-hidden">
					<div class="order-discount-code">
						<label for="discount-code">Kod rabatowy</label>
						<div class="order-discount-row">
							<input type="text" name="discount_code" id="discount-code" autocomplete="off" maxlength="64" spellcheck="false" aria-describedby="discount_result" aria-invalid="false">
							<button type="button" id="check-code" class="order-discount-btn">Zatwierdź kod</button>
						</div>
						<p id="discount_result" class="order-discount-msg" style="display: none;" role="status" aria-live="polite"></p>
					</div>
				<?php }?>
				<p class="total">Razem <span id="basketTotal"><?php echo $_smarty_tpl->tpl_vars['sum']->value;?>
</span></p>
			</div>

			<p class="order-note">* Promocyjna cena wysyłki dotyczy doręczenia tylko na terenie Polski.</p>

			<div class="next">
				<input type="hidden" name="total" id="basketTotalInput" value="<?php echo $_smarty_tpl->tpl_vars['sum']->value;?>
">
				<button class="baton" id="sendButton" type="submit">Dalej</button>
			</div>
			</div>
		</form>
	</div>

	<div class="overlay">
		<div class="overlay-project-box" id="over-pop">
			<div id="over-img-box">
				<ul id="over-pics">
					<li><span id="over-render" class="selected">Wizualizacja</span></li>
				</ul>
				<a href="" target="_blank">
					<img id="over-img" src="/img/dummy.png" alt="Render" width="640" height="427">
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
	</div>
</div>
<?php }
}
