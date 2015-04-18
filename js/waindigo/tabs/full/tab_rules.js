/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
	XenForo.TabRulesForm = function($form) { this.__construct($form); };
	XenForo.TabRulesForm.prototype =
	{
		__construct: function($form)
		{
			this.$form = $form;
			
			$form.find('select.TabRuleContentType').change($.context(this, 'change'));
			
			this.change();
		},

		change: function(e)
		{
			var $form = this.$form;
			
			$form.find('select.TabRuleContentType').each(function()
			{
				var $select = $(this);
				$form.find('.' + $select.data('tabsclass')).each(function()
				{
					if ($select.val() != $(this).data('contenttype')) {
						$(this).hide();
					} else {
						$(this).show();
					}
				});
			});
		}
	};

	XenForo.register('form.TabRulesForm', 'XenForo.TabRulesForm');
}
(jQuery, this, document);