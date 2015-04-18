<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Camera' . ': ' . htmlspecialchars($camera['camera_name'], ENT_QUOTES, 'UTF-8') . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Camera' . ': ' . htmlspecialchars($camera['camera_name'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'Explore more photos uploaded by the camera ' . htmlspecialchars($camera['camera_name'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/cameras', $camera, array(
'page' => $page
)) . '" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
$this->addRequiredExternal('css', 'sonnb_xengallery_camera_view');
$__output .= '

<div class="camera-header">
	<div class="camera-image">
		<div class="camera-model-wrapper">
			<img class="camera-model-image" alt="' . htmlspecialchars($camera['camera_name'], ENT_QUOTES, 'UTF-8') . '" src="' . (($camera['camera_thumbnail']) ? (htmlspecialchars($camera['camera_thumbnail'], ENT_QUOTES, 'UTF-8')) : ('styles/sonnb/XenGallery/camera-no-image.jpg')) . '">
		</div>
	</div>
	<div class="camera-specifications">
		<h3>' . 'Specifications' . '</h3>
		<ul class="specs">
			';
if ($camera['camera_data'])
{
$__output .= '
				';
foreach ($camera['camera_data'] AS $key => $data)
{
$__output .= '
					';
if ($data['value'])
{
$__output .= '<li><b>' . $data['name'] . ':</b>' . htmlspecialchars($data['value'], ENT_QUOTES, 'UTF-8') . '</li>';
}
$__output .= '
				';
}
$__output .= '
			';
}
$__output .= '
			';
if ($xenOptions['sonnbXG_amazonEnable'])
{
$__output .= '
				<li><b></b><a href="' . XenForo_Template_Helper_Core::link('gallery/cameras/shopping', $camera, array()) . '">' . 'Buy this camera' . '</a></li>
			';
}
$__output .= '
		</ul>
	</div>
</div>	

<div class="photo-header">
	<h3>' . 'Photos taken by a ' . htmlspecialchars($camera['camera_name'], ENT_QUOTES, 'UTF-8') . '' . '</h3>
</div>

';
$__compilerVar1 = '';
$__output .= $this->callTemplateHook('ad_camera_view_above_camera_list', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '

';
if ($contents)
{
$__output .= '
	';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list');
$__compilerVar2 .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar2 .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view');
$__compilerVar2 .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.masonry.min.js');
$__compilerVar2 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.infinitescroll.min.js');
$__compilerVar2 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/modernizr.min.js');
$__compilerVar2 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.js');
$__compilerVar2 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.overlay.js');
$__compilerVar2 .= '

<div class="clearfix masonryContainer" ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll')) ? ('data-noAutoScroll="1"') : ('')) . ' data-loading="' . 'Loading Photos' . '..." data-finish="' . 'There are no more photos to be loaded.' . '" data-ajax="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif">
	';
if ($contents)
{
$__compilerVar2 .= '
		';
$__compilerVar3 = '';
$__compilerVar3 .= '
		';
foreach ($contents AS $content)
{
$__compilerVar3 .= '
			';
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar4 .= '
';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar4 .= '
	';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item_hover');
$__compilerVar4 .= '
';
}
$__compilerVar4 .= '

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
if ($content['canInlineMod'])
{
$__compilerVar4 .= '
		<div class="inlineMod">
			<input type="checkbox" value="' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-content-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#content_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select photo' . ': \'' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '\'" name="sxgcontents" autocomplete="off" />
		</div>
	';
}
$__compilerVar4 .= '
	';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar4 .= '
		<div class="photoDate">
			';
if ($content['content_updated_date'])
{
$__compilerVar4 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_updated_date'],array(
'time' => htmlspecialchars($content['content_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else
{
$__compilerVar4 .= '
				' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => htmlspecialchars($content['content_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
$__compilerVar4 .= '
			<span class="bg">&nbsp;</span>
		</div>
	';
}
$__compilerVar4 .= '
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
$__compilerVar4 .= '<i class="icon gif"></i>';
}
$__compilerVar4 .= '
		</a>
	</div>
	';
if (!XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar4 .= '
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
$__compilerVar4 .= '
				<h3 class="deleteNotice">' . 'This photo has been deleted.' . '</h3>
			';
}
$__compilerVar4 .= '
			';
if ($content['isModerated'])
{
$__compilerVar4 .= '
				<h3 class="deleteNotice">' . 'Awaiting Approval' . '</h3>
			';
}
$__compilerVar4 .= '
		</div>
	';
}
$__compilerVar4 .= '
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
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
$__compilerVar3 .= '
		';
}
$__compilerVar3 .= '
		';
$__compilerVar2 .= $this->callTemplateHook('photo_list', $__compilerVar3, array());
unset($__compilerVar3);
$__compilerVar2 .= '
		<div id="infscr-loading">
			<img src="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_FFFFFF_facebook.gif" 
				alt="' . 'Loading Photos' . '......" />
			<div><em>' . 'Loading Photos' . '......</em></div>
		</div>
	';
}
else
{
$__compilerVar2 .= '
		<div class="noData">' . 'There is no photo in this album yet.' . '</div>
	';
}
$__compilerVar2 .= '
</div>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
';
}
else
{
$__output .= '
	<div class="noData">' . 'There is no photo was taken by this camera.' . '</div>
';
}
$__output .= '	

<div class="pageNavLinkGroup xengallery">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($photosPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalPhotos, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'gallery/cameras', $camera, $pageNavParams, false, array())) . '
</div>
';
$__compilerVar5 = '';
$__compilerVar5 .= XenForo_Template_Helper_Core::link('canonical:gallery/cameras', $camera, array());
$__compilerVar6 = '';
$__compilerVar7 = '';
$__compilerVar7 .= '
			';
$__compilerVar8 = '';
$__compilerVar8 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar8 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar8 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar8 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar8 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar8 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar8 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar8 .= '
			';
$__compilerVar7 .= $this->callTemplateHook('share_page_options', $__compilerVar8, array());
unset($__compilerVar8);
$__compilerVar7 .= '
		';
if (trim($__compilerVar7) !== '')
{
$__compilerVar6 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar6 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Share This Page' . '</h3>
		' . $__compilerVar7 . '
	</div>
';
}
unset($__compilerVar7);
$__output .= $__compilerVar6;
unset($__compilerVar5, $__compilerVar6);
$__output .= '
';
$__compilerVar9 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar9, array());
unset($__compilerVar9);
