<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '
.mce-xen-body #xenpane_bimg_general dl.xenmce_inline > dt{
	margin-right:10px;
}

.mce-xen-body #adv_bimg_width{
	width: 60px;
	text-align:center;
}

.mce-xen-body #adv_bimg_width_type{
	text-align:center;
	cursor: pointer;
}

.mce-xen-body #adv_bimg_width_type:hover{
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
	border:1px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
}

.mce-xen-body #adv_bimg_options_width li.standards span{
	font-size: 9pt;
}

.mce-xen-body #adv_bimg_options_width li.standards span.muted{
	font-size: 9pt;
	color:' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
}

/*FLOAT OPTIONS*/
.mce-xen-body #adv_bimg_options_float{
	margin-top:10px;
}

.mce-xen-body #adv_bimg_float_select{
	width: 100%;
	margin: 5px 0; 
	text-align:center;
}

.mce-xen-body #adv_bimg_float_select li{
	display:inline-block;
	list-style-type: none;
	padding-top:10px;
	height:90px;
	width: 140px;
	cursor: pointer;
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryContent.background-color') . ';
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;

	 /* Ugly Hack IE < 8 */
	*display: inline;
	*zoom : 1;
}

.mce-xen-body #adv_bimg_float_select li.active{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
}

.mce-xen-body #adv_bimg_float_select li:hover{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
}

.mce-xen-body #adv_bimg_float_select li#adv_bimg_normal_select.active:hover{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
}

.mce-xen-body #adv_bimg_float_select li span{
	display: block;
	text-align: center;
	font-size: 10pt;
}

.mce-xen-body #adv_bimg_float_select li span.hidden{
	display:none;
}

.mce-xen-body #adv_bimg_float_select li div.img{
	display:block;
	margin-left:auto;
	margin-right:auto;
	height:68px;
	width:100px;
	border:1px solid black; 
}

	.mce-xen-body #adv_bimg_float_select li.normal div.img	{
		background: url("styles/sedo/adv/float_normal.png") 0 0 no-repeat;
	}

	.mce-xen-body #adv_bimg_float_select li.normal_center div.img {
		background: url("styles/sedo/adv/float_normal.png") 0 -68px no-repeat;
	}

	.mce-xen-body #adv_bimg_float_select li.normal_right div.img {
		background: url("styles/sedo/adv/float_normal.png")  0 -136px no-repeat;
	}

	.mce-xen-body #adv_bimg_float_select li.fleft div.img	{
		background: url("styles/sedo/adv/float_left.png") no-repeat;
	}

	.mce-xen-body #adv_bimg_float_select li.fright div.img	{
		background: url("styles/sedo/adv/float_right.png") no-repeat;
	}

.mce-xen-body p.info{
	font-size: 7pt;
	font-weight: bold;
}

.mce-xen-body p.info span{
	font-size: 7pt;
	font-weight: normal;
	font-style: italic;
}

/*CAPTIONS OPTIONS*/

.mce-xen-body #adv_bimg_caption_textarea{
	max-width:350px;
	height:40px;
}

.mce-xen-body #adv_bimg_caption_select li span {
	display: block;
	text-align: center;
	font-size: 10pt;
}

.mce-xen-body #adv_bimg_caption_content{
	width: 100%;
}

.mce-xen-body #adv_bimg_caption_select{
	margin: 5px 0; 
	text-align:center;
}

.mce-xen-body #adv_bimg_caption_select li{
	display:inline-block;
	list-style-type: none;
	padding-top:10px;
	height:90px;
	width: 110px;
	cursor: pointer;

	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryContent.background-color') . ';
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;

	 /* Ugly Hack IE < 8 */
	*display: inline;
	*zoom : 1;
}

.mce-xen-body #adv_bimg_caption_select li.active{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
}

.mce-xen-body #adv_bimg_caption_select li:hover{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
}


.mce-xen-body #adv_bimg_caption_select li div.img{
	display:block;
	margin-left:auto;
	margin-right:auto;
	height:68px;
	width:100px;
	border:1px solid black; 
}

	.mce-xen-body #adv_bimg_caption_select li.bottom_out div.img
	{
		background: url("styles/sedo/adv/cap_bottom_out.png") no-repeat;
	}

	.mce-xen-body #adv_bimg_caption_select li.top_out div.img
	{
		background: url("styles/sedo/adv/cap_top_out.png") no-repeat;
	}

	.mce-xen-body #adv_bimg_caption_select li.bottom_in div.img
	{
		background: url("styles/sedo/adv/cap_bottom_in.png") no-repeat;
	}
	.mce-xen-body #adv_bimg_caption_select li.top_in div.img
	{
		background: url("styles/sedo/adv/cap_top_in.png") no-repeat;
	}

.mce-xen-body .caption_align{
	float:right;
}

.mce-xen-body .quattro_bimg_attach_wrapper{
	overflow:auto;
	border: 1px dotted black;
	padding:5px;
	height: 175px;
}


.mce-xen-body .quattro_bimg_attach {
	float: left;
}

.mce-xen-body .quattro_bimg_attach > img {
	border: 1pt solid grey;
	margin: 2px;
	padding: 5px;
	cursor: pointer;
}

.mce-xen-body .quattro_bimg_attach > img:hover {
	border-color: red;
}


.mce-xen-body .quattro_bimg_attach .attach_id {
	bottom: 15px;
	color: #808080;
	font-size: 7pt;
	position: relative;
	right: 7px;
	text-align: right;
	text-shadow: -1px 1px 1px #fff;
}

.mce-xen-body dd.dd_inline > * {
	display: inline-block;
	margin: 5px;
}

.mce-xen-body select#adv_bimg_diff_pos{
	height:45px;
}

.mce-xen-body select#adv_bimg_diff_pos option{
	padding: 1px;
}
';
