<div class="list-header realisation activated">
	<div>
		<div class="header-wrapper">
			<div>
				<h1><span>Opinie Inwestorów o projektach domów z naszej pracowni</span></h1>
				<p>Poniżej znajdują się wybrane opinie naszych klientów, którzy wybudowali bądź są w trakcie budowy swoich domów według projektów stworzonych w naszej pracowni i zechcieli się z nami, a za naszym pośrednictwem również z innymi, podzielić swoimi wrażeniami odnośnie wybranych projektów, nierzadko dzieląc się również praktycznymi poradami związanymi samą budową lub z ewentualnymi zmianami, które poczynili w projektach. Zapraszamy!</p>
			</div>
		</div>
	</div>
</div>
<div class="control-box">
	<ul>
		<li class="paths"><a href="/">projekty domów</a> &raquo; <a href="/projekty-domow/" class="all">wszystkie</a> &raquo; <span>znalezionych opinii: <strong>{$total}</strong></span></li>
		{if $pages > 1}
		<li>
			{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url}
		</li>
		{/if}
	</ul>
</div>
<section>
	<div class="box">
		<ul class="detail opinions fav-wrapper">
		{foreach $opinions as $_opinion}
		{if $projects[$_opinion.project_id].params_general|isGroundFloor:true}
			{$altTitle = "Projekt domu parterowego"}
		{elseif $projects[$_opinion.project_id].params_general|hasLoft:true}
			{$altTitle = "Projekt domu z poddaszem"}
		{elseif $projects[$_opinion.project_id].params_general|hasFloor:true}
			{$altTitle = "Projekt domu piętrowego"}
		{else}
			{$altTitle = "Projekt domu"}
		{/if}
			<li>
				<ul>
					<li>
						<div>
							<a href="{url module=project action=item id=$projects[$_opinion.project_id].id link_title=$projects[$_opinion.project_id].name catalog='projekty-domow'}">
								<img src="{image type=render project=$projects[$_opinion.project_id] size=list}" alt="{$altTitle} {$projects[$_opinion.project_id].name|strtoupper}">
							</a>
							<span id="compare-{$projects[$_opinion.project_id].id}" class="compare{if in_array($projects[$_opinion.project_id].id, $compareIds)} on{/if}" data-id="{$projects[$_opinion.project_id].id}"></span>
							<span id="fav-{$projects[$_opinion.project_id].id}" class="fav{if in_array($projects[$_opinion.project_id].id, $favouriteIds)} on{/if}" data-id="{$projects[$_opinion.project_id].id}"></span>
							{if $projects[$_opinion.project_id]|isNew}<span class="label">Nowość</span>{/if}
							{if $projects[$_opinion.project_id].discount}<span class="label discount{if !$projects[$_opinion.project_id]|isNew} left{/if}">Rabat {$projects[$_opinion.project_id].discount} zł</span>{/if}
						</div>
					</li>
					<li class="data">
						<h6><a href="{url module=project action=item id=$projects[$_opinion.project_id].id link_title=$projects[$_opinion.project_id].name catalog='projekty-domow'}">{$projects[$_opinion.project_id].name}</a></h6>
						
						{$_opinion.content}
						
						<ul>
							<li>{$_opinion.publish_date|date_format:"%d %B %Y"} - <span>{$_opinion.author}</span></li>
						</ul>
					</li>
				</ul>
			</li>
		{/foreach}
		</ul>
	</div>
</section>

{if $pages > 1}
<div class="wrapper">
	<div class="box">
		<div class="control-box">
			<ul>
				<li>
					{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url}
				</li>
			</ul>
		</div>
	</div>
</div>
{/if}