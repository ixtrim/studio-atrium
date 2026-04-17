(function()
{
	$(document).ready(function()
	{
		if(typeof $.fancybox == 'object') {
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
		
		$('.mobile-sadie').on('click', function(event)
		{
			event.stopPropagation();
		});
	});
})();