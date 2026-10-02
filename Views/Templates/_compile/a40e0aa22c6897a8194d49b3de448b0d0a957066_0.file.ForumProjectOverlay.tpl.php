<?php
/* Smarty version 3.1.48, created on 2026-10-02 15:17:33
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/ForumProjectOverlay.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abfaeedb8afc3_04463214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a40e0aa22c6897a8194d49b3de448b0d0a957066' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/ForumProjectOverlay.tpl',
      1 => 1790946372,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abfaeedb8afc3_04463214 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="overlay forum-project-overlay">
	<div class="overlay-project-box" id="over-pop">
		<div id="over-img-box">
			<ul id="over-pics">
				<li><span id="over-render" class="selected">Wizualizacja</span></li>
				<li><span id="over-ground" class="noview">Rzut parteru</span></li>
				<li><span id="over-floor" class="noview">Rzut piętra</span></li>
				<li><span id="over-loft" class="noview">Rzut poddasza</span></li>
			</ul>
			<a href="">
				<img class="preload" id="over-img" src="/img/dummy.png" alt="Render">
			</a>
		</div>
		<ul id="over-params">
			<li><h6 id="over-name"></h6></li>
			<li class="small"><span id="over-txt"></span></li>
			<li><span id="over-version"></span></li>
			<li><p>ilość pokoi: <span id="over-rooms"></span></p></li>
			<li><p>powierzchnia użytkowa: <strong id="over-area"></strong> m<sup>2</sup></p></li>
			<li><p>min. wymiary działki: <span id="over-parcel"></span> m</p></li>
			<li><p>wysokość budynku: <span id="over-height"></span> m</p></li>
			<li><p>kąt nachylenia dachu: <span id="over-angle"></span></p></li>
			<li><p>cena projektu: <span id="over-price"></span> zł</p></li>
			<li><a href="" class="more">Zobacz szczegóły</a></li>
		</ul>
	</div>
	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div>
<?php }
}
