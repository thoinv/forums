<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Add New Videos';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__output .= '

';
$__extraData['head']['robots'] = '';
$__extraData['head']['robots'] .= '
	<meta name="robots" content="noindex" />
';
$__output .= '

';
$this->addRequiredExternal('css', 'sonnb_xengallery_photo_create');
$__output .= '

<div class="section">
	<ul class="addPhotoSelect blockLinksList secondaryContent">
		<li>
			<a class="OverlayTrigger" href="' . XenForo_Template_Helper_Core::link('gallery/videos/album-select', false, array()) . '">' . 'Add to an existing album' . '</a>
		</li>
		<li>
			<a href="' . XenForo_Template_Helper_Core::link('gallery/videos/add', false, array()) . '">' . 'Add to default album' . '</a>
		</li>
		<li>
			<a href="' . XenForo_Template_Helper_Core::link('gallery/albums/create', false, array()) . '">' . 'Create New Album' . '</a>
		</li>
	</ul>
	<div class="sectionFooter overlayOnly">
		<a class="button primary OverlayCloser">' . 'Close' . '</a>
	</div>
</div>';
