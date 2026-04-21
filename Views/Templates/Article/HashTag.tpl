<div class="wrapper">
	<div class="box spaced">
		<h1 class="article-title"><a href="{url module=article action=all_tags}">Baza wiedzy</a></h1>
		<ul class="article-tags">
			<li><a href="/projekty-domow/">projekty domów</a></li>
			{foreach $allTags.main as $tid => $_tag}
				<li{if $request.tag == $tid} class="selected"{/if}><a href="{url module=article action=hash_tag id=$tid}">{$_tag}</a></li>
			{/foreach}
		</ul>
		
		<div class="control-box">
			<ul>
				<li><span>Znalezionych tekstów <strong>{$total|default:0}</strong></span></li>
				<li>
					<form action="{url module=article action=hash_tag}" method="get">
						<fieldset>
							<input name="search" value="{if $request.search}{$request.search}{/if}" placeholder="{if $request.search}{$request.search}{else}wpisz szukane wyrażenie{/if}" type="text">
							<input type="submit" value="szukaj w bazie wiedzy">
						</fieldset>
					</form>
				</li>
				<li>
				{if $pages > 1}
					{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url query=$query}
				{/if}
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="articles-box">
	<div id="article-list-box" class="list-box">
		<ul class="list">
			{foreach $articles as $article}
			<li>
				<div>
					<a href="/{if $article.doctype == 'news'}{url module='news' action='item' docId=$article.id link_title=$article.title}{elseif $article.doctype == 'page'}{url module='document' action='item' docId=$article.id link_title=$article.title}{else}{url module='article' action='item' docId=$article.id link_title=$article.title}{/if}">
						<img src="{articleImage document=$article}" alt="{$article.title}">
					</a>
				</div>
				
				<h6>
					<a href="/{if $article.doctype == 'news'}{url module='news' action='item' docId=$article.id link_title=$article.title}{elseif $article.doctype == 'page'}{url module='document' action='item' docId=$article.id link_title=$article.title}{else}{url module='article' action='item' docId=$article.id link_title=$article.title}{/if}">
						{$article.title}
					</a>
				</h6>
				
				{if $article.extra_data.hashTags}
				<ul class="article-tags">
					{foreach $article.extra_data.hashTags as $_tagId => $_tag}
					<li{if $request.tag == $_tagId} class="selected"{/if}>
						<a href="{url module=article action=hash_tag id=$_tagId}">{$_tag}</a>
					</li>
					{/foreach}
				</ul>
				{/if}
				
				<p>
					{if $article.doctype == 'page' && !$article.teaser}
						{$article.content|strip_tags|truncate:"300"}
					{else}
						{$article.teaser|nl2br}
					{/if}
				</p>
				<p>
					<a class="framed" href="/{if $article.doctype == 'news'}{url module='news' action='item' docId=$article.id link_title=$article.title}{elseif $article.doctype == 'page'}{url module='document' action='item' docId=$article.id link_title=$article.title}{else}{url module='article' action='item' docId=$article.id link_title=$article.title}{/if}">Zobacz więcej</a>
				</p>
			</li>
			{/foreach}
		</ul>
	</div>
	
	<aside>
		<p>Kategorie</p>
		
		<ul class="main-tags">
		{foreach $allTags.main as $tid => $_tag}
			<li class="main{if $request.tag == $tid} selected{/if}"><a href="{url module=article action=hash_tag id=$tid}">{$_tag}</a></li>
		{/foreach}
		</ul>
		
		<div id="tagList">
			<p>Lista tagów</p>
			<ul class="tags">
			{foreach $allTags.normal as $tid => $_tag}
				<li{if $request.tag == $tid} class="selected"{/if}><a href="{url module=article action=hash_tag id=$tid}">{$_tag}</a></li>
			{/foreach}
			</ul>
		</div>
		
		<p>Archiwum forum</p>
		<ul class="archive">
			<li><a href="/archiwum/Forum,Dom-studia-atrium,1.html">Dom Studia Atrium</a></li>
			<li><a href="/archiwum/Forum,Budownictwo-ogolne,2.html">Budownictwo ogólne</a></li>
			<li><a href="/archiwum/Forum,Prawo-i-budowa,3.html">Prawo i budowa</a></li>
			<li><a href="/archiwum/Forum,Uwagi-o-serwisie,4.html">Uwagi o serwisie</a></li>
		</ul>
	</aside>
</div>

{if $pages > 1}
<div class="wrapper">
	<div class="box">
		<div class="control-box">
			<ul>
				<li>
					{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url query=$query}
				</li>
			</ul>
		</div>
	</div>
</div>
{/if}