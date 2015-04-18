/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
	XenForo.InlineMessageEditor = function($form)
	{
		new XenForo.MultiSubmitFix($form);

		$form.bind(
		{
			AutoValidationBeforeSubmit: function(e)
			{
				if ($(e.clickedSubmitButton).is('input[name="more_options"]'))
				{
					e.preventDefault();
					e.returnValue = true;
				}
			},
			AutoValidationComplete: function(e)
			{
				var overlay = $form.closest('div.xenOverlay').data('overlay'),
					target = overlay.getTrigger().data('target');

				if (XenForo.hasTemplateHtml(e.ajaxData, 'messagesTemplateHtml') || XenForo.hasTemplateHtml(e.ajaxData))
				{
					e.preventDefault();
					overlay.close().getTrigger().data('XenForo.OverlayTrigger').deCache();

					XenForo.showMessages(e.ajaxData, overlay.getTrigger(), 'instant');
				}
				else
				{
					console.warn('No template HTML!');
				}
			}
		});
	};

	XenForo.showMessages = function(ajaxData, $ctrl, method)
	{
		var showMessage = function(selector, templateHtml)
		{
			switch (method)
			{
				case 'instant':
				{
					method =
					{
						show: 'xfShow',
						hide: 'xfHide',
						speed: 0
					};
					break;
				}

				case 'fadeIn':
				{
					method =
					{
						show: 'xfFadeIn',
						hide: 'xfFadeOut',
						speed: XenForo.speed.fast
					};
					break;
				}

				case 'fadeDown':
				default:
				{
					method =
					{
						show: 'xfFadeDown',
						hide: 'xfFadeUp',
						speed: XenForo.speed.normal
					};
				}
			}

			$(selector)[method.hide](method.speed / 2, function()
			{
				$(templateHtml).xfInsert('replaceAll', selector, method.show, method.speed);
			});
		};

		if (XenForo.hasResponseError(ajaxData))
		{
			return false;
		}

		if (XenForo.hasTemplateHtml(ajaxData, 'messagesTemplateHtml'))
		{
			new XenForo.ExtLoader(ajaxData, function()
			{
				$.each(ajaxData.messagesTemplateHtml, showMessage);
			});
		}
		else if (XenForo.hasTemplateHtml(ajaxData))
		{
			// single message
			new XenForo.ExtLoader(ajaxData, function()
			{
				showMessage($ctrl.data('messageselector'), ajaxData.templateHtml);
			});
		}
	};

	XenForo.CommentLoader = function($element) { this.__construct($element); };
	XenForo.CommentLoader.prototype =
	{
		__construct: function($link)
		{
			this.$link = $link;

			$link.click($.context(this, 'click'));
		},

		click: function(e)
		{
			var params = this.$link.data('loadparams');

			if (typeof params != 'object')
			{
				params = {};
			}

			e.preventDefault();

			XenForo.ajax(
				this.$link.attr('href'),
				params,
				$.context(this, 'loadSuccess'),
				{ type: 'GET' }
			);
		},

		loadSuccess: function(ajaxData)
		{
			var $replace,
				replaceSelector = this.$link.data('replace'),
				els = [], $els, i;

			if (XenForo.hasResponseError(ajaxData))
			{
				return false;
			}

			if (replaceSelector)
			{
				$replace = $(replaceSelector);
			}
			else
			{
				$replace = this.$link.parent();
			}

			if (ajaxData.comments && ajaxData.comments.length)
			{
				/*for (i = 0; i < ajaxData.comments.length; i++)
				{
					$.merge(els, $(ajaxData.comments[i]));
				}

				// xfInsert didn't like this
				$els = $(els).hide();
				$replace.xfFadeUp().replaceWith($els);
				$els.xfActivate().xfFadeDown();*/

				for (i = 0; i < ajaxData.comments.length; i++)
				{
					$(ajaxData.comments[i]).xfInsert('insertBefore', $replace);
				}
				$replace.xfHide();
			}
			else
			{
				$replace.xfRemove();
			}
		}
	};

	XenForo.CommentPoster = function($element) { this.__construct($element); };
	XenForo.CommentPoster.prototype =
	{
		__construct: function($link)
		{
			this.$link = $link;
			this.$commentArea = $($link.data('commentarea'));

			if (this.$commentArea.data('submiturl'))
			{
				this.submitUrl = this.$commentArea.data('submiturl');
			}
			else
			{
				this.submitUrl = $link.attr('href');
			}

			$link.click($.context(this, 'click'));

			this.$commentArea.find('input:submit, button').click($.context(this, 'submit'));
		},

		click: function(e)
		{
			e.preventDefault();

			this.$commentArea.xfFadeDown(XenForo.speed.fast, function()
			{
				$(this).find('textarea[name="message"]').focus();
			});

			/*this.$commentArea.find('.__uiCommentInput').css({
				'width': this.$commentArea.find('.elements').width() - this.$commentArea.find('.__uiSubmit').width() - 5, 
				'display': 'inline-block'
			});*/
		},

		submit: function(e)
		{
			e.preventDefault();

			var $form = this.$commentArea.closest('form');

			if ($form.length)
			{
				if (!$form.data('MultiSubmitDisable'))
				{
					XenForo.MultiSubmitFix($form);
				}
				$form.data('MultiSubmitDisable')();
			}

			XenForo.ajax(
				this.submitUrl,
				{ message: this.$commentArea.find('textarea[name="message"]').val() },
				$.context(this, 'submitSuccess')
			);
		},

		submitSuccess: function(ajaxData)
		{
			var $form = this.$commentArea.closest('form');
			if ($form.data('MultiSubmitEnable'))
			{
				$form.data('MultiSubmitEnable')();
			}

			if (XenForo.hasResponseError(ajaxData))
			{
				return false;
			}

			if (ajaxData.comment)
			{
				$(ajaxData.comment).xfInsert('insertBefore', this.$commentArea.data('insertbefore'));
			}

			this.$commentArea.find('textarea[name="message"]').val('');
		}
	};

	XenForo.notificationLink = function($link)
	{
		$link.click(function(e)
		{
			e.preventDefault();
			
			$link.get(0).blur();

			XenForo.ajax(
				$link.attr('href'),
				{ _xfConfirm: 1 },
				function (ajaxData, textStatus)
				{
					if (XenForo.hasResponseError(ajaxData))
					{
						return false;
					}

					$link.xfFadeOut(XenForo.speed.fast, function()
					{
						$link
							.attr('href', ajaxData.linkUrl)
							.html(ajaxData.linkPhrase)
							.xfFadeIn(XenForo.speed.fast);
					});
				}
			);
		});
	};
	
	XenForo.commentDeleteInline = function($link)
	{
		$link.click(function(e)
		{
			e.preventDefault();

			$link.get(0).blur();

			XenForo.ajax(
				$link.attr('href'),
				{ _xfConfirm: 1 },
				function (ajaxData, textStatus)
				{
					if (XenForo.hasResponseError(ajaxData))
					{
						return false;
					}

					$($link.data('target')).xfRemove(null, function(){}, XenForo.speed.slow, 'linear');
				}
			);
		});
	};

	XenForo.register('a.CommentLoader', 'XenForo.CommentLoader');
	XenForo.register('a.CommentPoster', 'XenForo.CommentPoster');

	XenForo.register('form.InlineMessageEditor', 'XenForo.InlineMessageEditor');

	XenForo.register('.notificationLink', 'XenForo.notificationLink');
	XenForo.register('.commentDeleteInline', 'XenForo.commentDeleteInline');
}
(jQuery, this, document);

jQuery(document).ready(function($) {

	var removedHighLight = false;
	setTimeout(function()
	{
		if (!removedHighLight)
		{
			removedHighLight = true;
			$('.Team_Highlight').removeClass('Team_Highlight');
		}
	}, 5000);
});

