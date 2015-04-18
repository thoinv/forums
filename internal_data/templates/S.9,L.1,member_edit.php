<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Edit Member';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Edit Member';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:members', $user, array()), 'value' => htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('members/edit', $user, array()) . '" method="post" class="xenForm">

	';
if ($user['avatar_date'] OR $user['gravatar'])
{
$__output .= '
		<dl class="ctrlUnit">
			<dt>' . 'Avatar' . ':</dt>
			<dd>
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($user,(true),array(
'size' => 's',
'user' => '$user',
'img' => 'true'
),'')) . '
				<div><label><input type="checkbox" name="remove_avatar" value="1" /> ' . 'Delete current avatar' . '</label></div>
			</dd>
		</dl>
	';
}
$__output .= '

	';
if ($userCanSetCustomTitle OR $user['custom_title'])
{
$__output .= '
		<dl class="ctrlUnit">
			<dt>' . 'Custom Title' . ':</dt>
			<dd><input type="text" name="custom_title" value="' . htmlspecialchars($user['custom_title'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" /></dd>
		</dl>
	';
}
$__output .= '

	';
if ($userCanEditProfile OR $user['location'])
{
$__output .= '
		<dl class="ctrlUnit">
			<dt>' . 'Location' . ':</dt>
			<dd><input type="text" name="location" value="' . htmlspecialchars($user['location'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" /></dd>
		</dl>
	';
}
$__output .= '

	';
if ($userCanEditProfile OR $user['occupation'])
{
$__output .= '
		<dl class="ctrlUnit">
			<dt>' . 'Occupation' . ':</dt>
			<dd><input type="text" name="occupation" value="' . htmlspecialchars($user['occupation'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" /></dd>
		</dl>
	';
}
$__output .= '

	';
if ($userCanEditProfile OR $user['homepage'])
{
$__output .= '
		<dl class="ctrlUnit">
			<dt>' . 'Home Page' . ':</dt>
			<dd><input type="url" name="homepage" value="' . htmlspecialchars($user['homepage'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" /></dd>
		</dl>
	';
}
$__output .= '

	';
if ($userCanEditProfile OR $user['about'])
{
$__output .= '
		<dl class="ctrlUnit">
			<dt>' . 'About' . ':</dt>
			<dd>' . $aboutEditor . '</dd>
		</dl>
	';
}
$__output .= '

	';
if ($userCanEditSignature OR $user['signature'])
{
$__output .= '
		<dl class="ctrlUnit">
			<dt>' . 'Signature' . ':</dt>
			<dd>' . $signatureEditor . '</dd>
		</dl>
	';
}
$__output .= '
	
	';
if ($customFields)
{
$__output .= '
		<fieldset>
			';
$__compilerVar1 = '';
foreach ($customFields AS $field)
{
$__compilerVar1 .= '
	';
if ($field['isEditable'])
{
$__compilerVar1 .= '
		';
$__compilerVar2 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar2 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar2 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar2 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar2 .= '
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar2 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar2 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar2 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar2 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar2 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar2 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar2 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar2 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar2 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar2 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar2 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar2 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar2 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar2 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar2 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar2 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar2 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar2 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar2 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar2 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar2 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar2 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar2 .= '
			</select>
		';
}
$__compilerVar2 .= '

		';
$__compilerVar3 = '';
$__compilerVar3 .= $field['description'];
if (trim($__compilerVar3) !== '')
{
$__compilerVar2 .= '<p class="explain">' . $__compilerVar3 . '</p>';
}
unset($__compilerVar3);
$__compilerVar2 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
$__compilerVar1 .= '
	';
}
$__compilerVar1 .= '
';
}
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
		</fieldset>
	';
}
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Save Changes' . '" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
