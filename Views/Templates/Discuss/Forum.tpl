<div class="wrapper">
	<div class="box spaced">
		
		<h1 class="hilite">Forum</h1>

		<p>Witamy na Forum dyskusyjnym Studia Atrium. To dział naszego serwisu przeznaczony dla wszystkich zainteresowanych projektami i budową domu wg projektów Studia Atrium. 
		Mamy nadzieję, że będą się Państwo dzielić swoimi przemyśleniami i doświadczeniami, by proces budowy stał się łatwiejszy i przyjemniejszy. Studio Atrium będzie uważnie 
		śledzić te dyskusje, ale Forum to miejsce przede wszystkim dla Was! Uwaga - warto się zalogować! Dla zarejestrowanych użytkowników dostępne bowiem będą wszystkie 
		funkcjonalności: historia dyskusji, powiadomienia, edycja postów, dodawanie grafik. Zapraszamy! <span class="ajax-info" data-url="/?module=ajax&action=get_comment_regulations">Regulamin korzystania</span>.</p>	

		<div id="search-forum">
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
										<option value="0">w kategorii</option>
										{foreach $categories as $_key => $_item}
										<option value="{$_key}">{$_item.title}</option>
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
		
		<ul class="forum-header main">
			<li>
				<p>Kategorie</p>
			</li>
			<li>
				<p>Ostatni temat</p>
			</li>
		</ul>

		{if $comment.user.nick}
			{$nick = $comment.user.nick}
		{else}
			{$nick = $comment.author}
		{/if}

		{foreach $categories as $_key => $_item}
		<div class="forum-cats">
			<ul class="iconized">
				<li class="{$_item.class}">
					<h4><a href="{url module=discuss action=category id=$_key}">{$_item.title}</a></h4>
					<p>{$_item.descr}</p>
					<a href="{url module=discuss action=category id=$_key}">zobacz wszystkie tematy</a>
				</li>
				
				<li>
					<ul>
						<li>
							{if $posts[$_key].author_id|avatar}
								<p class="avatar"><img src="{$posts[$_key].author_id|avatar}" alt="{$posts[$_key].nick}">{$posts[$_key].nick}</p>
							{else}
								<p {if in_array($posts[$_key].author_id, $adminIds)} class="nick sa"{else} class="nick" data-initial="{$posts[$_key].nick|truncate:1:""}"{/if}>{$posts[$_key].nick}</p>
							{/if}
							<p>{$posts[$_key].create_date|date_format:"%d-%m-%Y"}</p>
							<p>({$posts[$_key].create_date|date_format:"%H:%M:%S"})</p>
						</li>
						<li>
							<div>
								<a href="{url module=discuss action=thread id=$posts[$_key].id}">
									<h6>{$posts[$_key].topic}</h6>
									<p>{$posts[$_key].content|strip_tags:false|truncate:160|hideEmails}</p>
								</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		{/foreach}
	</div>
</div>