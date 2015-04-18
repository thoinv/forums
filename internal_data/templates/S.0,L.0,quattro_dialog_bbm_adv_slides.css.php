<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.mce-xen-body .advSlidesTabs {
	padding-top: 2px;
	padding-bottom: 5px;
	overflow-x:auto;
}

.mce-xen-body #adv_slides_wrapper .mcePanes{
	max-width: 500px;
}

.mce-xen-body .advSlidesTabs > div {
	font-size: 20px;
	text-align: center;
	border: 1px solid grey;
	color: grey;
	cursor: pointer;
	display: inline;
	padding: 1px;
	margin:1px;
}

.mce-xen-body .slideTab.current {
	color:red;
}

.mce-xen-body .advSlidesPanes {
	height: 270px;
}

.mce-xen-body #adv_slides_create {
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . ';
	color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryDarker') . ';	
	cursor: pointer;
	display: block;
	float: right;
	height: 30px;
	line-height: 30px;
	padding: 0 10px;
	position: relative;
	right: 20px;
	vertical-align: middle;
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	border-radius: 2px;
	display:none;
}

.mce-xen-body dl.xenmce_inline > dt{
	margin-right:5px;
}

.mce-xen-body #xenpane_adv_slides_configuration dl.xenmce_inline > dt{
	margin-right:5px;
}

.mce-xen-body .advOnlySlider, .mce-xen-body .advOnlyTabs{
	display:none;
}

.mce-xen-body .advSlideHide > *{
	display:none;	
}

.mce-xen-body .advSlidesIdTrigger{
	display:inline-block !important;
	background: none repeat scroll 0 0 ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
	border: 1px solid #C5C5C5;
	border-radius: 3px 3px 3px 3px;
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
	color:  ' . XenForo_Template_Helper_Core::styleProperty('primaryDark') . ';
	height: 28px;
	padding: 0 4px !important;
}

.mce-xen-body .advSlidesIdTrigger.active{
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryDark') . ';
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
}

/*MODE OPTIONS*/
.mce-xen-body #adv_slides_mode{
	text-align:center;
}

.mce-xen-body #adv_slides_mode li{
	display:inline-block;
	list-style-type: none;
	text-align:center;
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

.mce-xen-body #adv_slides_mode li.active{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';

}

.mce-xen-body #adv_slides_mode li:hover{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
}

.mce-xen-body #adv_slides_mode li div.img{
	display:block;
	margin-left:auto;
	margin-right:auto;
	height:68px;
	width:100px;
	border:0; 
}

	.mce-xen-body #adv_slides_mode li.adv_accordion div.img	{
		background: url("styles/sedo/adv/sliders_btn.png") 4px 0 no-repeat;
	}

	.mce-xen-body #adv_slides_mode li.adv_tabs div.img	{
		background: url("styles/sedo/adv/sliders_btn.png") -96px 0 no-repeat;
	}

	.mce-xen-body #adv_slides_mode li.adv_slider div.img	{
		background: url("styles/sedo/adv/sliders_btn.png") -192px 0 no-repeat;
	}

.mce-xen-body .quattro_slides_attach{
	display:none;
	overflow:auto;
	border: 1px dotted black;
	padding:5px;
}


.mce-xen-body .quattro_slide_attach > img {
	float: left;
	border: 1pt solid grey;
	margin: 2px;
	padding: 5px;
	cursor: pointer;
}

.mce-xen-body .quattro_slide_attach > img:hover {
	border-color: red;
}

.mce-xen-body .quattro_slides_attach p{
	text-align:center;
}

.mce-xen-body .advSlidesIdTrigger{
	cursor:pointer;
}


	.mce-xen-body #adv_sliders_width_type{
		text-align:center;
		cursor: pointer;
	}
	
	.mce-xen-body #adv_sliders_width_type:hover{
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
		border:1px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
	}

	.mce-xen-body #adv_sliders_height{
		text-align:center;
	}

	.mce-xen-body #adv_sliders_interval,
	.mce-xen-body #adv_sliders_interval_type{
		text-align:center;
	}
	

	
#xenpane_slides_builder .slideDelete{
	float: right;
	width: 20px;
	height: 20px;
	line-height: 20px;
	vertical-align: middle;
	padding: 2px;
	text-align: center;
	background: red;
	color: white;
	font-weight: bold;
	cursor: pointer;
	border-radius: 15px;
}

#xenpane_slides_builder .slidePane:first-child .slideDelete{
	display:none;
}

#xenpane_slides_builder dl.xenmce_inline > dt{
	margin-right:0;
}

#xenpane_slides_builder .slave_content{
	width:98%;
	height:195px;
	line-height: 20px;
	vertical-align: middle;
}


#xenpane_slides_builder .slave_align
{
	display:inline-block;
	vertical-align: middle;
	/* Ugly Hack IE < 8 */
	*display: inline;
	*zoom : 1;
}

#xenpane_slides_builder .slave_align > li
{
	display:inline-block;
	list-style-type: none;
	width: 23px;
	height:21px;

	/* Ugly Hack IE < 8 */
	*display: inline;
	*zoom : 1;
}

#xenpane_slides_builder .slave_align > li > div
{
	width: 23px;
	height: 21px;
	cursor:pointer;
}

#xenpane_slides_builder .slave_align .align_left
{
	background: url("styles/sedo/adv/align.png") 0 0 no-repeat;
}

#xenpane_slides_builder .slave_align .align_center
{
	background: url("styles/sedo/adv/align.png") -22px 0 no-repeat;
}

#xenpane_slides_builder .slave_align .align_right
{
	background: url("styles/sedo/adv/align.png") -44px 0 no-repeat;
}

	#xenpane_slides_builder .slave_align .align_select_left,
	#xenpane_slides_builder .slave_align .align_left:hover
	{
		background: url("styles/sedo/adv/align.png") 0 -21px no-repeat;
	}

	#xenpane_slides_builder .slave_align .align_select_center,
	#xenpane_slides_builder .slave_align .align_center:hover
	{
		background: url("styles/sedo/adv/align.png") -22px -21px no-repeat;
	}

	#xenpane_slides_builder .slave_align .align_select_right,
	#xenpane_slides_builder .slave_align .align_right:hover
	{
		background: url("styles/sedo/adv/align.png") -44px -21px no-repeat;
	}


#xenpane_slides_builder .slave_height, 
#xenpane_slides_builder .slave_height_type{
	text-align:center;
}

';
