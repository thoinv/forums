<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('js', 'js/Tinhte/XenTag/frontend.js');
$__output .= '
';
$this->addRequiredExternal('css', 'tinhte_xentag');
$__output .= '

';
$__extraData['title'] = '';
$__extraData['title'] .= 'Edit Tags' . ': ' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Edit Tags' . ': ' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
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

<form action="' . XenForo_Template_Helper_Core::link('threads/edit-tags', $thread, array()) . '" method="post" class="xenForm formOverlay">

	<ul class="Tinhte_XenTag_TagsEditor" data-varname="tinhte_xentag_tags[]">
		<li>
			<input type="text"
				name="tinhte_xentag_tags_text"
				value="' . XenForo_Template_Helper_Core::callHelper('Tinhte_XenTag_getImplodedTagsFromThread', array(
'0' => $thread
)) . '"
				id="ctrl_tinhte_xentag_tags"
				class="textCtrl AutoComplete AcSingle Tinhte_XenTag_TagNewInput"
				data-acUrl="' . XenForo_Template_Helper_Core::link('tags/find', false, array()) . '"
				/>
		</li>
	</ul>
	<p class="muted">' . 'Enter list of tags, separated by comma.' . '</p>
	<input type="hidden" name="tinhte_xentag_included" value="1" />
	
	<div>
		<input type="submit" value="' . 'Lưu thay đổi' . '" accesskey="s" class="button primary" />
		<input type="reset" value="' . 'Hủy bỏ' . '" class="button cancel" />
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	<input type="hidden" name="_xfConfirm" value="1" />
</form>';
