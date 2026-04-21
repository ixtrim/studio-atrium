<?php /* Smarty version Smarty-3.1.11, created on 2025-12-23 12:43:41
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Catalog/Online.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73010007662b0307316a188-68794622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a07e93f49dd8a223875d6f6cadc081de0f07cb29' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Catalog/Online.tpl',
      1 => 1766493698,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73010007662b0307316a188-68794622',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0307316eb13_35789072',
  'variables' => 
  array (
    'isPayAvailable' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0307316eb13_35789072')) {function content_62b0307316eb13_35789072($_smarty_tpl) {?><div class="list-header">
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
		<p class="headline">Katalog projektów online</p>
		<p>W trosce o nasze środowisko oraz z uwagi na zaistniałą sytuację epidemiologiczną, najnowszy katalog z cyklu "Domy w Tradycji" ukazał się jedynie w wersji online, jako katalog PDF do przeglądania online lub pobrania. 
		<a href="https://media.studioatrium.pl/document/1447/DWT73.pdf" target="_blank">Pobierz plik pdf</a> bądź skorzystaj z poniższej przeglądarki i zapoznaj się z naszą najnowszą propozycją projektową wygodnie na swoim komputerze bądź urządzeniu mobilnym.</p>
		<div id="adobe-dc-view" style="height: 800px; width: 100%; margin-top: 30px;"></div>
		
		<script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>
		<script type="text/javascript">
			document.addEventListener("adobe_dc_view_sdk.ready", function(){ 
				var adobeDCView = new AdobeDC.View({clientId: "63f3b0e271164b76ad5a53eb96a1188f", divId: "adobe-dc-view"});
				adobeDCView.previewFile({
					content:{location: {url: "https://www.studioatrium.pl/dwt/DWT73.pdf"}},
					metaData:{fileName: "studioAtrium-katalog.pdf"}
				}, {defaultViewMode: "FIT_PAGE", showAnnotationTools: false});
			});
		</script>
		
	</div>
</div><?php }} ?>