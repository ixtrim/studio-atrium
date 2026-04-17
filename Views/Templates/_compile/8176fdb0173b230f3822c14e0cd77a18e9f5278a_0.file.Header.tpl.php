<?php
/* Smarty version 4.5.6, created on 2026-05-26 15:24:07
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Layout/Header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_6a159ef75c3f01_68255509',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8176fdb0173b230f3822c14e0cd77a18e9f5278a' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Layout/Header.tpl',
      1 => 1779792319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a159ef75c3f01_68255509 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
	<nav id="nav">
		<ul>
			<li class="logo">
				<p id="mobile-trigger" class="trigger"><span>Menu</span></p>
				<a href="/">
					<img src="/img/logo.png" alt="Studio Atrium" class="visible" id="logo" style="display: none;">
				</a>
			</li>
			<li>
				<ul class="nav" id="nav-links">
					<li><a href="/" id="project-menu-trigger" class="trigger">Projekty domów</a></li>
					<li><a href="/projekty-garazy/" id="garage-menu-trigger" class="trigger">Garaże i inne</a></li>
					<li><a href="javascript:" id="knowledge-menu-trigger" class="trigger">Baza wiedzy</a></li>
					<li><a href="/kontakt/" class="on">Kontakt</a></li>
				</ul>
			</li>
			<li>
				<ul class="tooltip-box" id="tooltip-box" style="display: none;">
					<li>
						<a class="tooltip<?php if (!$_smarty_tpl->tpl_vars['user']->value) {?> consultant<?php }?>" href="<?php if ($_smarty_tpl->tpl_vars['user']->value) {
if ($_smarty_tpl->tpl_vars['project']->value) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'panel','action'=>'message','project_id'=>$_smarty_tpl->tpl_vars['project']->value['id']),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'panel','action'=>'message'),$_smarty_tpl ) );
}
} else { ?>javascript:<?php }?>">
							<img src="/img/consultant.webp" alt="Studio Atrium - zapytaj o projekt domu" width="60" height="60">
						
							<span class="tooltip-content">
								<span class="tooltip-front">
									<span>Zadaj</span><span>pytanie</span>
								</span>
							</span>
						</a>
					</li>
					<li>
						<a href="tel:+48338229496" class="hilite" rel="nofollow">33 822 94 96</a>
						<a href="tel:+48602303160" class="hilite" rel="nofollow">602 303 160</a>
						<p class="hours">pn-pt 8:00-17:00</p>
					</li>
					<li id="search">
						<div>
							<span>Wyszukiwarka</span>
							<p>Znajdź projekt</p>
						</div>
					</li>
				</ul>
			</li>
		</ul>
	</nav>
	<div id="menu-wrapper">
		<div>
			<ul class="menu-box expandable" id="tools-menu" style="display: none;">
				<li class="full flexed">
					<ul class="menu-icon">
					<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
						<li>
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'panel','action'=>'account'),$_smarty_tpl ) );?>
" class="account">Konto</a>
						</li>
					<?php } else { ?>
						<li>
							<a href="javascript:" class="login-trigger account" id="mobile-trigger-account">Konto</a>
						</li>
					<?php }?>
					
						<li>
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'favourite','action'=>'list'),$_smarty_tpl ) );?>
" class="favourite">Ulubione</a>
						</li>
						
						<li>
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'favourite','action'=>'compare'),$_smarty_tpl ) );?>
" class="compare">Porównaj</a>
						</li>
					
						<li<?php if (!$_smarty_tpl->tpl_vars['basket']->value) {?> style="display: none;"<?php }?> id="menu-basket-trigger">
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'order','action'=>'cart'),$_smarty_tpl ) );?>
" class="basket">Koszyk</a>
						</li>
					</ul>
					<ul class="menu-icon">
						<li class="letter"><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'forum'),$_smarty_tpl ) );?>
" class="forum">Forum</a></li>
						<li class="letter"><a href="/baza-wiedzy/">Baza wiedzy</a></li>
						<li class="letter"><a href="/kontakt/" class="contact">Kontakt</a></li>
					</ul>	
				</li>
			</ul>
		
			<ul class="menu-box expandable" id="project-menu" style="display: none;">
				<li>
					<ul class="menu-step">
						<li class="base">
							<ul class="menu-base">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['siteMenu']->value['house'], '_item');
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
?>
								<?php if ($_smarty_tpl->tpl_vars['_item']->value['menu_position'] == 1 && $_smarty_tpl->tpl_vars['_item']->value['is_highlight']) {?>
									<li>
										<a href="/<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];
if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strpos' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['link'],'.html' )) === false) {?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</a>
									</li>
								<?php }?>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								<li class="catalog-box"><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'catalog','action'=>'form'),$_smarty_tpl ) );?>
"><img src="/img/catalogue.webp" alt="Katalog projektów domów"></a></li>
								<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'catalog','action'=>'form'),$_smarty_tpl ) );?>
" class="framed">Zamów bezpłatny katalog</a></li>
								<li class="play">
									<a href='https://play.google.com/store/apps/details?id=pl.studioatrium.studioatrium&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img alt='Pobierz z Google Play' src='https://play.google.com/intl/en_us/badges/images/generic/pl_badge_web_generic.png'/></a>
								</li>
															</ul>
						</li>
				
						<?php
$_smarty_tpl->tpl_vars['__smarty_section_menu'] = new Smarty_Variable(array());
if (true) {
for ($_smarty_tpl->tpl_vars['__smarty_section_menu']->value['iteration'] = 1, $_smarty_tpl->tpl_vars['__smarty_section_menu']->value['index'] = 0; $_smarty_tpl->tpl_vars['__smarty_section_menu']->value['iteration'] <= 1; $_smarty_tpl->tpl_vars['__smarty_section_menu']->value['iteration']++, $_smarty_tpl->tpl_vars['__smarty_section_menu']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_menu']->value['last'] = ($_smarty_tpl->tpl_vars['__smarty_section_menu']->value['iteration'] === 1);
?>
						<li>
							<ul class="menu">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['siteMenu']->value['house'], '_item');
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
?>
								<?php if ($_smarty_tpl->tpl_vars['_item']->value['menu_position'] == (isset($_smarty_tpl->tpl_vars['__smarty_section_menu']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_menu']->value['iteration'] : null) && $_smarty_tpl->tpl_vars['_item']->value['children']) {?>
									<li<?php if ($_smarty_tpl->tpl_vars['_item']->value['children']) {?> class="header"<?php } elseif ($_smarty_tpl->tpl_vars['_item']->value['is_highlight']) {?> class="highlight"<?php }?>>
										<?php if ($_smarty_tpl->tpl_vars['_item']->value['children']) {?>
											<span><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</span>
											<ul class="submenu">
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_item']->value['children'], '_subitem');
$_smarty_tpl->tpl_vars['_subitem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_subitem']->value) {
$_smarty_tpl->tpl_vars['_subitem']->do_else = false;
?>
												<li><a href="/<?php echo $_smarty_tpl->tpl_vars['_subitem']->value['link'];
if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strpos' ][ 0 ], array( $_smarty_tpl->tpl_vars['_subitem']->value['link'],'.html' )) === false) {?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_subitem']->value['name'];?>
</a></li>
											<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											</ul>
										<?php } elseif ($_smarty_tpl->tpl_vars['_item']->value['link']) {?>
											<a href="/<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];
if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strpos' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['link'],'.html' )) === false) {?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</a>
										<?php }?>
									</li>
								<?php }?>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
						</li>
						<?php
}
}
?>
					</ul>
				</li>

				<li>
					<ul class="menu-step">
						<?php
$_smarty_tpl->tpl_vars['__smarty_section_menu'] = new Smarty_Variable(array());
if (true) {
for ($_smarty_tpl->tpl_vars['__smarty_section_menu']->value['iteration'] = 1, $_smarty_tpl->tpl_vars['__smarty_section_menu']->value['index'] = 0; $_smarty_tpl->tpl_vars['__smarty_section_menu']->value['iteration'] <= 2; $_smarty_tpl->tpl_vars['__smarty_section_menu']->value['iteration']++, $_smarty_tpl->tpl_vars['__smarty_section_menu']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_menu']->value['last'] = ($_smarty_tpl->tpl_vars['__smarty_section_menu']->value['iteration'] === 2);
?>
						<li>
							<ul class="menu">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['siteMenu']->value['house'], '_item');
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
?>
								<?php if ($_smarty_tpl->tpl_vars['_item']->value['menu_position'] == ((isset($_smarty_tpl->tpl_vars['__smarty_section_menu']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_menu']->value['iteration'] : null)+1)) {?>
									<li<?php if ($_smarty_tpl->tpl_vars['_item']->value['children']) {?> class="header"<?php } elseif ($_smarty_tpl->tpl_vars['_item']->value['is_highlight']) {?> class="highlight"<?php }?>>
										<?php if ($_smarty_tpl->tpl_vars['_item']->value['children']) {?>
											<span><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</span>
											<ul class="submenu">
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_item']->value['children'], '_subitem');
$_smarty_tpl->tpl_vars['_subitem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_subitem']->value) {
$_smarty_tpl->tpl_vars['_subitem']->do_else = false;
?>
											
																								<?php if (!$_smarty_tpl->tpl_vars['_subitem']->value['is_parallel'] && (isset($_smarty_tpl->tpl_vars['__smarty_section_menu']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_menu']->value['iteration'] : null) > 1) {?>
												</li>
												<?php }?>
											
												<?php if (!$_smarty_tpl->tpl_vars['_subitem']->value['is_parallel']) {?>
												<li>
												<?php }?>	
													<a href="/<?php echo $_smarty_tpl->tpl_vars['_subitem']->value['link'];
if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strpos' ][ 0 ], array( $_smarty_tpl->tpl_vars['_subitem']->value['link'],'.html' )) === false) {?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_subitem']->value['name'];?>
</a>
													
												<?php if (!$_smarty_tpl->tpl_vars['_subitem']->value['is_parallel'] && (isset($_smarty_tpl->tpl_vars['__smarty_section_menu']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_section_menu']->value['last'] : null)) {?>
												</li>
												<?php }?>
											<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											</ul>
										<?php } elseif ($_smarty_tpl->tpl_vars['_item']->value['link']) {?>
											<a href="/<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];
if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strpos' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['link'],'.html' )) === false) {?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</a>
										<?php }?>
									</li>
								<?php }?>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
						</li>
						<?php
}
}
?>
					</ul>
				</li>
				
			</ul>
			
			<ul class="menu-box expandable" id="garage-menu" style="display: none;">
				<li>
					<ul class="menu-step">
					<?php
$_smarty_tpl->tpl_vars['__smarty_section_other'] = new Smarty_Variable(array());
if (true) {
for ($_smarty_tpl->tpl_vars['__smarty_section_other']->value['iteration'] = 1, $_smarty_tpl->tpl_vars['__smarty_section_other']->value['index'] = 0; $_smarty_tpl->tpl_vars['__smarty_section_other']->value['iteration'] <= 2; $_smarty_tpl->tpl_vars['__smarty_section_other']->value['iteration']++, $_smarty_tpl->tpl_vars['__smarty_section_other']->value['index']++){
?>
						<li>
							<ul class="menu">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['siteMenu']->value['other'], '_item');
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
?>
								<?php if ($_smarty_tpl->tpl_vars['_item']->value['menu_position'] == (isset($_smarty_tpl->tpl_vars['__smarty_section_other']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_other']->value['iteration'] : null)) {?>
									<li<?php if ($_smarty_tpl->tpl_vars['_item']->value['is_highlight']) {?> class="hilite"<?php }?>>
										<?php if ($_smarty_tpl->tpl_vars['_item']->value['children']) {?>
											<span><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</span>
											<ul class="submenu">
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_item']->value['children'], '_subitem');
$_smarty_tpl->tpl_vars['_subitem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_subitem']->value) {
$_smarty_tpl->tpl_vars['_subitem']->do_else = false;
?>
												<li><a href="/<?php echo $_smarty_tpl->tpl_vars['_subitem']->value['link'];
if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strpos' ][ 0 ], array( $_smarty_tpl->tpl_vars['_subitem']->value['link'],'.html' )) === false) {?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_subitem']->value['name'];?>
</a></li>
											<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											</ul>
										<?php } elseif ($_smarty_tpl->tpl_vars['_item']->value['link']) {?>
											<a href="/<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];
if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strpos' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['link'],'.html' )) === false) {?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</a>
										<?php }?>
									</li>
								<?php }?>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
						</li>
					<?php
}
}
?>
					</ul>
				</li>
				<li>
					<ul class="menu-step">
					<?php
$_smarty_tpl->tpl_vars['__smarty_section_other'] = new Smarty_Variable(array());
if (true) {
for ($_smarty_tpl->tpl_vars['__smarty_section_other']->value['iteration'] = 1, $_smarty_tpl->tpl_vars['__smarty_section_other']->value['index'] = 0; $_smarty_tpl->tpl_vars['__smarty_section_other']->value['iteration'] <= 3; $_smarty_tpl->tpl_vars['__smarty_section_other']->value['iteration']++, $_smarty_tpl->tpl_vars['__smarty_section_other']->value['index']++){
?>
						<li>
							<ul class="menu">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['siteMenu']->value['other'], '_item');
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
?>
								<?php if ($_smarty_tpl->tpl_vars['_item']->value['menu_position'] == ((isset($_smarty_tpl->tpl_vars['__smarty_section_other']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_other']->value['iteration'] : null)+2)) {?>
									<li<?php if ($_smarty_tpl->tpl_vars['_item']->value['is_highlight']) {?> class="hilite"<?php }?>>
										<?php if ($_smarty_tpl->tpl_vars['_item']->value['children']) {?>
											<span><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</span>
											<ul class="submenu">
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_item']->value['children'], '_subitem');
$_smarty_tpl->tpl_vars['_subitem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_subitem']->value) {
$_smarty_tpl->tpl_vars['_subitem']->do_else = false;
?>
												<li><a href="/<?php echo $_smarty_tpl->tpl_vars['_subitem']->value['link'];
if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strpos' ][ 0 ], array( $_smarty_tpl->tpl_vars['_subitem']->value['link'],'.html' )) === false) {?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_subitem']->value['name'];?>
</a></li>
											<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											</ul>
										<?php } elseif ($_smarty_tpl->tpl_vars['_item']->value['link']) {?>
											<a href="/<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];
if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strpos' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['link'],'.html' )) === false) {?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</a>
										<?php }?>
									</li>
								<?php }?>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul>
						</li>
					<?php
}
}
?>
					</ul>
				</li>
			</ul>
			
			<ul class="menu-box" id="knowledge-menu" style="display: none;">
				<li class="short">
					<ul class="menu-base misc">
						<li id="knowledge-header"><span>Baza wiedzy</span></li>
						<li><a href="/dokumenty/Jak-kupowac.html">Jak kupować?</a></li>
						<li><a href="/dokumenty/Zasady-sprzedazy.html">Zasady sprzedaży</a></li>
						<li><a href="/dokumenty/Co-zawiera-projekt.html">Co zawiera projekt?</a></li>
						<li><a href="/baza-wiedzy/">Cała zawartość</a></li>
					</ul>
				</li>
				<li class="wide">
					<ul class="menu-pics">
						<li>
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'article','action'=>'hash_tag','id'=>1),$_smarty_tpl ) );?>
" class="news">Artykuły</a>
						</li>
						<li>
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'article','action'=>'hash_tag','id'=>3),$_smarty_tpl ) );?>
" class="about">O projektach</a>
						</li>
						<li>
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'forum'),$_smarty_tpl ) );?>
" class="forum">Forum dyskusyjne</a>
						</li>
					</ul>
				</li>
			</ul>
			
			<ul class="menu-box" id="forums-menu" style="display: none;">
				<li class="full">
					<ul class="forum-menu-box">
						<li>
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'forum'),$_smarty_tpl ) );?>
">Ostatnie wpisy</a>
						</li>
						<li>
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'category','id'=>100),$_smarty_tpl ) );?>
" class="fcat-ask">Pytania do projektu</a>
						</li>
						<li>
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'category','id'=>1),$_smarty_tpl ) );?>
" class="fcat-sa">Budowa wg projektu Studia Atrium</a>
						</li>
						<li>
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'category','id'=>2),$_smarty_tpl ) );?>
" class="fcat-before">Przed budową</a>
						</li>
						<li>
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'category','id'=>3),$_smarty_tpl ) );?>
" class="fcat-misc">Tematy ogólnobudowlane</a>
						</li>
						<li>
							<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'category','id'=>4),$_smarty_tpl ) );?>
" class="fcat-interior">Urządzanie wnętrz i&nbsp;użytkowanie</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</header><?php }
}
