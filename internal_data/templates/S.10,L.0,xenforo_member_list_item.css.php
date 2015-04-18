<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.memberListItem
{
	' . XenForo_Template_Helper_Core::styleProperty('memberListItem') . '
}

	.memberListItem .avatar,
	.memberListItem .icon
	{
		' . XenForo_Template_Helper_Core::styleProperty('memberListItemAvatar') . '
	}
	
	/* ----------------------- */
	
	.memberListItem .extra
	{
		' . XenForo_Template_Helper_Core::styleProperty('memberListItemExtra') . '
	}

		.memberListItem .extra .DateTime
		{
			display: block;
		}

		.memberListItem .extra .bigNumber
		{
			font-size: 250%;
			color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
		}
	
	.memberListItem .member
	{
		' . XenForo_Template_Helper_Core::styleProperty('memberListItemMember') . '
	}
	
	/* ----------------------- */
		
		.memberListItem h3.username
		{
			' . XenForo_Template_Helper_Core::styleProperty('memberListItemUsername') . '
		}
			
		.memberListItem .username.guest
		{
			' . XenForo_Template_Helper_Core::styleProperty('memberListItemGuest') . '
		}
	
	/* ----------------------- */
		
		.memberListItem .userInfo
		{
			' . XenForo_Template_Helper_Core::styleProperty('memberListItemUserInfo') . '
		}
		
			.memberListItem .userBlurb
			{
			}
		
				.memberListItem .userBlurb .userTitle
				{
					' . XenForo_Template_Helper_Core::styleProperty('memberListItemUserTitle') . '
				}

			.memberListItem .userStats dt,
			.memberListItem .userStats dd
			{
				white-space: nowrap;
			}
				
	
	/* ----------------------- */
		
		.memberListItem .member .contentInfo
		{
			' . XenForo_Template_Helper_Core::styleProperty('memberListItemContent') . '
		}
	
	/* ----------------------- */
	
	
/* extended member list items have a fixed 200px right column */

.memberListItem.extended .extra
{
	width: ' . XenForo_Template_Helper_Core::styleProperty('memberListItemExtendedWidth') . ';
}

.memberListItem.extended .member
{
	margin-right: ' . (XenForo_Template_Helper_Core::styleProperty('memberListItemExtendedWidth') + 10) . 'px;
}';
