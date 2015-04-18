<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '#redirectWrapper {
	max-width: 640px;
	background-color: #ffffff;
	border: 1px solid #cccccc;
	border-radius: 5px;
	display: block;
	margin: 20px auto;
	padding: 30px 40px;
	box-shadow: 0 0 5px rgba(0,0,0,.3);
	font-family: \'Open Sans\', Tahoma, sans-serif;
}

#redirectWrapper .header h1 {
	border-bottom: 1px solid #dddddd;
	font-size: 20px;
	font-weight: normal;
	margin: 0 0 20px;
	padding-bottom: 10px;
}

#redirectWrapper .message {
	color: #222222;
	font-size: 13px;
	line-height: 20px;
	display: block;
}

#redirectWrapper .message p {
	margin: 5px 0 15px;
	display: block;
}

#redirectWrapper .footer {
	padding: 20px 0 0;
	overflow: hidden;
}

#redirectWrapper .footer a {
	float: right;
	border: 1px solid rgba(0,0,0,.2);
	background-color: #00a5f0;
	border-radius: 5px;
	box-shadow: 0 0 0 1px rgba(255,255,255,.4) inset;
	color: #ffffff;
	font-size: 11px;
	padding: 10px;
	min-width: 45px;
	text-align: center;
	text-shadow: 0 -1px rgba(0,0,0,.2);
	font-weight: 600;
	text-decoration: none !important;
	margin: 0 10px;
	display: inline-block;
	transition: all .2s linear 0s;
	-o-transition: all .2s linear 0s;
	-moz-transition: all .2s linear 0s;
	-webkit-transition: all .2s linear 0s;
}

#redirectWrapper .footer a:active,
#redirectWrapper .footer a:focus,
#redirectWrapper .footer a:hover {
	box-shadow: 0 1px 2px rgba(0,0,0,.2) inset;
}

#redirectWrapper .footer a.cancel {
	background-color: #eeeeee;
	color: #888888;
	text-shadow: 0 1px 0 #ffffff;
}

#redirectWrapper .footer a.forward:hover {
	background-color: #24bbff;
}

#redirectWrapper .footer a.forward:active {
	background-color: #0082bd;
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
	@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ') {
		#redirectWrapper {
			padding: 10px 20px;
		}
		
		#redirectWrapper .footer {
			padding: 10px 0 0;
		}
	}
	
	@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ') {
		#redirectWrapper .footer {
			text-align: center;
		}
		
		#redirectWrapper .footer a {
			margin-top: 10px;
			float: none;
		}
	}
';
}
