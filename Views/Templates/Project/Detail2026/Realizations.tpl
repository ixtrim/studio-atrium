<section id="realizacje" class="bg-white py-14 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<div class="mb-2">
			<h2 class="text-[22px] md:text-[26px] font-bold uppercase tracking-wide text-[#1b2025]">Realizacje</h2>
			<div class="w-12 h-[3px] bg-[var(--brand-red)] mt-2"></div>
		</div>
		{if $detailRealizations}
		<div class="text-center text-[#6b6b6b] uppercase tracking-[0.25em] text-[13px] my-8">Wybudowane</div>
		<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
			{foreach $detailRealizations as $photo}
			<a href="{$photo.src|escape}" data-fancybox="realizacje" data-caption="{$photo.alt|escape}" class="group block overflow-hidden bg-[#f5f6f7]">
				<img src="{$photo.src|escape}" alt="{$photo.alt|escape}" loading="lazy" class="w-full aspect-[4/3] object-cover transition-transform duration-500 group-hover:scale-105">
			</a>
			{/foreach}
		</div>
		{else}
		<p class="text-[14px] text-[#666] mt-8">Brak opublikowanych realizacji dla tego projektu.</p>
		{/if}

		<div class="mt-14">
			<h2 class="text-[22px] md:text-[26px] font-bold uppercase tracking-wide text-[#1b2025]">Forum dyskusyjne</h2>
			<div class="text-[12px] uppercase tracking-[0.2em] text-[#6b6b6b] mt-1">Wpisy dla projektu {$project.name|escape}</div>
			<div class="w-12 h-[3px] bg-[var(--brand-red)] mt-3"></div>
			<p class="text-[14px] text-[#444] leading-relaxed mt-6 max-w-3xl">
				Witamy na Forum dyskusyjnym Studia Atrium. To dział naszego serwisu przeznaczony dla wszystkich zainteresowanych projektami i budową domu według naszych projektów. Poniżej znajdują się wszystkie wpisy z Forum związane z projektem domu {$project.name|escape}. Zapraszamy do dyskusji!
			</p>
			{if $commentList}
			<ul class="mt-8 space-y-4 max-w-3xl">
				{foreach $commentList as $c}
				<li class="border border-[#e5e5e5] p-4">
					<div class="text-[13px] font-bold text-[#222]">{if $c.title}{$c.title|escape}{else}Wątek{/if}</div>
					{if $c.content}<div class="text-[14px] text-[#555] mt-2 leading-relaxed">{$c.content|escape|truncate:220}</div>{/if}
				</li>
				{/foreach}
			</ul>
			{/if}
			{if $user}
			<a href="#forum" class="inline-flex mt-6 bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white text-[12px] font-bold uppercase tracking-wider px-5 py-3">Dodaj nowy temat</a>
			{else}
			<a href="javascript:" class="login-trigger inline-flex mt-6 bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white text-[12px] font-bold uppercase tracking-wider px-5 py-3">Dodaj nowy temat</a>
			{/if}
		</div>

		<div class="mt-14">
			<h2 class="text-[22px] md:text-[26px] font-bold uppercase tracking-wide text-[#1b2025]">Pliki</h2>
			<div class="w-12 h-[3px] bg-[var(--brand-red)] mt-2"></div>
			<p class="text-[14px] text-[#444] leading-relaxed mt-6 max-w-3xl">
				Aby pobrać rysunki szczegółowe{if $detailCostStages}, kosztorys szacunkowy{/if}, obrysy domu lub zestawienie materiałów do tego projektu,
				{if $user}
				użyj przycisku poniżej.
				{else}
				<a href="javascript:" class="account login-trigger text-[var(--brand-blue-strong)] underline">zaloguj się do swojego konta</a> i przejdź ponownie do sekcji plików.
				{/if}
			</p>
			{if $user}
			<button type="button" class="filesDloadTrigger mt-6 inline-flex bg-white border border-[#d9dde0] text-[#222] text-[12px] font-bold uppercase tracking-wider px-5 py-3 hover:border-[var(--brand-blue)] transition-colors">Pobierz pliki</button>
			{/if}
		</div>
	</div>
</section>
