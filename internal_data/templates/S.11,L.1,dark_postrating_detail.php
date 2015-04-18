<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'dark_postrating');
$__output .= '
';
$this->addRequiredExternal('js', 'js/dark/postrating.js?' . $postrating_js_modification);
$__output .= '    

';
$__extraData['title'] = '';
$__extraData['title'] .= XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Ratings for post #' . ($post['position'] + 1) . '';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Ratings for post #' . ($post['position'] + 1) . '';
$__output .= '

';
$__extraData['head']['noindex'] = '';
$__extraData['head']['noindex'] .= '
	<meta name="robots" content="noindex" />';
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

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:posts', $post, array()), 'value' => XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '


<div class="section">
	<dl class="subHeading pairsInline"><dt>' . 'Thread' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('posts', $post, array()) . '">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '</a></dd></dl>
	<div class="overlayScroll dark_postrating_detail">
	
		<table class="dark_postrating_table" cellspacing="5" cellpadding="0" border="0">
			<tr>
			';
foreach ($postrating_detail AS $id => $rating)
{
$__output .= '
				';
if ($rating['newRow'])
{
$__output .= '</tr><tr>';
}
$__output .= '
				<td class=\'dark_postrating_column\'>
					<div>
						<div class=\'dark_postrating_header\'>';
if ($rating['name'])
{
if ($rating['sprite_mode'])
{
$__output .= '<img src="styles/default/xenforo/clear.png" alt="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" style="background: url(\'styles/dark/ratings/' . htmlspecialchars($rating['name'], ENT_QUOTES, 'UTF-8') . '\') no-repeat ' . htmlspecialchars($rating['sprite_params']['x'], ENT_QUOTES, 'UTF-8') . 'px ' . htmlspecialchars($rating['sprite_params']['y'], ENT_QUOTES, 'UTF-8') . 'px; width: ' . htmlspecialchars($rating['sprite_params']['w'], ENT_QUOTES, 'UTF-8') . 'px; height: ' . htmlspecialchars($rating['sprite_params']['h'], ENT_QUOTES, 'UTF-8') . 'px;" />';
}
else
{
$__output .= '<img src="styles/dark/ratings/' . htmlspecialchars($rating['name'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" title="' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . '" />';
}
}
$__output .= ' 
						' . htmlspecialchars($rating['title'], ENT_QUOTES, 'UTF-8') . ' x <strong>' . XenForo_Template_Helper_Core::numberFormat($rating['count'], '0') . '</strong></div>
						';
foreach ($rating['list'] AS $user)
{
$__output .= '
							';
if ($postrating_can_delete)
{
$__output .= '
								<a class="dark_postrating_delete ' . (($postrating_can_delete) ? ('dark_postrating_moderator') : ('')) . '" data-post="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" href="' . XenForo_Template_Helper_Core::link('posts/deleteRating', $post, array(
'user_id' => $user['user_id'],
'_xfToken' => $visitor['csrf_token_page']
)) . '" title="Delete rating"></a>
							';
}
$__output .= '
							<a href="' . XenForo_Template_Helper_Core::link('members', $user, array()) . '" class="username" itemprop="name">' . XenForo_Template_Helper_Core::callHelper('richUserName', array(
'0' => $user
)) . '</a>
						';
}
$__output .= '
					</div>
				</td>
			';
}
$__output .= '
			</tr>
		</table>


	</div>
	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Close' . '</a></div>
</div>';
