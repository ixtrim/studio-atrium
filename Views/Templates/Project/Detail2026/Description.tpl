<section id="opis" class="bg-white py-16 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<div class="grid lg:grid-cols-12 gap-10 lg:gap-16 items-start">
			<div class="lg:col-span-4">
				<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">O projekcie</span>
				<h2 class="mt-3 text-[40px] md:text-[52px] leading-[1.05] text-[#1b2025] font-bold tracking-tight">Opis</h2>
				<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
				<div class="mt-6 text-[13px] uppercase tracking-[0.18em] text-[#6b7177] font-semibold">{$detailCategoryTitle|escape}</div>
			</div>
			<div class="lg:col-span-8">
				{if $project.short_description}
				<blockquote class="text-[22px] md:text-[26px] font-bold text-[#1b2025] leading-snug border-l-4 border-[var(--brand-red)] pl-5 mb-6">
					{$project.short_description|escape}
				</blockquote>
				{/if}
				{if $project.description}
				<div class="text-[15px] leading-[1.75] text-[#444] space-y-4 prose-p:mb-4">
					{$project.description nofilter}
				</div>
				{/if}
				<div class="mt-10 grid grid-cols-3 gap-4 border-t border-[#eee] pt-8">
					<div>
						<div class="text-[11px] uppercase tracking-[0.18em] text-[#6b7177] font-semibold">Powierzchnia</div>
						<div class="mt-1 text-[22px] font-bold text-[#1b2025]">{if $detailArea}{$detailArea|escape} m²{else}—{/if}</div>
					</div>
					<div>
						<div class="text-[11px] uppercase tracking-[0.18em] text-[#6b7177] font-semibold">Sypialnie</div>
						<div class="mt-1 text-[22px] font-bold text-[#1b2025]">{if $detailBedrooms}{$detailBedrooms|escape}{else}—{/if}</div>
					</div>
					<div>
						<div class="text-[11px] uppercase tracking-[0.18em] text-[#6b7177] font-semibold">Garaż</div>
						<div class="mt-1 text-[22px] font-bold text-[#1b2025]">{if $detailGarage}{$detailGarage} stan.{else}—{/if}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
