<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Sửa Avatar';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:account/personal-details', false, array()), 'value' => 'Chi tiết cá nhân');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('account/avatar-upload', false, array()) . '" method="post" enctype="multipart/form-data" class="xenForm">

	';
$__compilerVar2 = '';
$__compilerVar2 .= '
	
	';
if ($visitor['avatar_date'])
{
$__compilerVar2 .= '
		<fieldset>
			<dl class="ctrlUnit">
				<dt><label>' . 'Current Avatar' . ':</label></dt>
				<dd>' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,false,array(
'user' => '$visitor',
'size' => 'm',
'class' => 'NoOverlay'
),'')) . '</dd>
			</dl>

			<dl class="ctrlUnit">
				<dt></dt>
				<dd><label for="ctrl_delete"><input type="checkbox" name="delete" value="1" id="ctrl_delete" /> ' . 'Xóa avatar hiện tại?' . '</label></dd>
			</dl>
		</fieldset>
	';
}
$__compilerVar2 .= '
	
	<!-- slot: after_avatar_date -->

	<dl class="ctrlUnit">
		<dt><label>' . 'Upload Avatar' . ':</label></dt>
		<dd><input type="file" name="avatar" /></dd>
	</dl>
	
	<!-- slot: after_upload_avatar -->

	';
if ($xenOptions['gravatarEnable'])
{
$__compilerVar2 .= '
		<dl class="ctrlUnit">
			<dt><label for="ctrl_use_gravatar">' . 'Sử dụng Gravatar' . ':</label></dt>
			<dd><input type="checkbox" name="use_gravatar" value="1" class="Disabler" id="ctrl_use_gravatar"' . (($visitor['gravatar']) ? ' checked="checked"' : '') . ' />
				<span id="ctrl_use_gravatar_Disabler">
					<input type="text" name="gravatar" value="' . htmlspecialchars($gravatarEmail, ENT_QUOTES, 'UTF-8') . '" class="textCtrl" />
				</span>
			</dd>
		</dl>
	';
}
$__compilerVar2 .= '
	
	';
$__output .= $this->callTemplateHook('account_avatar', $__compilerVar2, array());
unset($__compilerVar2);
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Lưu thay đổi' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
