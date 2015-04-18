<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Chi tiết liên hệ';
$__output .= '

';
$this->addRequiredExternal('css', 'account');
$__output .= '

<form method="post" class="xenForm AutoValidator"
	action="' . XenForo_Template_Helper_Core::link('account/contact-details-save', false, array()) . '"
	data-fieldValidatorUrl="' . XenForo_Template_Helper_Core::link('account/validate-field.json', false, array()) . '"
	data-redirect="yes">
	
	';
$__compilerVar7 = '';
$__compilerVar7 .= '

	';
if ($hasPassword)
{
$__compilerVar7 .= '
		<fieldset>
			<dl class="ctrlUnit">
				<dt><label for="ctrl_email">' . 'Email' . ':</label></dt>
				<dd>
					<input type="email" name="email" value="' . htmlspecialchars($visitor['email'], ENT_QUOTES, 'UTF-8') . '" dir="ltr" class="textCtrl ConfirmValue" id="ctrl_email" autofocus="autofocus" />
					<p class="explain">' . 'Nếu bạn đổi địa chỉ Email, bạn có thể sẽ phải xác nhận lại tài khoản của bạn.' . '</p>
				</dd>
			</dl>

			<dl class="ctrlUnit">
				<dt><label for="ctrl_password">' . 'Mật khẩu hiện tại' . ':</label></dt>
				<dd>
					<input type="password" name="password" value="" class="textCtrl OptOut" id="ctrl_password" />
					<p class="explain">' . 'Mục này chỉ cần khi bạn đổi địa chỉ Email của mình.' . '</p>
				</dd>
			</dl>
		</fieldset>
	';
}
else
{
$__compilerVar7 .= '
		<dl class="ctrlUnit">
			<dt>' . 'Email' . ':</dt>
			<dd>
				' . htmlspecialchars($visitor['email'], ENT_QUOTES, 'UTF-8') . '
				<p class="explain">' . 'Your email cannot be changed while your account does not have a password.' . ' <a href="' . XenForo_Template_Helper_Core::link('account/request-password', false, array()) . '" class="OverlayTrigger">' . 'Request a password be emailed to you' . '</a></p>
			</dd>
		</dl>
	';
}
$__compilerVar7 .= '
	
	';
$__output .= $this->callTemplateHook('account_contact_details_email_password', $__compilerVar7, array());
unset($__compilerVar7);
$__output .= '

	<h3 class="sectionHeader">' . 'Thiết lập tin nhắn' . '</h3>

	<dl class="ctrlUnit sectionLink">
		<dt></dt>
		<dd>
			<ul>
				';
$__compilerVar8 = '';
$__compilerVar8 .= '
				<li><label for="ctrl_receive_admin_email"><input type="checkbox" name="receive_admin_email" value="1" id="ctrl_receive_admin_email" ' . (($visitor['receive_admin_email']) ? ' checked="checked"' : '') . ' />
					' . 'Nhận thông báo từ diễn đàn' . '</label>
					<p class="hint">' . 'Bạn sẽ nhận được bản sao email gửi từ Ban Quản Trị đến tất cả thành viên diễn đàn.' . '</p>
				</li>
				<li><label for="ctrl_allow_send_personal_conversation_enable"><input type="checkbox" name="allow_send_personal_conversation_enable" value="1" id="ctrl_allow_send_personal_conversation_enable" class="Disabler OptOut" ' . (($visitor['allow_send_personal_conversation'] != ('none')) ? ' checked="checked"' : '') . ' />
					' . 'Chấp nhận đối thoại từ' . '...</label>
					<ul id="ctrl_allow_send_personal_conversation_enable_Disabler">
						<li>
							<select name="allow_send_personal_conversation" class="textCtrl autoSize" id="ctrl_allow_send_personal_conversation">
								
								<option value="members"  ' . (($visitor['allow_send_personal_conversation'] == ('members')) ? ' selected="selected"' : '') . '>' . 'Chỉ từ thành viên' . '</option>
								<option value="followed" ' . (($visitor['allow_send_personal_conversation'] == ('followed')) ? ' selected="selected"' : '') . '>' . 'Chỉ có thành viên bạn theo dõi' . '</option>
							</select>
						</li>
					</ul>
				</li>				
				<li>
					<label for="ctrl_email_on_conversation"><input type="checkbox" name="email_on_conversation" value="1" id="ctrl_email_on_conversation" ' . (($visitor['email_on_conversation']) ? ' checked="checked"' : '') . ' />
					' . 'Nhận email khi có tin nhắn đối thoại mới' . '</label>
					<p class="hint">' . 'Bạn sẽ nhận được thông báo nếu có đối thoại mới, trả lời vào đối thoại đã có, và được thêm vào đối thoại.' . '</p>
				</li>
				';
$__output .= $this->callTemplateHook('account_contact_details_messaging', $__compilerVar8, array());
unset($__compilerVar8);
$__output .= '
			</ul>
		</dd>
	</dl>
	
	';
if ($canEditProfile AND $customFields)
{
$__output .= '
	';
$__compilerVar9 = '';
$__compilerVar9 .= '
		<h3 class="sectionHeader">' . 'Danh tính' . '</h3>
		';
$__compilerVar10 = '';
foreach ($customFields AS $field)
{
$__compilerVar10 .= '
	';
if ($field['isEditable'])
{
$__compilerVar10 .= '
		';
$__compilerVar11 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar11 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar11 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar11 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar11 .= '
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar11 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar11 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar11 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar11 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar11 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar11 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar11 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar11 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar11 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar11 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar11 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar11 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar11 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar11 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar11 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar11 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar11 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar11 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar11 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar11 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar11 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar11 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar11 .= '
			</select>
		';
}
$__compilerVar11 .= '

		';
$__compilerVar12 = '';
$__compilerVar12 .= $field['description'];
if (trim($__compilerVar12) !== '')
{
$__compilerVar11 .= '<p class="explain">' . $__compilerVar12 . '</p>';
}
unset($__compilerVar12);
$__compilerVar11 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__compilerVar10 .= $__compilerVar11;
unset($__compilerVar11);
$__compilerVar10 .= '
	';
}
$__compilerVar10 .= '
';
}
$__compilerVar9 .= $__compilerVar10;
unset($__compilerVar10);
$__compilerVar9 .= '
	';
$__output .= $this->callTemplateHook('account_contact_details_identities', $__compilerVar9, array());
unset($__compilerVar9);
$__output .= '
	';
}
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Lưu thay đổi' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
