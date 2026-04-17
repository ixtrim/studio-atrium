(function()
{
	var _isOpen = false;
	
	$(document).ready(function()
	{
		$('#subject').val(StorageManager.get('forum_title'));
		$('#content').val(StorageManager.get('forum_content'));
		
		StorageManager.remove('forum_title');
		StorageManager.remove('forum_content');
		
		if($('#post-form-wrapper').is(':visible')) {
			_isOpen = true;
		}
		
		$('#add-thread').on('click', function()
		{
			if(_isOpen) {
				$('#post-form-wrapper').slideUp('fast');
				$(this).html('Dodaj temat');
			} else {
				$('#post-form-wrapper').slideDown('fast');
				$(this).html('Zamknij');
			}
			
			_isOpen = !_isOpen;
			Uploader.repositionUploadForms();
		});
		
		$('#notify').on('change', function()
		{
			if (!$('#notify').hasClass('notShow')) {
				if($(this).is(':checked')) {
					$('#post-mail-box').slideDown('fast');
				} else {
					$('#post-mail-box').slideUp('fast');
				}
			}
		});
		
		$('#forum-search-trigger').on('click', function()
		{
			$('#search-forum').slideToggle();
		});
		
		//To jest po to aby user nie stracił treści posta gdy będzie chciał się zalogować
		$('#post-login-trigger').on('click', _cachePost);
		$('#login').on('click', _cachePost);
	});
	
	
	function _cachePost()
	{
		var title = $.trim($('#subject').val()),
			content = $.trim($('#content').val());
		
		if(title) {
			StorageManager.store('forum_title', $.trim($('#subject').val()));
		}
		
		if(content) {
			StorageManager.store('forum_content', $.trim($('#content').val()));
		}
	}
})();
