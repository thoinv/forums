<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Members Who Liked Message #' . ($post['position'] + 1) . '';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Members Who Liked Message #' . ($post['position'] + 1) . '';
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
$__compilerVar7 = '';
$__compilerVar7 .= '<label title="' . 'Search only ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[post][thread_id]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_thread" class="AutoChecker"
	data-uncheck="#search_bar_title_only, #search_bar_nodes" /> ' . 'Search this thread only' . '</label>';
$__extraData['searchBar']['thread'] .= $__compilerVar7;
unset($__compilerVar7);
$__output .= '
';
$__extraData['searchBar']['forum'] = '';
$__compilerVar8 = '';
$__compilerVar8 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Hiển thị kết quả dạng Chủ đề' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar8;
unset($__compilerVar8);
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:posts', $post, array()), 'value' => XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<div class="section">
	<dl class="subHeading pairsInline"><dt>' . 'Chủ đề' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('posts', $post, array()) . '">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '</a></dd></dl>
	<ol class="overlayScroll">
	';
foreach ($likes AS $like)
{
$__output .= '
		';
$__compilerVar9 = '';
$__compilerVar9 .= XenForo_Template_Helper_Core::callHelper('datetimehtml', array($like['like_date'],array(
'time' => '$like.like_date'
)));
$__compilerVar10 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar10 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($id) ? (' id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($like,false,array(
'user' => '$user',
'size' => 's',
'class' => (($noOverlay) ? ('NoOverlay') : (''))
),'')) . '

	';
if ($__compilerVar9)
{
$__compilerVar10 .= '<div class="extra">' . $__compilerVar9 . '</div>';
}
$__compilerVar10 .= '

	<div class="member">
	
		';
if ($like['user_id'])
{
$__compilerVar10 .= '
		
			<h3 class="username">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($like,'',(true),array(
'class' => 'StatusTooltip' . (($noOverlay) ? (' NoOverlay') : ('')),
'title' => XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $like['status'],
'1' => '0',
'2' => array(
'stripPlainTag' => '1'
)
))
))) . '</h3>
			
			';
$__compilerVar11 = '';
$__compilerVar11 .= '<div class="userInfo">
				<div class="userBlurb dimmed">' . XenForo_Template_Helper_Core::callHelper('userBlurb', array(
'0' => $like
)) . '</div>
				<dl class="userStats pairsInline">
					<dt title="' . 'Total messages posted by ' . htmlspecialchars($like['username'], ENT_QUOTES, 'UTF-8') . '' . '">' . 'Bài viết' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($like['message_count'], '0') . '</dd>
					<dt title="' . 'Number of times something posted by ' . htmlspecialchars($like['username'], ENT_QUOTES, 'UTF-8') . ' has been \'liked\'' . '">' . 'Đã được thích' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($like['like_count'], '0') . '</dd>
					<dt>' . 'Điểm thành tích' . ':</dt> <dd title="' . 'Điểm thành tích' . '">' . XenForo_Template_Helper_Core::numberFormat($like['trophy_points'], '0') . '</dd>
				</dl>
			</div>
			';
$__compilerVar10 .= $this->callTemplateHook('dark_member_list_info', $__compilerVar11, array(
'user' => $like
));
unset($__compilerVar11);
$__compilerVar10 .= '
		';
}
else if ($guestHtml)
{
$__compilerVar10 .= '
			<h3 class="username guest dimmed">' . $guestHtml . '</h3>
		';
}
else
{
$__compilerVar10 .= '
			<h3 class="username guest dimmed">' . 'Khách' . '</h3>
		';
}
$__compilerVar10 .= '
		
		';
$__compilerVar12 = '';
$__compilerVar12 .= $contentTemplate;
if (trim($__compilerVar12) !== '')
{
$__compilerVar10 .= '
			<div class="contentInfo">' . $__compilerVar12 . '</div>
		';
}
unset($__compilerVar12);
$__compilerVar10 .= '
		
	</div>
	
</li>';
$__output .= $__compilerVar10;
unset($__compilerVar9, $__compilerVar10);
$__output .= '
	';
}
$__output .= '
	</ol>
	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Đóng' . '</a></div>
</div>';
