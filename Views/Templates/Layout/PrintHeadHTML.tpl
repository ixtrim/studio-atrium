{if $pageTitle}
	<title>{$pageTitle}</title>
{elseif $action == 'IndexPage'}
	<title>Gotowe projekty domów - Studio Atrium</title>
{else}
	<title>Projekty domów - STUDIO ATRIUM - Gotowe projekty domów jednorodzinnych parterowych i z poddaszem, garaże.</title>
{/if}

{* dodane zamiast GA w Footer na wniosek Eactive - Mateusz Sipa (2017-07-24) *}
<!-- Google Tag Manager -->
{literal}
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5X8XP43');</script>
{/literal}
<!-- End Google Tag Manager -->

<meta name="google-site-verification" content="j15OtRMLcdf35tlG1qg_j95XjIzNiwk6VKtTa2YiFOo" />
<meta name="p:domain_verify" content="46eb45dafec5620ae0746f34b1c0c299">
<meta name="google-site-verification" content="N4VPO2yZZ3HL2Yegp8cAdQAsZ4Xj17gVs1vtLramZcY" /> {* google merchant *}
<link rel="shortcut icon" type="image/icon" href="/img/favicon.ico">

{if $pageMetaDescription}
	<meta name="description" content="{$pageMetaDescription|trim}">
{else}
	<meta name="description" content="">
{/if}

<meta name="robots" content="noindex, follow">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/icon" href="/img/favicon.ico">

<link rel="stylesheet" href="/css/print.css?v={$version}">

{foreach $css_includes as $_css}
	<link rel="stylesheet" href="/css/{$_css}">
{/foreach}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

{foreach $js_includes as $_js}
	<script src="/js/{$_js}"></script>
{/foreach}
	<script src="https://apis.google.com/js/platform.js" async defer>
{literal}{{/literal}lang: 'pl'{literal}}{/literal}
	</script>