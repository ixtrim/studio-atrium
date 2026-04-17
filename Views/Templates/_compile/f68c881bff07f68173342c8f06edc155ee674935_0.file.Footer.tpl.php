<?php
/* Smarty version 4.5.6, created on 2026-05-27 16:43:08
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Layout/Footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_6a1702fcbc3a49_07121509',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f68c881bff07f68173342c8f06edc155ee674935' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Layout/Footer.tpl',
      1 => 1779892828,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a1702fcbc3a49_07121509 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="blue-overlay" id="ajax-info-overlay">
	<div class="over-box" id="ajax-info-over-box"></div>
	<button type="button" id="ajax-info-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>

<div class="blue-overlay catalog">
	<div id="over-catalog">
			</div>
	<button type="button" id="catalog-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>

<footer id="footer">
	<div>
		<p id="back-to-top">Powrót na górę</p>
	</div>
	<?php if (!$_smarty_tpl->tpl_vars['user']->value) {?>
	<section class="account">
		<div class="box">
			<ul>
				<li>
					<ul>
						<li>
							<span>100</span>
						</li>
						<li>
							<p>
								Zarejestruj się w naszym serwisie. Nie przegap informacji o nowościach i promocjach. Twoje konto to swoboda korzystania z narzędzi gdziekolwiek jesteś. Dodatkowo za założenie konta otrzymujesz od nas w prezencie 100zł rabatu na zakup projektu domu.
							</p>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:" class="register-trigger">Załóż konto</a>
				</li>
			</ul>
		</div>
	</section>
	<?php }?>
	<section class="mq-pad">
		<ul class="foot-box">
			<li>
				<ul class="data">
					<li>
						<ul>
							<li class="header address"><span>Nasze adresy</span></li>
							<li>"<span class="uppercase">Studio Atrium</span> Lelek, Godlewski sp. j."</li>
							<li>al. Armii Krajowej 220 (pawilon II, pok. 205)</li>
							<li>43-316 Bielsko-Biała</li>
							<li><span id="map-trigger" class="blue">zobacz dojazd</span></li>
							<li class="sep">tel. <a href="tel:+48338106654" rel="nofollow">33 810 66 54</a>, <a href="tel:+48338164069" rel="nofollow">33 816 40 69</a>, fax w. 108</li>
							<li>tel. kom. <a href="tel:+48602303160" rel="nofollow">602 303 160</a></li>
							<li class="sep">e-mail: <a href="mailto:atrium@studioatrium.pl"><strong>atrium@studioatrium.pl</strong></a></li>
							<li class="sep"><a href="/kontakt/">Kontakt</a></li>
							<li><a href="/dokumenty/Dane-teleadresowe.html">Pełne dane teleadresowe</a></li>
							<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'varia','action'=>'agent'),$_smarty_tpl ) );?>
">Przedstawiciele</a></li>
							<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'varia','action'=>'about'),$_smarty_tpl ) );?>
">O nas</a></li>
							<li><a href="/dokumenty/Reklama.html">Reklama w Studio Atrium</a></li>
						</ul>
					</li>

					<li>
						<ul>
							<li class="header client"><span>Obsługa klienta</span></li>
							<li><span class="framed"><a href="tel:+48338229496" rel="nofollow">33 822 94 96</a></span></li>
							<li><span class="write consultant">Napisz do nas</span></li>
							<li class="header orders"><span>Zamówienia</span></li>
							<li><a href="/dokumenty/Zasady-sprzedazy.html">Zasady sprzedaży</a> i <a href="/dokumenty/Zasady-sprzedazy.html#regulamin">regulamin</a></li>
							<li><a href="/dokumenty/Polityka-prywatnosci.html">Polityka prywatności</a></li>
							<li><a href="/dokumenty/Co-zawiera-projekt.html">Co zawiera projekt</a></li>
							<li><a href="/dokumenty/Jak-kupowac.html">Jak kupować?</a></li>
							<li><a href="/dodatki/">Dodatki do projektów</a></li>
							<li><a href="/alfabetyczna-lista-projektow/">Projekty domów alfabetycznie</a></li>
						</ul>
					</li>
				</ul>
			</li>

			<li>
				<ul class="cat">
					<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'catalog','action'=>'form'),$_smarty_tpl ) );?>
"><img src="/img/catalogue.webp" alt="Katalog z projektami domów" width="235" height="142"></a></li>
					<li>
						<p class="header"><span>Katalog projektów online</span></p>
						<p>Zapoznaj się z naszą ofertą projektową, przeglądając nasz najnowszy katalog projektów online.</p>
						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'catalog','action'=>'form'),$_smarty_tpl ) );?>
" class="blue">zobacz katalog &raquo;</a>
					</li>
				</ul>

				<ul class="cat">
					<li><a href="/dokumenty/Referencje.html"><img src="/img/medals.webp" alt="Konsumencki lider jakości" width="220" height="147"></a></li>
					<li>
						<p class="header"><span>Konsumencki lider jakości</span></p>
						<p>Marka Studio Atrium przez osiem lat z rzędu została wyróżniona w programie redakcji Strefy Gospodarki.</p>
						<a href="/dokumenty/Referencje.html" class="blue">zobacz więcej &raquo;</a>
					</li>
				</ul>

				

							</li>
		</ul>

		<ul class="social-media">
			<li><a href="https://www.facebook.com/studioatrium" rel="nofollow">Facebook</a></li>
			<li><a href="https://www.instagram.com/studioatrium.pl/" class="goo" rel="nofollow">Instagram</a></li>
			<li><a href="https://www.pinterest.com/studioatrium/" class="pin" rel="nofollow">Pinterest</a></li>
			<li><a href="https://www.youtube.com/user/StudioAtrium" class="yt" rel="nofollow">YouTube</a></li>
		</ul>

		<p><strong>Copyright © Studio Atrium 1994-<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date_format' ][ 0 ], array( time(),"%Y" ));?>
</strong> | Korzystamy z danych zapisywanych w cookies. <span class="ajax-info" data-url="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'ajax','action'=>'get_cookie_info'),$_smarty_tpl ) );?>
">Kliknij tutaj</span> jeśli chcesz je zablokować.</p>
	</section>
</footer>

<div class="blue-overlay cs">
	<div id="cs-wrapper">
		<div>
			<form method="get" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'search'),$_smarty_tpl ) );?>
" id="search-form">
				<div id="search-project">
					<label for="search-name" class="black">Wpisz nazwę projektu</label>
					<input type="text" name="query" id="search-name" class="long">
					<input type="submit" id="search-name-submit" value="Wyszukaj" class="baton disabled" disabled>
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'varia','action'=>'project_helper'),$_smarty_tpl ) );?>
" class="wired help">Pomoc</a>
				</div>
			</form>
		</div>

		<div class="form-box">
			<p class="info">Lub wybierz parametry projektu i kliknij przycisk "Pokaż projekty" znajdujący się pod formularzem</p>
			<form id="click-search-form" method="post" action="/">
				<div class="cs-box">
					<ul>
						<?php if ($_smarty_tpl->tpl_vars['csCategory']->value) {?>
						<li class="half-spaced">
							<p class="head">kategoria:</p>
							<ul>
								<li>
									<input type="checkbox" id="cs-category" name="kategoria" value="<?php echo $_smarty_tpl->tpl_vars['csCategory']->value;?>
" checked><label for="cs-category"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</label> <span class="count" id="cs-category-count">(0)</span>
								</li>
							</ul>
						</li>
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['csTag']->value) {?>
						<li class="half-spaced">
							<p class="head">wybrany filtr:</p>
							<ul>
								<li>
									<input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['csTag']->value['id'];?>
-1" name="<?php echo $_smarty_tpl->tpl_vars['csTag']->value['csname'];?>
" value="1" checked><label for="<?php echo $_smarty_tpl->tpl_vars['csTag']->value['id'];?>
-1"><?php echo $_smarty_tpl->tpl_vars['csTag']->value['name'];?>
</label> <span class="count" id="<?php echo $_smarty_tpl->tpl_vars['csTag']->value['id'];?>
-1-count">(0)</span>
								</li>
							</ul>
						</li>
						<?php }?>

						<?php if ($_smarty_tpl->tpl_vars['csTagSelect']->value) {?>
						<li class="half-spaced">
							<p class="head">wybrany filtr:</p>
							<ul>
								<li>
									<input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['value'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['csname'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['value'];?>
" checked><label for="<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['value'];?>
"><?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['name'];?>
 : <?php echo (($tmp = $_smarty_tpl->tpl_vars['csValueNames']->value[$_smarty_tpl->tpl_vars['csTagSelect']->value['value']] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['csTagSelect']->value['value'] ?? null : $tmp);?>
</label> <span class="count" id="<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['value'];?>
-count">(0)</span>
								</li>
							</ul>
						</li>
						<?php }?>
					
						<li class="spaced">
							<div class="jui-select-box white cs-select" id="project-type-box">
								<select name="typ_projektu" id="project-type">
									<option value="">typ projektu</option>
									
																		
									<option id="parterowe" value="parterowe"<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'parterowe' || $_smarty_tpl->tpl_vars['csType']->value == 'parterowe') {?> selected<?php }?>>parterowe</option>
									<option id="z_poddaszem" value="z_poddaszem"<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'z_poddaszem' || $_smarty_tpl->tpl_vars['csType']->value == 'z_poddaszem') {?> selected<?php }?>>z poddaszem</option>
									<option id="pietrowe" value="pietrowe"<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'pietrowe' || $_smarty_tpl->tpl_vars['csType']->value == 'pietrowe') {?> selected<?php }?>>piętrowe</option>
									<option id="nothing" value="" disabled>--------</option>
									<option id="szkieletowe" value="szkieletowe"<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'szkieletowe' || $_smarty_tpl->tpl_vars['csType']->value == 'szkieletowe') {?> selected<?php }?>>szkieletowe</option>
									<option id="blizniacze" value="blizniacze"<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'blizniacze' || $_smarty_tpl->tpl_vars['csType']->value == 'blizniacze') {?> selected<?php }?>>bliźniacze</option>
									<option id="dwulokalowe" value="dwulokalowe"<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'dwulokalowe' || $_smarty_tpl->tpl_vars['csType']->value == 'dwulokalowe') {?> selected<?php }?>>dwulokalowe</option>
									
								</select>
							</div>
							
							<div class="jui-select-box right white cs-select" id="roof-type-box">
								<select name="typdachu" id="54">
									<option value="">typ dachu</option>
									<option id="54-dwuspadowy" value="dwuspadowy"<?php if ($_smarty_tpl->tpl_vars['request']->value['typdachu'] == 'dwuspadowy') {?> selected<?php }?>>dwuspadowy</option>
									<option id="54-mansardowy" value="mansardowy"<?php if ($_smarty_tpl->tpl_vars['request']->value['typdachu'] == 'mansardowy') {?> selected<?php }?>>mansardowy</option>
									<option id="54-stropodach" value="stropodach"<?php if ($_smarty_tpl->tpl_vars['request']->value['typdachu'] == 'stropodach') {?> selected<?php }?>>płaski</option>
									<option id="54-stozkowy" value="stozkowy"<?php if ($_smarty_tpl->tpl_vars['request']->value['typdachu'] == 'stozkowy') {?> selected<?php }?>>stożkowy</option>
									<option id="54-wielospadowy" value="wielospadowy"<?php if ($_smarty_tpl->tpl_vars['request']->value['typdachu'] == 'wielospadowy') {?> selected<?php }?>>wielospadowy</option>
								</select>
							</div>
						</li>
					
						<li>
							<p class="area">Powierzchnia użytkowa</p>
							 <label for="pow-min">od</label>
							<input type="text" name="pow_min" id="pow-min" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_min'];?>
">
							<span class="sep"><label for="pow-max">do</label></span>
							<input type="text" name="pow_max" id="pow-max" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_max'];?>
"> m<sup>2</sup>
						</li>
						
						<li>
							<p class="area">Powierzchnia zabudowy</p>
							<label for="pow-zab-min">od</label>
							<input type="text" name="pow_zab_min" id="pow-zab-min" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_zab_min'];?>
">
							<span class="sep"><label for="pow-zab-max">do</label></span>
							<input type="text" name="pow_zab_max" id="pow-zab-max" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_zab_max'];?>
"> m<sup>2</sup>
						</li>
						
						<li>
							<p class="area">Powierzchnia całkowita</p>
							<label for="pow-total-min">od</label>
							<input type="text" name="pow_total_min" id="pow-total-min" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_total_min'];?>
">
							<span class="sep"><label for="pow-total-max">do</label></span>
							<input type="text" name="pow_total_max" id="pow-total-max" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_total_max'];?>
"> m<sup>2</sup>
						</li>
						
						<li>
							<p class="dim">Szerokość | długość działki</p>
							<input type="text" name="dzialka_szer" id="parcel-width" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['dzialka_szer'];?>
">
							<span class="sep center">|</span>
							<input type="text" name="dzialka_dl" id="parcel-height" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['dzialka_dl'];?>
"> m
						</li>
						
						<li class="spaced">
							<p class="long">Maks. szerokość elewacji frontowej</p>
							<input type="text" name="front_szer" id="front-width" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['front_szer'];?>
"> m
						</li>
					
						<li class="half-spaced">
							<p class="head">ilość pokoi na parterze:</p>
							<div>
								<input type="radio" id="69-0" name="iloscpokoinaparterze" value="-1"><label for="69-0" class="spaced breaker">Dowolna</label>
								<input type="radio" id="69-1" name="iloscpokoinaparterze" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaparterze'] == 1) {?> checked<?php }?>><label for="69-1">1</label> <span class="count" id="69-1-count">(0)</span>
								<input type="radio" id="69-2" name="iloscpokoinaparterze" value="2"<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaparterze'] == 2) {?> checked<?php }?>><label for="69-2">2</label> <span class="count" id="69-2-count">(0)</span>
								<input type="radio" id="69-3" name="iloscpokoinaparterze" value="3"<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaparterze'] == 3) {?> checked<?php }?>><label for="69-3">3</label> <span class="count" id="69-3-count">(0)</span>
								<input type="radio" id="69-4" name="iloscpokoinaparterze" value="4"<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaparterze'] == 4) {?> checked<?php }?>><label for="69-4">4</label> <span class="count" id="69-4-count">(0)</span>
								<input type="radio" id="69-5" name="iloscpokoinaparterze" value="5"<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaparterze'] == 5) {?> checked<?php }?>><label for="69-5">5</label> <span class="count" id="69-5-count">(0)</span>
							</div>
						</li>
						
						<li class="half-spaced">
							<p class="head">ilość pokoi na II kondygnacji:</p>
							<div>
								<input type="radio" id="71-0" name="iloscpokoinaiikondygnacji" value="-1"><label for="71-0" class="spaced breaker">Dowolna</label>
								<input type="radio" id="71-1" name="iloscpokoinaiikondygnacji" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaiikondygnacji'] == 1) {?> checked<?php }?>><label for="71-1">1</label> <span class="count" id="71-1-count">(0)</span>
								<input type="radio" id="71-2" name="iloscpokoinaiikondygnacji" value="2"<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaiikondygnacji'] == 2) {?> checked<?php }?>><label for="71-2">2</label> <span class="count" id="71-2-count">(0)</span>
								<input type="radio" id="71-3" name="iloscpokoinaiikondygnacji" value="3"<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaiikondygnacji'] == 3) {?> checked<?php }?>><label for="71-3">3</label> <span class="count" id="71-3-count">(0)</span>
								<input type="radio" id="71-4" name="iloscpokoinaiikondygnacji" value="4"<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaiikondygnacji'] == 4) {?> checked<?php }?>><label for="71-4">4</label> <span class="count" id="71-4-count">(0)</span>
								<input type="radio" id="71-5" name="iloscpokoinaiikondygnacji" value="5"<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaiikondygnacji'] == 5) {?> checked<?php }?>><label for="71-5">5</label> <span class="count" id="71-5-count">(0)</span>
							</div> 
						</li>
						
						<li>
							<p class="head">Ilość łazienek</p>
							<div>
								<span class="dist">Na parterze</span> 
								<input type="radio" name="liczbalazieneknaparterze" value="2" id="45-2"<?php if ($_smarty_tpl->tpl_vars['request']->value['liczbalazieneknaparterze'] == 2) {?> checked<?php }?>><label for="45-2">2</label> <span class="count" id="45-2-count">(0)</span>
								<input type="radio" name="liczbalazieneknaparterze" value="3" id="45-3"<?php if ($_smarty_tpl->tpl_vars['request']->value['liczbalazieneknaparterze'] == 3) {?> checked<?php }?>><label for="45-3">3</label> <span class="count" id="45-3-count">(0)</span>
							</div>
							<div>
								<span class="dist">Na II kondygnacji</span>
								<input type="radio" name="liczbalazieneknaiikondygnacji" value="2" id="46-2"<?php if ($_smarty_tpl->tpl_vars['request']->value['liczbalazieneknaiikondygnacji'] == 2) {?> checked<?php }?>><label for="46-2">2</label> <span class="count" id="46-2-count">(0)</span>
								<input type="radio" name="liczbalazieneknaiikondygnacji" value="3" id="46-3"<?php if ($_smarty_tpl->tpl_vars['request']->value['liczbalazieneknaiikondygnacji'] == 3) {?> checked<?php }?>><label for="46-3">3</label> <span class="count" id="46-3-count">(0)</span>
							</div>
						</li>
					</ul>
				</div>
			
				<div class="cs-box">
					<ul>
						<li class="half-spaced">
							<div class="jui-select-box white cs-select" id="height-box">
								<select name="wysokoscbudynku" id="26">
									<option value="">maks. wys. budynku</option>
									<option id="26-1" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 1) {?> selected<?php }?>>do 6 m</option>
									<option id="26-2" value="2"<?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 2) {?> selected<?php }?>>od 6 m do 7 m</option>
									<option id="26-3" value="3"<?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 3) {?> selected<?php }?>>od 7 m do 8 m</option>
									<option id="26-4" value="4"<?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 4) {?> selected<?php }?>>od 8 m do 9 m</option>
									<option id="26-5" value="5"<?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 5) {?> selected<?php }?>>od 9 m do 10 m</option>
									<option id="26-6" value="6"<?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 6) {?> selected<?php }?>>powyżej 10 m</option>
								</select>
							</div>
							
							<div class="jui-select-box right white cs-select" id="angle-box">
								<select name="katnachyleniadachu" id="27">
									<option value="">kąt nach. dachu</option>
									<option id="27-1" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['katnachyleniadachu'] == 1) {?> selected<?php }?>>do 30&deg;</option>
									<option id="27-2" value="2"<?php if ($_smarty_tpl->tpl_vars['request']->value['katnachyleniadachu'] == 2) {?> selected<?php }?>>30&deg; do 35&deg;</option>
									<option id="27-3" value="3"<?php if ($_smarty_tpl->tpl_vars['request']->value['katnachyleniadachu'] == 3) {?> selected<?php }?>>35&deg; do 40&deg;</option>
									<option id="27-4" value="4"<?php if ($_smarty_tpl->tpl_vars['request']->value['katnachyleniadachu'] == 4) {?> selected<?php }?>>40&deg; do 45&deg;</option>
									<option id="27-5" value="5"<?php if ($_smarty_tpl->tpl_vars['request']->value['katnachyleniadachu'] == 5) {?> selected<?php }?>>45&deg; i więcej</option>
								</select>
							</div>
						</li>
						
						<li class="spaced">
							<div class="jui-select-box white cs-select" id="ceiling-box">
								<select name="rodzajstropu" id="28">
									<option value="">strop nad parterem</option>
									<option id="28-lekki" value="lekki"<?php if ($_smarty_tpl->tpl_vars['request']->value['rodzajstropu'] == 'lekki') {?> selected<?php }?>>lekki</option>
									<option id="28-gestozebrowy" value="gestozebrowy"<?php if ($_smarty_tpl->tpl_vars['request']->value['rodzajstropu'] == 'gestozebrowy') {?> selected<?php }?>>gęstożebrowy</option>
									<option id="28-plyta_zelbetowa" value="plyta_zelbetowa"<?php if ($_smarty_tpl->tpl_vars['request']->value['rodzajstropu'] == 'plyta_zelbetowa') {?> selected<?php }?>>płyta żelbetowa</option>
									<option id="28-drewniany_belkowy" value="drewniany_belkowy"<?php if ($_smarty_tpl->tpl_vars['request']->value['rodzajstropu'] == 'drewniany_belkowy') {?> selected<?php }?>>drewniany belkowy</option>
								</select>
							</div>
							
							<div class="jui-select-box right white cs-select" id="ridge-box">
								<select name="kalenica" id="103">
									<option value="">kalenica</option>
									<option id="103-rownolegla_do_drogi" value="rownolegla_do_drogi"<?php if ($_smarty_tpl->tpl_vars['request']->value['kalenica'] == 'rownolegla_do_drogi') {?> selected<?php }?>>równoległa do drogi</option>
									<option id="103-prostopadla_do_drogi" value="prostopadla_do_drogi"<?php if ($_smarty_tpl->tpl_vars['request']->value['kalenica'] == 'prostopadla_do_drogi') {?> selected<?php }?>>prostopadła do drogi</option>
									<option id="103-brak" value="brak"<?php if ($_smarty_tpl->tpl_vars['request']->value['kalenica'] == 'brak') {?> selected<?php }?>>brak</option>
								</select>
							</div>
						</li>
						
						<li>
							<p class="head">Funkcja - opcje dodatkowe</p>
							<div>
								<ul class="input-box">
									<li>
										<input type="checkbox" id="65-1" name="spizarnia" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['spizarnia']) {?> checked<?php }?>><label for="65-1">Spiżarnia</label> <span class="count" id="65-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="57-1" name="garderoba" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['garderoba']) {?> checked<?php }?>><label for="57-1">Garderoba</label> <span class="count" id="57-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="c18-1" name="duza_kotlownia" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['duza_kotlownia']) {?> checked<?php }?>><label for="c18-1">Duża kotłownia</label> <span class="count" id="c18-1-count">(0)</span>
									</li>
								</ul>
							</div>
						</li>
						<li>
							<div>
								<ul class="input-box">
									<li>
										<input type="checkbox" id="47-1" name="wiatagarazowa" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['wiatagarazowa']) {?> checked<?php }?>><label for="47-1">Wiata</label> <span class="count" id="47-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="96-1" name="pralnia" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['pralnia']) {?> checked<?php }?>><label for="96-1">Pralnia</label> <span class="count" id="96-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="c26-1" name="od_poludnia" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['od_poludnia']) {?> checked<?php }?>><label for="c26-1">Wjazd od południa</label> <span class="count" id="c26-1-count">(0)</span>
									</li>
								</ul>
							</div>
						</li>
						<li>
							<div>
								<ul class="input-box">
									<li>
										<input type="checkbox" id="104-1" name="balkon" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['balkon']) {?> checked<?php }?>><label for="104-1">Balkon</label> <span class="count" id="104-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="105-1" name="lukarna" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['lukarna']) {?> checked<?php }?>><label for="105-1">Lukarna</label> <span class="count" id="105-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="113-1" name="masterbedroom" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['masterbedroom']) {?> checked<?php }?>><label for="113-1">Master bedroom</label> <span class="count" id="113-1-count">(0)</span>
									</li>
								</ul>
							</div>
						</li>
						<li>
							<div>
								<input type="checkbox" id="59-1" name="kuchniaodfrontu" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['kuchniaodfrontu']) {?> checked<?php }?>><label for="59-1">Kuchnia od frontu</label> <span class="count" id="59-1-count">(0)</span>
								<div class="fright">
									<input type="checkbox" id="60-1" name="kuchniaodogrodu" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['kuchniaodogrodu']) {?> checked<?php }?>><label for="60-1">Kuchnia od ogrodu</label> <span class="count" id="60-1-count">(0)</span>
								</div>
							</div>
						</li>
						<li>
							<div>
								<input type="checkbox" id="c19-1" name="kotlownia" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['kotlownia']) {?> checked<?php }?>><label for="c19-1">Kotłownia na paliwo stałe</label> <span class="count" id="c19-1-count">(0)</span>
								<div class="fright">
									<input type="checkbox" id="67-1" name="zadaszonytaras" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['zadaszonytaras']) {?> checked<?php }?>><label for="67-1">Zadaszony taras</label> <span class="count" id="67-1-count">(0)</span>
								</div>
							</div>
						</li>
						<li class="half-spaced">
							<div>
								<input type="checkbox" id="94-1" name="antresola" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['antresola']) {?> checked<?php }?>><label for="94-1">Otwarta przestrzeń</label> <span class="count" id="94-1-count">(0)</span>
								<div class="fright">
									<input type="checkbox" id="119-1" name="osobnewc" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['osobnewc']) {?> checked<?php }?>><label for="119-1">Osobne w.c.</label> <span class="count" id="119-1-count">(0)</span>
								</div>
							</div>
						</li>
						<li>
							<p class="head">Garaż</p>
							<div>
								<input type="radio" id="78-0" name="garaz" value="0"><label for="78-0" class="spaced">Dowolnie</label>
								<input type="radio" id="78-1" name="garaz" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['garaz'] == 1) {?> checked<?php }?>><label for="78-1">1 stanowisko</label> <span class="count" id="78-1-count">(0)</span>
								<input type="radio" id="78-2" name="garaz" value="2"<?php if ($_smarty_tpl->tpl_vars['request']->value['garaz'] == 2) {?> checked<?php }?>><label for="78-2">2 i więcej</label> <span class="count" id="78-2-count">(0)</span>
								<input type="radio" id="78-3" name="garaz" value="3"<?php if ($_smarty_tpl->tpl_vars['request']->value['garaz'] == 3) {?> checked<?php }?>><label for="78-3">nie</label> <span class="count" id="78-3-count">(0)</span>
							</div>
						</li>
						<li class="half-spaced">
							<p class="head">Piwnica</p>
							<div>
								<input type="radio" id="2-0" name="piwnica" value="0"><label for="2-0" class="spaced">Dowolnie</label>
								<input type="radio" id="2-1" name="piwnica" value="1"<?php if ($_smarty_tpl->tpl_vars['request']->value['piwnica'] == 1) {?> checked<?php }?>><label for="2-1">tak</label> <span class="count" id="2-1-count">(0)</span>
								<input type="radio" id="2-2" name="piwnica" value="2"<?php if ($_smarty_tpl->tpl_vars['request']->value['piwnica'] == 2) {?> checked<?php }?>><label for="2-2">nie</label> <span class="count" id="2-2-count">(0)</span>
							</div>
						</li>
						<li>
							<button id="cs-reset" class="wired">Resetuj wyszukiwarkę</button>
							<button id="cs-fetch" class="baton">Pokaż projekty</button>
							<p id="data-read" style="display: none;">trwa wczytywanie danych</p>
						</li>
					</ul>
				</div>
			</form>
		</div>
	</div>
	<button type="button" id="cs-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>
<!-- Swiper JS -->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/jquery.json-2.3.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/enquire.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/storage.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/clicksearch.js?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/common.js?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"><?php echo '</script'; ?>
>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['js_includes']->value, '_js');
$_smarty_tpl->tpl_vars['_js']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_js']->value) {
$_smarty_tpl->tpl_vars['_js']->do_else = false;
?>
	<?php echo '<script'; ?>
 src="/js/<?php echo $_smarty_tpl->tpl_vars['_js']->value;?>
"><?php echo '</script'; ?>
>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['js_lazy']->value, '_js');
$_smarty_tpl->tpl_vars['_js']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_js']->value) {
$_smarty_tpl->tpl_vars['_js']->do_else = false;
?>
	<?php echo '<script'; ?>
 src="/js/<?php echo $_smarty_tpl->tpl_vars['_js']->value;?>
"><?php echo '</script'; ?>
>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if (!$_smarty_tpl->tpl_vars['isMobile']->value) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['js_lazy_nomobie']->value, '_js');
$_smarty_tpl->tpl_vars['_js']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_js']->value) {
$_smarty_tpl->tpl_vars['_js']->do_else = false;
?>
	<?php echo '<script'; ?>
 src="/js/<?php echo $_smarty_tpl->tpl_vars['_js']->value;?>
"><?php echo '</script'; ?>
>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>

<!-- Facebook Pixel Code -->

<?php echo '<script'; ?>
>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '164344025487761');
fbq('track', 'PageView');
<?php echo '</script'; ?>
>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=164344025487761&ev=PageView&noscript=1"
/></noscript>

<!-- End Facebook Pixel Code -->



<?php if (!$_smarty_tpl->tpl_vars['nochat']->value) {?>
<!--Start of Tawk.to Script-->
<?php echo '<script'; ?>
 type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/56af3eb5fe87529955d6aa03/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
<?php echo '</script'; ?>
>
<!--End of Tawk.to Script-->

<?php }
}
}
