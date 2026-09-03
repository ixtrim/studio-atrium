<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5]">
	<ol class="max-w-[1480px] mx-auto px-8 py-4 flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
		<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
		<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
		<li><a href="/projekty-domow/" class="hover:text-[#222] transition-colors">Projekty Domów</a></li>
		{if $categoryLink}
		<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
		<li><a href="{$categoryLink|escape}" class="hover:text-[#222] transition-colors">{$detailCategoryTitle|escape}</a></li>
		{/if}
		{if $subCategory}
		<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
		<li><a href="{$subCategoryLink|escape}" class="hover:text-[#222] transition-colors">{$subCategory|escape}</a></li>
		{/if}
		<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
		<li aria-current="page" class="text-[#6b6b6b]">{$project.name|escape}{if $detailIsMirror} <span class="text-[#999]">(lustro)</span>{/if}</li>
	</ol>
</nav>
