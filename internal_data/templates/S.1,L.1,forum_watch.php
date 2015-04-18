<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($forumWatch)
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Unwatch Forum' . ' - ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
}
else
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Watch Forum' . ' - ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
}
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__output .= '

';
$__extraData['bodyClasses'] = '';
$__extraData['bodyClasses'] .= XenForo_Template_Helper_Core::callHelper('nodeClasses', array(
'0' => $nodeBreadCrumbs,
'1' => $forum
));
$__output .= '
';
$__extraData['searchBar']['forum'] = '';
$__compilerVar1 = '';
$__compilerVar1 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Display results as threads' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('forums/watch', $forum, array()) . '" method="post" class="xenForm formOverlay AutoValidator">

	';
if ($forumWatch)
{
$__output .= '
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="hidden" name="stop" value="stop" />
				<input type="submit" value="' . 'Unwatch Forum' . '" class="button primary" />
			</dd>
		</dl>
	';
}
else
{
$__output .= '
		';
if ($forum['allowed_watch_notifications'] != ('none'))
{
$__output .= '
			<dl class="ctrlUnit">
				<dt>' . 'Send notifications for' . ':</dt>
				<dd>
					<ul>
						<li>
							<label>
								<input type="radio" name="notify_on" value="thread" checked="checked" />
								' . 'New Threads' . '
							</label>
						</li>
						';
if ($forum['allowed_watch_notifications'] == ('all'))
{
$__output .= '
							<li>
								<label>
									<input type="radio" name="notify_on" value="message" />
									' . 'New Messages' . '
								</label>
							</li>
						';
}
$__output .= '
						<li>
							<label>
								<input type="radio" name="notify_on" value="" />
								' . 'Don\'t send notifications' . '
								<p class="hint">' . 'The forum will still be listed on the watched forums page, which can be used to list only the forums you\'re interested in.' . '</p>
							</label>
						</li>
					</ul>
				</dd>
			</dl>

			<dl class="ctrlUnit">
				<dt>' . 'Send notifications via' . ':</dt>
				<dd>
					<ul>
						<li>
							<label>
								<input type="checkbox" name="send_alert" value="1" checked="checked" />
								' . 'Alerts' . '
							</label>
						</li>
						<li>
							<label>
								<input type="checkbox" name="send_email" value="1" />
								' . 'Emails' . '
							</label>
						</li>
					</ul>
				</dd>
			</dl>
		';
}
$__output .= '

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Watch Forum' . '" class="button primary" />
			</dd>
		</dl>
	';
}
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
