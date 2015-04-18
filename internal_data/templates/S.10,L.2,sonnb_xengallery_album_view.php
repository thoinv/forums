<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Album' . ': ' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Album' . ': ' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= htmlspecialchars($album['description'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/albums', $album, array(
'page' => $page
)) . '" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
';
$__output .= '

';
$__extraData['head']['openGraph'] = '';
$__extraData['head']['openGraph'] .= '
	';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__extraData['head']['openGraph'] .= '
		';
$__compilerVar58 = '';
$__compilerVar58 .= XenForo_Template_Helper_Core::link('canonical:gallery/albums', $album, array());
$__compilerVar59 = '';
$__compilerVar59 .= 'Album' . ': ' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => $album['title']
));
$__compilerVar60 = '';
$__compilerVar60 .= '
				';
if ($album['photos'])
{
$__compilerVar60 .= '
					';
foreach ($album['photos'] AS $___photo)
{
$__compilerVar60 .= '
						<meta property="og:image" content="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $___photo['photoUrl'],
'1' => 'true'
)) . '" />
					';
}
$__compilerVar60 .= '
				';
}
$__compilerVar60 .= '
				<meta property="og:description" content="' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => $album['description']
)) . '" />
			';
$__compilerVar61 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar61 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar61 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar61 .= '
	<meta property="og:image" content="';
$__compilerVar62 = '';
$__compilerVar62 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar61 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar62, array());
unset($__compilerVar62);
$__compilerVar61 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar58 . '" />
	<meta property="og:title" content="' . $__compilerVar59 . '" />
	';
if ($description)
{
$__compilerVar61 .= '<meta property="og:description" content="' . $description . '" />';
}
$__compilerVar61 .= '
	' . $__compilerVar60 . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar61 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar61 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar61 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar61 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar61;
unset($__compilerVar58, $__compilerVar59, $__compilerVar60, $__compilerVar61);
$__extraData['head']['openGraph'] .= '
	';
}
else
{
$__extraData['head']['openGraph'] .= '
		';
if ($album['photos'])
{
$__extraData['head']['openGraph'] .= '
			';
foreach ($album['photos'] AS $___photo)
{
$__extraData['head']['openGraph'] .= '
				<meta property="og:image" content="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $___photo['photoUrl'],
'1' => 'true'
)) . '" />
			';
}
$__extraData['head']['openGraph'] .= '
		';
}
$__extraData['head']['openGraph'] .= '
		<meta property="og:type" content="article" />
		<meta property="og:url" content="' . XenForo_Template_Helper_Core::link('canonical:gallery/albums', $album, array()) . '" />
		<meta property="og:title" content="' . 'Album' . ': ' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => $album['title']
)) . '" />
		<meta property="og:description" content="' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => $album['description']
)) . '" />
	';
}
$__extraData['head']['openGraph'] .= '
';
$__output .= '
';
$__compilerVar63 = '';
if ($album['photos'])
{
$__compilerVar63 .= '
	';
$__extraData['head']['twitterCard'] = '';
$__extraData['head']['twitterCard'] .= '
		<meta name="twitter:card" content="gallery">
		<meta name="twitter:title" content="' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => $album['title']
)) . '">
		<meta name="twitter:description" content="' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $album['description'],
'1' => '200'
))
)) . '">
		';
foreach ($album['photos'] AS $key => $__photo)
{
$__extraData['head']['twitterCard'] .= '
			<meta name="twitter:image' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . ':src" content="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => (($__photo['photoUrl']) ? ($__photo['photoUrl']) : ($__photo['thumbnailUrl'])),
'1' => 'true'
)) . '">
		';
}
$__extraData['head']['twitterCard'] .= '
	';
$__compilerVar63 .= '
';
}
$__output .= $__compilerVar63;
unset($__compilerVar63);
$__output .= '

';
$__extraData['searchBar']['photo'] = '';
$__compilerVar64 = '';
$__compilerVar64 .= '<label><input type="checkbox" name="type[sonnb_xengallery_photo][null]" value="" checked="checked" id="search_bar_photo" /> ' . 'Search photos only' . '</label>

';
if ($xenOptions['sonnbXG_advSearch'] && !$xenOptions['sonnb_XG_disableCamera'])
{
$__compilerVar64 .= '
	<fieldset>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_meta_camera">' . 'Camera' . ':</label></dt>
			<dd>
				<input placeholder="' . 'Type camera\'s name for suggestion' . '..." type="search" name="type[sonnb_xengallery_photo][camera]" value="' . htmlspecialchars($search['camera'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl AutoComplete AcSingle" id="ctrl_meta_camera" data-acurl="' . XenForo_Template_Helper_Core::link('gallery/cameras/find', '', array(
'_xfResponseType' => 'json'
)) . '" autocomplete="off" />
			</dd>
		</dl>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_meta_exposure">' . 'Exposure' . ':</label></dt>
			<dd>
				<input placeholder="' . 'Shutter Speed. Ex: 1/200' . '..." type="search" name="type[sonnb_xengallery_photo][exposure]" value="' . htmlspecialchars($search['exposure'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_meta_exposure" />
			</dd>
		</dl>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_meta_aperture">' . 'Aperture' . ':</label></dt>
			<dd>
				<input placeholder="' . 'F value. Ex: 1.8 (means f/1.8).' . '..." type="search" name="type[sonnb_xengallery_photo][aperture]" value="' . htmlspecialchars($search['aperture'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_meta_aperture" />
			</dd>
		</dl>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_meta_focal_length">' . 'Focal Length' . ':</label></dt>
			<dd>
				<input placeholder="' . 'Focal Length: Ex: 85 (means 85mm)' . '..." type="search" name="type[sonnb_xengallery_photo][focal]" value="' . htmlspecialchars($search['focal'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_meta_focal_length" />
			</dd>
		</dl>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_meta_iso_speed">' . 'ISO Speed' . ':</label></dt>
			<dd>
				<input placeholder="' . 'ISO Speed. Ex: 200' . '..." type="search" name="type[sonnb_xengallery_photo][iso]" value="' . htmlspecialchars($search['iso'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_meta_iso_speed" />
			</dd>
		</dl>
	</fieldset>
';
}
$__extraData['searchBar']['photo'] .= $__compilerVar64;
unset($__compilerVar64);
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
if ($album['isDeleted'])
{
$__output .= '
	<p class="importantMessage">' . 'This album has been deleted.' . '</p>
';
}
$__output .= '
';
if ($album['isModerated'])
{
$__output .= '
	<p class="importantMessage">' . 'Awaiting moderation before being displayed publicly.' . '</p>
';
}
$__output .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.mobile.js');
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_view');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view');
$__output .= '
			
';
$this->addRequiredExternal('js', 'js/xenforo/comments_simple.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.masonry.min.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.infinitescroll.min.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/modernizr.min.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.js');
$__output .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.overlay.js');
$__output .= '

';
if ($includeTaggerJs AND $album['canComment'])
{
$__output .= '
    ';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.usertagger.js');
$__output .= '
';
}
$__output .= '

';
if ($album['canPromote'] || $album['canEdit'] || $album['canAddPhoto'])
{
$__output .= '
	';
$promoteButton = '';
$promoteButton .= '
		';
if (!$xenOptions['sonnbXG_disableCollection'] && $album['canPromote'])
{
$promoteButton .= '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/collection-edit', $album, array()) . '" class="callToAction OverlayTrigger" data-cacheOverlay="false"><span>' . (($album['collection_id']) ? ('Change Collection') : ('Add To A Collection')) . '</span></a>';
}
$promoteButton .= '
		';
if ($album['canAddPhoto'])
{
$promoteButton .= '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/add-photo', $album, array()) . '" class="callToAction"><span>' . 'Add Photos' . '</span></a>';
}
$promoteButton .= '
		';
if ($album['canAddVideo'])
{
$promoteButton .= '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/add-video', $album, array()) . '" class="callToAction"><span>' . 'Add Videos' . '</span></a>';
}
$promoteButton .= '
		
		';
if ($album['canEdit'])
{
$promoteButton .= '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/edit', $album, array()) . '" class="callToAction"><span>' . 'Sửa' . '</span></a>';
}
$promoteButton .= '
	';
$__output .= '
	';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= $promoteButton;
$__output .= '
';
}
$__output .= '

';
$__compilerVar65 = '';
$__output .= $this->callTemplateHook('ad_album_view_above_photo_list', $__compilerVar65, array());
unset($__compilerVar65);
$__output .= '

<div itemscope="itemscope" itemtype="http://schema.org/ImageObject">

	<meta itemprop="publisher" content="' . htmlspecialchars($album['username'], ENT_QUOTES, 'UTF-8') . '">
	<meta itemprop="caption" content="' . htmlspecialchars($album['description'], ENT_QUOTES, 'UTF-8') . '">	
	<meta itemprop="description" content="' . htmlspecialchars($album['description'], ENT_QUOTES, 'UTF-8') . '">
	
	<div class="albumControls">
		<div class="aInfo">
			<h1 itemprop="name">' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '</h1>
			<div class="muted">
				<meta itemprop="uploadDate" content="' . XenForo_Template_Helper_Core::datetime($album['album_date'], '') . '">
				<meta itemprop="datePublished" content="' . XenForo_Template_Helper_Core::datetime($album['album_date'], '') . '">
				<meta itemprop="dateModified" content="' . XenForo_Template_Helper_Core::datetime($album['album_updated_date'], '') . '">
				
				' . 'Updated' . ' ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($album['album_updated_date'],array(
'time' => htmlspecialchars($album['album_updated_date'], ENT_QUOTES, 'UTF-8')
))) . ' 
				';
if (!$xenOptions['sonnb_XG_disableLocation'] && $album['album_location'])
{
$__output .= '
					- ' . 'Taken at' . ' <a itemprop="contentLocation" href="' . XenForo_Template_Helper_Core::link('gallery/locations', array(
'location_url' => $album['album_location']
), array()) . '">' . htmlspecialchars($album['album_location'], ENT_QUOTES, 'UTF-8') . '</a>
				';
}
$__output .= '
				';
if ($album['tagUsers'])
{
$__output .= '
					- ' . XenForo_Template_Helper_Core::callHelper('sonnb_xengallery_tag', array(
'0' => $album['tagUsers'],
'1' => XenForo_Template_Helper_Core::link('gallery/albums/tags', $album, array(), false)
)) . '
				';
}
$__output .= '
			</div>
		</div>
	</div>

	<div class="blockLinksList galleryHeader">
		<ul class="Popup PopupControl">
			<a href="javascript:void(0);" rel="Menu">' . 'Sort Contents' . '</a>
			<div class="Menu JsOnly" id="XenGalleryGallerySort">
				<div class="menuColumns secondaryContent">
					<ul class="blockLinksList">
						<li><a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array(
'order' => 'content_updated_date'
)) . '">' . 'Latest Updated' . '</a></li>
						<li><a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array(
'order' => 'content_date'
)) . '">' . 'Newest Contents' . '</a></li>
						<li><a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array(
'order' => 'view_count'
)) . '">' . 'Most Viewed' . '</a></li>
						<li><a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array(
'order' => 'comment_count'
)) . '">' . 'Most Commented' . '</a></li>
						<li><a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array(
'order' => 'likes'
)) . '">' . 'Most Liked' . '</a></li>
						<li><a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array(
'order' => 'recently_liked'
)) . '">' . 'Recently Liked' . '</a></li>
					</ul>
				</div>
			</div>
		</ul>
	</div>

	<form action="' . XenForo_Template_Helper_Core::link('gallery/inline-mod-content/switch', false, array()) . '" method="post"
		class="InlineModForm"
		data-cookieName="sxgcontents"
		data-overlayId="InlineModOverlayContent"
		data-controls="#InlineModControlsContent"
		data-imodOptions="#ModerationSelectContent">

		<div class="clearfix masonryContainer" ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll')) ? ('data-noAutoScroll="1"') : ('')) . ' data-loading="' . 'Loading Photos' . '..." data-finish="' . 'There are no more photos to be loaded.' . '" data-ajax="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif">
			';
if ($contents)
{
$__output .= '
				';
$__compilerVar66 = '';
$__compilerVar66 .= '
				';
foreach ($contents AS $content)
{
$__compilerVar66 .= '
					';
if ($content['content_type'] == ('photo'))
{
$__compilerVar66 .= '
						';
$__compilerVar67 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar67 .= '
';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar67 .= '
	';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item_hover');
$__compilerVar67 .= '
';
}
$__compilerVar67 .= '

<div class="itemGallery photo" id="content_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '">
	';
$imageHeight = '';
if ($content['medium_width'] < XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_itemwidth'))
{
$imageHeight .= htmlspecialchars($content['medium_height'], ENT_QUOTES, 'UTF-8');
}
else
{
$imageHeight .= ($content['medium_height'] * (XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_itemwidth') / $content['medium_width']));
}
$__compilerVar67 .= '
	';
$imageHeightReal = '';
if (($imageHeight - 110) < 0)
{
$imageHeightReal .= '110';
}
else
{
$imageHeightReal .= htmlspecialchars($imageHeight, ENT_QUOTES, 'UTF-8');
}
$__compilerVar67 .= '
	
	';
if ($content['canInlineMod'])
{
$__compilerVar67 .= '
		<div class="inlineMod">
			<input type="checkbox" value="' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-content-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#content_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select photo' . ': \'' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '\'" name="sxgcontents" autocomplete="off" />
		</div>
	';
}
$__compilerVar67 .= '
	';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar67 .= '
		<div class="photoDate">
			';
if ($content['content_updated_date'])
{
$__compilerVar67 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_updated_date'],array(
'time' => htmlspecialchars($content['content_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else
{
$__compilerVar67 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => htmlspecialchars($content['content_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
$__compilerVar67 .= '
			<span class="bg">&nbsp;</span>
		</div>
	';
}
$__compilerVar67 .= '
	<div class="img" data-height="' . htmlspecialchars($content['medium_height'], ENT_QUOTES, 'UTF-8') . '" data-width="' . htmlspecialchars($content['medium_width'], ENT_QUOTES, 'UTF-8') . '"> 
		<a class="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay')) ? ('hasOverlay') : ('')) . '" href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '" 
			title="' . (($content['title']) ? (htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)))) . '"
			data-cacheOverlay="false" data-overlayOptions="{&quot;fixed&quot;:false}" style="width:220px; height: ' . htmlspecialchars($imageHeightReal, ENT_QUOTES, 'UTF-8') . 'px; max-height:' . htmlspecialchars($imageHeightReal, ENT_QUOTES, 'UTF-8') . 'px;">
			<img class="lazy" alt="' . (($content['title']) ? (htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)))) . '" title="' . (($content['title']) ? (htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)))) . '" data-src="' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" />
			<noscript><img alt="' . (($content['title']) ? (htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)))) . '" title="' . (($content['title']) ? (htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)))) . '" src="' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" /></noscript>
			';
if ($content['is_animated'])
{
$__compilerVar67 .= '<i class="icon gif"></i>';
}
$__compilerVar67 .= '
		</a>
	</div>
	';
if (!XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar67 .= '
		<div class="infoAlbum clearfix">
			<div class="titleAlbum">
				<h3 style="text-align: left;">
					<a href="' . XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '">' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>
				</h3>
			</div>
			<div class="userInfo">
				<a title="' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '" href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $content, array())) : (XenForo_Template_Helper_Core::link('members', $content, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . '">' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '</a>
				
			</div>
			<div class="dateInfo">
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_updated_date'],array(
'time' => htmlspecialchars($content['content_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
			</div>
			';
if ($content['isDeleted'])
{
$__compilerVar67 .= '
				<h3 class="deleteNotice">' . 'This photo has been deleted.' . '</h3>
			';
}
$__compilerVar67 .= '
			';
if ($content['isModerated'])
{
$__compilerVar67 .= '
				<h3 class="deleteNotice">' . 'Awaiting Approval' . '</h3>
			';
}
$__compilerVar67 .= '
		</div>
	';
}
$__compilerVar67 .= '
	<ul class="toolAlbum">
		<li class="likeAlbum">
			<a data-container="#likeCount_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="control ' . (($content['canLike']) ? ('like') : ('')) . ' ' . (($content['like_date']) ? ('active') : ('')) . '" title="' . (($content['canLike'] && $content['like_date']) ? ('Unlike this photo') : ('Like this photo')) . '"
				href="' . (($content['canLike']) ? (XenForo_Template_Helper_Core::link('gallery/photos/like', $content, array())) : ('javascript:void(0);')) . '"><i></i><span id="likeCount_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($content['likes'], ENT_QUOTES, 'UTF-8') . '</span></a>
		</li>
		<li class="commentAlbum">
			<a title="' . 'Leave a comment' . '" class="CommentLink control comment ' . (($content['comment_count']) ? ('hasComment') : ('')) . '" href="' . (($content['canComment']) ? (XenForo_Template_Helper_Core::link('gallery/photos', $content, array()) . '#commentPhoto' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8')) : ('javascript:void(0);')) . '"><i></i>' . htmlspecialchars($content['comment_count'], ENT_QUOTES, 'UTF-8') . '</a>
		</li>
		<li class="viewAlbum">
			<a><i></i>' . htmlspecialchars($content['view_count'], ENT_QUOTES, 'UTF-8') . '</a>
		</li>
	</ul>
</div>';
$__compilerVar66 .= $__compilerVar67;
unset($__compilerVar67);
$__compilerVar66 .= '
					';
}
else if ($content['content_type'] == ('video'))
{
$__compilerVar66 .= '
						';
$__compilerVar68 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar68 .= '
';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar68 .= '
	';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item_hover');
$__compilerVar68 .= '
';
}
$__compilerVar68 .= '

<div class="itemGallery photo video" id="content_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '">
	';
$imageHeight = '';
if ($content['medium_width'] < XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_itemwidth'))
{
$imageHeight .= htmlspecialchars($content['medium_height'], ENT_QUOTES, 'UTF-8');
}
else
{
$imageHeight .= ($content['medium_height'] * (XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_itemwidth') / $content['medium_width']));
}
$__compilerVar68 .= '
	';
$imageHeightReal = '';
if (($imageHeight - 110) < 0)
{
$imageHeightReal .= '110';
}
else
{
$imageHeightReal .= htmlspecialchars($imageHeight, ENT_QUOTES, 'UTF-8');
}
$__compilerVar68 .= '
	
	';
if ($content['canInlineMod'])
{
$__compilerVar68 .= '
		<div class="inlineMod">
			<input type="checkbox" value="' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-content-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#content_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select video' . ': \'' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '\'" name="sxgcontents" autocomplete="off" />
		</div>
	';
}
$__compilerVar68 .= '
	<div class="photoDate">
		';
if ($content['content_updated_date'])
{
$__compilerVar68 .= '
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_updated_date'],array(
'time' => htmlspecialchars($content['content_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
		';
}
else
{
$__compilerVar68 .= '
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => htmlspecialchars($content['content_date'], ENT_QUOTES, 'UTF-8')
))) . '
		';
}
$__compilerVar68 .= '
		<span class="bg">&nbsp;</span>
	</div>
	<div class="img" data-height="' . htmlspecialchars($content['medium_height'], ENT_QUOTES, 'UTF-8') . '" data-width="' . htmlspecialchars($content['medium_width'], ENT_QUOTES, 'UTF-8') . '"> 
		<a class="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay')) ? ('hasOverlay') : ('')) . '" href="' . XenForo_Template_Helper_Core::link('gallery/videos', $content, array()) . '"
			title="' . (($content['title']) ? (htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)))) . '"
			data-cacheOverlay="false" data-overlayOptions="{&quot;fixed&quot;:false}" style="width:220px; height: ' . htmlspecialchars($imageHeightReal, ENT_QUOTES, 'UTF-8') . 'px; max-height:' . htmlspecialchars($imageHeightReal, ENT_QUOTES, 'UTF-8') . 'px;">
			<img class="lazy" alt="' . (($content['title']) ? (htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)))) . '" title="' . (($content['title']) ? (htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)))) . '" data-src="' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" />
			<noscript><img alt="' . (($content['title']) ? (htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)))) . '" title="' . (($content['title']) ? (htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $content['description'],
'1' => '100'
)))) . '" src="' . htmlspecialchars($content['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" /></noscript>
			<i class="icon video"></i>
		</a>
	</div>
	';
if (!XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar68 .= '
		<div class="infoAlbum clearfix">
			<div class="titleAlbum">
				<h3 style="text-align: left;">
					<a href="' . XenForo_Template_Helper_Core::link('gallery/videos', $content, array()) . '">' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</a>
				</h3>
			</div>
			<div class="userInfo">
				<a title="' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '" href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $content, array())) : (XenForo_Template_Helper_Core::link('members', $content, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . '">' . htmlspecialchars($content['username'], ENT_QUOTES, 'UTF-8') . '</a>
				
			</div>
			<div class="dateInfo">
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_updated_date'],array(
'time' => htmlspecialchars($content['content_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
			</div>
			';
if ($content['isDeleted'])
{
$__compilerVar68 .= '
				<h3 class="deleteNotice">' . 'This photo has been deleted.' . '</h3>
			';
}
$__compilerVar68 .= '
			';
if ($content['isModerated'])
{
$__compilerVar68 .= '
				<h3 class="deleteNotice">' . 'Awaiting Approval' . '</h3>
			';
}
$__compilerVar68 .= '
		</div>
	';
}
$__compilerVar68 .= '
	<ul class="toolAlbum">
		<li class="likeAlbum">
			<a data-container="#likeCount_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="control ' . (($content['canLike']) ? ('like') : ('')) . ' ' . (($content['like_date']) ? ('active') : ('')) . '" title="' . (($content['canLike'] && $content['like_date']) ? ('Unlike this video') : ('Like this video')) . '"
				href="' . (($content['canLike']) ? (XenForo_Template_Helper_Core::link('gallery/videos/like', $content, array())) : ('javascript:void(0);')) . '"><i></i><span id="likeCount_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($content['likes'], ENT_QUOTES, 'UTF-8') . '</span></a>
		</li>
		<li class="commentAlbum">
			<a title="' . 'Leave a comment' . '" class="CommentLink control comment ' . (($content['comment_count']) ? ('hasComment') : ('')) . '" href="' . (($content['canComment']) ? (XenForo_Template_Helper_Core::link('gallery/videos', $content, array()) . '#commentVideo' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8')) : ('javascript:void(0);')) . '"><i></i>' . htmlspecialchars($content['comment_count'], ENT_QUOTES, 'UTF-8') . '</a>
		</li>
		<li class="viewAlbum">
			<a><i></i>' . htmlspecialchars($content['view_count'], ENT_QUOTES, 'UTF-8') . '</a>
		</li>
	</ul>
</div>';
$__compilerVar66 .= $__compilerVar68;
unset($__compilerVar68);
$__compilerVar66 .= '
					';
}
$__compilerVar66 .= '
				';
}
$__compilerVar66 .= '
				';
$__output .= $this->callTemplateHook('photo_list', $__compilerVar66, array());
unset($__compilerVar66);
$__output .= '
				<div id="infscr-loading">
					<img src="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_FFFFFF_facebook.gif" 
						alt="' . 'Loading Photos' . '......" />
					<div><em>' . 'Loading Photos' . '......</em></div>
				</div>
			';
}
else
{
$__output .= '
				<div class="noData">' . 'There is no photo in this album yet.' . '</div>
			';
}
$__output .= '
		</div>

		';
if ($inlineModOptions)
{
$__output .= '
			';
$__compilerVar69 = '';
$__compilerVar70 = '';
$__compilerVar70 .= 'InlineModControlsContent';
$__compilerVar71 = '';
$__compilerVar71 .= 'ModerationSelectContent';
$__compilerVar72 = '';
$__compilerVar72 .= 'Content Moderation';
$__compilerVar73 = '';
$__compilerVar73 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar73 .= '<option value="delete">' . 'Delete Contents' . '...</option>';
}
$__compilerVar73 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar73 .= '<option value="undelete">' . 'Undelete Contents' . '</option>';
}
$__compilerVar73 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar73 .= '<option value="approve">' . 'Approve Contents' . '</option>';
}
$__compilerVar73 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar73 .= '<option value="unapprove">' . 'Unapprove Contents' . '</option>';
}
$__compilerVar73 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar73 .= '<option value="move">' . 'Move Contents' . '...</option>';
}
$__compilerVar73 .= '
		<option value="deselect">' . 'Deselect Contents' . '</option>
	';
$__compilerVar74 = '';
$__compilerVar74 .= 'sonnb_xengallery_select_deselect_all_loaded_contents';
$__compilerVar75 = '';
$__compilerVar75 .= 'Contents';
$__compilerVar76 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_inline_mod_controls');
$__compilerVar76 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.inlinemod.js');
$__compilerVar76 .= '

<span id="' . (($__compilerVar70) ? (htmlspecialchars($__compilerVar70, ENT_QUOTES, 'UTF-8')) : ('InlineModControls')) . '" class="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Chọn tất cả' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar74, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Chuyển xuống' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Chuyển lên trên' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar75, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar76 .= '<input type="submit" class="button" value="' . 'Xóa' . '..." name="delete" />';
}
$__compilerVar76 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar76 .= '<input type="submit" class="button" value="' . 'Duyệt bài' . '" name="approve" />';
}
$__compilerVar76 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="' . (($__compilerVar71) ? (htmlspecialchars($__compilerVar71, ENT_QUOTES, 'UTF-8')) : ('ModerationSelect')) . '" class="textCtrl ModerationSelect">
				<option value="">' . 'Hành động khác' . '...</option>
				<optgroup label="' . 'Hành động Quản lý' . '">
					' . $__compilerVar73 . '
				</optgroup>
				<option value="closeOverlay">' . 'Đóng lớp phủ này' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Tới' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar69 .= $__compilerVar76;
unset($__compilerVar70, $__compilerVar71, $__compilerVar72, $__compilerVar73, $__compilerVar74, $__compilerVar75, $__compilerVar76);
$__output .= $__compilerVar69;
unset($__compilerVar69);
$__output .= '
		';
}
$__output .= '
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
	<div class="pageNavLinkGroup xengallery">
		' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($photosPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalPhotos, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'gallery/albums', $album, $pageNavParams, false, array())) . '
	</div>
		
	<div class="commentWrapper">
		<div class="cwHeader">
			<div class="cwhControls">
			</div>
		</div>
		<div class="commentContainer">
			';
$__compilerVar77 = '';
$__compilerVar77 .= 'album-' . htmlspecialchars($album['album_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar78 = '';
$__compilerVar78 .= '
					<br/>
					<span class="muted">
					';
if (!$xenOptions['sonnb_XG_disableLocation'] && $album['album_location'])
{
$__compilerVar78 .= '
						<br/>
						' . 'Taken at' . ' <a target="_blank" href="' . XenForo_Template_Helper_Core::link('gallery/locations', array(
'location_url' => $album['album_location']
), array()) . '">' . htmlspecialchars($album['album_location'], ENT_QUOTES, 'UTF-8') . '</a>
					';
}
$__compilerVar78 .= '
					';
if ($album['tagUsers'])
{
$__compilerVar78 .= '
						<br/>
						' . XenForo_Template_Helper_Core::callHelper('sonnb_xengallery_tag', array(
'0' => $album['tagUsers'],
'1' => XenForo_Template_Helper_Core::link('gallery/albums/tags', $album, array(), false)
)) . '
					';
}
$__compilerVar78 .= '
					</span>

					';
if ($fields)
{
$__compilerVar78 .= '
						<br/><br/>
						';
foreach ($fields AS $field)
{
$__compilerVar78 .= '
							';
$__compilerVar79 = '';
$__compilerVar80 = '';
$__compilerVar80 .= '
			';
if (is_array($field['fieldValueHtml']))
{
$__compilerVar80 .= '
				<ul>
				';
foreach ($field['fieldValueHtml'] AS $_fieldValueHtml)
{
$__compilerVar80 .= '
					<li>' . $_fieldValueHtml . '</li>
				';
}
$__compilerVar80 .= '
				</ul>
			';
}
else
{
$__compilerVar80 .= '
				' . $field['fieldValueHtml'] . '
			';
}
$__compilerVar80 .= '
		';
if (trim($__compilerVar80) !== '')
{
$__compilerVar79 .= '
	<dl class="ctrlUnit">
		<dt class="muted">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</dt> 
		<dd>' . $__compilerVar80 . '</dd>
	</dl>
';
}
unset($__compilerVar80);
$__compilerVar78 .= $__compilerVar79;
unset($__compilerVar79);
$__compilerVar78 .= '
						';
}
$__compilerVar78 .= '
					';
}
$__compilerVar78 .= '
				';
$__compilerVar81 = '';
$__compilerVar81 .= '

					<div class="messageMeta">
							<div class="privateControls">
								<a itemprop="contentURL" href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($album['album_date'],array(
'time' => '$album.album_date'
))) . '</a>
								';
$__compilerVar82 = '';
$__compilerVar82 .= '
								';
if ($album['canEdit'])
{
$__compilerVar82 .= '
									<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/edit', $album, array()) . '" class="item control edit NoOverlay"><span></span>' . 'Sửa' . '</a>
								';
}
$__compilerVar82 .= '
								';
if ($album['canDelete'])
{
$__compilerVar82 .= '
									<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/delete', $album, array()) . '" class="item OverlayTrigger control delete"><span></span>' . 'Xóa' . '</a>
								';
}
$__compilerVar82 .= '
								
								';
if ($album['canReport'])
{
$__compilerVar82 .= '
									<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/report', $album, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
								';
}
$__compilerVar82 .= '
								
								';
$__compilerVar81 .= $this->callTemplateHook('album_private_controls', $__compilerVar82, array(
'album' => $album
));
unset($__compilerVar82);
$__compilerVar81 .= '
							</div>
							
							';
$__compilerVar83 = '';
$__compilerVar83 .= '
									';
$__compilerVar84 = '';
$__compilerVar84 .= '
									';
if ($album['canWatch'])
{
$__compilerVar84 .= '
										<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/watch', $album, array()) . '" class="WatchLink item control ' . (($album['watch_date']) ? ('unwatch') : ('watch')) . '"><span></span><span class="WatchLabel">' . (($album['watch_date']) ? ('Unwatch') : ('Watch')) . '</span></a>
									';
}
$__compilerVar84 .= '
									';
if ($album['canLike'])
{
$__compilerVar84 .= '
										<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/like', $album, array()) . '" class="LikeLink item control ' . (($album['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-wp-' . htmlspecialchars($album['album_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($album['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
									';
}
$__compilerVar84 .= '
									';
if ($album['canComment'])
{
$__compilerVar84 .= '
										<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/comment', $album, array()) . '" data-commentArea="#commentAlbum"
											data-postParams="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => array(
'after' => $lastShownCommentDate
)
)), ENT_QUOTES, 'UTF-8', true) . '"
											class="XenGalleryCommentPoster item control postComment" ><span></span>' . 'Bình luận' . '</a>
									';
}
$__compilerVar84 .= '
									';
$__compilerVar83 .= $this->callTemplateHook('album_public_controls', $__compilerVar84, array(
'album' => $album
));
unset($__compilerVar84);
$__compilerVar83 .= '
								';
if (trim($__compilerVar83) !== '')
{
$__compilerVar81 .= '
								<div class="publicControls">
								' . $__compilerVar83 . '
								</div>
							';
}
unset($__compilerVar83);
$__compilerVar81 .= '
					</div>

					<form action="' . XenForo_Template_Helper_Core::link('gallery/inline-mod-comment/switch', false, array()) . '" method="post"
						class="InlineModForm"
						data-cookieName="sxgcomments"
						data-overlayId="InlineModOverlayComment"
						data-controls="#InlineModControlsComment"
						data-imodOptions="#ModerationSelectComment">
						
						<ol class="messageResponse" style="max-width: 100%"  itemscope="itemscope" itemtype="http://schema.org/UserComments">
							';
if ($album['likes'])
{
$__compilerVar81 .= '
								<meta itemprop="interactionCount" content="UserLikes:' . htmlspecialchars($album['likes'], ENT_QUOTES, 'UTF-8') . '"/>
							';
}
$__compilerVar81 .= '		
							<li id="likes-wp-' . htmlspecialchars($album['album_id'], ENT_QUOTES, 'UTF-8') . '">
								';
if ($album['likes'])
{
$__compilerVar81 .= '
									';
$__compilerVar85 = '';
$__compilerVar85 .= XenForo_Template_Helper_Core::link('gallery/albums/likes', $album, array());
$__compilerVar86 = '';
if ($album['likes'])
{
$__compilerVar86 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar86 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($album['likes'],$__compilerVar85,$album['like_date'],$album['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar81 .= $__compilerVar86;
unset($__compilerVar85, $__compilerVar86);
$__compilerVar81 .= '
								';
}
$__compilerVar81 .= '
							</li>

							';
if ($album['comments'])
{
$__compilerVar81 .= '
								<meta itemprop="interactionCount" content="UserComments:' . htmlspecialchars($album['comment_count'], ENT_QUOTES, 'UTF-8') . '"/>
								';
if ($album['comment_count'] > $commentOnLoad)
{
$__compilerVar81 .= '
									';
$__compilerVar87 = '';
$__compilerVar87 .= '<li class="commentMore secondaryContent">
	<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/comments', $album, array()) . '"
		class="XenGalleryCommentLoader"
		data-loadParams="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => array(
'before' => $firstShownCommentDate
)
)), ENT_QUOTES, 'UTF-8', true) . '">' . 'View previous comments' . '...</a>
	<span class="muted">' . '' . htmlspecialchars($commentShownCount, ENT_QUOTES, 'UTF-8') . ' of ' . htmlspecialchars($album['comment_count'], ENT_QUOTES, 'UTF-8') . '' . '</span>
</li>';
$__compilerVar81 .= $__compilerVar87;
unset($__compilerVar87);
$__compilerVar81 .= '
								';
}
$__compilerVar81 .= '

								';
foreach ($album['comments'] AS $comment)
{
$__compilerVar81 .= '
									';
$__compilerVar88 = '';
$__compilerVar88 .= '<li id="comment_' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="comment secondaryContent ' . (($comment['isIgnored']) ? ('ignored') : ('')) . '" itemscope="itemscope" itemtype="http://schema.org/Comment" itemprop="comment">
	
	<meta itemprop="commentTime" content="' . XenForo_Template_Helper_Core::datetime($comment['comment_date'], '') . '">	
	<meta itemprop="creator" content="' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($comment,(true),array(
'user' => '$comment',
'size' => 's',
'img' => 'true'
),'')) . '

	<div class="commentInfo">
		';
$__compilerVar89 = '';
$__compilerVar89 .= '
					';
if ($comment['isDeleted'])
{
$__compilerVar89 .= '
						<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
					';
}
else if ($comment['isModerated'])
{
$__compilerVar89 .= '
						<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
					';
}
$__compilerVar89 .= '
					';
if ($comment['isIgnored'])
{
$__compilerVar89 .= '
						<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="jsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
					';
}
$__compilerVar89 .= '
				';
if (trim($__compilerVar89) !== '')
{
$__compilerVar88 .= '
			<ul class="messageNotices">
				' . $__compilerVar89 . '
			</ul>
		';
}
unset($__compilerVar89);
$__compilerVar88 .= '
		<div class="commentContent">
			<a href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $comment, array())) : (XenForo_Template_Helper_Core::link('members', $comment, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . ' poster">' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '</a>
			<article><blockquote itemprop="commentText">' . $comment['message'] . '</blockquote></article>
		</div>
		<div class="messageMeta">
			<div class="privateControls">
				';
if ($comment['canInlineMod'])
{
$__compilerVar88 .= '
					<input type="checkbox" value="' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" id="inlineModCheck-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#comment_' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select comment id: ' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '' . '" name="sxgcomments" />
				';
}
$__compilerVar88 .= '
				<a href="' . XenForo_Template_Helper_Core::link('gallery/comments', $comment, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($comment['comment_date'],array(
'time' => '$comment.comment_date'
))) . '</a>
				';
if ($comment['canEdit'])
{
$__compilerVar88 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/edit', $comment, array()) . '" class="item control edit"><span></span>' . 'Sửa' . '</a>
				';
}
$__compilerVar88 .= '
				';
if ($comment['canDelete'])
{
$__compilerVar88 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/delete', $comment, array()) . '" class="item control delete"><span></span>' . 'Xóa' . '</a>
				';
}
$__compilerVar88 .= '
				
				';
if ($comment['canWarn'])
{
$__compilerVar88 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $comment, array(
'content_type' => 'sonnb_xengallery_comment',
'content_id' => $comment['comment_id']
)) . '" class="item control warn"><span></span>' . 'Cảnh cáo' . '</a>
				';
}
else if ($comment['warning_id'] && $canViewWarnings)
{
$__compilerVar88 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $comment, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar88 .= '
				';
if ($comment['canReport'])
{
$__compilerVar88 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/report', $comment, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
				';
}
$__compilerVar88 .= '
			</div>
			
			';
$__compilerVar90 = '';
$__compilerVar90 .= '
					';
if ($comment['canLike'])
{
$__compilerVar90 .= '
						<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/like', $comment, array()) . '" class="LikeLink item control ' . (($comment['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($comment['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
					';
}
$__compilerVar90 .= '
					';
if ($comment['canComment'])
{
$__compilerVar90 .= '
						<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/comment', $comment, array()) . '" class="CommentPoster item control postComment" data-commentArea="#commentSubmit-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Bình luận' . '</a>
					';
}
$__compilerVar90 .= '
				';
if (trim($__compilerVar90) !== '')
{
$__compilerVar88 .= '
				<div class="publicControls">
				' . $__compilerVar90 . '
				</div>
			';
}
unset($__compilerVar90);
$__compilerVar88 .= '
		</div>
		<div id="likes-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '">
			';
if ($comment['likes'])
{
$__compilerVar88 .= '
				';
$__compilerVar91 = '';
$__compilerVar91 .= XenForo_Template_Helper_Core::link('gallery/comments/likes', $comment, array());
$__compilerVar92 = '';
if ($comment['likes'])
{
$__compilerVar92 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar92 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($comment['likes'],$__compilerVar91,$comment['like_date'],$comment['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar88 .= $__compilerVar92;
unset($__compilerVar91, $__compilerVar92);
$__compilerVar88 .= '
			';
}
$__compilerVar88 .= '
		</div>
	</div>
</li>';
$__compilerVar81 .= $__compilerVar88;
unset($__compilerVar88);
$__compilerVar81 .= '
								';
}
$__compilerVar81 .= '

							';
}
$__compilerVar81 .= '

							';
if ($album['canComment'])
{
$__compilerVar81 .= '
								<li id="commentAlbum" class="comment secondaryContent">
									' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true'
),'')) . '
									<div class="elements">
										<textarea name="message" rows="2" class="textCtrl Elastic UserTagger"></textarea>
										<div class="submit"><input type="submit" class="button primary" value="' . 'Đăng bình luận' . '" /></div>
									</div>
								</li>
							';
}
$__compilerVar81 .= '

						</ol>
						';
if ($inlineModOptions)
{
$__compilerVar81 .= '
							';
$__compilerVar93 = '';
$__compilerVar94 = '';
$__compilerVar94 .= 'InlineModControlsComment';
$__compilerVar95 = '';
$__compilerVar95 .= 'ModerationSelectComment';
$__compilerVar96 = '';
$__compilerVar96 .= 'Comment Moderation';
$__compilerVar97 = '';
$__compilerVar97 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar97 .= '<option value="delete">' . 'Delete Comments' . '...</option>';
}
$__compilerVar97 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar97 .= '<option value="undelete">' . 'Undelete Comments' . '</option>';
}
$__compilerVar97 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar97 .= '<option value="approve">' . 'Approve Comments' . '</option>';
}
$__compilerVar97 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar97 .= '<option value="unapprove">' . 'Unapprove Comments' . '</option>';
}
$__compilerVar97 .= '
		<option value="deselect">' . 'Deselect Comments' . '</option>
	';
$__compilerVar98 = '';
$__compilerVar98 .= 'Select / Deselect all loaded comments.';
$__compilerVar99 = '';
$__compilerVar99 .= 'Select comments';
$__compilerVar100 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_inline_mod_controls');
$__compilerVar100 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.inlinemod.js');
$__compilerVar100 .= '

<span id="' . (($__compilerVar94) ? (htmlspecialchars($__compilerVar94, ENT_QUOTES, 'UTF-8')) : ('InlineModControls')) . '" class="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Chọn tất cả' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar98, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Chuyển xuống' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Chuyển lên trên' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar99, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar100 .= '<input type="submit" class="button" value="' . 'Xóa' . '..." name="delete" />';
}
$__compilerVar100 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar100 .= '<input type="submit" class="button" value="' . 'Duyệt bài' . '" name="approve" />';
}
$__compilerVar100 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="' . (($__compilerVar95) ? (htmlspecialchars($__compilerVar95, ENT_QUOTES, 'UTF-8')) : ('ModerationSelect')) . '" class="textCtrl ModerationSelect">
				<option value="">' . 'Hành động khác' . '...</option>
				<optgroup label="' . 'Hành động Quản lý' . '">
					' . $__compilerVar97 . '
				</optgroup>
				<option value="closeOverlay">' . 'Đóng lớp phủ này' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Tới' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar93 .= $__compilerVar100;
unset($__compilerVar94, $__compilerVar95, $__compilerVar96, $__compilerVar97, $__compilerVar98, $__compilerVar99, $__compilerVar100);
$__compilerVar81 .= $__compilerVar93;
unset($__compilerVar93);
$__compilerVar81 .= '
						';
}
$__compilerVar81 .= '
						
						<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
					</form>
				';
$__compilerVar101 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar101 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar101 .= '

<div class="commentWrapper">
	<div id="' . htmlspecialchars($__compilerVar77, ENT_QUOTES, 'UTF-8') . '" class="messageSimple ' . (($album['isDeleted']) ? ('deleted') : ('')) . ' ' . (($album['is_admin'] OR $album['is_moderator']) ? ('staff') : ('')) . ' ' . (($album['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($album['username'], ENT_QUOTES, 'UTF-8') . '">

		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($album,false,array(
'user' => '$message',
'size' => 's'
),'')) . '
		
		<div class="messageInfo">
			
			';
$__compilerVar102 = '';
$__compilerVar102 .= '
						';
$__compilerVar103 = '';
$__compilerVar103 .= '
							';
if ($album['warning_message'])
{
$__compilerVar103 .= '
								<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($album['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
							';
}
$__compilerVar103 .= '
							';
if ($album['isIgnored'])
{
$__compilerVar103 .= '
								<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="jsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
							';
}
$__compilerVar103 .= '
						';
$__compilerVar102 .= $this->callTemplateHook('message_simple_notices', $__compilerVar103, array(
'message' => $album
));
unset($__compilerVar103);
$__compilerVar102 .= '
					';
if (trim($__compilerVar102) !== '')
{
$__compilerVar101 .= '
				<ul class="messageNotices">
					' . $__compilerVar102 . '
				</ul>
			';
}
unset($__compilerVar102);
$__compilerVar101 .= '

			<div class="messageContent">
				<a href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $album, array())) : (XenForo_Template_Helper_Core::link('members', $album, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . ' poster">' . htmlspecialchars($album['username'], ENT_QUOTES, 'UTF-8') . '</a>
				<article><blockquote class="ugc baseHtml">' . $album['descriptionHtml'] . '</blockquote></article>
				' . $__compilerVar78 . '
			</div>

			' . $__compilerVar81 . '
		</div>
	</div>
</div>';
$__output .= $__compilerVar101;
unset($__compilerVar77, $__compilerVar78, $__compilerVar81, $__compilerVar101);
$__output .= '
			<div class="commentControls">
				';
if ($album['canEdit'])
{
$__output .= '
				<h4>' . 'Privacy' . '</h4>
				<div class="albumInfo">
					<div class="albumPrivacy">
						<span class="muted">' . htmlspecialchars($album['allow_view_html'], ENT_QUOTES, 'UTF-8') . '</span> <a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/albums/privacy', $album, array()) . '">' . 'Sửa' . '</a>
					</div>
				</div>
				';
}
$__output .= '	
				';
$__compilerVar104 = '';
$__compilerVar104 .= '
						';
if ($album['albumStreams'] || ($album['canEdit'] && !$album['albumStreams']))
{
$__compilerVar104 .= '
						<div class="streamList">
							<ul>
								';
if ($album['albumStreams'])
{
$__compilerVar104 .= '	
								';
foreach ($album['albumStreams'] AS $stream)
{
$__compilerVar104 .= '
									';
$__compilerVar105 = '';
$__compilerVar105 .= '<li id="stream__' . htmlspecialchars($stream, ENT_QUOTES, 'UTF-8') . '">
	<span class="streamItem">
		<a href="' . XenForo_Template_Helper_Core::link('gallery/streams', array(
'stream_name' => $stream
), array()) . '">' . htmlspecialchars($stream, ENT_QUOTES, 'UTF-8') . '</a>
		';
if ($album['canEdit'])
{
$__compilerVar105 .= '
			<a class="delete" title="' . 'Xóa' . '" href="' . XenForo_Template_Helper_Core::link('gallery/albums/stream-delete', $album, array(
'stream_name' => $stream
)) . '">[x]</a>
		';
}
$__compilerVar105 .= '
	</span>
</li>';
$__compilerVar104 .= $__compilerVar105;
unset($__compilerVar105);
$__compilerVar104 .= '
								';
}
$__compilerVar104 .= '
								';
}
$__compilerVar104 .= '	
							</ul>
						</div>	
						';
}
$__compilerVar104 .= '					
						';
if ($album['canEdit'])
{
$__compilerVar104 .= '
						<form class="xenForm" method="POST" action="' . XenForo_Template_Helper_Core::link('gallery/albums/stream-add', $album, array()) . '">
							<input id="addStream" data-acUrl="' . XenForo_Template_Helper_Core::link('gallery/streams/find', '', array(
'_xfResponseType' => 'json'
)) . '" class="textCtrl AutoComplete" type="text" name="stream_name" value="" placeholder="" />
							<p class="explain muted">' . 'Separate each stream with a comma: my family, my car, etc.' . '</p>									
							<input type="submit" value="' . 'Add Streams' . '" name="submit" class="primary button" />
							<input type="hidden" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" name="_xfToken">
						</form>
						';
}
$__compilerVar104 .= '
					';
if (trim($__compilerVar104) !== '')
{
$__output .= '
				<h4 class="streamingHeader">' . 'Streams' . ' ';
if ($album['canEdit'])
{
$__output .= '<a class="editToggle" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#">' . 'Add Streams' . '</a>';
}
$__output .= '</h4>
				<div class="streaming streamingEditor">
					' . $__compilerVar104 . '
				</div>
				';
}
unset($__compilerVar104);
$__output .= '
				
				';
$__compilerVar106 = '';
$__compilerVar106 .= '
								<a rel="nofollow" href="' . XenForo_Template_Helper_Core::link('gallery/albums/share', $album, array()) . '" class="OverlayTrigger item control share" title="' . 'Share this album with your friends.' . '">' . 'Share' . '</a>
								';
if ($album['canEdit'])
{
$__compilerVar106 .= '
									<a class="item control people quickEdit" data-quickForm="formTag" data-reset="true" href="' . XenForo_Template_Helper_Core::link('gallery/albums/tag', $album, array()) . '" data-cacheOverlay="false"><i></i><span>' . 'Tag People' . '</span></a>
									';
$__compilerVar107 = '';
$__compilerVar107 .= 'quickEditForm';
$__compilerVar108 = '';
$__compilerVar108 .= 'formTag';
$__compilerVar109 = '';
$__compilerVar109 .= '<form action="' . XenForo_Template_Helper_Core::link('gallery/albums/tag', $album, array()) . '" method="post"
	class="xenForm ' . (($__compilerVar107) ? (htmlspecialchars($__compilerVar107, ENT_QUOTES, 'UTF-8')) : ('AutoValidator')) . ' formOverlay" ' . (($__compilerVar108) ? ('id="' . htmlspecialchars($__compilerVar108, ENT_QUOTES, 'UTF-8') . '"') : ('')) . ' 
	data-redirect="on">
	
	<dl class="ctrlUnit surplusLabel fullWidth">
		<dt><label for="ctrl_with">' . 'Tag People' . ':</label></dt>
		<dd>
			<input type="text" name="album_with" class="textCtrl AutoComplete" id="ctrl_with" autofocus="true"
				placeholder="' . 'Who was there with you?' . '..." value="' . (($album['album_people']) ? (htmlspecialchars($album['album_people'], ENT_QUOTES, 'UTF-8')) : ('')) . '"/>
			<p class="explain">' . 'Dãn cách tên bằng dấu phẩy(,).' . '</p>
		</dd>
	</dl>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Lưu' . '" accesskey="s" class="button primary" />
			<input type="reset" value="' . 'Hủy bỏ' . '" accesskey="d" class="button primary closer" />
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
$__compilerVar106 .= $__compilerVar109;
unset($__compilerVar107, $__compilerVar108, $__compilerVar109);
$__compilerVar106 .= '
								';
}
$__compilerVar106 .= '
								';
if (!$xenOptions['sonnb_XG_disableLocation'] && $album['canEdit'])
{
$__compilerVar106 .= '
									<a class="item control location OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/albums/location', $album, array()) . '" data-cacheOverlay="false" data-overlayOptions="{&quot;fixed&quot;:false}"><i></i><span>' . 'Edit Location' . '</span></a>
								';
}
$__compilerVar106 .= '
							';
if (trim($__compilerVar106) !== '')
{
$__output .= '
					<h4>' . 'Actions' . '</h4>
					<div class="photoControls">
						<div class="iconActionLinks">
							' . $__compilerVar106 . '
						</div>
						';
if ($album['canChangeOwner'])
{
$__output .= '<a class="item OverlayTrigger control owner" href="' . XenForo_Template_Helper_Core::link('gallery/albums/owner', $album, array()) . '"><i></i><span>' . 'Change Album\'s Owner' . '</span></a>';
}
$__output .= '
						';
if ($album['canDelete'])
{
$__output .= '<a class="item OverlayTrigger control delete" href="' . XenForo_Template_Helper_Core::link('gallery/albums/delete', $album, array()) . '"><i></i><span>' . 'Delete This Album' . '</span></a>';
}
$__output .= '
					</div>
				';
}
unset($__compilerVar106);
$__output .= '
			</div>
		</div>
	</div>
</div>


';
$__compilerVar110 = '';
$__compilerVar110 .= XenForo_Template_Helper_Core::link('canonical:gallery/albums', $album, array());
$__compilerVar111 = '';
$__compilerVar112 = '';
$__compilerVar112 .= '
			';
$__compilerVar113 = '';
$__compilerVar113 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar113 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar110, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar113 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar113 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar110, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar113 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar113 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar113 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar110, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar113 .= '
			';
$__compilerVar112 .= $this->callTemplateHook('share_page_options', $__compilerVar113, array());
unset($__compilerVar113);
$__compilerVar112 .= '
		';
if (trim($__compilerVar112) !== '')
{
$__compilerVar111 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar111 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Chia sẻ trang này' . '</h3>
		' . $__compilerVar112 . '
	</div>
';
}
unset($__compilerVar112);
$__output .= $__compilerVar111;
unset($__compilerVar110, $__compilerVar111);
$__output .= '
';
$__compilerVar114 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar114, array());
unset($__compilerVar114);
