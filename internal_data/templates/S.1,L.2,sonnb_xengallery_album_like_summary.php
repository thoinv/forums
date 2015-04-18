<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($album['likes'])
{
$__output .= '
	<span class="LikeText">
		' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($album['likes'],$likesUrl,$album['like_date'],$album['likeUsers'])) . '
	</span>
';
}
