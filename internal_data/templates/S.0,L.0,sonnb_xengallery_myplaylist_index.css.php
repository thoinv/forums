<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.playlistList .playlistNote
{
	font-size: 11px;
	color: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightish') . ';
	text-align: center;
	padding: 5px;
}

.playlistListItem
{
	display: table;
	table-layout: fixed;
	width: 100%;
	word-wrap: normal;

	' . XenForo_Template_Helper_Core::styleProperty('primaryContent.background') . '

	' . XenForo_Template_Helper_Core::styleProperty('primaryContent.border') . '
}

	.playlistListItem .listBlock
	{
		display: table-cell;
		vertical-align: middle;
	}

	.playlistListItem .listBlockInner
	{
		padding: 10px;
	}

	.playlistListItem .playlistIcon
	{
		width: ' . (48 + 3 * 2 + 5 * 2) . 'px;
	}

		.playlistListItem .playlistIcon .listBlockInner
		{
			padding: 5px;
			position: relative;
		}
		
		.playlistListItem .playlistIcon .playlistIcon img
		{
			' . XenForo_Template_Helper_Core::styleProperty('avatar') . '
			width: 48px;
			height: 48px;
		}

	.playlistListItem .main
	{
		width: auto;
	}

		.playlistListItem .main .title
		{
			font-size: 11pt;
			font-weight: bold;
		}

		.playlistListItem .main .playlistDetails
		{
			font-size: 11px;
		}

			.playlistListItem .main .playlistDetails a.item
			{
				float: right;
				margin-left: 10px;
			}

		.playlistListItem .main .tagLine
		{
			font-size: 11px;
			margin-top: .5em;
		}

	.playlistListItem .playlistStats
	{
		width: 200px;
		font-size: 11px;
	}

		.playlistListItem .playlistStats dt
		{
			color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
		}

		.playlistListItem .playlistStats .Hint
		{
			float: right;
		}

	.playlistListItem .playlistIcon,
	.playlistListItem .playlistStats
	{
		' . XenForo_Template_Helper_Core::styleProperty('secondaryContent.background') . '
	}

/** IE <8 **/
.playlistListItem               { *display: block; _vertical-align: bottom; }
.playlistListItem .listBlock    { *display: block; *float: left; _height: 52px; *min-height: 52px; }
.playlistListItem .playlistIcon { *width: 10.98%; *font-size: 0; }
.playlistListItem .main         { *width: 59.98%; }
.playlistListItem .playlistStats { *width: 28.97%; }';
