(function()
{
	var _isLocked = false;
	
	$(document).ready(function()
	{
		$('span.reply-post').on('click', function()
		{
			$('#message-overlay').addClass('open');
			
			$('#message-title').val('Odp.: ' + $(this).data('title'));
			
			$('#message-receiver').val($(this).data('rid'));
			$('#message-parent').val($(this).data('parent'));
			
			if(Utils.isPopHeigherThanViewport($('.blue-overlay.message')[0])) {
				$('body').addClass('noScroll');
			}
		});
		
		$('#message-overlay-close').on('click', function()
		{
			$('#message-overlay').removeClass('open');
			
			if($('body').hasClass('noScroll')) {
				$('body').removeClass('noScroll');
			}
			
			$('#message-title').val('');
			$('#message-content').val('');
			$('#message-trigger').attr('disabled', false);
			$('#message-res-box').html('');
		});
		
		$('#message-form').on('submit', _sendMessage);
	});
	
	
	function _sendMessage(event)
	{
		event.preventDefault();
		
		if(!_isLocked) {
			
			_isLocked = true;

			$.ajax({
				url: '/index.php?module=discuss&action=send_message',
				data: {
					parentId: $('#message-parent').val(),
					senderId: $('#message-sender').val(),
					receiverId: $('#message-receiver').val(),
					title: $('#message-title').val(),
					content: $('#message-content').val()
				},
				type: 'post',
				dataType: 'json',
		
				beforeSend: function() {
					$('#message-res-box').hide();
				},
		
				success: function(response)
				{
					switch (response.status) {
						case 'ok':
							$('#message-res-box').html('Wiadomość została wysłana.');
							$('#message-trigger').attr('disabled', true);
						break;
						
						case 'error':
							$('#message-res-box').html('Nie udało się wysłać wiadomości. Spróbuj ponownie, bądź skontaktuj się z nami telefonicznie.');
						break;
		
						default:
							$('#message-res-box').html('Wypełnij poprawnie formularz kontaktowy.');
					}
					
					$('#message-res-box').show();
				},
				
				complete: function()
				{
					_isLocked = false;
				}
			});
		}
	}
})();
