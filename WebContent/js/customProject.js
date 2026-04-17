(function()
{
	var _isLocked = false;
	
	$(document).ready(function()
	{
	
		$('#custom-project-form').on('submit', function(event)
		{
			event.preventDefault();

			if(!_isLocked && Validator.isValidated(this)) {
				$.ajax({
					url: '/index.php?module=varia&action=send_custom_project',
					data: $(this).serialize(),
					type: 'post',
					dataType: 'json',
					
					beforeSend: function() {
						_isLocked = true;
						$('#cp-waiter').show();
					},
					
					success: function(response)
					{
						if(response.feedback.status == 'ok') {
							MessageBox.setMessage('Dziękujemy za wysłanie koncepcji projektu. Prosimy czekać na naszą odpowiedź.');
							
							$('#cp-send-button').attr('disabled', true);
							
						} else {
							MessageBox.setMessage('Niestety nie udało się wysłać koncepcji projektu. Spróbuj skontaktować się z nami telefonicznie.', 'error');
						}
						
						_isLocked = false;
						$('#cp-waiter').hide();
					}
				});
			}
		});
	});
})();