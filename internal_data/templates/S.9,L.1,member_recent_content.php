<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Recent Content by ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:members', $user, array()), 'value' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'));
$__output .= '

';
$this->addRequiredExternal('css', 'search_results');
$__output .= '

<div>

';
if ($results)
{
$__output .= '
	<ol>
	';
foreach ($results AS $result)
{
$__output .= '
		' . $result . '
	';
}
$__output .= '
	</ol>
	<div class="sectionFooter">
		<ul class="listInline bulletImplode">
			';
$__compilerVar1 = '';
$__compilerVar1 .= '
			<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $user['user_id']
)) . '" rel="nofollow">' . 'Find all content by ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '' . '</a></li>
			<li><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $user['user_id'],
'content' => 'thread'
)) . '" rel="nofollow">' . 'Find all threads by ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '' . '</a></li>
			';
$__output .= $this->callTemplateHook('member_recent_content_search_content_types', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '
		</ul>
	</div>
';
}
else
{
$__output .= '
	' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' has not posted any content recently.' . '
';
}
$__output .= '

</div>';
