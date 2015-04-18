<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
if ($resource)
{
$__output .= '
	';
$__extraData['h1'] = '';
$__output .= '
	';
$__compilerVar1 = '';
$__compilerVar1 .= XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'resource_view_header');
$__compilerVar2 .= '

<div class="resourceInfo">
';
$__compilerVar3 = '';
$__compilerVar3 .= '
	';
$__compilerVar4 = '';
$__compilerVar4 .= '
			';
if ($resource['external_purchase_url'])
{
$__compilerVar4 .= '
				<li><label class="downloadButton purchase">
					<a href="' . htmlspecialchars($resource['external_purchase_url'], ENT_QUOTES, 'UTF-8') . '" class="inner">
						' . 'Buy Now for ' . htmlspecialchars($resource['cost'], ENT_QUOTES, 'UTF-8') . '' . '
					</a>
				</label></li>
			';
}
else if (!$resource['is_fileless'])
{
$__compilerVar4 .= '
				<li><label class="downloadButton ' . ((!$resource['canDownload']) ? ('downloadDisabled') : ('')) . '">
					<a href="' . XenForo_Template_Helper_Core::link('resources/download', $resource, array(
'version' => $resource['current_version_id']
)) . '" class="inner">
						';
if ($resource['canDownload'])
{
$__compilerVar4 .= 'Download Now';
}
else
{
$__compilerVar4 .= 'Download Not Available';
}
$__compilerVar4 .= '
						';
if ($resource['download_url'])
{
$__compilerVar4 .= '
							<small class="minorText">' . 'Via external site' . '</small>
						';
}
else
{
$__compilerVar4 .= '
							<small class="minorText">' . XenForo_Template_Helper_Core::numberFormat($resource['attachment']['file_size'], 'size') . ' .' . htmlspecialchars($resource['attachment']['extension'], ENT_QUOTES, 'UTF-8') . '</small>
						';
}
$__compilerVar4 .= '
					</a>
				</label></li>
			';
}
$__compilerVar4 .= '

			';
$__compilerVar5 = '';
$__compilerVar4 .= $this->callTemplateHook('resource_view_header_after_resource_buttons', $__compilerVar5, array());
unset($__compilerVar5);
$__compilerVar4 .= '
		';
if (trim($__compilerVar4) !== '')
{
$__compilerVar3 .= '
		<ul class="primaryLinks ' . (($resource['is_fileless'] AND !$resource['external_purchase_url']) ? ('noButton') : ('')) . '">
		' . $__compilerVar4 . '
		</ul>
	';
}
unset($__compilerVar4);
$__compilerVar3 .= '

	<div class="resourceImage">
		';
if ($xenOptions['resourceAllowIcons'])
{
$__compilerVar3 .= '
			<img src="' . XenForo_Template_Helper_Core::callHelper('resourceiconurl', array(
'0' => $resource
)) . '" alt="" class="resourceIcon" />
		';
}
else
{
$__compilerVar3 .= '
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '
		';
}
$__compilerVar3 .= '
	</div>

	<h1>';
if ($__compilerVar1 AND $__compilerVar1 != htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8', true))
{
$__compilerVar3 .= $__compilerVar1;
}
else
{
$__compilerVar3 .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar3 .= ' ';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar3 .= '<span class="muted">' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar3 .= '</h1>
	';
if ($resource['tag_line'] OR $extraDescriptionHtml)
{
$__compilerVar3 .= '<p class="tagLine muted">' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8');
if ($resource['tag_line'] AND $extraDescriptionHtml)
{
$__compilerVar3 .= '<br />';
}
$__compilerVar3 .= $extraDescriptionHtml . '</p>';
}
$__compilerVar3 .= '
';
$__compilerVar2 .= $this->callTemplateHook('resource_view_header_info', $__compilerVar3, array());
unset($__compilerVar3);
$__compilerVar2 .= '
</div>

';
$__compilerVar6 = '';
$__compilerVar2 .= $this->callTemplateHook('resource_view_header_after_info', $__compilerVar6, array());
unset($__compilerVar6);
$__compilerVar2 .= '

';
if ($resource['resource_state'] != ('visible'))
{
$__compilerVar2 .= '
	<ul class="secondaryContent resourceAlerts">
	';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar2 .= '
		<li class="deletedAlert">
			<span class="icon"></span>
			' . 'This resource has been deleted.' . '
			';
if ($resource['delete_user_id'])
{
$__compilerVar2 .= '
				' . 'Deleted by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => array(
'user_id' => $resource['delete_user_id'],
'username' => $resource['delete_username']
)
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['delete_date'],array(
'time' => htmlspecialchars($resource['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($resource['delete_reason'])
{
$__compilerVar2 .= ', ' . 'Reason' . ': ' . htmlspecialchars($resource['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar2 .= '.
			';
}
$__compilerVar2 .= '
		</li>
	';
}
$__compilerVar2 .= '
	';
if ($resource['resource_state'] == ('moderated'))
{
$__compilerVar2 .= '
		<li class="moderatedAlert">
			<span class="icon"></span>
			' . 'This resource is currently awaiting approval.' . '
		</li>
	';
}
$__compilerVar2 .= '
	</ul>
';
}
$__output .= $__compilerVar2;
unset($__compilerVar1, $__compilerVar2);
$__output .= '
	';
$__compilerVar7 = 'discussion';
$__compilerVar8 = '';
$this->addRequiredExternal('css', 'resource_view_tabs');
$__compilerVar8 .= '

<div class="resourceTabs">
	';
if ($resource['canWatch'])
{
$__compilerVar8 .= '
		<div class="extraLinks">
			<a href="' . XenForo_Template_Helper_Core::link('resources/watch', $resource, array()) . '" class="OverlayTrigger watchLink" data-cacheoverlay="false">';
if ($resource['is_watched'])
{
$__compilerVar8 .= 'Unwatch This Resource';
}
else
{
$__compilerVar8 .= 'Watch This Resource';
}
$__compilerVar8 .= '</a>
		</div>
	';
}
$__compilerVar8 .= '
	<ul class="tabs">
	';
$__compilerVar9 = '';
$__compilerVar9 .= '
		<li class="resourceTabDescription ' . (($__compilerVar7 == ('description')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . 'Overview' . '</a>
		</li>
		';
if ($resource['showExtraInfoTab'])
{
$__compilerVar9 .= '
			<li class="resourceTabExtra ' . (($__compilerVar7 == ('extra')) ? ('active') : ('')) . '">
				<a href="' . XenForo_Template_Helper_Core::link('resources/extra', $resource, array()) . '">' . 'Extra Info' . '</a>
			</li>
		';
}
$__compilerVar9 .= '		
		';
if ($resource['customFieldTabs'])
{
$__compilerVar9 .= '
			';
foreach ($resource['customFieldTabs'] AS $fieldId)
{
$__compilerVar9 .= '
				<li class="resourceTabExtra ' . (($__compilerVar7 == ('field_' . $fieldId)) ? ('active') : ('')) . '">
					<a href="' . XenForo_Template_Helper_Core::link('resources/field', $resource, array(
'field' => $fieldId
)) . '">' . XenForo_Template_Helper_Core::callHelper('resourceFieldTitle', array(
'0' => $fieldId
)) . '</a>
				</li>
			';
}
$__compilerVar9 .= '
		';
}
$__compilerVar9 .= '
		';
if ($resource['update_count'] or $resourceUpdateCount)
{
$__compilerVar9 .= '<li class="resourceTabUpdates ' . (($__compilerVar7 == ('updates')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources/updates', $resource, array()) . '">' . 'Updates' . ' (' . XenForo_Template_Helper_Core::numberFormat($resourceUpdateCount, '0') . ')</a>
		</li>';
}
$__compilerVar9 .= '
		';
if ($resource['review_count'])
{
$__compilerVar9 .= '<li class="resourceTabReviews ' . (($__compilerVar7 == ('reviews')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources/reviews', $resource, array()) . '">' . 'Reviews' . ' (' . htmlspecialchars($resource['review_count'], ENT_QUOTES, 'UTF-8') . ')</a>
		</li>';
}
$__compilerVar9 .= '
		';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar9 .= '<li class="resourceTabHistory ' . (($__compilerVar7 == ('history')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources/history', $resource, array()) . '">' . 'Version History' . '</a>
			</li>';
}
$__compilerVar9 .= '
		';
if ($thread)
{
$__compilerVar9 .= '<li class="resourceTabDiscussion ' . (($__compilerVar7 == ('discussion')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '">' . 'Discussion' . '</a>
		</li>';
}
$__compilerVar9 .= '
	';
$__compilerVar8 .= $this->callTemplateHook('resource_view_tabs', $__compilerVar9, array());
unset($__compilerVar9);
$__compilerVar8 .= '
	</ul>
</div>';
$__output .= $__compilerVar8;
unset($__compilerVar7, $__compilerVar8);
$__output .= '
';
}
else
{
$__output .= '
	';
$__extraData['h1'] = '';
$__extraData['h1'] .= XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
}
$__output .= '

';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= '
	' . 'Discussion in \'' . '<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '">' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '\' started by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $thread
)) . ', ' . '<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '">' . XenForo_Template_Helper_Core::datetime($thread['post_date'], 'html') . '</a>' . '.' . '
';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $nodeBreadCrumbs);
$__output .= '

';
$__extraData['head']['canonical'] = '';
$__extraData['head']['canonical'] .= '
	<link rel="canonical" href="' . XenForo_Template_Helper_Core::link('canonical:threads', $thread, array(
'page' => $page
)) . '" />';
$__output .= '
';
$__extraData['head']['description'] = '';
$__extraData['head']['description'] .= '
	<meta name="description" content="' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $firstPost['message'],
'1' => '155'
)) . '" />';
$__output .= '
';
$__extraData['head']['openGraph'] = '';
$__compilerVar10 = '';
$__compilerVar10 .= XenForo_Template_Helper_Core::link('canonical:threads', $thread, array());
$__compilerVar11 = '';
$__compilerVar11 .= XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__compilerVar12 = '';
$__compilerVar12 .= XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $firstPost['message'],
'1' => '155'
));
$__compilerVar13 = '';
$__compilerVar13 .= XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $thread,
'1' => 'm',
'2' => '0',
'3' => '1'
));
$__compilerVar14 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar14 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($__compilerVar13)
{
$__compilerVar14 .= '<meta property="og:image" content="' . htmlspecialchars($__compilerVar13, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar14 .= '
	<meta property="og:image" content="';
$__compilerVar15 = '';
$__compilerVar15 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar14 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar15, array());
unset($__compilerVar15);
$__compilerVar14 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar10 . '" />
	<meta property="og:title" content="' . $__compilerVar11 . '" />
	';
if ($__compilerVar12)
{
$__compilerVar14 .= '<meta property="og:description" content="' . $__compilerVar12 . '" />';
}
$__compilerVar14 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar14 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar14 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar14 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar14 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar14;
unset($__compilerVar10, $__compilerVar11, $__compilerVar12, $__compilerVar13, $__compilerVar14);
$__output .= '
';
$__extraData['bodyClasses'] = '';
$__extraData['bodyClasses'] .= XenForo_Template_Helper_Core::callHelper('nodeClasses', array(
'0' => $nodeBreadCrumbs,
'1' => $forum
)) . (($xenOptions['selectQuotable']) ? (' SelectQuotable') : (''));
$__output .= '
';
$__extraData['searchBar']['thread'] = '';
$__compilerVar16 = '';
$__compilerVar16 .= '<label title="' . 'Search only ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[post][thread_id]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_thread" class="AutoChecker"
	data-uncheck="#search_bar_title_only, #search_bar_nodes" /> ' . 'Search this thread only' . '</label>';
$__extraData['searchBar']['thread'] .= $__compilerVar16;
unset($__compilerVar16);
$__output .= '
';
$__extraData['searchBar']['forum'] = '';
$__compilerVar17 = '';
$__compilerVar17 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Display results as threads' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar17;
unset($__compilerVar17);
$__output .= '

';
if ($canReply)
{
$__output .= '
	
';
}
$__output .= '

';
$this->addRequiredExternal('css', 'thread_view');
$__output .= '

' . '

';
if ($poll)
{
$__output .= '
	';
$__compilerVar18 = '';
$__compilerVar18 .= '
			';
if ($poll['canVote'] AND !$poll['hasVoted'])
{
$__compilerVar18 .= '
				';
$__compilerVar19 = '';
$__compilerVar19 .= '
		
<div>		
	<ol class="pollOptions">
		';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__compilerVar19 .= '
			<li class="pollOption"><label>';
if ($poll['max_votes'] != 1)
{
$__compilerVar19 .= '
				<input type="checkbox" name="response_multiple[]" class="PollResponse" value="' . htmlspecialchars($pollResponseId, ENT_QUOTES, 'UTF-8') . '" />';
}
else
{
$__compilerVar19 .= '
				<input type="radio" name="response" value="' . htmlspecialchars($pollResponseId, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar19 .= '
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '</label></li>				
		';
}
$__compilerVar19 .= '
	</ol>
	
	<div class="buttons">
		';
$__compilerVar20 = '';
$__compilerVar20 .= '
				';
if ($poll['max_votes'] == 0 OR $poll['max_votes'] > count($poll['responses']))
{
$__compilerVar20 .= '
					<span class="multipleNote muted">' . 'Multiple votes are allowed.' . '</span>
				';
}
else if ($poll['max_votes'] > 1)
{
$__compilerVar20 .= '
					<span class="multipleNote muted">' . 'You may select up to ' . htmlspecialchars($poll['max_votes'], ENT_QUOTES, 'UTF-8') . ' choices.' . '</span>
				';
}
$__compilerVar20 .= '
				';
if ($poll['public_votes'])
{
$__compilerVar20 .= '
					<span class="publicWarning muted">' . 'Your vote will be publicly visible.' . '</span>
				';
}
$__compilerVar20 .= '
				';
if (!$poll['canViewResults'])
{
$__compilerVar20 .= '
					<div class="noResultsNote muted">' . 'Results are only viewable after voting.' . '</div>
				';
}
$__compilerVar20 .= '
			';
if (trim($__compilerVar20) !== '')
{
$__compilerVar19 .= '
			<div class="pollNotes">
			' . $__compilerVar20 . '
			</div>
		';
}
unset($__compilerVar20);
$__compilerVar19 .= '
			
		<input type="submit" class="button primary" value="' . 'Cast Your Vote' . '" accesskey="s" />
		';
if ($poll['canViewResults'])
{
$__compilerVar19 .= '
			<input type="button" value="' . 'View Results' . '" class="button OverlayTrigger JsOnly" data-href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array()) . '" />
			<noscript><a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array()) . '" class="button">' . 'View Results' . '</a></noscript>
		';
}
$__compilerVar19 .= '
	</div>
</div>';
$__compilerVar18 .= $__compilerVar19;
unset($__compilerVar19);
$__compilerVar18 .= '
			';
}
else
{
$__compilerVar18 .= '
				';
$__compilerVar21 = '';
$__compilerVar21 .= '

<div class="overlayScroll pollResultsOverlay">

	<ol class="pollResults ' . ((!$poll['canViewResults']) ? ('noResults') : ('')) . '">
	';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__compilerVar21 .= '
		<li class="pollResult ' . (($response['hasVoted']) ? ('voted') : ('')) . '">
			';
if ($response['hasVoted'])
{
$__compilerVar21 .= '
				<div class="votedIconCell" title="' . 'Your vote' . '">*</div>
			';
}
else
{
$__compilerVar21 .= '
				<div class="votedIconCell"></div>
			';
}
$__compilerVar21 .= '
			<h3 class="optionText" ' . (($response['hasVoted']) ? ('title="' . 'Your vote' . '"') : ('')) . '>
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '
			</h3>
			';
if ($poll['canViewResults'])
{
$__compilerVar21 .= '
				<div class="barCell">
					<span class="barContainer">
						';
if ($response['response_vote_count'])
{
$__compilerVar21 .= '<span class="bar" style="width: ' . (100 * $response['response_vote_count'] / $poll['voter_count']) . '%"></span>';
}
$__compilerVar21 .= '
					</span>
				</div>
				<div class="count">
					';
if ($poll['public_votes'] AND $response['response_vote_count'])
{
$__compilerVar21 .= '
						<a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array(
'poll_response_id' => $pollResponseId
)) . '" class="concealed OverlayTrigger">' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' vote(s)' . '</a>
					';
}
else
{
$__compilerVar21 .= '
						' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' vote(s)' . '
					';
}
$__compilerVar21 .= '
				</div>
				<div class="percentage">
					';
if ($poll['voter_count'])
{
$__compilerVar21 .= '
						' . XenForo_Template_Helper_Core::numberFormat((100 * $response['response_vote_count'] / $poll['voter_count']), '1') . '%
					';
}
else
{
$__compilerVar21 .= '
						' . XenForo_Template_Helper_Core::numberFormat('0', '1') . '%
					';
}
$__compilerVar21 .= '
				</div>
			';
}
$__compilerVar21 .= '
		</li>
	';
}
$__compilerVar21 .= '
	</ol>
	
	<div class="buttons">
		';
$__compilerVar22 = '';
$__compilerVar22 .= '
				';
if ($poll['max_votes'] != 1)
{
$__compilerVar22 .= '
					<span class="multipleNote muted">' . 'Multiple votes are allowed.' . '</span>
				';
}
$__compilerVar22 .= '
				';
if (!$poll['canViewResults'])
{
$__compilerVar22 .= '
					<div class="noResultsNote muted">' . 'Results are only viewable after voting.' . '</div>
				';
}
$__compilerVar22 .= '
			';
if (trim($__compilerVar22) !== '')
{
$__compilerVar21 .= '
			<div class="pollNotes">
			' . $__compilerVar22 . '
			</div>
		';
}
unset($__compilerVar22);
$__compilerVar21 .= '
		
		';
if ($poll['canVote'])
{
$__compilerVar21 .= '
			<a href="' . XenForo_Template_Helper_Core::link('threads/poll/vote', $thread, array()) . '" class="button PollChangeVote nonOverlayOnly">' . 'Change Your Vote' . '</a>
		';
}
$__compilerVar21 .= '
	</div>
</div>';
$__compilerVar18 .= $__compilerVar21;
unset($__compilerVar21);
$__compilerVar18 .= '
			';
}
$__compilerVar18 .= '
		';
$__compilerVar23 = '';
$this->addRequiredExternal('css', 'polls');
$__compilerVar23 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar23 .= '

<div class="NoAutoHeader PollContainer">
	<form action="' . XenForo_Template_Helper_Core::link('threads/poll/vote', $thread, array()) . '" method="post"
	class="sectionMain pollBlock AutoValidator PollVoteForm" data-max-votes="' . htmlspecialchars($poll['max_votes'], ENT_QUOTES, 'UTF-8') . '">
	
		<div class="secondaryContent">	
			<div class="pollContent">
				<div class="questionMark">?</div>
			
				<div class="question">
					<h2 class="questionText">' . htmlspecialchars($poll['question'], ENT_QUOTES, 'UTF-8') . '</h2>
					';
if ($poll['canEdit'])
{
$__compilerVar23 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/poll/edit', $thread, array()) . '" class="editLink">' . 'Edit' . '</a>';
}
$__compilerVar23 .= '
					
					';
if ($poll['close_date'])
{
$__compilerVar23 .= '
						<div class="pollNotes closeDate muted">
							';
if ($poll['open'])
{
$__compilerVar23 .= '
								' . 'This poll will close on ' . XenForo_Template_Helper_Core::datetime($poll['close_date'], 'absolute') . '.' . '
							';
}
else
{
$__compilerVar23 .= '
								' . 'Poll closed ' . XenForo_Template_Helper_Core::datetime($poll['close_date'], '') . '.' . '
							';
}
$__compilerVar23 .= '
						</div>
					';
}
$__compilerVar23 .= '
				</div>
					
				' . $__compilerVar18 . '
			</div>
		</div>
	
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>';
$__output .= $__compilerVar23;
unset($__compilerVar18, $__compilerVar23);
$__output .= '
';
}
$__output .= '

';
if ($showPostedNotice)
{
$__output .= '
	<div class="importantMessage">' . 'Your message has been submitted and will be displayed pending approval by a moderator.' . '</div>
';
}
$__output .= '

';
$threadStatusHtml = '';
$threadStatusHtml .= '
	';
$__compilerVar24 = '';
$__compilerVar24 .= '
				';
if ($thread['discussion_state'] == ('deleted'))
{
$__compilerVar24 .= '
					<dd class="deletedAlert">
						<span class="icon Tooltip" title="' . 'Deleted' . '" data-tipclass="iconTip"></span>
							' . 'Removed from public view.' . '</dd>
				';
}
else if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar24 .= '
					<dd class="moderatedAlert">
						<span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip"></span>
							' . 'Awaiting moderation before being displayed publicly.' . '</dd>
				';
}
$__compilerVar24 .= '
	
				';
if (!$thread['discussion_open'])
{
$__compilerVar24 .= '
					<dd class="lockedAlert">
						<span class="icon Tooltip" title="' . 'Locked' . '" data-tipclass="iconTip"></span>
							' . 'Not open for further replies.' . '</dd>
				';
}
$__compilerVar24 .= '
			';
if (trim($__compilerVar24) !== '')
{
$threadStatusHtml .= '
		<dl class="threadAlerts secondaryContent">
			<dt>' . 'Thread Status' . ':</dt>
			' . $__compilerVar24 . '
		</dl>
	';
}
unset($__compilerVar24);
$threadStatusHtml .= '
';
$__output .= '
' . $threadStatusHtml . '

';
$__compilerVar25 = '';
$__output .= $this->callTemplateHook('thread_view_pagenav_before', $__compilerVar25, array(
'thread' => $thread
));
unset($__compilerVar25);
$__output .= '

<div class="pageNavLinkGroup">

	';
if ($threadrating['canView'])
{
$__output .= '<div class="threadrating">
		';
$__compilerVar26 = '';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar26 .= '
';
$__compilerVar27 = '';
$__compilerVar27 .= (($threadrating['canRate']) ? (XenForo_Template_Helper_Core::link('threads/rate', $thread, array())) : (''));
$__compilerVar28 = '';
$__compilerVar28 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar29 = '';
$__compilerVar30 = '';
$__compilerVar30 .= (($thread['thread_rate_count'] == 1) ? ('1 vote') : ('' . htmlspecialchars($thread['thread_rate_count'], ENT_QUOTES, 'UTF-8') . ' votes'));
$__compilerVar31 = '';
$__compilerVar31 .= '1';
$__compilerVar32 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar32 .= '

';
if ($__compilerVar27)
{
$__compilerVar32 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar32 .= '

	<form action="' . htmlspecialchars($__compilerVar27, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar31) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar29 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar28 >= 1) ? ('Full') : ('')) . (($__compilerVar28 >= 0.5 AND $__compilerVar28 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar28 >= 2) ? ('Full') : ('')) . (($__compilerVar28 >= 1.5 AND $__compilerVar28 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar28 >= 3) ? ('Full') : ('')) . (($__compilerVar28 >= 2.5 AND $__compilerVar28 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar28 >= 4) ? ('Full') : ('')) . (($__compilerVar28 >= 3.5 AND $__compilerVar28 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar28 >= 5) ? ('Full') : ('')) . (($__compilerVar28 >= 4.5 AND $__compilerVar28 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar28, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar32 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar30 . '</span></a>
				';
}
else
{
$__compilerVar32 .= '
				<span class="Hint">' . $__compilerVar30 . '</span>
				';
}
$__compilerVar32 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar32 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar32 .= 'tr_greyedout';
}
$__compilerVar32 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar29 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar28, '2') . '">
					 <span class="star ' . (($__compilerVar28 >= 1) ? ('Full') : ('')) . (($__compilerVar28 >= 0.5 AND $__compilerVar28 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar28 >= 2) ? ('Full') : ('')) . (($__compilerVar28 >= 1.5 AND $__compilerVar28 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar28 >= 3) ? ('Full') : ('')) . (($__compilerVar28 >= 2.5 AND $__compilerVar28 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar28 >= 4) ? ('Full') : ('')) . (($__compilerVar28 >= 3.5 AND $__compilerVar28 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar28 >= 5) ? ('Full') : ('')) . (($__compilerVar28 >= 4.5 AND $__compilerVar28 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar28, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar32 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar30 . '</span></a>
				';
}
else
{
$__compilerVar32 .= '
				<span class="Hint">' . $__compilerVar30 . '</span>
				';
}
$__compilerVar32 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar26 .= $__compilerVar32;
unset($__compilerVar27, $__compilerVar28, $__compilerVar29, $__compilerVar30, $__compilerVar31, $__compilerVar32);
$__output .= $__compilerVar26;
unset($__compilerVar26);
$__output .= '
	</div>';
}
$__output .= '
	<div class="linkGroup SelectionCountContainer">
	
		';
$__compilerVar33 = '';
$__compilerVar33 .= '
					';
$__compilerVar34 = '';
$__compilerVar34 .= '
							';
if ($canEditThread)
{
$__compilerVar34 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/edit', $thread, array()) . '" class="OverlayTrigger">' . 'Edit Thread' . '</a></li>
							';
}
else if ($canEditTitle)
{
$__compilerVar34 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/edit-title', $thread, array()) . '" class="OverlayTrigger">' . 'Edit Title' . '</a></li>
							';
}
$__compilerVar34 .= '
							';
if ($canAddPoll)
{
$__compilerVar34 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/poll/add', $thread, array()) . '">' . 'Add Poll' . '</a></li>
							';
}
$__compilerVar34 .= '
							';
if ($canDeleteThread)
{
$__compilerVar34 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/delete', $thread, array()) . '" class="OverlayTrigger">' . 'Delete Thread' . '</a></li>
							';
}
$__compilerVar34 .= '
							';
if ($canMoveThread)
{
$__compilerVar34 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/move', $thread, array()) . '" class="OverlayTrigger">' . 'Move Thread' . '</a></li>
							';
}
$__compilerVar34 .= '
							';
if ($canReplyBan)
{
$__compilerVar34 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/reply-bans', $thread, array()) . '" class="OverlayTrigger">' . 'Manage Reply Bans' . '</a></li>
							';
}
$__compilerVar34 .= '
							';
if ($canViewModeratorLog)
{
$__compilerVar34 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/moderator-actions', $thread, array()) . '" class="OverlayTrigger">' . 'Moderator Actions' . '</a></li>
							';
}
$__compilerVar34 .= '
							';
if ($deletedPosts)
{
$__compilerVar34 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/show-posts', $thread, array(
'page' => $page
)) . '" class="MessageLoader" data-messageSelector="#messageList .message.deleted.placeholder">' . 'Show Deleted Posts' . '</a></li>
							';
}
$__compilerVar34 .= '
							';
$__compilerVar35 = '';
$__compilerVar34 .= $this->callTemplateHook('thread_view_tools_links', $__compilerVar35, array(
'thread' => $thread
));
unset($__compilerVar35);
$__compilerVar34 .= '
						';
if (trim($__compilerVar34) !== '')
{
$__compilerVar33 .= '
					<div class="primaryContent menuHeader"><h3>' . 'Thread Tools' . '</h3></div>
					<ul class="secondaryContent blockLinksList">
						' . $__compilerVar34 . '
					</ul>
					';
}
unset($__compilerVar34);
$__compilerVar33 .= '
					';
$__compilerVar36 = '';
$__compilerVar36 .= '
							';
if ($canLockUnlockThread)
{
$__compilerVar36 .= '
							<li><label><input type="checkbox" name="discussion_open" value="1" class="SubmitOnChange" ' . (($thread['discussion_open']) ? ' checked="checked"' : '') . ' />
								' . 'Open' . '</label>
								<input type="hidden" name="set[discussion_open]" value="1" /></li>';
}
$__compilerVar36 .= '
							';
if ($canStickUnstickThread)
{
$__compilerVar36 .= ' 
							<li><label><input type="checkbox" name="sticky" value="1" class="SubmitOnChange" ' . (($thread['sticky']) ? ' checked="checked"' : '') . ' />
								' . 'Sticky' . '</label>
								<input type="hidden" name="set[sticky]" value="1" /></li>';
}
$__compilerVar36 .= '
						
';
if ($canLockUnlockThread)
{
$__compilerVar36 .= '
	<li><label><input type="checkbox" name="block_adsense" value="1" class="SubmitOnChange" ' . (($thread['block_adsense']) ? ' checked="checked"' : '') . ' />
	' . 'Suppress AdSense' . '</label>
	<input type="hidden" name="set[block_adsense]" value="1" /></li>';
}
$__compilerVar36 .= '
';
if (trim($__compilerVar36) !== '')
{
$__compilerVar33 .= '
					<form action="' . XenForo_Template_Helper_Core::link('threads/quick-update', $thread, array()) . '" method="post" class="AutoValidator">
						<ul class="secondaryContent blockLinksList checkboxColumns">
						' . $__compilerVar36 . '
						</ul>
						<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
					</form>
					';
}
unset($__compilerVar36);
$__compilerVar33 .= '
					';
if ($thread['canInlineMod'])
{
$__compilerVar33 .= '
					<form action="' . XenForo_Template_Helper_Core::link('inline-mod/thread/switch', false, array()) . '" method="post" class="InlineModForm sectionFooter" id="threadViewThreadCheck"
						data-cookieName="threads">
						<label><input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" /> ' . 'Select for Thread Moderation' . '</label>
						<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
					</form>
					';
}
$__compilerVar33 .= '
				';
if (trim($__compilerVar33) !== '')
{
$__output .= '
			<div class="Popup">
				<a rel="Menu">' . 'Thread Tools' . '</a>
				<div class="Menu">
				' . $__compilerVar33 . '
				</div>
			</div>
		';
}
unset($__compilerVar33);
$__output .= '
		';
if ($canWatchThread)
{
$__output .= '
			<a href="' . XenForo_Template_Helper_Core::link('threads/watch-confirm', $thread, array()) . '" class="OverlayTrigger" data-cacheOverlay="false">' . (($thread['thread_is_watched']) ? ('Unwatch Thread') : ('Watch Thread')) . '</a>
		';
}
$__output .= '
	</div>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($postsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalPosts, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'threads', $thread, array(), htmlspecialchars($unreadLink, ENT_QUOTES, 'UTF-8'), array())) . '
</div>
';
if ($post['position'] == 0)
{
$__output .= ' <p class="viewcount">Lượt xem: ' . XenForo_Template_Helper_Core::numberFormat($thread['view_count'], '0') . '</p> ';
}
$__output .= '

';
$__compilerVar37 = '';
$__compilerVar38 = '';
$__compilerVar37 .= $this->callTemplateHook('ad_thread_view_above_messages', $__compilerVar38, array());
unset($__compilerVar38);
$__output .= $__compilerVar37;
unset($__compilerVar37);
$__output .= '

';
$__compilerVar39 = '';
$__output .= $this->callTemplateHook('thread_view_form_before', $__compilerVar39, array(
'thread' => $thread
));
unset($__compilerVar39);
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('inline-mod/post/switch', false, array()) . '" method="post"
	class="InlineModForm section"
	data-cookieName="posts"
	data-controls="#InlineModControls"
	data-imodOptions="#ModerationSelect option">

	<ol class="messageList" id="messageList">
		';
foreach ($posts AS $post)
{
$__output .= '
			';
if ($post['message_state'] == ('deleted'))
{
$__output .= '
				';
$__compilerVar40 = '';
$__compilerVar41 = '';
$__compilerVar41 .= 'post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar42 = '';
$__compilerVar42 .= '
		';
if ($post['canInlineMod'])
{
$__compilerVar42 .= '<input type="checkbox" name="posts[]" value="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" title="' . 'Select this post' . '" data-target="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar42 .= '
		
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['post_date'],array(
'time' => '$post.post_date',
'class' => 'muted item'
))) . '
		
		<a href="' . XenForo_Template_Helper_Core::link('threads/show-posts', $thread, array(
'post_id' => $post['post_id']
)) . '" class="MessageLoader control item show" data-messageSelector="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Show' . '</a>		
	';
$__compilerVar43 = '';
$this->addRequiredExternal('css', 'message');
$__compilerVar43 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar43 .= '

<li id="' . htmlspecialchars($__compilerVar41, ENT_QUOTES, 'UTF-8') . '" class="message deleted placeholder ' . (($post['isIgnored']) ? ('ignored') : ('')) . '">
	<div class="placeholderContent">

		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($post,(true),array(
'user' => '$message',
'size' => 's',
'img' => 'true'
),'')) . '
		
		<div class="messageInfo primaryContent">
			<div>
				' . 'This message by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $post
)) . ' has been removed from public view.' . '
				
				';
if ($post['delete_username'])
{
$__compilerVar43 .= '
					' . 'Deleted by ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $post['deleteInfo']
)) . '' . ',
					' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['delete_date'],array(
'time' => htmlspecialchars($post['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($post['delete_reason'])
{
$__compilerVar43 .= ', ' . 'Reason' . ': ' . htmlspecialchars($post['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar43 .= '.
				';
}
$__compilerVar43 .= '
			</div>
			
			';
$__compilerVar44 = '';
$__compilerVar43 .= $this->callTemplateCallback('DigitalPointAdPositioning_Callback_AdBelowPost', 'renderAdCounterAdvance', $__compilerVar44, array());
unset($__compilerVar44);
$__compilerVar43 .= '
<div class="messageMeta">
				<div class="privateControls">' . $__compilerVar42 . '</div>
			</div>
		</div>
		
	</div>
</li>';
$__compilerVar40 .= $__compilerVar43;
unset($__compilerVar41, $__compilerVar42, $__compilerVar43);
$__output .= $__compilerVar40;
unset($__compilerVar40);
$__output .= '
			';
}
else
{
$__output .= '
				';
$__compilerVar45 = '';
$__compilerVar46 = '';
$__compilerVar46 .= 'post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar47 = '';
$__compilerVar47 .= XenForo_Template_Helper_Core::link('posts/likes', $post, array());
$__compilerVar48 = '';
if ($post['attachments'])
{
$__compilerVar49 = '';
$this->addRequiredExternal('css', 'attached_files');
$__compilerVar49 .= '

<div class="attachedFiles">
	<h4 class="attachedFilesHeader">' . 'Attached Files' . ':</h4>
	<ul class="attachmentList SquareThumbs"
		data-thumb-height="' . ($xenOptions['attachmentThumbnailDimensions'] / 2) . '"
		data-thumb-selector="div.thumbnail > a">
		';
foreach ($post['attachments'] AS $attachment)
{
$__compilerVar49 .= '
			<li class="attachment' . (($attachment['thumbnailUrl']) ? (' image') : ('')) . '" title="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '">
				<div class="boxModelFixer primaryContent">
					
					';
$__compilerVar50 = '';
$__compilerVar50 .= '
					<div class="thumbnail">
						';
if ($attachment['thumbnailUrl'] AND $canViewAttachments)
{
$__compilerVar50 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="LbTrigger"
								data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img 
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" class="LbImage" /></a>
						';
}
else if ($attachment['thumbnailUrl'])
{
$__compilerVar50 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"><img
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" /></a>
						';
}
else
{
$__compilerVar50 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="genericAttachment"></a>
						';
}
$__compilerVar50 .= '
					</div>
					';
$__compilerVar49 .= $this->callTemplateHook('attached_file_thumbnail', $__compilerVar50, array(
'attachment' => $attachment
));
unset($__compilerVar50);
$__compilerVar49 .= '
					
					<div class="attachmentInfo pairsJustified">
						<h6 class="filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '</a></h6>
						<dl><dt>' . 'File size' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['file_size'], 'size') . '</dd></dl>
						<dl><dt>' . 'Views' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['view_count'], '0') . '</dd></dl>
					</div>
				</div>
			</li>
		';
}
$__compilerVar49 .= '
	</ul>
</div>

';
$__compilerVar48 .= $__compilerVar49;
unset($__compilerVar49);
}
$__compilerVar51 = '';
$__compilerVar51 .= '
				
		<div class="messageMeta ToggleTriggerAnchor">
			
			<div class="privateControls">
				';
if ($post['canInlineMod'])
{
$__compilerVar51 .= '<input type="checkbox" name="posts[]" value="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Select this post by ' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar51 .= '
				<span class="item muted">
					<span class="authorEnd">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($post,'',false,array(
'class' => 'author'
))) . ',</span>
					<a href="' . XenForo_Template_Helper_Core::link('threads/post-permalink', $thread, array(
'post' => $post
)) . '" title="' . 'Permalink' . '" class="datePermalink">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['post_date'],array(
'time' => '$post.post_date'
))) . '</a>
				</span>
				';
$__compilerVar52 = '';
$__compilerVar52 .= '
				';
if ($post['canEdit'])
{
$__compilerVar52 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/edit', $post, array()) . '" class="item control edit ' . (($xenOptions['messageInlineEdit']) ? ('OverlayTrigger') : ('')) . '"
						data-href="' . XenForo_Template_Helper_Core::link('posts/edit-inline', $post, array()) . '" data-overlayOptions="{&quot;fixed&quot;:false}"
						data-messageSelector="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Edit' . '</a>
					';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar52 .= '
				';
}
$__compilerVar52 .= '
				';
if ($post['edit_count'] && $post['canViewHistory'])
{
$__compilerVar52 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/history', $post, array()) . '" class="item control history ToggleTrigger"><span></span>' . 'History' . '</a>';
}
$__compilerVar52 .= '
				';
if ($post['canDelete'])
{
$__compilerVar52 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/delete', $post, array()) . '" class="item control delete OverlayTrigger"><span></span>' . 'Delete' . '</a>';
}
$__compilerVar52 .= '
				';
if ($post['canCleanSpam'])
{
$__compilerVar52 .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $post, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a>';
}
$__compilerVar52 .= '
				';
if ($canViewIps AND $post['ip_id'])
{
$__compilerVar52 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/ip', $post, array()) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>';
}
$__compilerVar52 .= '
				
				';
if ($post['canWarn'])
{
$__compilerVar52 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $post, array(
'content_type' => 'post',
'content_id' => $post['post_id']
)) . '" class="item control warn"><span></span>' . 'Warn' . '</a>
				';
}
else if ($post['warning_id'] && $canViewWarnings)
{
$__compilerVar52 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $post, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar52 .= '
				';
if ($post['canReport'])
{
$__compilerVar52 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/report', $post, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Report' . '</a>
				';
}
$__compilerVar52 .= '
				
				';
$__compilerVar51 .= $this->callTemplateHook('post_private_controls', $__compilerVar52, array(
'post' => $post
));
unset($__compilerVar52);
$__compilerVar51 .= '
			</div>
			
			<div class="publicControls">
				<a href="' . XenForo_Template_Helper_Core::link('threads/post-permalink', $thread, array(
'post' => $post
)) . '" title="' . 'Permalink' . '" class="item muted postNumber hashPermalink OverlayTrigger" data-href="' . XenForo_Template_Helper_Core::link('posts/permalink', $post, array()) . '">#' . ($post['position'] + 1) . '</a>
				';
$__compilerVar53 = '';
$__compilerVar53 .= '
				';
if ($post['canLike'])
{
$__compilerVar53 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/like', $post, array()) . '" class="LikeLink item control ' . (($post['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($post['like_date']) ? ('Unlike') : ('Like')) . '</span></a>
				';
}
$__compilerVar53 .= '
				';
if ($canReply)
{
$__compilerVar53 .= '
					';
if ($xenOptions['multiQuote'])
{
$__compilerVar53 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array(
'quote' => $post['post_id']
)) . '"
						data-messageid="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"
						class="MultiQuoteControl JsOnly item control"
						title="' . 'Toggle Multi-Quote' . '"><span></span><span class="symbol">' . '+ Quote' . '</span></a>';
}
$__compilerVar53 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array(
'quote' => $post['post_id']
)) . '"
						data-postUrl="' . XenForo_Template_Helper_Core::link('posts/quote', $post, array()) . '"
						data-tip="#MQ-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"
						class="ReplyQuote item control reply"
						title="' . 'Reply, quoting this message' . '"><span></span>' . 'Reply' . '</a>
				';
}
$__compilerVar53 .= '
				';
$__compilerVar51 .= $this->callTemplateHook('post_public_controls', $__compilerVar53, array(
'post' => $post
));
unset($__compilerVar53);
$__compilerVar51 .= '
			</div>
		</div>
	';
$__compilerVar54 = '';
$this->addRequiredExternal('css', 'message');
$__compilerVar54 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar54 .= '

<li id="' . htmlspecialchars($__compilerVar46, ENT_QUOTES, 'UTF-8') . '" class="message ' . (($post['isDeleted']) ? ('deleted') : ('')) . ' ' . (($post['is_staff']) ? ('staff') : ('')) . ' ' . (($post['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '">

	';
$__compilerVar55 = '';
$this->addRequiredExternal('css', 'message_user_info');
$__compilerVar55 .= '

<div class="messageUserInfo" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">	
<div class="messageUserBlock ' . (($post['isOnline']) ? ('online') : ('')) . '">
	';
$__compilerVar56 = '';
$__compilerVar56 .= '
		<div class="avatarHolder">
			<span class="helper"></span>
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($post,(true),array(
'user' => '$user',
'size' => 'm',
'img' => 'true'
),'')) . '
			';
if ($post['isOnline'])
{
$__compilerVar56 .= '<span class="Tooltip onlineMarker" title="' . 'Online Now' . '" data-offsetX="-22" data-offsetY="-8"></span>';
}
$__compilerVar56 .= '
			<!-- slot: message_user_info_avatar -->
		</div>
	';
$__compilerVar55 .= $this->callTemplateHook('message_user_info_avatar', $__compilerVar56, array(
'user' => $post,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar56);
$__compilerVar55 .= '

';
if (!$isQuickReply)
{
$__compilerVar55 .= '
	';
$__compilerVar57 = '';
$__compilerVar57 .= '
		<h3 class="userText">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($post,'',(true),array(
'itemprop' => 'name'
))) . '
			';
$__compilerVar58 = '';
$__compilerVar58 .= XenForo_Template_Helper_Core::callHelper('userTitle', array(
'0' => $post,
'1' => '1',
'2' => '1'
));
if (trim($__compilerVar58) !== '')
{
$__compilerVar57 .= '<em class="userTitle" itemprop="title">' . $__compilerVar58 . '</em>';
}
unset($__compilerVar58);
$__compilerVar57 .= '
			' . XenForo_Template_Helper_Core::callHelper('userBanner', array(
'0' => $post,
'1' => 'wrapped'
)) . '
			<!-- slot: message_user_info_text -->
		</h3>
	';
$__compilerVar55 .= $this->callTemplateHook('message_user_info_text', $__compilerVar57, array(
'user' => $post,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar57);
$__compilerVar55 .= '
		
	';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar59 = '';
$__compilerVar59 .= '
';
if (!XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar59 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbons');
$__compilerVar59 .= '
';
}
$__compilerVar59 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar59 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbonsbadge');
$__compilerVar59 .= '
';
}
$__compilerVar59 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsSoftResponsiveFix'))
{
$__compilerVar59 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsSoftResponsiveFix');
$__compilerVar59 .= '
';
}
$__compilerVar59 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsXenMoodsFix'))
{
$__compilerVar59 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsXenMoodsFix');
$__compilerVar59 .= '
';
}
$__compilerVar59 .= '
    
';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar59 .= '

	<ul class="ribbon">
    
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1'))
{
$__compilerVar59 .= '
			<li class="ribbon1">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2'))
{
$__compilerVar59 .= '
			<li class="ribbon2">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3'))
{
$__compilerVar59 .= '
			<li class="ribbon3">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4'))
{
$__compilerVar59 .= '
			<li class="ribbon4">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5'))
{
$__compilerVar59 .= '
			<li class="ribbon5">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6'))
{
$__compilerVar59 .= '
			<li class="ribbon6">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7'))
{
$__compilerVar59 .= '
			<li class="ribbon7">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8'))
{
$__compilerVar59 .= '
			<li class="ribbon8">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9'))
{
$__compilerVar59 .= '
			<li class="ribbon9">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10'))
{
$__compilerVar59 .= '
			<li class="ribbon10">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11'))
{
$__compilerVar59 .= '
			<li class="ribbon11">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12'))
{
$__compilerVar59 .= '
			<li class="ribbon12">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13'))
{
$__compilerVar59 .= '
			<li class="ribbon13">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14'))
{
$__compilerVar59 .= '
			<li class="ribbon14">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15'))
{
$__compilerVar59 .= '
			<li class="ribbon15">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16'))
{
$__compilerVar59 .= '
			<li class="ribbon16">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17'))
{
$__compilerVar59 .= '
			<li class="ribbon17">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18'))
{
$__compilerVar59 .= '
			<li class="ribbon18">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19'))
{
$__compilerVar59 .= '
			<li class="ribbon19">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20'))
{
$__compilerVar59 .= '
			<li class="ribbon20">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21'))
{
$__compilerVar59 .= '
			<li class="ribbon21">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22'))
{
$__compilerVar59 .= '
			<li class="ribbon22">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23'))
{
$__compilerVar59 .= '
			<li class="ribbon23">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24'))
{
$__compilerVar59 .= '
			<li class="ribbon24">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25'))
{
$__compilerVar59 .= '
			<li class="ribbon25">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26'))
{
$__compilerVar59 .= '
			<li class="ribbon26">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27'))
{
$__compilerVar59 .= '
			<li class="ribbon27">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28'))
{
$__compilerVar59 .= '
			<li class="ribbon28">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29'))
{
$__compilerVar59 .= '
			<li class="ribbon29">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30'))
{
$__compilerVar59 .= '
			<li class="ribbon30">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31'))
{
$__compilerVar59 .= '
			<li class="ribbon31">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32'))
{
$__compilerVar59 .= '
			<li class="ribbon32">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33'))
{
$__compilerVar59 .= '
			<li class="ribbon33">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34'))
{
$__compilerVar59 .= '
			<li class="ribbon34">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35'))
{
$__compilerVar59 .= '
			<li class="ribbon35">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35Title') . '
			</li>
		';
}
$__compilerVar59 .= '
		
	</ul>
';
}
$__compilerVar55 .= $__compilerVar59;
unset($__compilerVar59);
}
$__compilerVar55 .= '
    ';
$__compilerVar60 = '';
$__compilerVar60 .= '
			';
$__compilerVar61 = '';
$__compilerVar61 .= '
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowRegisterDate') AND $post['user_id'])
{
$__compilerVar61 .= '
					<dl class="pairsJustified">
						<dt>' . 'Joined' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::date($post['register_date'], '') . '</dd>
					</dl>
				';
}
$__compilerVar61 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowMessageCount') AND $post['user_id'])
{
$__compilerVar61 .= '
					<dl class="pairsJustified">
						<dt>' . 'Messages' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $post['user_id']
)) . '" class="concealed" rel="nofollow">' . XenForo_Template_Helper_Core::numberFormat($post['message_count'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar61 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTotalLikes') AND $post['user_id'])
{
$__compilerVar61 .= '
					<dl class="pairsJustified">
						<dt>' . 'Likes Received' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($post['like_count'], '0') . '</dd>
					</dl>
				';
}
$__compilerVar61 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTrophyPoints') AND $post['user_id'])
{
$__compilerVar61 .= '
					<dl class="pairsJustified">
						<dt>' . 'Trophy Points' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('members/trophies', $post, array()) . '" class="OverlayTrigger concealed">' . XenForo_Template_Helper_Core::numberFormat($post['trophy_points'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar61 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowGender') AND $post['gender'])
{
$__compilerVar61 .= '
					<dl class="pairsJustified">
						<dt>' . 'Gender' . ':</dt>
						<dd itemprop="gender">';
if ($post['gender'] == ('male'))
{
$__compilerVar61 .= 'Male';
}
else
{
$__compilerVar61 .= 'Female';
}
$__compilerVar61 .= '</dd>
					</dl>
				';
}
$__compilerVar61 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowOccupation') AND $post['occupation'])
{
$__compilerVar61 .= '
					<dl class="pairsJustified">
						<dt>' . 'Occupation' . ':</dt>
						<dd itemprop="role">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($post['occupation'], ENT_QUOTES, 'UTF-8')
)) . '</dd>
					</dl>
				';
}
$__compilerVar61 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowLocation') AND $post['location'])
{
$__compilerVar61 .= '
					<dl class="pairsJustified">
						<dt>' . 'Location' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('misc/location-info', '', array(
'location' => XenForo_Template_Helper_Core::string('censor', array(
'0' => $post['location'],
'1' => '-'
))
)) . '" target="_blank" rel="nofollow" itemprop="address" class="concealed">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($post['location'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar61 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowHomepage') AND $post['homepage'])
{
$__compilerVar61 .= '
					<dl class="pairsJustified">
						<dt>' . 'Home Page' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($post['homepage'], ENT_QUOTES, 'UTF-8'),
'1' => '-'
)) . '" rel="nofollow" target="_blank" itemprop="url">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($post['homepage'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar61 .= '
							
			';
$__compilerVar60 .= $this->callTemplateHook('message_user_info_extra', $__compilerVar61, array(
'user' => $post,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar61);
$__compilerVar60 .= '			
			';
if (XenForo_Template_Helper_Core::styleProperty('messageShowCustomFields') AND $post['customFields'])
{
$__compilerVar60 .= '
			';
$__compilerVar62 = '';
$__compilerVar62 .= '
			
				';
foreach ($userFieldsInfo AS $fieldId => $fieldInfo)
{
$__compilerVar62 .= '
					';
if ($fieldInfo['viewable_message'] AND ($fieldInfo['display_group'] != ('contact') OR $post['allow_view_identities'] == ('everyone') OR ($post['allow_view_identities'] == ('members') AND $visitor['user_id'])))
{
$__compilerVar62 .= '
						';
$__compilerVar63 = '';
$__compilerVar63 .= XenForo_Template_Helper_Core::callHelper('userFieldValue', array(
'0' => $fieldInfo,
'1' => $post,
'2' => $post['customFields'][$fieldId]
));
if (trim($__compilerVar63) !== '')
{
$__compilerVar62 .= '
							<dl class="pairsJustified userField_' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
								<dt>' . XenForo_Template_Helper_Core::callHelper('userFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
								<dd>' . $__compilerVar63 . '</dd>
							</dl>
						';
}
unset($__compilerVar63);
$__compilerVar62 .= '
					';
}
$__compilerVar62 .= '
				';
}
$__compilerVar62 .= '
				
			';
$__compilerVar60 .= $this->callTemplateHook('message_user_info_custom_fields', $__compilerVar62, array(
'user' => $post,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar62);
$__compilerVar60 .= '
			';
}
$__compilerVar60 .= '
			';
if (trim($__compilerVar60) !== '')
{
$__compilerVar55 .= '
		<div class="extraUserInfo">
			' . $__compilerVar60 . '
		</div>
	';
}
unset($__compilerVar60);
$__compilerVar55 .= '
		
';
}
$__compilerVar55 .= '

	<span class="arrow"><span></span></span>
</div>
</div>';
$__compilerVar54 .= $__compilerVar55;
unset($__compilerVar55);
$__compilerVar54 .= '

	<div class="messageInfo primaryContent">
		';
if ($post['isNew'])
{
$__compilerVar54 .= '<strong class="newIndicator"><span></span>' . 'New' . '</strong>';
}
$__compilerVar54 .= '
		
		';
$__compilerVar64 = '';
$__compilerVar64 .= '
					';
$__compilerVar65 = '';
$__compilerVar65 .= '
						';
if ($post['warning_message'])
{
$__compilerVar65 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($post['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar65 .= '
						';
if ($post['isDeleted'])
{
$__compilerVar65 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Deleted' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($post['isModerated'])
{
$__compilerVar65 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar65 .= '
						';
if ($post['isIgnored'])
{
$__compilerVar65 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="JsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar65 .= '
					';
$__compilerVar64 .= $this->callTemplateHook('message_notices', $__compilerVar65, array(
'message' => $post
));
unset($__compilerVar65);
$__compilerVar64 .= '
				';
if (trim($__compilerVar64) !== '')
{
$__compilerVar54 .= '
			<ul class="messageNotices">
				' . $__compilerVar64 . '
			</ul>
		';
}
unset($__compilerVar64);
$__compilerVar54 .= '
		
		';
$__compilerVar66 = '';
$__compilerVar66 .= '
		<div class="messageContent">		
			<article>
				<blockquote class="messageText SelectQuoteContainer ugc baseHtml' . (($post['isIgnored']) ? (' ignored') : ('')) . '">
					';
$__compilerVar67 = '';
$__compilerVar68 = '';
$__compilerVar67 .= $this->callTemplateHook('ad_message_body', $__compilerVar68, array());
unset($__compilerVar68);
$__compilerVar66 .= $__compilerVar67;
unset($__compilerVar67);
$__compilerVar66 .= '
					' . $post['messageHtml'] . '
					<div class="messageTextEndMarker">&nbsp;</div>
				</blockquote>
			</article>
			
			' . $__compilerVar48 . '
		</div>
		';
$__compilerVar54 .= $this->callTemplateHook('message_content', $__compilerVar66, array(
'message' => $post
));
unset($__compilerVar66);
$__compilerVar54 .= '
		
		';
if ($post['last_edit_date'])
{
$__compilerVar54 .= '
			<div class="editDate">
			';
if ($post['user_id'] == $post['last_edit_user_id'])
{
$__compilerVar54 .= '
				' . 'Last edited' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['last_edit_date'],array(
'time' => htmlspecialchars($post['last_edit_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else
{
$__compilerVar54 .= '
				' . 'Last edited by a moderator' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['last_edit_date'],array(
'time' => htmlspecialchars($post['last_edit_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
$__compilerVar54 .= '
			</div>
		';
}
$__compilerVar54 .= '
		
		';
if ($visitor['content_show_signature'] && $post['signature'])
{
$__compilerVar54 .= '
			<div class="baseHtml signature messageText ugc' . (($post['isIgnored']) ? (' ignored') : ('')) . '"><aside>' . $post['signatureHtml'] . '</aside></div>
		';
}
$__compilerVar54 .= '
		
		' . $__compilerVar51 . '
		
		';
$__compilerVar69 = '';
$__compilerVar54 .= $this->callTemplateHook('dark_postrating_likes_bar', $__compilerVar69, array(
'post' => $post,
'message_id' => $__compilerVar46
));
unset($__compilerVar69);
$__compilerVar54 .= '
	</div>

	';
$__compilerVar70 = '';
$__compilerVar54 .= $this->callTemplateHook('message_below', $__compilerVar70, array(
'post' => $post,
'message_id' => $__compilerVar46
));
unset($__compilerVar70);
$__compilerVar54 .= '
	
	';
$__compilerVar71 = '';
$__compilerVar72 = '';
$__compilerVar71 .= $this->callTemplateHook('ad_message_below', $__compilerVar72, array());
unset($__compilerVar72);
$__compilerVar54 .= $__compilerVar71;
unset($__compilerVar71);
$__compilerVar54 .= '
';
$__compilerVar73 = '';
$__compilerVar54 .= $this->callTemplateCallback('DigitalPointAdPositioning_Callback_AdBelowPost', 'renderAd', $__compilerVar73, array(
'dp_ads' => $dp_ads
));
unset($__compilerVar73);
$__compilerVar54 .= '
</li>';
$__compilerVar45 .= $__compilerVar54;
unset($__compilerVar46, $__compilerVar47, $__compilerVar48, $__compilerVar51, $__compilerVar54);
$__output .= $__compilerVar45;
unset($__compilerVar45);
$__output .= '
			';
}
$__output .= '
		';
}
$__output .= '
		' . '
	</ol>

	';
if ($inlineModOptions)
{
$__output .= '
		<div class="sectionFooter InlineMod Hide">
			<label for="ModerationSelect">' . 'Perform action with selected posts' . '...</label>

			';
$__compilerVar74 = '';
$__compilerVar75 = '';
$__compilerVar75 .= 'Post Moderation';
$__compilerVar76 = '';
$__compilerVar76 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar76 .= '<option value="delete">' . 'Delete Posts' . '...</option>';
}
$__compilerVar76 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar76 .= '<option value="undelete">' . 'Undelete Posts' . '</option>';
}
$__compilerVar76 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar76 .= '<option value="approve">' . 'Approve Posts' . '</option>';
}
$__compilerVar76 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar76 .= '<option value="unapprove">' . 'Unapprove Posts' . '</option>';
}
$__compilerVar76 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar76 .= '<option value="move">' . 'Move Posts' . '...</option>';
}
$__compilerVar76 .= '
		';
if ($inlineModOptions['copy'])
{
$__compilerVar76 .= '<option value="copy">' . 'Copy Posts' . '...</option>';
}
$__compilerVar76 .= '
		';
if ($inlineModOptions['merge'])
{
$__compilerVar76 .= '<option value="merge">' . 'Merge Posts' . '...</option>';
}
$__compilerVar76 .= '
		<option value="deselect">' . 'Deselect Posts' . '</option>
	';
$__compilerVar77 = '';
$__compilerVar77 .= 'Select / deselect all posts on this page';
$__compilerVar78 = '';
$__compilerVar78 .= 'Selected Posts';
$__compilerVar79 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar79 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar79 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Select All' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar77, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Move down' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Move up' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar78, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar79 .= '<input type="submit" class="button" value="' . 'Delete' . '..." name="delete" />';
}
$__compilerVar79 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar79 .= '<input type="submit" class="button" value="' . 'Approve' . '" name="approve" />';
}
$__compilerVar79 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Other Action' . '...</option>
				<optgroup label="' . 'Moderation Actions' . '">
					' . $__compilerVar76 . '
				</optgroup>
				<option value="closeOverlay">' . 'Close This Overlay' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Go' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar74 .= $__compilerVar79;
unset($__compilerVar75, $__compilerVar76, $__compilerVar77, $__compilerVar78, $__compilerVar79);
$__output .= $__compilerVar74;
unset($__compilerVar74);
$__output .= '
		</div>
	';
}
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

</form>

';
$__compilerVar80 = '';
$__compilerVar80 .= '
			';
if ($canQuickReply)
{
$__compilerVar80 .= '
				';
if ($postsRemaining)
{
$__compilerVar80 .= '
					<div class="linkGroup">
						';
if ($postsRemaining == 1)
{
$__compilerVar80 .= '
							<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => ($page + 1)
)) . '" class="postsRemaining">' . '1 more message' . '...</a>
						';
}
else
{
$__compilerVar80 .= '
							<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => ($page + 1)
)) . '" class="postsRemaining">' . '' . XenForo_Template_Helper_Core::numberFormat($postsRemaining, '0') . ' more messages' . '...</a>
						';
}
$__compilerVar80 .= '
					</div>
				';
}
$__compilerVar80 .= '
			';
}
else
{
$__compilerVar80 .= '
				<div class="linkGroup">
					';
if ($canReply)
{
$__compilerVar80 .= '
						<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array()) . '" class="callToAction"><span>' . 'Reply to Thread' . '</span></a>
					';
}
else if ($visitor['user_id'])
{
$__compilerVar80 .= '
						<span class="element">(' . 'You have insufficient privileges to reply here.' . ')</span>
					';
}
else
{
$__compilerVar80 .= '
						<label for="LoginControl"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="concealed element">(' . 'You must log in or sign up to reply here.' . ')</a></label>
					';
}
$__compilerVar80 .= '
				</div>
			';
}
$__compilerVar80 .= '
			<div class="linkGroup"' . ((!$ignoredNames) ? (' style="display: none"') : ('')) . '><a href="javascript:" class="muted JsOnly DisplayIgnoredContent Tooltip" title="' . 'Show hidden content by ' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $ignoredNames,
'1' => ', '
)) . '' . '">' . 'Show Ignored Content' . '</a></div>

			' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($postsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalPosts, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'threads', $thread, array(), htmlspecialchars($unreadLink, ENT_QUOTES, 'UTF-8'), array())) . '
		';
if (trim($__compilerVar80) !== '')
{
$__output .= '
	<div class="pageNavLinkGroup">
		' . $__compilerVar80 . '
	</div>
';
}
unset($__compilerVar80);
$__output .= '

';
$__compilerVar81 = '';
$__compilerVar82 = '';
$__compilerVar81 .= $this->callTemplateHook('ad_thread_view_below_messages', $__compilerVar82, array());
unset($__compilerVar82);
$__output .= $__compilerVar81;
unset($__compilerVar81);
$__output .= '

';
$__compilerVar83 = '';
$__output .= $this->callTemplateHook('thread_view_qr_before', $__compilerVar83, array(
'thread' => $thread
));
unset($__compilerVar83);
$__output .= '

';
if ($canQuickReply)
{
$__output .= '
	';
$__compilerVar84 = '';
$__compilerVar84 .= XenForo_Template_Helper_Core::link('threads/add-reply', $thread, array());
$__compilerVar85 = '';
$__compilerVar85 .= htmlspecialchars($lastPost['post_date'], ENT_QUOTES, 'UTF-8');
$__compilerVar86 = '';
$__compilerVar86 .= htmlspecialchars($thread['last_post_date'], ENT_QUOTES, 'UTF-8');
$__compilerVar87 = '';
$__compilerVar87 .= '1';
$__compilerVar88 = '';
$__compilerVar88 .= XenForo_Template_Helper_Core::link('threads/multi-quote', $thread, array(
'formId' => '#QuickReply'
));
$__compilerVar89 = '';
$this->addRequiredExternal('css', 'quick_reply');
$__compilerVar89 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar89 .= '

<div class="quickReply message">
	
	';
$__compilerVar90 = '';
$__compilerVar90 .= '1';
$__compilerVar91 = '';
$this->addRequiredExternal('css', 'message_user_info');
$__compilerVar91 .= '

<div class="messageUserInfo" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">	
<div class="messageUserBlock ' . (($visitor['isOnline']) ? ('online') : ('')) . '">
	';
$__compilerVar92 = '';
$__compilerVar92 .= '
		<div class="avatarHolder">
			<span class="helper"></span>
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($visitor,(true),array(
'user' => '$user',
'size' => 'm',
'img' => 'true'
),'')) . '
			';
if ($visitor['isOnline'])
{
$__compilerVar92 .= '<span class="Tooltip onlineMarker" title="' . 'Online Now' . '" data-offsetX="-22" data-offsetY="-8"></span>';
}
$__compilerVar92 .= '
			<!-- slot: message_user_info_avatar -->
		</div>
	';
$__compilerVar91 .= $this->callTemplateHook('message_user_info_avatar', $__compilerVar92, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar90
));
unset($__compilerVar92);
$__compilerVar91 .= '

';
if (!$__compilerVar90)
{
$__compilerVar91 .= '
	';
$__compilerVar93 = '';
$__compilerVar93 .= '
		<h3 class="userText">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($visitor,'',(true),array(
'itemprop' => 'name'
))) . '
			';
$__compilerVar94 = '';
$__compilerVar94 .= XenForo_Template_Helper_Core::callHelper('userTitle', array(
'0' => $visitor,
'1' => '1',
'2' => '1'
));
if (trim($__compilerVar94) !== '')
{
$__compilerVar93 .= '<em class="userTitle" itemprop="title">' . $__compilerVar94 . '</em>';
}
unset($__compilerVar94);
$__compilerVar93 .= '
			' . XenForo_Template_Helper_Core::callHelper('userBanner', array(
'0' => $visitor,
'1' => 'wrapped'
)) . '
			<!-- slot: message_user_info_text -->
		</h3>
	';
$__compilerVar91 .= $this->callTemplateHook('message_user_info_text', $__compilerVar93, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar90
));
unset($__compilerVar93);
$__compilerVar91 .= '
		
	';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar95 = '';
$__compilerVar95 .= '
';
if (!XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar95 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbons');
$__compilerVar95 .= '
';
}
$__compilerVar95 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar95 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbonsbadge');
$__compilerVar95 .= '
';
}
$__compilerVar95 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsSoftResponsiveFix'))
{
$__compilerVar95 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsSoftResponsiveFix');
$__compilerVar95 .= '
';
}
$__compilerVar95 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsXenMoodsFix'))
{
$__compilerVar95 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsXenMoodsFix');
$__compilerVar95 .= '
';
}
$__compilerVar95 .= '
    
';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar95 .= '

	<ul class="ribbon">
    
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1'))
{
$__compilerVar95 .= '
			<li class="ribbon1">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2'))
{
$__compilerVar95 .= '
			<li class="ribbon2">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3'))
{
$__compilerVar95 .= '
			<li class="ribbon3">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4'))
{
$__compilerVar95 .= '
			<li class="ribbon4">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5'))
{
$__compilerVar95 .= '
			<li class="ribbon5">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6'))
{
$__compilerVar95 .= '
			<li class="ribbon6">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7'))
{
$__compilerVar95 .= '
			<li class="ribbon7">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8'))
{
$__compilerVar95 .= '
			<li class="ribbon8">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9'))
{
$__compilerVar95 .= '
			<li class="ribbon9">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10'))
{
$__compilerVar95 .= '
			<li class="ribbon10">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11'))
{
$__compilerVar95 .= '
			<li class="ribbon11">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12'))
{
$__compilerVar95 .= '
			<li class="ribbon12">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13'))
{
$__compilerVar95 .= '
			<li class="ribbon13">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14'))
{
$__compilerVar95 .= '
			<li class="ribbon14">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15'))
{
$__compilerVar95 .= '
			<li class="ribbon15">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16'))
{
$__compilerVar95 .= '
			<li class="ribbon16">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17'))
{
$__compilerVar95 .= '
			<li class="ribbon17">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18'))
{
$__compilerVar95 .= '
			<li class="ribbon18">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19'))
{
$__compilerVar95 .= '
			<li class="ribbon19">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20'))
{
$__compilerVar95 .= '
			<li class="ribbon20">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21'))
{
$__compilerVar95 .= '
			<li class="ribbon21">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22'))
{
$__compilerVar95 .= '
			<li class="ribbon22">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23'))
{
$__compilerVar95 .= '
			<li class="ribbon23">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24'))
{
$__compilerVar95 .= '
			<li class="ribbon24">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25'))
{
$__compilerVar95 .= '
			<li class="ribbon25">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26'))
{
$__compilerVar95 .= '
			<li class="ribbon26">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27'))
{
$__compilerVar95 .= '
			<li class="ribbon27">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28'))
{
$__compilerVar95 .= '
			<li class="ribbon28">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29'))
{
$__compilerVar95 .= '
			<li class="ribbon29">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30'))
{
$__compilerVar95 .= '
			<li class="ribbon30">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31'))
{
$__compilerVar95 .= '
			<li class="ribbon31">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32'))
{
$__compilerVar95 .= '
			<li class="ribbon32">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33'))
{
$__compilerVar95 .= '
			<li class="ribbon33">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34'))
{
$__compilerVar95 .= '
			<li class="ribbon34">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35'))
{
$__compilerVar95 .= '
			<li class="ribbon35">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35Title') . '
			</li>
		';
}
$__compilerVar95 .= '
		
	</ul>
';
}
$__compilerVar91 .= $__compilerVar95;
unset($__compilerVar95);
}
$__compilerVar91 .= '
    ';
$__compilerVar96 = '';
$__compilerVar96 .= '
			';
$__compilerVar97 = '';
$__compilerVar97 .= '
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowRegisterDate') AND $visitor['user_id'])
{
$__compilerVar97 .= '
					<dl class="pairsJustified">
						<dt>' . 'Joined' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::date($visitor['register_date'], '') . '</dd>
					</dl>
				';
}
$__compilerVar97 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowMessageCount') AND $visitor['user_id'])
{
$__compilerVar97 .= '
					<dl class="pairsJustified">
						<dt>' . 'Messages' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id']
)) . '" class="concealed" rel="nofollow">' . XenForo_Template_Helper_Core::numberFormat($visitor['message_count'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar97 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTotalLikes') AND $visitor['user_id'])
{
$__compilerVar97 .= '
					<dl class="pairsJustified">
						<dt>' . 'Likes Received' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['like_count'], '0') . '</dd>
					</dl>
				';
}
$__compilerVar97 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTrophyPoints') AND $visitor['user_id'])
{
$__compilerVar97 .= '
					<dl class="pairsJustified">
						<dt>' . 'Trophy Points' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('members/trophies', $visitor, array()) . '" class="OverlayTrigger concealed">' . XenForo_Template_Helper_Core::numberFormat($visitor['trophy_points'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar97 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowGender') AND $visitor['gender'])
{
$__compilerVar97 .= '
					<dl class="pairsJustified">
						<dt>' . 'Gender' . ':</dt>
						<dd itemprop="gender">';
if ($visitor['gender'] == ('male'))
{
$__compilerVar97 .= 'Male';
}
else
{
$__compilerVar97 .= 'Female';
}
$__compilerVar97 .= '</dd>
					</dl>
				';
}
$__compilerVar97 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowOccupation') AND $visitor['occupation'])
{
$__compilerVar97 .= '
					<dl class="pairsJustified">
						<dt>' . 'Occupation' . ':</dt>
						<dd itemprop="role">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['occupation'], ENT_QUOTES, 'UTF-8')
)) . '</dd>
					</dl>
				';
}
$__compilerVar97 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowLocation') AND $visitor['location'])
{
$__compilerVar97 .= '
					<dl class="pairsJustified">
						<dt>' . 'Location' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('misc/location-info', '', array(
'location' => XenForo_Template_Helper_Core::string('censor', array(
'0' => $visitor['location'],
'1' => '-'
))
)) . '" target="_blank" rel="nofollow" itemprop="address" class="concealed">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['location'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar97 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowHomepage') AND $visitor['homepage'])
{
$__compilerVar97 .= '
					<dl class="pairsJustified">
						<dt>' . 'Home Page' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['homepage'], ENT_QUOTES, 'UTF-8'),
'1' => '-'
)) . '" rel="nofollow" target="_blank" itemprop="url">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['homepage'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar97 .= '
							
			';
$__compilerVar96 .= $this->callTemplateHook('message_user_info_extra', $__compilerVar97, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar90
));
unset($__compilerVar97);
$__compilerVar96 .= '			
			';
if (XenForo_Template_Helper_Core::styleProperty('messageShowCustomFields') AND $visitor['customFields'])
{
$__compilerVar96 .= '
			';
$__compilerVar98 = '';
$__compilerVar98 .= '
			
				';
foreach ($userFieldsInfo AS $fieldId => $fieldInfo)
{
$__compilerVar98 .= '
					';
if ($fieldInfo['viewable_message'] AND ($fieldInfo['display_group'] != ('contact') OR $visitor['allow_view_identities'] == ('everyone') OR ($visitor['allow_view_identities'] == ('members') AND $visitor['user_id'])))
{
$__compilerVar98 .= '
						';
$__compilerVar99 = '';
$__compilerVar99 .= XenForo_Template_Helper_Core::callHelper('userFieldValue', array(
'0' => $fieldInfo,
'1' => $visitor,
'2' => $visitor['customFields'][$fieldId]
));
if (trim($__compilerVar99) !== '')
{
$__compilerVar98 .= '
							<dl class="pairsJustified userField_' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
								<dt>' . XenForo_Template_Helper_Core::callHelper('userFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
								<dd>' . $__compilerVar99 . '</dd>
							</dl>
						';
}
unset($__compilerVar99);
$__compilerVar98 .= '
					';
}
$__compilerVar98 .= '
				';
}
$__compilerVar98 .= '
				
			';
$__compilerVar96 .= $this->callTemplateHook('message_user_info_custom_fields', $__compilerVar98, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar90
));
unset($__compilerVar98);
$__compilerVar96 .= '
			';
}
$__compilerVar96 .= '
			';
if (trim($__compilerVar96) !== '')
{
$__compilerVar91 .= '
		<div class="extraUserInfo">
			' . $__compilerVar96 . '
		</div>
	';
}
unset($__compilerVar96);
$__compilerVar91 .= '
		
';
}
$__compilerVar91 .= '

	<span class="arrow"><span></span></span>
</div>
</div>';
$__compilerVar89 .= $__compilerVar91;
unset($__compilerVar90, $__compilerVar91);
$__compilerVar89 .= '

	<form action="' . htmlspecialchars($__compilerVar84, ENT_QUOTES, 'UTF-8', (false)) . '" method="post" class="AutoValidator blendedEditor" data-optInOut="OptIn" id="QuickReply">

		' . $qrEditor . '<div class="floatLeft">';
$__compilerVar100 = '';
if ($captcha)
{
$__compilerVar100 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Verification' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__compilerVar89 .= $__compilerVar100;
unset($__compilerVar100);
$__compilerVar89 .= '</div>

		<div class="submitUnit">
			<div class="draftUpdate">
				<span class="draftSaved">' . 'Draft saved' . '</span>
				<span class="draftDeleted">' . 'Draft deleted' . '</span>
			</div>
			';
if ($xenOptions['multiQuote'] AND $__compilerVar88)
{
$__compilerVar89 .= '<input type="button" class="button JsOnly MultiQuoteWatcher insertQuotes" id="MultiQuote"
				value="' . 'Insert Quotes' . '..."
				tabindex="1"
				data-href="' . htmlspecialchars($__compilerVar88, ENT_QUOTES, 'UTF-8', (false)) . '"
				' . (($multiQuoteCookie) ? ('data-mq-cookie="' . htmlspecialchars($multiQuoteCookie, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
				data-add="' . '+ Quote' . '"
				data-add-message="' . 'Message added to multi-quote.' . '"
				data-remove="' . '− Quote' . '"
				data-remove-message="' . 'Message removed from multi-quote.' . '"
				data-cacheOverlay="false" />';
}
$__compilerVar89 .= '
			<input type="submit" class="button primary" value="' . 'Post Reply' . '" accesskey="s" />
			';
$__compilerVar101 = '';
if ($attachmentParams)
{
$__compilerVar101 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar101 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar101 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar101 .= '
	';
}
$__compilerVar101 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar101 .= '

	<span id="AttachmentUploader" class="buttonProxy AttachmentUploader"
		style="display: none"
		data-placeholder="#SWFUploadPlaceHolder"
		data-trigger="#ctrl_uploader"
		data-postname="upload"
		data-maxfilesize="' . htmlspecialchars($attachmentConstraints['size'], ENT_QUOTES, 'UTF-8') . '"
		data-maxuploads="' . htmlspecialchars($attachmentConstraints['count'], ENT_QUOTES, 'UTF-8') . '"
		data-extensions="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $attachmentConstraints['extensions'],
'1' => ','
)) . '"
		data-action="' . XenForo_Template_Helper_Core::link('full:attachments/do-upload.json', '', array(
'hash' => $attachmentParams['hash'],
'content_type' => $attachmentParams['content_type'],
'key' => $attachmentButtonKey
)) . '"
		data-uniquekey="' . htmlspecialchars($attachmentButtonKey, ENT_QUOTES, 'UTF-8') . '"
		data-err-110="' . 'The uploaded file is too large.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '"
			id="ctrl_uploader" class="button OverlayTrigger DisableOnSubmit"
			data-href="' . XenForo_Template_Helper_Core::link('full:attachments/upload', '', array(
'_params' => $attachmentParams,
'key' => $attachmentButtonKey
)) . '"
			data-hider="#AttachmentUploader" />
		<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
		';
foreach ($attachmentParams['content_data'] AS $dataKey => $dataValue)
{
$__compilerVar101 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar101 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '</a>
	</noscript>

';
}
$__compilerVar89 .= $__compilerVar101;
unset($__compilerVar101);
$__compilerVar89 .= '
			';
if ($__compilerVar87)
{
$__compilerVar89 .= '<input type="submit" class="button DisableOnSubmit" value="' . 'More Options' . '..." name="more_options" />';
}
$__compilerVar89 .= '
		</div>
		
		';
if ($attachmentParams)
{
$__compilerVar89 .= '
			';
$__compilerVar102 = $attachmentParams['attachments'];
$__compilerVar103 = '';
if ($attachmentParams)
{
$__compilerVar103 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar103 .= '
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar103 .= '
	
	<div class="AttachmentEditor">
	
		';
if ($showUploadButton)
{
$__compilerVar103 .= '
			';
$__compilerVar104 = '';
if ($attachmentParams)
{
$__compilerVar104 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar104 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar104 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar104 .= '
	';
}
$__compilerVar104 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar104 .= '

	<span id="AttachmentUploader" class="buttonProxy AttachmentUploader"
		style="display: none"
		data-placeholder="#SWFUploadPlaceHolder"
		data-trigger="#ctrl_uploader"
		data-postname="upload"
		data-maxfilesize="' . htmlspecialchars($attachmentConstraints['size'], ENT_QUOTES, 'UTF-8') . '"
		data-maxuploads="' . htmlspecialchars($attachmentConstraints['count'], ENT_QUOTES, 'UTF-8') . '"
		data-extensions="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $attachmentConstraints['extensions'],
'1' => ','
)) . '"
		data-action="' . XenForo_Template_Helper_Core::link('full:attachments/do-upload.json', '', array(
'hash' => $attachmentParams['hash'],
'content_type' => $attachmentParams['content_type'],
'key' => $attachmentButtonKey
)) . '"
		data-uniquekey="' . htmlspecialchars($attachmentButtonKey, ENT_QUOTES, 'UTF-8') . '"
		data-err-110="' . 'The uploaded file is too large.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '"
			id="ctrl_uploader" class="button OverlayTrigger DisableOnSubmit"
			data-href="' . XenForo_Template_Helper_Core::link('full:attachments/upload', '', array(
'_params' => $attachmentParams,
'key' => $attachmentButtonKey
)) . '"
			data-hider="#AttachmentUploader" />
		<span class="HiddenInput" data-name="_xfSessionId" data-value="' . htmlspecialchars($sessionId, ENT_QUOTES, 'UTF-8') . '"></span>
		';
foreach ($attachmentParams['content_data'] AS $dataKey => $dataValue)
{
$__compilerVar104 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar104 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Upload a File')) . '</a>
	</noscript>

';
}
$__compilerVar103 .= $__compilerVar104;
unset($__compilerVar104);
$__compilerVar103 .= '
		';
}
$__compilerVar103 .= '
		
		<div class="NoAttachments"></div>
		
		<div class="secondaryContent AttachmentInsertAllBlock JsOnly">
			<span></span>
			<div class="AttachmentText">
				<div class="label">' . 'Insert every image as a' . '...</div>
				<div class="controls">
					<!--<input type="button" value="' . 'Delete All' . '" class="button _smallButton AttachmentDeleteAll" />-->
					<input type="button" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInsertAll" name="thumb" />
					<input type="button" value="' . 'Full Image' . '" class="button smallButton AttachmentInsertAll" name="image" />
				</div>
			</div>
		</div>
	
		<ol class="AttachmentList New">
			';
$__compilerVar105 = '';
$__compilerVar105 .= '1';
$__compilerVar106 = '';
$__compilerVar107 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar107 .= '

<li id="' . (($__compilerVar105) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($__compilerVar106['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($__compilerVar106 and $__compilerVar106['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($__compilerVar106 and $__compilerVar106['thumbnailUrl'])
{
$__compilerVar107 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar106, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($__compilerVar106['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($__compilerVar106['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($__compilerVar106['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar106, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar107 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar107 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar106, array()) . '" target="_blank">' . (($__compilerVar106) ? (htmlspecialchars($__compilerVar106['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($__compilerVar105)
{
$__compilerVar107 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar107 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($__compilerVar106['thumbnailUrl'])
{
$__compilerVar107 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar107 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $__compilerVar106, array()) . '" />
			
				';
if ($__compilerVar106['thumbnailUrl'])
{
$__compilerVar107 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar107 .= '
			</div>
		';
}
$__compilerVar107 .= '

	</div>
	
</li>';
$__compilerVar103 .= $__compilerVar107;
unset($__compilerVar105, $__compilerVar106, $__compilerVar107);
$__compilerVar103 .= '
			';
if ($__compilerVar102)
{
$__compilerVar103 .= '
				';
foreach ($__compilerVar102 AS $attachment)
{
$__compilerVar103 .= '
					';
if ($attachment['temp_hash'])
{
$__compilerVar103 .= '
						';
$__compilerVar108 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar108 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar108 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar108 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar108 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar108 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar108 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar108 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar108 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar108 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar108 .= '
			</div>
		';
}
$__compilerVar108 .= '

	</div>
	
</li>';
$__compilerVar103 .= $__compilerVar108;
unset($__compilerVar108);
$__compilerVar103 .= '
					';
}
$__compilerVar103 .= '
				';
}
$__compilerVar103 .= '
			';
}
$__compilerVar103 .= '
		</ol>
	
		';
if ($__compilerVar102)
{
$__compilerVar103 .= '
			';
$__compilerVar109 = '';
$__compilerVar109 .= '
					';
foreach ($__compilerVar102 AS $attachment)
{
$__compilerVar109 .= '
						';
if (!$attachment['temp_hash'])
{
$__compilerVar109 .= '
							';
$__compilerVar110 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar110 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar110 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar110 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar110 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar110 .= '
			<input type="button" value="' . 'Cancel' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar110 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Delete' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar110 .= '
				<div class="label JsOnly">' . 'Insert' . ':</div>
			';
}
$__compilerVar110 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Delete' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar110 .= '
					<input type="button" name="thumb" value="' . 'Thumbnail' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Full Image' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar110 .= '
			</div>
		';
}
$__compilerVar110 .= '

	</div>
	
</li>';
$__compilerVar109 .= $__compilerVar110;
unset($__compilerVar110);
$__compilerVar109 .= '
						';
}
$__compilerVar109 .= '
					';
}
$__compilerVar109 .= '
				';
if (trim($__compilerVar109) !== '')
{
$__compilerVar103 .= '
			<ol class="AttachmentList Existing">
				' . $__compilerVar109 . '
			</ol>
			';
}
unset($__compilerVar109);
$__compilerVar103 .= '
		';
}
$__compilerVar103 .= '
		
		<input type="hidden" name="attachment_hash" value="' . htmlspecialchars($attachmentParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
		
		' . '
		
	</div>
	
';
}
$__compilerVar89 .= $__compilerVar103;
unset($__compilerVar102, $__compilerVar103);
$__compilerVar89 .= '
		';
}
$__compilerVar89 .= '

		<input type="hidden" name="last_date" value="' . htmlspecialchars($__compilerVar85, ENT_QUOTES, 'UTF-8') . '" data-load-value="' . htmlspecialchars($__compilerVar85, ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="last_known_date" value="' . htmlspecialchars($__compilerVar86, ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

	</form>

</div>';
$__output .= $__compilerVar89;
unset($__compilerVar84, $__compilerVar85, $__compilerVar86, $__compilerVar87, $__compilerVar88, $__compilerVar89);
$__output .= '
';
}
$__output .= '

';
$__compilerVar111 = '';
if ($similarThreads AND $showBelowQuickReply)
{
$__compilerVar111 .= '

';
if (!($showBelowFirstPost AND $showBelowQuickReply) OR $page > 1)
{
$__compilerVar111 .= '

    <div class="sectionMain similarThreadsThreadView">
    
        <div class="primaryContent">
        ';
if ($xenOptions['similarThreadsShowSearchWords'] == 1)
{
$__compilerVar111 .= '
        	' . 'Similar Threads:' . ' ' . htmlspecialchars($searchWord1, ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($searchWord2, ENT_QUOTES, 'UTF-8') . '
        ';
}
$__compilerVar111 .= '
        ';
if ($xenOptions['similarThreadsShowSearchWords'] == 0)
{
$__compilerVar111 .= '
        	' . 'Similar Threads' . '
        ';
}
$__compilerVar111 .= '
        </div>
        
        <table class="dataTable">
        
        <tr class="dataRow">
        <th>' . 'Forum' . '</th>
        <th>' . 'Title' . '</th>
        <th>' . 'Date' . '</th>
        </tr>
        
        ';
foreach ($similarThreads AS $index => $similarThread)
{
$__compilerVar111 .= '
        
            <tr class="dataRow">
            <td>' . htmlspecialchars($similarThread['nodetitle'], ENT_QUOTES, 'UTF-8') . '</td>
            <td><a href="' . XenForo_Template_Helper_Core::link('threads', $similarThread, array()) . '" title="' . htmlspecialchars($similarThread['title'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($similarThread['title'], ENT_QUOTES, 'UTF-8') . '</a></td>
            <td>' . XenForo_Template_Helper_Core::datetime($similarThread['post_date'], '') . '</td>
            </tr>
        
        ';
}
$__compilerVar111 .= '
        
        </table>

    </div>
    <br />

';
}
$__compilerVar111 .= '

';
}
$__output .= $__compilerVar111;
unset($__compilerVar111);
$__output .= '
';
$__compilerVar112 = '';
$__output .= $this->callTemplateHook('thread_view_qr_after', $__compilerVar112, array(
'thread' => $thread
));
unset($__compilerVar112);
$__output .= '

' . $threadStatusHtml . '

';
if ((($xenOptions['rrssb_turnOn_bottomHook']['enabled']) ? ' checked="checked"' : ''))
{
$__output .= '
    
';
}
else
{
$__output .= '
';
$__compilerVar113 = '';
$__compilerVar113 .= XenForo_Template_Helper_Core::link('canonical:threads', $thread, array());
$__compilerVar114 = '';
$__compilerVar115 = '';
$__compilerVar115 .= '
			';
$__compilerVar116 = '';
$__compilerVar116 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar116 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar113, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar116 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar116 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar113, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar116 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar116 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar116 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar113, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar116 .= '
			';
$__compilerVar115 .= $this->callTemplateHook('share_page_options', $__compilerVar116, array());
unset($__compilerVar116);
$__compilerVar115 .= '
		';
if (trim($__compilerVar115) !== '')
{
$__compilerVar114 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar114 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Share This Page' . '</h3>
		' . $__compilerVar115 . '
	</div>
';
}
unset($__compilerVar115);
$__output .= $__compilerVar114;
unset($__compilerVar113, $__compilerVar114);
$__output .= '
';
}
