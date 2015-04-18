<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($tabNames)
{
$__output .= '
	<fieldset>
		<dl class="ctrlUnit">
			<dt><label for="ctrl_tab_name_id">' . 'Tab Name' . ':</label></dt>
			<dd>
				<select name="tab_name_id" class="textCtrl" id="ctrl_tab_name_id">
					';
foreach ($tabNames AS $tabNameId => $_tabName)
{
$__output .= '
						<option value="' . htmlspecialchars($tabNameId, ENT_QUOTES, 'UTF-8') . '"
							' . (($tabNameId == $content['tab_name_id']) ? ' selected="selected"' : '') . '>' . htmlspecialchars($_tabName['title'], ENT_QUOTES, 'UTF-8') . '</option>
					';
}
$__output .= '
				</select>
			</dd>
		</dl>
	</fieldset>
';
}
