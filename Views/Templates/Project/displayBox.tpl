{if $listCards}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5 items-stretch fav-wrapper" id="project-list">
	{foreach $listCards as $item}
	<a href="{$item.url|escape}" class="bg-white border border-[#e5e5e5] overflow-hidden h-full flex flex-col group">
		<div class="relative overflow-hidden">
			<img src="{$item.image_url|escape}" alt="Projekt domu {$item.name|escape}"
				class="w-full h-[230px] object-cover transition-transform duration-500 group-hover:scale-105"
				loading="{if $item@iteration < 7}eager{else}lazy{/if}"
				width="640" height="230"
				onerror="this.onerror=null;this.src='https://media.studioatrium.pl/project/{$item.id|escape}/render-box.jpg';">
			{if $item.badge_label}
			<span class="absolute top-3 left-3 text-[11px] font-bold tracking-wider {if $item.badge_variant == 'new'}bg-white/90 text-[var(--brand-red)]{else}bg-[var(--brand-red)] text-white{/if} px-2.5 py-1">{$item.badge_label|escape}</span>
			{/if}
		</div>
		<div class="px-4 pt-3 pb-4 flex flex-col gap-2 flex-1">
			<div class="flex items-start justify-between gap-3">
				<h3 class="text-[18px] font-bold text-[#222] leading-tight min-h-[44px]">{$item.name|escape}</h3>
				<div class="flex items-center gap-2 shrink-0 mt-0.5">
					<button type="button" aria-label="Porównaj" id="compare-{$item.id}"
						class="compare cat-icon-btn text-[#555] hover:text-[var(--brand-red)]{if in_array($item.id, $compareIds)} on{/if}"
						data-id="{$item.id}" onclick="event.preventDefault();event.stopPropagation();">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5" style="width:20px;height:20px;max-width:20px;max-height:20px" aria-hidden="true"><path d="M12 3v18"></path><path d="m19 8 3 8a5 5 0 0 1-6 0zV7"></path><path d="M3 7h1a17 17 0 0 0 8-2 17 17 0 0 0 8 2h1"></path><path d="m5 8 3 8a5 5 0 0 1-6 0zV7"></path><path d="M7 21h10"></path></svg>
					</button>
					<button type="button" aria-label="Ulubione" id="fav-{$item.id}"
						class="fav cat-icon-btn text-[#555] hover:text-[var(--brand-red)]{if in_array($item.id, $favouriteIds)} on{/if}"
						data-id="{$item.id}" onclick="event.preventDefault();event.stopPropagation();">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5" style="width:20px;height:20px;max-width:20px;max-height:20px" aria-hidden="true"><path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"></path></svg>
					</button>
				</div>
			</div>
			<div class="text-[13px] text-[var(--brand-red)] font-bold tracking-wide">{$item.type_label|escape}</div>
			<div class="flex items-center flex-wrap gap-3 py-1 text-[13px] text-[#222]">
				{if $item.area}
				<div class="flex items-center gap-1.5">
					<span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-vector-square" aria-hidden="true"><path d="M17.055 4.533a24 24 0 00-10.11 0"/><path d="M19.467 17.055a24 24 0 000-10.11"/><path d="M4.533 6.945a24 24 0 000 10.11"/><path d="M6.945 19.467a24 24 0 0010.11 0"/><circle cx="19" cy="19" r="2"/><circle cx="19" cy="5" r="2"/><circle cx="5" cy="19" r="2"/><circle cx="5" cy="5" r="2"/></svg>
					</span>
					<span>{$item.area|escape}</span>
				</div>
				{/if}
				{if $item.rooms != ''}
				<div class="flex items-center gap-1.5">
					<span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 4v16"></path><path d="M2 8h18a2 2 0 0 1 2 2v10"></path><path d="M2 17h20"></path><path d="M6 8v9"></path></svg>
					</span>
					<span>{$item.rooms|escape}</span>
				</div>
				{/if}
				{if $item.baths > 0}
				<div class="flex items-center gap-1.5">
					<span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 4 8 6"></path><path d="M17 19v2"></path><path d="M2 12h20"></path><path d="M7 19v2"></path><path d="M9 5 7.621 3.621A2.121 2.121 0 0 0 4 5v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"></path></svg>
					</span>
					<span>{$item.baths|escape}</span>
				</div>
				{/if}
				{if $item.garage > 0}
				<div class="flex items-center gap-1.5">
					<span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path><circle cx="7" cy="17" r="2"></circle><path d="M9 17h6"></path><circle cx="17" cy="17" r="2"></circle></svg>
					</span>
					<span>{$item.garage|escape}</span>
				</div>
				{/if}
			</div>
			<div class="pt-1 mt-auto min-h-[52px] flex flex-col justify-end">
				<div class="text-[16px] text-[var(--brand-red)] line-through min-h-[21px]{if !$item.price_old} invisible{/if}">{if $item.price_old}{$item.price_old|escape} PLN{else}—{/if}</div>
				<div class="flex items-baseline gap-2">
					<span class="text-[34px] font-['Montserrat',sans-serif] font-semibold text-[var(--brand-blue-strong)] leading-none">{$item.price|escape}</span>
					<span class="text-[16px] text-[var(--brand-blue-strong)] font-semibold">PLN</span>
				</div>
			</div>
		</div>
	</a>
	{/foreach}

	<div class="cat-advisor-tile bg-[#ececec] p-6 flex flex-col h-full min-h-[420px] border border-[#e5e5e5]">
		<h3 class="text-[24px] font-bold text-[#222] leading-tight">Porozmawiaj<br>z doradcą</h3>
		<p class="text-[13px] text-[#222] mt-3 leading-relaxed">
			Potrzebujesz porady? Nie wiesz, jaki projekt będzie odpowiedni na swoją działkę. Zadzwoń lub napisz - pomożemy
		</p>
		<div class="mt-4 text-[20px] font-bold text-[#222] leading-tight">
			{if $contact.phone1}{$contact.phone1|escape}{else}33 822 94 96{/if}<br>
			{if $contact.phone2}{$contact.phone2|escape}{else}602 303 160{/if}
		</div>
		<a href="/znajdziemy-dla-ciebie-projekt.html"
			class="mt-auto inline-flex items-center justify-center bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white text-[12px] font-bold px-4 py-3 w-full tracking-wide text-center">
			ZNAJDŹ DOM DLA SIEBIE
		</a>
	</div>
</div>
{else}
{* Fallback for pages without enriched cards *}
<div class="container" id="project-list">
	<section>
		<div class="list-grid fav-wrapper" id="overlay-group">
		{foreach $list as $_project}
			<div>
				<figure>
					<img src="{image type=render project=$_project size=box}" alt="Projekt domu {$_project.name}" width="640" height="427" loading="lazy">
					<figcaption>
						<a href="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}">
							<span>projekt domu</span>
							<strong>{$_project.name} <span>{$_project.params_general|usableArea} m<sup>2</sup></span></strong>
						</a>
					</figcaption>
				</figure>
				<span id="compare-{$_project.id}" class="compare{if in_array($_project.id, $compareIds)} on{/if}" data-id="{$_project.id}"></span>
				<span id="fav-{$_project.id}" class="fav{if in_array($_project.id, $favouriteIds)} on{/if}" data-id="{$_project.id}"></span>
			</div>
		{/foreach}
		</div>
	</section>
</div>
{/if}
