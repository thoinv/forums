<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Sửa Avatar';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:account/personal-details', false, array()), 'value' => 'Chi tiết cá nhân');
$__output .= '

';
$this->addRequiredExternal('css', 'account_avatar_overlay');
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenforo/avatar_editor.js');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('account/avatar-upload', false, array()) . '" method="post" enctype="multipart/form-data"
	class="AvatarEditor AutoInlineUploader formOverlay overlayScroll"
	data-overlayClass="avatarEditor"
	data-maxWidth="' . htmlspecialchars($maxWidth, ENT_QUOTES, 'UTF-8') . '">

	<div class="currentAvatar">
		<label for="ctrl_avatar" class="avatar NoOverlay Av' . htmlspecialchars($visitor['user_id'], ENT_QUOTES, 'UTF-8') . 'l"><img src="' . XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $visitor,
'1' => 'l'
)) . '" alt="' . 'Current Avatar' . '" /></label>
	</div>

	<ul class="modifyControls">

		<li class="avatarOption">
			<div class="avatarCropper avatarLabel" style="width: ' . htmlspecialchars($maxWidth, ENT_QUOTES, 'UTF-8') . 'px; height: ' . htmlspecialchars($maxWidth, ENT_QUOTES, 'UTF-8') . 'px">
				<label for="ctrl_useGravatar_0" class="AvatarCropControl avatar NoOverlay Av' . htmlspecialchars($visitor['user_id'], ENT_QUOTES, 'UTF-8') . 'l" style="width: ' . htmlspecialchars($maxWidth, ENT_QUOTES, 'UTF-8') . 'px; height: ' . htmlspecialchars($maxWidth, ENT_QUOTES, 'UTF-8') . 'px">
					<img src="' . XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $visitor,
'1' => 'l',
'2' => 'custom'
)) . '" style="' . htmlspecialchars($maxDimension, ENT_QUOTES, 'UTF-8') . ': ' . htmlspecialchars($maxWidth, ENT_QUOTES, 'UTF-8') . 'px" alt="' . 'Avatar' . '" />
				</label>
			</div>

			<input type="radio" name="use_gravatar" value="0" class="Disabler radioOption" id="ctrl_useGravatar_0"' . ((!$visitor['gravatar']) ? ' checked="checked"' : '') . ' />

			<div class="labelText" id="ctrl_useGravatar_0_Disabler">
				<label for="ctrl_useGravatar_0" id="ExistingCustom">
					' . 'Sử dụng avatar riêng' . '
					<span class="explain faint">
						' . 'Kéo, thả ảnh để cắt kích thước sau đó ấn <span class="saveHint">Đồng ý</span> để xác nhận, hoặc tải lên avatar mới bên dưới đây.' . '
					</span>
				</label>

				<label for="ctrl_avatar" class="ClickProxy" rel="#ctrl_useGravatar_0" data-allowDefault="1">' . 'Tải lên avatar riêng mới' . ':</label>
				<input type="file" name="avatar" class="textCtrl avatarUpload" onchange="this.blur()" id="ctrl_avatar" title="' . 'Supported formats: JPEG, PNG, GIF' . '" />
				<div class="explain faint">' . 'Chúng tôi khuyến nghị rằng bạn nên sử dụng ảnh với độ phân giải ít nhất là 200x200 pixels.' . '</div>
			</div>
		</li>

		';
if ($xenOptions['gravatarEnable'])
{
$__output .= '
			<li class="avatarOption">
				<label for="ctrl_useGravatar_1" class="avatarLabel avatar">
					<img src="' . htmlspecialchars($gravatarUrl, ENT_QUOTES, 'UTF-8') . '" class="Gravatar" alt="' . 'Gravatar' . '" width="' . htmlspecialchars($maxWidth, ENT_QUOTES, 'UTF-8') . '" height="' . htmlspecialchars($maxWidth, ENT_QUOTES, 'UTF-8') . '" id="GravatarImg" />
				</label>
	
				<input type="radio" name="use_gravatar" value="1" class="Disabler radioOption" id="ctrl_useGravatar_1"' . (($visitor['gravatar']) ? ' checked="checked"' : '') . ' />
	
				<div class="labelText" id="ctrl_useGravatar_1_Disabler">
					<label for="ctrl_useGravatar_1">' . 'Sử dụng Gravatar' . '</label>
	
					<input type="email" name="gravatar" value="' . htmlspecialchars($gravatarEmail, ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="GravatarEmail" placeholder="' . 'Gravatar email address' . '" />
					<input type="button" class="button" id="Gravatar' . 'Test' . '" value="' . 'Test' . '"
						data-testUrl="' . XenForo_Template_Helper_Core::link('account/gravatar-test', false, array()) . '"
						data-testSrc="#GravatarEmail"
						data-testImg="#GravatarImg"
						data-testErr="#GravatarError" />
	
					<p class="explain faint">
						<label for="ctrl_useGravatar_1"><span id="GravatarError"></span> ' . 'Nhập vào email bạn đã đăng ký tại Gravatar để lấy avatar.' . '</label>
						<a class="hint" href="http://gravatar.com" rel="nofollow" target="_blank">' . 'Gravatar là gì?' . '</a>
					</p>
				</div>
			</li>
		';
}
$__output .= '

		<li class="submitUnit saveDeleteControls">
			<label for="DeleteAvatar" class="deleteCtrl"><input type="checkbox" name="delete" value="1" id="DeleteAvatar" /> ' . 'Xóa avatar hiện tại?' . '</label>
			<span class="buttons">
				<input type="submit" value="' . 'Đồng ý' . '" class="button primary" accesskey="s" id="ctrl_save" />
				<input type="reset" value="' . 'Đóng' . '" class="button OverlayCloser overlayOnly" accesskey="d" />
			</span>
		</li>
	</ul>


	<input type="hidden" name="avatar_date" value="' . htmlspecialchars($visitor['avatar_date'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="avatar_crop_x" value="' . htmlspecialchars($cropX, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="avatar_crop_y" value="' . htmlspecialchars($cropY, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

</form>';
