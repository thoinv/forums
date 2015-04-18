<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Spam Cleaner IP Address Check';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:members', $user, array()), 'value' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'));
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:spam-cleaner', $user, array()), 'value' => 'Dọn dẹp spam');
$__output .= '

';
$this->addRequiredExternal('css', 'spam_cleaner');
$__output .= '

<div class="ipMatches section">
	<div class="subHeading">' . 'Người dùng sau đã đăng có sử dụng địa chỉ IP được sử dụng bởi ' . htmlspecialchars($spammer['username'], ENT_QUOTES, 'UTF-8') . ' gần đây.' . '</div>

	';
if ($users)
{
$__output .= '
		<ol class="overlayScroll">
			';
foreach ($users AS $user)
{
$__output .= '
				<li class="primaryContent userLog">
					' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 'm'
),'')) . '

					<div class="logInfo">
						<div class="userInfo">
							<h3' . (($user['is_banned']) ? (' class="banned" title="' . 'Banned' . '"') : (' title="' . 'View postings' . '"')) . '>
								<a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '#postings" target="_blank">' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</a>
							</h3>
							<div class="regDate">
								<span class="muted">' . 'Đăng ký' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($user['register_date'],array(
'time' => '$user.register_date'
))) . '</span>
								';
if ($user['canCleanSpam'])
{
$__output .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $user, array()) . '" class="deleteSpam OverlayTrigger">' . 'Spam' . '</a>';
}
$__output .= '
							</div>
						</div>

						<ol class="ipLogs">
							';
foreach ($user['ipLogs'] AS $ipLog)
{
$__output .= '
								<li class="ipLog secondaryContent">
									<a class="ip concealed" href="' . XenForo_Template_Helper_Core::link('misc/ip-info', '', array(
'ip' => $ipLog['ip_address']
)) . '" target="_blank">' . htmlspecialchars($ipLog['ip_address'], ENT_QUOTES, 'UTF-8') . '</a>
									' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($ipLog['log_date'],array(
'time' => htmlspecialchars($ipLog['log_date'], ENT_QUOTES, 'UTF-8')
))) . '
								</li>
							';
}
$__output .= '
						</ol>
					</div>
				</li>
			';
}
$__output .= '

		</ol>
	';
}
else
{
$__output .= '
			<p class="primaryContent">' . 'Không có người phù hợp được tìm thấy.' . '</p>
	';
}
$__output .= '

	<div class="sectionFooter">' . '' . XenForo_Template_Helper_Core::numberFormat(count($users), '0') . ' thành viên phù hợp.' . ' <input type="button" class="button OverlayCloser" value="' . 'Đóng' . '"
		onclick="$(this).closest(\'.xenOverlay\').data(\'overlay\').close()" /></div>
</div>';
