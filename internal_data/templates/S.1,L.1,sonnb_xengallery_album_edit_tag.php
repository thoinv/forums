<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Edit Album' . ': ' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
if ($album['description'])
{
$__output .= '
	';
$__extraData['pageDescription'] = array(
'class' => 'baseHtml'
);
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= $album['description'];
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

';
$__compilerVar1 = '';
$__compilerVar1 .= '<form action="' . XenForo_Template_Helper_Core::link('gallery/albums/tag', $album, array()) . '" method="post"
	class="xenForm ' . (($class) ? (htmlspecialchars($class, ENT_QUOTES, 'UTF-8')) : ('AutoValidator')) . ' formOverlay" ' . (($id) ? ('id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . ' 
	data-redirect="on">
	
	<dl class="ctrlUnit surplusLabel fullWidth">
		<dt><label for="ctrl_with">' . 'Tag People' . ':</label></dt>
		<dd>
			<input type="text" name="album_with" class="textCtrl AutoComplete" id="ctrl_with" autofocus="true"
				placeholder="' . 'Who was there with you?' . '..." value="' . (($album['album_people']) ? (htmlspecialchars($album['album_people'], ENT_QUOTES, 'UTF-8')) : ('')) . '"/>
			<p class="explain">' . 'Separate names with a comma.' . '</p>
		</dd>
	</dl>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Save' . '" accesskey="s" class="button primary" />
			<input type="reset" value="' . 'Cancel' . '" accesskey="d" class="button primary closer" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
