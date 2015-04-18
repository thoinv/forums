<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '
.mce-xen-body #adv_fieldset_text
{
	max-width:470px;
	height:115px;
	width:95%;
}

.mce-xen-body #adv_fieldset
{ 
	max-width:500px;
	padding:5px; 
}

.mce-xen-body  #adv_fieldset_blockalign div
{
	text-align:center;
}

/*WIDTH ALIGN OPTIONS*/
.mce-xen-body #adv_fieldset_widthtype
{
	text-align:center;
	cursor: pointer;
}

.mce-xen-body #adv_fieldset_width_type
{
	text-align:center;
	cursor: pointer;
}

.mce-xen-body #adv_fieldset_width_type:hover
{
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
	border:1px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
}

.mce-xen-body #adv_fieldset_widthtype:hover
{
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
	border:1px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
}


/*BLOCK ALIGN OPTIONS*/

.mce-xen-body #adv_fieldset_blockalign
{
    width: 100%;
    margin: 5px 0; 
    text-align:center;
}

.mce-xen-body #adv_fieldset_blockalign li
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

.mce-xen-body #adv_fieldset_blockalign li.active
{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
}

.mce-xen-body #adv_fieldset_blockalign li:hover
{
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
	background:' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . ';
}

.mce-xen-body #adv_fieldset_blockalign li div
{
	display:block;
	margin-left:auto;
	margin-right:auto;
	width:150px;
	height:25px;
	line-height:25px;
	vertical-align:middle;
}
';
