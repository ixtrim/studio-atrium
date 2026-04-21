<div class="project-box spaced" id="measure-box">
	<div class="render-box measure-box">
		<div id="canvas-box" data-scale="{$props.factor|replace:',':'.'}" data-height="{$props.height}">
		{if $request.version == 'mirror'}
			<img src="{image type=sketch project=$project storey=$storey mirror=1}" alt="{$project.name} - rzut kondygnacji">
		{else}
			<img src="{image type=sketch project=$project storey=$storey}" alt="{$project.name} - rzut kondygnacji">
		{/if}
			<canvas id="canvas"></canvas>
			<span id="label" style="display: none;"></span>
			<span id="labelX" class="distance" style="display: none;"></span>
			<span id="labelY" class="distance" style="display: none;"></span>
		</div>
	</div>

	<div class="data-box measure">
		<h1 class="sketch">{$project.name} <span>mierzenie projektu</span></h1>
		
		{if $request.version == 'mirror'}
			<a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow' version=lustro}" class="framed">Powrót do projektu</a>
		{else}
			<a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}" class="framed">Powrót do projektu</a>
		{/if}
		
		<div class="inner-box">
			<ul class="link-box{if $projectParams|hasMirror} three{/if}">
			{if $projectParams|hasMirror}
				{if $request.version == 'mirror'}
					<li><a href="{url module=project action=item id=$project.id link_title=$project.name catalog=$props.storey|mapStoreyCatalog}" class="mirror">Zobacz <br>wersję podstawową</a></li>
				{else}
					<li><a href="{url module=project action=item id=$project.id link_title=$project.name version=lustro catalog=$props.storey|mapStoreyCatalog}" class="mirror on">Zobacz <br>odbicie lustrzane</a></li>
				{/if}
			{/if}
				<li><a href="javascript:" class="distance active" id="line">Zmierz <br>odległość</a></li>
				<li><a href="javascript:" class="area" id="area">Zmierz <br>powierzchnię</a></li>
			</ul>
		</div>
	
		{capture "chambers"}
			<table class="tech">
				{foreach $projectSketchParams as $_param}
				{if $_param.sketch_id == $sketchId}	
					<tr>
						{if $sketchParams[$_param.sketch_param_id].name != 'razem'}
						<td>
							{$_param.room_no}
							{$sketchParams[$_param.sketch_param_id].name}
						</td>
						<td>
							{number_format($_param.area, 2, ',', ' ')}
						</td>
						{else}
							{$total = $_param.area}
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						{/if}
					</tr>
				{/if}
				{/foreach}
			</table>
		{/capture}
	
		<h4>{$props.storey|mapStorey}<span>{number_format($total, 2, ',', ' ')} m<sup>2</sup></span></h4>
		{$smarty.capture.chambers}
	</div>
</div>