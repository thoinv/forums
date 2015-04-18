<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.recentNews .subHeading { margin: -10px -10px 10px; }
.recentNews .subHeading a { color: ' . XenForo_Template_Helper_Core::styleProperty('subHeading.color') . '; }
.recentNews .subHeading h2 { font-size: 1.5em; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.recentNews .messageUserBlock { float: right; margin-left: 10px; }

.recentNews .newsDate { float: left; margin: 0px 10px 10px 0px; padding: 0px 10px 5px; width: 35px; font-weight: bold; text-align: center; }
.recentNews .newsDate .newsMonth { padding: 10px 0px 5px !important; margin: 0px -10px 5px !important; text-transform: uppercase; }
.recentNews .newsDate .newsDay { font-size: 26px; }

.recentNews .leftDate .newsDate { margin-left: -45px; }
.recentNews .leftDate .newsText { margin-left: 25px; }

.recentNews .messageContent { font-size: 13px; }
.recentNews .messageContent .postedBy { margin-bottom: 10px; padding-bottom: 5px; border-bottom: 1px dashed ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; }
.recentNews .messageContent .username { font-weight: bold; }
.recentNews .messageContent .comments { float: right; font-weight: bold; }
.recentNews .messageContent .clearFix { clear: right; }

.recentNews .iconKey div
{
	background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat 10000px 0;
	width: 16px;
	height: 16px;
	float: left;
	margin-right: 4px;
}
.recentNews .iconKey .sticky    { background-position:   0px -16px; }
.recentNews .iconKey .redirect  { background-position: -48px -16px; }
.recentNews .iconKey .new       { background-position: -64px -16px; }

.recentNews .sectionFooter { margin: 10px -10px -10px; text-align: right; position: relative; }
.recentNews .sectionFooter .continue { padding-top: 5px; font-size: 12px; }
.recentNews .sectionFooter .continue .redirect { margin: 3px 4px 0px 0px; }

.recentNews .sectionFooter .categories { padding-top: 5px; float: left; }
.recentNews .sectionFooter .categories li { display: inline; }

.recentNews .sectionFooter .sharePage { position: absolute; }
.recentNews .sectionFooter .shareControl { margin-top: 6px !important; }';
