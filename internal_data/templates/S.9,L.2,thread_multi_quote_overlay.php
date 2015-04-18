<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Review Selected Messages';
$__output .= '

';
$this->addRequiredExternal('js', 'js/sortable/jquery.sortable.min.js');
$__output .= '
';
$this->addRequiredExternal('css', 'thread_multi_quote_overlay');
$__output .= '

<form class="section" id="MultiQuoteForm" data-form="' . htmlspecialchars($formId, ENT_QUOTES, 'UTF-8') . '">
	<h3 class="subHeading multiQuoteDragHeading">' . 'Drag messages up and down to rearrange the order for quoting.' . '</h3>
	<ol class="overlayScroll Sortable">
		';
foreach ($posts AS $postId => $post)
{
$__output .= '
			<li draggable="true" class="MultiQuoteItem">
				<input type="hidden" name="postId[]" value="' . htmlspecialchars($postId, ENT_QUOTES, 'UTF-8') . '" class="MultiQuoteId" />
				
				<table>
				<tr>
					<td class="secondaryContent avatarHolder" rowspan="2"><span class="avatar"><img src="' . XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $post,
'1' => 's'
)) . '" alt="' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '" /></span></td>
					<td class="secondaryContent messageInfo">
						<a href="javascript:" class="MultiQuoteRemove">' . 'Remove' . '</a>
						' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['post_date'],array(
'time' => htmlspecialchars($post['post_date'], ENT_QUOTES, 'UTF-8')
))) . ', ' . htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') . '</td>
				</tr>
				<tr>
					<td class="primaryContent messageCell">
						<div class="messageArea">
							<div class="messageText">' . $post['messageParsed'] . '</div>
							<div class="messageGradient"></div>
						</div>
					</td>
				</tr>
				</table>
			</li>
		';
}
$__output .= '
	</ol>
	<div class="sectionFooter">
		<a class="button OverlayCloser JsOnly">' . 'Hủy bỏ' . '</a>
		<a class="button primary OverlayCloser MultiQuote AutoFocus"
			href="' . XenForo_Template_Helper_Core::link('threads/multi-quote', $thread, array()) . '"
			data-form="' . htmlspecialchars($formId, ENT_QUOTES, 'UTF-8') . '"
			data-inputs="#MultiQuoteForm input.MultiQuoteId">' . 'Quote These Messages' . '</a>
	</div>
</form>';
