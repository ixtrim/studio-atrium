<?php /* Smarty version Smarty-3.1.11, created on 2022-06-21 05:11:08
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Layout/PrintHeadHTML.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54428212662b152ec3a7261-98388888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f2815f1f7badb13de262b5826d799ab75badf2c' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Layout/PrintHeadHTML.tpl',
      1 => 1500887576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54428212662b152ec3a7261-98388888',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pageTitle' => 0,
    'action' => 0,
    'pageMetaDescription' => 0,
    'version' => 0,
    'css_includes' => 0,
    '_css' => 0,
    'js_includes' => 0,
    '_js' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b152ec3b7b18_21791425',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b152ec3b7b18_21791425')) {function content_62b152ec3b7b18_21791425($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pageTitle']->value){?>
	<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
<?php }elseif($_smarty_tpl->tpl_vars['action']->value=='IndexPage'){?>
	<title>Gotowe projekty domów - Studio Atrium</title>
<?php }else{ ?>
	<title>Projekty domów - STUDIO ATRIUM - Gotowe projekty domów jednorodzinnych parterowych i z poddaszem, garaże.</title>
<?php }?>


<!-- Google Tag Manager -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5X8XP43');</script>

<!-- End Google Tag Manager -->

<meta name="google-site-verification" content="j15OtRMLcdf35tlG1qg_j95XjIzNiwk6VKtTa2YiFOo" />
<meta name="p:domain_verify" content="46eb45dafec5620ae0746f34b1c0c299">
<meta name="google-site-verification" content="N4VPO2yZZ3HL2Yegp8cAdQAsZ4Xj17gVs1vtLramZcY" /> 
<link rel="shortcut icon" type="image/icon" href="/img/favicon.ico">

<?php if ($_smarty_tpl->tpl_vars['pageMetaDescription']->value){?>
	<meta name="description" content="<?php echo trim($_smarty_tpl->tpl_vars['pageMetaDescription']->value);?>
">
<?php }else{ ?>
	<meta name="description" content="">
<?php }?>

<meta name="robots" content="noindex, follow">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/icon" href="/img/favicon.ico">

<link rel="stylesheet" href="/css/print.css?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
">

<?php  $_smarty_tpl->tpl_vars['_css'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_css']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['css_includes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_css']->key => $_smarty_tpl->tpl_vars['_css']->value){
$_smarty_tpl->tpl_vars['_css']->_loop = true;
?>
	<link rel="stylesheet" href="/css/<?php echo $_smarty_tpl->tpl_vars['_css']->value;?>
">
<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<?php  $_smarty_tpl->tpl_vars['_js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_includes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_js']->key => $_smarty_tpl->tpl_vars['_js']->value){
$_smarty_tpl->tpl_vars['_js']->_loop = true;
?>
	<script src="/js/<?php echo $_smarty_tpl->tpl_vars['_js']->value;?>
"></script>
<?php } ?>
	<script src="https://apis.google.com/js/platform.js" async defer>
{lang: 'pl'}
	</script><?php }} ?>