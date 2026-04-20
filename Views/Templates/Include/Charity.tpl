<section class="py-20 bg-[#ECECEC]" id="charity">
	<div class="max-w-[1280px] mx-auto px-12 grid md:grid-cols-2 gap-16 items-center">
		<div class="flex items-center justify-center gap-12">
			<img src="{$charity.logo1_url|escape}" alt="{$charity.logo1_alt|escape}" class="w-40 h-40 object-contain">
			<img src="{$charity.logo2_url|escape}" alt="{$charity.logo2_alt|escape}" class="w-40 h-40 object-contain">
		</div>
		<div>
			<h2 class="text-[26px] font-bold text-[var(--brand-darker)] mb-6">{$charity.title|escape}</h2>
			<p class="text-[15px] text-[var(--brand-darker)] leading-[1.7] max-w-[450px]">{$charity.body|escape|nl2br}</p>
		</div>
	</div>
</section>
