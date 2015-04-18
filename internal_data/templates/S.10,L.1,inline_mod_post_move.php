<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Inline Moderation - Move Posts';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('inline-mod/post/move', false, array()) . '" method="post" class="xenForm formOverlay">
	<p>' . 'Are you sure you want to move ' . htmlspecialchars($postCount, ENT_QUOTES, 'UTF-8') . ' post(s) to a new thread?' . '</p>

	';
$__compilerVar1 = '';
$__compilerVar1 .= '	<div class="formHiderHeader">
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
$__compilerVar1 .= '
					<option value="' . htmlspecialchars($node['node_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($node['node_id'] == $firstPost['node_id']) ? ' selected="selected"' : '') . ' ' . (($node['node_type_id'] != ('Forum')) ? ('disabled="disabled"') : ('')) . '>' . XenForo_Template_Helper_Core::string('repeat', array(
'0' => '&nbsp; ',
'1' => htmlspecialchars($node['depth'], ENT_QUOTES, 'UTF-8')
)) . htmlspecialchars($node['title'], ENT_QUOTES, 'UTF-8') . '</option>
				';
}
$__compilerVar1 .= '
				</select>
			</dd>
		</dl>
		
		';
$__compilerVar2 = '';
$__compilerVar2 .= htmlspecialchars($firstPost['prefix_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar3 = '';
$__compilerVar3 .= 'post_move';
$__compilerVar4 = '';
$__compilerVar4 .= '#ctrl_node_id';
$__compilerVar5 = '';
if ($prefixes OR $forcePrefixes)
{
$__compilerVar5 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/title_prefix.js');
$__compilerVar5 .= '
	';
$this->addRequiredExternal('css', 'title_prefix_edit');
$__compilerVar5 .= '
	
	<dl class="ctrlUnit" id="PrefixContainer_' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '">
		<dt><label for="ctrl_prefix_id_' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '">' . 'Prefix' . ':</label></dt>
		<dd>
			<select name="prefix_id" id="ctrl_prefix_id_' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '" class="textCtrl TitlePrefix"
				data-container="#PrefixContainer_' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '"
				data-textbox="#ctrl_title_' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '"
				' . (($__compilerVar4) ? ('data-nodecontrol="' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '" data-prefixurl="' . XenForo_Template_Helper_Core::link('forums/-/prefixes', false, array()) . '"') : ('')) . '>
				';
$__compilerVar6 = '';
$__compilerVar6 .= '<option value="0" data-css="prefix noPrefix" ' . (($__compilerVar2 == 0) ? ' selected="selected"' : '') . '>(' . 'No prefix' . ')</option>
';
foreach ($prefixes AS $prefixGroup)
{
$__compilerVar6 .= '
	';
if ($prefixGroup['title'])
{
$__compilerVar6 .= '
		<optgroup label="' . htmlspecialchars($prefixGroup['title'], ENT_QUOTES, 'UTF-8') . '">
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar6 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar2 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar6 .= '
		</optgroup>
	';
}
else
{
$__compilerVar6 .= '
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar6 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar2 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar6 .= '
	';
}
$__compilerVar6 .= '
';
}
$__compilerVar5 .= $__compilerVar6;
unset($__compilerVar6);
$__compilerVar5 .= '
			</select>
		</dd>
	</dl>
	
';
}
$__compilerVar1 .= $__compilerVar5;
unset($__compilerVar2, $__compilerVar3, $__compilerVar4, $__compilerVar5);
$__compilerVar1 .= '

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
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
	
	<fieldset>
		';
$__compilerVar7 = '1';
$__compilerVar8 = '';
$__compilerVar8 .= '<dl class="ctrlUnit">
	<dt></dt>
	<dd><ul>
		<li>
			<label><input type="checkbox" name="send_author_alert" value="1" ' . (($__compilerVar7) ? ' checked="checked"' : '') . ' class="Disabler" id="ctrl_send_author_alert" /> ' . 'Notify author of this action.' . ' ' . 'Reason' . ':</label>
			<ul id="ctrl_send_author_alert_Disabler">
				<li><input type="text" name="author_alert_reason" class="textCtrl" placeholder="' . 'Optional' . '" /></li>
			</ul>
			<p class="hint">' . 'Note that the author will see this alert even if they can no longer view their message.' . '</p>
		</li>
	</ul></dd>
</dl>';
$__output .= $__compilerVar8;
unset($__compilerVar7, $__compilerVar8);
$__output .= '
	</fieldset>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Move Posts' . '" accesskey="s" class="button primary" /></dd>
	</dl>

	';
foreach ($postIds AS $postId)
{
$__output .= '
		<input type="hidden" name="posts[]" value="' . htmlspecialchars($postId, ENT_QUOTES, 'UTF-8') . '" />
	';
}
$__output .= '

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="redirect" value="' . htmlspecialchars($redirect, ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
