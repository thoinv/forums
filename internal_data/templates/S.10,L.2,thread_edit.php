<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Sửa chủ đề' . ': ' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Sửa chủ đề' . ': ' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
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
$__compilerVar9 = '';
$__compilerVar9 .= '<label title="' . 'Search only ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[post][thread_id]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_thread" class="AutoChecker"
	data-uncheck="#search_bar_title_only, #search_bar_nodes" /> ' . 'Search this thread only' . '</label>';
$__extraData['searchBar']['thread'] .= $__compilerVar9;
unset($__compilerVar9);
$__output .= '
';
$__extraData['searchBar']['forum'] = '';
$__compilerVar10 = '';
$__compilerVar10 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Hiển thị kết quả dạng Chủ đề' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar10;
unset($__compilerVar10);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('threads/save', $thread, array()) . '" method="post" class="xenForm formOverlay">

	';
$__compilerVar11 = '';
$__compilerVar11 .= htmlspecialchars($thread['prefix_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar12 = '';
$__compilerVar12 .= 'thread_edit';
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
	
	<dl class="ctrlUnit" id="PrefixContainer_' . htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8') . '">
		<dt><label for="ctrl_prefix_id_' . htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8') . '">' . 'Tiền tố' . ':</label></dt>
		<dd>
			<select name="prefix_id" id="ctrl_prefix_id_' . htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8') . '" class="textCtrl TitlePrefix"
				data-container="#PrefixContainer_' . htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8') . '"
				data-textbox="#ctrl_title_' . htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8') . '"
				' . (($nodeControl) ? ('data-nodecontrol="' . htmlspecialchars($nodeControl, ENT_QUOTES, 'UTF-8') . '" data-prefixurl="' . XenForo_Template_Helper_Core::link('forums/-/prefixes', false, array()) . '"') : ('')) . '>
				';
$__compilerVar14 = '';
$__compilerVar14 .= '<option value="0" data-css="prefix noPrefix" ' . (($__compilerVar11 == 0) ? ' selected="selected"' : '') . '>(' . 'Không tiền tố' . ')</option>
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
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar11 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
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
			<option value="' . htmlspecialchars($prefix['prefix_id'], ENT_QUOTES, 'UTF-8') . '" data-css="' . htmlspecialchars($prefix['css_class'], ENT_QUOTES, 'UTF-8') . '" ' . (($__compilerVar11 == $prefix['prefix_id']) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
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
$__output .= $__compilerVar13;
unset($__compilerVar11, $__compilerVar12, $__compilerVar13);
$__output .= '
	
	<dl class="ctrlUnit">
		<dt><label for="ctrl_title_thread_edit">' . 'Tiêu đề' . ':</label></dt>
		<dd><input type="text" name="title" value="' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_title_thread_edit" data-liveTitleTemplate="' . 'Sửa chủ đề' . ': <em>%s</em>" maxlength="100" /></dd>
	</dl>

	';
$__compilerVar15 = '';
$__compilerVar16 = '';
$__compilerVar16 .= '
				';
if ($canLockUnlockThread)
{
$__compilerVar16 .= '
					<li>
						<label for="ctrl_discussion_open"><input type="checkbox" name="discussion_open" value="1" id="ctrl_discussion_open" ' . (($thread['discussion_open']) ? ' checked="checked"' : '') . ' /> ' . 'Mở' . '</label>
						<input type="hidden" name="_set[discussion_open]" value="1" />
						<p class="hint">' . 'Mọi người có thể trả lời chủ đề này' . '</p>
					</li>
				';
}
$__compilerVar16 .= '
				';
if ($canStickUnstickThread)
{
$__compilerVar16 .= '
					<li>
						<label for="ctrl_sticky"><input type="checkbox" name="sticky" value="1" id="ctrl_sticky" ' . (($thread['sticky']) ? ' checked="checked"' : '') . ' /> ' . 'Dán lên cao' . '</label>
						<input type="hidden" name="_set[sticky]" value="1" />
						<p class="hint">' . 'Chủ đề được dán lên cao hiển thị trên đầu của danh sách trang đầu tiên trong diễn đàn' . '</p>
					</li>
				';
}
$__compilerVar16 .= '
			
';
if ($canLockUnlockThread)
{
$__compilerVar16 .= '
	<li><label><input type="checkbox" name="block_adsense" value="1" class="SubmitOnChange" ' . (($thread['block_adsense']) ? ' checked="checked"' : '') . ' />
	' . 'Suppress AdSense' . '</label>
	<input type="hidden" name="_set[block_adsense]" value="1" />
	<p class="hint">' . 'If you select this option, AdSense will not be displayed on this thread.' . '</p></li>';
}
$__compilerVar16 .= '
';
if (trim($__compilerVar16) !== '')
{
$__compilerVar15 .= '
	<dl class="ctrlUnit ' . (($hideLabel) ? ('surplusLabel') : ('')) . '">
		<dt><label>' . 'Đặt trang thái chủ đề' . ':</label></dt>
		<dd>
			<ul>
			' . $__compilerVar16 . '
			</ul>
		</dd>
	</dl>
';
}
unset($__compilerVar16);
$__output .= $__compilerVar15;
unset($__compilerVar15);
$__output .= '
' . '

	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Lưu thay đổi' . '" accesskey="s" class="button primary" />
			';
if ($canDeleteThread)
{
$__output .= '
				<a href="' . XenForo_Template_Helper_Core::link('threads/delete', $thread, array()) . '" type="button" class="button OverlayTrigger">' . 'Xóa chủ đề' . '...</a>
			';
}
$__output .= '
		</dd>
	</dl>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
