(function()
{
	var _isLocked = false,
		_discountValue = 0,
		_checkingInProgress = false,
		_totalPayment = 0
		_invalidFW = undefined;
	
	
	$(document).ready(function()
	{
		$('.selectorExtrasWrapper').each(function(i,item) {
			$(item).hide();
		});
	
// czy to może tak być - chodzi o kompatybilność z danymi ze Storage?
		//calculate and update delivery price
		_updateDeliveryCost();

		// Shipping / payment modern radios (keeps hidden <select> for form + delivery calc)
		$('#order-2026 .order-radios').on('change', 'input[type="radio"]', function() {
			var $input = $(this);
			var $group = $input.closest('.order-radios');
			var $select = $($group.data('select'));
			$group.find('.order-radio').removeClass('is-checked');
			$input.closest('.order-radio').addClass('is-checked');
			if ($select.length) {
				$select.val(String($input.val())).trigger('change');
			}
		});

		$('#payment-type, #dispatch-type').on('change', function() {
			_updateDeliveryCost();
		});

		// Sync radio UI from select values
		$('#payment-type, #dispatch-type').each(function() {
			var $select = $(this);
			var val = $select.val();
			var $group = $('#order-2026 .order-radios[data-select="#' + this.id + '"]');
			if (!$group.length || !val) {
				return;
			}
			var $input = $group.find('input[type="radio"][value="' + val + '"]');
			if ($input.length) {
				$input.prop('checked', true);
				$group.find('.order-radio').removeClass('is-checked');
				$input.closest('.order-radio').addClass('is-checked');
			}
		});

		//get selected values connected with extras
		if (StorageManager.get('basketExtras')) {
			var basketExtras = $.evalJSON(StorageManager.get('basketExtras'));
			var sum = parseFloat($('#basketTotalInput').val());
			var basketExtrasProjects = {};
			
			if (StorageManager.get('basketExtrasProjects')) {
				var basketExtrasProjects = $.evalJSON(StorageManager.get('basketExtrasProjects'));
			}
			
			$('#basketForm input[type="checkbox"]').each(function(i,sel) {
				var id = $(this).attr('id').replace(/add-extras_/, '');
				if (basketExtras[id]) {
					$(this).attr('checked', true);
					$('#price-extras_'+id).removeClass('off');
					sum = sum + parseFloat($('#price-extras_'+id).attr("data-price"));
					
					if ($(this).attr('data-type') == 'group') {
						$('#descr-extras_'+id).hide();
						$('#selector-extras_'+id).show();
					}
				} else if ($(this).attr('data-type') == 'group') {
					$('#descr-extras_'+id).show();
					$('#selector-extras_'+id).hide();
				}
				
				if (basketExtrasProjects[id]) {
					$('#selector-extras_'+id+' .overview img').each(function(i,sel) {
						$(sel).removeClass('selected');
					}); 
					
					$('#overview_'+id+'_'+basketExtrasProjects[id]+' img').addClass('selected');
					$('#selector_'+id).val(basketExtrasProjects[id]);
				}
			});
			
			$('#basketTotalInput').val(sum);
			$('#basketTotal').html(sum);
			_totalPayment = sum;
		}
		
		//get selected values connected with discount code
		if (StorageManager.get('basketDiscount')) {
			var sum = parseFloat($('#basketTotalInput').val());
			var basketDiscount = $.evalJSON(StorageManager.get('basketDiscount'));
			
			if (basketDiscount.exclude_other == 1 && $('#registerUserDiscount').length) {
				sum = sum+100;
				$('#discount-field-100').hide();
				$('#registerUserDiscount').val(0);
			}
			
			$('#discount-name').html(basketDiscount.title);
			if (basketDiscount.discount_type == 'percent') {
				$('#discount-value').html(basketDiscount.percent_discount_value);
				_discountValue = parseFloat(basketDiscount.percent_discount_value);
			} else {
				$('#discount-value').html(basketDiscount.discount_value);
				_discountValue = parseFloat(basketDiscount.discount_value);
			}
			$('#discount-field').show();
			sumAfter = sum - _discountValue;
			$('#basketTotal').html(sumAfter);
			$('#basketTotalInput').val(sumAfter);
			$('#discount-code').val(basketDiscount.code);
			$('#discount-code-hidden').val(basketDiscount.code);
			
			_totalPayment = sumAfter;
		}
		
		//change extras
		$('#basketForm input[type="checkbox"]').on('change', function() {
			
			if ($('#discount-code').val()) {
				setTimeout(function() {
					$('#check-code').click();
				    }, 2000);
			}
			
			var id = $(this).attr('id').replace(/add-extras_/, '');
			var sum = parseFloat($('#basketTotalInput').val());
			var basketExtras = {};
			
			if (StorageManager.get('basketExtras')) {
				basketExtras = $.evalJSON(StorageManager.get('basketExtras'));
			}
			
			if ($(this).is(':checked')) {
				$('#price-extras_'+id).removeClass('off');
				sum = sum + parseFloat($('#price-extras_'+id).attr("data-price"));
				basketExtras[id] = id;
				
				if ($(this).attr('data-type') == 'group') {
					$('#descr-extras_'+id).hide();
					$('#selector-extras_'+id).fadeIn();	
				}
			} else {
				$('#price-extras_'+id).addClass('off');
				sum = sum - parseFloat($('#price-extras_'+id).attr("data-price"));
				
				delete(basketExtras[id]);
				
				if ($(this).attr('data-type') == 'group') {
					$('#descr-extras_'+id).fadeIn();
					$('#selector-extras_'+id).hide();	
				}
			}
			
			$('#basketTotalInput').val(sum);
			$('#basketTotal').html(sum);
			_totalPayment = sum;

			StorageManager.store('basketExtras', $.toJSON(basketExtras));
		});
		
		$("#basketForm").on('click', '.remove', function(a) {
			if (confirm('Czy na pewno usunąć tę pozycję z koszyka?')) {
				Toolbox.removeFromBasket(this);
			}
		})
		
		$('#send-data').on('change', function()
		{
			if($('#send-data-box').is(':visible')) {
				$('#send-data-box').slideUp();
			} else {
				$('#send-data-box').slideDown();
			}
		});
		
		$('#radio-company-box input').on('change', function() 
		{
	        if (this.value == 'person' && $('#company-box').is(':visible')) {
	        	$('#company-box').slideUp();
	        }
	        else if (this.value == 'company' && !$('#company-box').is(':visible')) {
	        	$('#company-box').slideDown();
	        }
	    });
		
		
		$('a.changeVersion').on('click', function() 
		{
	       var pid = $(this).attr('data-pid');
	       var version = $(this).attr('data-version');
	       if (version == 'mirror') {
	    	   var old_version = 'normal';
	       } else {
	    	   var old_version = 'mirror';
	       }
	       
	       var basketC = CookieManager.getCookie('SA_basket');
	      
	       basketC ? (basketC = $.evalJSON(basketC), $.each(basketC, function(t) {
				if (t == 'p'+pid+'v'+old_version) {
					basketC['p'+pid+'v'+version] = basketC['p'+pid+'v'+old_version];
					basketC['p'+pid+'v'+version]['version'] = version;
					if (version == 'mirror') {
						basketC['p'+pid+'v'+version]['link'] = basketC['p'+pid+'v'+version]['link'].replace(/.html/, ',lustro.html');
					} else {
						basketC['p'+pid+'v'+version]['link'] = basketC['p'+pid+'v'+version]['link'].replace(/,lustro.html/, '.html');
					}
					delete basketC[t];
				}
			}), CookieManager.setCookie("SA_basket", $.toJSON(basketC),30),
			location.reload()) : window.location = "/"
	    });

		
		//check promo code
		function _setDiscountMessage(message, state)
		{
			var $result = $('#discount_result');
			var $input = $('#discount-code');

			$result
				.removeClass('is-error is-success is-pending')
				.addClass(state ? 'is-' + state : '')
				.html(message)
				.show();

			if (state === 'error') {
				$input.addClass('is-invalid').attr('aria-invalid', 'true');
			} else {
				$input.removeClass('is-invalid').attr('aria-invalid', 'false');
			}
		}

		function _validateDiscountCodeField()
		{
			var code = $.trim($('#discount-code').val() || '');

			$('#discount-code').val(code);

			if (!code) {
				_setDiscountMessage('Wpisz kod rabatowy.', 'error');
				$('#discount-code').focus();
				return false;
			}

			if (code.length < 3) {
				_setDiscountMessage('Kod rabatowy jest zbyt krótki.', 'error');
				$('#discount-code').focus();
				return false;
			}

			if (!/^[A-Za-z0-9._\-]+$/.test(code)) {
				_setDiscountMessage('Kod może zawierać tylko litery, cyfry, myślnik, kropkę lub podkreślenie.', 'error');
				$('#discount-code').focus();
				return false;
			}

			return true;
		}

		$('#discount-code').on('input', function()
		{
			if ($(this).hasClass('is-invalid')) {
				$(this).removeClass('is-invalid').attr('aria-invalid', 'false');
				$('#discount_result').removeClass('is-error').hide().empty();
			}
		}).on('keydown', function(event)
		{
			if (event.key === 'Enter' || event.which === 13) {
				event.preventDefault();
				$('#check-code').trigger('click');
			}
		});

		$('#check-code').on('click', function()
		{
			if (_checkingInProgress) {
				return;
			}

			if (!_validateDiscountCodeField()) {
				return;
			}

			_checkingInProgress = true;
			var sum = parseFloat($('#basketTotal').html());
			_setDiscountMessage('Trwa weryfikowanie kodu...', 'pending');
			$.ajax({
				url: '/index.php?module=ajax&action=validate_discount_code',
				data: {
					code: $('#discount-code').val(),
					projects_id: $('#projects-id').val(),
					projects_percent_id: $('#projects-percent-id').val(),
					selected_extras: StorageManager.get('basketExtras'),
				},
				type: 'post',
				dataType: 'json',
				
				success: function(response)
				{
					if (response.status == 'ok') {
						if ($('#registerUserDiscount').length) {
							if (response.code.exclude_other == 1 && $('#registerUserDiscount').val() == 100) {
								$('#discount-field-100').hide();
								$('#registerUserDiscount').val(0);
								sum = sum+100;
							} else if ($('#registerUserDiscount').val() == 0) {
								$('#discount-field-100').show();
								$('#registerUserDiscount').val(100);
								sum = sum-100;
							}
						}
						
						if ($('#discount-code-hidden').val()) {
							if (response.code.discount_type == 'percent') {
								_setDiscountMessage('Kod poprawny. Rabat '+response.code.discount_value+'% dla projektów objętych promocją został doliczony.', 'success');
								sumAfter = (sum+_discountValue) - parseFloat(response.code.percent_discount_value);
							} else {
								_setDiscountMessage('Kod poprawny. Rabat '+response.code.discount_value+' zł został doliczony.', 'success');
								sumAfter = (sum+_discountValue) - parseFloat(response.code.discount_value);
							}
						} else {
							if (response.code.discount_type == 'percent') {
								_setDiscountMessage('Kod poprawny. Rabat '+response.code.discount_value+'% dla projektów objętych promocją został doliczony.', 'success');
								sumAfter = sum - parseFloat(response.code.percent_discount_value);
							} else {
								_setDiscountMessage('Kod poprawny. Rabat '+response.code.discount_value+' zł został doliczony.', 'success');
								sumAfter = sum - parseFloat(response.code.discount_value);
							}
						}
						$('#discount-name').html(response.code.title);
						if (response.code.discount_type == 'percent') {
							$('#discount-value').html(response.code.percent_discount_value);
							_discountValue = parseFloat(response.code.percent_discount_value);
						} else {
							$('#discount-value').html(response.code.discount_value);
							_discountValue = parseFloat(response.code.discount_value);
						}
						$('#discount-field').fadeIn();
						$('#basketTotal').html(sumAfter);
						$('#basketTotalInput').val(sumAfter);
						$('#discount-code-hidden').val($('#discount-code').val());
						StorageManager.store('basketDiscount', $.toJSON(response.code));
						_totalPayment = sumAfter;
					} else {
						if ($('#registerUserDiscount').length && $('#registerUserDiscount').val() == 0) {
							$('#discount-field-100').show();
							$('#registerUserDiscount').val(100);
							sum = sum-100;
						}
						
						msg_er = 'Błędny kod, promocja już się skończyła lub nie łączy się z inną aktualną promocją.';
						if (response.msg_er) {
							msg_er = response.msg_er;
						}
						
						_setDiscountMessage(msg_er, 'error');
						$('#discount-field').hide();
						StorageManager.remove('basketDiscount');
						sum = (sum+_discountValue);
						_discountValue = 0;
						_totalPayment = sum;
						$('#basketTotal').html(sum);
						$('#basketTotalInput').val(sum);
						$('#discount-code-hidden').val('');
					}
					_checkingInProgress = false;
				},
				error: function()
				{
					_setDiscountMessage('Nie udało się sprawdzić kodu. Spróbuj ponownie.', 'error');
					_checkingInProgress = false;
				}
			});
		});
		
//		$('#info-pop-close').on('click', function()
//		{
//			$('#info-pop').removeClass('open');
//		});
		
		$('span.overview').on('click', function(event)
		{
			var element = $(event.delegateTarget);
			$('#selectorDataPid').attr('data-pid', element.data('pid'));
			$('#selectorDataPid').attr('data-id', element.data('id'));
		});
		
		$('span.select').on('click', function(event)
		{
			var element = $(this),
			basketExtrasProjects = {};

			$('#selector-extras_'+element.attr('data-pid')+' .overview img').each(function(i,sel) {
				$(sel).removeClass('selected');
			}); 
			
			if (StorageManager.get('basketExtrasProjects')) {
				var basketExtrasProjects = $.evalJSON(StorageManager.get('basketExtrasProjects'));
			}
			
			basketExtrasProjects[element.attr('data-pid')] = element.attr('data-id');
			StorageManager.store('basketExtrasProjects', $.toJSON(basketExtrasProjects));
			
			$('#overview_'+element.attr('data-pid')+'_'+element.attr('data-id')+' img').addClass('selected');
			$('#selector_'+element.attr('data-pid')).val(element.attr('data-id'));
			$('#overlay-close').click();
		});
		
		//form submit
		$('#basketForm').on('submit', function(event) {
			event.preventDefault();

			if(!_isLocked) {
				var formData = {},
					pid = [],
					isValidated = true,
					regexp = /[0-9]+/; //fotowoltaika
				
				_isLocked = true;
				
				$.each($(this).serializeArray(), function(idx, item)
				{
					if ($.trim(item.value) != '') {
						formData[item.name] = item.value;
						
						if(item.value == 23 && item.name.includes("cliSelExtras")) {
							pid.push(regexp.exec(item.name)[0]);
						}
					}
				});
				
				
				if(pid) {
					isValidated = _validateFWData(pid);
				}
			
				
				if(isValidated) {
					$.ajax({
						url: '/index.php?module=order&action=cart_store',
						data: {
							data: $.toJSON(formData)
						},
						type: 'post',
						dataType: 'json',
						
						beforeSend: function() {
							$('#sendButton').hide();
						},
						
						success: function(response)
						{
							window.location = '/zamowienie/dane.html';
						},
						
						complete: function()
						{
							_isLocked = false;
						}
					});
				} else {
					
					if(!$('#' + _invalidFW + '-extrainfo').hasClass('error')) {
						$('#' + _invalidFW + '-extrainfo').addClass('error');
					}
					
					$('html, body').animate({
				        scrollTop: $('#' + _invalidFW + '-extrainfo').offset().top - 80
				    }, 500);
					
					_isLocked = false;
				}
			}
		});
	});
	
	
	function _validateFWData(pid)
	{
		_invalidFW = undefined;
		
		for(i = 0; i < pid.length; i++) {
			if($('#fw-' + pid[i] + '-lodger-count').val().trim() == '') {
				_invalidFW = pid[i];
				return false;	
			}
			
			if(typeof $('input[name="fw[' + pid[i] + '][co]"]:checked').val() === "undefined") {
				_invalidFW = pid[i];
				return false;
			}
			
			if(typeof $('input[name="fw[' + pid[i] + '][cwu]"]:checked').val() === "undefined") {
				_invalidFW = pid[i];
				return false;
			}
			
			if($('#fw-' + pid[i] + '-orientation').val().trim() == '') {
				_invalidFW = pid[i];
				return false;	
			}
			
			if($('#fw-' + pid[i] + '-shaders').val().trim() == '') {
				_invalidFW = pid[i];
				return false;	
			}
		}
		
		return true;
	}
	
	
	function _updateDeliveryCost()
	{
		var totalPayment = 0,
			paymentMethod = $("#payment-type").find(":selected").val(),
			dispatchMethod = $("#dispatch-type").find(":selected").val(),
			deliveryCost = 0;
		
		_totalPayment = parseFloat($('#basketTotalInput').val());
		totalPayment = _totalPayment - parseFloat($('#deliveryPriceField').val());
	
		if (totalPayment < $('#dispatch-type').attr('data-min-payment')) {
			switch(dispatchMethod) {
				case 'courier':
						deliveryCost = $("#dispatch-type").find(":selected").attr('data-payment-' + paymentMethod);
						_totalPayment = totalPayment + parseFloat(deliveryCost);
				break;
				
				case 'self': default:
					_totalPayment = totalPayment
			}
			
			$('#basketTotal').html(_totalPayment);
			$('#basketTotalInput').val(_totalPayment);
			
			$('#deliveryPrice').html(deliveryCost);
			$('#deliveryPriceField').val(deliveryCost);
		}
		
		if(paymentMethod == 'transfer') {
			if(!$('#transfer-info').is(':visible')) {
				$('#transfer-info').slideDown();
			}
		} else {
			if($('#transfer-info').is(':visible')) {
				$('#transfer-info').slideUp();
			}
		}
	}
})();