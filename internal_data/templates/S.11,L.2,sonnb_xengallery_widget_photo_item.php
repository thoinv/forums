<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li style="' . (($widget['options']['thumbnail_width']) ? ('width: ' . htmlspecialchars($widget['options']['thumbnail_width'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . ' ' . (($widget['options']['thumbnail_height']) ? ('height: ' . htmlspecialchars($widget['options']['thumbnail_height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '">
	<a class="thumbnail" href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array(
'_source' => 'widget'
)) . '" title="' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" style="' . (($widget['options']['thumbnail_width']) ? ('width: ' . htmlspecialchars($widget['options']['thumbnail_width'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . ' ' . (($widget['options']['thumbnail_height']) ? ('height: ' . htmlspecialchars($widget['options']['thumbnail_height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '">
		<img title="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)) . '" alt="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)) . '" src="' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" style="' . htmlspecialchars($content['style'], ENT_QUOTES, 'UTF-8') . ' ' . (($widget['options']['thumbnail_width'] && $content['medium_width']) ? ('width: ' . htmlspecialchars($content['medium_width'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . ' ' . (($widget['options']['thumbnail_height'] && $content['medium_height']) ? ('height: ' . htmlspecialchars($content['medium_height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '" />
	</a>
	';
if (!$widget['options']['hideTitle'])
{
$__output .= '
		<p class="background">&nbsp;</p>
		<div class="title"><a title="' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '">' . XenForo_Template_Helper_Core::callHelper('wordtrim', array(
'0' => $content['title'],
'1' => $widget['options']['title_limit']
)) . '</a></div>
	';
}
$__output .= '
	';
if (!$widget['options']['hideAuthor'])
{
$__output .= '
		<div class="info">
			' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $content
)) . ',
			';
if ($widget['options']['type'] == ('new'))
{
$__output .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => htmlspecialchars($content['content_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else if ($widget['options']['type'] == ('lastUpdate'))
{
$__output .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['post_updated_date'],array(
'time' => htmlspecialchars($content['post_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else if ($widget['options']['type'] == ('mostViewed'))
{
$__output .= '
				' . htmlspecialchars($content['view_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'Đọc' . '
			';
}
else if ($widget['options']['type'] == ('mostCommented'))
{
$__output .= '
				' . htmlspecialchars($content['comment_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'Comments' . '
			';
}
else if ($widget['options']['type'] == ('mostLiked'))
{
$__output .= '
				' . htmlspecialchars($content['likes'], ENT_QUOTES, 'UTF-8') . ' ' . 'Thích' . '
			';
}
else if ($widget['options']['type'] == ('recentlyLiked'))
{
$__output .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['like_date_sort'],array(
'time' => htmlspecialchars($content['like_date_sort'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else
{
$__output .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => htmlspecialchars($content['content_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
$__output .= '
		</div>
	';
}
$__output .= '
</li>';
