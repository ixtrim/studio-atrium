(function()
{
	$(document).ready(function()
	{
		var width = $(window).width() > 1240 ? 1240 : $(window).width();
		
		$('#table-scroll-box').css('max-width', width);
		
		$('#compare-table').clone(true).appendTo('#table-scroll-box').addClass('clone'); 
		
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
		
		_setSwipe()
	});
	
	$(window).resize(function()
	{
		var width = $(window).width() > 1240 ? 1240 : $(window).width();
		
		$('#table-scroll-box').css('max-width', width);
		
		_setSwipe()
	});
	
	
	function _setSwipe()
	{
		var box = $('#table-scroll-box')[0];
		box.scrollWidth > box.clientWidth ? $('#swipe').show() : $('#swipe').hide();
	}
})();
