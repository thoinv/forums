<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.discussionList .tr_greyedout .ratings .star {
	display: none;
}

.discussionList .tr_greyedout .ratings .star.Half {
	display: inline-block;
}

.discussionList .tr_greyedout .ratings .star.Full {
	display: inline-block;
}

.threadrating
{
	float: right;
	margin-left: 10px;
	transform: scale(0.9);
}

.threadrating .rating .Hint
{
	display: block;
	text-align: right;
}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveMediumWidth') . ')
{
	.Responsive .threadrating
	{
		display: none;
	}
}
';
}
