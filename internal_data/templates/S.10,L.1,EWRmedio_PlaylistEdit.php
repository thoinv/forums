<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($playlist['playlist_name'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Edit';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($playlist['playlist_name'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Edit';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:media/user', $playlist, array()), 'value' => htmlspecialchars($playlist['username'], ENT_QUOTES, 'UTF-8'));
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:media/user/playlists', $playlist, array()), 'value' => 'Playlists');
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:media/playlist', $playlist, array()), 'value' => htmlspecialchars($playlist['playlist_name'], ENT_QUOTES, 'UTF-8'));
$__output .= '

';
$this->addRequiredExternal('css', 'EWRmedio');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRmedio_ajax.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/8wayrun/EWRmedio_jqui.js');
$__output .= '

<div class="sectionMain">
	<form action="' . XenForo_Template_Helper_Core::link('media/playlist/edit', $playlist, array()) . '" method="post" class="xenForm">
		<fieldset>
			<dl class="ctrlUnit">
				<dt><label for="ctrl_title">' . 'Title' . ':</label></dt>
				<dd><input type="text" name="playlist_name" class="textCtrl" id="ctrl_name" value="' . htmlspecialchars($playlist['playlist_name'], ENT_QUOTES, 'UTF-8') . '" /></dd>
			</dl>

			<dl class="ctrlUnit fullWidth">
				<dt></dt>
				<dd>' . $editorTemplate . '</dd>
			</dl>
		</fieldset>

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Save Playlist' . '" name="submit" accesskey="s" class="button primary" />
				<a href="' . XenForo_Template_Helper_Core::link('media/playlist/delete', $playlist, array()) . '" type="button" class="button OverlayTrigger">' . 'Delete Playlist' . '...</a>
			</dd>
		</dl>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

		';
if ($mediaList)
{
$__output .= '
		<fieldset class="sortColumn">
			';
foreach ($mediaList AS $media)
{
$__output .= '
				<dl class="ctrlUnit">
					<dt>
						<a class="button sortDelete">' . 'Delete' . '</a>
						<img src="' . XenForo_Template_Helper_Core::callHelper('medio', array(
'0' => $media
)) . '" border="0" alt="' . htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . '" />
						<input type="hidden" class="position" name="playlist_media[]" value="' . htmlspecialchars($media['media_id'], ENT_QUOTES, 'UTF-8') . '" />
					</dt>
					<dd>
						<div class="portlet secondaryContent">' . htmlspecialchars($media['media_title'], ENT_QUOTES, 'UTF-8') . '</div>
					</dd>
				</dl>
			';
}
$__output .= '
		</fieldset>
		';
}
$__output .= '
	</form>
</div>

';
$__compilerVar1 = '';
$__compilerVar1 .= '<div class="medioCopy copyright muted">
	<a href="http://xenforo.com/community/resources/97/">XenMedio</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
