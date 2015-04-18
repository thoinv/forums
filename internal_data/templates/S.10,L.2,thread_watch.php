<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if ($threadWatch)
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Bỏ theo dõi chủ đề' . ' - ' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
	';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Bỏ theo dõi chủ đề' . ' - ' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
}
else
{
$__output .= '
	';
$__extraData['title'] = '';
$__extraData['title'] .= 'Theo dõi chủ đề' . ' - ' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
	';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Theo dõi chủ đề' . ' - ' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
}
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
$__compilerVar3 = '';
$__compilerVar3 .= '<label title="' . 'Search only ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[post][thread_id]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_thread" class="AutoChecker"
	data-uncheck="#search_bar_title_only, #search_bar_nodes" /> ' . 'Search this thread only' . '</label>';
$__extraData['searchBar']['thread'] .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '
';
$__extraData['searchBar']['forum'] = '';
$__compilerVar4 = '';
$__compilerVar4 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Hiển thị kết quả dạng Chủ đề' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('threads/watch', $thread, array()) . '" method="post" class="xenForm formOverlay AutoValidator">

	';
if ($threadWatch)
{
$__output .= '
		<p>' . 'Bạn đang theo dõi chủ đề này. Sử dụng nút dưới đây nếu bạn muốn dừng theo dõi.' . '</p>
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="hidden" name="stop" value="stop" />
				<input type="submit" value="' . 'Bỏ theo dõi chủ đề' . '" class="button primary" />
			</dd>
		</dl>
	';
}
else
{
$__output .= '
		<dl class="ctrlUnit">
			<dt><label>' . 'Theo dõi chủ đề này ' . '...</label></dt>
			<dd>
				<ul>
					<li>
						<label for="ctrl_email_subscribe_1">
							<input type="radio" name="email_subscribe" value="1" id="ctrl_email_subscribe_1" />
							' . 'và nhận email thông báo' . '
						</label>
					</li>
					<li>
						<label for="ctrl_email_subscribe_0">
							<input type="radio" name="email_subscribe" value="0" id="ctrl_email_subscribe_0" checked="checked" autofocus="true" />
							 ' . 'không nhận email thông báo' . '
						</label>
					</li>
				</ul>
			</dd>
		</dl>
		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Theo dõi chủ đề' . '" class="button primary" />
			</dd>
		</dl>
	';
}
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
