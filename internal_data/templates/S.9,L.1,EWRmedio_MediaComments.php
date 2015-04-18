<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'message_simple');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRmedio_ajax.js');
$__output .= '

<div id="mediaComments">
	';
if ($count > $stop)
{
$__output .= '
	<div class="pageNavLinkGroup primaryContent" style="margin-top: 0px;" id="CommentFeed">
		<div class="linkGroup SelectionCountContainer"></div>
		' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($stop, ENT_QUOTES, 'UTF-8'), htmlspecialchars($count, ENT_QUOTES, 'UTF-8'), htmlspecialchars($start, ENT_QUOTES, 'UTF-8'), 'media/comments', $media, array(), false, array())) . '
	</div>
	';
}
$__output .= '

	';
if ($comments)
{
$__output .= '
	<ol class="messageSimpleList">
		';
foreach ($comments AS $comment)
{
$__output .= '
			';
$__compilerVar1 = '';
$__compilerVar1 .= '<li id="' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="primaryContent messageSimple">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($comment,false,array(
'user' => '$comment',
'size' => 's'
),'')) . '
	
	<div class="messageInfo">
		<div class="messageContent">
			';
if ($comment['userValid'])
{
$__compilerVar1 .= '
				<a href="' . XenForo_Template_Helper_Core::link('members', $comment, array()) . '" class="poster username">' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '</a>
			';
}
else
{
$__compilerVar1 .= '
				<b>' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '</b>
			';
}
$__compilerVar1 .= '
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
$__compilerVar1 .= '
					<a href="' . XenForo_Template_Helper_Core::link('media/comment/edit', $comment, array()) . '" class="OverlayTrigger item">' . 'Edit' . '</a>
					<a href="' . XenForo_Template_Helper_Core::link('media/comment/delete', $comment, array()) . '" class="OverlayTrigger item">' . 'Delete' . '</a>
					<a href="' . XenForo_Template_Helper_Core::link('media/comment/ip', $comment, array()) . '" class="OverlayTrigger item">' . 'IP' . '</a>
				';
}
$__compilerVar1 .= '
				';
if ($perms['report'])
{
$__compilerVar1 .= '
					<a href="' . XenForo_Template_Helper_Core::link('media/comment/report', $comment, array()) . '" class="OverlayTrigger item">' . 'Report' . '</a>
				';
}
$__compilerVar1 .= '
			</div>
		</div>
	</div>
</li>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
		';
}
$__output .= '
	</ol>
	';
}
$__output .= '
</div>';
