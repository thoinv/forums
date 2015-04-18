<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($comments)
{
$__output .= '
	<div class="comments colormuted">
		';
foreach ($comments AS $comment)
{
$__output .= '
			';
$__compilerVar1 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_comment_list_item');
$__compilerVar1 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/comments.js');
$__compilerVar1 .= '

<div comment-id="' . htmlspecialchars($comment['post_id'], ENT_QUOTES, 'UTF-8') . '" class="comment convo clearfix">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($comment,(true),array(
'user' => '$comment',
'size' => 's',
'img' => 'true',
'class' => 'ImgLink'
),'')) . '
	<p>
		<a href="' . XenForo_Template_Helper_Core::link('members', $comment, array()) . '">' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '</a>
		<span class="commentContent"> 
			' . XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $comment['messageHtml'],
'1' => '1000'
)) . '
		</span>
	</p>
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
		';
}
$__output .= ' 
	</div>
';
}
