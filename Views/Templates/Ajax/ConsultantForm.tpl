<div id="consultant-form-box" class="blue-overlay help !bg-[var(--brand-blue)] !text-white !inset-0 !h-full !w-full !max-w-none !p-4 sm:!p-6 !overflow-y-auto">
	<div id="help-wrapper" class="!relative !mx-auto !my-6 sm:!my-10 !max-w-[560px] xl:!max-w-[800px] !w-full !px-5 sm:!px-8 !py-8 sm:!py-10 !text-left !text-[18px] !font-normal !leading-[24px] !text-white">
		<div class="!mb-5 !flex !items-center !gap-3">
			<img src="/img/consultant.png" alt="" width="56" height="56" class="!h-14 !w-14 !shrink-0 !rounded-full !object-cover">
			<h4 class="!m-0 !text-[28px] !font-semibold !uppercase !leading-tight !tracking-tight !text-white sm:!text-[32px]">Konsultant</h4>
		</div>

		<p class="!m-0 !mb-6 !max-w-none !text-[18px] !font-normal !leading-[24px] !text-white !normal-case">
		{if $project}
			Masz dodatkowe pytania dotyczące projektu <strong class="!font-bold !text-white">{if $project.name}{$project.name|escape}{else}{$project.symbol_alpha|escape} {$project.symbol_num|escape}{/if}</strong>? Napisz do nas — my odpowiemy.
		{else}
			Nie znalazłeś projektu, jakiego szukałeś? Opisz go nam! Postaramy się go znaleźć dla Ciebie. Masz dodatkowe pytania? Wystarczy je napisać — my odpowiemy.
		{/if}
		</p>

		<form method="post" action="{url module='contact' action='send'}" id="consultant-form" class="!m-0 !mt-0 !border-0 !border-t !border-solid !border-white/25 !pt-6 !text-left">
			<input type="hidden" id="cons_project_id" name="project_id" value="{if $project}{$project.id}{else}0{/if}">
			<input name="module" type="hidden" value="contact">
			<input name="action" type="hidden" value="send">

			<div class="!mb-4">
				<label for="cons_name" class="!mb-1.5 !block !w-auto !text-left !text-[14px] !font-semibold !leading-snug !text-white">Twoje imię</label>
				<input type="text" name="name" id="cons_name" class="!m-0 !box-border !h-11 !w-full !max-w-full !border-0 !bg-white !px-4 !py-3 !text-[16px] !leading-normal !text-[#222] !outline-none focus:!ring-2 focus:!ring-white/40">
			</div>

			<div class="!mb-4">
				<label for="cons_email" class="!mb-1.5 !block !w-auto !text-left !text-[14px] !font-semibold !leading-snug !text-white">Twój adres e-mail</label>
				<input type="text" name="email" id="cons_email" class="!m-0 !box-border !h-11 !w-full !max-w-full !border-0 !bg-white !px-4 !py-3 !text-[16px] !leading-normal !text-[#222] !outline-none focus:!ring-2 focus:!ring-white/40">
			</div>

			<div class="!mb-4">
				<label for="cons_query" class="!mb-1.5 !block !w-auto !text-left !text-[14px] !font-semibold !leading-snug !text-white">Twoje zapytanie</label>
				<textarea name="query" id="cons_query" rows="5" class="!m-0 !box-border !h-auto !min-h-[120px] !w-full !max-w-full !resize-y !border-0 !bg-white !px-4 !py-3 !text-[16px] !leading-normal !text-[#222] !outline-none focus:!ring-2 focus:!ring-white/40"></textarea>
			</div>

			<div class="!mb-5 !flex !items-start !gap-3 !text-[13px] !font-normal !leading-snug !text-white !normal-case">
				<input type="checkbox" name="accept" id="consultant-accept" value="on" class="!mt-0.5 !block !h-4 !w-4 !shrink-0 !accent-white">
				<label for="consultant-accept" class="!m-0 !inline !w-auto !cursor-pointer !bg-none !p-0 !text-left !text-[13px] !font-normal !leading-snug !text-white !no-underline">
					Wyrażam zgodę na przetwarzanie moich danych osobowych w celu otrzymania odpowiedzi zgodnie z oświadczeniem.
					<span class="ajax-info !cursor-pointer !underline !text-white hover:!text-white/80" data-url="{url module=ajax action=get_consultant_regulations}">Szczegóły</span>
				</label>
			</div>

			<div class="!relative !m-0 !mb-2 !ml-0 !flex !items-center !justify-end !gap-3">
				<img src="/img/waiter-white.gif" alt="Wysyłanie formularza" id="cons-loader" class="!static !m-0 !h-6 !w-6" style="display:none">
				<input id="cons_button" type="submit" value="Wyślij" class="baton !m-0 !inline-flex !h-11 !w-full !cursor-pointer !items-center !justify-center !border-0 !bg-[var(--brand-red)] !px-6 !text-[14px] !font-bold !uppercase !tracking-wide !text-white hover:!bg-[var(--brand-red-hover)] sm:!w-auto sm:!min-w-[160px]">
			</div>
			<p id="contact-fail-box" class="!m-0 !mt-2 !text-[14px] !font-normal !leading-[20px] !text-[#ffd0d0] !normal-case" style="display:none">Wypełnij poprawnie formularz</p>
		</form>

		<p class="!m-0 !mt-6 !max-w-none !text-[18px] !font-normal !leading-[24px] !text-white !normal-case">
			Możesz także skorzystać z infolinii. Konsultant pomoże Ci wybrać projekt i załatwi wszelkie formalności z zamówieniem!
		</p>
		<p class="!m-0 !mt-3 !max-w-none !text-[18px] !font-normal !leading-[24px] !text-white !normal-case">
			Numer naszego konsultanta
			<a href="tel:+48338229496" rel="nofollow" class="!text-white !underline hover:!text-white/85"><strong class="!font-bold !text-white">33 822 94 96</strong></a>
		</p>
	</div>

	<button type="button" id="help-overlay-close" class="blue-overlay-close !top-4 !right-4 !flex !h-auto !w-auto !items-center !gap-2 !overflow-visible !border-0 !bg-transparent !p-0 !text-[14px] !font-semibold !text-white !indent-0" style="text-indent:0">
		<span class="close-x !static !h-auto !w-auto !text-[18px] !leading-none !text-white" aria-hidden="true">✖</span>
		<span class="!text-white">Zamknij</span>
	</button>
</div>
