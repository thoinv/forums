<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Moderation Queue';
$__output .= '

';
if ($queue)
{
$__output .= '
	<form action="' . XenForo_Template_Helper_Core::link('moderation-queue/save', false, array()) . '" method="post" class="xenForm">
		';
foreach ($queue AS $entry)
{
$__output .= '
			<fieldset>
				<dl class="ctrlUnit">
					<dt><label for="ctrl_' . htmlspecialchars($entry['content_type'], ENT_QUOTES, 'UTF-8') . '_' . htmlspecialchars($entry['content_id'], ENT_QUOTES, 'UTF-8') . '_title">' . htmlspecialchars($entry['content']['contentTypeTitle'], ENT_QUOTES, 'UTF-8') . ':</label></dt>
					<dd>
						';
if ($entry['content']['titleEdit'])
{
$__output .= '
							<input type="text" name="queue[' . htmlspecialchars($entry['content_type'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($entry['content_id'], ENT_QUOTES, 'UTF-8') . '][title]" value="' . htmlspecialchars($entry['content']['title'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl"
								id="ctrl_' . htmlspecialchars($entry['content_type'], ENT_QUOTES, 'UTF-8') . '_' . htmlspecialchars($entry['content_id'], ENT_QUOTES, 'UTF-8') . '_title"
							/>
						';
}
else
{
$__output .= '
							<a href="' . htmlspecialchars($entry['content']['link'], ENT_QUOTES, 'UTF-8') . '" target="_blank">' . htmlspecialchars($entry['content']['title'], ENT_QUOTES, 'UTF-8', (false)) . '</a>
						';
}
$__output .= '
					</dd>
				</dl>

				<dl class="ctrlUnit">
					<dt>' . 'Posted' . ':</dt>
					<dd><a href="' . htmlspecialchars($entry['content']['link'], ENT_QUOTES, 'UTF-8') . '" target="_blank">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($entry['content_date'],array(
'time' => '$entry.content_date'
))) . '</a></dd>
				</dl>

				<dl class="ctrlUnit">
					<dt>' . 'Posted By' . ':</dt>
					<dd><a' . (($entry['content']['user']['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('members', $entry['content']['user'], array()) . '" class="username"') : ('')) . '>' . htmlspecialchars($entry['content']['user']['username'], ENT_QUOTES, 'UTF-8') . '</a></dd>
				</dl>

				<dl class="ctrlUnit">
					<dt><label for="ctrl_' . htmlspecialchars($entry['content_type'], ENT_QUOTES, 'UTF-8') . '_' . htmlspecialchars($entry['content_id'], ENT_QUOTES, 'UTF-8') . '_message">' . 'Message' . ':</label></dt>
					<dd>
						<textarea name="queue[' . htmlspecialchars($entry['content_type'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($entry['content_id'], ENT_QUOTES, 'UTF-8') . '][message]" class="textCtrl Elastic"
							id="ctrl_' . htmlspecialchars($entry['content_type'], ENT_QUOTES, 'UTF-8') . '_' . htmlspecialchars($entry['content_id'], ENT_QUOTES, 'UTF-8') . '_message" rows="2">' . htmlspecialchars($entry['content']['message'], ENT_QUOTES, 'UTF-8') . '</textarea>
					</dd>
				</dl>

				<dl class="ctrlUnit">
					<dt>' . 'Action' . ':</dt>
					<dd>
						<ul>
							<li><label for="ctrl_' . htmlspecialchars($entry['content_type'], ENT_QUOTES, 'UTF-8') . '_' . htmlspecialchars($entry['content_id'], ENT_QUOTES, 'UTF-8') . '_action_none">
								<input type="radio" name="queue[' . htmlspecialchars($entry['content_type'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($entry['content_id'], ENT_QUOTES, 'UTF-8') . '][action]" value="" id="ctrl_' . htmlspecialchars($entry['content_type'], ENT_QUOTES, 'UTF-8') . '_' . htmlspecialchars($entry['content_id'], ENT_QUOTES, 'UTF-8') . '_action_none" checked="checked" />
								' . 'Do nothing' . '
							</label></li>

							<li><label for="ctrl_' . htmlspecialchars($entry['content_type'], ENT_QUOTES, 'UTF-8') . '_' . htmlspecialchars($entry['content_id'], ENT_QUOTES, 'UTF-8') . '_action_approve">
								<input type="radio" name="queue[' . htmlspecialchars($entry['content_type'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($entry['content_id'], ENT_QUOTES, 'UTF-8') . '][action]" value="approve" id="ctrl_' . htmlspecialchars($entry['content_type'], ENT_QUOTES, 'UTF-8') . '_' . htmlspecialchars($entry['content_id'], ENT_QUOTES, 'UTF-8') . '_action_approve" />
								' . 'Approve' . '
							</label></li>

							<li><label for="ctrl_' . htmlspecialchars($entry['content_type'], ENT_QUOTES, 'UTF-8') . '_' . htmlspecialchars($entry['content_id'], ENT_QUOTES, 'UTF-8') . '_action_delete">
								<input type="radio" name="queue[' . htmlspecialchars($entry['content_type'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($entry['content_id'], ENT_QUOTES, 'UTF-8') . '][action]" value="delete" id="ctrl_' . htmlspecialchars($entry['content_type'], ENT_QUOTES, 'UTF-8') . '_' . htmlspecialchars($entry['content_id'], ENT_QUOTES, 'UTF-8') . '_action_delete" />
								' . 'Delete' . '
							</label></li>
						</ul>
					</dd>
				</dl>
			</fieldset>
		';
}
$__output .= '

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd><input type="submit" value="' . 'Update Moderation Queue' . '" class="button primary" /></dd>
		</dl>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
';
}
else
{
$__output .= '
	<div>' . 'The moderation queue is currently empty.' . '</div>
';
}
