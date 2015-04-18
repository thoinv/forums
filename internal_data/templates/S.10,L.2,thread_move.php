<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Di chuyển chủ đề' . ': ' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Di chuyển chủ đề' . ': ' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:threads', $thread, array()), 'value' => XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

';
$__extraData['bodyClasses'] = '';
$__extraData['bodyClasses'] .= XenForo_Template_Helper_Core::callHelper('nodeClasses', array(
'0' => $nodeBreadCrumbs,
'1' => $forum
));
$__output .= '
';
$__extraData['searchBar']['thread'] = '';
$__compilerVar13 = '';
$__compilerVar13 .= '<label title="' . 'Search only ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[post][thread_id]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_thread" class="AutoChecker"
	data-uncheck="#search_bar_title_only, #search_bar_nodes" /> ' . 'Search this thread only' . '</label>';
$__extraData['searchBar']['thread'] .= $__compilerVar13;
unset($__compilerVar13);
$__output .= '
';
$__extraData['searchBar']['forum'] = '';
$__compilerVar14 = '';
$__compilerVar14 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Hiển thị kết quả dạng Chủ đề' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar14;
unset($__compilerVar14);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('threads/move', $thread, array()) . '" method="post" class="xenForm formOverlay">
	
	';
if ($canEditTitle)
{
$__output .= '
		';
$__compilerVar15 = '';
$__compilerVar15 .= htmlspecialchars($thread['prefix_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar16 = '';
$__compilerVar16 .= 'thread_move';
$__compilerVar17 = '';
$__compilerVar17 .= '#ctrl_node_id';
$__compilerVar18 = '';
if ($prefixes OR $forcePrefixes)
{
$__compilerVar18 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/title_prefix.js');
$__compilerVar18 .= '
	';
$this->addRequiredExternal('css', 'title_prefix_edit');
$__compilerVar18 .= '
	
	<dl class="ctrlUnit" id="PrefixContainer_' . htmlspecialchars($__compilerVar16, ENT_QUOTES, 'UTF-8') . '">
		<dt><label for="ctrl_prefix_id_' . htmlspecialchars($__compilerVar16, ENT_QUOTES, 'UTF-8') . '">' . 'Tiền tố' . ':</label></dt>
		<dd>
			<select name="prefix_id" id="ctrl_prefix_id_' . htmlspecialchars($__compilerVar16, ENT_QUOTES, 'UTF-8') . '" class="textCtrl TitlePrefix"
				data-container="#PrefixContainer_' . htmlspecialchars($__compilerVar16, ENT_QUOTES, 'UTF-8') . '"
				data-textbox="#ctrl_title_' . htmlspecialchars($__compilerVar16, ENT_QUOTES, 'UTF-8') . '"
				' . (($__compilerVar17) ? ('data-nodecontrol="' . htmlspecialchars($__compilerVar17, ENT_QUOTES, 'UTF-8') . '" data-prefixurl="' . XenForo_Template_Helper_Core::link('forums/-/prefixes', false, array()) . '"') : ('')) . '>
				';
$__compilerVar19 = '';
$__compilerVar19 .= '<option value="0" data-css="prefix noPrefix" ' . (($__compilerVar15 == 0) ? ' selected="selected"' : '') . '>(' . 'Không tiền tố' . ')</option>
';
foreach ($prefixes AS $prefixGroup)
{
$__compilerVar19 .= '
	';
if ($prefixGroup['title'])
{
$__compilerVar19 .= '
		<optgroup label="' . htmlspecialchars($prefixGroup['title'], ENT_QUOTES, 'UTF-8') . '">
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar19 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar15 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar19 .= '
		</optgroup>
	';
}
else
{
$__compilerVar19 .= '
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar19 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar15 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar19 .= '
	';
}
$__compilerVar19 .= '
';
}
$__compilerVar18 .= $__compilerVar19;
unset($__compilerVar19);
$__compilerVar18 .= '
			</select>
		</dd>
	</dl>
	
';
}
$__output .= $__compilerVar18;
unset($__compilerVar15, $__compilerVar16, $__compilerVar17, $__compilerVar18);
$__output .= '
		
		<dl class="ctrlUnit">
			<dt><label for="ctrl_title_thread_move">' . 'Tiêu đề' . ':</label></dt>
			<dd><input type="text" name="title" id="ctrl_title_thread_move" value="' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" maxlength="100" /></dd>
		</dl>
	';
}
$__output .= '

	';
$__compilerVar20 = '';
$__compilerVar20 .= '<dl class="ctrlUnit">
	<dt><label for="ctrl_node_id">' . 'Destination Forum' . ':</label></dt>
	<dd>
		<select name="node_id" id="ctrl_node_id" class="textCtrl selectForum">
		';
foreach ($nodeOptions AS $node)
{
$__compilerVar20 .= '
			<option value="' . htmlspecialchars($node['node_id'], ENT_QUOTES, 'UTF-8') . '" ' . (($node['node_id'] == $firstThread['node_id']) ? ' selected="selected"' : '') . '
				' . (($node['node_type_id'] != ('Forum')) ? ('disabled="disabled"') : ('')) . '>' . XenForo_Template_Helper_Core::string('repeat', array(
'0' => '&nbsp; ',
'1' => htmlspecialchars($node['depth'], ENT_QUOTES, 'UTF-8')
)) . htmlspecialchars($node['title'], ENT_QUOTES, 'UTF-8') . '</option>
		';
}
$__compilerVar20 .= '
		</select>
	</dd>
</dl>
	
';
if ($canEditThreadPrefixes AND $forcePrefixes)
{
$__compilerVar20 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/title_prefix.js');
$__compilerVar20 .= '
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
$__compilerVar21 = '';
$__compilerVar21 .= '<option value="0" data-css="prefix noPrefix" ' . (($selectedPrefix == 0) ? ' selected="selected"' : '') . '>(' . 'Không tiền tố' . ')</option>
';
foreach ($prefixes AS $prefixGroup)
{
$__compilerVar21 .= '
	';
if ($prefixGroup['title'])
{
$__compilerVar21 .= '
		<optgroup label="' . htmlspecialchars($prefixGroup['title'], ENT_QUOTES, 'UTF-8') . '">
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar21 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($selectedPrefix == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar21 .= '
		</optgroup>
	';
}
else
{
$__compilerVar21 .= '
		';
foreach ($prefixGroup['prefixes'] AS $prefix)
{
$__compilerVar21 .= '
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($selectedPrefix == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $prefix['prefix_id'],
'1' => 'escaped',
'2' => ''
)) . '</option>
		';
}
$__compilerVar21 .= '
	';
}
$__compilerVar21 .= '
';
}
$__compilerVar20 .= $__compilerVar21;
unset($__compilerVar21);
$__compilerVar20 .= '
							</select>
						</li>
					</ul>
				</li>
			</ul>
		</dd>
	</dl>
';
}
$__compilerVar20 .= '

<dl class="ctrlUnit">
	<dt><label>' . 'Redirection Notice' . ':</label></dt>
	<dd>';
$__compilerVar22 = '';
$__compilerVar22 .= '<ul>
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
$__compilerVar20 .= $__compilerVar22;
unset($__compilerVar22);
$__compilerVar20 .= '</dd>
</dl>';
$__output .= $__compilerVar20;
unset($__compilerVar20);
$__output .= '
	
	<dl class="ctrlUnit">
		<dt></dt>
		<dd><ul>
			<li><label><input type="checkbox" name="send_alert" value="1" checked="checked" /> ' . 'Notify members watching the destination forum' . '</label></li>
		</ul></dd>
	</dl>

	';
if ($thread['discussion_state'] == ('visible') && $thread['user_id'] AND $thread['user_id'] != $visitor['user_id'])
{
$__output .= '
		';
$__compilerVar23 = '1';
$__compilerVar24 = '';
$__compilerVar24 .= '<dl class="ctrlUnit">
	<dt></dt>
	<dd><ul>
		<li>
			<label><input type="checkbox" name="send_starter_alert" value="1" ' . (($__compilerVar23) ? ' checked="checked"' : '') . ' class="Disabler" id="ctrl_send_starter_alert" /> ' . 'Notify thread starter of this action.' . ' ' . 'Lý do' . ':</label>
			<ul id="ctrl_send_starter_alert_Disabler">
				<li><input type="text" name="starter_alert_reason" class="textCtrl" placeholder="' . 'Optional' . '" /></li>
			</ul>
			<p class="hint">' . 'Note that the thread starter will see this alert even if they can no longer view their thread.' . '</p>
		</li>
	</ul></dd>
</dl>';
$__output .= $__compilerVar24;
unset($__compilerVar23, $__compilerVar24);
$__output .= '
	';
}
$__output .= '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd><input type="submit" value="' . 'Di chuyển chủ đề' . '" class="button primary" /></dd>
	</dl>

	<input type="hidden" name="_xfConfirm" value="1" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
