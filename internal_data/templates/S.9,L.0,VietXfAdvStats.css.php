<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media only screen and (max-width: ' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveWideWidth') . ')
{
#Block1st {display: none; !important;}
#Block2nd {margin-left: 0px !important;}
}
@media only screen and (max-width: ' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . '), only screen and (max-device-width: ' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{ 
#Block1st {display: none; !important;}
#Block2nd {margin-left: 0px !important;}
.VietXfAdvStats_Thread .VietXfAdvStats_SectionItemInfo { display: none !important; }
}
';
}
$__output .= '

.VietXfAdvStats {
}

	.VietXfAdvStats h3 {
		' . XenForo_Template_Helper_Core::styleProperty('subHeading') . '
		
		' . XenForo_Template_Helper_Core::styleProperty('categoryStrip') . '
		
		margin-bottom: 5px;
	}
	
		.VietXfAdvStats h3 .VietXfAdvStats_Header {
			' . XenForo_Template_Helper_Core::styleProperty('categoryStripTitle') . '
		}
		
		.VietXfAdvStats h3 .VietXfAdvStats_Controls {
			float: right;
			font-size: ' . XenForo_Template_Helper_Core::styleProperty('categoryStripTitle.font-size') . ';
		}

			.VietXfAdvStats h3 .VietXfAdvStats_Controls select {
				margin-top: -3px;
			}

	#Block1st {
		float: left;
		width: ' . XenForo_Template_Helper_Core::styleProperty('VietXfAdvStats_Block1stWidth') . ';
	}
	
	#Block2nd {
		margin-left: ' . (XenForo_Template_Helper_Core::styleProperty('VietXfAdvStats_Block1stWidth') + 5) . 'px;
	}
	
		#Block1stPanes,
		#Block2ndPanes {
			border-left: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
			border-right: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
			border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
			padding-bottom: 5px;
		}
	
		#Block1st .VietXfAdvStats_Block1stContent {
            padding-left: 25px;
			padding-right: 5px;
            line-height: 14px;
        }
		#Block2nd .VietXfAdvStats_Block2ndContent {
			padding-left: 5px;
			padding-right: 5px;
            line-height: 14px;
                        
		}
        #Block1st .VietXfAdvStats_Block1stContent{
            background: url(styles/default/xenforo/list.gif) no-repeat top left;
        }
	
.VietXfAdvStats_Section {
	position: relative;
	zoom: 1;
}

	.VietXfAdvStats_SectionItem {
		display: table;
		table-layout: fixed;
		width: 100%;
		word-wrap: normal;
		padding-top: 3px;
		padding-bottom: 3px;
	}
	
		.VietXfAdvStats_SectionItem .VietXfAdvStats_SectionItemBlock {
			display: table-cell;
			vertical-align: middle;
		}
	
	.VietXfAdvStats_SectionItem .VietXfAdvStats_SectionItemTitle {
		' . XenForo_Template_Helper_Core::styleProperty('VietXfAdvStats_SectionItemTitleCss') . '
	}

	.VietXfAdvStats_SectionItem .VietXfAdvStats_SectionItemInfo {
		' . XenForo_Template_Helper_Core::styleProperty('VietXfAdvStats_SectionItemInfoCss') . '
	}

/** IE <8 **/
.VietXfAdvStats_SectionItem                              { *display: block; _vertical-align: bottom; }
.VietXfAdvStats_SectionItem .listBlock                   { *display: block; *float: left; }
.VietXfAdvStats_SectionItem .listBlock                   { _height: 52px; *min-height: 52px; } /* todo: should be calculation */
.VietXfAdvStats_Section .VietXfAdvStats_SectionItemTitle { *width: 69.98%; }
.VietXfAdvStats_Section .VietXfAdvStats_SectionItemInfo  { *width: 29.98%; }

.VietXfAdvStats_SectionItem {
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
	background: url(\'styles/default/xenforo/listbg.gif\') repeat;
}

/** USERS SECTION */
.VietXfAdvStats_User {
}
	
	.VietXfAdvStats_User .VietXfAdvStats_SectionItemTitle {
		width: ' . (((XenForo_Template_Helper_Core::styleProperty('VietXfAdvStats_UserNameWidth')) > 0) ? (XenForo_Template_Helper_Core::styleProperty('VietXfAdvStats_UserNameWidth')) : ('auto')) . ';
	}
	
	.VietXfAdvStats_User .VietXfAdvStats_SectionItemInfo {
		width: ' . (((XenForo_Template_Helper_Core::styleProperty('VietXfAdvStats_UserInfoWidth')) > 0) ? (XenForo_Template_Helper_Core::styleProperty('VietXfAdvStats_UserInfoWidth')) : ('auto')) . ';
	}

/** THREADS SECTION */
.VietXfAdvStats_Thread {
}

	.VietXfAdvStats_Thread .VietXfAdvStats_ThreadTitle.new a {
		font-weight: bold;
	}
	
	.VietXfAdvStats_Thread .VietXfAdvStats_SectionItemTitle {
		width: ' . (((XenForo_Template_Helper_Core::styleProperty('VietXfAdvStats_ThreadTitleWidth')) > 0) ? (XenForo_Template_Helper_Core::styleProperty('VietXfAdvStats_ThreadTitleWidth')) : ('auto')) . ';
	}
	
	.VietXfAdvStats_Thread .VietXfAdvStats_SectionItemInfo {
		width: ' . (((XenForo_Template_Helper_Core::styleProperty('VietXfAdvStats_ThreadInfoWidth')) > 0) ? (XenForo_Template_Helper_Core::styleProperty('VietXfAdvStats_ThreadInfoWidth')) : ('auto')) . ';
	}';
