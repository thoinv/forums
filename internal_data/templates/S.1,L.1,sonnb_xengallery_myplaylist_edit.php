<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
if ($playlist['playlist_id'])
{
$__extraData['title'] .= 'Edit Playlist' . ': ' . htmlspecialchars($playlist['title'], ENT_QUOTES, 'UTF-8');
}
else
{
$__extraData['title'] .= 'Create New Playlist';
}
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/my-playlists/save', $playlist, array()) . '" method="post" class="xenForm formOverlay AutoValidator" data-redirect="on">
	<dl class="ctrlUnit">
		<dt><label for="ctrl_title">' . 'Title' . ':</label></dt>
		<dd><input name="title" id="ctrl_title" class="textCtrl" value="' . htmlspecialchars($playlist['title'], ENT_QUOTES, 'UTF-8') . '" /></dd>
	</dl>
	<dl class="ctrlUnit">
		<dt><label for="ctrl_description">' . 'Description' . ':</label></dt>
		<dd><textarea name="description" id="ctrl_description" class="textCtrl Elastic" rows="3">' . htmlspecialchars($playlist['description'], ENT_QUOTES, 'UTF-8') . '</textarea></dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Save Changes' . '" accesskey="s" class="button primary" />
			';
if ($playlist['playlist_id'])
{
$__output .= '
				<a href="' . XenForo_Template_Helper_Core::link('gallery/my-playlists/delete', $playlist, array()) . '" class="button OverlayTrigger">' . 'Delete Playlist' . '...</a>
			';
}
$__output .= '
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
