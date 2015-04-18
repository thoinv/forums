<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Thư viện' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Thư viện';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'All albums posted by our members at ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery', '', array(
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
$__compilerVar17 = '';
$__compilerVar17 .= XenForo_Template_Helper_Core::link('canonical:gallery', false, array());
$__compilerVar18 = '';
$__compilerVar18 .= 'Thư viện';
$__compilerVar19 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar19 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar19 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar19 .= '
	<meta property="og:image" content="';
$__compilerVar20 = '';
$__compilerVar20 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar19 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar20, array());
unset($__compilerVar20);
$__compilerVar19 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar17 . '" />
	<meta property="og:title" content="' . $__compilerVar18 . '" />
	';
if ($description)
{
$__compilerVar19 .= '<meta property="og:description" content="' . $description . '" />';
}
$__compilerVar19 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar19 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar19 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar19 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar19 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar19;
unset($__compilerVar17, $__compilerVar18, $__compilerVar19);
$__extraData['head']['openGraph'] .= '
';
$__output .= '
';
$__extraData['searchBar']['photo'] = '';
$__compilerVar21 = '';
$__compilerVar21 .= '<label><input type="checkbox" name="type[sonnb_xengallery_photo][null]" value="" checked="checked" id="search_bar_photo" /> ' . 'Search photos only' . '</label>

';
if ($xenOptions['sonnbXG_advSearch'] && !$xenOptions['sonnb_XG_disableCamera'])
{
$__compilerVar21 .= '
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
$__extraData['searchBar']['photo'] .= $__compilerVar21;
unset($__compilerVar21);
$__output .= '


';
$__extraData['head']['rss'] = '';
$__extraData['head']['rss'] .= '
	<link rel="alternate" type="application/rss+xml" title="' . 'RSS Feed For ' . 'Thư viện' . '' . '" href="' . XenForo_Template_Helper_Core::link('gallery/index.rss', false, array()) . '" />
';
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
$__output .= '
';
}
$__output .= '

<div class="blockLinksList galleryHeader">
	<ul class="Popup PopupControl">
		<a href="javascript:void(0);" rel="Menu">' . 'Sort Albums' . '</a>
		<div class="Menu JsOnly" id="XenGalleryGallerySort">
			<div class="menuColumns secondaryContent">
				<ul class="blockLinksList">
					<li><a href="' . XenForo_Template_Helper_Core::link('gallery', '', array(
'order' => 'album_updated_date'
)) . '">' . 'Latest Updated' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('gallery', '', array(
'order' => 'album_date'
)) . '">' . 'Newest Contents' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('gallery', '', array(
'order' => 'view_count'
)) . '">' . 'Most Viewed' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('gallery', '', array(
'order' => 'comment_count'
)) . '">' . 'Most Commented' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('gallery', '', array(
'order' => 'likes'
)) . '">' . 'Most Liked' . '</a></li>
					<li><a href="' . XenForo_Template_Helper_Core::link('gallery', '', array(
'order' => 'recently_liked'
)) . '">' . 'Recently Liked' . '</a></li>
				</ul>
			</div>
		</div>
	</ul>
</div>

';
$__compilerVar22 = '';
$__output .= $this->callTemplateHook('gallery_ad_gallery_view_above_album_list', $__compilerVar22, array());
unset($__compilerVar22);
$__output .= '

';
$__compilerVar23 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list');
$__compilerVar23 .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar23 .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view');
$__compilerVar23 .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.masonry.min.js');
$__compilerVar23 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.infinitescroll.min.js');
$__compilerVar23 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/modernizr.min.js');
$__compilerVar23 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.js');
$__compilerVar23 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.overlay.js');
$__compilerVar23 .= '

<div class="clearfix masonryContainer" ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll')) ? ('data-noAutoScroll="1"') : ('')) . ' data-loading="' . 'Loading Photos' . '..." data-finish="' . 'There are no more photos to be loaded.' . '" data-ajax="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif">
	';
if ($albums)
{
$__compilerVar23 .= '
		';
if ($displayMostViewed && $topAlbums)
{
$__compilerVar23 .= '
			';
$__compilerVar24 = '';
$__compilerVar24 .= '
				';
$__compilerVar25 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar25 .= '

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
$__compilerVar25 .= '
		<div class="img ">
			<a title="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" class="thumbSmall Tooltip ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay')) ? ('hasOverlay') : ('')) . '" href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '">
				<img title="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" src="' . htmlspecialchars($album['cover']['thumbnailSmall'], ENT_QUOTES, 'UTF-8') . '" />
			</a>
		</div>
		';
}
$__compilerVar25 .= '
	</div>
</div>';
$__compilerVar24 .= $__compilerVar25;
unset($__compilerVar25);
$__compilerVar24 .= '
			';
$__compilerVar23 .= $this->callTemplateHook('album_list_promoted', $__compilerVar24, array());
unset($__compilerVar24);
$__compilerVar23 .= '
		';
}
$__compilerVar23 .= '
		';
$__compilerVar26 = '';
$__compilerVar26 .= '
		';
foreach ($albums AS $album)
{
$__compilerVar26 .= '
			';
$__compilerVar27 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar27 .= '

<div class="itemGallery" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
	';
if ($album['cover'])
{
$__compilerVar27 .= '
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
$__compilerVar27 .= '
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
$__compilerVar27 .= '
	';
}
else
{
$__compilerVar27 .= '
		';
$imageHeight = '';
$imageHeight .= '110';
$__compilerVar27 .= '
		';
$imageHeightReal = '';
$imageHeightReal .= '110';
$__compilerVar27 .= '
	';
}
$__compilerVar27 .= '
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
$__compilerVar27 .= htmlspecialchars($album['photo_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'photos';
}
if ($album['video_count'])
{
$__compilerVar27 .= (($album['photo_count']) ? (' - ') : ('')) . htmlspecialchars($album['video_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'videos';
}
$__compilerVar27 .= '
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
$__compilerVar27 .= '
			<h3 class="deleteNotice">' . 'This album has been deleted.' . '</h3>
		';
}
$__compilerVar27 .= '
		';
if ($album['isModerated'])
{
$__compilerVar27 .= '
			<h3 class="deleteNotice">' . 'Awaiting Approval' . '</h3>
		';
}
$__compilerVar27 .= '
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
$__compilerVar26 .= $__compilerVar27;
unset($__compilerVar27);
$__compilerVar26 .= '
		';
}
$__compilerVar26 .= '
		';
$__compilerVar23 .= $this->callTemplateHook('album_list', $__compilerVar26, array());
unset($__compilerVar26);
$__compilerVar23 .= '
		<div id="infscr-loading">
			<img src="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_FFFFFF_facebook.gif" 
				alt="' . 'Loading albums' . '......" />
			<div><em>' . 'Loading albums' . '......</em></div>
		</div>
	';
}
else
{
$__compilerVar23 .= '
		<div class="noData">' . 'There is no album to display' . '</div>
	';
}
$__compilerVar23 .= '
</div>';
$__output .= $__compilerVar23;
unset($__compilerVar23);
$__output .= '
	
<div class="pageNavLinkGroup xengallery">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($albumsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalAlbums, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'gallery', false, $pageNavParams, false, array())) . '
</div>
';
$__compilerVar28 = '';
$__compilerVar28 .= XenForo_Template_Helper_Core::link('canonical:gallery', false, array());
$__compilerVar29 = '';
$__compilerVar30 = '';
$__compilerVar30 .= '
			';
$__compilerVar31 = '';
$__compilerVar31 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar31 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar28, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar31 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar31 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar28, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar31 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar31 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar31 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar28, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar31 .= '
			';
$__compilerVar30 .= $this->callTemplateHook('share_page_options', $__compilerVar31, array());
unset($__compilerVar31);
$__compilerVar30 .= '
		';
if (trim($__compilerVar30) !== '')
{
$__compilerVar29 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar29 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Chia sẻ trang này' . '</h3>
		' . $__compilerVar30 . '
	</div>
';
}
unset($__compilerVar30);
$__output .= $__compilerVar29;
unset($__compilerVar28, $__compilerVar29);
$__output .= '
';
$__compilerVar32 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar32, array());
unset($__compilerVar32);
