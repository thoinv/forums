<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<div class="primaryContent  messageText ugc baseHtml">' . XenForo_Template_Helper_Core::callHelper('bbCode', array(
'0' => $bbCodeParser,
'1' => $content['message']
)) . '</div>
<div class="secondaryContent">
	<dl class="pairsRows"><dt>' . 'Conversation Starter' . ':</dt>
		<dd><a href="' . XenForo_Template_Helper_Core::link('members', $content['conversation'], array()) . '" class="username">' . htmlspecialchars($content['conversation']['username'], ENT_QUOTES, 'UTF-8') . '</a></dd></dl>
	<dl class="pairsRows"><dt>' . 'Ngày gửi' . ':</dt>
		<dd>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['conversation']['start_date'],array(
'time' => htmlspecialchars($content['conversation']['start_date'], ENT_QUOTES, 'UTF-8')
))) . '</dd></dl>
	<dl class="pairsRows"><dt>' . 'Trả lời' . ':</dt>
		<dd>' . XenForo_Template_Helper_Core::numberFormat($content['conversation']['reply_count'], '0') . '</dd></dl>
	<dl class="pairsRows"><dt>' . 'Những người tham gia đối thoại' . ':</dt>
		<dd><ol class="listInline commaImplode">
		';
foreach ($content['recipients'] AS $user)
{
$__output .= '
			<li>';
if ($user['user_id'])
{
$__output .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',false,array()));
}
else
{
$__output .= XenForo_Template_Helper_Core::callHelper('userNameHtml', array(
'0' => $user,
'1' => 'Unknown Member'
));
}
$__output .= '</li>
		';
}
$__output .= '
		</ol></dd>
	</dl>
</div>';
