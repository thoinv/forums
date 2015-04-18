<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.adv_bimg_block {
	display:block;
	z-index:1;
}

.adv_bimg_block.responsive .adv_bimg {
	max-width: ' . htmlspecialchars($xenOptions['sedo_adv_responsive_maxwidth'], ENT_QUOTES, 'UTF-8') . 'px;
}

.adv_bimg_block.responsive.compare .adv_bimg {
	max-width: 100%;
}

.adv_bimg {
	display:block;
	position:relative;
	padding-top:2px;
}

.adv_bimg.bleft {
	margin-right:auto;
}

.adv_bimg.bcenter {
	margin-left:auto;
	margin-right:auto;
}

.adv_bimg.bright {
	margin-left:auto;
}

.adv_bimg.fleft {
	float:left;
	margin:1px 10px 0 0;
}

.adv_bimg.fright {
	float:right;
	margin:1px 0 0 10px;
}

.adv_bimg.text_center {
	text-align:center;
}

.adv_bimg .caption_txt{
	' . XenForo_Template_Helper_Core::styleProperty('adv_bimg_caption_all') . '
}

.adv_bimg .caption_inside {
	position:absolute;
	z-index:5;
	padding:1px 0 3px 0; 
	background: ' . XenForo_Template_Helper_Core::styleProperty('adv_bimg_caption_background') . ';
}

.adv_bimg .caption_txt_inside {
	padding: 1px 5px 0 5px; 
	color:' . XenForo_Template_Helper_Core::styleProperty('adv_bimg_caption_text') . ';
}

.adv_bimg a.adv_bimg_nolb{
	display:block;
}

.adv_bimg a.adv_bimg_nolb:hover,
.adv_bimg a.adv_bimg_nolb:focus{
	background: none;
}

.ugc .adv_bimg a:link, .ugc .adv_bimg a:visited{
	padding: 0;
}';
