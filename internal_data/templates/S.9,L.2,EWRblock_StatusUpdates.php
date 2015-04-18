<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'EWRblock_StatusUpdates');
$__output .= '

<div class="section avatarList">
	<div class="secondaryContent" id="statusUpdates">
		<h3>' . 'Recent Status Updates' . '</h3>

		';
$__compilerVar2 = '';
$__compilerVar2 .= '
			';
foreach ($StatusUpdates AS $update)
{
$__compilerVar2 .= '
				<li>
					' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($update,(true),array(
'user' => '$update',
'size' => 's',
'img' => 'true'
),'')) . '
					<a href="' . XenForo_Template_Helper_Core::link('members', $update, array()) . '" class="username" style="display: inline;">' . XenForo_Template_Helper_Core::callHelper('richUserName', array(
'0' => $update
)) . '</a>
					<span class="userTitle">' . htmlspecialchars($update['message'], ENT_QUOTES, 'UTF-8') . ' (' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($update['post_date'],array(
'time' => '$update.post_date'
))) . ')</span>
				</li>
			';
}
$__compilerVar2 .= '
			';
if (trim($__compilerVar2) !== '')
{
$__output .= '
		<ul>
			' . $__compilerVar2 . '
		</ul>
		';
}
unset($__compilerVar2);
$__output .= '

		';
if ($visitor['permissions']['profilePost']['post'])
{
$__output .= '
		<div id="AccountMenu" style="width: 100%; margin-top: 10px;" class="findMember">
			<form action="' . XenForo_Template_Helper_Core::link('members/post', $visitor, array()) . '" method="post" class="statusPoster" data-optInOut="OptIn">
				<textarea style="width: 100%;" name="message" class="textCtrl StatusEditor Elastic" placeholder="' . 'Cập nhật trạng thái' . '..." rows="1" data-statusEditorCounter="#statusUpdateCount"></textarea>
				<div class="submitUnit">
					<span id="statusUpdateCount" title="' . 'Số ký tự còn lại' . '"></span>
					<input type="submit" class="button primary MenuCloser" value="' . 'Đăng' . '" accesskey="s" />
					<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
					<input type="hidden" name="return" value="1" /> 
				</div>
			</form>
		</div>
		';
}
$__output .= '
	</div>
</div>';
