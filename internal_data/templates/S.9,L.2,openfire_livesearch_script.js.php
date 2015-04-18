<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<script>
! function ($, window, document, _undefined)
{
	fetchSearchResults = function (userinput)
	{
		XenForo.ajax($(\'[name=openfireliveurl]\').data(\'openfireliveurl\'),
		{
			query: userinput
		}, function (liveData, status)
		{
			if (!(XenForo.hasResponseError(liveData) || !liveData))
			{
				if (liveData.templateHtml === \'\')
				{
					$("#OpenFireliveSearch").xfFadeUp(XenForo.speed.fast, function ()
					{
						$(this).empty()
					});
				}
				else
				{
					new XenForo.ExtLoader(liveData, function ()
					{
						if ($("#OpenFireLiveSearch").is(":empty"))
						{
							$("#OpenFireLiveSearch").html(liveData.templateHtml).css(\'display\', \'none\').xfFadeDown(XenForo.speed.fast).xfActivate();
						}
						else
						{
							$("#OpenFireLiveSearch").html(liveData.templateHtml).xfActivate();
						}
					});
				}
			}
			else
			{
				return false;
			}
		});
	}

	//everytime the user lifts up the key, the search gets triggered. cool huh?
	liveSearchResults = function ($input)
	{
		$input.keyup(function (e)
		{
			fetchSearchResults($(this).val());
		});
	}

	//register our above functions to the field in our template
	XenForo.register(\'#livesearch_input\', \'liveSearchResults\');
}
(jQuery, this, document);
</script>';
