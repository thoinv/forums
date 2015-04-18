<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Edit Resource Icon';
$__output .= '

';
$this->addRequiredExternal('css', 'resource_icon');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('resources/icon', $resource, array()) . '" method="post" enctype="multipart/form-data" class="formOverlay resourceIconEditor">

	<div class="currentIcon">
		<img class="resourceIcon" src="' . XenForo_Template_Helper_Core::callHelper('resourceiconurl', array(
'0' => $resource
)) . '" alt="' . 'Current icon' . '" />
	</div>

	<ul class="modifyControls">

		<li class="iconAction">
			<label for="ctrl_icon">' . 'Upload a new resource icon' . ':</label>
			<div><input type="file" name="icon" class="textCtrl iconUpload" onchange="this.form.submit()" id="ctrl_icon" title="' . 'Supported formats: JPEG, PNG, GIF' . '" /></div>
			<div class="explain faint">' . 'This icon should be ' . htmlspecialchars($iconSize, ENT_QUOTES, 'UTF-8') . 'x' . htmlspecialchars($iconSize, ENT_QUOTES, 'UTF-8') . ' pixels.' . '</div>
		</li>

		';
if ($resource['icon_date'])
{
$__output .= '
			<li class="iconAction">
				<label class="deleteCtrl"><input type="checkbox" name="delete" value="1" /> ' . 'Delete current icon' . '</label>
			</li>
		';
}
$__output .= '
	</ul>

	<div class="submitUnit">
		<input type="submit" value="' . 'Lưu thay đổi' . '" class="button primary" accesskey="s" id="ctrl_save" />
		<input type="reset" value="' . 'Đóng' . '" class="button OverlayCloser overlayOnly" accesskey="d" />
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
