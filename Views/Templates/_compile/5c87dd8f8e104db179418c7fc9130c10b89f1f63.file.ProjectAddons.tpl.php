<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 08:55:30
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/ProjectExtend/ProjectAddons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153454117562b03602684578-90155657%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c87dd8f8e104db179418c7fc9130c10b89f1f63' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/ProjectExtend/ProjectAddons.tpl',
      1 => 1607418639,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153454117562b03602684578-90155657',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'project' => 0,
    'extras' => 0,
    '_extra' => 0,
    'stockPath' => 0,
    'isVacuum' => 0,
    'isPhotovolt' => 0,
    'projectParams' => 0,
    'extras_normal' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b036026b9445_71886444',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b036026b9445_71886444')) {function content_62b036026b9445_71886444($_smarty_tpl) {?><div class="wrapper addons" id="addonsContent">
	<p><strong>Darmowe dodatki przy zakupie projektu <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
</strong></p>
	<p>Warto kupować u żródła! Do każdego zakupionego projektu domu dodajemy atrakcyjny pakiet dodatków. Znajdą w nim Państwo projekty idealnie uzupełniające otoczenie domu, przydatne dodatki dla rozpoczynających proces budowlany.</p>

	<ul class="ajax-addons">
	<?php  $_smarty_tpl->tpl_vars['_extra'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_extra']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['extras']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_extra']->key => $_smarty_tpl->tpl_vars['_extra']->value){
$_smarty_tpl->tpl_vars['_extra']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['_extra']->value['package_price']==0){?>
		<li>
			<img src="<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['filename'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['name'];?>
">
		</li>
			<?php if ($_smarty_tpl->tpl_vars['_extra']->value['extras']['id']==19){?>
				<?php $_smarty_tpl->tpl_vars['isVacuum'] = new Smarty_variable(1, null, 0);?>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['_extra']->value['extras']['id']==22){?>
				<?php $_smarty_tpl->tpl_vars['isPhotovolt'] = new Smarty_variable(1, null, 0);?>
			<?php }?>
		<?php }?>
	<?php } ?>
	</ul>
	
	<p>W pakiecie dodatków otrzymują Państwo:</p>
	
	<ul class="dotted">
		<li><a href="/projekty/osadniki/">projekt osadnika</a> o wartości <strong>250 zł</strong></li>
		<li><a href="/projekty/altany">projekt altany ogrodowej</a> o wartości <strong>350 zł</strong></li>
		<li><a href="/projekty/ogrodzenia/">projekt ogrodzenia</a> o wartości <strong>320 zł</strong></li>
		<li>tablicę budowy o wartości <strong>35 zł</strong></li>
		<li>dziennik budowy o wartości <strong>20 zł</strong></li>
		<li>darmową wysyłkę o wartości <strong>25 zł</strong></li>
		<li>zgodę na zmiany</li>
		<li>charakterystykę energetyczną</li>
		<li>zestawienie materiałów</li>
		<li>rzut w skali 1:500 do zagospodarowania działki</li>
		<li><a href="/artykuly/Schematy-elementow-ogrodu-wsrod-gratisow-do-projektow-domow,1441.html" class="external">schematy rabatek ogrodowych</a></li>
		<?php if ($_smarty_tpl->tpl_vars['isVacuum']->value==1){?>
			<li><a href="/artykuly/Schematy-centralnego-odkurzacza-w-projektach-domow-studia-atrium,1439.html" class="external">schemat centralnego odkurzacza</a> wart <strong>100 zł</strong></li>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['isPhotovolt']->value==1){?>
			<li><a href="/artykuly/Projekty-instalacji-fotowoltaicznej-w-projektach-domow-studia-atrium,1449.html" class="external">projekt instalacji fotowoltaicznej</a> wart <strong>300 zł</strong></li>
		<?php }?>
	</ul>
	
	<?php if ($_smarty_tpl->tpl_vars['isVacuum']->value==1&&$_smarty_tpl->tpl_vars['isPhotovolt']->value==1){?><p>o łącznej wartości 1400 zł.</p><?php }elseif($_smarty_tpl->tpl_vars['isPhotovolt']->value==1){?><p>o łącznej wartości 1300 zł.</p><?php }elseif($_smarty_tpl->tpl_vars['isVacuum']->value==1){?><p>o łącznej wartości 1100 zł.</p><?php }else{ ?><p>o łącznej wartości 1000 zł.</p><?php }?>

	<?php  $_smarty_tpl->tpl_vars['_extra'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_extra']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['extras']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_extra']->key => $_smarty_tpl->tpl_vars['_extra']->value){
$_smarty_tpl->tpl_vars['_extra']->_loop = true;
?>
		<?php if (strpos($_smarty_tpl->tpl_vars['_extra']->value['extras']['name'],'garaż')!==false){?>
		<div class="cleared">
			<img src="<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['filename'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['name'];?>
">
			<p>PROMOCJA DODATKOWA: GARAŻ ZA <strong><?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['price'];?>
zł</strong>!</p>
			<p>Uruchomiliśmy specjalną propozycję dla Inwestorów, którzy oprócz budowy swojego nowego domu, przymierzają się do wybudowania teraz lub w przyszłości także niezależnego, dodatkowego garażu wolnostojącego. Kupując w naszej pracowni dowolny projekt domu otrzymacie Państwo możliwość zakupu wybranego projektu garażu wolnostojącego w promocyjnej cenie <?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['price'];?>
zł!</p>
		</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['_extra']->value['id']==26){?>
		<div class="cleared">
			<img src="<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['filename'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['name'];?>
">
			<p>PROMOCJA DODATKOWA: REKUPERACJA ZA <strong><?php echo $_smarty_tpl->tpl_vars['_extra']->value['package_price'];?>
</strong>zł!</p>
			<p>Kolejna ciekawa propozycja dla Inwestorów, którzy chcieliby w swoim nowym domu wykonać instalację rekuperacji. Teraz przy zakupie projektu domu <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
 w naszej pracowni, istnieje możliwość zamówienia schematu rekuperacji do tego projektu w promocyjnej cenie <?php echo $_smarty_tpl->tpl_vars['_extra']->value['package_price'];?>
zł!</p>
		</div>
		<?php }?>
	<?php } ?>
	<p class="notice">Uwaga! Wybór darmowych dodatków i/lub skorzystanie z promocji dodatkowych, dotyczy tylko bezpośrednich zamówień zrealizowanych za pośrednictwem strony internetowej oraz zamówień telefonicznych. Dodatki otrzymują tylko klienci indywidualni. Zapraszamy!</p>
	<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isAvailable'][0][0]->mIsAvailable($_smarty_tpl->tpl_vars['projectParams']->value)){?>
		<p class="spaced"><strong>Płatne dodatki do projektu <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
</strong></p>
	
		<?php  $_smarty_tpl->tpl_vars['_extra'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_extra']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['extras_normal']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_extra']->key => $_smarty_tpl->tpl_vars['_extra']->value){
$_smarty_tpl->tpl_vars['_extra']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['_extra']->value['package_price']!=0&&strpos($_smarty_tpl->tpl_vars['_extra']->value['extras']['name'],'garaż')===false){?>
			<div class="cleared">
				<img src="<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['filename'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['name'];?>
">
				<p>
					<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['description'];?>

				</p>
				<p class="price">
					<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['price'];?>
 zł
					<button class="order<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['extrasInBasket'][0][0]->mExtrasInBasket($_smarty_tpl->tpl_vars['_extra']->value['extras'],$_smarty_tpl->tpl_vars['project']->value['id'])){?> disabled<?php }?>"<?php if (!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['extrasInBasket'][0][0]->mExtrasInBasket($_smarty_tpl->tpl_vars['_extra']->value['extras'],$_smarty_tpl->tpl_vars['project']->value['id'])){?> data-epid="<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
" data-thumb="<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['filename'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['name'];?>
" data-extras="<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['_extra']->value['package_price']>0){?><?php echo $_smarty_tpl->tpl_vars['_extra']->value['package_price'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['price'];?>
<?php }?>"<?php }?>><?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['extrasInBasket'][0][0]->mExtrasInBasket($_smarty_tpl->tpl_vars['_extra']->value['extras'],$_smarty_tpl->tpl_vars['project']->value['id'])){?>W koszyku<?php }else{ ?>Do koszyka<?php }?></button>
				</p>
			</div>
			<?php }?>
		<?php } ?>
	<?php }?>	
</div><?php }} ?>