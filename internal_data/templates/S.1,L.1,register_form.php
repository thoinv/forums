<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Sign up';
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
			<h3 class="errorHeading">' . 'Please correct the following errors' . ':</h3>
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
		<dt><label for="ctrl_username">' . 'Name' . ':</label></dt>
		<dd>
			<input type="text" name="username" value="" class="textCtrl" id="ctrl_username" autocomplete="off" />
			<p class="explain">' . 'Please leave this field blank.' . '</p>
		</dd>
	</dl>

	<dl class="ctrlUnit">
		<dt><label for="ctrl_' . htmlspecialchars($fieldMap['username'], ENT_QUOTES, 'UTF-8') . '">' . 'Name' . ':</label></dt>
		<dd>
			<input type="text" name="' . htmlspecialchars($fieldMap['username'], ENT_QUOTES, 'UTF-8') . '" value="' . htmlspecialchars($fields['username'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_' . htmlspecialchars($fieldMap['username'], ENT_QUOTES, 'UTF-8') . '" autofocus="true" autocomplete="off" />
			<p class="explain">' . 'This is the name that will be shown with your messages. You may use any name you wish. Once set, this cannot be changed.' . '</p>
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
			<dt><label for="ctrl_password">' . 'Password' . ':</label></dt>
			<dd>
				<input type="password" name="password" class="textCtrl OptOut" id="ctrl_password" autocomplete="off" />
				<p class="explain">' . 'Please leave this field blank.' . '</p>
			</dd>
		</dl>
		';
}
$__output .= '

		<dl class="ctrlUnit">
			<dt><label for="ctrl_' . htmlspecialchars($fieldMap['password'], ENT_QUOTES, 'UTF-8') . '">' . 'Password' . ':</label></dt>
			<dd><input type="password" name="' . htmlspecialchars($fieldMap['password'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl OptOut" id="ctrl_' . htmlspecialchars($fieldMap['password'], ENT_QUOTES, 'UTF-8') . '" autocomplete="off" /></dd>
		</dl>

		<dl class="ctrlUnit">
			<dt><label for="ctrl_' . htmlspecialchars($fieldMap['password_confirm'], ENT_QUOTES, 'UTF-8') . '">' . 'Confirm Password' . ':</label></dt>
			<dd>
				<input type="password" name="' . htmlspecialchars($fieldMap['password_confirm'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl OptOut" id="ctrl_' . htmlspecialchars($fieldMap['password_confirm'], ENT_QUOTES, 'UTF-8') . '" />
				<p class="explain">' . 'Enter your password in the first box and confirm it in the second.' . '</p>
			</dd>
		</dl>

		';
if (mt_rand(0, 2) == 1)
{
$__output .= '
		<dl class="ctrlUnit limited">
			<dt><label for="ctrl_' . htmlspecialchars($fieldMap['password_confirm_hp'], ENT_QUOTES, 'UTF-8') . '">' . 'Confirm Password' . ':</label></dt>
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
		<dt>' . 'Gender' . ':</dt>
		<dd>
			<ul>
				<li><label><input type="radio" name="' . htmlspecialchars($fieldMap['gender'], ENT_QUOTES, 'UTF-8') . '" value="male" ' . (($fields['gender'] == ('male')) ? ' checked="checked"' : '') . ' /> ' . 'Male' . '</label></li>
				<li><label><input type="radio" name="' . htmlspecialchars($fieldMap['gender'], ENT_QUOTES, 'UTF-8') . '" value="female" ' . (($fields['gender'] == ('female')) ? ' checked="checked"' : '') . ' /> ' . 'Female' . '</label></li>
				<li><label><input type="radio" name="' . htmlspecialchars($fieldMap['gender'], ENT_QUOTES, 'UTF-8') . '" value="" ' . ((!$fields['gender']) ? ' checked="checked"' : '') . ' /> (' . 'unspecified' . ')</label></li>
			</ul>
		</dd>
	</dl>

	';
$__compilerVar1 = '';
$__compilerVar1 .= '	<dl class="ctrlUnit OptOut">
		<dt>
			' . 'Date of Birth' . ':
			';
if ($dobRequired)
{
$__compilerVar1 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar1 .= '
		</dt>
		<dd>
			';
$__compilerVar2 = '';
$__compilerVar2 .= '<ul dir="ltr" id="helper_birthday">
<li><select name="dob_month" class="textCtrl autoSize">
	<option value="0" ' . (($fields['dob_month'] == 0) ? ' selected="selected"' : '') . '>&nbsp;</option>
	<option value="1" ' . (($fields['dob_month'] == 1) ? ' selected="selected"' : '') . '>' . 'January' . '</option>
	<option value="2" ' . (($fields['dob_month'] == 2) ? ' selected="selected"' : '') . '>' . 'February' . '</option>
	<option value="3" ' . (($fields['dob_month'] == 3) ? ' selected="selected"' : '') . '>' . 'March' . '</option>
	<option value="4" ' . (($fields['dob_month'] == 4) ? ' selected="selected"' : '') . '>' . 'April' . '</option>
	<option value="5" ' . (($fields['dob_month'] == 5) ? ' selected="selected"' : '') . '>' . 'May' . '</option>
	<option value="6" ' . (($fields['dob_month'] == 6) ? ' selected="selected"' : '') . '>' . 'June' . '</option>
	<option value="7" ' . (($fields['dob_month'] == 7) ? ' selected="selected"' : '') . '>' . 'July' . '</option>
	<option value="8" ' . (($fields['dob_month'] == 8) ? ' selected="selected"' : '') . '>' . 'August' . '</option>
	<option value="9" ' . (($fields['dob_month'] == 9) ? ' selected="selected"' : '') . '>' . 'September' . '</option>
	<option value="10" ' . (($fields['dob_month'] == 10) ? ' selected="selected"' : '') . '>' . 'October' . '</option>
	<option value="11" ' . (($fields['dob_month'] == 11) ? ' selected="selected"' : '') . '>' . 'November' . '</option>
	<option value="12" ' . (($fields['dob_month'] == 12) ? ' selected="selected"' : '') . '>' . 'December' . '</option>
</select></li>
<li><input type="text" name="dob_day" value="' . (($fields['dob_day']) ? (htmlspecialchars($fields['dob_day'], ENT_QUOTES, 'UTF-8')) : ('')) . '" class="textCtrl autoSize" placeholder="' . 'Day' . '" size="2" maxlength="2" /></li>
<li><input type="text" name="dob_year" value="' . (($fields['dob_year']) ? (htmlspecialchars($fields['dob_year'], ENT_QUOTES, 'UTF-8')) : ('')) . '" class="textCtrl autoSize" placeholder="' . 'Year' . '" size="4" maxlength="4" /></li>
</ul>';
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
$__compilerVar1 .= '
		</dd>
	</dl>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '

	';
if ($xenOptions['registrationSetup']['requireLocation'])
{
$__output .= '
		<dl class="ctrlUnit">
			<dt>
				' . 'Location' . ':
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
$__compilerVar3 = $fieldMap['custom_fields'];
$__compilerVar4 = $customFieldHoneyPot;
$__compilerVar5 = 'limited';
$__compilerVar6 = '';
if (!$__compilerVar3)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar6 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($__compilerVar4['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($__compilerVar4['required'])
{
$__compilerVar6 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar6 .= '
	</dt>
	<dd>
		';
if ($__compilerVar4['field_type'] == ('textbox'))
{
$__compilerVar6 .= '
			<input type="text" name="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($__compilerVar4['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($__compilerVar4['max_length']) ? (htmlspecialchars($__compilerVar4['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($__compilerVar4['field_type'] == ('textarea'))
{
$__compilerVar6 .= '
			<textarea name="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($__compilerVar4['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($__compilerVar4['field_type'] == ('bbcode'))
{
$__compilerVar6 .= '
			';
if ($__compilerVar4['editorTemplateHtml'])
{
$__compilerVar6 .= '
				' . $__compilerVar4['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar6 .= '
				<textarea name="custom_fields[' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($__compilerVar4['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar6 .= '
';
}
else if ($__compilerVar4['field_type'] == ('radio'))
{
$__compilerVar6 .= '
			<ul class="checkboxColumns">
			';
if (!$__compilerVar4['required'])
{
$__compilerVar6 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($__compilerVar4['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar6 .= '
			';
foreach ($__compilerVar4['fieldChoices'] AS $choice => $text)
{
$__compilerVar6 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar4['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar6 .= '
			</ul>
		';
}
else if ($__compilerVar4['field_type'] == ('select'))
{
$__compilerVar6 .= '
			<select name="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$__compilerVar4['required'] OR !$__compilerVar4['hasValue'])
{
$__compilerVar6 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar6 .= '
			';
foreach ($__compilerVar4['fieldChoices'] AS $choice => $text)
{
$__compilerVar6 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar4['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar6 .= '
			</select>
		';
}
else if ($__compilerVar4['field_type'] == ('checkbox'))
{
$__compilerVar6 .= '
			<ul class="checkboxColumns">
			';
foreach ($__compilerVar4['fieldChoices'] AS $choice => $text)
{
$__compilerVar6 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($__compilerVar4['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar6 .= '
			</ul>
		';
}
else if ($__compilerVar4['field_type'] == ('multiselect'))
{
$__compilerVar6 .= '
			<select name="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$__compilerVar4['required'] OR !$__compilerVar4['hasValue'])
{
$__compilerVar6 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar6 .= '
			';
foreach ($__compilerVar4['fieldChoices'] AS $choice => $text)
{
$__compilerVar6 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($__compilerVar4['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar6 .= '
			</select>
		';
}
$__compilerVar6 .= '

		';
$__compilerVar7 = '';
$__compilerVar7 .= $__compilerVar4['description'];
if (trim($__compilerVar7) !== '')
{
$__compilerVar6 .= '<p class="explain">' . $__compilerVar7 . '</p>';
}
unset($__compilerVar7);
$__compilerVar6 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($__compilerVar4['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__output .= $__compilerVar6;
unset($__compilerVar3, $__compilerVar4, $__compilerVar5, $__compilerVar6);
$__output .= '
	';
}
$__output .= '
	
	';
$__compilerVar8 = $fieldMap['custom_fields'];
$__compilerVar9 = '';
foreach ($customFields AS $field)
{
$__compilerVar9 .= '
	';
if ($field['isEditable'])
{
$__compilerVar9 .= '
		';
$__compilerVar10 = '';
if (!$__compilerVar8)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar10 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar10 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar10 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar10 .= '
			<input type="text" name="' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar10 .= '
			<textarea name="' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar10 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar10 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar10 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar10 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar10 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar10 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar10 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar10 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar10 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar10 .= '
			<select name="' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar10 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar10 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar10 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar10 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar10 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar10 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar10 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar10 .= '
			<select name="' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar10 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar10 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar10 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar10 .= '
			</select>
		';
}
$__compilerVar10 .= '

		';
$__compilerVar11 = '';
$__compilerVar11 .= $field['description'];
if (trim($__compilerVar11) !== '')
{
$__compilerVar10 .= '<p class="explain">' . $__compilerVar11 . '</p>';
}
unset($__compilerVar11);
$__compilerVar10 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__compilerVar9 .= $__compilerVar10;
unset($__compilerVar10);
$__compilerVar9 .= '
	';
}
$__compilerVar9 .= '
';
}
$__output .= $__compilerVar9;
unset($__compilerVar8, $__compilerVar9);
$__output .= '

	';
if ($customFieldHoneyPot && $honeyPotPosition == 2)
{
$__output .= '
	';
$__compilerVar12 = $fieldMap['custom_fields'];
$__compilerVar13 = $customFieldHoneyPot;
$__compilerVar14 = 'limited';
$__compilerVar15 = '';
if (!$__compilerVar12)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar15 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($__compilerVar14, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($__compilerVar13['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($__compilerVar13['required'])
{
$__compilerVar15 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar15 .= '
	</dt>
	<dd>
		';
if ($__compilerVar13['field_type'] == ('textbox'))
{
$__compilerVar15 .= '
			<input type="text" name="' . htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($__compilerVar13['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($__compilerVar13['max_length']) ? (htmlspecialchars($__compilerVar13['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($__compilerVar13['field_type'] == ('textarea'))
{
$__compilerVar15 .= '
			<textarea name="' . htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($__compilerVar13['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($__compilerVar13['field_type'] == ('bbcode'))
{
$__compilerVar15 .= '
			';
if ($__compilerVar13['editorTemplateHtml'])
{
$__compilerVar15 .= '
				' . $__compilerVar13['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar15 .= '
				<textarea name="custom_fields[' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($__compilerVar13['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar15 .= '
';
}
else if ($__compilerVar13['field_type'] == ('radio'))
{
$__compilerVar15 .= '
			<ul class="checkboxColumns">
			';
if (!$__compilerVar13['required'])
{
$__compilerVar15 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($__compilerVar13['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar15 .= '
			';
foreach ($__compilerVar13['fieldChoices'] AS $choice => $text)
{
$__compilerVar15 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar13['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar15 .= '
			</ul>
		';
}
else if ($__compilerVar13['field_type'] == ('select'))
{
$__compilerVar15 .= '
			<select name="' . htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$__compilerVar13['required'] OR !$__compilerVar13['hasValue'])
{
$__compilerVar15 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar15 .= '
			';
foreach ($__compilerVar13['fieldChoices'] AS $choice => $text)
{
$__compilerVar15 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar13['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar15 .= '
			</select>
		';
}
else if ($__compilerVar13['field_type'] == ('checkbox'))
{
$__compilerVar15 .= '
			<ul class="checkboxColumns">
			';
foreach ($__compilerVar13['fieldChoices'] AS $choice => $text)
{
$__compilerVar15 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($__compilerVar13['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar15 .= '
			</ul>
		';
}
else if ($__compilerVar13['field_type'] == ('multiselect'))
{
$__compilerVar15 .= '
			<select name="' . htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$__compilerVar13['required'] OR !$__compilerVar13['hasValue'])
{
$__compilerVar15 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar15 .= '
			';
foreach ($__compilerVar13['fieldChoices'] AS $choice => $text)
{
$__compilerVar15 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($__compilerVar13['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar15 .= '
			</select>
		';
}
$__compilerVar15 .= '

		';
$__compilerVar16 = '';
$__compilerVar16 .= $__compilerVar13['description'];
if (trim($__compilerVar16) !== '')
{
$__compilerVar15 .= '<p class="explain">' . $__compilerVar16 . '</p>';
}
unset($__compilerVar16);
$__compilerVar15 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($__compilerVar13['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__output .= $__compilerVar15;
unset($__compilerVar12, $__compilerVar13, $__compilerVar14, $__compilerVar15);
$__output .= '
	';
}
$__output .= '

	<dl class="ctrlUnit" style="display: none">
		<dt><label for="ctrl_' . htmlspecialchars($fieldMap['timezone'], ENT_QUOTES, 'UTF-8') . '">' . 'Time Zone' . ':</label></dt>
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
$__compilerVar17 = '';
$__compilerVar17 .= '
				';
$__compilerVar18 = '';
if ($captcha)
{
$__compilerVar18 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Verification' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__compilerVar17 .= $__compilerVar18;
unset($__compilerVar18);
$__compilerVar17 .= '
			';
if (trim($__compilerVar17) !== '')
{
$__output .= '
		<fieldset>
			' . $__compilerVar17 . '
		</fieldset>
	';
}
unset($__compilerVar17);
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
						<div class="text">' . '<label>' . '<input type="checkbox" name="agree" value="1" id="ctrl_agree" class="Disabler" />' . ' I agree to the</label> <a ' . 'href="' . htmlspecialchars($tosUrl, ENT_QUOTES, 'UTF-8') . '" target="_blank"' . '>terms and rules</a>.' . '</div>
						<ul id="ctrl_agree_Disabler">
							<li><input type="submit" value="' . 'Sign up' . '" accesskey="s" class="button primary" id="SubmitButton" /> ' . $timerHtml . '</li>
						</ul>						
					</li>
				</ul>
			';
}
else
{
$__output .= '
				<input type="submit" value="' . 'Sign up' . '" accesskey="s" class="button primary" id="SubmitButton" /> ' . $timerHtml . '
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
