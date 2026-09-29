{* 2026 contact page — matches homepage / category / project rails *}
<div id="contact-2026" class="bg-white">

	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
		<div class="max-w-[1480px] mx-auto px-8">
			<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
				<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li aria-current="page" class="text-[#6b6b6b]">Kontakt</li>
			</ol>
		</div>
	</nav>

	<section class="w-full bg-[#f5f6f7] border-b border-black/5">
		<div class="max-w-[1480px] mx-auto px-8 py-10 md:py-12">
			<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Studio Atrium</span>
			<h1 class="mt-3 text-[32px] md:text-[40px] font-400 text-[var(--brand-darker)] tracking-tight uppercase leading-tight">Kontakt</h1>
			<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
			<p class="mt-5 max-w-2xl text-[15px] md:text-[16px] leading-relaxed text-[#555]">
				Porozmawiaj z naszymi doradcami o projekcie domu dla Ciebie. Zadzwoń, napisz lub skorzystaj z formularza poniżej.
			</p>
		</div>
	</section>

	{include file="Include/Contact.tpl"}

	<section class="w-full bg-white pt-16">
		<div class="max-w-[1480px] mx-auto px-8">
			<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
				<div class="lg:col-span-5">
					<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Dane firmy</span>
					<h2 class="mt-3 text-[28px] md:text-[36px] font-400 text-[var(--brand-darker)] tracking-tight uppercase">Pełne dane teleadresowe</h2>
					<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>

					<div class="mt-8 space-y-6 text-[15px] leading-relaxed text-[#444]">
						{if $contact.phone1 || $contact.phone2 || $homepage_contact.phone1}
						<div>
							<div class="text-[12px] font-bold uppercase tracking-[0.16em] text-[#6b7177] mb-2">Telefon</div>
							{if $contact.phone1}
								<a href="tel:{$contact.phone1|replace:' ':''}" class="block text-[22px] md:text-[26px] font-bold text-[var(--brand-red)] leading-tight hover:text-[var(--brand-red-hover)]">{$contact.phone1|escape}</a>
							{elseif $homepage_contact.phone1}
								<a href="tel:{$homepage_contact.phone1|replace:' ':''}" class="block text-[22px] md:text-[26px] font-bold text-[var(--brand-red)] leading-tight hover:text-[var(--brand-red-hover)]">{$homepage_contact.phone1|escape}</a>
							{/if}
							{if $contact.phone2}
								<a href="tel:{$contact.phone2|replace:' ':''}" class="block text-[22px] md:text-[26px] font-bold text-[var(--brand-red)] leading-tight hover:text-[var(--brand-red-hover)]">{$contact.phone2|escape}</a>
							{elseif $homepage_contact.phone2}
								<a href="tel:{$homepage_contact.phone2|replace:' ':''}" class="block text-[22px] md:text-[26px] font-bold text-[var(--brand-red)] leading-tight hover:text-[var(--brand-red-hover)]">{$homepage_contact.phone2|escape}</a>
							{/if}
							{if $contact.extra_phones}
								<div class="mt-1 text-[13px] font-semibold text-[var(--brand-red)]">{$contact.extra_phones|escape}</div>
							{/if}
						</div>
						{/if}

						{if $contact.email}
						<div>
							<div class="text-[12px] font-bold uppercase tracking-[0.16em] text-[#6b7177] mb-2">E-mail</div>
							<a href="mailto:{$contact.email|escape}" class="text-[18px] md:text-[20px] font-bold text-[var(--brand-darker)] hover:text-[var(--brand-blue-strong)] underline underline-offset-2">{$contact.email|escape}</a>
						</div>
						{/if}

						{if $contact.details}
						<div>
							<div class="text-[12px] font-bold uppercase tracking-[0.16em] text-[#6b7177] mb-2">Adres</div>
							<div class="text-[16px] md:text-[18px] font-semibold text-[var(--brand-darker)] leading-snug">{$contact.details|escape|nl2br nofilter}</div>
						</div>
						{/if}

						<div>
							<div class="text-[12px] font-bold uppercase tracking-[0.16em] text-[#6b7177] mb-2">Godziny pracy</div>
							<div class="text-[15px] text-[#333]">
								{if $homepage_contact.hours_label}<strong>{$homepage_contact.hours_label|escape}</strong><br>{/if}
								{$homepage_contact.hours_text|default:'pon. – pt.: 8:00 – 17:00'|escape}
							</div>
						</div>

						{if $contact.map_url}
						<a href="{$contact.map_url|escape}" target="_blank" rel="noopener noreferrer"
							class="inline-flex items-center justify-center h-12 px-6 bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white text-[13px] font-black uppercase tracking-wider transition-colors">
							{$contact.map_text|default:'Zobacz dojazd'|escape}
						</a>
						{/if}
					</div>
				</div>

				<div class="lg:col-span-7">
					{if $article.content}
					<div class="contact-article bg-[#f5f6f7] border border-[#e6e8eb] p-6 md:p-8">
						{$article.content|fixArticleContent:$article.id}
					</div>
					{else}
					<div class="bg-[#f5f6f7] border border-[#e6e8eb] p-6 md:p-8 text-[15px] leading-relaxed text-[#555]">
						<p class="m-0">Studio Atrium — projekty domów. Chętnie pomożemy w wyborze dokumentacji i formalnościach zamówienia.</p>
					</div>
					{/if}

					{if $contact.map_url}
						<a href="{$contact.map_url|escape}" target="_blank" rel="noopener noreferrer"
							class="mt-6 flex items-center justify-between gap-4 border border-[#e6e8eb] bg-white hover:border-[var(--brand-blue)] px-5 py-5 transition-colors">
							<span>
								<span class="block text-[12px] font-bold uppercase tracking-[0.16em] text-[#6b7177]">Dojazd</span>
								<span class="block mt-1 text-[16px] font-bold text-[var(--brand-darker)]">{$contact.map_text|default:'Otwórz mapę w nowej karcie'|escape}</span>
							</span>
							<span class="text-[var(--brand-red)] text-[22px] font-bold leading-none" aria-hidden="true">→</span>
						</a>
					{/if}
				</div>
			</div>
		</div>
	</section>

	{include file="Include/Partners.tpl" section_px='px-8' section_py='py-16'}
	{include file="Include/Newsletter.tpl" category_newsletter_bg=1 section_px='px-8'}

</div>
