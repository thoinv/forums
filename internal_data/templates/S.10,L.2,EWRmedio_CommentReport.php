<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Report Comment';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Report Comment';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:media', $media, array()), 'value' => htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('media/comment/report', $comment, array()) . '" method="post" class="xenForm formOverlay AutoValidator">

	<dl class="ctrlUnit">
		<dt><label for="ctrl_message">' . 'Lý do báo cáo' . ':</label></dt>
		<dd><textarea name="message" id="ctrl_message" rows="2" class="textCtrl Elastic"></textarea></dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Report Comment' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
