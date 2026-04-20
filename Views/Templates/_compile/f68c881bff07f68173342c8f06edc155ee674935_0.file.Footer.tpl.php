<?php
/* Smarty version 3.1.48, created on 2026-08-24 11:10:18
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Layout/Footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a8c0a7a7606e9_89757543',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f68c881bff07f68173342c8f06edc155ee674935' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Layout/Footer.tpl',
      1 => 1787562442,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a8c0a7a7606e9_89757543 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/aronmaiden/studioatrium/studio-atrium/Vendors/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<div class="blue-overlay" id="ajax-info-overlay">
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
			<div class="space-y-1 footer-menu-col-a">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['footer_menus']->value['a'], 'link');
$_smarty_tpl->tpl_vars['link']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->do_else = false;
?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['url'];?>
" <?php if ($_smarty_tpl->tpl_vars['link']->value['target'] != '_self') {?> target="<?php echo $_smarty_tpl->tpl_vars['link']->value['target'];?>
" <?php }?>
						class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition"><?php echo $_smarty_tpl->tpl_vars['link']->value['label'];?>
</a>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<?php if ($_smarty_tpl->tpl_vars['social']->value['facebook'] || $_smarty_tpl->tpl_vars['social']->value['instagram'] || $_smarty_tpl->tpl_vars['social']->value['pinterest'] || $_smarty_tpl->tpl_vars['social']->value['youtube']) {?>
					<div class="flex items-center gap-3 pt-4">
						<?php if ($_smarty_tpl->tpl_vars['social']->value['facebook']) {?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['social']->value['facebook'];?>
" rel="nofollow" target="_blank"
								class="text-white hover:text-[var(--brand-blue)] transition" aria-label="Facebook">
								<svg fill="#ffffff" width="24" height="24" viewBox="0 0 1920 1920"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="m1416.013 791.915-30.91 225.617h-371.252v789.66H788.234v-789.66H449.808V791.915h338.426V585.137c0-286.871 176.207-472.329 449.09-472.329 116.87 0 189.744 6.205 231.822 11.845l-3.272 213.66-173.5.338c-4.737-.451-117.771-9.25-199.332 65.655-52.568 48.169-79.191 117.433-79.191 205.65v181.96h402.162Zm-247.276-304.018c44.446-41.401 113.71-36.889 118.787-36.663l289.467-.113 6.204-417.504-43.544-10.717C1511.675 16.02 1426.053 0 1237.324 0 901.268 0 675.425 235.206 675.425 585.137v93.97H337v451.234h338.425V1920h451.234v-789.66h356.7l61.932-451.233H1126.66v-69.152c0-54.937 14.214-96 42.078-122.058Z"
										fill-rule="evenodd" />
								</svg>
							</a>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['social']->value['instagram']) {?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['social']->value['instagram'];?>
" rel="nofollow" target="_blank"
								class="text-white hover:text-[var(--brand-blue)] transition" aria-label="Instagram">
								<svg fill="#ffffff" width="24" height="24" viewBox="0 0 24 24" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M12 7.90001C11.1891 7.90001 10.3964 8.14048 9.72218 8.59099C9.04794 9.0415 8.52243 9.68184 8.21211 10.431C7.90179 11.1802 7.8206 12.0046 7.9788 12.7999C8.13699 13.5952 8.52748 14.3258 9.10088 14.8992C9.67427 15.4725 10.4048 15.863 11.2001 16.0212C11.9955 16.1794 12.8198 16.0982 13.569 15.7879C14.3182 15.4776 14.9585 14.9521 15.409 14.2779C15.8596 13.6036 16.1 12.8109 16.1 12C16.1013 11.4612 15.9962 10.9275 15.7906 10.4295C15.585 9.93142 15.2831 9.47892 14.9021 9.09794C14.5211 8.71695 14.0686 8.415 13.5706 8.20942C13.0725 8.00385 12.5388 7.8987 12 7.90001ZM12 14.67C11.4719 14.67 10.9557 14.5134 10.5166 14.22C10.0776 13.9267 9.73534 13.5097 9.53326 13.0218C9.33117 12.5339 9.2783 11.9971 9.38132 11.4791C9.48434 10.9612 9.73863 10.4854 10.112 10.112C10.4854 9.73863 10.9612 9.48434 11.4791 9.38132C11.9971 9.2783 12.5339 9.33117 13.0218 9.53326C13.5097 9.73534 13.9267 10.0776 14.22 10.5166C14.5134 10.9557 14.67 11.4719 14.67 12C14.67 12.7081 14.3887 13.3873 13.888 13.888C13.3873 14.3887 12.7081 14.67 12 14.67ZM17.23 7.73001C17.23 7.9278 17.1714 8.12114 17.0615 8.28558C16.9516 8.45003 16.7954 8.57821 16.6127 8.65389C16.43 8.72958 16.2289 8.74938 16.0349 8.7108C15.8409 8.67221 15.6628 8.57697 15.5229 8.43712C15.3831 8.29727 15.2878 8.11909 15.2492 7.92511C15.2106 7.73112 15.2304 7.53006 15.3061 7.34733C15.3818 7.16461 15.51 7.00843 15.6744 6.89855C15.8389 6.78866 16.0322 6.73001 16.23 6.73001C16.4952 6.73001 16.7496 6.83537 16.9371 7.02291C17.1247 7.21044 17.23 7.4648 17.23 7.73001ZM19.94 8.73001C19.9691 7.48684 19.5054 6.28261 18.65 5.38001C17.7522 4.5137 16.5474 4.03897 15.3 4.06001C14 4.00001 10 4.00001 8.70001 4.06001C7.45722 4.0331 6.25379 4.49652 5.35001 5.35001C4.49465 6.25261 4.03093 7.45684 4.06001 8.70001C4.00001 10 4.00001 14 4.06001 15.3C4.03093 16.5432 4.49465 17.7474 5.35001 18.65C6.25379 19.5035 7.45722 19.9669 8.70001 19.94C10.02 20.02 13.98 20.02 15.3 19.94C16.5432 19.9691 17.7474 19.5054 18.65 18.65C19.5054 17.7474 19.9691 16.5432 19.94 15.3C20 14 20 10 19.94 8.70001V8.73001ZM18.24 16.73C18.1042 17.074 17.8993 17.3863 17.6378 17.6478C17.3763 17.9093 17.064 18.1142 16.72 18.25C15.1676 18.5639 13.5806 18.6715 12 18.57C10.4228 18.6716 8.83902 18.564 7.29001 18.25C6.94608 18.1142 6.63369 17.9093 6.37223 17.6478C6.11076 17.3863 5.90579 17.074 5.77001 16.73C5.35001 15.67 5.44001 13.17 5.44001 12.01C5.44001 10.85 5.35001 8.34001 5.77001 7.29001C5.90196 6.94268 6.10547 6.62698 6.36733 6.36339C6.62919 6.09981 6.94355 5.89423 7.29001 5.76001C8.83902 5.44599 10.4228 5.33839 12 5.44001C13.5806 5.33856 15.1676 5.44616 16.72 5.76001C17.064 5.89579 17.3763 6.10076 17.6378 6.36223C17.8993 6.62369 18.1042 6.93608 18.24 7.28001C18.66 8.34001 18.56 10.84 18.56 12C18.56 13.16 18.66 15.67 18.24 16.72V16.73Z" />
								</svg>
							</a>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['social']->value['pinterest']) {?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['social']->value['pinterest'];?>
" rel="nofollow" target="_blank"
								class="text-white hover:text-[var(--brand-blue)] transition" aria-label="Pinterest">
								<svg fill="#ffffff" width="24" height="24" viewBox="0 0 24 24"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M12 0C5.373 0 0 5.372 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.403.042-3.441.219-.937 1.407-5.965 1.407-5.965s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0z" />
								</svg>
							</a>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['social']->value['youtube']) {?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['social']->value['youtube'];?>
" rel="nofollow" target="_blank"
								class="text-white hover:text-[var(--brand-blue)] transition" aria-label="YouTube">
								<svg fill="#ffffff" width="24" height="24" viewBox="0 0 24 24"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
								</svg>
							</a>
						<?php }?>
					</div>
				<?php }?>
			</div>
			<div class="space-y-1 footer-menu-col-b">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['footer_menus']->value['b'], 'link');
$_smarty_tpl->tpl_vars['link']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->do_else = false;
?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['url'];?>
" <?php if ($_smarty_tpl->tpl_vars['link']->value['target'] != '_self') {?> target="<?php echo $_smarty_tpl->tpl_vars['link']->value['target'];?>
" <?php }?>
						class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition"><?php echo $_smarty_tpl->tpl_vars['link']->value['label'];?>
</a>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
			<div class="space-y-1 footer-menu-col-c">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['footer_menus']->value['c'], 'link');
$_smarty_tpl->tpl_vars['link']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->do_else = false;
?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['url'];?>
" <?php if ($_smarty_tpl->tpl_vars['link']->value['target'] != '_self') {?> target="<?php echo $_smarty_tpl->tpl_vars['link']->value['target'];?>
" <?php }?>
						class="block text-white text-[15px] font-bold hover:text-[var(--brand-blue)] transition"><?php echo $_smarty_tpl->tpl_vars['link']->value['label'];?>
</a>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
			<div class="space-y-3">
				<div class="text-white text-[15px] font-bold"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['contact']->value['header'])===null||$tmp==='' ? 'Kontakt' : $tmp);?>
</div>
				<?php if ($_smarty_tpl->tpl_vars['contact']->value['phone1']) {?>
					<a href="tel:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( $_smarty_tpl->tpl_vars['contact']->value['phone1'],' ','' ));?>
"
						class="block text-[var(--brand-red)] font-black text-[28px] leading-tight"><?php echo $_smarty_tpl->tpl_vars['contact']->value['phone1'];?>
</a>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['contact']->value['phone2']) {?>
					<a href="tel:<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( $_smarty_tpl->tpl_vars['contact']->value['phone2'],' ','' ));?>
"
						class="block text-[var(--brand-red)] font-black text-[28px] leading-tight"><?php echo $_smarty_tpl->tpl_vars['contact']->value['phone2'];?>
</a>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['contact']->value['extra_phones']) {?>
					<div class="text-[var(--brand-red)] text-[13px] font-bold"><?php echo $_smarty_tpl->tpl_vars['contact']->value['extra_phones'];?>
</div>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['contact']->value['email']) {?>
					<a href="mailto:<?php echo $_smarty_tpl->tpl_vars['contact']->value['email'];?>
"
						class="block text-white font-black text-[24px] pt-3 hover:text-[var(--brand-blue)]"><?php echo $_smarty_tpl->tpl_vars['contact']->value['email'];?>
</a>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['contact']->value['details']) {?>
					<div class="text-white text-[14px] font-bold pt-3 leading-relaxed"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'nl2br' ][ 0 ], array( $_smarty_tpl->tpl_vars['contact']->value['details'] ));?>
</div>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['contact']->value['map_url']) {?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['contact']->value['map_url'];?>
"
						class="text-[var(--brand-blue)] text-[14px] underline"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['contact']->value['map_text'])===null||$tmp==='' ? 'zobacz dojazd' : $tmp);?>
</a>
				<?php }?>
			</div>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['seo_links_header']->value || $_smarty_tpl->tpl_vars['seo_links']->value) {?>
			<div class="mt-16">
				<h3 class="text-white font-black text-[15px] tracking-wide mb-4"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['seo_links_header']->value, ENT_QUOTES, 'UTF-8', true);?>
</h3>
				<div class="grid grid-cols-3 sm:grid-cols-5 lg:grid-cols-7 gap-x-6 gap-y-1 text-[12px]">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['seo_links']->value, 'sl');
$_smarty_tpl->tpl_vars['sl']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['sl']->value) {
$_smarty_tpl->tpl_vars['sl']->do_else = false;
?>
						<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sl']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"
							class="text-white/85 hover:text-[var(--brand-blue)] truncate"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sl']->value['label'], ENT_QUOTES, 'UTF-8', true);?>
</a>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div>
			</div>
		<?php }?>
	</div>
</footer>

<!-- Wyszukiwarka projektów -->
<div class="project-search-overlay">
<div class="blue-overlay cs">
	<div id="cs-wrapper">
		<div class="search-header">
			<h2 id="filter-header">Znajdź idealny projekt</h2>
			<form method="get" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'search'),$_smarty_tpl ) );?>
" id="search-form">
				<div id="search-project">
					<label for="search-name" class="black search-label">Wpisz nazwę projektu</label>
					<div class="search-input-wrapper">
						<input type="text" name="query" id="search-name" class="long">
						<input type="submit" id="search-name-submit" value="Wyszukaj" class="baton disabled" disabled>
						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'varia','action'=>'project_helper'),$_smarty_tpl ) );?>
" class="wired help">Pomoc</a>
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
					<?php if ($_smarty_tpl->tpl_vars['csCategory']->value) {?>
					<li class="half-spaced">
						<p class="head">kategoria:</p>
						<ul>
							<li>
								<input type="checkbox" id="cs-category" name="kategoria" value="<?php echo $_smarty_tpl->tpl_vars['csCategory']->value;?>
" checked><label for="cs-category"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
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
" value="1" checked><label for="<?php echo $_smarty_tpl->tpl_vars['csTag']->value['id'];?>
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
" value="<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['value'];?>
" checked><label for="<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['value'];?>
"><?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['name'];?>
 : <?php echo (($tmp = @$_smarty_tpl->tpl_vars['csValueNames']->value[$_smarty_tpl->tpl_vars['csTagSelect']->value['value']])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['csTagSelect']->value['value'] : $tmp);?>
</label> <span class="count" id="<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['csTagSelect']->value['value'];?>
-count">(0)</span>
							</li>
						</ul>
					</li>
					<?php }?>
				
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

												<?php if ($_smarty_tpl->tpl_vars['csCustomCategory']->value) {?>
							<label class="custom-radio" for="typ_projektu-<?php echo $_smarty_tpl->tpl_vars['csCustomCategory']->value;?>
">
								<input
								type="radio"
								name="typ_projektu"
								id="typ_projektu-<?php echo $_smarty_tpl->tpl_vars['csCustomCategory']->value;?>
"
								value="<?php echo $_smarty_tpl->tpl_vars['csCustomCategory']->value;?>
"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == $_smarty_tpl->tpl_vars['csCustomCategory']->value || $_smarty_tpl->tpl_vars['csType']->value == $_smarty_tpl->tpl_vars['csCustomCategory']->value) {?> checked<?php }?>>
								<span><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['category']->value['name'],16,"...",true);?>
 <span class="count" id="typ_projektu-<?php echo $_smarty_tpl->tpl_vars['csCustomCategory']->value;?>
-count">(0)</span></span>
							</label>
						<?php }?>

						<label for="typ_projektu-bez_garazu" class="custom-radio">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-bez_garazu" value="bez_garazu"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'bez_garazu' || $_smarty_tpl->tpl_vars['csType']->value == 'bez_garazu') {?> checked<?php }?>>
							<span>Bez garażu <span class="count" id="typ_projektu-bez_garazu-count">(0)</span></span>
						</label>

						<label for="typ_projektu-beskidzkie" class="custom-radio">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-beskidzkie" value="beskidzkie"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'beskidzkie' || $_smarty_tpl->tpl_vars['csType']->value == 'beskidzkie') {?> checked<?php }?>>
							<span>Beskidzkie <span class="count" id="typ_projektu-beskidzkie-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-blizniacze">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-blizniacze" value="blizniacze"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'blizniacze' || $_smarty_tpl->tpl_vars['csType']->value == 'blizniacze') {?> checked<?php }?>>
							<span>Bliźniacze <span class="count" id="typ_projektu-blizniacze-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-dla_rodziny_2plus2">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-dla_rodziny_2plus2" value="dla_rodziny_2+2"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'dla_rodziny_2+2' || $_smarty_tpl->tpl_vars['csType']->value == 'dla_rodziny_2+2') {?> checked<?php }?>>
							<span>Dla rodziny 2+2 <span class="count" id="typ_projektu-dla_rodziny_2plus2-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-dla_rodziny_2plus3">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-dla_rodziny_2plus3" value="dla_rodziny_2+3"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'dla_rodziny_2+3' || $_smarty_tpl->tpl_vars['csType']->value == 'dla_rodziny_2+3') {?> checked<?php }?>>
							<span>Dla rodziny 2+3 <span class="count" id="typ_projektu-dla_rodziny_2plus3-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-dwulokalowe">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-dwulokalowe" value="dwulokalowe"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'dwulokalowe' || $_smarty_tpl->tpl_vars['csType']->value == 'dwulokalowe') {?> checked<?php }?>>
							<span>Dwulokalowe <span class="count" id="typ_projektu-dwulokalowe-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-male_do_70m2">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-male_do_70m2" value="male_do_70m2"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'male_do_70m2' || $_smarty_tpl->tpl_vars['csType']->value == 'male_do_70m2') {?> checked<?php }?>>
							<span>Małe do 70m2 <span class="count" id="typ_projektu-male_do_70m2-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-na_skarpe">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-na_skarpe" value="na_skarpe"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'na_skarpe' || $_smarty_tpl->tpl_vars['csType']->value == 'na_skarpe') {?> checked<?php }?>>
							<span>Na skarpę <span class="count" id="typ_projektu-na_skarpe-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-na_waska_dzialke">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-na_waska_dzialke" value="na_waska_dzialke"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'na_waska_dzialke' || $_smarty_tpl->tpl_vars['csType']->value == 'na_waska_dzialke') {?> checked<?php }?>>
							<span>Na wąską działkę <span class="count" id="typ_projektu-na_waska_dzialke-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-nowoczesna_stodola">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-nowoczesna_stodola" value="nowoczesna_stodola"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'nowoczesna_stodola' || $_smarty_tpl->tpl_vars['csType']->value == 'nowoczesna_stodola') {?> checked<?php }?>>
							<span>Nowoczesna stodoła <span class="count" id="typ_projektu-nowoczesna_stodola-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-nowoczesne">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-nowoczesne" value="nowoczesne"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'nowoczesne' || $_smarty_tpl->tpl_vars['csType']->value == 'nowoczesne') {?> checked<?php }?>>
							<span>Nowoczesne <span class="count" id="typ_projektu-nowoczesne-count">(0)</span></span>
						</label>

						<label for="typ_projektu-parterowe" class="custom-radio">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-parterowe" value="parterowe"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'parterowe' || $_smarty_tpl->tpl_vars['csType']->value == 'parterowe') {?> checked<?php }?>>
							<span>Parterowe <span class="count" id="typ_projektu-parterowe-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-pietrowe">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-pietrowe" value="pietrowe"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'pietrowe' || $_smarty_tpl->tpl_vars['csType']->value == 'pietrowe') {?> checked<?php }?>>
							<span>Piętrowe <span class="count" id="typ_projektu-pietrowe-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-rezydencje">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-rezydencje" value="rezydencje"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'rezydencje' || $_smarty_tpl->tpl_vars['csType']->value == 'rezydencje') {?> checked<?php }?>>
							<span>Rezydencje <span class="count" id="typ_projektu-rezydencje-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-szkieletowe">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-szkieletowe" value="szkieletowe"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'szkieletowe' || $_smarty_tpl->tpl_vars['csType']->value == 'szkieletowe') {?> checked<?php }?>>
							<span>Szkieletowe <span class="count" id="typ_projektu-szkieletowe-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-z_garazem">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-z_garazem" value="z_garazem"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'z_garazem' || $_smarty_tpl->tpl_vars['csType']->value == 'z_garazem') {?> checked<?php }?>>
							<span>Z garażem <span class="count" id="typ_projektu-z_garazem-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-z_plaskim_dachem">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-z_plaskim_dachem" value="z_plaskim_dachem"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'z_plaskim_dachem' || $_smarty_tpl->tpl_vars['csType']->value == 'z_plaskim_dachem') {?> checked<?php }?>>
							<span>Z płaskim dachem <span class="count" id="typ_projektu-z_plaskim_dachem-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-z_poddaszem">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-z_poddaszem" value="z_poddaszem"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'z_poddaszem' || $_smarty_tpl->tpl_vars['csType']->value == 'z_poddaszem') {?> checked<?php }?>>
							<span>Z poddaszem <span class="count" id="typ_projektu-z_poddaszem-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="typ_projektu-z_poddaszem_do_adaptacji">
							<input type="radio" name="typ_projektu"
								id="typ_projektu-z_poddaszem_do_adaptacji" value="z_poddaszem_do_adaptacji"
								<?php if ($_smarty_tpl->tpl_vars['request']->value['typ_projektu'] == 'z_poddaszem_do_adaptacji' || $_smarty_tpl->tpl_vars['csType']->value == 'z_poddaszem_do_adaptacji') {?> checked<?php }?>>
							<span>Z poddaszem do adaptacji <span class="count" id="typ_projektu-z_poddaszem_do_adaptacji-count">(0)</span></span>
						</label>
					</div>

					<div id="filters-roof" class="filter-tab radio-group">
						<h3 class="filter-header">Typ dachu</h3>

						<label class="custom-radio" for="54-dwuspadowy">
							<input type="radio" name="typdachu" id="54-dwuspadowy" value="dwuspadowy"
							<?php if ($_smarty_tpl->tpl_vars['request']->value['typdachu'] == 'dwuspadowy') {?> checked<?php }?>>
							<span>dwuspadowy <span class="count" id="54-dwuspadowy-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="54-mansardowy">
							<input type="radio" name="typdachu" id="54-mansardowy" value="mansardowy"
							<?php if ($_smarty_tpl->tpl_vars['request']->value['typdachu'] == 'mansardowy') {?> checked<?php }?>>
							<span>mansardowy <span class="count" id="54-mansardowy-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="54-stropodach">
							<input type="radio" name="typdachu" id="54-stropodach" value="stropodach"
							<?php if ($_smarty_tpl->tpl_vars['request']->value['typdachu'] == 'stropodach') {?> checked<?php }?>>
							<span>płaski <span class="count" id="54-stropodach-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="54-stozkowy">
							<input type="radio" name="typdachu" id="54-stozkowy" value="stozkowy"
							<?php if ($_smarty_tpl->tpl_vars['request']->value['typdachu'] == 'stozkowy') {?> checked<?php }?>>
							<span>stożkowy <span class="count" id="54-stozkowy-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="54-wielospadowy">
							<input type="radio" name="typdachu" id="54-wielospadowy" value="wielospadowy"
							<?php if ($_smarty_tpl->tpl_vars['request']->value['typdachu'] == 'wielospadowy') {?> checked<?php }?>>
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
								<input type="text" name="pow_min" id="pow-min" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_min'];?>
" placeholder="od">
								<span class="unit">m²</span>
							</div>
							<div class="input-unit">
								<input type="text" name="pow_max" id="pow-max" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_max'];?>
" placeholder="do">
								<span class="unit">m²</span>
							</div>
						</div>

						<h3 class="filter-header inner-filter-header">Powierzchnia zabudowy</h3>
						<div class="area-inputs">
							<div class="input-unit">
								<input type="text" name="pow_zab_min" id="pow-zab-min" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_zab_min'];?>
" placeholder="od">
								<span class="unit">m²</span>
							</div>
							<div class="input-unit">
								<input type="text" name="pow_zab_max" id="pow-zab-max" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_zab_max'];?>
" placeholder="do">
								<span class="unit">m²</span>
							</div>
						</div>

						<h3 class="filter-header inner-filter-header">Powierzchnia całkowita</h3>
						<div class="area-inputs">
							<div class="input-unit">
								<input type="text" name="pow_total_min" id="pow-total-min" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_total_min'];?>
" placeholder="od">
								<span class="unit">m²</span>
							</div>
							<div class="input-unit">
								<input type="text" name="pow_total_max" id="pow-total-max" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['pow_total_max'];?>
" placeholder="do">
								<span class="unit">m²</span>
							</div>
						</div>
					</div>

					<div id="filters-parcel" class="filter-tab">
						<h3 class="filter-header">Szerokość działki</h3>
						<div class="area-inputs">
							<div class="input-unit">
							<input type="text" name="dzialka_szer" id="parcel-width" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['dzialka_szer'];?>
">
							<span class="unit">m</span>
							</div>
						</div>

						<h3 class="filter-header inner-filter-header">Długość działki</h3>
						<div class="area-inputs">
							<div class="input-unit">
							<input type="text" name="dzialka_dl" id="parcel-height" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['dzialka_dl'];?>
">
							<span class="unit">m</span>
							</div>
						</div>
					</div>

					<div id="filters-front-width" class="filter-tab">
						<h3 class="filter-header">Maks. szerokość elewacji frontowej</h3>
						<div class="area-inputs">
							<div class="input-unit">
							<input type="text" name="front_szer" id="front-width" value="<?php echo $_smarty_tpl->tpl_vars['request']->value['front_szer'];?>
">
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
								<input type="radio" name="iloscpokoinaparterze" id="69-1" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaparterze'] == 1) {?> checked<?php }?>>
								<span>1 <span class="count" id="69-1-count">(0)</span></span>
							</label>
							<label class="chip" for="69-2">
								<input type="radio" name="iloscpokoinaparterze" id="69-2" value="2" <?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaparterze'] == 2) {?> checked<?php }?>>
								<span>2 <span class="count" id="69-2-count">(0)</span></span>
							</label>
							<label class="chip" for="69-3">
								<input type="radio" name="iloscpokoinaparterze" id="69-3" value="3" <?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaparterze'] == 3) {?> checked<?php }?>>
								<span>3 <span class="count" id="69-3-count">(0)</span></span>
							</label>
							<label class="chip" for="69-4">
								<input type="radio" name="iloscpokoinaparterze" id="69-4" value="4" <?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaparterze'] == 4) {?> checked<?php }?>>
								<span>4 <span class="count" id="69-4-count">(0)</span></span>
							</label>
							<label class="chip" for="69-5">
								<input type="radio" name="iloscpokoinaparterze" id="69-5" value="5" <?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaparterze'] == 5) {?> checked<?php }?>>
								<span>5 <span class="count" id="69-5-count">(0)</span></span>
							</label>
							<!-- <label class="chip" for="69-5plus">
								<input type="radio" name="iloscpokoinaparterze" id="69-5plus" value="5+">
								<span>5+ <span class="count" id="69-5plus-count">(0)</span></span>
							</label> -->
							<label class="chip chip-ghost" for="69-0">
								<input type="radio" name="iloscpokoinaparterze" id="69-0" value="-1" checked <?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaparterze'] == -1) {?> checked<?php }?>>
								<span>Dowolna</span>
							</label>
							</div>
						</div>

						<!-- Piętro -->
						<div id="roomsFloor" class="rooms-box">
							<p class="head">Pokoje: piętro</p>
							<div class="chips">
							<label class="chip" for="71-1">
								<input type="radio" name="iloscpokoinaiikondygnacji" id="71-1" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaiikondygnacji'] == 1) {?> checked<?php }?>>
								<span>1 <span class="count" id="71-1-count">(0)</span></span>
							</label>
							<label class="chip" for="71-2">
								<input type="radio" name="iloscpokoinaiikondygnacji" id="71-2" value="2" <?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaiikondygnacji'] == 2) {?> checked<?php }?>>
								<span>2 <span class="count" id="71-2-count">(0)</span></span>
							</label>
							<label class="chip" for="71-3">
								<input type="radio" name="iloscpokoinaiikondygnacji" id="71-3" value="3" <?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaiikondygnacji'] == 3) {?> checked<?php }?>>
								<span>3 <span class="count" id="71-3-count">(0)</span></span>
							</label>
							<label class="chip" for="71-4">
								<input type="radio" name="iloscpokoinaiikondygnacji" id="71-4" value="4" <?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaiikondygnacji'] == 4) {?> checked<?php }?>>
								<span>4 <span class="count" id="71-4-count">(0)</span></span>
							</label>
							<label class="chip" for="71-5">
								<input type="radio" name="iloscpokoinaiikondygnacji" id="71-5" value="5" <?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaiikondygnacji'] == 5) {?> checked<?php }?>>
								<span>5 <span class="count" id="71-5-count">(0)</span></span>
							</label>
							<!-- <label class="chip" for="71-5plus">
								<input type="radio" name="iloscpokoinaiikondygnacji" id="71-5plus" value="5+">
								<span>5+ <span class="count" id="71-5plus-count">(0)</span></span>
							</label> -->
							<label class="chip chip-ghost" for="71-0">
								<input type="radio" name="iloscpokoinaiikondygnacji" id="71-0" value="-1" checked <?php if ($_smarty_tpl->tpl_vars['request']->value['iloscpokoinaiikondygnacji'] == -1) {?> checked<?php }?>>
								<span>Dowolna</span>
							</label>
							</div>
						</div>
					</div>

					<div id="filters-height" class="filter-tab radio-group">
						<h3 class="filter-header">Maks. wysokość budynku</h3>

						<label class="custom-radio" for="26-1">
							<input type="radio" name="wysokoscbudynku" id="26-1" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 1) {?> checked<?php }?>>
							<span>do 6 m <span class="count" id="26-1-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="26-2">
							<input type="radio" name="wysokoscbudynku" id="26-2" value="2" <?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 2) {?> checked<?php }?>>
							<span>od 6 m do 7 m <span class="count" id="26-2-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="26-3">
							<input type="radio" name="wysokoscbudynku" id="26-3" value="3" <?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 3) {?> checked<?php }?>>
							<span>od 7 m do 8 m <span class="count" id="26-3-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="26-4">
							<input type="radio" name="wysokoscbudynku" id="26-4" value="4" <?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 4) {?> checked<?php }?>>
							<span>od 8 m do 9 m <span class="count" id="26-4-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="26-5">
							<input type="radio" name="wysokoscbudynku" id="26-5" value="5" <?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 5) {?> checked<?php }?>>
							<span>od 9 m do 10 m <span class="count" id="26-5-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="26-6">
							<input type="radio" name="wysokoscbudynku" id="26-6" value="6" <?php if ($_smarty_tpl->tpl_vars['request']->value['wysokoscbudynku'] == 6) {?> checked<?php }?>>
							<span>powyżej 10 m <span class="count" id="26-6-count">(0)</span></span>
						</label>
					</div>

					<div id="filters-roof-angle" class="filter-tab radio-group">
						<h3 class="filter-header">Kąt nachylenia dachu</h3>

						<label class="custom-radio" for="27-1">
							<input type="radio" name="katnachyleniadachu" id="27-1" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['katnachyleniadachu'] == 1) {?> checked<?php }?>>
							<span>do 30&deg; <span class="count" id="27-1-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="27-2">
							<input type="radio" name="katnachyleniadachu" id="27-2" value="2" <?php if ($_smarty_tpl->tpl_vars['request']->value['katnachyleniadachu'] == 2) {?> checked<?php }?>>
							<span>30&deg; do 35&deg; <span class="count" id="27-2-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="27-3">
							<input type="radio" name="katnachyleniadachu" id="27-3" value="3" <?php if ($_smarty_tpl->tpl_vars['request']->value['katnachyleniadachu'] == 3) {?> checked<?php }?>>
							<span>35&deg; do 40&deg; <span class="count" id="27-3-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="27-4">
							<input type="radio" name="katnachyleniadachu" id="27-4" value="4" <?php if ($_smarty_tpl->tpl_vars['request']->value['katnachyleniadachu'] == 4) {?> checked<?php }?>>
							<span>40&deg; do 45&deg; <span class="count" id="27-4-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="27-5">
							<input type="radio" name="katnachyleniadachu" id="27-5" value="5" <?php if ($_smarty_tpl->tpl_vars['request']->value['katnachyleniadachu'] == 5) {?> checked<?php }?>>
							<span>45&deg; i więcej <span class="count" id="27-5-count">(0)</span></span>
						</label>
					</div>

					<div id="filters-strop" class="filter-tab radio-group">
						<h3 class="filter-header">Strop nad parterem</h3>

						<label class="custom-radio" for="28-lekki">
							<input type="radio" name="rodzajstropu" id="28-lekki" value="lekki" <?php if ($_smarty_tpl->tpl_vars['request']->value['rodzajstropu'] == 'lekki') {?> checked<?php }?>>
							<span>lekki <span class="count" id="28-lekki-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="28-gestozebrowy">
							<input type="radio" name="rodzajstropu" id="28-gestozebrowy" value="gestozebrowy" <?php if ($_smarty_tpl->tpl_vars['request']->value['rodzajstropu'] == 'gestozebrowy') {?> checked<?php }?>>
							<span>gęstożebrowy <span class="count" id="28-gestozebrowy-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="28-plyta_zelbetowa">
							<input type="radio" name="rodzajstropu" id="28-plyta_zelbetowa" value="plyta_zelbetowa" <?php if ($_smarty_tpl->tpl_vars['request']->value['rodzajstropu'] == 'plyta_zelbetowa') {?> checked<?php }?>>
							<span>płyta żelbetowa <span class="count" id="28-plyta_zelbetowa-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="28-drewniany_belkowy">
							<input type="radio" name="rodzajstropu" id="28-drewniany_belkowy" value="drewniany_belkowy" <?php if ($_smarty_tpl->tpl_vars['request']->value['rodzajstropu'] == 'drewniany_belkowy') {?> checked<?php }?>>
							<span>drewniany belkowy <span class="count" id="28-drewniany_belkowy-count">(0)</span></span>
						</label>
					</div>

					<div id="filters-kalenica" class="filter-tab radio-group">
						<h3 class="filter-header">Kalenica</h3>

						<label class="custom-radio" for="103-rownolegla_do_drogi">
							<input type="radio" name="kalenica" id="103-rownolegla_do_drogi" value="rownolegla_do_drogi" <?php if ($_smarty_tpl->tpl_vars['request']->value['kalenica'] == 'rownolegla_do_drogi') {?> checked<?php }?>>
							<span>równoległa do drogi <span class="count" id="103-rownolegla_do_drogi-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="103-prostopadla_do_drogi">
							<input type="radio" name="kalenica" id="103-prostopadla_do_drogi" value="prostopadla_do_drogi" <?php if ($_smarty_tpl->tpl_vars['request']->value['kalenica'] == 'prostopadla_do_drogi') {?> checked<?php }?>>
							<span>prostopadła do drogi <span class="count" id="103-prostopadla_do_drogi-count">(0)</span></span>
						</label>

						<label class="custom-radio" for="103-brak">
							<input type="radio" name="kalenica" id="103-brak" value="brak" <?php if ($_smarty_tpl->tpl_vars['request']->value['kalenica'] == 'brak') {?> checked<?php }?>>
							<span>brak <span class="count" id="103-brak-count">(0)</span></span>
						</label>
					</div>

					<div id="filters-dodatkowe" class="filter-tab">
						<h3 class="filter-header">Dodatkowe udogodnienia</h3>

						<div class="chips">
							<label class="chk" for="104-1">
								<input type="checkbox" id="104-1" name="balkon" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['balkon']) {?> checked<?php }?>>
								<span>Balkon <span class="count" id="104-1-count">(0)</span></span>
							</label>

							<label class="chk" for="c18-1">
								<input type="checkbox" id="c18-1" name="duza_kotlownia" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['duza_kotlownia']) {?> checked<?php }?>>
								<span>Duża kotłownia <span class="count" id="c18-1-count">(0)</span></span>
							</label>

							<label class="chk" for="57-1">
								<input type="checkbox" id="57-1" name="garderoba" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['garderoba']) {?> checked<?php }?>>
								<span>Garderoba <span class="count" id="57-1-count">(0)</span></span>
							</label>

							<label class="chk" for="c19-1">
								<input type="checkbox" id="c19-1" name="kotlownia" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['kotlownia']) {?> checked<?php }?>>
								<span>Kotłownia na paliwo stałe <span class="count" id="c19-1-count">(0)</span></span>
							</label>

							<label class="chk" for="59-1">
								<input type="checkbox" id="59-1" name="kuchniaodfrontu" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['kuchniaodfrontu']) {?> checked<?php }?>>
								<span>Kuchnia od frontu <span class="count" id="59-1-count">(0)</span></span>
							</label>

							<label class="chk" for="60-1">
								<input type="checkbox" id="60-1" name="kuchniaodogrodu" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['kuchniaodogrodu']) {?> checked<?php }?>>
								<span>Kuchnia od ogrodu <span class="count" id="60-1-count">(0)</span></span>
							</label>

							<label class="chk" for="105-1">
								<input type="checkbox" id="105-1" name="lukarna" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['lukarna']) {?> checked<?php }?>>
								<span>Lukarna <span class="count" id="105-1-count">(0)</span></span>
							</label>

							<label class="chk" for="113-1">
								<input type="checkbox" id="113-1" name="masterbedroom" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['masterbedroom']) {?> checked<?php }?>>
								<span>Master bedroom <span class="count" id="113-1-count">(0)</span></span>
							</label>

							<label class="chk" for="c26-1">
								<input type="checkbox" id="c26-1" name="od_poludnia" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['od_poludnia']) {?> checked<?php }?>>
								<span>Wjazd od południa <span class="count" id="c26-1-count">(0)</span></span>
							</label>

							<label class="chk" for="94-1">
								<input type="checkbox" id="94-1" name="antresola" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['antresola']) {?> checked<?php }?>>
								<span>Otwarta przestrzeń <span class="count" id="94-1-count">(0)</span></span>
							</label>

							<label class="chk" for="119-1">
								<input type="checkbox" id="119-1" name="osobnewc" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['osobnewc']) {?> checked<?php }?>>
								<span>Osobne w.c. <span class="count" id="119-1-count">(0)</span></span>
							</label>

							<label class="chk" for="96-1">
								<input type="checkbox" id="96-1" name="pralnia" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['pralnia']) {?> checked<?php }?>>
								<span>Pralnia <span class="count" id="96-1-count">(0)</span></span>
							</label>

							<label class="chk" for="65-1">
							<input type="checkbox" id="65-1" name="spizarnia" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['spizarnia']) {?> checked<?php }?>>
							<span>Spiżarnia <span class="count" id="65-1-count">(0)</span></span>
							</label>

							<label class="chk" for="47-1">
								<input type="checkbox" id="47-1" name="wiatagarazowa" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['wiatagarazowa']) {?> checked<?php }?>>
								<span>Wiata <span class="count" id="47-1-count">(0)</span></span>
							</label>

							<label class="chk" for="c30-1">
								<input type="checkbox" id="c30-1" name="zantresola" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['zantresola']) {?> checked<?php }?>>
								<span>Z antresolą <span class="count" id="c30-1-count">(0)</span></span>
							</label>

							<label class="chk" for="c31-1">
								<input type="checkbox" id="c31-1" name="zestrychem" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['zestrychem']) {?> checked<?php }?>>
								<span>Ze strychem <span class="count" id="c31-1-count">(0)</span></span>
							</label>

							<label class="chk" for="67-1">
								<input type="checkbox" id="67-1" name="zadaszonytaras" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['zadaszonytaras']) {?> checked<?php }?>>
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
								<input type="radio" id="78-1" name="garaz" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['garaz'] == 1) {?> checked<?php }?>>
								<span>1 stanowisko <span class="count" id="78-1-count">(0)</span></span>
							</label>

							<label class="chk" for="78-2">
								<input type="radio" id="78-2" name="garaz" value="2" <?php if ($_smarty_tpl->tpl_vars['request']->value['garaz'] == 2) {?> checked<?php }?>>
								<span>2 i więcej <span class="count" id="78-2-count">(0)</span></span>
							</label>

							<label class="chk" for="78-3">
								<input type="radio" id="78-3" name="garaz" value="3" <?php if ($_smarty_tpl->tpl_vars['request']->value['garaz'] == 3) {?> checked<?php }?>>
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
								<input type="radio" id="2-1" name="piwnica" value="1" <?php if ($_smarty_tpl->tpl_vars['request']->value['piwnica'] == 1) {?> checked<?php }?>>
								<span>tak <span class="count" id="2-1-count">(0)</span></span>
							</label>

							<label class="chk" for="2-2">
								<input type="radio" id="2-2" name="piwnica" value="2" <?php if ($_smarty_tpl->tpl_vars['request']->value['piwnica'] == 2) {?> checked<?php }?>>
								<span>nie <span class="count" id="2-2-count">(0)</span></span>
							</label>
						</div>
					</div>

					<div id="filters-kolekcje" class="filter-tab radio-group">
						<h3 class="filter-header">Kolekcje</h3>

						<label class="custom-radio" for="kolekcje-sardynia">
							<input type="radio" name="kolekcje" id="kolekcje-sardynia" value="sardynia" <?php if ($_smarty_tpl->tpl_vars['request']->value['kolekcje'] == 'sardynia') {?> checked<?php }?>>
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
<?php echo '<script'; ?>
 src="/js/filters.js?v=<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
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
