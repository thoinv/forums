/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
	/**
	 * Keyword replace listener for the options page. This handles automatically
	 * creating additional text boxes when necessary.
	 *
	 * @param jQuery li.KeywordReplaceOptionListener to listen to
	 */
	XenForo.KeywordReplaceOptionListener = function($element) { this.__construct($element); };
	XenForo.KeywordReplaceOptionListener.prototype =
	{
		__construct: function($element)
		{
			$element.one('keypress', $.context(this, 'createChoice'));

			this.$element = $element;
			if (!this.$base)
			{
				this.$base = $element.clone();
			}
		},

		createChoice: function()
		{
			var $new = this.$base.clone(),
				nextCounter = this.$element.parent().children().length;

			$new.find('input[name]').each(function()
			{
				var $this = $(this);
				$this.attr('name', $this.attr('name').replace(/\[(\d+)\]/, '[' + nextCounter + ']'));
			});
			
			$new.find('select[name]').each(function()
			{
				var $this = $(this);
				$this.attr('name', $this.attr('name').replace(/\[(\d+)\]/, '[' + nextCounter + ']'));
			});

			$new.find('*[id]').each(function()
			{
				var $this = $(this);
				$this.removeAttr('id');
				XenForo.uniqueId($this);

				if (XenForo.formCtrl)
				{
					XenForo.formCtrl.clean($this);
				}
			});

			$new.xfInsert('insertAfter', this.$element);

			this.__construct($new);
		}
	};

	// *********************************************************************

	XenForo.register('li.KeywordReplaceOptionListener', 'XenForo.KeywordReplaceOptionListener');

}
(jQuery, this, document);