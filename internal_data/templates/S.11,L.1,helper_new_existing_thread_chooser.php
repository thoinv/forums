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
$__compilerVar1 = '';
$__compilerVar1 .= htmlspecialchars($firstPost['prefix_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar2 = '';
$__compilerVar2 .= 'post_move';
$__compilerVar3 = '';
$__compilerVar3 .= '#ctrl_node_id';
$__compilerVar4 = '';
if ($prefixes OR $forcePrefixes)
{
$__compilerVar4 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/title_prefix.js');
$__compilerVar4 .= '
	';
$this->addRequiredExternal('css', 'title_prefix_edit');
$__compilerVar4 .= '
	
	<dl class="ctrlUnit" id="PrefixContainer_' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '">
		<dt><label for="ctrl_prefix_id_' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '">' . 'Prefix' . ':</label></dt>
		<dd>
			<select name="prefix_id" id="ctrl_prefix_id_' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '" class="textCtrl TitlePrefix"
				data-container="#PrefixContainer_' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '"
				data-textbox="#ctrl_title_' . htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8') . '"
				' . (($__compilerVar3) ? ('data-nodecontrol="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '" data-prefixurl="' . XenForo_Template_Helper_Core::link('forums/-/prefixes', false, array()) . '"') : ('')) . '>
				';
$__compilerVar5 = '';
$__compilerVar5 .= '<option value="0" data-css="prefix noPrefix" ' . (($__compilerVar1 == 0) ? ' selected="selected"' : '') . '>(' . 'No prefix' . ')</option>
';
foreach ($prefixes AS $prefixGroup)
{
$__compilerVar5 .= '
	';
if ($prefixGroup['title'])
{
$__compilerVar5 .= '
		<optgroup label="' . htmlspecialchars($prefixGroup['title'], ENT_QUOTES, 'UTF-8') . '">
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar5 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar1 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar5 .= '
		</optgroup>
	';
}
else
{
$__compilerVar5 .= '
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar5 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar1 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar5 .= '
	';
}
$__compilerVar5 .= '
';
}
$__compilerVar4 .= $__compilerVar5;
unset($__compilerVar5);
$__compilerVar4 .= '
			</select>
		</dd>
	</dl>
	
';
}
$__output .= $__compilerVar4;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3, $__compilerVar4);
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
