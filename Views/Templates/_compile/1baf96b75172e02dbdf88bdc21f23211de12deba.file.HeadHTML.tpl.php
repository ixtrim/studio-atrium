<?php /* Smarty version Smarty-3.1.11, created on 2023-11-23 14:09:23
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Layout/HeadHTML.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203150382464217a68717c39-35262684%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1baf96b75172e02dbdf88bdc21f23211de12deba' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Layout/HeadHTML.tpl',
      1 => 1700748390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203150382464217a68717c39-35262684',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_64217a68742013_05234685',
  'variables' => 
  array (
    'pageTitle' => 0,
    'isLocal' => 0,
    'pageMetaDescription' => 0,
    'noindex' => 0,
    'noindexNofollow' => 0,
    'ogTags' => 0,
    'key' => 0,
    'value' => 0,
    'canonicalUrl' => 0,
    'prevUrl' => 0,
    'nextUrl' => 0,
    'img_preload' => 0,
    '_imgpre' => 0,
    'version' => 0,
    'css_includes' => 0,
    '_css' => 0,
    'dynamic_css' => 0,
    'js_includes' => 0,
    '_js' => 0,
    'pinterest' => 0,
    'showSchemaOrganization' => 0,
    'showSchemaBrand' => 0,
    'schemaBreadcrumbs' => 0,
    'cKey' => 0,
    'cramb' => 0,
    'schemaProduct' => 0,
    'showSearchSchema' => 0,
    'mobileGoogleSearch' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64217a68742013_05234685')) {function content_64217a68742013_05234685($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pageTitle']->value){?>
	<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
<?php }else{ ?>
	<title>Projekty domów - STUDIO ATRIUM - Gotowe projekty domów jednorodzinnych parterowych i z poddaszem, garaże.</title>
<?php }?>

<link rel="preconnect" href="https://media.studioatrium.pl">
<link rel="preconnect" href="https://ajax.googleapis.com">


<?php if (!$_smarty_tpl->tpl_vars['isLocal']->value){?>
<link rel="dns-prefetch" href="https://www.googletagmanager.com">
<link rel="preconnect" href="https://www.googletagmanager.com">
<!-- Google Tag Manager -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5X8XP43');</script>

<!-- End Google Tag Manager -->
	
<!-- Global site tag (gtag.js) - Google Ads: 1069647440 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-1069647440"></script>
<script>

  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-1069647440');

</script>

<?php }?>
<meta name="p:domain_verify" content="46eb45dafec5620ae0746f34b1c0c299">
<meta name="google-site-verification" content="N4VPO2yZZ3HL2Yegp8cAdQAsZ4Xj17gVs1vtLramZcY" /> 
<meta name="theme-color" content="#cc1000">
<link rel="shortcut icon" type="image/icon" href="/img/favicon.ico">
<link rel="manifest" href="/manifest.json">
<link rel="apple-touch-icon" href="/img/logo144.png">
<meta name="apple-mobile-web-app-status-bar" content="#cc1000">

<?php if ($_smarty_tpl->tpl_vars['pageMetaDescription']->value){?>
	<meta name="description" content="<?php echo trim($_smarty_tpl->tpl_vars['pageMetaDescription']->value);?>
">
<?php }else{ ?>
	<meta name="description" content="">
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['noindex']->value){?>
	<meta name="robots" content="noindex, follow">
<?php }elseif($_smarty_tpl->tpl_vars['noindexNofollow']->value){?>
	<meta name="robots" content="noindex, nofollow">	
<?php }else{ ?>
	<meta name="robots" content="index, follow">
<?php }?>
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if ($_smarty_tpl->tpl_vars['ogTags']->value){?>
	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ogTags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
	<meta property="og:<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" content="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
">
	<?php } ?>
<?php }?>

<meta name="google-play-app" content="app-id=pl.studioatrium.studioatrium">

<?php if ($_smarty_tpl->tpl_vars['canonicalUrl']->value){?>
	<link rel="canonical" href="<?php echo $_smarty_tpl->tpl_vars['canonicalUrl']->value;?>
">
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['prevUrl']->value){?>
	<link rel="prev" href="<?php echo $_smarty_tpl->tpl_vars['prevUrl']->value;?>
">
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['nextUrl']->value){?>
	<link rel="next" href="<?php echo $_smarty_tpl->tpl_vars['nextUrl']->value;?>
">
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['img_preload']->value){?>
	<?php  $_smarty_tpl->tpl_vars['_imgpre'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_imgpre']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['img_preload']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_imgpre']->key => $_smarty_tpl->tpl_vars['_imgpre']->value){
$_smarty_tpl->tpl_vars['_imgpre']->_loop = true;
?>
		<link rel="preload" fetchpriority="high" as="image" href="<?php echo $_smarty_tpl->tpl_vars['_imgpre']->value;?>
" type="image/webp">
	<?php } ?>
<?php }?>

<link rel="dns-prefetch" href="https://media.studioatrium.pl">
<link rel="dns-prefetch" href="https://ajax.googleapis.com">


<link rel="preload" href="/css/common.min.css?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" as="style">
<link rel="stylesheet" href="/css/common.min.css?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">

<?php  $_smarty_tpl->tpl_vars['_css'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_css']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['css_includes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_css']->key => $_smarty_tpl->tpl_vars['_css']->value){
$_smarty_tpl->tpl_vars['_css']->_loop = true;
?>
	<link rel="preload" href="/css/<?php echo $_smarty_tpl->tpl_vars['_css']->value;?>
" as="style">
	<link rel="stylesheet" href="/css/<?php echo $_smarty_tpl->tpl_vars['_css']->value;?>
">
<?php } ?>

<?php if ($_smarty_tpl->tpl_vars['dynamic_css']->value){?>
	<link rel="preload" href="<?php echo $_smarty_tpl->tpl_vars['dynamic_css']->value;?>
" as="style">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['dynamic_css']->value;?>
">
<?php }?>
<link rel="preload"  href="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" as="script">
<link rel="preload"  href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" as="script">
<link rel="preload" href="/js/jquery.json-2.3.min.js" as="script">
<script async defer src="/js/underscore.js"></script>
<link rel="preload"  href="/js/enquire.min.js" as="script">
<link rel="preload" href="/js/storage.js" as="script">
<link rel="preload" href="/js/clicksearch.js?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" as="script">
<link rel="preload" href="/js/common.js?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" as="script">
<?php  $_smarty_tpl->tpl_vars['_js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_includes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_js']->key => $_smarty_tpl->tpl_vars['_js']->value){
$_smarty_tpl->tpl_vars['_js']->_loop = true;
?>
	<link rel="preload" href="/js/<?php echo $_smarty_tpl->tpl_vars['_js']->value;?>
" as="script">
<?php } ?>

<script src="https://apis.google.com/js/platform.js" async defer>{lang: 'pl'}</script>

<?php if ($_smarty_tpl->tpl_vars['pinterest']->value){?>
	<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
<?php }?>

<link rel="preload" as="font" type="font/woff2" href="/fonts/LatoLatin-Regular.woff2" crossorigin>
<link rel="preload" as="font" type="font/woff2" href="/fonts/LatoLatin-Light.woff2" crossorigin>

<?php if ($_smarty_tpl->tpl_vars['showSchemaOrganization']->value){?>
	
	<script type="application/ld+json">{
		"@context": "https://schema.org",
		"@type":"Organization",
		"name":"Studio Atrium - Projekty domów",
		"description":"Studio projektowe Atrium - Gotowe projekty domów - Domy parterowe, piętrowe, z poddaszem. O różnej powierzchni. Ponad 1400 projektów. Zapewniamy doradztwo ekspertów.",
		"telephone":"33 822 94 96",
		"email":"atrium@studioatrium.pl",
		"url":"https://www.studioatrium.pl/",
		"logo":"https://www.studioatrium.pl/img/logo.png", 
		"address":[{
			"@type":"PostalAddress",
			"streetAddress":"Malczewskiego 1",
			"addressLocality":"Bielsko-Biała",
			"postalCode":"43-300",
			"addressCountry":"PL"
		}],
		"sameAs":[
			"https://www.facebook.com/studioatrium",
			"https://pl.pinterest.com/studioatrium/",
			"https://www.youtube.com/user/StudioAtrium"
		]
}</script>

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['showSchemaBrand']->value){?>
	
	<script type="application/ld+json">{
		"@context": "https://schema.org",
		"@type":"Brand",
		"name":"Studio Atrium - Gotowe Projekty Domów",
		"description":"Biuro projektowe Studio Atrium. Oferujemy ponad 1400 gotowych projektów domów, projekty domów parterowych, piętrowych, z poddaszem i innych. Zapewniamy doradztwo ekspertów z branży."
}</script>

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['schemaBreadcrumbs']->value){?>

	<script type="application/ld+json">{
		"@context":"http://schema.org",
		"@type":"BreadcrumbList",
		"itemListElement":[
			<?php  $_smarty_tpl->tpl_vars['cramb'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cramb']->_loop = false;
 $_smarty_tpl->tpl_vars['cKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['schemaBreadcrumbs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cramb']->key => $_smarty_tpl->tpl_vars['cramb']->value){
$_smarty_tpl->tpl_vars['cramb']->_loop = true;
 $_smarty_tpl->tpl_vars['cKey']->value = $_smarty_tpl->tpl_vars['cramb']->key;
?>
			<?php if ($_smarty_tpl->tpl_vars['cKey']->value>1){?>,<?php }?>{"@type":"ListItem",
			"position":<?php echo $_smarty_tpl->tpl_vars['cKey']->value;?>
,
			"item":{"@id":"<?php echo $_smarty_tpl->tpl_vars['cramb']->value['id'];?>
","name":"<?php echo $_smarty_tpl->tpl_vars['cramb']->value['name'];?>
"}}
			<?php } ?>
		]}</script>

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['schemaProduct']->value){?>

	<script type="application/ld+json">{
        "@context": "http://schema.org",
        "@type": "Product",
        "name": "<?php echo $_smarty_tpl->tpl_vars['schemaProduct']->value['name'];?>
",
        "image": "<?php echo $_smarty_tpl->tpl_vars['schemaProduct']->value['image'];?>
",
        "description": "<?php echo $_smarty_tpl->tpl_vars['schemaProduct']->value['description'];?>
",
        "brand": "Studio Atrium - Gotowe Projekty Domów",
        "offers": {
          "@type": "Offer",
          "priceCurrency": "PLN",
          "price": "<?php echo $_smarty_tpl->tpl_vars['schemaProduct']->value['price'];?>
",
		  <?php if ($_smarty_tpl->tpl_vars['schemaProduct']->value['priceValid']){?>"priceValidUntil": "<?php echo $_smarty_tpl->tpl_vars['schemaProduct']->value['priceValid'];?>
",<?php }?>
		  "url": "<?php echo $_smarty_tpl->tpl_vars['schemaProduct']->value['url'];?>
",
          "itemCondition": "http://schema.org/NewCondition",
          "availability": "http://schema.org/InStock",
          "seller": {
            "@type": "Organization",
            "name": "Studio Atrium"
          }
        }
      }
    </script>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['showSearchSchema']->value&&$_smarty_tpl->tpl_vars['mobileGoogleSearch']->value){?>

	<script type="application/ld+json">{
        "@context": "http://schema.org",
		"@type":"ItemList",
		"ItemListElement": [
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mobileGoogleSearch']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
?>{
			"@type": "ListItem",
			"position": <?php echo $_smarty_tpl->tpl_vars['item']->iteration;?>
,
			"name":"<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
",
			"url":"https://www.studioatrium.pl<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['item']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['item']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
"
			}<?php if (!$_smarty_tpl->tpl_vars['item']->last){?>,<?php }?>
		<?php } ?>
		]
      }
    </script>

<?php }?>
<?php }} ?>