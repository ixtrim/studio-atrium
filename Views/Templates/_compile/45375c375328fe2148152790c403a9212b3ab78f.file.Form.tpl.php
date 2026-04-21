<?php /* Smarty version Smarty-3.1.11, created on 2024-11-14 12:34:46
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Contact/Form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8052978046638dc225b2dd6-88091922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45375c375328fe2148152790c403a9212b3ab78f' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Contact/Form.tpl',
      1 => 1731587663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8052978046638dc225b2dd6-88091922',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_6638dc225b6c30_91196119',
  'variables' => 
  array (
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6638dc225b6c30_91196119')) {function content_6638dc225b6c30_91196119($_smarty_tpl) {?><div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Kontakt</h1>
			</div>
		</div>
	</div>
</div>

<div class="wrapper">
	<div class="box">
		
		<h2>Skontaktuj się z nami</h2>
		
		<section class="info">
			<div class="box center">
				<ul>
				<li>
					<h3>Porozmawiaj z naszymi doradcami o projekcie domu dla Ciebie!</h3>
					<p>Jeśli potrzebujesz fachowej porady lub pomocy przy wyborze projektu - zadzwoń:</p>
					<p class="nr"><a href="tel:+48338229496" rel="nofollow">33 822 94 96</a></p>
					<p class="nr"><a href="tel:+48602303160" rel="nofollow">602 303 160</a></p>
					<p>Chętnie porozmawiamy z Tobą w dni robocze w godzinach <strong>8:00-17:00</strong>.<br />Jeżeli akurat nie ma nas w biurze, wyślij wiadomość na adres:</p>
					
					<p class="nr mail"><a href="mailto:atrium@studioatrium.pl">atrium@studioatrium.pl</a></p>
				
					<p>Możesz także skorzystać z naszego</p><p class="form"><span class="uline consultant">formularza kontaktowego</span></p>
				</li>
				<li>
					<div>
						<img class="lazy-image" data-uri="/img/hostess.webp" src="img/xc.png" width="388" height="390" alt="Porozmawiaj o projekcie domu">
					</div>
				</li>
				</ul>
			</div>
		</section>
		<h2>Pełne dane teleadresowe</h2>
		<div class="article-content"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fixArticleContent'][0][0]->mFixArticleContent($_smarty_tpl->tpl_vars['article']->value['content'],$_smarty_tpl->tpl_vars['article']->value['id']);?>
</div>
	</div>
</div><?php }} ?>