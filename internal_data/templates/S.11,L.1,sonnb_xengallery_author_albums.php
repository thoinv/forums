<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '\'s albums' . ' ' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '\'s albums';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'All albums that ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' has created at ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/authors', $user, array(
'page' => $page
)) . '" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_author_view');
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

<!--[if IE]>
';
$this->addRequiredExternal('css', 'sonnb_xengallery_author_view_ie');
$__output .= '
<![endif]-->

<div class="userCover">
	';
$__compilerVar1 = '';
if ($canManageCover)
{
$__compilerVar1 .= '
	';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.cover.js');
$__compilerVar1 .= '

	<ul class="controls">
		<li title="' . 'Delete Cover' . '" class="button delete" style="' . ((empty($user['sonnb_xengallery_cover'])) ? ('display: none;') : ('')) . '"><span class="icon delete"></span></li>
		<li title="' . 'Upload Cover Image' . '" class="button upload">
			<form action="' . XenForo_Template_Helper_Core::link('gallery/authors/cover-upload', $user, array()) . '" method="post" enctype="multipart/form-data"
				class="AutoInlineUploader formOverlay">
				<input type="file" name="cover" class="textCtrl" onchange="this.blur()" id="ctrl_cover" title="' . 'Supported formats: JPEG, PNG, GIF' . '" />
				<span class="icon upload"></span>
			
				<input type="hidden" name="crop_x" value="" autocomplete="off" />
				<input type="hidden" name="crop_y" value="" autocomplete="off" />
				<input type="hidden" name="width" value="" autocomplete="off" />
				<input type="hidden" name="height" value="" autocomplete="off" />
				<input type="hidden" name="delete" value="" autocomplete="off" />
				<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" autocomplete="off" />
			</form>
		</li>
		<li title="' . 'Change Cover Position' . '" class="button edit"><span class="icon edit"></span></li>
	</ul>
';
}
$__compilerVar1 .= '

<label class="CoverCropControl" style="' . ((empty($user['sonnb_xengallery_cover'])) ? ('display: none;') : ('')) . '"><img class="coverImage" src="' . XenForo_Template_Helper_Core::callHelper('sonnb_xengallery_cover', array(
'0' => $user
)) . '" /></label>
<a class="avatar Av6m">
	<span style="background-image: url(\'' . XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $user,
'1' => 'm'
)) . '\')" class="img m"></span>
</a>
<div class="person">
	<h1><span class="character-name-holder">' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</span></h1>
</div>
<div class="stats">
	<div class="stat statcount">
		<h1>' . htmlspecialchars($user['sonnb_xengallery_album_count'], ENT_QUOTES, 'UTF-8') . '</h1>
		<h2>' . 'Albums' . '</h2>
	</div>
	<div class="stat statcount">
		<h1>' . htmlspecialchars($user['sonnb_xengallery_photo_count'], ENT_QUOTES, 'UTF-8') . '</h1>
		<h2>' . 'Photos' . '</h2>
	</div>
	<div class="stat statcount">
		<h1>' . htmlspecialchars($user['sonnb_xengallery_video_count'], ENT_QUOTES, 'UTF-8') . '</h1>
		<h2>' . 'Videos' . '</h2>
	</div>
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
	<div class="subnav-holder">
		<ul class="tabs mainTabs">
			<li class="active"><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#">' . 'Albums' . '</a></li>
			<li><a href="' . XenForo_Template_Helper_Core::link('gallery/authors/photos', $user, array()) . '">' . 'Photos' . '</a></li>
			<li><a href="' . XenForo_Template_Helper_Core::link('gallery/authors/videos', $user, array()) . '">' . 'Videos' . '</a></li>
			<li><a href="' . XenForo_Template_Helper_Core::link('gallery/authors/tags', $user, array()) . '">' . 'Tagged Photos' . '</a></li>
			<li class="profileTab"><a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '">' . 'Profile Page' . '</a></li>
		</ul>
	</div>
</div>

';
$__compilerVar2 = '';
$__output .= $this->callTemplateHook('ad_author_view_above_album_list', $__compilerVar2, array());
unset($__compilerVar2);
$__output .= '

<div class="clearfix masonryContainer" ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll')) ? ('data-noAutoScroll="1"') : ('')) . ' data-loading="' . 'Loading albums' . '..." data-finish="' . 'There are no more albums to be loaded.' . '" data-ajax="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif">
	';
if ($albums)
{
$__output .= '
		';
$__compilerVar3 = '';
$__compilerVar3 .= '
		';
foreach ($albums AS $album)
{
$__compilerVar3 .= '
			';
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar4 .= '

<div class="itemGallery" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
	';
if ($album['cover'])
{
$__compilerVar4 .= '
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
$__compilerVar4 .= '
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
$__compilerVar4 .= '
	';
}
else
{
$__compilerVar4 .= '
		';
$imageHeight = '';
$imageHeight .= '110';
$__compilerVar4 .= '
		';
$imageHeightReal = '';
$imageHeightReal .= '110';
$__compilerVar4 .= '
	';
}
$__compilerVar4 .= '
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
$__compilerVar4 .= htmlspecialchars($album['photo_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'photos';
}
if ($album['video_count'])
{
$__compilerVar4 .= (($album['photo_count']) ? (' - ') : ('')) . htmlspecialchars($album['video_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'videos';
}
$__compilerVar4 .= '
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
$__compilerVar4 .= '
			<h3 class="deleteNotice">' . 'This album has been deleted.' . '</h3>
		';
}
$__compilerVar4 .= '
		';
if ($album['isModerated'])
{
$__compilerVar4 .= '
			<h3 class="deleteNotice">' . 'Awaiting Approval' . '</h3>
		';
}
$__compilerVar4 .= '
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
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
$__compilerVar3 .= '
		';
}
$__compilerVar3 .= '
		';
$__output .= $this->callTemplateHook('author_album_list', $__compilerVar3, array());
unset($__compilerVar3);
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
		<div class="noData">' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' has not created any album yet.' . '</div>
	';
}
$__output .= '
</div>
	
<div class="pageNavLinkGroup xengallery">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($albumsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalAlbums, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'gallery/authors', $user, $pageNavParams, false, array())) . '
</div>
';
$__compilerVar5 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar5, array());
unset($__compilerVar5);
