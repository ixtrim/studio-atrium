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
{include file="Include/NewsletterSubpage.tpl"}

</div>
<script src="/js/project2026.js?v={$version}" defer></script>
