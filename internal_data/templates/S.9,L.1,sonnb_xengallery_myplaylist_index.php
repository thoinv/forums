<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'My Playlists';
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_myplaylist_index');
$__output .= '

';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= '<a href="' . XenForo_Template_Helper_Core::link('gallery/my-playlists/create', false, array()) . '" class="callToAction OverlayTrigger"><span>' . 'Create A New Playlist' . '</span></a>';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/my-playlists/update', false, array()) . '" method="post" class="sectionMain AutoValidator" data-redirect="on">
	';
if ($playlists)
{
$__output .= '

		<ol class="playlistList">
		';
foreach ($playlists AS $playlist)
{
$__output .= '
			';
$__compilerVar1 = '';
$__compilerVar1 .= '1';
$__compilerVar2 = '';
$__compilerVar2 .= '<li class="playlistListItem" id="playlist-' . htmlspecialchars($playlist['playlist_id'], ENT_QUOTES, 'UTF-8') . '">
	<div class="listBlock playlistIcon">
		<div class="listBlockInner">
			<a href="' . XenForo_Template_Helper_Core::link('gallery/my-playlists', $playlist, array()) . '" class="playlistIcon"><img src="' . htmlspecialchars($playlist['thumbnail'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($playlist['title'], ENT_QUOTES, 'UTF-8') . '" /></a>
		</div>
	</div>
	<div class="listBlock main">
		<div class="listBlockInner">
			<h3 class="title">
				';
if ($__compilerVar1)
{
$__compilerVar2 .= '<input type="checkbox" name="playlist_ids[]" value="' . htmlspecialchars($playlist['playlist_id'], ENT_QUOTES, 'UTF-8') . '" autocomplete="off" /> ';
}
$__compilerVar2 .= '<a
				href="' . XenForo_Template_Helper_Core::link('gallery/my-playlists', $playlist, array()) . '">' . htmlspecialchars($playlist['title'], ENT_QUOTES, 'UTF-8') . '</a>
			</h3>
			<div class="playlistDetails muted">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($playlist,'',false,array())) . ',
				<a href="' . XenForo_Template_Helper_Core::link('gallery/my-playlists', $playlist, array()) . '" class="faint">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($playlist['added_date'],array(
'time' => htmlspecialchars($playlist['added_date'], ENT_QUOTES, 'UTF-8')
))) . '</a>
				<a href="' . XenForo_Template_Helper_Core::link('gallery/my-playlists/delete', $playlist, array()) . '" class="OverlayTrigger item delete">' . 'Delete' . '</a>
				<a href="' . XenForo_Template_Helper_Core::link('gallery/my-playlists/edit', $playlist, array()) . '" class="OverlayTrigger item edit">' . 'Edit' . '</a>
			</div>
			<div class="tagLine">
				' . htmlspecialchars($playlist['description'], ENT_QUOTES, 'UTF-8') . '
			</div>
		</div>
	</div>
	<div class="listBlock playlistStats">
		<div class="listBlockInner">
			<div class="pairsJustified">
				<dl><dt>' . 'Content Counts' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($playlist['content_count'], '0') . '</dd></dl>
				<dl><dt>' . 'Updated' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('playlist/my-playlists', $playlist, array()) . '" class="concealed">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($playlist['updated_date'],array(
'time' => htmlspecialchars($playlist['updated_date'], ENT_QUOTES, 'UTF-8')
))) . '</a></dd></dl>
			</div>
		</div>
	</div>
</li>

';
$this->addRequiredExternal('css', 'sonnb_xengallery_myplaylist_index');
$__output .= $__compilerVar2;
unset($__compilerVar1, $__compilerVar2);
$__output .= '
		';
}
$__output .= '
		</ol>
		<div class="sectionFooter">
			<select name="do" class="textCtrl" autocomplete="off">
				<option>' . 'With selected' . '...</option>
				<option value="delete">' . 'Delete Playlist' . '</option>
			</select>
			<input type="submit" value="' . 'Go' . '" class="button" class="button" />
		</div>

	';
}
else
{
$__output .= '
		<div class="primaryContent">' . 'You do not have any playlist yet.' . '</div>
	';
}
$__output .= '

	<div class="pageNavLinkGroup">
		' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalPlaylists, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'gallery/my-playlists', false, array(), false, array())) . '
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

</form>';
