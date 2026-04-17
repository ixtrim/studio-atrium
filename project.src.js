(function()
{
	$(document).ready(function()
	{
		var _tawkBoxId = undefined;
	
		$('#backToTopOnHouse').on('click', function(event)
		{
			$("html, body").animate({ scrollTop: 0 }, "slow");
		});
		
		if(typeof $.flexslider == 'function') {
			$('.flexslider').flexslider({
				animation: "fade",
				directionNav: false
			});
		}

		if(typeof $.fancybox == 'object') {
			$('[data-fancybox]').fancybox({
				onActivate: function(instance, current)
				{ 
					$('#tool-box').addClass('off');
					if(typeof Tawk_API.hideWidget == 'function') {
						Tawk_API.hideWidget();
					}
				},
				
				afterClose: function(instance, current)
				{
					$('#tool-box').removeClass('off');
					if(typeof Tawk_API.showWidget == 'function') {
						Tawk_API.showWidget();
					}
				},
				loop: true
			});
			
			$('#finger').on('click', function()
			{
				$.fancybox.open($('.gallery'));
			});
		}
		
		$('#social-trigger').on('click', function()
		{
			$('#social-overlay').addClass('open');
			
			if(Utils.isPopHeigherThanViewport($('.blue-overlay.share')[0])) {
				$('body').addClass('noScroll');
			}
		});
		
		$('#social-overlay-close').on('click', function()
		{
			$('#social-overlay').removeClass('open');
			
			if($('body').hasClass('noScroll')) {
				$('body').removeClass('noScroll');
			}
		});
		
		$('#skeleton-trigger').on('click', function()
		{
			$('#skeleton-info-overlay').addClass('open');
			
			if(Utils.isPopHeigherThanViewport($('.blue-overlay.skeleton')[0])) {
				$('body').addClass('noScroll');
			}
			
			if(typeof Tawk_API.hideWidget == 'function') {
				Tawk_API.hideWidget();
			}
		});
		
		$('#skeleton-info-overlay-close').on('click', function()
		{
			$('#skeleton-info-overlay').removeClass('open');
			
			if($('body').hasClass('noScroll')) {
				$('body').removeClass('noScroll');
			}
			
			if(typeof Tawk_API.showWidget == 'function') {
				Tawk_API.showWidget();
			}
		});
		
		
		enquire.register("screen and (max-width: 990px)", {
			match : function() 
			{
				if($('div.showroom').length > 0) {
					$('#opts-faq').hide();
					$('#opts-sr').show();
				}
		    },
		    
			unmatch : function() 
			{
				$('#opts-faq').show();
				$('#opts-sr').hide();
				
				$('#showroom').hide();
		    }
		});
		
		
		
		enquire.register("screen and (max-width: 420px)", {
			match : function() 
			{
				$('#addons-link').html('Dodatki');
		    },
		    
			unmatch : function() 
			{
				$('#addons-link').html('Dodatki do projektu');
		    }
		});
	});
})();


var Project = (function()
{
	var _isLocked = false,
		_navBarHeight = 100,
		_isProjectGenrating = false,
		_fileDownloadCheckTimer = undefined;
	
	$(document).ready(function()
	{
		enquire.register("screen and (max-width: 599px)", {
			match : function() 
			{
				_navBarHeight = 122;
		    },
		    
			unmatch : function() 
			{
				_navBarHeight = 100;
		    }
		});
		
		//waiter for project pdf generation
		$('#print-ico').on('click', function(event)
		{
			if(_isProjectGenrating) {
				event.preventDefault();
			} else {
				var token = $('#print-ico').data('token');
				
				_isProjectGenrating = true;
				$('#gen-loader').show();
				
				_fileDownloadCheckTimer = window.setInterval(function() 
				{
					var dldCookieValue = CookieManager.getCookie('fileDownloadToken');
					if (dldCookieValue == token) {
						CookieManager.setCookie('fileDownloadToken', token, -1);
						window.clearInterval(_fileDownloadCheckTimer);
						$('#gen-loader').hide();
						_isProjectGenrating = false;
					}
				}, 500);
			}
		});
		
		$('#share-project span').on('click', _share);
		
		$('.sketch-box img').css({
			maxHeight: $(window).height() - 96
		});
		
		$('#pompSel').on('change', function() {
			if ($("#pompSel").is(":checked")) {
				$('#pompInfo').show();
			} else {
				$('#pompInfo').hide();
			}
		});
		
		$('#share-form').on('submit', function(event)
		{
			event.preventDefault();
			
			if(!_isLocked) {
				
				_isLocked = true;

				$.ajax({
					url: '/index.php?module=project&action=send',
					data: {
						pid: $('#share-form').data('pid'),
						receiver_email: $('#receiver-email').val(),
						sender_email: $('#sender-email').val(),
						signature: $('#sender-sign').val()
					},
					type: 'post',
					dataType: 'json',
			
					beforeSend: function() {
						$('#share-fail-box').hide();
					},
			
					success: function(response)
					{
						switch (response.status) {
							case 'ok':
								$('#share-fail-box').html('Wiadomość została wysłana.');
							break;
							
							case 'error':
								$('#share-fail-box').html('Nie udało się wysłać wiadomości. Spróbuj ponownie, bądź skontaktuj się z nami telefonicznie.');
								break;
			
							default:
								$('#share-fail-box').html('Wypełnij poprawnie formularz kontaktowy.');
						}
						
						$('#share-fail-box').show();
					},
					
					complete: function()
					{
						_isLocked = false;
					}
				});
			}
		});
		
		$("#comment-type").selectmenu({
			  appendTo: "#type-box"
		});
		
		$("#forum-menu").on('click', 'li', _getForum);
		
		$("#comment-entries span.show-more").on('click', function(event)
		{
			if($(this).hasClass('open')) {
				$(event.target).parent().prev('ul').children('.covered').slideUp();
				
				$('html, body').animate({
                    scrollTop: $(event.target).closest('li').offset().top - _navBarHeight + 1
                }, 1000);
				
				$(this).removeClass('open');
				$(this).text('pokaż więcej odpowiedzi');
			} else {
				$(event.target).parent().prev('ul').children('.covered').slideDown({
					start: function () {
						$(this).css({
					    	display: "inline-block"
						})
					}
				});
				$(this).addClass('open');
				$(this).text('pokaż mniej odpowiedzi');
			}
		});
		
		$('#new-comment-trigger').on('click', _setForm);
		
		$('.reply-trigger').on('click', _setForm);
		
		$('#comment-attachment').on('click', function()
		{
			if($('#comment-txt').val() != '') {
				StorageManager.store('comment-' + $('#title').data('id'), $('#comment-txt').val());
			}
		});
		
		$('#comment-form').on('submit', function(event)
		{
			event.preventDefault();

			if(!_isLocked && Validator.isValidated(this)) {
				$.ajax({
					url: '/index.php?module=project&action=add_comment',
					data: $(this).serialize(),
					type: 'post',
					dataType: 'json',
					
					beforeSend: function() {
						_isLocked = true;
						$('#comment-waiter').show();
					},
					
					success: function(response)
					{
						if(response.feedback.status == 'ok') {
							MessageBox.setMessage('Dziękujemy. Wpis na forum został dodany. Za chwilę pojawi się w dyskusjach pod projektem.');
							
							$('#comment-publish-trigger').attr('disabled', true);
							$('#thumbnailFile').hide();
							$('#comment-attachment').hide();
							
						} else {
							MessageBox.setMessage('Niestety nie udało się dodać wpisu na Forum. Spróbuj ponownie bądź skontaktuj się z nami.', 'error');
						}
						
						_isLocked = false;
						$('#comment-waiter').hide();
					}
				});
			}
		});
	});
	
	$(window).load(function()
	{
		if(StorageManager.get('comment-' + $('#title').data('id'))) {
			$('#comment-txt').val(StorageManager.get('comment-' + $('#title').data('id')));
			StorageManager.remove('comment-' + $('#title').data('id'));
		}
	});
	
	
	function _setFormWithCatId(catId)
	{
		$('#comment-publish-trigger').attr('disabled', false);
		$('#comment-parent-id').val(0);
		$('#comment-type').val(catId);
		$('#comment-type').selectmenu("refresh");
		$('#comment-type-wrapper').show();
		$('#comment-subject').val('');
		$('#comment-subject').show();
		
		formBox = $('#comment-form-wrapper');
		box = $('#new-comment-trigger').parent();
		box.after(formBox.detach());
		
		formBox.slideDown('slow', function()
		{
			_scrollToTrigger(formBox);
		});
		
		Uploader.repositionUploadForms();
		
	}
	
	function _setForm(event)
	{
		var box = $(event.delegateTarget).parent(),
			formBox = $('#comment-form-wrapper');
		
		$('#comment-publish-trigger').attr('disabled', false);
		$('#comment-parent-id').val($(event.delegateTarget).data('parent'));

		if ($(event.delegateTarget).data('parent') > 0) {
			$('#comment-type').val($(event.delegateTarget).data('parent-type'));
			$('#comment-type-wrapper').hide();
			$('#newTopicMsg').hide();
			$('#comment-subject').hide();
			$('#comment-subject').val('Odp.');
		} else {
			$('#comment-type').val(100);
			$('#comment-type-wrapper').show();
			$('#newTopicMsg').show();
			$('#comment-subject').val('');
			$('#comment-subject').show();
		}
		
		if(formBox.is(':visible')) {
			
			if(box.next('#comment-form-wrapper').size() > 0) {
				
				formBox.slideUp('slow');
				
			} else {
				formBox.slideUp('slow', function()
				{
					box.after(formBox.detach());
					formBox.slideDown('slow', function()
					{
						_scrollToTrigger(event.delegateTarget);
					});
				});
			}
		} else {
			
			if(box.next('#comment-form-wrapper').size() == 0) {
				box.after(formBox.detach());
			}
			
			formBox.slideDown('slow', function()
			{
				_scrollToTrigger(event.delegateTarget);
			});
		}
		
		Uploader.repositionUploadForms();
	}
	
	function _getForum()
	{
		formBox = $('#comment-form-wrapper');
		box = $('#new-comment-trigger').parent();
		box.after(formBox.detach());
		formBox.hide();
		
		var trigger = $(this),
			txt = $(this).data('cat') == 0 ? 'z wszystkich kategorii Forum' : 'w kategorii ' + trigger.children('span').text().replace(/\([0-9]+\)/, '');
		
		if(!_isLocked && !$(this).hasClass('selected')) {
			$.ajax({
				url: '/index.php?module=project&action=get_forum',
				data: {
					id: $('#title').data('id'),
					cid: $(this).data('cat')
				},
				type: 'post',
				dataType: 'html',
				
				beforeSend: function() {
					_isLocked = true;
					$('#forum-waiter').show();
				},
				
				success: function(response)
				{
					$('.reply-trigger').off('click');
					
					$('#comment-entries').empty();
					$('#comment-entries').append(response);
					
					$('.reply-trigger').on('click', _setForm);
					
					$("#comment-entries span.show-more").off('click');
					$("#comment-entries span.show-more").on('click', function(event)
					{
						if($(this).hasClass('open')) {
							$(event.target).parent().prev('ul').children('.covered').slideUp();
							$(this).removeClass('open');
							$(this).text('pokaż więcej odpowiedzi');
						} else {
							$(event.target).parent().prev('ul').children('.covered').slideDown({
								start: function () {
									$(this).css({
								    	display: "inline-block"
									})
								}
							});
							$(this).addClass('open');
							$(this).text('pokaż mniej odpowiedzi');
						}
					});
					
					$("#forum-menu li").removeClass('selected');
					
					trigger.addClass('selected');
					
					$('#cat-initial').text(txt);
					
					_scrollToTrigger(trigger);
				},
				
				complete: function()
				{
					_isLocked = false;
					$('#forum-waiter').hide();
				}
			});
		}
	}
	
	function _scrollToTrigger(element)
	{
		$('html, body').animate({
			scrollTop: $(element).offset().top - 228
	    }, 500);
	}
	
	function _share(event)
	{
		var shareBox = $('#share-project'),
			trigger = $(event.target),
			klass = trigger.attr('class').split(' ')[0],
			url = undefined;
		
		switch(klass) {
			case 'face':
				url='https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(shareBox.data('url').replace(/&amp;/g,'&'));
				_openPop(url, '');
				
			break;
			case 'goo':
				url='https://plus.google.com/share?url=' + encodeURIComponent(shareBox.data('url').replace(/&amp;/g,'&'));
				_openPop(url, '');
				
			break;
			case 'pin':
				
				url='//www.pinterest.com/pin/create/button/?' + $.param({url:shareBox.data('url').replace(/&amp;/g,'&'), media:shareBox.data('media').replace(/&amp;/g,'&'), description:shareBox.data('description')});
				_openPop(url, "pin" + (new Date).getTime());
				
			break;
			case 'url':
				if($('#links-wrapper').is(':visible')) {
					$('#links-wrapper').slideUp();
				}
				
				$('#link-box').slideDown();
			break;
			
			case 'mail':
				if($('#link-box').is(':visible')) {
					$('#link-box').slideUp();
				}
				
				$('#links-wrapper').slideDown();
			break;
		}
	}
	
	function _openPop(url, title)
	{
		var printPop = window.open(url, title, 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1,width=660,height=500');
		printPop.focus();
	}
	
	function _commentError()
	{
		MessageBox.setMessage('Wypełnij poprawnie pola w formularzu.', 'error');
	}
	
	return {
		commentError: _commentError,
		setForm: _setFormWithCatId
	};
})();

//Options
var Options = (function()
{
	var _isLocked = false,
		_selectedOption = undefined,
		_selectedId = undefined,
		_sketchOffset = undefined,
		_interiorOffset = undefined,
		_elevationOffset = 0,
		_optionsOffset = undefined,
		_navBarHeight = 100,
		_timeout = undefined,
		_isMobile = false;
	
	$(document).ready(function()
	{
		_selectedOption = 'comment';
		_selectedId = 'comment-list';
		
		if(window.location.hash && window.location.hash == '#realizacje') {
			$('#loader-box').addClass('open');
		}
		
		$('#nav-bar').on('click', 'a', function(event)
		{
			var trigger = $(this),
				id = trigger.data('id'),
				target = trigger.data('target'),
				offset = undefined,
				isOptionChanged = false;
	
			if(target == 'render-box' || target == 'addons') {
				offset = 0;
			} else {
				offset = $('#' + target).offset().top - _navBarHeight + 1;
			}

			$('html,body').animate({scrollTop: offset}, 500);
			
			if(id != _selectedOption) {
				switch(id) {
					case 'comment':
						$('#' + _selectedId).fadeOut(400);
						
						$('#comment-list').fadeIn(400, function()
						{
							Toolbox.readFooterOffset();
							_selectedId = 'comment-list';
							
							_checkOffsets();
						});
						
						isOptionChanged = true;
						
					break;
					
					case 'similar':
						if($('#similar-list').get(0)) {
							$('#' + _selectedId).fadeOut(400);
							
							$('#similar-list').fadeIn(400, function()
							{
								Toolbox.readFooterOffset();
								_selectedId = 'similar-list';
								
								_checkOffsets();
							});
						} else {
							_getSimiliar();
						}
						
						isOptionChanged = true;
						
					break;
					
					case 'faq':
						if($('#faq-list').get(0)) {
							$('#' + _selectedId).fadeOut(400);
							
							$('#faq-list').fadeIn(400, function()
							{
								Toolbox.readFooterOffset();
								_selectedId = 'faq-list';
								
								_checkOffsets();
							});
						} else {
							_getFaq();
						}
						
						isOptionChanged = true;
						
					break;
					
					case 'real':
						if($('#real-list').get(0)) {
							$('#' + _selectedId).fadeOut(400);
							
							$('#real-list').fadeIn(400, function()
							{
								Toolbox.readFooterOffset();
								_selectedId = 'real-list';
								
								_checkOffsets();
							});
						} else {
							_getRealizations();
						}
						
						isOptionChanged = true;
						
					break;
					
					case 'vendors':
						if($('#vendors-list').get(0)) {
							
							$('#' + _selectedId).fadeOut(400);
							
							$('#vendors-list').fadeIn(400, function()
							{
								Toolbox.readFooterOffset();
								_selectedId = 'vendors-list';
								
								_checkOffsets();
							});
						} else {
							_getVendors();
						}
						
						isOptionChanged = true;
						
					break;
					
					case 'dload':
						$('#' + _selectedId).fadeOut(400);
						$('#dload-list').fadeIn(400, function()
						{
							Toolbox.readFooterOffset();
							_selectedId = 'dload-list';
							
							_checkOffsets();
						});
						
						isOptionChanged = true;
						
					break;
					
					case 'sr':
						if($('#showroom').get(0)) {
							$('#' + _selectedId).fadeOut(400);
							
							$('#showroom').fadeIn(400, function()
							{
								Toolbox.readFooterOffset();
								_selectedId = 'showroom';
								
								_checkOffsets();
							});
						} else {
							_getShowroom();
						}
						
						isOptionChanged = true;
						
					break;
				}
				
				if(isOptionChanged) {
					$('#option').html(trigger.html());
					_selectedOption = id;
				}
			}
		});
		
		
		$('#gosketch-trigger').on('click', function(event)
		{
			var offset = undefined;
			
			offset = $('#sketch-box').offset().top - _navBarHeight + 1;
			
			$('html,body').animate({scrollTop: offset}, 500);
			
			_checkOffsets();
		});
		
		$('.filesDloadTrigger').on('click', function(event)
		{
			$('#dloadTrigger').click();
		});
		
		enquire.register("screen and (max-width: 599px)", {
			match : function() 
			{
				_navBarHeight = 122;
		    },
		    
			unmatch : function() 
			{
				_navBarHeight = 100;
		    }
		});
		
		enquire.register("screen and (max-width: 1023px)", {
			match : function() 
			{
				_isMobile = true;
		    },
		    
			unmatch : function() 
			{
				_isMobile = false;
		    }
		});
	});
	
	
	$(window).load(function()
	{
		$('#nav-bar ul').show();
		
		_checkElevationsGap();
		$(window).trigger('scroll');
		
		window.setTimeout(_getOffsets, 250);
		
		if($('#option').size() > 0) {
			if(window.location.hash && window.location.hash == '#realizacje') {
				
				$('html,body').animate({scrollTop: (_optionsOffset - _navBarHeight + 1)}, 500, function()
				{
					_selectedOption = 'real';
					$('#option').html('Realizacje');
					_getRealizations();
				});
			}
		}
		
		_fixFlexsliderHeight();
	});
	
	
	$(window).resize(function()
	{
		$('.sketch-box img').css({
			maxHeight: $(window).height() - 96
		});
		
		window.clearTimeout(_timeout);
		_timeout = window.setTimeout(_checkElevationsGap, 250);
	});

	
	$(window).scroll(function()
	{
		_checkOffsets();
	});
	
	
	function _checkElevationsGap()
	{
		var sketchBoxOffset = $('#sketch-box').offset(),
			targetOffset = undefined,
			targetHeight = undefined,
			rendersHeight = 0,
			dataHeight = 0;

		if($('#elevations-list').size() > 0) {
			
			targetOffset = $('#elevations').offset(),
			targetHeight = $('#elevations').height();
			
			if(sketchBoxOffset.top - (targetOffset.top + targetHeight) > 540) {
				$('#elevations-list').addClass('full');
			} else {
				$('#elevations-list').removeClass('full');
			}
		}
		
		if(!_isMobile) {
			rendersHeight = $($('#render-box > div')[0]).height();
			dataHeight = $($('#data-box > div')[0]).height();
			
			//Check Left and right side heights
			if(dataHeight - rendersHeight > 540) {
				if($('#project-help').is(':visible')) {
					$('#project-help').hide();
					$('#buyer-benefits-header').hide();
					$('#buyer-benefits').hide();
				}
			} else {
				if(!$('#project-help').is(':visible')) {
					$('#project-help').show();
					$('#buyer-benefits-header').show();
					$('#buyer-benefits').show();
				}
			}
		}
		
		
		if($('#sketch-box').length) {
			_sketchOffset = $('#sketch-box').offset().top;
		}

		if($('#option').size() > 0) {
			_optionsOffset = $('#option').offset().top;
			
			if($('#interiors').size() > 0) {
				_interiorOffset = $('#interiors').offset().top;
			}
			
			if($('#elevations').size() > 0) {
				_elevationOffset = $('#elevations').offset().top;
			}
		}
		
		_checkOffsets();
	}
	
	
	function _getOffsets()
	{
		if($('#sketch-box').length) {
			_sketchOffset = $('#sketch-box').offset().top;
		}

		if($('#option').size() > 0) {
			_optionsOffset = $('#option').offset().top;
			
			if($('#interiors').size() > 0) {
				_interiorOffset = $('#interiors').offset().top;
			}
			
			if($('#elevations').size() > 0) {
				_elevationOffset = $('#elevations').offset().top;
			}
		}
		
		_checkOffsets();
	}
	
	
	function _checkOffsets()
	{
		var offset = $(window).scrollTop();

		if(offset + _navBarHeight >= _optionsOffset) {
		
			$('#nav-bar li').removeClass('selected');
			
			switch(_selectedOption) {
				case 'comment':
					$('#nav-bar li.navi-comment').addClass('selected');
				break;
				case 'similar':
					$('#nav-bar li.navi-similar').addClass('selected');
				break;
				case 'faq':
					$('#nav-bar li.navi-faq').addClass('selected');
				break;
				case 'real':
					$('#nav-bar li.navi-real').addClass('selected');
				break;
				case 'vendors':
					$('#nav-bar li.navi-vendors').addClass('selected');
				break;
				case 'dload':
					$('#nav-bar li.navi-dload').addClass('selected');
				break;
			}
			
		} else {
			if(offset + _navBarHeight >= _sketchOffset && $('#sketch-box').is(':visible')) {
				$('#nav-bar li').removeClass('selected');
				$('#nav-bar li.navi-sketch').addClass('selected');
			} else if(offset + _navBarHeight >= _elevationOffset && $('#elevations').is(':visible')) {
				$('#nav-bar li').removeClass('selected');
				$('#nav-bar li.navi-elevations').addClass('selected');
			} else if(_interiorOffset && offset + _navBarHeight >= _interiorOffset && $('#interiors').is(':visible')) {
				$('#nav-bar li').removeClass('selected');
				$('#nav-bar li.navi-interiors').addClass('selected');
			} else {
				$('#nav-bar li').removeClass('selected');
				$('#nav-bar li.navi-render').addClass('selected');
			}
		}
	}
	
	function _fixFlexsliderHeight() 
	{
	    // Set fixed height based on the tallest slide
	    $('.flexslider').each(function()
	    {
	        var sliderHeight = 0;
	        
	        $(this).find('.slides > li').each(function()
	        {
	            slideHeight = $(this).height();
	            if (sliderHeight < slideHeight) {
	                sliderHeight = slideHeight;
	            }
	        });
	        
	        $(this).find('ul.slides').css({'height' : sliderHeight});
	    });
	}
	
	function _getSimiliar()
	{
		if(!_isLocked) {
			
			$.ajax({
				url: '/index.php?module=project&action=get_similar',
				data: {
					id: $('#title').data('id')
				},
				type: 'post',
				dataType: 'html',
				
				beforeSend: function() {
					_isLocked = true;
					$('#loader-box').addClass('open');
//kręcioł
				},
				
				success: function(response)
				{
					$('#' + _selectedId).fadeOut(400);
					
					$('#extras-wrapper').append(response);
					
					Overview.register();
					
					$('.mobile-sadie').on('click', function(event)
					{
						event.preventDefault();
						$(this).parents('figure').addClass('on');
					});
					
					$('.close-sadie').on('click', function()
					{
						 $(this).parent('figure').removeClass('on');
					});
					
					$('#similar-list span').on('click', function(event)
					{
						var trigger = $(event.target);
						
						if(trigger.hasClass('fav')) {
							Fav.fav(trigger);
						}
						
						if(trigger.hasClass('compare')) {
							Fav.compare(trigger);
						}
					});
					
					$('#similar-list').fadeIn(400, function()
					{
						_selectedId = 'similar-list'
						$('#loader-box').removeClass('open');
						_isLocked = false;
					});
					
					setTimeout(function() {
						Toolbox.readFooterOffset();
						_checkOffsets();
					}, 1000);
					
					
					if(typeof $.fancybox == 'object') {
						$('li.slide').click(function()
						{
							$.ajax({
						        url: '/index.php?module=project&action=get_slideshow&id=' + $(this).data('id'),
								type: 'post',
								dataType: 'json',
						        success : function(data)
						        {
						        	$.fancybox.open(data.data, {
						        		onActivate: function()
										{
											$('#tool-box').addClass('off');
											if(typeof Tawk_API.hideWidget == 'function') {
												Tawk_API.hideWidget();
											}
										},
										afterClose: function()
										{
											$('#tool-box').removeClass('off');
											if(typeof Tawk_API.showWidget == 'function') {
												Tawk_API.showWidget();
											}
										}
						        	});
						        }
							});
							
							return false;
						});
					}
				}
			});
		}
	}
	
	function _getFaq()
	{
		if(!_isLocked) {
			
			$.ajax({
				url: '/index.php?module=project&action=get_faq',
				data: {
					id: $('#title').data('id')
				},
				type: 'post',
				dataType: 'html',
				
				beforeSend: function() {
					_isLocked = true;
					$('#loader-box').addClass('open');
//kręcioł
				},
				
				success: function(response)
				{
					$('#' + _selectedId).fadeOut(400);
					
					$('#extras-wrapper').append(response);
					$('#faq-list').fadeIn(400, function()
					{
						Toolbox.readFooterOffset();
						_selectedId = 'faq-list'
						$('#loader-box').removeClass('open');
						_checkOffsets();
						_isLocked = false;
					});
				}
			});
		}
	}
	
	function _getRealizations()
	{
		if(!_isLocked) {
			$.ajax({
				url: '/index.php?module=project&action=get_project_realizations',
				data: {
					id: $('#title').data('id')
				},
				type: 'post',
				dataType: 'html',
				
				beforeSend: function() {
					_isLocked = true;
					$('#loader-box').addClass('open');
//kręcioł
				},
				
				success: function(response)
				{
					$('#' + _selectedId).fadeOut(400);
					
					$('#extras-wrapper').append(response);
					
					$('#real-list').fadeIn(400, function()
					{
						Toolbox.readFooterOffset();
						_selectedId = 'real-list'
							
						$('#loader-box').removeClass('open');
						_checkOffsets();
						_isLocked = false;
					});
				}
			});
		}
	}
	
	function _getVendors()
	{
		if(!_isLocked) {
			$.ajax({
				url: '/index.php?module=project&action=get_partner',
				type: 'post',
				dataType: 'html',
				
				beforeSend: function() {
					_isLocked = true;
					$('#loader-box').addClass('open');
//kręcioł
				},
				
				success: function(response)
				{
					$('#' + _selectedId).fadeOut(400);
					
					$('#extras-wrapper').append(response);
					
					$('#vendors-list .external').on('click', function()
					{
						window.open($(this).attr('href'));
						return false;
					});
					
					$('#vendors-list').fadeIn(400, function()
					{
						Toolbox.readFooterOffset();
						_selectedId = 'vendors-list'
							
						$('#loader-box').removeClass('open');
						_isLocked = false;
						_checkOffsets();
					});
				}
			});
		}
	}
	
	function _getShowroom()
	{
		if(!_isLocked) {
			$.ajax({
				url: '/index.php?module=project&action=get_showroom',
				data: {
					id: $('#title').data('id')
				},
				type: 'post',
				dataType: 'html',
				
				beforeSend: function() {
					_isLocked = true;
					$('#loader-box').addClass('open');
//kręcioł
				},
				
				success: function(response)
				{
					$('#' + _selectedId).fadeOut(400);
					
					$('#extras-wrapper').append(response);
					
					$('#showroom').fadeIn(400, function()
					{
						Toolbox.readFooterOffset();
						_selectedId = 'showroom'
							
						$('#loader-box').removeClass('open');
						_checkOffsets();
						_isLocked = false;
					});
					
					Showroom.registerObservers();
				}
			});
		}
	}
})();


//Rendery
var Render = (function()
{
	var _isInitialized = false;
	
	$(window).scroll(function()
	{
		_load();
	});
	
	function _load()
	{
		if(!_isInitialized) {
			$('a.dummy img').each(function(index) 
			{
				var img = new Image(),
					target = $(this),
					box = target.parent('a');
				
				img.src = target.data('uri');
				
				if (img.complete == true) {
					target.attr('src', img.src);
					box.removeClass('dummy');
					
				} else {
					img.onload = function()
					{
						target.attr('src', img.src);
						box.removeClass('dummy');
					};
				}
			});
			
			_isInitialized = true;
		}
	}
	
	return {
		load: _load
	};
})();

var ProjectAddons = (function()
{
	function _register()
	{
		$("#addonsContent").on('click', '.order', function(a) 
		{
			if (!$(this).hasClass('disabled')) {
				var e = CookieManager.getCookie('SA_basket');
				e = e ? $.evalJSON(e) : {};
				var r = {};
				r.eid = $(this).attr("data-extras"), 
				r.price = $(this).attr("data-price"), 
				r.name = encodeURIComponent($(this).attr("data-name")), 
				r.thumb = $(this).attr("data-thumb"),  
				r.epid = $(this).attr("data-epid"),  
				e['e'+r.eid] = r, 
				CookieManager.setCookie("SA_basket", $.toJSON(e), 30);
				
				$(this).addClass('disabled');
				$(this).html('w koszyku');
				
				Basket.setTemplate('extras', r);
				
				$('#menu-basket-trigger').show();
			}
		});
		
		$('#ajax-info-overlay-close').on('click', _unregister);
	}
	
	function _unregister()
	{
		$('#ajax-info-overlay-close').off('click', _unregister);
	};

	
	return {
		register: _register
	}
})();

var PromoNotify = (function()
{
	var _isLocked = false;
	
	function _registerForm()
	{
		Validator.registerForm($('#project-promo-notify-box form'));
		AjaxInfo.register('#project-promo-notify-box .ajax-info');
		
		$('#promo-notify-pid').val($('#title').data('id'))
		
		$('#promo-notify-form').on('submit', _submit);
		$('#ajax-info-overlay-close').on('click', _unregister);
	}
	
	function _unregister()
	{
		Validator.unregisterForm($('#project-promo-notify-box form'));
		AjaxInfo.unregister('#project-promo-notify-box .ajax-info');
		
		$('#promo-notify-form').off('submit', _submit);
		$('#ajax-info-overlay-close').off('click', _unregister);
	};
	
	function _onSend()
	{
		if($('#promo-notify-form .error_field').size() > 0) {
			
			$('#promo-notify-box').text('Wypełnij poprawnie formularz');
			$('#promo-notify-waiter').hide();
			
			if($('#promo-notify-button').prop('disabled')) {
				$('#promo-notify-button').prop('disabled', false);
			}
		}
	};
	
	function _submit(event)
	{
		event.preventDefault();

		if(!_isLocked && Validator.isValidated(this)) {
			$.ajax({
				url: '/index.php?module=project_extend&action=promo_notify',
//				data: {
//					email: $('#promo-notify-email').val(),
//					pid: $('#promo-notify-pid').val()
//				},
				data: $(this).serialize(),
				type: 'post',
				dataType: 'json',
		
				beforeSend: function() {
					$('#promo-notify-box').text('');
					$('#promo-notify-waiter').show();
				},
				
				success: function(response)
				{
					switch (response.status) {
						case 'ok':
							$('#promo-notify-box').text('Twój e-mail został zarejestrowany.');
							$('#promo-notify-button').hide();
						break;
						
						case 'duplicated':
							$('#promo-notify-box').text('Twój e-mail już jest zarejestrowany dla tego projektu.');
							$('#promo-notify-button').hide();
						break;
						
						case 'error':
							$('#promo-notify-box').text('Nieprawidłowy email.');
						break;
		
						default:
							$('#promo-notify-box').text('Rejestracja nie powiodła się. Spróbuj ponownie, bądź skontaktuj się z nami telefonicznie.');
					
					}
					
					_isLocked = false;
					
					$('#promo-notify-waiter').hide();
				}
			});
		}
	}
	
	return {
		onSend: _onSend,
		registerForm: _registerForm
	}
})();


var ProjectRequest = (function()
{
	var _isLocked = false,
		_fileDownloadCheckTimer = undefined;
	
	function _registerRequestForm()
	{
		$("#fr-pid").val($("#title").data('id'));
		
		$("#fr-time").selectmenu({
			appendTo: "#fr-time-box"
		});

		Validator.registerForm($('#file-request-form-box form'));
		AjaxInfo.register('#file-request-form-box .ajax-info');
		
		$('#file-request-form').on('submit', _submit);
		$('#ajax-info-overlay-close').on('click', _unregister);
		$('#ajax-info-overlay').on('click', _popClick);
	}
	
	function _unregister()
	{
		Validator.unregisterForm($('#file-request-form-box form'));
		AjaxInfo.unregister('#file-request-form-box .ajax-info');
		$('#file-request-form').off('submit', _submit);
		$('#ajax-info-overlay-close').off('click', _unregister);
		$('#ajax-info-overlay').off('click', _popClick);
	};
	
	
	function _popClick()
	{
		var trigger = $(event.target);
		
		if(trigger.attr('id') == $(this).attr('id')) {
			_unregister();
		}
	}
	
	
	function _registerGenRequestForm()
	{
		$("#fr-pid").val($("#title").data('id'));
		
		$("#fr-time").selectmenu({
			appendTo: "#fr-time-box"
		});

		Validator.registerForm($('#file-request-form-box form'));
		AjaxInfo.register('#file-request-form-box .ajax-info');
		
		$('#file-request-form').on('submit', function()
		{
			var token = $('#download_token_id').val();
			
			$('#request-file-trigger').prop('disabled', true);
			$('#fr-waiter').show();
			
			_fileDownloadCheckTimer = window.setInterval(function() 
			{
			      var dldCookieValue = CookieManager.getCookie('fileDownloadToken');
			      if (dldCookieValue == token) {
			    	  CookieManager.setCookie('fileDownloadToken', token, -1);
			    	  window.clearInterval(_fileDownloadCheckTimer);
			    	  $('#fr-waiter').hide();
			      }
		    }, 500);
		});
		
		$('#ajax-info-overlay-close').on('click', _unregisterGenForm);
	}
	
	function _unregisterGenForm()
	{
		Validator.unregisterForm($('#file-request-form-box form'));
		AjaxInfo.unregister('#file-request-form-box .ajax-info');
		$('#file-request-form').off('submit');
		$('#ajax-info-overlay-close').off('click', _unregisterGenForm);
	};
		
	function _onSend()
	{
		if($('#file-request-form .error_field').size() > 0) {
			if($('#fr-time-box').hasClass('error_field')) {
				$('#fr-time-box').parent().addClass('error_field');
			}
			
			$('#fr-fail-box').text('Wypełnij poprawnie formularz');
			$('#fr-waiter').hide();
			
			if($('#request-file-trigger').prop('disabled')) {
				$('#request-file-trigger').prop('disabled', false);
			}
		}
	};
	
	
	function _submit(event)
	{
		event.preventDefault();

		if(!_isLocked && Validator.isValidated(this)) {
			$.ajax({
				url: '/index.php?module=project&action=add_file_request',
				data: $(this).serialize(),
				type: 'post',
				dataType: 'json',
				
				beforeSend: function() {
					_isLocked = true;
					$('#fr-fail-box').text('');
					$('#fr-waiter').show();
				},
				
				success: function(response)
				{
					$('#request-file-trigger').hide();
					if (response.feedback.status == 'download') {
						$('#fr-fail-box').text('Dziękujemy za pobranie pliku.');
						$('body').append('<a id="openLinkNewTab" href="/pobierz-plik/' + response.feedback.file + '" download="' + response.feedback.name + '"><span></span></a>').find('#openLinkNewTab span').click().remove();
						_isLocked = false;
					} else if(response.feedback.status == 'ok') {
						$('#fr-fail-box').text('Zamówienie zostało zarejestrowane. Plik zostanie wysłany do Ciebie e-mailem.');
						_isLocked = false;
					} else {
						$('#fr-fail-box').text(response.feedback.error);
						_isLocked = true;
					}
					
					$('#fr-waiter').hide();
				}
			});
		}
	}
	
	return {
		registerRequestForm: _registerRequestForm,
		registerGenRequestForm: _registerGenRequestForm,
		onSend: _onSend
	};
})();


var SketchManager = (function()
{
	var isLoaded = false;
	
	$(document).ready(function()
	{
		var counter = 0;
		var imgNum = $('img.sketchImg').length;
	
		if (imgNum) {
			$('img.sketchImg').each(function(i,img) {
				
				var image = new Image();
				image.src = $(img).attr('src');
				
				if (image.complete == true) {
					counter++;
					if (counter == imgNum) {
						isLoaded = true;
						_drawPoly();
					}
				} else {
					image.onload = function() {
						counter++;
						if (counter == imgNum) {
							isLoaded = true;
							_drawPoly();
						}
					};
				}
			});
		}
	});
	
	$(window).resize(function()
	{
		if (isLoaded) {
			_drawPoly();
		}
	});
	
	
	function _drawPoly()
	{
		$('svg.sketchAuthorize').each(function(i,svgObject) {
			
			var rooms = $(svgObject).attr('data-rooms');
			var __rooms = $.evalJSON(rooms);
			var offsetX = parseFloat($(svgObject).attr('data-offsetX'));
			var offsetY = parseFloat($(svgObject).attr('data-offsetY'));
			var sid = $(svgObject).attr('data-sid');
			var mirror = $(svgObject).attr('data-mirror');
			var sketch = document.getElementById('sketch-'+sid);
			var oWidth = sketch.naturalWidth;
			var oHeight = sketch.naturalHeight;
			var sWidth = sketch.clientWidth;
			var sHeight = sketch.clientHeight;
			var sx = $('#sketch-'+sid).position().left;
			var wRatio = sWidth/oWidth;
			var hRatio = sHeight/oHeight;
			var svg = $(svgObject);
			var polygons = '';
			var tooltip = $('#sketchToolTip');
			var selectedPolyId = undefined;

			$.each(__rooms, function(room_id, pointsObj)
			{
				points = '';
				$.each(pointsObj, function(pid, coordinates)
				{
					if (coordinates.x) {
						if (mirror == 1) {
							newX = (oWidth-(coordinates.x-offsetX))*wRatio;
							newY = (coordinates.y-offsetY)*hRatio;
						} else {
							newX = coordinates.x*wRatio;
							newY = coordinates.y*hRatio;
						}
						points = points+' '+newX+','+newY;
					}
				});
		
				polygons = polygons+'<polygon points="'+points+'" data-relation="'+pointsObj.ptspid+'" data-desc="'+pointsObj.desc+'" data-name="'+pointsObj.name+'" />';
			});

			svg.html(polygons);
			svg.css("left", sx+"px");
			
			$('polygon').each(function(idx,poly) {
				$(poly).on('mouseover', function() {
					$('#sketchParam_'+$(poly).attr('data-relation')).addClass('hover');
				});
				
				$(poly).on('mouseout', function() {
					$('#sketchParam_'+$(poly).attr('data-relation')).removeClass('hover');
				});
				
				$(poly).on('click', function(event) {
					if (selectedPolyId != poly) {
						$('polygon').each(function(idx2,poly2) {
							$(poly2).removeClass('selected');
						});
						tooltip.hide();
						event.preventDefault();
						event.stopPropagation();
						var content = '';
		
						if ($(poly).attr('data-name') != 'undefined') {
							content = '<strong>'+$(poly).attr('data-name')+'</strong>';
							if ($(poly).attr('data-desc') != 'undefined') {
								content = content+'<br>';
							}
						}
						
						if ($(poly).attr('data-desc') != 'undefined') {
							content = content+$(poly).attr('data-desc');
						}
						
						if (content) {
							tooltip.html('<span>'+content+'</span>');
							tooltip.css("left", (event.pageX-(tooltip.width()/2)-5)+"px");
							tooltip.css("top", (event.pageY+35)+"px");
							tooltip.fadeIn();
							
							$(poly).addClass('selected');
							selectedPolyId = poly;
						} else {
							tooltip.hide();
						}
					} else {
						tooltip.click();
					}
				});
			});
			
			tooltip.on('click', function(event) {
				$('polygon').each(function(idx2,poly2) {
					$(poly2).removeClass('selected');
				});
				event.preventDefault();
				event.stopPropagation();
				tooltip.fadeOut();
				selectedPolyId = undefined;
			});
		});
	};
})();

//Basket && addons
var Basket = (function()
{
	$(document).ready(function()
	{
		$("#addToBasket").click(function(event) {
			if (!$("#addToBasket").hasClass('disabled')) {
				event.preventDefault();
				var e = CookieManager.getCookie('SA_basket');
				e = e ? $.evalJSON(e) : {};
				var r = {};
				r.pid = $("#addToBasket").attr("data-project"), 
				r.price = $("#addToBasket").attr("data-price"), 
				r.name = encodeURIComponent($("#addToBasket").attr("data-name")), 
				r.thumb = $("#addToBasket").attr("data-thumb"), 
				r.link = $("#addToBasket").attr("data-link"), 
				r.version = $("#addToBasket").attr("data-version"),
				r.pomp = $("#pompSel").is(":checked"),
				e['p'+r.pid+'v'+r.version] = r, 
				CookieManager.setCookie("SA_basket", $.toJSON(e), 30);
				MessageBox.setMessage('Projekt '+decodeURIComponent(r.name)+' został dodany do koszyka. <a href="/zamowienie/koszyk.html">Przejdź do koszyka</a> by sfinalizować zakupy.');
				
				$('#addToBasket').addClass('disabled');
				$('#addToBasket').html('w koszyku');
				
				_setTemplate('project', r);
				
				$('#menu-basket-trigger').show();
				
				var basketExtras = {};
				var id = r.pid+'_25_';
				if ($("#pompSel").is(":checked")) {
					if (StorageManager.get('basketExtras')) {
						basketExtras = $.evalJSON(StorageManager.get('basketExtras'));
						basketExtras[id] = id;
						StorageManager.store('basketExtras', $.toJSON(basketExtras));
					}
				} else {
					if (StorageManager.get('basketExtras')) {
						basketExtras = $.evalJSON(StorageManager.get('basketExtras'));
						delete(basketExtras[id]);
						StorageManager.store('basketExtras', $.toJSON(basketExtras));
					}
				}
			}
		});
		
		$("#addonsContent").on('click', '.order', function(a) {
			if (!$(this).hasClass('disabled')) {
				var e = CookieManager.getCookie('SA_basket');
				e = e ? $.evalJSON(e) : {};
				var r = {};
				r.eid = $(this).attr("data-extras"), 
				r.price = $(this).attr("data-price"), 
				r.name = encodeURIComponent($(this).attr("data-name")), 
				r.thumb = $(this).attr("data-thumb"),  
				r.epid = $(this).attr("data-epid"),  
				e['e'+r.eid] = r, 
				CookieManager.setCookie("SA_basket", $.toJSON(e), 30);
				
				MessageBox.setMessage('Dodatek '+decodeURIComponent(r.name)+' został dodany do koszyka. <a href="/zamowienie/koszyk.html">Przejdź do koszyka</a> by sfinalizować zakupy.');
				
				$(this).addClass('disabled');
				$(this).html('w koszyku');
				
				_setTemplate('extras', r);
				
				$('#menu-basket-trigger').show();
			}
		});
	});
	
	function _setTemplate(type, r) {
		$('#tool-cart span.cart').addClass('notify');
		
		if (type == 'extras') {
			var _entryTemplate =
			'<li> \
				<ul> \
					<li><img src="'+r.thumb+'" alt="'+decodeURIComponent(r.name)+'" class="extras">'+decodeURIComponent(r.name)+'</li> \
					<li><span class="price">'+r.price+' zł</span></li> \
					<li><span class="remove" data-extras='+r.eid+'></span></li> \
				</ul> \
			</li>';
		} else {
			if (r.version == 'mirror') {
				var _entryTemplate =
					'<li> \
						<ul> \
							<li><a href="'+r.link+'"><img src="'+r.thumb+'" alt="'+decodeURIComponent(r.name)+'">'+decodeURIComponent(r.name)+' <small>(odbicie lustrzane)</small></a></li> \
							<li><span class="price">'+r.price+' zł</span></li> \
							<li><span class="remove" data-project='+r.pid+' data-version="mirror"></span></li> \
						</ul> \
					</li>';
			} else {
				var _entryTemplate =
					'<li> \
						<ul> \
							<li><a href="'+r.link+'"><img src="'+r.thumb+'" alt="'+decodeURIComponent(r.name)+'">'+decodeURIComponent(r.name)+'</a></li> \
							<li><span class="price">'+r.price+' zł</span></li> \
							<li><span class="remove" data-project='+r.pid+' data-version="normal"></span></li> \
						</ul> \
					</li>';
			}
		}
		
		$('#basketTabContent').append(_entryTemplate);
		if ($('#emptyBasket').length) {
			$('#emptyBasket').hide();
		}
		
		$('#finalBasketAction').show();
		$('#tabBasketContent').removeClass('emptyCart');
		$('#tabBasketContent').addClass('padded');
	}
	
	return {
		setTemplate: _setTemplate
	};

})();

//Params info overlay
(function()
{
	var _currentParamId = undefined,
		_isLocked = false;
	
	$(document).ready(function()
	{
		$('#usable-area').on('click', _getParamDescription);
		$('#technical-data-box').on('click', _getParamDescription);
		$('.project-box').on('click', _getParamDescription);
		$('#param-info-overlay-close').on('click', function()
		{
			$('#param-info-overlay').removeClass('open');
			if(typeof Tawk_API.showWidget == 'function') {
				Tawk_API.showWidget();
			}
		});
		
		$('#changes').on('click', _getDataTxt);
	});
	
	function _getParamDescription(event)
	{
		var trigger = $(event.target),
			children = undefined;
		
		children = trigger.children('span.param-info');
		
		if(children.size() > 0) {
			trigger = $(children[0]);
		}
		
		if(trigger.hasClass('param-info')) {
			
			if(_currentParamId != trigger.data('id') && !_isLocked) {
				$.ajax({
					url: '/index.php?module=ajax&action=get_param_info',
					data: {
						id: trigger.data('id')
					},
					type: 'post',
					dataType: 'html',
					
					beforeSend: function() {
						_isLocked = true;
						
						$('#param-info-over-box').empty();
//kręcioł
					},
					
					success: function(response)
					{
						$('#param-info-over-box').append(response);
						_isLocked = false;
						_currentParamId = trigger.data('id');
						$('#param-info-overlay').addClass('open');
						if(typeof Tawk_API.hideWidget == 'function') {
							Tawk_API.hideWidget();
						}
					}
				});
			} else {
				$('#param-info-overlay').addClass('open');
				if(typeof Tawk_API.hideWidget == 'function') {
					Tawk_API.hideWidget();
				}
			}
		}
	}
	
	
	function _getDataTxt(event)
	{
		var html = '';
		
		if(!_isLocked) {
			$('#param-info-over-box').empty();
			
			html = '<p><strong>Zmiany w projekcie</strong></p><p>' + $(event.target).data('txt') + '</p>';
			
			$('#param-info-over-box').append(html);
			
			$('#param-info-overlay').addClass('open');
			if(typeof Tawk_API.hideWidget == 'function') {
				Tawk_API.hideWidget();
			}
		}
	}
})();


//skeleton price
(function ()
{
	$(document).ready(function()
	{
		$('#skeleton-form').on('submit', function(event)
		{
			event.preventDefault();
	
			$.ajax({
				url: '/index.php?module=contact&action=skeleton',
				data: {
					project_name: $('#skeleton-name').val(),
					client: $('#skel-client').val(),
					email: $('#skel-email').val(),
					phone: $('#skel-phone').val(),
					age: $('#skel-age').val()
				},
				type: 'post',
				dataType: 'json',
		
				beforeSend: function() {
					$('#skeleton-fail-box').hide();
				},
		
				success: function(response)
				{
					switch (response.status) {
						case 'ok':
							$('#skeleton-fail-box').html('Wiadomość została wysłana. Nasz konsultant odpowie najszybciej jak to będzie możliwe.');
							$('#skeleton-button').attr("disabled", true);
							$('#skeleton-button').addClass("disabled");
						break;
						
						case 'error':
							$('#skeleton-fail-box').html('Nie udało się wysłać wiadomości. Spróbuj ponownie, bądź skontaktuj się z nami telefonicznie.');
						break;
		
						default:
							$('#skeleton-fail-box').html('Wypełnij poprawnie formularz kontaktowy.');
					}
					
					$('#skeleton-fail-box').show();
				}
			});
		});
	});
})();


//Showroom
var Showroom = (function()
{
	var _isLocked = false;
	
	$(document).ready(function()
	{
		_registerObservers();
	});
	
	
	$(window).resize(function()
	{
		_positionLabels();
	});
	
	
	function _registerObservers()
	{
		_positionLabels();
		
		$('.showroom-box').on('mouseenter', function() 
		{
			let box = this;
			
			if(!_isLocked) {
				_onEnter(box)
			} else {
				setTimeout(function(){_onEnter(box)}, 200);
			}
		});
		
		
		$('.showroom-box').on('mouseleave', function() 
		{
			if(_isLocked) {
				let box = $(this);
				
				$('#showroom-info').slideUp('fast', function() 
				{
					box.removeClass('on');
					$('.showroom').removeClass('shadow');
					$('#showroom-info').remove();
					$('#showroom-link').remove();
					
					_isLocked = false;
				});
			}
		});
		
		$('.showroom-switch').on('click', function()
		{
			let trigger = $(this);
			
			if(trigger.data('state') == 'on') {
				trigger.data('state', 'off').text('Włącz podgląd produktów').siblings('.showroom-box').hide();
			} else {
				trigger.data('state', 'on').text('Wyłącz podgląd produktów').siblings('.showroom-box').show();
			}
		});
	}
	
	
	function _onEnter(box)
	{
		let img = new Image();
	
			img.src = $(box).data('icon');
		
		if(!_isLocked) {
			
			_isLocked = true;
			
			$(box).addClass('on');
			$('.showroom').addClass('shadow');
			
			if (img.complete == true) {
				_buildInfo(box, img)
			} else {
				img.onload = function()
				{
					_buildInfo(box, img)
				};
			}
		}
	}
	
	
	function _buildInfo(box, img)
	{
		let infoHtml = '<div id="showroom-info" style="display: none;"><a href="' + $(box).data('img') + '" data-fancybox="showroom"><img src="' + img.src + '"></a>';
		
			if($(box).data('producer')) {
				infoHtml +=  '<p>Producent: ' + $(box).data('producer') + '</p>';
			}
		
			infoHtml += '<span>' + $(box).data('descript') + '</span></div>',

			info = $(infoHtml),
			link = $('<a href="' + $(box).data('link') + '" id="showroom-link" target="_blank">Zobacz w sklepie</a>');
		
		$(box).append(info);
		
		info.slideDown("fast", function() 
		{
			$(box).append(link);
			info.addClass('on');
		});
	}
	
	
	function _positionLabels()
	{
		let renderWidth = $('#render-box').width(),
			renderRate = renderWidth / 1350,
			showroomWidth = $('#showroom .showroom').first().width(),
			showroomRate = showroomWidth / 1350;
	
		
		$('#render-box .showroom-box').each(function(index) 
		{
		
			let posx = $(this).data('x') * renderRate,
				posy = $(this).data('y') * renderRate;
			
			// when box sticks out of the right image border
			if(posx + 320 > renderWidth) {
				$(this).addClass('moved');
				
				$(this).css({
					left: 'auto',
					right: renderWidth - posx - 18,
					top: posy + 13
				});
			} else {
				$(this).removeClass('moved');
				
				$(this).css({
					left: posx - 18,
					right: 'auto',
					top: posy + 13
				});
			}
		});
		
		$('#showroom .showroom-box').each(function(index) 
		{
			let posx = $(this).data('x') * showroomRate,
				posy = $(this).data('y') * showroomRate;
			
			if(posx + 320 > showroomWidth) {
				$(this).addClass('moved');
				
				$(this).css({
					left: 'auto',
					right: showroomWidth - posx - 18,
					top: posy + 13
				});
			} else {
				$(this).css({
					left: posx - 18,
					right: 'auto',
					top: posy + 13
				});
			}
		});
	}
	
	return {
		registerObservers: _registerObservers
	}
})();

