<?php
/* Smarty version 3.1.48, created on 2026-08-24 10:16:34
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Varia/ProjectHelper.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a8bfde20ca7c0_91686047',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67ec79752d482ec6356b834a02c7eea5498c0e85' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Varia/ProjectHelper.tpl',
      1 => 1776175187,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a8bfde20ca7c0_91686047 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Znajdziemy dla Ciebie projekt</h1>
			</div>
		</div>
	</div>
</div>

<div class="wrapper">
	<div class="varia-box">
		<p class="center">Jeśli chcesz, aby konsultanci Studio Atrium pomogli Ci w znalezieniu projektu wypełnij i wyślij poniższy formularz.</p>
		
		<form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'varia','action'=>'send_helper'),$_smarty_tpl ) );?>
" method="post" id="project-helper-form" class="validable" data-validate="ProjectHelper.validate">
			<fieldset>
				<input name="module" type="hidden" value="varia">
				<input name="action" type="hidden" value="send_helper">
			
				<ul class="form-wrapper">
					<li>
						<ul>
							<li class="no-margin">
								<p>Rodzaj domu</p>
								<div>
									<input type="checkbox" name="house_type[]" value="ground" id="type-base"><label for="type-base">parterowy</label>
									<input type="checkbox" name="house_type[]" value="loft" id="type-loft"><label for="type-loft">parterowy z poddaszem użytkowym</label>
								</div>
							</li>
							<li>
								<div>
									<input type="checkbox" name="house_type[]" value="attic" id="type-attic"><label for="type-attic">parterowy ze strychem do adaptacji</label>
									<input type="checkbox" name="house_type[]" value="storey" id="type-storey"><label for="type-storey">piętrowy</label>
								</div>
							</li>
							<li>
								<p>Powierzchnia użytkowa</p>
								<div>
									<label class="small">od</label><input type="text" name="area_from" class="short"> 
									<label class="small">do</label><input type="text" name="area_to" class="short"> <span>m<sup>2</sup></span>
								</div>
							</li>
							<li>
								<label>Maks. szerokość działki</label><input type="text" name="parcel_width" class="short"> <span>m</span>
							</li>
							<li>
								<p>Rodzaj dachu</p>
								<div>
									<input type="checkbox" name="roof_type[]" value="two" id="roof-two"><label for="roof-two">dwuspadowy</label>
									<input type="checkbox" name="roof_type[]" value="multi" id="roof-multi"><label for="roof-multi">wielospadowy</label>
									<input type="checkbox" name="roof_type[]" value="flat" id="roof-flat"><label for="roof-flat">płaski</label>
								</div>
							</li>
							<li>
								<label>Ilość pokoi bez salonu</label><input type="text" name="room_count" class="short">
							</li>
							<li>
								<label>Ilość stanowisk garażowych</label><input type="text" name="garage_places" class="short">
							</li>
						</ul>
					</li>
					
					<li>
						<ul>
							<li>
								<p>Funkcjonalność i uwagi</p>
								<textarea name="notice" cols="1" rows="1"></textarea>
							</li>
							<li>
								<label>*E-mail </label><input type="text" name="email">
							</li>
							<li>
								<label>*Telefon </label><input type="text" name="phone">
							</li>
							<li>
								<p class="accept">
									<input type="checkbox" name="accept" id="regulations-accept" value="on"><label for="regulations-accept">* Wyrażam zgodę</label> na przetwarzanie moich danych osobowych w celu otrzymania odpowiedzi zgodnie z oświadczeniem. <span class="ajax-info" data-url="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'ajax','action'=>'get_consultant_regulations'),$_smarty_tpl ) );?>
">Szczegóły</span>
								</p>
							</li>
							<li class="no-margin">
								<input type="checkbox" name="newsletter" value="on" id="newsletter"><label for="newsletter">Chcę się zapisać do newslettera</label>
							</li>
							<li id="accept-newsletter-box" style="display: none;">
								<p class="accept">
									<input type="checkbox" name="accept_newsletter" id="newsletter-accept" value="on"> <label for="newsletter-accept">* Wyrażam zgodę</label> na przetwarzanie moich danych osobowych w celu otrzymywania informacji o promocjach i ofercie projektowej. <span class="ajax-info" data-url="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'ajax','action'=>'get_mailing_regulations'),$_smarty_tpl ) );?>
">Szczegóły</span>
								</p>
							</li>
							<li class="no-margin">
								<span class="small">* pola wymagane</span>
							</li>
							<li class="submit-box">
								<input class="baton" type="submit" value="wyślij">
							</li>
						</ul>
					</li>
				</ul>
			</fieldset>
		</form>
	</div>
</div><?php }
}
