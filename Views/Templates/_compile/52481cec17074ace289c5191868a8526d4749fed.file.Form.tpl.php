<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 13:00:14
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Contest/Form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189367744562b06f5ef0df80-94211910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52481cec17074ace289c5191868a8526d4749fed' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Contest/Form.tpl',
      1 => 1582714313,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189367744562b06f5ef0df80-94211910',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dir' => 0,
    'order' => 0,
    'staticStockUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b06f5ef22171_90384807',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b06f5ef22171_90384807')) {function content_62b06f5ef22171_90384807($_smarty_tpl) {?><div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Konkurs fotograficzny</h1>
			</div>
		</div>
	</div>
</div>

<div class="wrapper">
	<div class="box">
		
		<div class="contest-splash">
			<img src="/img/konkurs.jpg" alt="Konkurs fotograficzny" class="resp">
		</div>
	
		<div class="contest">
			<p class="info">Wybudowałeś swój wymarzony dom wg projektu Studia Atrium? Podziel się swoją radością. Chwyć za aparat/smartfona i sfotografuj bryłę budynku z zewnątrz, dołącz także zdjęcia wnętrz - Twoje aranżacje kuchni, salonu, łazienki, sypialni na pewno zainspirują innych. Za pomocą prostego formularza prześlij do nas namiary na siebie, a my w odpowiedzi poprosimy Cię o wysłanie do nas efektu swoich prac. Najlepsze z nich zostaną wyróżnione profesjonalną sesją fotograficzną zorganizowaną przez Studio Atrium, a właściciel domu otrzyma nagrodę w postaci ciśnieniowego ekspresu do kawy. Z Laureatami będziemy się kontaktować indywidualnie, a ich prace zostaną zaprezentowane na łamach naszej strony internetowej oraz wydawnictwa Domy w Tradycji. <a href="/artykuly/Nagrodzone-realizacje,1391.html">Zobacz nagrodzone realizacje &raquo;</a></p>
		
			<div>
				<p class="express">Wygraj ciśnieniowy <span>ekspres do kawy</span></p>
				
			</div>
		</div>
	
		<div id="person-box">
			<form id="contest-form" class="validable default" method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'contest','action'=>'register'),$_smarty_tpl);?>
">
				<fieldset>
					<input name="module" type="hidden" value="contest">
					<input name="action" type="hidden" value="register">
					<input type="hidden" id="directory-name" name="dir" value="<?php echo $_smarty_tpl->tpl_vars['dir']->value;?>
">
					<div class="contest-form-box">
						<div>
							<ul>
								<li>
									<p id="project"><label for="f-project">Nazwa projektu domu</label></p>
									<input type="text" id="f-project" name="project">
								</li>
								
								<li>
									<p id="city"><label for="f-city">Miejscowość</label></p>
									<input type="text" id="f-city" name="city">
								</li>
								
								<li>
									<p id="address"><label for="f-address">Ulica, nr domu</label></p>
									<input type="text" id="f-address" name="address">
								</li>
								
								<li>
									<p id="postalcode"><label for="f-postal">Kod pocztowy</label></p>
									<input type="text" name="postalcode" id="f-postal">
								</li>
								
								<li>
									<p id="region"><label for="f-region">Województwo</label></p>
									<div class="jui-select-box dark" id="region-box">
										<select name="region" id="f-region">
											<option value="">wybierz z listy...</option>
											<option value="dolnośląskie"<?php if ($_smarty_tpl->tpl_vars['order']->value['region']=='dolnośląskie'){?> selected<?php }?>>dolnośląskie</option>
											<option value="kujawsko-pomorskie"<?php if ($_smarty_tpl->tpl_vars['order']->value['region']=='kujawsko-pomorskie'){?> selected<?php }?>>kujawsko-pomorskie</option>
											<option value="lubelskie"<?php if ($_smarty_tpl->tpl_vars['order']->value['region']=='lubelskie'){?> selected<?php }?>>lubelskie</option>
											<option value="lubuskie"<?php if ($_smarty_tpl->tpl_vars['order']->value['region']=='lubuskie'){?> selected<?php }?>>lubuskie</option>
											<option value="łódzkie"<?php if ($_smarty_tpl->tpl_vars['order']->value['region']=='łódzkie'){?> selected<?php }?>>łódzkie</option>
											<option value="małopolskie"<?php if ($_smarty_tpl->tpl_vars['order']->value['region']=='małopolskie'){?> selected<?php }?>>małopolskie</option>
											<option value="mazowieckie"<?php if ($_smarty_tpl->tpl_vars['order']->value['region']=='mazowieckie'){?> selected<?php }?>>mazowieckie</option>
											<option value="opolskie"<?php if ($_smarty_tpl->tpl_vars['order']->value['region']=='opolskie'){?> selected<?php }?>>opolskie</option>
											<option value="podlaskie"<?php if ($_smarty_tpl->tpl_vars['order']->value['region']=='podlaskie'){?> selected<?php }?>>podlaskie</option>
											<option value="pomorskie"<?php if ($_smarty_tpl->tpl_vars['order']->value['region']=='pomorskie'){?> selected<?php }?>>pomorskie</option>
											<option value="podkarpackie"<?php if ($_smarty_tpl->tpl_vars['order']->value['region']=='podkarpackie'){?> selected<?php }?>>podkarpackie</option>
											<option value="śląskie"<?php if ($_smarty_tpl->tpl_vars['order']->value['region']=='śląskie'){?> selected<?php }?>>śląskie</option>
											<option value="świętokrzyskie"<?php if ($_smarty_tpl->tpl_vars['order']->value['region']=='świętokrzyskie'){?> selected<?php }?>>świętokrzyskie</option>
											<option value="wielkopolskie"<?php if ($_smarty_tpl->tpl_vars['order']->value['region']=='wielkopolskie'){?> selected<?php }?>>wielkopolskie</option>
											<option value="warmińsko-mazurskie"<?php if ($_smarty_tpl->tpl_vars['order']->value['region']=='warmińsko-mazurskie'){?> selected<?php }?>>warmińsko-mazurskie</option>
											<option value="zachodniopomorskie"<?php if ($_smarty_tpl->tpl_vars['order']->value['region']=='zachodniopomorskie'){?> selected<?php }?>>zachodniopomorskie</option>
											<option value="empty"<?php if ($_smarty_tpl->tpl_vars['order']->value['region']=='empty'){?> selected<?php }?>>nie dotyczy (zam. z zagr.)</option>
									   </select>
									</div>
								</li>
							</ul>
						</div>
					
						<div>
							<ul>
								<li>
									<p id="fname"><label for="f-name">Imię</label></p>
									<input type="text" id="f-name" name="fname">
								</li>
								
								<li>
									<p id="lname"><label for="l-name">Nazwisko</label></p>
									<input type="text" id="l-name" name="lname">
								</li>
								
								<li>
									<ul>
										<li>
											<p id="phone"><label for="f-phone">Telefon</label></p>
											<input type="text" value="" id="f-phone" name="phone">
										</li>
										<li>
											<p id="semail"><label for="f-email">E-mail</label></p>
											<input type="text" value="" id="f-email" name="semail">
										</li>
									</ul>
								</li>
								
								<li>
									<p id="signature"><label for="f-signature">Podpis autora zdjęć (wyświetlany pod każdą publikacją)</label></p>
									<input type="text" id="f-signature" name="signature">
								</li>
							</ul>
						</div>
					</div>
		
					<div id="reg-box">
						<p id="accept-reg">
							<input type="checkbox" name="accept-reg" id="accept-r" value="on"> <label for="accept-r">Zapoznałem się i akceptuję</label> <a href="<?php echo $_smarty_tpl->tpl_vars['staticStockUrl']->value;?>
/docs/regulamin.pdf" target="_new" style="color: #cc1000;">regulamin konkursu</a>
						</p>
						
						<p id="accept-data">
							<input type="checkbox" name="accept-data" id="accept-d" value="on"> <label for="accept-d">Wyrażam zgodę</label> na przetwarzanie moich danych osobowych przez STUDIO ATRIUM z siedzibą w Bielsku-Białej ul. Malczewskiego 1 w celach marketingowych - zgodnie z ustawą o ochronie danych osobowych z dnia 29 sierpnia 1997 r. (Dz.U. z 97 r. Nr 133 poz. 883).
						</p>
						
						<p id="accept-licence">
							<input type="checkbox" name="accept-licence" id="accept-l" value="on"> <label for="accept-l">Przesyłając zdjęcia do konkursu fotograficznego we wskazany w późniejszej korespondencji sposób, udzielam</label> jednocześnie nieodpłatnej licencji dla STUDIA ATRIUM na korzystanie ze zdjęć na polach eksploatacji wskazanych w <a href="/res/regulamin.pdf" target="_new" style="color: #cc1000;">regulaminie konkursu</a> fotograficznego tj. w szczególności w zakresie publikacji w katalogach, materiałach prasowych oraz na stronach internetowych będących własnością STUDIA ATRIUM.
						</p>
					</div>
					
					<div id="submit-box"><input type="submit" value="Wyślij zgłoszenie"></div>
				</fieldset>
			</form>
		</div>
	</div>
</div><?php }} ?>