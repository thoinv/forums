<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.photosSidebar {
	display: inline-block;
}
.photosSidebar li {
	position: relative; 
	display: inline-block;
	overflow: hidden;
	float: left; 
	margin-right: 2px; 
	margin-bottom: 2px;
}
.photosSidebar li .thumbnail {
	overflow: hidden;
	display: inline-block;
}
.photosSidebar li .thumbnail img {
	position: relative;
	border: 0 none;
}
.photosSidebar li .background {
	background-color: rgba(0, 0, 0, 0.5);
	bottom: 0;
	left: 0;
	line-height: 27px;
	position: absolute;
	right: 0;
}
.photosSidebar li .title {
	bottom: 0;
	color: #FFFFFF;
	left: 0;
	padding: 5px 10px;
	position: absolute;
	right: 0;
}
.photosSidebar li .title a {
	color: #FFFFFF;
}
.photosSidebar li .info {
	position: absolute; 
	left: 0; 
	margin-bottom: 5px; 
	padding: 5px 10px; 
	background-color: rgba(0, 0, 0, 0.5); 
	top: 0; 
	color: #FFF;
	width: 100%;
}
.photosSidebar li .info a.username {
	color: #FFF;
	font-weight: bold;
}

.sonnb_XenGallery_WidgetRenderer_Photo h3{
	' . XenForo_Template_Helper_Core::styleProperty('sidebarBlockHeading') . ';
}

.photosSidebar.scrollable {
	margin: 0 20px;
	overflow: hidden;
	position: relative;
	display: block;
}

.photosSidebar.scrollable ul{
	width: 20000em;
	position: absolute;
	top: 0;
}';
