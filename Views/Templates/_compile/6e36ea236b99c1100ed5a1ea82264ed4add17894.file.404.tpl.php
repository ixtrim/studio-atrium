<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 08:41:00
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19260386362b0329c773a45-92063335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e36ea236b99c1100ed5a1ea82264ed4add17894' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/404.tpl',
      1 => 1499345169,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19260386362b0329c773a45-92063335',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0329c777170_10801726',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0329c777170_10801726')) {function content_62b0329c777170_10801726($_smarty_tpl) {?><div class="list-header">
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
<p>Jeżeli uważasz, że powinna się ona jednak tu znajdować, koniecznie <a href="<?php if ($_smarty_tpl->tpl_vars['user']->value){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message'),$_smarty_tpl);?>
<?php }else{ ?>javascript:<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['user']->value){?> class="consultant"<?php }?>>skontaktuj się z nami!</a></p>
</article>
</div>
</div><?php }} ?>