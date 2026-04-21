(function()
{
	var _isLocked = false;
	
	$(document).ready(function()
	{
		$('#promo-info').on('change', function()
		{
			if(!_isLocked) {
				$.ajax({
					url: '/index.php?module=ajax&action=user_promo_info',
						type: 'post',
						data: {
							status: $(this).is(':checked') ? 1 : 0
						},
						dataType: 'json',
						
						beforeSend: function() {
							_isLocked = true;
						},
						
						success : function(data)
						{
							_isLocked = false;
						}
				});
			}
		});
	});
})();
