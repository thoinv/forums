<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<dl class="ctrlUnit">
	<dt>
		<label for="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($field['title'], ENT_QUOTES, 'UTF-8') . ':</label>
		';
if ($field['required'])
{
$__output .= '<dfn>' . 'Required' . '</dfn>';
}
$__output .= '
	</dt>
	<dd>
		';
if ($field['field_type'] == ('textbox'))
{
$__output .= '
			<input type="text" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				class="textCtrl" maxlength="' . (($field['max_length']) ? (htmlspecialchars($field['max_length'], ENT_QUOTES, 'UTF-8')) : ('')) . '" 
			/>
		';
}
else if ($field['field_type'] == ('textarea'))
{
$__output .= '
			<textarea name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" 
				id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '"
				data-validatorname="custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" 
				class="textCtrl Elastic">' . htmlspecialchars($field['field_value'], ENT_QUOTES, 'UTF-8') . '</textarea>
		';
}
else if ($field['field_type'] == ('radio'))
{
$__output .= '
			<ul class="checkboxColumns">
			';
if (!$field['required'])
{
$__output .= '
				<li><label><input autocomplete="off" type="radio" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="" ' . (($field['field_value'] == ('')) ? ' checked="checked"' : '') . ' /> <span class="muted">' . 'No selection' . '</span></label></li>
			';
}
$__output .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__output .= '
				<li><label><input autocomplete="off" type="radio" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__output .= '
			</ul>
		';
}
else if ($field['field_type'] == ('select'))
{
$__output .= '
			<select name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . ']" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" autocomplete="off" >
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__output .= '
				<option value="">&nbsp;</option>
			';
}
$__output .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__output .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . (($field['field_value'] == $choice) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__output .= '
			</select>
		';
}
else if ($field['field_type'] == ('checkbox'))
{
$__output .= '
			<ul class="checkboxColumns">
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__output .= '
				<li><label><input autocomplete="off" type="checkbox" name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' checked="checked"' : '') . ' /> ' . $text . '</label></li>
			';
}
$__output .= '
			</ul>
		';
}
else if ($field['field_type'] == ('multiselect'))
{
$__output .= '
			<select name="custom_fields[' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '][]" id="ctrl_custom_field_' . htmlspecialchars($field['field_id'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" size="7" multiple="multiple" autocomplete="off" >
			';
if (!$field['required'] OR !$field['hasValue'])
{
$__output .= '
				<option value="">&nbsp;</option>
			';
}
$__output .= '
			';
foreach ($field['fieldChoices'] AS $choice => $text)
{
$__output .= '
				<option value="' . htmlspecialchars($choice, ENT_QUOTES, 'UTF-8') . '" ' . ((isset($field['field_value'][$choice])) ? ' selected="selected"' : '') . '>' . $text . '</option>
			';
}
$__output .= '
			</select>
		';
}
$__output .= '

		';
$__compilerVar1 = '';
$__compilerVar1 .= $field['description'];
if (trim($__compilerVar1) !== '')
{
$__output .= '<p class="explain">' . $__compilerVar1 . '</p>';
}
unset($__compilerVar1);
$__output .= '
	</dd>
</dl>';
