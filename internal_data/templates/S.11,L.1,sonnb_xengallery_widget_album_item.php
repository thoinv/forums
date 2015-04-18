<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li style="' . (($widget['options']['thumbnail_width']) ? ('width: ' . htmlspecialchars($widget['options']['thumbnail_width'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . ' ' . (($widget['options']['thumbnail_height']) ? ('height: ' . htmlspecialchars($widget['options']['thumbnail_height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '">
	<a class="thumbnail" href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array(
'_source' => 'widget'
)) . '" title="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" style="' . (($widget['options']['thumbnail_width']) ? ('width: ' . htmlspecialchars($widget['options']['thumbnail_width'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . ' ' . (($widget['options']['thumbnail_height']) ? ('height: ' . htmlspecialchars($widget['options']['thumbnail_height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '">
		<img title="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $album['cover']['description'],
'1' => '100'
)) . '" title="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $album['cover']['description'],
'1' => '100'
)) . '" src="' . htmlspecialchars($album['cover']['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" style="' . htmlspecialchars($album['cover']['style'], ENT_QUOTES, 'UTF-8') . ' ' . (($widget['options']['thumbnail_width'] && $album['cover']['medium_width']) ? ('width: ' . htmlspecialchars($album['cover']['medium_width'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . ' ' . (($widget['options']['thumbnail_height'] && $album['cover']['medium_height']) ? ('height: ' . htmlspecialchars($album['cover']['medium_height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '" />
	</a>
	';
if (!$widget['options']['hideTitle'])
{
$__output .= '
		<p class="background">&nbsp;</p>
		<div class="title">
			<a title="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '">' . XenForo_Template_Helper_Core::callHelper('wordtrim', array(
'0' => $album['title'],
'1' => $widget['options']['title_limit']
)) . '</a>
		</div>
	';
}
$__output .= '
	';
if (!$widget['options']['hideAuthor'])
{
$__output .= '
		<div class="info">
			' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $album
)) . ',
			';
if ($widget['options']['type'] == ('new'))
{
$__output .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($album['album_date'],array(
'time' => htmlspecialchars($album['album_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else if ($widget['options']['type'] == ('lastUpdate'))
{
$__output .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($album['post_updated_date'],array(
'time' => htmlspecialchars($album['post_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else if ($widget['options']['type'] == ('mostViewed'))
{
$__output .= '
				' . htmlspecialchars($album['view_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'Views' . '
			';
}
else if ($widget['options']['type'] == ('mostCommented'))
{
$__output .= '
				' . htmlspecialchars($album['comment_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'Comments' . '
			';
}
else if ($widget['options']['type'] == ('mostLiked'))
{
$__output .= '
				' . htmlspecialchars($album['likes'], ENT_QUOTES, 'UTF-8') . ' ' . 'Likes' . '
			';
}
else if ($widget['options']['type'] == ('recentlyLiked'))
{
$__output .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($album['like_date_sort'],array(
'time' => htmlspecialchars($album['like_date_sort'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else
{
$__output .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($album['album_date'],array(
'time' => htmlspecialchars($album['album_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
$__output .= '
		</div>
	';
}
$__output .= '
</li>';
