{* ===== 2026 checkout — finish ===== *}
<div id="order-2026" class="pb-16">
	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
		<div class="max-w-[1480px] mx-auto px-4 sm:px-8">
			<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
				<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li aria-current="page" class="text-[#6b6b6b]">Zamówienie</li>
			</ol>
		</div>
	</nav>

	<div class="max-w-[1480px] mx-auto px-4 sm:px-8 mt-8">
		<div class="bg-[#ececec] px-6 py-5 mb-6">
			<h1 class="text-[26px] md:text-[32px] font-normal text-[#222]">Zamówienie złożone</h1>
		</div>

		<div class="order-panel order-result">
			<div class="center morespaced">
				<p class="section">Rezultat zamówienia</p>
				<p class="order-info blue">Dziękujemy za złożone zamówienie na kwotę <span>{$total}</span> zł. Otrzymało ono numer <strong>{$request.i}</strong>.</p>
			</div>
			<div class="center spaced">
				{if $request.e == 1}
				<p class="order-info">Na podany w formularzu adres e-mail zostało wysłane podsumowanie zamówienia.</p>
				{else}
				<p class="order-info">Niestety nie udało się nam wysłać e-mailowego podsumowania zamówienia.</p>
				{/if}
				<p class="order-info mt-6">Bardzo prosimy o wyrażenie swojej opinii na temat naszej pracowni i zakupionego projektu na <a href="https://search.google.com/local/writereview?placeid=ChIJK3ePDtKhFkcRxjj4S4bZ9Vk" class="external">stronie opinii Google</a>.</p>
			</div>
			<div class="next">
				<a href="/" class="baton order-home-link">Wróć na stronę główną</a>
			</div>
		</div>
	</div>
</div>

<script src="https://apis.google.com/js/platform.js?onload=renderOptIn" async defer></script>
<script>
  window.renderOptIn = function() {literal}{{/literal}
    window.gapi.load('surveyoptin', function() {literal}{{/literal}
      window.gapi.surveyoptin.render(
    	{literal}{{/literal}
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
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-1069647440/o1N2CPTY-OQBENCMhv4D',
      'value': {/literal}{if $ecommerce_purchase.ecommerce.value}{$ecommerce_purchase.ecommerce.value}{elseif $total}{$total}{else}1.0{/if}{literal},
      'currency': 'PLN',
      'transaction_id': '{/literal}{if $transaction.id}{$transaction.id}{/if}{literal}'
  });
</script>
{/literal}
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
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1069647440/?value=1.00&amp;currency_code=PLN&amp;label=CdHhCOzT5wMQ0IyG_gM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
{/if}

<script>
  window.___gcfg = {literal}{{/literal} lang: 'pl' {literal}}{/literal};
</script>
