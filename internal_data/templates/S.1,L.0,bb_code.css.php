<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/* .bbCodeX classes are designed to exist inside .baseHtml. ie: they have no CSS reset applied */

.bbCodeBlock
{
	' . XenForo_Template_Helper_Core::styleProperty('bbCodeBlock') . '
}

	.bbCodeBlock .bbCodeBlock,
	.hasJs .bbCodeBlock .bbCodeSpoilerText,
	.messageList.withSidebar .bbCodeBlock
	{
		margin-right: 0;
	}

	/* mini CSS reset */
	.bbCodeBlock pre,
	.bbCodeBlock blockquote
	{
		margin: 0;
	}
	
	.bbCodeBlock img
	{
		border: none;
	}

.bbCodeBlock .type
{
	' . XenForo_Template_Helper_Core::styleProperty('bbCodeBlockType') . '
}

.bbCodeBlock pre,
.bbCodeBlock .code
{
	' . XenForo_Template_Helper_Core::styleProperty('bbCodeCode') . '
}

.bbCodeBlock .code
{
	white-space: nowrap;
}

.bbCodeQuote
{
	' . XenForo_Template_Helper_Core::styleProperty('bbCodeQuote') . '
}

.bbCodeQuote .attribution
{
	' . XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteAttribution') . '
}

.bbCodeQuote .quoteContainer
{
	overflow: hidden;
	position: relative;
	
	' . XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteMessage') . '
}

';
if (XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteMaxHeight'))
{
$__output .= '
	.bbCodeQuote .quoteContainer .quote
	{
		max-height: ' . XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteMaxHeight') . ';
		overflow: hidden;
		padding-bottom: 1px;
	}
	
		.NoJs .bbCodeQuote .quoteContainer .quote
		{
			max-height: none;
		}

	.bbCodeQuote .quoteContainer .quoteExpand
	{		
		display: none;
		box-sizing: border-box;
		position: absolute;
		height: 80px;
		top: ' . (XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteMaxHeight') + XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteMessage.padding-top') + XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteMessage.padding-bottom') - 80) . 'px;
		left: 0;
		right: 0;
		
		font-size: 11px;
		line-height: 1;
		text-align: center;
		color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLight') . ';
		cursor: pointer;
		padding-top: 65px;
		background: -webkit-linear-gradient(top, ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteMessage.background-color'),
'1' => '0'
)) . ' 0%, ' . XenForo_Template_Helper_Core::callHelper('unrgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteMessage.background-color')
)) . ' 80%);
		background: -moz-linear-gradient(top, ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteMessage.background-color'),
'1' => '0'
)) . ' 0%, ' . XenForo_Template_Helper_Core::callHelper('unrgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteMessage.background-color')
)) . ' 80%);
		background: -o-linear-gradient(top, ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteMessage.background-color'),
'1' => '0'
)) . ' 0%, ' . XenForo_Template_Helper_Core::callHelper('unrgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteMessage.background-color')
)) . ' 80%);
		background: linear-gradient(to bottom, ' . XenForo_Template_Helper_Core::callHelper('rgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteMessage.background-color'),
'1' => '0'
)) . ' 0%, ' . XenForo_Template_Helper_Core::callHelper('unrgba', array(
'0' => XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteMessage.background-color')
)) . ' 80%);
		
		border-bottom-left-radius: ' . XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteMessage.border-bottom-left-radius') . ';
		border-bottom-right-radius: ' . XenForo_Template_Helper_Core::styleProperty('bbCodeQuoteMessage.border-bottom-right-radius') . ';
	}
	
	.bbCodeQuote .quoteContainer .quoteExpand.quoteCut
	{
		display: block;
	}
	
	.bbCodeQuote .quoteContainer.expanded .quote
	{
		max-height: none;
	}
	
	.bbCodeQuote .quoteContainer.expanded .quoteExpand
	{
		display: none;
	}
';
}
else
{
$__output .= '
	.bbCodeQuote .quoteContainer .quoteExpand
	{
		display: none;
	}
';
}
$__output .= '

	.bbCodeQuote img
	{
		max-height: 150px;
	}
	
	.bbCodeQuote iframe,
	.bbCodeQuote object,
	.bbCodeQuote embed
	{
		max-width: 200px;
		max-height: 150px;
	}
	
	.bbCodeQuote iframe:-webkit-full-screen
	{
		max-width: none;
		max-height: none;
	}
	
	.bbCodeQuote iframe:-moz-full-screen
	{
		max-width: none;
		max-height: none;
	}
	
	.bbCodeQuote iframe:-ms-fullscreen
	{
		max-width: none;
		max-height: none;
	}
	
	.bbCodeQuote iframe:fullscreen
	{
		max-width: none;
		max-height: none;
	}
	
.bbCodeSpoilerButton
{
	margin: 5px 0;
	max-width: 99%;
}

	.bbCodeSpoilerButton > span
	{
		display: inline-block;
		max-width: 100%;
		white-space: nowrap;
		text-overflow: ellipsis;
		overflow: hidden;
	}
	
.hasJs .bbCodeSpoilerText
{
	display: none;
	' . XenForo_Template_Helper_Core::styleProperty('bbCodeSpoilerText') . '
}

	.hasJs .bbCodeSpoilerText .bbCodeSpoilerText,
	.hasJs .bbCodeSpoilerText .bbCodeBlock,
	.hasJs .messageList.withSidebar .bbCodeSpoilerText
	{
		margin-right: 0;
	}
	
.NoJs .bbCodeSpoilerContainer
{
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentText') . '; /* fallback for browsers without currentColor */
	background-color: currentColor;
}

	.NoJs .bbCodeSpoilerContainer > .bbCodeSpoilerText
	{
		visibility: hidden;
	}

	.NoJs .bbCodeSpoilerContainer:hover
	{
		background-color: transparent;
	}
	
		.NoJs .bbCodeSpoilerContainer:hover > .bbCodeSpoilerText
		{
			visibility: visible;
		}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveWideWidth') . ')
{
	.Responsive .bbCodeBlock,
	.Responsive.hasJs .bbCodeSpoilerText
	{
		margin-right: 0;
	}
}
';
}
$__compilerVar1 = '';
$__compilerVar1 .= '.bbCodePHP ol,
.bbCodeHtml ol,
.bbCodeCode ol {
	color: lightgrey;
	-moz-user-select: -moz-none;
	-khtml-user-select: none;
	-webkit-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

.bbCodePHP li > div,
.bbCodeHtml li > div,
.bbCodeCode li > div {
	color: grey;
	-moz-user-select: text;
	-khtml-user-select: text;
	-webkit-user-select: text;
	-ms-user-select: text;
	user-select: text;
}';
$__output .= $__compilerVar1;
unset($__compilerVar1);
