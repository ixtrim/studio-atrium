<section class="relative" id="newsletter-subpage">
	<div class="bg-[#3a3a3a]">
		<div class="max-w-[1480px] mx-auto px-12 py-14 grid grid-cols-12 gap-8 items-center">
			<div class="col-span-12 md:col-span-4 text-white">
				<h3 class="text-[22px] font-bold leading-snug">
					{if $newsletter.meta.signup_title}
						{$newsletter.meta.signup_title|escape|nl2br nofilter}
					{else}
						Zarejestruj się w naszym serwisie.<br>Nie przegap informacji o nowościach<br>i promocjach.
					{/if}
				</h3>
				<p class="text-[16px] leading-[24px] mt-6 opacity-90">
					{if $newsletter.meta.signup_body1}{$newsletter.meta.signup_body1|escape}{else}Zarejestruj się i korzystaj z dogodnych narzędzi wszędzie gdzie jesteś. Będziemy także zawiadamiać Cię o rabatach i promocjach.{/if}
				</p>
				<p class="text-[16px] leading-[24px] mt-4 opacity-90">
					{if $newsletter.meta.signup_body2}{$newsletter.meta.signup_body2|escape}{else}Twoje konto to swoboda korzystania z narzędzi gdziekolwiek jesteś.{/if}
				</p>
			</div>
			<div class="col-span-12 md:col-span-5">
				<input type="email" placeholder="e-mail"
					class="w-full bg-white px-6 py-4 text-[16px] text-[var(--brand-darker)] focus:outline-none placeholder:text-black/40">
				<div class="flex justify-center mt-8">
					<button type="button"
						class="inline-flex items-center justify-center bg-[var(--brand-blue)] hover:bg-[var(--brand-blue-strong)] text-white font-bold px-16 py-4 lg:h-[54px] lg:max-h-[54px] lg:py-0 leading-none text-[13px] uppercase tracking-wider">
						{if $newsletter.meta.signup_button_label}{$newsletter.meta.signup_button_label|escape}{else}Zarejestruj się{/if}
					</button>
				</div>
			</div>
			<div class="col-span-12 md:col-span-3 text-white">
				<div class="text-[28px] font-black uppercase leading-none">Odbierz</div>
				<div class="text-[64px] font-black leading-none mt-3">100 zł</div>
				<div class="text-[22px] font-bold leading-tight mt-3">na zakup<br>projektu domu</div>
			</div>
		</div>
	</div>
</section>
