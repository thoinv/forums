<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '@CHARSET "UTF-8";

/* --- moderator_bar.css --- */

#moderatorBar
{
	background-color: #0A3552;
	/*border-bottom: 1px solid #77ADDF;*/
	font-size: 11px;
        height: 25px;
}

/*#moderatorBar
{
	-webkit-box-shadow: 0 0 5px #175F92; -moz-box-shadow: 0 0 5px #175F92; -khtml-box-shadow: 0 0 5px #175F92; box-shadow: 0 0 5px #175F92;
	width: 100%;
	position: fixed;
	top: 0px;
	z-index: 100;
}

body
{
	padding-top: 25px;
}*/

/* clearfix */ #moderatorBar { zoom: 1; } #moderatorBar:after { content: \'.\'; display: block; height: 0; clear: both; visibility: hidden; }

#moderatorBar .pageContent
{
	padding: 2px 0;
}

#moderatorBar a
{
	display: inline-block;
	padding: 2px 10px;
	-webkit-border-radius: 3px; -moz-border-radius: 3px; -khtml-border-radius: 3px; border-radius: 3px;
}

#moderatorBar a,
#moderatorBar .itemCount
{
	color: #a5cae4;
}

	#moderatorBar a:hover
	{
		text-decoration: none;
		background-color: #0A3552;
		color: #77ADDF;
	}

/* TODO: maybe sort out the vertical alignment of the counters so they they are properly centered */

#moderatorBar .itemLabel,
#moderatorBar .itemCount
{
	display: inline-block;
	height: 16px;
	line-height: 16px;
}


#moderatorBar .itemCount
{	
	background: #0F517F;
	padding-left: 6px;
	padding-right: 6px;
	
	text-align: center;
	
	font-weight: bold;
	
	-webkit-border-radius: 2px; -moz-border-radius: 2px; -khtml-border-radius: 2px; border-radius: 2px;
	text-shadow: none;
}

	#moderatorBar .itemCount.alert
	{
		background: #e03030;
		color: white;
		-webkit-box-shadow: 2px 2px 5px rgba(0,0,0, 0.25); -moz-box-shadow: 2px 2px 5px rgba(0,0,0, 0.25); -khtml-box-shadow: 2px 2px 5px rgba(0,0,0, 0.25); box-shadow: 2px 2px 5px rgba(0,0,0, 0.25);
	}
	
#moderatorBar .adminLink
{
	float: right;
}

#moderatorBar .permissionTest,
#moderatorBar .permissionTest:hover
{
	background: #e03030;
	color: white;
	-webkit-box-shadow: 2px 2px 5px rgba(0,0,0, 0.25); -moz-box-shadow: 2px 2px 5px rgba(0,0,0, 0.25); -khtml-box-shadow: 2px 2px 5px rgba(0,0,0, 0.25); box-shadow: 2px 2px 5px rgba(0,0,0, 0.25);
	font-weight: bold;
}

#moderatorBar .headerLeft {
	float: left;
    margin: 3px;
    width: 50%;	
}

#moderatorBar .headerRight {
	float: right;
}



@media (max-width:800px)
{
	.modLink {
		display: none !important;
	}
}

@media (max-width:480px)
{
	#moderatorBar .headerLeft {
		display: none !important;
	}
}';
