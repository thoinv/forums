<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '
<div class="VietXfAdvStats_SectionItem VietXfAdvStats_Thread">
	<div class="VietXfAdvStats_SectionItemBlock VietXfAdvStats_SectionItemTitle VietXfAdvStats_ThreadTitle">
		';
if ($thread['isNew'])
{
$__output .= '
		<img src="styles/default/xenforo/post_new.gif">
		</a>
		';
}
else
{
$__output .= '		
		<img src="styles/default/xenforo/post_old.gif">		
		';
}
$__output .= '
		';
if ($thread['prefix_id'])
{
$__output .= '
			';
if ($linkPrefix)
{
$__output .= '
				<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array(
'prefix_id' => $thread['prefix_id']
)) . '" class="prefixLink"
					title="' . 'Show only threads prefixed by \'' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'plain',
'2' => ''
)) . '\'.' . '">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'html',
'2' => ''
)) . '</a>
			';
}
else
{
$__output .= '
				' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . '
			';
}
$__output .= '
		';
}
$__output .= '
		<a href="' . XenForo_Template_Helper_Core::link((($thread['isNew']) ? ('threads/unread') : ('threads')), $thread, array()) . '" class="' . (($thread['hasPreview']) ? ('PreviewTooltip') : ('')) . '" 
			data-previewUrl="' . (($thread['hasPreview']) ? (XenForo_Template_Helper_Core::link('threads/preview', $thread, array())) : ('')) . '">
			';
if (XenForo_Template_Helper_Core::styleProperty('VietXfAdvStats_ThreadTitleChars') > 0)
{
$__output .= '
				' . XenForo_Template_Helper_Core::callHelper('wordtrim', array(
'0' => $thread['title'],
'1' => XenForo_Template_Helper_Core::styleProperty('VietXfAdvStats_ThreadTitleChars')
)) . '
			';
}
else
{
$__output .= '
				' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '
			';
}
$__output .= '
		</a>
	</div>
	<div class="VietXfAdvStats_SectionItemBlock VietXfAdvStats_SectionItemInfo VietXfAdvStats_ThreadLastPoster">
		' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($thread,'',(true),array())) . '
	</div>
</div>
';
