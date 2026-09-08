{* 2026 project detail — matches atrium-design-preview /projekt/$slug *}
<div id="proj-2026" class="bg-white" data-project-id="{$project.id}" data-project-name="{$project.name|escape}" data-price="{$detailPrice}" data-heat-pump="{$detailHeatPump}" data-thumb="{$detailThumb|escape}" data-version="{$request.version|escape}">

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
{include file="Include/Partners.tpl"}
{include file="Include/Contact.tpl"}
{include file="Project/Detail2026/Faq.tpl"}
{include file="Include/Newsletter.tpl" category_newsletter_bg=1}

</div>

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

<script src="/js/project2026.js?v=20260908e" defer></script>
