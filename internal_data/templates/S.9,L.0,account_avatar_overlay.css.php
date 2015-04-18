<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/* AVATAR EDITOR */

.xenOverlay.avatarEditor
{
	max-width: 720px;
}

.AvatarEditor
{
	overflow: hidden; zoom: 1;
	margin: 0 auto;
}

/* current avatar large display */

.AvatarEditor .currentAvatar
{
	float: left;
	display: block;
	width: 192px;
	text-align: center;
}

	.AvatarEditor .currentAvatar img
	{
		max-width: 192px;
	}
	
/* controls column */
	
.AvatarEditor .modifyControls
{
	margin-left: 210px;
}

	.AvatarEditor .avatarUpload
	{
		max-width: 100%;
		box-sizing: border-box;
	}

	.AvatarEditor .avatarOption
	{
		overflow: hidden; zoom: 1;
		padding: 10px;
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
		border-radius: 5px;
		margin-bottom: 10px;
		
		background: rgba(0,0,0, 0.25);
	}
	
	.AvatarEditor label
	{
		display: block;
	}
	
	.AvatarEditor .avatarLabel
	{
		display: block;
		float: left;
	}
		
		.AvatarEditor .avatarCropper img
		{
			cursor: move;
		}
		
	.AvatarEditor .radioOption
	{
		float: left;
		margin-left: 10px;
		margin-top: 2px;
	}
	
	.AvatarEditor .labelText
	{
		margin-left: 130px;
	}
	
		.AvatarEditor .explain
		{
			display: block;
			font-size: 11px;
			margin-bottom: 10px;
		}
	
			.AvatarEditor .saveHint
			{
				font-style: italic;
			}
		
		.AvatarEditor #GravatarEmail
		{
			width: 175px;
		}
			
		.AvatarEditor #GravatarTest
		{
			width: 50px;
		}
		
		.AvatarEditor #GravatarError
		{
			color: red;
			display: block;
		}
			
/* bottom controls row */
		
.AvatarEditor .submitUnit
{
	overflow: hidden; zoom: 1;
}

	.AvatarEditor .submitUnit label.deleteCtrl
	{
		float: left;
	}
	
	.AvatarEditor .submitUnit .buttons
	{
		float: right;
	}

		.AvatarEditor .submitUnit .buttons .button
		{
			min-width: 70px;
		}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:700px)
{
	.Responsive .AvatarEditor .currentAvatar
	{
		display: none;
	}

	.Responsive .AvatarEditor .modifyControls
	{
		margin-left: 0;
	}
}

@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveNarrowWidth') . ')
{
	.Responsive .AvatarEditor .avatarLabel
	{
		float: none;
		margin: 0 auto;
		text-align: center;
	}

	.Responsive .AvatarEditor .labelText
	{
		margin-left: 0;
	}

	.Responsive .AvatarEditor .radioOption
	{
		margin: 0;
	}
}
';
}
