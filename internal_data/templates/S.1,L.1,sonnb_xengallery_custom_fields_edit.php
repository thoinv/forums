<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
foreach ($fields AS $field)
{
$__output .= '
	';
$__compilerVar1 = '';
$__compilerVar1 .= '<dl class="ctrlUnit">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__compilerVar1 .= '<dfn>' . 'Required' . '</dfn>';
}
$__compilerVar1 .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__compilerVar1 .= '
			<input type="text" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__compilerVar1 .= '
			<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('radio'))
{
$__compilerVar1 .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__compilerVar1 .= '
				<li><label><input autocomplete="off" type="radio" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__compilerVar1 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar1 .= '
				<li><label><input autocomplete="off" type="radio" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar1 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__compilerVar1 .= '
			<select name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" autocomplete="off" >
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar1 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar1 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar1 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar1 .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__compilerVar1 .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar1 .= '
				<li><label><input autocomplete="off" type="checkbox" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__compilerVar1 .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__compilerVar1 .= '
			<select name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple" autocomplete="off" >
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__compilerVar1 .= '
				<option value="">&nbsp;</option>
			';
}
$__compilerVar1 .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__compilerVar1 .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__compilerVar1 .= '
			</select>
		';
}
$__compilerVar1 .= '

		';
$__compilerVar2 = '';
$__compilerVar2 .= $field['description'];
if (trim($__compilerVar2) !== '')
{
$__compilerVar1 .= '<p class="explain">' . $__compilerVar2 . '</p>';
}
unset($__compilerVar2);
$__compilerVar1 .= '
	</dd>
</dl>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
';
}
