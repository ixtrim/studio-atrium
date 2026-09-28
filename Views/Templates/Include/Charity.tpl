<section class="pt-10 pb-24 bg-[#ECECEC]" id="charity">
	<div class="max-w-[1480px] mx-auto px-4 sm:px-8 md:px-12 grid md:grid-cols-2 gap-[48px] items-center pb-10">
		<div class="flex items-center justify-center gap-6 sm:gap-12">
			<img src="{$charity.logo1_url|escape}" alt="{$charity.logo1_alt|escape}" class="w-28 h-28 sm:w-40 sm:h-40 object-contain">
			<img src="{$charity.logo2_url|escape}" alt="{$charity.logo2_alt|escape}" class="w-28 h-28 sm:w-40 sm:h-40 object-contain">
		</div>
		<div>
			<h2 class="text-[24px] md:text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-12 uppercase">{$charity.title|escape}</h2>
			<p class="text-[16px] md:text-[20px] leading-[28px] text-[var(--brand-darker)]">{$charity.body|escape|nl2br}</p>
		</div>
	</div>
</section>
