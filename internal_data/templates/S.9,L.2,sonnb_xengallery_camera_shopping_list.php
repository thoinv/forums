<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_camera_shopping_list_item');
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

<div class="clearfix masonryContainer" ' . ((XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll')) ? ('data-noAutoScroll="1"') : ('')) . ' data-noresize="1" data-loading="' . 'Loading Cameras' . '..." data-finish="' . 'There are no more cameras to be loaded.' . '" data-ajax="' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif">
	';
if ($items)
{
$__output .= '
		';
foreach ($items AS $item)
{
$__output .= '
			';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__compilerVar2 .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_camera_list_item');
$__compilerVar2 .= '

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
$__compilerVar2 .= '
				<dl class="pairsInline brand">
					<dt class="muted">' . 'by' . ':</dt>
					<dd><a href="javascript:void(0);">' . htmlspecialchars($item['ItemAttributes']['Manufacturer'], ENT_QUOTES, 'UTF-8') . '</a></dd>
				</dl>
			';
}
$__compilerVar2 .= '
			';
if ($item['ItemAttributes']['ListPrice']['FormattedPrice'])
{
$__compilerVar2 .= '
				<dl class="pairsInline listPrice">
					<dt class="muted">' . 'List Price' . ':</dt>
					<dd>' . htmlspecialchars($item['ItemAttributes']['ListPrice']['FormattedPrice'], ENT_QUOTES, 'UTF-8') . '</dd>
				</dl>
			';
}
$__compilerVar2 .= '
			';
if ($item['ItemAttributes']['TradeInValue']['FormattedPrice'])
{
$__compilerVar2 .= '
				<dl class="pairsInline price">
					<dt class="muted">' . 'Price' . ':</dt>
					<dd>' . htmlspecialchars($item['ItemAttributes']['TradeInValue']['FormattedPrice'], ENT_QUOTES, 'UTF-8') . '</dd>
				</dl>
			';
}
$__compilerVar2 .= '
			';
if ($item['ItemAttributes']['Color'])
{
$__compilerVar2 .= '
				<dl class="pairsInline color">
					<dt class="muted">' . 'Color' . ':</dt>
					<dd>' . htmlspecialchars($item['ItemAttributes']['Color'], ENT_QUOTES, 'UTF-8') . '</dd>
				</dl>
			';
}
$__compilerVar2 .= '
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
