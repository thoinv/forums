<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= 'textarea.textCtrl.MessageEditor {
	border-radius: 0;
	margin: 0;
	padding: 0;
	border-left: 0 none;
	border-radius: 0;
	border-right: 0 none;
}
form.section .sectionHeader
{
	' . XenForo_Template_Helper_Core::styleProperty('textHeading') . '
}
form.section .sectionHeader
{
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	font-size: 11pt;
	margin-bottom: 10px;
	margin-left: 10px;
}

	form.section .sectionHeader a
	{
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	}
	
form.section .ctrlUnit > dd
{
	width: ' . XenForo_Template_Helper_Core::styleProperty('ctrlUnitValueWidth') . ';
	box-sizing: border-box;
	padding-right: ' . XenForo_Template_Helper_Core::styleProperty('ctrlUnitEdgeSpacer') . ';
}

form.section .ctrlUnit > dd .textCtrl
{
	box-sizing: border-box;
	width: 100%;
}

	form.section .ctrlUnit > dd .textCtrl[size],
	form.section .ctrlUnit > dd .textCtrl.autoSize
	{
		width: auto !important;
		min-width: 0;
	}

	form.section .ctrlUnit > dd .textCtrl.number
	{
		width: 150px;
	}
	
	form.section .ctrlUnit
{
	position: relative;
	margin: 10px auto;
}

' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => 'form.section .ctrlUnit'
)) . '

form.section .ctrlUnit.fullWidth
{
	overflow: visible;
}

/** Control Unit Labels **/

form.section .ctrlUnit > dt
{
	' . XenForo_Template_Helper_Core::styleProperty('ctrlUnitLabel') . '
	box-sizing: border-box;
	width: ' . XenForo_Template_Helper_Core::styleProperty('ctrlUnitLabelWidth') . ';
	float: left;
}

/* special long-text label */
form.section .ctrlUnit > dt.explain
{
	font-size: 11px;
	text-align: justify;
}


form.section .ctrlUnit.fullWidth dt,
form.section .ctrlUnit.submitUnit.fullWidth dt
{
	float: none;
	width: auto;
	text-align: left;
	height: auto;
}

form.section .ctrlUnit.fullWidth dt
{
	margin-bottom: 2px;
}

	form.section .ctrlUnit > dt label
	{
		margin-left: ' . XenForo_Template_Helper_Core::styleProperty('ctrlUnitEdgeSpacer') . ';
	}

	/** Hidden Labels **/

	form.section .ctrlUnit.surplusLabel dt label
	{
		display: none;
	}

	/** Section Links **/

	.ctrlUnit.sectionLink dt
	{
		text-align: left;
		font-size: 11px;
	}

		.ctrlUnit.sectionLink dt a
		{
			margin-left: ' . (10 + 1) . 'px; /*TODO: sectionHeader padding + border*/
		}		

	/** Hints **/

	.ctrlUnit > dt dfn
	{
		' . XenForo_Template_Helper_Core::styleProperty('ctrlUnitLabelHint') . '
	}
	
	.ctrlUnit.fullWidth dt dfn
	{
		display: inline;
		margin: 0;
	}
	
		.ctrlUnit > dt dfn b,
		.ctrlUnit > dt dfn strong
		{
			color: ' . XenForo_Template_Helper_Core::styleProperty('dimmedTextColor') . ';
		}

	/** Inline Errors **/

	.ctrlUnit > dt .error
	{
		' . XenForo_Template_Helper_Core::styleProperty('ctrlUnitLabelError') . '
	}
	
	.ctrlUnit > dt dfn,
	.ctrlUnit > dt .error,
	.ctrlUnit > dt a
	{
		font-weight: normal;
	}

form.section .ctrlUnit.submitUnit dt
{
	height: 19px;
	display: block;
}

	.ctrlUnit.submitUnit dt.InProgress
	{
		background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/widgets/ajaxload.info_B4B4DC_facebook.gif\') no-repeat center center;
	}

/** Control Holders **/

form.section .ctrlUnit > dd
{
	/*todo: kill property */
	' . XenForo_Template_Helper_Core::styleProperty('ctrlUnitCtrl') . '
	float: left;
}

form.section .ctrlUnit.fullWidth > dd
{
	float: none;
	width: auto;
	padding-left: ' . XenForo_Template_Helper_Core::styleProperty('ctrlUnitEdgeSpacer') . ';
}';
