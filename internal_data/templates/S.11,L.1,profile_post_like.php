<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($profilePost['username'], ENT_QUOTES, 'UTF-8') . ' - ' . (($like) ? ('Unlike Profile Post') : ('Like Profile Post'));
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:members', $user, array()), 'value' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('profile-posts/like', $profilePost, array()) . '" method="post" class="xenForm">

	<dl class="ctrlUnit fullWidth">
		<dt></dt>
		<dd>
			';
if ($like)
{
$__output .= '
				' . 'Are you sure you want to unlike this profile post?' . '
			';
}
else
{
$__output .= '
				' . 'Are you sure you want to like this profile post?' . '
			';
}
$__output .= '
		</dd>
	</dl>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . (($like) ? ('Unlike Profile Post') : ('Like Profile Post')) . '" accesskey="s" class="button primary" autofocus="true" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
