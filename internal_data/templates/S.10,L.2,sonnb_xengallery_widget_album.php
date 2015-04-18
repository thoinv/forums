<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_widget_album');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_widget');
$__output .= '

';
$__compilerVar3 = '';
$__compilerVar3 .= '
					';
if ($albums)
{
$__compilerVar3 .= '
					';
foreach ($albums AS $album)
{
$__compilerVar3 .= '
						';
$__compilerVar4 = '';
$__compilerVar4 .= '<li style="' . (($widget['options']['thumbnail_width']) ? ('width: ' . htmlspecialchars($widget['options']['thumbnail_width'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . ' ' . (($widget['options']['thumbnail_height']) ? ('height: ' . htmlspecialchars($widget['options']['thumbnail_height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '">
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
$__compilerVar4 .= '
		<p class="background">&nbsp;</p>
		<div class="title">
			<a title="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '">' . XenForo_Template_Helper_Core::callHelper('wordtrim', array(
'0' => $album['title'],
'1' => $widget['options']['title_limit']
)) . '</a>
		</div>
	';
}
$__compilerVar4 .= '
	';
if (!$widget['options']['hideAuthor'])
{
$__compilerVar4 .= '
		<div class="info">
			' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $album
)) . ',
			';
if ($widget['options']['type'] == ('new'))
{
$__compilerVar4 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($album['album_date'],array(
'time' => htmlspecialchars($album['album_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else if ($widget['options']['type'] == ('lastUpdate'))
{
$__compilerVar4 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($album['post_updated_date'],array(
'time' => htmlspecialchars($album['post_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else if ($widget['options']['type'] == ('mostViewed'))
{
$__compilerVar4 .= '
				' . htmlspecialchars($album['view_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'Đọc' . '
			';
}
else if ($widget['options']['type'] == ('mostCommented'))
{
$__compilerVar4 .= '
				' . htmlspecialchars($album['comment_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'Comments' . '
			';
}
else if ($widget['options']['type'] == ('mostLiked'))
{
$__compilerVar4 .= '
				' . htmlspecialchars($album['likes'], ENT_QUOTES, 'UTF-8') . ' ' . 'Thích' . '
			';
}
else if ($widget['options']['type'] == ('recentlyLiked'))
{
$__compilerVar4 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($album['like_date_sort'],array(
'time' => htmlspecialchars($album['like_date_sort'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else
{
$__compilerVar4 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($album['album_date'],array(
'time' => htmlspecialchars($album['album_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
$__compilerVar4 .= '
		</div>
	';
}
$__compilerVar4 .= '
</li>';
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
$__compilerVar3 .= '
					';
}
$__compilerVar3 .= '
					';
}
$__compilerVar3 .= '
				';
if (trim($__compilerVar3) !== '')
{
$__output .= '
	<div class="xengallerySidebar">
		';
if ($widget['options']['enable_scrollable'])
{
$__output .= '
			<a class="prev browse left" style="height: ' . (($widget['options']['thumbnail_height'] + 18) / 2) . 'px; padding-top: ' . (($widget['options']['thumbnail_height'] - 18) / 2) . 'px; "><span></span></a>
		';
}
$__output .= '
		<div class="albumsSidebar ' . (($widget['options']['enable_scrollable']) ? ('scrollable') : ('')) . '" 
			id="scrollable_widget_' . htmlspecialchars($widget['widget_id'], ENT_QUOTES, 'UTF-8') . '" 
			style="' . (($widget['options']['enable_scrollable']) ? ('height: ' . htmlspecialchars($widget['options']['thumbnail_height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '">
			<ul>
				' . $__compilerVar3 . '
			</ul>
		</div>
		';
if ($widget['options']['enable_scrollable'])
{
$__output .= '
			<a class="next browse right" style="height: ' . (($widget['options']['thumbnail_height'] + 18) / 2) . 'px; padding-top: ' . (($widget['options']['thumbnail_height'] - 18) / 2) . 'px; "><span></span></a>
		';
}
$__output .= '
	</div>
';
}
unset($__compilerVar3);
$__output .= '

';
if ($widget['options']['enable_scrollable'])
{
$__output .= '
<script type="text/javascript">
	!function($, window, document, _undefined) {
		$(\'#scrollable_widget_' . htmlspecialchars($widget['widget_id'], ENT_QUOTES, 'UTF-8') . '\').scrollable({
			mousewheel: false,
			keyboard: false,
			circular: true
		});
	}(jQuery, this, document);
</script>
';
}
