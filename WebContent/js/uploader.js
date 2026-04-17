var StudioAtrium = (function () {
	var _vars = [];

	function _require(script, callback) {
		var scr = document.createElement('script');
		scr.type = 'text/javascript';
		scr.src = '/js/' + script;
		var headScripts = document.getElementsByTagName('script')[0];
		headScripts.parentNode.insertBefore(scr, headScripts.nextSibling);
		if (callback) {
			$(scr).on('load', function() {
				callback();
			});
		}
	}

	function _setVar(key, val) {
		_vars.set(key, val);
	}


	function _getVar(key) {
		return _vars.get(key);
	}


	return {
		require: _require,
		setVar: _setVar,
		getVar: _getVar
	};
}) ();


Uploader = (function ()
{
	var _uploadInProgress = false,

		_formTemplate =
			'<form method="post" action="/index.php" name="upForm-#{profile}" id="upForm-#{profile}" class="uploadForm" enctype="multipart/form-data"> \
				<input type="hidden" name="module" value="file_manager"> \
				<input type="hidden" name="action" value="upload_single_file"> \
				<input type="hidden" name="owner_uid" value="#{ownerUid}"> \
				<input type="hidden" name="profile" value="#{profile}"> \
				<input type="hidden" name="isTmpUid" value="#{isTmpUid}"> \
				#{options} \
				<input type="hidden" value="" name="APC_UPLOAD_PROGRESS" id="progressId-#{profile}"> \
				<input type="file" name="upfile" id="file-#{profile}" data-profile="#{profile}"> \
				<input type="submit" value="wyślij plik" id="submit-#{profile}"> \
			</form>';

	$(document).ready(function()
	{
		StudioAtrium.require('webtoolkit.aim.js');
		StudioAtrium.require('jquery.clonePosition.js');
		StudioAtrium.require('jquery.tmpl.1.1.1.js', _getUploadForms);

		if ($('#deleteFile')) {
			$('#deleteFile').click(_removeSingleFile);
		}
	});

	$(window).load(_repositionUploadForms);

	function _getUploadForms() {
		// Create form for each upload trigger
		$('.uploadTrigger').each(function(event, element)
		{
			_createUploadForm(element);
		});
	}


	/**
	 * Create upload form for upload trigger element
	 */
	function _createUploadForm(element)
	{
		if (!(profile = $(element).attr('data-profile'))) {
			return false;
		};

		tmpUid = 0;
		profileOptions = null;
		profileOptionsHTML = '';

		if ($('#isTmpUid') && $('#isTmpUid').val() == 1) {
			tmpUid = 1;
		}
		
		if (profileOptions = $(element).attr('data-options')) {
			profileOptions = jQuery.parseJSON(profileOptions);
			$.each(profileOptions, function(index, value) {
				profileOptionsHTML += '<input type="hidden" name="upload_options['+index+']" value="'+value+'">';
			});
		}

		var _formValues = {
			ownerUid: $('#ownerUid').val(),
			isTmpUid: tmpUid,
			profile: profile,
			options: profileOptionsHTML
		};

		formHTML = $.tmpl(_formTemplate, _formValues);

		$('#Content').append(formHTML);

		$('#file-' + profile).on('change', function(event)
		{
			if (!_uploadInProgress) {
				$('#submit-' + profile).click();
			}
		});

		$('#upForm-' + profile).attr('data-uploadTrigger', element.id);
		$('#upForm-' + profile).attr('data-profile', profile);
		$('#upForm-' + profile).on('submit', function(event)
		{
			if (!_uploadInProgress) {
				_uploadInProgress = true;

				$('#progressId-' + profile).val('up-' + profile + '-' + Date.now());
				AIM.submit(this, {
					'onStart' : _startUpload,
					'onComplete' : _completeUpload
				});
			}
		});

		return true;
	}


	/**
	 * Position upload forms over triggers
	 */
	function _repositionUploadForms()
	{
		$('.uploadTrigger').each(function (event, element)
		{
			$(element).show();
			profile = $(element).attr('data-profile');
			$('#upForm-' + profile).clonePosition(element);
		});
	}


	/**
	 * On file upload callback
	 *
	 * @param {String} response Response from server
	 */
	function _completeUpload(responseJSON)
	{
		_uploadInProgress = false;
		response = jQuery.parseJSON(responseJSON);
		if (response.fileUpload.status == 'ok') {
			$('#FMprogress').hide();
			switch (response.fileUpload.profile) {
				case 'CommentImage':
				case 'UserMessageFile':
				{
					var thmb = $('#thumbnailFile');
					var thmbContent = $('#thumbnailFile').html();
					var file = response.fileUpload.dest_path+'/'+response.fileUpload.file_with_path
						thmb.fadeOut("slow", function() {
							thmb.html(thmbContent + '<a href="'+file+'" target="_blank">'+ response.fileUpload.file_original_filename + '</a><a href="javascript:" class="remove" onClick="Uploader.removeSingleFile('+response.fileUpload.id+')"><img src="/img/x.png" class="remove"></a>');			
							thmb.fadeIn("slow");
							$('#thumbnailFileProgress').hide();
						});
				} break;
				case 'DiscussImage':
				{
					var thmb = $('#thumbnailFile');
					var thmbContent = $('#thumbnailFile').html();
					var file = response.fileUpload.dest_path+'/'+response.fileUpload.file_with_path
						thmb.fadeOut("slow", function() {
							thmb.html(thmbContent + '<a href="'+file+'" target="_blank" class="fileThmb" data-fileid="'+response.fileUpload.id+'"><img src="'+file+'" style="width: 200px; height: 133px; margin-left: 15px;"></a><a href="javascript:" class="remove" onClick="Uploader.removeSingleFile('+response.fileUpload.id+', 1)" data-fileid="'+response.fileUpload.id+'"><img src="/img/x.png" class="remove"></a>');			
							thmb.fadeIn("slow");
							$('#thumbnailFileProgress').hide();
							$('#thumbnailHeader').show();
						});
				}  break;
				case 'UserAvatar':
				{
					var thmb = $('#thumbnailFile');
					var thmbContent = $('#thumbnailFile').html();
					var file = response.fileUpload.dest_path+'/'+response.fileUpload.file_with_path
					thmb.fadeOut("slow", function() {
						thmb.html('<img src="'+file+'" alt="avatar">');			
						thmb.fadeIn("slow");
						$('#thumbnailFileProgress').hide();
					});
				} break;
			}
		} else if (response.fileUpload.status == 'ok_reload') {
			location.reload();
		} else if (response.fileUpload.status == 'ok_click') {
			$('#'+response.fileUpload.click_id).click();
		} else {
			$('#thumbnailFileProgress').hide();
			alert(response.fileUpload.message);
		}
	}


	/**
	 * On start file uploading callback
	 *
	 * @return {Boolean}
	 */
	function _startUpload(form)
	{
		thmb = $('#thumbnailFileProgress');
		thmb.show();

		return true;
	}


	/**
	 *
	 *
	 */
	function _removeSingleFile(fileId, removeThmb) {

		if (!confirm('Czy na pewno chcesz usunąć wskazany plik?')) {
			return;
		}

		tmpUid = 0;
		
		if ($('#isTmpUid') && $('#isTmpUid').val() == 1) {
			tmpUid = 1;
		}

		$.ajax({
			url: '/index.php',
			data: {
				module: 'file_manager',
				action: 'remove_single_file',
				id: fileId,
				owner_uid: $('#ownerUid').val(),
				is_tmp: tmpUid
			},
			type: 'post',
			dataType: 'json',

			complete: function(transport)
			{
				var response = transport.responseJSON;

				if (response.fileDelete.status == 'error') {
					alert(response.fileDelete.message);
				} else if (response.fileDelete.status == 'ok') {
					if (removeThmb) {
						$('#thumbnailFile .fileThmb').each(function(i,elem) {
							if ($(elem).data('fileid') == fileId) {
								$(elem).fadeOut();
							}
						});
						$('#thumbnailFile .remove').each(function(i,elem) {
							if ($(elem).data('fileid') == fileId) {
								$(elem).fadeOut();
							}
						});
					} else {
						location.reload();
					}
				}
			}
		});
	}

	/**
	 * Return Uploader Interface
	 */
	return {
		removeSingleFile: _removeSingleFile,
		repositionUploadForms: _repositionUploadForms
	};

})();
