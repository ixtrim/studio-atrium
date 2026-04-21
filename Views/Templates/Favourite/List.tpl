<div class="list-header activated">
	<div>
		<div class="header-wrapper">
			<div>
				<h1><span>Ulubione</span></h1>
				<p>
					Poniżej znajdują się projekty dodane do ulubionych. Dostępny jest formularz umożliwiający wysłanie linków do projektów na wybrany adres e-mail. Wybrane dowolne 3 projekty z Ulubionych można porównać na osobnej podstronie w formie zestawienia tabelarycznego.
				</p>
			</div>
		</div>
	</div>
</div>

{if $list}
<div class="wrapper">
	<div class="box">
		<ul class="actions">
			<li><span class="remove-all">Usuń wszystkie</span></li>
			<li><span class="share-links">Prześlij znajomemu</span></li>
			<li>
				<span class="check-by">Zaznacz za pomocą:</span>
				<a class="framed" href="{url module=favourite action=compare}">Porównaj zaznaczone</a>
			</li>
		</ul>
	</div>
</div>

<div class="container" id="project-list">
	<section>
		<div class="list-grid fav-wrapper" id="overlay-group">
		{foreach $list as $_project}
			<div>
				<figure>
					<img src="{image type=render project=$_project size=box}" alt="{$_project.name}">
					<figcaption>
						<a href="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}">
							<span>projekt domu {if $_project.params_general|hasFloor:true}piętrowego{elseif $_project.params_general|hasLoft:true}z poddaszem{elseif $_project.params_general|isGroundFloor:true}parterowego{/if}{if $isLocal} {$_project.symbol_alpha} {$_project.symbol_num}{/if}</span>
							<strong>{$_project.name} <span>{$_project.params_general|usableArea} m<sup>2</sup></span></strong>
						</a>
					</figcaption>
				</figure>
				
				<span class="overview" data-id="{$_project.id}" data-idx="{$_project@index}" data-img="{image type=render project=$_project size=presentation}" data-ground="{image type=sketch project=$_project}"{if $_project.params_general|hasFloor:true} data-floor="{image type=sketch project=$_project storey=1st_floor}"{/if}{if $_project.params_general|hasLoft:true} data-loft="{image type=sketch project=$_project storey=loft}"{/if} data-link="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}" data-price="{if $_project.discount}<strike>{$_project.price}</strike> {$_project.price-$_project.discount}{else}{$_project.price}{/if}" data-name="{$_project.name}" data-area="{$_project.params_general|usableArea}" data-parcel="{$_project.params_general|parcelWidth} x {$_project.params_general|parcelHeight}" data-height="{$_project.params_general|houseHeight}" data-angle="{$_project.params_general|roofAngle}" data-version="{if $_project.type == 'skeleton'}wersja szkieletowa{else}wersja murowana{/if}" data-rooms="{$_project.params_general|roomCount}" data-txt="{$_project.short_description}"></span>
				<span id="compare-{$_project.id}" class="forcompare{if in_array($_project.id, $comparedIds)} on{/if}" data-id="{$_project.id}"></span>
				<span id="fav-{$_project.id}" class="forfav on isList" data-id="{$_project.id}"></span>
				
				{if $_project|isNew || $_project.discount}
				<div>
					{if $_project.discount}<span class="discount">rabat {$_project.discount}</span>{/if}{if $_project|isNew}<span class="new">nowość</span>{/if}
				</div> 
				{/if}
			</div>
		{/foreach}
		</div>
	</section>
</div>

<div class="wrapper">
	<div class="box">
		<ul class="actions">
			<li><span class="remove-all">Usuń wszystkie</span></li>
			<li><span class="share-links">Prześlij znajomemu</span></li>
			<li>
				<span class="check-by">Zaznacz za pomocą:</span>
				<a class="framed" href="{url module=favourite action=compare}">Porównaj zaznaczone</a>
			</li>
		</ul>
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
				<img id="over-img" src="/img/dummy.png" width="1350" height="900" alt="Render">
			</a>
		</div>
		
		<ul id="over-params">
			<li><h6 id="over-name"></h6></li>
			<li class="small"><span id="over-txt"></span></li>
			<li><span id="over-version"></span></li>
			<li><p>ilość pokoi: <span id="over-rooms"></span></p></li>
			<li><p>powierzchnia użytkowa: <span id="over-area"></span> m<sup>2</sup></p></li>
			<li><p>min. wymiary działki: <span id="over-parcel"></span> m</p></li>
			<li><p>wysokość budynku: <span id="over-height"></span> m</p></li>
			<li><p>kąt nachylenia dachu: <span id="over-angle"></span></p></li>
			<li><p>cena projektu: <span id="over-price"></span> zł</p></li>
			<li><a href="" class="more">Zobacz szczegóły</a></li>
		</ul>
		
		<button type="button" class="overlay-change prev" id="prev-overlay">poprzedni</button>
		<button type="button" class="overlay-change next" id="next-overlay">następny</button>
	</div>
	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div>

<div class="blue-overlay" id="links-pop">
	<div id="links-wrapper">
		<h4>Prześlij znajomemu</h4>
		
		<p class="nocaps">Wypełnij poniższy formularz i prześlij wiadomość znajomemu.</p>
		
		<form method="post" action="{url module='favourite' action='send'}" id="links-form">
			<input name="module" type="hidden" value="favourite">
			<input name="action" type="hidden" value="send">

			<p>
				<label for="receiver-email" class="black">E-mail odbiorcy</label>
				<input type="text" name="receiver_email" id="receiver-email" class="long">
			</p>

			<p>
				<label for="sender-email" class="black">Twój e-mail</label>
				<input type="text" name="sender_email" value="{$user.email}" id="sender-email" class="long">
			</p>
			
			<p>
				<label for="links-message" class="black">Treść wiadomości</label>
				<textarea name="message" id="links-message" cols="1" rows="1">{$message}</textarea>
			</p>
			
			<p>
				<label for="sender-sign" class="black">Twój podpis</label>
				<input type="text" name="signature" value="{$user.name} {$user.surname}" id="sender-sign" class="long">
			</p>
			
			<p class="last"><input id="links_button" type="submit" value="wyślij" class="baton"></p>
			<p class="nocaps" id="links-fail-box" style="display: none;">Wypełnij poprawnie formularz</p>
		</form>
	</div>
	<button type="button" id="share-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>
{else}
<div class="wrapper">
	<div class="box center">
		<p class="no-result">Nie masz projektów w ulubionych.</p>
		<p>Znajdź projekty na listach kategorii lub skorzystaj z wygodnej wyszukiwarki i dodaj projekty do Ulubionych, by móc do nich wrócić w każdym momencie.</p>
		
		<p class="no-result-ib"><img src="/img/nofav.png" alt=""></p>
	</div>
</div>
{/if}