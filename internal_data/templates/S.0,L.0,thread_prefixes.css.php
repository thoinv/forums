<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.prefix
{
	' . XenForo_Template_Helper_Core::styleProperty('titlePrefix') . '
}

a.prefixLink:hover
{
	text-decoration: none;
}

a.prefixLink:hover .prefix
{
	' . XenForo_Template_Helper_Core::styleProperty('titlePrefixHover') . '
}

.prefix a { color: inherit; }

.prefix.prefixPrimary    { color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . '; background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; border-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; }
.prefix.prefixSecondary  { color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryDark') . '; background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . '; border-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . '; }

.prefix.prefixRed        { color: white; background-color: red; border-color: #F88; }
.prefix.prefixGreen      { color: white; background-color: green; border-color: green; }
.prefix.prefixOlive      { color: black; background-color: olive; border-color: olive; }
.prefix.prefixLightGreen { color: black; background-color: lightgreen; border-color: lightgreen; }
.prefix.prefixBlue       { color: white; background-color: blue; border-color: #88F; }
.prefix.prefixRoyalBlue  { color: white; background-color: royalblue; border-color: #81A9E1;  }
.prefix.prefixSkyBlue    { color: black; background-color: skyblue; border-color: skyblue; }
.prefix.prefixGray       { color: black; background-color: gray; border-color: #AAA; }
.prefix.prefixSilver     { color: black; background-color: silver; border-color: silver; }
.prefix.prefixYellow     { color: black; background-color: yellow; border-color: #E0E000; }
.prefix.prefixOrange     { color: black; background-color: orange; border-color: #FFC520; }

.discussionListItem .prefix,
.searchResult .prefix
{
	' . XenForo_Template_Helper_Core::styleProperty('discussionListPrefix') . '
	
	font-weight: normal;
}

h1 .prefix
{
	' . XenForo_Template_Helper_Core::styleProperty('discussionListPrefix') . '
	
	line-height: normal;
}

.breadcrumb span.prefix,
.heading span.prefix
{
	' . XenForo_Template_Helper_Core::styleProperty('breadcrumbTitlePrefix') . '
	color: inherit;
}';
