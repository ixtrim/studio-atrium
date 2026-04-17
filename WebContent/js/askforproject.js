var ProjectHelper = (function()
{
	
	$(document).ready(function()
	{
		$('#newsletter').on('change', function()
		{
			if($('#newsletter').is(':checked')) {
				$('#accept-newsletter-box').slideDown('fast');
			} else {
				$('#accept-newsletter-box').slideUp('fast');
			}
		});
	});
	
	
	function _validate()
	{
		var response = {};

		if($('#newsletter').is(':checked') && !$('#newsletter-accept').is(':checked')) {
			response.accept_newsletter = new Array('Musisz zaakceptować powyższe oświadczenie');
		}

		if(Object.keys(response).length > 0) {
			Validator.setCallbackErrors('project-helper-form', response);
		}
	}
	
	return {
		validate: _validate
	};
})();