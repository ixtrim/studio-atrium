<?php
/* Smarty version 4.5.6, created on 2026-06-23 06:42:05
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Layout/Footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_6a3a0e9d55c6a0_83681702',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f68c881bff07f68173342c8f06edc155ee674935' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Layout/Footer.tpl',
      1 => 1782189678,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a3a0e9d55c6a0_83681702 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="blue-overlay" id="ajax-info-overlay">
	<div class="over-box" id="ajax-info-over-box"></div>
	<button type="button" id="ajax-info-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>

<div class="blue-overlay catalog">
	<div id="over-catalog">
			</div>
	<button type="button" id="catalog-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>


<footer class="bg-[#3a3a3a] text-white pt-16 pb-10">
	<div class="max-w-[1480px] mx-auto px-12">
		<div class="grid grid-cols-1 md:grid-cols-4 gap-10">
			<div class="space-y-6">
				<a href="#"
					class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition">Regulamin</a>
				<a href="#" class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition">Polityka
					Prywatności</a>
				<a href="#" class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition">O nas</a>
				<a href="#" class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition">Reklama w
					Studio
					Atrium</a>
				<div class="flex items-center gap-3 pt-4">
					<a href="https://www.facebook.com/studioatrium" rel="nofollow"
						class="text-white hover:text-[var(--brand-blue)] transition">
						<svg fill="#ffffff" width="24" height="24" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
							<path
								d="m1416.013 791.915-30.91 225.617h-371.252v789.66H788.234v-789.66H449.808V791.915h338.426V585.137c0-286.871 176.207-472.329 449.09-472.329 116.87 0 189.744 6.205 231.822 11.845l-3.272 213.66-173.5.338c-4.737-.451-117.771-9.25-199.332 65.655-52.568 48.169-79.191 117.433-79.191 205.65v181.96h402.162Zm-247.276-304.018c44.446-41.401 113.71-36.889 118.787-36.663l289.467-.113 6.204-417.504-43.544-10.717C1511.675 16.02 1426.053 0 1237.324 0 901.268 0 675.425 235.206 675.425 585.137v93.97H337v451.234h338.425V1920h451.234v-789.66h356.7l61.932-451.233H1126.66v-69.152c0-54.937 14.214-96 42.078-122.058Z"
								fill-rule="evenodd" />
						</svg>
					</a>
					<a href="https://www.instagram.com/studioatrium.pl/" rel="nofollow"
						class="text-white hover:text-[var(--brand-blue)] transition">
						<svg fill="#ffffff" width="24" height="24" viewBox="0 0 24 24" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								d="M12 7.90001C11.1891 7.90001 10.3964 8.14048 9.72218 8.59099C9.04794 9.0415 8.52243 9.68184 8.21211 10.431C7.90179 11.1802 7.8206 12.0046 7.9788 12.7999C8.13699 13.5952 8.52748 14.3258 9.10088 14.8992C9.67427 15.4725 10.4048 15.863 11.2001 16.0212C11.9955 16.1794 12.8198 16.0982 13.569 15.7879C14.3182 15.4776 14.9585 14.9521 15.409 14.2779C15.8596 13.6036 16.1 12.8109 16.1 12C16.1013 11.4612 15.9962 10.9275 15.7906 10.4295C15.585 9.93142 15.2831 9.47892 14.9021 9.09794C14.5211 8.71695 14.0686 8.415 13.5706 8.20942C13.0725 8.00385 12.5388 7.8987 12 7.90001ZM12 14.67C11.4719 14.67 10.9557 14.5134 10.5166 14.22C10.0776 13.9267 9.73534 13.5097 9.53326 13.0218C9.33117 12.5339 9.2783 11.9971 9.38132 11.4791C9.48434 10.9612 9.73863 10.4854 10.112 10.112C10.4854 9.73863 10.9612 9.48434 11.4791 9.38132C11.9971 9.2783 12.5339 9.33117 13.0218 9.53326C13.5097 9.73534 13.9267 10.0776 14.22 10.5166C14.5134 10.9557 14.67 11.4719 14.67 12C14.67 12.7081 14.3887 13.3873 13.888 13.888C13.3873 14.3887 12.7081 14.67 12 14.67ZM17.23 7.73001C17.23 7.9278 17.1714 8.12114 17.0615 8.28558C16.9516 8.45003 16.7954 8.57821 16.6127 8.65389C16.43 8.72958 16.2289 8.74938 16.0349 8.7108C15.8409 8.67221 15.6628 8.57697 15.5229 8.43712C15.3831 8.29727 15.2878 8.11909 15.2492 7.92511C15.2106 7.73112 15.2304 7.53006 15.3061 7.34733C15.3818 7.16461 15.51 7.00843 15.6744 6.89855C15.8389 6.78866 16.0322 6.73001 16.23 6.73001C16.4952 6.73001 16.7496 6.83537 16.9371 7.02291C17.1247 7.21044 17.23 7.4648 17.23 7.73001ZM19.94 8.73001C19.9691 7.48684 19.5054 6.28261 18.65 5.38001C17.7522 4.5137 16.5474 4.03897 15.3 4.06001C14 4.00001 10 4.00001 8.70001 4.06001C7.45722 4.0331 6.25379 4.49652 5.35001 5.35001C4.49465 6.25261 4.03093 7.45684 4.06001 8.70001C4.00001 10 4.00001 14 4.06001 15.3C4.03093 16.5432 4.49465 17.7474 5.35001 18.65C6.25379 19.5035 7.45722 19.9669 8.70001 19.94C10.02 20.02 13.98 20.02 15.3 19.94C16.5432 19.9691 17.7474 19.5054 18.65 18.65C19.5054 17.7474 19.9691 16.5432 19.94 15.3C20 14 20 10 19.94 8.70001V8.73001ZM18.24 16.73C18.1042 17.074 17.8993 17.3863 17.6378 17.6478C17.3763 17.9093 17.064 18.1142 16.72 18.25C15.1676 18.5639 13.5806 18.6715 12 18.57C10.4228 18.6716 8.83902 18.564 7.29001 18.25C6.94608 18.1142 6.63369 17.9093 6.37223 17.6478C6.11076 17.3863 5.90579 17.074 5.77001 16.73C5.35001 15.67 5.44001 13.17 5.44001 12.01C5.44001 10.85 5.35001 8.34001 5.77001 7.29001C5.90196 6.94268 6.10547 6.62698 6.36733 6.36339C6.62919 6.09981 6.94355 5.89423 7.29001 5.76001C8.83902 5.44599 10.4228 5.33839 12 5.44001C13.5806 5.33856 15.1676 5.44616 16.72 5.76001C17.064 5.89579 17.3763 6.10076 17.6378 6.36223C17.8993 6.62369 18.1042 6.93608 18.24 7.28001C18.66 8.34001 18.56 10.84 18.56 12C18.56 13.16 18.66 15.67 18.24 16.72V16.73Z" />
						</svg>
					</a>
					<a href="https://www.pinterest.com/studioatrium/" rel="nofollow"
						class="text-white hover:text-[var(--brand-blue)] transition" aria-label="Pinterest">
						<svg fill="#ffffff" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M12 0C5.373 0 0 5.372 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.403.042-3.441.219-.937 1.407-5.965 1.407-5.965s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0z" />
						</svg>
					</a>
					<a href="https://www.youtube.com/user/StudioAtrium" rel="nofollow"
						class="text-white hover:text-[var(--brand-blue)] transition" aria-label="YouTube">
						<svg fill="#ffffff" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
						</svg>
					</a>
				</div>
			</div>
			<div class="space-y-6"><a href="#"
					class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition">Nasze
					certyfikaty</a><a href="#"
					class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition">Pełne dane
					teleadresowe</a><a href="#"
					class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition">Blog</a></div>
			<div class="space-y-6"><a href="#"
					class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition">Polecani
					Przedstawiciele</a><a href="#"
					class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition">Dodatki do
					projektów</a><a href="#"
					class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition">Jak kupować</a><a
					href="#" class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition">Co zawiera
					projekt</a><a href="#"
					class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition">Projekty domów
					alfabetycznie</a><a href="#"
					class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition">Dziennik budowy</a>
			</div>
			<div class="space-y-3">
				<div class="text-white text-[15px] font-bold">Kontakt</div><a href="tel:602303160"
					class="block text-[var(--brand-red)] font-black text-[28px] leading-tight">602 303 160</a><a
					href="tel:338229496" class="block text-[var(--brand-red)] font-black text-[28px] leading-tight">33 822 94
					96</a>
				<div class="text-[var(--brand-red)] text-[13px] font-bold">33 810 66 54, 33 816 40 69, fax w. 108</div><a
					href="mailto:atrium@studioatrium.pl"
					class="block text-white font-black text-[24px] pt-3 hover:text-[var(--brand-blue)]">atrium@studioatrium.pl</a>
				<div class="text-white text-[14px] font-bold pt-3 leading-relaxed">STUDIO ATRIUM Lelek, Godlewski Spółka
					Jawna<br>43-300 Bielsko-Biała<br>ul. Malczewskiego 1</div><a href="#"
					class="text-[var(--brand-blue)] text-[14px] underline">zobacz dojazd</a>
			</div>
		</div>
		<div class="mt-16">
			<h3 class="text-white font-black text-[15px] tracking-wide mb-4">DOSTĘPNE PROJEKTY DOMÓW JEDNORODZINNYCH W STUDIO
				ATRIUM</h3>
			<div class="grid grid-cols-3 sm:grid-cols-5 lg:grid-cols-7 gap-x-6 gap-y-1 text-[12px]"><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a><a href="/projekty"
					class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów parterowych</a><a
					href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów z
					poddaszem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					piętrowych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty domów
					nowoczesnych</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów z garażem</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					małych domów</a><a href="/projekty" class="text-white/85 hover:text-[var(--brand-blue)] truncate">Projekty
					domów energooszczędnych</a></div>
		</div>
	</div>
</footer>

<div class="blue-overlay cs">
	<div id="cs-wrapper">
		<div>
			<form method="get" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'search'),$_smarty_tpl ) );?>
" id="search-form">
				<div id="search-project">
					<label for="search-name" class="black">Wpisz nazwę projektu</label>
					<input type="text" name="query" id="search-name" class="long">
					<input type="submit" id="search-name-submit" value="Wyszukaj" class="baton disabled" disabled>
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'varia','action'=>'project_helper'),$_smarty_tpl ) );?>
" class="wired help">Pomoc</a>
				</div>
			</form>
		</div>

		<div class="form-box">
			<p class="info">Lub wybierz parametry projektu i kliknij przycisk "Pokaż projekty" znajdujący się pod formularzem
			</p>
			<form id="click-search-form" method="post" action="/">
				<div class="cs-box">
					<ul>
						<?php if ($_smarty_tpl->tpl_vars['csCategory']->value) {?>
							<li class="half-spaced">
								<p class="head">kategoria:</p>
								<ul>
									<li>
										<input type="checkbox" id="cs-category" name="kategoria" value="<?php echo $_smarty_tpl->tpl_vars['csCategory']->value;?>
" checked><label
											for="cs-category"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</label> <span class="count" id="cs-category-count">(0)</span>
									</li>
								</ul>
							</li>
						<?php }?>

						<?php if ($_smarty_tpl->tpl_vars['csTag']->value) {?>
							<li class="half-spaced">
								<p class="head">wybrany filtr:</p>
								<ul>
									<li>
										<input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['csTag']->value['id'];?>
-1" name="<?php echo $_smarty_tpl->tpl_vars['csTag']->value['csname'];?>
" value="1" checked><label
											for="<?php echo $_smarty_tpl->tpl_vars['csTag']->value['id'];?>
-1"><?php echo $_smarty_tpl->tpl_vars['csTag']->value['name'];?>
</label> <span class="count" id="<?php echo $_smarty_tpl->tpl_vars['csTag']->value['id'];?>
-1-count">(0)</span>
									</li>
								</ul>
							</li>
						<?php }?>

						<?php if ($_smarty_tpl->tpl_vars['csTagSelect']->value) {?>
							<li class="half-spaced">
								<p class="head">wybrany filtr:</p>
								<ul>
									<li>
										<input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['value'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['csname'];?>
"
											value="<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['value'];?>
" checked><label
											for="<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['value'];?>
"><?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['name'];?>
 :
											<?php echo (($tmp = $_smarty_tpl->tpl_vars['csValueNames']->value[$_smarty_tpl->tpl_vars['csTagSelect']->value['value']] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['csTagSelect']->value['value'] ?? null : $tmp);?>
</label> <span class="count"
											id="<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['value'];?>
-count">(0)</span>
									</li>
								</ul>
							</li>
						<?php }?>

						<li class="spaced">
							<div class="jui-select-box white cs-select" id="project-type-box">
								<select name="typ_projektu" id="project-type">
									<option value="">typ projektu</option>

									
									<option id="parterowe" value="parterowe"
										<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'parterowe' || $_smarty_tpl->tpl_vars['csType']->value == 'parterowe') {?> selected<?php }?>>parterowe</option>
									<option id="z_poddaszem" value="z_poddaszem"
										<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'z_poddaszem' || $_smarty_tpl->tpl_vars['csType']->value == 'z_poddaszem') {?> selected<?php }?>>z poddaszem
									</option>
									<option id="pietrowe" value="pietrowe"
										<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'pietrowe' || $_smarty_tpl->tpl_vars['csType']->value == 'pietrowe') {?> selected<?php }?>>piętrowe</option>
									<option id="nothing" value="" disabled>--------</option>
									<option id="szkieletowe" value="szkieletowe"
										<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'szkieletowe' || $_smarty_tpl->tpl_vars['csType']->value == 'szkieletowe') {?> selected<?php }?>>szkieletowe
									</option>
									<option id="blizniacze" value="blizniacze"
										<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'blizniacze' || $_smarty_tpl->tpl_vars['csType']->value == 'blizniacze') {?> selected<?php }?>>bliźniacze
									</option>
									<option id="dwulokalowe" value="dwulokalowe"
										<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'dwulokalowe' || $_smarty_tpl->tpl_vars['csType']->value == 'dwulokalowe') {?> selected<?php }?>>dwulokalowe
									</option>

								</select>
							</div>

							<div class="jui-select-box right white cs-select" id="roof-type-box">
								<select name="typdachu" id="54">
									<option value="">typ dachu</option>
									<option id="54-dwuspadowy" value="dwuspadowy" <?php if ($_smarty_tpl->tpl_vars['request']->value['typdachu'] == 'dwuspadowy') {?> selected<?php }?>>
										dwuspadowy</option>
									<option id="54-mansardowy" value="mansardowy" <?php if ($_smarty_tpl->tpl_vars['request']->value['typdachu'] == 'mansardowy') {?> selected<?php }?>>
										mansardowy</option>
									<option id="54-stropodach" value="stropodach" <?php if ($_smarty_tpl->tpl_vars['request']->value['typdachu'] == 'stropodach') {?> selected<?php }?>>
										płaski</option>
									<option id="54-stozkowy" value="stozkowy" <?php if ($_smarty_tpl->tpl_vars['request']->value['typdachu'] == 'stozkowy') {?> selected<?php }?>>stożkowy
									</option>
									<option id="54-wielospadowy" value="wielospadowy" <?php if ($_smarty_tpl->tpl_vars['request']->value['typdachu'] == 'wielospadowy') {?>
										selected<?php }?>>wielospadowy</option>
								</select>
							</div>
						</li>

						<li>
							<p class="area">Powierzchnia użytkowa</p>
							<label for="pow-min">od</label>
							<input type="text" name="pow_min" id="pow-min" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_min'];?>
">
							<span class="sep"><label for="pow-max">do</label></span>
							<input type="text" name="pow_max" id="pow-max" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_max'];?>
"> m<sup>2</sup>
						</li>

						<li>
							<p class="area">Powierzchnia zabudowy</p>
							<label for="pow-zab-min">od</label>
							<input type="text" name="pow_zab_min" id="pow-zab-min" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_zab_min'];?>
">
							<span class="sep"><label for="pow-zab-max">do</label></span>
							<input type="text" name="pow_zab_max" id="pow-zab-max" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_zab_max'];?>
"> m<sup>2</sup>
						</li>

						<li>
							<p class="area">Powierzchnia całkowita</p>
							<label for="pow-total-min">od</label>
							<input type="text" name="pow_total_min" id="pow-total-min" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_total_min'];?>
">
							<span class="sep"><label for="pow-total-max">do</label></span>
							<input type="text" name="pow_total_max" id="pow-total-max" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_total_max'];?>
"> m<sup>2</sup>
						</li>

						<li>
							<p class="dim">Szerokość | długość działki</p>
							<input type="text" name="dzialka_szer" id="parcel-width" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['dzialka_szer'];?>
">
							<span class="sep center">|</span>
							<input type="text" name="dzialka_dl" id="parcel-height" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['dzialka_dl'];?>
"> m
						</li>

						<li class="spaced">
							<p class="long">Maks. szerokość elewacji frontowej</p>
							<input type="text" name="front_szer" id="front-width" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['front_szer'];?>
"> m
						</li>

						<li class="half-spaced">
							<p class="head">ilość pokoi na parterze:</p>
							<div>
								<input type="radio" id="69-0" name="iloscpokoinaparterze" value="-1"><label for="69-0"
									class="spaced breaker">Dowolna</label>
								<input type="radio" id="69-1" name="iloscpokoinaparterze" value="1"
									<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaparterze'] == 1) {?> checked<?php }?>><label for="69-1">1</label> <span class="count"
									id="69-1-count">(0)</span>
								<input type="radio" id="69-2" name="iloscpokoinaparterze" value="2"
									<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaparterze'] == 2) {?> checked<?php }?>><label for="69-2">2</label> <span class="count"
									id="69-2-count">(0)</span>
								<input type="radio" id="69-3" name="iloscpokoinaparterze" value="3"
									<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaparterze'] == 3) {?> checked<?php }?>><label for="69-3">3</label> <span class="count"
									id="69-3-count">(0)</span>
								<input type="radio" id="69-4" name="iloscpokoinaparterze" value="4"
									<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaparterze'] == 4) {?> checked<?php }?>><label for="69-4">4</label> <span class="count"
									id="69-4-count">(0)</span>
								<input type="radio" id="69-5" name="iloscpokoinaparterze" value="5"
									<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaparterze'] == 5) {?> checked<?php }?>><label for="69-5">5</label> <span class="count"
									id="69-5-count">(0)</span>
							</div>
						</li>

						<li class="half-spaced">
							<p class="head">ilość pokoi na II kondygnacji:</p>
							<div>
								<input type="radio" id="71-0" name="iloscpokoinaiikondygnacji" value="-1"><label for="71-0"
									class="spaced breaker">Dowolna</label>
								<input type="radio" id="71-1" name="iloscpokoinaiikondygnacji" value="1"
									<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaiikondygnacji'] == 1) {?> checked<?php }?>><label for="71-1">1</label> <span
									class="count" id="71-1-count">(0)</span>
								<input type="radio" id="71-2" name="iloscpokoinaiikondygnacji" value="2"
									<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaiikondygnacji'] == 2) {?> checked<?php }?>><label for="71-2">2</label> <span
									class="count" id="71-2-count">(0)</span>
								<input type="radio" id="71-3" name="iloscpokoinaiikondygnacji" value="3"
									<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaiikondygnacji'] == 3) {?> checked<?php }?>><label for="71-3">3</label> <span
									class="count" id="71-3-count">(0)</span>
								<input type="radio" id="71-4" name="iloscpokoinaiikondygnacji" value="4"
									<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaiikondygnacji'] == 4) {?> checked<?php }?>><label for="71-4">4</label> <span
									class="count" id="71-4-count">(0)</span>
								<input type="radio" id="71-5" name="iloscpokoinaiikondygnacji" value="5"
									<?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaiikondygnacji'] == 5) {?> checked<?php }?>><label for="71-5">5</label> <span
									class="count" id="71-5-count">(0)</span>
							</div>
						</li>

						<li>
							<p class="head">Ilość łazienek</p>
							<div>
								<span class="dist">Na parterze</span>
								<input type="radio" name="liczbalazieneknaparterze" value="2" id="45-2"
									<?php if ($_smarty_tpl->tpl_vars['request']->value['liczbalazieneknaparterze'] == 2) {?> checked<?php }?>><label for="45-2">2</label> <span
									class="count" id="45-2-count">(0)</span>
								<input type="radio" name="liczbalazieneknaparterze" value="3" id="45-3"
									<?php if ($_smarty_tpl->tpl_vars['request']->value['liczbalazieneknaparterze'] == 3) {?> checked<?php }?>><label for="45-3">3</label> <span
									class="count" id="45-3-count">(0)</span>
							</div>
							<div>
								<span class="dist">Na II kondygnacji</span>
								<input type="radio" name="liczbalazieneknaiikondygnacji" value="2" id="46-2"
									<?php if ($_smarty_tpl->tpl_vars['request']->value['liczbalazieneknaiikondygnacji'] == 2) {?> checked<?php }?>><label for="46-2">2</label> <span
									class="count" id="46-2-count">(0)</span>
								<input type="radio" name="liczbalazieneknaiikondygnacji" value="3" id="46-3"
									<?php if ($_smarty_tpl->tpl_vars['request']->value['liczbalazieneknaiikondygnacji'] == 3) {?> checked<?php }?>><label for="46-3">3</label> <span
									class="count" id="46-3-count">(0)</span>
							</div>
						</li>
					</ul>
				</div>

				<div class="cs-box">
					<ul>
						<li class="half-spaced">
							<div class="jui-select-box white cs-select" id="height-box">
								<select name="wysokoscbudynku" id="26">
									<option value="">maks. wys. budynku</option>
									<option id="26-1" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 1) {?> selected<?php }?>>do 6 m</option>
									<option id="26-2" value="2" <?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 2) {?> selected<?php }?>>od 6 m do 7 m</option>
									<option id="26-3" value="3" <?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 3) {?> selected<?php }?>>od 7 m do 8 m</option>
									<option id="26-4" value="4" <?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 4) {?> selected<?php }?>>od 8 m do 9 m</option>
									<option id="26-5" value="5" <?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 5) {?> selected<?php }?>>od 9 m do 10 m</option>
									<option id="26-6" value="6" <?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 6) {?> selected<?php }?>>powyżej 10 m</option>
								</select>
							</div>

							<div class="jui-select-box right white cs-select" id="angle-box">
								<select name="katnachyleniadachu" id="27">
									<option value="">kąt nach. dachu</option>
									<option id="27-1" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['katnachyleniadachu'] == 1) {?> selected<?php }?>>do 30&deg;</option>
									<option id="27-2" value="2" <?php if ($_smarty_tpl->tpl_vars['request']->value['katnachyleniadachu'] == 2) {?> selected<?php }?>>30&deg; do 35&deg;
									</option>
									<option id="27-3" value="3" <?php if ($_smarty_tpl->tpl_vars['request']->value['katnachyleniadachu'] == 3) {?> selected<?php }?>>35&deg; do 40&deg;
									</option>
									<option id="27-4" value="4" <?php if ($_smarty_tpl->tpl_vars['request']->value['katnachyleniadachu'] == 4) {?> selected<?php }?>>40&deg; do 45&deg;
									</option>
									<option id="27-5" value="5" <?php if ($_smarty_tpl->tpl_vars['request']->value['katnachyleniadachu'] == 5) {?> selected<?php }?>>45&deg; i więcej
									</option>
								</select>
							</div>
						</li>

						<li class="spaced">
							<div class="jui-select-box white cs-select" id="ceiling-box">
								<select name="rodzajstropu" id="28">
									<option value="">strop nad parterem</option>
									<option id="28-lekki" value="lekki" <?php if ($_smarty_tpl->tpl_vars['request']->value['rodzajstropu'] == 'lekki') {?> selected<?php }?>>lekki</option>
									<option id="28-gestozebrowy" value="gestozebrowy" <?php if ($_smarty_tpl->tpl_vars['request']->value['rodzajstropu'] == 'gestozebrowy') {?>
										selected<?php }?>>gęstożebrowy</option>
									<option id="28-plyta_zelbetowa" value="plyta_zelbetowa"
										<?php if ($_smarty_tpl->tpl_vars['request']->value['rodzajstropu'] == 'plyta_zelbetowa') {?> selected<?php }?>>płyta żelbetowa</option>
									<option id="28-drewniany_belkowy" value="drewniany_belkowy"
										<?php if ($_smarty_tpl->tpl_vars['request']->value['rodzajstropu'] == 'drewniany_belkowy') {?> selected<?php }?>>drewniany belkowy</option>
								</select>
							</div>

							<div class="jui-select-box right white cs-select" id="ridge-box">
								<select name="kalenica" id="103">
									<option value="">kalenica</option>
									<option id="103-rownolegla_do_drogi" value="rownolegla_do_drogi"
										<?php if ($_smarty_tpl->tpl_vars['request']->value['kalenica'] == 'rownolegla_do_drogi') {?> selected<?php }?>>równoległa do drogi</option>
									<option id="103-prostopadla_do_drogi" value="prostopadla_do_drogi"
										<?php if ($_smarty_tpl->tpl_vars['request']->value['kalenica'] == 'prostopadla_do_drogi') {?> selected<?php }?>>prostopadła do drogi</option>
									<option id="103-brak" value="brak" <?php if ($_smarty_tpl->tpl_vars['request']->value['kalenica'] == 'brak') {?> selected<?php }?>>brak</option>
								</select>
							</div>
						</li>

						<li>
							<p class="head">Funkcja - opcje dodatkowe</p>
							<div>
								<ul class="input-box">
									<li>
										<input type="checkbox" id="65-1" name="spizarnia" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['spizarnia']) {?>
											checked<?php }?>><label for="65-1">Spiżarnia</label> <span class="count" id="65-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="57-1" name="garderoba" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['garderoba']) {?>
											checked<?php }?>><label for="57-1">Garderoba</label> <span class="count" id="57-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="c18-1" name="duza_kotlownia" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['duza_kotlownia']) {?>
											checked<?php }?>><label for="c18-1">Duża kotłownia</label> <span class="count"
											id="c18-1-count">(0)</span>
									</li>
								</ul>
							</div>
						</li>
						<li>
							<div>
								<ul class="input-box">
									<li>
										<input type="checkbox" id="47-1" name="wiatagarazowa" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['wiatagarazowa']) {?>
											checked<?php }?>><label for="47-1">Wiata</label> <span class="count" id="47-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="96-1" name="pralnia" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['pralnia']) {?> checked<?php }?>><label
											for="96-1">Pralnia</label> <span class="count" id="96-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="c26-1" name="od_poludnia" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['od_poludnia']) {?>
											checked<?php }?>><label for="c26-1">Wjazd od południa</label> <span class="count"
											id="c26-1-count">(0)</span>
									</li>
								</ul>
							</div>
						</li>
						<li>
							<div>
								<ul class="input-box">
									<li>
										<input type="checkbox" id="104-1" name="balkon" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['balkon']) {?> checked<?php }?>><label
											for="104-1">Balkon</label> <span class="count" id="104-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="105-1" name="lukarna" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['lukarna']) {?> checked<?php }?>><label
											for="105-1">Lukarna</label> <span class="count" id="105-1-count">(0)</span>
									</li>
									<li>
										<input type="checkbox" id="113-1" name="masterbedroom" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['masterbedroom']) {?>
											checked<?php }?>><label for="113-1">Master bedroom</label> <span class="count"
											id="113-1-count">(0)</span>
									</li>
								</ul>
							</div>
						</li>
						<li>
							<div>
								<input type="checkbox" id="59-1" name="kuchniaodfrontu" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['kuchniaodfrontu']) {?>
									checked<?php }?>><label for="59-1">Kuchnia od frontu</label> <span class="count"
									id="59-1-count">(0)</span>
								<div class="fright">
									<input type="checkbox" id="60-1" name="kuchniaodogrodu" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['kuchniaodogrodu']) {?>
										checked<?php }?>><label for="60-1">Kuchnia od ogrodu</label> <span class="count"
										id="60-1-count">(0)</span>
								</div>
							</div>
						</li>
						<li>
							<div>
								<input type="checkbox" id="c19-1" name="kotlownia" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['kotlownia']) {?> checked<?php }?>><label
									for="c19-1">Kotłownia na paliwo stałe</label> <span class="count" id="c19-1-count">(0)</span>
								<div class="fright">
									<input type="checkbox" id="67-1" name="zadaszonytaras" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['zadaszonytaras']) {?>
										checked<?php }?>><label for="67-1">Zadaszony taras</label> <span class="count"
										id="67-1-count">(0)</span>
								</div>
							</div>
						</li>
						<li class="half-spaced">
							<div>
								<input type="checkbox" id="94-1" name="antresola" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['antresola']) {?> checked<?php }?>><label
									for="94-1">Otwarta przestrzeń</label> <span class="count" id="94-1-count">(0)</span>
								<div class="fright">
									<input type="checkbox" id="119-1" name="osobnewc" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['osobnewc']) {?> checked<?php }?>><label
										for="119-1">Osobne w.c.</label> <span class="count" id="119-1-count">(0)</span>
								</div>
							</div>
						</li>
						<li>
							<p class="head">Garaż</p>
							<div>
								<input type="radio" id="78-0" name="garaz" value="0"><label for="78-0" class="spaced">Dowolnie</label>
								<input type="radio" id="78-1" name="garaz" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['garaz'] == 1) {?> checked<?php }?>><label
									for="78-1">1 stanowisko</label> <span class="count" id="78-1-count">(0)</span>
								<input type="radio" id="78-2" name="garaz" value="2" <?php if ($_smarty_tpl->tpl_vars['request']->value['garaz'] == 2) {?> checked<?php }?>><label
									for="78-2">2 i więcej</label> <span class="count" id="78-2-count">(0)</span>
								<input type="radio" id="78-3" name="garaz" value="3" <?php if ($_smarty_tpl->tpl_vars['request']->value['garaz'] == 3) {?> checked<?php }?>><label
									for="78-3">nie</label> <span class="count" id="78-3-count">(0)</span>
							</div>
						</li>
						<li class="half-spaced">
							<p class="head">Piwnica</p>
							<div>
								<input type="radio" id="2-0" name="piwnica" value="0"><label for="2-0" class="spaced">Dowolnie</label>
								<input type="radio" id="2-1" name="piwnica" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['piwnica'] == 1) {?> checked<?php }?>><label
									for="2-1">tak</label> <span class="count" id="2-1-count">(0)</span>
								<input type="radio" id="2-2" name="piwnica" value="2" <?php if ($_smarty_tpl->tpl_vars['request']->value['piwnica'] == 2) {?> checked<?php }?>><label
									for="2-2">nie</label> <span class="count" id="2-2-count">(0)</span>
							</div>
						</li>
						<li>
							<button id="cs-reset" class="wired">Resetuj wyszukiwarkę</button>
							<button id="cs-fetch" class="baton">Pokaż projekty</button>
							<p id="data-read" style="display: none;">trwa wczytywanie danych</p>
						</li>
					</ul>
				</div>
			</form>
		</div>
	</div>
	<button type="button" id="cs-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>
<!-- Swiper JS -->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/jquery.json-2.3.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/enquire.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/storage.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/clicksearch.js?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/common.js?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
"><?php echo '</script'; ?>
>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['js_includes']->value, '_js');
$_smarty_tpl->tpl_vars['_js']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_js']->value) {
$_smarty_tpl->tpl_vars['_js']->do_else = false;
?>
	<?php echo '<script'; ?>
 src="/js/<?php echo $_smarty_tpl->tpl_vars['_js']->value;?>
"><?php echo '</script'; ?>
>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['js_lazy']->value, '_js');
$_smarty_tpl->tpl_vars['_js']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_js']->value) {
$_smarty_tpl->tpl_vars['_js']->do_else = false;
?>
	<?php echo '<script'; ?>
 src="/js/<?php echo $_smarty_tpl->tpl_vars['_js']->value;?>
"><?php echo '</script'; ?>
>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if (!$_smarty_tpl->tpl_vars['isMobile']->value) {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['js_lazy_nomobie']->value, '_js');
$_smarty_tpl->tpl_vars['_js']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_js']->value) {
$_smarty_tpl->tpl_vars['_js']->do_else = false;
?>
		<?php echo '<script'; ?>
 src="/js/<?php echo $_smarty_tpl->tpl_vars['_js']->value;?>
"><?php echo '</script'; ?>
>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>

<?php echo '<script'; ?>
>
	lucide.createIcons();
<?php echo '</script'; ?>
>

<!-- Facebook Pixel Code -->

	<?php echo '<script'; ?>
>
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
	<?php echo '</script'; ?>
>
	<noscript><img height="1" width="1" style="display:none"
			src="https://www.facebook.com/tr?id=164344025487761&ev=PageView&noscript=1" /></noscript>

<!-- End Facebook Pixel Code -->



<?php if (!$_smarty_tpl->tpl_vars['nochat']->value) {?>
	<!--Start of Tawk.to Script-->
	<?php echo '<script'; ?>
 type="text/javascript">
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
	<?php echo '</script'; ?>
>
	<!--End of Tawk.to Script-->

	<?php }
}
}
