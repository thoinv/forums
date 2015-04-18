<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

.adv_slider_wrapper {
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_slider_container') . '
}

.adv_slider_wrapper.inner {
	padding: 5px;
}

.adv_slider_wrapper.bleft {
	margin-left :0 !important;
	margin-right: auto !important;
}

.adv_slider_wrapper.bcenter {
	margin-left: auto !important;
	margin-right: auto !important;
}

.adv_slider_wrapper.bright {
	margin-left:auto !important;
	margin-right:0 !important;
}

.adv_slider_wrapper.fleft {
	float: left;
	margin: 1px 10px 0 0 !important;
}

.adv_slider_wrapper.fright {
	float: right;
	margin: 1px 0 0 10px !important;
}



.advslides {
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_slider_slides') . '
}

.advslides > div {
	display: none;
	position: absolute;
	top: 0;
	left: 0;
	margin: 7px;
	padding: 15px;
	overflow: auto;
}

.advslides > div.active {
	position: relative !important;
}

.advslides > div.inner {
	padding: 10px 40px;
}

.advslides > div.imageMode {
	position:absolute !important;
	padding: 0;
	margin: 0;
	overflow:hidden;
	width:100%;
}

.advslides .adv_slide_mask {
	display:block;
	position:relative;
	width:100%;
	height:100%;
	background-color:black;
	z-index:0; /*40*/
}

.advslides .adv_slide_mask span {
	display:block;
	padding:20px;
	color:white;
}

.adv_slide_image {
	text-align:center;
	background-color:black;
}

.adv_slide_image {
	position:relative;
}


.advslides .adv_slides_title {
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_slider_slides_title') . '
}

.advslides .adv_slides_title_abs {
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_slider_slides_title_abs') . '
}

.advslides .adv_slides_title_abs.bottom{
	bottom:0;
}

.inner .advslides .adv_slides_title_abs.bottom{
	bottom:35px !important;
}

.inner .advslides .adv_slides_title_abs.bottom_num{
	bottom:20px !important;
}

.advslides .adv_slides_title_abs span {
	display: block;
	padding: 10px 15px;
}


.advslidestabs {
	text-align:center;
	position: relative;
	border-bottom-left-radius: ' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_slider_slides.border-bottom-radius') . ';
	border-bottom-right-radius: ' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_slider_slides.border-left-radius') . ';
}

.advslidestabs.inner_bullet {
	bottom: 37px;
}

.advslidestabs.outside_bullet {
	bottom: 5px;
}

.advslidestabs.inner_num {
	bottom: 22px;
}

.advslidestabs.outside_num {
	bottom: 0;
}

.advslidestabs.inner_bullet.imageMenu,
.advslidestabs.inner_num.imageMenu {
	background-color: rgba(0,0,0,0.7);

	margin-right: -3px;
}

.advslidestabs a:active, .advslidestabs a:hover, .advslidestabs a:focus {
	box-shadow:none !important;
	outline:none !important;
	background:none !important;
}

.advslidestabs a {
	display:inline;
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_slider_tabs') . '
	-moz-user-select: -moz-none;
	-khtml-user-select: none;
	-webkit-user-select: none;
	-ms-user-select: none;
	user-select: none;	
}

.advslidestabs a.num {
	font-size: 12pt;
}

.advslidestabs a.bullet {
	font-size: 20pt !important;
}

.advslidestabs a:hover {
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_slider_tabs_hover') . '
}

.advslidestabs a:active,
.advslidestabs a.current {
	' . XenForo_Template_Helper_Core::callHelper('cssImportant', array(
'0' => XenForo_Template_Helper_Core::styleProperty('advbbcodebar_slider_tabs_active')
)) . '
}

.advslidestabs a:visited {
	' . XenForo_Template_Helper_Core::styleProperty('advbbcodebar_slider_tabs') . '
}


.advslidestabs .cmd{
	display: inline-block;
	position: relative;
	height: 14px;
	line-height: 11px;
	vertical-align: middle;
	cursor :pointer;
	color:#888888;
	
	-moz-user-select: -moz-none;
	-khtml-user-select: none;
	-webkit-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

.advslidestabs .cmd:hover{
	color:#696969;
}

.advslidestabs.inner_bullet .cmd,
.advslidestabs.outside_bullet .cmd{
	top: -4px;
}

.advslidestabs.inner_num .cmd,
.advslidestabs.outside_num .cmd{
	top: -1px;
}

.advslidestabs .play{
	font-size: 7pt;
	margin-left: 10px;
}

.advslidestabs .pause{
	font-size: 5pt;
}



.adv_slider_navig{
	position: relative;
	' . XenForo_Template_Helper_Core::callHelper('cssImportant', array(
'0' => XenForo_Template_Helper_Core::styleProperty('advbbcodebar_slider_nav_buttons')
)) . '
 	-moz-user-select: -moz-none;
	-khtml-user-select: none;
	-webkit-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

.adv_slider_navig:hover{
	' . XenForo_Template_Helper_Core::callHelper('cssImportant', array(
'0' => XenForo_Template_Helper_Core::styleProperty('advbbcodebar_slider_nav_buttons_hover')
)) . '
}

.adv_slider_navig:active{
	' . XenForo_Template_Helper_Core::callHelper('cssImportant', array(
'0' => XenForo_Template_Helper_Core::styleProperty('advbbcodebar_slider_nav_buttons_active')
)) . '
}

.adv_backward{
	float: left;
	left: 8px;
}

.adv_forward{
	float: right;
	right: 8px;
	clear: right;
}



.adv_slider_wrapper.noscript{
	overflow:auto;
	border: 2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
}

.adv_slider_noscript {
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
}

.adv_slider_noscript_title {
	font-size: 12px;
	font-weight:bold;
	color: ' . XenForo_Template_Helper_Core::styleProperty('contentText') . ';
	line-height: 30px;
	height: 30px;
	background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png\') repeat-x top;
}

.adv_slider_noscript_content {
	padding:5px;
	overflow: auto;
}';
