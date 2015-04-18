<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
if ($isGalleryIndex)
{
$__extraData['title'] .= 'Gallery' . ' - ';
}
$__extraData['title'] .= 'New Videos' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
if ($isGalleryIndex)
{
$__extraData['h1'] .= 'Gallery' . ' - ';
}
$__extraData['h1'] .= 'New Videos';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'These are all newly created videos from ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '.';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/new-videos', '', array(
'page' => $page
)) . '" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
';
$__output .= '

';
$__extraData['head']['rss'] = '';
$__extraData['head']['rss'] .= '
	<link rel="alternate" type="application/rss+xml" title="' . 'RSS feed for ' . 'New Videos' . '' . '" href="' . XenForo_Template_Helper_Core::link('gallery/new-videos.rss', false, array()) . '" />
';
$__output .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.mobile.js');
$__output .= '

';
if ($isGalleryIndex)
{
$__output .= '
	';
$__compilerVar1 = '';
if ($canCreateAlbum)
{
$__compilerVar1 .= '
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
$__compilerVar1 .= '
';
}
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
';
}
$__output .= '

';
$__compilerVar2 = '';
$__output .= $this->callTemplateHook('gallery_ad_new_videos_above_video_list', $__compilerVar2, array());
unset($__compilerVar2);
$__output .= '

';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list');
$__compilerVar3 .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar3 .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_view');
$__compilerVar3 .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.masonry.min.js');
$__compilerVar3 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.infinitescroll.min.js');
$__compilerVar3 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/modernizr.min.js');
$__compilerVar3 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.js');
$__compilerVar3 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.overlay.js');
$__compilerVar3 .= '

<div class="clearfix masonryContainer" ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll')) ? ('data-noAutoScroll="1"') : ('')) . ' data-loading="' . 'Loading Photos' . '..." data-finish="' . 'There are no more photos to be loaded.' . '" data-ajax="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif">
	';
if ($contents)
{
$__compilerVar3 .= '
		';
$__compilerVar4 = '';
$__compilerVar4 .= '
		';
foreach ($contents AS $content)
{
$__compilerVar4 .= '
			';
$__compilerVar5 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar5 .= '
';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryPhotoHover'))
{
$__compilerVar5 .= '
	';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item_hover');
$__compilerVar5 .= '
';
}
$__compilerVar5 .= '

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
$__compilerVar5 .= '
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
$__compilerVar5 .= '
	
	';
if ($content['canInlineMod'])
{
$__compilerVar5 .= '
		<div class="inlineMod">
			<input type="checkbox" value="' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" id="inlineModCheck-content-' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" data-target="#content_' . htmlspecialchars($content['content_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select video' . ': \'' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '\'" name="sxgcontents" autocomplete="off" />
		</div>
	';
}
$__compilerVar5 .= '
	<div class="photoDate">
		';
if ($content['content_updated_date'])
{
$__compilerVar5 .= '
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_updated_date'],array(
'time' => htmlspecialchars($content['content_updated_date'], ENT_QUOTES, 'UTF-8')
))) . '
		';
}
else
{
$__compilerVar5 .= '
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($content['content_date'],array(
'time' => htmlspecialchars($content['content_date'], ENT_QUOTES, 'UTF-8')
))) . '
		';
}
$__compilerVar5 .= '
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
$__compilerVar5 .= '
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
$__compilerVar5 .= '
				<h3 class="deleteNotice">' . 'This photo has been deleted.' . '</h3>
			';
}
$__compilerVar5 .= '
			';
if ($content['isModerated'])
{
$__compilerVar5 .= '
				<h3 class="deleteNotice">' . 'Awaiting Approval' . '</h3>
			';
}
$__compilerVar5 .= '
		</div>
	';
}
$__compilerVar5 .= '
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
$__compilerVar4 .= $__compilerVar5;
unset($__compilerVar5);
$__compilerVar4 .= '
		';
}
$__compilerVar4 .= '
		';
$__compilerVar3 .= $this->callTemplateHook('video_list', $__compilerVar4, array());
unset($__compilerVar4);
$__compilerVar3 .= '
		<div id="infscr-loading">
			<img src="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_FFFFFF_facebook.gif" 
				alt="' . 'Loading Photos' . '......" />
			<div><em>' . 'Loading Photos' . '......</em></div>
		</div>
	';
}
else
{
$__compilerVar3 .= '
		<div class="noData">' . 'There is no video in this album.' . '</div>
	';
}
$__compilerVar3 .= '
</div>';
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '
	
<div class="pageNavLinkGroup xengallery">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($videosPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalVideos, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), htmlspecialchars($linkPrefix, ENT_QUOTES, 'UTF-8'), false, $pageNavParams, false, array())) . '
</div>
';
$__compilerVar6 = '';
$__compilerVar6 .= XenForo_Template_Helper_Core::link('canonical:gallery/new-videos', false, array());
$__compilerVar7 = '';
$__compilerVar8 = '';
$__compilerVar8 .= '
			';
$__compilerVar9 = '';
$__compilerVar9 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar9 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar9 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar9 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar9 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar9 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar9 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar9 .= '
			';
$__compilerVar8 .= $this->callTemplateHook('share_page_options', $__compilerVar9, array());
unset($__compilerVar9);
$__compilerVar8 .= '
		';
if (trim($__compilerVar8) !== '')
{
$__compilerVar7 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar7 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Share This Page' . '</h3>
		' . $__compilerVar8 . '
	</div>
';
}
unset($__compilerVar8);
$__output .= $__compilerVar7;
unset($__compilerVar6, $__compilerVar7);
$__output .= '
';
$__compilerVar10 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar10, array());
unset($__compilerVar10);
