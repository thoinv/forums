<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '@CHARSET "UTF-8";

/* --- login_bar.css --- */

/** Login bar basics **/

#loginBar
{
	color: #a5cae4;
background-color: #0A3552;
float: right;
z-index: 1;
/*border-bottom: 1px solid #77ADDF;
	position: relative;*/

}

	#loginBar .pageContent
	{
		padding-top: 5px;
		position: relative;
		_height: 0px;
	}

	#loginBar a
	{
		color: #6cb2e4;

	}
	
	#loginBar span
	{
		vertical-align: top;
		padding-top: 2px;
	}

	#loginBar form
	{
		padding: 5px 0;
margin: 0 auto;
display: none;
line-height: 20px;
position: relative;

	}
	
		#loginBar .xenForm .ctrlUnit,		
		#loginBar .xenForm .ctrlUnit dt label
		{
			margin: 0;
			border: none;
		}
	
		#loginBar .xenForm .ctrlUnit dt
		{
			width: -35px;
		}
		
		#loginBar .xenForm .ctrlUnit dd
		{
			position: relative;
			width: 0px;
		}

	#loginBar .xenForm .ctrlUnit dd .textCtrl,
	#loginBar .passwordOptions
	{
		width: 0px;
		-webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	}
	
	#loginBar .lostPassword
	{
		margin-top: 38px;
		font-size: 11px;
	}

	#loginBar .lostPasswordLogin
	{
		font-size: 11px;
	}
	
	#loginBar .rememberPassword
	{
		font-size: 11px;
	}

	#loginBar .textCtrl
	{
		color: #f0f7fc;
background-color: #0F517F;
border-color: #77ADDF;

	}
	
	#loginBar .textCtrl[type=text]
	{
		font-weight: bold;
font-size: 18px;

	}

	#loginBar .textCtrl:-webkit-autofill /* http://code.google.com/p/chromium/issues/detail?id=1334#c35 */
	{
		background: #0F517F !important;
		color: #f0f7fc;
	}

	#loginBar .textCtrl:focus
	{
		background: black none;

	}
	
	#loginBar input.textCtrl.disabled
	{
		color: #a5cae4;
background-color: #0A3552;
border-style: dashed;

	}
	
	#loginBar .button
	{
		min-width: 85px;
		*width: 85px;
	}
	
		#loginBar .button.primary
		{
			font-weight: bold;
		}
		
/** changes when eAuth is present **/

#loginBar form.eAuth
{
	width: 200px; /* normal width + 170px */
}

	#loginBar form.eAuth .ctrlWrapper
	{
		border-right: 1px dotted #175F92;
		margin-right: 200px;
		-webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	}

	#loginBar form.eAuth #eAuthUnit
	{
		position: absolute;
		top: 0px;
		right: 0px;
	}

		#eAuthUnit li
		{
			margin-top: 10px;
		}
	
			#eAuthUnit li a
			{
				width: 180px;
				-webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
			}
	
/** handle **/

#loginBar #loginBarHandle
{
	font-size: 11px;
color: #f0f7fc;
background-color: #0A3552;
padding: 0 10px;
margin-right: 20px;
-webkit-border-bottom-right-radius: 10px; -moz-border-radius-bottomright: 10px; -khtml-border-bottom-right-radius: 10px; border-bottom-right-radius: 10px;
-webkit-border-bottom-left-radius: 10px; -moz-border-radius-bottomleft: 10px; -khtml-border-bottom-left-radius: 10px; border-bottom-left-radius: 10px;
position: absolute;
right: 0px;
bottom: -20px;
text-align: center;
z-index: 1;
line-height: 20px;
-webkit-box-shadow: 0px 2px 5px #0A3552; -moz-box-shadow: 0px 2px 5px #0A3552; -khtml-box-shadow: 0px 2px 5px #0A3552; box-shadow: 0px 2px 5px #0A3552;

}';
