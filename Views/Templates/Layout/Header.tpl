{if $promo_marquee_text}
	<div class="promo-marquee" aria-label="{$promo_marquee_text|escape}">
		<div class="promo-marquee__track">
			<div class="promo-marquee__group">
				<span>{$promo_marquee_text|escape}</span>
				<span>{$promo_marquee_text|escape}</span>
				<span>{$promo_marquee_text|escape}</span>
				<span>{$promo_marquee_text|escape}</span>
				<span>{$promo_marquee_text|escape}</span>
				<span>{$promo_marquee_text|escape}</span>
			</div>
			<div class="promo-marquee__group" aria-hidden="true">
				<span>{$promo_marquee_text|escape}</span>
				<span>{$promo_marquee_text|escape}</span>
				<span>{$promo_marquee_text|escape}</span>
				<span>{$promo_marquee_text|escape}</span>
				<span>{$promo_marquee_text|escape}</span>
				<span>{$promo_marquee_text|escape}</span>
			</div>
		</div>
	</div>
{/if}

<!-- New header START -->
<header id="site-header" class="bg-white border-b border-black/5 z-50 overflow-visible font-sans rounded-none static">
	<div class="relative" id="site-header-mega">
		<div class="max-w-[1480px] mx-auto px-8 pt-5">
			<div class="flex items-center justify-between gap-8 pb-4">
				<a href="/" class="flex items-center shrink-0">
					<img src="/img/logo.svg" alt="Studio Atrium – projekty domów" class="h-[56px] w-auto shrink-0 rounded-none" id="logo" width="281" height="56">
				</a>
				<div class="flex flex-col items-end gap-3 min-w-0">
					<div class="flex items-center justify-end gap-6">
						<a href="tel:+48338229496" class="flex items-center gap-2 rounded-none" rel="nofollow">
							<i data-lucide="phone" class="w-[20px] h-[20px] text-[var(--brand-red)] shrink-0" stroke-width="2.2"></i>
							<span class="text-[var(--brand-red)] font-black text-[19px] tracking-wide leading-none">33 822 94 96</span>
						</a>
						<form method="get" action="projekty-domow/szukaj{url module='project' action='search'}" class="relative rounded-none" role="search">
							<input type="text" name="query" placeholder="wyszukaj nazwę"
								class="rounded-none bg-white border border-[#979797] h-[40px] pl-5 pr-10 text-[13px] w-[224px] leading-none text-[#343233] focus:outline-none focus:border-[var(--brand-blue)]">
							<button type="submit" aria-label="Szukaj"
								class="rounded-none absolute right-0 top-0 h-[40px] w-10 flex items-center justify-center text-[var(--brand-darker)] hover:text-[var(--brand-red)] bg-transparent">
								<i data-lucide="search" class="w-[16px] h-[16px] shrink-0"></i>
							</button>
						</form>
						<a href="{url module=favourite action=list}" aria-label="Ulubione"
							class="text-[var(--brand-darker)] hover:text-[var(--brand-red)]">
							<i data-lucide="heart" class="w-[20px] h-[20px] shrink-0"></i>
						</a>
						<a href="{url module=favourite action=compare}" aria-label="Porównaj"
							class="text-[var(--brand-darker)] hover:text-[var(--brand-red)]">
							<i data-lucide="scale" class="w-[20px] h-[20px] shrink-0"></i>
						</a>
						<a href="{url module=order action=cart}" aria-label="Koszyk"
							class="relative text-[var(--brand-darker)] hover:text-[var(--brand-red)]"{if !$basket} id="header-cart-empty"{/if}>
							<i data-lucide="shopping-cart" class="w-[22px] h-[22px] shrink-0"></i>
							{if $basket}
								<span class="absolute -top-1.5 -right-1.5 min-w-[18px] h-[18px] px-1 bg-[var(--brand-red)] text-white text-[10px] font-black leading-none grid place-items-center rounded-none">
									{$basket|@count}
								</span>
							{/if}
						</a>
						{if $user}
							<a href="{url module=panel action=account}"
								class="rounded-none border border-[#979797] h-[40px] px-6 text-[13px] font-bold tracking-wider text-[var(--brand-darker)] hover:border-[var(--brand-red)] hover:text-[var(--brand-red)] inline-flex items-center bg-white">
								KONTO
							</a>
						{else}
							<button type="button"
								class="login-trigger rounded-none border border-[#979797] h-[40px] px-6 text-[13px] font-bold tracking-wider text-[var(--brand-darker)] hover:border-[var(--brand-red)] hover:text-[var(--brand-red)] bg-white">
								ZALOGUJ
							</button>
						{/if}
					</div>
					<nav class="hidden md:flex items-center gap-10" aria-label="Główne menu">
						<a href="/" data-mega="projekty" aria-expanded="false" aria-haspopup="true"
							class="site-mega-trigger inline-flex items-center gap-1.5 text-[14px] font-black tracking-wider transition-colors duration-200 text-[var(--brand-darker)] hover:text-[var(--brand-red)]">
							PROJEKTY DOMÓW
							<i data-lucide="chevron-down" class="site-mega-chevron w-[14px] h-[14px] shrink-0 transition-transform duration-300 ease-out" stroke-width="2.5"></i>
						</a>
						<a href="/projekty-garazy/" data-mega="garaze" aria-expanded="false" aria-haspopup="true"
							class="site-mega-trigger inline-flex items-center gap-1.5 text-[14px] font-black tracking-wider transition-colors duration-200 text-[var(--brand-darker)] hover:text-[var(--brand-red)]">
							GARAŻE I INNE
							<i data-lucide="chevron-down" class="site-mega-chevron w-[14px] h-[14px] shrink-0 transition-transform duration-300 ease-out" stroke-width="2.5"></i>
						</a>
						<a href="javascript:" data-mega="wiedza" aria-expanded="false" aria-haspopup="true"
							class="site-mega-trigger inline-flex items-center gap-1.5 text-[14px] font-black tracking-wider transition-colors duration-200 text-[var(--brand-darker)] hover:text-[var(--brand-red)]">
							BAZA WIEDZY
							<i data-lucide="chevron-down" class="site-mega-chevron w-[14px] h-[14px] shrink-0 transition-transform duration-300 ease-out" stroke-width="2.5"></i>
						</a>
						<a href="/kontakt/"
							class="inline-flex items-center gap-1.5 text-[14px] font-black tracking-wider transition-colors duration-200 text-[var(--brand-red)] hover:text-[var(--brand-red)]">
							KONTAKT
						</a>
					</nav>
				</div>
			</div>
		</div>

		<div id="site-mega-dropdown"
			class="site-mega-dropdown hidden md:block absolute left-0 right-0 top-[calc(100%-12px)] pt-3 z-[60] pointer-events-none">
			<div
				class="site-mega-panel bg-[#f4f4f4] border-t border-black/5 shadow-[0_18px_40px_-18px_rgba(0,0,0,0.28)] origin-top transition-all duration-200 ease-out opacity-0 -translate-y-1.5 invisible">
				<div class="site-mega-scroll max-w-[1480px] mx-auto px-8 py-8 max-h-[min(72vh,680px)] overflow-y-auto">

					<div class="site-mega-content hidden" data-mega-panel="projekty">
						<div class="grid grid-cols-1 md:grid-cols-[220px_minmax(0,1fr)] gap-10 lg:gap-14">
							<div class="mb-[40px]">
								<ul class="space-y-1.5 text-[15px] text-[#444]">
									{foreach $siteMenu.house as $_item}
										{if $_item.menu_position == 1 && $_item.is_highlight}
											<li>
												<a href="/{$_item.link}{if strpos($_item.link, '.html') === false}/{/if}"
													class="block py-[4px] text-[14px] leading-snug text-[#333] hover:text-[var(--brand-red)] transition-colors duration-150{if $_item.is_highlight} font-bold text-[#222]{/if}">
													{$_item.name}
												</a>
											</li>
										{/if}
									{/foreach}
								</ul>
								<a href="/katalog-projektow.html" class="mt-6 block group/cat">
									<img src="/img/catalogue.webp" alt="Katalog projektów domów"
										class="w-full max-w-[200px] transition-transform duration-500 group-hover/cat:scale-[1.03]">
								</a>
								<a href="/katalog-projektow.html"
									class="mt-3 block text-[14px] font-bold text-[var(--brand-red)] hover:underline">
									Zamów bezpłatny katalog
								</a>
							</div>

							<div class="grid grid-cols-1 sm:grid-cols-3 gap-10 lg:gap-14">
							{section name=col loop=3}
								<div class="space-y-1">
									{foreach $siteMenu.house as $_item}
										{if $_item.menu_position == $smarty.section.col.iteration}
											{if $_item.children}
												<div>
													<div class="text-[14px] font-medium tracking-[0.14em] text-[var(--brand-red)] uppercase mb-[4px]">
														{$_item.name}
													</div>
													<ul>
														{foreach $_item.children as $_subitem}
															<li>
																<a href="/{$_subitem.link}{if strpos($_subitem.link, '.html') === false}/{/if}"
																	class="block py-[2px] text-[14px] leading-snug text-[#555] hover:text-[var(--brand-red)] transition-colors duration-150{if $_subitem.is_highlight} font-bold text-[#222]{/if}">
																	{$_subitem.name}
																</a>
															</li>
														{/foreach}
													</ul>
												</div>
											{elseif $_item.link}
												<div>
													<a href="/{$_item.link}{if strpos($_item.link, '.html') === false}/{/if}"
														class="block py-[4px] text-[14px] leading-snug text-[#555] hover:text-[var(--brand-red)] transition-colors duration-150{if $_item.is_highlight} font-bold text-[#222]{/if}">
														{$_item.name}
													</a>
												</div>
											{/if}
										{/if}
									{/foreach}
								</div>
							{/section}
							</div>
						</div>
					</div>

					<div class="site-mega-content hidden" data-mega-panel="garaze">
						<div class="grid grid-cols-1 sm:grid-cols-3 gap-10 lg:gap-16 py-2">
							<div>
								<div class="text-[14px] font-medium tracking-[0.14em] text-[var(--brand-red)] uppercase mb-[4px]">
									Projekty garaży
								</div>
								<ul>
									<li>
										<a href="/projekty-garazy/"
											class="block py-[4px] text-[14px] leading-snug text-[#555] hover:text-[var(--brand-red)] transition-colors duration-150">
											Wszystkie projekty garaży
										</a>
									</li>
									<li>
										<a href="/projekty-garazy/jednostanowiskowe/"
											class="block py-[4px] text-[14px] leading-snug text-[#555] hover:text-[var(--brand-red)] transition-colors duration-150">
											Garaże jednostanowiskowe
										</a>
									</li>
									<li>
										<a href="/projekty-garazy/wielostanowiskowe/"
											class="block py-[4px] text-[14px] leading-snug text-[#555] hover:text-[var(--brand-red)] transition-colors duration-150">
											Garaże wielostanowiskowe
										</a>
									</li>
								</ul>
							</div>
							<div>
								<div class="text-[14px] font-medium tracking-[0.14em] text-[var(--brand-red)] uppercase mb-[4px]">
									Mała architektura
								</div>
								<ul>
									<li>
										<a href="/projekty/altany/"
											class="block py-[4px] text-[14px] leading-snug text-[#555] hover:text-[var(--brand-red)] transition-colors duration-150">
											Altany
										</a>
									</li>
									<li>
										<a href="/projekty/wiaty/"
											class="block py-[4px] text-[14px] leading-snug text-[#555] hover:text-[var(--brand-red)] transition-colors duration-150">
											Wiaty
										</a>
									</li>
									<li>
										<a href="/projekty/ogrodzenia/"
											class="block py-[4px] text-[14px] leading-snug text-[#555] hover:text-[var(--brand-red)] transition-colors duration-150">
											Ogrodzenia
										</a>
									</li>
								</ul>
							</div>
							<div>
								<div class="text-[14px] font-medium tracking-[0.14em] text-[var(--brand-red)] uppercase mb-[4px]">
									Inne
								</div>
								<ul>
									<li>
										<a href="/projekty/osadniki/"
											class="block py-[4px] text-[14px] leading-snug text-[#555] hover:text-[var(--brand-red)] transition-colors duration-150">
											Osadniki
										</a>
									</li>
									<li>
										<a href="/projekty/gospodarcze/"
											class="block py-[4px] text-[14px] leading-snug text-[#555] hover:text-[var(--brand-red)] transition-colors duration-150">
											Budynki gospodarcze
										</a>
									</li>
									<li>
										<a href="/dodatki/"
											class="block py-[4px] text-[14px] leading-snug text-[#555] hover:text-[var(--brand-red)] transition-colors duration-150">
											Dodatki do projektów
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="site-mega-content hidden" data-mega-panel="wiedza">
						<div class="grid grid-cols-1 md:grid-cols-[200px_repeat(3,minmax(0,1fr))] gap-8 items-start">
							<ul class="space-y-2 pt-1">
								<li>
									<a href="/dokumenty/Jak-kupowac.html"
										class="block py-[4px] text-[14px] leading-snug text-[#555] hover:text-[var(--brand-red)] transition-colors duration-150">
										Jak kupować?
									</a>
								</li>
								<li>
									<a href="/dokumenty/Zasady-sprzedazy.html"
										class="block py-[4px] text-[14px] leading-snug text-[#555] hover:text-[var(--brand-red)] transition-colors duration-150">
										Zasady sprzedaży
									</a>
								</li>
								<li>
									<a href="/dokumenty/Co-zawiera-projekt.html"
										class="block py-[4px] text-[14px] leading-snug text-[#555] hover:text-[var(--brand-red)] transition-colors duration-150">
										Co zawiera projekt?
									</a>
								</li>
								<li>
									<a href="/baza-wiedzy/"
										class="block py-[4px] text-[14px] leading-snug text-[#555] hover:text-[var(--brand-red)] transition-colors duration-150">
										Cała zawartość
									</a>
								</li>
							</ul>
							<a href="/baza-wiedzy,1" class="group/card block">
								<div class="relative overflow-hidden aspect-[3/2] bg-[#e8e8e8] bg-cover bg-no-repeat"
									style="background-image:url('/img/menu.jpg'); background-position:0 -150px;">
									<div class="absolute inset-0 bg-gradient-to-t from-black/35 via-transparent to-white/10"></div>
									<span class="absolute top-3 left-3 text-[13px] font-black tracking-wider text-[var(--brand-red)] uppercase drop-shadow-sm">
										Artykuły
									</span>
								</div>
							</a>
							<a href="/baza-wiedzy,3" class="group/card block">
								<div class="relative overflow-hidden aspect-[3/2] bg-[#e8e8e8] bg-cover bg-no-repeat"
									style="background-image:url('/img/menu.jpg'); background-position:0 -300px;">
									<div class="absolute inset-0 bg-gradient-to-t from-black/35 via-transparent to-white/10"></div>
									<span class="absolute top-3 left-3 text-[13px] font-black tracking-wider text-[var(--brand-red)] uppercase drop-shadow-sm">
										O projektach
									</span>
								</div>
							</a>
							<a href="/forum/" class="group/card block">
								<div class="relative overflow-hidden aspect-[3/2] bg-[#e8e8e8] bg-cover bg-no-repeat"
									style="background-image:url('/img/menu.jpg'); background-position:0 0;">
									<div class="absolute inset-0 bg-gradient-to-t from-black/35 via-transparent to-white/10"></div>
									<span class="absolute top-3 left-3 text-[13px] font-black tracking-wider text-[var(--brand-red)] uppercase drop-shadow-sm">
										Forum dyskusyjne
									</span>
								</div>
							</a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="max-w-[1480px] mx-auto px-8 pb-4">
		<div class="flex items-center">
			<div class="flex-1 flex justify-center min-w-0">
				<div id="site-header-filters"
					class="w-auto mx-auto h-[54px] bg-[#1d99e1] rounded-none flex items-center gap-10 px-10">
					<button type="button" data-search-tab="kondygnacje"
						class="js-open-search rounded-none bg-transparent text-white font-black text-[14px] leading-none tracking-normal">
						Kondygnacje
					</button>
					<button type="button" data-search-tab="powierzchnia"
						class="js-open-search rounded-none bg-transparent text-white font-black text-[14px] leading-none tracking-normal">
						Powierzchnia
					</button>
					<button type="button" data-search-tab="garaz"
						class="js-open-search rounded-none bg-transparent text-white font-black text-[14px] leading-none tracking-normal">
						Garaż
					</button>
					<button type="button" data-search-tab="szkieletowe"
						class="js-open-search rounded-none bg-transparent text-white font-black text-[14px] leading-none tracking-normal">
						Szkieletowe
					</button>
					<button type="button" data-search-tab="dzialka"
						class="js-open-search rounded-none bg-transparent text-white font-black text-[14px] leading-none tracking-normal">
						Typ działki
					</button>
				</div>
			</div>
			<button type="button" id="search-trigger"
				class="js-open-search rounded-none bg-[#ed1d24] hover:bg-[#d11a20] text-white h-[54px] w-[264px] font-black text-[14px] leading-none tracking-normal flex items-center justify-center gap-[10px] shrink-0 ml-6">
				ZNAJDŹ PROJEKT
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sliders-horizontal shrink-0" style="width:24px;height:24px;max-width:24px;max-height:24px" aria-hidden="true"><path d="M10 5H3"/><path d="M12 19H3"/><path d="M14 3v4"/><path d="M16 17v4"/><path d="M21 12h-9"/><path d="M21 19h-5"/><path d="M21 5h-7"/><path d="M8 10v4"/><path d="M8 12H3"/></svg>
			</button>
		</div>
	</div>
</header>
<script>
{literal}
(function () {
	var header = document.getElementById('site-header');
	if (!header) return;

	var megaRoot = document.getElementById('site-header-mega');
	var dropdown = document.getElementById('site-mega-dropdown');
	var panelShell = dropdown ? dropdown.querySelector('.site-mega-panel') : null;
	var panels = header.querySelectorAll('[data-mega-panel]');
	var triggers = header.querySelectorAll('[data-mega]');
	var closeTimer = null;
	var openKey = null;

	function setMega(key) {
		openKey = key;
		var isOpen = !!key;
		if (dropdown) {
			dropdown.classList.toggle('is-open', isOpen);
		}
		if (panelShell) {
			panelShell.classList.toggle('opacity-0', !isOpen);
			panelShell.classList.toggle('-translate-y-1.5', !isOpen);
			panelShell.classList.toggle('invisible', !isOpen);
			panelShell.classList.toggle('opacity-100', isOpen);
			panelShell.classList.toggle('translate-y-0', isOpen);
			panelShell.classList.toggle('pointer-events-none', !isOpen);
		}
		panels.forEach(function (panel) {
			panel.classList.toggle('hidden', panel.getAttribute('data-mega-panel') !== key);
		});
		triggers.forEach(function (trigger) {
			var active = trigger.getAttribute('data-mega') === key;
			trigger.setAttribute('aria-expanded', active ? 'true' : 'false');
			trigger.classList.toggle('text-[var(--brand-red)]', active);
			trigger.classList.toggle('text-[var(--brand-darker)]', !active);
			var chevron = trigger.querySelector('.site-mega-chevron');
			if (chevron) {
				chevron.classList.toggle('rotate-180', active);
				chevron.classList.toggle('text-[var(--brand-red)]', active);
			}
		});
		if (typeof window.createLucideIcons === 'function') {
			window.createLucideIcons();
		} else if (typeof lucide !== 'undefined' && lucide.createIcons) {
			lucide.createIcons();
		}
	}

	function showMega(key) {
		if (closeTimer) {
			clearTimeout(closeTimer);
			closeTimer = null;
		}
		setMega(key);
	}

	function hideMega() {
		if (closeTimer) {
			clearTimeout(closeTimer);
		}
		closeTimer = setTimeout(function () {
			setMega(null);
		}, 160);
	}

	triggers.forEach(function (trigger) {
		var key = trigger.getAttribute('data-mega');
		if (!key) {
			trigger.addEventListener('mouseenter', function () { setMega(null); });
			return;
		}
		trigger.addEventListener('mouseenter', function () { showMega(key); });
		trigger.addEventListener('mouseleave', hideMega);
		trigger.addEventListener('focus', function () { showMega(key); });
		trigger.addEventListener('blur', hideMega);
		// Match production: Baza wiedzy uses href="javascript:" (no destination URL).
		trigger.addEventListener('click', function (event) {
			var href = trigger.getAttribute('href') || '';
			if (href === 'javascript:' || href === '#' || href.indexOf('javascript:') === 0) {
				event.preventDefault();
				showMega(key);
			}
		});
	});

	if (megaRoot && dropdown) {
		dropdown.addEventListener('mouseenter', function () {
			if (closeTimer) {
				clearTimeout(closeTimer);
				closeTimer = null;
			}
		});
		dropdown.addEventListener('mouseleave', hideMega);
	}

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape') {
			setMega(null);
		}
	});

	function openSearchOverlay() {
		var overlay = document.querySelector('.blue-overlay.cs');
		if (!overlay) return;
		overlay.classList.add('open');
		if (typeof Utils !== 'undefined' && Utils.isPopHeigherThanViewport && Utils.isPopHeigherThanViewport(overlay)) {
			document.body.classList.add('noScroll');
		}
		if (typeof ClickSearch !== 'undefined' && ClickSearch.getNumbers) {
			ClickSearch.getNumbers();
		}
	}

	document.addEventListener('click', function (event) {
		var button = event.target.closest('.js-open-search');
		if (!button) return;
		openSearchOverlay();
	});
})();
{/literal}
</script>
<!-- New header END -->