<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/*GLOBAL OPTIONS*/
#formbox
{
    width:100%;
    height:' . XenForo_Template_Helper_Core::styleProperty('adv_template_bimg_height') . ';
    overflow-x: hidden;
    overflow-y: auto;
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
}

.heading
{
    margin-bottom: 0 !important;
}


.subHeading
{
    width:100% !important;
}

#trigger_caption
{
    cursor: pointer;
}

p.info
{
    font-size: 8pt;
    font-weight: bold;
}

p.info span
{
    font-weight: normal;
    font-style: italic;
}

/*WIDTH OPTIONS*/
#options_width
{
    width: 100%;
    margin: 0;
}

#options_width li.standards span
{
    font-size: 9pt;
}

#options_width li.standards span.muted
{
    font-size: 9pt;
    color:' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
}


#ctrl_widthtype
{
    text-align:center;
    cursor: pointer;
}

#ctrl_widthtype:hover
{
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
    border:1px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
}

/*FLOAT OPTIONS*/

#float_select
{
    width: 100%;
    margin: 5px 0; 
    text-align:center;
}

#float_select li
{
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

#float_select li.active
{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
}

#float_select li:hover
{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
}

#float_select li#normalSelect.active:hover
{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
}

#float_select li span
{
	width:100px;
}

#float_select li span.hidden
{
	display:none;
}

#float_select li div.img
{
	display:block;
	margin-left:auto;
	margin-right:auto;
	height:68px;
	width:100px;
	border:1px solid black; 
}

	#float_select li.normal div.img
	{
		background: url("js/tinymce/plugins/advtoolbar/templates/images/float_normal.png") 0 0 no-repeat;
	}

	#float_select li.normal_center div.img
	{
		background: url("js/tinymce/plugins/advtoolbar/templates/images/float_normal.png") 0 -68px no-repeat;
	}

	#float_select li.normal_right div.img
	{
		background: url("js/tinymce/plugins/advtoolbar/templates/images/float_normal.png")  0 -136px no-repeat;
	}

	#float_select li.fleft div.img
	{
		background: url("js/tinymce/plugins/advtoolbar/templates/images/float_left.png") no-repeat;
	}

	#float_select li.fright div.img
	{
		background: url("js/tinymce/plugins/advtoolbar/templates/images/float_right.png") no-repeat;
	}

/*CAPTIONS OPTIONS*/

#caption_content
{
    width: 100%;
}

#caption_select
{
    margin: 5px 0; 
    text-align:center;
}

#caption_select li
{
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

#caption_select li.active
{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
}

#caption_select li:hover
{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
}

#caption_select li span
{
	width:100px;
}

#caption_select li div.img
{
	display:block;
	margin-left:auto;
	margin-right:auto;
	height:68px;
	width:100px;
	border:1px solid black; 
}

	#caption_select li.bottom_out div.img
	{
		background: url("js/tinymce/plugins/advtoolbar/templates/images/cap_bottom_out.png") no-repeat;
	}

	#caption_select li.top_out div.img
	{
		background: url("js/tinymce/plugins/advtoolbar/templates/images/cap_top_out.png") no-repeat;
	}

	#caption_select li.bottom_in div.img
	{
		background: url("js/tinymce/plugins/advtoolbar/templates/images/cap_bottom_in.png") no-repeat;
	}
	#caption_select li.top_in div.img
	{
		background: url("js/tinymce/plugins/advtoolbar/templates/images/cap_top_in.png") no-repeat;
	}

.fastbimg
{
	width:530px !important;
}';
