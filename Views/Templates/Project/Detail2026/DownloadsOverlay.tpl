{* Downloadable files overlay — same options as legacy #dload-list / live Pliki tab *}
<div id="proj-dload-overlay" class="blue-overlay" aria-hidden="true">
	<div class="form-wrapper" id="proj-dload-wrapper">
		<h4>Pliki do pobrania</h4>

		{if $user}
			{if $project.attachments.ProjectFile || $projectParams|isAvailable || (!$noestimate && $project.type != 'skeleton')}
				<ul class="proj-dload-list">
					{if $projectParams|isAvailable}
						<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=sketch order=1}" data-call="ProjectRequest.registerRequestForm">Zamów rysunki szczegółowe</span></li>
						<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=materials order=1}" data-call="ProjectRequest.registerRequestForm">Zamów zestawienie materiałów</span></li>
						{if $project.type != 'skeleton'}
						<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=parcel_dwg order=1}" data-call="ProjectRequest.registerRequestForm">Zamów obrys dwg</span></li>
						<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=parcel_pdf order=1}" data-call="ProjectRequest.registerRequestForm">Zamów obrys pdf</span></li>
						{/if}
						<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=woodwork order=1}" data-call="ProjectRequest.registerRequestForm">Zamów zestawienie stolarki</span></li>
					{/if}
					{if !$noestimate && $project.type != 'skeleton'}
					<li><span class="ajax-info" data-url="{url module=project action=get_request_form type=estimate order=2}" data-call="ProjectRequest.registerGenRequestForm">Pobierz szacunkowy kosztorys</span></li>
					{/if}
				</ul>
			{else}
				<p class="pop-lead">Nie znaleziono plików do pobrania dla tego projektu.</p>
			{/if}
		{elseif $projectParams|isAvailable}
			<p class="pop-lead">
				Aby pobrać <strong>rysunki szczegółowe</strong>{if $project.type != 'skeleton' && !$noestimate}, <strong>kosztorys szacunkowy</strong>{/if}, <strong>obrysy domu</strong> lub <strong>zestawienie materiałów</strong> do tego projektu,
				<a href="javascript:" class="account login-trigger">zaloguj się do swojego konta</a> i otwórz ponownie listę plików.
			</p>
		{elseif !$noestimate && $project.type != 'skeleton'}
			<p class="pop-lead">
				Aby pobrać <strong>kosztorys szacunkowy</strong> do tego projektu,
				<a href="javascript:" class="account login-trigger">zaloguj się do swojego konta</a> i otwórz ponownie listę plików.
			</p>
		{else}
			<p class="pop-lead">Nie znaleziono plików do pobrania dla tego projektu.</p>
		{/if}
	</div>

	<button type="button" id="proj-dload-overlay-close" class="blue-overlay-close">
		<span class="close-x" aria-hidden="true">✖</span>
		<span>Zamknij</span>
	</button>
</div>
