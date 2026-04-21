<?php /* Smarty version Smarty-3.1.11, created on 2026-04-09 07:57:18
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Layout/Header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112644287462b0302a227485-96723260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '977b35b3ca0763c2d5656c90202e9813cec84e9b' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Layout/Header.tpl',
      1 => 1775721421,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112644287462b0302a227485-96723260',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0302a26a5e6_65969528',
  'variables' => 
  array (
    'user' => 0,
    'project' => 0,
    'basket' => 0,
    'siteMenu' => 0,
    '_item' => 0,
    '_subitem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0302a26a5e6_65969528')) {function content_62b0302a26a5e6_65969528($_smarty_tpl) {?><header>
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
						<a class="tooltip<?php if (!$_smarty_tpl->tpl_vars['user']->value){?> consultant<?php }?>" href="<?php if ($_smarty_tpl->tpl_vars['user']->value){?><?php if ($_smarty_tpl->tpl_vars['project']->value){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message','project_id'=>$_smarty_tpl->tpl_vars['project']->value['id']),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message'),$_smarty_tpl);?>
<?php }?><?php }else{ ?>javascript:<?php }?>">
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
					<?php if ($_smarty_tpl->tpl_vars['user']->value){?>
						<li>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'account'),$_smarty_tpl);?>
" class="account">Konto</a>
						</li>
					<?php }else{ ?>
						<li>
							<a href="javascript:" class="login-trigger account" id="mobile-trigger-account">Konto</a>
						</li>
					<?php }?>
					
						<li>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'favourite','action'=>'list'),$_smarty_tpl);?>
" class="favourite">Ulubione</a>
						</li>
						
						<li>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'favourite','action'=>'compare'),$_smarty_tpl);?>
" class="compare">Porównaj</a>
						</li>
					
						<li<?php if (!$_smarty_tpl->tpl_vars['basket']->value){?> style="display: none;"<?php }?> id="menu-basket-trigger">
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'order','action'=>'cart'),$_smarty_tpl);?>
" class="basket">Koszyk</a>
						</li>
					</ul>
					<ul class="menu-icon">
						<li class="letter"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'forum'),$_smarty_tpl);?>
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
							<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['siteMenu']->value['house']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
?>
								<?php if ($_smarty_tpl->tpl_vars['_item']->value['menu_position']==1&&$_smarty_tpl->tpl_vars['_item']->value['is_highlight']){?>
									<li>
										<a href="/<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];?>
<?php if (strpos($_smarty_tpl->tpl_vars['_item']->value['link'],'.html')===false){?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</a>
									</li>
								<?php }?>
							<?php } ?>
								<li class="catalog-box"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'catalog','action'=>'form'),$_smarty_tpl);?>
"><img src="/img/catalogue.webp" alt="Katalog projektów domów"></a></li>
								<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'catalog','action'=>'form'),$_smarty_tpl);?>
" class="framed">Zamów bezpłatny katalog</a></li>
								<li class="play">
									<a href='https://play.google.com/store/apps/details?id=pl.studioatrium.studioatrium&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img alt='Pobierz z Google Play' src='https://play.google.com/intl/en_us/badges/images/generic/pl_badge_web_generic.png'/></a>
								</li>
								
							</ul>
						</li>
				
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['name'] = 'menu';
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] = is_array($_loop=1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total']);
?>
						<li>
							<ul class="menu">
							<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['siteMenu']->value['house']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
?>
								<?php if ($_smarty_tpl->tpl_vars['_item']->value['menu_position']==$_smarty_tpl->getVariable('smarty')->value['section']['menu']['iteration']&&$_smarty_tpl->tpl_vars['_item']->value['children']){?>
									<li<?php if ($_smarty_tpl->tpl_vars['_item']->value['children']){?> class="header"<?php }elseif($_smarty_tpl->tpl_vars['_item']->value['is_highlight']){?> class="highlight"<?php }?>>
										<?php if ($_smarty_tpl->tpl_vars['_item']->value['children']){?>
											<span><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</span>
											<ul class="submenu">
											<?php  $_smarty_tpl->tpl_vars['_subitem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_subitem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_item']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_subitem']->key => $_smarty_tpl->tpl_vars['_subitem']->value){
$_smarty_tpl->tpl_vars['_subitem']->_loop = true;
?>
												<li><a href="/<?php echo $_smarty_tpl->tpl_vars['_subitem']->value['link'];?>
<?php if (strpos($_smarty_tpl->tpl_vars['_subitem']->value['link'],'.html')===false){?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_subitem']->value['name'];?>
</a></li>
											<?php } ?>
											</ul>
										<?php }elseif($_smarty_tpl->tpl_vars['_item']->value['link']){?>
											<a href="/<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];?>
<?php if (strpos($_smarty_tpl->tpl_vars['_item']->value['link'],'.html')===false){?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</a>
										<?php }?>
									</li>
								<?php }?>
							<?php } ?>
							</ul>
						</li>
						<?php endfor; endif; ?>
					</ul>
				</li>

				<li>
					<ul class="menu-step">
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['name'] = 'menu';
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] = is_array($_loop=2) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['menu']['total']);
?>
						<li>
							<ul class="menu">
							<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['siteMenu']->value['house']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
?>
								<?php if ($_smarty_tpl->tpl_vars['_item']->value['menu_position']==($_smarty_tpl->getVariable('smarty')->value['section']['menu']['iteration']+1)){?>
									<li<?php if ($_smarty_tpl->tpl_vars['_item']->value['children']){?> class="header"<?php }elseif($_smarty_tpl->tpl_vars['_item']->value['is_highlight']){?> class="highlight"<?php }?>>
										<?php if ($_smarty_tpl->tpl_vars['_item']->value['children']){?>
											<span><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</span>
											<ul class="submenu">
											<?php  $_smarty_tpl->tpl_vars['_subitem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_subitem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_item']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_subitem']->key => $_smarty_tpl->tpl_vars['_subitem']->value){
$_smarty_tpl->tpl_vars['_subitem']->_loop = true;
?>
											
												
												<?php if (!$_smarty_tpl->tpl_vars['_subitem']->value['is_parallel']&&$_smarty_tpl->getVariable('smarty')->value['section']['menu']['iteration']>1){?>
												</li>
												<?php }?>
											
												<?php if (!$_smarty_tpl->tpl_vars['_subitem']->value['is_parallel']){?>
												<li>
												<?php }?>	
													<a href="/<?php echo $_smarty_tpl->tpl_vars['_subitem']->value['link'];?>
<?php if (strpos($_smarty_tpl->tpl_vars['_subitem']->value['link'],'.html')===false){?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_subitem']->value['name'];?>
</a>
													
												<?php if (!$_smarty_tpl->tpl_vars['_subitem']->value['is_parallel']&&$_smarty_tpl->getVariable('smarty')->value['section']['menu']['last']){?>
												</li>
												<?php }?>
											<?php } ?>
											</ul>
										<?php }elseif($_smarty_tpl->tpl_vars['_item']->value['link']){?>
											<a href="/<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];?>
<?php if (strpos($_smarty_tpl->tpl_vars['_item']->value['link'],'.html')===false){?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</a>
										<?php }?>
									</li>
								<?php }?>
							<?php } ?>
							</ul>
						</li>
						<?php endfor; endif; ?>
					</ul>
				</li>
				
			</ul>
			
			<ul class="menu-box expandable" id="garage-menu" style="display: none;">
				<li>
					<ul class="menu-step">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['other'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['other']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['name'] = 'other';
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['loop'] = is_array($_loop=2) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['total']);
?>
						<li>
							<ul class="menu">
							<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['siteMenu']->value['other']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
?>
								<?php if ($_smarty_tpl->tpl_vars['_item']->value['menu_position']==$_smarty_tpl->getVariable('smarty')->value['section']['other']['iteration']){?>
									<li<?php if ($_smarty_tpl->tpl_vars['_item']->value['is_highlight']){?> class="hilite"<?php }?>>
										<?php if ($_smarty_tpl->tpl_vars['_item']->value['children']){?>
											<span><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</span>
											<ul class="submenu">
											<?php  $_smarty_tpl->tpl_vars['_subitem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_subitem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_item']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_subitem']->key => $_smarty_tpl->tpl_vars['_subitem']->value){
$_smarty_tpl->tpl_vars['_subitem']->_loop = true;
?>
												<li><a href="/<?php echo $_smarty_tpl->tpl_vars['_subitem']->value['link'];?>
<?php if (strpos($_smarty_tpl->tpl_vars['_subitem']->value['link'],'.html')===false){?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_subitem']->value['name'];?>
</a></li>
											<?php } ?>
											</ul>
										<?php }elseif($_smarty_tpl->tpl_vars['_item']->value['link']){?>
											<a href="/<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];?>
<?php if (strpos($_smarty_tpl->tpl_vars['_item']->value['link'],'.html')===false){?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</a>
										<?php }?>
									</li>
								<?php }?>
							<?php } ?>
							</ul>
						</li>
					<?php endfor; endif; ?>
					</ul>
				</li>
				<li>
					<ul class="menu-step">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['other'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['other']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['name'] = 'other';
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['loop'] = is_array($_loop=3) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['other']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['other']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['other']['total']);
?>
						<li>
							<ul class="menu">
							<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['siteMenu']->value['other']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
?>
								<?php if ($_smarty_tpl->tpl_vars['_item']->value['menu_position']==($_smarty_tpl->getVariable('smarty')->value['section']['other']['iteration']+2)){?>
									<li<?php if ($_smarty_tpl->tpl_vars['_item']->value['is_highlight']){?> class="hilite"<?php }?>>
										<?php if ($_smarty_tpl->tpl_vars['_item']->value['children']){?>
											<span><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</span>
											<ul class="submenu">
											<?php  $_smarty_tpl->tpl_vars['_subitem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_subitem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_item']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_subitem']->key => $_smarty_tpl->tpl_vars['_subitem']->value){
$_smarty_tpl->tpl_vars['_subitem']->_loop = true;
?>
												<li><a href="/<?php echo $_smarty_tpl->tpl_vars['_subitem']->value['link'];?>
<?php if (strpos($_smarty_tpl->tpl_vars['_subitem']->value['link'],'.html')===false){?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_subitem']->value['name'];?>
</a></li>
											<?php } ?>
											</ul>
										<?php }elseif($_smarty_tpl->tpl_vars['_item']->value['link']){?>
											<a href="/<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];?>
<?php if (strpos($_smarty_tpl->tpl_vars['_item']->value['link'],'.html')===false){?>/<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</a>
										<?php }?>
									</li>
								<?php }?>
							<?php } ?>
							</ul>
						</li>
					<?php endfor; endif; ?>
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
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'article','action'=>'hash_tag','id'=>1),$_smarty_tpl);?>
" class="news">Artykuły</a>
						</li>
						<li>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'article','action'=>'hash_tag','id'=>3),$_smarty_tpl);?>
" class="about">O projektach</a>
						</li>
						<li>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'forum'),$_smarty_tpl);?>
" class="forum">Forum dyskusyjne</a>
						</li>
					</ul>
				</li>
			</ul>
			
			<ul class="menu-box" id="forums-menu" style="display: none;">
				<li class="full">
					<ul class="forum-menu-box">
						<li>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'forum'),$_smarty_tpl);?>
">Ostatnie wpisy</a>
						</li>
						<li>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'category','id'=>100),$_smarty_tpl);?>
" class="fcat-ask">Pytania do projektu</a>
						</li>
						<li>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'category','id'=>1),$_smarty_tpl);?>
" class="fcat-sa">Budowa wg projektu Studia Atrium</a>
						</li>
						<li>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'category','id'=>2),$_smarty_tpl);?>
" class="fcat-before">Przed budową</a>
						</li>
						<li>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'category','id'=>3),$_smarty_tpl);?>
" class="fcat-misc">Tematy ogólnobudowlane</a>
						</li>
						<li>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'category','id'=>4),$_smarty_tpl);?>
" class="fcat-interior">Urządzanie wnętrz i&nbsp;użytkowanie</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</header><?php }} ?>