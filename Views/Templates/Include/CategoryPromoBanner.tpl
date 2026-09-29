<div class="flex flex-col md:flex-row items-stretch bg-[#3a3d42] text-white {$banner_class|default:'mb-6'}">
	<div class="flex-1 flex items-center px-8 py-5">
		<h3 class="text-[28px] font-semibold uppercase text-white leading-tight">
			{$category_banner.title_text|escape|nl2br}</h3>
	</div>
	{if $categoryPromoThumbs}
		<div class="flex items-center gap-3 px-4 py-4 md:py-0">
			{foreach $categoryPromoThumbs as $thumb}
				<div class="w-[70px] h-[70px] rounded-full overflow-hidden border-2 border-white/20 shrink-0">
					<img src="{$thumb|escape}" alt="" class="w-full h-full object-cover" loading="lazy">
				</div>
			{/foreach}
		</div>
	{/if}
	<div
		class="bg-white text-[#222] px-8 py-5 flex flex-col items-center justify-center text-center min-w-[220px] md:min-w-[260px] border-t-[5px] border-r-[5px] border-b-[5px] border-[#3a3d42]">
		<div class="text-[34px] font-['Montserrat',sans-serif] font-semibold leading-none">
			{$category_banner.offer_value|escape}</div>
		<div class="text-[14px] text-[#666] mt-1">{$category_banner.offer_note|escape}</div>
	</div>
</div>
