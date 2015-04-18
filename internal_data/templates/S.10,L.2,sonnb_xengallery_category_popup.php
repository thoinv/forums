<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($categories)
{
$__output .= '
	<ul class="secondaryContent blockLinksList">
		';
foreach ($categories AS $category)
{
$__output .= '
			';
if (!$category['parent_category_id'])
{
$__output .= '<li><a href="' . XenForo_Template_Helper_Core::link('gallery/categories', $category, array()) . '">' . XenForo_Template_Helper_Core::string('repeat', array(
'0' => '&nbsp; &nbsp; ',
'1' => htmlspecialchars($category['depth'], ENT_QUOTES, 'UTF-8')
)) . htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') . '</a></li>';
}
$__output .= '
		';
}
$__output .= '
	</ul>
';
}
else
{
$__output .= '
	<ul class="secondaryContent blockLinksList">
		<li class="secondaryContent muted">
			' . 'There is no category to display.' . '
		</li>
	</ul>
';
}
