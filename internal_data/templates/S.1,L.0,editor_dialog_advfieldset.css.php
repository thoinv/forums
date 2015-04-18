<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/*GLOBAL OPTIONS*/
#formbox
{
    width:100%;
    height:' . XenForo_Template_Helper_Core::styleProperty('adv_template_fieldset_height') . ';
    overflow-x: hidden;
    overflow-y: auto;
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
}

.heading
{
    margin-bottom: 0 !important;
}

#ctrl_src
{
    margin:2px;
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

/*BLOCK ALIGN OPTIONS*/

#block_align
{
    width: 100%;
    margin: 5px 0; 
    text-align:center;
}

#block_align li
{
	display:inline-block;
	list-style-type: none;
	height:25px;
	width: 150px;
	cursor: pointer;

	background-color:' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';

	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryContent.background-color') . ';
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;

	 /* Ugly Hack IE < 8 */
	*display: inline;
	*zoom : 1;
}

#block_align li.active
{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
}

#block_align li:hover
{
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
	background:' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . ';
}

#block_align li div
{
	display:block;
	margin-left:auto;
	margin-right:auto;
	width:150px;
	height:25px;
	line-height:25px;
	vertical-align:middle;
}

.fastlatex
{
	width:530px !important
}';
