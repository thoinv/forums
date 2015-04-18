<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($canUpdateStatus)
{
$__output .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/quick_reply_profile.js');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/WidgetFramework/default.js');
$__output .= '

	<form action="LINK_MEMBER_POST_VISITOR" method="post"
		  class="statusPoster AutoValidator"
		  data-hide-submit="true"
		  data-optInOut="OptIn"
		  data-target="#widget-' . htmlspecialchars($widget['widget_id'], ENT_QUOTES, 'UTF-8') . ' ul.WidgetFramework_WidgetRenderer_ProfilePosts_ProfilePostList">
		<textarea name="message" class="textCtrl StatusEditor UserTagger Elastic" placeholder="' . 'Cập nhật trạng thái' . '..." rows="1" cols="40" data-statusEditorCounter="#statusEditorCounter"></textarea>
		<div class="submitUnit">
			<span id="statusEditorCounter" title="' . 'Số ký tự còn lại' . '"></span>
			<input type="submit" class="button primary" value="' . 'Đăng' . '" />
			<input type="hidden" name="_xfToken" value="CSRF_TOKEN_PAGE" />
			<input type="hidden" name="simple" value="1" />

			';
if (XenForo_Template_Helper_Core::callHelper('WidgetFramework_getOption', array(
'0' => 'applicationVersionId'
)) < 1040000)
{
$__output .= '
				<input type="hidden" name="return" value="1" />
			';
}
$__output .= '
		</div>
	</form>
';
}
$__output .= '
<ul class="WidgetFramework_WidgetRenderer_ProfilePosts_ProfilePostList' . (($canUpdateStatus) ? (' nonInitial') : ('')) . '">
	';
foreach ($profilePosts AS $profilePost)
{
$__output .= '
		';
$__compilerVar3 = '';
$__compilerVar3 .= '

';
if (XenForo_Template_Helper_Core::callHelper('WidgetFramework_getOption', array(
'0' => 'applicationVersionId'
)) > 1040000)
{
$__compilerVar3 .= '
	';
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'profile_post_list_simple');
$__compilerVar4 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar4 .= '

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
$__compilerVar4 .= '
					<span class="muted">' . (($pageIsRtl) ? ('&#9668;') : ('&#9658;')) . '</span> ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($profilePost['profileUser'],'',(true),array())) . '
				';
}
$__compilerVar4 .= '
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
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
$__compilerVar3 .= '
';
}
else
{
$__compilerVar3 .= '
	';
$this->addRequiredExternal('css', 'wf_default');
$__compilerVar3 .= '
	';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar3 .= '

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
$__compilerVar3 .= '
						<span class="muted">&#9658;</span> ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($profilePost['profileUser'],'',(true),array())) . '
					';
}
$__compilerVar3 .= '
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
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '
	';
}
$__output .= '
</ul>

' . '
';
