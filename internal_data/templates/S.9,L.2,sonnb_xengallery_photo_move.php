<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Move Photo';
$__output .= '

';
if ($content['description'])
{
$__output .= '
	';
$__extraData['pageDescription'] = array(
'class' => 'baseHtml'
);
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= $content['description'];
$__output .= '
';
}
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

<form action="' . XenForo_Template_Helper_Core::link('gallery/photos/move', $content, array()) . '" method="post"
	class="xenForm AutoValidator formOverlay" data-redirect="on">

	<dl class="ctrlUnit">
		<dt>' . 'Target album' . ':</dt>
		<dd>
			<select name="album_id" class="textCtrl">
				';
foreach ($targetAlbums AS $targetAlbum)
{
$__output .= '
					<option value="' . htmlspecialchars($targetAlbum['album_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($targetAlbum['title'], ENT_QUOTES, 'UTF-8') . '</option>
				';
}
$__output .= '
			</select>
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Lưu' . '" accesskey="s" class="button primary" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
