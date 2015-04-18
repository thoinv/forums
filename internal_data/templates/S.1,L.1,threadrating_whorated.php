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
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:threads', $thread, array()), 'value' => XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8'));
$__output .= '

<div class="section">
	<dl class="subHeading pairsInline"><dt>' . 'Thread' . ':</dt> <dd><a href="' . XenForo_Template_Helper_Core::link('posts', $post, array()) . '">' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '</a></dd></dl>
	<ol class="overlayScroll">
	';
foreach ($whoRated AS $who)
{
$__output .= '
		';
$__compilerVar3 = '';
$__compilerVar3 .= '
				';
if ($canViewStars)
{
$__compilerVar3 .= '<div class="threadrating">';
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar4 .= '
';
$__compilerVar5 = '';
$__compilerVar5 .= htmlspecialchars($who['rating'], ENT_QUOTES, 'UTF-8');
$__compilerVar6 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar6 .= '

';
if ($action)
{
$__compilerVar6 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar6 .= '

	<form action="' . htmlspecialchars($action, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($microdata) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar5 >= 1) ? ('Full') : ('')) . (($__compilerVar5 >= 0.5 AND $__compilerVar5 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar5 >= 2) ? ('Full') : ('')) . (($__compilerVar5 >= 1.5 AND $__compilerVar5 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar5 >= 3) ? ('Full') : ('')) . (($__compilerVar5 >= 2.5 AND $__compilerVar5 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar5 >= 4) ? ('Full') : ('')) . (($__compilerVar5 >= 3.5 AND $__compilerVar5 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar5 >= 5) ? ('Full') : ('')) . (($__compilerVar5 >= 4.5 AND $__compilerVar5 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar6 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar6 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar6 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar6 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar6 .= 'tr_greyedout';
}
$__compilerVar6 .= '">
		<dl>
			<dt class="prompt muted">' . $prompt . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar5, '2') . '">
					 <span class="star ' . (($__compilerVar5 >= 1) ? ('Full') : ('')) . (($__compilerVar5 >= 0.5 AND $__compilerVar5 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar5 >= 2) ? ('Full') : ('')) . (($__compilerVar5 >= 1.5 AND $__compilerVar5 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar5 >= 3) ? ('Full') : ('')) . (($__compilerVar5 >= 2.5 AND $__compilerVar5 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar5 >= 4) ? ('Full') : ('')) . (($__compilerVar5 >= 3.5 AND $__compilerVar5 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar5 >= 5) ? ('Full') : ('')) . (($__compilerVar5 >= 4.5 AND $__compilerVar5 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar6 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $hint . '</span></a>
				';
}
else
{
$__compilerVar6 .= '
				<span class="Hint">' . $hint . '</span>
				';
}
$__compilerVar6 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar4 .= $__compilerVar6;
unset($__compilerVar5, $__compilerVar6);
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
$__compilerVar3 .= '</div>';
}
$__compilerVar3 .= '
			';
$__compilerVar7 = '';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__compilerVar7 .= '

<li class="primaryContent memberListItem' . (($extended) ? (' extended') : ('')) . '"' . (($id) ? (' id="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($who,false,array(
'user' => '$user',
'size' => 's',
'class' => (($noOverlay) ? ('NoOverlay') : (''))
),'')) . '

	';
if ($__compilerVar3)
{
$__compilerVar7 .= '<div class="extra">' . $__compilerVar3 . '</div>';
}
$__compilerVar7 .= '

	<div class="member">
	
		';
if ($who['user_id'])
{
$__compilerVar7 .= '
		
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
$__compilerVar8 = '';
$__compilerVar8 .= '<div class="userInfo">
				<div class="userBlurb dimmed">' . XenForo_Template_Helper_Core::callHelper('userBlurb', array(
'0' => $who
)) . '</div>
				<dl class="userStats pairsInline">
					<dt title="' . 'Total messages posted by ' . htmlspecialchars($who['username'], ENT_QUOTES, 'UTF-8') . '' . '">' . 'Messages' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($who['message_count'], '0') . '</dd>
					<dt title="' . 'Number of times something posted by ' . htmlspecialchars($who['username'], ENT_QUOTES, 'UTF-8') . ' has been \'liked\'' . '">' . 'Likes Received' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($who['like_count'], '0') . '</dd>
					<dt>' . 'Trophy Points' . ':</dt> <dd title="' . 'Trophy Points' . '">' . XenForo_Template_Helper_Core::numberFormat($who['trophy_points'], '0') . '</dd>
				</dl>
			</div>
			';
$__compilerVar7 .= $this->callTemplateHook('dark_member_list_info', $__compilerVar8, array(
'user' => $who
));
unset($__compilerVar8);
$__compilerVar7 .= '
		';
}
else if ($guestHtml)
{
$__compilerVar7 .= '
			<h3 class="username guest dimmed">' . $guestHtml . '</h3>
		';
}
else
{
$__compilerVar7 .= '
			<h3 class="username guest dimmed">' . 'Guest' . '</h3>
		';
}
$__compilerVar7 .= '
		
		';
$__compilerVar9 = '';
$__compilerVar9 .= $contentTemplate;
if (trim($__compilerVar9) !== '')
{
$__compilerVar7 .= '
			<div class="contentInfo">' . $__compilerVar9 . '</div>
		';
}
unset($__compilerVar9);
$__compilerVar7 .= '
		
	</div>
	
</li>';
$__output .= $__compilerVar7;
unset($__compilerVar3, $__compilerVar7);
$__output .= '
	';
}
$__output .= '
	</ol>
	<div class="sectionFooter overlayOnly"><a class="button primary OverlayCloser">' . 'Close' . '</a></div>
</div>';
