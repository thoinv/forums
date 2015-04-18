<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li>
	<div class="secondaryContent">
		<div class="views">
			<b>' . htmlspecialchars($playlist['count'], ENT_QUOTES, 'UTF-8') . '</b><br />
			' . 'videos' . '
		</div>

		<div class="thumb">
			<a href="' . XenForo_Template_Helper_Core::link('media/playlist', $playlist, array()) . '"><img src="' . XenForo_Template_Helper_Core::callHelper('medio', array(
'0' => $playlist
)) . '" border="0" alt="' . htmlspecialchars($playlist['playlist_name'], ENT_QUOTES, 'UTF-8') . '" /></a>
		</div>

		<div class="info">
			<a href="' . XenForo_Template_Helper_Core::link('media/playlist', $playlist, array()) . '"><b>' . htmlspecialchars($playlist['playlist_name'], ENT_QUOTES, 'UTF-8') . '</b></a><br />
			<div class="muted">
				' . 'Playlist by ' . '<a href="' . XenForo_Template_Helper_Core::link('media/user', $playlist, array()) . '">' . htmlspecialchars($playlist['username'], ENT_QUOTES, 'UTF-8') . '</a>' . '' . ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
				' . 'Last updated:' . ': ';
if ($playlist['playlist_date'])
{
$__output .= XenForo_Template_Helper_Core::datetime($playlist['playlist_date'], '');
}
else
{
$__output .= 'Never';
}
$__output .= '
			</div>
		</div>
	</div>
</li>';
