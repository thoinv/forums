<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Edit Message by ' . htmlspecialchars($conversationMessage['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:conversations', $conversation, array()), 'value' => htmlspecialchars($conversation['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('conversations/save-message', $conversation, array(
'm' => $conversationMessage['message_id']
)) . '" method="post"
	class="section AutoValidator InlineMessageEditor NoAutoHeader">
	<h2 class="heading overlayOnly">' . 'Edit Message by ' . htmlspecialchars($conversationMessage['username'], ENT_QUOTES, 'UTF-8') . '' . '</h2>

	<div class="secondaryContent messageContainer">' . $editorTemplate . '</div>

	<div class="sectionFooter">
		<span class="buttonContainer">
			<input type="submit" value="' . 'Lưu thay đổi' . '" accesskey="s" class="button primary" />
			<input type="submit" value="' . 'Thêm tùy chọn' . '..." name="more_options" class="button JsOnly" />
			<input type="button" value="' . 'Hủy bỏ' . '" class="button OverlayCloser" accesskey="r" />
		</span>
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
