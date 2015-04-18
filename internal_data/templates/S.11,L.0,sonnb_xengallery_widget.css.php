<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.xengallerySidebar {
	position: relative;
}

.xengallerySidebar .prev.left {
			bottom: 0;
			height: 60px;
			top: 0;
			position: absolute;
			width: 20px;
		}
		.xengallerySidebar .next.right{
			bottom: 0;
			height: 60px;
			position: absolute;
			right: 0;
			top: 0;
			width: 20px;
		}					
		';
if (!$pageIsRtl)
{
$__output .= '
			.xengallerySidebar .prev.left {
				left: 0;
			}
			.xengallerySidebar .next.right {
				right: 0;
			}
		';
}
else
{
$__output .= '
			.xengallerySidebar .prev.left {
				right: 0;
			}
			.xengallerySidebar .next.right {
				left: 0;
			}
		';
}
$__output .= '
		.xengallerySidebar .prev.left:hover, 
		.xengallerySidebar .next.right:hover{
			cursor:pointer;
			background:linear-gradient(to bottom, #468EE6 0px, #0063DC 100%) repeat scroll 0 0 #0063DC;
		}
			.xengallerySidebar .prev.left span, 
			.xengallerySidebar .next.right span {
				background-image: url("styles/sonnb/XenGallery/related-sprite.png");
				display: block;
				height: 18px;
				left: 5px;
				position: absolute;
				width: 10px;
			}
			.xengallerySidebar .prev.left span {
				background-position: -7px -11px;
			}
			.xengallerySidebar .next.right span {
				background-position: -47px -11px;
			}
			.xengallerySidebar .prev.left:hover span {
				background-position: -7px -51px;
			}
			.xengallerySidebar .next.right:hover span {
				background-position: -47px -51px;
			}';
