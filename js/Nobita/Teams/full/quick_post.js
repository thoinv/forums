/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
	/**
	 * Enables AJAX quick reply for profile posts.
	 *
	 * @param $jQuery form#teamQuickPosting
	 */
	XenForo.teamQuickPosting = function($form) { this.__construct($form); };
	XenForo.teamQuickPosting.prototype =
	{
		__construct: function($form)
		{
			this.$form = $form.bind(
			{
				AutoValidationBeforeSubmit: $.context(this, 'beforeSubmit'),
				AutoValidationComplete: $.context(this, 'formValidated')
			});

			this.submitEnableCallback = XenForo.MultiSubmitFix(this.$form);
		},

		beforeSubmit: function(e)
		{
			// unused at present
		},

		formValidated: function(e)
		{
			if (e.ajaxData._redirectTarget)
			{
				window.location = e.ajaxData._redirectTarget;
			}

			if (this.submitEnableCallback)
			{
				this.submitEnableCallback();
			}

			this.$form.find('input:submit').blur();

			if (XenForo.hasTemplateHtml(e.ajaxData))
			{
				new XenForo.ExtLoader(e.ajaxData, function()
				{
					$('#noMessages').remove();

					$(e.ajaxData.templateHtml).xfInsert('prependTo', '#messageSimpleList');
				});
			}

			var $textarea = $('#teamQuickPosting').find('textarea');
			$textarea.val('');
			var ed = $textarea.data('XenForo.BbCodeWysiwygEditor');
			if (ed)
			{
				ed.resetEditor();
			}

			this.$form.trigger('teamQuickReplyComplete');
			this.$form.find('.AttachmentList.New li:not(#AttachedFileTemplate)').xfRemove();
			this.$form.find('.AttachmentInsertAllBlock').xfRemove();

			return false;
		}
	};

	// *********************************************************************

	XenForo.register('#teamQuickPosting', 'XenForo.teamQuickPosting'); // form#teamQuickPosting
}
(jQuery, this, document);