<?php
/* Smarty version 3.1.48, created on 2026-10-01 22:10:34
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Layout/Header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abebe3a3c0cf7_19600097',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8176fdb0173b230f3822c14e0cd77a18e9f5278a' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Layout/Header.tpl',
      1 => 1790885429,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abebe3a3c0cf7_19600097 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['promo_marquee_text']->value) {?>
	<div class="promo-marquee" aria-label="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['promo_marquee_text']->value, ENT_QUOTES, 'UTF-8', true);?>
">
		<div class="promo-marquee__track">
			<div class="promo-marquee__group">
				<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['promo_marquee_text']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
				<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['promo_marquee_text']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
				<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['promo_marquee_text']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
				<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['promo_marquee_text']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
				<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['promo_marquee_text']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
				<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['promo_marquee_text']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
			</div>
			<div class="promo-marquee__group" aria-hidden="true">
				<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['promo_marquee_text']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
				<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['promo_marquee_text']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
				<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['promo_marquee_text']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
				<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['promo_marquee_text']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
				<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['promo_marquee_text']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
				<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['promo_marquee_text']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
			</div>
		</div>
	</div>
<?php }?>

<!-- New header START -->
<header id="site-header" class="bg-white border-b border-black/5 z-50 overflow-visible font-sans rounded-none relative">
	<div class="relative" id="site-header-mega">
		<div class="max-w-[1480px] mx-auto px-4 sm:px-6 min-[850px]:px-9 pt-3">
			<div class="flex items-center justify-between gap-3 sm:gap-6 min-[850px]:gap-8 mb-4 min-[850px]:mb-[40px]">
				<a href="/" class="flex items-center shrink-0 mt-2 min-[850px]:mt-[30px]">
					<img src="/img/logo.svg" alt="Studio Atrium – projekty domów" class="h-[28px] sm:h-[35px] w-auto shrink-0 rounded-none" id="logo" width="176" height="35">
				</a>
				<div class="flex flex-col items-stretch min-[850px]:items-end gap-3 min-[850px]:gap-6 min-w-0 flex-1">
					<div class="site-header-utils flex items-center justify-end gap-2 sm:gap-4 min-[850px]:gap-6 h-[40px] w-full min-w-0">
						<button type="button" id="site-mobile-nav-toggle" class="site-mobile-nav-toggle min-[850px]:hidden inline-flex items-center justify-center h-[40px] w-[40px] shrink-0 mr-auto text-[var(--brand-red)] hover:text-[var(--brand-red-hover)] bg-transparent border-0 p-0" aria-expanded="false" aria-controls="site-mobile-nav" aria-label="Otwórz menu">
							<span class="site-mobile-nav-icon-open inline-flex" aria-hidden="true">
								<i data-lucide="menu" class="w-[28px] h-[28px] shrink-0" stroke-width="2.5"></i>
							</span>
							<span class="site-mobile-nav-icon-close hidden inline-flex" aria-hidden="true">
								<i data-lucide="x" class="w-[28px] h-[28px] shrink-0" stroke-width="2.5"></i>
							</span>
						</button>
						<a href="tel:+48602303160" class="flex items-center gap-2 h-[34px] rounded-none shrink-0" rel="nofollow" aria-label="Zadzwoń 602 303 160">
							<i data-lucide="phone" class="w-[20px] h-[20px] sm:w-[24px] sm:h-[24px] text-[var(--brand-darker)] shrink-0" stroke-width="1.25" aria-hidden="true"></i>
							<span class="hidden lg:inline text-[var(--brand-red)] leading-none" style="font-size:20px;font-style:normal;font-weight:700;">602 303 160</span>
						</a>
						<form method="get" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'search'),$_smarty_tpl ) );?>
" class="site-header-search relative hidden min-[850px]:flex items-center h-[34px] rounded-none shrink-0" role="search">
							<input type="text" name="query" placeholder="wyszukaj nazwę"
								class="rounded-none bg-white border border-[#979797] h-[34px] pl-5 pr-10 text-[13px] font-normal tracking-wider w-full max-w-[140px] md:max-w-[170px] leading-none text-[var(--brand-darker)] placeholder:text-[#343233] focus:outline-none focus:border-[var(--brand-blue)]">
							<button type="submit" aria-label="Szukaj"
								class="rounded-none absolute right-0 top-0 h-[34px] w-10 flex items-center justify-center text-[var(--brand-darker)] hover:text-[var(--brand-red)] bg-transparent">
								<i data-lucide="search" class="w-[16px] h-[16px] shrink-0"></i>
							</button>
						</form>
						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'favourite','action'=>'list'),$_smarty_tpl ) );?>
" aria-label="Ulubione"
							class="inline-flex items-center justify-center h-[34px] text-[var(--brand-darker)] hover:text-[var(--brand-red)] shrink-0">
							<i data-lucide="heart" class="w-[20px] h-[20px] shrink-0"></i>
						</a>
						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'order','action'=>'cart'),$_smarty_tpl ) );?>
" aria-label="Koszyk"
							class="relative inline-flex items-center justify-center h-[34px] text-[var(--brand-darker)] hover:text-[var(--brand-red)] shrink-0"<?php if (!$_smarty_tpl->tpl_vars['basket']->value) {?> id="header-cart-empty"<?php }?>>
							<i data-lucide="shopping-cart" class="w-[22px] h-[22px] shrink-0"></i>
							<?php if ($_smarty_tpl->tpl_vars['basket']->value) {?>
								<span class="absolute -top-1.5 -right-1.5 min-w-[18px] h-[18px] px-1 bg-[var(--brand-red)] text-white text-[10px] font-black leading-none grid place-items-center rounded-none">
									<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['basket']->value ));?>

								</span>
							<?php }?>
						</a>
						<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'panel','action'=>'account'),$_smarty_tpl ) );?>
"
								class="header-account-btn hidden min-[850px]:inline-flex rounded-none border border-[#979797] h-[34px] px-3 text-[13px] font-bold tracking-wider text-[var(--brand-darker)] hover:border-[var(--brand-red)] hover:text-[var(--brand-red)] items-center bg-white shrink-0">
								KONTO
							</a>
						<?php } else { ?>
							<button type="button"
								class="login-trigger hidden min-[850px]:inline-flex rounded-none border border-[#979797] h-[34px] px-3 text-[13px] font-bold tracking-wider text-[var(--brand-darker)] hover:border-[var(--brand-red)] hover:text-[var(--brand-red)] bg-white items-center shrink-0">
								ZALOGUJ
							</button>
						<?php }?>
					</div>
					<nav class="hidden min-[850px]:flex items-center justify-end gap-6 lg:gap-10" aria-label="Główne menu">
						<a href="/" data-mega="projekty" aria-expanded="false" aria-haspopup="true"
							class="site-mega-trigger inline-flex items-center gap-1.5 text-[13px] lg:text-[14px] font-black tracking-wider transition-colors duration-200 text-[var(--brand-darker)] hover:text-[var(--brand-red)]">
							PROJEKTY DOMÓW
							<i data-lucide="chevron-down" class="site-mega-chevron w-[14px] h-[14px] shrink-0 transition-transform duration-300 ease-out" stroke-width="2.5"></i>
						</a>
						<a href="/projekty-garazy/" data-mega="garaze" aria-expanded="false" aria-haspopup="true"
							class="site-mega-trigger inline-flex items-center gap-1.5 text-[13px] lg:text-[14px] font-black tracking-wider transition-colors duration-200 text-[var(--brand-darker)] hover:text-[var(--brand-red)]">
							GARAŻE I INNE
							<i data-lucide="chevron-down" class="site-mega-chevron w-[14px] h-[14px] shrink-0 transition-transform duration-300 ease-out" stroke-width="2.5"></i>
						</a>
						<a href="javascript:" data-mega="wiedza" aria-expanded="false" aria-haspopup="true"
							class="site-mega-trigger inline-flex items-center gap-1.5 text-[13px] lg:text-[14px] font-black tracking-wider transition-colors duration-200 text-[var(--brand-darker)] hover:text-[var(--brand-red)]">
							BAZA WIEDZY
							<i data-lucide="chevron-down" class="site-mega-chevron w-[14px] h-[14px] shrink-0 transition-transform duration-300 ease-out" stroke-width="2.5"></i>
						</a>
						<a href="/kontakt/"
							class="inline-flex items-center gap-1.5 text-[13px] lg:text-[14px] font-black tracking-wider transition-colors duration-200 text-[var(--brand-red)] hover:text-[var(--brand-red)]">
							KONTAKT
						</a>
					</nav>
				</div>
			</div>
		</div>

		<div id="site-mobile-nav" class="min-[850px]:hidden hidden border-t border-black/10 bg-white" hidden>
			<nav class="max-w-[1480px] mx-auto px-4 sm:px-6 py-4 flex flex-col gap-1" aria-label="Menu mobilne">
				<a href="/katalog-projektow.html" class="py-3 text-[15px] font-black tracking-wider text-[var(--brand-darker)] hover:text-[var(--brand-red)] border-b border-black/5">PROJEKTY DOMÓW</a>
				<a href="/projekty-garazy/" class="py-3 text-[15px] font-black tracking-wider text-[var(--brand-darker)] hover:text-[var(--brand-red)] border-b border-black/5">GARAŻE I INNE</a>
				<a href="/baza-wiedzy/" class="py-3 text-[15px] font-black tracking-wider text-[var(--brand-darker)] hover:text-[var(--brand-red)] border-b border-black/5">BAZA WIEDZY</a>
				<a href="/kontakt/" class="py-3 text-[15px] font-black tracking-wider text-[var(--brand-red)] border-b border-black/5">KONTAKT</a>
				<form method="get" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'search'),$_smarty_tpl ) );?>
" class="site-mobile-search relative flex items-center w-full h-[48px] mt-3 mb-2 rounded-none" role="search">
					<input type="text" name="query" placeholder="wyszukaj nazwę"
						class="rounded-none bg-white border border-[#979797] h-[48px] pl-4 pr-12 text-[14px] font-normal tracking-wider w-full max-w-none leading-none text-[var(--brand-darker)] placeholder:text-[#343233] focus:outline-none focus:border-[var(--brand-blue)] box-border">
					<button type="submit" aria-label="Szukaj"
						class="rounded-none absolute right-0 top-0 h-[48px] w-12 flex items-center justify-center text-[var(--brand-darker)] hover:text-[var(--brand-red)] bg-transparent">
						<i data-lucide="search" class="w-[18px] h-[18px] shrink-0"></i>
					</button>
				</form>
				<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
					<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'panel','action'=>'account'),$_smarty_tpl ) );?>
" class="py-3 text-[14px] font-bold tracking-wider text-[var(--brand-darker)] hover:text-[var(--brand-red)] border-b border-black/5">Konto</a>
				<?php } else { ?>
					<button type="button" class="login-trigger mt-2 w-full h-[48px] inline-flex items-center justify-center rounded-none bg-[#e8e8e8] hover:bg-[#dedede] text-[14px] font-bold tracking-wider text-[var(--brand-darker)] hover:text-[var(--brand-red)] border-0 px-4">Zaloguj</button>
				<?php }?>
			</nav>
		</div>

		<div id="site-mega-dropdown"
			class="site-mega-dropdown hidden min-[850px]:block absolute left-0 right-0 top-[calc(100%-12px)] pt-3 z-[60] pointer-events-none">
			<div
				class="site-mega-panel bg-[#f4f4f4] border-t border-black/5 shadow-[0_18px_40px_-18px_rgba(0,0,0,0.28)] origin-top transition-all duration-200 ease-out opacity-0 -translate-y-1.5 invisible">
				<div class="site-mega-scroll max-w-[1480px] mx-auto px-8 py-8 max-h-[min(72vh,680px)] overflow-y-auto">

					<div class="site-mega-content hidden" data-mega-panel="projekty">
						<div class="grid grid-cols-1 md:grid-cols-[220px_minmax(0,1fr)] gap-10 lg:gap-14">
							<div class="mb-[40px]">
								<ul class="space-y-1.5 text-[15px] text-[#444]">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['siteMenu']->value['house'], '_item');
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
?>
										<?php if ($_smarty_tpl->tpl_vars['_item']->value['menu_position'] == 1 && $_smarty_tpl->tpl_vars['_item']->value['is_highlight']) {?>
											<li>
												<a href="/<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];
if (strpos($_smarty_tpl->tpl_vars['_item']->value['link'],'.html') === false) {?>/<?php }?>"
													class="block py-[4px] text-[14px] leading-snug text-[#333] hover:text-[var(--brand-red)] transition-colors duration-150<?php if ($_smarty_tpl->tpl_vars['_item']->value['is_highlight']) {?> font-bold text-[#222]<?php }?>">
													<?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>

												</a>
											</li>
										<?php }?>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</ul>
							</div>

							<div class="grid grid-cols-1 sm:grid-cols-3 gap-10 lg:gap-14">
							<?php
$_smarty_tpl->tpl_vars['__smarty_section_col'] = new Smarty_Variable(array());
if (true) {
for ($_smarty_tpl->tpl_vars['__smarty_section_col']->value['iteration'] = 1, $_smarty_tpl->tpl_vars['__smarty_section_col']->value['index'] = 0; $_smarty_tpl->tpl_vars['__smarty_section_col']->value['iteration'] <= 3; $_smarty_tpl->tpl_vars['__smarty_section_col']->value['iteration']++, $_smarty_tpl->tpl_vars['__smarty_section_col']->value['index']++){
?>
								<div class="space-y-1">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['siteMenu']->value['house'], '_item');
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
?>
										<?php if ($_smarty_tpl->tpl_vars['_item']->value['menu_position'] == (isset($_smarty_tpl->tpl_vars['__smarty_section_col']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_col']->value['iteration'] : null)) {?>
											<?php if ($_smarty_tpl->tpl_vars['_item']->value['children']) {?>
												<div>
													<div class="text-[14px] font-medium tracking-[0.14em] text-[var(--brand-red)] uppercase mb-[4px]">
														<?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>

													</div>
													<ul>
														<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_item']->value['children'], '_subitem');
$_smarty_tpl->tpl_vars['_subitem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_subitem']->value) {
$_smarty_tpl->tpl_vars['_subitem']->do_else = false;
?>
															<li>
																<a href="/<?php echo $_smarty_tpl->tpl_vars['_subitem']->value['link'];
if (strpos($_smarty_tpl->tpl_vars['_subitem']->value['link'],'.html') === false) {?>/<?php }?>"
																	class="block py-[2px] text-[14px] leading-snug text-[#555] hover:text-[var(--brand-red)] transition-colors duration-150<?php if ($_smarty_tpl->tpl_vars['_subitem']->value['is_highlight']) {?> font-bold text-[#222]<?php }?>">
																	<?php echo $_smarty_tpl->tpl_vars['_subitem']->value['name'];?>

																</a>
															</li>
														<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
													</ul>
												</div>
											<?php } elseif ($_smarty_tpl->tpl_vars['_item']->value['link']) {?>
												<div>
													<a href="/<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];
if (strpos($_smarty_tpl->tpl_vars['_item']->value['link'],'.html') === false) {?>/<?php }?>"
														class="block py-[4px] text-[14px] leading-snug text-[#555] hover:text-[var(--brand-red)] transition-colors duration-150<?php if ($_smarty_tpl->tpl_vars['_item']->value['is_highlight']) {?> font-bold text-[#222]<?php }?>">
														<?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>

													</a>
												</div>
											<?php }?>
										<?php }?>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</div>
							<?php
}
}
?>
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

	<div id="site-header-filter-bar" class="max-w-[1480px] w-full mx-auto px-4 sm:px-6 lg:px-8 pb-3 lg:pb-4 z-10">
		<div class="site-header-filter-row flex flex-row flex-wrap items-center justify-center gap-5">
			<div id="site-header-filters"
				class="w-auto h-[42px] lg:h-[45px] bg-[#1d99e1] rounded-none flex items-center gap-[10px] lg:gap-10 px-5 lg:px-10 overflow-x-auto scrollbar-none shrink-0">
				<button type="button" data-search-tab="kondygnacje"
					class="js-open-search shrink-0 rounded-none bg-transparent text-white font-black text-[12px] lg:text-[14px] leading-none tracking-normal">
					Kondygnacje
				</button>
				<button type="button" data-search-tab="powierzchnia"
					class="js-open-search shrink-0 rounded-none bg-transparent text-white font-black text-[12px] lg:text-[14px] leading-none tracking-normal">
					Powierzchnia
				</button>
				<button type="button" data-search-tab="garaz"
					class="js-open-search shrink-0 rounded-none bg-transparent text-white font-black text-[12px] lg:text-[14px] leading-none tracking-normal">
					Garaż
				</button>
				<button type="button" data-search-tab="szkieletowe"
					class="js-open-search shrink-0 rounded-none bg-transparent text-white font-black text-[12px] lg:text-[14px] leading-none tracking-normal">
					Szkieletowe
				</button>
				<button type="button" data-search-tab="dzialka"
					class="js-open-search shrink-0 rounded-none bg-transparent text-white font-black text-[12px] lg:text-[14px] leading-none tracking-normal">
					Typ działki
				</button>
			</div>
			<button type="button" id="search-trigger"
				class="js-open-search rounded-none bg-[#c61000] hover:bg-[#a80d00] text-white h-[48px] lg:h-[54px] w-auto lg:w-[264px] px-5 lg:px-0 font-black text-[13px] lg:text-[14px] leading-none tracking-normal flex items-center justify-center gap-[10px] shrink-0">
				ZNAJDŹ PROJEKT
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sliders-horizontal shrink-0" style="width:24px;height:24px;max-width:24px;max-height:24px" aria-hidden="true"><path d="M10 5H3"/><path d="M12 19H3"/><path d="M14 3v4"/><path d="M16 17v4"/><path d="M21 12h-9"/><path d="M21 19h-5"/><path d="M21 5h-7"/><path d="M8 10v4"/><path d="M8 12H3"/></svg>
			</button>
		</div>
	</div>
</header>
<?php echo '<script'; ?>
>

(function () {
	var header = document.getElementById('site-header');
	if (!header) return;

	var megaRoot = document.getElementById('site-header-mega');
	var dropdown = document.getElementById('site-mega-dropdown');
	var panelShell = dropdown ? dropdown.querySelector('.site-mega-panel') : null;
	var panels = header.querySelectorAll('[data-mega-panel]');
	var triggers = header.querySelectorAll('[data-mega]');
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

	triggers.forEach(function (trigger) {
		var key = trigger.getAttribute('data-mega');
		if (!key) {
			return;
		}
		trigger.addEventListener('click', function (event) {
			event.preventDefault();
			event.stopPropagation();
			if (openKey === key) {
				setMega(null);
			} else {
				setMega(key);
			}
		});
	});

	document.addEventListener('click', function (event) {
		if (!openKey) {
			return;
		}
		var target = event.target;
		if (!target) {
			return;
		}
		// Keep open when interacting with the active trigger or the panel itself
		var onTrigger = false;
		triggers.forEach(function (trigger) {
			if (trigger.contains(target)) {
				onTrigger = true;
			}
		});
		if (onTrigger) {
			return;
		}
		if (dropdown && dropdown.contains(target)) {
			return;
		}
		setMega(null);
	});

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape') {
			setMega(null);
		}
	});

	function openSearchOverlay(fromButton) {
		var overlay = document.querySelector('.blue-overlay.cs');
		if (!overlay) return;
		overlay.classList.add('open');
		if (typeof Utils !== 'undefined' && Utils.isPopHeigherThanViewport && Utils.isPopHeigherThanViewport(overlay)) {
			document.body.classList.add('noScroll');
		}

		var tabKey = fromButton && fromButton.getAttribute('data-search-tab');
		var tabMap = {
			kondygnacje: { target: '#filters-project-type' },
			powierzchnia: { target: '#filters-pow' },
			garaz: { target: '#filters-garaz' },
			szkieletowe: { target: '#filters-project-type', inputId: 'typ_projektu-szkieletowe' },
			dzialka: { target: '#filters-parcel' }
		};
		var spec = tabKey ? tabMap[tabKey] : null;
		var inputId = (fromButton && fromButton.getAttribute('data-search-input')) || (spec && spec.inputId) || '';
		var target = (fromButton && fromButton.getAttribute('data-search-target')) || (spec && spec.target) || '';

		function applyFocus() {
			if (window.ProjectSearchFilters) {
				if (target && ProjectSearchFilters.activateTab) {
					ProjectSearchFilters.activateTab(target);
				}
				if (inputId && ProjectSearchFilters.selectInput) {
					ProjectSearchFilters.selectInput(inputId);
				}
			}
			if (typeof ClickSearch !== 'undefined' && ClickSearch.getNumbers) {
				ClickSearch.getNumbers();
			}
		}

		requestAnimationFrame(function () {
			requestAnimationFrame(applyFocus);
		});
	}

	document.addEventListener('click', function (event) {
		var button = event.target.closest('.js-open-search');
		if (!button) return;
		openSearchOverlay(button);
	});

	var mobileToggle = document.getElementById('site-mobile-nav-toggle');
	var mobileNav = document.getElementById('site-mobile-nav');
	if (mobileToggle && mobileNav) {
		function setMobileNav(open) {
			mobileNav.classList.toggle('hidden', !open);
			if (open) {
				mobileNav.removeAttribute('hidden');
			} else {
				mobileNav.setAttribute('hidden', '');
			}
			mobileToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
			mobileToggle.setAttribute('aria-label', open ? 'Zamknij menu' : 'Otwórz menu');
			var iconOpen = mobileToggle.querySelector('.site-mobile-nav-icon-open');
			var iconClose = mobileToggle.querySelector('.site-mobile-nav-icon-close');
			if (iconOpen) iconOpen.classList.toggle('hidden', open);
			if (iconClose) iconClose.classList.toggle('hidden', !open);
			document.body.classList.toggle('site-mobile-nav-open', open);
		}
		mobileToggle.addEventListener('click', function () {
			setMobileNav(mobileNav.classList.contains('hidden'));
		});
		mobileNav.querySelectorAll('a, .login-trigger').forEach(function (el) {
			el.addEventListener('click', function () { setMobileNav(false); });
		});
		document.addEventListener('keydown', function (event) {
			if (event.key === 'Escape') setMobileNav(false);
		});
	}

	/* Legacy common.js toggles class "collapse" on body>header — strip it so
	   Tailwind .collapse (visibility:collapse) never hides #site-header. */
	(function stripLegacyCollapse() {
		function strip() {
			if (header.classList.contains('collapse')) {
				header.classList.remove('collapse');
			}
		}
		strip();
		if (typeof MutationObserver !== 'undefined') {
			new MutationObserver(strip).observe(header, {
				attributes: true,
				attributeFilter: ['class']
			});
		} else {
			setInterval(strip, 500);
		}
	})();
})();

<?php echo '</script'; ?>
>
<!-- New header END --><?php }
}
