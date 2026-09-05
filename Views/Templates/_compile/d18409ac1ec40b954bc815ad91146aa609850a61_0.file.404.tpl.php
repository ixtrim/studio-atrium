<?php
/* Smarty version 3.1.48, created on 2026-09-05 08:19:29
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a9bb471957003_10275909',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd18409ac1ec40b954bc815ad91146aa609850a61' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/404.tpl',
      1 => 1776175192,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a9bb471957003_10275909 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Błąd 404</h1>
			</div>
		</div>
	</div>
</div>
<div class="wrapper">
	<div class="box">
<article>
<h2>Nie znaleziono strony</h2>
<p>Niestety nie udało znaleźć się nam szukanej przez Ciebie strony serwisu.</p>
<p>Jeżeli uważasz, że powinna się ona jednak tu znajdować, koniecznie <a href="<?php if ($_smarty_tpl->tpl_vars['user']->value) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'panel','action'=>'message'),$_smarty_tpl ) );
} else { ?>javascript:<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['user']->value) {?> class="consultant"<?php }?>>skontaktuj się z nami!</a></p>
</article>
</div>
</div><?php }
}
