<div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Nasi przedstawiciele</h1>
			</div>
		</div>
	</div>
</div>

<div class="wrapper">
	<div class="box agent">
		<div id="map">
			<img src="/img/map.png" usemap="#dMap" alt="Mapa Polski" />
			<map name="dMap" id="dMap">
				<area shape="poly" coords="94,18,98,70,140,60,170,66,180,31,145,2" href="{url module=$module_decamelized action=$action_decamelized region=10}" alt="">
				<area shape="poly" coords="20,45,90,20,90,84,20,120,15,76" href="{url module=$module_decamelized action=$action_decamelized region=16}" alt="">
				<area shape="poly" coords="180,27,169,65,190,89,284,59,282,21" href="{url module=$module_decamelized action=$action_decamelized region=15}" alt="">
				<area shape="poly" coords="250,73,288,61,285,25,300,31,330,106,294,134,263,105" href="{url module=$module_decamelized action=$action_decamelized region=9}" alt="">
				<area shape="poly" coords="187,94,246,76,270,109,293,140,260,155,254,203,211,192,202,143,173,134" href="{url module=$module_decamelized action=$action_decamelized region=7}" alt="">
				<area shape="poly" coords="257,204,263,157,299,138,312,141,314,169,335,218,311,242,278,234" href="{url module=$module_decamelized action=$action_decamelized region=3}" alt="">
				<area shape="poly" coords="255,209,271,235,309,248,294,298,236,284,232,242,249,226" href="{url module=$module_decamelized action=$action_decamelized region=11}" alt="">
				<area shape="poly" coords="208,194,200,208,212,237,214,246,260,222" href="{url module=$module_decamelized action=$action_decamelized region=13}" alt="">
				<area shape="poly" coords="203,234,239,252,243,285,200,303,182,277,188,246" href="{url module=$module_decamelized action=$action_decamelized region=6}" alt="">
				<area shape="poly" coords="166,137,196,146,205,185,192,213,135,197,148,161" href="{url module=$module_decamelized action=$action_decamelized region=5}" alt="">
				<area shape="poly" coords="106,72,126,65,168,73,192,95,160,138,110,111" href="{url module=$module_decamelized action=$action_decamelized region=2}" alt="">
				<area shape="poly" coords="65,103,99,75,106,115,154,124,152,192,87,158" href="{url module=$module_decamelized action=$action_decamelized region=14}" alt="">
				<area shape="poly" coords="10,126,63,103,69,169,22,190" href="{url module=$module_decamelized action=$action_decamelized region=4}" alt="">
				<area shape="poly" coords="19,197,75,169,117,198,84,256" href="{url module=$module_decamelized action=$action_decamelized region=1}" alt="">
				<area shape="poly" coords="97,237,120,200,150,203,142,246,122,257" href="{url module=$module_decamelized action=$action_decamelized region=8}" alt="">
				<area shape="poly" coords="154,204,192,225,176,234,166,287,130,261" href="{url module=$module_decamelized action=$action_decamelized region=12}" alt="">
			</map>
		</div>
		
		<p>
			Poniżej rezentujemy listę wybranych biur sprzedających i/lub adaptujących nasze projekty do warunków miejscowych na działce Inwestora. 
			Wybierz interesujące Cię województwo z mapy. Lista ułożona jest alfabetycznie wg nazw miejscowości.
		</p>
		<p class="morespaced">
			Jeżeli chcesz znaleźć naszego przedstawiciela w Twojej miejscowości, wpisz poniżej jej nazwę. Możesz także określić województwo.
		</p>
		<p class="morespaced">
			<form action="{url module=$module_decamelized action=$action_decamelized}"method="get">
				<select name="region">
				{foreach from=$regions item=_reg key=_rid}
					<option value="{$_rid}"{if $selectedRegion==$_rid} selected{/if}>{$_reg}</option>
				{/foreach}
				</select>
				<input name="city" value="{$request.city}" type="text" placeholder="Nazwa miejscowości">
				<input type="submit" value="Szukaj">
			</form>
		</p>
		
		<div class="page-nav agent">
			{if $request.city}
				<p class="region">Nasi przedstawiciele: szukana miejscowość <span>{$request.city}</span></p>
			{else}
				<p class="region">Nasi przedstawiciele: województwo <span>{regionName regionId = $request.region}</span></p>
			{/if}
			
			{if $pages > 1}
				{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$baseUrl}
			{/if}
		</div>
		{if $agentList}
		<ul class="agents">
			{foreach $agentList as $_agent}
				<li>
					<div>
						<p class="title">
							{if $_agent.authorize == 'authorized'}
								<a href="{url module=varia action=agent_detail id=$_agent.id name=$_agent.name|replace:"/":"-"|replace:"<p>":""|replace:"</p>":""|strip_tags|pl}">{$_agent.name|replace:"<p>":""|replace:"</p>":""}</a>
							{else}
								{$_agent.name|replace:"<p>":""|replace:"</p>":""}
							{/if}	
						</p>	
						
						<p class="ico address">{$_agent.address}</p>
						<p>{$_agent.city}</p>
						{if $_agent.phone != '' || $_agent.cell_phone != ''}
							<p class="ico phone">
								{if $_agent.phone != '' && $_agent.cell_phone != ''}
								tel.: <a href="tel:+48{$_agent.phone|replace:"(0":""|replace:")":""|replace:" ":""|replace:"-":""|replace:"(":""}">{$_agent.phone}</a></p>
								<p>tel. kom.: <a href="tel:+48{$_agent.cell_phone|replace:"(0":""|replace:")":""|replace:" ":""|replace:"-":""|replace:"(":""}">{$_agent.cell_phone}</a>
								{elseif $_agent.phone != ''}
									tel.: <a href="tel:+48{$_agent.phone|replace:"(0":""|replace:")":""|replace:" ":""|replace:"-":""|replace:"(":""}">{$_agent.phone}</a>
								{elseif $_agent.cell_phone != ''}
									tel. kom.: <a href="tel:+48{$_agent.cell_phone|replace:"(0":""|replace:")":""|replace:" ":""|replace:"-":""|replace:"(":""}">{$_agent.cell_phone}</a>
								{/if}
							</p>
						{/if}
						{if $_agent.email != ''}
							<p class="ico email"><a href="mailto:{$_agent.email}" class="blue">{$_agent.email}</a></p>
						{/if}
						{if $_agent.www != ''}
							<p class="ico www"><a href="{$_agent.www}" target="_blank" rel="nofollow" class="blue">{$_agent.www|replace:"https://":""|replace:"http://":""}</a></p>
						{/if}
						{if $_agent.open_hour}<p class="ico hour">{$_agent.open_hour}</p>{/if}
					</div>
					{if $_agent.services}<div class="info"><p class="info ico"><strong>ZAKRES USŁUG</strong><span>{$_agent.services|nl2br|replace:"</p>":"<br/>"|replace:"<p>":""}</span></p></div>{/if}
				</li>
			{/foreach}
		</ul>
		{else}
			<ul class="agents"><li><p class="ico info">Nie znaleźliśmy żadnego przedstawiciela w szukanej miejscowości.<br>Spróbuj poszukać najbliższego w Twoim województwie, bądź <a href="javascript:" class="consultant">skontaktuj się z nami</a> w sprawie projektów.</p></li></ul>
		{/if}
		<div class="page-nav">
			{if $pages > 1}
				{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$baseUrl}
			{/if}
		</div>
	</div>
</div>