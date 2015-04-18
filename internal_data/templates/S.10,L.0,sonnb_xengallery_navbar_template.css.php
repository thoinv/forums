<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.secondaryContent.blockLinksList.xengallery .Popup .PopupControl.PopupOpen, 
.secondaryContent.blockLinksList.xengallery .Popup.PopupContainerControl.PopupOpen {
	background: transparent;
	border-radius: 0;
	text-shadow: none;
}

.secondaryContent.blockLinksList.xengallery .Popup .PopupControl:hover, 
.secondaryContent.blockLinksList.xengallery .Popup.PopupContainerControl:hover {
	background-color: transparent;
}

.secondaryContent.blockLinksList.xengallery .Popup .arrowWidget {
	margin-left: 6px;
	margin-top: 0;
}
#MyGalleryMenu .menuColumns,
.galleryExplore .menuColumns,
#GalleryCategories .menuColumns {
	overflow: hidden;
	padding: 2px;
}

.galleryExplore .menuColumns,
#MyGalleryMenu .menuColumns {
	padding: 0;
}
#GalleryCategories {
	width: 240px;
}
#GalleryCategories ul {
	padding: 0;
	border-bottom: 0 none;
}
#GalleryCategories ul a {
	
}

#GalleryCategories.navPopup a:hover, 
.galleryExplore.navPopup a:hover,
#GalleryCategories.navPopup .listItemText a:hover,
.galleryExplore.navPopup .listItemText a:hover {
	' . XenForo_Template_Helper_Core::styleProperty('blockLinksListItemHover') . '
}';
