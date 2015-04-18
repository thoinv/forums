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
$__compilerVar1 = '';
$__compilerVar1 .= XenForo_Template_Helper_Core::link('canonical:gallery/albums', $album, array());
$__compilerVar2 = '';
$__compilerVar2 .= 'Album' . ': ' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => $album['title']
));
$__compilerVar3 = '';
$__compilerVar3 .= '
				';
if ($album['photos'])
{
$__compilerVar3 .= '
					';
foreach ($album['photos'] AS $___photo)
{
$__compilerVar3 .= '
						<meta property="og:image" content="' . XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => $___photo['photoUrl'],
'1' => 'true'
)) . '" />
					';
}
$__compilerVar3 .= '
				';
}
$__compilerVar3 .= '
				<meta property="og:description" content="' . XenForo_Template_Helper_Core::callHelper('striphtml', array(
'0' => $album['description']
)) . '" />
			';
$__compilerVar4 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar4 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar4 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar4 .= '
	<meta property="og:image" content="';
$__compilerVar5 = '';
$__compilerVar5 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar4 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar5, array());
unset($__compilerVar5);
$__compilerVar4 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar1 . '" />
	<meta property="og:title" content="' . $__compilerVar2 . '" />
	';
if ($description)
{
$__compilerVar4 .= '<meta property="og:description" content="' . $description . '" />';
}
$__compilerVar4 .= '
	' . $__compilerVar3 . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar4 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar4 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar4 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar4 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar4;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3, $__compilerVar4);
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
$__compilerVar6 = '';
if ($album['photos'])
{
$__compilerVar6 .= '
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
$__compilerVar6 .= '
';
}
$__output .= $__compilerVar6;
unset($__compilerVar6);
$__output .= '

';
$__extraData['searchBar']['photo'] = '';
$__compilerVar7 = '';
$__compilerVar7 .= '<label><input type="checkbox" name="type[sonnb_xengallery_photo][null]" value="" checked="checked" id="search_bar_photo" /> ' . 'Search photos only' . '</label>

';
if ($xenOptions['sonnbXG_advSearch'] && !$xenOptions['sonnb_XG_disableCamera'])
{
$__compilerVar7 .= '
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
$__extraData['searchBar']['photo'] .= $__compilerVar7;
unset($__compilerVar7);
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
$promoteButton .= '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/edit', $album, array()) . '" class="callToAction"><span>' . 'Edit' . '</span></a>';
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
$__compilerVar8 = '';
$__output .= $this->callTemplateHook('ad_album_view_above_photo_list', $__compilerVar8, array());
unset($__compilerVar8);
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
$__compilerVar9 = '';
$__compilerVar9 .= '
				';
foreach ($contents AS $content)
{
$__compilerVar9 .= '
					';
if ($content['content_type'] == ('photo'))
{
$__compilerVar9 .= '
						';
$__compilerVar10 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar10 .= '
';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar10 .= '
	';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item_hover');
$__compilerVar10 .= '
';
}
$__compilerVar10 .= '

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
$__compilerVar10 .= '
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
$__compilerVar10 .= '
	
	';
if ($content['canInlineMod'])
{
$__compilerVar10 .= '
		<div class="inlineMod">
			<input type="checkbox" value="' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-content-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#content_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select photo' . ': \'' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '\'" name="sxgcontents" autocomplete="off" />
		</div>
	';
}
$__compilerVar10 .= '
	';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar10 .= '
		<div class="photoDate">
			';
if ($content['content_updated_date'])
{
$__compilerVar10 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_updated_date'],array(
'time' => htmlspecialchars($content['content_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else
{
$__compilerVar10 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => htmlspecialchars($content['content_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
$__compilerVar10 .= '
			<span class="bg">&nbsp;</span>
		</div>
	';
}
$__compilerVar10 .= '
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
$__compilerVar10 .= '<i class="icon gif"></i>';
}
$__compilerVar10 .= '
		</a>
	</div>
	';
if (!XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar10 .= '
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
$__compilerVar10 .= '
				<h3 class="deleteNotice">' . 'This photo has been deleted.' . '</h3>
			';
}
$__compilerVar10 .= '
			';
if ($content['isModerated'])
{
$__compilerVar10 .= '
				<h3 class="deleteNotice">' . 'Awaiting Approval' . '</h3>
			';
}
$__compilerVar10 .= '
		</div>
	';
}
$__compilerVar10 .= '
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
$__compilerVar9 .= $__compilerVar10;
unset($__compilerVar10);
$__compilerVar9 .= '
					';
}
else if ($content['content_type'] == ('video'))
{
$__compilerVar9 .= '
						';
$__compilerVar11 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar11 .= '
';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar11 .= '
	';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item_hover');
$__compilerVar11 .= '
';
}
$__compilerVar11 .= '

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
$__compilerVar11 .= '
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
$__compilerVar11 .= '
	
	';
if ($content['canInlineMod'])
{
$__compilerVar11 .= '
		<div class="inlineMod">
			<input type="checkbox" value="' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-content-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#content_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select video' . ': \'' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '\'" name="sxgcontents" autocomplete="off" />
		</div>
	';
}
$__compilerVar11 .= '
	<div class="photoDate">
		';
if ($content['content_updated_date'])
{
$__compilerVar11 .= '
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_updated_date'],array(
'time' => htmlspecialchars($content['content_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
		';
}
else
{
$__compilerVar11 .= '
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => htmlspecialchars($content['content_date'], ENT_QUOTES, 'UTF-8')
))) . '
		';
}
$__compilerVar11 .= '
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
$__compilerVar11 .= '
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
$__compilerVar11 .= '
				<h3 class="deleteNotice">' . 'This photo has been deleted.' . '</h3>
			';
}
$__compilerVar11 .= '
			';
if ($content['isModerated'])
{
$__compilerVar11 .= '
				<h3 class="deleteNotice">' . 'Awaiting Approval' . '</h3>
			';
}
$__compilerVar11 .= '
		</div>
	';
}
$__compilerVar11 .= '
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
$__compilerVar9 .= $__compilerVar11;
unset($__compilerVar11);
$__compilerVar9 .= '
					';
}
$__compilerVar9 .= '
				';
}
$__compilerVar9 .= '
				';
$__output .= $this->callTemplateHook('photo_list', $__compilerVar9, array());
unset($__compilerVar9);
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
$__compilerVar12 = '';
$__compilerVar13 = '';
$__compilerVar13 .= 'InlineModControlsContent';
$__compilerVar14 = '';
$__compilerVar14 .= 'ModerationSelectContent';
$__compilerVar15 = '';
$__compilerVar15 .= 'Content Moderation';
$__compilerVar16 = '';
$__compilerVar16 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar16 .= '<option value="delete">' . 'Delete Contents' . '...</option>';
}
$__compilerVar16 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar16 .= '<option value="undelete">' . 'Undelete Contents' . '</option>';
}
$__compilerVar16 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar16 .= '<option value="approve">' . 'Approve Contents' . '</option>';
}
$__compilerVar16 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar16 .= '<option value="unapprove">' . 'Unapprove Contents' . '</option>';
}
$__compilerVar16 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar16 .= '<option value="move">' . 'Move Contents' . '...</option>';
}
$__compilerVar16 .= '
		<option value="deselect">' . 'Deselect Contents' . '</option>
	';
$__compilerVar17 = '';
$__compilerVar17 .= 'sonnb_xengallery_select_deselect_all_loaded_contents';
$__compilerVar18 = '';
$__compilerVar18 .= 'Contents';
$__compilerVar19 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_inline_mod_controls');
$__compilerVar19 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.inlinemod.js');
$__compilerVar19 .= '

<span id="' . (($__compilerVar13) ? (htmlspecialchars($__compilerVar13, ENT_QUOTES, 'UTF-8')) : ('InlineModControls')) . '" class="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Select All' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar17, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Move down' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Move up' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar18, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar19 .= '<input type="submit" class="button" value="' . 'Delete' . '..." name="delete" />';
}
$__compilerVar19 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar19 .= '<input type="submit" class="button" value="' . 'Approve' . '" name="approve" />';
}
$__compilerVar19 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="' . (($__compilerVar14) ? (htmlspecialchars($__compilerVar14, ENT_QUOTES, 'UTF-8')) : ('ModerationSelect')) . '" class="textCtrl ModerationSelect">
				<option value="">' . 'Other Action' . '...</option>
				<optgroup label="' . 'Moderation Actions' . '">
					' . $__compilerVar16 . '
				</optgroup>
				<option value="closeOverlay">' . 'Close This Overlay' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Go' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar12 .= $__compilerVar19;
unset($__compilerVar13, $__compilerVar14, $__compilerVar15, $__compilerVar16, $__compilerVar17, $__compilerVar18, $__compilerVar19);
$__output .= $__compilerVar12;
unset($__compilerVar12);
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
$__compilerVar20 = '';
$__compilerVar20 .= 'album-' . htmlspecialchars($album['album_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar21 = '';
$__compilerVar21 .= '
					<br/>
					<span class="muted">
					';
if (!$xenOptions['sonnb_XG_disableLocation'] && $album['album_location'])
{
$__compilerVar21 .= '
						<br/>
						' . 'Taken at' . ' <a target="_blank" href="' . XenForo_Template_Helper_Core::link('gallery/locations', array(
'location_url' => $album['album_location']
), array()) . '">' . htmlspecialchars($album['album_location'], ENT_QUOTES, 'UTF-8') . '</a>
					';
}
$__compilerVar21 .= '
					';
if ($album['tagUsers'])
{
$__compilerVar21 .= '
						<br/>
						' . XenForo_Template_Helper_Core::callHelper('sonnb_xengallery_tag', array(
'0' => $album['tagUsers'],
'1' => XenForo_Template_Helper_Core::link('gallery/albums/tags', $album, array(), false)
)) . '
					';
}
$__compilerVar21 .= '
					</span>

					';
if ($fields)
{
$__compilerVar21 .= '
						<br/><br/>
						';
foreach ($fields AS $field)
{
$__compilerVar21 .= '
							';
$__compilerVar22 = '';
$__compilerVar23 = '';
$__compilerVar23 .= '
			';
if (is_array($field['fieldValueHtml']))
{
$__compilerVar23 .= '
				<ul>
				';
foreach ($field['fieldValueHtml'] AS $_fieldValueHtml)
{
$__compilerVar23 .= '
					<li>' . $_fieldValueHtml . '</li>
				';
}
$__compilerVar23 .= '
				</ul>
			';
}
else
{
$__compilerVar23 .= '
				' . $field['fieldValueHtml'] . '
			';
}
$__compilerVar23 .= '
		';
if (trim($__compilerVar23) !== '')
{
$__compilerVar22 .= '
	<dl class="ctrlUnit">
		<dt class="muted">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</dt> 
		<dd>' . $__compilerVar23 . '</dd>
	</dl>
';
}
unset($__compilerVar23);
$__compilerVar21 .= $__compilerVar22;
unset($__compilerVar22);
$__compilerVar21 .= '
						';
}
$__compilerVar21 .= '
					';
}
$__compilerVar21 .= '
				';
$__compilerVar24 = '';
$__compilerVar24 .= '

					<div class="messageMeta">
							<div class="privateControls">
								<a itemprop="contentURL" href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($album['album_date'],array(
'time' => '$album.album_date'
))) . '</a>
								';
$__compilerVar25 = '';
$__compilerVar25 .= '
								';
if ($album['canEdit'])
{
$__compilerVar25 .= '
									<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/edit', $album, array()) . '" class="item control edit NoOverlay"><span></span>' . 'Edit' . '</a>
								';
}
$__compilerVar25 .= '
								';
if ($album['canDelete'])
{
$__compilerVar25 .= '
									<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/delete', $album, array()) . '" class="item OverlayTrigger control delete"><span></span>' . 'Delete' . '</a>
								';
}
$__compilerVar25 .= '
								
								';
if ($album['canReport'])
{
$__compilerVar25 .= '
									<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/report', $album, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Report' . '</a>
								';
}
$__compilerVar25 .= '
								
								';
$__compilerVar24 .= $this->callTemplateHook('album_private_controls', $__compilerVar25, array(
'album' => $album
));
unset($__compilerVar25);
$__compilerVar24 .= '
							</div>
							
							';
$__compilerVar26 = '';
$__compilerVar26 .= '
									';
$__compilerVar27 = '';
$__compilerVar27 .= '
									';
if ($album['canWatch'])
{
$__compilerVar27 .= '
										<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/watch', $album, array()) . '" class="WatchLink item control ' . (($album['watch_date']) ? ('unwatch') : ('watch')) . '"><span></span><span class="WatchLabel">' . (($album['watch_date']) ? ('Unwatch') : ('Watch')) . '</span></a>
									';
}
$__compilerVar27 .= '
									';
if ($album['canLike'])
{
$__compilerVar27 .= '
										<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/like', $album, array()) . '" class="LikeLink item control ' . (($album['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-wp-' . htmlspecialchars($album['album_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($album['like_date']) ? ('Unlike') : ('Like')) . '</span></a>
									';
}
$__compilerVar27 .= '
									';
if ($album['canComment'])
{
$__compilerVar27 .= '
										<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/comment', $album, array()) . '" data-commentArea="#commentAlbum"
											data-postParams="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => array(
'after' => $lastShownCommentDate
)
)), ENT_QUOTES, 'UTF-8', true) . '"
											class="XenGalleryCommentPoster item control postComment" ><span></span>' . 'Comment' . '</a>
									';
}
$__compilerVar27 .= '
									';
$__compilerVar26 .= $this->callTemplateHook('album_public_controls', $__compilerVar27, array(
'album' => $album
));
unset($__compilerVar27);
$__compilerVar26 .= '
								';
if (trim($__compilerVar26) !== '')
{
$__compilerVar24 .= '
								<div class="publicControls">
								' . $__compilerVar26 . '
								</div>
							';
}
unset($__compilerVar26);
$__compilerVar24 .= '
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
$__compilerVar24 .= '
								<meta itemprop="interactionCount" content="UserLikes:' . htmlspecialchars($album['likes'], ENT_QUOTES, 'UTF-8') . '"/>
							';
}
$__compilerVar24 .= '		
							<li id="likes-wp-' . htmlspecialchars($album['album_id'], ENT_QUOTES, 'UTF-8') . '">
								';
if ($album['likes'])
{
$__compilerVar24 .= '
									';
$__compilerVar28 = '';
$__compilerVar28 .= XenForo_Template_Helper_Core::link('gallery/albums/likes', $album, array());
$__compilerVar29 = '';
if ($album['likes'])
{
$__compilerVar29 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar29 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($album['likes'],$__compilerVar28,$album['like_date'],$album['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar24 .= $__compilerVar29;
unset($__compilerVar28, $__compilerVar29);
$__compilerVar24 .= '
								';
}
$__compilerVar24 .= '
							</li>

							';
if ($album['comments'])
{
$__compilerVar24 .= '
								<meta itemprop="interactionCount" content="UserComments:' . htmlspecialchars($album['comment_count'], ENT_QUOTES, 'UTF-8') . '"/>
								';
if ($album['comment_count'] > $commentOnLoad)
{
$__compilerVar24 .= '
									';
$__compilerVar30 = '';
$__compilerVar30 .= '<li class="commentMore secondaryContent">
	<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/comments', $album, array()) . '"
		class="XenGalleryCommentLoader"
		data-loadParams="' . htmlspecialchars(XenForo_Template_Helper_Core::callHelper('json', array(
'0' => array(
'before' => $firstShownCommentDate
)
)), ENT_QUOTES, 'UTF-8', true) . '">' . 'View previous comments' . '...</a>
	<span class="muted">' . '' . htmlspecialchars($commentShownCount, ENT_QUOTES, 'UTF-8') . ' of ' . htmlspecialchars($album['comment_count'], ENT_QUOTES, 'UTF-8') . '' . '</span>
</li>';
$__compilerVar24 .= $__compilerVar30;
unset($__compilerVar30);
$__compilerVar24 .= '
								';
}
$__compilerVar24 .= '

								';
foreach ($album['comments'] AS $comment)
{
$__compilerVar24 .= '
									';
$__compilerVar31 = '';
$__compilerVar31 .= '<li id="comment_' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="comment secondaryContent ' . (($comment['isIgnored']) ? ('ignored') : ('')) . '" itemscope="itemscope" itemtype="http://schema.org/Comment" itemprop="comment">
	
	<meta itemprop="commentTime" content="' . XenForo_Template_Helper_Core::datetime($comment['comment_date'], '') . '">	
	<meta itemprop="creator" content="' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '">
	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($comment,(true),array(
'user' => '$comment',
'size' => 's',
'img' => 'true'
),'')) . '

	<div class="commentInfo">
		';
$__compilerVar32 = '';
$__compilerVar32 .= '
					';
if ($comment['isDeleted'])
{
$__compilerVar32 .= '
						<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Deleted' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
					';
}
else if ($comment['isModerated'])
{
$__compilerVar32 .= '
						<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
					';
}
$__compilerVar32 .= '
					';
if ($comment['isIgnored'])
{
$__compilerVar32 .= '
						<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="jsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
					';
}
$__compilerVar32 .= '
				';
if (trim($__compilerVar32) !== '')
{
$__compilerVar31 .= '
			<ul class="messageNotices">
				' . $__compilerVar32 . '
			</ul>
		';
}
unset($__compilerVar32);
$__compilerVar31 .= '
		<div class="commentContent">
			<a href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $comment, array())) : (XenForo_Template_Helper_Core::link('members', $comment, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . ' poster">' . htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') . '</a>
			<article><blockquote itemprop="commentText">' . $comment['message'] . '</blockquote></article>
		</div>
		<div class="messageMeta">
			<div class="privateControls">
				';
if ($comment['canInlineMod'])
{
$__compilerVar31 .= '
					<input type="checkbox" value="' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" id="inlineModCheck-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#comment_' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select comment id: ' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '' . '" name="sxgcomments" />
				';
}
$__compilerVar31 .= '
				<a href="' . XenForo_Template_Helper_Core::link('gallery/comments', $comment, array()) . '" title="' . 'Permalink' . '" class="item muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($comment['comment_date'],array(
'time' => '$comment.comment_date'
))) . '</a>
				';
if ($comment['canEdit'])
{
$__compilerVar31 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/edit', $comment, array()) . '" class="item control edit"><span></span>' . 'Edit' . '</a>
				';
}
$__compilerVar31 .= '
				';
if ($comment['canDelete'])
{
$__compilerVar31 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/delete', $comment, array()) . '" class="item control delete"><span></span>' . 'Delete' . '</a>
				';
}
$__compilerVar31 .= '
				
				';
if ($comment['canWarn'])
{
$__compilerVar31 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $comment, array(
'content_type' => 'sonnb_xengallery_comment',
'content_id' => $comment['comment_id']
)) . '" class="item control warn"><span></span>' . 'Warn' . '</a>
				';
}
else if ($comment['warning_id'] && $canViewWarnings)
{
$__compilerVar31 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $comment, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar31 .= '
				';
if ($comment['canReport'])
{
$__compilerVar31 .= '
					<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/report', $comment, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Report' . '</a>
				';
}
$__compilerVar31 .= '
			</div>
			
			';
$__compilerVar33 = '';
$__compilerVar33 .= '
					';
if ($comment['canLike'])
{
$__compilerVar33 .= '
						<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/like', $comment, array()) . '" class="LikeLink item control ' . (($comment['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($comment['like_date']) ? ('Unlike') : ('Like')) . '</span></a>
					';
}
$__compilerVar33 .= '
					';
if ($comment['canComment'])
{
$__compilerVar33 .= '
						<a href="' . XenForo_Template_Helper_Core::link('gallery/comments/comment', $comment, array()) . '" class="CommentPoster item control postComment" data-commentArea="#commentSubmit-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Comment' . '</a>
					';
}
$__compilerVar33 .= '
				';
if (trim($__compilerVar33) !== '')
{
$__compilerVar31 .= '
				<div class="publicControls">
				' . $__compilerVar33 . '
				</div>
			';
}
unset($__compilerVar33);
$__compilerVar31 .= '
		</div>
		<div id="likes-comment-' . htmlspecialchars($comment['comment_id'], ENT_QUOTES, 'UTF-8') . '">
			';
if ($comment['likes'])
{
$__compilerVar31 .= '
				';
$__compilerVar34 = '';
$__compilerVar34 .= XenForo_Template_Helper_Core::link('gallery/comments/likes', $comment, array());
$__compilerVar35 = '';
if ($comment['likes'])
{
$__compilerVar35 .= '
	';
$this->addRequiredExternal('css', 'likes_summary');
$__compilerVar35 .= '
	<div class="likesSummary secondaryContent">
		<span class="LikeText">
			' . XenForo_Template_Helper_Core::callHelper('likeshtml', array($comment['likes'],$__compilerVar34,$comment['like_date'],$comment['likeUsers'])) . '
		</span>
	</div>
';
}
$__compilerVar31 .= $__compilerVar35;
unset($__compilerVar34, $__compilerVar35);
$__compilerVar31 .= '
			';
}
$__compilerVar31 .= '
		</div>
	</div>
</li>';
$__compilerVar24 .= $__compilerVar31;
unset($__compilerVar31);
$__compilerVar24 .= '
								';
}
$__compilerVar24 .= '

							';
}
$__compilerVar24 .= '

							';
if ($album['canComment'])
{
$__compilerVar24 .= '
								<li id="commentAlbum" class="comment secondaryContent">
									' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$visitor',
'size' => 's',
'img' => 'true'
),'')) . '
									<div class="elements">
										<textarea name="message" rows="2" class="textCtrl Elastic UserTagger"></textarea>
										<div class="submit"><input type="submit" class="button primary" value="' . 'Post Comment' . '" /></div>
									</div>
								</li>
							';
}
$__compilerVar24 .= '

						</ol>
						';
if ($inlineModOptions)
{
$__compilerVar24 .= '
							';
$__compilerVar36 = '';
$__compilerVar37 = '';
$__compilerVar37 .= 'InlineModControlsComment';
$__compilerVar38 = '';
$__compilerVar38 .= 'ModerationSelectComment';
$__compilerVar39 = '';
$__compilerVar39 .= 'Comment Moderation';
$__compilerVar40 = '';
$__compilerVar40 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar40 .= '<option value="delete">' . 'Delete Comments' . '...</option>';
}
$__compilerVar40 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar40 .= '<option value="undelete">' . 'Undelete Comments' . '</option>';
}
$__compilerVar40 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar40 .= '<option value="approve">' . 'Approve Comments' . '</option>';
}
$__compilerVar40 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar40 .= '<option value="unapprove">' . 'Unapprove Comments' . '</option>';
}
$__compilerVar40 .= '
		<option value="deselect">' . 'Deselect Comments' . '</option>
	';
$__compilerVar41 = '';
$__compilerVar41 .= 'Select / Deselect all loaded comments.';
$__compilerVar42 = '';
$__compilerVar42 .= 'Select comments';
$__compilerVar43 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_inline_mod_controls');
$__compilerVar43 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.inlinemod.js');
$__compilerVar43 .= '

<span id="' . (($__compilerVar37) ? (htmlspecialchars($__compilerVar37, ENT_QUOTES, 'UTF-8')) : ('InlineModControls')) . '" class="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Select All' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar41, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Move down' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Move up' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar42, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar43 .= '<input type="submit" class="button" value="' . 'Delete' . '..." name="delete" />';
}
$__compilerVar43 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar43 .= '<input type="submit" class="button" value="' . 'Approve' . '" name="approve" />';
}
$__compilerVar43 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="' . (($__compilerVar38) ? (htmlspecialchars($__compilerVar38, ENT_QUOTES, 'UTF-8')) : ('ModerationSelect')) . '" class="textCtrl ModerationSelect">
				<option value="">' . 'Other Action' . '...</option>
				<optgroup label="' . 'Moderation Actions' . '">
					' . $__compilerVar40 . '
				</optgroup>
				<option value="closeOverlay">' . 'Close This Overlay' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Go' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar36 .= $__compilerVar43;
unset($__compilerVar37, $__compilerVar38, $__compilerVar39, $__compilerVar40, $__compilerVar41, $__compilerVar42, $__compilerVar43);
$__compilerVar24 .= $__compilerVar36;
unset($__compilerVar36);
$__compilerVar24 .= '
						';
}
$__compilerVar24 .= '
						
						<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
					</form>
				';
$__compilerVar44 = '';
$this->addRequiredExternal('css', 'message_simple');
$__compilerVar44 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar44 .= '

<div class="commentWrapper">
	<div id="' . htmlspecialchars($__compilerVar20, ENT_QUOTES, 'UTF-8') . '" class="messageSimple ' . (($album['isDeleted']) ? ('deleted') : ('')) . ' ' . (($album['is_admin'] OR $album['is_moderator']) ? ('staff') : ('')) . ' ' . (($album['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($album['username'], ENT_QUOTES, 'UTF-8') . '">

		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($album,false,array(
'user' => '$message',
'size' => 's'
),'')) . '
		
		<div class="messageInfo">
			
			';
$__compilerVar45 = '';
$__compilerVar45 .= '
						';
$__compilerVar46 = '';
$__compilerVar46 .= '
							';
if ($album['warning_message'])
{
$__compilerVar46 .= '
								<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($album['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
							';
}
$__compilerVar46 .= '
							';
if ($album['isIgnored'])
{
$__compilerVar46 .= '
								<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="jsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
							';
}
$__compilerVar46 .= '
						';
$__compilerVar45 .= $this->callTemplateHook('message_simple_notices', $__compilerVar46, array(
'message' => $album
));
unset($__compilerVar46);
$__compilerVar45 .= '
					';
if (trim($__compilerVar45) !== '')
{
$__compilerVar44 .= '
				<ul class="messageNotices">
					' . $__compilerVar45 . '
				</ul>
			';
}
unset($__compilerVar45);
$__compilerVar44 .= '

			<div class="messageContent">
				<a href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $album, array())) : (XenForo_Template_Helper_Core::link('members', $album, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . ' poster">' . htmlspecialchars($album['username'], ENT_QUOTES, 'UTF-8') . '</a>
				<article><blockquote class="ugc baseHtml">' . $album['descriptionHtml'] . '</blockquote></article>
				' . $__compilerVar21 . '
			</div>

			' . $__compilerVar24 . '
		</div>
	</div>
</div>';
$__output .= $__compilerVar44;
unset($__compilerVar20, $__compilerVar21, $__compilerVar24, $__compilerVar44);
$__output .= '
			<div class="commentControls">
				';
if ($album['canEdit'])
{
$__output .= '
				<h4>' . 'Privacy' . '</h4>
				<div class="albumInfo">
					<div class="albumPrivacy">
						<span class="muted">' . htmlspecialchars($album['allow_view_html'], ENT_QUOTES, 'UTF-8') . '</span> <a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/albums/privacy', $album, array()) . '">' . 'Edit' . '</a>
					</div>
				</div>
				';
}
$__output .= '	
				';
$__compilerVar47 = '';
$__compilerVar47 .= '
						';
if ($album['albumStreams'] || ($album['canEdit'] && !$album['albumStreams']))
{
$__compilerVar47 .= '
						<div class="streamList">
							<ul>
								';
if ($album['albumStreams'])
{
$__compilerVar47 .= '	
								';
foreach ($album['albumStreams'] AS $stream)
{
$__compilerVar47 .= '
									';
$__compilerVar48 = '';
$__compilerVar48 .= '<li id="stream__' . htmlspecialchars($stream, ENT_QUOTES, 'UTF-8') . '">
	<span class="streamItem">
		<a href="' . XenForo_Template_Helper_Core::link('gallery/streams', array(
'stream_name' => $stream
), array()) . '">' . htmlspecialchars($stream, ENT_QUOTES, 'UTF-8') . '</a>
		';
if ($album['canEdit'])
{
$__compilerVar48 .= '
			<a class="delete" title="' . 'Delete' . '" href="' . XenForo_Template_Helper_Core::link('gallery/albums/stream-delete', $album, array(
'stream_name' => $stream
)) . '">[x]</a>
		';
}
$__compilerVar48 .= '
	</span>
</li>';
$__compilerVar47 .= $__compilerVar48;
unset($__compilerVar48);
$__compilerVar47 .= '
								';
}
$__compilerVar47 .= '
								';
}
$__compilerVar47 .= '	
							</ul>
						</div>	
						';
}
$__compilerVar47 .= '					
						';
if ($album['canEdit'])
{
$__compilerVar47 .= '
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
$__compilerVar47 .= '
					';
if (trim($__compilerVar47) !== '')
{
$__output .= '
				<h4 class="streamingHeader">' . 'Streams' . ' ';
if ($album['canEdit'])
{
$__output .= '<a class="editToggle" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#">' . 'Add Streams' . '</a>';
}
$__output .= '</h4>
				<div class="streaming streamingEditor">
					' . $__compilerVar47 . '
				</div>
				';
}
unset($__compilerVar47);
$__output .= '
				
				';
$__compilerVar49 = '';
$__compilerVar49 .= '
								<a rel="nofollow" href="' . XenForo_Template_Helper_Core::link('gallery/albums/share', $album, array()) . '" class="OverlayTrigger item control share" title="' . 'Share this album with your friends.' . '">' . 'Share' . '</a>
								';
if ($album['canEdit'])
{
$__compilerVar49 .= '
									<a class="item control people quickEdit" data-quickForm="formTag" data-reset="true" href="' . XenForo_Template_Helper_Core::link('gallery/albums/tag', $album, array()) . '" data-cacheOverlay="false"><i></i><span>' . 'Tag People' . '</span></a>
									';
$__compilerVar50 = '';
$__compilerVar50 .= 'quickEditForm';
$__compilerVar51 = '';
$__compilerVar51 .= 'formTag';
$__compilerVar52 = '';
$__compilerVar52 .= '<form action="' . XenForo_Template_Helper_Core::link('gallery/albums/tag', $album, array()) . '" method="post"
	class="xenForm ' . (($__compilerVar50) ? (htmlspecialchars($__compilerVar50, ENT_QUOTES, 'UTF-8')) : ('AutoValidator')) . ' formOverlay" ' . (($__compilerVar51) ? ('id="' . htmlspecialchars($__compilerVar51, ENT_QUOTES, 'UTF-8') . '"') : ('')) . ' 
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
$__compilerVar49 .= $__compilerVar52;
unset($__compilerVar50, $__compilerVar51, $__compilerVar52);
$__compilerVar49 .= '
								';
}
$__compilerVar49 .= '
								';
if (!$xenOptions['sonnb_XG_disableLocation'] && $album['canEdit'])
{
$__compilerVar49 .= '
									<a class="item control location OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/albums/location', $album, array()) . '" data-cacheOverlay="false" data-overlayOptions="{&quot;fixed&quot;:false}"><i></i><span>' . 'Edit Location' . '</span></a>
								';
}
$__compilerVar49 .= '
							';
if (trim($__compilerVar49) !== '')
{
$__output .= '
					<h4>' . 'Actions' . '</h4>
					<div class="photoControls">
						<div class="iconActionLinks">
							' . $__compilerVar49 . '
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
unset($__compilerVar49);
$__output .= '
			</div>
		</div>
	</div>
</div>


';
$__compilerVar53 = '';
$__compilerVar53 .= XenForo_Template_Helper_Core::link('canonical:gallery/albums', $album, array());
$__compilerVar54 = '';
$__compilerVar55 = '';
$__compilerVar55 .= '
			';
$__compilerVar56 = '';
$__compilerVar56 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar56 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar53, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar56 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar56 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar53, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar56 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar56 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar56 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar53, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar56 .= '
			';
$__compilerVar55 .= $this->callTemplateHook('share_page_options', $__compilerVar56, array());
unset($__compilerVar56);
$__compilerVar55 .= '
		';
if (trim($__compilerVar55) !== '')
{
$__compilerVar54 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar54 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Share This Page' . '</h3>
		' . $__compilerVar55 . '
	</div>
';
}
unset($__compilerVar55);
$__output .= $__compilerVar54;
unset($__compilerVar53, $__compilerVar54);
$__output .= '
';
$__compilerVar57 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar57, array());
unset($__compilerVar57);
