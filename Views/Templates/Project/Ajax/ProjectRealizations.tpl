<div class="box ajaxed" id="real-list" style="display: none;">
	{if $__projectMain}
		{if $__projectMain.attachments.ProjectRealisation || $__projectMain.attachments.ProjectBuildingInProgress || $__projectMain.attachments.ProjectRealisationInterior}
			{if $__projectMain.attachments.ProjectRealisation}
			<p>Wybudowane</p>

			<ul>
			{foreach $__projectMain.attachments.ProjectRealisation as $_item}
				<li>
					<a data-fancybox="real" data-caption="{$_item.title}{if $_item.description} - {$_item.description}{/if}" href="{image type=realisation project=$__projectMain no=$_item@index}"><img src="{image type=realisation project=$__projectMain no=$_item@index size=list}" alt="{$__projectMain.name} - realizacja {$_render@iteration}"></a>
				</li>
			{/foreach}
			</ul>
			{/if}
			
			{if $__projectMain.attachments.ProjectBuildingInProgress}
			<p>W trakcie budowy</p>
			
			<ul>
			{foreach $__projectMain.attachments.ProjectBuildingInProgress as $_item}
				<li>
					<a data-fancybox="real" data-caption="{$_item.title}{if $_item.description} - {$_item.description}{/if}" href="{image type=in_progress project=$__projectMain no=$_item@index}"><img src="{image type=in_progress project=$__projectMain no=$_item@index size=list}" alt="{$__projectMain.name} - budowa {$_render@iteration}"></a>
				</li>
			{/foreach}
			</ul>
			{/if}
		
			{if $__projectMain.attachments.ProjectRealisationInterior}
			<p>Wnętrza</p>
			
			<ul>
			{foreach $__projectMain.attachments.ProjectRealisationInterior as $_item}
				<li>
					<a data-fancybox="real" data-caption="{$_item.title}{if $_item.description} - {$_item.description}{/if}" href="{image type=realisation_interior project=$__projectMain no=$_item@index}"><img src="{image type=realisation_interior project=$__projectMain no=$_item@index size=list}" alt="{$__projectMain.name} - wnętrze {$_render@iteration}"></a>
				</li>
			{/foreach}
			</ul>
			{/if}
		{/if}
	{/if}

	{if $__project.attachments.ProjectRealisation || $__project.attachments.ProjectBuildingInProgress || $__project.attachments.ProjectRealisationInterior}
		{if $is_similar}<p>zdjęcia domu podobnego: <a href="{url module=project action=item id=$__project.id link_title=$__project.name catalog='projekty-domow'}">{$__project.name}</a></p>{/if}
		{if $__project.attachments.ProjectRealisation}
			<p>Wybudowane</p>

			{if $__project.attachments.ProjectRealisation}
			<ul>
			{foreach $__project.attachments.ProjectRealisation as $_item}
				<li>
					<a data-fancybox="real" data-caption="{$_item.title}{if $_item.description} - {$_item.description}{/if}" href="{image type=realisation project=$__project no=$_item@index}"><img src="{image type=realisation project=$__project no=$_item@index size=list}" alt="{$__project.name} - realizacja {$_render@iteration}"></a>
				</li>
			{/foreach}
			</ul>
			{/if}
		{/if}
		
		{if $__project.attachments.ProjectBuildingInProgress}
			<p>W trakcie budowy</p>
			
			<ul>
			{foreach $__project.attachments.ProjectBuildingInProgress as $_item}
				<li>
					<a data-fancybox="real" data-caption="{$_item.title}{if $_item.description} - {$_item.description}{/if}" href="{image type=in_progress project=$__project no=$_item@index}"><img src="{image type=in_progress project=$__project no=$_item@index size=list}" alt="{$__project.name} - budowa {$_render@iteration}"></a>
				</li>
			{/foreach}
			</ul>
		{/if}
		
		{if $__project.attachments.ProjectRealisationInterior}
			<p>Wnętrza</p>
			
			<ul>
			{foreach $__project.attachments.ProjectRealisationInterior as $_item}
				<li>
					<a data-fancybox="real" data-caption="{$_item.title}{if $_item.description} - {$_item.description}{/if}" href="{image type=realisation_interior project=$__project no=$_item@index}"><img src="{image type=realisation_interior project=$__project no=$_item@index size=list}" alt="{$__project.name} - wnętrze {$_render@iteration}"></a>
				</li>
			{/foreach}
			</ul>
		{/if}
	{/if}
	
	<p>Fotokonkurs</p>
	
	<div class="contest-splash">
		<img src="/img/konkurs.jpg" alt="Konkurs fotograficzny" class="resp">
	</div>
	
	<div class="contest">
		<p class="info">Wybudowałeś swój wymarzony dom wg projektu Studia Atrium? Podziel się swoją radością. Chwyć za aparat/smartfona i sfotografuj bryłę budynku z zewnątrz, dołącz także zdjęcia wnętrz - Twoje aranżacje kuchni, salonu, łazienki, sypialni na pewno zainspirują innych. Za pomocą prostego formularza prześlij do nas efekt swoich prac. Najlepsze z nich zostaną wyróżnione profesjonalną sesją fotograficzną zorganizowaną przez Studio Atrium, a właściciel domu otrzyma nagrodę w postaci ciśnieniowego ekspresu do kawy. Z Laureatami będziemy się kontaktować indywidualnie, a ich prace zostaną zaprezentowane na łamach naszej strony internetowej oraz wydawnictwa Domy w Tradycji.</p>
		
		<div>
			<p class="express">Wygraj ciśnieniowy <span>ekspres do kawy</span></p>
			<p>Delektuj się kawą zrobioną w markowym produkcie</p>
			<div class="link-box">
				<p id="long-contest-trigger"><a href="{url module=contest action=form}" class="bg">Wypełnij formularz i prześlij do nas zdjęcia</a></p>
				<p id="short-contest-trigger"><a href="{url module=contest action=form}" class="bg">Wypełnij formularz</a></p>
				<a href="{$staticStockUrl}/docs/regulamin.pdf" class="under" target="_new">regulamin</a>
			</div>
		</div>
	</div>
</div>