<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '	<div class="formHiderHeader">
		<label><input type="radio" name="thread_type" value="new" class="Hider Disabler" id="ctrl_move_posts_thread_type_new" checked="checked" /> ' . 'New Thread' . '</label>
	</div>
	<div class="formHiderTarget" id="ctrl_move_posts_thread_type_new_Disabler">
		<dl class="ctrlUnit">
			<dt><label for="ctrl_node_id">' . 'Destination Forum' . ':</label></dt>
			<dd>
				<select name="node_id" id="ctrl_node_id" class="textCtrl">
				';
foreach ($nodes AS $node)
{
$__output .= '
					<option value="' . htmlspecialchars($node['node_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($node['node_id'] == $firstPost['node_id']) ? ' selected="selected"' : '') . ' ' . (($node['node_type_id'] != ('Forum')) ? ('disabled="disabled"') : ('')) . '>' . XenForo_Template_Helper_Core::string('repeat', array(
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
$__compilerVar6 = '';
$__compilerVar6 .= htmlspecialchars($firstPost['prefix_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar7 = '';
$__compilerVar7 .= 'post_move';
$__compilerVar8 = '';
$__compilerVar8 .= '#ctrl_node_id';
$__compilerVar9 = '';
if ($prefixes OR $forcePrefixes)
{
$__compilerVar9 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/title_prefix.js');
$__compilerVar9 .= '
	';
$this->addRequiredExternal('css', 'title_prefix_edit');
$__compilerVar9 .= '
	
	<dl class="ctrlUnit" id="PrefixContainer_' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '">
		<dt><label for="ctrl_prefix_id_' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '">' . 'Tiền tố' . ':</label></dt>
		<dd>
			<select name="prefix_id" id="ctrl_prefix_id_' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '" class="textCtrl TitlePrefix"
				data-container="#PrefixContainer_' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '"
				data-textbox="#ctrl_title_' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . '"
				' . (($__compilerVar8) ? ('data-nodecontrol="' . htmlspecialchars($__compilerVar8, ENT_QUOTES, 'UTF-8') . '" data-prefixurl="' . XenForo_Template_Helper_Core::link('forums/-/prefixes', false, array()) . '"') : ('')) . '>
				';
$__compilerVar10 = '';
$__compilerVar10 .= '<option value="0" data-css="prefix noPrefix" ' . (($__compilerVar6 == 0) ? ' selected="selected"' : '') . '>(' . 'Không tiền tố' . ')</option>
';
foreach ($prefixes AS $prefixGroup)
{
$__compilerVar10 .= '
	';
if ($prefixGroup['title'])
{
$__compilerVar10 .= '
		<optgroup label="' . htmlspecialchars($prefixGroup['title'], ENT_QUOTES, 'UTF-8') . '">
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar10 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar6 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar10 .= '
		</optgroup>
	';
}
else
{
$__compilerVar10 .= '
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar10 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar6 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar10 .= '
	';
}
$__compilerVar10 .= '
';
}
$__compilerVar9 .= $__compilerVar10;
unset($__compilerVar10);
$__compilerVar9 .= '
			</select>
		</dd>
	</dl>
	
';
}
$__output .= $__compilerVar9;
unset($__compilerVar6, $__compilerVar7, $__compilerVar8, $__compilerVar9);
$__output .= '

		<dl class="ctrlUnit">
			<dt><label for="ctrl_title_post_move">' . 'New Thread Title' . ':</label></dt>
			<dd><input type="text" name="title" value="' . htmlspecialchars($firstPost['title'], ENT_QUOTES, 'UTF-8') . '" id="ctrl_title_post_move" class="textCtrl" maxlength="100" /></dd>
		</dl>
	</div>

	<div class="formHiderHeader">
		<label><input type="radio" name="thread_type" value="existing" class="Hider Disabler" id ="ctrl_move_posts_thread_type_existing" /> ' . 'Existing Thread' . '</label>
	</div>
	<div class="formHiderTarget" id="ctrl_move_posts_thread_type_existing_Disabler">
		<dl class="ctrlUnit">
			<dt>' . 'Thread URL' . ':</dt>
			<dd><input type="url" name="existing_url" class="textCtrl" /></dd>
		</dl>
	</div>';
