<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.galleryOverlay {
	background: none repeat scroll 0 0 rgba(0, 0, 0, 0.75);
	bottom: 0;
	left: 0;
	position: fixed;
	right: 0;
	top: 0;
	z-index: 400;
}

.galleryOverlay .originalLink,
.galleryOverlay .OverlayCloser {
	cursor: pointer;
	position: absolute;
	top: 4px;
	z-index: 310;
	background: url("' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_iconsPath') . '") no-repeat scroll 0 0 transparent;
	height: 24px;
	outline: 0 none;
	width: 24px;
}
.galleryOverlay .originalLink{
	background-position: -148px -44px;
}
.galleryOverlay .OverlayCloser {
	background-position: -177px -44px;
}
.galleryOverlay .goWrapper {
	background: url("styles/sonnb/XenGallery/overlay-bg.png") repeat scroll 0 0 #212126;
	bottom: 0;
	left: 0;
	overflow: hidden;
	position: fixed;
	right: 0;
	top: 0;
	z-index: 10;
}
.galleryOverlay .goWrapper .goActions {
	line-height: 20px;
	color: #FFF;
	width: 100%;
	text-align: center;
	position: absolute;
	top: -25px;
}
.galleryOverlay .goWrapper .goActions > span {
	font-weight: bold;
	display: none;
}
.galleryOverlay .goWrapper .goActions li {
	display: inline-block;
	text-decoration: none;
}
.galleryOverlay .goWrapper .goActions li:hover {
}
.galleryOverlay .goWrapper .goActions li a {
	color: #FFF;
	font-size: 13px;
	padding: 0 16px;
	opacity: 0.8;
	display: inline-block;
}
.galleryOverlay .goWrapper .goActions li a:hover,
.galleryOverlay .goWrapper .goActions li a.PopupOpen {
	text-decoration: none;
	opacity: 1;
	background: transparent;
	border-radius: 0;
	text-shadow: none;
}
.galleryOverlay .goWrapper .goActions li a.PopupOpen {
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
}
.galleryOverlay .goWrapper .goActions li a.PopupOpen .arrowWidget {
	background-position: -48px 0;
}
.galleryOverlay .goWrapper .goActions li a .arrowWidget {
	background-position: -64px 0;
	margin-left: 5px;
}
.galleryOverlay .goWrapper .goMedia {
	z-index: 15;
	bottom: 10px;
	top: 30px;
	left: 10px;
	position: absolute;
}

.galleryOverlay .goWrapper .goMediaHolder {
	text-align: center;
	height: 0;
	/*bottom: 70px;*/
	margin: 0 auto;
	overflow: hidden;
	position: relative;
	width: 100%;
	max-width: 100%;
	max-height: 100%;
}

.galleryOverlay .goWrapper .goMediaContainer {
	margin: 0 auto;
	overflow: hidden;
	position: relative;
	max-width: 100%;
	max-height: 100%;
	background: url("' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_000000_facebook.gif") no-repeat scroll 50% 50% transparent;
}

.galleryOverlay .goWrapper .goMediaHolder.video .goMediaContainer
	z-index: 100;
}
.galleryOverlay .goWrapper .goMediaContainer.loaded {
	background-image: none;
}

.galleryOverlay .goWrapper .goMediaContainer.broken {
	background-image: url("styles/sonnb/XenGallery/broken.png");
	background-position: center center;
	background-repeat: no-repeat;
	width: 32px!important;
	height: 32px!important;
}

.galleryOverlay .goWrapper .goMediaHolder.video .goMediaContainer {
	width: 100%;
	height: 100%;
}
.galleryOverlay .goWrapper .goMediaHolder.video .goMediaContainer iframe,
.galleryOverlay .goWrapper .goMediaHolder.video .goMediaContainer object {
	bottom: 34px;
	left: 0;
	top: 0;
	position: absolute;
	width: 100%;
}

.galleryOverlay .goWrapper .goMediaHolder .photo {
	max-width: 100%;
	max-height: 100%;
	vertical-align: middle;
}

.galleryOverlay .goWrapper .goMediaHolder .photo.lazy {
	display: none;
}

.galleryOverlay .goWrapper .goMediaHolder .photoTag-cpanel {
	-webkit-transition: opacity .3s;
	-moz-transition: opacity .3s;
	-ms-transition: opacity .3s;
	-o-transition: opacity .3s;
	transition: opacity .3s;

	-webkit-background-clip: padding-box;
	-moz-background-clip: padding-box;
	-ms-background-clip: padding-box;
	-o-background-clip: padding-box;

	-webkit-font-smoothing: antialiased;
	-moz-font-smoothing: antialiased;
	-ms-font-smoothing: antialiased;
	-o-font-smoothing: antialiased;

	filter: alpha(opacity=80);
	background-color: rgba(0, 0, 0, .8);
	bottom: 0;
	color: ' . XenForo_Template_Helper_Core::styleProperty('faintTextColor') . ';
	font-size: 13px;
	left: 0;
	padding: 0;
	position: absolute;
	width: 100%;
	display: none;
	padding: 8px 0;
	line-height: 10px;
	height: 10px;
	z-index: 10;
}
	.galleryOverlay .goWrapper .goMediaHolder .photoTag-cpanel a {
		font-weight: bold;
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
	}
	
.galleryOverlay .goWrapper .goMediaHolder .caption{
	background: none repeat scroll 0 0 rgba(33, 33, 36, 0.6);
	bottom: 34px;
	color: #D8D8D8;
	display: inline-block;
	left: 0;
	line-height: normal;
	min-height: 20px;
	padding: 5px;
	position: absolute;
	right: 0;
	z-index: 100;
}

.galleryOverlay .goWrapper .goMediaHolder .caption.hidden {
	display: none;
}

.galleryOverlay .goWrapper .goMediaHolder  .pwPhotoActions{
	' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_view_photoActionContainer') . '
}
.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions.video{
	/*z-index: -1;*/
}
	.galleryOverlay .goWrapper .goMediaHolder  .pwPhotoActions .action {
		' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_view_photoActionItem') . '
	}
	.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.share {
		float: right;
	}
	.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.like {
				
	}
	.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.comment {
		display: block;
	}
	.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.fullscreen {
		float: right;
	}
	.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.fullscreen {
		display: none;
	}
		.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action i {
			' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_view_photoActionIcon') . '
		}
		.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action i {
			background-image: url("' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_iconsPath') . '");
		}
		
		.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.share i {
			background-position: -36px -44px;
		}
		.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.share:hover i,
		.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.share.active i {
			background-position: -36px -72px;
		}
		
		.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.like i {
			background-position: -92px -43px;
		}
		.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.like:hover i,
		.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.like.active i {
			background-position: -92px -71px;
		}
						
		.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.comment i {
			background-position: -120px -44px;
		}
		.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.comment:hover i,
		.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.comment.active i {
			background-position: -120px -72px;
		}
		
		.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.tag i {
			background-position: -65px 2px;
		}
		.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.tag:hover i,
		.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.tag.active i {
			background-position: -93px 2px;
		}
		
		.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.fullscreen i {
		}
		.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.fullscreen:hover i,
		.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.fullscreen.active i {
		}

.galleryOverlay .goWrapper .relatedPhotos {
	margin-top: 10px;
}

.galleryOverlay .goWrapper .goCommentWrapper {
	bottom: 0;
	position: absolute;
	top: 0;
	transition: all 218ms ease 0s;
	width: 320px;
	z-index: 20;
}
';
if ($pageIsRtl)
{
$__output .= '
	.galleryOverlay .OverlayCloser {
		left: 326px;
	}
	.galleryOverlay .originalLink {
		left: 352px;
	}
	.galleryOverlay .goWrapper .goMedia {
		left: 320px;
		right: 0;
	}
	.galleryOverlay .goWrapper .goCommentWrapper {
		left: 0;
	}
	.galleryOverlay .goWrapper .goMedia.noSidebar {
		left: 10px;
	}
	.galleryOverlay .originalLink.noSidebar {
		left: 32px;
	}
	.galleryOverlay .OverlayCloser.noSidebar {
		left: 6px;
	}
';
}
else
{
$__output .= '
	.galleryOverlay .OverlayCloser {
		right: 326px;
	}
	.galleryOverlay .originalLink {
		right: 352px;
	}
	.galleryOverlay .goWrapper .goMedia {
		right: 320px;
		left: 0;
	}
	.galleryOverlay .goWrapper .goCommentWrapper {
		right: 0;
	}
	.galleryOverlay .goWrapper .goMedia.noSidebar {
		right: 10px;
	}
	.galleryOverlay .originalLink.noSidebar {
		right: 32px;
	}
	.galleryOverlay .OverlayCloser.noSidebar {
		right: 6px;
	}
';
}
$__output .= '
.galleryOverlay .goWrapper .goCommentWrapper .photoExif {
	font-size: 11px;
	margin-top: 10px;
}
.galleryOverlay .goWrapper .goCommentWrapper .streamingHeader {
	font-size: 11px;
	margin-top: 5px;
	margin-right: 5px;
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	float: left;

}
.galleryOverlay .goWrapper .goCommentWrapper .streaming .editToggle {
	font-size: 11px;
	float: right;
	margin-top: 5px;
}
.galleryOverlay .goWrapper .goCommentWrapper .streaming {
	margin-top: 5px;
	display: inline-block;
	width: 100%;
}
.galleryOverlay .goWrapper .goCommentWrapper .streaming .xenForm {
	float: left;
}
.galleryOverlay .goWrapper .goCommentWrapper .streaming .xenForm { 
	width: 290px;
}
	.galleryOverlay .goWrapper .goCommentWrapper .streaming .streamList {
		margin-top: 3px;	
	}
	.galleryOverlay .goWrapper .goCommentWrapper .streaming .streamList li {
		float: left;
		margin-right: 5px;
		margin-bottom: 5px;
		color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	}
	.galleryOverlay .goWrapper .goCommentWrapper .streaming .streamList li a {
		color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
		text-decoration: none;
	}
	.galleryOverlay .goWrapper .goCommentWrapper .streaming .streamItem:hover a {
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
	}
	.galleryOverlay .goWrapper .goCommentWrapper .streaming .streamList li .streamItem{
		padding: 1px 5px;
		display: block;
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('pageBackground') . ';
		border-radius: 3px;
	}
	.galleryOverlay .goWrapper .goCommentWrapper .streaming .xenForm {
		width: 100%;
		margin-bottom: 0;
		display: none;
	}
		.galleryOverlay .goWrapper .goCommentWrapper .streaming .xenForm .explain {
			margin-top: 5px;
		}
		.galleryOverlay .goWrapper .goCommentWrapper .streaming .xenForm .button {
			display: block; 
			margin: 5px auto;
		}
		.galleryOverlay .goWrapper .goCommentWrapper .streaming .xenForm .textCtrl {
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
			border-color: #C0C0C0 #E9E9E9 #E9E9E9 #C0C0C0;
			border-radius: 4px 4px 4px 4px;
			border-style: solid;
			border-width: 1px;
			color: ' . XenForo_Template_Helper_Core::styleProperty('textCtrlText') . ';
			font-size: 13px;
			outline: 0 none;
			padding: 2px;
			width: 240px;
		}
.galleryOverlay .goWrapper .goCommentContainer {
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
	height: 100%;
	overflow-y: auto;
	padding: 10px;
}
.galleryOverlay .goWrapper .goCommentContainer .commentWrapper {
	padding-bottom: 10px;
}

.galleryOverlay .messageSimple {
	margin: 0;
}
.galleryOverlay .messageSimple .avatar {
	margin-right: 10px;
}
.galleryOverlay .messageSimple .messageInfo {
	margin-left: 0;
}
.galleryOverlay .messageSimple .messageContent .permalink {
	display: block;
	margin-left: 65px;
}
.galleryOverlay .messageSimple .messageInfo article:before {
	clear: both;
	content: "";
	display: block;
	padding-top: 5px;
}
.galleryOverlay .messageSimple .photoExtra:before {
	clear: both;
	content: "";
	display: block;
}
.galleryOverlay .messageSimple .photoExtra {
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
}
.galleryOverlay .messageSimple .messageMeta {
	margin-top: 5px;
	padding-top: 0;
	opacity: 0.5;
	filter: alpha(opacity=50);
}
.galleryOverlay .messageSimple .messageMeta:hover {
	opacity: 1;
	filter: alpha(opacity=100);
}
.galleryOverlay .messageSimple .publicControls {
	/*float: none;*/
	font-size: 11px;
	line-height: 14px;
	/*margin-top: 5px;*/
}

.galleryOverlay .messageSimple .publicControls .item {
	float: none;
	margin-left: 0;
	margin-right: 10px;
}
.galleryOverlay .messageSimple .comment .commentInfo, 
.galleryOverlay .messageSimple .comment .elements {
	margin-left: 48px;
}

.galleryOverlay .messageResponse .secondaryContent {
	background: transparent;
}
.galleryOverlay .messageResponse .privateControls .InlineModCheck {
	display: none;
}


.galleryOverlay .goWrapper .goMediaHolder .prevPhoto,
.galleryOverlay .goWrapper .goMediaHolder .nextPhoto {
	top: 0;
	opacity: 0.1;
	filter: alpha(opacity=10);
	position: absolute; 
	height: 100%; 
	width: 100px; 
	transition: opacity 0.2s ease-in-out;
	-webkit-transition: opacity 0.2s ease-in-out;
	-moz-transition: -moz-opacity 0.2s ease-in-out;
}

.galleryOverlay .goWrapper .goMediaHolder.video .prevPhoto,
.galleryOverlay .goWrapper .goMediaHolder.video .nextPhoto {
	display: inline-block;
	height: 48px;
}
.galleryOverlay .goWrapper .goMediaHolder .prevPhoto i,
.galleryOverlay .goWrapper .goMediaHolder .nextPhoto i {
	background-image: url("' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_iconsPath') . '");
	width: 48px;
	height: 48px;
	display: inline-block;
}
.galleryOverlay .goWrapper .goMediaHolder .prevPhoto i {
	background-position: -4px -178px;	
}
.galleryOverlay .goWrapper .goMediaHolder .nextPhoto i {
	background-position: -60px -178px;
}

html.tablet .galleryOverlay .goWrapper .goMediaHolder .prevPhoto,
html.tablet .galleryOverlay .goWrapper .goMediaHolder .nextPhoto,
html.phone .galleryOverlay .goWrapper .goMediaHolder .prevPhoto,
html.phone .galleryOverlay .goWrapper .goMediaHolder .nextPhoto,
.galleryOverlay .goWrapper .goMediaHolder .prevPhoto:hover,
.galleryOverlay .goWrapper .goMediaHolder .nextPhoto:hover {
	opacity: 1;
	filter: alpha(opacity=100);
}

	.galleryOverlay .quickEditForm {
		display:none;
		border: 10px solid rgba(3, 42, 70, 0.5);
		border-radius: 10px;
		box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
		padding: 5px;
		position: absolute;
		width: 375px !important;
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
		overflow: hidden;
		z-index: 1000;
	}
	.galleryOverlay .quickEditForm .ctrlUnit dd input.textCtrl {
		width: 330px;
	}
	.galleryOverlay .quickEditForm .submitUnit{
		margin-bottom: 0;
	}
	.galleryOverlay .quickEditForm .submitUnit dd {
		/*float: none;*/
	}

';
if ($pageIsRtl)
{
$__output .= '
	.galleryOverlay .goWrapper .goMediaHolder .prevPhoto {
		right: 0;
	}
	.galleryOverlay .goWrapper .goMediaHolder .nextPhoto {
		left: 0;
	}
';
}
else
{
$__output .= '
	.galleryOverlay .goWrapper .goMediaHolder .prevPhoto {
		left: 0;
	}
	.galleryOverlay .goWrapper .goMediaHolder .nextPhoto {
		right: 0;
	}
';
}
$__output .= '

@media only screen and (max-width: 710px), only screen and (max-device-width: 710px)
{
	.galleryOverlay .goWrapper .goMedia {
		/*right: 0;*/
	}
	.galleryOverlay .goWrapper .goMedia.noSidebar {
		right: 0;
		left: 0;
	}
	.galleryOverlay .goWrapper .goCommentWrapper {
		display: none;
	}
	.galleryOverlay .goWrapper .goMediaContainer iframe {
		display: block;
	}
	.galleryOverlay .originalLink {
		/*right: 30px;*/
	}
	.galleryOverlay .OverlayCloser {
		/*right: 4px;*/
	}

	.galleryOverlay .goWrapper .goMediaHolder .pwPhotoActions .action.comment {
		/*display: block;*/
	}
}

@media only screen and (max-width: 370px), only screen and (max-device-width: 370px), only screen and (max-height: 370px), only screen and (max-device-height: 370px)
{
	.galleryOverlay .goWrapper .goActions > ul{
		display: none;
	}
	.galleryOverlay .goWrapper .goActions > span {
		display: block;
	}
	.galleryOverlay .goWrapper .goActions {
		top: 0;
		background-color: rgb(0, 0, 0);
		background-color: rgba(0, 0, 0, 0.6);
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
		-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
		line-height: 30px;
		z-index: 100;
	}
	.galleryOverlay .goWrapper .relatedPhotos {
		display: none;
	}
	.galleryOverlay .goWrapper .goMedia {
		bottom: 0;
		top: 0;
	}
	.galleryOverlay .goWrapper .goMedia.noSidebar {
		right: 0;
		left: 0;
	}
	.galleryOverlay .goWrapper .goMediaHolder.video .prevPhoto,
	.galleryOverlay .goWrapper .goMediaHolder.video .nextPhoto {
		opacity: 1;
		filter: alpha(opacity=100);
	}
}

@media only screen and (max-width: 320px), only screen and (max-device-width: 320px)
{
	.galleryOverlay .goWrapper .goMediaHolder .prevPhoto,
	.galleryOverlay .goWrapper .goMediaHolder .nextPhoto {
		/*display: none;*/
	}
	.galleryOverlay .goWrapper .goMediaHolder .caption {
		/*display: none;*/
	}
	.galleryOverlay .goWrapper .goMediaHolder.video .prevPhoto,
	.galleryOverlay .goWrapper .goMediaHolder.video .nextPhoto {
		opacity: 0.5;
		filter: alpha(opacity=50);
	}
	.galleryOverlay .goWrapper .goMediaContainer iframe {
		display: block;
	}
}

#XenGalleryOverlayEdit,
#XenGalleryOverlayMore {
	box-shadow: none;
	background-color: #000;
	border-color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
}

#XenGalleryOverlayEdit li,
#XenGalleryOverlayMore li {
	box-shadow: none;
	padding: 5px 10px;
	font-size: 12px;
}

#XenGalleryOverlayEdit li a,
#XenGalleryOverlayMore li a {
	color: #FFF;
	opacity: 0.8;
	filter: alpha(opacity=80);
}

#XenGalleryOverlayEdit li a:hover,
#XenGalleryOverlayMore li a:hover {
	opacity: 1;
	filter: alpha(opacity=100);
	text-decoration: none;
}

.goCommentWrapper .commentWrapper dl {
	margin: 0; 
	display: inline-block; 
	width: 100%;
}
.goCommentWrapper .commentWrapper dl dt {
	float: left;
}
.goCommentWrapper .commentWrapper dl dd {
	float: left;
	margin-left: 5px;
}
.goCommentWrapper .commentWrapper dl dd a{
	margin: 0;
	padding: 0;
}
.goCommentWrapper .commentWrapper ul {
	margin: 0;
}
.goCommentWrapper .commentWrapper fieldListContainer li {
	list-style: none;
	margin: 0;
	padding: 0;
	float: left;
}
.goCommentWrapper .commentWrapper fieldListContainer li:first-child:before {
	content: "";
}
.goCommentWrapper .commentWrapper fieldListContainer li:before {
	content: ", ";
}
.fieldListContainer {
	margin-top: 10px;
}
.locationContainer,
.cameraContainer {
	margin-top: 10px;
}';
