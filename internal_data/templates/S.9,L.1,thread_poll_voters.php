<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Poll Results' . ': ' . htmlspecialchars($poll['question'], ENT_QUOTES, 'UTF-8');
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

<div class="section">
	<h2 class="subHeading">' . 'Members who voted for \'' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '\'' . '</h2>
	<ul class="overlayScroll secondaryContent listInline commaImplode">
	';
foreach ($response['voters'] AS $voter)
{
$__output .= '
		';
if ($voter['username'])
{
$__output .= '
			<li>' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($voter,'',false,array())) . '</li>
		';
}
else
{
$__output .= '
			<li><a>' . '(deleted member)' . '</a></li>
		';
}
$__output .= '
	';
}
$__output .= '
	</ul>
	<div class="sectionFooter">
		' . '' . XenForo_Template_Helper_Core::numberFormat(count($response['voters']), '0') . ' total votes.' . '
		<input type="button" class="button OverlayCloser overlayOnly" value="' . 'Close' . '" />
	</div>
</div>';
