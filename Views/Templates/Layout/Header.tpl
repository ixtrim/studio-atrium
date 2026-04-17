<header>
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
						<a class="tooltip{if !$user} consultant{/if}" href="{if $user}{if $project}{url module=panel action=message project_id=$project.id}{else}{url module=panel action=message}{/if}{else}javascript:{/if}">
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
					{if $user}
						<li>
							<a href="{url module=panel action=account}" class="account">Konto</a>
						</li>
					{else}
						<li>
							<a href="javascript:" class="login-trigger account" id="mobile-trigger-account">Konto</a>
						</li>
					{/if}
					
						<li>
							<a href="{url module=favourite action=list}" class="favourite">Ulubione</a>
						</li>
						
						<li>
							<a href="{url module=favourite action=compare}" class="compare">Porównaj</a>
						</li>
					
						<li{if !$basket} style="display: none;"{/if} id="menu-basket-trigger">
							<a href="{url module=order action=cart}" class="basket">Koszyk</a>
						</li>
					</ul>
					<ul class="menu-icon">
						<li class="letter"><a href="{url module=discuss action=forum}" class="forum">Forum</a></li>
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
							{foreach $siteMenu.house as $_item}
								{if $_item.menu_position == 1 && $_item.is_highlight}
									<li>
										<a href="/{$_item.link}{if strpos($_item.link, '.html') === false}/{/if}">{$_item.name}</a>
									</li>
								{/if}
							{/foreach}
								<li class="catalog-box"><a href="{url module=catalog action=form}"><img src="/img/catalogue.webp" alt="Katalog projektów domów"></a></li>
								<li><a href="{url module=catalog action=form}" class="framed">Zamów bezpłatny katalog</a></li>
								<li class="play">
									<a href='https://play.google.com/store/apps/details?id=pl.studioatrium.studioatrium&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img alt='Pobierz z Google Play' src='https://play.google.com/intl/en_us/badges/images/generic/pl_badge_web_generic.png'/></a>
								</li>
								{*
								<li class="apple">
									<a href="https://apps.apple.com/us/app/studio-atrium/id1474479465?mt=8" style="display:inline-block;overflow:hidden;background:url(https://linkmaker.itunes.apple.com/en-us/badge-lrg.svg?releaseDate=2019-09-02&kind=iossoftware&bubble=ios_apps) no-repeat;width:135px;height:40px;"></a>
								</li>
								*}
							</ul>
						</li>
				
						{section name=menu start=0 loop=1}
						<li>
							<ul class="menu">
							{foreach $siteMenu.house as $_item}
								{if $_item.menu_position == $smarty.section.menu.iteration && $_item.children}
									<li{if $_item.children} class="header"{elseif $_item.is_highlight} class="highlight"{/if}>
										{if $_item.children}
											<span>{$_item.name}</span>
											<ul class="submenu">
											{foreach $_item.children as $_subitem}
												<li><a href="/{$_subitem.link}{if strpos($_subitem.link, '.html') === false}/{/if}">{$_subitem.name}</a></li>
											{/foreach}
											</ul>
										{else if $_item.link}
											<a href="/{$_item.link}{if strpos($_item.link, '.html') === false}/{/if}">{$_item.name}</a>
										{/if}
									</li>
								{/if}
							{/foreach}
							</ul>
						</li>
						{/section}
					</ul>
				</li>

				<li>
					<ul class="menu-step">
						{section name=menu start=0 loop=2}
						<li>
							<ul class="menu">
							{foreach $siteMenu.house as $_item}
								{if $_item.menu_position == ($smarty.section.menu.iteration + 1)}
									<li{if $_item.children} class="header"{elseif $_item.is_highlight} class="highlight"{/if}>
										{if $_item.children}
											<span>{$_item.name}</span>
											<ul class="submenu">
											{foreach $_item.children as $_subitem}
											
												{* if iterartion is > 1 close li *}
												{if !$_subitem.is_parallel && $smarty.section.menu.iteration > 1}
												</li>
												{/if}
											
												{if !$_subitem.is_parallel}
												<li>
												{/if}	
													<a href="/{$_subitem.link}{if strpos($_subitem.link, '.html') === false}/{/if}">{$_subitem.name}</a>
													
												{if !$_subitem.is_parallel && $smarty.section.menu.last}
												</li>
												{/if}
											{/foreach}
											</ul>
										{else if $_item.link}
											<a href="/{$_item.link}{if strpos($_item.link, '.html') === false}/{/if}">{$_item.name}</a>
										{/if}
									</li>
								{/if}
							{/foreach}
							</ul>
						</li>
						{/section}
					</ul>
				</li>
				
			</ul>
			
			<ul class="menu-box expandable" id="garage-menu" style="display: none;">
				<li>
					<ul class="menu-step">
					{section name=other start=0 loop=2}
						<li>
							<ul class="menu">
							{foreach $siteMenu.other as $_item}
								{if $_item.menu_position == $smarty.section.other.iteration}
									<li{if $_item.is_highlight} class="hilite"{/if}>
										{if $_item.children}
											<span>{$_item.name}</span>
											<ul class="submenu">
											{foreach $_item.children as $_subitem}
												<li><a href="/{$_subitem.link}{if strpos($_subitem.link, '.html') === false}/{/if}">{$_subitem.name}</a></li>
											{/foreach}
											</ul>
										{else if $_item.link}
											<a href="/{$_item.link}{if strpos($_item.link, '.html') === false}/{/if}">{$_item.name}</a>
										{/if}
									</li>
								{/if}
							{/foreach}
							</ul>
						</li>
					{/section}
					</ul>
				</li>
				<li>
					<ul class="menu-step">
					{section name=other start=0 loop=3}
						<li>
							<ul class="menu">
							{foreach $siteMenu.other as $_item}
								{if $_item.menu_position == ($smarty.section.other.iteration + 2)}
									<li{if $_item.is_highlight} class="hilite"{/if}>
										{if $_item.children}
											<span>{$_item.name}</span>
											<ul class="submenu">
											{foreach $_item.children as $_subitem}
												<li><a href="/{$_subitem.link}{if strpos($_subitem.link, '.html') === false}/{/if}">{$_subitem.name}</a></li>
											{/foreach}
											</ul>
										{else if $_item.link}
											<a href="/{$_item.link}{if strpos($_item.link, '.html') === false}/{/if}">{$_item.name}</a>
										{/if}
									</li>
								{/if}
							{/foreach}
							</ul>
						</li>
					{/section}
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
							<a href="{url module=article action=hash_tag id=1}" class="news">Artykuły</a>
						</li>
						<li>
							<a href="{url module=article action=hash_tag id=3}" class="about">O projektach</a>
						</li>
						<li>
							<a href="{url module=discuss action=forum}" class="forum">Forum dyskusyjne</a>
						</li>
					</ul>
				</li>
			</ul>
			
			<ul class="menu-box" id="forums-menu" style="display: none;">
				<li class="full">
					<ul class="forum-menu-box">
						<li>
							<a href="{url module=discuss action=forum}">Ostatnie wpisy</a>
						</li>
						<li>
							<a href="{url module=discuss action=category id=100}" class="fcat-ask">Pytania do projektu</a>
						</li>
						<li>
							<a href="{url module=discuss action=category id=1}" class="fcat-sa">Budowa wg projektu Studia Atrium</a>
						</li>
						<li>
							<a href="{url module=discuss action=category id=2}" class="fcat-before">Przed budową</a>
						</li>
						<li>
							<a href="{url module=discuss action=category id=3}" class="fcat-misc">Tematy ogólnobudowlane</a>
						</li>
						<li>
							<a href="{url module=discuss action=category id=4}" class="fcat-interior">Urządzanie wnętrz i&nbsp;użytkowanie</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</header>