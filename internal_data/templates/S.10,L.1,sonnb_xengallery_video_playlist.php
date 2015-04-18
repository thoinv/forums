<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Add This Video To A Playlist';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$__extraData['head']['robots'] = '';
$__extraData['head']['robots'] .= '
	<meta name="robots" content="noindex" />
';
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_edit_privacy');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/videos/playlist', $content, array()) . '" method="post"
	class="xenForm AutoValidator formOverlay" data-redirect="on">

	<dl class="ctrlUnit">
		<dt>' . 'Playlist' . ':</dt>
		<dd>
			';
if ($playlists)
{
$__output .= '
				<select name="playlist_id" id="ctrl_playlist_id" class="textCtrl">
					';
foreach ($playlists AS $playlist)
{
$__output .= '
						<option value="' . htmlspecialchars($playlist['playlist_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($playlist['title'], ENT_QUOTES, 'UTF-8') . '</option>
					';
}
$__output .= '
				</select>
			';
}
else
{
$__output .= '
				<p class="explain">' . 'You do not have any playlist yet.' . '</p>
			';
}
$__output .= '
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Save' . '" accesskey="s" class="button primary" />
		</dd>
	</dl>

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
