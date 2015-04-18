/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
	XenForo.ExistingTabForm = function($form) { this.__construct($form); };
	XenForo.ExistingTabForm.prototype =
	{
		__construct: function($form)
		{
			this.$form = $form;
			
			this.$select = $form.find($form.data('select'));
			
			this.$select.change($.context(this, 'change'));
			
			this.change();
		},

		change: function(e)
		{
			$select = this.$select;
			
			XenForo.ajax(this.$select.data('href'), { _value: this.$select.val(), _name: this.$select.attr('name'), _tabRuleId: this.$select.data('tabruleid') }, function(ajaxData, textStatus)
			{
				if (XenForo.hasResponseError(ajaxData))
				{
					return false;
				}
				if ($(ajaxData.templateHtml).length)
				{
					$(ajaxData.templateHtml).xfInsert('replaceAll', $select.data('target'), 'xfFadeIn', XenForo.speed.normal);
					
					$($select.data('target')).xfActivate();
				}
			});
		}
	};
	
	XenForo.register('.ExistingTabForm', 'XenForo.ExistingTabForm');
}
(jQuery, this, document);