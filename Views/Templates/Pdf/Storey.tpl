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

<table cellpadding="0">
	<tr>
		<td style="width: 458px;">
			<table cellpadding="0" >
				<tr>
					<td>
						<img src="{$projectPath}/{$cast.path}/{$mirrorPathPrefix}{$cast.filename}" alt="{$cast.title}">
					</td>
				</tr>
			</table>
		</td>
		
		<td style="width: 16px;"></td>
		
		<td>
			<table cellpadding="0">
				<tr>
					<td>&nbsp;<br>{$cast.title|strtoupper|replace:"ę":"Ę"}</td>
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
				{if $_param.sketch_id == $cast.id}
				<tr>
					<td class="index">{$_param.room_no}</td>
					<td{if $sketchParams[$_param.sketch_param_id].name == 'razem'} class="summary"{/if}>{$sketchParams[$_param.sketch_param_id].name}</td>
					<td class="right">{$_param.area|string_format:"%01.2f"}</td>
				</tr>				
				{/if}
			{/foreach}
			</table>
		</td>
	</tr>
</table>