<div class="form-wrapper" id="file-request-form-box">
	<p class="nocaps">
		{if $request.type == 'sketch'}
			{if $request.order == 1}Zamów{else}Pobierz{/if} rysunki szczegółowe do projektu
		{elseif $request.type == 'materials'}
			{if $request.order == 1}Zamów{else}Pobierz{/if} zestawienie materiałów do projektu
		{elseif $request.type == 'woodwork'}
			{if $request.order == 1}Zamów{else}Pobierz{/if} zestawienie stolarki
		{elseif $request.type == 'cost_extract'}
			Pobierz wyciąg z kosztorysu inwestorskiego
		{elseif $request.type == 'estimate'}
			Pobierz szacunkowy kosztorys budowlany
		{/if}	
	</p>
	<p class="notice">Uwaga! 
		{if $request.type == 'sketch' || $request.type == 'woodwork'}
			Rysunki objęte są prawami autorskimi Studia Atrium. Służą jedynie celom poglądowym, zabrania się je powielać i wykorzystywać w celach projektowych.
		{elseif $request.type == 'materials'}
			Zestawienie materiałów objęte jest prawami autorskimi Studia Atrium. Służy jedynie celom poglądowym, zabrania się go powielać i wykorzystywać w celach projektowych.
		{elseif $request.type == 'estimate'}
			Wartość kosztowa powstaje poprzez przemnożenie powierzchni budynku przez wskaźnikową cenę metra kwadratowego w oparciu o średnie ceny krajowe przy założeniu standardu wykończenia na poziomie średnim. Wyliczenia te nie biorą pod uwagę specyfiki konkretnego projektu, jak stopień skomplikowania bryły budynku, typ dachu, rodzaj zastosowanej stolarki okiennej czy materiałów wykończeniowych, a jedynie powierzchnię budynku. Kosztorys objęty jest prawami autorskimi Studia Atrium, zabrania si?? go powielać.
		{elseif $request.type == 'cost_extract'}
			Przedstawione wartości pochodzą z kosztorysu inwestorskiego sporządzonego w okresie opisanym przy przedstawionych na stronie projektu kwotach, według średnich stawek Sekocenbudu. Kosztorys objęty jest prawami autorskimi Studia Atrium, zabrania się go powielać.
		{elseif $request.type == 'parcel_dwg' || $request.type == 'parcel_pdf'}
			Obrys budynku wykonany jest w skali 1:500 by w łatwy sposób sprawdzić usytuowanie domu na mapie do celów projektowych.
		{/if}
		<br><br><strong style="font-size: 2rem;">Materiały zostaną wysłane e-mailem w tym samym, najpóźniej w kolejnym dniu roboczym. W razie braku wiadomości, prosimy poszukać jej w folderze SPAM bądź innych folderach segregujących pocztę.</strong>
	</p>
	{if $request.type == 'estimate'}
	<form class="validable" method="post" action="{url module=project action=add_genfile_request}" id="file-request-form" data-call="ProjectRequest.onSend">
		<input name="action" type="hidden" value="add_genfile_request">
		<input name="token" type="hidden" id="download_token_id" value="{$smarty.now|date_format:"%H%M%S"}">
	{else}
	<form class="validable" method="post" action="{url module=project action=add_file_request}" id="file-request-form" data-call="ProjectRequest.onSend">
		<input name="action" type="hidden" value="add_file_request">
	{/if}
		<input name="module" type="hidden" value="project">
		<input name="file_type" type="hidden" value="{$request.type}" id="project_file_type">
		<input name="order" type="hidden" value="{$request.order}">
		<input type="hidden" id="fr-pid" name="project_id" value="0">

		<p>
			<label for="fr-phone" class="black">Twój nr telefonu</label>
			<input type="text" name="phone" id="fr-phone" class="long" value="{$user.props.phone}">
		</p>
		
		<div class="group-wrapper" style="display: none;">
			<span class="long">Kiedy chcesz kupić projekt?</span>
			<div class="jui-select-box white" id="fr-time-box">
				<select name="time" id="fr-time">
					<option value="">wybierz opcję</option>
					<option value="1" selected>do miesiąca</option>
					<option value="2">do 6 miesięcy</option>
					<option value="3">do roku</option>
					<option value="4">powyżej roku</option>
				</select>
			</div>
		</div>
		
		<p>
			<label for="fr-comment" class="black">Uwagi</label>
			<textarea name="comment" id="fr-comment" class="small"></textarea>
		</p>
		
		<p class="accept">
			<input type="checkbox" name="accept" id="fr-accept" value="on"> <label for="fr-accept">Wyrażam zgodę</label> na przetwarzanie moich danych osobowych w celu otrzymywania materiałów do projektu oraz informacji o promocjach i ofercie projektowej. <span class="ajax-info" data-url="{url module=ajax action=get_files_regulations}" data-scroll="ajax-regulations">Szczegóły</span>
		</p>
		
		<div class="info-box">
			<p class="nocaps info" id="fr-fail-box" style="font-weight: bold;">&nbsp;</p>
		</div>
		
		<div class="submit-box">
			<img id="fr-waiter" src="/img/waiter-white.gif" alt="Wysyłanie formularza" style="display: none;">
			<input type="submit" value="{if $request.order == 1}zamów{else}pobierz{/if}" class="baton" id="request-file-trigger">
		</div>
	</form>
</div>
