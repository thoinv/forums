<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Edit Comment by ' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:media', $media, array()), 'value' => htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('media/comment/edit', $comment, array()) . '" method="post" class="xenForm formOverlay">
	<dl class="ctrlUnit">
		<dt><label for="ctrl_message">' . 'Message' . ':</label></dt>
		<dd><textarea name="message" id="ctrl_message" class="textCtrl Elastic" rows="2">' . htmlspecialchars($comment['comment_message'], ENT_QUOTES, 'UTF-8') . '</textarea></dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Save Changes' . '" accesskey="s" class="button primary" />
			<a href="' . XenForo_Template_Helper_Core::link('media/comment/delete', $comment, array()) . '" class="button OverlayTrigger">' . 'Delete Post' . '...</a>
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
