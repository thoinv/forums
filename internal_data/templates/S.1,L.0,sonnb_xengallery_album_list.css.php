<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.breadBoxTop.categoryView {
	' . XenForo_Template_Helper_Core::styleProperty('secondaryContent') . ';
	border-radius: 0;
	padding: 5px 10px;
}
	.breadBoxTop.categoryView .breadcrumb{
		margin: 0; 
		border: 0 none; 
		background: none repeat scroll 0% 0% transparent; 
		border-radius: 0;
	}
		.breadBoxTop.categoryView .crust:last-child a.crumb {
			font-style: normal;
		}
		.breadBoxTop.categoryView .breadcrumb .crust:hover  a.crumb {
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		}
		.breadBoxTop.categoryView .breadcrumb .crust a.crumb {
			padding: 0 15px;
			border: 0 none;
			border-radius: 0;
		}

.sonnb_xengallery_category_view .titleBar {
	display: none;
}
.titleBar.categoryView {
	display: block;
}

.galleryHeader {
	margin-top: -10px;
	/*margin-bottom: 5px;*/
	display: inline-block;
	width: 100%;
}
	.galleryHeader ul.Popup {
		float: right;
	}

		#XenGalleryGallerySort .menuColumns {
			padding: 0;
		}

.masonryContainer {
	padding-top: 10px;
	margin-bottom: 20px;
}
.clearfix:after {
	clear: both;
}
.clearfix:before, .clearfix:after {
	content: "";
	display: table;
	line-height: 0;
}
#infscr-loading {
	background-color: #000;
	border-radius: 10px 10px 10px 10px;
	bottom: 40px;
	clear: both;
	color: #FFFFFF;
	left: 45%;
	opacity: 0.7;
	padding: 10px;
	position: fixed;
	text-align: center;
	width: 100px;
	z-index: 100;
	display: none;
}

';
if (!XenForo_Template_Helper_Core::styleProperty('sonnbXenGalleryDisableAutoScroll'))
{
$__output .= '
	.hasJs .pageNavLinkGroup.xengallery {
		visibility:hidden;
	}
';
}
$__output .= '

@media only screen and (max-width: 400px), only screen and (max-device-width: 400px)
{
	.galleryHeader {
		margin-top: 0;
	}
	.galleryHeader ul {
		text-align: left;
	}
}';
