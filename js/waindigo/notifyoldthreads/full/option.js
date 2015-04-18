/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined) {
	XenForo.NotifyOldThreadsOptionListener= function($element) { this.__construct($element); };
	XenForo.NotifyOldThreadsOptionListener.prototype = {
		__construct: function($element) {
			$element.one('keypress', $.context(this, 'createChoice'));

			this.$element = $element;
			if (!this.$base) {
				this.$base = $element.clone();
			}
		},

		createChoice: function() {
			var $new = this.$base.clone(),
				nextCounter = this.$element.parent().children().length;

			$new.find('input[name]').each(function() {
				var $this = $(this);
				$this.attr('name', $this.attr('name').replace(/\[(\d+)\]/, '[' + nextCounter + ']'));
			});

			$new.find('*[id]').each(function() {
				var $this = $(this);
				$this.removeAttr('id');
				XenForo.uniqueId($this);

				if (XenForo.formCtrl) {
					XenForo.formCtrl.clean($this);
				}
			});

			$new.xfInsert('insertAfter', this.$element);

			this.__construct($new);
		}
	};

	// *********************************************************************

	XenForo.NotifyOldThreadsThreadId= function($input) { this.__construct($input); };
	XenForo.NotifyOldThreadsThreadId.prototype = {
		__construct: function($input) {
			this.$input = $input;
			$input.one('keypress', $.context(this, 'clearInfo'));
		},

		clearInfo: function() {
			var $title = $('#' + this.$input.attr('id') + 'Info');
			$title.xfRemove();
		}
	};

	// *********************************************************************

	XenForo.register('li.NotifyOldThreadsOptionListener', 'XenForo.NotifyOldThreadsOptionListener');
	XenForo.register('input.NotifyOldThreadsThreadId', 'XenForo.NotifyOldThreadsThreadId');

}
(jQuery, this, document);