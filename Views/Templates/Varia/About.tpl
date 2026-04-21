<div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Studio Atrium - marka z pomysłami</h1>
			</div>
		</div>
	</div>
</div>

<div class="wrapper">
	<div class="box">
		<div class="article-box">
			{$document.content|fixArticleContent:$document.id}
		</div>
		
		<ul id="holder">
			{if $editions}
			<li class="editions" id="editions">
				<div>
					<img src="/img/about_wydawnictwa.jpg" alt="Nasze wydawnictwa">
				</div>
				<p>Wydawnictwa</p>
				<span class="work-trigger"></span>
			</li>
			{/if}
			{if $actions}
			<li class="actions" id="actions">
				<div>
					<img src="/img/about_akcje.jpg" alt="Nasze akcje">
				</div>
				<p>Akcje</p>
				<span class="work-trigger"></span>
			</li>
			{/if}
			{if $architecture}
			<li class="architecture" id="architecture">
				<div>
					<img src="/img/about_architektura.jpg" alt="Architektura">
				</div>
				<p>Architektura</p>
				<span class="work-trigger"></span>
			</li>
			{/if}
		</ul>
		
		<div id="works-wrapper">
			{if $editions}
			<div id="editions-box" class="works" style="display: none;">
				{foreach $editions as $_item}
				<ul>
					<li>
						<img src="{$staticAboutUrl}/{$_item.id}/{$_item.file}" alt="{$_item.title}">
					</li>
					<li>
						<p class="header">{$_item.title}</p>
						{$_item.content}
						{if $_item.props.gallery}
							{foreach $_item.props.gallery as $_gid => $_linkTxt}
								<div class="links">
									<span class="ajaxgallery" data-entry="{$_item.id}" data-gid="{$_gid}">{str_replace($codes, $plchars, $_linkTxt)} &raquo;</span>
								</div>
							{/foreach}
						{/if}
						{if $_item.link_href && $_item.link_txt}
						<div class="links">
							<a href="{$_item.link_href}">{$_item.link_txt} &raquo;</a>
						</div>
						{/if}
						
						{if $_item.title == "Romantyczny Styl"}
						<div class="links">
							<a href="{$staticStockUrl}/docs/RS04.pdf">zobacz 4 edycję Romantycznego Stylu &raquo;</a>
						</div>
						{/if}
					</li>
				</ul>
				{/foreach}
			</div>
			{/if}
			
			{if $actions}
			<div id="actions-box" class="works" style="display: none;">
				{foreach $actions as $_item}
				<ul>
					<li>
						<img src="{$staticAboutUrl}/{$_item.id}/{$_item.file}" alt="{$_item.title}">
					</li>
					<li>
						<p class="header">{$_item.title}</p>
						{$_item.content}
						{if $_item.props.gallery}
							{foreach $_item.props.gallery as $_gid => $_linkTxt}
								<div class="links">
									<span class="ajaxgallery" data-entry="{$_item.id}" data-gid="{$_gid}">{str_replace($codes, $plchars, $_linkTxt)} &raquo;</span>
								</div>
							{/foreach}
						{/if}
						{if $_item.link_href && $_item.link_txt}
						<div class="links">
							<a href="{$_item.link_href}">{$_item.link_txt} &raquo;</a>
						</div>
						{/if}
					</li>
				</ul>
				{/foreach}
			</div>
			{/if}
			
			{if $architecture}
			<div id="architecture-box" class="works" style="display: none;">
				{foreach $architecture as $_item}
				<ul>
					<li>
						<img src="{$staticAboutUrl}/{$_item.id}/{$_item.file}" alt="{$_item.title}">
					</li>
					<li>
						<p class="header">{$_item.title}</p>
						{$_item.content}
						{if $_item.props.gallery}
							{foreach $_item.props.gallery as $_gid => $_linkTxt}
								<div class="links">
									<span class="ajaxgallery" data-entry="{$_item.id}" data-gid="{$_gid}">{str_replace($codes, $plchars, $_linkTxt)} &raquo;</span>
								</div>
							{/foreach}
						{/if}
						{if $_item.link_href && $_item.link_txt}
						<div class="links">
							<a href="{$_item.link_href}">{$_item.link_txt} &raquo;</a>
						</div>
						{/if}
					</li>
				</ul>
				{/foreach}
			</div>
			{/if}
		</div>
	</div>
</div>