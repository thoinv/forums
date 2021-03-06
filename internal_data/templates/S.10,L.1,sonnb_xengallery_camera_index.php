<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Cameras' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Cameras';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'The most active cameras that are being used in gallery at ' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/cameras', '', array(
'page' => $page
)) . '" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
';
$__output .= '

';
$__extraData['head']['rss'] = '';
$__extraData['head']['rss'] .= '
	<link rel="alternate" type="application/rss+xml" title="' . 'RSS feed for ' . 'Cameras' . '' . '" href="' . XenForo_Template_Helper_Core::link('gallery/cameras/index.rss', false, array()) . '" />
';
$__output .= '

';
$__compilerVar1 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list');
$__compilerVar1 .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar1 .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.masonry.min.js');
$__compilerVar1 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.infinitescroll.min.js');
$__compilerVar1 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/modernizr.min.js');
$__compilerVar1 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.js');
$__compilerVar1 .= '

<div class="clearfix masonryContainer" ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll')) ? ('data-noAutoScroll="1"') : ('')) . ' data-imagesloaded="true" data-noresize="1" data-loading="' . 'Loading Cameras' . '..." data-finish="' . 'There are no more cameras to be loaded.' . '" data-ajax="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif">
	';
if ($cameras)
{
$__compilerVar1 .= '
		';
foreach ($cameras AS $camera)
{
$__compilerVar1 .= '
			';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar2 .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_camera_list_item');
$__compilerVar2 .= '

<div class="itemGallery itemCamera">
	<div class="img"> 
		<a href="' . XenForo_Template_Helper_Core::link('gallery/cameras', $camera, array()) . '">
			<img itemprop="thumbnailUrl" title="' . htmlspecialchars($camera['camera_name'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($camera['camera_name'], ENT_QUOTES, 'UTF-8') . '" src="' . (($camera['camera_thumbnail']) ? (htmlspecialchars($camera['camera_thumbnail'], ENT_QUOTES, 'UTF-8')) : (XenForo_Template_Helper_Core::styleProperty('sonnbXG_cameraNoThumbnail'))) . '" />
		</a>
	</div>

	<div class="infoAlbum clearfix">
		<div class="titleAlbum">
			<h3>
				<a href="' . XenForo_Template_Helper_Core::link('gallery/cameras', $camera, array()) . '">' . htmlspecialchars($camera['camera_name'], ENT_QUOTES, 'UTF-8') . '</a>
			</h3>
		</div>
		<div class="dateInfo">
			' . htmlspecialchars($camera['photo_count'], ENT_QUOTES, 'UTF-8') . ' ' . 'photos' . '
		</div>
	</div>
</div>';
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
$__compilerVar1 .= '
		';
}
$__compilerVar1 .= '
		<div id="infscr-loading">
			<img src="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_FFFFFF_facebook.gif" 
				alt="' . 'Loading Cameras' . '......" />
			<div><em>' . 'Loading Cameras' . '......</em></div>
		</div>
	';
}
else
{
$__compilerVar1 .= '
		<div class="noData">' . 'There is no camera to display.' . '</div>
	';
}
$__compilerVar1 .= '
</div>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
	
<div class="pageNavLinkGroup xengallery">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalCameras, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'gallery/cameras', false, $pageNavParams, false, array())) . '
</div>
';
$__compilerVar3 = '';
$__compilerVar3 .= XenForo_Template_Helper_Core::link('canonical:gallery/cameras', false, array());
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
