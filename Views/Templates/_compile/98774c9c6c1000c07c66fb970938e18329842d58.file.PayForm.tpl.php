<?php /* Smarty version Smarty-3.1.11, created on 2022-06-23 13:26:46
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Catalog/PayForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:164298911162b46a16785a44-82334883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98774c9c6c1000c07c66fb970938e18329842d58' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Catalog/PayForm.tpl',
      1 => 1509091786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164298911162b46a16785a44-82334883',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'isPayAvailable' => 0,
    'description' => 0,
    'staticDocs' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b46a16aa7bd8_25920515',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b46a16aa7bd8_25920515')) {function content_62b46a16aa7bd8_25920515($_smarty_tpl) {?><div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Płatny katalog domów</h1>
			</div>
		</div>
	</div>
</div>


<div class="options">
	<div class="box">
		<ul>
			<li><div><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'catalog','action'=>'form'),$_smarty_tpl);?>
"><span class="free">Bezpłatny</span></a></div></li>
			<li class="selected"><div><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'catalog','action'=>'form_pay'),$_smarty_tpl);?>
"><span class="nonfree" id="similiar">Płatny</span></a></div></li>
		</ul>
	</div>
</div>

<div class="wrapper">
	<div class="box">
		
		<div class="text-box">
			<?php if ($_smarty_tpl->tpl_vars['isPayAvailable']->value==1){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fixArticleContent'][0][0]->mFixArticleContent($_smarty_tpl->tpl_vars['description']->value['content'],$_smarty_tpl->tpl_vars['description']->value['id']);?>
<?php }else{ ?>Niestety w tym momencie nie ma możliwości zamówienia płatnego katalogu projektów domów naszej pracowni. Zawsze można zamówić <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'catalog','action'=>'form'),$_smarty_tpl);?>
"><strong>bezpłatny katalog</strong></a>, a do zakupu najnowszego katalogu z projektami zapraszamy wkrótce.<?php }?>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['isPayAvailable']->value==1){?>	
		<form class="validable default" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'catalog','action'=>'pay_order'),$_smarty_tpl);?>
" method="post" id="catalog-form">
			<fieldset>
				<input name="module" type="hidden" value="catalog">
				<input name="action" type="hidden" value="pay_order">
			
				<div class="cat-form-box">
					<div>
						<img src="<?php echo $_smarty_tpl->tpl_vars['staticDocs']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['description']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['description']->value['extra_data']['thumbnail'];?>
" alt="Płatny katalog projektów Studio Atrium">
						
						<div class="agree">
							<div><input type="checkbox" name="accept" id="accept"> <label for="accept" class="txt">Wyrażam zgodę</label> na przetwarzanie moich danych osobowych w celu realizacji zamówienia zgodnie z oświadczeniem. <span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'ajax','action'=>'get_customer_regulations'),$_smarty_tpl);?>
">Szczegóły</span></div>
							<div><input type="checkbox" name="accept2" id="accept2"> <label for="accept2" class="txt">Wyrażam zgodę</label> na otrzymywanie informacji o promocjach i ofercie projektowej. <span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'ajax','action'=>'get_mailing_regulations'),$_smarty_tpl);?>
">Szczegóły</span></div>
						</div>
					</div>
					
					<div>
						<ul>
							<li>
								<label for="fname">Imię</label>
								<input type="text" name="fname" id="fname" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
">
							</li>
							<li>
								<label for="lname">Nazwisko</label>
								<input type="text" name="lname" id="lname" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['surname'];?>
">
							</li>
							<li>
								<label for="city">Miejscowość</label>
								<input type="text" name="city" id="city">
							</li>
							<li>
								<label for="street">Ulica</label>
								<input type="text" name="street" id="street">
							</li>
							<li>
								<label for="number">Nr domu</label>
								<input type="text" name="number" id="number">
							</li>
							<li>
								<label for="postalcode">Kod pocztowy</label>
								<input type="text" name="postalcode" id="postalcode">
							</li>
							<li>
								<label for="phone">Telefon</label>
								<input type="text" name="phone" id="phone">
							</li>
							<li>
								<label for="customer-email">E-mail</label>
								<input type="text" name="email" id="customer-email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
">
							</li>
						</ul>
					</div>
					
					<p>Katalog zostanie wysłany niezwłocznie po otrzymaniu potwierdzenia przelewu.</p>
				</div>
				
				<div class="center"><input type="submit" value="Zamawiam" class="baton"></div>
			</fieldset>
			
		</form>
		<?php }?>
	</div>
</div><?php }} ?>