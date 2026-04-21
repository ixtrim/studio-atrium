<section class="py-20 bg-white" id="initiative">
	<div class="max-w-[1280px] mx-auto px-12 grid md:grid-cols-2 gap-16 items-center">
		<div>
			<h2 class="text-[26px] font-bold text-[var(--brand-darker)] mb-6">{$initiative.title|escape}</h2>
			<p class="text-[15px] text-[var(--brand-darker)] leading-[1.7]">{$initiative.body|escape|nl2br}</p>
		</div>
		<div class="flex flex-col items-center">
			<img src="{$initiative.image_url|escape}" alt="{$initiative.image_alt|escape}" class="w-full max-w-lg object-contain">
			<a href="{$initiative.button_url|escape}" class="mt-6 inline-flex items-center justify-center bg-[var(--brand-blue-strong)] hover:bg-[var(--brand-blue)] text-white font-bold px-8 py-3 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[13px] uppercase tracking-wider">{$initiative.button_label|escape}</a>
		</div>
	</div>
</section>
