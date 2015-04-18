<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Chi tiết cá nhân';
$__output .= '

';
$this->addRequiredExternal('css', 'account');
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenforo/personal_details_editor.js');
$__output .= '

' . '
' . '

<form method="post" class="xenForm personalDetailsForm AutoValidator"
	action="' . XenForo_Template_Helper_Core::link('account/personal-details-save', false, array()) . '"
	data-fieldValidatorUrl="' . XenForo_Template_Helper_Core::link('account/validate-field.json', false, array()) . '">

	';
$__compilerVar11 = '';
$__compilerVar11 .= '
	';
if ($canUpdateStatus)
{
$__compilerVar11 .= '
		<dl class="ctrlUnit">
			<dt><label for="ctrl_status">' . 'Dòng trạng thái' . ':</label></dt>
			<dd>
				<textarea name="status" rows="2" cols="60" id="ctrl_status" autofocus="autofocus" class="textCtrl StatusEditor UserTagger Elastic OptOut" data-statusEditorCounter="#statusEditorCounter"></textarea>
				<span id="statusEditorCounter" title="' . 'Số ký tự còn lại' . '"></span>
				<div class="explain"><h3 class="statusHeader">' . 'Trạng thái hiện tại' . ':</h3> <span class="CurrentStatus">';
if ($visitor['status'])
{
$__compilerVar11 .= XenForo_Template_Helper_Core::callHelper('bodytext', array(
'0' => $visitor['status']
));
}
else
{
$__compilerVar11 .= '(' . 'Không có' . ')';
}
$__compilerVar11 .= '</span><!--TODO: clearing--></div>
			</dd>
		</dl>
	';
}
$__compilerVar11 .= '
	';
$__output .= $this->callTemplateHook('account_personal_details_status', $__compilerVar11, array());
unset($__compilerVar11);
$__output .= '

	';
$__compilerVar12 = '';
$__compilerVar12 .= '
				';
if ($canEditAvatar)
{
$__compilerVar12 .= '
					<dl class="ctrlUnit avatarEditor">
						<dt><label>' . 'Avatar' . ':</label></dt>
						<dd>
							' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,false,array(
'user' => '$visitor',
'size' => 'm',
'class' => 'OverlayTrigger',
'href' => XenForo_Template_Helper_Core::link('account/avatar', false, array())
),'')) . '
							<p class="explain">' . 'Click vào ảnh để thay đổi Avatar của bạn' . '</p>
						</dd>
					</dl>
				';
}
$__compilerVar12 .= '
				
				';
if ($canEditCustomTitle)
{
$__compilerVar12 .= '
					<dl class="ctrlUnit">
						<dt><label for="ctrl_custom_title">' . 'Tiêu đề riêng' . ':</label></dt>
						<dd>
							<input type="text" name="custom_title" value="' . htmlspecialchars($visitor['custom_title'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_custom_title" class="textCtrl" />
							<p class="explain">' . 'Nếu được đặt, nó sẽ thay thế tiêu đề hiển thị bên dưới tên trong bài viết của bạn.' . '</p>
						</dd>
					</dl>
				';
}
$__compilerVar12 .= '
			';
if (trim($__compilerVar12) !== '')
{
$__output .= '
		<fieldset>
			' . $__compilerVar12 . '
		</fieldset>
	';
}
unset($__compilerVar12);
$__output .= '

	';
$__compilerVar13 = '';
$__compilerVar13 .= '
	<fieldset>
		<dl class="ctrlUnit">
			<dt><label>' . 'Giới tính' . ':</label></dt>
			<dd>
				<ul>
					<li><label for="ctrl_gender_male"><input type="radio" name="gender" value="male" id="ctrl_gender_male" ' . (($visitor['gender'] == ('male')) ? ' checked="checked"' : '') . ' /> ' . 'Nam' . '</label></li>
					<li><label for="ctrl_gender_female"><input type="radio" name="gender" value="female" id="ctrl_gender_female" ' . (($visitor['gender'] == ('female')) ? ' checked="checked"' : '') . '  /> ' . 'Nữ' . '</label></li>
					<li><label for="ctrl_gender_"><input type="radio" name="gender" value="" id="ctrl_gender_" ' . (($visitor['gender'] == ('')) ? ' checked="checked"' : '') . '  /> (' . 'Không xác định' . ')</label></li>
				</ul>
			</dd>
		</dl>

		<dl class="ctrlUnit OptOut">
			<dt>' . 'Sinh ngày' . ':</dt>
			<dd>
				';
if ($visitor['dob_day'] && $visitor['dob_month'] && $visitor['dob_year'])
{
$__compilerVar13 .= '
					' . XenForo_Template_Helper_Core::date($birthday['timeStamp'], $birthday['format']) . '
					<p class="explain">' . 'Một khi ngày sinh của bạn đã nhập vào thì không thể thay đổi. Hãy liên hệ với Ban Quản Trị nếu không đúng hoặc muốn sửa lại.' . '</p>
				';
}
else
{
$__compilerVar13 .= '
					';
$__compilerVar14 = '';
$__compilerVar14 .= '<ul dir="ltr" id="helper_birthday">
<li><select name="dob_month" class="textCtrl autoSize">
	<option value="0" ' . (($visitor['dob_month'] == 0) ? ' selected="selected"' : '') . '>&nbsp;</option>
	<option value="1" ' . (($visitor['dob_month'] == 1) ? ' selected="selected"' : '') . '>' . 'Tháng một' . '</option>
	<option value="2" ' . (($visitor['dob_month'] == 2) ? ' selected="selected"' : '') . '>' . 'Tháng hai' . '</option>
	<option value="3" ' . (($visitor['dob_month'] == 3) ? ' selected="selected"' : '') . '>' . 'Tháng ba' . '</option>
	<option value="4" ' . (($visitor['dob_month'] == 4) ? ' selected="selected"' : '') . '>' . 'Tháng tư' . '</option>
	<option value="5" ' . (($visitor['dob_month'] == 5) ? ' selected="selected"' : '') . '>' . 'Tháng năm' . '</option>
	<option value="6" ' . (($visitor['dob_month'] == 6) ? ' selected="selected"' : '') . '>' . 'Tháng sáu' . '</option>
	<option value="7" ' . (($visitor['dob_month'] == 7) ? ' selected="selected"' : '') . '>' . 'Tháng bảy' . '</option>
	<option value="8" ' . (($visitor['dob_month'] == 8) ? ' selected="selected"' : '') . '>' . 'Tháng tám' . '</option>
	<option value="9" ' . (($visitor['dob_month'] == 9) ? ' selected="selected"' : '') . '>' . 'Tháng chín' . '</option>
	<option value="10" ' . (($visitor['dob_month'] == 10) ? ' selected="selected"' : '') . '>' . 'Tháng mười' . '</option>
	<option value="11" ' . (($visitor['dob_month'] == 11) ? ' selected="selected"' : '') . '>' . 'Tháng mười một' . '</option>
	<option value="12" ' . (($visitor['dob_month'] == 12) ? ' selected="selected"' : '') . '>' . 'Tháng mười hai' . '</option>
</select></li>
<li><input type="text" name="dob_day" value="' . (($visitor['dob_day']) ? (htmlspecialchars($visitor['dob_day'], ENT_QUOTES, 'UTF-8')) : ('')) . '" class="textCtrl autoSize" placeholder="' . 'Ngày' . '" size="2" maxlength="2" /></li>
<li><input type="text" name="dob_year" value="' . (($visitor['dob_year']) ? (htmlspecialchars($visitor['dob_year'], ENT_QUOTES, 'UTF-8')) : ('')) . '" class="textCtrl autoSize" placeholder="' . 'Năm' . '" size="4" maxlength="4" /></li>
</ul>';
$__compilerVar13 .= $__compilerVar14;
unset($__compilerVar14);
$__compilerVar13 .= '
				';
}
$__compilerVar13 .= '
			</dd>
		</dl>

		';
$__compilerVar15 = '';
if ($isPrivacySettings)
{
$__compilerVar15 .= '<h3 class="sectionHeader">' . 'Bảo mật ngày sinh' . '</h3>';
}
$__compilerVar15 .= '
<dl class="ctrlUnit' . ((!$isPrivacySettings) ? (' sectionLink') : ('')) . '">
	';
if ($isPrivacySettings)
{
$__compilerVar15 .= '
		<dt></dt>
	';
}
else
{
$__compilerVar15 .= '
		<dt><a href="' . XenForo_Template_Helper_Core::link('account/privacy', false, array()) . '">' . 'Sửa cài đặt bảo mật cá nhân của bạn' . '</a></dt>
	';
}
$__compilerVar15 .= '
	<dd>
		<ul>
			<li>
				<label for="ctrl_show_dob_date"><input type="checkbox" name="show_dob_date" value="1" id="ctrl_show_dob_date" class="Disabler" ' . (($visitor['show_dob_date']) ? ' checked="checked"' : '') . ' /> ' . 'Hiển thị ngày và tháng sinh' . '</label>
				<ul id="ctrl_show_dob_date_Disabler">
					<li><label for="ctrl_show_dob_year"><input type="checkbox" name="show_dob_year" value="1" id="ctrl_show_dob_year" ' . (($visitor['show_dob_year']) ? ' checked="checked"' : '') . ' /> ' . 'Hiển thị năm sinh' . '</label> <p class="hint">' . 'Điều này sẽ cho phép mọi người nhìn thấy tuổi của bạn.' . '</p></li>
				</ul>
			</li>
		</ul>
	</dd>
</dl>';
$__compilerVar13 .= $__compilerVar15;
unset($__compilerVar15);
$__compilerVar13 .= '
	</fieldset>
	';
$__output .= $this->callTemplateHook('account_personal_details_biometrics', $__compilerVar13, array());
unset($__compilerVar13);
$__output .= '

	';
$__compilerVar16 = '';
$__compilerVar16 .= '
	<fieldset>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_location">' . 'Nơi ở' . ':</label></dt>
			<dd><input type="text" name="location" value="' . htmlspecialchars($visitor['location'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_location" class="textCtrl OptOut" /></dd>
		</dl>

		<dl class="ctrlUnit">
			<dt><label for="ctrl_occupation">' . 'Nghề nghiệp' . ':</label></dt>
			<dd><input type="text" name="occupation" value="' . htmlspecialchars($visitor['occupation'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_occupation" class="textCtrl OptOut" /></dd>
		</dl>

		<dl class="ctrlUnit">
			<dt><label for="ctrl_homepage">' . 'Web' . ':</label></dt>
			<dd><input type="url" name="homepage" value="' . htmlspecialchars($visitor['homepage'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_homepage" class="textCtrl" /></dd>
		</dl>
		
		';
$__compilerVar17 = '';
foreach ($customFields AS $field)
{
$__compilerVar17 .= '
	';
if ($field['isEditable'])
{
$__compilerVar17 .= '
		';
$__compilerVar18 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar18 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar18 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar18 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar18 .= '
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar18 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar18 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar18 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar18 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar18 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar18 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar18 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar18 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar18 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar18 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar18 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar18 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar18 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar18 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar18 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar18 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar18 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar18 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar18 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar18 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar18 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar18 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar18 .= '
			</select>
		';
}
$__compilerVar18 .= '

		';
$__compilerVar19 = '';
$__compilerVar19 .= $field['description'];
if (trim($__compilerVar19) !== '')
{
$__compilerVar18 .= '<p class="explain">' . $__compilerVar19 . '</p>';
}
unset($__compilerVar19);
$__compilerVar18 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__compilerVar17 .= $__compilerVar18;
unset($__compilerVar18);
$__compilerVar17 .= '
	';
}
$__compilerVar17 .= '
';
}
$__compilerVar16 .= $__compilerVar17;
unset($__compilerVar17);
$__compilerVar16 .= '
	</fieldset>
	';
$__output .= $this->callTemplateHook('account_personal_details_information', $__compilerVar16, array());
unset($__compilerVar16);
$__output .= '

	';
$__compilerVar20 = '';
$__compilerVar20 .= '
	<dl class="ctrlUnit OptOut">
		<dt><label for="ctrl_about">' . 'Giới thiệu về bạn' . ':</label> <dfn>' . 'Bạn có thể sử dụng BB code' . '</dfn></dt>
		<dd>' . $aboutEditor . '</dd>
	</dl>
	';
$__output .= $this->callTemplateHook('account_personal_details_about', $__compilerVar20, array());
unset($__compilerVar20);
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Lưu thay đổi' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
