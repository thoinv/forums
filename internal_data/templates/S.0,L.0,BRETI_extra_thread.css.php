<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.bretiExtraThread{
	padding: 0;
	margin-left: 140px;
	border-bottom: 1px none black;
	margin-top:10px;
}
.bretiExtraThread .menuHeader{
	font-size: 14px; 
	font-weight: bold;
	border-bottom: 1px solid #A5CAE4;
	display: block;
	padding: 5px;
}
.bretiExtraThread ul{
	margin-left: 10px;
}
.bretiExtraThread ul li{
	padding: 5px 0;
}
.bretiDate{
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	font-size: 11px;
}
.bretiRandomThread{
	bottom: 70px;
	box-shadow: 2px 2px 10px 1px #CCC;
	border: 1px #CCC solid;
	background: #FFF;
	display: none;
	padding: 10px;
	position: fixed;
	right: 20px;
	width: 320px;
	z-index: 9999999999;
}

.bretiRandomThread .menuHeader .close{
	float:right;
	background: #EEE;
	border: 1px #CCC solid;
	border-radius: 17px;
	color: #666;
	cursor: pointer;
	float: right;
	height: 17px;
	line-height: 17px;
	margin: -5px;
	text-align: center;
	width: 17px;
}
.bretiRandomThread >ul{
	margin-top: 10px;
}
.bretiRandomThread .thumbnail{
	float: left;
}
.bretiRandomThread .threadDetail{
	margin-left: 56px;
}
.bretiRandomThread .threadTitle{
	font-size: 14px;
	display: inline-block;
}
.bretiRandomThread .bretiDate{
	display: block;
}';
