<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Shopping' . ': ' . htmlspecialchars($camera['camera_name'], ENT_QUOTES, 'UTF-8') . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= '<img style="margin-bottom: -17px" src="http://library.corporate-ir.net/library/17/176/176060/mediaitems/93/a.com_logo_th.jpg" />' . 'Shopping camera: ' . '<a href="' . XenForo_Template_Helper_Core::link('gallery/cameras', $camera, array()) . '">' . htmlspecialchars($camera['camera_name'], ENT_QUOTES, 'UTF-8') . '</a>' . '';
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:gallery/cameras/shopping', $camera, array(
'page' => $page
)) . '" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
';
$__output .= '

';
$__compilerVar8 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list');
$__compilerVar8 .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_camera_shopping_list_item');
$__compilerVar8 .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar8 .= '

';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.masonry.min.js');
$__compilerVar8 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/jquery.infinitescroll.min.js');
$__compilerVar8 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/modernizr.min.js');
$__compilerVar8 .= '
';
$this->addRequiredExternal('js', 'js/sonnb/XenGallery/gallery.js');
$__compilerVar8 .= '

<div class="clearfix masonryContainer" ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll')) ? ('data-noAutoScroll="1"') : ('')) . ' data-noresize="1" data-loading="' . 'Loading Cameras' . '..." data-finish="' . 'There are no more cameras to be loaded.' . '" data-ajax="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif">
	';
if ($items)
{
$__compilerVar8 .= '
		';
foreach ($items AS $item)
{
$__compilerVar8 .= '
			';
$__compilerVar9 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar9 .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_camera_list_item');
$__compilerVar9 .= '

<div class="itemGallery itemCamera shopping">
	<div class="img"> 
		<a href="' . htmlspecialchars($item['DetailPageURL'], ENT_QUOTES, 'UTF-8') . '">
			<img target="_blank" title="' . htmlspecialchars($item['ItemAttributes']['Title'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($item['ItemAttributes']['Title'], ENT_QUOTES, 'UTF-8') . '" src="' . htmlspecialchars($item['LargeImage']['URL'], ENT_QUOTES, 'UTF-8') . '" />
		</a>
	</div>

	<div class="infoAlbum clearfix">
		<div class="titleAlbum">
			<h3>
				<a target="_blank" href="' . htmlspecialchars($item['DetailPageURL'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($item['ItemAttributes']['Title'], ENT_QUOTES, 'UTF-8') . '</a>
			</h3>
		</div>
		<div class="dateInfo">
			';
if ($item['ItemAttributes']['Manufacturer'])
{
$__compilerVar9 .= '
				<dl class="pairsInline brand">
					<dt class="muted">' . 'by' . ':</dt>
					<dd><a href="javascript:void(0);">' . htmlspecialchars($item['ItemAttributes']['Manufacturer'], ENT_QUOTES, 'UTF-8') . '</a></dd>
				</dl>
			';
}
$__compilerVar9 .= '
			';
if ($item['ItemAttributes']['ListPrice']['FormattedPrice'])
{
$__compilerVar9 .= '
				<dl class="pairsInline listPrice">
					<dt class="muted">' . 'List Price' . ':</dt>
					<dd>' . htmlspecialchars($item['ItemAttributes']['ListPrice']['FormattedPrice'], ENT_QUOTES, 'UTF-8') . '</dd>
				</dl>
			';
}
$__compilerVar9 .= '
			';
if ($item['ItemAttributes']['TradeInValue']['FormattedPrice'])
{
$__compilerVar9 .= '
				<dl class="pairsInline price">
					<dt class="muted">' . 'Price' . ':</dt>
					<dd>' . htmlspecialchars($item['ItemAttributes']['TradeInValue']['FormattedPrice'], ENT_QUOTES, 'UTF-8') . '</dd>
				</dl>
			';
}
$__compilerVar9 .= '
			';
if ($item['ItemAttributes']['Color'])
{
$__compilerVar9 .= '
				<dl class="pairsInline color">
					<dt class="muted">' . 'Color' . ':</dt>
					<dd>' . htmlspecialchars($item['ItemAttributes']['Color'], ENT_QUOTES, 'UTF-8') . '</dd>
				</dl>
			';
}
$__compilerVar9 .= '
		</div>
	</div>
</div>';
$__compilerVar8 .= $__compilerVar9;
unset($__compilerVar9);
$__compilerVar8 .= '
		';
}
$__compilerVar8 .= '
		<div id="infscr-loading">
			<img src="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_FFFFFF_facebook.gif" 
				alt="' . 'Loading Cameras' . '......" />
			<div><em>' . 'Loading Cameras' . '......</em></div>
		</div>
	';
}
else
{
$__compilerVar8 .= '
		<div class="noData">' . 'There is no camera to display.' . '</div>
	';
}
$__compilerVar8 .= '
</div>';
$__output .= $__compilerVar8;
unset($__compilerVar8);
$__output .= '
	
<div class="pageNavLinkGroup xengallery">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalItems, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'gallery/cameras/shopping', $camera, array(), false, array())) . '
</div>
';
$__compilerVar10 = '';
$__compilerVar10 .= XenForo_Template_Helper_Core::link('canonical:gallery/cameras', false, array());
$__compilerVar11 = '';
$__compilerVar12 = '';
$__compilerVar12 .= '
			';
$__compilerVar13 = '';
$__compilerVar13 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar13 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar13 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar13 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar13 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar13 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar13 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar10, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar13 .= '
			';
$__compilerVar12 .= $this->callTemplateHook('share_page_options', $__compilerVar13, array());
unset($__compilerVar13);
$__compilerVar12 .= '
		';
if (trim($__compilerVar12) !== '')
{
$__compilerVar11 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar11 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Chia sẻ trang này' . '</h3>
		' . $__compilerVar12 . '
	</div>
';
}
unset($__compilerVar12);
$__output .= $__compilerVar11;
unset($__compilerVar10, $__compilerVar11);
$__output .= '
';
$__compilerVar14 = '';
$__output .= $this->callTemplateHook('sonnb_cr_information', $__compilerVar14, array());
unset($__compilerVar14);
