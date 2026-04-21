<?php /* Smarty version Smarty-3.1.11, created on 2024-03-15 11:49:58
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Varia/BuildOffer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1660389905632ae8e27494e9-30919957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be48a98312295d9f984de40afebf55539738736c' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Varia/BuildOffer.tpl',
      1 => 1710503343,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1660389905632ae8e27494e9-30919957',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_632ae8e277ae93_45416460',
  'variables' => 
  array (
    'shuffle' => 0,
    'newHouseList' => 0,
    '_project' => 0,
    'altTitle' => 0,
    'compareIds' => 0,
    'favouriteIds' => 0,
    'apiList' => 0,
    'list' => 0,
    'isSearch' => 0,
    'request' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_632ae8e277ae93_45416460')) {function content_632ae8e277ae93_45416460($_smarty_tpl) {?><div class="list-header activated on">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>
					<span>Oferty Budowy Domów</span>
				</h1>
				<p>Poniżej prezentujemy Państwu listę firm, które oferują Państwu <strong>budowę domu według konkretnego projektu z naszej pracowni</strong>. Wybraliśmy dla Państwa najciekawsze domy z oferty, 
				starając się zaprezentować propozycje budów różnego rodzaju budynków. Znajdziecie tu Państwo zarówno oferty firm specjalizujących się w budowie 
				tradycyjnych murowanych domów, jak i w technologii szkieletu drewnianego. Przycisk "zapytaj o ofertę" przy każdej propozycji przekieruje Państwa na stronę wykonawcy i umożliwi bezpośredni kontakt z daną firmą celem ustalenia szczegółów. Zapraszamy!</p>
			</div>
		</div>
	</div>
</div>

<div class="control-box">
	<ul>
		<li class="path"><a href="/">Studio Atrium</a> &raquo; oferty budowy domów</li>
	</ul>
</div>
<section>
	<div class="box">
		<?php $_smarty_tpl->_capture_stack[0][] = array($_smarty_tpl->tpl_vars['shuffle']->value[0], null, null); ob_start(); ?>
		<div class="companyInfo">
			<a href="https://new-house.com.pl/" target="_blank" rel="nofollow"><img src="/img/company/newHouse.png" alt="New House" class="logo"></a>
			New House to firma posiadająca 25-cio letnie doświadczenie w kompleksowej budowie każdego rodzaju domów jednorodzinnych: parterowych, z poddaszem użytkowym, piętrowych, 
			jak również rezydencji w tradycyjnej oraz nowoczesnej architekturze. Swoją ofertę kieruje do Inwestorów na terenie całej Polski, a działalność opiera na wykwalifikowanych pracownikach, 
			z którymi w większości współpracuje nawet od kilkunastu lat. Stanowią oni fundament firmy i gwarancję dobrze wykonanej pracy. Na realizowane przez New House domy udzielana jest 10-cio letnia gwarancja.
		</div>
		<ul class="detail fav-wrapper">
		<?php  $_smarty_tpl->tpl_vars['_project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newHouseList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_project']->key => $_smarty_tpl->tpl_vars['_project']->value){
$_smarty_tpl->tpl_vars['_project']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['_project']->value['extra_data']['newHouse1']){?>
			<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isGroundFloor'][0][0]->mIsGroundFloor($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?>
				<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu parterowego", null, 0);?>
			<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasLoft'][0][0]->mHasLoft($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?>
				<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu z poddaszem", null, 0);?>
			<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasFloor'][0][0]->mHasFloor($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?>
				<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu piętrowego", null, 0);?>
			<?php }else{ ?>
				<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu", null, 0);?>
			<?php }?>
			<li>
				<ul>
					<li class="render">
						<div>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['_project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
">
								<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['altTitle']->value;?>
 <?php echo strtoupper($_smarty_tpl->tpl_vars['_project']->value['name']);?>
">
							</a>
							<span id="compare-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="compare<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['compareIds']->value)){?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
							<span id="fav-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="fav<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['favouriteIds']->value)){?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
							<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNew'][0][0]->mIsNew($_smarty_tpl->tpl_vars['_project']->value)){?><span class="label">Nowość</span><?php }?>
						</div>
					</li>
					<li class="slide" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
">
						<img id="img-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" data-src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value),$_smarty_tpl);?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list'),$_smarty_tpl);?>
" alt="Rzut parteru projektu <?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
">
					</li>
					<li class="data">
						<h6><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['_project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
</a></h6>
						
						<p><?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
</p>
						<ul>
							<li><?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='skeleton'){?>wersja szkieletowa<?php }else{ ?>wersja murowana<?php }?></li>
							<li>powierzchnia użytkowa: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
</span> m<sup>2</sup></li>
							<li>
								cena projektu: <?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><span class="discount"><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
</span><?php echo $_smarty_tpl->tpl_vars['_project']->value['price']-$_smarty_tpl->tpl_vars['_project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
<?php }?> zł
							</li>
							<li class="line"></li>
							<li><h5>oferta budowy</h5></li>
							<li class="offer">stan surowy + dach: <strong><?php echo number_format($_smarty_tpl->tpl_vars['_project']->value['extra_data']['newHouse1'],"0","."," ");?>
 zł netto*</strong></li>
							<?php if ($_smarty_tpl->tpl_vars['_project']->value['extra_data']['newHouse2']){?><li class="offer">stan deweloperski: <strong><?php echo number_format($_smarty_tpl->tpl_vars['_project']->value['extra_data']['newHouse2'],"0","."," ");?>
 zł netto*</strong></li><?php }?>
							<li>
								<a href="/img/company/newHouse/<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
.pdf" target="_blank" class="button yellow">pobierz szczegóły (PDF)</a>
								<a href="/click.php?rel=jf34fvqjweiffh9q3h4f9h34hf384hfh4f" target="_blank" rel="nofollow" class="button red">zapytaj o ofertę</a>
							</li>	
						</ul>
					</li>
				</ul>
			</li>
		<?php }?>
		<?php } ?>
		</ul>
		<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
		
		<?php $_smarty_tpl->_capture_stack[0][] = array($_smarty_tpl->tpl_vars['shuffle']->value[1], null, null); ob_start(); ?>
		<div class="companyInfo">
			<a href="https://formularz.apissa.pl/Atrium/" target="_blank" rel="nofollow"><img src="/img/company/apis.png" alt="Apis SA" class="logo"></a>
			Przedsiębiorstwo APIS S.A. zajmuje się budową domów według sprawdzonych, tradycyjnych metod z wykorzystaniem najnowocześniejszych technologii. Podczas produkcji oferowanych przez firmę drewnianych 
			domów pod klucz, wykorzystuje się suszone komorowo drewno drzew iglastych. Dzięki temu domy nie tylko wspaniale się prezentują, ale także są odporne na działanie większości negatywnych czynników, 
			w tym grzybów oraz owadów. Oferta przedsiębiorstwa obejmuje budowę zarówno domów w systemie szkieletowym prefabrykowanym, w tym domów kanadyjskich, jak i domów z bala.
		</div>
		<ul class="detail fav-wrapper">
		<?php  $_smarty_tpl->tpl_vars['_project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['apiList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_project']->key => $_smarty_tpl->tpl_vars['_project']->value){
$_smarty_tpl->tpl_vars['_project']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['_project']->value['extra_data']['apis']){?>
			<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isGroundFloor'][0][0]->mIsGroundFloor($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?>
				<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu parterowego", null, 0);?>
			<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasLoft'][0][0]->mHasLoft($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?>
				<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu z poddaszem", null, 0);?>
			<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasFloor'][0][0]->mHasFloor($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?>
				<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu piętrowego", null, 0);?>
			<?php }else{ ?>
				<?php $_smarty_tpl->tpl_vars['altTitle'] = new Smarty_variable("Projekt domu", null, 0);?>
			<?php }?>
			<li>
				<ul>
					<li class="render">
						<div>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['_project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
">
								<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['altTitle']->value;?>
 <?php echo strtoupper($_smarty_tpl->tpl_vars['_project']->value['name']);?>
">
							</a>
							<span id="compare-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="compare<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['compareIds']->value)){?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
							<span id="fav-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="fav<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['favouriteIds']->value)){?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
							<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNew'][0][0]->mIsNew($_smarty_tpl->tpl_vars['_project']->value)){?><span class="label">Nowość</span><?php }?>
						</div>
					</li>
					<li class="slide" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
">
						<img id="img-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" data-src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value),$_smarty_tpl);?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'list'),$_smarty_tpl);?>
" alt="Rzut parteru projektu <?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
">
					</li>
					<li class="data">
						<h6><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['_project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
</a></h6>
						
						<p><?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
</p>
						<ul>
							<li><?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='skeleton'){?>wersja szkieletowa<?php }else{ ?>wersja murowana<?php }?></li>
							<li>powierzchnia użytkowa: <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
</span> m<sup>2</sup></li>
							<li>
								cena projektu: <?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><span class="discount"><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
</span><?php echo $_smarty_tpl->tpl_vars['_project']->value['price']-$_smarty_tpl->tpl_vars['_project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
<?php }?> zł
							</li>
							<li class="line"></li>
							<li><h5>oferta budowy</h5></li>
							<li class="offer">stan deweloperski z fundamentem i instalacjami<br>od <strong><?php echo number_format($_smarty_tpl->tpl_vars['_project']->value['extra_data']['apis'],"0","."," ");?>
 zł netto*</strong></li>
							<li>
								<a href="https://formularz.apissa.pl/Atrium/?projekt=<?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
&link=https://www.studioatrium.pl/<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['_project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
" target="_blank" rel="nofollow" class="button red">zapytaj o bezpłatną ofertę</a>
							</li>	
						</ul>
					</li>
				</ul>
			</li>
		<?php }?>
		<?php } ?>
		</ul>
		<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	
		<?php echo Smarty::$_smarty_vars['capture']['company1'];?>

		<br><p class="line">&nbsp;</p><br>
		<?php echo Smarty::$_smarty_vars['capture']['company2'];?>

		
		<br><p class="line">&nbsp;</p><br>
		<p><strong>* Uwaga! W związku z aktualną dynamiczną sytuacją na rynku budowlanym związaną z ciągłymi zmianami cen materiałów budowlanych oraz usług, podane wyceny mogą ulec zmianie. Staramy się, by firmy uaktualniały je na bieżąco. O szczegóły wybranej oferty zapytaj jednak konsultanta z danej firmy budowlanej.</strong></p>
		<br><p>&nbsp;</p>
	</div>
</section>

	
<?php if ($_smarty_tpl->tpl_vars['list']->value){?>
<?php echo $_smarty_tpl->getSubTemplate ("Include/HowToBuy.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['isSearch']->value&&!$_smarty_tpl->tpl_vars['request']->value['query']){?>
<div id="backToTopOnList"></div>
<?php }?>
<?php }} ?>