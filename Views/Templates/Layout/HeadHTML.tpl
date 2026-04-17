{if $pageTitle}
	<title>{$pageTitle}</title>
{else}
	<title>Projekty domów - STUDIO ATRIUM - Gotowe projekty domów jednorodzinnych parterowych i z poddaszem, garaże.</title>
{/if}

<link rel="preconnect" href="https://media.studioatrium.pl">
<link rel="preconnect" href="https://ajax.googleapis.com">

{* dodane zamiast GA w Footer na wniosek Eactive - Mateusz Sipa (2017-07-24) *}
{if !$isLocal}
<link rel="dns-prefetch" href="https://www.googletagmanager.com">
<link rel="preconnect" href="https://www.googletagmanager.com">
<!-- Google Tag Manager -->
{literal}
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5X8XP43');</script>
{/literal}
<!-- End Google Tag Manager -->
	
<!-- Global site tag (gtag.js) - Google Ads: 1069647440 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-1069647440"></script>
<script>
{literal}
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-1069647440');
{/literal}
</script>

{/if}
<meta name="p:domain_verify" content="46eb45dafec5620ae0746f34b1c0c299">
<meta name="google-site-verification" content="N4VPO2yZZ3HL2Yegp8cAdQAsZ4Xj17gVs1vtLramZcY" /> {* google merchant i studioatrium1994 *}
<meta name="theme-color" content="#cc1000">
<link rel="shortcut icon" type="image/icon" href="/img/favicon.ico">
<link rel="manifest" href="/manifest.json">
<link rel="apple-touch-icon" href="/img/logo144.png">
<meta name="apple-mobile-web-app-status-bar" content="#cc1000">

{if $pageMetaDescription}
	<meta name="description" content="{$pageMetaDescription|trim}">
{else}
	<meta name="description" content="">
{/if}
{if $noindex}
	<meta name="robots" content="noindex, follow">
{elseif $noindexNofollow}
	<meta name="robots" content="noindex, nofollow">	
{else}
	<meta name="robots" content="index, follow">
{/if}
<meta name="viewport" content="width=device-width, initial-scale=1">

{if $ogTags}
	{foreach $ogTags as $key => $value}
	<meta property="og:{$key}" content="{$value}">
	{/foreach}
{/if}

<meta name="google-play-app" content="app-id=pl.studioatrium.studioatrium">

{if $canonicalUrl}
	<link rel="canonical" href="{$canonicalUrl}">
{/if}
{if $prevUrl}
	<link rel="prev" href="{$prevUrl}">
{/if}
{if $nextUrl}
	<link rel="next" href="{$nextUrl}">
{/if}

{if $img_preload}
	{foreach $img_preload as $_imgpre}
		<link rel="preload" fetchpriority="high" as="image" href="{$_imgpre}" type="image/webp">
	{/foreach}
{/if}

<link rel="dns-prefetch" href="https://media.studioatrium.pl">
<link rel="dns-prefetch" href="https://ajax.googleapis.com">


<link rel="preload" href="/css/common.min.css?v={$version}" as="style">
<link rel="stylesheet" href="/css/common.min.css?v={$version}">

{foreach $css_includes as $_css}
	<link rel="preload" href="/css/{$_css}" as="style">
	<link rel="stylesheet" href="/css/{$_css}">
{/foreach}

{if $dynamic_css}
	<link rel="preload" href="{$dynamic_css}" as="style">
	<link rel="stylesheet" href="{$dynamic_css}">
{/if}
<link rel="preload"  href="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" as="script">
<link rel="preload"  href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" as="script">
<link rel="preload" href="/js/jquery.json-2.3.min.js" as="script">
<script async defer src="/js/underscore.js"></script>
<link rel="preload"  href="/js/enquire.min.js" as="script">
<link rel="preload" href="/js/storage.js" as="script">
<link rel="preload" href="/js/clicksearch.js?v={$version}" as="script">
<link rel="preload" href="/js/common.js?v={$version}" as="script">
{foreach $js_includes as $_js}
	<link rel="preload" href="/js/{$_js}" as="script">
{/foreach}
{literal}
<script src="https://apis.google.com/js/platform.js" async defer>{lang: 'pl'}</script>
{/literal}
{if $pinterest}
	<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
{/if}

<link rel="preload" as="font" type="font/woff2" href="/fonts/LatoLatin-Regular.woff2" crossorigin>
<link rel="preload" as="font" type="font/woff2" href="/fonts/LatoLatin-Light.woff2" crossorigin>

{if $showSchemaOrganization}
{literal}	
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
{/literal}
{/if}
{if $showSchemaBrand}
{literal}	
	<script type="application/ld+json">{
		"@context": "https://schema.org",
		"@type":"Brand",
		"name":"Studio Atrium - Gotowe Projekty Domów",
		"description":"Biuro projektowe Studio Atrium. Oferujemy ponad 1400 gotowych projektów domów, projekty domów parterowych, piętrowych, z poddaszem i innych. Zapewniamy doradztwo ekspertów z branży."
}</script>
{/literal}
{/if}
{if $schemaBreadcrumbs}
{literal}
	<script type="application/ld+json">{
		"@context":"http://schema.org",
		"@type":"BreadcrumbList",
		"itemListElement":[
			{/literal}{foreach $schemaBreadcrumbs as $cKey => $cramb}
			{if $cKey > 1},{/if}{literal}{{/literal}"@type":"ListItem",
			"position":{$cKey},
			"item":{literal}{{/literal}"@id":"{$cramb.id}","name":"{$cramb.name}"{literal}}}{/literal}
			{/foreach}
		{literal}]}</script>
{/literal}
{/if}
{if $schemaProduct}
{literal}
	<script type="application/ld+json">{
        "@context": "http://schema.org",
        "@type": "Product",
        "name": "{/literal}{$schemaProduct.name}",
        "image": "{$schemaProduct.image}",
        "description": "{$schemaProduct.description}",
        "brand": "Studio Atrium - Gotowe Projekty Domów",
        "offers": {literal}{{/literal}
          "@type": "Offer",
          "priceCurrency": "PLN",
          "price": "{$schemaProduct.price}",
		  {if $schemaProduct.priceValid}"priceValidUntil": "{$schemaProduct.priceValid}",{/if}
		  "url": "{$schemaProduct.url}",
          "itemCondition": "http://schema.org/NewCondition",
          "availability": "http://schema.org/InStock",
          "seller": {literal}{
            "@type": "Organization",
            "name": "Studio Atrium"
          }
        }
      }
    </script>
{/literal}
{/if}

{if $showSearchSchema && $mobileGoogleSearch}
{literal}
	<script type="application/ld+json">{
        "@context": "http://schema.org",
		"@type":"ItemList",
		"ItemListElement": [
		{/literal}{foreach $mobileGoogleSearch as $item}{literal}{{/literal}
			"@type": "ListItem",
			"position": {$item@iteration},
			"name":"{$item.name}",
			"url":"https://www.studioatrium.pl{url module=project action=item id=$item.id link_title=$item.name catalog='projekty-domow'}"
			{literal}}{/literal}{if !$item@last},{/if}
		{/foreach}{literal}
		]
      }
    </script>
{/literal}
{/if}

<!-- Tailwind CSS v4 -->
<script src="https://cdn.tailwindcss.com/v4.min.js"></script>
<script>tailwind.config = { corePlugins: { preflight: false } }</script>
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css">
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>
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
