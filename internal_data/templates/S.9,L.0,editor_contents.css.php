<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= 'html
{
	cursor: text;
	height: 100%;
	word-wrap: break-word;
	max-width: 100%;

	' . XenForo_Template_Helper_Core::styleProperty('html.background') . '
	' . XenForo_Template_Helper_Core::styleProperty('html.font') . '
	
	' . XenForo_Template_Helper_Core::styleProperty('body.background') . '
	' . XenForo_Template_Helper_Core::styleProperty('body.font') . '
	
	' . XenForo_Template_Helper_Core::styleProperty('content.background') . '
	' . XenForo_Template_Helper_Core::styleProperty('content.font') . '

	' . XenForo_Template_Helper_Core::styleProperty('primaryContent.background') . '
	' . XenForo_Template_Helper_Core::styleProperty('primaryContent.font') . '
	
	' . XenForo_Template_Helper_Core::styleProperty('messageInfo.background') . '
	' . XenForo_Template_Helper_Core::styleProperty('messageInfo.font') . '

	' . XenForo_Template_Helper_Core::styleProperty('messageText') . '
	
	background-image: none;
	
	' . XenForo_Template_Helper_Core::styleProperty('editorContent') . '
}

body
{
	padding: 8px;
	margin: 0;
	word-wrap: break-word;
	display: inline-block;
	width: 100%;
	min-height: 30px;
	box-sizing: border-box;
	cursor: auto;
	*display: block;
	*width: auto;
}

body:empty
{
	min-height: 0 !important;
	height: 1.3em;
}

body.noElastic
{
	display: block !important;
	min-height: 0 !important;
	height: auto !important;
}

a:link,
a:visited,
a:focus,
a:active
{
	cursor: text;
	background: transparent; 
	' . XenForo_Template_Helper_Core::callHelper('cssImportant', array(
'0' => XenForo_Template_Helper_Core::styleProperty('link')
)) . '
	' . XenForo_Template_Helper_Core::callHelper('cssImportant', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ugcLink')
)) . '
}

img:-moz-broken, img:-moz-user-disabled { -moz-force-broken-image-icon: 1; }
img:-moz-broken:not([width]), img:-moz-user-disabled:not([width]) { width: 50px; }
img:-moz-broken:not([height]), img:-moz-user-disabled:not([height]) { height: 50px; }
img { max-width: 90%; border: none; cursor: pointer; }
img.mceSmilie, img.mceSmilieSprite, img.attachFull, img.attachThumb { cursor: text; }

p, div { margin: 0; padding: 0; }

font[size="1"] { font-size: 9px; }
font[size="2"] { font-size: 10px; }
font[size="3"] { font-size: 12px; }
font[size="4"] { font-size: 15px; }
font[size="5"] { font-size: 18px; }
font[size="6"] { font-size: 22px; }
font[size="7"] { font-size: 26px; }

blockquote { margin: 0 !important; padding: 0 !important; margin-left: 30px !important; }
body[dir=rtl] blockquote {  margin-right: 30px !important; margin-left: 0; }

';
$__compilerVar1 = '';
$__compilerVar1 .= '/* Basic, common, non-templated BB codes */

.bbCodeImage
{
	max-width: 100%;
}

.bbCodeImageFullSize
{
	position: absolute;
	z-index: 50000;
	' . XenForo_Template_Helper_Core::styleProperty('primaryContent.background') . '
}

.bbCodeStrike
{
	text-decoration: line-through;
}

img.mceSmilie,
img.mceSmilieSprite
{
	vertical-align: text-bottom;
	margin: 0 1px;
}

';
$__compilerVar2 = '';
$__compilerVar2 .= '/* smilie sprite classes */
';
if ($smilieSprites)
{
foreach ($smilieSprites AS $smilieId => $smilieSprite)
{
if ($smilieSprite['sprite_css'])
{
$__compilerVar2 .= '
img.mceSmilieSprite.mceSmilie' . htmlspecialchars($smilieId, ENT_QUOTES, 'UTF-8') . '
{
	' . $smilieSprite['sprite_css'] . '
}
';
}
}
}
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
';
$__compilerVar3 = '';
$__compilerVar3 .= '/* .bbCodeX classes are designed to exist inside .baseHtml. ie: they have no CSS reset applied */

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
$__compilerVar3 .= '
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
$__compilerVar3 .= '
	.bbCodeQuote .quoteContainer .quoteExpand
	{
		display: none;
	}
';
}
$__compilerVar3 .= '

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
$__compilerVar3 .= '
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
$__compilerVar4 = '';
$__compilerVar4 .= '.bbCodePHP ol,
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
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '

/* make the font bigger to prevent zooming on iPhones */
@media (max-device-width:568px)
{
	body
	{
		font-size: 16px;
	}
}';
