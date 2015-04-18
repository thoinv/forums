<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($message['likes'])
{
$__output .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__output .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($message['likes'],$likesUrl,$message['like_date'],$message['likeUsers'])) . '
		</span>
	</div>
';
}
