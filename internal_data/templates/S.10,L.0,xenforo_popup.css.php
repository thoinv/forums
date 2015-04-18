<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/* ***************************** */
/* Popup Menus */

.Popup
{
	position: relative;
}

	.Popup.inline
	{
		display: inline;
	}
	
/** Popup menu trigger **/

.Popup .arrowWidget
{
	/* circle-arrow-down */
	' . XenForo_Template_Helper_Core::styleProperty('popupArrowClosed') . '
}

.PopupOpen .arrowWidget
{
	/* circle-arrow-up */
	' . XenForo_Template_Helper_Core::styleProperty('popupArrowOpen') . '
}

.Popup .PopupControl,
.Popup.PopupContainerControl
{
	display: inline-block;
	cursor: pointer;
}

	.Popup .PopupControl:hover,
	.Popup.PopupContainerControl:hover
	{
		' . XenForo_Template_Helper_Core::styleProperty('popupControlClosedHover') . '
	}

	.Popup .PopupControl:focus,
	.Popup .PopupControl:active,
	.Popup.PopupContainerControl:focus,
	.Popup.PopupContainerControl:active
	{
		outline: 0;
	}
	
	.Popup .PopupControl.PopupOpen,
	.Popup.PopupContainerControl.PopupOpen
	{
		' . XenForo_Template_Helper_Core::styleProperty('popupControl') . '
	}
	
	.Popup .PopupControl.BottomControl.PopupOpen,
	.Popup.PopupContainerControl.BottomControl.PopupOpen
	{
		border-top-left-radius: ' . XenForo_Template_Helper_Core::styleProperty('popupControl.border-bottom-left-radius') . ';
		border-top-right-radius: ' . XenForo_Template_Helper_Core::styleProperty('popupControl.border-bottom-right-radius') . ';
		border-bottom-left-radius: ' . XenForo_Template_Helper_Core::styleProperty('popupControl.border-top-left-radius') . ';
		border-bottom-right-radius: ' . XenForo_Template_Helper_Core::styleProperty('popupControl.border-top-left-radius') . ';
	}
		
		.Popup .PopupControl.PopupOpen:hover,
		.Popup.PopupContainerControl.PopupOpen:hover
		{
			text-decoration: none;
		}
		
/** Menu body **/

.Menu
{
	/*background-color: ' . XenForo_Template_Helper_Core::styleProperty('textCtrlBackground') . ';*/
	
	' . XenForo_Template_Helper_Core::styleProperty('menu') . '
	
	min-width: ' . XenForo_Template_Helper_Core::styleProperty('menuMinWidth') . ';
	*width: ' . XenForo_Template_Helper_Core::styleProperty('menuMinWidth') . ';
	
	/* makes menus actually work... */
	position: absolute;
	z-index: 7500;
	display: none;
}

/* allow menus to operate when JS is disabled */
.Popup:hover .Menu
{
	display: block;
}

.Popup:hover .Menu.JsOnly
{
	display: none;
}

.Menu.BottomControl
{
	border-top-width: 1px;
	border-bottom-width: 3px;
	box-shadow: 0px 0px 0px transparent;
}

	.Menu > li > a,
	.Menu .menuRow
	{
		display: block;
	}
		
/* Menu header */

.Menu .menuHeader
{
	overflow: hidden; zoom: 1;
}

.Menu .menuHeader h3
{
	' . XenForo_Template_Helper_Core::styleProperty('menuHeaderTitle') . '
}

.Menu .menuHeader .muted
{
	' . XenForo_Template_Helper_Core::styleProperty('menuHeaderSubtitle') . '
}

/* Standard menu sections */

.Menu .primaryContent
{
	background-color: ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('primaryContent.background-color'),
'1' => '0.96'
)) . ';
}

.Menu .secondaryContent
{
	background-color: ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('secondaryContent.background-color'),
'1' => '0.96'
)) . ';
}

.Menu .sectionFooter
{
	background-color: ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('sectionFooter.background-color'),
'1' => '0.9'
)) . ';
}

/* Links lists */

.Menu .blockLinksList
{	
	max-height: 400px;
	overflow: auto;
}

/* form popups */

.formPopup
{
	width: 250px;
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
}

	.formPopup form,
	.formPopup .ctrlUnit
	{
		margin: 5px auto;
	}
	
		.formPopup .ctrlUnit
		{
		}
		
	.formPopup .textCtrl,
	.formPopup .button
	{
		width: 232px;
	}
		
	.formPopup .ctrlUnit > dt label
	{
		display: block;
		margin-bottom: 2px;
	}
		
	.formPopup .submitUnit dd
	{
		text-align: center;
	}
	
		.formPopup .ctrlUnit > dd .explain
		{
			margin: 2px 0 0;
		}
	
	.formPopup .primaryControls
	{
		zoom: 1;
		white-space: nowrap;
		word-wrap: normal;
		padding: 0 5px;
	}
	
		.formPopup .primaryControls input.textCtrl
		{
			margin-bottom: 0;
		}
	
	.formPopup .secondaryControls
	{
		padding: 0 5px;
	}
	
		.formPopup .controlsWrapper
		{
			background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png\') repeat-x top;
			border-radius: 5px;
			padding: 5px;
			margin: 5px 0;
			font-size: 11px;
		}

			.formPopup .controlsWrapper .textCtrl
			{
				width: 222px;
			}
	
	.formPopup .advSearchLink
	{
		display: block;
		text-align: center;
		padding: 5px;
		font-size: 11px;
		border-radius: 5px;
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . ' url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/category-23px-light.png\') repeat-x top;
	}
	
		.formPopup .advSearchLink:hover
		{
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
			text-decoration: none;
		}';
