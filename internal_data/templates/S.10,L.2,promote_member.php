<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Promote Or Demote This User' . ': ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Promote Or Demote This User' . ': ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:members', $user, array()), 'value' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'));
$__output .= '

';
$this->addRequiredExternal('css', 'promote_member');
$__output .= '
<form action="' . XenForo_Template_Helper_Core::link('members/promote', $user, array()) . '" method="post" class="xenForm formOverlay">
	';
if ($userGroups)
{
$__output .= '
		';
if ($canPromotePrimary)
{
$__output .= '
		<dl class="ctrlUnit">
			<dt><label for="ctrl_primary_group">' . 'User Group' . ':</label></dt>
			<dd>
				<ul class="groupsList">
					';
foreach ($userGroups AS $group)
{
$__output .= '
						<li><label for="ctrl_primary_group_' . htmlspecialchars($group['user_group_id'], ENT_QUOTES, 'UTF-8') . '"><input type="radio" name="primary_group" value="' . htmlspecialchars($group['user_group_id'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_primary_group_' . htmlspecialchars($group['user_group_id'], ENT_QUOTES, 'UTF-8') . '" ' . ((in_array($user['user_group_id'], array($group['user_group_id']))) ? ('checked') : ('')) . '> ' . htmlspecialchars($group['title'], ENT_QUOTES, 'UTF-8') . '</label></li>
					';
}
$__output .= '
				</ul>
			</dd>
		</dl>
		';
}
$__output .= '
		';
if ($canPromoteSecondary)
{
$__output .= '
		<dl class="ctrlUnit">
			<dt><label for="ctrl_secondary_groups">' . 'Secondary User Groups' . ':</label></dt>
			<dd>
				<ul class="groupsList">
					';
foreach ($userGroups AS $group)
{
$__output .= '
						<li><label for="ctrl_seconday_groups_' . htmlspecialchars($group['user_group_id'], ENT_QUOTES, 'UTF-8') . '"><input type="checkbox" name="secondary_groups[]" value="' . htmlspecialchars($group['user_group_id'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_seconday_groups_' . htmlspecialchars($group['user_group_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($secondaryGroupIds AND in_array($group['user_group_id'], $secondaryGroupIds)) ? ('checked') : ('')) . '> ' . htmlspecialchars($group['title'], ENT_QUOTES, 'UTF-8') . '</label></li>
					';
}
$__output .= '
				</ul>
			</dd>
		</dl>
		<dl class="ctrlUnit">
			<dt></dt>
			<dd>
				<input type="checkbox" name="remove" value="1" id="ctrl_remove_secondary_group_ids" /> ' . 'Remove old secondary group ids' . '
				<p class="explain">' . 'If enabled, this will remove all old secondary group ids which user have else this will merge with old secondary group ids.' . '</p>
			</dd>
		</dl>
		';
}
$__output .= '
		
	';
}
else
{
$__output .= '
		' . 'Sorry. There no have any special groups for demote or promote' . '
	';
}
$__output .= '
	<dl class="ctrlUnit">
		<dt></dt>
		<dd>
			<input type="checkbox" name="send_mail" id="ctrl_send_mail" checked="checked" value="1" /> ' . 'Send an email for ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '' . '
		</dd>
	</dl>
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Lưu thay đổi' . '" class="button primary" />
		</dd>
	</dl>
	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
