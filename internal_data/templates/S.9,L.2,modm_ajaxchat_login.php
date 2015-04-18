<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Log into chat';
$__output .= '

';
$__extraData['head']['noindex'] = '';
$__extraData['head']['noindex'] .= '
	<meta name="robots" content="noindex" />
';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('chat/login', false, array()), 'value' => 'Log into chat');
$__output .= '

<div class="section">       
    <div class="sectionMain">
            <div class="heading">' . 'Disclaimer' . '</div>
            <div class="primaryContent baseHtml">' . '<ol><li><a href="help/terms">Terms and rules</a> also apply to chat.</li>
<li>Never give out your password or credit card number in an instant message conversation. To help prevent infection by a computer virus or worm, never accept or open any file or link in an instant message until you verify its authenticity with the sender.</li>
<li>Chat content are saved in user database for later reference if necessary</li>
</ol>' . '</div>
    </div>

	<form action="' . XenForo_Template_Helper_Core::link('chat/shoutbox', false, array()) . '" method="post" style="text-align: center;">
        ';
if ($promptForUsername)
{
$__output .= '
		<dl class="ctrlUnit">
			<dt><label for="ctrl_userName">' . 'Tên tài khoản' . '</label></dt>
			<dd><input type="text" name="userName" value="" id="ctrl_userName" class="textCtrl" />
			</dd>
		</dl>
        ';
}
$__output .= '
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd><input type="submit" value="' . 'Log into chat' . '" class="button primary" accesskey="s" /></dd>
		</dl>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>';
