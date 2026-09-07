{if $listCards}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 items-stretch fav-wrapper" id="project-list">
	{foreach $listCards as $item}
	{include file="Include/ProjectTeaserCard.tpl" item=$item teaser_interactive=true}
	{/foreach}

	<div class="cat-advisor-tile bg-[#ececec] p-6 flex flex-col h-full min-h-[420px] border border-[#f5f5f5]">
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
