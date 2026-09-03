<div class="blue-overlay" id="ajax-info-overlay">
	<div class="over-box" id="ajax-info-over-box"></div>
	<button type="button" id="ajax-info-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>

<div class="blue-overlay catalog">
	<div id="over-catalog">
		{*<a href="{url module=catalog action=form}"><img src="/img/catalog_pop.webp" width="600" height="400" alt="Darmowy katalog"></a>
		<a href="/projekty-domow/domy-do-szkieletu"><img src="/img/szkielet-promo.jpg?t=20230102" width="600" height="600" alt="black-week"></a>*}
	</div>
	<button type="button" id="catalog-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>


<footer class="bg-[#3a3a3a] text-white pt-16 pb-10">
	<div class="max-w-[1480px] mx-auto px-12">
		<div class="grid grid-cols-1 md:grid-cols-4 gap-10">
			<div class="space-y-1 footer-menu-col-a">
				{foreach $footer_menus.a as $link}
					<a href="{$link.url}" {if $link.target != '_self'} target="{$link.target}" {/if}
						class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition">{$link.label}</a>
				{/foreach}
				{if $social.facebook || $social.instagram || $social.pinterest || $social.youtube}
					<div class="flex items-center gap-3 pt-4">
						{if $social.facebook}
							<a href="{$social.facebook}" rel="nofollow" target="_blank"
								class="text-white hover:text-[var(--brand-blue)] transition" aria-label="Facebook">
								<svg fill="#ffffff" width="24" height="24" viewBox="0 0 1920 1920"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="m1416.013 791.915-30.91 225.617h-371.252v789.66H788.234v-789.66H449.808V791.915h338.426V585.137c0-286.871 176.207-472.329 449.09-472.329 116.87 0 189.744 6.205 231.822 11.845l-3.272 213.66-173.5.338c-4.737-.451-117.771-9.25-199.332 65.655-52.568 48.169-79.191 117.433-79.191 205.65v181.96h402.162Zm-247.276-304.018c44.446-41.401 113.71-36.889 118.787-36.663l289.467-.113 6.204-417.504-43.544-10.717C1511.675 16.02 1426.053 0 1237.324 0 901.268 0 675.425 235.206 675.425 585.137v93.97H337v451.234h338.425V1920h451.234v-789.66h356.7l61.932-451.233H1126.66v-69.152c0-54.937 14.214-96 42.078-122.058Z"
										fill-rule="evenodd" />
								</svg>
							</a>
						{/if}
						{if $social.instagram}
							<a href="{$social.instagram}" rel="nofollow" target="_blank"
								class="text-white hover:text-[var(--brand-blue)] transition" aria-label="Instagram">
								<svg fill="#ffffff" width="24" height="24" viewBox="0 0 24 24" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M12 7.90001C11.1891 7.90001 10.3964 8.14048 9.72218 8.59099C9.04794 9.0415 8.52243 9.68184 8.21211 10.431C7.90179 11.1802 7.8206 12.0046 7.9788 12.7999C8.13699 13.5952 8.52748 14.3258 9.10088 14.8992C9.67427 15.4725 10.4048 15.863 11.2001 16.0212C11.9955 16.1794 12.8198 16.0982 13.569 15.7879C14.3182 15.4776 14.9585 14.9521 15.409 14.2779C15.8596 13.6036 16.1 12.8109 16.1 12C16.1013 11.4612 15.9962 10.9275 15.7906 10.4295C15.585 9.93142 15.2831 9.47892 14.9021 9.09794C14.5211 8.71695 14.0686 8.415 13.5706 8.20942C13.0725 8.00385 12.5388 7.8987 12 7.90001ZM12 14.67C11.4719 14.67 10.9557 14.5134 10.5166 14.22C10.0776 13.9267 9.73534 13.5097 9.53326 13.0218C9.33117 12.5339 9.2783 11.9971 9.38132 11.4791C9.48434 10.9612 9.73863 10.4854 10.112 10.112C10.4854 9.73863 10.9612 9.48434 11.4791 9.38132C11.9971 9.2783 12.5339 9.33117 13.0218 9.53326C13.5097 9.73534 13.9267 10.0776 14.22 10.5166C14.5134 10.9557 14.67 11.4719 14.67 12C14.67 12.7081 14.3887 13.3873 13.888 13.888C13.3873 14.3887 12.7081 14.67 12 14.67ZM17.23 7.73001C17.23 7.9278 17.1714 8.12114 17.0615 8.28558C16.9516 8.45003 16.7954 8.57821 16.6127 8.65389C16.43 8.72958 16.2289 8.74938 16.0349 8.7108C15.8409 8.67221 15.6628 8.57697 15.5229 8.43712C15.3831 8.29727 15.2878 8.11909 15.2492 7.92511C15.2106 7.73112 15.2304 7.53006 15.3061 7.34733C15.3818 7.16461 15.51 7.00843 15.6744 6.89855C15.8389 6.78866 16.0322 6.73001 16.23 6.73001C16.4952 6.73001 16.7496 6.83537 16.9371 7.02291C17.1247 7.21044 17.23 7.4648 17.23 7.73001ZM19.94 8.73001C19.9691 7.48684 19.5054 6.28261 18.65 5.38001C17.7522 4.5137 16.5474 4.03897 15.3 4.06001C14 4.00001 10 4.00001 8.70001 4.06001C7.45722 4.0331 6.25379 4.49652 5.35001 5.35001C4.49465 6.25261 4.03093 7.45684 4.06001 8.70001C4.00001 10 4.00001 14 4.06001 15.3C4.03093 16.5432 4.49465 17.7474 5.35001 18.65C6.25379 19.5035 7.45722 19.9669 8.70001 19.94C10.02 20.02 13.98 20.02 15.3 19.94C16.5432 19.9691 17.7474 19.5054 18.65 18.65C19.5054 17.7474 19.9691 16.5432 19.94 15.3C20 14 20 10 19.94 8.70001V8.73001ZM18.24 16.73C18.1042 17.074 17.8993 17.3863 17.6378 17.6478C17.3763 17.9093 17.064 18.1142 16.72 18.25C15.1676 18.5639 13.5806 18.6715 12 18.57C10.4228 18.6716 8.83902 18.564 7.29001 18.25C6.94608 18.1142 6.63369 17.9093 6.37223 17.6478C6.11076 17.3863 5.90579 17.074 5.77001 16.73C5.35001 15.67 5.44001 13.17 5.44001 12.01C5.44001 10.85 5.35001 8.34001 5.77001 7.29001C5.90196 6.94268 6.10547 6.62698 6.36733 6.36339C6.62919 6.09981 6.94355 5.89423 7.29001 5.76001C8.83902 5.44599 10.4228 5.33839 12 5.44001C13.5806 5.33856 15.1676 5.44616 16.72 5.76001C17.064 5.89579 17.3763 6.10076 17.6378 6.36223C17.8993 6.62369 18.1042 6.93608 18.24 7.28001C18.66 8.34001 18.56 10.84 18.56 12C18.56 13.16 18.66 15.67 18.24 16.72V16.73Z" />
								</svg>
							</a>
						{/if}
						{if $social.pinterest}
							<a href="{$social.pinterest}" rel="nofollow" target="_blank"
								class="text-white hover:text-[var(--brand-blue)] transition" aria-label="Pinterest">
								<svg fill="#ffffff" width="24" height="24" viewBox="0 0 24 24"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M12 0C5.373 0 0 5.372 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.403.042-3.441.219-.937 1.407-5.965 1.407-5.965s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0z" />
								</svg>
							</a>
						{/if}
						{if $social.youtube}
							<a href="{$social.youtube}" rel="nofollow" target="_blank"
								class="text-white hover:text-[var(--brand-blue)] transition" aria-label="YouTube">
								<svg fill="#ffffff" width="24" height="24" viewBox="0 0 24 24"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
								</svg>
							</a>
						{/if}
					</div>
				{/if}
			</div>
			<div class="space-y-1 footer-menu-col-b">
				{foreach $footer_menus.b as $link}
					<a href="{$link.url}" {if $link.target != '_self'} target="{$link.target}" {/if}
						class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition">{$link.label}</a>
				{/foreach}
			</div>
			<div class="space-y-1 footer-menu-col-c">
				{foreach $footer_menus.c as $link}
					<a href="{$link.url}" {if $link.target != '_self'} target="{$link.target}" {/if}
						class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition">{$link.label}</a>
				{/foreach}
			</div>
			<div class="space-y-3">
				<div class="text-white text-[15px] font-bold">{$contact.header|default:'Kontakt'}</div>
				{if $contact.phone1}
					<a href="tel:{$contact.phone1|replace:' ':''}"
						class="block text-[var(--brand-red)] font-black text-[28px] leading-tight">{$contact.phone1}</a>
				{/if}
				{if $contact.phone2}
					<a href="tel:{$contact.phone2|replace:' ':''}"
						class="block text-[var(--brand-red)] font-black text-[28px] leading-tight">{$contact.phone2}</a>
				{/if}
				{if $contact.extra_phones}
					<div class="text-[var(--brand-red)] text-[13px] font-bold">{$contact.extra_phones}</div>
				{/if}
				{if $contact.email}
					<a href="mailto:{$contact.email}"
						class="block text-white font-black text-[24px] pt-3 hover:text-[var(--brand-blue)]">{$contact.email}</a>
				{/if}
				{if $contact.details}
					<div class="text-white text-[14px] font-bold pt-3 leading-relaxed">{$contact.details|nl2br}</div>
				{/if}
				{if $contact.map_url}
					<a href="{$contact.map_url}"
						class="text-[var(--brand-blue)] text-[14px] underline">{$contact.map_text|default:'zobacz dojazd'}</a>
				{/if}
			</div>
		</div>
		{if $seo_links_header || $seo_links}
			<div class="mt-16">
				<h3 class="text-white font-black text-[15px] tracking-wide mb-4">{$seo_links_header|escape}</h3>
				<div class="grid grid-cols-3 sm:grid-cols-5 lg:grid-cols-7 gap-x-6 gap-y-1 text-[12px]">
					{foreach $seo_links as $sl}
						<a href="{$sl.url|escape}"
							class="text-white/85 hover:text-[var(--brand-blue)] truncate">{$sl.label|escape}</a>
					{/foreach}
				</div>
			</div>
		{/if}
	</div>
</footer>

{* if !$user}

<div class="blue-overlay lb">	
	<div id="lb-wrapper">
		<h4>Logowanie</h4>
		<form method="post" action="{url module='authenticate' action='login'}" id="login-form" autocomplete="off">
			<p>
				<label for="email" class="black">E-mail</label>
				<input type="text" name="email" id="email" class="long">
			</p>
			<p>
				<label for="password" class="black">Hasło</label>
				<input type="password" name="password" id="password" class="long">
			</p>
			<p class="msg" id="login-fail-box" style="display: none;">Podałeś nieprawidłowy e-mail lub hasło</p>
			<p class="last"><input type="submit" value="zaloguj" class="baton"><a href="javascript:" class="password-trigger">Zapomniałem hasła</a></p>
		</form>
		<h4>Nie masz konta?</h4>
		<p><a href="javascript:" class="register-trigger">Zarejestruj się</a>. Zyskasz większe możliwości, kontrolę nad korespondencją, komentarzami i swoimi transakcjami, a także dostęp do dodatkowych materiałów oraz promocji. </p>
	</div>
	<button type="button" id="lb-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>

<div class="blue-overlay rb">
	<div id="rb-wrapper">
		<h4>Rejestracja konta</h4>
		<form method="post" action="{url module='panel' action='register'}" id="register-form">
			<input name="module" type="hidden" value="panel">
			<input name="action" type="hidden" value="register">
			<input id="r_relocate" name="r_relocate" type="hidden">
			<p>
				<label for="r_name" class="black">Imię</label>
				<input type="text" name="r_name" id="r_name" class="long">
			</p>
			<p>
				<label for="r_surname" class="black">Nazwisko</label>
				<input type="text" name="r_surname" id="r_surname" class="long">
			</p>
			<p>
				<label for="r_email" class="black">E-mail</label>
				<input type="text" name="r_email" id="r_email" class="long" autocomplete="off">
			</p>
			<p class="mystic">
				<label for="r_age" class="black">Wiek</label>
				<input type="text" name="r_age" id="r_age" class="long" autocomplete="off">
			</p>
			<p>
				<label for="r_password" class="black">Hasło</label>
				<input type="password" name="r_password" id="r_password" class="long" autocomplete="off">
			</p>
			<p>
				<label for="r_repassword" class="black">Powtórz hasło</label>
				<input type="password" name="r_repassword" id="r_repassword" class="long">
			</p>
			<p class="msg" id="register-fail-box" style="display: none;">Wypełnij poprawnie formularz</p>
			<p class="last"><input type="submit" value="utwórz" class="baton" id="rb_button"><a href="javascript:" class="ajax-info" data-url="{url module=ajax action=get_user_regulations}">Regulamin</a></p>
		</form>
		<h4>Masz już konto?</h4>
		<p><a href="javascript:" class="login-trigger">Zaloguj się</a></p>
	</div>
	<button type="button" id="rb-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>

{/if *}
{*
<div class="blue-overlay help">	
	<div id="help-wrapper">
		<h4><img src="/img/consultant.png?t=20230403" alt="Studio Atrium" width="60" height="60">Konsultant</h4>

		<p class="nocaps">
		{if $project}
			Masz dodatkowe pytania dotyczące projektu <strong>{if $project.name}{$project.name}{else}{$project.symbol_alpha} {$project.symbol_num}{/if}</strong>? Napisz do nas - my odpowiemy.
		{else}
			Nie znalazłeś projektu, jakiego szukałeś? Opisz go nam! Postaramy się go znaleźć dla Ciebie. Masz dodatkowe pytania? Wystarczy je napisać - my odpowiemy.
		{/if}
		</p>

			<form method="post" action="{url module='contact' action='send'}" id="consultant-form">
				<input type="hidden" id="cons_project_id" name="project_id" value="{if $project}{$project.id}{else}0{/if}">
				<input name="module" type="hidden" value="contact">
				<input name="action" type="hidden" value="send">

				<p>
					<label for="cons_name" class="black">Twoje imię</label>
					<input type="text" name="name" id="cons_name" class="long">
				</p>

				<p>
					<label for="cons_email" class="black">Twój adres e-mail</label>
					<input type="text" name="email" id="cons_email" class="long">
				</p>

				<p>
					<label for="cons_query" class="black">Twoje zapytanie</label>
					<textarea name="query" id="cons_query" cols="1" rows="1"></textarea>
				</p>

				<p class="accept">
                    <input type="checkbox" name="accept" id="consultant-accept" value="on"> <label for="consultant-accept">Wyrażam zgodę</label> na przetwarzanie moich danych osobowych w celu otrzymania odpowiedzi zgodnie z oświadczeniem. <span class="ajax-info" data-url="{url module=ajax action=get_consultant_regulations}">Szczegóły</span>
                </p>

				<p class="last">
					<span><img src="/img/waiter-white.gif" alt="Wysyłanie formularza" id="cons-loader" style="display: none;"><input id="cons_button" type="submit" value="wyślij" class="baton"></span>
				</p>
				<p class="nocaps" id="contact-fail-box" style="display: none;">Wypełnij poprawnie formularz</p>
			</form>

		<p class="nocaps smallmargin">Możesz także skorzystać z infolinii. Konsultant pomoże Ci wybrać projekt i załatwi wszelkie formalności z zamówieneim!</p>
		<p class="nocaps">Numer naszego konsultanta <a href="tel:+48338229496" rel="nofollow"><strong>33 822 94 96</strong></a></p>
	</div>

	<button type="button" id="help-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>
*}
<!-- Wyszukiwarka projektów -->
<div class="project-search-overlay">
<div class="blue-overlay cs">
	<div id="cs-wrapper">
		<div class="search-header">
			<h2 id="filter-header">Znajdź idealny projekt</h2>
			<form method="get" action="{url module='project' action='search'}" id="search-form">
				<div id="search-project">
					<label for="search-name" class="black search-label">Wpisz nazwę projektu</label>
					<div class="search-input-wrapper">
						<input type="text" name="query" id="search-name" class="long">
						<input type="submit" id="search-name-submit" value="Wyszukaj" class="baton disabled" disabled>
						<a href="{url module=varia action=project_helper}" class="wired help">Pomoc</a>
					</div>
				</div>
			</form>
			<div class="quick-presets">
				<label class="chip">
					<input type="radio" data-type="" checked> <span>Wszystkie</span>
				</label>
				<label class="chip">
					<input type="radio" data-type="parterowe"> <span>Parterowe</span>
				</label>
				<label class="chip">
					<input type="radio" data-type="z_poddaszem_do_adaptacji"> <span>Z poddaszem użytkowym</span>
				</label>
				<label class="chip">
					<input type="radio" data-type="pietrowe"> <span>Piętrowe</span>
				</label>
			</div>
		</div>

		<div class="form-box">
			<form id="click-search-form" method="post" action="/">
				<ul id="filter-labels">
					{if $csCategory}
					<li class="half-spaced">
						<p class="head">kategoria:</p>
						<ul>
							<li>
								<input type="checkbox" id="cs-category" name="kategoria" value="{$csCategory}" checked><label for="cs-category">{$category.name}</label> <span class="count" id="cs-category-count">(0)</span>
							</li>
						</ul>
					</li>
					{/if}
					
					{if $csTag}
					<li class="half-spaced">
						<p class="head">wybrany filtr:</p>
						<ul>
							<li>
								<input type="checkbox" id="{$csTag.id}-1" name="{$csTag.csname}" value="1" checked><label for="{$csTag.id}-1">{$csTag.name}</label> <span class="count" id="{$csTag.id}-1-count">(0)</span>
							</li>
						</ul>
					</li>
					{/if}

					{if $csTagSelect}
					<li class="half-spaced">
						<p class="head">wybrany filtr:</p>
						<ul>
							<li>
								<input type="checkbox" id="{$csTagSelect.id}-{$csTagSelect.value}" name="{$csTagSelect.csname}" value="{$csTagSelect.value}" checked><label for="{$csTagSelect.id}-{$csTagSelect.value}">{$csTagSelect.name} : {$csValueNames[$csTagSelect.value]|default:$csTagSelect.value}</label> <span class="count" id="{$csTagSelect.id}-{$csTagSelect.value}-count">(0)</span>
							</li>
						</ul>
					</li>
					{/if}
				
					<li class="filter-tab-label is-active" id="tab_project-type" data-target="#filters-project-type">
						Typ projektu
						<ul class="active-filters"></ul>
					</li>

					<li class="filter-tab-label" id="tab_roof" data-target="#filters-roof">
						Typ dachu
						<ul class="active-filters"></ul>
					</li>

					<li class="filter-tab-label" id="tab_pow" data-target="#filters-pow">
						Powierzchnia
						<ul class="active-filters"></ul>
					</li>

					<li class="filter-tab-label" id="tab_parcel-dimensions" data-target="#filters-parcel">
						Szerokość | długość działki
						<ul class="active-filters"></ul>
					</li>

					<li class="filter-tab-label" id="tab_front-width" data-target="#filters-front-width">
						Maks. szerokość elewacji frontowej
						<ul class="active-filters"></ul>
					</li>

					<li class="filter-tab-label" id="tab_rooms" data-target="#filters-rooms">
						Pomieszczenia
						<ul class="active-filters"></ul>
					</li>

					<li class="filter-tab-label" id="tab_height" data-target="#filters-height">
						Wysokość budynku
						<ul class="active-filters"></ul>
					</li>

					<li class="filter-tab-label" id="tab_roof-angle" data-target="#filters-roof-angle">
						Kąt nachylenia dachu
						<ul class="active-filters"></ul>
					</li>

					<li class="filter-tab-label" id="tab_strop" data-target="#filters-strop">
						Rodzaj stropu
						<ul class="active-filters"></ul>
					</li>

					<li class="filter-tab-label" id="tab_kalenica" data-target="#filters-kalenica">
						Kalenica
						<ul class="active-filters"></ul>
					</li>

					<li class="filter-tab-label" id="tab_dodatkowe" data-target="#filters-dodatkowe">
						Dodatkowe udogodnienia
						<ul class="active-filters"></ul>
					</li>

					<li class="filter-tab-label" id="tab_garaz" data-target="#filters-garaz">
						Garaż
						<ul class="active-filters"></ul>
					</li>

					<li class="filter-tab-label" id="tab_piwnica" data-target="#filters-piwnica">
						Piwnica
						<ul class="active-filters"></ul>
					</li>

					<li class="filter-tab-label" id="tab_kolekcje" data-target="#filters-kolekcje">
						Kolekcje
						<ul class="active-filters"></ul>
					</li>

				</ul>



				<div id="filter-options">

					<div id="filters-project-type" class="filter-tab radio-group">
						<h3 class="filter-header">Typ projektu</h3>

						{* jeśli jest customowa kategoria *}
						{if $csCustomCategory}
							<label class="custom-radio" for="typ_projektu-{$csCustomCategory}">
								<input
								type="radio"
								name="typ_projektu"
								id="typ_projektu-{$csCustomCategory}"
								value="{$csCustomCategory}"
								{if $request.typ_projektu == $csCustomCategory || $csType == $csCustomCategory} checked{/if}>
								<span>{$category.name|truncate:16:"...":true} <span class="count" id="typ_projektu-{$csCustomCategory}-count">(0)</span></span>
							</label>
						{/if}

						<label for="typ_projektu-bez_garazu" class="custom-radio">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-bez_garazu" value="bez_garazu"
								{if $request.typ_projektu == 'bez_garazu' || $csType == 'bez_garazu'} checked{/if}>
							<span>Bez garażu <span class="count" id="typ_projektu-bez_garazu-count">(0)</span></span>
						</label>

						<label for="typ_projektu-beskidzkie" class="custom-radio">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-beskidzkie" value="beskidzkie"
								{if $request.typ_projektu == 'beskidzkie' || $csType == 'beskidzkie'} checked{/if}>
							<span>Beskidzkie <span class="count" id="typ_projektu-beskidzkie-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-blizniacze">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-blizniacze" value="blizniacze"
								{if $request.typ_projektu == 'blizniacze' || $csType == 'blizniacze'} checked{/if}>
							<span>Bliźniacze <span class="count" id="typ_projektu-blizniacze-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-dla_rodziny_2plus2">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-dla_rodziny_2plus2" value="dla_rodziny_2+2"
								{if $request.typ_projektu == 'dla_rodziny_2+2' || $csType == 'dla_rodziny_2+2'} checked{/if}>
							<span>Dla rodziny 2+2 <span class="count" id="typ_projektu-dla_rodziny_2plus2-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-dla_rodziny_2plus3">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-dla_rodziny_2plus3" value="dla_rodziny_2+3"
								{if $request.typ_projektu == 'dla_rodziny_2+3' || $csType == 'dla_rodziny_2+3'} checked{/if}>
							<span>Dla rodziny 2+3 <span class="count" id="typ_projektu-dla_rodziny_2plus3-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-dwulokalowe">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-dwulokalowe" value="dwulokalowe"
								{if $request.typ_projektu == 'dwulokalowe' || $csType == 'dwulokalowe'} checked{/if}>
							<span>Dwulokalowe <span class="count" id="typ_projektu-dwulokalowe-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-male_do_70m2">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-male_do_70m2" value="male_do_70m2"
								{if $request.typ_projektu == 'male_do_70m2' || $csType == 'male_do_70m2'} checked{/if}>
							<span>Małe do 70m2 <span class="count" id="typ_projektu-male_do_70m2-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-na_skarpe">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-na_skarpe" value="na_skarpe"
								{if $request.typ_projektu == 'na_skarpe' || $csType == 'na_skarpe'} checked{/if}>
							<span>Na skarpę <span class="count" id="typ_projektu-na_skarpe-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-na_waska_dzialke">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-na_waska_dzialke" value="na_waska_dzialke"
								{if $request.typ_projektu == 'na_waska_dzialke' || $csType == 'na_waska_dzialke'} checked{/if}>
							<span>Na wąską działkę <span class="count" id="typ_projektu-na_waska_dzialke-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-nowoczesna_stodola">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-nowoczesna_stodola" value="nowoczesna_stodola"
								{if $request.typ_projektu == 'nowoczesna_stodola' || $csType == 'nowoczesna_stodola'} checked{/if}>
							<span>Nowoczesna stodoła <span class="count" id="typ_projektu-nowoczesna_stodola-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-nowoczesne">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-nowoczesne" value="nowoczesne"
								{if $request.typ_projektu == 'nowoczesne' || $csType == 'nowoczesne'} checked{/if}>
							<span>Nowoczesne <span class="count" id="typ_projektu-nowoczesne-count">(0)</span></span>
						</label>

						<label for="typ_projektu-parterowe" class="custom-radio">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-parterowe" value="parterowe"
								{if $request.typ_projektu == 'parterowe' || $csType == 'parterowe'} checked{/if}>
							<span>Parterowe <span class="count" id="typ_projektu-parterowe-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-pietrowe">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-pietrowe" value="pietrowe"
								{if $request.typ_projektu == 'pietrowe' || $csType == 'pietrowe'} checked{/if}>
							<span>Piętrowe <span class="count" id="typ_projektu-pietrowe-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-rezydencje">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-rezydencje" value="rezydencje"
								{if $request.typ_projektu == 'rezydencje' || $csType == 'rezydencje'} checked{/if}>
							<span>Rezydencje <span class="count" id="typ_projektu-rezydencje-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-szkieletowe">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-szkieletowe" value="szkieletowe"
								{if $request.typ_projektu == 'szkieletowe' || $csType == 'szkieletowe'} checked{/if}>
							<span>Szkieletowe <span class="count" id="typ_projektu-szkieletowe-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-z_garazem">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-z_garazem" value="z_garazem"
								{if $request.typ_projektu == 'z_garazem' || $csType == 'z_garazem'} checked{/if}>
							<span>Z garażem <span class="count" id="typ_projektu-z_garazem-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-z_plaskim_dachem">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-z_plaskim_dachem" value="z_plaskim_dachem"
								{if $request.typ_projektu == 'z_plaskim_dachem' || $csType == 'z_plaskim_dachem'} checked{/if}>
							<span>Z płaskim dachem <span class="count" id="typ_projektu-z_plaskim_dachem-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-z_poddaszem">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-z_poddaszem" value="z_poddaszem"
								{if $request.typ_projektu == 'z_poddaszem' || $csType == 'z_poddaszem'} checked{/if}>
							<span>Z poddaszem <span class="count" id="typ_projektu-z_poddaszem-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-z_poddaszem_do_adaptacji">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-z_poddaszem_do_adaptacji" value="z_poddaszem_do_adaptacji"
								{if $request.typ_projektu == 'z_poddaszem_do_adaptacji' || $csType == 'z_poddaszem_do_adaptacji'} checked{/if}>
							<span>Z poddaszem do adaptacji <span class="count" id="typ_projektu-z_poddaszem_do_adaptacji-count">(0)</span></span>
						</label>
					</div>

					<div id="filters-roof" class="filter-tab radio-group">
						<h3 class="filter-header">Typ dachu</h3>

						<label class="custom-radio" for="54-dwuspadowy">
							<input type="radio" name="typdachu" id="54-dwuspadowy" value="dwuspadowy"
							{if $request.typdachu == 'dwuspadowy'} checked{/if}>
							<span>dwuspadowy <span class="count" id="54-dwuspadowy-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="54-mansardowy">
							<input type="radio" name="typdachu" id="54-mansardowy" value="mansardowy"
							{if $request.typdachu == 'mansardowy'} checked{/if}>
							<span>mansardowy <span class="count" id="54-mansardowy-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="54-stropodach">
							<input type="radio" name="typdachu" id="54-stropodach" value="stropodach"
							{if $request.typdachu == 'stropodach'} checked{/if}>
							<span>płaski <span class="count" id="54-stropodach-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="54-stozkowy">
							<input type="radio" name="typdachu" id="54-stozkowy" value="stozkowy"
							{if $request.typdachu == 'stozkowy'} checked{/if}>
							<span>stożkowy <span class="count" id="54-stozkowy-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="54-wielospadowy">
							<input type="radio" name="typdachu" id="54-wielospadowy" value="wielospadowy"
							{if $request.typdachu == 'wielospadowy'} checked{/if}>
							<span>wielospadowy <span class="count" id="54-wielospadowy-count">(0)</span></span>
						</label>
					</div>

					<div id="filters-pow" class="filter-tab">
						<h3 class="filter-header">Powierzchnia użytkowa</h3>

						<!-- select z predefiniowanymi przedziałami -->
						<select id="pow-range" class="range-select no-ui">
							<option value=""        data-min=""    data-max="">Dowolna</option>
							<option value="0-70"    data-min=""    data-max="70">do 70 m²</option>
							<option value="100-130" data-min="100" data-max="130">100–130 m²</option>
							<option value="130-180" data-min="130" data-max="180">130–180 m²</option>
							<option value="180+"    data-min="180" data-max="">od 180 m²</option>
						</select>

						<!-- ręczne min/max dla użytkowej (wysyłane do backendu) -->
						<div class="area-inputs">
							<div class="input-unit">
								<input type="text" name="pow_min" id="pow-min" value="{$request.pow_min}" placeholder="od">
								<span class="unit">m²</span>
							</div>
							<div class="input-unit">
								<input type="text" name="pow_max" id="pow-max" value="{$request.pow_max}" placeholder="do">
								<span class="unit">m²</span>
							</div>
						</div>

						<h3 class="filter-header inner-filter-header">Powierzchnia zabudowy</h3>
						<div class="area-inputs">
							<div class="input-unit">
								<input type="text" name="pow_zab_min" id="pow-zab-min" value="{$request.pow_zab_min}" placeholder="od">
								<span class="unit">m²</span>
							</div>
							<div class="input-unit">
								<input type="text" name="pow_zab_max" id="pow-zab-max" value="{$request.pow_zab_max}" placeholder="do">
								<span class="unit">m²</span>
							</div>
						</div>

						<h3 class="filter-header inner-filter-header">Powierzchnia całkowita</h3>
						<div class="area-inputs">
							<div class="input-unit">
								<input type="text" name="pow_total_min" id="pow-total-min" value="{$request.pow_total_min}" placeholder="od">
								<span class="unit">m²</span>
							</div>
							<div class="input-unit">
								<input type="text" name="pow_total_max" id="pow-total-max" value="{$request.pow_total_max}" placeholder="do">
								<span class="unit">m²</span>
							</div>
						</div>
					</div>

					<div id="filters-parcel" class="filter-tab">
						<h3 class="filter-header">Szerokość działki</h3>
						<div class="area-inputs">
							<div class="input-unit">
							<input type="text" name="dzialka_szer" id="parcel-width" value="{$request.dzialka_szer}">
							<span class="unit">m</span>
							</div>
						</div>

						<h3 class="filter-header inner-filter-header">Długość działki</h3>
						<div class="area-inputs">
							<div class="input-unit">
							<input type="text" name="dzialka_dl" id="parcel-height" value="{$request.dzialka_dl}">
							<span class="unit">m</span>
							</div>
						</div>
					</div>

					<div id="filters-front-width" class="filter-tab">
						<h3 class="filter-header">Maks. szerokość elewacji frontowej</h3>
						<div class="area-inputs">
							<div class="input-unit">
							<input type="text" name="front_szer" id="front-width" value="{$request.front_szer}">
							<span class="unit">m</span>
							</div>
						</div>
					</div>

					<div id="filters-rooms" class="filter-tab">
						<h3 class="filter-header">Pomieszczenia</h3>

						<!-- Parter -->
						<div class="rooms-box">
							<p class="head">Pokoje: parter (z salonem)</p>
							<div class="chips">
							<label class="chip" for="69-1">
								<input type="radio" name="iloscpokoinaparterze" id="69-1" value="1" {if $request.iloscpokoinaparterze == 1} checked{/if}>
								<span>1 <span class="count" id="69-1-count">(0)</span></span>
							</label>
							<label class="chip" for="69-2">
								<input type="radio" name="iloscpokoinaparterze" id="69-2" value="2" {if $request.iloscpokoinaparterze == 2} checked{/if}>
								<span>2 <span class="count" id="69-2-count">(0)</span></span>
							</label>
							<label class="chip" for="69-3">
								<input type="radio" name="iloscpokoinaparterze" id="69-3" value="3" {if $request.iloscpokoinaparterze == 3} checked{/if}>
								<span>3 <span class="count" id="69-3-count">(0)</span></span>
							</label>
							<label class="chip" for="69-4">
								<input type="radio" name="iloscpokoinaparterze" id="69-4" value="4" {if $request.iloscpokoinaparterze == 4} checked{/if}>
								<span>4 <span class="count" id="69-4-count">(0)</span></span>
							</label>
							<label class="chip" for="69-5">
								<input type="radio" name="iloscpokoinaparterze" id="69-5" value="5" {if $request.iloscpokoinaparterze == 5} checked{/if}>
								<span>5 <span class="count" id="69-5-count">(0)</span></span>
							</label>
							<!-- <label class="chip" for="69-5plus">
								<input type="radio" name="iloscpokoinaparterze" id="69-5plus" value="5+">
								<span>5+ <span class="count" id="69-5plus-count">(0)</span></span>
							</label> -->
							<label class="chip chip-ghost" for="69-0">
								<input type="radio" name="iloscpokoinaparterze" id="69-0" value="-1" checked {if $request.iloscpokoinaparterze == -1} checked{/if}>
								<span>Dowolna</span>
							</label>
							</div>
						</div>

						<!-- Piętro -->
						<div id="roomsFloor" class="rooms-box">
							<p class="head">Pokoje: piętro</p>
							<div class="chips">
							<label class="chip" for="71-1">
								<input type="radio" name="iloscpokoinaiikondygnacji" id="71-1" value="1" {if $request.iloscpokoinaiikondygnacji == 1} checked{/if}>
								<span>1 <span class="count" id="71-1-count">(0)</span></span>
							</label>
							<label class="chip" for="71-2">
								<input type="radio" name="iloscpokoinaiikondygnacji" id="71-2" value="2" {if $request.iloscpokoinaiikondygnacji == 2} checked{/if}>
								<span>2 <span class="count" id="71-2-count">(0)</span></span>
							</label>
							<label class="chip" for="71-3">
								<input type="radio" name="iloscpokoinaiikondygnacji" id="71-3" value="3" {if $request.iloscpokoinaiikondygnacji == 3} checked{/if}>
								<span>3 <span class="count" id="71-3-count">(0)</span></span>
							</label>
							<label class="chip" for="71-4">
								<input type="radio" name="iloscpokoinaiikondygnacji" id="71-4" value="4" {if $request.iloscpokoinaiikondygnacji == 4} checked{/if}>
								<span>4 <span class="count" id="71-4-count">(0)</span></span>
							</label>
							<label class="chip" for="71-5">
								<input type="radio" name="iloscpokoinaiikondygnacji" id="71-5" value="5" {if $request.iloscpokoinaiikondygnacji == 5} checked{/if}>
								<span>5 <span class="count" id="71-5-count">(0)</span></span>
							</label>
							<!-- <label class="chip" for="71-5plus">
								<input type="radio" name="iloscpokoinaiikondygnacji" id="71-5plus" value="5+">
								<span>5+ <span class="count" id="71-5plus-count">(0)</span></span>
							</label> -->
							<label class="chip chip-ghost" for="71-0">
								<input type="radio" name="iloscpokoinaiikondygnacji" id="71-0" value="-1" checked {if $request.iloscpokoinaiikondygnacji == -1} checked{/if}>
								<span>Dowolna</span>
							</label>
							</div>
						</div>
					</div>

					<div id="filters-height" class="filter-tab radio-group">
						<h3 class="filter-header">Maks. wysokość budynku</h3>

						<label class="custom-radio" for="26-1">
							<input type="radio" name="wysokoscbudynku" id="26-1" value="1" {if $request.wysokoscbudynku == 1} checked{/if}>
							<span>do 6 m <span class="count" id="26-1-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="26-2">
							<input type="radio" name="wysokoscbudynku" id="26-2" value="2" {if $request.wysokoscbudynku == 2} checked{/if}>
							<span>od 6 m do 7 m <span class="count" id="26-2-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="26-3">
							<input type="radio" name="wysokoscbudynku" id="26-3" value="3" {if $request.wysokoscbudynku == 3} checked{/if}>
							<span>od 7 m do 8 m <span class="count" id="26-3-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="26-4">
							<input type="radio" name="wysokoscbudynku" id="26-4" value="4" {if $request.wysokoscbudynku == 4} checked{/if}>
							<span>od 8 m do 9 m <span class="count" id="26-4-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="26-5">
							<input type="radio" name="wysokoscbudynku" id="26-5" value="5" {if $request.wysokoscbudynku == 5} checked{/if}>
							<span>od 9 m do 10 m <span class="count" id="26-5-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="26-6">
							<input type="radio" name="wysokoscbudynku" id="26-6" value="6" {if $request.wysokoscbudynku == 6} checked{/if}>
							<span>powyżej 10 m <span class="count" id="26-6-count">(0)</span></span>
						</label>
					</div>

					<div id="filters-roof-angle" class="filter-tab radio-group">
						<h3 class="filter-header">Kąt nachylenia dachu</h3>

						<label class="custom-radio" for="27-1">
							<input type="radio" name="katnachyleniadachu" id="27-1" value="1" {if $request.katnachyleniadachu == 1} checked{/if}>
							<span>do 30&deg; <span class="count" id="27-1-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="27-2">
							<input type="radio" name="katnachyleniadachu" id="27-2" value="2" {if $request.katnachyleniadachu == 2} checked{/if}>
							<span>30&deg; do 35&deg; <span class="count" id="27-2-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="27-3">
							<input type="radio" name="katnachyleniadachu" id="27-3" value="3" {if $request.katnachyleniadachu == 3} checked{/if}>
							<span>35&deg; do 40&deg; <span class="count" id="27-3-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="27-4">
							<input type="radio" name="katnachyleniadachu" id="27-4" value="4" {if $request.katnachyleniadachu == 4} checked{/if}>
							<span>40&deg; do 45&deg; <span class="count" id="27-4-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="27-5">
							<input type="radio" name="katnachyleniadachu" id="27-5" value="5" {if $request.katnachyleniadachu == 5} checked{/if}>
							<span>45&deg; i więcej <span class="count" id="27-5-count">(0)</span></span>
						</label>
					</div>

					<div id="filters-strop" class="filter-tab radio-group">
						<h3 class="filter-header">Strop nad parterem</h3>

						<label class="custom-radio" for="28-lekki">
							<input type="radio" name="rodzajstropu" id="28-lekki" value="lekki" {if $request.rodzajstropu == 'lekki'} checked{/if}>
							<span>lekki <span class="count" id="28-lekki-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="28-gestozebrowy">
							<input type="radio" name="rodzajstropu" id="28-gestozebrowy" value="gestozebrowy" {if $request.rodzajstropu == 'gestozebrowy'} checked{/if}>
							<span>gęstożebrowy <span class="count" id="28-gestozebrowy-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="28-plyta_zelbetowa">
							<input type="radio" name="rodzajstropu" id="28-plyta_zelbetowa" value="plyta_zelbetowa" {if $request.rodzajstropu == 'plyta_zelbetowa'} checked{/if}>
							<span>płyta żelbetowa <span class="count" id="28-plyta_zelbetowa-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="28-drewniany_belkowy">
							<input type="radio" name="rodzajstropu" id="28-drewniany_belkowy" value="drewniany_belkowy" {if $request.rodzajstropu == 'drewniany_belkowy'} checked{/if}>
							<span>drewniany belkowy <span class="count" id="28-drewniany_belkowy-count">(0)</span></span>
						</label>
					</div>

					<div id="filters-kalenica" class="filter-tab radio-group">
						<h3 class="filter-header">Kalenica</h3>

						<label class="custom-radio" for="103-rownolegla_do_drogi">
							<input type="radio" name="kalenica" id="103-rownolegla_do_drogi" value="rownolegla_do_drogi" {if $request.kalenica == 'rownolegla_do_drogi'} checked{/if}>
							<span>równoległa do drogi <span class="count" id="103-rownolegla_do_drogi-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="103-prostopadla_do_drogi">
							<input type="radio" name="kalenica" id="103-prostopadla_do_drogi" value="prostopadla_do_drogi" {if $request.kalenica == 'prostopadla_do_drogi'} checked{/if}>
							<span>prostopadła do drogi <span class="count" id="103-prostopadla_do_drogi-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="103-brak">
							<input type="radio" name="kalenica" id="103-brak" value="brak" {if $request.kalenica == 'brak'} checked{/if}>
							<span>brak <span class="count" id="103-brak-count">(0)</span></span>
						</label>
					</div>

					<div id="filters-dodatkowe" class="filter-tab">
						<h3 class="filter-header">Dodatkowe udogodnienia</h3>

						<div class="chips">
							<label class="chk" for="104-1">
								<input type="checkbox" id="104-1" name="balkon" value="1" {if $request.balkon} checked{/if}>
								<span>Balkon <span class="count" id="104-1-count">(0)</span></span>
							</label>

							<label class="chk" for="c18-1">
								<input type="checkbox" id="c18-1" name="duza_kotlownia" value="1" {if $request.duza_kotlownia} checked{/if}>
								<span>Duża kotłownia <span class="count" id="c18-1-count">(0)</span></span>
							</label>

							<label class="chk" for="57-1">
								<input type="checkbox" id="57-1" name="garderoba" value="1" {if $request.garderoba} checked{/if}>
								<span>Garderoba <span class="count" id="57-1-count">(0)</span></span>
							</label>

							<label class="chk" for="c19-1">
								<input type="checkbox" id="c19-1" name="kotlownia" value="1" {if $request.kotlownia} checked{/if}>
								<span>Kotłownia na paliwo stałe <span class="count" id="c19-1-count">(0)</span></span>
							</label>

							<label class="chk" for="59-1">
								<input type="checkbox" id="59-1" name="kuchniaodfrontu" value="1" {if $request.kuchniaodfrontu} checked{/if}>
								<span>Kuchnia od frontu <span class="count" id="59-1-count">(0)</span></span>
							</label>

							<label class="chk" for="60-1">
								<input type="checkbox" id="60-1" name="kuchniaodogrodu" value="1" {if $request.kuchniaodogrodu} checked{/if}>
								<span>Kuchnia od ogrodu <span class="count" id="60-1-count">(0)</span></span>
							</label>

							<label class="chk" for="105-1">
								<input type="checkbox" id="105-1" name="lukarna" value="1" {if $request.lukarna} checked{/if}>
								<span>Lukarna <span class="count" id="105-1-count">(0)</span></span>
							</label>

							<label class="chk" for="113-1">
								<input type="checkbox" id="113-1" name="masterbedroom" value="1" {if $request.masterbedroom} checked{/if}>
								<span>Master bedroom <span class="count" id="113-1-count">(0)</span></span>
							</label>

							<label class="chk" for="c26-1">
								<input type="checkbox" id="c26-1" name="od_poludnia" value="1" {if $request.od_poludnia} checked{/if}>
								<span>Wjazd od południa <span class="count" id="c26-1-count">(0)</span></span>
							</label>

							<label class="chk" for="94-1">
								<input type="checkbox" id="94-1" name="antresola" value="1" {if $request.antresola} checked{/if}>
								<span>Otwarta przestrzeń <span class="count" id="94-1-count">(0)</span></span>
							</label>

							<label class="chk" for="119-1">
								<input type="checkbox" id="119-1" name="osobnewc" value="1" {if $request.osobnewc} checked{/if}>
								<span>Osobne w.c. <span class="count" id="119-1-count">(0)</span></span>
							</label>

							<label class="chk" for="96-1">
								<input type="checkbox" id="96-1" name="pralnia" value="1" {if $request.pralnia} checked{/if}>
								<span>Pralnia <span class="count" id="96-1-count">(0)</span></span>
							</label>

							<label class="chk" for="65-1">
							<input type="checkbox" id="65-1" name="spizarnia" value="1" {if $request.spizarnia} checked{/if}>
							<span>Spiżarnia <span class="count" id="65-1-count">(0)</span></span>
							</label>

							<label class="chk" for="47-1">
								<input type="checkbox" id="47-1" name="wiatagarazowa" value="1" {if $request.wiatagarazowa} checked{/if}>
								<span>Wiata <span class="count" id="47-1-count">(0)</span></span>
							</label>

							<label class="chk" for="c30-1">
								<input type="checkbox" id="c30-1" name="zantresola" value="1" {if $request.zantresola} checked{/if}>
								<span>Z antresolą <span class="count" id="c30-1-count">(0)</span></span>
							</label>

							<label class="chk" for="c31-1">
								<input type="checkbox" id="c31-1" name="zestrychem" value="1" {if $request.zestrychem} checked{/if}>
								<span>Ze strychem <span class="count" id="c31-1-count">(0)</span></span>
							</label>

							<label class="chk" for="67-1">
								<input type="checkbox" id="67-1" name="zadaszonytaras" value="1" {if $request.zadaszonytaras} checked{/if}>
								<span>Zadaszony taras <span class="count" id="67-1-count">(0)</span></span>
							</label>
						</div>
					</div>

					<div id="filters-garaz" class="filter-tab">
						<h3 class="filter-header">Garaż</h3>
						<div class="chips">
							<label class="chk" for="78-0">
								<input type="radio" id="78-0" name="garaz" value="-1" checked>
								<span>Dowolnie</span>
							</label>

							<label class="chk" for="78-1">
								<input type="radio" id="78-1" name="garaz" value="1" {if $request.garaz == 1} checked{/if}>
								<span>1 stanowisko <span class="count" id="78-1-count">(0)</span></span>
							</label>

							<label class="chk" for="78-2">
								<input type="radio" id="78-2" name="garaz" value="2" {if $request.garaz == 2} checked{/if}>
								<span>2 i więcej <span class="count" id="78-2-count">(0)</span></span>
							</label>

							<label class="chk" for="78-3">
								<input type="radio" id="78-3" name="garaz" value="3" {if $request.garaz == 3} checked{/if}>
								<span>nie <span class="count" id="78-3-count">(0)</span></span>
							</label>
						</div>
					</div>

					<div id="filters-piwnica" class="filter-tab">
						<h3 class="filter-header">Piwnica</h3>
						<div class="chips">
							<label class="chk" for="2-0">
								<input type="radio" id="2-0" name="piwnica" value="-1" checked>
								<span>Dowolnie</span>
							</label>

							<label class="chk" for="2-1">
								<input type="radio" id="2-1" name="piwnica" value="1" {if $request.piwnica == 1} checked{/if}>
								<span>tak <span class="count" id="2-1-count">(0)</span></span>
							</label>

							<label class="chk" for="2-2">
								<input type="radio" id="2-2" name="piwnica" value="2" {if $request.piwnica == 2} checked{/if}>
								<span>nie <span class="count" id="2-2-count">(0)</span></span>
							</label>
						</div>
					</div>

					<div id="filters-kolekcje" class="filter-tab radio-group">
						<h3 class="filter-header">Kolekcje</h3>

						<label class="custom-radio" for="kolekcje-sardynia">
							<input type="radio" name="kolekcje" id="kolekcje-sardynia" value="sardynia" {if $request.kolekcje == 'sardynia'} checked{/if}>
							<span>SARDYNIA <span class="count" id="kolekcje-sardynia-count">(0)</span></span>
						</label>
					</div>

				</div>



			
				<div id="filters-footer">
					<button id="cs-reset">✖ Wyczyść filtry</button>
					<div class="filters-footer-right">
						<p id="data-read" style="display: none;">trwa wczytywanie danych</p>
						<button id="cs-fetch" class="baton">Pokaż projekty <span id="total-count"></span> <!-- ➞ --></button>
					</div>					
				</div>

			</form>
		</div>
	</div>
	<button type="button" id="cs-overlay-close" class="blue-overlay-close"><span class="close-x">✖</span> Zamknij</button>
</div>

<div class="dark-overlay"></div>
</div>

{*<script src="/js/app.js"></script>*}
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="/js/jquery.json-2.3.min.js"></script>
<script src="/js/enquire.min.js"></script>
<script src="/js/storage.js"></script>
<script src="/js/clicksearch.js?v={$version}"></script>
<script src="/js/common.js?v={$version}"></script>
<script src="/js/filters.js?v={$version}"></script>

{foreach $js_includes as $_js}
	<script src="/js/{$_js}"></script>
{/foreach}
{foreach $js_lazy as $_js}
	<script src="/js/{$_js}"></script>
{/foreach}
{if !$isMobile}
	{foreach $js_lazy_nomobie as $_js}
		<script src="/js/{$_js}"></script>
	{/foreach}
{/if}

<script>
	if (typeof window.createLucideIcons === 'function') {
		window.createLucideIcons();
	} else if (typeof lucide !== 'undefined' && lucide.createIcons) {
		lucide.createIcons();
	}
</script>

<!-- Facebook Pixel Code -->
{literal}
	<script>
		! function(f, b, e, v, n, t, s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n, arguments): n.queue.push(arguments)
		};
		if (!f._fbq) f._fbq = n;
		n.push = n;
		n.loaded = !0;
		n.version = '2.0';
		n.queue = [];
		t = b.createElement(e);
		t.async = !0;
		t.src = v;
		s = b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '164344025487761');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
			src="https://www.facebook.com/tr?id=164344025487761&ev=PageView&noscript=1" /></noscript>
{/literal}
<!-- End Facebook Pixel Code -->


{* usuniete na wniosek Eactive - Mateusz Sipa 2017-07-42 *}
{*
{literal}
<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-3627780-2']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

</script>
{/literal}
*}

{if !$nochat}
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API = Tawk_API || {},
			Tawk_LoadStart = new Date();
		(function() {
			var s1 = document.createElement("script"),
				s0 = document.getElementsByTagName("script")[0];
			s1.async = true;
			s1.src = 'https://embed.tawk.to/56af3eb5fe87529955d6aa03/default';
			s1.charset = 'UTF-8';
			s1.setAttribute('crossorigin', '*');
			s0.parentNode.insertBefore(s1, s0);
		})();
	</script>
	<!--End of Tawk.to Script-->

	{*
{literal}
<!-- Messenger Wtyczka czatu Code -->
    <div id="fb-root"></div>

    <!-- Your Wtyczka czatu code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "274320408689");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v15.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/pl_PL/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
{/literal}
*}
{/if}