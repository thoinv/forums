<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.rating
{
	line-height: 18px;
}

	.rating .star
	{
		width: 18px;
		height: 18px;
		display: inline-block;
		
		border: none;
		outline: none;
		padding: 0;
		
		text-indent: 9999em;
		overflow: hidden;
		white-space: nowrap;
		
		vertical-align: text-bottom;
		
		background: transparent url(\'' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/xenforo-ui-sprite.png\') no-repeat -126px -32px;
	}
	
	.rating button.star
	{
		cursor: pointer;
	}
	
		.rating .star.Full
		{
			background-position: -90px -32px;
		}
		
		.rating .star.Half,
		.rating .star.Full.Half
		{
			background-position: -108px -32px;
		}
		
	.rating .RatingValue
	{
		display: none;
	}';
