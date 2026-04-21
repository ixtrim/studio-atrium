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
		_index = _index + 1;
		_register(_index, element);
	}
	
	function _unregisterForm(element)
	{
		$(element).off('submit');
		_index = _index - 1;
	}
	
	function _register(index, element)
	{
		$(element).on('submit', function(event)
		{
			var formData = {};

			if ($.inArray(this, _validatedForms) >= 0) {
				return true;
			}

			event.preventDefault();

			$.each($(this).serializeArray(), function(idx, item)
			{
				if ($.trim(item.value) != '') {
					formData[item.name] = item.value;
				}
			});

			$('form.validable .error_field').each(function(idx, item)
			{
				$(item).removeClass('error_field');
			});

			$('form.validable .error_message').each(function(idx, item)
			{
				$(item).remove();
			});

			$.ajax({
				url: '/index.php',
				data: {
					module: 'validator',
					validate_module: formData.module,
					validate_action: formData.action,
					validate_form: index,
					validate_form_id: element.id,
					validate_data: $.toJSON(formData),
				},
				type: 'post',
				dataType: 'json',

				complete: function(transport)
				{
					var response = transport.responseJSON,
						form = undefined;
				
					if(response.form_id) {
						form = $('#' + response.form_id).get(0);
					} else {
						form = $('form.validable')[response.form];
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
								messages = undefined;

							if (response.errors && response.errors[item.name]) {
								$(item).parent().addClass('error_field');
								messages = _.reduce(
									response.errors[item.name],
									function(acc, substr){
										return acc += acc == '' ? substr : '<br>' + substr;
									},
									''
								);

								if($(item).parent().children('.error_message').size() == 0) {
									mbox = $(document.createElement('p')).addClass('error_message').html(messages);
									mbox.appendTo($(item).parent());
								}
							}
							
							if (_callbackErrors[form.id] && _callbackErrors[form.id][item.name]) {
								$(item).parent().addClass('error_field');
								mbox = $(document.createElement('p')).addClass('error_message').html(_callbackErrors[form.id][item.name]);
								mbox.appendTo($(item).parent());
							}
						});
						
						if($(form).data('call')) {
							Callback.callFunction($(form).data('call'));
						} else {
							$('html, body').animate({
								scrollTop: $($(form).find('.error_field').get(0)).offset().top - 120
							}, 500);
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