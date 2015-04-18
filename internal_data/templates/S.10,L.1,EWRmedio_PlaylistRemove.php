<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Remove From Playlist' . ': ' . htmlspecialchars($playlist['playlist_name'], ENT_QUOTES, 'UTF-8');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('media/playlist/move/' . htmlspecialchars($media['media_id'], ENT_QUOTES, 'UTF-8') . '/rem', $playlist, array()) . '" method="post" class="xenForm formOverlay">

	<dl class="ctrlUnit">
		<dt>' . 'Remove From Playlist' . '</dt>
		<dd>
			' . htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . '
			<p class="explain">' . 'Are you sure you wish to remove this media from this playlist?' . '</p>
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Remove From Playlist' . '" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
