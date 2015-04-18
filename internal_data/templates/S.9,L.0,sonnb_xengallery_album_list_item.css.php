<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.itemGallery {
	' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItem') . ';
	max-width: ' . XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_itemwidth') . '; 
	min-width: ' . XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_itemwidth') . '; 
	margin-right: ' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItem.margin-bottom') . ';
}
html.desktop .itemGallery:hover {
	' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemHover') . '
}
html.desktop .itemGallery:hover {
	' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemShadowHover') . '
}
.itemGallery.masonry-brick {
	margin-right: 0;
}
.galleryboxshadow .itemGallery {
	border: 0 none;
}
html.desktop .galleryboxshadow .itemGallery:hover {
	border: 0 none;
}
		.itemGallery .img { 
			' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemImage') . ';
		}
		.itemGallery .img.loaded {
			background-image: none;
		}
		.itemGallery .img.broken {
			background-image: url("styles/sonnb/XenGallery/broken.png");
			background-color: #be3730;
			background-position: center center;
			background-repeat: no-repeat;
		}
		.itemGallery .img a{
			display: block; 
			overflow: hidden;
		}
		.itemGallery .img i.icon.gif{
			background-image: url("styles/sonnb/XenGallery/gif.png");
			background-size: 100% 100%;
			display: inline-block;
			height: 34px;
			width: 34px;
			left: 50%;
			top: 50%;
			margin-left: -17px;
			margin-top: -17px;
			position: absolute;
		}
		.itemGallery .img i.icon.video{
			background-image: url("styles/sonnb/XenGallery/video.png");
			background-size: 100% 100%;
			display: inline-block;
			height: 64px;
			width: 64px;
			left: 50%;
			top: 50%;
			margin-left: -32px;
			margin-top: -32px;
			position: absolute;
		}
		.itemGallery .img a img{
			margin: 0 auto;
			width: auto;
			max-width: ' . XenForo_Template_Helper_Core::styleProperty('sonnb_xengallery_itemwidth') . ';   
			position: relative;
		}
		.itemGallery .img a img.lazy {
			width: auto;
			display: none;
		}
		.hasJs .itemGallery .img a img.lazy {
			display: none;
		}

@media only screen and (max-width: 900px), only screen and (max-device-width: 900px)
{
	.itemGallery {
		width: 23%;
		min-width: inherit;
	}
	.itemGallery .img,
	.itemGallery .img a,
	.itemGallery .img a img {
		width: 100%;
		max-width: 100%;
	}
}

@media only screen and (max-width: 700px), only screen and (max-device-width: 700px)
{
	.itemGallery {
		width: 30%;
		min-width: inherit;
	}
	.itemGallery .img,
	.itemGallery .img a,
	.itemGallery .img a img {
		width: 100%;
		max-width: 100%;
	}
}

@media only screen and (max-width: 500px), only screen and (max-device-width: 500px)
{
	.itemGallery {
		width: 43%;
		min-width: inherit;
	}
	.itemGallery .img,
	.itemGallery .img a,
	.itemGallery .img a img {
		width: 100%;
		max-width: 100%;
	}
}

@media only screen and (max-width: 320px), only screen and (max-device-width: 320px)
{
	.itemGallery {
		width: 100%;
		max-width: 320px;
		min-width: inherit;
	}
	.itemGallery .img,
	.itemGallery .img a,
	.itemGallery .img a img {
		width: 100%;
		max-width: 320px;
	}
}

	.itemGallery .infoAlbum {
		padding: 5px 10px 0px 10px;
		position: relative;
		margin-bottom: 5px;
	}
		.itemGallery .infoAlbum .deleteNotice {
			margin-bottom: 5px; 
			color: #960000;
		}
		.itemGallery .infoAlbum .titleAlbum {
			/*margin-bottom: 5px*/
		}
		.itemGallery .infoAlbum .titleAlbum h3 {
			text-align: left;
		}
		.itemGallery .infoAlbum .titleAlbum h3 a { 
			' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemTitle') . ';
		}
		html.desktop .itemGallery .infoAlbum .titleAlbum h3 a:hover {
			' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemTitleHover') . ';
		}
		
		.itemGallery .infoAlbum .dateInfo {
			' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemDate') . ';
		}
		.itemGallery .infoAlbum .dateInfo.nm {
			margin-bottom: 0;
		}
		.itemGallery .infoAlbum .description {
			' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemDescription') . ';
		}

		.itemGallery .infoAlbum .userInfo a {
			' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemAuthor') . ';
		}
		html.desktop .itemGallery .infoAlbum .userInfo:hover a {
			' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemAuthorHover') . ';
		}
			.itemGallery .infoAlbum .userInfo .avatar .img {
				background-position: 0 0;
			}
			.itemGallery .infoAlbum .userInfo .avatar img, 
			.itemGallery .infoAlbum .userInfo .avatar .img, 
			.itemGallery .infoAlbum .userInfo .avatarCropper{
				border: 0 none;
				border-radius: 0 0 0 0;
				padding: 0;
			}

	.itemGallery .photoDate {
		' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemPhotoDate') . ';
	}

	.itemGallery .inlineMod {
		left: 8px;
		top: 6px;
		position: absolute;
		z-index: 199;
		width: 100%;
		display: none;
		opacity: 0;
	}
	.sonnb_xengallery_author_photos .itemGallery .inlineMod,
	.sonnb_xengallery_author_videos .itemGallery .inlineMod,
	.sonnb_xengallery_album_view .itemGallery .inlineMod {
		display: block;
	}
		.itemGallery .photoDate .bg {
			' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemPhotoDateBg') . ';
		}
		.itemGallery .photoDate .DateTime {
			' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemPhotoDateText') . ';
		}
		html.desktop .itemGallery.photo:hover .photoDate{
			display:block;
		}
		html.desktop .itemGallery.photo:hover .inlineMod {
			opacity: 1;
		}

	.itemGallery.photo .toolAlbum {
		display:block;
		position: static;
	}

	.itemGallery .toolAlbum {
		' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemActions') . ';
	}
	.itemGallery .toolAlbum li { 
		' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemActionsItem') . ';
	}
	
	';
if (XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryAlbumHover'))
{
$__output .= '
		/*.itemGallery .toolAlbum {
			display:none;
			position: absolute; 
			bottom: 0;
			left: 0;
			right: 0;
		}*/
		.itemGallery .infoAlbum {
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemActions.background-color') . ';
			margin-bottom: 0;
		}
		.itemGallery .toolAlbum,
		.itemGallery .infoAlbum {
			display:none;
		}
		html.desktop .itemGallery:hover {
			z-index: 100;
		}
		html.desktop .itemGallery:hover .toolAlbum,
		html.desktop .itemGallery:hover .infoAlbum {
			display:block;
		}
	';
}
$__output .= '
	
	.itemGallery .toolAlbum .likeAlbum, 
	.itemGallery .toolAlbum .commentAlbum {  
		border-right: 1px dotted ' . XenForo_Template_Helper_Core::styleProperty('faintTextColor') . ';
	}
	
	.itemGallery .toolAlbum .likeAlbum a i, 
	.itemGallery .toolAlbum .commentAlbum a i, 
	.itemGallery .toolAlbum .viewAlbum i { 
		' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemActionsIcon') . ';
	}
	.itemGallery .toolAlbum a i {
		background-image: url("' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_iconsPath') . '");
	}
	.itemGallery .toolAlbum .likeAlbum a i {
		background-position: -2px -4px;
	}
	.itemGallery .toolAlbum .likeAlbum a.active i, 
	html.desktop .itemGallery .likeAlbum a:hover i {
		background-position: -2px -24px;
	}
	.itemGallery .toolAlbum .likeAlbum a, 
	.itemGallery .toolAlbum .commentAlbum a,
	.itemGallery .toolAlbum .viewAlbum a { 
		' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemActionsItemText') . ';
	}
	.itemGallery .toolAlbum .likeAlbum a span, 
	.itemGallery .toolAlbum .commentAlbum a span,
	.itemGallery .toolAlbum .viewAlbum a span{ 
		color: \'\';
	}
	html.desktop .itemGallery .toolAlbum .likeAlbum a:hover, 
	html.desktop .itemGallery .commentAlbum a:hover {
		' . XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryGridItemActionsItemTextHover') . ';
	}
	.itemGallery .toolAlbum .commentAlbum a i {
		background-position: -22px -4px;
	}
	.itemGallery .toolAlbum .commentAlbum a.hasComment i , 
	html.desktop .itemGallery .commentAlbum a:hover i {
		background-position: -22px -24px;
	}
	.itemGallery .toolAlbum .viewAlbum a i {
		background-position: -42px -4px;
	}
	
	.itemGallery .toolAlbum .viewAlbum a:hover i {
		background-position: -42px -24px;
	}
	
	.itemGallery.topItem {
		width:450px; 
		height: 378px;
		overflow:hidden;
	}
	.itemGallery.topItem .img { 
		float: left; 
		margin: 0 2px 2px 0;
	}
	.itemGallery.topItem div .thumbSmall {
		width: 111px; 
		height: 111px; 
		overflow: hidden; 
		display: block; 
		background-color: #ccc; 
	}
	.itemGallery.topItem .img span { 
		display: none; 
		width: 152px; ; 
		height: 152px; 
		position: absolute; 
		top: 41px; 
		left: 0px; 
		z-index: 999; 
		overflow: hidden; 
	}
	.itemGallery.topItem .img:nth-child(4n) { 
		margin-right: 0 
	}
	.itemGallery.topItem .thumbSmall > img {
		width: 110px;
		height: 110px;
	}

		.itemGallery.topItem .titleTopItem {
			background-color:#fff;
			height: 41px;
		}
			.itemGallery.topItem .titleTopItem h2 a {
				font:20px/41px "times new roman"; 
				color:#4b4b4b;
			}
			html.desktop .itemGallery.topItem .titleTopItem h2 a:hover { 
				color: #ed4d4b;
			}
			.itemGallery.topItem .titleTopItem h2 a i { 
				display: block; 
				height: 32px; 
				width: 30px; 
				float: left;
				margin-right: 5px;
				margin-left: 5px; 
				margin-top: 5px;
				opacity:0.25;
				filter: alpha(opacity=25);
			}
			html.desktop .itemGallery.topItem .titleTopItem h2 a:hover i { 
				margin-left: 5px; 
				margin-top: 5px;
			}

.itemGallery.InlineModChecked {
	box-shadow: -3px -3px 5px #FF0084;
}
html.desktop .itemGallery.InlineModChecked:hover {
	box-shadow: -3px -3px 5px #FF0084;
}
.hasJs #InlineModOverlayPhoto,
.hasJs #InlineModOverlayAlbum {
	width: 265px;
}
.hasJs #InlineModOverlayPhoto .actionControl .otherActions,
.hasJs #InlineModOverlayAlbum .actionControl .otherActions {
	margin-top: 5px;
}';
