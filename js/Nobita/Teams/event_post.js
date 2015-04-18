/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
	/**
	 * Enables AJAX quick reply for profile posts.
	 *
	 * @param $jQuery form#eventPoster
	 */
	XenForo.eventPoster = function($form) { this.__construct($form); };
	XenForo.eventPoster.prototype =
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

			var $textarea = this.$form.find('textarea');
			$textarea.val('');
			var ed = $textarea.data('XenForo.BbCodeWysiwygEditor');
			if (ed)
			{
				ed.resetEditor(null, true);
			}

			this.$form.trigger('QuickReplyComplete');

			if (XenForo.hasTemplateHtml(e.ajaxData))
			{
				new XenForo.ExtLoader(e.ajaxData, function()
				{
					$('#noComments').remove();

					$(e.ajaxData.templateHtml).xfInsert('prependTo', '#eventCommentsList');
				});
			}

			var $textarea = this.$form.find('textarea[name="message"]')
				.val('')
				.blur();

			return false;
		}
	};

	// *********************************************************************

	XenForo.register('#eventPoster', 'XenForo.eventPoster'); // form#eventPoster
}
(jQuery, this, document);