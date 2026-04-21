var Forum = (function()
{
	var _projectNames = {};
	
	$(document).ready(function()
	{
		$('#bind').on('change', function()
		{
			if($(this).is(':checked')) {
				$('#post-project-box').fadeIn('fast');
			} else {
				$('#post-project-box').fadeOut('fast');
			}
		});
		
		$('#post-project-name').on('focus', function()
		{
			$('#names-holder').show();
		});
		
		$('#post-project-name').on('keyup', function()
		{
			_getProjectNames();
		});
		
		$('#post-project-name').on('blur', function()
		{
			setTimeout(function()
			{ 
				$('#names-holder').hide();
			}, 100);
		});
		
		if($('#bind').is(':checked')) {
			$('#names-holder').hide();
			_getProjectNames();
		}
		
		$('#names-holder').on('click', 'li', _setProjectName);
	});
	
	function _getProjectNames()
	{
		var name = $('#post-project-name').val();
		
		if(name.length > 2) {
			$.ajax({
				url: '/index.php?module=project&action=getProjectNames',
				data: {query: name},
				type: 'post',
				dataType: 'json',
				
				success: function(response)
				{
					$('#names-holder li').remove();
					
					_projectNames = {};
					
					$.each(response.feedback, function(key, value)
					{
						var idx = Object.keys(value)[0],
							name = value[idx];
						
						$('#names-holder').append('<li data-id="' + idx + '">' + name + '</li>');
						_projectNames[idx] = name.toLowerCase();
					});
				}
			});
		}
	}
	
	function _setProjectName(event)
	{
		var trigger = $(event.target);

		$('#post-project-name').val(trigger.html());
		
		$('#names-holder').hide();
	}
	
	function _validate()
	{
		var response = {},
			projectName = $.trim($('#post-project-name').val()).toLowerCase(),
			email = undefined;
		
		if($('#bind').is(':checked')) {
			if($.inArray(projectName, _.values(_projectNames)) == -1) {
				response.project = new Array('Nieprawidłowa nazwa projektu');
			} else {
				$.each(_projectNames, function(key, value)
				{
					if(value == projectName) {
						$('#post-project-id').val(key);
						return false;
					}
				});
			}
		} else {
			$('#post-project-id').val('');
		}
		
		if($('#notify').is(':checked') && $('#post-email').size() > 0) {
			email = $.trim($('#post-email').val());
			
			if(email == '') {
				response.email = new Array('Email nie może być pusty');
			}
		}

		if(Object.keys(response).length > 0) {
			Validator.setCallbackErrors('post-form', response);
		}
	}
	
	return {
		validate: _validate
	};
})();
