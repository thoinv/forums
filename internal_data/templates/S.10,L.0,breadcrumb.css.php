<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '@CHARSET "UTF-8";

/* --- breadcrumb.css --- */

.breadBoxTop,
.breadBoxBottom
{
	padding: 10px 0;
overflow: hidden;
zoom: 1;
clear: both;
-webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;

}

.breadBoxTop
{
}

.breadBoxTop .topCtrl
{
	margin-left: 5px;
float: right;
line-height: 24px;

}

.breadcrumb
{
	font-size: 11px;
background: rgb(250, 250, 250) url(\'styles/vxf/xenforo/gradients/category-23px-light.png\') repeat-x top;
border: 1px solid rgb(217, 217, 217);
overflow: hidden;
zoom: 1;
max-width: 100%;
height: 24px;

}

.breadcrumb.showAll
{
	height: auto;
}

.breadcrumb .boardTitle
{
	display: none;

}

.breadcrumb .crust
{
	display: block;
float: left;
position: relative;
zoom: 1;
max-width: 50%;

}

.breadcrumb .crust a.crumb
{
	cursor: pointer;
	color: #888;
text-decoration: none;
background-color: rgb(250, 250, 250);
padding: 0 10px 0 18px;
border-bottom-width: 1px;
border-bottom-color: rgb(200,200,200);
outline: 0 none;
-moz-outline-style: 0 none;
display: block;
line-height: 24px;
_border-bottom: none;

}

	.breadcrumb .crust a.crumb > span
	{
		display: block;
		text-overflow: ellipsis;
		white-space: nowrap;
		overflow: hidden;
		max-width: 100%;
	}

	.breadcrumb .crust:first-child a.crumb
	{
		padding-left: 10px;
-webkit-border-top-left-radius: 4px; -moz-border-radius-topleft: 4px; -khtml-border-top-left-radius: 4px; border-top-left-radius: 4px;
-webkit-border-bottom-left-radius: 4px; -moz-border-radius-bottomleft: 4px; -khtml-border-bottom-left-radius: 4px; border-bottom-left-radius: 4px;

	}
	
	.breadcrumb .crust:last-child a.crumb
	{
		
	}

.breadcrumb .crust .arrow
{
	border: 12px solid transparent;
border-right: 1px none black;
border-left-color: rgb(200,200,200);
-moz-border-right-colors: rgb(200,200,200);
display: block;
position: absolute;
right: -12px;
top: 0px;
z-index: 50;
width: 0px;
height: 0px;

}

.breadcrumb .crust .arrow span
{
	border: 12px solid transparent;
border-right: 1px none black;
border-left-color: rgb(250, 250, 250);
-moz-border-right-colors: rgb(250, 250, 250);
display: block;
position: absolute;
left: -13px;
top: -12px;
z-index: 51;
white-space: nowrap;
overflow: hidden;
text-indent: 9999px;
width: 0px;
height: 0px;

}

.breadcrumb .crust:hover a.crumb
{
	background-color: rgb(237, 237, 237);

}

.breadcrumb .crust:hover .arrow span
{
	border-left-color: rgb(237, 237, 237);
}

	.breadcrumb .crust .arrow
	{
		/* hide from IE6 */
		_display: none;
	}

.breadcrumb .jumpMenuTrigger
{
	background: transparent url(\'styles/vxf/xenforo/xenforo-ui-sprite.png\') no-repeat 0 0;
margin: 5px 5px 6px;
display: block;
float: right;
white-space: nowrap;
text-indent: 9999px;
overflow: hidden;
width: 13px;
height: 13px;

}


@media (max-width:480px)
{
	.Responsive .breadBoxTop.withTopCtrl
	{
		display: table;
		table-layout: fixed;
		width: 100%;
	}

	.Responsive .breadBoxTop.withTopCtrl nav
	{
		display: table-header-group;
	}

	.Responsive .breadBoxTop.withTopCtrl .topCtrl
	{
		display: table-footer-group;
		margin-top: 5px;
		text-align: right;
	}
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .breadBoxTop.withTopCtrl
	{
		display: table;
		table-layout: fixed;
		width: 100%;
	}

	.Responsive .breadBoxTop.withTopCtrl nav
	{
		display: table-header-group;
	}

	.Responsive .breadBoxTop.withTopCtrl .topCtrl
	{
		display: table-footer-group;
		margin-top: 5px;
		text-align: right;
	}
}
';
}
