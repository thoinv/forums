<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Đăng ký';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('register/register', false, array()) . '" method="post" class="xenForm AutoValidator"
	data-fieldValidatorUrl="' . XenForo_Template_Helper_Core::link('register/validate-field', false, array()) . '"
	data-normalSubmit="1"
>
	';
if ($errors)
{
$__output .= '
		<div class="errorPanel">
			<h3 class="errorHeading">' . 'Có lỗi sảy ra như sau:' . ':</h3>
			<div class="baseHtml errors">
				<ol>
				';
foreach ($errors AS $error)
{
$__output .= '
					<li>' . $error . '</li>
				';
}
$__output .= '
				</ol>
			</div>
		</div>
	';
}
$__output .= '

	<dl class="ctrlUnit limited">
		<dt><label for="ctrl_username">' . 'Tên' . ':</label></dt>
		<dd>
			<input type="text" name="username" value="" class="textCtrl" id="ctrl_username" autocomplete="off" />
			<p class="explain">' . 'Please leave this field blank.' . '</p>
		</dd>
	</dl>

	<dl class="ctrlUnit">
		<dt><label for="ctrl_' . htmlspecialchars($fieldMap['username'], ENT_QUOTES, 'UTF-8') . '">' . 'Tên' . ':</label></dt>
		<dd>
			<input type="text" name="' . htmlspecialchars($fieldMap['username'], ENT_QUOTES, 'UTF-8') . '" value="' . htmlspecialchars($fields['username'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_' . htmlspecialchars($fieldMap['username'], ENT_QUOTES, 'UTF-8') . '" autofocus="true" autocomplete="off" />
			<p class="explain">' . 'Đây là tên hiển thị ở mỗi bài viết của bạn. Bạn có thể dùng bất cứ tên nào mình muốn. Một khi đã đặt thì không thể đổi.' . '</p>
		</dd>
	</dl>

	';
if (mt_rand(0, 2) == 1)
{
$__output .= '
	<dl class="ctrlUnit limited">
		<dt><label for="ctrl_' . htmlspecialchars($fieldMap['email_hp'], ENT_QUOTES, 'UTF-8') . '">' . 'Email' . ':</label></dt>
		<dd>
			<input type="email" name="' . htmlspecialchars($fieldMap['email_hp'], ENT_QUOTES, 'UTF-8') . '" value="" dir="ltr" class="textCtrl" autocomplete="off" id="ctrl_' . htmlspecialchars($fieldMap['email_hp'], ENT_QUOTES, 'UTF-8') . '" />
			<p class="explain">' . 'Please leave this field blank.' . '</p>
		</dd>
	</dl>
	';
}
$__output .= '

	<dl class="ctrlUnit">
		<dt><label for="ctrl_' . htmlspecialchars($fieldMap['email'], ENT_QUOTES, 'UTF-8') . '">' . 'Email' . ':</label></dt>
		<dd>
			<input type="email" name="' . htmlspecialchars($fieldMap['email'], ENT_QUOTES, 'UTF-8') . '" value="' . htmlspecialchars($fields['email'], ENT_QUOTES, 'UTF-8') . '" dir="ltr" class="textCtrl" id="ctrl_' . htmlspecialchars($fieldMap['email'], ENT_QUOTES, 'UTF-8') . '" />
		</dd>
	</dl>

	<fieldset>
		';
if (mt_rand(0, 2) == 1)
{
$__output .= '
		<dl class="ctrlUnit limited">
			<dt><label for="ctrl_password">' . 'Mật khẩu' . ':</label></dt>
			<dd>
				<input type="password" name="password" class="textCtrl OptOut" id="ctrl_password" autocomplete="off" />
				<p class="explain">' . 'Please leave this field blank.' . '</p>
			</dd>
		</dl>
		';
}
$__output .= '

		<dl class="ctrlUnit">
			<dt><label for="ctrl_' . htmlspecialchars($fieldMap['password'], ENT_QUOTES, 'UTF-8') . '">' . 'Mật khẩu' . ':</label></dt>
			<dd><input type="password" name="' . htmlspecialchars($fieldMap['password'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl OptOut" id="ctrl_' . htmlspecialchars($fieldMap['password'], ENT_QUOTES, 'UTF-8') . '" autocomplete="off" /></dd>
		</dl>

		<dl class="ctrlUnit">
			<dt><label for="ctrl_' . htmlspecialchars($fieldMap['password_confirm'], ENT_QUOTES, 'UTF-8') . '">' . 'Nhập lại mật khẩu' . ':</label></dt>
			<dd>
				<input type="password" name="' . htmlspecialchars($fieldMap['password_confirm'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl OptOut" id="ctrl_' . htmlspecialchars($fieldMap['password_confirm'], ENT_QUOTES, 'UTF-8') . '" />
				<p class="explain">' . 'Xin mời nhập mật khẩu ở cả hai ô.' . '</p>
			</dd>
		</dl>

		';
if (mt_rand(0, 2) == 1)
{
$__output .= '
		<dl class="ctrlUnit limited">
			<dt><label for="ctrl_' . htmlspecialchars($fieldMap['password_confirm_hp'], ENT_QUOTES, 'UTF-8') . '">' . 'Nhập lại mật khẩu' . ':</label></dt>
			<dd>
				<input type="password" name="' . htmlspecialchars($fieldMap['password_confirm_hp'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl OptOut" id="ctrl_' . htmlspecialchars($fieldMap['password_confirm_hp'], ENT_QUOTES, 'UTF-8') . '" />
				<p class="explain">' . 'Please leave this field blank.' . '</p>
			</dd>
		</dl>
		';
}
$__output .= '
	</fieldset>
		
	<dl class="ctrlUnit">
		<dt>' . 'Giới tính' . ':</dt>
		<dd>
			<ul>
				<li><label><input type="radio" name="' . htmlspecialchars($fieldMap['gender'], ENT_QUOTES, 'UTF-8') . '" value="male" ' . (($fields['gender'] == ('male')) ? ' checked="checked"' : '') . ' /> ' . 'Nam' . '</label></li>
				<li><label><input type="radio" name="' . htmlspecialchars($fieldMap['gender'], ENT_QUOTES, 'UTF-8') . '" value="female" ' . (($fields['gender'] == ('female')) ? ' checked="checked"' : '') . ' /> ' . 'Nữ' . '</label></li>
				<li><label><input type="radio" name="' . htmlspecialchars($fieldMap['gender'], ENT_QUOTES, 'UTF-8') . '" value="" ' . ((!$fields['gender']) ? ' checked="checked"' : '') . ' /> (' . 'Không xác định' . ')</label></li>
			</ul>
		</dd>
	</dl>

	';
$__compilerVar19 = '';
$__compilerVar19 .= '	<dl class="ctrlUnit OptOut">
		<dt>
			' . 'Sinh ngày' . ':
			';
if ($dobRequired)
{
$__compilerVar19 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar19 .= '
		</dt>
		<dd>
			';
$__compilerVar20 = '';
$__compilerVar20 .= '<ul dir="ltr" id="helper_birthday">
<li><select name="dob_month" class="textCtrl autoSize">
	<option value="0" ' . (($fields['dob_month'] == 0) ? ' selected="selected"' : '') . '>&nbsp;</option>
	<option value="1" ' . (($fields['dob_month'] == 1) ? ' selected="selected"' : '') . '>' . 'Tháng một' . '</option>
	<option value="2" ' . (($fields['dob_month'] == 2) ? ' selected="selected"' : '') . '>' . 'Tháng hai' . '</option>
	<option value="3" ' . (($fields['dob_month'] == 3) ? ' selected="selected"' : '') . '>' . 'Tháng ba' . '</option>
	<option value="4" ' . (($fields['dob_month'] == 4) ? ' selected="selected"' : '') . '>' . 'Tháng tư' . '</option>
	<option value="5" ' . (($fields['dob_month'] == 5) ? ' selected="selected"' : '') . '>' . 'Tháng năm' . '</option>
	<option value="6" ' . (($fields['dob_month'] == 6) ? ' selected="selected"' : '') . '>' . 'Tháng sáu' . '</option>
	<option value="7" ' . (($fields['dob_month'] == 7) ? ' selected="selected"' : '') . '>' . 'Tháng bảy' . '</option>
	<option value="8" ' . (($fields['dob_month'] == 8) ? ' selected="selected"' : '') . '>' . 'Tháng tám' . '</option>
	<option value="9" ' . (($fields['dob_month'] == 9) ? ' selected="selected"' : '') . '>' . 'Tháng chín' . '</option>
	<option value="10" ' . (($fields['dob_month'] == 10) ? ' selected="selected"' : '') . '>' . 'Tháng mười' . '</option>
	<option value="11" ' . (($fields['dob_month'] == 11) ? ' selected="selected"' : '') . '>' . 'Tháng mười một' . '</option>
	<option value="12" ' . (($fields['dob_month'] == 12) ? ' selected="selected"' : '') . '>' . 'Tháng mười hai' . '</option>
</select></li>
<li><input type="text" name="dob_day" value="' . (($fields['dob_day']) ? (htmlspecialchars($fields['dob_day'], ENT_QUOTES, 'UTF-8')) : ('')) . '" class="textCtrl autoSize" placeholder="' . 'Ngày' . '" size="2" maxlength="2" /></li>
<li><input type="text" name="dob_year" value="' . (($fields['dob_year']) ? (htmlspecialchars($fields['dob_year'], ENT_QUOTES, 'UTF-8')) : ('')) . '" class="textCtrl autoSize" placeholder="' . 'Năm' . '" size="4" maxlength="4" /></li>
</ul>';
$__compilerVar19 .= $__compilerVar20;
unset($__compilerVar20);
$__compilerVar19 .= '
		</dd>
	</dl>';
$__output .= $__compilerVar19;
unset($__compilerVar19);
$__output .= '

	';
if ($xenOptions['registrationSetup']['requireLocation'])
{
$__output .= '
		<dl class="ctrlUnit">
			<dt>
				' . 'Nơi ở' . ':
				<dfn>' . 'Required' . '</dfn>
			</dt>
			<dd>
				<input type="text" name="location" value="' . htmlspecialchars($fields['location'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" />
			</dd>
		</dl>
	';
}
$__output .= '
	
	';
$honeyPotPosition = XenForo_Template_Helper_Core::callHelper('rand', array(
'0' => '0',
'1' => '2'
));
$__output .= '
	';
if ($customFieldHoneyPot && $honeyPotPosition == 1)
{
$__output .= '
	';
$__compilerVar21 = $fieldMap['custom_fields'];
$__compilerVar22 = $customFieldHoneyPot;
$__compilerVar23 = 'limited';
$__compilerVar24 = '';
if (!$__compilerVar21)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar24 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($__compilerVar23, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($__compilerVar22['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($__compilerVar22['required'])
{
$__compilerVar24 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar24 .= '
	</dt>
	<dd>
		';
if ($__compilerVar22['field_type'] == ('textbox'))
{
$__compilerVar24 .= '
			<input type="text" name="' . htmlspecialchars($__compilerVar21, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($__compilerVar22['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($__compilerVar22['max_length']) ? (htmlspecialchars($__compilerVar22['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($__compilerVar22['field_type'] == ('textarea'))
{
$__compilerVar24 .= '
			<textarea name="' . htmlspecialchars($__compilerVar21, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($__compilerVar22['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($__compilerVar22['field_type'] == ('bbcode'))
{
$__compilerVar24 .= '
			';
if ($__compilerVar22['editorTemplateHtml'])
{
$__compilerVar24 .= '
				' . $__compilerVar22['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar24 .= '
				<textarea name="custom_fields[' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($__compilerVar22['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar24 .= '
';
}
else if ($__compilerVar22['field_type'] == ('radio'))
{
$__compilerVar24 .= '
			<ul class="checkboxColumns">
			';
if (!$__compilerVar22['required'])
{
$__compilerVar24 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($__compilerVar21, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($__compilerVar22['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar24 .= '
			';
foreach ($__compilerVar22['fieldChoices'] AS $choice => $text)
{
$__compilerVar24 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($__compilerVar21, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar22['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar24 .= '
			</ul>
		';
}
else if ($__compilerVar22['field_type'] == ('select'))
{
$__compilerVar24 .= '
			<select name="' . htmlspecialchars($__compilerVar21, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$__compilerVar22['required'] OR !$__compilerVar22['hasValue'])
{
$__compilerVar24 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar24 .= '
			';
foreach ($__compilerVar22['fieldChoices'] AS $choice => $text)
{
$__compilerVar24 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar22['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar24 .= '
			</select>
		';
}
else if ($__compilerVar22['field_type'] == ('checkbox'))
{
$__compilerVar24 .= '
			<ul class="checkboxColumns">
			';
foreach ($__compilerVar22['fieldChoices'] AS $choice => $text)
{
$__compilerVar24 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($__compilerVar21, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($__compilerVar22['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar24 .= '
			</ul>
		';
}
else if ($__compilerVar22['field_type'] == ('multiselect'))
{
$__compilerVar24 .= '
			<select name="' . htmlspecialchars($__compilerVar21, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$__compilerVar22['required'] OR !$__compilerVar22['hasValue'])
{
$__compilerVar24 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar24 .= '
			';
foreach ($__compilerVar22['fieldChoices'] AS $choice => $text)
{
$__compilerVar24 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($__compilerVar22['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar24 .= '
			</select>
		';
}
$__compilerVar24 .= '

		';
$__compilerVar25 = '';
$__compilerVar25 .= $__compilerVar22['description'];
if (trim($__compilerVar25) !== '')
{
$__compilerVar24 .= '<p class="explain">' . $__compilerVar25 . '</p>';
}
unset($__compilerVar25);
$__compilerVar24 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($__compilerVar22['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__output .= $__compilerVar24;
unset($__compilerVar21, $__compilerVar22, $__compilerVar23, $__compilerVar24);
$__output .= '
	';
}
$__output .= '
	
	';
$__compilerVar26 = $fieldMap['custom_fields'];
$__compilerVar27 = '';
foreach ($customFields AS $field)
{
$__compilerVar27 .= '
	';
if ($field['isEditable'])
{
$__compilerVar27 .= '
		';
$__compilerVar28 = '';
if (!$__compilerVar26)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar28 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar28 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar28 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar28 .= '
			<input type="text" name="' . htmlspecialchars($__compilerVar26, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar28 .= '
			<textarea name="' . htmlspecialchars($__compilerVar26, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar28 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar28 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar28 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar28 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar28 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar28 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($__compilerVar26, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar28 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar28 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($__compilerVar26, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar28 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar28 .= '
			<select name="' . htmlspecialchars($__compilerVar26, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar28 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar28 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar28 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar28 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar28 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar28 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($__compilerVar26, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar28 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar28 .= '
			<select name="' . htmlspecialchars($__compilerVar26, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar28 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar28 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar28 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar28 .= '
			</select>
		';
}
$__compilerVar28 .= '

		';
$__compilerVar29 = '';
$__compilerVar29 .= $field['description'];
if (trim($__compilerVar29) !== '')
{
$__compilerVar28 .= '<p class="explain">' . $__compilerVar29 . '</p>';
}
unset($__compilerVar29);
$__compilerVar28 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__compilerVar27 .= $__compilerVar28;
unset($__compilerVar28);
$__compilerVar27 .= '
	';
}
$__compilerVar27 .= '
';
}
$__output .= $__compilerVar27;
unset($__compilerVar26, $__compilerVar27);
$__output .= '

	';
if ($customFieldHoneyPot && $honeyPotPosition == 2)
{
$__output .= '
	';
$__compilerVar30 = $fieldMap['custom_fields'];
$__compilerVar31 = $customFieldHoneyPot;
$__compilerVar32 = 'limited';
$__compilerVar33 = '';
if (!$__compilerVar30)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar33 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($__compilerVar32, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($__compilerVar31['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($__compilerVar31['required'])
{
$__compilerVar33 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar33 .= '
	</dt>
	<dd>
		';
if ($__compilerVar31['field_type'] == ('textbox'))
{
$__compilerVar33 .= '
			<input type="text" name="' . htmlspecialchars($__compilerVar30, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($__compilerVar31['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($__compilerVar31['max_length']) ? (htmlspecialchars($__compilerVar31['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($__compilerVar31['field_type'] == ('textarea'))
{
$__compilerVar33 .= '
			<textarea name="' . htmlspecialchars($__compilerVar30, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($__compilerVar31['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($__compilerVar31['field_type'] == ('bbcode'))
{
$__compilerVar33 .= '
			';
if ($__compilerVar31['editorTemplateHtml'])
{
$__compilerVar33 .= '
				' . $__compilerVar31['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar33 .= '
				<textarea name="custom_fields[' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($__compilerVar31['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar33 .= '
';
}
else if ($__compilerVar31['field_type'] == ('radio'))
{
$__compilerVar33 .= '
			<ul class="checkboxColumns">
			';
if (!$__compilerVar31['required'])
{
$__compilerVar33 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($__compilerVar30, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($__compilerVar31['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar33 .= '
			';
foreach ($__compilerVar31['fieldChoices'] AS $choice => $text)
{
$__compilerVar33 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($__compilerVar30, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar31['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar33 .= '
			</ul>
		';
}
else if ($__compilerVar31['field_type'] == ('select'))
{
$__compilerVar33 .= '
			<select name="' . htmlspecialchars($__compilerVar30, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$__compilerVar31['required'] OR !$__compilerVar31['hasValue'])
{
$__compilerVar33 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar33 .= '
			';
foreach ($__compilerVar31['fieldChoices'] AS $choice => $text)
{
$__compilerVar33 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar31['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar33 .= '
			</select>
		';
}
else if ($__compilerVar31['field_type'] == ('checkbox'))
{
$__compilerVar33 .= '
			<ul class="checkboxColumns">
			';
foreach ($__compilerVar31['fieldChoices'] AS $choice => $text)
{
$__compilerVar33 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($__compilerVar30, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($__compilerVar31['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar33 .= '
			</ul>
		';
}
else if ($__compilerVar31['field_type'] == ('multiselect'))
{
$__compilerVar33 .= '
			<select name="' . htmlspecialchars($__compilerVar30, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$__compilerVar31['required'] OR !$__compilerVar31['hasValue'])
{
$__compilerVar33 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar33 .= '
			';
foreach ($__compilerVar31['fieldChoices'] AS $choice => $text)
{
$__compilerVar33 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($__compilerVar31['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar33 .= '
			</select>
		';
}
$__compilerVar33 .= '

		';
$__compilerVar34 = '';
$__compilerVar34 .= $__compilerVar31['description'];
if (trim($__compilerVar34) !== '')
{
$__compilerVar33 .= '<p class="explain">' . $__compilerVar34 . '</p>';
}
unset($__compilerVar34);
$__compilerVar33 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($__compilerVar31['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__output .= $__compilerVar33;
unset($__compilerVar30, $__compilerVar31, $__compilerVar32, $__compilerVar33);
$__output .= '
	';
}
$__output .= '

	<dl class="ctrlUnit" style="display: none">
		<dt><label for="ctrl_' . htmlspecialchars($fieldMap['timezone'], ENT_QUOTES, 'UTF-8') . '">' . 'Múi giờ' . ':</label></dt>
		<dd>
			<select name="' . htmlspecialchars($fieldMap['timezone'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl ' . (($fields['timezoneAuto']) ? ('AutoTimeZone') : ('')) . ' OptOut" id="ctrl_' . htmlspecialchars($fieldMap['timezone'], ENT_QUOTES, 'UTF-8') . '">
				';
foreach ($timeZones AS $identifier => $name)
{
$__output .= '
					<option value="' . htmlspecialchars($identifier, ENT_QUOTES, 'UTF-8') . '" ' . (($identifier == $fields['timezone']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '</option>
				';
}
$__output .= '
			</select>
		</dd>
	</dl>

	';
$__compilerVar35 = '';
$__compilerVar35 .= '
				';
$__compilerVar36 = '';
if ($captcha)
{
$__compilerVar36 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Mã xác nhận' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__compilerVar35 .= $__compilerVar36;
unset($__compilerVar36);
$__compilerVar35 .= '
			';
if (trim($__compilerVar35) !== '')
{
$__output .= '
		<fieldset>
			' . $__compilerVar35 . '
		</fieldset>
	';
}
unset($__compilerVar35);
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			';
$timerHtml = '';
if ($xenOptions['registrationTimer'])
{
$timerHtml .= '
				<span id="RegTimer">(' . 'Please wait ' . '<span>' . htmlspecialchars($xenOptions['registrationTimer'], ENT_QUOTES, 'UTF-8') . '</span>' . ' seconds.' . ')</span>
			';
}
$__output .= '
			';
if ($tosUrl)
{
$__output .= '
				<ul>
					<li>
						<div class="text">' . '<label>' . '<input type="checkbox" name="agree" value="1" id="ctrl_agree" class="Disabler" />' . ' Tôi đồng ý với</label> <a ' . 'href="' . htmlspecialchars($tosUrl, ENT_QUOTES, 'UTF-8') . '" target="_blank"' . '>Quy định và Nội quy diễn đàn</a>.' . '</div>
						<ul id="ctrl_agree_Disabler">
							<li><input type="submit" value="' . 'Đăng ký' . '" accesskey="s" class="button primary" id="SubmitButton" /> ' . $timerHtml . '</li>
						</ul>						
					</li>
				</ul>
			';
}
else
{
$__output .= '
				<input type="submit" value="' . 'Đăng ký' . '" accesskey="s" class="button primary" id="SubmitButton" /> ' . $timerHtml . '
			';
}
$__output .= '
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="reg_key" value="' . htmlspecialchars($regKey, ENT_QUOTES, 'UTF-8') . '" />
</form>

';
if ($xenOptions['registrationTimer'])
{
$__output .= '
	<script>
	(function($) {
		$(function() {
			var rt = $(\'#RegTimer\'), s = rt.find(\'span\'), t = parseInt(s.text(), 10),
				sub = $(\'#SubmitButton\'),
				i = setInterval(function() {
					t--;
					if (t <= 0) {
						rt.hide();
						clearInterval(i);
					} else {
						s.text(t);
					}
				}, 1000);

				var f = function(e) {
					if (t > 0) {
						e.preventDefault();
					}
				};

				sub.click(f);
				sub.closest(\'form\').submit(f);
		});
	})(jQuery);
	</script>
';
}
