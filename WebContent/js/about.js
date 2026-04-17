(function()
{
	var _selected = undefined,
		_isWrapped = false;
	
	$(document).ready(function()
	{
		$('#holder li').on('click', _show);
		
		enquire.register("screen and (max-width: 799px)", {
			match : function() 
			{
				_isWrapped = true;
		    },
			unmatch : function() 
			{
				_isWrapped = false;
		    }
		});
		
		
		if(typeof $.fancybox == 'object') {
			$('span.ajaxgallery').click(function()
			{
				$.ajax({
			        url: '/index.php?module=varia&action=get_about_gallery&entryId=' + $(this).data('entry') + '&gid=' + $(this).data('gid'),
					type: 'post',
					dataType: 'json',
			        success : function(data)
			        {
			        	$.fancybox.open(data.data, {
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
							}
			        	});
			        }
				});
				
				return false;
			});
		}
	});
	
	
	function _show(event)
	{
		var trigger = event.delegateTarget;
		
		if(_selected && trigger.id != _selected) {
			$('#' + _selected + '-box').slideUp();
			$('#holder span.selected').removeClass('selected');
		}
		
		$('#' + trigger.id + '-box').slideDown();
		$('#' + trigger.id + ' span').addClass('selected');
		
		_selected = trigger.id;
		
		if(_isWrapped) {
			$('html, body').animate({
		        scrollTop: $('#works-wrapper').offset().top - 80
		    }, 500);
		}
	}
})();
