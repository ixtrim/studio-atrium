<section class="pt-10 pb-24 bg-[#ECECEC]" id="charity">
	<div class="max-w-[1480px] mx-auto px-12 grid md:grid-cols-2 gap-[48px] items-center pb-10">
		<div class="flex items-center justify-center gap-12">
			<img src="{$charity.logo1_url|escape}" alt="{$charity.logo1_alt|escape}" class="w-40 h-40 object-contain">
			<img src="{$charity.logo2_url|escape}" alt="{$charity.logo2_alt|escape}" class="w-40 h-40 object-contain">
		</div>
		<div>
			<h2 class="text-[36px] font-400 text-[var(--brand-darker)] tracking-tight mb-12 uppercase">{$charity.title|escape}</h2>
			<p class="text-[20px] leading-[28px] text-[var(--brand-darker)]">{$charity.body|escape|nl2br}</p>
		</div>
	</div>
</section>
