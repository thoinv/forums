<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.videosSidebar {
	display: inline-block;
}
.videosSidebar li {
	position: relative; 
	display: inline-block;
	overflow: hidden;
	float: left; 
	margin-right: 2px; 
	margin-bottom: 2px;
}
.videosSidebar li .thumbnail {
	overflow: hidden;
	display: inline-block;
}
.videosSidebar li .thumbnail img {
	position: relative;
	border: 0 none;
}
.videosSidebar li .background {
	background-color: rgba(0, 0, 0, 0.5);
	bottom: 0;
	left: 0;
	line-height: 27px;
	position: absolute;
	right: 0;
}
.videosSidebar li .title {
	bottom: 0;
	color: #FFFFFF;
	left: 0;
	padding: 5px 10px;
	position: absolute;
	right: 0;
}
.videosSidebar li .title a {
	color: #FFFFFF;
}
.videosSidebar li .info {
	position: absolute; 
	left: 0; 
	margin-bottom: 5px; 
	padding: 5px 10px; 
	background-color: rgba(0, 0, 0, 0.5); 
	top: 0; 
	color: #FFF;
	width: 100%;
}
.videosSidebar li .info a.username {
	color: #FFF;
	font-weight: bold;
}

.sonnb_XenGallery_WidgetRenderer_Video h3{
	' . XenForo_Template_Helper_Core::styleProperty('sidebarBlockHeading') . ';
}

.videosSidebar.scrollable {
	margin: 0 20px;
	overflow: hidden;
	position: relative;
	display: block;
}

.videosSidebar.scrollable ul{
	width: 20000em;
	position: absolute;
	top: 0;
}

.videosSidebar .icon.video{
	background-image: url("styles/sonnb/XenGallery/video.png");
	background-size: 100% 100%;
	display: inline-block;
	height: 32px;
	width: 32px;
	left: 50%;
	top: 50%;
	margin-left: -16px;
	margin-top: -16px;
	position: absolute;
}';
