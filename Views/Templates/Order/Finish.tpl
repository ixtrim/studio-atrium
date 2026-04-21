<div class="list-header">
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
			<p class="order-info blue">Dziękujemy za założone zamówienie na kwotę <span>{$total}</span> zł. Otrzymało ono numer <strong>{$request.i}</strong>.</p>
		</div>
		<div class="center spaced">		
			{if $request.e == 1}
			<p class="order-info">Na podany w formularzu adres e-mail zostało wysłane podsumowanie zamówienia.</p>
			{else}
			<p class="order-info">Niestety nie udało się nam wysłać e-mailowego podsumowania zamówienia.</p>
			{/if}
			<p>&nbsp;</p>
			<p class="order-info">Bardzo prosimy o wyrażenie swojej opinii na temat naszej pracowni i zakupionego projektu na <a href="https://search.google.com/local/writereview?placeid=ChIJK3ePDtKhFkcRxjj4S4bZ9Vk" class="external">stronie opinii Google</a>.</p>
		</div>

		<div class="center morespaced">	</div>
	</div>
</div>

<script src="https://apis.google.com/js/platform.js?onload=renderOptIn" async defer></script>

<script>
  window.renderOptIn = function() {literal}{{/literal}
    window.gapi.load('surveyoptin', function() {literal}{{/literal}
      window.gapi.surveyoptin.render(
    	{literal}{{/literal}
          // REQUIRED FIELDS
          "merchant_id": 10295235,
          "order_id": "{$transaction.id}",
          "email": "{$transaction.transactionUser.email}",
          "delivery_country": "PL",
          "estimated_delivery_date": "{$deliveryDate}",
        {literal}}{/literal});
     {literal}}{/literal});
  {literal}}{/literal}
</script>


{if $clear == 1}
{literal}
<!-- Event snippet for Zakup projektu conversion page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-1069647440/o1N2CPTY-OQBENCMhv4D',
      'value': 1.0,
      'currency': 'PLN',
      'transaction_id': ''
  });
</script>
{/literal}

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
{/if}


<!-- POCZĄTEK kodu językowego Opinii konsumenckich Google -->
<script>
  window.___gcfg = {
    lang: 'pl'
  };
</script>
<!-- Koniec kodu językowego Opinii konsumenckich Google -->