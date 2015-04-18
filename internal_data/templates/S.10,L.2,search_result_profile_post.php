<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li id="profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" class="searchResult post primaryContent' . (($profilePost['isIgnored']) ? (' ignored') : ('')) . '" data-author="' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '">

	<div class="listBlock posterAvatar">
		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($profilePost,(true),array(
'user' => '$profilePost',
'size' => 's',
'img' => 'true'
),'')) . '
	</div>

	<div class="listBlock main">
		<div class="titleText">
			<span class="contentType">' . 'Profile Post' . '</span>
			<h3 class="title"><a href="' . XenForo_Template_Helper_Core::link('profile-posts', $profilePost, array()) . '">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $profilePost['message'],
'1' => '100',
'2' => array(
'term' => $search['search_query'],
'fromStart' => '1',
'emClass' => 'highlight',
'stripPlainTag' => '1'
)
)) . '</a></h3>
		</div>

		<blockquote class="snippet">
			<a href="' . XenForo_Template_Helper_Core::link('profile-posts', $profilePost, array()) . '">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $profilePost['message'],
'1' => '150',
'2' => array(
'term' => $search['search_query'],
'emClass' => 'highlight',
'stripPlainTag' => '1'
)
)) . '</a>
		</blockquote>	

		<div class="meta">
			';
if ($profilePost['canInlineMod'] AND $enableInlineMod)
{
$__output .= '<input type="checkbox" name="profilePosts[]" value="' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" data-target="#profile-post-' . htmlspecialchars($profilePost['profile_post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề này gửi bởi ' . htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__output .= '
			';
if ($profilePost['user_id'] == $profilePost['profile_user_id'])
{
$__output .= '
				' . 'Status update by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $profilePost
)) . '' . ',
			';
}
else
{
$__output .= '
				' . 'Profile post by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $profilePost
)) . ' for ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $profilePost['profileUser']
)) . '' . ',
			';
}
$__output .= '
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($profilePost['post_date'],array(
'time' => htmlspecialchars($profilePost['post_date'], ENT_QUOTES, 'UTF-8')
))) . '
		</div>
	</div>
</li>';
