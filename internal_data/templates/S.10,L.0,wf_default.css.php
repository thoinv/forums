<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

.section.sectionMain.widget-container.widget-tabs {
	border: 0;
	margin: 0;
	padding: 0;
}
	.section.sectionMain.widget-container.widget-tabs .widget-panes {
		' . XenForo_Template_Helper_Core::styleProperty('primaryContent.padding') . ';
		border-right: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
		border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
		border-left: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';

		
		border-bottom-left-radius: 10px;
		border-bottom-right-radius: 10px;
	}

.widget-tabs .tabs {
	background: none;
}

.widget-tabs .tabs li a {
	font-weight: bold;
}

.widget-tabs .primaryContent {
	padding: 0;
	background: none;
	border: 0;
}

.widget-poll .pollBlock .pollContent {
	padding-left: 0;
	width: auto;
}

.widget-poll .pollBlock .pollOptions,
.widget-poll .pollBlock .pollResults {
	border: 0;
}

.widget-poll .pollBlock .pollResult h3.optionText {
	border: 0;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
}

.widget-poll .pollBlock .pollResult .count {
	padding: 0;
}

.avatarList .WidgetFramework_nextToAvatar {
	margin-left: 41px;
}
	.avatarList .WidgetFramework_nextToAvatar .username {
		margin-top: 0;
	}

.widget .statusPoster textarea {
	box-sizing: border-box;
	width: 100%;
	margin: 0;
	resize: vertical;
	overflow: hidden;
}

.WidgetFramework_WidgetRenderer_ShareThisPage .sharePage .shareControl {
    float: none;
}

.WidgetFramework_WidgetRenderer_FeedReader_Entries {
}
	.WidgetFramework_WidgetRenderer_FeedReader_Entries .limitedHeight {
		max-height: ' . (floor(XenForo_Template_Helper_Core::styleProperty('sidebar.font-size') * 1.27 * 4) - 1) . 'px; 
	}

	.WidgetFramework_WidgetRenderer_FeedReader_Entries .WidgetFramework_WidgetRenderer_FeedReader_Entry {
		text-align: justify;
		display: block;
		overflow: hidden;
		margin-bottom: 3px;
	}

	.WidgetFramework_WidgetRenderer_FeedReader_Entries img.WidgetFramework_WidgetRenderer_FeedReader_Thumbnail {
		width: auto;
		float: right;
		margin-left: 3px;
	}
		.WidgetFramework_WidgetRenderer_FeedReader_Entries .WidgetFramework_WidgetRenderer_FeedReader_Entry:nth-child(2n) img.WidgetFramework_WidgetRenderer_FeedReader_Thumbnail { float: left; margin-right: 3px; }

.WidgetFramework_WidgetRenderer_XFRM_Resources .Hint {
	float: right;
}

.WidgetFramework_WidgetRenderer_Threads .unread > a { font-weight: bold; }
.sidebar .WidgetFramework_WidgetRenderer_Threads .avatarList .username { display: inline; font-size: inherit; margin: 0; }

.WidgetFramework_WidgetRenderer_Threads_FullThreadList {
}
	.WidgetFramework_WidgetRenderer_Threads_FullThreadList .subHeading {
		font-size: 1.3em;
	}
	.WidgetFramework_WidgetRenderer_Threads_FullThreadList .info {
		padding: 5px 10px;

		';
if (XenForo_Template_Helper_Core::styleProperty('wf_threads_fullInfoBottom'))
{
$__output .= '
			border-top: 1px dashed ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		';
}
else
{
$__output .= '
			border-bottom: 1px dashed ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
		';
}
$__output .= '
	}
		.WidgetFramework_WidgetRenderer_Threads_FullThreadList .counters {
			float: right;
		}
	.WidgetFramework_WidgetRenderer_Threads_FullThreadList .message {
		margin-bottom: 10px;
	}
	' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.WidgetFramework_WidgetRenderer_Threads_FullThreadList .message'
)) . '
		.WidgetFramework_WidgetRenderer_Threads_FullThreadList .messageInfo {
			padding: 5px 10px;
		}
		.WidgetFramework_WidgetRenderer_Threads_FullThreadList .message .newIndicator
		{
			' . XenForo_Template_Helper_Core::styleProperty('messageNewIndicator') . '

			margin-right: -' . (XenForo_Template_Helper_Core::styleProperty('content.padding-right') + 5) . 'px;
		}
			.WidgetFramework_WidgetRenderer_Threads_FullThreadList .message .newIndicator span
			{
				' . XenForo_Template_Helper_Core::styleProperty('messageNewIndicatorInner') . '
			}

	.WidgetFramework_WidgetRenderer_Threads_FullThreadList .messageText .readMoreLink {
		display: block;
		text-align: right;
	}

.WidgetFramework_WidgetRenderer_ProfilePosts_ProfilePostItem
{
	overflow: hidden; zoom: 1;

	margin: 5px 0;
	padding-top: 5px;
	border-top: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
}

.WidgetFramework_WidgetRenderer_ProfilePosts_ProfilePostItem:first-child
{
	border-top: none;
	padding-top: 0;
}

.WidgetFramework_WidgetRenderer_ProfilePosts_ProfilePostItem .avatar
{
	float: left;
	font-size: 0;
}

	.WidgetFramework_WidgetRenderer_ProfilePosts_ProfilePostItem .avatar img
	{
		width: 24px;
		height: 24px;
	}

.WidgetFramework_WidgetRenderer_ProfilePosts_ProfilePostItem .messageInfo
{
	margin-left: 34px;
}

.WidgetFramework_WidgetRenderer_ProfilePosts_ProfilePostItem .messageContent article,
.WidgetFramework_WidgetRenderer_ProfilePosts_ProfilePostItem .messageContent blockquote
{
	display: inline;
}

.WidgetFramework_WidgetRenderer_ProfilePosts_ProfilePostItem .poster
{
	font-weight: bold;
}

.WidgetFramework_WidgetRenderer_ProfilePosts_ProfilePostItem .messageMeta
{
	overflow: hidden; zoom: 1;
	font-size: 11px;
	line-height: 14px;
	padding-top: 4px;
}

.widget .avatarHeap {
	
	margin-right: -10px;
}

';
$__compilerVar1 = '';
$__compilerVar1 .= '

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
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
';
$__compilerVar2 = '';
$__compilerVar2 .= '

.Tinhte_XenTag_WidgetRenderer_Cloud h3 { display: none }';
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '

';
