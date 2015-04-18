<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Spam Cleaner' . ': ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Spam Cleaner' . ': <em>' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</em>';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:members', $user, array()), 'value' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'));
$__output .= '

';
$this->addRequiredExternal('css', 'spam_cleaner');
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenforo/spam_cleaner.js');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('spam-cleaner', $user, array()) . '" method="post" class="xenForm formOverlay SpamCleaner">
	<div class="spamUserInfo">
		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 'm'
),'')) . '
		
		<div>		
			<dl class="pairs">
				<dt>' . 'Registered' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($user['register_date'],array(
'time' => htmlspecialchars($user['register_date'], ENT_QUOTES, 'UTF-8')
))) . '</dd>
				<dt>' . 'Last Activity' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($user['effective_last_activity'],array(
'time' => htmlspecialchars($user['effective_last_activity'], ENT_QUOTES, 'UTF-8')
))) . '</dd>
				<dt>' . 'Email' . ':</dt>
					<dd>' . htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') . '</dd>
			</dl>
			
			';
if ($canViewIps)
{
$__output .= '
			';
$__compilerVar1 = '';
$__compilerVar1 .= '
					';
if ($registrationIps['register'])
{
$__compilerVar1 .= '
						<dt>' . 'Registration IP' . ':</dt>
							<dd><a class="ip concealed" href="' . XenForo_Template_Helper_Core::link('misc/ip-info', '', array(
'ip' => $registrationIps['register']
)) . '" target="_blank">' . htmlspecialchars($registrationIps['register'], ENT_QUOTES, 'UTF-8') . '</a></dd>
					';
}
$__compilerVar1 .= '
					';
if ($registrationIps['account-confirmation'])
{
$__compilerVar1 .= '
						<dt>' . 'Confirmation IP' . ':</dt>
							<dd><a class="ip concealed" href="' . XenForo_Template_Helper_Core::link('misc/ip-info', '', array(
'ip' => $registrationIps['account-confirmation']
)) . '" target="_blank">' . htmlspecialchars($registrationIps['account-confirmation'], ENT_QUOTES, 'UTF-8') . '</a></dd>
					';
}
$__compilerVar1 .= '
					';
if ($contentIp)
{
$__compilerVar1 .= '
						<dt>' . 'Content IP' . ':</dt>
							<dd><a class="ip concealed" href="' . XenForo_Template_Helper_Core::link('misc/ip-info', '', array(
'ip' => $contentIp
)) . '" target="_blank">' . htmlspecialchars($contentIp, ENT_QUOTES, 'UTF-8') . '</a></dd>
					';
}
$__compilerVar1 .= '
				';
if (trim($__compilerVar1) !== '')
{
$__output .= '
				<dl class="pairs">
				' . $__compilerVar1 . '
				</dl>
			';
}
unset($__compilerVar1);
$__output .= '
			';
}
$__output .= '
			
			<dl class="pairs">
				<dt>' . 'Message Count' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($user['message_count'], '0') . '</dd>
				<dt>' . 'Likes Received' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($user['like_count'], '0') . '</dd>
				<dt>' . 'Trophy Points' . ':</dt>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($user['trophy_points'], '0') . '</dd>
			</dl>			
		</div>
		
	</div>
	
	<h3 class="textHeading">' . 'Spam Cleaner Controls' . '</h3>
	
	<dl class="ctrlUnit spamControls">
		<dt>
			<ul>
				<li><label><input type="checkbox" name="action_threads" value="1" ' . (($xenOptions['spamDefaultOptions']['action_threads']) ? ' checked="checked"' : '') . ' />
					';
if ($xenOptions['spamThreadAction']['action'] == ('move'))
{
$__output .= '
						' . 'Move spammer\'s threads' . '
					';
}
else
{
$__output .= '
						' . 'Delete spammer\'s threads' . '
					';
}
$__output .= '</label></li>
				<li><label><input type="checkbox" name="delete_messages" value="1" ' . (($xenOptions['spamDefaultOptions']['delete_messages']) ? ' checked="checked"' : '') . ' /> ' . 'Delete spammer\'s messages' . '</label></li>
				<li><label><input type="checkbox" name="delete_conversations" value="1" ' . (($xenOptions['spamDefaultOptions']['delete_conversations']) ? ' checked="checked"' : '') . ' /> ' . 'Delete conversations by spammer' . '</label></li>
				<li><label><input type="checkbox" name="ban_user" value="1" ' . (($xenOptions['spamDefaultOptions']['ban_user']) ? ' checked="checked"' : '') . ' /> ' . 'Ban spammer' . '</label></li>
				';
if ($canViewIps)
{
$__output .= '
					<li><label><input type="checkbox" name="check_ips" value="1" ' . (($xenOptions['spamDefaultOptions']['check_ips']) ? ' checked="checked"' : '') . ' /> ' . 'Check spammer\'s IPs' . '</label></li>
				';
}
$__output .= '
			</ul>
		</dt>
		<dd>
			<ul>
				<li><label><input type="checkbox" name="email_user" value="1" class="Disabler" id="ctrl_email_user" ' . (($xenOptions['spamDefaultOptions']['email_user']) ? ' checked="checked"' : '') . ' /> ' . 'Email spammer' . '</label></li>
				<li id="ctrl_email_user_Disabler" class="spamEmailText"><textarea name="email" rows="2" class="textCtrl Elastic">' . htmlspecialchars($emailText, ENT_QUOTES, 'UTF-8') . '</textarea></li>
			</ul>
		</dd>
	</dl>
		
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Clean Up' . '" class="button primary" /></dd>
	</dl>
	
	<input type="hidden" name="noredirect" value="' . htmlspecialchars($noredirect, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />

</form>';
