<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Delete Playlist' . ': ' . htmlspecialchars($playlist['playlist_name'], ENT_QUOTES, 'UTF-8');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('media/playlist/delete', $playlist, array()) . '" method="post" class="xenForm formOverlay">

	<dl class="ctrlUnit">
		<dt>' . 'Delete Playlist' . '</dt>
		<dd>
			' . htmlspecialchars($playlist['playlist_name'], ENT_QUOTES, 'UTF-8') . '
			<p class="explain">' . 'Are you sure you wish to delete this playlist?' . '</p>
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Delete Playlist' . '" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
