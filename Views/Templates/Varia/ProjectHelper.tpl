{* 2026 — Znajdziemy dla Ciebie projekt *}
<div id="helper-2026" class="bg-white">

	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
		<div class="max-w-[1480px] mx-auto px-8">
			<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
				<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li aria-current="page" class="text-[#6b6b6b]">Znajdziemy dla Ciebie projekt</li>
			</ol>
		</div>
	</nav>

	<section class="w-full bg-[#f5f6f7] border-b border-black/5">
		<div class="max-w-[1480px] mx-auto px-8 py-10 md:py-12">
			<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Pomoc doradcy</span>
			<h1 class="mt-3 text-[32px] md:text-[40px] font-400 text-[var(--brand-darker)] tracking-tight uppercase leading-tight">Znajdziemy dla Ciebie projekt</h1>
			<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
			<p class="mt-5 max-w-2xl text-[15px] md:text-[16px] leading-relaxed text-[#555]">
				Jeśli chcesz, aby konsultanci Studio Atrium pomogli Ci w znalezieniu projektu — wypełnij i wyślij poniższy formularz.
			</p>
		</div>
	</section>

	<section class="w-full bg-white py-12 md:py-16">
		<div class="max-w-[1480px] mx-auto px-8">
			<form action="{url module=varia action=send_helper}" method="post" id="project-helper-form" class="validable ph-form" data-validate="ProjectHelper.validate">
				<input name="module" type="hidden" value="varia">
				<input name="action" type="hidden" value="send_helper">

				<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
					<div class="lg:col-span-7 space-y-8">
						<div>
							<div class="text-[12px] font-bold uppercase tracking-[0.16em] text-[#6b7177] mb-3">Rodzaj domu</div>
							<div class="ph-options">
								<label class="ph-option">
									<input type="checkbox" name="house_type[]" value="ground" id="type-base">
									<span class="ph-option__mark" aria-hidden="true"></span>
									<span class="ph-option__text">Parterowy</span>
								</label>
								<label class="ph-option">
									<input type="checkbox" name="house_type[]" value="loft" id="type-loft">
									<span class="ph-option__mark" aria-hidden="true"></span>
									<span class="ph-option__text">Parterowy z poddaszem użytkowym</span>
								</label>
								<label class="ph-option">
									<input type="checkbox" name="house_type[]" value="attic" id="type-attic">
									<span class="ph-option__mark" aria-hidden="true"></span>
									<span class="ph-option__text">Parterowy ze strychem do adaptacji</span>
								</label>
								<label class="ph-option">
									<input type="checkbox" name="house_type[]" value="storey" id="type-storey">
									<span class="ph-option__mark" aria-hidden="true"></span>
									<span class="ph-option__text">Piętrowy</span>
								</label>
							</div>
						</div>

						<div>
							<div class="text-[12px] font-bold uppercase tracking-[0.16em] text-[#6b7177] mb-3">Powierzchnia użytkowa</div>
							<div class="flex flex-wrap items-center gap-3">
								<div class="ph-field ph-field--short">
									<label for="area-from" class="ph-label">Od</label>
									<input type="text" name="area_from" id="area-from" class="ph-input" inputmode="decimal" placeholder="np. 90">
								</div>
								<span class="text-[#888] text-[14px] pt-5">—</span>
								<div class="ph-field ph-field--short">
									<label for="area-to" class="ph-label">Do</label>
									<input type="text" name="area_to" id="area-to" class="ph-input" inputmode="decimal" placeholder="np. 140">
								</div>
								<span class="text-[#555] text-[14px] font-semibold pt-5">m<sup>2</sup></span>
							</div>
						</div>

						<div class="ph-field ph-field--short">
							<label for="parcel-width" class="ph-label">Maks. szerokość działki</label>
							<div class="flex items-center gap-3">
								<input type="text" name="parcel_width" id="parcel-width" class="ph-input" inputmode="decimal" placeholder="np. 20">
								<span class="text-[#555] text-[14px] font-semibold shrink-0">m</span>
							</div>
						</div>

						<div>
							<div class="text-[12px] font-bold uppercase tracking-[0.16em] text-[#6b7177] mb-3">Rodzaj dachu</div>
							<div class="ph-options">
								<label class="ph-option">
									<input type="checkbox" name="roof_type[]" value="two" id="roof-two">
									<span class="ph-option__mark" aria-hidden="true"></span>
									<span class="ph-option__text">Dwuspadowy</span>
								</label>
								<label class="ph-option">
									<input type="checkbox" name="roof_type[]" value="multi" id="roof-multi">
									<span class="ph-option__mark" aria-hidden="true"></span>
									<span class="ph-option__text">Wielospadowy</span>
								</label>
								<label class="ph-option">
									<input type="checkbox" name="roof_type[]" value="flat" id="roof-flat">
									<span class="ph-option__mark" aria-hidden="true"></span>
									<span class="ph-option__text">Płaski</span>
								</label>
							</div>
						</div>

						<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
							<div class="ph-field">
								<label for="room-count" class="ph-label">Ilość pokoi bez salonu</label>
								<input type="text" name="room_count" id="room-count" class="ph-input" inputmode="numeric">
							</div>
							<div class="ph-field">
								<label for="garage-places" class="ph-label">Ilość stanowisk garażowych</label>
								<input type="text" name="garage_places" id="garage-places" class="ph-input" inputmode="numeric">
							</div>
						</div>

						<div class="ph-field">
							<label for="notice" class="ph-label">Funkcjonalność i uwagi</label>
							<textarea name="notice" id="notice" rows="5" class="ph-textarea" placeholder="Np. kuchnia od ogrodu, duży taras, biuro…"></textarea>
						</div>
					</div>

					<div class="lg:col-span-5">
						<div class="bg-[#f5f6f7] border border-[#e6e8eb] p-6 md:p-8 space-y-5">
							<div>
								<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Kontakt</span>
								<h2 class="mt-2 text-[24px] md:text-[28px] font-400 text-[var(--brand-darker)] tracking-tight uppercase leading-tight">Twoje dane</h2>
								<div class="mt-3 h-[3px] w-10 bg-[var(--brand-red)]"></div>
							</div>

							<div class="ph-field">
								<label for="helper-email" class="ph-label">E-mail *</label>
								<input type="email" name="email" id="helper-email" class="ph-input" autocomplete="email" required>
							</div>
							<div class="ph-field">
								<label for="helper-phone" class="ph-label">Telefon *</label>
								<input type="tel" name="phone" id="helper-phone" class="ph-input" autocomplete="tel" required>
							</div>

							<label class="ph-consent">
								<input type="checkbox" name="accept" id="regulations-accept" value="on" required>
								<span class="ph-consent__mark" aria-hidden="true"></span>
								<span class="ph-consent__text">
									* Wyrażam zgodę na przetwarzanie moich danych osobowych w celu otrzymania odpowiedzi zgodnie z oświadczeniem.
									<span class="ajax-info ph-details" data-url="{url module=ajax action=get_consultant_regulations}">Szczegóły</span>
								</span>
							</label>

							<label class="ph-consent">
								<input type="checkbox" name="newsletter" value="on" id="newsletter">
								<span class="ph-consent__mark" aria-hidden="true"></span>
								<span class="ph-consent__text">Chcę się zapisać do newslettera</span>
							</label>

							<div id="accept-newsletter-box" class="ph-newsletter-extra" hidden>
								<label class="ph-consent">
									<input type="checkbox" name="accept_newsletter" id="newsletter-accept" value="on">
									<span class="ph-consent__mark" aria-hidden="true"></span>
									<span class="ph-consent__text">
										* Wyrażam zgodę na przetwarzanie moich danych osobowych w celu otrzymywania informacji o promocjach i ofercie projektowej.
										<span class="ajax-info ph-details" data-url="{url module=ajax action=get_mailing_regulations}">Szczegóły</span>
									</span>
								</label>
							</div>

							<p class="text-[12px] text-[#888] m-0">* pola wymagane</p>

							<button type="submit" class="ph-submit">Wyślij zapytanie</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>

	{include file="Include/Partners.tpl" section_px='px-8' section_py='py-16'}
	{include file="Include/Newsletter.tpl" category_newsletter_bg=1 section_px='px-8'}

</div>
