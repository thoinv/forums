/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
	XenForo.bdSocialShare_FacebookTargetTester = function($container)
	{
		this.__construct($container);
	};

	XenForo.bdSocialShare_FacebookTargetTester.prototype = {
		__construct: function($container)
		{
			this.$container = $container;
			this.$trigger = $container.find('a');
			this.$input = $container.parent().find('.bdSocialShare_Input');
			this.$targetContainerTrigger = $container.parent().find('.bdSocialShare_TargetContainer a');
			this.triggerText = this.$trigger.text();

			this.setup();
		},

		setup: function()
		{
			this.$targetContainerTrigger.bind({
				'bdSocialShare_Target_Chosen': $.context(this, 'toggleVisibility')
			});
			
			this.$trigger.click($.context(this, 'test'));

			this.toggleVisibility();
		},
		
		toggleVisibility: function()
		{
			var self = this;

			window.setTimeout(function()
			{
				var value = self.$input.val();
				
				if (value != '')
				{
					self.$container.show();
				}
				else
				{
					self.$container.hide();
				}
				
				self.cleanUp();
				self.$trigger.text(self.triggerText);
			}, 100);
		},
		
		test: function(e)
		{
			e.preventDefault();
			
			var value = this.$input.val();
			var href = this.$trigger.prop ? this.$trigger.prop('href') : this.$trigger.attr('href');
			
			if (value && !this.loading)
			{
				this.loading = XenForo.ajax(
					href,
					{
						targetId: value,
					},
					$.context(this, 'loadSuccess')
				);
			}
		},
		
		loadSuccess: function(ajaxData, textStatus)
		{
			this.loading = false;
			var $trigger = this.$trigger;
			
			$trigger.html(textStatus);
			
			this.cleanUp();

			if (ajaxData._redirectTarget)
			{
				$(' <a href="' + ajaxData._redirectTarget + '" target="_blank" class="bdSocialShare_FacebookTargetTestResult" style="margin-left: 5px;"">' + ajaxData._redirectTarget + '</a>').insertAfter($trigger);
			}
		},
		
		cleanUp: function()
		{
			this.$trigger.siblings('.bdSocialShare_FacebookTargetTestResult').empty().remove();
		}
	};

	XenForo.register('.bdSocialShare_FacebookTargetTester', 'XenForo.bdSocialShare_FacebookTargetTester');
}
(jQuery, this, document);