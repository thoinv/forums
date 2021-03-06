<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'New Albums' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'New Albums';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'These are all newly created albums from ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '.';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/new-albums', array(
'page' => $page
), array()) . '" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
';
$__output .= '

';
$__extraData['head']['rss'] = '';
$__extraData['head']['rss'] .= '
	<link rel="alternate" type="application/rss+xml" title="' . 'RSS Feed For ' . 'New Albums' . '' . '" href="' . XenForo_Template_Helper_Core::link('gallery/new-albums.rss', false, array()) . '" />
';
$__output .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.mobile.js');
$__output .= '

';
$__compilerVar12 = '';
$__output .= $this->callTemplateHook('gallery_ad_new_albums_above_album_list', $__compilerVar12, array());
unset($__compilerVar12);
$__output .= '

';
$__compilerVar13 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list');
$__compilerVar13 .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar13 .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view');
$__compilerVar13 .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.masonry.min.js');
$__compilerVar13 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.infinitescroll.min.js');
$__compilerVar13 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/modernizr.min.js');
$__compilerVar13 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.js');
$__compilerVar13 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.overlay.js');
$__compilerVar13 .= '

<div class="clearfix masonryContainer" ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll')) ? ('data-noAutoScroll="1"') : ('')) . ' data-loading="' . 'Loading Photos' . '..." data-finish="' . 'There are no more photos to be loaded.' . '" data-ajax="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif">
	';
if ($albums)
{
$__compilerVar13 .= '
		';
if ($displayMostViewed && $topAlbums)
{
$__compilerVar13 .= '
			';
$__compilerVar14 = '';
$__compilerVar14 .= '
				';
$__compilerVar15 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar15 .= '

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
$__compilerVar15 .= '
		<div class="img ">
			<a title="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" class="thumbSmall Tooltip ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay')) ? ('hasOverlay') : ('')) . '" href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '">
				<img title="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" src="' . htmlspecialchars($album['cover']['thumbnailSmall'], ENT_QUOTES, 'UTF-8') . '" />
			</a>
		</div>
		';
}
$__compilerVar15 .= '
	</div>
</div>';
$__compilerVar14 .= $__compilerVar15;
unset($__compilerVar15);
$__compilerVar14 .= '
			';
$__compilerVar13 .= $this->callTemplateHook('album_list_promoted', $__compilerVar14, array());
unset($__compilerVar14);
$__compilerVar13 .= '
		';
}
$__compilerVar13 .= '
		';
$__compilerVar16 = '';
$__compilerVar16 .= '
		';
foreach ($albums AS $album)
{
$__compilerVar16 .= '
			';
$__compilerVar17 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar17 .= '

<div class="itemGallery" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
	';
if ($album['cover'])
{
$__compilerVar17 .= '
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
$__compilerVar17 .= '
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
$__compilerVar17 .= '
	';
}
else
{
$__compilerVar17 .= '
		';
$imageHeight = '';
$imageHeight .= '110';
$__compilerVar17 .= '
		';
$imageHeightReal = '';
$imageHeightReal .= '110';
$__compilerVar17 .= '
	';
}
$__compilerVar17 .= '
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
$__compilerVar17 .= htmlspecialchars($album['photo_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'photos';
}
if ($album['video_count'])
{
$__compilerVar17 .= (($album['photo_count']) ? (' - ') : ('')) . htmlspecialchars($album['video_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'videos';
}
$__compilerVar17 .= '
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
$__compilerVar17 .= '
			<h3 class="deleteNotice">' . 'This album has been deleted.' . '</h3>
		';
}
$__compilerVar17 .= '
		';
if ($album['isModerated'])
{
$__compilerVar17 .= '
			<h3 class="deleteNotice">' . 'Awaiting Approval' . '</h3>
		';
}
$__compilerVar17 .= '
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
$__compilerVar16 .= $__compilerVar17;
unset($__compilerVar17);
$__compilerVar16 .= '
		';
}
$__compilerVar16 .= '
		';
$__compilerVar13 .= $this->callTemplateHook('album_list', $__compilerVar16, array());
unset($__compilerVar16);
$__compilerVar13 .= '
		<div id="infscr-loading">
			<img src="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_FFFFFF_facebook.gif" 
				alt="' . 'Loading albums' . '......" />
			<div><em>' . 'Loading albums' . '......</em></div>
		</div>
	';
}
else
{
$__compilerVar13 .= '
		<div class="noData">' . 'There is no album to display' . '</div>
	';
}
$__compilerVar13 .= '
</div>';
$__output .= $__compilerVar13;
unset($__compilerVar13);
$__output .= '
	
<div class="pageNavLinkGroup xengallery">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($albumsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalAlbums, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'gallery/new-albums', false, $pageNavParams, false, array())) . '
</div>
';
$__compilerVar18 = '';
$__compilerVar18 .= XenForo_Template_Helper_Core::link('canonical:gallery/new-albums', false, array());
$__compilerVar19 = '';
$__compilerVar20 = '';
$__compilerVar20 .= '
			';
$__compilerVar21 = '';
$__compilerVar21 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar21 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar18, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar21 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar21 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar18, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar21 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar21 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar21 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar18, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar21 .= '
			';
$__compilerVar20 .= $this->callTemplateHook('share_page_options', $__compilerVar21, array());
unset($__compilerVar21);
$__compilerVar20 .= '
		';
if (trim($__compilerVar20) !== '')
{
$__compilerVar19 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar19 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Chia sẻ trang này' . '</h3>
		' . $__compilerVar20 . '
	</div>
';
}
unset($__compilerVar20);
$__output .= $__compilerVar19;
unset($__compilerVar18, $__compilerVar19);
$__output .= '
';
$__compilerVar22 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar22, array());
unset($__compilerVar22);
