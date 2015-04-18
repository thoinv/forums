<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.ContentEditor {
    clear: both;
}

.xenForm .ctrlUnit dd li.AttachedContent {
    margin-top: 0;
}

.ContentEditor .AttachedContent {
    overflow: hidden;
    zoom: 1;
    vertical-align: middle;
    /*padding-bottom: 5px;*/
    padding-right: 5px;
    float: left;
    height: 320px;
    margin-right: 0 !important;
    margin-top: 0 !important;
    width: 176px;
    min-height: 200px;
    max-width: 176px;
}

.ContentEditor .AttachedContent:last-child {
    /*margin-bottom: 10px;*/
}

.ContentEditor .AttachedContent#AttachedContentTemplate {
    display: none;
}

.ContentEditor .AttachedContent .Thumbnail {
    background-position: 40% 40%;
    background-repeat: no-repeat;
    height: 150px;
    overflow: hidden;
    width: 176px;
	position: relative;
}

.ContentEditor .AttachedContent .Thumbnail i.icon.gif{
	background-image: url("styles/sonnb/XenGallery/gif.png");
	background-size: 100% 100%;
	display: inline-block;
	height: 34px;
	left: 50%;
	margin-left: -17px;
	margin-top: -17px;
	position: absolute;
	top: 50%;
	width: 34px;
}
.ContentEditor .AttachedContent .Thumbnail i.icon.video{
	background-image: url("styles/sonnb/XenGallery/video.png");
	background-size: 100% 100%;
	display: inline-block;
	height: 64px;
	width: 64px;
	margin-left: -32px;
	margin-top: -32px;
	position: absolute;
	top: 50%;
	left: 50%;
}

.ContentEditor .AttachedContent .description .textCtrl.location {
    /*margin-top: 2px;*/
}

.ContentEditor .AttachedContent .description .textCtrl {
	border-radius: 0 0 0 0;
	width: 176px;
	margin-left: 0 !important;
	margin-bottom: 0 !important;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
}

.ContentEditor .AttachedContent .description select.textCtrl {
	border-top: 0 none;
}

.ContentEditor .AttachedContent input.cover,
.ContentEditor .AttachedContent input.coverType {
	display: none;
}

.ContentEditor .AttachedContent .Thumbnail img {
	padding: 0;
	display: none;
	margin: 0;
	vertical-align: middle;
}

.ContentEditor .AttachedContent .controls {
}

{
    xen: helper clearfix, \'.ContentEditor .AttachedContent .controls\'
}

.ContentEditor .AttachedContent .ProgressMeter {
    display: block;
    padding: 2px;
    border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
    border-radius: 4px;
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
    margin-right: 75px;
    margin-top: 4px;
    font-size: 14pt;
    line-height: 26px;
}

.ContentEditor .AttachedContent .ProgressMeter .ProgressGraphic {
	display: inline-block;
	width: 0%;
	height: 26px;
	background: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png\') repeat-x top;
	text-align: right;
}

.ContentEditor .AttachedContent .ProgressMeter .ProgressCounter {
	display: inline-block;
	height: 26px;
	padding: 0 10px;
}

.ContentEditor .AttachedContent .ProgressMeter .ProgressGraphic .ProgressCounter {
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryDarker') . ';
}

.ContentEditor .AttachedContent .description textarea {
	border-radius: 0;
	overflow: hidden;
	height: 60px;
	margin-bottom: 0;
	margin-left: 0 !important;
	width: 176px !important;
	border-color: ' . XenForo_Template_Helper_Core::styleProperty('faintTextColor') . ';
	border-top: 0 none;
	border-bottom: 0 none;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
}

.xenForm .ContentEditor .AttachedContent .Filename {
	width: ' . (XenForo_Template_Helper_Core::styleProperty('formWidth') - 22 - 40 - XenForo_Template_Helper_Core::styleProperty('ctrlUnitLabelWidth') - XenForo_Template_Helper_Core::styleProperty('ctrlUnitEdgeSpacer')) . 'px;
}

/* SWFUploader placeholder */

.swfupload {
    position: absolute;
    z-index: 1;
}

.progress {
    margin-top: 53px;
    width: 176px;
}

.ContentEditor .AttachedContent .progress .gauge {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: #A4A4A4 #BBBBBB #D5D5D5;
    border-image: none;
    border-style: solid;
    border-width: 1px;
    overflow: hidden;
    position: relative;
    height: 22px;
}

.ContentEditor .AttachedContent .progress .gauge .meter {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png\' ) repeat-x top;;
    border-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ';
    border-image: none;
    border-width: 1px 0 1px 1px;
    color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
    height: 22px;
    overflow: hidden;
    position: relative;
    width: 1%;
    transition: all 0.25s ease 0s;
    display: inline-block;
}

.ContentEditor .AttachedContent .progress .gauge .text {
    position: absolute;
    top: 2px;
    left: 5px;
    height: 22px;
    color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
    display: inline-block;
}

.ContentEditor .AttachedContent .controls {
    height: 30px;
    position: relative;
    z-index: 1;
}

.ContentEditor .AttachedContent .controls .inner {
    border: 1px solid #DDDDDD;
    bottom: -1px;
    left: 0;
    line-height: 0;
    position: absolute;
    right: 0;
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('pageBackground') . ';
}

.ContentEditor .AttachedContent .controls .peopleIcon {
    background-position: -26px 7px;
}

.ContentEditor .AttachedContent .controls .peopleIcon.active {
    background-image: url("styles/sonnb/XenGallery/photo-icons-active.png");
    background-position: -26px 7px;
}

.ContentEditor .AttachedContent .controls .placeIcon {
    background-position: 6px 7px;
}

.ContentEditor .AttachedContent .controls .placeIcon.active {
    background-image: url("styles/sonnb/XenGallery/photo-icons-active.png");
    background-position: 6px 7px;
}

.ContentEditor .AttachedContent .controls .coverIcon {
    background-position: -59px 7px;
}

.ContentEditor .AttachedContent .controls .coverIcon.active {
    background-image: url("styles/sonnb/XenGallery/photo-icons-active.png");
    background-position: -58px 7px;
}

.ContentEditor .AttachedContent .controls .metaIcon {
    background-image: url("styles/sonnb/XenGallery/photo-icons.png");
    background-repeat: no-repeat;
    background-size: auto auto;
    border-right: 1px solid #DDDDDD;
    cursor: pointer;
    float: left;
    height: 30px;
    outline: medium none;
    text-decoration: none;
    width: 29px;
}

.ContentEditor .AttachedContent .controls span.delete{
	position: absolute;
	right: 5px;
	top: 7px;
	background-image: url("styles/sonnb/XenGallery/trash-icons.png");
	display: inline-block;
	height: 16px;
	width: 16px;
	cursor: pointer;
}

.ContentEditor .AttachedContent .controls span.delete:hover {
	background-position: -18px 0;
}
/* Uploader JS Overlay */

.xenOverlay.attachmentUploader {
    width: 500px;
}

.attachmentUploader #ctrl_content_upload {
    margin: 2px auto 5px;
}

.attachmentUploader .attachmentConstraints dl {
    margin-top: 2px;
    font-size: 11px;
} ';
