<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Edit the comment that was made by ' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
if ($includeTaggerJs)
{
$__output .= '
    ';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.usertagger.js');
$__output .= '
';
}
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/comments/edit', $comment, array()) . '" method="post" class="xenForm formOverlay XenGalleryInlineCommentEditor NoAutoHeader">
	<dl class="ctrlUnit">
		<dt><label for="ctrl_message">' . 'Nội dung' . ':</label></dt>
		<dd><textarea name="message" id="ctrl_message" class="textCtrl Elastic UserTagger" rows="2">' . htmlspecialchars($comment['message'], ENT_QUOTES, 'UTF-8') . '</textarea></dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Lưu thay đổi' . '" accesskey="s" class="button primary" />
			';
if ($comment['canDelete'])
{
$__output .= '
				<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/delete', $comment, array()) . '" class="button OverlayTrigger">' . 'Delete Comment' . '...</a>
			';
}
$__output .= '
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
