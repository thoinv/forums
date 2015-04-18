<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($canAddExistingContentToTab)
{
$__output .= '
	<a href="' . htmlspecialchars($addTabsLink, ENT_QUOTES, 'UTF-8') . '" class="OverlayTrigger addLink">' . 'Add Tab' . '</a>
';
}
