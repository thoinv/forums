<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Mark Forums Read';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('forums/-/mark-read', false, array()) . '" method="post" class="xenForm formOverlay AutoValidator" data-redirect="on">

	';
if ($forum)
{
$__output .= '
		<p>' . 'Which forums do you want to mark as read?' . '</p>
		
		<dl class="ctrlUnit">
			<dt></dt>
			<dd>
				<ul>
					<li><label><input type="radio" name="node_id" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '" checked="checked" /> ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</label></li>
					<li><label><input type="radio" name="node_id" value="0" /> ' . 'Mark all forums read' . '</label></li>
				</ul>
			</dd>
		</dl>
		
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Mark Forums Read' . '" class="button primary" />
			</dd>
		</dl>
	';
}
else
{
$__output .= '	
		<p>' . 'Are you sure you want to mark all forums read?' . '</p>
		
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Mark All Forums Read' . '" class="button primary" />
			</dd>
		</dl>	
	';
}
$__output .= '

	<input type="hidden" name="date" value="' . htmlspecialchars($markDate, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
