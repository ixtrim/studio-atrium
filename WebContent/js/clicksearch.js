var ClickSearch = (function()
{
	$(document).ready(function()
	{
		$('#click-search-form input[type=checkbox], #click-search-form input[type=radio]').on('change', _getNumbers);
		
		$('#click-search-form select').selectmenu({
			change: function(event, ui) 
			{
				_getNumbers();
			}
		});
		
		$('#click-search-form input[type="text"]').each(function()
		{
			$(this).on('keydown', _numCheck);
			$(this).on('keyup', function(event)
			{
				if(event.keyCode == 110 || event.keyCode == 188) {
					$(this).val($(this).val().replace(",","."));
				}
				
				if(event.keyCode == 13) {
					$(this).blur();
				}	
			});
		});
		
		$('#search-name').on('keyup', function(event)
		{
			if($.trim($(this).val()) == '') {
				if(!$('#search-name-submit').hasClass('disabled')) {
					$('#search-name-submit').prop("disabled", true);
					$('#search-name-submit').addClass('disabled');
				}
			} else {
				if($('#search-name-submit').hasClass('disabled')) {
					$('#search-name-submit').prop("disabled", false);
					$('#search-name-submit').removeClass('disabled');
				}
			}
		});
		
		$('#click-search-form input[type="text"]').on('blur', function(event)
		{
			_getNumbers();
		});
		
		$('#cs-reset').on('click', function(event)
		{
			event.preventDefault();
			_reset();
		});
		
		$('#cs-fetch').on('click', function(event)
		{
			event.preventDefault();
			
			var params = '';
			
			$('#click-search-form').serializeArray().map(function(key)
			{
				if(key.value) {
					params += params == '' ? '?' : '&';
					params += key.name + '=' + key.value;
				}
			});
	
			window.location.href = window.location.protocol + '//' + window.location.hostname + '/wynik-wyszukiwania/' + params;
		});
	});
	
	function _numCheck(event)
	{
		if(event.key) { // android nie ma tej własności
			if((event.keyCode < 48 || event.keyCode > 57 && event.keyCode < 96 || event.keyCode > 105) && [8, 9, 13, 37, 39, 110, 188, 190].indexOf(event.keyCode) == -1) {
				return false;
			}
		} else {
			return true;
		}
	}
	
	function _reset()
	{
		var params = {};
		
		$('#click-search-form')[0].reset();
		
		$('#click-search-form').find('input:text, select').val('');
        $('#click-search-form').find('input:radio, input:checkbox').prop('checked', false);
		
		_getNumbers();
	}
	
	function _getParams()
	{
		var params = {};
		
		$('#click-search-form').find('input:radio:checked, input:checkbox:checked').each(function()
		{
			if($(this).is(':disabled')) {
				$(this).prop('disabled', false);
			}
		});
		
		
		$('#click-search-form').find('select').each(function()
		{
			var selected = $(this).children("option:selected");
			
			if(selected.is(':disabled')) {
				selected.prop('disabled', false);
			}
		});
	
		
		$('#click-search-form').serializeArray().map(function(key)
		{
			if(key.name.indexOf('[]') != -1) {
				if(!$.isArray(params[key.name])) {
					params[key.name] = [];
				}
				
				params[key.name].push(key.value);
				
			} else {
				if(key.value) {
					params[key.name] = key.value;
				}
			}
		});

		
		return params;
	}
	
	
	function _getNumbers()
	{
		var params = _getParams();
		var total = 0;
		
		$.ajax({
			url: '/index.php?module=project&action=click_search_numbers',
			data: params,
			type: 'post',
			dataType: 'json',
			
			beforeSend: function() {
				$('#cs-fetch').prop('disabled', true);
				$('#cs-fetch').addClass('disabled');
				$('#data-read').text('trwa wczytywanie danych');
				$('#data-read').show();
			},

			success: function(response)
			{
				var element = $('#cs-category');
				
				if(element.length) {
					var catId = element.val().replace('c', '');
	
					if($.isPlainObject(response.feedback.stats.categories)) {
						element.siblings('span').html('(' + response.feedback.stats.categories[catId] + ')');
					} else {
						element.siblings('span').html('(0)');
					}
				}
				
				total = response.feedback.stats.total
				
				$.each(response.feedback.stats.types, function(key, count) 
				{
					element = $('#' + key);
	
					if(element.length > 0) {
						switch(element[0].nodeName.toLowerCase()) {
							case 'option':
//								$.each(set, function(setkey, count) 
//								{
									element.find('span').detach();
									element.html(element.html().replace(/(\s?\(.*\))/, '') + ' <span>(' + count + ')</span>');
									
									if(count == 0) {
										element.attr('disabled', true);
									} else {
										element.attr('disabled', false);
									}
//								});
							break;
						}
					}
				});
				
				$.each(response.feedback.stats.sets, function(key, set) 
				{
					element = $('#' + key);
		
					//if element exists
					if(element.length > 0) {
						//span in select
						switch(element[0].nodeName.toLowerCase()) {
							case 'select':
								$.each(set, function(setkey, count) 
								{
									var item = $('#' + key + '-' + setkey);

									item.find('span').detach();
									item.html(item.html().replace(/(\s?\(.*\))/, '') + ' <span>(' + count + ')</span>');
									
									if(count == 0) {
										item.attr('disabled', true);
									} else {
										item.attr('disabled', false);
									}
								});
							break;
						}
						
						//if element is custom category and has related property
						$.each(set, function(setkey, count) 
						{
							if($('#' + key + '-' + setkey + '-count').length > 0) {
								$('#' + key + '-' + setkey + '-count').html('(' + count + ')');
								
								if(count == 0) {
									$('#' + key + '-' + setkey).attr('disabled', true);
								} else {
									$('#' + key + '-' + setkey).attr('disabled', false);
								}
							}
						});
					} else {
						//checkboxes & radio
						$.each(set, function(setkey, count) 
						{
							var counter = $('#' + key + '-' + setkey + '-count');
								counter.html('(' + count + ')');
							
							if(counter.length && count == 0) {
								$('#' + key + '-' + setkey).attr('disabled', true);
							} else {
								$('#' + key + '-' + setkey).attr('disabled', false);
							}
						});
					}
				});
			},

			complete: function()
			{
				$('#click-search-form select').selectmenu('refresh');
				if(total > 0) {
					$('#cs-fetch').prop('disabled', false);
					$('#cs-fetch').removeClass('disabled');
					$('#data-read').hide();
				} else {
					$('#data-read').text('brak wyników wyszukiwania');
				}
			}
		});
	}
	
	return {
		getNumbers: function()
		{
			_getNumbers();
		}
	};
})();