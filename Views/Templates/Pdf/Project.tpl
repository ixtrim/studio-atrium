<style>
	table {
		border-collapse: collapse;
		border-spacing: 0;
		border: none;
		font-size: 8pt;
	}

	table td {
		border: none;
	}
	
	table td.right {
		text-align: right;
	}
	
	table td.index {
		width: 24px;
	}
	
	table td.summary {
		font-weight: bold;
	}
</style>

{$start = 0}
{$max = 3}

{if $project.attachments.ProjectInterior|@count > 0}
	{if $project.attachments.ProjectRender|@count > 2}{$start = 1}{/if}
	{$max = 2}
{else}
	{if $project.attachments.ProjectRender|@count > 3}
		{$start = 1}
		{$max = 3}
	{/if}
	
	{if $project.attachments.ProjectRender|@count < 3}
		{$max = 2}
		{$hasBlind = 1}
	{/if}
{/if}

<table cellpadding="0">
	<tr>
		<td style="width: 458px;">
			<table cellpadding="0" >
				<tr>
					<td>
						<img src="{$projectPath}/{$project.attachments.ProjectRender[0].path}/{$mirrorPathPrefix}{$project.attachments.ProjectRender[0].filename}" alt="{$project.name}">
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>
						<table cellpadding="0" style="width: 742px;">
							<tr>
								{section loop=$project.attachments.ProjectRender name=_icons start=$start max=$max}
									{if !$smarty.section._icons.first}<td style="width: 6px;"></td>{/if}
									<td>
										<img src="{$projectPath}/{$project.attachments.ProjectRender[_icons].path}/{$mirrorPathPrefix}{$project.attachments.ProjectRender[_icons].filename}" alt="">
									</td>
								{/section}
								{if $project.attachments.ProjectInterior|@count > 0}
									<td style="width: 6px;"></td>
									<td>
										<img src="{$projectPath}/{$project.attachments.ProjectInterior[0].path}/{$project.attachments.ProjectInterior[0].filename}" alt="">
									</td>
								{/if}
								{if $hasBlind}
									<td style="width: 6px;"></td>
									<td>
										<img src="img/pxl.png" alt=""/>
									</td>
								{/if}
							</tr>
						</table>
					</td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
				</tr>

				<tr>
					<td style="height: 482px">
						<img height="482" src="{$projectPath}/{$project.attachments.ProjectSketch[0].path}/{$mirrorPathPrefix}{$project.attachments.ProjectSketch[0].filename}" alt="Rzut parteru">
					</td>
				</tr>
			</table>
		</td>
		
		<td style="width: 16px;"></td>
		
		<td>
			<table cellpadding="0">
				<tr><td style="color: #2e63a2; font-size: 18pt;" colspan="2">{if $project.type == 'garage'}{$project.symbol_alpha} {$project.symbol_num}{else}{$project.name}{/if}</td></tr>
				<tr><td style="color: #2e63a2; font-size: 18pt;" colspan="2">{$project.params_general[1].value} m<sup>2</sup></td></tr>
				{if $projectParams[2]}
					<tr><td colspan="2">plus piwnica <span style="color: #2e63a2;">{number_format($projectParams[2].num_value, 2, ',', ' ')} m<sup>2</sup></span></td></tr>
				{/if}
				{if $projectParams[3]}
					<tr><td colspan="2">plus garaż <span style="color: #2e63a2;">{number_format($projectParams[3].num_value, 2, ',', ' ')} m<sup>2</sup></span></td></tr>
				{/if}
				<tr><td colspan="2" style="height: 16px;">&nbsp;</td></tr>
				<tr><td colspan="2">{$project.short_description}</td></tr>
				<tr><td colspan="2" style="height: 16px;">&nbsp;</td></tr>
				{if $project.type == 'garage'}
					{if $projectParams|parcelWidth > 0}<tr><td style="border-top: 1px solid #cdcdcd; border-bottom: 1px solid #cdcdcd;">&nbsp;<br>min. wymiary działki<br></td><td class="right" style="border-top: 1px solid #cdcdcd; border-bottom: 1px solid #cdcdcd;">&nbsp;<br>{$projectParams|parcelWidth} x {$projectParams|parcelHeight} m</td></tr>{/if}
				{else}
					<tr><td style="border-top: 1px solid #cdcdcd; border-bottom: 1px solid #cdcdcd;">&nbsp;<br>min. wymiary działki<br></td><td class="right" style="border-top: 1px solid #cdcdcd; border-bottom: 1px solid #cdcdcd;">&nbsp;<br>{$project.params_general[75].value} x {$project.params_general[76].value} m</td></tr>
				{/if}
				<tr><td colspan="2" style="height: 16px;">&nbsp;</td></tr>
				{if $project.type != 'garage'}
				<tr><td>pow. netto parteru</td><td class="right">{number_format($projectParams[16].num_value, 2, ',', ' ')} m<sup>2</sup></td></tr>
				{/if}
				<tr><td>pow. całkowita</td><td class="right">{number_format($projectParams[22].num_value, 2, ',', ' ')} m<sup>2</sup></td></tr>
				<tr><td>pow. zabudowy</td><td class="right">{number_format($projectParams[23].num_value, 2, ',', ' ')} m<sup>2</sup></td></tr>
				<tr><td>kubatura brutto</td><td class="right">{number_format($projectParams[25].num_value, 2, ',', ' ')} m<sup>3</sup></td></tr>
				{if $project.type == 'garage'}
					<tr><td>wysokość garażu</td><td class="right">{number_format($projectParams[33].num_value, 2, ',', ' ')} m</td></tr>
				{else}
					<tr><td>wysokość budynku</td><td class="right">{number_format($projectParams[26].num_value, 2, ',', ' ')} m</td></tr>
				{/if}
				<tr><td>kąt nachylenia dachu</td><td class="right">{$project.params_general[27].value}{$project.params_general[27].unit}</td></tr>
				{if $projectParams[28]}
					<tr><td>rodzaj stropu</td><td class="right">{$projectParams[28].string_value}</td></tr>
				{/if}
				{if $projectParams[39]}
					<tr><td>pow. dachu</td><td class="right">{number_format($projectParams[39].num_value, 2, ',', ' ')} m<sup>2</sup><br></td></tr>
				{/if}
			</table>
			
			<table cellpadding="0">
				<tr><td colspan="2" style="border-top: 1px solid #cdcdcd;">&nbsp;<br>TECHNOLOGIA</td></tr>
				
				{if $project.technology}
					<tr><td colspan="2">{$project.technology}</td></tr>
				{else}
					<tr><td colspan="2">Technologia murowana: Pustak ceramiczny gr. 30 cm + ocieplenie w systemie Termo Organika. Pokrycie dachu dachówką cementową Braas.</td></tr>
				{/if}
				{if $project.type != 'garage'}
					<tr><td colspan="2" style="color: #2e63a2; font-size: 7pt;">&nbsp;<br>Do tego projektu możesz wprowadzić zmiany, na które wyrazimy bezpłatną zgodę. Więcej na www.studioatrium.pl</td></tr>
				
					{if $costs && $costs.total != -1}
						<tr><td colspan="2">&nbsp;<br>KOSZTY BUDOWY</td></tr>
				
						<tr><td style="font-size: 7pt;">stan surowy</td><td class="right" style="font-size: 7pt;">{number_format($costs.rough, 0, ',', ' ')} zł</td></tr>
						<tr><td style="font-size: 7pt;">roboty wykończeniowe</td><td class="right" style="font-size: 7pt;">{number_format($costs.finish, 0, ',', ' ')} zł</td></tr>
						<tr><td style="font-size: 7pt;">instalacje</td><td class="right" style="font-size: 7pt;">{number_format($costs.installations, 0, ',', ' ')} zł</td></tr>
						<tr><td style="font-size: 7pt;">koszt budowy</td><td class="right" style="font-size: 7pt;">{number_format($costs.total, 0, ',', ' ')} zł</td></tr>
				
						<tr><td colspan="2" style="color: #2e63a2; font-size: 7pt; border-bottom: 1px solid #cdcdcd;">&nbsp;<br>Podane ceny są szacunkowymi cenami netto. Zapytaj o zestawienie materiałów naszego konsultanta na www.studioatrium.pl<br></td></tr>
					{/if}
				{/if}
			</table>

			<table cellpadding="0">
				<tr>
					<td>&nbsp;<br>RZUT PARTERU</td>
					<td class="right">&nbsp;<br>[m<sup>2</sup>]</td>
				</tr>
			</table>
			
			<table cellpadding="0">
				<tr>
					<td>&nbsp;</td>
				</tr>
			</table>
			
			<table cellpadding="0" style="width: 318px;">
			{foreach $projectSketchParams as $_param}
				{if $_param.sketch_id == $project.attachments.ProjectSketch[0].id}
				<tr>
					<td class="index">{if $sketchParams[$_param.sketch_param_id].name != 'razem'}{$_param.room_no}{/if}</td>
					<td{if $sketchParams[$_param.sketch_param_id].name == 'razem'} class="summary"{/if}>{$sketchParams[$_param.sketch_param_id].name}</td>
					<td class="right">{$_param.area|string_format:"%01.2f"}</td>
				</tr>				
				{/if}
			{/foreach}
			</table>
		</td>
	</tr>
</table>