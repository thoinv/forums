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
$this->addRequiredExternal('css', 'sonnb_xengallery_location_view');
$__compilerVar1 .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.map.js');
$__compilerVar1 .= '

<form action="' . XenForo_Template_Helper_Core::link('gallery/albums/location', $album, array()) . '" method="post"
	class="locationForm section ' . (($class) ? (htmlspecialchars($class, ENT_QUOTES, 'UTF-8')) : ('AutoValidator')) . '" ' . (($id) ? ('id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . ' 
	data-redirect="on" data-loadUrl="//maps.googleapis.com/maps/api/js?libraries=places&sensor=false' . (($xenOptions['sonnbXG_mapApiKey']) ? ('&key=' . htmlspecialchars($xenOptions['sonnbXG_mapApiKey'], ENT_QUOTES, 'UTF-8')) : ('')) . '">
	<div class="secondaryContent xenForm" style="width: auto; margin: 0;">
		<div id="mapOverlay"></div>
		
		<dl class="ctrlUnit">
			<dt><label for="ctrl_location_edit">' . 'Location' . ':</label></dt>
			<dd>
				<input type="text" name="album_location" class="textCtrl" id="ctrl_location_edit" maxlength="255" autocomplete="off"
					placeholder="' . 'Where did you take this Photo?' . '..." value="' . (($album['album_location']) ? (htmlspecialchars($album['album_location'], ENT_QUOTES, 'UTF-8')) : ('')) . '"/>
			</dd>
		</dl>
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Save' . '" accesskey="s" class="button primary" />
			</dd>
		</dl>

		<input type="hidden" name="location_lat" value="' . (($location['location_lat']) ? (htmlspecialchars($location['location_lat'], ENT_QUOTES, 'UTF-8')) : ('')) . '" />
		<input type="hidden" name="location_lng" value="' . (($location['location_lng']) ? (htmlspecialchars($location['location_lng'], ENT_QUOTES, 'UTF-8')) : ('')) . '" />
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</div>
</form>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
