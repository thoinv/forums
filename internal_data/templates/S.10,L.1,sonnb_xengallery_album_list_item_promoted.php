<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__output .= '

<div class="itemGallery topItem">
	<div class="titleTopItem">
		<h2>
			<a><i></i>' . 'Most Viewed Albums' . '</a>
		</h2>
	</div>
	<div class="clearfix">
		';
foreach ($topAlbums AS $album)
{
$__output .= '
		<div class="img ">
			<a title="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" class="thumbSmall Tooltip ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXG_enableOverlay')) ? ('hasOverlay') : ('')) . '" href="' . XenForo_Template_Helper_Core::link('gallery/albums', $album, array()) . '">
				<img title="' . htmlspecialchars($album['title'], ENT_QUOTES, 'UTF-8') . '" src="' . htmlspecialchars($album['cover']['thumbnailSmall'], ENT_QUOTES, 'UTF-8') . '" />
			</a>
		</div>
		';
}
$__output .= '
	</div>
</div>';
