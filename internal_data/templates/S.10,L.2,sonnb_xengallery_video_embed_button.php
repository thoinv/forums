<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<input type="button" value="' . 'Embed Videos' . '"
	id="ctrl_video_embed" class="button OverlayTrigger DisableOnSubmit" data-cacheOverlay="false"
	data-href="' . XenForo_Template_Helper_Core::link('full:gallery/videos/embed', '', array(
'_params' => $contentDataParams
)) . '"
	data-maxfileupload="100"
	data-error-maxfileupload="' . 'You only can upload ' . '100' . ' contents at a time.' . '" />';
