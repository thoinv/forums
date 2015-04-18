<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_camera_list_item');
$__output .= '

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
