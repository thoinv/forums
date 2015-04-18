<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Watched Tags';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'This is a list of all the tags that you are watching.';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('tags', false, array()), 'value' => 'Tags');
$__output .= '

';
$this->addRequiredExternal('css', 'discussion_list');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('watched/tags/update', false, array()) . '" method="post" class="discussionList sectionMain">
	
	<dl class="sectionHeaders">
		<dt class="posterAvatar"></dt>
		<dd class="main">
			<a class="title"><span>' . 'Tag' . '</span></a>
			<a class="postDate"><span>' . 'Notifications' . '</span></a>
		</dd>
	</dl>

	';
if ($tags)
{
$__output .= '		
		<ol class="discussionListItems">
		';
foreach ($tags AS $tag)
{
$__output .= '
			<li id="tag-' . htmlspecialchars($tag['tag_id'], ENT_QUOTES, 'UTF-8') . '" class="discussionListItem">

				<div class="listBlock posterAvatar">
					<span class="avatarContainer">
						' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($tag,(true),array(
'user' => '$tag',
'size' => 's',
'img' => 'true'
),'')) . '
					</span>
				</div>

				<div class="listBlock main">

					<div class="titleText">
						<h3 class="title">
							<input type="checkbox" name="tag_ids[]" value="' . htmlspecialchars($tag['tag_id'], ENT_QUOTES, 'UTF-8') . '" />
							<a href="' . XenForo_Template_Helper_Core::link('tags', $tag, array()) . '">' . (($tag['tag_title']) ? (htmlspecialchars($tag['tag_title'], ENT_QUOTES, 'UTF-8')) : (htmlspecialchars($tag['tag_text'], ENT_QUOTES, 'UTF-8'))) . '</a>
						</h3>

						<div class="secondRow">
							<div class="posterDate muted">
								' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($tag,'',false,array(
'title' => 'Tag Creator'
))) . '<span class="startDate">,
								<a' . (($visitor['user_id']) ? (' href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '"') : ('')) . ' class="faint">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($tag['created_date'],array(
'time' => '$tag.created_date'
))) . '</a></span>
							</div>

							<div class="controls faint">
								';
if ($tag['send_alert'])
{
$__output .= 'Alerts';
}
if ($tag['send_alert'] AND $tag['send_email'])
{
$__output .= ',
								';
}
if ($tag['send_email'])
{
$__output .= 'Emails';
}
$__output .= '
							</div>
						</div>
					</div>
				</div>
			</li>
		';
}
$__output .= '
		</ol>
	';
}
else
{
$__output .= '
		<div class="primaryContent">
			' . 'You are not watching any tags.' . '
		</div>
	';
}
$__output .= '
	
	<div class="sectionFooter">
		<select name="do" class="textCtrl">
			<option>' . 'With selected' . '...</option>
			<option value="alert">' . 'Enable alert notification' . '</option>
			<option value="no_alert">' . 'Disable alert notification' . '</option>
			<option value="email">' . 'Enable email notification' . '</option>
			<option value="no_email">' . 'Disable email notification' . '</option>
			<option value="stop">' . 'Stop watching tags' . '</option>
		</select>
		<input type="submit" value="' . 'Go' . '" class="button" class="button" />
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

';
