<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'bb_code');
$__output .= '


<div class="ToggleTriggerAnchor bbCodeSpoilerContainer">
	<button class="button bbCodeSpoilerButton ToggleTrigger Tooltip JsOnly"
		title="' . 'Click to reveal or hide spoiler' . '"
		data-target="> .SpoilerTarget"><span>' . 'Spoiler' . (($titleHtml) ? (': <span class="SpoilerTitle">' . $titleHtml . '</span>') : ('')) . '</span></button>
	<div class="SpoilerTarget bbCodeSpoilerText">' . $content . '</div>
</div>';
