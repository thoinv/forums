<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($watch)
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Stop Watching This Resource';
$__output .= '
';
}
else
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Watch This Resource';
$__output .= '
';
}
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $categoryBreadcrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:resources', $resource, array()), 'value' => XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('resources/watch', $resource, array()) . '" method="post" class="xenForm formOverlay AutoValidator">

	';
if ($watch)
{
$__output .= '
		<p>' . 'You are watching this resource. Use the button below if you would like to stop watching this resource.' . '</p>
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="hidden" name="stop" value="stop" />
				<input type="submit" value="' . 'Ngừng theo dõi' . '" class="button primary" />
			</dd>
		</dl>
	';
}
else
{
$__output .= '
		<dl class="ctrlUnit">
			<dt><label>' . 'Watch this resource' . '...</label></dt>
			<dd>
				<ul>
					<li>
						<label for="ctrl_email_subscribe_1">
							<input type="radio" name="email_subscribe" value="1" id="ctrl_email_subscribe_1" />
							' . 'và nhận email thông báo' . '
						</label>
					</li>
					<li>
						<label for="ctrl_email_subscribe_0">
							<input type="radio" name="email_subscribe" value="0" id="ctrl_email_subscribe_0" checked="checked" autofocus="true" />
							 ' . 'không nhận email thông báo' . '
						</label>
					</li>
				</ul>
			</dd>
		</dl>
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Watch Resource' . '" class="button primary" />
			</dd>
		</dl>
	';
}
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
