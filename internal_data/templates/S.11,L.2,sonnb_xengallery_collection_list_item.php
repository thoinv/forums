<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_collection_list_item');
$__output .= '

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
