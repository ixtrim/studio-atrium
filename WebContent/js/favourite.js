(function()
{
	$(document).ready(function()
	{
		$('.forcompare').on('click', _compare);
		
		$('.forfav').on('click', function(event)
		{
			var trigger = $(event.target);
			Fav.fav(trigger);
		});
		
		$('.share-links').on('click', function()
		{
			$('#links-pop').addClass('open');
			
			if(Utils.isPopHeigherThanViewport($('.blue-overlay.cs')[0])) {
				$('body').addClass('noScroll');
			}
		});
		
		$('.remove-all').on('click', function()
		{
			CookieManager.setCookie('saFav', '', 365);
			CookieManager.setCookie('saCom', '', 365);
			location.reload();
		});
		
		$('#share-overlay-close').on('click', function()
		{
			$('#links-pop').removeClass('open');
			
			if($('body').hasClass('noScroll')) {
				$('body').removeClass('noScroll');
			}
			
			$('#links_button').attr("disabled", false);
			$('#links_button').removeClass("disabled");
		});
		
		$('#links-form').on('submit', function(event)
		{
			event.preventDefault();
	
			$.ajax({
				url: '/index.php?module=favourite&action=send',
				data: {
					receiver_email: $('#receiver-email').val(),
					sender_email: $('#sender-email').val(),
					signature: $('#sender-sign').val(),
					message: $('#links-message').val()
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
							$('#links_button').attr("disabled", true);
							$('#links_button').addClass("disabled");
						break;
						
						case 'error':
							$('#contact-fail-box').html('Nie udało się wysłać wiadomości. Spróbuj ponownie, bądź skontaktuj się z nami telefonicznie.');
							break;
		
						default:
							$('#contact-fail-box').html('Wypełnij poprawnie formularz kontaktowy.');
					}
					
					$('#links-fail-box').show();
				}
			});
		});
	});
	
	function _compare(event)
	{
		var trigger = $(event.target),
			cookie = CookieManager.getCookie('saCom'),
			pid = trigger.data('id') + '',
			projects = new Array();
	
		if(cookie) {
			projects = cookie.split('|');
		}
		
		idx = $.inArray(pid, projects);
		
		if(idx != -1) {
			projects.splice(idx, 1);
			trigger.removeClass('on');
		} else {
			
			if(projects.length == 3) {
				
				if($('.messageBox').size() > 0) {
					var paragraph = $('.messageBox').children('p');
						paragraph.html('Można porównać maksymalnie 3 projekty.');
					
					MessageBox.init();
				} else {
					
					var box = $(document.createElement('div')).addClass('messageBox'),
						paragraph = $(document.createElement('p')),
						close = $(document.createElement('a')).addClass('close').attr('href', 'javascript:');
					
					paragraph.html('Można porównać maksymalnie 3 projekty.');
					
					box.append(paragraph).append(close);
					$('body').prepend(box);
					
					MessageBox.init();
				}
				
				return;
			}
			
			projects.push(pid);
			trigger.addClass('on');
		}
		
		CookieManager.setCookie('saCom', projects.join('|'), 365);
	}
})();