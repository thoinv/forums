<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
if ($isGalleryIndex)
{
$__extraData['title'] .= 'Gallery' . ' - ';
}
$__extraData['title'] .= 'Collections' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
if ($isGalleryIndex)
{
$__extraData['h1'] .= 'Gallery' . ' - ';
}
$__extraData['h1'] .= 'Collections';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'All interesting, fantastic and amazing photos/albums collected and promoted by our staffs on ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . ' ';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/collections', '', array(
'page' => $page
)) . '" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
';
$__output .= '

';
$__extraData['head']['rss'] = '';
$__extraData['head']['rss'] .= '
	<link rel="alternate" type="application/rss+xml" title="' . 'RSS feed for ' . 'Collections' . '' . '" href="' . XenForo_Template_Helper_Core::link('gallery/collections/index.rss', false, array()) . '" />
';
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

<div class="clearfix masonryContainer" data-imagesLoaded="1" ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll')) ? ('data-noAutoScroll="1"') : ('')) . ' data-loading="' . 'Loading Collections' . '..." data-finish="' . 'There are no more collections to be loaded.' . '" data-ajax="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif">
	';
if ($collections)
{
$__output .= '
		';
foreach ($collections AS $collection)
{
$__output .= '
			';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar2 .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_collection_list_item');
$__compilerVar2 .= '

<div class="itemGallery itemCollection">
	<div class="img"> 
		<a href="' . XenForo_Template_Helper_Core::link('gallery/collections', $collection, array()) . '">
			<img title="' . htmlspecialchars($collection['title'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($collection['title'], ENT_QUOTES, 'UTF-8') . '"
				src="' . (($collection['thumbnail']) ? (htmlspecialchars($collection['thumbnail'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::styleProperty('sonnbXG_collectionNoThumbnail'))) . '" />
		</a>
	</div>

	<div class="infoAlbum clearfix">
		<div class="titleAlbum">
			<h3>
				<a href="' . XenForo_Template_Helper_Core::link('gallery/collections', $collection, array()) . '">' . htmlspecialchars($collection['title'], ENT_QUOTES, 'UTF-8') . '</a>
			</h3>
		</div>
		<div class="description">
			<span>' . $collection['description'] . '</span>
		</div>
		<div class="dateInfo">
			' . htmlspecialchars($collection['item_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'Items' . '
		</div>
	</div>
</div>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
		';
}
$__output .= '
		<div id="infscr-loading">
			<img src="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_FFFFFF_facebook.gif" 
				alt="' . 'Loading Collections' . '......" />
			<div><em>' . 'Loading Collections' . '......</em></div>
		</div>
	';
}
else
{
$__output .= '
		<div class="noData">' . 'There is no collection to display.' . '</div>
	';
}
$__output .= '
</div>
	
<div class="pageNavLinkGroup xengallery">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($itemsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalItems, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), htmlspecialchars($linkPrefix, ENT_QUOTES, 'UTF-8'), false, $pageNavParams, false, array())) . '
</div>
';
$__compilerVar3 = '';
$__compilerVar3 .= XenForo_Template_Helper_Core::link('canonical:gallery/collections', false, array());
$__compilerVar4 = '';
$__compilerVar5 = '';
$__compilerVar5 .= '
			';
$__compilerVar6 = '';
$__compilerVar6 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar6 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar6 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar6 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar6 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar6 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar6 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar6 .= '
			';
$__compilerVar5 .= $this->callTemplateHook('share_page_options', $__compilerVar6, array());
unset($__compilerVar6);
$__compilerVar5 .= '
		';
if (trim($__compilerVar5) !== '')
{
$__compilerVar4 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar4 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Share This Page' . '</h3>
		' . $__compilerVar5 . '
	</div>
';
}
unset($__compilerVar5);
$__output .= $__compilerVar4;
unset($__compilerVar3, $__compilerVar4);
$__output .= '
';
$__compilerVar7 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar7, array());
unset($__compilerVar7);
