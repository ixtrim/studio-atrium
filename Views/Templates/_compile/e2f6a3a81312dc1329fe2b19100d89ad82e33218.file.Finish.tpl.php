<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 12:58:21
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Order/Finish.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108438412562b06eed02c563-90002261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2f6a3a81312dc1329fe2b19100d89ad82e33218' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Order/Finish.tpl',
      1 => 1634717639,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108438412562b06eed02c563-90002261',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'total' => 0,
    'request' => 0,
    'transaction' => 0,
    'deliveryDate' => 0,
    'clear' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b06eed0360f6_59235479',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b06eed0360f6_59235479')) {function content_62b06eed0360f6_59235479($_smarty_tpl) {?><div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Twój koszyk - rezultat</h1>
			</div>
		</div>
	</div>
</div>

<div class="wrapper">
	<div class="box">
		<div class="center morespaced">
			<p class="section">Rezultat zamówienia</p>
			<p class="order-info blue">Dziękujemy za założone zamówienie na kwotę <span><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span> zł. Otrzymało ono numer <strong><?php echo $_smarty_tpl->tpl_vars['request']->value['i'];?>
</strong>.</p>
		</div>
		<div class="center spaced">		
			<?php if ($_smarty_tpl->tpl_vars['request']->value['e']==1){?>
			<p class="order-info">Na podany w formularzu adres e-mail zostało wysłane podsumowanie zamówienia.</p>
			<?php }else{ ?>
			<p class="order-info">Niestety nie udało się nam wysłać e-mailowego podsumowania zamówienia.</p>
			<?php }?>
			<p>&nbsp;</p>
			<p class="order-info">Bardzo prosimy o wyrażenie swojej opinii na temat naszej pracowni i zakupionego projektu na <a href="https://search.google.com/local/writereview?placeid=ChIJK3ePDtKhFkcRxjj4S4bZ9Vk" class="external">stronie opinii Google</a>.</p>
		</div>

		<div class="center morespaced">	</div>
	</div>
</div>

<script src="https://apis.google.com/js/platform.js?onload=renderOptIn" async defer></script>

<script>
  window.renderOptIn = function() {
    window.gapi.load('surveyoptin', function() {
      window.gapi.surveyoptin.render(
    	{
          // REQUIRED FIELDS
          "merchant_id": 10295235,
          "order_id": "<?php echo $_smarty_tpl->tpl_vars['transaction']->value['id'];?>
",
          "email": "<?php echo $_smarty_tpl->tpl_vars['transaction']->value['transactionUser']['email'];?>
",
          "delivery_country": "PL",
          "estimated_delivery_date": "<?php echo $_smarty_tpl->tpl_vars['deliveryDate']->value;?>
",
        });
     });
  }
</script>


<?php if ($_smarty_tpl->tpl_vars['clear']->value==1){?>

<!-- Event snippet for Zakup projektu conversion page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-1069647440/o1N2CPTY-OQBENCMhv4D',
      'value': 1.0,
      'currency': 'PLN',
      'transaction_id': ''
  });
</script>


<!-- Google Code for ZAM&Oacute;WIENIA Conversion Page -->
<script type="text/javascript">
StorageManager.remove('basketExtrasProjects');
StorageManager.remove('basketExtras');
StorageManager.remove('basketDiscount');
/* <![CDATA[ */
var google_conversion_id = 1069647440;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "CdHhCOzT5wMQ0IyG_gM";
var google_conversion_value = 1.00;
var google_conversion_currency = "PLN";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1069647440/?value=1.00&amp;currency_code=PLN&amp;label=CdHhCOzT5wMQ0IyG_gM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php }?>


<!-- POCZĄTEK kodu językowego Opinii konsumenckich Google -->
<script>
  window.___gcfg = {
    lang: 'pl'
  };
</script>
<!-- Koniec kodu językowego Opinii konsumenckich Google --><?php }} ?>