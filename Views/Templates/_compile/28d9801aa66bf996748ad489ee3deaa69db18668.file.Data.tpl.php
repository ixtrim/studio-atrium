<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 08:30:46
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Order/Data.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148335451362b0303604e830-42172248%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28d9801aa66bf996748ad489ee3deaa69db18668' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Order/Data.tpl',
      1 => 1503486691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148335451362b0303604e830-42172248',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'basketUserData' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b03036076676_44173839',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b03036076676_44173839')) {function content_62b03036076676_44173839($_smarty_tpl) {?><div class="list-header">
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
			<li class="selected"><div><span class="data">Dane osobowe</span></div></li>
			<li class="disabled"><div><span class="summary">Podsumowanie</span></div></li>
		</ul>
	</div>
</div>

<div class="wrapper">
	<div class="box">
		<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'order','action'=>'data_store'),$_smarty_tpl);?>
" method="post" id="userDataForm" class="validable">
			<input type="hidden" name="module" value="order">
			<input type="hidden" name="action" value="data_store">
			
			<fieldset>
				<div class="rbox" id="radio-company-box">
					<input type="radio" name="client_type" id="client-person" value="person"<?php if (!$_smarty_tpl->tpl_vars['basketUserData']->value||$_smarty_tpl->tpl_vars['basketUserData']->value['client_type']=='person'){?> checked<?php }?>><label for="client-person">Klient indywidualny</label>
					<input type="radio" name="client_type" id="client-company" value="company"<?php if ($_smarty_tpl->tpl_vars['basketUserData']->value['client_type']=='company'){?> checked<?php }?>><label for="client-company">Firma</label>
				</div>
				
				<div id="company-box" class="downspaced"<?php if (!$_smarty_tpl->tpl_vars['basketUserData']->value||$_smarty_tpl->tpl_vars['basketUserData']->value['client_type']=='person'){?> style="display: none;"<?php }?>>
					<div class="block-box">
					<ul class="form-list">
						<li>
							<label for="company-name">Nazwa firmy</label>
							<input type="text" name="company_name" id="company-name" value="<?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['company_name'];?>
">
						</li>
						<li>
							<label for="nip">NIP</label>
							<input type="text" name="nip" id="nip" value="<?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['nip'];?>
">
						</li>
					</ul>
					</div>
				</div>
			
				<div class="block-box">
				<ul class="form-list">
					<li>
						<label for="fname">Imię</label>
						<input type="text" name="fname" id="fname" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['basketUserData']->value['fname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['user']->value['name'] : $tmp);?>
">
					</li>
					<li>
						<label for="lname">Nazwisko</label>
						<input type="text" name="lname" id="lname" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['basketUserData']->value['lname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['user']->value['surname'] : $tmp);?>
">
					</li>
					<li>
						<label for="postal-code">Kod pocztowy</label>
						<input type="text" name="postal_code" id="postal-code" value="<?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['postal_code'];?>
">
					</li>
					<li>
						<label for="city">Miejscowość</label>
						<input type="text" name="city" id="city" value="<?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['city'];?>
">
					</li>
					<li>
						<label for="address">Adres</label>
						<input type="text" name="address" id="address" value="<?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['address'];?>
">
					</li>
					<li>
						<label for="phone">Telefon</label>
						<input type="text" name="phone" id="phone" value="<?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['phone'];?>
">
					</li>
					<li>
						<label for="customer-email">E-mail</label>
						<input type="text" name="email" id="customer-email" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['basketUserData']->value['email'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['user']->value['email'] : $tmp);?>
">
					</li>
				</ul>
				</div>
				
				<div class="cbox address">
					<input type="checkbox" name="send_data" id="send-data" value="1" <?php if ($_smarty_tpl->tpl_vars['basketUserData']->value['send_data']==1){?> checked<?php }?>><label for="send-data" class="down">Adres wysyłki inny niż na rachunku</label>
				</div>
				
				<div id="send-data-box" class="spaced"<?php if (!$_smarty_tpl->tpl_vars['basketUserData']->value||$_smarty_tpl->tpl_vars['basketUserData']->value['send_data']!=1){?> style="display: none;"<?php }?>>
					<div class="block-box">
					<ul class="form-list">
						<li>
							<label for="send-fname">Imię</label>
							<input type="text" name="send_fname" id="send-fname" value="<?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['send_fname'];?>
">
						</li>
						<li>
							<label for="send-lname">Nazwisko</label>
							<input type="text" name="send_lname" id="send-lname" value="<?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['send_lname'];?>
">
						</li>
						<li>
							<label for="send-postal-code">Kod pocztowy</label>
							<input type="text" name="send_postal_code" id="send-postal-code" value="<?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['send_postal_code'];?>
">
						</li>
						<li>
							<label for="send-city">Miejscowość</label>
							<input type="text" name="send_city" id="send-city" value="<?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['send_city'];?>
">
						</li>
						<li>
							<label for="send-address">Adres</label>
							<input type="text" name="send_address" id="send-address" value="<?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['send_address'];?>
">
						</li>
					</ul>
					</div>
				</div>
				
				<div class="tbox">
					<div class="block-box">
						<ul class="form-list">
							<li>
								<label>Uwagi</label>
								<textarea name="notes" cols="1" rows="1"><?php echo $_smarty_tpl->tpl_vars['basketUserData']->value['notes'];?>
</textarea>
							</li>
						</ul>
					</div>
				</div>
				
				<div class="cbox">
					<input type="checkbox" name="accept_marketing" id="accept-marketing" value="1"<?php if ($_smarty_tpl->tpl_vars['basketUserData']->value['accept_marketing']==1){?> checked<?php }?>><label for="accept-marketing" class="down">* Wyrażam zgodę</label><label for="accept-marketing" class="down noback"> na przetwarzanie moich danych osobowych w celu realizacji zamówienia</label>. <span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'ajax','action'=>'get_customer_regulations'),$_smarty_tpl);?>
">Szczegóły</span>
				</div>
				
				<div class="cbox">
					<input type="checkbox" name="accept_mailing" id="accept-mailing" value="1"<?php if ($_smarty_tpl->tpl_vars['basketUserData']->value['accept_mailing']==1){?> checked<?php }?>><label for="accept-mailing" class="down">Wyrażam zgodę</label><label for="accept-mailing" class="down noback"> na otrzymywanie informacji o promocjach i ofercie projektowej</label>. <span class="ajax-info" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'ajax','action'=>'get_mailing_regulations'),$_smarty_tpl);?>
">Szczegóły</span>
				</div>
				
				
				<div class="cbox">
					<input type="checkbox" name="accept_regulations" id="accept-regulations" value="1"<?php if ($_smarty_tpl->tpl_vars['basketUserData']->value['accept_regulations']==1){?> checked<?php }?>><label for="accept-regulations" class="down">* Oświadczam</label><label for="accept-regulations" class="down noback">, że zapoznałem się i akceptuję</label> <a class="under" href="/dokumenty/Zasady-sprzedazy.html#regulamin" target="_blank">regulamin sprzedaży</a>
				</div>
				<div class="cbox">* oświadczenia wymagane</div>
			
				<div class="next">
					<button class="baton">Dalej</button>
				</div>
			</fieldset>
		</form>
	</div>
</div><?php }} ?>