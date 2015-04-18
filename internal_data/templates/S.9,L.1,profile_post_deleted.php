<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__output .= '

';
$__compilerVar1 = '';
$__compilerVar1 .= 'profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar2 = '';
$__compilerVar2 .= '
		';
if ($profilePost['canInlineMod'])
{
$__compilerVar2 .= '<input type="checkbox" name="profilePosts[]" value="' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select this post by ' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar2 .= '
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['post_date'],array(
'time' => '$profilePost.post_date',
'class' => 'muted item'
))) . '
		<a href="' . XenForo_Template_Helper_Core::link('profile-posts/show', $profilePost, array()) . '" class="MessageLoader control item show" data-messageSelector="#profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Show' . '</a>
	';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar3 .= '

<li id="' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '" class="messageSimple deleted placeholder ' . (($profilePost['isIgnored']) ? ('ignored') : ('')) . '">

	<div class="placeholderContent secondaryContent">

		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($profilePost,(true),array(
'user' => '$message',
'size' => 's',
'img' => 'true'
),'')) . '
				
		<p>
			' . 'This message by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $profilePost
)) . ' has been removed from public view.' . '
			';
if ($profilePost['delete_username'])
{
$__compilerVar3 .= '
				' . 'Deleted by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $profilePost['deleteInfo']
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['delete_date'],array(
'time' => htmlspecialchars($profilePost['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($profilePost['delete_reason'])
{
$__compilerVar3 .= ', ' . 'Reason' . ': ' . htmlspecialchars($profilePost['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar3 .= '.
			';
}
$__compilerVar3 .= '
		</p>
		<div class="privateControls">' . $__compilerVar2 . '</div>
		
	</div>

</li>';
$__output .= $__compilerVar3;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3);
