<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'External Accounts';
$__output .= '

';
if ($xenOptions['facebookAppId'])
{
$__output .= '
	';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__output .= '
	
	<form action="' . XenForo_Template_Helper_Core::link('account/external-accounts/disassociate', false, array()) . '" method="post" class="xenForm">
		<h3 class="textHeading">' . 'Tích hợp Facebook' . '</h3>
		';
if ($external['facebook'])
{
$__output .= '
			
			';
$__compilerVar3 = '';
$__compilerVar3 .= '
			<dl class="ctrlUnit">
				<dt>' . 'Tài khoản Facebook đã tích hợp' . ':</dt>
				<dd>
					<a href="http://www.facebook.com/profile.php?id=' . htmlspecialchars($external['facebook']['provider_key'], ENT_QUOTES, 'UTF-8') . '" class="avatar NoOverlay"><img src="https://graph.facebook.com/' . htmlspecialchars($external['facebook']['provider_key'], ENT_QUOTES, 'UTF-8') . '/picture" alt="" /></a>
					<div><a href="http://www.facebook.com/profile.php?id=' . htmlspecialchars($external['facebook']['provider_key'], ENT_QUOTES, 'UTF-8') . '">';
if ($fbUser['name'])
{
$__compilerVar3 .= htmlspecialchars($fbUser['name'], ENT_QUOTES, 'UTF-8');
}
else
{
$__compilerVar3 .= 'Unknown Account';
}
$__compilerVar3 .= '</a></div>
				</dd>
			</dl>
			';
$__output .= $this->callTemplateHook('account_facebook_associated', $__compilerVar3, array());
unset($__compilerVar3);
$__output .= '
			
			<dl class="ctrlUnit submitUnit">
				<dt></dt>
				<dd><ul>
					<li>
						<label><input type="checkbox" name="disassociate" value="1" id="ctrl_disassociate_fb" class="Disabler" /> ' . 'Hủy bỏ tích hợp tài khoản Facebook' . '</label>
						<ul id="ctrl_disassociate_fb_Disabler">
							<li><input type="submit" class="button" value="' . 'Xác nhận bỏ tích hợp' . '" /></li>
						</ul>
						';
if (!$hasPassword)
{
$__output .= '
							<p class="explain">' . 'Disassociating with all external accounts will cause a password to be generated for your account and emailed to ' . htmlspecialchars($visitor['email'], ENT_QUOTES, 'UTF-8') . '.' . '</p>
						';
}
$__output .= '
					</li>
				</ul></dd>
			</dl>
		';
}
else
{
$__output .= '
			';
$__compilerVar4 = '';
$__compilerVar4 .= '
			<dl class="ctrlUnit">
				<dt></dt>
				<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => 'Tài khoản của bạn hiện tại không tích hợp với tài khoản Facebook nào.

Tích hợp với Facebook sẽ dễ dàng chia sẻ những điều thú vị với bạn bè và nhập nội dung từ Facebook ở đây.'
)) . '</dd>
			</dl>
			';
$__output .= $this->callTemplateHook('account_facebook_not_associated', $__compilerVar4, array());
unset($__compilerVar4);
$__output .= '
			
			<dl class="ctrlUnit submitUnit">
				<dt></dt>
				<dd class="fbWidgetBlock"><a href="' . XenForo_Template_Helper_Core::link('register/facebook', '', array(
'reg' => '1',
'assoc' => $visitor['user_id']
)) . '" class="button primary">' . 'Tích hợp với Facebook' . '</a></dd>
			</dl>
		';
}
$__output .= '

		';
if ($xenOptions['facebookFacepile'])
{
$__output .= '
			<dl class="ctrlUnit">
				<dt></dt>
				<dd class="fbWidgetBlock"><fb:facepile width="300" max_rows="5" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:facepile></dd>
			</dl>
		';
}
$__output .= '

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="_xfConfirm" value="1" />
		<input type="hidden" name="account" value="facebook" />
	</form>
';
}
$__output .= '

';
if ($xenOptions['twitterAppKey'])
{
$__output .= '
	<form action="' . XenForo_Template_Helper_Core::link('account/external-accounts/disassociate', false, array()) . '" method="post" class="xenForm">
		<h3 class="textHeading">' . 'Twitter Integration' . '</h3>
		';
if ($external['twitter'])
{
$__output .= '
			
			<dl class="ctrlUnit">
				<dt>' . 'Associated Twitter Account' . ':</dt>
				<dd>
				';
if ($twitterUser)
{
$__output .= '
					<a href="https://twitter.com/' . htmlspecialchars($twitterUser['screen_name'], ENT_QUOTES, 'UTF-8') . '" class="avatar NoOverlay"><img src="' . htmlspecialchars($twitterUser['profile_image_url_https'], ENT_QUOTES, 'UTF-8') . '" alt="" /></a>
					<div><a href="https://twitter.com/' . htmlspecialchars($twitterUser['screen_name'], ENT_QUOTES, 'UTF-8') . '">@' . htmlspecialchars($twitterUser['screen_name'], ENT_QUOTES, 'UTF-8') . ' (' . htmlspecialchars($twitterUser['name'], ENT_QUOTES, 'UTF-8') . ')</a></div>
				';
}
else
{
$__output .= '
					' . 'Unknown Account' . '
				';
}
$__output .= '
				</dd>
			</dl>
			
			<dl class="ctrlUnit submitUnit">
				<dt></dt>
				<dd><ul>
					<li>
						<label><input type="checkbox" name="disassociate" value="1" id="ctrl_disassociate_twitter" class="Disabler" /> ' . 'Disassociate Twitter Account' . '</label>
						<ul id="ctrl_disassociate_twitter_Disabler">
							<li><input type="submit" class="button" value="' . 'Xác nhận bỏ tích hợp' . '" /></li>
						</ul>
						';
if (!$hasPassword)
{
$__output .= '
							<p class="explain">' . 'Disassociating with all external accounts will cause a password to be generated for your account and emailed to ' . htmlspecialchars($visitor['email'], ENT_QUOTES, 'UTF-8') . '.' . '</p>
						';
}
$__output .= '
					</li>
				</ul></dd>
			</dl>
		';
}
else
{
$__output .= '
			<dl class="ctrlUnit">
				<dt></dt>
				<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => 'Your account is not currently associated with a Twitter account.

Associating with Twitter makes it easier to log in to the forum or share content back to Twitter.'
)) . '</dd>
			</dl>
			
			<dl class="ctrlUnit submitUnit">
				<dt></dt>
				<dd><a href="' . XenForo_Template_Helper_Core::link('register/twitter', '', array(
'reg' => '1',
'assoc' => $visitor['user_id']
)) . '" class="button primary">' . 'Associate with Twitter' . '</a></dd>
			</dl>
		';
}
$__output .= '

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="_xfConfirm" value="1" />
		<input type="hidden" name="account" value="twitter" />
	</form>
';
}
$__output .= '

';
if ($xenOptions['googleClientId'])
{
$__output .= '
	<form action="' . XenForo_Template_Helper_Core::link('account/external-accounts/disassociate', false, array()) . '" method="post" class="xenForm">
		<h3 class="textHeading">' . 'Google Integration' . '</h3>
		';
if ($external['google'])
{
$__output .= '
			
			<dl class="ctrlUnit">
				<dt>' . 'Associated Google Account' . ':</dt>
				<dd>
					<a href="https://plus.google.com/u/0/' . htmlspecialchars($external['google']['provider_key'], ENT_QUOTES, 'UTF-8') . '">' . 'View Account' . '</a>
				</dd>
			</dl>
			
			<dl class="ctrlUnit submitUnit">
				<dt></dt>
				<dd><ul>
					<li>
						<label><input type="checkbox" name="disassociate" value="1" id="ctrl_disassociate_google" class="Disabler" /> ' . 'Disassociate Google Account' . '</label>
						<ul id="ctrl_disassociate_google_Disabler">
							<li><input type="submit" class="button" value="' . 'Xác nhận bỏ tích hợp' . '" /></li>
						</ul>
						';
if (!$hasPassword)
{
$__output .= '
							<p class="explain">' . 'Disassociating with all external accounts will cause a password to be generated for your account and emailed to ' . htmlspecialchars($visitor['email'], ENT_QUOTES, 'UTF-8') . '.' . '</p>
						';
}
$__output .= '
					</li>
				</ul></dd>
			</dl>
		';
}
else
{
$__output .= '
			<dl class="ctrlUnit">
				<dt></dt>
				<dd>' . XenForo_Template_Helper_Core::string('nl2br', array(
'0' => 'Your account is not currently associated with a Google account.

Associating with Google makes it easier to log in to the forum or share content back to Google.'
)) . '</dd>
			</dl>
			
			<dl class="ctrlUnit submitUnit">
				<dt></dt>
				<dd>
					<span class="button primary GoogleLogin" data-client-id="' . htmlspecialchars($xenOptions['googleClientId'], ENT_QUOTES, 'UTF-8') . '" data-redirect-url="' . XenForo_Template_Helper_Core::link('register/google', '', array(
'code' => '__CODE__',
'csrf' => $session['sessionCsrf']
)) . '"><span>' . 'Associate with Google' . '</span></span>
				</dd>
			</dl>
		';
}
$__output .= '

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="_xfConfirm" value="1" />
		<input type="hidden" name="account" value="google" />
	</form>
';
}
