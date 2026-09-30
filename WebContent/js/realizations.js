(function()
{
	$(document).ready(function()
	{
		if(typeof $.fancybox == 'object') {
			$("[data-fancybox]").fancybox({
				loop: true,
				toolbar: true,
				buttons: ['slideShow', 'fullScreen', 'thumbs', 'close'],
				thumbs: { autoStart: false, hideOnClose: true },
				slideShow: { autoStart: false, speed: 4000 },
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
		
		$('.mobile-sadie').on('click', function(event)
		{
			event.stopPropagation();
		});
	});
})();