$(document).ready(function(){
	hiddenSelectorTrigger();
});
function hiddenSelectorTrigger(){
	$('.hiddenSelector').change(function(){
		$outer = $(this).parent();
		if($(this).val()){
			$outer.children('.hiddenContainer').hide();
			$outer.children('.hiddenContainer.hiddenContainer_'+$(this).val()).show();
		}else{
			$outer.children('.hiddenContainer').hide();
		}
	});
	$('.hiddenSelector').each(function(){
		$outer = $(this).parent();
		if($(this).val()){
			$outer.children('.hiddenContainer').hide();
			$outer.children('.hiddenContainer.hiddenContainer_'+$(this).val()).show();
		}else{
			$outer.children('.hiddenContainer').hide();
		}
	});
}
/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
	/**
	 * Censor word listener for the options page. This handles automatically
	 * creating additional text boxes when necessary.
	 *
	 * @param jQuery li.ModernStatisticOptionListener to listen to
	 */
	XenForo.ModernStatisticOptionListener = function($element) { this.__construct($element); };
	XenForo.ModernStatisticOptionListener.prototype =
	{
		__construct: function($element)
		{
			$element.find('select.tabType').one('change', $.context(this, 'createChoice'));

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

			$new.find('*[name]').each(function()
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
			hiddenSelectorTrigger();
			this.__construct($new);
		}
	};

	// *********************************************************************

	XenForo.register('li.ModernStatisticOptionListener', 'XenForo.ModernStatisticOptionListener');

}
(jQuery, this, document);
