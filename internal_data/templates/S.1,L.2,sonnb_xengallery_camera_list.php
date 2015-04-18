<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
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

<div class="clearfix masonryContainer" ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll')) ? ('data-noAutoScroll="1"') : ('')) . ' data-imagesloaded="true" data-noresize="1" data-loading="' . 'Loading Cameras' . '..." data-finish="' . 'There are no more cameras to be loaded.' . '" data-ajax="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif">
	';
if ($cameras)
{
$__output .= '
		';
foreach ($cameras AS $camera)
{
$__output .= '
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
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
		';
}
$__output .= '
		<div id="infscr-loading">
			<img src="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_FFFFFF_facebook.gif" 
				alt="' . 'Loading Cameras' . '......" />
			<div><em>' . 'Loading Cameras' . '......</em></div>
		</div>
	';
}
else
{
$__output .= '
		<div class="noData">' . 'There is no camera to display.' . '</div>
	';
}
$__output .= '
</div>';
