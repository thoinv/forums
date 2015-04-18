<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sonnb_xengallery_album_list_item');
$__output .= '
';
$this->addRequiredExternal('css', 'sonnb_xengallery_camera_list_item');
$__output .= '

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
$__output .= '
				<dl class="pairsInline brand">
					<dt class="muted">' . 'by' . ':</dt>
					<dd><a href="javascript:void(0);">' . htmlspecialchars($item['ItemAttributes']['Manufacturer'], ENT_QUOTES, 'UTF-8') . '</a></dd>
				</dl>
			';
}
$__output .= '
			';
if ($item['ItemAttributes']['ListPrice']['FormattedPrice'])
{
$__output .= '
				<dl class="pairsInline listPrice">
					<dt class="muted">' . 'List Price' . ':</dt>
					<dd>' . htmlspecialchars($item['ItemAttributes']['ListPrice']['FormattedPrice'], ENT_QUOTES, 'UTF-8') . '</dd>
				</dl>
			';
}
$__output .= '
			';
if ($item['ItemAttributes']['TradeInValue']['FormattedPrice'])
{
$__output .= '
				<dl class="pairsInline price">
					<dt class="muted">' . 'Price' . ':</dt>
					<dd>' . htmlspecialchars($item['ItemAttributes']['TradeInValue']['FormattedPrice'], ENT_QUOTES, 'UTF-8') . '</dd>
				</dl>
			';
}
$__output .= '
			';
if ($item['ItemAttributes']['Color'])
{
$__output .= '
				<dl class="pairsInline color">
					<dt class="muted">' . 'Color' . ':</dt>
					<dd>' . htmlspecialchars($item['ItemAttributes']['Color'], ENT_QUOTES, 'UTF-8') . '</dd>
				</dl>
			';
}
$__output .= '
		</div>
	</div>
</div>';
