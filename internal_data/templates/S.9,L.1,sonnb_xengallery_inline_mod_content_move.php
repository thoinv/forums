<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Inline Moderation: Move Contents';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/inline-mod-content/move', false, array()) . '" method="post" class="xenForm formOverlay AutoValidator" data-redirect="on">
	<p>' . 'Are you sure you want to move ' . htmlspecialchars($contentCount, ENT_QUOTES, 'UTF-8') . ' contents?' . '</p>

	<dl class="ctrlUnit">
		<dt><label for="ctrl_album_id">' . 'Destination Album' . ':</label></dt>
		<dd>
			<input type="text" class="textCtrl" name="album_id" value="" placeholder="' . 'ID of destination album' . '" />
			
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Move Contents' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	';
foreach ($contentIds AS $contentId)
{
$__output .= '
		<input type="hidden" name="sxgcontents[]" value="' . htmlspecialchars($contentId, ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__output .= '

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
