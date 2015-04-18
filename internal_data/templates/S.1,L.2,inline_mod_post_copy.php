<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Inline Moderation' . ' - ' . 'Copy Posts';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('inline-mod/post/copy', false, array()) . '" method="post" class="xenForm formOverlay">
	<p>' . 'Are you sure you want to copy ' . htmlspecialchars($postCount, ENT_QUOTES, 'UTF-8') . ' post(s) to a new thread?' . '</p>

	';
$__compilerVar9 = '';
$__compilerVar9 .= '	<div class="formHiderHeader">
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
$__compilerVar9 .= '
					<option value="' . htmlspecialchars($node['node_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($node['node_id'] == $firstPost['node_id']) ? ' selected="selected"' : '') . ' ' . (($node['node_type_id'] != ('Forum')) ? ('disabled="disabled"') : ('')) . '>' . XenForo_Template_Helper_Core::string('repeat', array(
'0' => '&nbsp; ',
'1' => htmlspecialchars($node['depth'], ENT_QUOTES, 'UTF-8')
)) . htmlspecialchars($node['title'], ENT_QUOTES, 'UTF-8') . '</option>
				';
}
$__compilerVar9 .= '
				</select>
			</dd>
		</dl>
		
		';
$__compilerVar10 = '';
$__compilerVar10 .= htmlspecialchars($firstPost['prefix_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar11 = '';
$__compilerVar11 .= 'post_move';
$__compilerVar12 = '';
$__compilerVar12 .= '#ctrl_node_id';
$__compilerVar13 = '';
if ($prefixes OR $forcePrefixes)
{
$__compilerVar13 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/title_prefix.js');
$__compilerVar13 .= '
	';
$this->addRequiredExternal('css', 'title_prefix_edit');
$__compilerVar13 .= '
	
	<dl class="ctrlUnit" id="PrefixContainer_' . htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8') . '">
		<dt><label for="ctrl_prefix_id_' . htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8') . '">' . 'Tiền tố' . ':</label></dt>
		<dd>
			<select name="prefix_id" id="ctrl_prefix_id_' . htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8') . '" class="textCtrl TitlePrefix"
				data-container="#PrefixContainer_' . htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8') . '"
				data-textbox="#ctrl_title_' . htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8') . '"
				' . (($__compilerVar12) ? ('data-nodecontrol="' . htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8') . '" data-prefixurl="' . XenForo_Template_Helper_Core::link('forums/-/prefixes', false, array()) . '"') : ('')) . '>
				';
$__compilerVar14 = '';
$__compilerVar14 .= '<option value="0" data-css="prefix noPrefix" ' . (($__compilerVar10 == 0) ? ' selected="selected"' : '') . '>(' . 'Không tiền tố' . ')</option>
';
foreach ($prefixes AS $prefixGroup)
{
$__compilerVar14 .= '
	';
if ($prefixGroup['title'])
{
$__compilerVar14 .= '
		<optgroup label="' . htmlspecialchars($prefixGroup['title'], ENT_QUOTES, 'UTF-8') . '">
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar14 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar10 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar14 .= '
		</optgroup>
	';
}
else
{
$__compilerVar14 .= '
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar14 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar10 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar14 .= '
	';
}
$__compilerVar14 .= '
';
}
$__compilerVar13 .= $__compilerVar14;
unset($__compilerVar14);
$__compilerVar13 .= '
			</select>
		</dd>
	</dl>
	
';
}
$__compilerVar9 .= $__compilerVar13;
unset($__compilerVar10, $__compilerVar11, $__compilerVar12, $__compilerVar13);
$__compilerVar9 .= '

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
$__output .= $__compilerVar9;
unset($__compilerVar9);
$__output .= '
	
	<fieldset>
		';
$__compilerVar15 = '0';
$__compilerVar16 = '';
$__compilerVar16 .= '<dl class="ctrlUnit">
	<dt></dt>
	<dd><ul>
		<li>
			<label><input type="checkbox" name="send_author_alert" value="1" ' . (($__compilerVar15) ? ' checked="checked"' : '') . ' class="Disabler" id="ctrl_send_author_alert" /> ' . 'Notify author of this action.' . ' ' . 'Lý do' . ':</label>
			<ul id="ctrl_send_author_alert_Disabler">
				<li><input type="text" name="author_alert_reason" class="textCtrl" placeholder="' . 'Optional' . '" /></li>
			</ul>
			<p class="hint">' . 'Note that the author will see this alert even if they can no longer view their message.' . '</p>
		</li>
	</ul></dd>
</dl>';
$__output .= $__compilerVar16;
unset($__compilerVar15, $__compilerVar16);
$__output .= '
	</fieldset>

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" name="save" value="' . 'Copy Posts' . '" accesskey="s" class="button primary" /></dd>
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
