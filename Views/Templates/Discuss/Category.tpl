<div class="wrapper">
	<div class="box spaced">
		<h1><a href="{url module=discuss action=forum}">Forum</a></h1>
		<ul>
			<li><p id="post-category" data-cid="{$request.id}">{$category.title}</p></li>
		</ul>
		<p>{$category.long}</p>

		<div class="new-comment-trigger">
			<span class="framed blue" id="add-thread">Dodaj nowy wpis</span>
		</div>
		
		<div id="post-form-wrapper"{if !$cache} style="display: none;"{/if}>
			<form class="validable" action="{url module=discuss action=add_thread}" method="post" id="post-form" data-validate="Forum.validate">
				<fieldset>
					<input type="hidden" name="module" value="discuss">
					<input type="hidden" name="action" value="add_thread">
					<input type="hidden" name="categoryId" value="{$request.id}">
					<input type="hidden" name="projectId" id="post-project-id" value="">
					<input type="hidden" id="ownerUid" name="ownerUid" value="{$tmpStamp}">
					<input type="hidden" id="isTmpUid" name="isTmpUid" value="1">
					
					<div>
						<input type="text" name="subject" id="subject" placeholder="wpisz tytuł*" value="">
					</div>
					
					<div class="small-space">
						<textarea id="content" name="content" cols="1" rows="1" placeholder="wpisz treść*"></textarea>
					</div>
					
					<input type="checkbox" name="bindProject" id="bind" autocomplete="off"><label for="bind">powiąż temat z projektem</label>
					{*<p class="addFileTrigger"><span class="attach{if !$user} login-trigger{else} uploadTrigger{/if}" id="attachment" data-profile="DiscussImage" data-progressContainer="DiscussImageFileProgress">dodaj grafikę</span></p>*}
					<div id="post-project-box" style="display: none;">
						<input type="text" name="project" id="post-project-name" autocomplete="off" placeholder="wpisz nazwę projektu">
						<ul id="names-holder" class="names-holder"></ul>
					</div>
					
					<div id="Content" style="position: relative;">
						<ul class="inputs-holder">
							{if !$user}<li class="middle"><span><a href="javascript:" class="login-trigger" id="post-login-trigger">Zaloguj się</a> lub wypełnij poniższe dane</span></li>{/if}
							<li class="mystic"><label for="age">Wiek</label><input type="text" name="age" id="comment-age" value=""></li>
							<li class="spaced short"><label for="nick">Nazwa / Nick*</label><input type="text" name="nick" id="nick" value="{if $user.nick}{$user.nick}{else}{$user.name}{/if}"{if $user} readonly{/if}></li>
							<li class="rite noPadd short"><input type="checkbox" name="notify" id="notify"{if $user} class="notShow"{/if}><label class="nocaps" for="notify">chcę otrzymywać powiadomienia o nowych wpisach</label></li>
							<li class="short" id="post-mail-box" style="display: none;"><label for="post-email">E-mail</label><input type="text" name="email" id="post-email" value="{$user.email}"{if $user} readonly{/if}></li>
							<li class="middle">
							{if $uploadedTmp}
								<p class="last">wgrane grafiki:</p>
							{/if}
							<div id="thumbnailFile">
								<img src="/img/progress.gif" alt="" id="thumbnailFileProgress" style="display: none;">
								{if $uploadedTmp}
									{foreach from=$uploadedTmp.DiscussImage item=_file name=files}
										<a href="{$tmp_uploadsUrl}/{$_file.path}/{$_file.filename}" target="_blank" style="margin-left: 15px;"><img src="{$tmp_uploadsUrl}/{$_file.childAttachments.thumb[0].path}/{$_file.childAttachments.thumb[0].filename}"></a><a href="javascript:" class="remove" onClick="Uploader.removeSingleFile({$_file.id});"><img src="/img/x.png" class="remove"></a>
									{/foreach}
								{/if}
							</div>
							</li>
							<li class="rite middle short"><input type="checkbox" name="regulations" id="regulations"><label class="nocaps" for="regulations">akceptuję </label><span class="ajax-info" data-url="/?module=ajax&action=get_comment_regulations">regulamin korzystania</span></li>
							<li class="submit"><button class="baton" id="publish-trigger">Publikuj</button> <span><img id="post-waiter" style="display: none;" src="/img/waiter-blue.gif" alt=""></span></li>
						</ul>
					</div>
				</fieldset>
			</form>
		</div>
	
		<ul class="forum-menu">
			{foreach $categories as $_key => $_item}
				<li{if $request.id == $_key} class="selected"{/if}><a href="{url module=discuss action=category id=$_key}"><span class="{$_item.class}">{$_item.short}</span></a></li>
			{/foreach}
			<li id="forum-search-trigger"><span class="fcat-search">Szukaj</span></li>
		</ul>

		<div id="search-forum" class="wrapped">
			<form action="{url module=discuss action=search}" method="get" id="forum-filters-form">
				<fieldset>
					<ul class="filters-box">
						<li>
							<input id="forum-search-field" name="query" value="" placeholder="wpisz szukane słowo" type="text" autocomplete="off">
						</li>
						<li>
							<div class="select-wrapper">
								<div class="jui-select-box dark" id="category-select-box">
									<select id="category-select" name="cid">
										<option value="0" {if !$request.id} selected="selected"{/if}>w kategorii</option>
										<option value="100" {if $request.id == 100} selected="selected"{/if}>Komentarze</option>
										{foreach $categories as $_key => $_item}
										<option value="{$_key}" {if $request.id == $_key} selected="selected"{/if}>{$_item.title}</option>
										{/foreach}
									</select>
								</div>
							</div>
						</li>
						<li class="forum-projects-box">
							<input id="forum-project-field" value="{if $request.project}{$request.project}{/if}" placeholder="{if $request.project}{$request.project}{else}wpisz nazwę projektu{/if}" type="text" autocomplete="off">
							<ul id="projects-holder" style="display: none;"></ul>
						</li>
						<li><input type="submit" class="baton" value="Szukaj"></li>
					</ul>
					
					<input type="hidden" id="search-pid" name="pid" value="{$request.pid|default:0}">
				</fieldset>
			</form>
		</div>

		{if $pages > 1}
		<div class="pager-box">
			{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url}
		</div>
		{/if}
		
		<ul class="forum-header category">
			<li>
				<p>Tematy</p>
			</li>
			<li>
				<p>Ostatni wpis</p>
			</li>
		</ul>

		{foreach $threads as $_item}
		<div class="forum-cats">
			<ul>
				<li>
					<h4><a href="{url module=discuss action=thread id=$_item.id}">{$_item.topic}</a></h4>
					<p class="thread">{$_item.content|strip_tags|truncate:200|hideEmails}</p>
					<div>
						<span>utworzył:</span>
						<span class="nick">{$_item.nick}</span>
						<span>{$_item.create_date|date_format:"%d-%m-%Y"}</span>
						{if $_item.project_id && isset($projects[$_item.project_id])}
						{$_project = $projects[$_item.project_id]}
						<span class="project overview" data-id="{$_item.project_id}" data-img="{image type=render project=$_project size=presentation}" data-ground="{image type=sketch project=$_project}"{if $_project.params_general|hasFloor:true} data-floor="{image type=sketch project=$_project storey=1st_floor}"{/if}{if $_project.params_general|hasLoft:true} data-loft="{image type=sketch project=$_project storey=loft}"{/if} data-link="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}" data-price="{if $_project.price}{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}{else}-{/if}" data-name="{$_project.name}" data-area="{$_project.params_general|usableArea}" data-parcel="{$_project.params_general|parcelWidth} x {$_project.params_general|parcelHeight}" data-height="{$_project.params_general|houseHeight}" data-angle="{$_project.params_general|roofAngle}" data-version="{if $_project.type == 'skeleton'}wersja szkieletowa{else}wersja murowana{/if}" data-rooms="{$_project.params_general|roomCount}" data-txt="{$_project.short_description}">{$_project.name}</span>
						{/if}
					</div>
				</li>
				{if $_item.subid}
				<li>
					<ul>
						<li>
							{if $_item.subauthorid|avatar}
								<p class="avatar"><img src="{$_item.subauthorid|avatar}" alt="{$_item.subnick}">{$_item.subnick}</p>
							{else}
								<p{if in_array($_item.subauthorid, $adminIds)} class="nick sa"{else} class="nick" data-initial="{$_item.subnick|truncate:1:""}"{/if}>{$_item.subnick}</p>
							{/if}
							<p>{$_item.subdate|date_format:"%d-%m-%Y"}</p>
							<p>({$_item.subdate|date_format:"%H:%M:%S"})</p>
						</li>
						<li>
							<div>
								<a href="{url module=discuss action=thread id=$_item.id}?ostatni=1">
									<p>{$_item.subcontent|strip_tags:false|truncate:160|hideEmails}</p>
								</a>
							</div>
						</li>
					</ul>
				{else}
				<li class="reply">
					<a href="{url module=discuss action=thread id=$_item.id}#reply">Odpowiedz</a>
				{/if}
				</li>
			</ul>
		</div>
		{/foreach}
		
		{if $pages > 1}
		<div class="pager-box">
			{include file="Include/Pager.tpl" page=$page pages=$pages baseUrl=$url}
		</div>
		{/if}
	</div>
</div>

<div class="overlay">
	<div class="overlay-project-box" id="over-pop">
		<div id="over-img-box">
			<ul id="over-pics">
				<li><span id="over-render" class="selected">Wizualizacja</span></li>
				<li><span id="over-ground" class="noview">Rzut parteru</span></li>
				<li><span id="over-floor" class="noview">Rzut piętra</span></li>
				<li><span id="over-loft" class="noview">Rzut poddasza</span></li>
			</ul>
			<a href="">
				<img class="preload" id="over-img" src="/img/dummy.png" alt="Render">
			</a>
		</div>
		
		<ul id="over-params">
			<li><h6 id="over-name"></h6></li>
			<li class="small"><span id="over-txt"></span></li>
			<li><span id="over-version"></span></li>
			<li><p>ilość pokoi: <span id="over-rooms"></span></p></li>
			<li><p>powierzchnia użytkowa: <strong id="over-area"></strong> m<sup>2</sup></p></li>
			<li><p>min. wymiary działki: <span id="over-parcel"></span> m</p></li>
			<li><p>wysokość budynku: <span id="over-height"></span> m</p></li>
			<li><p>kąt nachylenia dachu: <span id="over-angle"></span></p></li>
			<li><p>cena projektu: <span id="over-price"></span> zł</p></li>
			<li><a href="" class="more">Zobacz szczegóły</a></li>
		</ul>
	</div>
	
	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div>