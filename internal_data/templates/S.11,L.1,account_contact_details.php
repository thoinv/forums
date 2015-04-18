<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Contact Details';
$__output .= '

';
$this->addRequiredExternal('css', 'account');
$__output .= '

<form method="post" class="xenForm AutoValidator"
	action="' . XenForo_Template_Helper_Core::link('account/contact-details-save', false, array()) . '"
	data-fieldValidatorUrl="' . XenForo_Template_Helper_Core::link('account/validate-field.json', false, array()) . '"
	data-redirect="yes">
	
	';
$__compilerVar1 = '';
$__compilerVar1 .= '

	';
if ($hasPassword)
{
$__compilerVar1 .= '
		<fieldset>
			<dl class="ctrlUnit">
				<dt><label for="ctrl_email">' . 'Email' . ':</label></dt>
				<dd>
					<input type="email" name="email" value="' . htmlspecialchars($visitor['email'], ENT_QUOTES, 'UTF-8') . '" dir="ltr" class="textCtrl ConfirmValue" id="ctrl_email" autofocus="autofocus" />
					<p class="explain">' . 'If you change your email, you may need to reconfirm your account.' . '</p>
				</dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_password">' . 'Current Password' . ':</label></dt>
				<dd>
					<input type="password" name="password" value="" class="textCtrl OptOut" id="ctrl_password" />
					<p class="explain">' . 'This is only needed when changing your email address.' . '</p>
				</dd>
			</dl>
		</fieldset>
	';
}
else
{
$__compilerVar1 .= '
		<dl class="ctrlUnit">
			<dt>' . 'Email' . ':</dt>
			<dd>
				' . htmlspecialchars($visitor['email'], ENT_QUOTES, 'UTF-8') . '
				<p class="explain">' . 'Your email cannot be changed while your account does not have a password.' . ' <a href="' . XenForo_Template_Helper_Core::link('account/request-password', false, array()) . '" class="OverlayTrigger">' . 'Request a password be emailed to you' . '</a></p>
			</dd>
		</dl>
	';
}
$__compilerVar1 .= '
	
	';
$__output .= $this->callTemplateHook('account_contact_details_email_password', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '

	<h3 class="sectionHeader">' . 'Messaging Preferences' . '</h3>

	<dl class="ctrlUnit sectionLink">
		<dt></dt>
		<dd>
			<ul>
				';
$__compilerVar2 = '';
$__compilerVar2 .= '
				<li><label for="ctrl_receive_admin_email"><input type="checkbox" name="receive_admin_email" value="1" id="ctrl_receive_admin_email" ' . (($visitor['receive_admin_email']) ? ' checked="checked"' : '') . ' />
					' . 'Receive site mailings' . '</label>
					<p class="hint">' . 'You will receive a copy of emails sent by the administrator to all members of the site.' . '</p>
				</li>
				<li><label for="ctrl_allow_send_personal_conversation_enable"><input type="checkbox" name="allow_send_personal_conversation_enable" value="1" id="ctrl_allow_send_personal_conversation_enable" class="Disabler OptOut" ' . (($visitor['allow_send_personal_conversation'] != ('none')) ? ' checked="checked"' : '') . ' />
					' . 'Accept conversations from' . '...</label>
					<ul id="ctrl_allow_send_personal_conversation_enable_Disabler">
						<li>
							<select name="allow_send_personal_conversation" class="textCtrl autoSize" id="ctrl_allow_send_personal_conversation">
								
								<option value="members"  ' . (($visitor['allow_send_personal_conversation'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Members Only' . '</option>
								<option value="followed" ' . (($visitor['allow_send_personal_conversation'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'People You Follow Only' . '</option>
							</select>
						</li>
					</ul>
				</li>				
				<li>
					<label for="ctrl_email_on_conversation"><input type="checkbox" name="email_on_conversation" value="1" id="ctrl_email_on_conversation" ' . (($visitor['email_on_conversation']) ? ' checked="checked"' : '') . ' />
					' . 'Receive email when a new conversation message is received' . '</label>
					<p class="hint">' . 'Email notifications for new conversations, replies to existing conversations, and being added to an existing conversation.' . '</p>
				</li>
				';
$__output .= $this->callTemplateHook('account_contact_details_messaging', $__compilerVar2, array());
unset($__compilerVar2);
$__output .= '
			</ul>
		</dd>
	</dl>
	
	';
if ($canEditProfile AND $customFields)
{
$__output .= '
	';
$__compilerVar3 = '';
$__compilerVar3 .= '
		<h3 class="sectionHeader">' . 'Identities' . '</h3>
		';
$__compilerVar4 = '';
foreach ($customFields AS $field)
{
$__compilerVar4 .= '
	';
if ($field['isEditable'])
{
$__compilerVar4 .= '
		';
$__compilerVar5 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar5 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar5 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar5 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar5 .= '
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar5 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar5 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar5 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar5 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar5 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar5 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar5 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar5 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar5 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar5 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar5 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar5 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar5 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar5 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar5 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar5 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar5 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar5 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar5 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar5 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar5 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar5 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar5 .= '
			</select>
		';
}
$__compilerVar5 .= '

		';
$__compilerVar6 = '';
$__compilerVar6 .= $field['description'];
if (trim($__compilerVar6) !== '')
{
$__compilerVar5 .= '<p class="explain">' . $__compilerVar6 . '</p>';
}
unset($__compilerVar6);
$__compilerVar5 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__compilerVar4 .= $__compilerVar5;
unset($__compilerVar5);
$__compilerVar4 .= '
	';
}
$__compilerVar4 .= '
';
}
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
$__compilerVar3 .= '
	';
$__output .= $this->callTemplateHook('account_contact_details_identities', $__compilerVar3, array());
unset($__compilerVar3);
$__output .= '
	';
}
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Save Changes' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
