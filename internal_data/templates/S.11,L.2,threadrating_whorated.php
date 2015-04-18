<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Members Who Rated This Thread';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Members Who Rated This Thread';
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
$__compilerVar10 = '';
$__compilerVar10 .= '<label title="' . 'Search only ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[post][thread_id]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_thread" class="AutoChecker"
	data-uncheck="#search_bar_title_only, #search_bar_nodes" /> ' . 'Search this thread only' . '</label>';
$__extraData['searchBar']['thread'] .= $__compilerVar10;
unset($__compilerVar10);
$__output .= '
';
$__extraData['searchBar']['forum'] = '';
$__compilerVar11 = '';
$__compilerVar11 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Hiển thị kết quả dạng Chủ đề' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar11;
unset($__compilerVar11);
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:threads', $thread, array()), 'value' => XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<div class="section">
	<dl class="subHeading pairsInline"><dt>' . 'Chủ đề' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('posts', $post, array()) . '">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '</a></dd></dl>
	<ol class="overlayScroll">
	';
foreach ($whoRated AS $who)
{
$__output .= '
		';
$__compilerVar12 = '';
$__compilerVar12 .= '
				';
if ($canViewStars)
{
$__compilerVar12 .= '<div class="threadrating">';
$__compilerVar13 = '';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar13 .= '
';
$__compilerVar14 = '';
$__compilerVar14 .= htmlspecialchars($who['rating'], ENT_QUOTES, 'UTF-8');
$__compilerVar15 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar15 .= '

';
if ($action)
{
$__compilerVar15 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar15 .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar14 >= 1) ? ('Full') : ('')) . (($__compilerVar14 >= 0.5 AND $__compilerVar14 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar14 >= 2) ? ('Full') : ('')) . (($__compilerVar14 >= 1.5 AND $__compilerVar14 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar14 >= 3) ? ('Full') : ('')) . (($__compilerVar14 >= 2.5 AND $__compilerVar14 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar14 >= 4) ? ('Full') : ('')) . (($__compilerVar14 >= 3.5 AND $__compilerVar14 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar14 >= 5) ? ('Full') : ('')) . (($__compilerVar14 >= 4.5 AND $__compilerVar14 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar14, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar15 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar15 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar15 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar15 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar15 .= 'tr_greyedout';
}
$__compilerVar15 .= '">
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar14, '2') . '">
					 <span class="star ' . (($__compilerVar14 >= 1) ? ('Full') : ('')) . (($__compilerVar14 >= 0.5 AND $__compilerVar14 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar14 >= 2) ? ('Full') : ('')) . (($__compilerVar14 >= 1.5 AND $__compilerVar14 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar14 >= 3) ? ('Full') : ('')) . (($__compilerVar14 >= 2.5 AND $__compilerVar14 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar14 >= 4) ? ('Full') : ('')) . (($__compilerVar14 >= 3.5 AND $__compilerVar14 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar14 >= 5) ? ('Full') : ('')) . (($__compilerVar14 >= 4.5 AND $__compilerVar14 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar14, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar15 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar15 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar15 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar13 .= $__compilerVar15;
unset($__compilerVar14, $__compilerVar15);
$__compilerVar12 .= $__compilerVar13;
unset($__compilerVar13);
$__compilerVar12 .= '</div>';
}
$__compilerVar12 .= '
			';
$__compilerVar16 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar16 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($id) ? (' id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($who,false,array(
'user' => '$user',
'size' => 's',
'class' => (($noOverlay) ? ('NoOverlay') : (''))
),'')) . '

	';
if ($__compilerVar12)
{
$__compilerVar16 .= '<div class="extra">' . $__compilerVar12 . '</div>';
}
$__compilerVar16 .= '

	<div class="member">
	
		';
if ($who['user_id'])
{
$__compilerVar16 .= '
		
			<h3 class="username">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($who,'',(true),array(
'class' => 'StatusTooltip' . (($noOverlay) ? (' NoOverlay') : ('')),
'title' => XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $who['status'],
'1' => '0',
'2' => array(
'stripPlainTag' => '1'
)
))
))) . '</h3>
			
			';
$__compilerVar17 = '';
$__compilerVar17 .= '<div class="userInfo">
				<div class="userBlurb dimmed">' . XenForo_Template_Helper_Core::callHelper('userBlurb', array(
'0' => $who
)) . '</div>
				<dl class="userStats pairsInline">
					<dt title="' . 'Total messages posted by ' . htmlspecialchars($who['username'], ENT_QUOTES, 'UTF-8') . '' . '">' . 'Bài viết' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($who['message_count'], '0') . '</dd>
					<dt title="' . 'Number of times something posted by ' . htmlspecialchars($who['username'], ENT_QUOTES, 'UTF-8') . ' has been \'liked\'' . '">' . 'Đã được thích' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($who['like_count'], '0') . '</dd>
					<dt>' . 'Điểm thành tích' . ':</dt> <dd title="' . 'Điểm thành tích' . '">' . XenForo_Template_Helper_Core::numberFormat($who['trophy_points'], '0') . '</dd>
				</dl>
			</div>
			';
$__compilerVar16 .= $this->callTemplateHook('dark_member_list_info', $__compilerVar17, array(
'user' => $who
));
unset($__compilerVar17);
$__compilerVar16 .= '
		';
}
else if ($guestHtml)
{
$__compilerVar16 .= '
			<h3 class="username guest dimmed">' . $guestHtml . '</h3>
		';
}
else
{
$__compilerVar16 .= '
			<h3 class="username guest dimmed">' . 'Khách' . '</h3>
		';
}
$__compilerVar16 .= '
		
		';
$__compilerVar18 = '';
$__compilerVar18 .= $contentTemplate;
if (trim($__compilerVar18) !== '')
{
$__compilerVar16 .= '
			<div class="contentInfo">' . $__compilerVar18 . '</div>
		';
}
unset($__compilerVar18);
$__compilerVar16 .= '
		
	</div>
	
</li>';
$__output .= $__compilerVar16;
unset($__compilerVar12, $__compilerVar16);
$__output .= '
	';
}
$__output .= '
	</ol>
	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Đóng' . '</a></div>
</div>';
