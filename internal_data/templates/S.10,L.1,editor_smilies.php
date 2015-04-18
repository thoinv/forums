<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($showCategories)
{
$__output .= '
<ul class="tabs Tabs" data-panes="#SmilieCategories' . htmlspecialchars($serverTime, ENT_QUOTES, 'UTF-8') . ' > li">
';
foreach ($smilieCategories AS $smilieCategoryId => $smilieCategory)
{
$__output .= '
	<li><a>' . (($smilieCategoryId) ? (htmlspecialchars($smilieCategory['title'], ENT_QUOTES, 'UTF-8')) : ('Smilies')) . '</a></li>
';
}
$__output .= '
</ul>
';
}
$__output .= '

<ul class="' . (($showCategories) ? ('primaryContent') : ('secondaryContent')) . ' smilieContainer" id="SmilieCategories' . htmlspecialchars($serverTime, ENT_QUOTES, 'UTF-8') . '">
	';
foreach ($smilieCategories AS $smilieCategoryId => $smilieCategory)
{
$__output .= '
		<li class="smilieCategory">
			<ul>
				';
foreach ($smilieCategory['smilies'] AS $smilieId => $smilie)
{
$__output .= '
					<li class="Smilie" data-text="' . htmlspecialchars($smilie['primaryText'], ENT_QUOTES, 'UTF-8') . '">
					';
if ($smilie['sprite_mode'])
{
$__output .= '
						<img src="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/clear.png" class="mceSmilieSprite mceSmilie' . htmlspecialchars($smilie['smilie_id'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($smilie['title'], ENT_QUOTES, 'UTF-8') . '    ' . htmlspecialchars($smilie['smilieText']['0'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($smilie['smilieText']['0'], ENT_QUOTES, 'UTF-8') . '" data-smilie="yes" />
					';
}
else
{
$__output .= '
						<img src="' . htmlspecialchars($smilie['image_url'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($smilie['title'], ENT_QUOTES, 'UTF-8') . '    ' . htmlspecialchars($smilie['smilieText']['0'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($smilie['smilieText']['0'], ENT_QUOTES, 'UTF-8') . '" data-smilie="yes" />
					';
}
$__output .= '
					</li>
				';
}
$__output .= '
			</ul>
		</li>
	';
}
$__output .= '
</ul>';
