<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($xenOptions['openfire_livesearch_enable'])
{
$__output .= '
	';
if ($canSearch)
{
$__output .= '
		';
$this->addRequiredExternal('css', 'openfire_livesearch');
$__output .= '
		';
$__compilerVar3 = '';
$__compilerVar3 .= '<script>
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
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '

		';
if ($forum)
{
$__output .= '
			<input type="hidden" name="openfireliveurl" data-openfireliveurl="' . XenForo_Template_Helper_Core::link('forums/live-result', $forum, array()) . '" />
		';
}
else if ($xenOptions['openfire_livesearch_forum_id'])
{
$__output .= '
			<input type="hidden" name="openfireliveurl" data-openfireliveurl="forums/' . htmlspecialchars($xenOptions['openfire_livesearch_forum_id'], ENT_QUOTES, 'UTF-8') . '/live-result" />
		';
}
$__output .= '

		<div class="livesearch">
			<dl id="livesearch_header">
				<dd class="main">
					<span>';
$__compilerVar4 = '';
$__output .= $this->callTemplateHook('openfire_livesearch_header', $__compilerVar4, array());
unset($__compilerVar4);
$__output .= '</span>
				</dd>
			</dl>

			<div id="livesearch_bar">
				<input type="search" name="keywords" value="" class="textCtrl" placeholder="' . 'Enter your Search here!' . '" id="livesearch_input" />

				<div id="livesearch_toggle">
					';
if (!$xenOptions['openfire_livesearch_toggle'])
{
$__output .= '
						<script type="text/javascript">
						        var expires = 7; // number of days
							expires = new Date(new Date().getTime() + expires * 86400000); // milliseconds in a day

							$(document).ready(function ()
							{
								$(".livesearch").show();
			
								$("#livesearch_toggle").click(function ()
								{
									$("#livesearch_header").slideToggle(500);
									$("#livesearch_input").slideToggle(500);
									$("#OpenFireLiveSearch").slideToggle(500);
								});
							});
						</script>
		
						<a class="callToAction" href="javascript:void(0)">
							<span>&uarr; &darr;</span>
						</a>
					';
}
$__output .= '
				</div>
			</div>

			<div id="OpenFireLiveSearch"></div>
		</div>
	';
}
$__output .= '
';
}
