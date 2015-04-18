!function($, window, document, _undefined) {

		/**
		 * A bit like quick reply, but for scratchpad notes
		 *
		 * @param jQuery form.AjaxChatLogs
		 */
		XenForo.GetChatLogs = function($form)
		{
			// bind a function onto the AutoValidationComplete event of the form AutoValidator
			$form.bind('AutoValidationComplete', function(e)
			{
				// check that templateHtml was received from the AJAX request
				if (e.ajaxData.templateHtml)
				{
					// prevent the normal AutoValidator success message and redirect stuff
					e.preventDefault();

					// hide the 'no notes' message if it's there, and when it is hidden...
					$('#LogsListEmpty').slideUp(XenForo.speed.fast, function()
					{
						// ... load any externals specified by the template, and when that's done...
						new XenForo.ExtLoader(e.ajaxData, function()
						{
							// ... prepend the templateHtml into the logs area
							$(e.ajaxData.templateHtml).xfInsert('replaceAll', '#LogsEntries', 'xfShow');
						});

						// set footer link attributes
						if (e.ajaxData.lastItemId != 0)
						{
							$('#FooterLink').fadeIn(XenForo.speed.fast, function()
							{
								$('#FooterLink').data('lastItemId', e.ajaxData.lastItemId);
							});
						}
						// re-enable the submit button if it's been disabled
						$form.find('input:submit').removeAttr('disabled').removeClass('disabled');
					});
				}
			});
		};
	
	
		XenForo.LoadNextLogs = function($link)
		{
			$link.click(function(e)
			{
				e.preventDefault();
				
				XenForo.ajax(
						$link.attr('href'),
						{
							lastItemId : $link.data('lastItemId'),
							usernames : $('input[name=usernames]').val(),
							dateBefore_date : $('input[name=dateBefore_date]').val(),
							dateBefore_hour : $('select[name=dateBefore_hour]').val(),
							dateBefore_mins : $('input[name=dateBefore_mins]').val(),
							dateAfter_date : $('input[name=dateAfter_date]').val(),
							dateAfter_hour: $('select[name=dateAfter_hour]').val(),
							dateAfter_mins: $('input[name=dateAfter_mins]').val(),
							channels : $('select[name=channels]').val()
						},
						function (ajaxData, textStatus)
						{
							if (ajaxData.templateHtml && ajaxData.lastItemId != 0)
							{
								new XenForo.ExtLoader(ajaxData, function()
								{
									$(ajaxData.templateHtml).xfInsert('appendTo', '#LogsEntries');
									$link.data('lastItemId', ajaxData.lastItemId);
								});
							}
							else
							{
								$link.fadeOut(XenForo.speed.fast);
							}
						}
					);
			});
		};
	
	// register the GetChatLogs functionality
	XenForo.register('form.AjaxChatLogs', 'XenForo.GetChatLogs');
	
	XenForo.register('a.AjaxChatLogs', 'XenForo.LoadNextLogs');

}(jQuery, this, document);