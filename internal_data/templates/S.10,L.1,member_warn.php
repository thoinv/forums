<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Warn Member' . ': ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Warn Member' . ': <em>' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '</em>';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:members', $user, array()), 'value' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'));
$__output .= '

';
$this->addRequiredExternal('js', 'js/xenforo/form_filler.js');
$__output .= '
';
$this->addRequiredExternal('css', 'member_warn');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('members/warn', $user, array()) . '" method="post" class="xenForm" data-form-filler-url="' . XenForo_Template_Helper_Core::link('members/warn', $user, array(
'fill' => '1',
'content_type' => $contentType,
'content_id' => $contentId
)) . '">
	
	<div class="warningHeader">
		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,false,array(
'user' => '$user',
'size' => 's'
),'')) . '
		<dl>
			<dt>' . 'Content' . ':</dt>
			<dd><h2><a href="' . htmlspecialchars($contentUrl, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($contentTitle, ENT_QUOTES, 'UTF-8') . '</a></h2></dd>
		</dl>
	</div>

	<ul class="tabs Tabs" data-panes="#warningPanes > li">
		<li class="active"><a>' . 'Warning Information' . '</a></li>
		<li><a>' . 'Member Notification' . '</a></li>
		';
if ($canDeleteContent OR $canWarnPublicly)
{
$__output .= '
			
			<li><a>' . 'Content Action' . '</a></li>
		';
}
$__output .= '
		';
if ($warningCount)
{
$__output .= '<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#warnings">' . 'Warnings' . ' (' . XenForo_Template_Helper_Core::numberFormat($warningCount, '0') . ')</a></li>';
}
$__output .= '
	</ul>

	<ul id="warningPanes">
		<li>
			<dl class="ctrlUnit">
				<dt>' . 'Warning Type' . ':</dt>
				<dd>
					<ul>
						';
foreach ($warnings AS $warning)
{
$__output .= '
							<li><label><input type="radio" name="warning_definition_id" class="FormFiller" value="' . htmlspecialchars($warning['warning_definition_id'], ENT_QUOTES, 'UTF-8') . '" /> ' . htmlspecialchars($warning['title'], ENT_QUOTES, 'UTF-8') . '</label></li>
						';
}
$__output .= '
						<li><label><input type="radio" name="warning_definition_id" class="FormFiller Disabler" value="0" id="customWarning" checked="checked" /> ' . 'Custom Warning' . ':</label>
							<ul id="customWarning_Disabler">
								<li><input type="text" name="title" class="textCtrl" placeholder="' . 'Custom Warning' . '..." maxlength="255" /></li>
							</ul>
						</li>
					</ul>
				</dd>
			</dl>
			
			<fieldset id="WarningEditableFields">
				<dl class="ctrlUnit">
					<dt>' . 'Warning Points' . ':</dt>
					<dd>
						<ul>
							<li><label><input type="checkbox" id="applyPoints" name="points_enable" value="1" class="Disabler" checked="checked" /> ' . 'Apply warning points' . ':</label>
								<ul id="applyPoints_Disabler">
									<li><input type="number" name="points" value="1" class="textCtrl SpinBox number autoSize" min="0" step="1" /></li>
								</ul>
							</li>
						</ul>
					</dd>
				</dl>
				
				<dl class="ctrlUnit">
					<dt>' . 'Points Expiry' . ':</dt>
					<dd>
						<ul>
							<li><label><input type="checkbox" id="expirePoints" name="expiry_enable" value="1" class="Disabler" checked="checked" /> ' . 'Points expire after' . ':</label>
								<ul id="expirePoints_Disabler">
									<li>
										<input type="number" name="expiry_value" value="1" class="textCtrl SpinBox number autoSize" min="0" step="1" />
										<select name="expiry_unit" class="textCtrl autoSize">
											<option value="days">' . 'Days' . '</option>
											<option value="weeks">' . 'Weeks' . '</option>
											<option value="months" selected="selected">' . 'Months' . '</option>
											<option value="years">' . 'Years' . '</option>
										</select>
									</li>
								</ul>
							</li>
						</ul>
					</dd>
				</dl>
			</fieldset>
				
			<fieldset>
				<dl class="ctrlUnit">
					<dt>' . 'Notes' . ':</dt>
					<dd>
						<textarea name="notes" rows="2" class="Elastic textCtrl"></textarea>
						<p class="explain">' . 'This will not be shown to the member receiving the warning.' . '</p>
					</dd>
				</dl>
			</fieldset>
		</li>
		
		
		<li>
			<dl class="ctrlUnit">
				<dt>' . 'Member Notification' . ':</dt>
				<dd>
					<ul>
						<li><label><input type="checkbox" id="startConversation" class="Disabler" checked="checked" /> ' . 'Start a conversation with ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '' . ':</label>
							<ul id="startConversation_Disabler">
								<li><input type="text" name="conversation_title" value="" class="textCtrl" id="ctrl_conversation_title" placeholder="' . 'Conversation Title' . '" /></li>
								<li><label for="ctrl_conversation_message">' . 'Message' . ':</label>
									<textarea name="conversation_message" class="textCtrl Elastic" id="ctrl_conversation_message" rows="2"></textarea>
									<p class="explain">' . 'This will be visible only to you and this member.' . '</p></li>
								<li><label><input type="checkbox" name="open_invite" value="1" /> ' . 'Allow ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' to invite others to this conversation' . '</label></li>
								<li><label><input type="checkbox" name="conversation_locked" value="1" /> ' . 'Lock conversation (no responses will be allowed)' . '</label></li>
							</ul>
						</li>
					</ul>
				</dd>
			</dl>
		</li>
		
		';
$__compilerVar1 = '';
$__compilerVar1 .= '
						';
if ($canDeleteContent)
{
$__compilerVar1 .= '
						<li><label><input type="radio" name="content_action" value="delete_content" id="deleteContent" class="Disabler" /> ' . 'Delete the content' . '</label>
							<ul id="deleteContent_Disabler">
								<li><input type="text" name="delete_reason" placeholder="' . 'Reason for Deletion' . '" class="textCtrl" />
									<p class="explain">' . 'The item will remain viewable by moderators and may be restored at a later date.' . '</p></li>
							</ul>
						</li>
						';
}
$__compilerVar1 .= '
						';
if ($canWarnPublicly)
{
$__compilerVar1 .= '
						<li><label><input type="radio" name="content_action" value="public_warning" id="publicWarning" class="Disabler" /> ' . 'Post a public warning' . ':</label>
							<ul id="publicWarning_Disabler">
								<li><input type="text" name="public_warning" class="textCtrl" id="ctrl_public_warning" placeholder="' . 'Public Warning Text' . '" maxlength="255" />
									<p class="explain">' . 'This will be visible to anyone who can see the content for which this member is being warned.' . '</p></li>
							</ul>
						</li>
						';
}
$__compilerVar1 .= '
						';
if (trim($__compilerVar1) !== '')
{
$__output .= '
		<li>
			<dl class="ctrlUnit">
				<dt>' . 'Content Action' . ':</dt>
				<dd>
					<ul>
						<li><label><input type="radio" name="content_action" value="" checked="checked" /> ' . 'Do nothing' . '</label></li>
						' . $__compilerVar1 . '
					</ul>
				</dd>
			</dl>
		</li>
		';
}
unset($__compilerVar1);
$__output .= '
		
		';
if ($warningCount)
{
$__output .= '
			<li id="warnings" class="profileContent" data-loadUrl="' . XenForo_Template_Helper_Core::link('members/warnings', $user, array()) . '">
				' . 'Loading' . '...
				<noscript><a href="' . XenForo_Template_Helper_Core::link('members/warnings', $user, array()) . '">' . 'View' . '</a></noscript>
			</li>
		';
}
$__output .= '
	</ul>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Warn Member' . '" class="button" accesskey="s" /></dd>
	</dl>

	<input type="hidden" name="content_type" value="' . htmlspecialchars($contentType, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="content_id" value="' . htmlspecialchars($contentId, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	
	<input type="checkbox" id="WarningEditableInput" value="1" checked="checked" style="display:none" />
	<script>
		$(function() {
			var $input = $(\'#WarningEditableInput\'), $fields = $(\'#WarningEditableFields\');
			$input.click(function() {
				if (!$input.is(\':checked\'))
				{
					setTimeout(function() { $fields.find(\'input, textarea, select\').attr(\'disabled\', true).addClass(\'disabled\'); }, 0);
				}
				else
				{
					$fields.find(\'input, textarea, select\').attr(\'disabled\', false).removeClass(\'disabled\');
				}
			});
		});
	</script>
</form>';
