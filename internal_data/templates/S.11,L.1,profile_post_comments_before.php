<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li><a href="' . XenForo_Template_Helper_Core::link('profile-posts/comments', $profilePost, array(
'before' => $firstCommentShown['comment_date']
)) . '" class="CommentLoader" data-loadParams="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => array(
'before' => $firstCommentShown['comment_date']
)
)), ENT_QUOTES, 'UTF-8', true) . '">' . 'View previous comments' . '</a></li>';
