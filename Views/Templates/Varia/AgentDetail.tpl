<div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1><a href="{url module=varia action=agent}">Nasi przedstawiciele</a></h1>
			</div>
		</div>
	</div>
</div>

<div class="wrapper">
	<div class="box agent details">
		<p class="back"><a href="{url module=varia action=agent}">powrót do listy &raquo;</a></p>
		{if $agent.attachments.AgentLogo}<p class="logo"><img src="{$stockPath}/{$agent.attachments.AgentLogo[0].path}/{$agent.attachments.AgentLogo[0].filename}" alt="Logo"></p>{/if}
		<h2>{$agent.name}</h2>
		<ul class="agents">
			<li>
				<div>
					<p class="ico address">{$agent.address}</p>
					<p>{$agent.city}</p>
					{if $agent.phone != '' || $agent.cell_phone != ''}
						<p class="ico phone">
							{if $agent.phone != '' && $agent.cell_phone != ''}
							tel.: <a href="tel:+48{$agent.phone|replace:"(0":""|replace:")":""|replace:" ":""|replace:"-":""|replace:"(":""}">{$agent.phone}</a></p>
							<p>tel. kom.: <a href="tel:+48{$agent.cell_phone|replace:"(0":""|replace:")":""|replace:" ":""|replace:"-":""|replace:"(":""}">{$agent.cell_phone}</a>
							{elseif $agent.phone != ''}
								tel.: <a href="tel:+48{$agent.phone|replace:"(0":""|replace:")":""|replace:" ":""|replace:"-":""|replace:"(":""}">{$agent.phone}</a>
							{elseif $agent.cell_phone != ''}
								tel. kom.: <a href="tel:+48{$agent.cell_phone|replace:"(0":""|replace:")":""|replace:" ":""|replace:"-":""|replace:"(":""}">{$agent.cell_phone}</a>
							{/if}
						</p>
					{/if}
					{if $agent.email != ''}
						<p class="ico email"><a href="mailto:{$agent.email}" class="blue">{$agent.email}</a></p>
					{/if}
					{if $agent.www != ''}
						<p class="ico www"><a href="{$agent.www}" target="_blank" rel="nofollow" class="blue">{$agent.www|replace:"https://":""|replace:"http://":""}</a></p>
					{/if}
					{if $agent.open_hour}<p class="ico hour">{$agent.open_hour}</p>{/if}
				</div>
				
				{if $agent.services}
					<div class="info">
							<p class="info ico"><strong>ZAKRES USŁUG</strong><span>{$agent.services|nl2br|replace:"</p>":"<br/>"|replace:"<p>":""}</span></p>
					</div>
				{/if}
				
				{if $agent.descr}
					<div class="descr"><p class="info ico justify"><strong>INFORMACJE</strong><span>{$agent.descr|nl2br|replace:"</p>":"<br/>"|replace:"<p>":""}</span></p></div>
				{/if}
				
				{if $agent.map}
					<div class="map">
						<p class="address ico"><strong>ZNAJDŹ NA MAPIE</strong></p>
						<p><iframe src="{$agent.map}" frameborder="0" style="border:0; width:100%; height:500px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></p>
					</div>
				{/if}
			</li>
		</ul>
			
	</div>
</div>