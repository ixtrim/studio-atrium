{if $list}
	<ul id="fav-list" data-count="{$list|count}">
	{foreach $list as $_project}
		<li id="fav-box-{$_project.id}">
			<ul>
				<li>
					<input type="checkbox" name="compare[]" value="{$_project.id}" id="cc-{$_project.id}"{if in_array($_project.id, $compareIds)} checked{/if}><label for="cc-{$_project.id}">&nbsp;</label>
					<a href="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}">
						<img src="{image type=render project=$_project size=thumb}" alt="Projekt - {$_project.name}">{$_project.name}
					</a>
				</li>
				<li><span class="remove fav on" data-id="{$_project.id}" data-remove="fav-box-{$_project.id}"></span></li>
			</ul>
		</li>
	{/foreach}
	</ul>

	<a href="{url module=favourite action=compare}" class="framed compare">Porównaj zaznaczone</a>
	<a href="{url module=favourite action=list}" class="framed fav-list">Lista ulubionych</a>

{else}
	<p class="msg">Nie masz ulubionych projektów.</p>
{/if}