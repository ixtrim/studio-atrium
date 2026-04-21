<div>
	<div class="nav" id="plan-nav" data-id="{$project.id}">
		<div class="box">
			<ul id="icon-box">
				<li>
					<h3><a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}">{$project.name}</a></h3>
				</li>
				<li>
					<span id="sketch-trigger" class="mode on">usytuowanie na działce</span>
					<span id="sun-trigger" class="mode">doświetlenie</span>
				</li>
				<li class="mobile-trigger-box" id="mobile-trigger-box">
					<span id="mobile-opts-trigger"></span>
				</li>
				<li>
					<span id="info-trigger" class="info-icon"></span>
				
					<div id="print-box">
						<form id="plot-print-form" action="{url module=pdf action=plot}" method="post">
							<input type="hidden" name="id" value="{$project.id}">
							<input type="hidden" name="img_data" id="img-data">
							<span class="print-icon" id="print-trigger"></span>
						</form>
					</div>
					
					<a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}" id="mobile-close">&nbsp;</a>
				</li>
			</ul>
	
			<div id="sketch-opts-wrapper">
				<ul id="sketch-opts-box">
					<li><span class="size">Początkowe wymiary działki:</span></li>
					<li><label for="plot-width">szerokość (m):</label><input class="num" id="plot-width" type="text" value="25" name="width" autocomplete="off"></li>
					<li><label for="plot-height">głębokość (m):</label><input class="num" id="plot-height" type="text" value="40" name="height" autocomplete="off"></li>
			
					<li><span id="size-trigger" class="wired">Akceptuj</span></li>
					<li class="wide two"><span id="reset-trigger" class="wired">Resetuj</span></li>
					<li><span class="road">Droga dojazdowa po stronie</span></li>
					<li>
						<div class="jui-select-box dark" id="road-box">
							<select name="road" id="road" autocomplete="off">
								<option value="N">północnej</option>
								<option value="E">wschodniej</option>
								<option value="S">południowej</option>
								<option value="W">zachodniej</option>
							</select>
						</div>
					</li>
					
					{if $projectParams|hasMirror}
					<li>
						<input type="radio" name="sketch" value="normal" id="normal"{if $request.version == 'normal'} checked{/if}><label for="normal">wersja podstawowa</label>
						<input type="radio" name="sketch" value="mirror" id="mirror"{if $request.version == 'mirror'} checked{/if}><label for="mirror">odbicie lustrzane</label>
					</li>
					{/if}
					
					<li class="wide three">
						<span id="save-trigger" class="baton">Zapamiętaj</span>
					</li>
				</ul>
			</div>	
			{*
			<div id="storey-box" style="display: none;">
				<input type="radio" class="storey" name="storey" value="0" id="storey-0" checked><label for="storey-0">Pierwsza kondygnacja</label>
				<input type="radio" class="storey" name="storey" value="1" id="storey-1" style="display: none;"><label for="storey-1" id="storey-1-label" style="display: none;">Druga kondygnacja</label>
				<input type="radio" class="storey" name="storey" value="2" id="storey-2" style="display: none;"><label for="storey-2" id="storey-2-label" style="display: none;">Trzecia kondygnacja</label>
				
				<img id="storey-loader" src="/img/loader.gif" alt="" style="display: none;">
			</div>
			*}
		</div>
		<div class="box">
			<div id="info-txt" style="display: none;">
				<ul>
					<li>Wybierz początkowe wymiary działki (domyślnie działka ma wymiary 25m x 40 m). Uwaga! Będziesz mógł je potem zmodyfikować. Kliknij przycisk AKCEPTUJ.</li>
					<li>Za pomocą ikon „łapek” ustaw rzeczywistą wielkość i kształt Twojej działki. Następnie wybierz stronę drogi dojazdowej i wersję projektu. Jeśli chcesz zapamiętać te ustawienia (także na przyszłość) kliknij przycisk ZAPAMIĘTAJ.</li>
					<li>Po wstawieniu domu, można go dowolnie usytuować na działce. Minimalne odległości od granic zostały zaznaczone niebieskim polem (adekwatnie do większości przypadków). Należy jednak pamiętać, że ostateczną odległość od granicy działki określa miejscowy plan zagospodarowania lub warunki zabudowy.</li>
					<li>Przycisk RESETUJ przywraca stan początkowy.</li>
					<li>Po usytuowaniu domu możesz kliknąć ikonę ze Słońcem - DOŚWIETLENIE, by zobaczyć które pomieszczenia i w jakim stopniu będą rozświetlone przez słońce o różnych porach dnia. Za pomocą myszki poruszaj grafiką Słońca. Uwaga! Strony świata wskazuje kompas z lewej, górnej strony.</li>
					<li>W każdej chwili możesz wrócić do planowania na działce za pomocą linka USYTUOWANIE NA DZIAŁCE.</li>
				</ul>
				
				<p><span id="close-info">zamknij</span></p>
			</div>
		</div>
	</div>
{*	
	<div class="wrapper" id="sun-hide">
		<div class="box center">
			<p class="info">Usytuowanie projektu <a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}">{$project.name}</a> na działce</p>
			<p>Ta funkcja nie jest dostępna dla rozdzielczości z jaką pracuje Twoja przeglądarka.</p>
		</div>
	</div>
*}
</div>

<div class="box sun-wrapper" id="sun-wrapper">

	<div id="storey-box" style="display: none;">
		<input type="radio" class="storey" name="storey" value="0" id="storey-0" checked><label for="storey-0">Pierwsza kondygnacja</label>
		<input type="radio" class="storey" name="storey" value="1" id="storey-1" style="display: none;"><label for="storey-1" id="storey-1-label" style="display: none;">Druga kondygnacja</label>
		<input type="radio" class="storey" name="storey" value="2" id="storey-2" style="display: none;"><label for="storey-2" id="storey-2-label" style="display: none;">Trzecia kondygnacja</label>
				
		<img id="storey-loader" src="/img/loader.gif" alt="" style="display: none;">
	</div>

	<div id="canvas-box">
		<canvas id="canvas"></canvas>
		
		<div id="plot-controls" style="display: none;">
			<div id="p0" data-idx="0"></div>
			<div id="p1" data-idx="1"></div>
			<div id="p2" data-idx="2"></div>
			<div id="p3" data-idx="3"></div>
		</div>
		
		<div id="img-box" style="display: none;"></div>
		<div id="controls" style="display: none;">
			<div id="rotate"></div>
		</div>
		
		<div id="sun" style="display: none;"></div>
		
		<div id="time-box">
			<div id="windrose"></div>
		</div>
		
		<div id="timer" style="display: none;">
			<p>20 czerwca, słonecznie</p>
			<p id="time">12:00</p>
		</div>
	</div>
</div>

<div id="sun-trigger-box"><span id="sun-trigger-bottom">doświetlenie</span></div>
