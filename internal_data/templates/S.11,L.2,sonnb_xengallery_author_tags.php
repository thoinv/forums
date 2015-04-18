<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Photos of ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '' . ' ' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Photos of ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'Photos that ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' was tagged in.';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/authors/tags', $user, array(
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
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.mobile.js');
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

<!--[if IE]>
';
$this->addRequiredExternal('css', 'sonnb_xengallery_author_view_ie');
$__output .= '
<![endif]-->

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
if (XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay'))
{
$__output .= '
	';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view');
$__output .= '
	';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.overlay.js');
$__output .= '
';
}
$__output .= '

<div class="userCover">
	';
$__compilerVar6 = '';
if ($canManageCover)
{
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.cover.js');
$__compilerVar6 .= '

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
$__compilerVar6 .= '

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
$__output .= $__compilerVar6;
unset($__compilerVar6);
$__output .= '
	<div class="subnav-holder">
		<ul class="tabs mainTabs">
			<li><a href="' . XenForo_Template_Helper_Core::link('gallery/authors', $user, array()) . '">' . 'Albums' . '</a></li>
			<li><a href="' . XenForo_Template_Helper_Core::link('gallery/authors/photos', $user, array()) . '">' . 'Photos' . '</a></li>
			<li><a href="' . XenForo_Template_Helper_Core::link('gallery/authors/videos', $user, array()) . '">' . 'Videos' . '</a></li>
			<li class="active"><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#">' . 'Tagged Photos' . '</a></li>
			<li class="profileTab"><a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '">' . 'Trang hồ sơ' . '</a></li>
		</ul>
	</div>
</div>

';
$__compilerVar7 = '';
$__output .= $this->callTemplateHook('ad_author_view_above_tag_list', $__compilerVar7, array());
unset($__compilerVar7);
$__output .= '

<div class="clearfix masonryContainer" ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll')) ? ('data-noAutoScroll="1"') : ('')) . ' data-loading="' . 'Loading Photos' . '..." data-finish="' . 'There are no more photos to be loaded.' . '" data-ajax="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif">
	';
if ($photos)
{
$__output .= '
		';
$__compilerVar8 = '';
$__compilerVar8 .= '
		';
foreach ($photos AS $photo)
{
$__compilerVar8 .= '
			';
$__compilerVar9 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar9 .= '
';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar9 .= '
	';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item_hover');
$__compilerVar9 .= '
';
}
$__compilerVar9 .= '

<div class="itemGallery photo" id="content_' . htmlspecialchars($photo['content_id'], ENT_QUOTES, 'UTF-8') . '">
	';
$imageHeight = '';
if ($photo['medium_width'] < XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_itemwidth'))
{
$imageHeight .= htmlspecialchars($photo['medium_height'], ENT_QUOTES, 'UTF-8');
}
else
{
$imageHeight .= ($photo['medium_height'] * (XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_itemwidth') / $photo['medium_width']));
}
$__compilerVar9 .= '
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
$__compilerVar9 .= '
	
	';
if ($photo['canInlineMod'])
{
$__compilerVar9 .= '
		<div class="inlineMod">
			<input type="checkbox" value="' . htmlspecialchars($photo['content_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-content-' . htmlspecialchars($photo['content_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#content_' . htmlspecialchars($photo['content_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select photo' . ': \'' . htmlspecialchars($photo['title'], ENT_QUOTES, 'UTF-8') . '\'" name="sxgcontents" autocomplete="off" />
		</div>
	';
}
$__compilerVar9 .= '
	';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar9 .= '
		<div class="photoDate">
			';
if ($photo['content_updated_date'])
{
$__compilerVar9 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($photo['content_updated_date'],array(
'time' => htmlspecialchars($photo['content_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else
{
$__compilerVar9 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($photo['content_date'],array(
'time' => htmlspecialchars($photo['content_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
$__compilerVar9 .= '
			<span class="bg">&nbsp;</span>
		</div>
	';
}
$__compilerVar9 .= '
	<div class="img" data-height="' . htmlspecialchars($photo['medium_height'], ENT_QUOTES, 'UTF-8') . '" data-width="' . htmlspecialchars($photo['medium_width'], ENT_QUOTES, 'UTF-8') . '"> 
		<a class="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay')) ? ('hasOverlay') : ('')) . '" href="' . XenForo_Template_Helper_Core::link('gallery/photos', $photo, array()) . '" 
			title="' . (($photo['title']) ? (htmlspecialchars($photo['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $photo['description'],
'1' => '100'
)))) . '"
			data-cacheOverlay="false" data-overlayOptions="{&quot;fixed&quot;:false}" style="width:220px; height: ' . htmlspecialchars($imageHeightReal, ENT_QUOTES, 'UTF-8') . 'px; max-height:' . htmlspecialchars($imageHeightReal, ENT_QUOTES, 'UTF-8') . 'px;">
			<img class="lazy" alt="' . (($photo['title']) ? (htmlspecialchars($photo['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $photo['description'],
'1' => '100'
)))) . '" title="' . (($photo['title']) ? (htmlspecialchars($photo['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $photo['description'],
'1' => '100'
)))) . '" data-src="' . htmlspecialchars($photo['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" />
			<noscript><img alt="' . (($photo['title']) ? (htmlspecialchars($photo['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $photo['description'],
'1' => '100'
)))) . '" title="' . (($photo['title']) ? (htmlspecialchars($photo['title'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::callHelper('wordTrim', array(
'0' => $photo['description'],
'1' => '100'
)))) . '" src="' . htmlspecialchars($photo['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" /></noscript>
			';
if ($photo['is_animated'])
{
$__compilerVar9 .= '<i class="icon gif"></i>';
}
$__compilerVar9 .= '
		</a>
	</div>
	';
if (!XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar9 .= '
		<div class="infoAlbum clearfix">
			<div class="titleAlbum">
				<h3 style="text-align: left;">
					<a href="' . XenForo_Template_Helper_Core::link('gallery/photos', $photo, array()) . '">' . htmlspecialchars($photo['title'], ENT_QUOTES, 'UTF-8') . '</a>
				</h3>
			</div>
			<div class="userInfo">
				<a title="' . htmlspecialchars($photo['username'], ENT_QUOTES, 'UTF-8') . '" href="' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? (XenForo_Template_Helper_Core::link('gallery/authors', $photo, array())) : (XenForo_Template_Helper_Core::link('members', $photo, array()))) . '" class="' . ((!XenForo_Template_Helper_Core::styleProperty('sonnbXG_showUserPage')) ? ('username') : ('')) . '">' . htmlspecialchars($photo['username'], ENT_QUOTES, 'UTF-8') . '</a>
				
			</div>
			<div class="dateInfo">
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($photo['content_updated_date'],array(
'time' => htmlspecialchars($photo['content_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
			</div>
			';
if ($photo['isDeleted'])
{
$__compilerVar9 .= '
				<h3 class="deleteNotice">' . 'This photo has been deleted.' . '</h3>
			';
}
$__compilerVar9 .= '
			';
if ($photo['isModerated'])
{
$__compilerVar9 .= '
				<h3 class="deleteNotice">' . 'Awaiting Approval' . '</h3>
			';
}
$__compilerVar9 .= '
		</div>
	';
}
$__compilerVar9 .= '
	<ul class="toolAlbum">
		<li class="likeAlbum">
			<a data-container="#likeCount_' . htmlspecialchars($photo['content_id'], ENT_QUOTES, 'UTF-8') . '" class="control ' . (($photo['canLike']) ? ('like') : ('')) . ' ' . (($photo['like_date']) ? ('active') : ('')) . '" title="' . (($photo['canLike'] && $photo['like_date']) ? ('Unlike this photo') : ('Like this photo')) . '"
				href="' . (($photo['canLike']) ? (XenForo_Template_Helper_Core::link('gallery/photos/like', $photo, array())) : ('javascript:void(0);')) . '"><i></i><span id="likeCount_' . htmlspecialchars($photo['content_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($photo['likes'], ENT_QUOTES, 'UTF-8') . '</span></a>
		</li>
		<li class="commentAlbum">
			<a title="' . 'Leave a comment' . '" class="CommentLink control comment ' . (($photo['comment_count']) ? ('hasComment') : ('')) . '" href="' . (($photo['canComment']) ? (XenForo_Template_Helper_Core::link('gallery/photos', $photo, array()) . '#commentPhoto' . htmlspecialchars($photo['content_id'], ENT_QUOTES, 'UTF-8')) : ('javascript:void(0);')) . '"><i></i>' . htmlspecialchars($photo['comment_count'], ENT_QUOTES, 'UTF-8') . '</a>
		</li>
		<li class="viewAlbum">
			<a><i></i>' . htmlspecialchars($photo['view_count'], ENT_QUOTES, 'UTF-8') . '</a>
		</li>
	</ul>
</div>';
$__compilerVar8 .= $__compilerVar9;
unset($__compilerVar9);
$__compilerVar8 .= '
		';
}
$__compilerVar8 .= '
		';
$__output .= $this->callTemplateHook('author_tag_list', $__compilerVar8, array());
unset($__compilerVar8);
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
		<div class="noData">' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' was not tagged in any photo yet.' . '</div>
	';
}
$__output .= '
</div>
	
<div class="pageNavLinkGroup xengallery">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($tagsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalTags, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'gallery/authors/tags', $user, $pageNavParams, false, array())) . '
</div>
';
$__compilerVar10 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar10, array());
unset($__compilerVar10);
