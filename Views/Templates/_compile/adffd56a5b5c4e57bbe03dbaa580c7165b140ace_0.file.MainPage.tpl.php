<?php
/* Smarty version 4.5.6, created on 2026-08-23 19:49:19
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/MainPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_6a8b4ebf0e3eb1_75562633',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'adffd56a5b5c4e57bbe03dbaa580c7165b140ace' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/MainPage.tpl',
      1 => 1782217527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a8b4ebf0e3eb1_75562633 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="overlay">
	<div class="overlay-project-box" id="over-pop">
		<div id="over-img-box">
			<ul id="over-pics">
				<li><span id="over-render" class="selected">Wizualizacja</span></li>
				<li><span id="over-ground" class="noview">Rzut parteru</span></li>
				<li><span id="over-floor" class="noview">Rzut piętra</span></li>
				<li><span id="over-loft" class="noview">Rzut poddasza</span></li>
			</ul>
			<a href="">
				<img class="preload" id="over-img" src="/img/dummy.png" width="1350" height="900" alt="Render">
			</a>
		</div>

		<ul id="over-params">
			<li>
				<h6 id="over-name"></h6>
			</li>
			<li class="small"><span id="over-txt"></span></li>
			<li><span id="over-version"></span></li>
			<li>
				<p>ilość pokoi: <span id="over-rooms"></span></p>
			</li>
			<li>
				<p>powierzchnia użytkowa: <strong id="over-area"></strong> m<sup>2</sup></p>
			</li>
			<li>
				<p>min. wymiary działki: <span id="over-parcel"></span> m</p>
			</li>
			<li>
				<p>wysokość budynku: <span id="over-height"></span> m</p>
			</li>
			<li>
				<p>kąt nachylenia dachu: <span id="over-angle"></span></p>
			</li>
			<li>
				<p>cena projektu: <span id="over-price"></span> zł</p>
			</li>
			<li><a href="" class="more">Zobacz szczegóły</a></li>
		</ul>

		<button type="button" class="overlay-change prev" id="prev-overlay">poprzedni</button>
		<button type="button" class="overlay-change next" id="next-overlay">następny</button>
	</div>

	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div><?php }
}
