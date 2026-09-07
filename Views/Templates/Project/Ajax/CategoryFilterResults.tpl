<div id="cat-grid-and-pager">
{if $listCards}
	{include file="Project/displayBox.tpl" url=$pagerUrl query=$query}
{else}
	<div id="project-list" class="bg-[#f7f7f7] px-8 py-16 text-center">
		<p class="text-[18px] font-bold text-[#222] mb-3">Niestety nic dla Ciebie nie znaleźliśmy</p>
		<p class="text-[14px] text-[#555]">Zmień kryteria lub przejdź do <a href="/projekty/" class="text-[var(--brand-blue-strong)] hover:underline">wszystkich projektów domów</a></p>
	</div>
{/if}

{if $pages > 1}
	<div id="cat-pager" class="flex items-center justify-center gap-4 mt-10 text-[14px] text-[#222]" data-page="{$page}" data-pages="{$pages}">
		{if $page > 1}
			{if $page > 2}
			<a href="{$pagerUrl},{$page-1}{$query}" data-page="{$page-1}" aria-label="poprzednia" class="cat-pager-link hover:text-[var(--brand-red)]">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m15 18-6-6 6-6"></path></svg>
			</a>
			{else}
			<a href="{$url}{$query}" data-page="1" aria-label="poprzednia" class="cat-pager-link hover:text-[var(--brand-red)]">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m15 18-6-6 6-6"></path></svg>
			</a>
			{/if}
		{else}
		<span class="opacity-50" aria-hidden="true">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m15 18-6-6 6-6"></path></svg>
		</span>
		{/if}
		<span class="border border-[#bbb] px-3 py-1 bg-white">{$page}</span>
		<span>z {$pages}</span>
		{if $page < $pages}
		<a href="{$pagerUrl},{$page+1}{$query}" data-page="{$page+1}" aria-label="następna" class="cat-pager-link hover:text-[var(--brand-red)]">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m9 18 6-6-6-6"></path></svg>
		</a>
		{else}
		<span class="opacity-50" aria-hidden="true">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5"><path d="m9 18 6-6-6-6"></path></svg>
		</span>
		{/if}
	</div>
{else}
	<div id="cat-pager" class="hidden" data-page="{$page}" data-pages="{$pages}"></div>
{/if}
</div>
