<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Edit Thread' . ': ' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Edit Thread' . ': ' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
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
$__compilerVar1 = '';
$__compilerVar1 .= '<label title="' . 'Search only ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[post][thread_id]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_thread" class="AutoChecker"
	data-uncheck="#search_bar_title_only, #search_bar_nodes" /> ' . 'Search this thread only' . '</label>';
$__extraData['searchBar']['thread'] .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
';
$__extraData['searchBar']['forum'] = '';
$__compilerVar2 = '';
$__compilerVar2 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Display results as threads' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('threads/save', $thread, array()) . '" method="post" class="xenForm formOverlay">

	';
$__compilerVar3 = '';
$__compilerVar3 .= htmlspecialchars($thread['prefix_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar4 = '';
$__compilerVar4 .= 'thread_edit';
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
	
	<dl class="ctrlUnit" id="PrefixContainer_' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '">
		<dt><label for="ctrl_prefix_id_' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '">' . 'Prefix' . ':</label></dt>
		<dd>
			<select name="prefix_id" id="ctrl_prefix_id_' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '" class="textCtrl TitlePrefix"
				data-container="#PrefixContainer_' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '"
				data-textbox="#ctrl_title_' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '"
				' . (($nodeControl) ? ('data-nodecontrol="' . htmlspecialchars($nodeControl, ENT_QUOTES, 'UTF-8') . '" data-prefixurl="' . XenForo_Template_Helper_Core::link('forums/-/prefixes', false, array()) . '"') : ('')) . '>
				';
$__compilerVar6 = '';
$__compilerVar6 .= '<option value="0" data-css="prefix noPrefix" ' . (($__compilerVar3 == 0) ? ' selected="selected"' : '') . '>(' . 'No prefix' . ')</option>
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
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar3 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
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
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar3 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
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
$__output .= $__compilerVar5;
unset($__compilerVar3, $__compilerVar4, $__compilerVar5);
$__output .= '
	
	<dl class="ctrlUnit">
		<dt><label for="ctrl_title_thread_edit">' . 'Title' . ':</label></dt>
		<dd><input type="text" name="title" value="' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_title_thread_edit" data-liveTitleTemplate="' . 'Edit Thread' . ': <em>%s</em>" maxlength="100" /></dd>
	</dl>

	';
$__compilerVar7 = '';
$__compilerVar8 = '';
$__compilerVar8 .= '
				';
if ($canLockUnlockThread)
{
$__compilerVar8 .= '
					<li>
						<label for="ctrl_discussion_open"><input type="checkbox" name="discussion_open" value="1" id="ctrl_discussion_open" ' . (($thread['discussion_open']) ? ' checked="checked"' : '') . ' /> ' . 'Open' . '</label>
						<input type="hidden" name="_set[discussion_open]" value="1" />
						<p class="hint">' . 'People may reply to this thread' . '</p>
					</li>
				';
}
$__compilerVar8 .= '
				';
if ($canStickUnstickThread)
{
$__compilerVar8 .= '
					<li>
						<label for="ctrl_sticky"><input type="checkbox" name="sticky" value="1" id="ctrl_sticky" ' . (($thread['sticky']) ? ' checked="checked"' : '') . ' /> ' . 'Sticky' . '</label>
						<input type="hidden" name="_set[sticky]" value="1" />
						<p class="hint">' . 'Sticky threads appear at the top of the first page of the list of threads in their parent forum' . '</p>
					</li>
				';
}
$__compilerVar8 .= '
			
';
if ($canLockUnlockThread)
{
$__compilerVar8 .= '
	<li><label><input type="checkbox" name="block_adsense" value="1" class="SubmitOnChange" ' . (($thread['block_adsense']) ? ' checked="checked"' : '') . ' />
	' . 'Suppress AdSense' . '</label>
	<input type="hidden" name="_set[block_adsense]" value="1" />
	<p class="hint">' . 'If you select this option, AdSense will not be displayed on this thread.' . '</p></li>';
}
$__compilerVar8 .= '
';
if (trim($__compilerVar8) !== '')
{
$__compilerVar7 .= '
	<dl class="ctrlUnit ' . (($hideLabel) ? ('surplusLabel') : ('')) . '">
		<dt><label>' . 'Set Thread Status' . ':</label></dt>
		<dd>
			<ul>
			' . $__compilerVar8 . '
			</ul>
		</dd>
	</dl>
';
}
unset($__compilerVar8);
$__output .= $__compilerVar7;
unset($__compilerVar7);
$__output .= '
' . '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Save Changes' . '" accesskey="s" class="button primary" />
			';
if ($canDeleteThread)
{
$__output .= '
				<a href="' . XenForo_Template_Helper_Core::link('threads/delete', $thread, array()) . '" type="button" class="button OverlayTrigger">' . 'Delete Thread' . '...</a>
			';
}
$__output .= '
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
