<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '
.mce-xen-body #adv_encadre_textarea{
	max-width:470px;
	width:95%;
	height:105px;
}

.mce-xen-body #adv_encadre { 
	max-width:500px;
	padding:5px; 
}

.mce-xen-body p.info
{
	margin-top:5px;
	font-size: 7pt;
	font-weight: bold;
}

.mce-xen-body p.info span
{
	font-size: 7pt;
	font-weight: normal;
	font-style: italic;
}

.mce-xen-body #adv_encadre_widthtype
{
	text-align:center;
	cursor: pointer;
}

.mce-xen-body #adv_encadre_width_type{
	text-align:center;
	cursor: pointer;
}

.mce-xen-body #adv_encadre_width_type:hover{
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
	border:1px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
}

.mce-xen-body #adv_encadre_widthtype:hover
{
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
	border:1px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
}


.mce-xen-body #adv_encadre_selectlist
{
	max-width:485px;
	text-align:center;
}

.mce-xen-body #adv_encadre_selectlist div
{
	text-align:center;
}

.mce-xen-body #adv_encadre_selectlist li
{
	display:inline-block;
	list-style-type: none;
	height:38px;
	width: 240px;
	 /* Ugly Hack IE < 8 */
	*display: inline;
	*zoom : 1;
}



.mce-xen-body #adv_encadre_skins
{
	width: 100%;
	margin: 5px 0; 
	text-align:center;
}

.mce-xen-body #adv_encadre_skins li
{
	display:inline-block;
	list-style-type: none;
	height:25px;
	width: 110px;
	cursor: pointer;
	background-color:' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryContent.background-color') . ';
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
	
	*display: inline;
	*zoom : 1;
}

.mce-xen-body #adv_encadre_skins li.active
{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ';
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
}

.mce-xen-body #adv_encadre_skins li:hover
{
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	background:' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
}

.mce-xen-body #adv_encadre_skins li div
{
	display:block;
	margin-left:auto;
	margin-right:auto;
	width:100px;
	height:25px;
	line-height:25px;
	vertical-align:middle;
}

.mce-xen-body #adv_encadre_skins li span
{
	width:100px;
}



.mce-xen-body #adv_encadre_float
{
	width: 100%;
	margin: 5px 0; 
	text-align:center;
}

.mce-xen-body #adv_encadre_float li
{
	display:inline-block;
	list-style-type: none;
	height:25px;
	width: 110px;
	cursor: pointer;
	background-color:' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryContent.background-color') . ';
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
	
	*display: inline;
	*zoom : 1;
}

.mce-xen-body #adv_encadre_float li.active
{
	background-color:' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
}

.mce-xen-body #adv_encadre_float li:hover
{
	border:2px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
	background:' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . ';
}

.mce-xen-body #adv_encadre_float li div
{
	display:block;
	margin-left:auto;
	margin-right:auto;
	width:100px;
	height:25px;
	line-height:25px;
	vertical-align:middle;
}

.mce-xen-body #adv_encadre_float li span
{
	width:100px;
}';
