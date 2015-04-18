<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Content History';
$__output .= '
';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$this->addRequiredExternal('css', 'edit_history');
$__output .= '

<div class="section historyText">
	<div class="primaryContent overlayScroll">
		<ul class="Tabs tabs" data-panes="#history-panes-' . htmlspecialchars($serverTime, ENT_QUOTES, 'UTF-8') . '-' . htmlspecialchars($history['edit_history_id'], ENT_QUOTES, 'UTF-8') . ' > li">
			<li class="active"><a>' . 'Formatted' . '</a></li>
			<li><a>' . 'Raw' . '</a></li>
		</ul>
		<ul id="history-panes-' . htmlspecialchars($serverTime, ENT_QUOTES, 'UTF-8') . '-' . htmlspecialchars($history['edit_history_id'], ENT_QUOTES, 'UTF-8') . '" style="margin-top: 10px">
			<li class="messageText baseHtml">
				' . $contentFormatted . '
			</li>
			<li>
				<textarea class="textCtrl Elastic" rows="10" readonly="readonly">' . htmlspecialchars($history['old_text'], ENT_QUOTES, 'UTF-8') . '</textarea>
			</li>
		</ul>
	</div>
	';
if ($canRevert)
{
$__output .= '
		<form action="' . XenForo_Template_Helper_Core::link('edit-history/revert', $history, array()) . '" method="post" class="sectionFooter">
			<label><input type="checkbox" name="_xfConfirm" value="1" /> ' . 'Confirm Revert' . '</label>
			<input type="submit" class="button" value="' . 'Revert to This Version' . '" />
			<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		</form>
	';
}
$__output .= '
</div>';
