var ProjectHelper = (function()
{
	function _syncCheckedClass(input)
	{
		var host = input.closest('.ph-option, .ph-consent');
		if (!host) return;
		host.classList.toggle('is-checked', input.checked);
	}

	$(document).ready(function()
	{
		$('#helper-2026 input[type="checkbox"]').each(function()
		{
			_syncCheckedClass(this);
		}).on('change', function()
		{
			_syncCheckedClass(this);
		});

		$('#newsletter').on('change', function()
		{
			var box = document.getElementById('accept-newsletter-box');
			if (!box) return;
			if ($('#newsletter').is(':checked')) {
				box.hidden = false;
			} else {
				box.hidden = true;
				var accept = document.getElementById('newsletter-accept');
				if (accept) {
					accept.checked = false;
					_syncCheckedClass(accept);
				}
			}
		});
	});

	function _validate()
	{
		var response = {};

		if ($('#newsletter').is(':checked') && !$('#newsletter-accept').is(':checked')) {
			response.accept_newsletter = new Array('Musisz zaakceptować powyższe oświadczenie');
		}

		if (Object.keys(response).length > 0) {
			Validator.setCallbackErrors('project-helper-form', response);
		}
	}

	return {
		validate: _validate
	};
})();
