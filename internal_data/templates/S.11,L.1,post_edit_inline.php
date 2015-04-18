<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Edit Post by ' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:posts', $post, array()), 'value' => XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
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

<form action="' . XenForo_Template_Helper_Core::link('posts/save-inline', $post, array()) . '" method="post" class="section AutoValidator InlineMessageEditor NoAutoHeader">

	<h2 class="heading overlayOnly">' . 'Edit Post by ' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '' . '</h2>

	<div class="primaryContent messageContainer">' . $editorTemplate . '</div>
<div class="secondaryContent">
';
$__compilerVar3 = '';
if ($captcha)
{
$__compilerVar3 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Verification' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '
</div>
	
	';
if ($canSilentEdit)
{
$__output .= '
		';
$__compilerVar4 = '';
$__compilerVar4 .= 'secondaryContent';
$__compilerVar5 = '';
$__compilerVar5 .= '<dl class="ctrlUnit ' . htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8') . '">
	<dt></dt>
	<dd><ul>
		<li><label><input type="checkbox" name="silent" value="1" id="ctrl_silent" class="Disabler" ' . (($silentEdit) ? ' checked="checked"' : '') . ' /> ' . 'Edit silently' . '</label>
			<p class="explain">' . 'If selected, no "last edited" note will be added for this edit.' . '</p>
			<ul id="ctrl_silent_Disabler">
				<li><label><input type="checkbox" name="clear_edit" value="1" ' . (($clearEdit) ? ' checked="checked"' : '') . ' /> ' . 'Clear last edit information' . '</label>
					<p class="explain">' . 'If selected, any existing "last edited" note will be removed.' . '</p>
				</li>
			</ul>
		</li>
	</ul></dd>
</dl>';
$__output .= $__compilerVar5;
unset($__compilerVar4, $__compilerVar5);
$__output .= '
	';
}
$__output .= '

	<div class="sectionFooter">
		<span class="buttonContainer">
			<input type="submit" value="' . 'Save Changes' . '" accesskey="s" class="button primary" />
			<input type="submit" value="' . 'More Options' . '..." name="more_options" class="button JsOnly" />
			<input type="button" value="' . 'Cancel' . '" class="button OverlayCloser" accesskey="r" />
		</span>
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
