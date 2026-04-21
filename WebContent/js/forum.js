(function()
{
	var _projectNames = {};
	
	$(document).ready(function()
	{
		var match = /pid=([0-9]+)/.exec(window.location.search);

		$('#category-select').selectmenu({
			appendTo: '#category-select-box'
		});
		
		if(match && match[1] > 0) {
			_getProjects(match[1]);
		}
		
		$('#forum-search-field').on('blur', function()
		{
			$(this).val($.trim($(this).val()));
		});
		
		$('#forum-project-field').on('focus', function()
		{
			$('#projects-holder').show();
		});
		
		$('#forum-project-field').on('keyup', function()
		{
			_getProjectNames();
		});
		
		$('#forum-project-field').on('blur', function()
		{
			setTimeout(function()
			{ 
				$('#projects-holder').hide();
			}, 100);
		});
		
		$('#projects-holder').on('click', 'li', _setProjectName);
		
		$('#forum-filters-form').on('submit', function(event)
		{
			var projectName = $.trim($('#forum-project-field').val()).toLowerCase();

			if(projectName) {
				if($.inArray(projectName, _.values(_projectNames)) == -1) {
					alert('Nazwa projektu jest nieprawidłowa!');
					return false;
				} else {
					$.each(_projectNames, function(key, value)
					{
						if(value == projectName) {
							$('#search-pid').val(key);
							return false;
						}
					});
				}
			} else {
				$('#search-pid').val(0);
			}
		});
	});
	
	function _getProjectNames(callback)
	{
		var name = $.trim($('#forum-project-field').val());
		
		if(name.length > 2) {
			$.ajax({
				url: '/index.php?module=project&action=getProjectNames',
				data: {query: name},
				type: 'post',
				dataType: 'json',
				
				success: function(response)
				{
					$('#projects-holder li').remove();
					
					_projectNames = {};
					
					$.each(response.feedback, function(key, value)
					{
						var idx = Object.keys(value)[0],
							name = value[idx];
						
						$('#projects-holder').append('<li data-id="' + idx + '">' + name + '</li>');
						_projectNames[idx] = name.toLowerCase();
					});
				}
			});
		}
	}
	
	function _getProjects(id)
	{
		$.ajax({
			url: '/index.php?module=project&action=getForumProjects',
			data: {id: id},
			type: 'post',
			dataType: 'json',
			
			success: function(response)
			{
				_projectNames = {};
				
				$.each(response.feedback, function(key, value)
				{
					var idx = Object.keys(value)[0],
						name = value[idx];
					
					$('#projects-holder').append('<li data-id="' + idx + '">' + name + '</li>');
					_projectNames[idx] = name.toLowerCase();
					
					$('#forum-project-field').val(_projectNames[id]);
					$('#search-project-name').text(_projectNames[id]);
				});
			}
		});
	}
	
	function _setProjectName(event)
	{
		var trigger = $(event.target);

		$('#forum-project-field').val(trigger.html());
		$('#projects-holder').hide();
	}
})();
