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
		<dt><label for="ctrl_prefix_id_' . htmlspecialchars($idSuffix, ENT_QUOTES, 'UTF-8') . '">' . 'Tiền tố' . ':</label></dt>
		<dd>
			<select name="prefix_id" id="ctrl_prefix_id_' . htmlspecialchars($idSuffix, ENT_QUOTES, 'UTF-8') . '" class="textCtrl TitlePrefix"
				data-container="#PrefixContainer_' . htmlspecialchars($idSuffix, ENT_QUOTES, 'UTF-8') . '"
				data-textbox="#ctrl_title_' . htmlspecialchars($idSuffix, ENT_QUOTES, 'UTF-8') . '"
				' . (($nodeControl) ? ('data-nodecontrol="' . htmlspecialchars($nodeControl, ENT_QUOTES, 'UTF-8') . '" data-prefixurl="' . XenForo_Template_Helper_Core::link('resources/prefixes', false, array()) . '"') : ('')) . '>
				<option value="0" data-css="prefix noPrefix" ' . (($selectedPrefix == 0) ? ' selected="selected"' : '') . '>(' . 'Không tiền tố' . ')</option>
					';
foreach ($prefixes AS $prefixGroup)
{
$__output .= '
						';
if ($prefixGroup['title'])
{
$__output .= '
							<optgroup label="' . htmlspecialchars($prefixGroup['title'], ENT_QUOTES, 'UTF-8') . '">
							';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__output .= '
								<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($selectedPrefix == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
							';
}
$__output .= '
							</optgroup>
						';
}
else
{
$__output .= '
							';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__output .= '
								<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($selectedPrefix == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
							';
}
$__output .= '
						';
}
$__output .= '
					';
}
$__output .= '
			</select>
		</dd>
	</dl>
	
';
}
