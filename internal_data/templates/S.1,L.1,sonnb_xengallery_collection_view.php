<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
if ($isGalleryIndex)
{
$__extraData['title'] .= 'Gallery' . ' - ';
}
$__extraData['title'] .= htmlspecialchars($collection['title'], ENT_QUOTES, 'UTF-8') . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
if ($isGalleryIndex)
{
$__extraData['h1'] .= 'Gallery' . ' - ';
}
$__extraData['h1'] .= htmlspecialchars($collection['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= $collection['description'];
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/collections', $collection, array(
'page' => $page
)) . '" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
';
$__output .= '

';
$__extraData['head']['rss'] = '';
$__extraData['head']['rss'] .= '
	<link rel="alternate" type="application/rss+xml" title="' . 'RSS feed for ' . htmlspecialchars($collection['title'], ENT_QUOTES, 'UTF-8') . '' . '" href="' . XenForo_Template_Helper_Core::link('gallery/collections/index.rss', $collection, array()) . '" />
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
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.mobile.js');
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
$__compilerVar2 = '';
$__output .= $this->callTemplateHook('gallery_ad_collection_view_above_photo_list', $__compilerVar2, array());
unset($__compilerVar2);
$__output .= '

<div class="clearfix masonryContainer" ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll')) ? ('data-noAutoScroll="1"') : ('')) . ' data-loading="' . 'Loading Photos' . '..." data-finish="' . 'There are no more photos to be loaded.' . '" data-ajax="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif">
	';
if ($itemRendered)
{
$__output .= '
		';
$__compilerVar3 = '';
$__compilerVar3 .= '
		';
foreach ($itemRendered AS $item)
{
$__compilerVar3 .= '
			' . $item . '
		';
}
$__compilerVar3 .= '
		';
$__output .= $this->callTemplateHook('collection_list', $__compilerVar3, array());
unset($__compilerVar3);
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
		<div class="noData">' . 'There is no album or photo in this collection.' . '</div>
	';
}
$__output .= '
</div>
	
<div class="pageNavLinkGroup xengallery">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($itemsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalItems, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), htmlspecialchars($linkPrefix, ENT_QUOTES, 'UTF-8'), $collection, $pageNavParams, false, array())) . '
</div>
';
$__compilerVar4 = '';
$__compilerVar4 .= XenForo_Template_Helper_Core::link('canonical:gallery/collections', $collection, array());
$__compilerVar5 = '';
$__compilerVar6 = '';
$__compilerVar6 .= '
			';
$__compilerVar7 = '';
$__compilerVar7 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar7 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar7 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar7 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar7 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar7 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar7 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar7 .= '
			';
$__compilerVar6 .= $this->callTemplateHook('share_page_options', $__compilerVar7, array());
unset($__compilerVar7);
$__compilerVar6 .= '
		';
if (trim($__compilerVar6) !== '')
{
$__compilerVar5 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar5 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Share This Page' . '</h3>
		' . $__compilerVar6 . '
	</div>
';
}
unset($__compilerVar6);
$__output .= $__compilerVar5;
unset($__compilerVar4, $__compilerVar5);
$__output .= '
';
$__compilerVar8 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar8, array());
unset($__compilerVar8);
