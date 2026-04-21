(function()
{
	var _isLocked = false;
	
	$(document).ready(function()
	{
		$('span.print').on('click', function(event) 
		{
			var docid = $(event.target).data('docid');

			var printPop = window.open('/drukuj/artykuly/' + docid + '.html', 'wydrukujDokument', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=660,height=500');
			printPop.focus();
		});
		
		$('.net').on('click', function()
		{
			$('#links-pop').addClass('open');
			
			if(Utils.isPopHeigherThanViewport($('.blue-overlay.share')[0])) {
				$('body').addClass('noScroll');
			}
		});
		
		$('#share-overlay-close').on('click', function()
		{
			$('#links-pop').removeClass('open');
			
			if($('body').hasClass('noScroll')) {
				$('body').removeClass('noScroll');
			}
		});
		
		$('#links-form').on('submit', function(event)
		{
			event.preventDefault();

			
			if(!_isLocked) {
				
				_isLocked = true;
				
				$.ajax({
					url: '/index.php?module=article&action=send',
					data: {
						docId: $('#links-form').data('docid'),
						receiver_email: $('#receiver-email').val(),
						sender_email: $('#sender-email').val(),
						signature: $('#sender-sign').val()
					},
					type: 'post',
					dataType: 'json',
					
					beforeSend: function() {
						$('#links-fail-box').hide();
					},
					
					success: function(response)
					{
						switch (response.status) {
						case 'ok':
							$('#links-fail-box').html('Wiadomość została wysłana.');
							break;
							
						case 'error':
							$('#links-fail-box').html('Nie udało się wysłać wiadomości. Spróbuj ponownie, bądź skontaktuj się z nami telefonicznie.');
							break;
							
						default:
							$('#links-fail-box').html('Wypełnij poprawnie formularz kontaktowy.');
						}
						
						$('#links-fail-box').show();
					},
					
					complete: function()
					{
						_isLocked = false;
					}
				});
			}
		});
		
		if(typeof $.fancybox == 'object') {

			$('.fancy').on('click', function()
			{
				$.fancybox.open($('.gallery'));
			});
		}
	});
})();