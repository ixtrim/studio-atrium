<aside id="proj-floating-cart"
	class="hidden lg:flex fixed right-5 z-50 flex-col items-end gap-3 opacity-0 pointer-events-none transition-opacity duration-300"
	aria-hidden="true">
	<div id="proj-float-cart-panel"
		class="proj-float-cart-panel w-[280px] bg-white border border-[rgb(229,229,229)]"
		aria-hidden="true">
		<div class="px-4 pt-4 pb-3 border-b border-[rgb(238,238,238)] flex items-start justify-between gap-3">
			<div class="min-w-0">
				<div class="text-[11px] uppercase tracking-wider text-[rgb(136,136,136)] font-semibold">Projekt</div>
				<div class="mt-1 text-[16px] font-black text-[rgb(34,34,34)] leading-tight">{$project.name|escape}</div>
			</div>
			<button type="button" id="proj-float-cart-close" class="shrink-0 text-[22px] leading-none text-[rgb(136,136,136)] hover:text-[rgb(34,34,34)] border-0 bg-transparent cursor-pointer p-0" aria-label="Zamknij">&times;</button>
		</div>
		<div class="px-4 py-4">
			{if $detailThumb}
			<img src="{$detailThumb|escape}" alt="" class="w-full aspect-[4/3] object-cover mb-3" loading="lazy">
			{/if}
			{if $detailPriceOld}
			<div class="project-detail-price-old text-[13px] font-medium text-black leading-none mb-1 tabular-nums">
				<s>{number_format($detailPriceOld, 0, ',', ' ')} PLN</s>
			</div>
			{/if}
			<div class="text-[22px] font-black text-[var(--brand-red)] tabular-nums">{number_format($detailPrice, 0, ',', ' ')} PLN</div>
			{if $detailPriceOld || $project.discount}
			<div class="mt-2 border-l-4 border-[var(--brand-red)] bg-[#f5f6f7] px-2.5 py-2">
				<div class="text-[10px] uppercase tracking-[0.14em] text-[var(--brand-red)] font-bold">Obniżka ceny</div>
				<div class="mt-0.5 text-[11px] text-[#1b2025] font-semibold leading-snug">
					Najniższa cena z 30 dni przed obniżką:
					<span class="text-[var(--brand-red)] font-black tabular-nums whitespace-nowrap">
						{if $projectParams|isBlackWeek}
							{number_format($detailPrice, 0, ',', ' ')}
						{elseif $projectParams|lowestPrice}
							{$projectParams|lowestPrice}
						{elseif $detailPriceOld}
							{number_format($detailPriceOld, 0, ',', ' ')}
						{else}
							{number_format($project.price, 0, ',', ' ')}
						{/if}
						PLN
					</span>
				</div>
			</div>
			{/if}
			{if !$projectParams|isWithdrawn && !$project|inBasket:$request.version}
			<button type="button" id="proj-float-cart-btn"
				class="mt-3 w-full bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white h-11 text-[11px] font-black tracking-[0.14em] uppercase transition border-0 cursor-pointer">
				Do koszyka
			</button>
			{elseif $project|inBasket:$request.version}
			<a href="{url module=order action=cart}" class="mt-3 w-full bg-[rgb(27,32,37)] text-white h-11 text-[11px] font-black tracking-[0.14em] uppercase flex items-center justify-center">W koszyku</a>
			{/if}
		</div>
	</div>

	<button type="button" id="proj-float-cart-toggle"
		class="proj-float-cart-toggle"
		aria-label="Otwórz koszyk"
		aria-expanded="false"
		aria-controls="proj-float-cart-panel">
		<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
			<circle cx="8" cy="21" r="1"/>
			<circle cx="19" cy="21" r="1"/>
			<path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/>
		</svg>
	</button>
</aside>
