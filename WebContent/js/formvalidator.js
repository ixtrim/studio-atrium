var Validator = (function ()
{
	var _validatedForms = [],
		_callbackErrors = {}, //Błędy które nie mogą być uzyskane standardowo, ale które pojawiają się przy dodatkowj walidacji w skrypcie
		_index = 0; // w momencie gdy dodajemy i usuwamy formularze trochę niepewne rozwiązanie

	$(document).ready(function()
	{
		_init();
	});

	function _init()
	{
		$('form.validable').each(function(index, element)
		{
			_register(index, element);
			_index = index;
		});
	}
	
	function _registerForm(element)
	{
		element = $(element).get(0);
		if (!element) {
			return;
		}
		_index = _index + 1;
		_register(_index, element);
	}
	
	function _unregisterForm(element)
	{
		element = $(element).get(0);
		if (!element) {
			return;
		}
		$(element).off('submit');
		_index = _index - 1;
	}
	
	function _register(index, element)
	{
		element = $(element).get(0);
		if (!element) {
			return;
		}

		$(element).on('submit', function(event)
		{
			var formData = {};
			var formEl = this;

			if ($.inArray(formEl, _validatedForms) >= 0) {
				return true;
			}

			event.preventDefault();

			$.each($(formEl).serializeArray(), function(idx, item)
			{
				if ($.trim(item.value) != '') {
					formData[item.name] = item.value;
				}
			});

			// Keep module/action even if somehow empty — required by validator endpoint
			if (!formData.module) {
				formData.module = $(formEl).find('[name="module"]').val() || '';
			}
			if (!formData.action) {
				formData.action = $(formEl).find('[name="action"]').val() || '';
			}

			$(formEl).find('.error_field').removeClass('error_field');
			$(formEl).find('.error_message').remove();

			$.ajax({
				url: '/index.php',
				data: {
					module: 'validator',
					validate_module: formData.module,
					validate_action: formData.action,
					validate_form: index,
					validate_form_id: formEl.id || element.id || '',
					validate_data: $.toJSON(formData),
				},
				type: 'post',
				dataType: 'json',

				complete: function(transport)
				{
					var response = transport.responseJSON || {},
						form = undefined;
				
					if (response.form_id) {
						form = $('#' + response.form_id).get(0);
					}
					if (!form) {
						form = formEl;
					}
					if (!form) {
						form = $('form.validable')[response.form];
					}
					if (!form) {
						return;
					}
					
					if($(form).data('validate')) {
						if(_callbackErrors[form.id]) {
							delete _callbackErrors[form.id];
						}
						Callback.callFunction($(form).data('validate'));
					}

					if (response.status == 'ok' && !_callbackErrors[form.id]) {
						_validatedForms.push(form);
						$(form).submit();
					}

					if (response.status == 'error' || _callbackErrors[form.id]) {
					
						$(form).find('input, textarea, select').each(function (index, item)
						{
							var mbox = undefined,
								messages = undefined,
								fieldWrap = $(item).closest('p, .field, .form-row').first();
							if (!fieldWrap.length) {
								fieldWrap = $(item).parent();
							}

							if (response.errors && response.errors[item.name]) {
								fieldWrap.addClass('error_field');
								messages = _.reduce(
									response.errors[item.name],
									function(acc, substr){
										return acc += acc == '' ? substr : '<br>' + substr;
									},
									''
								);

								if(fieldWrap.children('.error_message').size() == 0) {
									mbox = $(document.createElement('span')).addClass('error_message').html(messages);
									mbox.appendTo(fieldWrap);
								}
							}
							
							if (_callbackErrors[form.id] && _callbackErrors[form.id][item.name]) {
								fieldWrap.addClass('error_field');
								mbox = $(document.createElement('span')).addClass('error_message').html(_callbackErrors[form.id][item.name]);
								mbox.appendTo(fieldWrap);
							}
						});
						
						if($(form).data('call')) {
							Callback.callFunction($(form).data('call'));
						} else {
							var firstError = $(form).find('.error_field').get(0);
							if (firstError) {
								$('html, body').animate({
									scrollTop: $(firstError).offset().top - 120
								}, 500);
							}
						}
					}
				}
			});
		});
	}
	
	function _setCallbackErrors(formId, errors)
	{
		_callbackErrors[formId] = errors;
	}
	
	function _isValidated(form)
	{
		return ($.inArray(form, _validatedForms) >= 0) ? true : false;
	}
	
	return {
		isValidated: _isValidated,
		setCallbackErrors: _setCallbackErrors,
		registerForm: _registerForm,
		unregisterForm: _unregisterForm
	};
})();