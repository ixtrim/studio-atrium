{if $detailFloors}
<section id="rzuty" class="bg-[#f5f6f7] py-16 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<div class="mb-10 flex items-end justify-between gap-6 flex-wrap">
			<div>
				<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Plan budynku</span>
				<h2 class="mt-3 text-[34px] md:text-[42px] leading-tight text-[#1b2025] font-bold tracking-tight">Rzuty</h2>
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
					<div class="proj-floor-tooltip absolute left-1/2 -translate-x-1/2 -bottom-3 translate-y-full bg-white border border-[#e5e5e5] text-[#222] px-4 py-2.5 shadow-lg max-w-[90%] text-center pointer-events-none z-20 hidden">
						<div class="tooltip-name text-[13px] font-semibold"></div>
						<div class="tooltip-desc text-[11px] text-[#666] mt-0.5"></div>
					</div>
					{/if}
				</div>
				<div class="mt-6 flex items-center justify-between">
					<span class="text-[11px] uppercase tracking-[0.2em] text-[#6b7177] font-semibold">{$floor.label|escape}</span>
					<a href="{$floor.img|escape}" data-fancybox="rzuty" data-caption="{$floor.label|escape} — {$project.name|escape}"
						class="text-[11px] uppercase tracking-[0.2em] text-[var(--brand-blue-strong)] hover:text-[var(--brand-red)] font-semibold transition-colors">
						Powiększ rzut →
					</a>
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
						<a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}#rzuty" class="w-full bg-white border border-[#e6e8eb] hover:border-[#1b2025] text-[#1b2025] h-10 text-[11px] font-bold tracking-[0.12em] uppercase flex items-center justify-center transition">Odbicie lustrzane — wersja podstawowa</a>
						{else}
						<a href="{url module=project action=item id=$project.id link_title=$project.name version=lustro catalog='projekty-domow'}#rzuty" class="w-full bg-white border border-[#e6e8eb] hover:border-[#1b2025] text-[#1b2025] h-10 text-[11px] font-bold tracking-[0.12em] uppercase flex items-center justify-center transition">Odbicie lustrzane</a>
						{/if}
					{/if}
					{if $hasPlot}
					<a href="{url module=project action=item id=$project.id link_title=$project.name catalog=usytuowanie}" class="w-full bg-white border border-[#e6e8eb] hover:border-[#1b2025] text-[#1b2025] h-10 text-[11px] font-bold tracking-[0.12em] uppercase flex items-center justify-center transition">Słońce w domu</a>
					{/if}
				</div>
			</div>
		</div>
		{/foreach}
	</div>
</section>
{/if}
