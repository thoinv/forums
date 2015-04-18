<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Personal Details';
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
$__compilerVar1 = '';
$__compilerVar1 .= '
	';
if ($canUpdateStatus)
{
$__compilerVar1 .= '
		<dl class="ctrlUnit">
			<dt><label for="ctrl_status">' . 'Status Message' . ':</label></dt>
			<dd>
				<textarea name="status" rows="2" cols="60" id="ctrl_status" autofocus="autofocus" class="textCtrl StatusEditor UserTagger Elastic OptOut" data-statusEditorCounter="#statusEditorCounter"></textarea>
				<span id="statusEditorCounter" title="' . 'Characters remaining' . '"></span>
				<div class="explain"><h3 class="statusHeader">' . 'Current Status' . ':</h3> <span class="CurrentStatus">';
if ($visitor['status'])
{
$__compilerVar1 .= XenForo_Template_Helper_Core::callHelper('bodytext', array(
'0' => $visitor['status']
));
}
else
{
$__compilerVar1 .= '(' . 'None' . ')';
}
$__compilerVar1 .= '</span><!--TODO: clearing--></div>
			</dd>
		</dl>
	';
}
$__compilerVar1 .= '
	';
$__output .= $this->callTemplateHook('account_personal_details_status', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '

	';
$__compilerVar2 = '';
$__compilerVar2 .= '
				';
if ($canEditAvatar)
{
$__compilerVar2 .= '
					<dl class="ctrlUnit avatarEditor">
						<dt><label>' . 'Avatar' . ':</label></dt>
						<dd>
							' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,false,array(
'user' => '$visitor',
'size' => 'm',
'class' => 'OverlayTrigger',
'href' => XenForo_Template_Helper_Core::link('account/avatar', false, array())
),'')) . '
							<p class="explain">' . 'Click the image to change your avatar.' . '</p>
						</dd>
					</dl>
				';
}
$__compilerVar2 .= '
				
				';
if ($canEditCustomTitle)
{
$__compilerVar2 .= '
					<dl class="ctrlUnit">
						<dt><label for="ctrl_custom_title">' . 'Custom Title' . ':</label></dt>
						<dd>
							<input type="text" name="custom_title" value="' . htmlspecialchars($visitor['custom_title'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_custom_title" class="textCtrl" />
							<p class="explain">' . 'If specified, this will replace the title that displays under your name in your posts.' . '</p>
						</dd>
					</dl>
				';
}
$__compilerVar2 .= '
			';
if (trim($__compilerVar2) !== '')
{
$__output .= '
		<fieldset>
			' . $__compilerVar2 . '
		</fieldset>
	';
}
unset($__compilerVar2);
$__output .= '

	';
$__compilerVar3 = '';
$__compilerVar3 .= '
	<fieldset>
		<dl class="ctrlUnit">
			<dt><label>' . 'Gender' . ':</label></dt>
			<dd>
				<ul>
					<li><label for="ctrl_gender_male"><input type="radio" name="gender" value="male" id="ctrl_gender_male" ' . (($visitor['gender'] == ('male')) ? ' checked="checked"' : '') . ' /> ' . 'Male' . '</label></li>
					<li><label for="ctrl_gender_female"><input type="radio" name="gender" value="female" id="ctrl_gender_female" ' . (($visitor['gender'] == ('female')) ? ' checked="checked"' : '') . '  /> ' . 'Female' . '</label></li>
					<li><label for="ctrl_gender_"><input type="radio" name="gender" value="" id="ctrl_gender_" ' . (($visitor['gender'] == ('')) ? ' checked="checked"' : '') . '  /> (' . 'unspecified' . ')</label></li>
				</ul>
			</dd>
		</dl>

		<dl class="ctrlUnit OptOut">
			<dt>' . 'Date of Birth' . ':</dt>
			<dd>
				';
if ($visitor['dob_day'] && $visitor['dob_month'] && $visitor['dob_year'])
{
$__compilerVar3 .= '
					' . XenForo_Template_Helper_Core::date($birthday['timeStamp'], $birthday['format']) . '
					<p class="explain">' . 'Once your birthday has been entered, it cannot be changed. Please contact an administrator if it is incorrect.' . '</p>
				';
}
else
{
$__compilerVar3 .= '
					';
$__compilerVar4 = '';
$__compilerVar4 .= '<ul dir="ltr" id="helper_birthday">
<li><select name="dob_month" class="textCtrl autoSize">
	<option value="0" ' . (($visitor['dob_month'] == 0) ? ' selected="selected"' : '') . '>&nbsp;</option>
	<option value="1" ' . (($visitor['dob_month'] == 1) ? ' selected="selected"' : '') . '>' . 'January' . '</option>
	<option value="2" ' . (($visitor['dob_month'] == 2) ? ' selected="selected"' : '') . '>' . 'February' . '</option>
	<option value="3" ' . (($visitor['dob_month'] == 3) ? ' selected="selected"' : '') . '>' . 'March' . '</option>
	<option value="4" ' . (($visitor['dob_month'] == 4) ? ' selected="selected"' : '') . '>' . 'April' . '</option>
	<option value="5" ' . (($visitor['dob_month'] == 5) ? ' selected="selected"' : '') . '>' . 'May' . '</option>
	<option value="6" ' . (($visitor['dob_month'] == 6) ? ' selected="selected"' : '') . '>' . 'June' . '</option>
	<option value="7" ' . (($visitor['dob_month'] == 7) ? ' selected="selected"' : '') . '>' . 'July' . '</option>
	<option value="8" ' . (($visitor['dob_month'] == 8) ? ' selected="selected"' : '') . '>' . 'August' . '</option>
	<option value="9" ' . (($visitor['dob_month'] == 9) ? ' selected="selected"' : '') . '>' . 'September' . '</option>
	<option value="10" ' . (($visitor['dob_month'] == 10) ? ' selected="selected"' : '') . '>' . 'October' . '</option>
	<option value="11" ' . (($visitor['dob_month'] == 11) ? ' selected="selected"' : '') . '>' . 'November' . '</option>
	<option value="12" ' . (($visitor['dob_month'] == 12) ? ' selected="selected"' : '') . '>' . 'December' . '</option>
</select></li>
<li><input type="text" name="dob_day" value="' . (($visitor['dob_day']) ? (htmlspecialchars($visitor['dob_day'], ENT_QUOTES, 'UTF-8')) : ('')) . '" class="textCtrl autoSize" placeholder="' . 'Day' . '" size="2" maxlength="2" /></li>
<li><input type="text" name="dob_year" value="' . (($visitor['dob_year']) ? (htmlspecialchars($visitor['dob_year'], ENT_QUOTES, 'UTF-8')) : ('')) . '" class="textCtrl autoSize" placeholder="' . 'Year' . '" size="4" maxlength="4" /></li>
</ul>';
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
$__compilerVar3 .= '
				';
}
$__compilerVar3 .= '
			</dd>
		</dl>

		';
$__compilerVar5 = '';
if ($isPrivacySettings)
{
$__compilerVar5 .= '<h3 class="sectionHeader">' . 'Date of Birth Privacy' . '</h3>';
}
$__compilerVar5 .= '
<dl class="ctrlUnit' . ((!$isPrivacySettings) ? (' sectionLink') : ('')) . '">
	';
if ($isPrivacySettings)
{
$__compilerVar5 .= '
		<dt></dt>
	';
}
else
{
$__compilerVar5 .= '
		<dt><a href="' . XenForo_Template_Helper_Core::link('account/privacy', false, array()) . '">' . 'Edit Your Privacy Settings' . '</a></dt>
	';
}
$__compilerVar5 .= '
	<dd>
		<ul>
			<li>
				<label for="ctrl_show_dob_date"><input type="checkbox" name="show_dob_date" value="1" id="ctrl_show_dob_date" class="Disabler" ' . (($visitor['show_dob_date']) ? ' checked="checked"' : '') . ' /> ' . 'Show day and month of birth' . '</label>
				<ul id="ctrl_show_dob_date_Disabler">
					<li><label for="ctrl_show_dob_year"><input type="checkbox" name="show_dob_year" value="1" id="ctrl_show_dob_year" ' . (($visitor['show_dob_year']) ? ' checked="checked"' : '') . ' /> ' . 'Show year of birth' . '</label> <p class="hint">' . 'This will allow people to see your age.' . '</p></li>
				</ul>
			</li>
		</ul>
	</dd>
</dl>';
$__compilerVar3 .= $__compilerVar5;
unset($__compilerVar5);
$__compilerVar3 .= '
	</fieldset>
	';
$__output .= $this->callTemplateHook('account_personal_details_biometrics', $__compilerVar3, array());
unset($__compilerVar3);
$__output .= '

	';
$__compilerVar6 = '';
$__compilerVar6 .= '
	<fieldset>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_location">' . 'Location' . ':</label></dt>
			<dd><input type="text" name="location" value="' . htmlspecialchars($visitor['location'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_location" class="textCtrl OptOut" /></dd>
		</dl>

		<dl class="ctrlUnit">
			<dt><label for="ctrl_occupation">' . 'Occupation' . ':</label></dt>
			<dd><input type="text" name="occupation" value="' . htmlspecialchars($visitor['occupation'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_occupation" class="textCtrl OptOut" /></dd>
		</dl>

		<dl class="ctrlUnit">
			<dt><label for="ctrl_homepage">' . 'Home Page' . ':</label></dt>
			<dd><input type="url" name="homepage" value="' . htmlspecialchars($visitor['homepage'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_homepage" class="textCtrl" /></dd>
		</dl>
		
		';
$__compilerVar7 = '';
foreach ($customFields AS $field)
{
$__compilerVar7 .= '
	';
if ($field['isEditable'])
{
$__compilerVar7 .= '
		';
$__compilerVar8 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar8 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar8 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar8 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar8 .= '
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar8 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar8 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar8 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar8 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar8 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar8 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar8 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar8 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar8 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar8 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar8 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar8 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar8 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar8 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar8 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar8 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar8 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar8 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar8 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar8 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar8 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar8 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar8 .= '
			</select>
		';
}
$__compilerVar8 .= '

		';
$__compilerVar9 = '';
$__compilerVar9 .= $field['description'];
if (trim($__compilerVar9) !== '')
{
$__compilerVar8 .= '<p class="explain">' . $__compilerVar9 . '</p>';
}
unset($__compilerVar9);
$__compilerVar8 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__compilerVar7 .= $__compilerVar8;
unset($__compilerVar8);
$__compilerVar7 .= '
	';
}
$__compilerVar7 .= '
';
}
$__compilerVar6 .= $__compilerVar7;
unset($__compilerVar7);
$__compilerVar6 .= '
	</fieldset>
	';
$__output .= $this->callTemplateHook('account_personal_details_information', $__compilerVar6, array());
unset($__compilerVar6);
$__output .= '

	';
$__compilerVar10 = '';
$__compilerVar10 .= '
	<dl class="ctrlUnit OptOut">
		<dt><label for="ctrl_about">' . 'About You' . ':</label> <dfn>' . 'You may use BB code' . '</dfn></dt>
		<dd>' . $aboutEditor . '</dd>
	</dl>
	';
$__output .= $this->callTemplateHook('account_personal_details_about', $__compilerVar10, array());
unset($__compilerVar10);
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Save Changes' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
