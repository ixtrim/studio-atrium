<aside id="proj-floating-cart" class="hidden lg:block fixed right-16 top-1/2 -translate-y-1/2 z-40 w-[240px] bg-white border border-[#e5e5e5] shadow-[0_12px_40px_-16px_rgba(0,0,0,0.35)] opacity-0 pointer-events-none transition-opacity duration-300" aria-hidden="true">
	<div class="px-4 pt-4 pb-3 border-b border-[#eee]">
		<div class="text-[11px] uppercase tracking-wider text-[#888] font-semibold">Projekt</div>
		<div class="mt-1 text-[16px] font-black text-[#222] leading-tight">{$project.name|escape}</div>
	</div>
	<div class="px-4 py-4">
		{if $detailThumb}
		<img src="{$detailThumb|escape}" alt="" class="w-full aspect-[4/3] object-cover mb-3" loading="lazy">
		{/if}
		<div class="text-[22px] font-black text-[var(--brand-red)] tabular-nums">{number_format($detailPrice, 0, ',', ' ')} PLN</div>
		{if !$projectParams|isWithdrawn && !$project|inBasket:$request.version}
		<button type="button" id="proj-float-cart-btn"
			class="mt-3 w-full bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white h-11 text-[11px] font-black tracking-[0.14em] uppercase transition">
			Do koszyka
		</button>
		{elseif $project|inBasket:$request.version}
		<a href="{url module=order action=cart}" class="mt-3 w-full bg-[#1b2025] text-white h-11 text-[11px] font-black tracking-[0.14em] uppercase flex items-center justify-center">W koszyku</a>
		{/if}
	</div>
</aside>
