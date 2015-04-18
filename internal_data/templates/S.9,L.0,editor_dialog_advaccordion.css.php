<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/*GLOBAL OPTIONS*/
#adv_mode {
	float:right;
	margin: 8px 10px 0 0;
}

.cust_heading {
	padding: 10px !important;
}

#formbox
{
    width:100%;
    height:' . XenForo_Template_Helper_Core::styleProperty('adv_template_accordion_height') . ';
    overflow-x: hidden;
    overflow-y: auto;
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
}

.heading
{
    margin-bottom: 0 !important;
}

#menu_right
{
    float:right;
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

#ctrl_height
{
    text-align:center;
}

.slide_title, .slide_content{
    width:90%;
}

.slide{
    background-color:' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
    padding:8px;
    margin-bottom:6px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
}

.slide_manage{
    float:right;
    text-align:center;
}
.button_x{
    width:21px;
    height:21px;
    -webkit-border-radius: 35px;
    -moz-border-radius: 35px;
    border-radius: 35px;
    background-color :' . XenForo_Template_Helper_Core::styleProperty('primaryDarker') . ';
    cursor: pointer;

}
.button_x span{
    vertical-align:middle;
    font-size:1em;
    color:white;
    font-weight:bold;
}

.title_options
{
    height:30px;
}

.title_options > li
{
    display:inline-block;
    list-style-type: none;
    height:30px;
    cursor: pointer;
    vertical-align: middle;

    /* Ugly Hack IE < 8 */
    *display: inline;
    *zoom : 1;
}

.align_options > li
{
    display:inline-block;
    list-style-type: none;
    height:21px;
    width: 23px; /*new*/

    /* Ugly Hack IE < 8 */
    *display: inline;
    *zoom : 1;
}

.align_button{
    width:23px;
    height:21px;
}

.align_left
{
	background: url("js/tinymce/plugins/advtoolbar/templates/images/align.png") 0 0 no-repeat;
}
.align_center
{
	background: url("js/tinymce/plugins/advtoolbar/templates/images/align.png") -22px 0 no-repeat;
}
.align_right
{
	background: url("js/tinymce/plugins/advtoolbar/templates/images/align.png") -44px 0 no-repeat;
}

.align_select_left,.align_left:hover
{
	background: url("js/tinymce/plugins/advtoolbar/templates/images/align.png") 0 -21px no-repeat;
}
.align_select_center,.align_center:hover
{
	background: url("js/tinymce/plugins/advtoolbar/templates/images/align.png") -22px -21px no-repeat;
}
.align_select_right,.align_right:hover
{
	background: url("js/tinymce/plugins/advtoolbar/templates/images/align.png") -44px -21px no-repeat;
}

.openbox
{
    line-height:30px;
}

.button_create
{
    height: 20px;
    line-height: 20px;
    vertical-align: middle;
    padding: 2px 20px;
    margin-top: 3px;
    -webkit-border-radius: 15px;
    -moz-border-radius: 15px;
    border-radius: 15px;
    background-color:  ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . ';
    cursor: pointer;
    text-align: center;
}

.button_create:hover
{
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
}

.displayid
{
    width:21px;
    height:21px;
    line-height:21px;
    text-align:center;
    vertical-align:middle;
    font-size:8pt;
}

.fastaccordion
{
	width:530px !important
}

.cust_popup .primaryContent input,
.cust_popup .secondaryContent input {
	font-size: 12px !important;
}

';
