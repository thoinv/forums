<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($prefixes OR $forcePrefixes)
{
$__output .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/title_prefix.js');
$__output .= '
	';
$this->addRequiredExternal('css', 'title_prefix_edit');
$__output .= '
	
	<dl class="ctrlUnit" id="PrefixContainer_' . htmlspecialchars($idSuffix, ENT_QUOTES, 'UTF-8') . '">
		<dt><label for="ctrl_prefix_id_' . htmlspecialchars($idSuffix, ENT_QUOTES, 'UTF-8') . '">' . 'Prefix' . ':</label></dt>
		<dd>
			<select name="prefix_id" id="ctrl_prefix_id_' . htmlspecialchars($idSuffix, ENT_QUOTES, 'UTF-8') . '" class="textCtrl TitlePrefix"
				data-container="#PrefixContainer_' . htmlspecialchars($idSuffix, ENT_QUOTES, 'UTF-8') . '"
				data-textbox="#ctrl_title_' . htmlspecialchars($idSuffix, ENT_QUOTES, 'UTF-8') . '"
				' . (($nodeControl) ? ('data-nodecontrol="' . htmlspecialchars($nodeControl, ENT_QUOTES, 'UTF-8') . '" data-prefixurl="' . XenForo_Template_Helper_Core::link('forums/-/prefixes', false, array()) . '"') : ('')) . '>
				';
$__compilerVar1 = '';
$__compilerVar1 .= '<option value="0" data-css="prefix noPrefix" ' . (($selectedPrefix == 0) ? ' selected="selected"' : '') . '>(' . 'No prefix' . ')</option>
';
foreach ($prefixes AS $prefixGroup)
{
$__compilerVar1 .= '
	';
if ($prefixGroup['title'])
{
$__compilerVar1 .= '
		<optgroup label="' . htmlspecialchars($prefixGroup['title'], ENT_QUOTES, 'UTF-8') . '">
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar1 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($selectedPrefix == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar1 .= '
		</optgroup>
	';
}
else
{
$__compilerVar1 .= '
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar1 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($selectedPrefix == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar1 .= '
	';
}
$__compilerVar1 .= '
';
}
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
			</select>
		</dd>
	</dl>
	
';
}
