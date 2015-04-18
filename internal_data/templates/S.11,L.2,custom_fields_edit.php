<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
foreach ($customFields AS $field)
{
$__output .= '
	';
if ($field['isEditable'])
{
$__output .= '
		';
$__compilerVar3 = '';
if (!$customFieldInputName)
{
$customFieldInputName = 'custom_fields';
}
$__compilerVar3 .= '
<dl class="ctrlUnit customFieldEdit' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($customFieldExtraClass, ENT_QUOTES, 'UTF-8') . '">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar3 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar3 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar3 .= '
			<input type="text" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar3 .= '
			<textarea name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('bbcode'))
{
$__compilerVar3 .= '
			';
if ($field['editorTemplateHtml'])
{
$__compilerVar3 .= '
				' . $field['editorTemplateHtml'] . '
			';
}
else
{
$__compilerVar3 .= '
				<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
					id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
					data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
					class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
			';
}
$__compilerVar3 .= '
';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar3 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar3 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar3 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar3 .= '
				<li><label><input type="radio" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar3 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar3 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar3 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar3 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar3 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar3 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar3 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar3 .= '
				<li><label><input type="checkbox" name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar3 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar3 .= '
			<select name="' . htmlspecialchars($customFieldInputName, ENT_QUOTES, 'UTF-8') . '[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple">
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar3 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar3 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar3 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar3 .= '
			</select>
		';
}
$__compilerVar3 .= '

		';
$__compilerVar4 = '';
$__compilerVar4 .= $field['description'];
if (trim($__compilerVar4) !== '')
{
$__compilerVar3 .= '<p class="explain">' . $__compilerVar4 . '</p>';
}
unset($__compilerVar4);
$__compilerVar3 .= '
		<input type="hidden" name="custom_fields_shown[]" value="' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>';
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '
	';
}
$__output .= '
';
}
