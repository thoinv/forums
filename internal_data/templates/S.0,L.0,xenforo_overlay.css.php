<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/* All overlays must have this */
.xenOverlay
{
	display: none;
	z-index: 10000;
	width: 90%;
	box-sizing: border-box;
	max-width: ' . (XenForo_Template_Helper_Core::styleProperty('overlayFormWidth') + 90) . 'px; /*calc: 90=overlay padding+borders*/
}

	.xenOverlay .overlayScroll
	{
		max-height: 400px;
		overflow: auto;
	}
	
	.xenOverlay .overlayScroll.ltr
	{
		direction: ltr;
	}
	
	.xenOverlay .overlayScroll .sortable-placeholder
	{
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	}

.overlayOnly /* needs a bit more specificity over regular buttons */
{
	display: none !important;
}

	.xenOverlay .overlayOnly
	{
		display: block !important;
	}
	
	.xenOverlay input.overlayOnly,
	.xenOverlay button.overlayOnly,
	.xenOverlay a.overlayOnly
	{
		display: inline !important;
	}
	
	.xenOverlay a.close 
	{
		' . XenForo_Template_Helper_Core::styleProperty('overlayCloseControl') . '
	}
	
.xenOverlay .nonOverlayOnly
{
	display: none !important;
}

/* Generic form overlays */

.xenOverlay .formOverlay
{
	' . XenForo_Template_Helper_Core::styleProperty('formOverlay') . '
	margin: 0;
}

	.Touch .xenOverlay .formOverlay
	{
		background: ' . XenForo_Template_Helper_Core::callHelper('unrgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('formOverlay.background-color')
)) . ';
		box-shadow: none;
	}

	.xenOverlay .formOverlay a.muted,
	.xenOverlay .formOverlay .muted a
	{
		color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	}

	.xenOverlay .formOverlay .heading
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayHeading') . '
	}

	.xenOverlay .formOverlay .subHeading
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlaySubHeading') . '
	}
	
	.xenOverlay .formOverlay .textHeading
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTextHeading') . '
	}
	
	.xenOverlay .formOverlay > p
	{
		padding-left: ' . XenForo_Template_Helper_Core::styleProperty('formOverlayHeading.padding-left') . ';
		padding-right: ' . XenForo_Template_Helper_Core::styleProperty('formOverlayHeading.padding-right') . ';
	}

	.xenOverlay .formOverlay .textCtrl
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTextCtrl') . '
	}

	.xenOverlay .formOverlay .textCtrl option
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTextCtrl.background') . '
	}

	.xenOverlay .formOverlay .textCtrl:focus,
	.xenOverlay .formOverlay .textCtrl.Focus
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTextCtrlFocus') . '
	}

	.xenOverlay .formOverlay .textCtrl:focus option
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTextCtrlFocus.background') . '
	}

	.xenOverlay .formOverlay .textCtrl.disabled
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTextCtrlDisabled') . '
	}

	.xenOverlay .formOverlay .textCtrl.disabled option
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTextCtrlDisabled.background') . '
	}

	.xenOverlay .formOverlay .textCtrl.prompt
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTextCtrlPrompt') . '
	}

	.xenOverlay .formOverlay .ctrlUnit > dt dfn,
	.xenOverlay .formOverlay .ctrlUnit > dd li .hint,
	.xenOverlay .formOverlay .ctrlUnit > dd .explain
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayLabelHint') . '
	}

	.xenOverlay .formOverlay a
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayLink') . '
	}

		.xenOverlay .formOverlay a.button
		{
			' . XenForo_Template_Helper_Core::styleProperty('formOverlayButton') . '
		}

	.xenOverlay .formOverlay .avatar img,
	.xenOverlay .formOverlay .avatar .img,
	.xenOverlay .formOverlay .avatarCropper
	{
		background-color: transparent;
	}
	
	/* tabs in form overlay */
	
	.xenOverlay .formOverlay .tabs /* the actual tabs */
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTabs') . '
	}

		.xenOverlay .formOverlay .tabs a
		{
			' . XenForo_Template_Helper_Core::styleProperty('formOverlayTab') . '
		}
		
			.xenOverlay .formOverlay .tabs a:hover
			{
				' . XenForo_Template_Helper_Core::styleProperty('formOverlayTabHover') . '
			}
			
			.xenOverlay .formOverlay .tabs .active a
			{
				' . XenForo_Template_Helper_Core::styleProperty('formOverlayTabActive') . '
			}
			
	.xenOverlay .formOverlay .tabPanel /* panels switched with the tab controls */
	{
		' . XenForo_Template_Helper_Core::styleProperty('formOverlayTabPanel') . '
	}


/* Generic overlays */

.xenOverlay .section,
.xenOverlay .sectionMain
{
	' . XenForo_Template_Helper_Core::styleProperty('overlaySection') . '
	
	border-color: ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('overlaySection.border-color'),
'1' => '0.5'
)) . ';
}

	.Touch .xenOverlay .section,
	.Touch .xenOverlay .sectionMain
	{
		border-color: ' . XenForo_Template_Helper_Core::callHelper('unrgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('overlaySection.border-color')
)) . ';
		box-shadow: none;
	}

.xenOverlay > .section,
.xenOverlay > .sectionMain
{
	background: none;
	margin: 0;
}

	.xenOverlay .section .heading,
	.xenOverlay .sectionMain .heading
	{
		border-radius: 0;
		margin-bottom: 0;
	}

	.xenOverlay .section .subHeading,
	.xenOverlay .sectionMain .subHeading
	{
		margin-top: 0;
	}

	.xenOverlay .section .sectionFooter,
	.xenOverlay .sectionMain .sectionFooter
	{
		overflow: hidden; zoom: 1;
	}
		
		.xenOverlay .sectionFooter .buttonContainer
		{
			line-height: 31px;
		}
	
		.xenOverlay .sectionFooter .button,
		.xenOverlay .sectionFooter .buttonContainer
		{
			min-width: 75px;
			*min-width: 0;
			float: right;
			margin-left: 5px;
		}
		
			.xenOverlay .sectionFooter .buttonContainer .button
			{
				float: none;
				margin-left: 0;
			}

/* The AJAX progress indicator overlay */

#AjaxProgress.xenOverlay
{
	width: 100%;
	max-width: none;
	overflow: hidden; zoom: 1;
}

	#AjaxProgress.xenOverlay .content
	{
		' . XenForo_Template_Helper_Core::styleProperty('ajaxProgress') . '
	}
	
		.Touch #AjaxProgress.xenOverlay .content
		{
			background-color: ' . XenForo_Template_Helper_Core::callHelper('unrgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ajaxProgress.background-color')
)) . ';
		}

/* Timed message for redirects */

.xenOverlay.timedMessage
{
	' . XenForo_Template_Helper_Core::styleProperty('redirectMessage') . '
}

	.xenOverlay.timedMessage .content
	{
		' . XenForo_Template_Helper_Core::styleProperty('redirectMessageContent') . '
	}
	
/* Growl-style message */

#StackAlerts
{
	position: fixed;
	bottom: 70px;
	left: 35px;
	z-index: 9999; /* in front of the expose mask */
}

	#StackAlerts .stackAlert
	{
		position: relative;
		width: 270px;
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLight') . ';
		border-radius: 5px;
		box-shadow: 2px 2px 5px 0 rgba(0,0,0, 0.4);
		margin-top: 5px;
	}

		#StackAlerts .stackAlertContent
		{
			padding: 10px;
			padding-right: 30px;
			border-radius: 4px;
			border: solid 2px ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
			background: ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('primaryLightest'),
'1' => '0.9'
)) . ';
			font-size: 11px;
			font-weight: bold;
		}
	
/* Inline Editor */

.xenOverlay .section .messageContainer
{
	padding: 0;
}

.xenOverlay .section .messageContainer .mceLayout
{
	border: none;	
}

.xenOverlay .section .messageContainer tr.mceFirst td.mceFirst
{
	border-top: none;
}

.xenOverlay .section .messageContainer tr.mceLast td.mceLast,
.xenOverlay .section .messageContaner tr.mceLast td.mceIframeContainer
{
	border-bottom: none;
}

.xenOverlay .section .textCtrl.MessageEditor,
.xenOverlay .section .mceLayout,
.xenOverlay .section .bbCodeEditorContainer textarea
{
	width: 100% !important;
	min-height: 260px;
	_height: 260px;
	box-sizing: border-box;
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .xenOverlay
	{
		width: 100%;
	}
	
	.Responsive .xenOverlay .formOverlay,
	.Responsive .xenOverlay .section,
	.Responsive .xenOverlay .sectionMain
	{
		border-radius: 10px;
		border-width: 10px;
	}
	
	.Responsive .xenOverlay a.close 
	{
		top: 0;
		right: 0;
		width: 28px;
		height: 28px;
		background-size: 100% 100%;
	}
}
';
}
