<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Mặt cười';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('help', false, array()), 'value' => 'Trợ giúp');
$__output .= '

';
$this->addRequiredExternal('css', 'help_smilies');
$__output .= '

<table class="dataTable smilieList">

<col style="width: 1%" />
<col style="width: 35%; white-space: nowrap; word-wrap: normal;" />
<col style="white-space: nowrap; word-wrap: normal;" />

<tr class="dataRow">
	<th>' . 'Ảnh' . '</th>
	<th>' . 'Tiêu đề' . '</th>
	<th>' . 'Ký tự' . '</th>
</tr>

';
foreach ($smilieCategories AS $smilieCategoryId => $smilieCategory)
{
$__output .= '
	';
if ($smilieCategoryId)
{
$__output .= '
		<tr>
			<td colspan="3"><h3 class="sectionFooter">' . htmlspecialchars($smilieCategory['title'], ENT_QUOTES, 'UTF-8') . '</h3></td>
		</tr>
	';
}
$__output .= '
	';
foreach ($smilieCategory['smilies'] AS $smilie)
{
$__output .= '
	<tr class="dataRow">
			<td>
				';
if ($smilie['sprite_mode'])
{
$__output .= '
					<img src="styles/default/xenforo/clear.png" alt="' . htmlspecialchars($smilie['title'], ENT_QUOTES, 'UTF-8') . '" class="mceSmilieSprite mceSmilie' . htmlspecialchars($smilie['smilie_id'], ENT_QUOTES, 'UTF-8') . '" />
				';
}
else
{
$__output .= '
					<img src="' . htmlspecialchars($smilie['image_url'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($smilie['title'], ENT_QUOTES, 'UTF-8') . '" class="mceSmilie" />
				';
}
$__output .= '
			</td>
			<td>' . htmlspecialchars($smilie['title'], ENT_QUOTES, 'UTF-8') . '</td>
			<td>
				';
foreach ($smilie['smilieTextArray'] AS $smilieText => $rotator)
{
$__output .= '
					<span class="' . (($rotator) ? ('smilieTextRotator' . htmlspecialchars($rotator, ENT_QUOTES, 'UTF-8')) : ('')) . '"><span class="smilieText">' . htmlspecialchars($smilieText, ENT_QUOTES, 'UTF-8') . '</span></span>
				';
}
$__output .= '
			</td>
		</tr>
	';
}
$__output .= '
';
}
$__output .= '
</table>';
