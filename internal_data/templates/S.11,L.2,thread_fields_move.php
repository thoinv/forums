<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<dl class="ctrlUnit">
	<dt><label for="ctrl_node_id">' . 'Destination Forum' . ':</label></dt>
	<dd>
		<select name="node_id" id="ctrl_node_id" class="textCtrl selectForum">
		';
foreach ($nodeOptions AS $node)
{
$__output .= '
			<option value="' . htmlspecialchars($node['node_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($node['node_id'] == $firstThread['node_id']) ? ' selected="selected"' : '') . '
				' . (($node['node_type_id'] != ('Forum')) ? ('disabled="disabled"') : ('')) . '>' . XenForo_Template_Helper_Core::string('repeat', array(
'0' => '&nbsp; ',
'1' => htmlspecialchars($node['depth'], ENT_QUOTES, 'UTF-8')
)) . htmlspecialchars($node['title'], ENT_QUOTES, 'UTF-8') . '</option>
		';
}
$__output .= '
		</select>
	</dd>
</dl>
	
';
if ($canEditThreadPrefixes AND $forcePrefixes)
{
$__output .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/title_prefix.js');
$__output .= '
	<dl class="ctrlUnit">
		<dt><!--<label for="ctrl_apply_thread_prefix">' . 'Tiền tố' . ':</label>--></dt>
		<dd>
			<ul>
				<li><label><input type="checkbox" name="apply_thread_prefix" value="1" id="ctrl_apply_thread_prefix" class="Disabler" />
					' . 'Apply prefix to selected threads' . ':</label>
					<ul id="ctrl_apply_thread_prefix_Disabler">
						<li><select name="prefix_id" id="ctrl_prefix_id" class="textCtrl TitlePrefix"
								data-nodecontrol="#ctrl_node_id"
								data-prefixurl="' . XenForo_Template_Helper_Core::link('forums/-/prefixes', false, array()) . '">
								';
$__compilerVar3 = '';
$__compilerVar3 .= '<option value="0" data-css="prefix noPrefix" ' . (($selectedPrefix == 0) ? ' selected="selected"' : '') . '>(' . 'Không tiền tố' . ')</option>
';
foreach ($prefixes AS $prefixGroup)
{
$__compilerVar3 .= '
	';
if ($prefixGroup['title'])
{
$__compilerVar3 .= '
		<optgroup label="' . htmlspecialchars($prefixGroup['title'], ENT_QUOTES, 'UTF-8') . '">
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar3 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($selectedPrefix == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar3 .= '
		</optgroup>
	';
}
else
{
$__compilerVar3 .= '
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar3 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($selectedPrefix == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar3 .= '
	';
}
$__compilerVar3 .= '
';
}
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '
							</select>
						</li>
					</ul>
				</li>
			</ul>
		</dd>
	</dl>
';
}
$__output .= '

<dl class="ctrlUnit">
	<dt><label>' . 'Redirection Notice' . ':</label></dt>
	<dd>';
$__compilerVar4 = '';
$__compilerVar4 .= '<ul>
	<li><label for="ctrl_create_redirect_none"><input type="radio" name="create_redirect" value="" id="ctrl_create_redirect_none" /> ' . 'Do not leave a redirect' . '</label></li>
	<li><label for="ctrl_create_redirect_permanent"><input type="radio" name="create_redirect" value="permanent" id="ctrl_create_redirect_permanent" /> ' . 'Leave a permanent redirect' . '</label></li>
	<li><label for="ctrl_create_redirect_expiring"><input type="radio" name="create_redirect" value="expiring" id="ctrl_create_redirect_expiring" checked="checked" class="Disabler" /> ' . 'Leave a redirect that expires after' . ':</label>
		<ul id="ctrl_create_redirect_expiring_Disabler">
			<li>
				<input type="text" size="5" name="redirect_ttl_value" value="1" class="textCtrl autoSize" />
				<select name="redirect_ttl_unit" class="textCtrl autoSize">
					<option value="hours">' . 'Giờ' . '</option>
					<option value="days" selected="selected">' . 'Ngày' . '</option>
					<option value="weeks">' . 'Tuần' . '</option>
					<option value="months">' . 'Tháng' . '</option>
				</select>
			</li>
		</ul>
	</li>
</ul>';
$__output .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '</dd>
</dl>';
