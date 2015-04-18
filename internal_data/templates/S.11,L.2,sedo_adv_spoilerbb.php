<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sedo_adv_spoilerbb');
$__output .= '

';
if ($xenOptions['AdvBBcodeBar_debug_devmode'])
{
$__output .= '
	';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/src/advbar_allinone.src.js');
$__output .= '	
';
}
else
{
$__output .= '
	';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/advbar_allinone.js');
$__output .= '
';
}
$__output .= '

<div class="adv_spoilerbb AdvSpoilerbbCommand" data-easing="' . htmlspecialchars($xenOptions['AdvBBcodeBar_spoilerbb_easing_effect'], ENT_QUOTES, 'UTF-8') . '" data-duration="' . htmlspecialchars($xenOptions['AdvBBcodeBar_spoilerbb_easing_duration'], ENT_QUOTES, 'UTF-8') . '">
	<div class="adv_spoilerbb_title">
		<span class="adv_spoilerbb_caption">' . (($options['1']) ? ($options['1']) : ('Spoiler')) . '</span>
		<noscript><span class="adv_spoilerbb_noscript">' . '(Move your mouse to the spoiler area to reveal the content)' . '</span></noscript>
		<input class="adv_spoiler_display" type="button" value="' . 'Display' . '" />
		<input class="adv_spoiler_hidden" type="button" value="' . 'Hide' . '" />
	</div>
	<div class="adv_spoilerbb_content_box">
		<div class="adv_spoilerbb_content_noscript">' . $content . '</div>
	</div>
</div>
';
