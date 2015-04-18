<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.section
{
	' . XenForo_Template_Helper_Core::styleProperty('section') . '
}

.sectionMain
{
	' . XenForo_Template_Helper_Core::styleProperty('sectionMain') . '
}

.heading,
.xenForm .formHeader
{
	' . XenForo_Template_Helper_Core::styleProperty('heading') . '
}

	.heading a { color: ' . XenForo_Template_Helper_Core::styleProperty('heading.color') . '; }

.subHeading
{
	' . XenForo_Template_Helper_Core::styleProperty('subHeading') . '
}

	.subHeading a { color: ' . XenForo_Template_Helper_Core::styleProperty('subHeading.color') . '; }

.textHeading,
.xenForm .sectionHeader
{
	' . XenForo_Template_Helper_Core::styleProperty('textHeading') . '
}

.xenForm .sectionHeader,
.xenForm .formHeader
{
	margin: 10px 0;
}

.primaryContent > .textHeading:first-child,
.secondaryContent > .textHeading:first-child
{
	margin-top: 0;
}

.larger.textHeading,
.xenForm .sectionHeader
{
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	font-size: 11pt;
	margin-bottom: 6px;
}

	.larger.textHeading a,
	.xenForm .sectionHeader a
	{
		color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	}

.primaryContent
{
	' . XenForo_Template_Helper_Core::styleProperty('primaryContent') . '
}

	.primaryContent a
	{
		' . XenForo_Template_Helper_Core::styleProperty('primaryContentLink') . '
	}

.secondaryContent
{
	' . XenForo_Template_Helper_Core::styleProperty('secondaryContent') . '
}

	.secondaryContent a
	{
		' . XenForo_Template_Helper_Core::styleProperty('secondaryContentLink') . '
	}

.sectionFooter
{
	overflow: hidden; zoom: 1;
	' . XenForo_Template_Helper_Core::styleProperty('sectionFooter') . '
}

	.sectionFooter a { color: ' . XenForo_Template_Helper_Core::styleProperty('sectionFooter.color') . '; }

	.sectionFooter .left
	{
		float: left;
	}

	.sectionFooter .right
	{
		float: right;
	}

/* used for section footers with central buttons, esp. in report viewing */

.actionList
{
	text-align: center;
}

/* left-right aligned options */

.opposedOptions
{
	overflow: hidden; zoom: 1;
}
	
	.opposedOptions .left
	{
		float: left;
	}
	
	.opposedOptions .right
	{
		float: right;
	}';
