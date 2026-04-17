var Thread = (function()
{
	var _isOpen = false,
		_isLocked = false;
	
	$(document).ready(function()
	{
		if(StorageManager.get('forum_content')) {
			$('#content').val(StorageManager.get('forum_content'));
			StorageManager.remove('forum_content');
		}
		
		if(document.location.hash == '#reply') {
			$('#post-form-wrapper').slideDown('fast');
		}
		
		$('#notify').on('change', function()
		{
			if (!$('#notify').hasClass('notShow')) {
				if($(this).is(':checked')) {
					$('#post-mail-box').slideDown('fast');
				} else {
					$('#post-mail-box').slideUp('fast');
				}
			}
		});
		
		$('#notifyMe').on('change', function()
		{
			if($(this).is(':checked')) {
				_notifyMe(true);
			} else {
				_notifyMe(false);
			}
		});
		
		$('#reply-trigger').on('click', function()
		{
			if(_isOpen) {
				$('#post-form-wrapper').slideUp('fast');
				
				$(this).html('Odpowiedz');
				$('#reply-bis-trigger').html('Odpowiedz');
			} else {
				$('#post-form-wrapper').slideDown('fast');
				$(this).html('Zamknij');
				$('#reply-bis-trigger').html('Zamknij');
			}
			
			_isOpen = !_isOpen;
			Uploader.repositionUploadForms();
		});
		
		$('#reply-bis-trigger').on('click', function()
		{
			if(_isOpen) {
				$('#post-form-wrapper').slideUp('fast');
				$(this).html('Odpowiedz');
				$('#reply-trigger').html('Odpowiedz');
			} else {
				$('#post-form-wrapper').slideDown('fast');
				$(this).html('Zamknij');
				$('#reply-trigger').html('Zamknij');
			}
			
			$('html, body').animate({
		        scrollTop: $("#forum-thread").offset().top + $("#forum-thread").height() - 60
		    }, 1000);
			
			_isOpen = !_isOpen;
			Uploader.repositionUploadForms();
		});

		$('span.postme').on('click', function()
		{
			$('#message-overlay').addClass('open');
			
			$('#message-receiver').val($(this).data('aid'));
			
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

		if(typeof $.fancybox == 'object') {
			if(!$('#render-box').length) {
				$("[data-fancybox]").fancybox({
					onActivate: function()
					{
						$('#tool-box').addClass('off');
						if(typeof Tawk_API.hideWidget == 'function') {
							Tawk_API.hideWidget();
						}
					},
					afterClose: function()
					{
						$('#tool-box').removeClass('off');
						if(typeof Tawk_API.showWidget == 'function') {
							Tawk_API.showWidget();
						}
					},
					loop: true
				});
			}
		}
		
		if ($('#expand-post').length > 0) {
			if ($('#thread-post').height()  > 72) {
				$('#thread-post').addClass('partly');
			} else {
				$('#expand-post').hide();
			}
		}
		
		$('#expand-post').on('click', function()
		{
			if($('#thread-post').hasClass('partly')) {
				$('#thread-post').removeClass('partly');
				$(this).addClass('out').text('zwiń wpis');
				
			} else {
				$('#thread-post').addClass('partly');
				$(this).removeClass('out').text('rozwiń wpis');
			}
		});

		//To jest po to aby user nie stracił treści posta gdy będzie chciał się zalogować
		$('#post-login-trigger').on('click', _cachePost);
		$('#login').on('click', _cachePost);

	});
	
	function _cachePost()
	{
		var content = $.trim($('#content').val());
		
		if(content) {
			StorageManager.store('forum_content', $.trim($('#content').val()));
		}
	}
	
	
	function _notifyMe(isNotified)
	{
		if(!_isLocked) {
			_isLocked = true;

			$.ajax({
				url: '/index.php?module=discuss&action=set_notification',
				data: {
					uid: $('#notify-uid').val(),
					pid: $('#notify-pid').val(),
					notify: isNotified ? 'yes' : 'no'
				},
				type: 'post',
				dataType: 'json',
				
				beforeSend: function() {
					$('#notify-waiter').show();
				},
				
				success: function(response)
				{
					switch (response.status) {
						case 'ok':
							MessageBox.setMessage('Zmieniono tryb powiadomień o nowych wiadomościach.');
						break;
						
						case 'error':
							MessageBox.setMessage('Niestety nie udało się zmienić trybu powiadomień o nowych wiadomościach.', 'error');
						break;
					}
				},
		
				complete: function()
				{
					$('#notify-waiter').hide();
					_isLocked = false;
				}
			});
		}
	}
	
	function _sendMessage(event)
	{
		event.preventDefault();
		
		if(!_isLocked) {
			
			_isLocked = true;

			$.ajax({
				url: '/index.php?module=discuss&action=send_message',
				data: {
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
	
	function _validate()
	{
		var response = {},
			email = undefined;
		
		if($('#notify').is(':checked') && $('#post-email').size() > 0) {
			email = $.trim($('#post-email').val());
			
			if(email == '') {
				response.email = new Array('E-mail nie może być pusty');
				
				Validator.setCallbackErrors('post-form', response);
			}
		}
	}
	
	return {
		validate: _validate
	};
})();

var ProjectCommentValidator = (function()
{
	function _validate()
	{
		var response = {},
			email = undefined;

		if($('#notify').is(':checked') && $('#post-email').size() > 0) {
			email = $.trim($('#post-email').val());
			
			if(email == '') {
				response.email = new Array('E-mail nie może być pusty');
			}
		}

		if(Object.keys(response).length > 0) {
			Validator.setCallbackErrors('comment-form', response);
		}
	}
	
	return {
		validate: _validate
	};
})();
