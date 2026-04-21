<div class="list-header realisation activated">
	<div>
		<div class="header-wrapper">
			<div>
				<h1><span>Alfabetyczna lista projektów</span></h1>
				<p>Poniżej znajduje się ułożona alfabetycznie lista projektów domów z naszej oferty wraz z powierzchnią użytkową.</p>
			</div>
		</div>
	</div>
</div>
<div class="control-box">
	<ul>
		<li class="path"><a href="/">projekty domów</a> &raquo; <a href="/projekty-domow/" class="all">wszystkie projekty domów</a> &raquo; alfabetycznie &raquo; <strong>{$letter}</strong></li>
	</ul>
	<nav class="alphabet">Wybierz literę alfabetu:
	<div>
		<a href="/alfabetyczna-lista-projektow/"{if $letter == 'A'} class="selected"{/if}>A</a>
		<a href="/alfabetyczna-lista-projektow/B"{if $letter == 'B'} class="selected"{/if}>B</a>
		<a href="/alfabetyczna-lista-projektow/C"{if $letter == 'C'} class="selected"{/if}>C</a>
		<a href="/alfabetyczna-lista-projektow/D"{if $letter == 'D'} class="selected"{/if}>D</a>
		<a href="/alfabetyczna-lista-projektow/E"{if $letter == 'E'} class="selected"{/if}>E</a>
		<a href="/alfabetyczna-lista-projektow/F"{if $letter == 'F'} class="selected"{/if}>F</a>
		<a href="/alfabetyczna-lista-projektow/G"{if $letter == 'G'} class="selected"{/if}>G</a>
		<a href="/alfabetyczna-lista-projektow/H"{if $letter == 'H'} class="selected"{/if}>H</a>
		<a href="/alfabetyczna-lista-projektow/I"{if $letter == 'I'} class="selected"{/if}>I</a>
		<a href="/alfabetyczna-lista-projektow/J"{if $letter == 'J'} class="selected"{/if}>J</a>
		<a href="/alfabetyczna-lista-projektow/K"{if $letter == 'K'} class="selected"{/if}>K</a>
		<a href="/alfabetyczna-lista-projektow/L"{if $letter == 'L'} class="selected"{/if}>L</a>
		<a href="/alfabetyczna-lista-projektow/M"{if $letter == 'M'} class="selected"{/if}>M</a>
		<a href="/alfabetyczna-lista-projektow/N"{if $letter == 'N'} class="selected"{/if}>N</a>
		<a href="/alfabetyczna-lista-projektow/O"{if $letter == 'O'} class="selected"{/if}>O</a>
		<a href="/alfabetyczna-lista-projektow/P"{if $letter == 'P'} class="selected"{/if}>P</a>
		<a href="/alfabetyczna-lista-projektow/Q"{if $letter == 'Q'} class="selected"{/if}>Q</a>
		<a href="/alfabetyczna-lista-projektow/R"{if $letter == 'R'} class="selected"{/if}>R</a>
		<a href="/alfabetyczna-lista-projektow/S"{if $letter == 'S'} class="selected"{/if}>S</a>
		<a href="/alfabetyczna-lista-projektow/T"{if $letter == 'T'} class="selected"{/if}>T</a>
		<a href="/alfabetyczna-lista-projektow/U"{if $letter == 'U'} class="selected"{/if}>U</a>
		<a href="/alfabetyczna-lista-projektow/W"{if $letter == 'W'} class="selected"{/if}>W</a>
		<a href="/alfabetyczna-lista-projektow/V"{if $letter == 'V'} class="selected"{/if}>V</a>
		{*<a href="/alfabetyczna-lista-projektow/X"{if $letter == 'X'} class="selected"{/if}>X</a>*}
		{*<a href="/alfabetyczna-lista-projektow/Y"{if $letter == 'Y'} class="selected"{/if}>Y</a>*}
		<a href="/alfabetyczna-lista-projektow/Z"{if $letter == 'Z'} class="selected"{/if}>Z</a>
		{*<a href="/alfabetyczna-lista-projektow/4"{if $letter == '4'} class="selected"{/if}>4</a>*}
	</div>
</nav>
</div>

{include file="Project/searchDisplayList.tpl"}

{*
<div class="container" id="selfie-list">
	<section>
		<div class="grid">
			<ul>
			{foreach $list as $_project}
				<li><a href="{url module=project action=item id=$_project.id link_title=$_project.name catalog='projekty-domow'}">{$_project.name}</a> ({$_project.params_general|usableArea} m<sup>2</sup>)</li>
			{/foreach}
			</ul>
		</div>
	</section>
</div>
*}