<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li id="' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="primaryContent messageSimple">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($comment,false,array(
'user' => '$comment',
'size' => 's'
),'')) . '
	
	<div class="messageInfo">
		<div class="messageContent">
			';
if ($comment['userValid'])
{
$__output .= '
				<a href="' . XenForo_Template_Helper_Core::link('members', $comment, array()) . '" class="poster username">' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '</a>
			';
}
else
{
$__output .= '
				<b>' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '</b>
			';
}
$__output .= '
			<article><blockquote class="ugc baseHtml">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $comment['comment_message']
)) . '</blockquote></article>
		</div>

		<div class="messageMeta">
			<div class="privateControls">
				<span class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($comment['comment_date'],array(
'time' => '$comment.comment_date'
))) . '</span>
				';
if ($perms['mod'])
{
$__output .= '
					<a href="' . XenForo_Template_Helper_Core::link('media/comment/edit', $comment, array()) . '" class="OverlayTrigger item">' . 'Sửa' . '</a>
					<a href="' . XenForo_Template_Helper_Core::link('media/comment/delete', $comment, array()) . '" class="OverlayTrigger item">' . 'Xóa' . '</a>
					<a href="' . XenForo_Template_Helper_Core::link('media/comment/ip', $comment, array()) . '" class="OverlayTrigger item">' . 'IP' . '</a>
				';
}
$__output .= '
				';
if ($perms['report'])
{
$__output .= '
					<a href="' . XenForo_Template_Helper_Core::link('media/comment/report', $comment, array()) . '" class="OverlayTrigger item">' . 'Báo cáo' . '</a>
				';
}
$__output .= '
			</div>
		</div>
	</div>
</li>';
