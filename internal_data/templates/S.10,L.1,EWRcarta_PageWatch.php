<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($pageWatch)
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Stop Watching This Page';
$__output .= '
';
}
else
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Watch this page';
$__output .= '
';
}
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:wiki', $page, array()), 'value' => htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('wiki/watch', $page, array()) . '" method="post" class="xenForm formOverlay AutoValidator">

	';
if ($pageWatch)
{
$__output .= '
		<p>' . 'You are watching this page. Use the button below if you would like to stop watching this page.' . '</p>
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="hidden" name="stop" value="stop" />
				<input type="submit" value="' . 'Stop watching' . '" class="button primary" />
			</dd>
		</dl>
	';
}
else
{
$__output .= '
		<dl class="ctrlUnit">
			<dt><label>' . 'Watch this page' . '...</label></dt>
			<dd>
				<ul>
					<li>
						<label for="ctrl_email_subscribe_1">
							<input type="radio" name="email_subscribe" value="1" id="ctrl_email_subscribe_1" />
							' . 'and receive email notifications' . '
						</label>
					</li>
					<li>
						<label for="ctrl_email_subscribe_0">
							<input type="radio" name="email_subscribe" value="0" id="ctrl_email_subscribe_0" checked="checked" autofocus="true" />
							 ' . 'without receiving email notifications' . '
						</label>
					</li>
				</ul>
			</dd>
		</dl>
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Watch Page' . '" class="button primary" />
			</dd>
		</dl>
	';
}
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
