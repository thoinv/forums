!function($, window, document, _undefined)
{
	XenForo.similarthreadsId = function($form)
	{ 
		var typewatch = (function()
		{
			var timer = 0;
			return function(callback, ms)
			{
				clearTimeout (timer);
				timer = setTimeout(callback, ms);
			}  
		})(); 
		$title = $form.find('input[name="title"]');
		$title.keyup(function() 
		{ 
			typewatch(function () 
			{
				var pathname = $(location).attr('href');
				var newPathname = pathname.replace('create-thread','similarthreads');
				XenForo.ajax(
				newPathname,
				$form.serializeArray(),
				function(ajaxData, textStatus)
				{
					if (ajaxData.templateHtml)
					{
						new XenForo.ExtLoader(ajaxData, function()
						{
							$('#similarthreadsId-result').html('<div>' + ajaxData.templateHtml + '</div>');
						});
					}
				});
			}, 500);
		});		
	}	
	XenForo.register('form.Preview', 'XenForo.similarthreadsId');	
}
(jQuery, this, document);