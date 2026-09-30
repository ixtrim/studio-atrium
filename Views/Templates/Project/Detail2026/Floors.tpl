{if $detailFloors}
<section id="rzuty" class="bg-[#f5f6f7] py-16 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<div class="mb-10 flex items-end justify-between gap-6 flex-wrap">
			<div>
				<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Plan budynku</span>
				<h2 class="mt-3 text-[36px] font-400 text-[var(--brand-darker)] tracking-tight uppercase">Rzuty</h2>
				<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
			</div>
			{if $detailFloors|@count > 1}
			<div class="flex gap-1 bg-white border border-[#e6e8eb] p-1" id="proj-floor-tabs" role="tablist">
				{foreach $detailFloors as $floor}
				<button type="button" role="tab" data-floor="{$floor.id|escape}"
					class="proj-floor-tab px-5 py-2 text-[12px] uppercase tracking-[0.18em] font-semibold transition-all {if $floor@first}bg-[var(--brand-blue)] text-white{else}text-[#6b7177] hover:text-[#222]{/if}">
					{$floor.label|escape}
				</button>
				{/foreach}
			</div>
			{/if}
		</div>

		{foreach $detailFloors as $floor}
		<div class="proj-floor-panel grid lg:grid-cols-12 gap-6{if !$floor@first} hidden{/if}" data-floor="{$floor.id|escape}">
			<div class="lg:col-span-8 bg-white border border-[#e6e8eb] p-5 md:p-7 relative">
				{if $floor.hotspots}
				<p class="text-[11px] uppercase tracking-[0.18em] text-[#6b7177] font-semibold mb-4">Dotknij dane pomieszczenie by zobaczyć opis i powierzchnię</p>
				{/if}
				<div class="relative mx-auto w-full max-w-[520px]" style="aspect-ratio: {$floor.width} / {$floor.height}">
					<img src="{$floor.img|escape}" alt="Rzut — {$floor.label|escape}" class="absolute inset-0 w-full h-full object-contain select-none pointer-events-none" draggable="false" loading="lazy"
						onerror="this.onerror=null;this.src='https://media.studioatrium.pl/project/{$project.id}/sketch.jpg';">
					{if $floor.hotspots}
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 {$floor.width} {$floor.height}" preserveAspectRatio="xMidYMid meet"
						class="absolute inset-0 w-full h-full z-10 proj-floor-svg" style="overflow:visible" data-floor="{$floor.id|escape}">
						{foreach $floor.hotspots as $hs}
						<polygon points="{$hs.points|escape}" data-id="{$hs.id|escape}" data-name="{$hs.name|escape}" data-desc="{$hs.desc|escape}" data-ptspid="{$hs.ptspid|escape}"
							fill="rgba(27,153,225,0)" stroke="rgba(27,153,225,0)" stroke-width="3" vector-effect="non-scaling-stroke"
							class="cursor-pointer proj-hotspot" style="pointer-events:all"></polygon>
						{/foreach}
					</svg>
					{/if}
					<div class="proj-floor-tooltip absolute left-1/2 -translate-x-1/2 -bottom-3 translate-y-full bg-white border border-[#e5e5e5] text-[#222] px-4 py-2.5 shadow-lg max-w-[90%] text-center pointer-events-none z-20 hidden">
						<div class="tooltip-name text-[13px] font-semibold"></div>
						<div class="tooltip-desc text-[11px] text-[#666] mt-0.5"></div>
					</div>
				</div>
				<div class="mt-6 flex items-center justify-between">
					<span class="text-[11px] uppercase tracking-[0.2em] text-[#6b7177] font-semibold">{$floor.label|escape}</span>
					<button type="button"
						class="proj-floor-zoom text-[11px] uppercase tracking-[0.2em] text-[var(--brand-blue-strong)] hover:text-[var(--brand-red)] font-semibold transition-colors bg-transparent border-0 p-0 cursor-pointer"
						data-floor-src="{$floor.img|escape}"
						data-floor-label="{$floor.label|escape}"
						data-floor-caption="{$floor.label|escape} — {$project.name|escape}"
						data-floor-index="{$floor@index}">
						Powiększ rzut →
					</button>
				</div>
			</div>

			<div class="lg:col-span-4 bg-white border border-[#e5e5e5] text-[#222] p-7 md:p-8 flex flex-col">
				<div class="flex items-baseline justify-between border-b border-[#eee] pb-5">
					<span class="text-[20px] tracking-[0.18em] font-light uppercase text-[#222]">{$floor.label|escape}</span>
					{if $floor.total}<span class="text-[22px] font-bold tracking-tight">{$floor.total|escape} m²</span>{/if}
				</div>
				<ul class="mt-5 space-y-[8px] text-[14px]">
					{foreach $floor.rooms as $r}
					<li class="proj-room-row flex items-center gap-3 px-1 py-0.5 cursor-pointer" data-id="{$r.id|escape}" data-ptspid="{$r.ptspid|escape}" data-name="{$r.name|escape}" data-area="{$r.area|escape}">
						<span class="w-5 text-[12px] text-[#999] tabular-nums">{$r.n}</span>
						<span class="flex-1 text-[#333]">{$r.name|escape}</span>
						<span class="text-[#555] tabular-nums">{$r.area|escape}</span>
					</li>
					{/foreach}
				</ul>
				{if $floor.total}
				<div class="mt-5 pt-4 border-t border-[#eee] flex items-center justify-between text-[14px]">
					<span class="uppercase tracking-[0.18em] text-[11px] text-[var(--brand-blue-strong)] font-semibold">Razem</span>
					<span class="font-bold text-[16px]">{$floor.total|escape}</span>
				</div>
				{/if}
				{if $floor.extra}
				<ul class="mt-3 space-y-[8px] text-[14px]">
					<li class="proj-room-row flex items-center gap-3 px-1 py-0.5 cursor-pointer" data-id="{$floor.extra.id|escape}" data-ptspid="{$floor.extra.ptspid|escape}" data-name="{$floor.extra.name|escape}" data-area="{$floor.extra.area|escape}">
						<span class="w-5 text-[12px] text-[#999] tabular-nums">{$floor.extra.n}</span>
						<span class="flex-1 text-[#333]">{$floor.extra.name|escape}</span>
						<span class="text-[#555] tabular-nums">{$floor.extra.area|escape}</span>
					</li>
				</ul>
				{/if}

				<div class="mt-auto pt-6 grid grid-cols-1 gap-2">
					{if $projectParams|hasMirror}
						{if $detailIsMirror}
						<a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}#rzuty" class="w-full bg-white border border-[#e6e8eb] hover:border-[#1b2025] text-[#1b2025] h-10 text-[11px] font-bold tracking-[0.12em] uppercase flex items-center justify-center transition">Wersja podstawowa</a>
						{else}
						<a href="{url module=project action=item id=$project.id link_title=$project.name version=lustro catalog='projekty-domow'}#rzuty" class="w-full bg-white border border-[#e6e8eb] hover:border-[#1b2025] text-[#1b2025] h-10 text-[11px] font-bold tracking-[0.12em] uppercase flex items-center justify-center transition">Odbicie lustrzane</a>
						{/if}
					{/if}
				</div>
			</div>
		</div>
		{/foreach}
	</div>
</section>

<div id="proj-floor-lightbox" class="proj-floor-lb fixed inset-0 hidden items-center justify-center" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Powiększony rzut">
	<div class="proj-floor-lb-backdrop absolute inset-0" data-floor-lb-close></div>

	<div class="proj-gal-lb-toolbar" role="toolbar" aria-label="Narzędzia rzutu">
		{if $detailFloors|@count > 1}
		<button type="button" class="proj-gal-lb-tool" data-floor-lb-play aria-label="Pokaz slajdów" title="Pokaz slajdów" aria-pressed="false">
			<svg class="proj-gal-lb-icon-play" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="currentColor" d="M8 5v14l11-7z"/></svg>
			<svg class="proj-gal-lb-icon-pause hidden" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="currentColor" d="M6 5h4v14H6zm8 0h4v14h-4z"/></svg>
		</button>
		{/if}
		<button type="button" class="proj-gal-lb-tool" data-floor-lb-fs aria-label="Pełny ekran" title="Pełny ekran">
			<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="M8 3H3v5M16 3h5v5M8 21H3v-5M16 21h5v-5"/></svg>
		</button>
		<button type="button" class="proj-gal-lb-tool" data-floor-lb-close aria-label="Zamknij" title="Zamknij">
			<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
		</button>
	</div>

	{if $detailFloors|@count > 1}
	<button type="button" class="proj-floor-lb-nav proj-floor-lb-prev" data-floor-lb-prev aria-label="Poprzedni rzut">
		<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
	</button>
	<button type="button" class="proj-floor-lb-nav proj-floor-lb-next" data-floor-lb-next aria-label="Następny rzut">
		<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
	</button>
	{/if}
	<figure class="proj-floor-lb-panel relative z-10 w-full max-w-[min(1100px,94vw)] px-2">
		<div class="proj-floor-lb-stage relative overflow-hidden">
			<div class="proj-floor-lb-media relative flex items-center justify-center bg-transparent px-2 py-2">
				<img id="proj-floor-lb-img" src="" alt="" width="900" height="700" decoding="async" class="block max-w-full max-h-[min(82vh,860px)] w-auto h-auto object-contain bg-white">
			</div>
		</div>
		<div class="proj-gal-lb-meta">
			<div>
				<div id="proj-floor-lb-label" class="proj-gal-lb-caption-text"></div>
				<div id="proj-floor-lb-caption" class="text-[12px] text-white/60 mt-0.5"></div>
			</div>
			<div id="proj-floor-lb-counter" class="proj-gal-lb-counter-text"></div>
		</div>
	</figure>
</div>
{/if}
