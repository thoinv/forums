<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.userBanner
{
	font-size: 11px;
	background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/gradients/form-button-white-25px.png\') repeat-x top;
	padding: 1px 5px;
	border: 1px solid transparent;
	border-radius: 3px;
	box-shadow: 1px 1px 3px rgba(0,0,0, 0.25);
	text-align: center;
}

	.userBanner.wrapped
	{
		border-top-right-radius: 0;
		border-top-left-radius: 0;
		position: relative;
	}
		
		.userBanner.wrapped span
		{
			position: absolute;
			top: -4px;
			width: 5px;
			height: 4px;
			background-color: inherit;
		}
		
		.userBanner.wrapped span.before
		{
			border-top-left-radius: 3px;
			left: -1px;
		}
		
		.userBanner.wrapped span.after
		{
			border-top-right-radius: 3px;
			right: -1px;
		}
		
.userBanner.bannerHidden { background: none; box-shadow: none; border: none; }
.userBanner.bannerHidden.wrapped { margin-left: 0; margin-right: 0; }
.userBanner.bannerHidden.wrapped span { display: none; }

.userBanner.bannerStaff { color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . '; background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; border-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . '; }
.userBanner.bannerStaff.wrapped span { background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . '; }

.userBanner.bannerPrimary { color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . '; background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; border-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . '; }
.userBanner.bannerPrimary.wrapped span { background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . '; }

.userBanner.bannerSecondary { color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryDark') . '; background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . '; border-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . '; }
.userBanner.bannerSecondary.wrapped span { background-color: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . '; }

.userBanner.bannerRed        { color: white; background-color: red; border-color: #F88; }
.userBanner.bannerRed.wrapped span { background-color: #F88; }

.userBanner.bannerGreen      { color: white; background-color: green; border-color: green; }
.userBanner.bannerGreen.wrapped span { background-color: green; }

.userBanner.bannerOlive      { color: black; background-color: olive; border-color: olive; }
.userBanner.bannerOlive.wrapped span { background-color: olive; }

.userBanner.bannerLightGreen { color: black; background-color: lightgreen; border-color: lightgreen; }
.userBanner.bannerLightGreen.wrapped span { background-color: lightgreen; }

.userBanner.bannerBlue       { color: white; background-color: blue; border-color: #88F; }
.userBanner.bannerBlue.wrapped span { background-color: #88F; }

.userBanner.bannerRoyalBlue  { color: white; background-color: royalblue; border-color: #81A9E1;  }
.userBanner.bannerRoyalBlue.wrapped span { background-color: #81A9E1; }

.userBanner.bannerSkyBlue    { color: black; background-color: skyblue; border-color: skyblue; }
.userBanner.bannerSkyBlue.wrapped span { background-color: skyblue; }

.userBanner.bannerGray       { color: black; background-color: gray; border-color: #AAA; }
.userBanner.bannerGray.wrapped span { background-color: #AAA; }

.userBanner.bannerSilver     { color: black; background-color: silver; border-color: silver; }
.userBanner.bannerSilver.wrapped span { background-color: silver; }

.userBanner.bannerYellow     { color: black; background-color: yellow; border-color: #E0E000; }
.userBanner.bannerYellow.wrapped span { background-color: #E0E000; }

.userBanner.bannerOrange     { color: black; background-color: orange; border-color: #FFC520; }
.userBanner.bannerOrange.wrapped span { background-color: #FFC520; }.userBanner strong a
{
	display: block;
	cursor: pointer;
}';
