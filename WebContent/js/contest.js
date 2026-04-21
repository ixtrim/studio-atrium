(function()
{
	var _uploadInProgress = false,
		_index = 1;
	
	$(document).ready(function()
	{
		$("#f-region").selectmenu({
			  appendTo: "#region-box"
		});
		
		$('#add-photo').on('click', function() 
		{
			if (!_uploadInProgress) {
				$('#up-file').val('');
				$('#up-file').click();
			}
		});
		
		$('#up-file').on('change', function() 
		{
			$('#submit').click();
		});
		
		$('#up-form').on('submit', function(event) 
		{
			if (!_uploadInProgress) {
				AIM.submit($('#up-form')[0], {'onStart' : _startUpload, 'onComplete' : _completeUpload});
			}
		});
		
		$('#contest-form').on('submit', _register);
	});
	
	/**
	 * On start file uploading callback
	 *
	 * @return {Boolean}
	 */
	function _startUpload() 
	{
		_uploadInProgress = true;

		return true;
	}
	
	/**
	 * On file upload callback
	 *
	 * @param {String} response Response from server
	 */
	function _completeUpload(response) 
	{
		var img = undefined,
			res = jQuery.parseJSON(response);
		
		if (res.result.status == 'ok') {
			
			img = new Image();
			img.src = res.result.thumb;
			
			img.onload = function()
			{
				$('#photos').append(
					'<li><img src="' + img.src + '" alt="">' +
					'<span id="remove_' + _index + '" data-index="' + _index + '">Usuń</span>' +
					'</li>'
				);
				
				$('#remove_' + _index).on('click', _removeImage);
				
				_index++;
				$('#photo_index').val(_index);
			};
		} else {
			MessageBox.setMessage('Nie udało się wysłać zdjęcia. Jeśli problem się powtórzy skontaktuj się z nami.', 'error');
		}
		
		$('#up-file').val('');
		
		_uploadInProgress = false;
	}
	
	
	function _removeImage(event)
	{
		var confirmed = confirm("Czy na pewno chcesz usunąć to zdjęcie?"),
			trigger = $(this);
		
		if(confirmed) {
			
			$.ajax({
				url: '/index.php?module=contest&action=remove',
				data: {
					index: trigger.data('index'),
					dir: $('#dir-name').val()
				},
				type: 'post',
				dataType: 'json',
				
				success: function(response)
				{
					switch(response.result.status) {
						case 'ok':
							trigger.off('click');
							trigger.closest('li').remove();
						break;
						case 'fail':
							
						break; 
					}
				}
			});
		}
	}
	
	function _register(event)
	{
		event.preventDefault();
		
		//if($('#photos li').size() == 0) {
		//	MessageBox.setMessage('Przed wysłaniem zgłoszenia należy dodać zdjęcia.', 'error');
		//} else {
			
			$.ajax({
				url: '/index.php?module=contest&action=register',
				data: $('#contest-form').serialize(),
				type: 'post',
				dataType: 'json',
				
				beforeSend: function() 
				{
					$('p.error').removeClass('error');
				},
				
				success: function(response) 
				{
					if(response.feedback.status == 'fail') {
						for(var item in response.feedback.fields) {
							$('#' + item).addClass('error');
						}
						
						MessageBox.setMessage('Nie udało się wysłać zgłoszenia. Jeśli problem się powtórzy skontaktuj się z nami.', 'error');
						
					} else if(response.feedback.status == 'ok') {
						window.location = '/index.php?module=contest&action=finish';
					}
				}
			});
		//}
	}
})();
