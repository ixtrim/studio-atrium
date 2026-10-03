{* 2026 project detail — matches atrium-design-preview /projekt/$slug *}
<div id="proj-2026" class="bg-white" data-project-id="{$project.id}" data-project-name="{$project.name|escape}" data-price="{$detailPrice}" data-heat-pump="{$detailHeatPump}" data-thumb="{$detailThumb|escape}" data-version="{$request.version|escape}">
{* Legacy hooks (Consultant / PromoNotify) still read #title[data-id] *}
<span id="title" data-id="{$project.id}" hidden></span>

{include file="Project/Detail2026/Breadcrumbs.tpl"}
{include file="Project/Detail2026/AnchorBar.tpl"}
{include file="Project/Detail2026/Hero.tpl"}
{include file="Project/Detail2026/FloatingCart.tpl"}
{include file="Project/Detail2026/Floors.tpl"}
{include file="Project/Detail2026/AdBanners.tpl"}
{include file="Project/Detail2026/TechData.tpl"}
{include file="Project/Detail2026/Description.tpl"}
{include file="Project/Detail2026/Similar.tpl"}
{include file="Include/LastViewed.tpl"}
{include file="Project/Detail2026/Costs.tpl"}
{include file="Project/Detail2026/Information.tpl"}
{include file="Project/Detail2026/Realizations.tpl"}
{include file="Include/Partners.tpl" section_px='px-8' section_py='py-16'}
{include file="Include/Contact.tpl"}
{include file="Project/Detail2026/Faq.tpl"}
{include file="Include/Newsletter.tpl" category_newsletter_bg=1 section_px='px-8'}

</div>

{include file="Project/Detail2026/DownloadsOverlay.tpl"}

<div id="param-info-lightbox" class="proj-param-lb fixed inset-0 hidden items-center justify-center p-4 md:p-8" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Wyjaśnienie parametru">
	<div class="proj-param-lb-backdrop absolute inset-0 bg-black/70" data-param-lb-close></div>
	<div class="proj-param-lb-panel relative z-10 w-full max-w-[720px] max-h-[min(85vh,900px)] bg-white shadow-2xl overflow-hidden flex flex-col">
		<div class="flex items-center justify-between gap-4 px-5 py-4 border-b border-[#eee] shrink-0">
			<div class="text-[13px] font-bold uppercase tracking-[0.16em] text-[#222]">Wyjaśnienie parametru</div>
			<button type="button" class="proj-param-lb-close text-[#666] hover:text-[#222] text-[22px] leading-none border-0 bg-transparent cursor-pointer p-0" data-param-lb-close aria-label="Zamknij">&times;</button>
		</div>
		<div id="param-info-over-box" class="proj-param-lb-body overflow-y-auto px-5 py-5 text-[15px] leading-[1.65] text-[#222]"></div>
	</div>
</div>
{* Legacy hook kept for project.js close handlers *}
<div id="param-info-overlay" class="hidden" aria-hidden="true"></div>

{if $detailGallery}
<div id="proj-gallery-lightbox" class="proj-gal-lb fixed inset-0 hidden items-center justify-center" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Powiększone zdjęcie">
	<div class="proj-gal-lb-backdrop absolute inset-0" data-gal-lb-close></div>

	<div class="proj-gal-lb-toolbar" role="toolbar" aria-label="Narzędzia galerii">
		{if $detailGallery|@count > 1}
		<button type="button" class="proj-gal-lb-tool" data-gal-lb-thumbs aria-label="Miniatury" title="Miniatury" aria-pressed="false">
			<svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><rect x="3" y="3" width="5" height="5" fill="currentColor"/><rect x="10" y="3" width="5" height="5" fill="currentColor"/><rect x="17" y="3" width="5" height="5" fill="currentColor"/><rect x="3" y="10" width="5" height="5" fill="currentColor"/><rect x="10" y="10" width="5" height="5" fill="currentColor"/><rect x="17" y="10" width="5" height="5" fill="currentColor"/><rect x="3" y="17" width="5" height="5" fill="currentColor"/><rect x="10" y="17" width="5" height="5" fill="currentColor"/><rect x="17" y="17" width="5" height="5" fill="currentColor"/></svg>
		</button>
		<button type="button" class="proj-gal-lb-tool" data-gal-lb-play aria-label="Pokaz slajdów" title="Pokaz slajdów" aria-pressed="false">
			<svg class="proj-gal-lb-icon-play" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="currentColor" d="M8 5v14l11-7z"/></svg>
			<svg class="proj-gal-lb-icon-pause hidden" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="currentColor" d="M6 5h4v14H6zm8 0h4v14h-4z"/></svg>
		</button>
		{/if}
		<button type="button" class="proj-gal-lb-tool" data-gal-lb-fs aria-label="Pełny ekran" title="Pełny ekran">
			<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="M8 3H3v5M16 3h5v5M8 21H3v-5M16 21h5v-5"/></svg>
		</button>
		<button type="button" class="proj-gal-lb-tool" data-gal-lb-zoom aria-label="Powiększ" title="Powiększ" aria-pressed="false">
			<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3M11 8v6M8 11h6"/></svg>
		</button>
		<button type="button" class="proj-gal-lb-tool" data-gal-lb-close aria-label="Zamknij" title="Zamknij">
			<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
		</button>
	</div>

	{if $detailGallery|@count > 1}
	<button type="button" class="proj-gal-lb-nav proj-gal-lb-prev" data-gal-lb-prev aria-label="Poprzednie zdjęcie">
		<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
	</button>
	<button type="button" class="proj-gal-lb-nav proj-gal-lb-next" data-gal-lb-next aria-label="Następne zdjęcie">
		<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
	</button>
	{/if}

	<figure class="proj-gal-lb-panel relative z-10 w-full max-w-[min(1920px,98vw)] px-2">
		<div class="proj-gal-lb-stage relative overflow-hidden">
			<div class="proj-gal-lb-media relative flex items-center justify-center p-0 m-0">
				<img id="proj-gal-lb-img" src="" alt="" width="1920" height="1080" decoding="async" class="block max-w-full max-h-[min(92vh,1080px)] w-auto h-auto object-contain select-none">
			</div>
		</div>
		<div class="proj-gal-lb-meta">
			<div id="proj-gal-lb-caption" class="proj-gal-lb-caption-text"></div>
			<div id="proj-gal-lb-counter" class="proj-gal-lb-counter-text"></div>
		</div>
		{if $detailGallery|@count > 1}
		<div class="proj-gal-lb-thumbs" id="proj-gal-lb-thumbs" hidden>
			{foreach $detailGallery as $img}
			<button type="button" class="proj-gal-lb-thumb" data-gal-lb-thumb="{$img@index}" aria-label="Zdjęcie {$img@iteration}">
				<img src="{$img.thumb|escape}" alt="" loading="lazy">
			</button>
			{/foreach}
		</div>
		<div class="proj-gal-lb-progress" aria-hidden="true"><span id="proj-gal-lb-progress-bar"></span></div>
		{/if}
	</figure>
</div>
{/if}

{if $detailRealizations}
<div id="proj-realizations-lightbox" class="proj-gal-lb fixed inset-0 hidden items-center justify-center" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Galeria realizacji">
	<div class="proj-gal-lb-backdrop absolute inset-0" data-real-lb-close></div>

	<div class="proj-gal-lb-toolbar" role="toolbar" aria-label="Narzędzia galerii realizacji">
		{if $detailRealizations|@count > 1}
		<button type="button" class="proj-gal-lb-tool" data-real-lb-thumbs aria-label="Miniatury" title="Miniatury" aria-pressed="false">
			<svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><rect x="3" y="3" width="5" height="5" fill="currentColor"/><rect x="10" y="3" width="5" height="5" fill="currentColor"/><rect x="17" y="3" width="5" height="5" fill="currentColor"/><rect x="3" y="10" width="5" height="5" fill="currentColor"/><rect x="10" y="10" width="5" height="5" fill="currentColor"/><rect x="17" y="10" width="5" height="5" fill="currentColor"/><rect x="3" y="17" width="5" height="5" fill="currentColor"/><rect x="10" y="17" width="5" height="5" fill="currentColor"/><rect x="17" y="17" width="5" height="5" fill="currentColor"/></svg>
		</button>
		<button type="button" class="proj-gal-lb-tool" data-real-lb-play aria-label="Pokaz slajdów" title="Pokaz slajdów" aria-pressed="false">
			<svg class="proj-gal-lb-icon-play" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="currentColor" d="M8 5v14l11-7z"/></svg>
			<svg class="proj-gal-lb-icon-pause hidden" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="currentColor" d="M6 5h4v14H6zm8 0h4v14h-4z"/></svg>
		</button>
		{/if}
		<button type="button" class="proj-gal-lb-tool" data-real-lb-fs aria-label="Pełny ekran" title="Pełny ekran">
			<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="M8 3H3v5M16 3h5v5M8 21H3v-5M16 21h5v-5"/></svg>
		</button>
		<button type="button" class="proj-gal-lb-tool" data-real-lb-zoom aria-label="Powiększ" title="Powiększ" aria-pressed="false">
			<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3M11 8v6M8 11h6"/></svg>
		</button>
		<button type="button" class="proj-gal-lb-tool" data-real-lb-close aria-label="Zamknij" title="Zamknij">
			<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
		</button>
	</div>

	{if $detailRealizations|@count > 1}
	<button type="button" class="proj-gal-lb-nav proj-gal-lb-prev" data-real-lb-prev aria-label="Poprzednie zdjęcie">
		<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
	</button>
	<button type="button" class="proj-gal-lb-nav proj-gal-lb-next" data-real-lb-next aria-label="Następne zdjęcie">
		<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
	</button>
	{/if}

	<figure class="proj-gal-lb-panel relative z-10 w-full max-w-[min(1920px,98vw)] px-2">
		<div class="proj-gal-lb-stage relative overflow-hidden">
			<div class="proj-gal-lb-media relative flex items-center justify-center p-0 m-0">
				<img id="proj-real-lb-img" src="" alt="" width="1920" height="1080" decoding="async" class="block max-w-full max-h-[min(92vh,1080px)] w-auto h-auto object-contain select-none">
			</div>
		</div>
		<div class="proj-gal-lb-meta">
			<div id="proj-real-lb-caption" class="proj-gal-lb-caption-text"></div>
			<div id="proj-real-lb-counter" class="proj-gal-lb-counter-text"></div>
		</div>
		{if $detailRealizations|@count > 1}
		<div class="proj-gal-lb-thumbs" id="proj-real-lb-thumbs" hidden>
			{foreach $detailRealizations as $img}
			<button type="button" class="proj-gal-lb-thumb" data-real-lb-thumb="{$img@index}" aria-label="Zdjęcie {$img@iteration}">
				<img src="{$img.src|escape}" alt="" loading="lazy">
			</button>
			{/foreach}
		</div>
		<div class="proj-gal-lb-progress" aria-hidden="true"><span id="proj-real-lb-progress-bar"></span></div>
		{/if}
	</figure>
</div>
{/if}

<script src="/js/project2026.js?v=20261003f" defer></script>
