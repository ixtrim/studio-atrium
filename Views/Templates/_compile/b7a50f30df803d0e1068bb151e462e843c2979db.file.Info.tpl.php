<?php /* Smarty version Smarty-3.1.11, created on 2022-06-22 15:02:39
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Catalog/Info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55979694662b32f0f13fbb9-19608350%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7a50f30df803d0e1068bb151e462e843c2979db' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Catalog/Info.tpl',
      1 => 1611062813,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55979694662b32f0f13fbb9-19608350',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'isPayAvailable' => 0,
    'request' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b32f0f14b448_98625536',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b32f0f14b448_98625536')) {function content_62b32f0f14b448_98625536($_smarty_tpl) {?><div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Nasz katalog domów</h1>
			</div>
		</div>
	</div>
</div>

<div class="options">
	<div class="box">
		<ul>
			<li><div><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'catalog','action'=>'form'),$_smarty_tpl);?>
"><span class="free">Bezpłatny</span></a></div></li>
			<li class="selected"><div><a href="/katalog-projektow-online.html"><span class="free">Online</span></a></div></li>
			<?php if ($_smarty_tpl->tpl_vars['isPayAvailable']->value==1){?><li><div><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'catalog','action'=>'form_pay'),$_smarty_tpl);?>
"><span class="nonfree" id="similiar">Płatny</span></a></div></li><?php }?>
		</ul>
	</div>
</div>

<div class="wrapper">
	<div class="box info-box">
		<p class="headline">Dziękujemy za zamówienie katalogu projektów!</p>
		<?php if ($_smarty_tpl->tpl_vars['request']->value['ref']=='platny'){?>
			<p>Na adres e-mail podany przez Ciebie podczas zamówienia, wysłana została wiadomość z podsumowaniem zamówienia i danymi do przelewu.</p>
			<p>Jeżeli do 30 minut nie otrzymasz wiadomości, sprawdź folder SPAM. Zawsze możesz także <?php if ($_smarty_tpl->tpl_vars['user']->value){?><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message'),$_smarty_tpl);?>
"><?php }else{ ?><a href="javascript:" class="consultant"><?php }?>skontaktować się z nami</a>.</p>
			<p>Katalog zostanie wysłany niezwłocznie po otrzymaniu potwierdzenia przelewu.</p>
		<?php }else{ ?>
			<p>Na adres e-mail podany przez Ciebie podczas zamówienia, wysłana została wiadomość z podsumowaniem zamówienia bezpłatnego katalogu.</p>
			<p>Katalog zostanie wysłany pocztą w ciągu 7 dni roboczych. Jeżeli w ciągu 2 tygodni nie otrzymasz katalogu, <?php if ($_smarty_tpl->tpl_vars['user']->value){?><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message'),$_smarty_tpl);?>
">skontaktuj się z nami</a><?php }else{ ?><a href="javascript:" class="consultant">skontaktuj się z nami</a><?php }?>.</p>
		<?php }?>
	</div>
</div>

<!-- Google Code for ZAM&Oacute;WIENIA Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1069647440;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "xGJGCLydpAIQ0IyG_gM";
var google_conversion_value = 1;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1069647440/?value=1500&amp;label=CdHhCOzT5wMQ0IyG_gM&amp;guid=ON&amp;script=0"/>
</div>
</noscript><?php }} ?>