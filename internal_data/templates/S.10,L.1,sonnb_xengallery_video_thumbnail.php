<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Edit Video Thumbnail';
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_video_thumbnail');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/videos/thumbnail', $content, array()) . '" method="post" enctype="multipart/form-data" class="formOverlay videoThumbnailEditor">

	<div class="currentThumbnail">
		<img class="videoThumbnail" src="' . htmlspecialchars($content['thumbnailSmall'], ENT_QUOTES, 'UTF-8') . '" />
	</div>

	<ul class="modifyControls">
		<li class="thumbnailAction">
			<div><input type="file" name="thumbnail" class="textCtrl thumbnailUpload" onchange="this.form.submit()" id="ctrl_video_thumbnail" title="' . 'Supported formats: JPEG, PNG, GIF' . '" /></div>
			<div class="explain faint"><span>' . 'Supported formats: JPEG, PNG, GIF' . '</span></div>
		</li>
	</ul>

	<div class="submitUnit">
		<input type="submit" value="' . 'Save Changes' . '" class="button primary" accesskey="s" id="ctrl_save" />
		<input type="reset" value="' . 'Close' . '" class="button OverlayCloser overlayOnly" accesskey="d" />
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
