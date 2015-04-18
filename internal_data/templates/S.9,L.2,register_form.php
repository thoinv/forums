<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Đăng ký';
$__output .= '




<form action="' . XenForo_Template_Helper_Core::link('register/register', false, array()) . '" method="post" class="xenForm AutoValidator formOverlay" data-fieldvalidatorurl="' . XenForo_Template_Helper_Core::link('register/validate-field', false, array()) . '" data-normalsubmit="1">


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

	<dl class="ctrlUnit">
		<dt><label for="ctrl_username">' . 'Tên' . ':</label></dt>
		<dd>
			<input type="text" name="username" value="' . htmlspecialchars($fields['username'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_username" autofocus="true" autocomplete="off" />
			<p class="explain">' . 'Đây là tên hiển thị ở mỗi bài viết của bạn. Bạn có thể dùng bất cứ tên nào mình muốn. Một khi đã đặt thì không thể đổi.' . '</p>
		</dd>
	</dl>

	<dl class="ctrlUnit">
		<dt><label for="ctrl_email">' . 'Email' . ':</label></dt>
		<dd><input type="email" name="email" value="' . htmlspecialchars($fields['email'], ENT_QUOTES, 'UTF-8') . '" dir="ltr" class="textCtrl" id="ctrl_email" /></dd>
	</dl>

	<fieldset>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_password">' . 'Mật khẩu' . ':</label></dt>
			<dd><input type="password" name="password" class="textCtrl OptOut" id="ctrl_password" autocomplete="off" /></dd>
		</dl>

		<dl class="ctrlUnit">
			<dt><label for="ctrl_confirm_password">' . 'Nhập lại mật khẩu' . ':</label></dt>
			<dd>
				<input type="password" name="password_confirm" class="textCtrl OptOut" id="ctrl_confirm_password" />
				<p class="explain">' . 'Xin mời nhập mật khẩu ở cả hai ô.' . '</p>
			</dd>
		</dl>
	</fieldset>
	
	<dl class="ctrlUnit OptOut">
		<dt>' . 'Sinh ngày' . ':</dt>
		<dd>
			';
$__compilerVar7 = '';
$__compilerVar7 .= '<ul dir="ltr" id="helper_birthday">
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
$__output .= $__compilerVar7;
unset($__compilerVar7);
$__output .= '
			';
if ($dobRequired)
{
$__output .= '<p class="explain">' . 'Ngày sinh của bạn là bắt buộc.' . '</p>';
}
$__output .= '
		</dd>
	</dl>
	
	<dl class="ctrlUnit">
		<dt>' . 'Giới tính' . ':</dt>
		<dd>
			<ul>
				<li><label for="ctrl_gender_male"><input type="radio" name="gender" value="male" id="ctrl_gender_male" ' . (($fields['gender'] == ('male')) ? ' checked="checked"' : '') . ' /> ' . 'Nam' . '</label></li>
				<li><label for="ctrl_gender_female"><input type="radio" name="gender" value="female" id="ctrl_gender_female" ' . (($fields['gender'] == ('female')) ? ' checked="checked"' : '') . ' /> ' . 'Nữ' . '</label></li>
				<li><label for="ctrl_gender_"><input type="radio" name="gender" value="" id="ctrl_gender_" ' . ((!$fields['gender']) ? ' checked="checked"' : '') . ' /> (' . 'Không xác định' . ')</label></li>
			</ul>
		</dd>
	</dl>
	
	';
$__compilerVar8 = '';
foreach ($customFields AS $field)
{
$__compilerVar8 .= '
	';
if ($field['isEditable'])
{
$__compilerVar8 .= '
		';
$__compilerVar9 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar9 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar9 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar9 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar9 .= '
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar9 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar9 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar9 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar9 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar9 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar9 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar9 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar9 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar9 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar9 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar9 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar9 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar9 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar9 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar9 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar9 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar9 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar9 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar9 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar9 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar9 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar9 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar9 .= '
			</select>
		';
}
$__compilerVar9 .= '

		';
$__compilerVar10 = '';
$__compilerVar10 .= $field['description'];
if (trim($__compilerVar10) !== '')
{
$__compilerVar9 .= '<p class="explain">' . $__compilerVar10 . '</p>';
}
unset($__compilerVar10);
$__compilerVar9 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__compilerVar8 .= $__compilerVar9;
unset($__compilerVar9);
$__compilerVar8 .= '
	';
}
$__compilerVar8 .= '
';
}
$__output .= $__compilerVar8;
unset($__compilerVar8);
$__output .= '

	<dl class="ctrlUnit">
		<dt><label for="ctrl_timezone">' . 'Múi giờ' . ':</label></dt>
		<dd>
			<select name="timezone" class="textCtrl ' . (($fields['timezoneAuto']) ? ('AutoTimeZone') : ('')) . ' OptOut" id="ctrl_timezone">
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
$__compilerVar11 = '';
$__compilerVar11 .= '
				';
$__compilerVar12 = '';
if ($captcha)
{
$__compilerVar12 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Mã xác nhận' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__compilerVar11 .= $__compilerVar12;
unset($__compilerVar12);
$__compilerVar11 .= '
			';
if (trim($__compilerVar11) !== '')
{
$__output .= '
		<fieldset>
			' . $__compilerVar11 . '
		</fieldset>
	';
}
unset($__compilerVar11);
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
