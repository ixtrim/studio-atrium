<?php
/* Smarty version 4.5.6, created on 2026-05-27 16:43:08
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Layout/HeadHTML.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_6a1702fc9cada8_54368874',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2caf7189cf71a0154ad77cc024aa442356349989' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Layout/HeadHTML.tpl',
      1 => 1779892856,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a1702fc9cada8_54368874 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['pageTitle']->value) {?>
	<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
<?php } else { ?>
	<title>Projekty domów - STUDIO ATRIUM - Gotowe projekty domów jednorodzinnych parterowych i z poddaszem, garaże.</title>
<?php }?>

<link rel="preconnect" href="https://media.studioatrium.pl">
<link rel="preconnect" href="https://ajax.googleapis.com">

<?php if (!$_smarty_tpl->tpl_vars['isLocal']->value) {?>
<link rel="dns-prefetch" href="https://www.googletagmanager.com">
<link rel="preconnect" href="https://www.googletagmanager.com">
<!-- Google Tag Manager -->

<?php echo '<script'; ?>
>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5X8XP43');<?php echo '</script'; ?>
>

<!-- End Google Tag Manager -->
	
<!-- Global site tag (gtag.js) - Google Ads: 1069647440 -->
<?php echo '<script'; ?>
 async src="https://www.googletagmanager.com/gtag/js?id=AW-1069647440"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>

  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-1069647440');

<?php echo '</script'; ?>
>

<?php }?>
<meta name="p:domain_verify" content="46eb45dafec5620ae0746f34b1c0c299">
<meta name="google-site-verification" content="N4VPO2yZZ3HL2Yegp8cAdQAsZ4Xj17gVs1vtLramZcY" /> <meta name="theme-color" content="#cc1000">
<link rel="shortcut icon" type="image/icon" href="/img/favicon.ico">
<link rel="manifest" href="/manifest.json">
<link rel="apple-touch-icon" href="/img/logo144.png">
<meta name="apple-mobile-web-app-status-bar" content="#cc1000">

<?php if ($_smarty_tpl->tpl_vars['pageMetaDescription']->value) {?>
	<meta name="description" content="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'trim' ][ 0 ], array( $_smarty_tpl->tpl_vars['pageMetaDescription']->value ));?>
">
<?php } else { ?>
	<meta name="description" content="">
<?php }
if ($_smarty_tpl->tpl_vars['noindex']->value) {?>
	<meta name="robots" content="noindex, follow">
<?php } elseif ($_smarty_tpl->tpl_vars['noindexNofollow']->value) {?>
	<meta name="robots" content="noindex, nofollow">	
<?php } else { ?>
	<meta name="robots" content="index, follow">
<?php }?>
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if ($_smarty_tpl->tpl_vars['ogTags']->value) {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ogTags']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
	<meta property="og:<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" content="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
">
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>

<meta name="google-play-app" content="app-id=pl.studioatrium.studioatrium">

<?php if ($_smarty_tpl->tpl_vars['canonicalUrl']->value) {?>
	<link rel="canonical" href="<?php echo $_smarty_tpl->tpl_vars['canonicalUrl']->value;?>
">
<?php }
if ($_smarty_tpl->tpl_vars['prevUrl']->value) {?>
	<link rel="prev" href="<?php echo $_smarty_tpl->tpl_vars['prevUrl']->value;?>
">
<?php }
if ($_smarty_tpl->tpl_vars['nextUrl']->value) {?>
	<link rel="next" href="<?php echo $_smarty_tpl->tpl_vars['nextUrl']->value;?>
">
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['img_preload']->value) {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['img_preload']->value, '_imgpre');
$_smarty_tpl->tpl_vars['_imgpre']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_imgpre']->value) {
$_smarty_tpl->tpl_vars['_imgpre']->do_else = false;
?>
		<link rel="preload" fetchpriority="high" as="image" href="<?php echo $_smarty_tpl->tpl_vars['_imgpre']->value;?>
" type="image/webp">
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>

<link rel="dns-prefetch" href="https://media.studioatrium.pl">
<link rel="dns-prefetch" href="https://ajax.googleapis.com">


<link rel="preload" href="/css/common.min.css?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" as="style">
<link rel="stylesheet" href="/css/common.min.css?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['css_includes']->value, '_css');
$_smarty_tpl->tpl_vars['_css']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_css']->value) {
$_smarty_tpl->tpl_vars['_css']->do_else = false;
?>
	<link rel="preload" href="/css/<?php echo $_smarty_tpl->tpl_vars['_css']->value;?>
" as="style">
	<link rel="stylesheet" href="/css/<?php echo $_smarty_tpl->tpl_vars['_css']->value;?>
">
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php if ($_smarty_tpl->tpl_vars['dynamic_css']->value) {?>
	<link rel="preload" href="<?php echo $_smarty_tpl->tpl_vars['dynamic_css']->value;?>
" as="style">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['dynamic_css']->value;?>
">
<?php }?>
<link rel="preload"  href="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" as="script">
<link rel="preload"  href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" as="script">
<link rel="preload" href="/js/jquery.json-2.3.min.js" as="script">
<?php echo '<script'; ?>
 async defer src="/js/underscore.js"><?php echo '</script'; ?>
>
<link rel="preload"  href="/js/enquire.min.js" as="script">
<link rel="preload" href="/js/storage.js" as="script">
<link rel="preload" href="/js/clicksearch.js?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" as="script">
<link rel="preload" href="/js/common.js?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
" as="script">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['js_includes']->value, '_js');
$_smarty_tpl->tpl_vars['_js']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_js']->value) {
$_smarty_tpl->tpl_vars['_js']->do_else = false;
?>
	<link rel="preload" href="/js/<?php echo $_smarty_tpl->tpl_vars['_js']->value;?>
" as="script">
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php echo '<script'; ?>
 src="https://apis.google.com/js/platform.js" async defer>{lang: 'pl'}<?php echo '</script'; ?>
>

<?php if ($_smarty_tpl->tpl_vars['pinterest']->value) {?>
	<?php echo '<script'; ?>
 type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"><?php echo '</script'; ?>
>
<?php }?>

<link rel="preload" as="font" type="font/woff2" href="/fonts/LatoLatin-Regular.woff2" crossorigin>
<link rel="preload" as="font" type="font/woff2" href="/fonts/LatoLatin-Light.woff2" crossorigin>

<?php if ($_smarty_tpl->tpl_vars['showSchemaOrganization']->value) {?>
	
	<?php echo '<script'; ?>
 type="application/ld+json">{
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
}<?php echo '</script'; ?>
>

<?php }
if ($_smarty_tpl->tpl_vars['showSchemaBrand']->value) {?>
	
	<?php echo '<script'; ?>
 type="application/ld+json">{
		"@context": "https://schema.org",
		"@type":"Brand",
		"name":"Studio Atrium - Gotowe Projekty Domów",
		"description":"Biuro projektowe Studio Atrium. Oferujemy ponad 1400 gotowych projektów domów, projekty domów parterowych, piętrowych, z poddaszem i innych. Zapewniamy doradztwo ekspertów z branży."
}<?php echo '</script'; ?>
>

<?php }
if ($_smarty_tpl->tpl_vars['schemaBreadcrumbs']->value) {?>

	<?php echo '<script'; ?>
 type="application/ld+json">{
		"@context":"http://schema.org",
		"@type":"BreadcrumbList",
		"itemListElement":[
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['schemaBreadcrumbs']->value, 'cramb', false, 'cKey');
$_smarty_tpl->tpl_vars['cramb']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cKey']->value => $_smarty_tpl->tpl_vars['cramb']->value) {
$_smarty_tpl->tpl_vars['cramb']->do_else = false;
?>
			<?php if ($_smarty_tpl->tpl_vars['cKey']->value > 1) {?>,<?php }?>{"@type":"ListItem",
			"position":<?php echo $_smarty_tpl->tpl_vars['cKey']->value;?>
,
			"item":{"@id":"<?php echo $_smarty_tpl->tpl_vars['cramb']->value['id'];?>
","name":"<?php echo $_smarty_tpl->tpl_vars['cramb']->value['name'];?>
"}}
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		]}<?php echo '</script'; ?>
>

<?php }
if ($_smarty_tpl->tpl_vars['schemaProduct']->value) {?>

	<?php echo '<script'; ?>
 type="application/ld+json">{
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
		  <?php if ($_smarty_tpl->tpl_vars['schemaProduct']->value['priceValid']) {?>"priceValidUntil": "<?php echo $_smarty_tpl->tpl_vars['schemaProduct']->value['priceValid'];?>
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
    <?php echo '</script'; ?>
>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['showSearchSchema']->value && $_smarty_tpl->tpl_vars['mobileGoogleSearch']->value) {?>

	<?php echo '<script'; ?>
 type="application/ld+json">{
        "@context": "http://schema.org",
		"@type":"ItemList",
		"ItemListElement": [
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mobileGoogleSearch']->value, 'item', true);
$_smarty_tpl->tpl_vars['item']->iteration = 0;
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['item']->iteration++;
$_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
$__foreach_item_5_saved = $_smarty_tpl->tpl_vars['item'];
?>{
			"@type": "ListItem",
			"position": <?php echo $_smarty_tpl->tpl_vars['item']->iteration;?>
,
			"name":"<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
",
			"url":"https://www.studioatrium.pl<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['item']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['item']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
"
			}<?php if (!$_smarty_tpl->tpl_vars['item']->last) {?>,<?php }?>
		<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_5_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		]
      }
    <?php echo '</script'; ?>
>

<?php }?>

<!-- Tailwind CSS -->
<?php echo '<script'; ?>
 src="https://cdn.tailwindcss.com"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>tailwind.config = { corePlugins: { preflight: false } }<?php echo '</script'; ?>
>
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css">
<!-- Brand design tokens -->
<style>
:root {
	--brand-red: oklch(0.62 0.22 27);
	--brand-blue: oklch(0.74 0.11 232);
	--brand-blue-strong: oklch(0.66 0.13 232);
	--brand-dark: oklch(0.30 0.012 250);
	--brand-darker: oklch(0.24 0.012 250);
	--brand-orange: oklch(0.78 0.13 65);
}
</style>
<?php }
}
