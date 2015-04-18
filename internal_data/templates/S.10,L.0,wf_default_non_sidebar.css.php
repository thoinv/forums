<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

/* list of users with 32px avatars, username and user title */
.non-sidebar-widget .avatarList li {
	' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListItem') . '
}

	.non-sidebar-widget .avatarList .avatar {
		' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListAvatar') . '
		
		width: auto;
		height: auto;
	}
		
	.non-sidebar-widget .avatarList .avatar img {
		width: ' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListAvatar.width') . ';
		height: ' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListAvatar.height') . ';
	}
	
	.non-sidebar-widget .avatarList .username {
		' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListUsername') . '
	}
	
	.non-sidebar-widget .avatarList .userTitle {
		' . XenForo_Template_Helper_Core::styleProperty('sidebarAvatarListUserTitle') . '
	}


/* list of users */

.non-sidebar-widget .userList {
}

	.non-sidebar-widget .userList .username {
		' . XenForo_Template_Helper_Core::styleProperty('sidebarUserListUsername') . '
	}

	.non-sidebar-widget .userList .username.invisible {
		' . XenForo_Template_Helper_Core::styleProperty('sidebarUserListUsernameInvisible') . '
	}
	
	.non-sidebar-widget .userList .username.followed {
		' . XenForo_Template_Helper_Core::styleProperty('sidebarUserListUsernameFollowed') . '
	}

	.non-sidebar-widget .userList .moreLink {
		display: block;
	}';
