<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_widget_comment');
$__output .= '

';
$__compilerVar3 = '';
$__compilerVar3 .= '
				';
if ($comments)
{
$__compilerVar3 .= '
				';
foreach ($comments AS $comment)
{
$__compilerVar3 .= '
					';
$__compilerVar4 = '';
$__compilerVar4 .= '<li>
	<div>
		';
if ($comment['content_type'] == ('album'))
{
$__compilerVar4 .= '
			<a class="thumbnail" href="' . XenForo_Template_Helper_Core::link('gallery/albums', $comment['content'], array()) . '" title="' . htmlspecialchars($comment['content']['title'], ENT_QUOTES, 'UTF-8') . '" style="' . (($widget['options']['thumbnail_width']) ? ('width: ' . htmlspecialchars($widget['options']['thumbnail_width'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . ' ' . (($widget['options']['thumbnail_height']) ? ('height: ' . htmlspecialchars($widget['options']['thumbnail_height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '">
				<img title="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $comment['content']['cover']['description'],
'1' => '100'
)) . '" alt="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $comment['content']['cover']['description'],
'1' => '100'
)) . '" src="' . htmlspecialchars($comment['content']['cover']['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" style="' . htmlspecialchars($comment['content']['cover']['style'], ENT_QUOTES, 'UTF-8') . ' ' . (($widget['options']['thumbnail_width'] && $comment['content']['cover']['medium_width']) ? ('width: ' . htmlspecialchars($comment['content']['cover']['medium_width'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . ' ' . (($widget['options']['thumbnail_height'] && $comment['content']['cover']['medium_height']) ? ('height: ' . htmlspecialchars($comment['content']['cover']['medium_height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '" />
			</a>
		';
}
else
{
$__compilerVar4 .= '
			<a class="thumbnail" href="' . XenForo_Template_Helper_Core::link('gallery/photos', $comment['content'], array()) . '" title="' . htmlspecialchars($comment['content']['title'], ENT_QUOTES, 'UTF-8') . '" style="' . (($widget['options']['thumbnail_width']) ? ('width: ' . htmlspecialchars($widget['options']['thumbnail_width'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . ' ' . (($widget['options']['thumbnail_height']) ? ('height: ' . htmlspecialchars($widget['options']['thumbnail_height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '">
				<img title="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $comment['content']['description'],
'1' => '100'
)) . '" alt="' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $comment['content']['description'],
'1' => '100'
)) . '" src="' . htmlspecialchars($comment['content']['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" style="' . htmlspecialchars($comment['content']['style'], ENT_QUOTES, 'UTF-8') . ' ' . (($widget['options']['thumbnail_width'] && $comment['content']['medium_width']) ? ('width: ' . htmlspecialchars($comment['content']['medium_width'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . ' ' . (($widget['options']['thumbnail_height'] && $comment['content']['medium_height']) ? ('height: ' . htmlspecialchars($comment['content']['medium_height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '" />
			</a>
		';
}
$__compilerVar4 .= '
		<div class="description">' . XenForo_Template_Helper_Core::callHelper('wordtrim', array(
'0' => $comment['message'],
'1' => $widget['options']['message_limit']
)) . '</div>
		<div class="userTitle">' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $comment
)) . ', ';
if ($widget['options']['type'] == ('mostLiked'))
{
$__compilerVar4 .= htmlspecialchars($comment['likes'], ENT_QUOTES, 'UTF-8') . ' ' . 'Thích' . ', ';
}
$__compilerVar4 .= XenForo_Template_Helper_Core::callHelper('datetimehtml', array($comment['comment_date'],array(
'time' => htmlspecialchars($comment['comment_date'], ENT_QUOTES, 'UTF-8')
))) . '</div>
	</div>
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
	<div class="commentsSidebar">
		<ul>
			' . $__compilerVar3 . '
		</ul>
	</div>
';
}
unset($__compilerVar3);
