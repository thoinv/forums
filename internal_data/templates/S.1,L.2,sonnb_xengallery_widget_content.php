<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_widget_video');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_widget_photo');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_widget');
$__output .= '

';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay'))
{
$__output .= '
	';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.overlay.js');
$__output .= '
';
}
$__output .= '

';
$__compilerVar4 = '';
$__compilerVar4 .= '
					';
if ($contents)
{
$__compilerVar4 .= '
					';
foreach ($contents AS $content)
{
$__compilerVar4 .= '
						';
if ($content['content_type'] === ('video'))
{
$__compilerVar4 .= '
							';
$__compilerVar5 = '';
$__compilerVar5 .= '<li style="' . (($widget['options']['thumbnail_width']) ? ('width: ' . htmlspecialchars($widget['options']['thumbnail_width'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . ' ' . (($widget['options']['thumbnail_height']) ? ('height: ' . htmlspecialchars($widget['options']['thumbnail_height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '">
	<a class="thumbnail" href="' . XenForo_Template_Helper_Core::link('gallery/videos', $content, array(
'_source' => 'widget'
)) . '" title="' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" style="' . (($widget['options']['thumbnail_width']) ? ('width: ' . htmlspecialchars($widget['options']['thumbnail_width'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . ' ' . (($widget['options']['thumbnail_height']) ? ('height: ' . htmlspecialchars($widget['options']['thumbnail_height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '">
		<img title="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)) . '" alt="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)) . '" src="' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" style="' . htmlspecialchars($content['style'], ENT_QUOTES, 'UTF-8') . ' ' . (($widget['options']['thumbnail_width'] && $content['medium_width']) ? ('width: ' . htmlspecialchars($content['medium_width'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . ' ' . (($widget['options']['thumbnail_height'] && $content['medium_height']) ? ('height: ' . htmlspecialchars($content['medium_height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '" />
		<span class="icon video">&nbsp;</span>
	</a>
	';
if (!$widget['options']['hideTitle'])
{
$__compilerVar5 .= '
		<p class="background">&nbsp;</p>
		<div class="title"><a title="' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" href="' . XenForo_Template_Helper_Core::link('gallery/videos', $content, array()) . '">' . XenForo_Template_Helper_Core::callHelper('wordtrim', array(
'0' => $content['title'],
'1' => $widget['options']['title_limit']
)) . '</a></div>
	';
}
$__compilerVar5 .= '
	';
if (!$widget['options']['hideAuthor'])
{
$__compilerVar5 .= '
		<div class="info">
			' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $content
)) . ',
			';
if ($widget['options']['type'] == ('new'))
{
$__compilerVar5 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => htmlspecialchars($content['content_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else if ($widget['options']['type'] == ('lastUpdate'))
{
$__compilerVar5 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['post_updated_date'],array(
'time' => htmlspecialchars($content['post_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else if ($widget['options']['type'] == ('mostViewed'))
{
$__compilerVar5 .= '
				' . htmlspecialchars($content['view_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'Đọc' . '
			';
}
else if ($widget['options']['type'] == ('mostCommented'))
{
$__compilerVar5 .= '
				' . htmlspecialchars($content['comment_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'Comments' . '
			';
}
else if ($widget['options']['type'] == ('mostLiked'))
{
$__compilerVar5 .= '
				' . htmlspecialchars($content['likes'], ENT_QUOTES, 'UTF-8') . ' ' . 'Thích' . '
			';
}
else if ($widget['options']['type'] == ('recentlyLiked'))
{
$__compilerVar5 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['like_date_sort'],array(
'time' => htmlspecialchars($content['like_date_sort'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else
{
$__compilerVar5 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => htmlspecialchars($content['content_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
$__compilerVar5 .= '
		</div>
	';
}
$__compilerVar5 .= '
</li>';
$__compilerVar4 .= $__compilerVar5;
unset($__compilerVar5);
$__compilerVar4 .= '
						';
}
else if ($content['content_type'] === ('photo'))
{
$__compilerVar4 .= '
							';
$__compilerVar6 = '';
$__compilerVar6 .= '<li style="' . (($widget['options']['thumbnail_width']) ? ('width: ' . htmlspecialchars($widget['options']['thumbnail_width'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . ' ' . (($widget['options']['thumbnail_height']) ? ('height: ' . htmlspecialchars($widget['options']['thumbnail_height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '">
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
$__compilerVar6 .= '
		<p class="background">&nbsp;</p>
		<div class="title"><a title="' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '" href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '">' . XenForo_Template_Helper_Core::callHelper('wordtrim', array(
'0' => $content['title'],
'1' => $widget['options']['title_limit']
)) . '</a></div>
	';
}
$__compilerVar6 .= '
	';
if (!$widget['options']['hideAuthor'])
{
$__compilerVar6 .= '
		<div class="info">
			' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $content
)) . ',
			';
if ($widget['options']['type'] == ('new'))
{
$__compilerVar6 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => htmlspecialchars($content['content_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else if ($widget['options']['type'] == ('lastUpdate'))
{
$__compilerVar6 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['post_updated_date'],array(
'time' => htmlspecialchars($content['post_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else if ($widget['options']['type'] == ('mostViewed'))
{
$__compilerVar6 .= '
				' . htmlspecialchars($content['view_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'Đọc' . '
			';
}
else if ($widget['options']['type'] == ('mostCommented'))
{
$__compilerVar6 .= '
				' . htmlspecialchars($content['comment_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'Comments' . '
			';
}
else if ($widget['options']['type'] == ('mostLiked'))
{
$__compilerVar6 .= '
				' . htmlspecialchars($content['likes'], ENT_QUOTES, 'UTF-8') . ' ' . 'Thích' . '
			';
}
else if ($widget['options']['type'] == ('recentlyLiked'))
{
$__compilerVar6 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['like_date_sort'],array(
'time' => htmlspecialchars($content['like_date_sort'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else
{
$__compilerVar6 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => htmlspecialchars($content['content_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
$__compilerVar6 .= '
		</div>
	';
}
$__compilerVar6 .= '
</li>';
$__compilerVar4 .= $__compilerVar6;
unset($__compilerVar6);
$__compilerVar4 .= '
						';
}
$__compilerVar4 .= '
					';
}
$__compilerVar4 .= '
					';
}
$__compilerVar4 .= '
				';
if (trim($__compilerVar4) !== '')
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
		<div class="photosSidebar videosSidebar ' . (($widget['options']['enable_scrollable']) ? ('scrollable') : ('')) . '" 
			id="scrollable_widget_' . htmlspecialchars($widget['widget_id'], ENT_QUOTES, 'UTF-8') . '" 
			style="' . (($widget['options']['enable_scrollable']) ? ('height: ' . htmlspecialchars($widget['options']['thumbnail_height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '">
			<ul>
				' . $__compilerVar4 . '
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
unset($__compilerVar4);
$__output .= '

';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay'))
{
$__output .= '
<script type="text/javascript">
	!function($, window, document, _undefined) {
		XenForo.register(\'.videosSidebar a.thumbnail\', \'XenForo.XenGalleryOverlayToggle\');
	}(jQuery, this, document);
</script>
';
}
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
