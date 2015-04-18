<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Avatar Editor';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:account/personal-details', false, array()), 'value' => 'Personal Details');
$__output .= '

';
$this->addRequiredExternal('css', 'account_avatar_overlay');
$__output .= '
';
$this->addRequiredExternal('css', 'account_avatar_gallery');
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenforo/avatar_editor.js');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('account/avatar-upload', false, array()) . '" method="post" enctype="multipart/form-data"
	class="AvatarEditor AutoInlineUploader formOverlay"
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
					' . 'Use a custom avatar' . '
					<span class="explain faint">
						' . 'Drag this image to crop it, then click <span class="saveHint">Okay</span> to confirm, or upload a new avatar below.' . '
					</span>
				</label>

				<label for="ctrl_avatar" class="ClickProxy" rel="#ctrl_useGravatar_0" data-allowDefault="1">' . 'Upload new custom avatar' . ':</label>
				<input type="file" name="avatar" class="textCtrl" onchange="this.blur()" id="ctrl_avatar" title="' . 'Supported formats: JPEG, PNG, GIF' . '" />
				<div class="explain faint">' . 'It is recommended that you use an image that is at least 200x200 pixels.' . '</div>
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
					<label for="ctrl_useGravatar_1">' . 'Use Gravatar' . '</label>
	
					<input type="email" name="gravatar" value="' . htmlspecialchars($gravatarEmail, ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="GravatarEmail" placeholder="' . 'Gravatar email address' . '" />
					<input type="button" class="button" id="Gravatar' . 'Test' . '" value="' . 'Test' . '"
						data-testUrl="' . XenForo_Template_Helper_Core::link('account/gravatar-test', false, array()) . '"
						data-testSrc="#GravatarEmail"
						data-testImg="#GravatarImg"
						data-testErr="#GravatarError" />
	
					<p class="explain faint">
						<label for="ctrl_useGravatar_1"><span id="GravatarError"></span> ' . 'Enter the email address of the Gravatar you want to use.' . '</label>
						<a class="hint" href="http://gravatar.com" rel="nofollow" target="_blank">' . 'What\'s a Gravatar?' . '</a>
					</p>
				</div>
			</li>
		';
}
$__output .= '
		';
if ($xenOptions['avatarGalleryEnable'])
{
$__output .= '
			<li class="avatarOption avatarGallery">
				<label for="ctrl_useGallery" class="avatarLabel avatar">
					' . 'Pick avatar from gallery' . '
				</label>
				<input type="radio" name="use_gravatar" value="0" class="Disabler radioOption" id="ctrl_useGallery" />
				<div id="ctrl_useGallery_Disabler">
					<ul>
						';
foreach ($avatars AS $avatar)
{
$__output .= '
							<li>
								<input type="radio" name="chosen_avatar" value="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" id="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '"/>
								<label for="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '">
									<img src="' . htmlspecialchars($xenOptions['boardUrl'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($xenOptions['avatarGalleryPath'], ENT_QUOTES, 'UTF-8') . '/' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '"/>
								</label>
							</li>
						';
}
$__output .= '
					</ul>
				</div>
			</li>
		';
}
$__output .= '

		<li class="submitUnit saveDeleteControls">
			<label for="DeleteAvatar" class="deleteCtrl"><input type="checkbox" name="delete" value="1" id="DeleteAvatar" /> ' . 'Delete current avatar?' . '</label>
			<span class="buttons">
				<input type="submit" value="' . 'Okay' . '" class="button primary" accesskey="s" id="ctrl_save" />
				<input type="reset" value="' . 'Close' . '" class="button OverlayCloser overlayOnly" accesskey="d" />
			</span>
		</li>
	</ul>


	<input type="hidden" name="avatar_date" value="' . htmlspecialchars($visitor['avatar_date'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="avatar_crop_x" value="' . htmlspecialchars($cropX, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="avatar_crop_y" value="' . htmlspecialchars($cropY, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

</form>';
