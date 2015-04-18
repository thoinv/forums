<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '#embed_player { margin: 0px -50px; }

.mediaList ul { text-align: center; }
.mediaList li { position: relative; display: inline-block; width: 32.5%; }
.mediaList li .secondaryContent { margin: 10px 3px 0px; padding: 20px; }

.mediaSmall ul { text-align: center; }
.mediaSmall li { position: relative; display: inline-block; width: 49%; }
.mediaSmall li .mediaContent { margin: 0px 3px 10px; }
.mediaSmall li .mediaContent .title { display: inline-block; height: 26px; overflow: hidden; }
.mediaSmall li .mediaContent .image { position: relative; }
.mediaSmall li .mediaContent .image img { width: 100%; }

.mediaNav .pairsJustified dl { margin-left: 5px; margin-top: 2px; }

.mediaCloud #keywordCloud { margin: -25px -10px -30px; }
.mediaCloud #textCloud { margin: 25px 10px 30px; }
.mediaCloud ul { text-align: center; }
.mediaCloud li { display: inline; }

.mediaPlayList li { height: 70px; margin: 10px 0px; }
.mediaPlayList li .secondaryContent { height: 70px; padding: 0px; overflow: hidden; }

.mediaPlayList li .lastPost { float: right; padding: 15px 10px 0px 0px; }
.mediaPlayList li .subscribeOptions { float: left; padding: 25px 10px 0px; }

.mediaPlayList li .views { float: right; text-align: center; padding: 5px; margin: 13px; color: white; background-color: black; position: relative; z-index: 1; }
.mediaPlayList li .thumb { float: left; margin-right: 15px; position: relative; }
.mediaPlayList li .thumb img { width: 120px; }
.mediaPlayList li .info { padding: 13px; }
.mediaPlayList li .info b { font-size: 1.1em; white-space: nowrap; }
.mediaPlayList li .info .muted { font-size: 0.8em; }
.mediaPlayLists li .info { padding: 15px; }
.mediaPlayLists li .info b { font-size: 1.5em; }
' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.mediaPlayList ul'
)) . '

.mediaDetails li { display: inline; }
.mediaDetails li::after { content: \',\'; }
.mediaDetails li:last-child::after { content: \'\'; }
.mediaDetails img { max-width: 100%; }

.messageSimpleList li:last-child { margin-bottom: 0px; }

.mediaKeywords ul { max-height: 200px; margin-left: 20px; overflow: auto; }
.mediaKeywords li { display: inline-block; width: 114px; }
.adminKeywords li { display: inline-block; width: 19%; padding: 2px; }

.messageSimple textarea
{
	height: 54px;
	width: 100%;
	box-sizing: border-box;
	*width: 98%;
	resize: vertical;
}
.messageSimple .submitUnit { margin-top: 5px; text-align: right; }

.overlays
{
	background-color: black;
	color: white;
	font-size: 10px;
	padding: 1px 2px 2px;
	position: absolute;
}
.overlays.overBtmL { bottom: 7px; left: 5px; }
.overlays.overBtmR { bottom: 7px; right: 5px; }
.overlays a:link, .overlays a:visited { color: white; }

.oControl { width: 17px; height: 15px; float: left; position: static; }
.pControl { text-align: right; }
.pControl a { width: 18px; height: 15px; display: inline-block; }
.oNumbs { float: left; position: static; }

.oComms { background: url(\'styles/8wayrun/EWRmedio.png\') -0px -40px; }
.oLikes { background: url(\'styles/8wayrun/EWRmedio.png\') -20px -40px; }
.oViews { background: url(\'styles/8wayrun/EWRmedio.png\') -40px -40px; }

.pRem { background: url(\'styles/8wayrun/EWRmedio.png\') 0px 0px; }
.pTop { background: url(\'styles/8wayrun/EWRmedio.png\') -20px 0px; }
.pUpp { background: url(\'styles/8wayrun/EWRmedio.png\') -40px 0px; }
.pDwn { background: url(\'styles/8wayrun/EWRmedio.png\') -60px 0px; }
.pBtm { background: url(\'styles/8wayrun/EWRmedio.png\') -80px 0px; }

.pRem:hover { background: url(\'styles/8wayrun/EWRmedio.png\') 0px -20px; }
.pTop:hover { background: url(\'styles/8wayrun/EWRmedio.png\') -20px -20px; }
.pUpp:hover { background: url(\'styles/8wayrun/EWRmedio.png\') -40px -20px; }
.pDwn:hover { background: url(\'styles/8wayrun/EWRmedio.png\') -60px -20px; }
.pBtm:hover { background: url(\'styles/8wayrun/EWRmedio.png\') -80px -20px; }

.medioBBc { text-align: center; margin: 5px 10px; }
.medioBBc .bbCodeBlock { width: 340px; display: inline-block; }
.medioBBc .bbCodeMedio { background-size: 100% !important; }
.medioBBc a:hover, .medioBBc a:focus { background: transparent; }

.ctrlUnit dd .hint
{
	font-size: 11px;
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	margin-left: ' . XenForo_Template_Helper_Core::styleProperty('formCtrlIndent') . ';
	margin-top: 2px;
}

.sortColumn .sortDelete { float: left; margin: 7px 0px 0px 100px; }
.sortColumn dt img { height: 38px; } 
.sortColumn .portlet { border: 1px dotted ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . '; }
.sortColumn .portlet-placeholder { border: 2px dashed ' . XenForo_Template_Helper_Core::styleProperty('contentText') . '; height: 35px; }
.sortColumn .portlet-placeholder * { visibility: hidden; }

.copyright { text-align: center; font-size: 11px; margin: 10px; }';
