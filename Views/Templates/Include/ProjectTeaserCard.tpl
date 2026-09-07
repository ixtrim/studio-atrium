{* Shared project teaser — layout matches OurBestsellers.tpl
   Expects $item with: url, image_url, name, type_label, area, rooms, baths, garage, price, price_old
   Optional: tag | badge_label, badge_variant, id *}
{assign var=_badge value=''}
{assign var=_badgeVariant value=''}
{if $item.badge_label}
	{assign var=_badge value=$item.badge_label}
	{assign var=_badgeVariant value=$item.badge_variant}
{elseif $item.tag}
	{assign var=_badge value=$item.tag}
{/if}
<a href="{$item.url|escape}"
	class="bg-white overflow-hidden h-full flex flex-col group border border-[#f5f5f5]">
	<div class="relative overflow-hidden">
		<img src="{$item.image_url|escape}" alt="{$item.name|escape}"
			class="w-full h-[280px] object-cover transition-transform duration-500 group-hover:scale-105"
			loading="{if isset($teaser_eager) && $teaser_eager}eager{else}lazy{/if}"
			{if $item.id}onerror="this.onerror=null;this.src='https://media.studioatrium.pl/project/{$item.id|escape}/render-box.jpg';"{/if}>
		{if $_badge}
		<span class="absolute top-3 left-3 text-[11px] font-bold tracking-wider {if $_badgeVariant == 'discount' || $_badgeVariant == 'sale'}bg-[var(--brand-red)] text-white{else}bg-white/90 text-[var(--brand-red)]{/if} px-2.5 py-1">{$_badge|escape}</span>
		{/if}
	</div>
	<div class="px-5 pt-4 pb-5 flex flex-col gap-3 flex-1">
		<h3 class="text-[22px] font-bold text-[#222] leading-tight">{$item.name|escape}</h3>
		<div class="text-[13px] font-bold tracking-wider text-[var(--brand-red)]">{$item.type_label|escape}</div>
		<div class="flex items-center gap-4 py-2 text-[13px] text-[#222] flex-wrap">
			{if $item.area}
			<div class="flex items-center gap-2"><span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-vector-square" aria-hidden="true"><path d="M17.055 4.533a24 24 0 00-10.11 0"/><path d="M19.467 17.055a24 24 0 000-10.11"/><path d="M4.533 6.945a24 24 0 000 10.11"/><path d="M6.945 19.467a24 24 0 0010.11 0"/><circle cx="19" cy="19" r="2"/><circle cx="19" cy="5" r="2"/><circle cx="5" cy="19" r="2"/><circle cx="5" cy="5" r="2"/></svg></span><span>{$item.area|escape}</span></div>
			{/if}
			{if $item.rooms != ''}
			<div class="flex items-center gap-1.5"><span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 4v16"></path><path d="M2 8h18a2 2 0 0 1 2 2v10"></path><path d="M2 17h20"></path><path d="M6 8v9"></path></svg></span><span>{$item.rooms|escape}</span></div>
			{/if}
			{if $item.baths > 0}
			<div class="flex items-center gap-1.5"><span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 4 8 6"></path><path d="M17 19v2"></path><path d="M2 12h20"></path><path d="M7 19v2"></path><path d="M9 5 7.621 3.621A2.121 2.121 0 0 0 4 5v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5"></path></svg></span><span>{$item.baths|escape}</span></div>
			{/if}
			{if $item.garage > 0}
			<div class="flex items-center gap-1.5"><span class="w-[32px] h-[32px] border border-black/20 inline-flex items-center justify-center shrink-0 text-[#555]"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path><circle cx="7" cy="17" r="2"></circle><path d="M9 17h6"></path><circle cx="17" cy="17" r="2"></circle></svg></span><span>{$item.garage|escape}</span></div>
			{/if}
		</div>
		<div class="pt-1 mt-auto">
			{if $item.price_old}
			<div class="text-[16px] text-[var(--brand-red)] line-through">{$item.price_old|escape} PLN</div>
			{/if}
			<div class="flex items-baseline gap-2"><span class="text-[34px] font-['Montserrat',sans-serif] font-semibold text-[var(--brand-blue-strong)] leading-none">{$item.price|escape}</span><span class="text-[16px] text-[var(--brand-blue-strong)] font-semibold">PLN</span></div>
		</div>
	</div>
</a>
