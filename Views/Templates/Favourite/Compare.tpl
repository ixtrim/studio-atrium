<div class="wrapper white">
	<div class="box">
		<div class="head-wrapper">
			<h1>Porównanie projektów</h1>
			<a class="framed" href="{url module=favourite action=list}">Zamknij porównanie</a>
		</div>
		
		{if $list}
		<div class="swipe-box"><img id="swipe" src="/img/swipe.png" alt="Przesuń by porównać" style="display: none;"></div>
		
		<div class="table-scroll-box" id="table-scroll-box">
		<div class="table-wrapper">
		<table id="compare-table">
			<tr>
				<th>Nazwa</th>
				{foreach $list as $_project}
				<td><a href="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}">{if $isLocal}<small style="font-size: 1.2rem;">({$_project.symbol_alpha} {$_project.symbol_num})</small> {/if}{$_project.name}</a></td>
				{/foreach}
			</tr>
			
			<tr>
				<th>Render</th>
				{foreach $list as $_project}
				<td>
					<a data-fancybox="gallery" data-caption="{$_project.name}" href="{image type=render project=$_project size=presentation}">
						<img src="{image type=render project=$_project size=list}" alt="{$_project.name}">
					</a>
				</td>
				{/foreach}
			</tr>
			
			{foreach $storeys as $storey}
			<tr>
				<th>{$storey|mapStorey}</th>
				{foreach $list as $_project}
					<td>
						{if $_project|hasSketch:$storey}
						<a data-fancybox="{$storey}" data-caption="{$_project.name} - {$storey|mapStorey}" href="{image type=sketch project=$_project storey=$storey}">
							<img src="{image type=sketch project=$_project storey=$storey}" alt="{$storey|mapStorey} - rzut kondygnacji - {$_project.name}">
						</a>
						{else}
							-
						{/if}
					</td>
				{/foreach}
			</tr>			
			{/foreach}
			
			<tr>
				<th>Cena</th>
				{foreach $list as $_project}
				<td>{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if} <span>zł</span></td>
				{/foreach}
			</tr>
			
			{foreach $paramIds as $_paramId}
			
			{capture "params"}
			{$isDisplayed = 0}
			<tr>
				<th>{$params[$_paramId].name}</th>
				{foreach $list as $_project}
				<td>
					{if $params[$_paramId].value_type == 'string'}
						{if $paramsMap[$_project.id][$_paramId].string_value}
							{$paramsMap[$_project.id][$_paramId].string_value} <span>{$params[$_paramId].unit}</span>
							{$isDisplayed = 1}
						{else}
							-
						{/if}
					{else}
						{if $paramsMap[$_project.id][$_paramId].num_value}
							{$paramsMap[$_project.id][$_paramId].num_value} <span>{$params[$_paramId].unit}</span>
							{$isDisplayed = 1}
						{else}
							-
						{/if}
					{/if}
				</td>
				{/foreach}
			</tr>
			{/capture}
				
			{if $isDisplayed}
				{$smarty.capture.params}
			{/if}
			
			{/foreach}
		</table>
		</div>
		</div>
		
		{else}
			<p class="nope">Nie dodano projektów do porównania</p>
		{/if}
	</div>
</div>
{*
<div class="overlay">
	<div class="overlay-project-box compare" id="over-pop">
		<img class="preload" id="over-img" src="/img/waiter.gif" alt="Render">
	</div>
	
	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div>
*}