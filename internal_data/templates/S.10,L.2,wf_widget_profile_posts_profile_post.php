<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

';
if (XenForo_Template_Helper_Core::callHelper('WidgetFramework_getOption', array(
'0' => 'applicationVersionId'
)) > 1040000)
{
$__output .= '
	';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'profile_post_list_simple');
$__compilerVar2 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar2 .= '

<li id="profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" class="profilePostListItem ' . (($profilePost['isDeleted']) ? ('deleted') : ('')) . ' ' . (($profilePost['is_staff']) ? ('staff') : ('')) . ' ' . (($profilePost['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($profilePost,(true),array(
'user' => '$profilePost',
'size' => 's',
'img' => 'true'
),'')) . '
	
	<div class="messageInfo">
		
		<div class="messageContent">
			<span class="poster">
				' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($profilePost,'',(true),array())) . '
				';
if ($profilePost['user_id'] != $profilePost['profile_user_id'] AND $profilePost['profileUser'])
{
$__compilerVar2 .= '
					<span class="muted">' . (($pageIsRtl) ? ('&#9668;') : ('&#9658;')) . '</span> ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($profilePost['profileUser'],'',(true),array())) . '
				';
}
$__compilerVar2 .= '
			</span>
			<article><blockquote class="ugc baseHtml' . (($profilePost['isIgnored']) ? (' ignored') : ('')) . '">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $profilePost['message']
)) . '</blockquote></article>
		</div>

		<div class="messageMeta">
			<div class="privateControls">
				<a href="' . XenForo_Template_Helper_Core::link('profile-posts', $profilePost, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['post_date'],array(
'time' => '$profilePost.post_date'
))) . '</a>
			</div>

			<div class="publicControls">
				<a href="' . XenForo_Template_Helper_Core::link('profile-posts', $profilePost, array()) . '" class="item Tooltip OverlayTrigger" title="' . 'Tương tác' . '" data-tipclass="flipped" data-offsetX="7" data-offsetY="-7">&#8226;&#8226;&#8226;</a>
			</div>
		</div>

	</div>
</li>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
';
}
else
{
$__output .= '
	';
$this->addRequiredExternal('css', 'wf_default');
$__output .= '
	';
$this->addRequiredExternal('css', 'bb_code');
$__output .= '

	<li id="profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" class="WidgetFramework_WidgetRenderer_ProfilePosts_ProfilePostItem" data-author="' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '">

		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($profilePost,(true),array(
'user' => '$profilePost',
'size' => 's',
'img' => 'true'
),'')) . '

		<div class="messageInfo">

			<div class="messageContent">
				<span class="poster">
					' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($profilePost,'',(true),array())) . '
					';
if ($profilePost['user_id'] != $profilePost['profile_user_id'] AND $profilePost['profileUser'])
{
$__output .= '
						<span class="muted">&#9658;</span> ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($profilePost['profileUser'],'',(true),array())) . '
					';
}
$__output .= '
				</span>
				<article><blockquote class="ugc baseHtml' . (($profilePost['isIgnored']) ? (' ignored') : ('')) . '">' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $profilePost['message']
)) . '</blockquote></article>
			</div>

			<div class="messageMeta">
				<a href="' . XenForo_Template_Helper_Core::link('profile-posts', $profilePost, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['post_date'],array(
'time' => '$profilePost.post_date'
))) . '</a>
			</div>

		</div>
	</li>
';
}
