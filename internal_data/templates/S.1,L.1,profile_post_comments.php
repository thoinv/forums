<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Comments on Profile Post by ' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:members', $user, array()), 'value' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<ol class="messageSimple">

';
if ($firstCommentShown['comment_date'] > $profilePost['first_comment_date'])
{
$__output .= '
	';
$__compilerVar1 = '';
$__compilerVar1 .= '<li><a href="' . XenForo_Template_Helper_Core::link('profile-posts/comments', $profilePost, array(
'before' => $firstCommentShown['comment_date']
)) . '" class="CommentLoader" data-loadParams="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => array(
'before' => $firstCommentShown['comment_date']
)
)), ENT_QUOTES, 'UTF-8', true) . '">' . 'View previous comments' . '</a></li>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
';
}
$__output .= '

';
foreach ($comments AS $comment)
{
$__output .= '
	';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar2 .= '

<li class="comment secondaryContent ' . (($comment['isIgnored']) ? ('ignored') : ('')) . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($comment,(true),array(
'user' => '$comment',
'size' => 's',
'img' => 'true'
),'')) . '

	<div class="commentInfo">
		<div class="commentContent">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($comment,'',(true),array(
'class' => 'poster'
))) . '
			<article><blockquote>' . XenForo_Template_Helper_Core::callHelper('bodytext', array(
'0' => $comment['message']
)) . '</blockquote></article>
		</div>
		<div class="commentControls">
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($comment['comment_date'],array(
'time' => '$comment.comment_date',
'class' => 'muted'
))) . '
			';
if ($comment['canDelete'])
{
$__compilerVar2 .= '<a href="' . XenForo_Template_Helper_Core::link('profile-posts/comment-delete', $profilePost, array(
'comment' => $comment['profile_post_comment_id']
)) . '" class="OverlayTrigger item control delete"><span></span>' . 'Delete' . '</a>';
}
$__compilerVar2 .= '
		</div>
	</div>
</li>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
';
}
$__output .= '

';
if ($lastCommentShown['comment_date'] < $profilePost['last_comment_date'])
{
$__output .= '
	<li><a href="' . XenForo_Template_Helper_Core::link('profile-posts/comments', $profilePost, array()) . '">' . 'View most recent comments' . '</a></li>
';
}
$__output .= '

</ol>';
