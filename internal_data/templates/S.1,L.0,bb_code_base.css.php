<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/* Basic, common, non-templated BB codes */

.bbCodeImage
{
	max-width: 100%;
}

.bbCodeImageFullSize
{
	position: absolute;
	z-index: 50000;
	' . XenForo_Template_Helper_Core::styleProperty('primaryContent.background') . '
}

.bbCodeStrike
{
	text-decoration: line-through;
}

img.mceSmilie,
img.mceSmilieSprite
{
	vertical-align: text-bottom;
	margin: 0 1px;
}

';
$__compilerVar1 = '';
$__compilerVar1 .= '/* smilie sprite classes */
';
if ($smilieSprites)
{
foreach ($smilieSprites AS $smilieId => $smilieSprite)
{
if ($smilieSprite['sprite_css'])
{
$__compilerVar1 .= '
img.mceSmilieSprite.mceSmilie' . htmlspecialchars($smilieId, ENT_QUOTES, 'UTF-8') . '
{
	' . $smilieSprite['sprite_css'] . '
}
';
}
}
}
$__output .= $__compilerVar1;
unset($__compilerVar1);
