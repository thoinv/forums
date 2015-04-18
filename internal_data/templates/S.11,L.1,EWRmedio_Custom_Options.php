<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($custom['type'] == ('textbox'))
{
$__output .= '
	<dl class="ctrlUnit">
		<dt><label for="' . htmlspecialchars($ctrl, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</label></dt>
		<dd><input type="text" name="' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '[]" class="textCtrl" id="' . htmlspecialchars($ctrl, ENT_QUOTES, 'UTF-8') . '" value="' . htmlspecialchars($custom['value'], ENT_QUOTES, 'UTF-8') . '" /></dd>
	</dl>
';
}
else if ($custom['type'] == ('spinbox'))
{
$__output .= '
	<dl class="ctrlUnit">
		<dt><label for="' . htmlspecialchars($ctrl, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</label></dt>
		<dd><input type="text" size="1" name="' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '[]" value="' . htmlspecialchars($custom['value'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl autoSize SpinBox"
			id="' . htmlspecialchars($ctrl, ENT_QUOTES, 'UTF-8') . '" step="' . htmlspecialchars($custom['params']['step'], ENT_QUOTES, 'UTF-8') . '" min="' . htmlspecialchars($custom['params']['min'], ENT_QUOTES, 'UTF-8') . '" max="' . htmlspecialchars($custom['params']['max'], ENT_QUOTES, 'UTF-8') . '" /></dd>
	</dl>
';
}
else if ($custom['type'] == ('onoff'))
{
$__output .= '
	<dl class="ctrlUnit">
		<dt></dt>
		<dd><label for="' . htmlspecialchars($ctrl, ENT_QUOTES, 'UTF-8') . '"><input type="checkbox" name="' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '[]" value="1" id="' . htmlspecialchars($ctrl, ENT_QUOTES, 'UTF-8') . '"
			' . (($custom['value']) ? ' checked="checked"' : '') . ' /> ' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . '</label></dd>
	</dl>
';
}
else if ($custom['type'] == ('radio'))
{
$__output .= '
	<dl class="ctrlUnit">
		<dt>' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</dt>
		<dd><label for="ctrl_unspecified"><input type="radio" name="' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '[]" value="" id="ctrl_unspecified" /> (' . 'unspecified' . ')</label><br />
			';
foreach ($custom['params'] AS $radio)
{
$__output .= '
				<label for="ctrl_' . htmlspecialchars($radio['id'], ENT_QUOTES, 'UTF-8') . '"><input type="radio" name="' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '[]" value="' . htmlspecialchars($radio['id'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_' . htmlspecialchars($radio['id'], ENT_QUOTES, 'UTF-8') . '"
					' . (($radio['id'] == $custom['value']) ? ' checked="checked"' : '') . ' /> ' . htmlspecialchars($radio['val'], ENT_QUOTES, 'UTF-8') . '</label><br />
			';
}
$__output .= '</dd>
	</dl>
';
}
else if ($custom['type'] == ('select'))
{
$__output .= '
	<dl class="ctrlUnit">
		<dt><label for="' . htmlspecialchars($ctrl, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</label></dt>
		<dd><select name="' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '[]" id="' . htmlspecialchars($ctrl, ENT_QUOTES, 'UTF-8') . '" class="textCtrl autoSize">
			<option value="">(' . 'unspecified' . ')</option>' . htmlspecialchars($custom['value'], ENT_QUOTES, 'UTF-8') . '
			';
foreach ($custom['params'] AS $select)
{
$__output .= '
				<option value="' . htmlspecialchars($select['id'], ENT_QUOTES, 'UTF-8') . '" ' . (($custom['value'] == $select['id']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($select['val'], ENT_QUOTES, 'UTF-8') . '</option>
			';
}
$__output .= '
		</select></dd>
	</dl>
';
}
else if ($custom['type'] == ('checkbox'))
{
$__output .= '
	<dl class="ctrlUnit">
		<dt>' . htmlspecialchars($custom['name'], ENT_QUOTES, 'UTF-8') . ':</dt>
		<dd>';
foreach ($custom['params'] AS $check)
{
$__output .= '
			<label for="ctrl_' . htmlspecialchars($check['id'], ENT_QUOTES, 'UTF-8') . '"><input type="checkbox" name="' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '[]" value="' . htmlspecialchars($check['id'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_' . htmlspecialchars($check['id'], ENT_QUOTES, 'UTF-8') . '"
				' . (($check['checked']) ? ' checked="checked"' : '') . ' /> ' . htmlspecialchars($check['val'], ENT_QUOTES, 'UTF-8') . '</label><br />
		';
}
$__output .= '</dd>
	</dl>
';
}
