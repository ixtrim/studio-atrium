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
		<p class="headline">Katalog projektów online</p>
		<p>W trosce o nasze środowisko oraz z uwagi na zaistniałą sytuację epidemiologiczną, najnowszy katalog z cyklu "Domy w Tradycji" ukazał się jedynie w wersji online, jako katalog PDF do przeglądania online lub pobrania. 
		<a href="https://media.studioatrium.pl/document/1447/DWT73.pdf" target="_blank">Pobierz plik pdf</a> bądź skorzystaj z poniższej przeglądarki i zapoznaj się z naszą najnowszą propozycją projektową wygodnie na swoim komputerze bądź urządzeniu mobilnym.</p>
		<div id="adobe-dc-view" style="height: 800px; width: 100%; margin-top: 30px;"></div>
		{literal}
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
		{/literal}
	</div>
</div>