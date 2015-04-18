<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_navbar_template');
$__output .= '

<ul class="secondaryContent blockLinksList xengallery">
	';
if ($selectedTabId == ('sonnb_xengallery'))
{
$__output .= '
		';
if ($visitor['user_id'])
{
$__output .= '
		<li class="Popup PopupControl PopupClosed">
			<a href="javascript:void(0);" rel="Menu">' . 'My Gallery' . '</a>
			<div class="Menu JsOnly" id="MyGalleryMenu">
				<div class="menuHeader primaryContent">
					<h3>
						<a href="javascript:void(0);" class="concealed">' . 'My Gallery' . '</a>
					</h3>						
				</div>
				<div class="menuColumns secondaryContent">
					<ul class="blockLinksList">
						';
if ($visitor['permissions']['sonnb_xengallery']['canUpload'])
{
$__output .= '
							<li><a href="' . XenForo_Template_Helper_Core::link('gallery/albums/create', false, array()) . '">' . 'Create New Album' . '</a></li>
							<li><a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/create', false, array()) . '">' . 'Add New Photos' . '</a></li>
						';
}
$__output .= '
						';
if ($visitor['permissions']['sonnb_xengallery']['canEmbedVideo'])
{
$__output .= '
							<li><a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/videos/create', false, array()) . '">' . 'Add New Videos' . '</a></li>
						';
}
$__output .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('gallery/authors', $visitor, array()) . '">' . 'My Albums' . '</a></li>
						<li><a href="' . XenForo_Template_Helper_Core::link('gallery/my-playlists', $visitor, array()) . '">' . 'My Playlists' . '</a></li>
					</ul>
				</div>
			</div>
		</li>
		';
}
$__output .= '
		';
if (!$xenOptions['sonnbXG_disableCategory'])
{
$__output .= '
		<li class="Popup PopupControl PopupClosed">
			<a href="' . XenForo_Template_Helper_Core::link('gallery/categories', false, array()) . '" rel="Menu">' . 'Categories' . '</a>
			<div class="Menu JsOnly navPopup" id="GalleryCategories" 
				data-contentSrc="' . XenForo_Template_Helper_Core::link('gallery/categories/popup', false, array()) . '"
				data-contentDest="#GalleryCategories .listCategory .secondaryContent">
				<div class="menuHeader primaryContent">
					<h3>
						<span class="Progress InProgress"></span>
						<a href="' . XenForo_Template_Helper_Core::link('gallery/categories', false, array()) . '" class="concealed">' . 'Categories' . '</a>
					</h3>
				</div>
				<div class="listCategory">
					<div class="menuColumns secondaryContent">

					</div>
				</div>
			</div>
		</li>
		';
}
$__output .= '
		<li class="Popup PopupControl PopupClosed">
			<a href="javascript:void(0);" rel="Menu">' . 'Explore' . '</a>
			<div class="Menu JsOnly navPopup galleryExplore">
				<div class="menuHeader primaryContent">
					<h3>
						<a href="javascript:void(0);" class="concealed">' . 'Explore' . '</a>
					</h3>
				</div>
				<div class="menuColumns secondaryContent">
					<ul class="blockLinksList">
						<li><a title="' . 'Explore User\'s Albums' . '" class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/explore-user', false, array()) . '">' . 'Explore User\'s Albums' . '</a></li>
						<li><a title="' . 'These are all newly created albums from ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '.' . '" href="' . XenForo_Template_Helper_Core::link('gallery/new-albums', false, array()) . '">' . 'New Albums' . '</a></li>
						<li><a title="' . 'These are all newly created photos from ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '.' . '" href="' . XenForo_Template_Helper_Core::link('gallery/new-photos', false, array()) . '">' . 'New Photos' . '</a></li>
						<li><a title="' . 'These are all newly created videos from ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '.' . '" href="' . XenForo_Template_Helper_Core::link('gallery/new-videos', false, array()) . '">' . 'New Videos' . '</a></li>
					</ul>
				</div>
			</div>
		</li>
	';
}
else
{
$__output .= '
		';
if ($visitor['user_id'])
{
$__output .= '
			';
if ($visitor['permissions']['sonnb_xengallery']['canUpload'])
{
$__output .= '
				<li><a href="' . XenForo_Template_Helper_Core::link('gallery/albums/create', false, array()) . '">' . 'Create New Album' . '</a></li>
				<li><a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/photos/create', false, array()) . '">' . 'Add New Photos' . '</a></li>
			';
}
$__output .= '
			';
if ($visitor['permissions']['sonnb_xengallery']['canEmbedVideo'])
{
$__output .= '
				<li><a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/videos/create', false, array()) . '">' . 'Add New Videos' . '</a></li>
			';
}
$__output .= '
			<li><a href="' . XenForo_Template_Helper_Core::link('gallery/authors', $visitor, array()) . '">' . 'My Albums' . '</a></li>
		';
}
$__output .= '
		';
if (!$xenOptions['sonnbXG_disableCategory'])
{
$__output .= '
			<li><a href="' . XenForo_Template_Helper_Core::link('gallery/categories', false, array()) . '">' . 'Categories' . '</a></li>
		';
}
$__output .= '
		<li><a title="' . 'Explore User\'s Albums' . '" href="' . XenForo_Template_Helper_Core::link('gallery/explore-user', false, array()) . '" class="OverlayTrigger">' . 'Explore User\'s Albums' . '</a></li>
		<li><a title="' . 'These are all newly created albums from ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '.' . '" href="' . XenForo_Template_Helper_Core::link('gallery/new-albums', false, array()) . '">' . 'New Albums' . '</a></li>
		<li><a title="' . 'These are all newly created photos from ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '.' . '" href="' . XenForo_Template_Helper_Core::link('gallery/new-photos', false, array()) . '">' . 'New Photos' . '</a></li>
		<li><a title="' . 'These are all newly created videos from ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '.' . '" href="' . XenForo_Template_Helper_Core::link('gallery/new-videos', false, array()) . '">' . 'New Videos' . '</a></li>
	';
}
$__output .= '
	';
if (!$xenOptions['sonnbXG_disableCollection'])
{
$__output .= '
		<li><a title="' . 'All interesting, fantastic and amazing photos/albums collected and promoted by our staffs on ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . ' ' . '" href="' . XenForo_Template_Helper_Core::link('gallery/collections', false, array()) . '">' . 'Collections' . '</a></li>
	';
}
$__output .= '
	';
if (!$xenOptions['sonnb_XG_disableLocation'])
{
$__output .= '
		<li><a title="' . 'Explore popular locations where our members at ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . ' usually take photos.' . '" href="' . XenForo_Template_Helper_Core::link('gallery/locations', false, array()) . '">' . 'Locations' . '</a></li>
	';
}
$__output .= '
	';
if (!$xenOptions['sonnb_XG_disableCamera'])
{
$__output .= '
		<li><a title="' . 'The most active cameras that are being used in gallery at ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '' . '" href="' . XenForo_Template_Helper_Core::link('gallery/cameras', false, array()) . '">' . 'Cameras' . '</a></li>
	';
}
$__output .= '
	<li><a title="' . 'The most active streams/keywords are being used at ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '' . '" href="' . XenForo_Template_Helper_Core::link('gallery/streams', false, array()) . '">' . 'Streams Cloud' . '</a></li>
</ul>	';
