<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('js', 'js/bbm/bbcodes.js');
$__output .= '
';
$this->addRequiredExternal('css', 'bbm_bbcode_spoiler');
$__output .= '

';
if ($options['1'])
{
$__output .= '
	';
$buttonText = '';
$buttonText .= $options['1'] . ' (open)';
$__output .= '
	';
$hideText = '';
$hideText .= $options['1'] . ' (close)';
$__output .= '
	';
$noScriptHelp = '';
$noScriptHelp .= '<noscript><span class="bbm_spoil_noscript_hastitle">' . $options['1'] . '</span> <span class="bbm_spoil_noscript_desc">' . '(Move your mouse to reveal the content)' . '</span></noscript>';
$__output .= '
';
}
else
{
$__output .= '
	';
$buttonText = '';
$buttonText .= 'Show Spoiler';
$__output .= '
	';
$hideText = '';
$hideText .= 'Hide Spoiler';
$__output .= '
	';
$noScriptHelp = '';
$noScriptHelp .= '<noscript><span class="bbm_spoil_noscript_hastitle">' . 'Spoiler' . '</span> <span class="bbm_spoil_noscript_desc">' . '(Move your mouse to the spoiler area to reveal the content)' . '</span></noscript>';
$__output .= '
';
}
$__output .= '

<div class="bbCodeBlock bbCodeQuote bbmSpoilerBlock">
	<div class="attribution type">' . $noScriptHelp . '
		<span class="button JsOnly">
			<span class="bbm_spoiler_show">' . $buttonText . '</span>
			<span class="bbm_spoiler_hide" style="display:none">' . $hideText . '</span>
		</span>
	</div>
	<div class="quotecontent">
		<div class="bbm_spoiler_noscript"><blockquote>' . $content . '</blockquote></div>
	</div>
</div>';
