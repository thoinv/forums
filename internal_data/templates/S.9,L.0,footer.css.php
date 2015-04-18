<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '@CHARSET "UTF-8";

/* --- footer.css --- */

	
#footer {
	clear: both;
	min-height: 100px;
	padding: 20px 0 25px;
}

.footer {
	background: #303135 url(styles/vxf/footer_bg.png) repeat-x top center;
	clear: both;
	margin-top: 10px;
}

.footercolumns {
	display: inline;
	margin-left: 0;
	margin-right: 0;
}

.footer-top-left {
	float: left;
	width: 42%;
	margin-top: 18px;
	padding-left: 10px;
}

.footer-top-left .block-top {
}

.footer-top-left .block-bottom {
	float: left;
	margin-right: 15px;
	border-bottom: 1px dotted #c8c8c8;
	padding-bottom: 5px;
	margin-bottom: 5px;
}

.footer-top-left .block-bottom span {
	color: #fff;
	display: block;
	font-size: 12px;
	text-transform: uppercase;
	margin-bottom: 5px;
}

.footer-top-left .block-bottom p {
	color: #888;
	font-size: 12px;
	margin-bottom: 0px;
	padding: 4px 0;
}

.footer-top-left .connect-face p {
	font-size: 16px;
	color: #fff;
	text-transform: uppercase;
	font-weight: 400;
	font-style: normal;
	float: left;
	margin-top: 9px;
}

.connect-face ul li {
	float: left;
	padding-left: 10px;
	display: inline;
}

.fotter-contact {
	float: left;
	width: 13%;
	min-height: 174px;
	border-left: 1px dotted #888;
	margin-top: 20px;
	padding-left: 21px;
	padding-right: 16px;
}

#footer h3 {
	color: #fff;
	font-family: \'MyriadProRegular\';
	font-size: 16px;
	text-transform: uppercase;
	font-weight: 400;
	padding-bottom: 11px;
}

.fotter-contact p {
	color: #646464;
	font-size: 12px;
	padding-bottom: 5px;
	margin-bottom: 0px;
}

.fotter-contact a {
	font-size: 11px;
	color: #0daaac;
	text-decoration: none;
	padding-bottom: 8px;
	display: inline-block;
}

#footer .four.columns.column {
	float: left;
	width: 12%;
	min-height: 174px;
	border-left: 1px dotted #888;
	margin-top: 20px;
	padding-left: 20px;
	padding-right: 15px;
}

#footer .column ul li {
}

#footer .column a {
	color: #888;
	font-size: 12px;
	text-decoration: none;
}

#footer .column a:hover {
        color: #bbb;
}

#footer .three.columns.column {
	float: left;
	width: 15%;
	min-height: 174px;
	border-left: 1px dotted #888;
	margin-top: 20px;
	margin-bottom: 10px;
	padding-left: 20px;
	padding-right: 15px;
}
.footer .pageContent
{
	font-size: 11px;
color: #a5cae4;
overflow: hidden;
zoom: 1;

}
	
	.footer a,
	.footer a:visited
	{
		color: #a5cae4;
padding: 5px;
display: block;

	}
	
		.footer a:hover,
		.footer a:active
		{
			color: #d7edfc;

		}

	.footer .choosers
	{
		padding-left: 5px;
float: left;
overflow: hidden;
zoom: 1;

	}
	
		.footer .choosers dt
		{
			display: none;
		}
		
		.footer .choosers dd
		{
			float: left;
			
		}
		
	.footerLinks
	{
		padding-right: 5px;
float: right;
overflow: hidden;
zoom: 1;

	}
	
		.footerLinks li
		{
			float: left;
			
		}
		
			.footerLinks a.globalFeed
			{
				width: 14px;
				height: 14px;
				display: block;
				text-indent: -9999px;
				white-space: nowrap;
				background: url(\'styles/vxf/xenforo/xenforo-ui-sprite.png\') no-repeat -112px -16px;
				padding: 0;
				margin: 5px;
			}
.footerLegal {
	background: #1d1e22;
}

.footerLegal .pageContent
{
	font-size: 12px;
	overflow: hidden; zoom: 1;
	padding: 10px;
	text-align: center;
}

.footerLegal .pageContent a:link {
	color: #d7edfc;
}
	
	#copyright
	{
		color: rgb(100,100,100);
		float: left;
	}
	
	#legal
	{
		float: right;
	}
	
		#legal li
		{
			display: inline-block;
			
			margin-left: 10px;
		}


@media (max-width:800px)
{
	.footer-top-left {
		width: 100% !important;
	}
	.fotter-contact, #footer .four, #footer .three {
		width: 25% !important;
	}	
	.fotter-contact {
		border-left: none !important;
	}
}

@media (max-width:610px)
{
	.pageWidth {
		width: auto !important;
		margin: 0 !important;
		min-width: 0 !important;
	}
	#copyright, #legal {
		float: none;
	}
}

@media (max-width:480px)
{
	.fotter-contact, #footer .four, #footer .three {
		width: 100% !important;
		border-left: none !important;
	}
	#copyright, #legal {
		float: none !important;
	}	
	#termsRule, #toTop {
		display: none !important;
	}
}';
