<section class="pt-10 pb-24 bg-white" id="initiative">
	<div class="max-w-[1480px] mx-auto px-4 sm:px-8 md:px-12 grid md:grid-cols-2 gap-[48px]">
		<div>
			<h2 class="text-[24px] md:text-[36px] leading-[40px] font-400 text-[var(--brand-darker)] tracking-tight mb-8 uppercase">{$initiative.title|escape}</h2>
			<p class="text-[16px] md:text-[20px] leading-[28px] text-[var(--brand-darker)]">{$initiative.body|escape|nl2br}</p>
		</div>
		<div class="flex flex-col items-center">
			<img src="{$initiative.image_url|escape}" alt="{$initiative.image_alt|escape}" class="w-full max-w-lg object-contain">
			<a href="{$initiative.button_url|escape}" class="mt-6 inline-flex items-center justify-center bg-[var(--brand-blue-strong)] hover:bg-[var(--brand-blue)] text-white font-bold px-8 py-3 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[13px] uppercase tracking-wider">{$initiative.button_label|escape}</a>
		</div>
	</div>
</section>
