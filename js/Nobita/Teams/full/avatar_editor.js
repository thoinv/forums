/** @param {jQuery} $ jQuery Object */
/*
	This is copied from xenforo packet.
	Modified by Nobita.
*/
!function($, window, document, _undefined)
{
	/**
	 * Avatar Editor
	 *
	 * @param jQuery $a .AvatarEditor
	 */
	XenForo.AvatarEditor = function($editor) { this.__construct($editor); };
	XenForo.AvatarEditor.prototype =
	{
		__construct: function($editor)
		{
			this.$form = $editor.bind(
			{
				submit:                   $.context(this, 'saveChanges'),
				AutoInlineUploadComplete: $.context(this, 'uploadComplete') // catch the event of a new avatar being successfully uploaded
			});

		},
		
		uploadComplete: function(e)
		{
			this.updateEditor(e.ajaxData);
		},

		updateEditor: function(ajaxData)
		{
			$('.previewAvatar').attr('src', ajaxData.url);
			$('input[name=team_avatar_date]').val(ajaxData.team_avatar_date);

			if (parseInt(ajaxData.team_avatar_date, 10))
			{
				$('#logoControl').show();
				$('input[name=delete]').removeAttr('checked');
			}
			else
			{
				$('#logoControl').hide();
			}
		},

		saveChanges: function(e)
		{
			if (this.$form.find('input[name=_xfUploader]').length)
			{
				return true;
			}

			e.preventDefault();

			XenForo.ajax(
				this.$form.attr('action'),
				this.$form.serializeArray(),
				$.context(this, 'saveChangesSuccess')
			);
		},

		saveChangesSuccess: function(ajaxData, textStatus)
		{
			if (XenForo.hasResponseError(ajaxData))
			{
				return false;
			}

			this.updateEditor(ajaxData);

			if (ajaxData.redirectUri)
			{
				location.href = ajaxData.redirectUri;
			}
		}
	};

	// *********************************************************************

	XenForo.register('.TeamAvatarEditor', 'XenForo.AvatarEditor');
}
(jQuery, this, document);

