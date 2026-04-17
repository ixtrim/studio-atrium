<div class="list-header">
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
			<li><div><a href="{url module=catalog action=form}"><span class="free">Bezpłatny</span></a></div></li>
			<li class="selected"><div><a href="/katalog-projektow-online.html"><span class="free">Online</span></a></div></li>
			{if $isPayAvailable == 1}<li><div><a href="{url module=catalog action=form_pay}"><span class="nonfree" id="similiar">Płatny</span></a></div></li>{/if}
		</ul>
	</div>
</div>

<div class="wrapper">
	<div class="box info-box">
		<p class="headline">Dziękujemy za zamówienie katalogu projektów!</p>
		{if $request.ref == 'platny'}
			<p>Na adres e-mail podany przez Ciebie podczas zamówienia, wysłana została wiadomość z podsumowaniem zamówienia i danymi do przelewu.</p>
			<p>Jeżeli do 30 minut nie otrzymasz wiadomości, sprawdź folder SPAM. Zawsze możesz także {if $user}<a href="{url module=panel action=message}">{else}<a href="javascript:" class="consultant">{/if}skontaktować się z nami</a>.</p>
			<p>Katalog zostanie wysłany niezwłocznie po otrzymaniu potwierdzenia przelewu.</p>
		{else}
			<p>Na adres e-mail podany przez Ciebie podczas zamówienia, wysłana została wiadomość z podsumowaniem zamówienia bezpłatnego katalogu.</p>
			<p>Katalog zostanie wysłany pocztą w ciągu 7 dni roboczych. Jeżeli w ciągu 2 tygodni nie otrzymasz katalogu, {if $user}<a href="{url module=panel action=message}">skontaktuj się z nami</a>{else}<a href="javascript:" class="consultant">skontaktuj się z nami</a>{/if}.</p>
		{/if}
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
</noscript>