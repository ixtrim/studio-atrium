<section class="py-20 bg-[#ECECEC]" id="charity">
	<div class="max-w-[1280px] mx-auto px-12 grid md:grid-cols-2 gap-16 items-center">
		<div class="flex items-center justify-center gap-12">
			<img src="{$charity.logo1_url|escape}" alt="{$charity.logo1_alt|escape}" class="w-40 h-40 object-contain">
			<img src="{$charity.logo2_url|escape}" alt="{$charity.logo2_alt|escape}" class="w-40 h-40 object-contain">
		</div>
		<div>
			<h2 class="text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-6 uppercase">{$charity.title|escape}</h2>
			<p class="text-[18px] leading-[24px] text-[var(--brand-darker)] max-w-[450px]">{$charity.body|escape|nl2br}</p>
		</div>
	</div>
</section>
