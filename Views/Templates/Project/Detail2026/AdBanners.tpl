<section class="bg-white py-8" aria-label="Reklamy partnerów">
	<div class="max-w-[1480px] mx-auto px-8 grid grid-cols-1 md:grid-cols-3 gap-4">
		{if $banner && $bannerUrl}
		<a href="{$banner.link|escape}" target="_blank" rel="noopener noreferrer nofollow"
			class="border border-[#e5e5e5] bg-[#f5f5f5] h-[140px] flex items-center justify-center px-6 hover:border-[#ccc] transition-colors">
			<img src="{$bannerUrl}/{$banner.banner|escape}" alt="" class="max-h-[100px] max-w-full object-contain" loading="lazy"
				width="{$banner.width|default:300}" height="{$banner.height|default:100}">
		</a>
		{else}
		<a href="/projekt-indywidualny.html" class="border border-[#e5e5e5] bg-[#f5f5f5] h-[140px] flex items-center justify-center px-6 hover:border-[#ccc] transition-colors">
			<img src="/img/indywidualne.jpg" alt="Indywidualne projekty domów" class="max-h-[100px] max-w-full object-contain" loading="lazy">
		</a>
		{/if}
		<a href="https://aluprof.eu" target="_blank" rel="noopener noreferrer" class="border border-[#e5e5e5] bg-[#f5f5f5] h-[140px] flex items-center justify-center px-6 hover:border-[#ccc] transition-colors">
			<img src="https://media.studioatrium.pl/document/1309/samll-logo.png" alt="Aluprof" class="max-h-[100px] max-w-full object-contain" loading="lazy">
		</a>
		<a href="https://www.fakro.pl" target="_blank" rel="noopener noreferrer" class="border border-[#e5e5e5] bg-[#f5f5f5] h-[140px] flex items-center justify-center px-6 hover:border-[#ccc] transition-colors">
			<img src="https://media.studioatrium.pl/document/1179/fakro.jpg" alt="Fakro" class="max-h-[100px] max-w-full object-contain" loading="lazy">
		</a>
	</div>
</section>
