<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/*GLOBAL OPTIONS*/
#formbox
{
    width:100%;
    height:' . XenForo_Template_Helper_Core::styleProperty('adv_template_latex_height') . ';
    overflow-x: hidden;
    overflow-y: auto;
    background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
}

.heading
{
    margin-bottom: 0 !important;
}

.advtopextra
{
    margin-left:3px;
}

#trigger_help
{
    cursor: pointer;
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

.latex_helper
{
    width:100%;
    border-collapse: collapse;
    border-spacing: 5px;
    text-align:center;
    background-color:white;
    color:black;
    border:1px solid black;
    font-size: 7pt;
}

.latex_helper img
{
    border:0;
}


.latex_helper #op_desc
{
    background-color:black;
    color:white;
}

.latex_helper td
{
    border-top: 1px solid black;
    border-bottom: 1px solid black;
    padding:3px;
}

.latex_helper td.cmd
{
    cursor: pointer;
}    

#latex_link
{
    width:100%;
    text-align:center;
}

.fastlatex{
	width:530px !important;
}';
