<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
if ($isGalleryIndex)
{
$__extraData['title'] .= 'Gallery' . ' - ';
}
$__extraData['title'] .= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
if ($isGalleryIndex)
{
$__extraData['h1'] .= 'Gallery' . ' - ';
}
$__extraData['h1'] .= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= $category['description'];
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/categories', $category, array(
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
$__compilerVar18 = '';
$__compilerVar18 .= XenForo_Template_Helper_Core::link('canonical:gallery/categories', $category, array());
$__compilerVar19 = '';
$__compilerVar19 .= htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8');
$__compilerVar20 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar20 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar20 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar20 .= '
	<meta property="og:image" content="';
$__compilerVar21 = '';
$__compilerVar21 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar20 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar21, array());
unset($__compilerVar21);
$__compilerVar20 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar18 . '" />
	<meta property="og:title" content="' . $__compilerVar19 . '" />
	';
if ($description)
{
$__compilerVar20 .= '<meta property="og:description" content="' . $description . '" />';
}
$__compilerVar20 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar20 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar20 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar20 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar20 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar20;
unset($__compilerVar18, $__compilerVar19, $__compilerVar20);
$__extraData['head']['openGraph'] .= '
';
$__output .= '
';
$__extraData['searchBar']['photo'] = '';
$__compilerVar22 = '';
$__compilerVar22 .= '<label><input type="checkbox" name="type[sonnb_xengallery_photo][null]" value="" checked="checked" id="search_bar_photo" /> ' . 'Search photos only' . '</label>

';
if ($xenOptions['sonnbXG_advSearch'] && !$xenOptions['sonnb_XG_disableCamera'])
{
$__compilerVar22 .= '
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
$__extraData['searchBar']['photo'] .= $__compilerVar22;
unset($__compilerVar22);
$__output .= '


';
$__extraData['head']['rss'] = '';
$__extraData['head']['rss'] .= '
	<link rel="alternate" type="application/rss+xml" title="' . 'RSS Feed For ' . htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') . '' . '" href="' . XenForo_Template_Helper_Core::link('gallery/categories/index.rss', $category, array()) . '" />
';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
if ($isGalleryIndex)
{
$__output .= '
	';
$__compilerVar23 = '';
if ($canCreateAlbum)
{
$__compilerVar23 .= '
	';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= '
		<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/create', false, array()) . '" class="callToAction"><span>' . 'Create New Album' . '</span></a>
		<a href="' . XenForo_Template_Helper_Core::link('gallery/photos/create', false, array()) . '" class="callToAction OverlayTrigger"><span>' . 'Add New Photos' . '</span></a>
		';
if ($canEmbedVideos)
{
$__extraData['topctrl'] .= '<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/create', false, array()) . '" class="callToAction OverlayTrigger"><span>' . 'Add New Videos' . '</span></a>';
}
$__extraData['topctrl'] .= '
	';
$__compilerVar23 .= '
';
}
$__output .= $__compilerVar23;
unset($__compilerVar23);
$__output .= '
';
}
$__output .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.mobile.js');
$__output .= '

';
if ($canCreateAlbum)
{
$__output .= '
	';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= '<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/create', '', array(
'category_id' => $category['category_id']
)) . '" class="callToAction"><span>' . 'Create New Album' . '</span></a>';
$__output .= '
';
}
$__output .= '

';
if ($childrenCategory)
{
$__output .= '
	<div class="breadBoxTop categoryView">
		<ul class="breadcrumb">
			';
foreach ($childrenCategory AS $childCat)
{
$__output .= '
				<li class="crust">
					<a class="crumb" href="' . XenForo_Template_Helper_Core::link('gallery/categories', $childCat, array()) . '"><span>' . htmlspecialchars($childCat['title'], ENT_QUOTES, 'UTF-8') . '</span></a>
				</li>
			';
}
$__output .= '
		</ul>
	</div>
';
}
$__output .= '

<div class="titleBar categoryView">           	
	<h1>' . htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') . '</h1>
	<div class="muted">' . $category['description'] . '</div>
</div>

<div class="galleryHeader">
	<ul>
		<li class="sort Popup PopupControl PopupClosed PopupContainerControl">
			<a rel="Menu" href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#" title="' . 'Sort' . '">
				<i></i>
			</a>
			<div class="Menu JsOnly" id="gallerySort">
				<div class="menuColumns secondaryContent">
					<ul class="blockLinksList">
						<li><a href="' . XenForo_Template_Helper_Core::link('gallery/categories', $category, array(
'order' => 'album_updated_date'
)) . '">' . 'Latest Updated' . '</a></li>
						<li><a href="' . XenForo_Template_Helper_Core::link('gallery/categories', $category, array(
'order' => 'album_date'
)) . '">' . 'Newest Albums' . '</a></li>
						<li><a href="' . XenForo_Template_Helper_Core::link('gallery/categories', $category, array(
'order' => 'view_count'
)) . '">' . 'Most Viewed' . '</a></li>
						<li><a href="' . XenForo_Template_Helper_Core::link('gallery/categories', $category, array(
'order' => 'comment_count'
)) . '">' . 'Most Commented' . '</a></li>
						<li><a href="' . XenForo_Template_Helper_Core::link('gallery/categories', $category, array(
'order' => 'likes'
)) . '">' . 'Most Liked' . '</a></li>
					</ul>
				</div>
			</div>
		</li>
	</ul>
</div>

';
$__compilerVar24 = '';
$__output .= $this->callTemplateHook('gallery_ad_category_view_above_album_list', $__compilerVar24, array());
unset($__compilerVar24);
$__output .= '

';
$__compilerVar25 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list');
$__compilerVar25 .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar25 .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view');
$__compilerVar25 .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.masonry.min.js');
$__compilerVar25 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.infinitescroll.min.js');
$__compilerVar25 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/modernizr.min.js');
$__compilerVar25 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.js');
$__compilerVar25 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.overlay.js');
$__compilerVar25 .= '

<div class="clearfix masonryContainer" ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll')) ? ('data-noAutoScroll="1"') : ('')) . ' data-loading="' . 'Loading Photos' . '..." data-finish="' . 'There are no more photos to be loaded.' . '" data-ajax="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif">
	';
if ($albums)
{
$__compilerVar25 .= '
		';
if ($displayMostViewed && $topAlbums)
{
$__compilerVar25 .= '
			';
$__compilerVar26 = '';
$__compilerVar26 .= '
				';
$__compilerVar27 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar27 .= '

<div class="itemGallery topItem">
	<div class="titleTopItem">
		<h2>
			<a><i></i>' . 'Most Viewed Albums' . '</a>
		</h2>
	</div>
	<div class="clearfix">
		';
foreach ($topAlbums AS $album)
{
$__compilerVar27 .= '
		<div class="img ">
			<a title="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" class="thumbSmall Tooltip ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay')) ? ('hasOverlay') : ('')) . '" href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '">
				<img title="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" src="' . htmlspecialchars($album['cover']['thumbnailSmall'], ENT_QUOTES, 'UTF-8') . '" />
			</a>
		</div>
		';
}
$__compilerVar27 .= '
	</div>
</div>';
$__compilerVar26 .= $__compilerVar27;
unset($__compilerVar27);
$__compilerVar26 .= '
			';
$__compilerVar25 .= $this->callTemplateHook('album_list_promoted', $__compilerVar26, array());
unset($__compilerVar26);
$__compilerVar25 .= '
		';
}
$__compilerVar25 .= '
		';
$__compilerVar28 = '';
$__compilerVar28 .= '
		';
foreach ($albums AS $album)
{
$__compilerVar28 .= '
			';
$__compilerVar29 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar29 .= '

<div class="itemGallery" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
	';
if ($album['cover'])
{
$__compilerVar29 .= '
		';
$imageHeight = '';
if ($album['cover']['medium_width'] < XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_itemwidth'))
{
$imageHeight .= htmlspecialchars($album['cover']['medium_height'], ENT_QUOTES, 'UTF-8');
}
else
{
$imageHeight .= ($album['cover']['medium_height'] * (XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_itemwidth') / $album['cover']['medium_width']));
}
$__compilerVar29 .= '
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
$__compilerVar29 .= '
	';
}
else
{
$__compilerVar29 .= '
		';
$imageHeight = '';
$imageHeight .= '110';
$__compilerVar29 .= '
		';
$imageHeightReal = '';
$imageHeightReal .= '110';
$__compilerVar29 .= '
	';
}
$__compilerVar29 .= '
	<div class="img" data-height="' . htmlspecialchars($album['cover']['medium_height'], ENT_QUOTES, 'UTF-8') . '" data-width="' . htmlspecialchars($album['cover']['medium_width'], ENT_QUOTES, 'UTF-8') . '"> 
		<a class="" href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '" style="width:220px; height: ' . htmlspecialchars($imageHeightReal, ENT_QUOTES, 'UTF-8') . 'px; max-height: ' . htmlspecialchars($imageHeightReal, ENT_QUOTES, 'UTF-8') . 'px;" >
			<img class="lazy" alt="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" data-src="' . (($album['cover']['thumbnailUrl']) ? (htmlspecialchars($album['cover']['thumbnailUrl'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::styleProperty('sonnbXG_albumEmpty'))) . '" />
			<noscript><img alt="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" src="' . (($album['cover']['thumbnailUrl']) ? (htmlspecialchars($album['cover']['thumbnailUrl'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::styleProperty('sonnbXG_albumEmpty'))) . '" /></noscript>
		</a>
	</div>

	<meta itemprop="thumbnailUrl" content="' . (($album['cover']['thumbnailUrl']) ? (htmlspecialchars($album['cover']['thumbnailUrl'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::styleProperty('sonnbXG_albumEmpty'))) . '">
	<meta itemprop="contentURL" content="' . XenForo_Template_Helper_Core::link('full:gallery/albums', $album, array()) . '">
	<meta itemprop="caption" content="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '">
	<meta itemprop="publisher" content="' . XenForo_Template_Helper_Core::link('full:members', $album, array()) . '">
	<meta itemprop="datePublished" content="' . XenForo_Template_Helper_Core::datetime($album['album_date'], '') . '">

	<div class="infoAlbum clearfix">
		<div class="titleAlbum">
			<h3 style="text-align: left;">
				<a href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '">' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '</a>
			</h3>
		</div>
		<div class="dateInfo">
			';
if ($album['photo_count'])
{
$__compilerVar29 .= htmlspecialchars($album['photo_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'photos';
}
if ($album['video_count'])
{
$__compilerVar29 .= (($album['photo_count']) ? (' - ') : ('')) . htmlspecialchars($album['video_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'videos';
}
$__compilerVar29 .= '
		</div>
		<div class="userInfo">
			<a title="' . htmlspecialchars($album['username'], ENT_QUOTES, 'UTF-8') . '" href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $album, array())) : (XenForo_Template_Helper_Core::link('members', $album, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . '">' . htmlspecialchars($album['username'], ENT_QUOTES, 'UTF-8') . '</a>
			
		</div>
		<div class="dateInfo">
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($album['album_updated_date'],array(
'time' => htmlspecialchars($album['album_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
		</div>
		';
if ($album['isDeleted'])
{
$__compilerVar29 .= '
			<h3 class="deleteNotice">' . 'This album has been deleted.' . '</h3>
		';
}
$__compilerVar29 .= '
		';
if ($album['isModerated'])
{
$__compilerVar29 .= '
			<h3 class="deleteNotice">' . 'Awaiting Approval' . '</h3>
		';
}
$__compilerVar29 .= '
	</div>
	<ul class="toolAlbum clearfix">
		<li class="likeAlbum">
			<a data-container="#likeCount_' . htmlspecialchars($album['album_id'], ENT_QUOTES, 'UTF-8') . '" class="control ' . (($album['canLike']) ? ('like') : ('')) . ' ' . (($album['like_date']) ? ('active') : ('')) . '" title="' . (($album['canLike'] && $album['like_date']) ? ('Unlike this album') : ('Like this album')) . '" 
				href="' . (($album['canLike']) ? (XenForo_Template_Helper_Core::link('gallery/albums/like', $album, array())) : ('javascript:void(0);')) . '"><i></i><span id="likeCount_' . htmlspecialchars($album['album_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($album['likes'], ENT_QUOTES, 'UTF-8') . '</span></a>
		</li>
		<li class="commentAlbum">
			<a title="' . 'Leave a comment' . '" class="CommentLink control comment ' . (($album['canComment']) ? ('canComment') : ('')) . ' ' . (($album['comment_count']) ? ('hasComment') : ('')) . '" href="' . (($album['canComment']) ? (XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '#commentAlbum') : ('javascript:void(0);')) . '"><i></i>' . htmlspecialchars($album['comment_count'], ENT_QUOTES, 'UTF-8') . '</a>
		</li>
		<li class="viewAlbum">
			<a><i></i>' . htmlspecialchars($album['view_count'], ENT_QUOTES, 'UTF-8') . '</a>
		</li>
	</ul>
</div>';
$__compilerVar28 .= $__compilerVar29;
unset($__compilerVar29);
$__compilerVar28 .= '
		';
}
$__compilerVar28 .= '
		';
$__compilerVar25 .= $this->callTemplateHook('album_list', $__compilerVar28, array());
unset($__compilerVar28);
$__compilerVar25 .= '
		<div id="infscr-loading">
			<img src="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_FFFFFF_facebook.gif" 
				alt="' . 'Loading albums' . '......" />
			<div><em>' . 'Loading albums' . '......</em></div>
		</div>
	';
}
else
{
$__compilerVar25 .= '
		<div class="noData">' . 'There is no album to display' . '</div>
	';
}
$__compilerVar25 .= '
</div>';
$__output .= $__compilerVar25;
unset($__compilerVar25);
$__output .= '
	
<div class="pageNavLinkGroup xengallery">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($albumsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalAlbums, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), htmlspecialchars($linkPrefix, ENT_QUOTES, 'UTF-8'), $category, $pageNavParams, false, array())) . '
</div>
';
$__compilerVar30 = '';
$__compilerVar30 .= XenForo_Template_Helper_Core::link('canonical:gallery/categories', $category, array());
$__compilerVar31 = '';
$__compilerVar32 = '';
$__compilerVar32 .= '
			';
$__compilerVar33 = '';
$__compilerVar33 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar33 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar30, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar33 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar33 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar30, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar33 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar33 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar33 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar30, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar33 .= '
			';
$__compilerVar32 .= $this->callTemplateHook('share_page_options', $__compilerVar33, array());
unset($__compilerVar33);
$__compilerVar32 .= '
		';
if (trim($__compilerVar32) !== '')
{
$__compilerVar31 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar31 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Chia sẻ trang này' . '</h3>
		' . $__compilerVar32 . '
	</div>
';
}
unset($__compilerVar32);
$__output .= $__compilerVar31;
unset($__compilerVar30, $__compilerVar31);
$__output .= '
';
$__compilerVar34 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar34, array());
unset($__compilerVar34);
