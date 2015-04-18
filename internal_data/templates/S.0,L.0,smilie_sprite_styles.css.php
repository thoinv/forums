<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/* smilie sprite classes */
';
if ($smilieSprites)
{
foreach ($smilieSprites AS $smilieId => $smilieSprite)
{
if ($smilieSprite['sprite_css'])
{
$__output .= '
img.mceSmilieSprite.mceSmilie' . htmlspecialchars($smilieId, ENT_QUOTES, 'UTF-8') . '
{
	' . $smilieSprite['sprite_css'] . '
}
';
}
}
}
