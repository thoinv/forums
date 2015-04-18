<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '
.mce-xen-body #adv_latex
{ 
	max-width:550px;
	padding:5px; 
}

.mce-xen-body #adv_latex_align {
	float: right;
	position: relative;
	top: -5px;
	height: 18px;
}

.mce-xen-body dl.xenmce_inline > dt{
	margin-right:5px !important;
}

.mce-xen-body #adv_latex_text {
	max-width: 510px;
	height: 120px;
	width: 95%;	
}


.mce-xen-body #xenpane_latex_help
{
	max-width: 515px;
	height: 185px;
	overflow: auto;
	position: relative;
	width:100%;	
}

.mce-xen-body .latex_helper
{
	width:98%;
	border-collapse: collapse;
	border-spacing: 5px;
	text-align:center;
	background-color:white;
	color:black;
	border:1px solid black;
	font-size: 7pt;
}

.mce-xen-body .latex_helper img
{
	border:0;
}


.mce-xen-body .latex_helper #op_desc
{
	background-color:black;
}

.mce-xen-body .latex_helper #op_desc > td
{
	color:white;
}

.mce-xen-body .latex_helper td
{
	font-size: 10pt;
	border-top: 1px solid black;
	border-bottom: 1px solid black;
	padding:3px;
}

.mce-xen-body .latex_helper td.cmd
{
	cursor: pointer;
}	


/*WIDTH ALIGN OPTIONS*/
.mce-xen-body #adv_latex_widthtype
{
	text-align:center;
	cursor: pointer;
}

.mce-xen-body #adv_latex_width_type
{
	text-align:center;
	cursor: pointer;
}

.mce-xen-body #adv_latex_width_type:hover
{
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . ';
	border:1px solid ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
}

';
