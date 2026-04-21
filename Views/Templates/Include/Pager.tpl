<ol class="pagebar">
{if $page > 1}
	{if  $page > 2}
		<li class="prev"><a href="{$url},{$page-1}{$query}"></a></li>
	{else}
		<li class="prev"><a href="{$baseUrl}{$query}"></a></li>
	{/if}
{/if}
	<li class="page"><span class="page-number" contenteditable="true" data-pages="{$pages}" data-url="{$url}" data-baseurl="{$baseUrl}"{if $query} data-query="{$query}"{/if}>{$page}</span><span>z {$pages}</span></li>
{if $page < $pages}
	<li class="next"><a href="{$url},{$page+1}{$query}"></a></li>
{/if}
</ol>