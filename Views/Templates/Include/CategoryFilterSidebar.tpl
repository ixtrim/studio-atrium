{$af = []}
{if isset($active_filters) && $active_filters}{$af = $active_filters}{/if}
{if !isset($filter_groups) || !$filter_groups}{$filter_groups = []}{/if}
<div class="bg-[#ececec] text-[#222] overflow-hidden border border-[#e0e0e0]" id="cat-filter-sidebar">
	<div class="px-4 pt-4 pb-3 border-b border-black/10 bg-white">
		<div class="text-[14px] font-bold mb-2">Znajdź idealny projekt</div>
		<div class="text-[11px] text-[#666] mb-1.5">Wpisz nazwę projektu</div>
		<form method="get" action="{url module='project' action='search'}" class="flex overflow-hidden border border-[#d5d5d5]">
			<input type="text" name="query" placeholder="np. Aurora"
				class="flex-1 px-2.5 py-2 text-[12px] text-[#222] placeholder:text-[#888] bg-white outline-none min-w-0">
			<button type="submit" aria-label="Wyszukaj"
				class="bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] transition-colors text-white w-10 self-stretch grid place-items-center leading-none p-0 border-0">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 block" aria-hidden="true"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
			</button>
		</form>
		<div class="flex flex-wrap gap-1.5 mt-3 text-[11px]">
			<a href="/projekty-domow/"
				class="px-2 py-1 transition-colors{if $category.link == 'projekty-domow' || $category.id == 1} bg-[var(--brand-red)] text-white font-bold{else} border border-[#ccc] text-[#444] hover:border-[#888]{/if}">Wszystkie projekty</a>
			<a href="/projekty-domow/parterowe/"
				class="px-2 py-1 transition-colors{if $category.id == 5} bg-[var(--brand-red)] text-white font-bold{else} border border-[#ccc] text-[#444] hover:border-[#888]{/if}">Parterowe</a>
			<a href="/projekty-domow/z-poddaszem-uzytkowym/"
				class="px-2 py-1 transition-colors{if $category.id == 6} bg-[var(--brand-red)] text-white font-bold{else} border border-[#ccc] text-[#444] hover:border-[#888]{/if}">Z poddaszem</a>
		</div>
	</div>

	<form id="cat-filter-form" method="get" action="{$url}" class="contents">
	<div class="flex items-center justify-between px-4 py-3 border-b border-black/10 bg-[#e4e4e4]">
		<div class="flex items-center gap-2 text-[13px] font-bold tracking-wide text-[#222]">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4" aria-hidden="true"><line x1="21" x2="14" y1="4" y2="4"></line><line x1="10" x2="3" y1="4" y2="4"></line><line x1="21" x2="12" y1="12" y2="12"></line><line x1="8" x2="3" y1="12" y2="12"></line><line x1="21" x2="16" y1="20" y2="20"></line><line x1="12" x2="3" y1="20" y2="20"></line><line x1="14" x2="14" y1="2" y2="6"></line><line x1="8" x2="8" y1="10" y2="14"></line><line x1="16" x2="16" y1="18" y2="22"></line></svg>
			FILTRUJ PROJEKTY
		</div>
		<button type="button" id="cat-clear-filters" class="text-[11px] text-[#666] hover:text-[var(--brand-red)] bg-transparent border-0 p-0 cursor-pointer{if !$af} hidden{/if}">Wyczyść</button>
	</div>

	<div class="cat-filter-groups">
		{foreach $filter_groups as $group}
			{$groupHasActive = false}
			{foreach $group.options as $opt}
				{if isset($af[$opt.name]) && in_array($opt.value, (array)$af[$opt.name])}{$groupHasActive = true}{/if}
			{/foreach}
			{$isOpen = $group.open || $groupHasActive}
			<div class="border-b border-black/10 last:border-b-0 bg-white cat-filter-group" data-open="{if $isOpen}1{else}0{/if}">
				<button type="button" class="cat-filter-toggle w-full flex items-center justify-between px-4 py-3 text-[13px] hover:bg-[#f5f5f5] text-left transition-colors bg-transparent border-0 cursor-pointer text-[#222]">
					<span>{$group.title|escape}</span>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 opacity-60 transition-transform cat-filter-chevron{if $isOpen} rotate-180{/if}" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg>
				</button>
				<div class="cat-filter-options px-4 pb-3 pt-1 space-y-1.5 bg-[#f5f5f5]{if !$isOpen} hidden{/if}">
					{foreach $group.options as $opt}
						<label class="cat-filter-opt w-full flex items-center justify-start gap-2 text-left text-[12px] py-1.5 px-1 cursor-pointer">
							<input type="checkbox" class="js-cat-filter sr-only" name="{$opt.name|escape}" value="{$opt.value|escape}"{if isset($af[$opt.name]) && in_array($opt.value, (array)$af[$opt.name])} checked{/if}>
							<span class="cat-check" aria-hidden="true"></span>
							<span class="cat-filter-label">{$opt.label|escape}</span>
							<span class="cat-filter-count" aria-hidden="true">(0)</span>
						</label>
					{/foreach}
				</div>
			</div>
		{/foreach}
	</div>
	<noscript>
		<div class="px-4 py-3 bg-white border-t border-black/10">
			<button type="submit" class="w-full bg-[var(--brand-red)] text-white text-[12px] font-bold py-2">Zastosuj filtry</button>
		</div>
	</noscript>
	</form>
</div>
<script>
(function () {
	var root = document.getElementById('cat-filter-sidebar');
	if (!root) return;
	root.querySelectorAll('.cat-filter-toggle').forEach(function (btn) {
		btn.addEventListener('click', function () {
			var group = btn.closest('.cat-filter-group');
			var opts = group.querySelector('.cat-filter-options');
			var chev = group.querySelector('.cat-filter-chevron');
			var open = group.getAttribute('data-open') === '1';
			group.setAttribute('data-open', open ? '0' : '1');
			if (opts) opts.classList.toggle('hidden', open);
			if (chev) chev.classList.toggle('rotate-180', !open);
		});
	});
})();
</script>
