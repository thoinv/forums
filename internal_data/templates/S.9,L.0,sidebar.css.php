<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '/* sidebar structural elements */

.mainContainer
{
	 float: left;
	 margin-right: -250px;
 	 margin-bottom: 10px;
	 width: 100%;
}

	.mainContent
	{
		margin-right: 260px;
		margin-top: 10px;
		background: #fff;
		border: 1px solid rgb(217, 217, 217);
		padding: 10px;
	}

.sidebar
{
	float: right;
	' . XenForo_Template_Helper_Core::styleProperty('sidebar') . '
}







/* visitor panel */

.sidebar .visitorPanel
{
	overflow: hidden; zoom: 1;
}

	.sidebar .visitorPanel h2 .muted
	{
		display: none;
	}

	.sidebar .visitorPanel .avatar
	{
		' . XenForo_Template_Helper_Core::styleProperty('visitorPanelAvatar') . '
		
		width: auto;
		height: auto;
	}
	
		.sidebar .visitorPanel .avatar img
		{
			width: ' . XenForo_Template_Helper_Core::styleProperty('visitorPanelAvatar.width') . ';
			height: ' . XenForo_Template_Helper_Core::styleProperty('visitorPanelAvatar.height') . ';
		}
	
	.sidebar .visitorPanel .username
	{
		' . XenForo_Template_Helper_Core::styleProperty('visitorPanelUsername') . '
	}
	
	.sidebar .visitorPanel .stats
	{
		' . XenForo_Template_Helper_Core::styleProperty('visitorPanelStats') . '
	}
	
	.sidebar .visitorPanel .stats .pairsJustified
	{
		line-height: normal;
	}













	
/* generic sidebar blocks */
.sidebar .section .secondaryContent
{
	background: #fff;
	border: 1px solid rgb(217, 217, 217);
}
		
.sidebar .section .primaryContent   h3,
.sidebar .section .secondaryContent h3,
.profilePage .mast .section.infoBlock h3
{
	' . XenForo_Template_Helper_Core::styleProperty('sidebarBlockHeading') . '
}

.sidebar .section .primaryContent   h3 a,
.sidebar .section .secondaryContent h3 a
{
	' . XenForo_Template_Helper_Core::styleProperty('sidebarBlockHeading.font') . '
}

.sidebar .section .secondaryContent .footnote,
.sidebar .section .secondaryContent .minorHeading
{
	' . XenForo_Template_Helper_Core::styleProperty('sidebarBlockFootnote') . '
}

	.sidebar .section .secondaryContent .minorHeading a
	{
		color: ' . XenForo_Template_Helper_Core::styleProperty('sidebarBlockFootnote.color') . ';
	}












/* list of users with 32px avatars, username and user title */

.sidebar .avatarList li
{
	' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListItem') . '
}

	.sidebar .avatarList .avatar
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListAvatar') . '
		
		width: auto;
		height: auto;
	}
		
	.sidebar .avatarList .avatar img
	{
		width: ' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListAvatar.width') . ';
		height: ' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListAvatar.height') . ';
	}
	
	.sidebar .avatarList .username
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListUsername') . '
	}
	
	.sidebar .avatarList .userTitle
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListUserTitle') . '
	}









/* list of users */

.sidebar .userList
{
}

	.sidebar .userList .username
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarUserListUsername') . '
	}

	.sidebar .userList .username.invisible
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarUserListUsernameInvisible') . '
	}
	
	.sidebar .userList .username.followed
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarUserListUsernameFollowed') . '
	}

	.sidebar .userList .moreLink
	{
		display: block;
	}
	
	
	
	
/* people you follow online now */

.followedOnline
{
	' . XenForo_Template_Helper_Core::styleProperty('sidebarFollowedUsers') . '
}

.followedOnline li
{
	' . XenForo_Template_Helper_Core::styleProperty('sidebarFollowedUsersItem') . '
}

	.followedOnline .avatar
	{
		' . XenForo_Template_Helper_Core::styleProperty('sidebarFollowedUsersAvatar') . '
		
		width: auto;
		height: auto;
	}
	
		.followedOnline .avatar img
		{
			width: ' . XenForo_Template_Helper_Core::styleProperty('sidebarFollowedUsersAvatar.width') . ';
			height: ' . XenForo_Template_Helper_Core::styleProperty('sidebarFollowedUsersAvatar.height') . ';
		}
	
	
	

	
	
/* call to action */

#SignupButton
{
	' . XenForo_Template_Helper_Core::styleProperty('signupButton') . '
}

	#SignupButton .inner
	{
		' . XenForo_Template_Helper_Core::styleProperty('signupButtonInner') . '
	}
	
	#SignupButton:hover .inner
	{
		' . XenForo_Template_Helper_Core::styleProperty('signupButtonHover') . '
	}
	
	#SignupButton:active
	{
		' . XenForo_Template_Helper_Core::styleProperty('signupButtonActive') . '
	}

';
if (XenForo_Template_Helper_Core::styleProperty('enableResponsive'))
{
$__output .= '
@media (max-width:' . XenForo_Template_Helper_Core::styleProperty('maxResponsiveWideWidth') . ')
{
	.Responsive .mainContainer
	{
		 float: none;
		 margin-right: 0;
		 width: auto;
	}

		.Responsive .mainContent
		{
			margin-right: 0;
		}
	
	.Responsive .sidebar
	{
		float: none;
		margin: 0 auto;
	}

		.Responsive .sidebar .visitorPanel
		{
			display: none;
		}
}

@media (max-width:340px)
{
	.Responsive .sidebar
	{
		width: 100%;
	}
}
';
}
