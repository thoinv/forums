<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
if ($isGalleryIndex)
{
$__extraData['title'] .= 'Gallery' . ' - ';
}
$__extraData['title'] .= 'Categories' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
if ($isGalleryIndex)
{
$__extraData['h1'] .= 'Gallery' . ' - ';
}
$__extraData['h1'] .= 'Categories';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'List of all categories at ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/categories', '', array(
'page' => $page
)) . '" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
';
$__output .= '

';
$__extraData['head']['openGraph'] = '';
$__extraData['head']['openGraph'] .= '
	';
$__compilerVar14 = '';
$__compilerVar14 .= XenForo_Template_Helper_Core::link('canonical:gallery/categories', false, array());
$__compilerVar15 = '';
$__compilerVar15 .= 'Categories';
$__compilerVar16 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar16 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($avatar)
{
$__compilerVar16 .= '<meta property="og:image" content="' . htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar16 .= '
	<meta property="og:image" content="';
$__compilerVar17 = '';
$__compilerVar17 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar16 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar17, array());
unset($__compilerVar17);
$__compilerVar16 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar14 . '" />
	<meta property="og:title" content="' . $__compilerVar15 . '" />
	';
if ($description)
{
$__compilerVar16 .= '<meta property="og:description" content="' . $description . '" />';
}
$__compilerVar16 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar16 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar16 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar16 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar16 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar16;
unset($__compilerVar14, $__compilerVar15, $__compilerVar16);
$__extraData['head']['openGraph'] .= '
';
$__output .= '
';
$__extraData['searchBar']['photo'] = '';
$__compilerVar18 = '';
$__compilerVar18 .= '<label><input type="checkbox" name="type[sonnb_xengallery_photo][null]" value="" checked="checked" id="search_bar_photo" /> ' . 'Search photos only' . '</label>

';
if ($xenOptions['sonnbXG_advSearch'] && !$xenOptions['sonnb_XG_disableCamera'])
{
$__compilerVar18 .= '
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
$__extraData['searchBar']['photo'] .= $__compilerVar18;
unset($__compilerVar18);
$__output .= '


';
$__extraData['head']['rss'] = '';
$__extraData['head']['rss'] .= '
	<link rel="alternate" type="application/rss+xml" title="' . 'RSS Feed For ' . 'Categories' . '' . '" href="' . XenForo_Template_Helper_Core::link('gallery/categories/index.rss', false, array()) . '" />
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
$__compilerVar19 = '';
if ($canCreateAlbum)
{
$__compilerVar19 .= '
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
$__compilerVar19 .= '
';
}
$__output .= $__compilerVar19;
unset($__compilerVar19);
$__output .= '
';
}
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_category_index');
$__output .= '
';
$__compilerVar20 = '';
$__output .= $this->callTemplateHook('gallery_ad_category_index_above_category_list', $__compilerVar20, array());
unset($__compilerVar20);
$__output .= '

';
if ($categories)
{
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
foreach ($categories AS $category)
{
$__output .= '
		<h3 class="textHeading"><a href="' . XenForo_Template_Helper_Core::link('gallery/categories', $category, array()) . '">' . htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') . ' (' . htmlspecialchars($category['album_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'albums' . ')</a></h3>
		<div class="clearfix masonryContainer"
			' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll')) ? ('data-noAutoScroll="1"') : ('')) . ' 
			data-loading="' . 'Loading albums' . '..." 
			data-finish="' . 'There are no more albums to be loaded.' . '" 
			data-ajax="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif">
			
			';
if ($category['albums'])
{
$__output .= '
				';
foreach ($category['albums'] AS $album)
{
$__output .= '
					';
$__compilerVar21 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar21 .= '

<div class="itemGallery" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
	';
if ($album['cover'])
{
$__compilerVar21 .= '
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
$__compilerVar21 .= '
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
$__compilerVar21 .= '
	';
}
else
{
$__compilerVar21 .= '
		';
$imageHeight = '';
$imageHeight .= '110';
$__compilerVar21 .= '
		';
$imageHeightReal = '';
$imageHeightReal .= '110';
$__compilerVar21 .= '
	';
}
$__compilerVar21 .= '
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
$__compilerVar21 .= htmlspecialchars($album['photo_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'photos';
}
if ($album['video_count'])
{
$__compilerVar21 .= (($album['photo_count']) ? (' - ') : ('')) . htmlspecialchars($album['video_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'videos';
}
$__compilerVar21 .= '
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
$__compilerVar21 .= '
			<h3 class="deleteNotice">' . 'This album has been deleted.' . '</h3>
		';
}
$__compilerVar21 .= '
		';
if ($album['isModerated'])
{
$__compilerVar21 .= '
			<h3 class="deleteNotice">' . 'Awaiting Approval' . '</h3>
		';
}
$__compilerVar21 .= '
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
$__output .= $__compilerVar21;
unset($__compilerVar21);
$__output .= '
				';
}
$__output .= '
				<div id="infscr-loading">
					<img src="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_FFFFFF_facebook.gif" 
						alt="' . 'Loading albums' . '......" />
					<div><em>' . 'Loading albums' . '......</em></div>
				</div>
			';
}
else
{
$__output .= '
				<div class="noData">' . 'There is no album in this category yet.' . '</div>
			';
}
$__output .= '
	
		</div>
	';
}
$__output .= '
';
}
else
{
$__output .= '	
	
';
}
$__output .= '

<div class="pageNavLinkGroup xengallery">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($categoriesPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalCategories, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), htmlspecialchars($linkPrefix, ENT_QUOTES, 'UTF-8'), false, $pageNavParams, false, array())) . '
</div>
';
$__compilerVar22 = '';
$__compilerVar22 .= XenForo_Template_Helper_Core::link('canonical:gallery/categories', false, array());
$__compilerVar23 = '';
$__compilerVar24 = '';
$__compilerVar24 .= '
			';
$__compilerVar25 = '';
$__compilerVar25 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar25 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar22, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar25 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar25 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar22, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar25 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar25 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar25 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar22, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar25 .= '
			';
$__compilerVar24 .= $this->callTemplateHook('share_page_options', $__compilerVar25, array());
unset($__compilerVar25);
$__compilerVar24 .= '
		';
if (trim($__compilerVar24) !== '')
{
$__compilerVar23 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar23 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Chia sẻ trang này' . '</h3>
		' . $__compilerVar24 . '
	</div>
';
}
unset($__compilerVar24);
$__output .= $__compilerVar23;
unset($__compilerVar22, $__compilerVar23);
$__output .= '
';
$__compilerVar26 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar26, array());
unset($__compilerVar26);
