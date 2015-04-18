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
$__compilerVar117 = '';
$__compilerVar117 .= XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__compilerVar118 = '';
$this->addRequiredExternal('css', 'resource_view_header');
$__compilerVar118 .= '

<div class="resourceInfo">
';
$__compilerVar119 = '';
$__compilerVar119 .= '
	';
$__compilerVar120 = '';
$__compilerVar120 .= '
			';
if ($resource['external_purchase_url'])
{
$__compilerVar120 .= '
				<li><label class="downloadButton purchase">
					<a href="' . htmlspecialchars($resource['external_purchase_url'], ENT_QUOTES, 'UTF-8') . '" class="inner">
						' . 'Buy Now for ' . htmlspecialchars($resource['cost'], ENT_QUOTES, 'UTF-8') . '' . '
					</a>
				</label></li>
			';
}
else if (!$resource['is_fileless'])
{
$__compilerVar120 .= '
				<li><label class="downloadButton ' . ((!$resource['canDownload']) ? ('downloadDisabled') : ('')) . '">
					<a href="' . XenForo_Template_Helper_Core::link('resources/download', $resource, array(
'version' => $resource['current_version_id']
)) . '" class="inner">
						';
if ($resource['canDownload'])
{
$__compilerVar120 .= 'Download Now';
}
else
{
$__compilerVar120 .= 'Đăng Ký Để Download';
}
$__compilerVar120 .= '
						';
if ($resource['download_url'])
{
$__compilerVar120 .= '
							<small class="minorText">' . 'Via external site' . '</small>
						';
}
else
{
$__compilerVar120 .= '
							<small class="minorText">' . XenForo_Template_Helper_Core::numberFormat($resource['attachment']['file_size'], 'size') . ' .' . htmlspecialchars($resource['attachment']['extension'], ENT_QUOTES, 'UTF-8') . '</small>
						';
}
$__compilerVar120 .= '
					</a>
				</label></li>
			';
}
$__compilerVar120 .= '

			';
$__compilerVar121 = '';
$__compilerVar120 .= $this->callTemplateHook('resource_view_header_after_resource_buttons', $__compilerVar121, array());
unset($__compilerVar121);
$__compilerVar120 .= '
		';
if (trim($__compilerVar120) !== '')
{
$__compilerVar119 .= '
		<ul class="primaryLinks ' . (($resource['is_fileless'] AND !$resource['external_purchase_url']) ? ('noButton') : ('')) . '">
		' . $__compilerVar120 . '
		</ul>
	';
}
unset($__compilerVar120);
$__compilerVar119 .= '

	<div class="resourceImage">
		';
if ($xenOptions['resourceAllowIcons'])
{
$__compilerVar119 .= '
			<img src="' . XenForo_Template_Helper_Core::callHelper('resourceiconurl', array(
'0' => $resource
)) . '" alt="" class="resourceIcon" />
		';
}
else
{
$__compilerVar119 .= '
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '
		';
}
$__compilerVar119 .= '
	</div>

	<h1>';
if ($__compilerVar117 AND $__compilerVar117 != htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8', true))
{
$__compilerVar119 .= $__compilerVar117;
}
else
{
$__compilerVar119 .= XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar119 .= ' ';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar119 .= '<span class="muted">' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__compilerVar119 .= '</h1>
	';
if ($resource['tag_line'] OR $extraDescriptionHtml)
{
$__compilerVar119 .= '<p class="tagLine muted">' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8');
if ($resource['tag_line'] AND $extraDescriptionHtml)
{
$__compilerVar119 .= '<br />';
}
$__compilerVar119 .= $extraDescriptionHtml . '</p>';
}
$__compilerVar119 .= '
';
$__compilerVar118 .= $this->callTemplateHook('resource_view_header_info', $__compilerVar119, array());
unset($__compilerVar119);
$__compilerVar118 .= '
</div>

';
$__compilerVar122 = '';
$__compilerVar118 .= $this->callTemplateHook('resource_view_header_after_info', $__compilerVar122, array());
unset($__compilerVar122);
$__compilerVar118 .= '

';
if ($resource['resource_state'] != ('visible'))
{
$__compilerVar118 .= '
	<ul class="secondaryContent resourceAlerts">
	';
if ($resource['resource_state'] == ('deleted'))
{
$__compilerVar118 .= '
		<li class="deletedAlert">
			<span class="icon"></span>
			' . 'This resource has been deleted.' . '
			';
if ($resource['delete_user_id'])
{
$__compilerVar118 .= '
				' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => array(
'user_id' => $resource['delete_user_id'],
'username' => $resource['delete_username']
)
)) . '' . ', ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['delete_date'],array(
'time' => htmlspecialchars($resource['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($resource['delete_reason'])
{
$__compilerVar118 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($resource['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar118 .= '.
			';
}
$__compilerVar118 .= '
		</li>
	';
}
$__compilerVar118 .= '
	';
if ($resource['resource_state'] == ('moderated'))
{
$__compilerVar118 .= '
		<li class="moderatedAlert">
			<span class="icon"></span>
			' . 'This resource is currently awaiting approval.' . '
		</li>
	';
}
$__compilerVar118 .= '
	</ul>
';
}
$__output .= $__compilerVar118;
unset($__compilerVar117, $__compilerVar118);
$__output .= '
	';
$__compilerVar123 = 'discussion';
$__compilerVar124 = '';
$this->addRequiredExternal('css', 'resource_view_tabs');
$__compilerVar124 .= '

<div class="resourceTabs">
	';
if ($resource['canWatch'])
{
$__compilerVar124 .= '
		<div class="extraLinks">
			<a href="' . XenForo_Template_Helper_Core::link('resources/watch', $resource, array()) . '" class="OverlayTrigger watchLink" data-cacheoverlay="false">';
if ($resource['is_watched'])
{
$__compilerVar124 .= 'Unwatch This Resource';
}
else
{
$__compilerVar124 .= 'Watch This Resource';
}
$__compilerVar124 .= '</a>
		</div>
	';
}
$__compilerVar124 .= '
	<ul class="tabs">
	';
$__compilerVar125 = '';
$__compilerVar125 .= '
		<li class="resourceTabDescription ' . (($__compilerVar123 == ('description')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . 'Overview' . '</a>
		</li>
		';
if ($resource['showExtraInfoTab'])
{
$__compilerVar125 .= '
			<li class="resourceTabExtra ' . (($__compilerVar123 == ('extra')) ? ('active') : ('')) . '">
				<a href="' . XenForo_Template_Helper_Core::link('resources/extra', $resource, array()) . '">' . 'Extra Info' . '</a>
			</li>
		';
}
$__compilerVar125 .= '		
		';
if ($resource['customFieldTabs'])
{
$__compilerVar125 .= '
			';
foreach ($resource['customFieldTabs'] AS $fieldId)
{
$__compilerVar125 .= '
				<li class="resourceTabExtra ' . (($__compilerVar123 == ('field_' . $fieldId)) ? ('active') : ('')) . '">
					<a href="' . XenForo_Template_Helper_Core::link('resources/field', $resource, array(
'field' => $fieldId
)) . '">' . XenForo_Template_Helper_Core::callHelper('resourceFieldTitle', array(
'0' => $fieldId
)) . '</a>
				</li>
			';
}
$__compilerVar125 .= '
		';
}
$__compilerVar125 .= '
		';
if ($resource['update_count'] or $resourceUpdateCount)
{
$__compilerVar125 .= '<li class="resourceTabUpdates ' . (($__compilerVar123 == ('updates')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources/updates', $resource, array()) . '">' . 'Updates' . ' (' . XenForo_Template_Helper_Core::numberFormat($resourceUpdateCount, '0') . ')</a>
		</li>';
}
$__compilerVar125 .= '
		';
if ($resource['review_count'])
{
$__compilerVar125 .= '<li class="resourceTabReviews ' . (($__compilerVar123 == ('reviews')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources/reviews', $resource, array()) . '">' . 'Reviews' . ' (' . htmlspecialchars($resource['review_count'], ENT_QUOTES, 'UTF-8') . ')</a>
		</li>';
}
$__compilerVar125 .= '
		';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar125 .= '<li class="resourceTabHistory ' . (($__compilerVar123 == ('history')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources/history', $resource, array()) . '">' . 'Version History' . '</a>
			</li>';
}
$__compilerVar125 .= '
		';
if ($thread)
{
$__compilerVar125 .= '<li class="resourceTabDiscussion ' . (($__compilerVar123 == ('discussion')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '">' . 'Discussion' . '</a>
		</li>';
}
$__compilerVar125 .= '
	';
$__compilerVar124 .= $this->callTemplateHook('resource_view_tabs', $__compilerVar125, array());
unset($__compilerVar125);
$__compilerVar124 .= '
	</ul>
</div>';
$__output .= $__compilerVar124;
unset($__compilerVar123, $__compilerVar124);
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
	' . 'Thảo luận trong \'' . '<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '">' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</a>' . '\' bắt đầu bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
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
$__compilerVar126 = '';
$__compilerVar126 .= XenForo_Template_Helper_Core::link('canonical:threads', $thread, array());
$__compilerVar127 = '';
$__compilerVar127 .= XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8');
$__compilerVar128 = '';
$__compilerVar128 .= XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $firstPost['message'],
'1' => '155'
));
$__compilerVar129 = '';
$__compilerVar129 .= XenForo_Template_Helper_Core::callHelper('avatar', array(
'0' => $thread,
'1' => 'm',
'2' => '0',
'3' => '1'
));
$__compilerVar130 = '';
if ($xenOptions['facebookAppId'] OR $xenOptions['facebookAdmins'])
{
$__compilerVar130 .= '
	<meta property="og:site_name" content="' . htmlspecialchars($xenOptions['boardTitle'], ENT_QUOTES, 'UTF-8') . '" />
	';
if ($__compilerVar129)
{
$__compilerVar130 .= '<meta property="og:image" content="' . htmlspecialchars($__compilerVar129, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar130 .= '
	<meta property="og:image" content="';
$__compilerVar131 = '';
$__compilerVar131 .= XenForo_Template_Helper_Core::callHelper('fullurl', array(
'0' => XenForo_Template_Helper_Core::styleProperty('ogLogoPath'),
'1' => '1'
));
$__compilerVar130 .= $this->callTemplateCallback('OpenGraphImage_Callback', 'getImage', $__compilerVar131, array());
unset($__compilerVar131);
$__compilerVar130 .= '" />
	<meta property="og:type" content="' . (($ogType) ? (htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8')) : ('article')) . '" />
	<meta property="og:url" content="' . $__compilerVar126 . '" />
	<meta property="og:title" content="' . $__compilerVar127 . '" />
	';
if ($__compilerVar128)
{
$__compilerVar130 .= '<meta property="og:description" content="' . $__compilerVar128 . '" />';
}
$__compilerVar130 .= '
	' . $ogExtraHtml . '
	';
if ($xenOptions['facebookAppId'])
{
$__compilerVar130 .= '<meta property="fb:app_id" content="' . htmlspecialchars($xenOptions['facebookAppId'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar130 .= '
	';
if ($xenOptions['facebookAdmins'])
{
$__compilerVar130 .= '<meta property="fb:admins" content="' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $xenOptions['facebookAdmins'],
'1' => ','
)) . '" />';
}
$__compilerVar130 .= '
';
}
$__extraData['head']['openGraph'] .= $__compilerVar130;
unset($__compilerVar126, $__compilerVar127, $__compilerVar128, $__compilerVar129, $__compilerVar130);
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
$__compilerVar132 = '';
$__compilerVar132 .= '<label title="' . 'Search only ' . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="type[post][thread_id]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_thread" class="AutoChecker"
	data-uncheck="#search_bar_title_only, #search_bar_nodes" /> ' . 'Search this thread only' . '</label>';
$__extraData['searchBar']['thread'] .= $__compilerVar132;
unset($__compilerVar132);
$__output .= '
';
$__extraData['searchBar']['forum'] = '';
$__compilerVar133 = '';
$__compilerVar133 .= '<label title="' . 'Search only ' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '' . '"><input type="checkbox" name="nodes[]" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '"
	id="search_bar_nodes" class="Disabler AutoChecker" checked="checked"
	data-uncheck="#search_bar_thread" /> ' . 'Search this forum only' . '</label>
	<ul id="search_bar_nodes_Disabler">
		<li><label><input type="checkbox" name="type[post][group_discussion]" value="1"
			id="search_bar_group_discussion" class="AutoChecker"
			data-uncheck="#search_bar_thread" /> ' . 'Hiển thị kết quả dạng Chủ đề' . '</label></li>
	</ul>';
$__extraData['searchBar']['forum'] .= $__compilerVar133;
unset($__compilerVar133);
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
$__compilerVar134 = '';
$__compilerVar134 .= '
			';
if ($poll['canVote'] AND !$poll['hasVoted'])
{
$__compilerVar134 .= '
				';
$__compilerVar135 = '';
$__compilerVar135 .= '
		
<div>		
	<ol class="pollOptions">
		';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__compilerVar135 .= '
			<li class="pollOption"><label>';
if ($poll['max_votes'] != 1)
{
$__compilerVar135 .= '
				<input type="checkbox" name="response_multiple[]" class="PollResponse" value="' . htmlspecialchars($pollResponseId, ENT_QUOTES, 'UTF-8') . '" />';
}
else
{
$__compilerVar135 .= '
				<input type="radio" name="response" value="' . htmlspecialchars($pollResponseId, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar135 .= '
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '</label></li>				
		';
}
$__compilerVar135 .= '
	</ol>
	
	<div class="buttons">
		';
$__compilerVar136 = '';
$__compilerVar136 .= '
				';
if ($poll['max_votes'] == 0 OR $poll['max_votes'] > count($poll['responses']))
{
$__compilerVar136 .= '
					<span class="multipleNote muted">' . 'Multiple votes are allowed.' . '</span>
				';
}
else if ($poll['max_votes'] > 1)
{
$__compilerVar136 .= '
					<span class="multipleNote muted">' . 'You may select up to ' . htmlspecialchars($poll['max_votes'], ENT_QUOTES, 'UTF-8') . ' choices.' . '</span>
				';
}
$__compilerVar136 .= '
				';
if ($poll['public_votes'])
{
$__compilerVar136 .= '
					<span class="publicWarning muted">' . 'Your vote will be publicly visible.' . '</span>
				';
}
$__compilerVar136 .= '
				';
if (!$poll['canViewResults'])
{
$__compilerVar136 .= '
					<div class="noResultsNote muted">' . 'Results are only viewable after voting.' . '</div>
				';
}
$__compilerVar136 .= '
			';
if (trim($__compilerVar136) !== '')
{
$__compilerVar135 .= '
			<div class="pollNotes">
			' . $__compilerVar136 . '
			</div>
		';
}
unset($__compilerVar136);
$__compilerVar135 .= '
			
		<input type="submit" class="button primary" value="' . 'Bỏ phiếu của bạn' . '" accesskey="s" />
		';
if ($poll['canViewResults'])
{
$__compilerVar135 .= '
			<input type="button" value="' . 'Xem kết quả' . '" class="button OverlayTrigger JsOnly" data-href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array()) . '" />
			<noscript><a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array()) . '" class="button">' . 'Xem kết quả' . '</a></noscript>
		';
}
$__compilerVar135 .= '
	</div>
</div>';
$__compilerVar134 .= $__compilerVar135;
unset($__compilerVar135);
$__compilerVar134 .= '
			';
}
else
{
$__compilerVar134 .= '
				';
$__compilerVar137 = '';
$__compilerVar137 .= '

<div class="overlayScroll pollResultsOverlay">

	<ol class="pollResults ' . ((!$poll['canViewResults']) ? ('noResults') : ('')) . '">
	';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__compilerVar137 .= '
		<li class="pollResult ' . (($response['hasVoted']) ? ('voted') : ('')) . '">
			';
if ($response['hasVoted'])
{
$__compilerVar137 .= '
				<div class="votedIconCell" title="' . 'Bình chọn của bạn' . '">*</div>
			';
}
else
{
$__compilerVar137 .= '
				<div class="votedIconCell"></div>
			';
}
$__compilerVar137 .= '
			<h3 class="optionText" ' . (($response['hasVoted']) ? ('title="' . 'Bình chọn của bạn' . '"') : ('')) . '>
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '
			</h3>
			';
if ($poll['canViewResults'])
{
$__compilerVar137 .= '
				<div class="barCell">
					<span class="barContainer">
						';
if ($response['response_vote_count'])
{
$__compilerVar137 .= '<span class="bar" style="width: ' . (100 * $response['response_vote_count'] / $poll['voter_count']) . '%"></span>';
}
$__compilerVar137 .= '
					</span>
				</div>
				<div class="count">
					';
if ($poll['public_votes'] AND $response['response_vote_count'])
{
$__compilerVar137 .= '
						<a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array(
'poll_response_id' => $pollResponseId
)) . '" class="concealed OverlayTrigger">' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' phiếu' . '</a>
					';
}
else
{
$__compilerVar137 .= '
						' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' phiếu' . '
					';
}
$__compilerVar137 .= '
				</div>
				<div class="percentage">
					';
if ($poll['voter_count'])
{
$__compilerVar137 .= '
						' . XenForo_Template_Helper_Core::numberFormat((100 * $response['response_vote_count'] / $poll['voter_count']), '1') . '%
					';
}
else
{
$__compilerVar137 .= '
						' . XenForo_Template_Helper_Core::numberFormat('0', '1') . '%
					';
}
$__compilerVar137 .= '
				</div>
			';
}
$__compilerVar137 .= '
		</li>
	';
}
$__compilerVar137 .= '
	</ol>
	
	<div class="buttons">
		';
$__compilerVar138 = '';
$__compilerVar138 .= '
				';
if ($poll['max_votes'] != 1)
{
$__compilerVar138 .= '
					<span class="multipleNote muted">' . 'Multiple votes are allowed.' . '</span>
				';
}
$__compilerVar138 .= '
				';
if (!$poll['canViewResults'])
{
$__compilerVar138 .= '
					<div class="noResultsNote muted">' . 'Results are only viewable after voting.' . '</div>
				';
}
$__compilerVar138 .= '
			';
if (trim($__compilerVar138) !== '')
{
$__compilerVar137 .= '
			<div class="pollNotes">
			' . $__compilerVar138 . '
			</div>
		';
}
unset($__compilerVar138);
$__compilerVar137 .= '
		
		';
if ($poll['canVote'])
{
$__compilerVar137 .= '
			<a href="' . XenForo_Template_Helper_Core::link('threads/poll/vote', $thread, array()) . '" class="button PollChangeVote nonOverlayOnly">' . 'Change Your Vote' . '</a>
		';
}
$__compilerVar137 .= '
	</div>
</div>';
$__compilerVar134 .= $__compilerVar137;
unset($__compilerVar137);
$__compilerVar134 .= '
			';
}
$__compilerVar134 .= '
		';
$__compilerVar139 = '';
$this->addRequiredExternal('css', 'polls');
$__compilerVar139 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar139 .= '

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
$__compilerVar139 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/poll/edit', $thread, array()) . '" class="editLink">' . 'Sửa' . '</a>';
}
$__compilerVar139 .= '
					
					';
if ($poll['close_date'])
{
$__compilerVar139 .= '
						<div class="pollNotes closeDate muted">
							';
if ($poll['open'])
{
$__compilerVar139 .= '
								' . 'This poll will close on ' . XenForo_Template_Helper_Core::datetime($poll['close_date'], 'absolute') . '.' . '
							';
}
else
{
$__compilerVar139 .= '
								' . 'Poll closed ' . XenForo_Template_Helper_Core::datetime($poll['close_date'], '') . '.' . '
							';
}
$__compilerVar139 .= '
						</div>
					';
}
$__compilerVar139 .= '
				</div>
					
				' . $__compilerVar134 . '
			</div>
		</div>
	
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>';
$__output .= $__compilerVar139;
unset($__compilerVar134, $__compilerVar139);
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
$__compilerVar140 = '';
$__compilerVar140 .= '
				';
if ($thread['discussion_state'] == ('deleted'))
{
$__compilerVar140 .= '
					<dd class="deletedAlert">
						<span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip"></span>
							' . 'Removed from public view.' . '</dd>
				';
}
else if ($thread['discussion_state'] == ('moderated'))
{
$__compilerVar140 .= '
					<dd class="moderatedAlert">
						<span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip"></span>
							' . 'Awaiting moderation before being displayed publicly.' . '</dd>
				';
}
$__compilerVar140 .= '
	
				';
if (!$thread['discussion_open'])
{
$__compilerVar140 .= '
					<dd class="lockedAlert">
						<span class="icon Tooltip" title="' . 'Đã khóa' . '" data-tipclass="iconTip"></span>
							' . 'Không mở trả lời sau này.' . '</dd>
				';
}
$__compilerVar140 .= '
			';
if (trim($__compilerVar140) !== '')
{
$threadStatusHtml .= '
		<dl class="threadAlerts secondaryContent">
			<dt>' . 'Trạng thái chủ đề' . ':</dt>
			' . $__compilerVar140 . '
		</dl>
	';
}
unset($__compilerVar140);
$threadStatusHtml .= '
';
$__output .= '
' . $threadStatusHtml . '

';
$__compilerVar141 = '';
$__output .= $this->callTemplateHook('thread_view_pagenav_before', $__compilerVar141, array(
'thread' => $thread
));
unset($__compilerVar141);
$__output .= '

<div class="pageNavLinkGroup">

	';
if ($threadrating['canView'])
{
$__output .= '<div class="threadrating">
		';
$__compilerVar142 = '';
$this->addRequiredExternal('css', 'threadrating');
$__compilerVar142 .= '
';
$__compilerVar143 = '';
$__compilerVar143 .= (($threadrating['canRate']) ? (XenForo_Template_Helper_Core::link('threads/rate', $thread, array())) : (''));
$__compilerVar144 = '';
$__compilerVar144 .= htmlspecialchars($thread['thread_rate_avg'], ENT_QUOTES, 'UTF-8');
$__compilerVar145 = '';
$__compilerVar146 = '';
$__compilerVar146 .= (($thread['thread_rate_count'] == 1) ? ('1 phiếu') : ('' . htmlspecialchars($thread['thread_rate_count'], ENT_QUOTES, 'UTF-8') . ' phiếu'));
$__compilerVar147 = '';
$__compilerVar147 .= '1';
$__compilerVar148 = '';
$this->addRequiredExternal('css', 'rating');
$__compilerVar148 .= '

';
if ($__compilerVar143)
{
$__compilerVar148 .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/rating.js');
$__compilerVar148 .= '

	<form action="' . htmlspecialchars($__compilerVar143, ENT_QUOTES, 'UTF-8') . '" method="post" class="rating RatingWidget" ' . (($__compilerVar147) ? ('itemscope="itemscope" itemtype="http://data-vocabulary.org/Rating"') : ('')) . '>
		<dl>
			<dt class="prompt muted">' . $__compilerVar145 . '</dt>
			<dd>
				<span class="ratings">
					 <button type="submit" name="rating" value="1" class="star ' . (($__compilerVar144 >= 1) ? ('Full') : ('')) . (($__compilerVar144 >= 0.5 AND $__compilerVar144 < 1) ? ('Half') : ('')) . '" title="' . 'Terrible' . '">1</button
					><button type="submit" name="rating" value="2" class="star ' . (($__compilerVar144 >= 2) ? ('Full') : ('')) . (($__compilerVar144 >= 1.5 AND $__compilerVar144 < 2) ? ('Half') : ('')) . '" title="' . 'Poor' . '">2</button
					><button type="submit" name="rating" value="3" class="star ' . (($__compilerVar144 >= 3) ? ('Full') : ('')) . (($__compilerVar144 >= 2.5 AND $__compilerVar144 < 3) ? ('Half') : ('')) . '" title="' . 'Average' . '">3</button
					><button type="submit" name="rating" value="4" class="star ' . (($__compilerVar144 >= 4) ? ('Full') : ('')) . (($__compilerVar144 >= 3.5 AND $__compilerVar144 < 4) ? ('Half') : ('')) . '" title="' . 'Good' . '">4</button
					><button type="submit" name="rating" value="5" class="star ' . (($__compilerVar144 >= 5) ? ('Full') : ('')) . (($__compilerVar144 >= 4.5 AND $__compilerVar144 < 5) ? ('Half') : ('')) . '" title="' . 'Excellent' . '">5</button>
				</span>
			
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar144, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar148 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar146 . '</span></a>
				';
}
else
{
$__compilerVar148 .= '
				<span class="Hint">' . $__compilerVar146 . '</span>
				';
}
$__compilerVar148 .= '
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
	
';
}
else
{
$__compilerVar148 .= '
	
	<div class="rating ';
if ($xenOptions['threadrating_greyedout'])
{
$__compilerVar148 .= 'tr_greyedout';
}
$__compilerVar148 .= '">
		<dl>
			<dt class="prompt muted">' . $__compilerVar145 . '</dt>
			<dd>		
				<span class="ratings" title="' . XenForo_Template_Helper_Core::numberFormat($__compilerVar144, '2') . '">
					 <span class="star ' . (($__compilerVar144 >= 1) ? ('Full') : ('')) . (($__compilerVar144 >= 0.5 AND $__compilerVar144 < 1) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar144 >= 2) ? ('Full') : ('')) . (($__compilerVar144 >= 1.5 AND $__compilerVar144 < 2) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar144 >= 3) ? ('Full') : ('')) . (($__compilerVar144 >= 2.5 AND $__compilerVar144 < 3) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar144 >= 4) ? ('Full') : ('')) . (($__compilerVar144 >= 3.5 AND $__compilerVar144 < 4) ? ('Half') : ('')) . '"></span
					><span class="star ' . (($__compilerVar144 >= 5) ? ('Full') : ('')) . (($__compilerVar144 >= 4.5 AND $__compilerVar144 < 5) ? ('Half') : ('')) . '"></span>
				</span>
				
				<span class="RatingValue"><span class="Number" itemprop="average">' . htmlspecialchars($__compilerVar144, ENT_QUOTES, 'UTF-8') . '</span>/<span itemprop="best">5</span>,</span>
				';
if ($threadrating['whoRated'] AND $controllerName == ('XenForo_ControllerPublic_Thread') AND $thread['thread_rate_count'] > 0)
{
$__compilerVar148 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/whoRated', $thread, array()) . '" title="' . 'Who has rated this thread?' . '" class="OverlayTrigger"><span class="Hint">' . $__compilerVar146 . '</span></a>
				';
}
else
{
$__compilerVar148 .= '
				<span class="Hint">' . $__compilerVar146 . '</span>
				';
}
$__compilerVar148 .= '
			</dd>
		</dl>	
	</div>

';
}
$__compilerVar142 .= $__compilerVar148;
unset($__compilerVar143, $__compilerVar144, $__compilerVar145, $__compilerVar146, $__compilerVar147, $__compilerVar148);
$__output .= $__compilerVar142;
unset($__compilerVar142);
$__output .= '
	</div>';
}
$__output .= '
	<div class="linkGroup SelectionCountContainer">
	
		';
$__compilerVar149 = '';
$__compilerVar149 .= '
					';
$__compilerVar150 = '';
$__compilerVar150 .= '
							';
if ($canEditThread)
{
$__compilerVar150 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/edit', $thread, array()) . '" class="OverlayTrigger">' . 'Sửa chủ đề' . '</a></li>
							';
}
else if ($canEditTitle)
{
$__compilerVar150 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/edit-title', $thread, array()) . '" class="OverlayTrigger">' . 'Edit Title' . '</a></li>
							';
}
$__compilerVar150 .= '
							';
if ($canAddPoll)
{
$__compilerVar150 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/poll/add', $thread, array()) . '">' . 'Add Poll' . '</a></li>
							';
}
$__compilerVar150 .= '
							';
if ($canDeleteThread)
{
$__compilerVar150 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/delete', $thread, array()) . '" class="OverlayTrigger">' . 'Xóa chủ đề' . '</a></li>
							';
}
$__compilerVar150 .= '
							';
if ($canMoveThread)
{
$__compilerVar150 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/move', $thread, array()) . '" class="OverlayTrigger">' . 'Di chuyển chủ đề' . '</a></li>
							';
}
$__compilerVar150 .= '
							';
if ($canReplyBan)
{
$__compilerVar150 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/reply-bans', $thread, array()) . '" class="OverlayTrigger">' . 'Manage Reply Bans' . '</a></li>
							';
}
$__compilerVar150 .= '
							';
if ($canViewModeratorLog)
{
$__compilerVar150 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/moderator-actions', $thread, array()) . '" class="OverlayTrigger">' . 'Hoạt động điều phối viên' . '</a></li>
							';
}
$__compilerVar150 .= '
							';
if ($deletedPosts)
{
$__compilerVar150 .= '
								<li><a href="' . XenForo_Template_Helper_Core::link('threads/show-posts', $thread, array(
'page' => $page
)) . '" class="MessageLoader" data-messageSelector="#messageList .message.deleted.placeholder">' . 'Show Deleted Posts' . '</a></li>
							';
}
$__compilerVar150 .= '
							';
$__compilerVar151 = '';
$__compilerVar150 .= $this->callTemplateHook('thread_view_tools_links', $__compilerVar151, array(
'thread' => $thread
));
unset($__compilerVar151);
$__compilerVar150 .= '
						';
if (trim($__compilerVar150) !== '')
{
$__compilerVar149 .= '
					<div class="primaryContent menuHeader"><h3>' . 'Công cụ chủ đề' . '</h3></div>
					<ul class="secondaryContent blockLinksList">
						' . $__compilerVar150 . '
					</ul>
					';
}
unset($__compilerVar150);
$__compilerVar149 .= '
					';
$__compilerVar152 = '';
$__compilerVar152 .= '
							';
if ($canLockUnlockThread)
{
$__compilerVar152 .= '
							<li><label><input type="checkbox" name="discussion_open" value="1" class="SubmitOnChange" ' . (($thread['discussion_open']) ? ' checked="checked"' : '') . ' />
								' . 'Mở' . '</label>
								<input type="hidden" name="set[discussion_open]" value="1" /></li>';
}
$__compilerVar152 .= '
							';
if ($canStickUnstickThread)
{
$__compilerVar152 .= ' 
							<li><label><input type="checkbox" name="sticky" value="1" class="SubmitOnChange" ' . (($thread['sticky']) ? ' checked="checked"' : '') . ' />
								' . 'Dán lên cao' . '</label>
								<input type="hidden" name="set[sticky]" value="1" /></li>';
}
$__compilerVar152 .= '
						
';
if ($canLockUnlockThread)
{
$__compilerVar152 .= '
	<li><label><input type="checkbox" name="block_adsense" value="1" class="SubmitOnChange" ' . (($thread['block_adsense']) ? ' checked="checked"' : '') . ' />
	' . 'Suppress AdSense' . '</label>
	<input type="hidden" name="set[block_adsense]" value="1" /></li>';
}
$__compilerVar152 .= '
';
if (trim($__compilerVar152) !== '')
{
$__compilerVar149 .= '
					<form action="' . XenForo_Template_Helper_Core::link('threads/quick-update', $thread, array()) . '" method="post" class="AutoValidator">
						<ul class="secondaryContent blockLinksList checkboxColumns">
						' . $__compilerVar152 . '
						</ul>
						<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
					</form>
					';
}
unset($__compilerVar152);
$__compilerVar149 .= '
					';
if ($thread['canInlineMod'])
{
$__compilerVar149 .= '
					<form action="' . XenForo_Template_Helper_Core::link('inline-mod/thread/switch', false, array()) . '" method="post" class="InlineModForm sectionFooter" id="threadViewThreadCheck"
						data-cookieName="threads">
						<label><input type="checkbox" name="threads[]" value="' . htmlspecialchars($thread['thread_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck" /> ' . 'Chọn để Quản lý chủ đề' . '</label>
						<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
					</form>
					';
}
$__compilerVar149 .= '
				';
if (trim($__compilerVar149) !== '')
{
$__output .= '
			<div class="Popup">
				<a rel="Menu">' . 'Công cụ chủ đề' . '</a>
				<div class="Menu">
				' . $__compilerVar149 . '
				</div>
			</div>
		';
}
unset($__compilerVar149);
$__output .= '
		';
if ($canWatchThread)
{
$__output .= '
			<a href="' . XenForo_Template_Helper_Core::link('threads/watch-confirm', $thread, array()) . '" class="OverlayTrigger" data-cacheOverlay="false">' . (($thread['thread_is_watched']) ? ('Bỏ theo dõi chủ đề') : ('Theo dõi chủ đề')) . '</a>
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
$__compilerVar153 = '';
$__compilerVar154 = '';
$__compilerVar153 .= $this->callTemplateHook('ad_thread_view_above_messages', $__compilerVar154, array());
unset($__compilerVar154);
$__output .= $__compilerVar153;
unset($__compilerVar153);
$__output .= '

';
$__compilerVar155 = '';
$__output .= $this->callTemplateHook('thread_view_form_before', $__compilerVar155, array(
'thread' => $thread
));
unset($__compilerVar155);
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
$__compilerVar156 = '';
$__compilerVar157 = '';
$__compilerVar157 .= 'post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar158 = '';
$__compilerVar158 .= '
		';
if ($post['canInlineMod'])
{
$__compilerVar158 .= '<input type="checkbox" name="posts[]" value="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" title="' . 'Select this post' . '" data-target="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar158 .= '
		
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['post_date'],array(
'time' => '$post.post_date',
'class' => 'muted item'
))) . '
		
		<a href="' . XenForo_Template_Helper_Core::link('threads/show-posts', $thread, array(
'post_id' => $post['post_id']
)) . '" class="MessageLoader control item show" data-messageSelector="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Show' . '</a>		
	';
$__compilerVar159 = '';
$this->addRequiredExternal('css', 'message');
$__compilerVar159 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar159 .= '

<li id="' . htmlspecialchars($__compilerVar157, ENT_QUOTES, 'UTF-8') . '" class="message deleted placeholder ' . (($post['isIgnored']) ? ('ignored') : ('')) . '">
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
$__compilerVar159 .= '
					' . 'Bị xóa bởi ' . XenForo_Template_Helper_Core::callHelper('username', array(
'0' => $post['deleteInfo']
)) . '' . ',
					' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['delete_date'],array(
'time' => htmlspecialchars($post['delete_date'], ENT_QUOTES, 'UTF-8')
)));
if ($post['delete_reason'])
{
$__compilerVar159 .= ', ' . 'Lý do' . ': ' . htmlspecialchars($post['delete_reason'], ENT_QUOTES, 'UTF-8');
}
$__compilerVar159 .= '.
				';
}
$__compilerVar159 .= '
			</div>
			
			';
$__compilerVar160 = '';
$__compilerVar159 .= $this->callTemplateCallback('DigitalPointAdPositioning_Callback_AdBelowPost', 'renderAdCounterAdvance', $__compilerVar160, array());
unset($__compilerVar160);
$__compilerVar159 .= '
<div class="messageMeta">
				<div class="privateControls">' . $__compilerVar158 . '</div>
			</div>
		</div>
		
	</div>
</li>';
$__compilerVar156 .= $__compilerVar159;
unset($__compilerVar157, $__compilerVar158, $__compilerVar159);
$__output .= $__compilerVar156;
unset($__compilerVar156);
$__output .= '
			';
}
else
{
$__output .= '
				';
$__compilerVar161 = '';
$__compilerVar162 = '';
$__compilerVar162 .= 'post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8');
$__compilerVar163 = '';
$__compilerVar163 .= XenForo_Template_Helper_Core::link('posts/likes', $post, array());
$__compilerVar164 = '';
if ($post['attachments'])
{
$__compilerVar165 = '';
$this->addRequiredExternal('css', 'attached_files');
$__compilerVar165 .= '

<div class="attachedFiles">
	<h4 class="attachedFilesHeader">' . 'Các file đính kèm' . ':</h4>
	<ul class="attachmentList SquareThumbs"
		data-thumb-height="' . ($xenOptions['attachmentThumbnailDimensions'] / 2) . '"
		data-thumb-selector="div.thumbnail > a">
		';
foreach ($post['attachments'] AS $attachment)
{
$__compilerVar165 .= '
			<li class="attachment' . (($attachment['thumbnailUrl']) ? (' image') : ('')) . '" title="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '">
				<div class="boxModelFixer primaryContent">
					
					';
$__compilerVar166 = '';
$__compilerVar166 .= '
					<div class="thumbnail">
						';
if ($attachment['thumbnailUrl'] AND $canViewAttachments)
{
$__compilerVar166 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="LbTrigger"
								data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img 
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" class="LbImage" /></a>
						';
}
else if ($attachment['thumbnailUrl'])
{
$__compilerVar166 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank"><img
								src="' . htmlspecialchars($attachment['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '" /></a>
						';
}
else
{
$__compilerVar166 .= '
							<a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank" class="genericAttachment"></a>
						';
}
$__compilerVar166 .= '
					</div>
					';
$__compilerVar165 .= $this->callTemplateHook('attached_file_thumbnail', $__compilerVar166, array(
'attachment' => $attachment
));
unset($__compilerVar166);
$__compilerVar165 .= '
					
					<div class="attachmentInfo pairsJustified">
						<h6 class="filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8') . '</a></h6>
						<dl><dt>' . 'Kích thước' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['file_size'], 'size') . '</dd></dl>
						<dl><dt>' . 'Đọc' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($attachment['view_count'], '0') . '</dd></dl>
					</div>
				</div>
			</li>
		';
}
$__compilerVar165 .= '
	</ul>
</div>

';
$__compilerVar164 .= $__compilerVar165;
unset($__compilerVar165);
}
$__compilerVar167 = '';
$__compilerVar167 .= '
				
		<div class="messageMeta ToggleTriggerAnchor">
			
			<div class="privateControls">
				';
if ($post['canInlineMod'])
{
$__compilerVar167 .= '<input type="checkbox" name="posts[]" value="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" class="InlineModCheck item" data-target="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '" title="' . 'Chọn chủ đề này gửi bởi ' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '' . '" />';
}
$__compilerVar167 .= '
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
$__compilerVar168 = '';
$__compilerVar168 .= '
				';
if ($post['canEdit'])
{
$__compilerVar168 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/edit', $post, array()) . '" class="item control edit ' . (($xenOptions['messageInlineEdit']) ? ('OverlayTrigger') : ('')) . '"
						data-href="' . XenForo_Template_Helper_Core::link('posts/edit-inline', $post, array()) . '" data-overlayOptions="{&quot;fixed&quot;:false}"
						data-messageSelector="#post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span>' . 'Sửa' . '</a>
					';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar168 .= '
				';
}
$__compilerVar168 .= '
				';
if ($post['edit_count'] && $post['canViewHistory'])
{
$__compilerVar168 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/history', $post, array()) . '" class="item control history ToggleTrigger"><span></span>' . 'Lịch sử' . '</a>';
}
$__compilerVar168 .= '
				';
if ($post['canDelete'])
{
$__compilerVar168 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/delete', $post, array()) . '" class="item control delete OverlayTrigger"><span></span>' . 'Xóa' . '</a>';
}
$__compilerVar168 .= '
				';
if ($post['canCleanSpam'])
{
$__compilerVar168 .= '<a href="' . XenForo_Template_Helper_Core::link('spam-cleaner', $post, array()) . '" class="item control deleteSpam OverlayTrigger"><span></span>' . 'Spam' . '</a>';
}
$__compilerVar168 .= '
				';
if ($canViewIps AND $post['ip_id'])
{
$__compilerVar168 .= '<a href="' . XenForo_Template_Helper_Core::link('posts/ip', $post, array()) . '" class="item control ip OverlayTrigger"><span></span>' . 'IP' . '</a>';
}
$__compilerVar168 .= '
				
				';
if ($post['canWarn'])
{
$__compilerVar168 .= '
					<a href="' . XenForo_Template_Helper_Core::link('members/warn', $post, array(
'content_type' => 'post',
'content_id' => $post['post_id']
)) . '" class="item control warn"><span></span>' . 'Cảnh cáo' . '</a>
				';
}
else if ($post['warning_id'] && $canViewWarnings)
{
$__compilerVar168 .= '
					<a href="' . XenForo_Template_Helper_Core::link('warnings', $post, array()) . '" class="OverlayTrigger item control viewWarning"><span></span>' . 'View Warning' . '</a>
				';
}
$__compilerVar168 .= '
				';
if ($post['canReport'])
{
$__compilerVar168 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/report', $post, array()) . '" class="OverlayTrigger item control report" data-cacheOverlay="false"><span></span>' . 'Báo cáo' . '</a>
				';
}
$__compilerVar168 .= '
				
				';
$__compilerVar167 .= $this->callTemplateHook('post_private_controls', $__compilerVar168, array(
'post' => $post
));
unset($__compilerVar168);
$__compilerVar167 .= '
			</div>
			
			<div class="publicControls">
				<a href="' . XenForo_Template_Helper_Core::link('threads/post-permalink', $thread, array(
'post' => $post
)) . '" title="' . 'Permalink' . '" class="item muted postNumber hashPermalink OverlayTrigger" data-href="' . XenForo_Template_Helper_Core::link('posts/permalink', $post, array()) . '">#' . ($post['position'] + 1) . '</a>
				';
$__compilerVar169 = '';
$__compilerVar169 .= '
				';
if ($post['canLike'])
{
$__compilerVar169 .= '
					<a href="' . XenForo_Template_Helper_Core::link('posts/like', $post, array()) . '" class="LikeLink item control ' . (($post['like_date']) ? ('unlike') : ('like')) . '" data-container="#likes-post-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"><span></span><span class="LikeLabel">' . (($post['like_date']) ? ('Không thích nữa') : ('Thích')) . '</span></a>
				';
}
$__compilerVar169 .= '
				';
if ($canReply)
{
$__compilerVar169 .= '
					';
if ($xenOptions['multiQuote'])
{
$__compilerVar169 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array(
'quote' => $post['post_id']
)) . '"
						data-messageid="' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"
						class="MultiQuoteControl JsOnly item control"
						title="' . 'Toggle Multi-Quote' . '"><span></span><span class="symbol">' . '+ Quote' . '</span></a>';
}
$__compilerVar169 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array(
'quote' => $post['post_id']
)) . '"
						data-postUrl="' . XenForo_Template_Helper_Core::link('posts/quote', $post, array()) . '"
						data-tip="#MQ-' . htmlspecialchars($post['post_id'], ENT_QUOTES, 'UTF-8') . '"
						class="ReplyQuote item control reply"
						title="' . 'Trả lời, trích dẫn nội dung bài viết này' . '"><span></span>' . 'Trả lời' . '</a>
				';
}
$__compilerVar169 .= '
				';
$__compilerVar167 .= $this->callTemplateHook('post_public_controls', $__compilerVar169, array(
'post' => $post
));
unset($__compilerVar169);
$__compilerVar167 .= '
			</div>
		</div>
	';
$__compilerVar170 = '';
$this->addRequiredExternal('css', 'message');
$__compilerVar170 .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__compilerVar170 .= '

<li id="' . htmlspecialchars($__compilerVar162, ENT_QUOTES, 'UTF-8') . '" class="message ' . (($post['isDeleted']) ? ('deleted') : ('')) . ' ' . (($post['is_staff']) ? ('staff') : ('')) . ' ' . (($post['isIgnored']) ? ('ignored') : ('')) . '" data-author="' . htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8') . '">

	';
$__compilerVar171 = '';
$this->addRequiredExternal('css', 'message_user_info');
$__compilerVar171 .= '

<div class="messageUserInfo" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">	
<div class="messageUserBlock ' . (($post['isOnline']) ? ('online') : ('')) . '">
	';
$__compilerVar172 = '';
$__compilerVar172 .= '
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
$__compilerVar172 .= '<span class="Tooltip onlineMarker" title="' . 'Online Now' . '" data-offsetX="-22" data-offsetY="-8"></span>';
}
$__compilerVar172 .= '
			<!-- slot: message_user_info_avatar -->
		</div>
	';
$__compilerVar171 .= $this->callTemplateHook('message_user_info_avatar', $__compilerVar172, array(
'user' => $post,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar172);
$__compilerVar171 .= '

';
if (!$isQuickReply)
{
$__compilerVar171 .= '
	';
$__compilerVar173 = '';
$__compilerVar173 .= '
		<h3 class="userText">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($post,'',(true),array(
'itemprop' => 'name'
))) . '
			';
$__compilerVar174 = '';
$__compilerVar174 .= XenForo_Template_Helper_Core::callHelper('userTitle', array(
'0' => $post,
'1' => '1',
'2' => '1'
));
if (trim($__compilerVar174) !== '')
{
$__compilerVar173 .= '<em class="userTitle" itemprop="title">' . $__compilerVar174 . '</em>';
}
unset($__compilerVar174);
$__compilerVar173 .= '
			' . XenForo_Template_Helper_Core::callHelper('userBanner', array(
'0' => $post,
'1' => 'wrapped'
)) . '
			<!-- slot: message_user_info_text -->
		</h3>
	';
$__compilerVar171 .= $this->callTemplateHook('message_user_info_text', $__compilerVar173, array(
'user' => $post,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar173);
$__compilerVar171 .= '
		
	';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar175 = '';
$__compilerVar175 .= '
';
if (!XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar175 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbons');
$__compilerVar175 .= '
';
}
$__compilerVar175 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar175 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbonsbadge');
$__compilerVar175 .= '
';
}
$__compilerVar175 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsSoftResponsiveFix'))
{
$__compilerVar175 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsSoftResponsiveFix');
$__compilerVar175 .= '
';
}
$__compilerVar175 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsXenMoodsFix'))
{
$__compilerVar175 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsXenMoodsFix');
$__compilerVar175 .= '
';
}
$__compilerVar175 .= '
    
';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar175 .= '

	<ul class="ribbon">
    
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1'))
{
$__compilerVar175 .= '
			<li class="ribbon1">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2'))
{
$__compilerVar175 .= '
			<li class="ribbon2">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3'))
{
$__compilerVar175 .= '
			<li class="ribbon3">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4'))
{
$__compilerVar175 .= '
			<li class="ribbon4">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5'))
{
$__compilerVar175 .= '
			<li class="ribbon5">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6'))
{
$__compilerVar175 .= '
			<li class="ribbon6">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7'))
{
$__compilerVar175 .= '
			<li class="ribbon7">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8'))
{
$__compilerVar175 .= '
			<li class="ribbon8">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9'))
{
$__compilerVar175 .= '
			<li class="ribbon9">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10'))
{
$__compilerVar175 .= '
			<li class="ribbon10">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11'))
{
$__compilerVar175 .= '
			<li class="ribbon11">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12'))
{
$__compilerVar175 .= '
			<li class="ribbon12">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13'))
{
$__compilerVar175 .= '
			<li class="ribbon13">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14'))
{
$__compilerVar175 .= '
			<li class="ribbon14">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15'))
{
$__compilerVar175 .= '
			<li class="ribbon15">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16'))
{
$__compilerVar175 .= '
			<li class="ribbon16">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17'))
{
$__compilerVar175 .= '
			<li class="ribbon17">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18'))
{
$__compilerVar175 .= '
			<li class="ribbon18">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19'))
{
$__compilerVar175 .= '
			<li class="ribbon19">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20'))
{
$__compilerVar175 .= '
			<li class="ribbon20">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21'))
{
$__compilerVar175 .= '
			<li class="ribbon21">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22'))
{
$__compilerVar175 .= '
			<li class="ribbon22">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23'))
{
$__compilerVar175 .= '
			<li class="ribbon23">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24'))
{
$__compilerVar175 .= '
			<li class="ribbon24">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25'))
{
$__compilerVar175 .= '
			<li class="ribbon25">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26'))
{
$__compilerVar175 .= '
			<li class="ribbon26">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27'))
{
$__compilerVar175 .= '
			<li class="ribbon27">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28'))
{
$__compilerVar175 .= '
			<li class="ribbon28">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29'))
{
$__compilerVar175 .= '
			<li class="ribbon29">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30'))
{
$__compilerVar175 .= '
			<li class="ribbon30">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31'))
{
$__compilerVar175 .= '
			<li class="ribbon31">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32'))
{
$__compilerVar175 .= '
			<li class="ribbon32">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33'))
{
$__compilerVar175 .= '
			<li class="ribbon33">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34'))
{
$__compilerVar175 .= '
			<li class="ribbon34">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $post,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35'))
{
$__compilerVar175 .= '
			<li class="ribbon35">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35Title') . '
			</li>
		';
}
$__compilerVar175 .= '
		
	</ul>
';
}
$__compilerVar171 .= $__compilerVar175;
unset($__compilerVar175);
}
$__compilerVar171 .= '
    ';
$__compilerVar176 = '';
$__compilerVar176 .= '
			';
$__compilerVar177 = '';
$__compilerVar177 .= '
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowRegisterDate') AND $post['user_id'])
{
$__compilerVar177 .= '
					<dl class="pairsJustified">
						<dt>' . 'Tham gia ngày' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::date($post['register_date'], '') . '</dd>
					</dl>
				';
}
$__compilerVar177 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowMessageCount') AND $post['user_id'])
{
$__compilerVar177 .= '
					<dl class="pairsJustified">
						<dt>' . 'Bài viết' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $post['user_id']
)) . '" class="concealed" rel="nofollow">' . XenForo_Template_Helper_Core::numberFormat($post['message_count'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar177 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTotalLikes') AND $post['user_id'])
{
$__compilerVar177 .= '
					<dl class="pairsJustified">
						<dt>' . 'Đã được thích' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($post['like_count'], '0') . '</dd>
					</dl>
				';
}
$__compilerVar177 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTrophyPoints') AND $post['user_id'])
{
$__compilerVar177 .= '
					<dl class="pairsJustified">
						<dt>' . 'Điểm thành tích' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('members/trophies', $post, array()) . '" class="OverlayTrigger concealed">' . XenForo_Template_Helper_Core::numberFormat($post['trophy_points'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar177 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowGender') AND $post['gender'])
{
$__compilerVar177 .= '
					<dl class="pairsJustified">
						<dt>' . 'Giới tính' . ':</dt>
						<dd itemprop="gender">';
if ($post['gender'] == ('male'))
{
$__compilerVar177 .= 'Nam';
}
else
{
$__compilerVar177 .= 'Nữ';
}
$__compilerVar177 .= '</dd>
					</dl>
				';
}
$__compilerVar177 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowOccupation') AND $post['occupation'])
{
$__compilerVar177 .= '
					<dl class="pairsJustified">
						<dt>' . 'Nghề nghiệp' . ':</dt>
						<dd itemprop="role">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($post['occupation'], ENT_QUOTES, 'UTF-8')
)) . '</dd>
					</dl>
				';
}
$__compilerVar177 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowLocation') AND $post['location'])
{
$__compilerVar177 .= '
					<dl class="pairsJustified">
						<dt>' . 'Nơi ở' . ':</dt>
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
$__compilerVar177 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowHomepage') AND $post['homepage'])
{
$__compilerVar177 .= '
					<dl class="pairsJustified">
						<dt>' . 'Web' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($post['homepage'], ENT_QUOTES, 'UTF-8'),
'1' => '-'
)) . '" rel="nofollow" target="_blank" itemprop="url">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($post['homepage'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar177 .= '
							
			';
$__compilerVar176 .= $this->callTemplateHook('message_user_info_extra', $__compilerVar177, array(
'user' => $post,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar177);
$__compilerVar176 .= '			
			';
if (XenForo_Template_Helper_Core::styleProperty('messageShowCustomFields') AND $post['customFields'])
{
$__compilerVar176 .= '
			';
$__compilerVar178 = '';
$__compilerVar178 .= '
			
				';
foreach ($userFieldsInfo AS $fieldId => $fieldInfo)
{
$__compilerVar178 .= '
					';
if ($fieldInfo['viewable_message'] AND ($fieldInfo['display_group'] != ('contact') OR $post['allow_view_identities'] == ('everyone') OR ($post['allow_view_identities'] == ('members') AND $visitor['user_id'])))
{
$__compilerVar178 .= '
						';
$__compilerVar179 = '';
$__compilerVar179 .= XenForo_Template_Helper_Core::callHelper('userFieldValue', array(
'0' => $fieldInfo,
'1' => $post,
'2' => $post['customFields'][$fieldId]
));
if (trim($__compilerVar179) !== '')
{
$__compilerVar178 .= '
							<dl class="pairsJustified userField_' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
								<dt>' . XenForo_Template_Helper_Core::callHelper('userFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
								<dd>' . $__compilerVar179 . '</dd>
							</dl>
						';
}
unset($__compilerVar179);
$__compilerVar178 .= '
					';
}
$__compilerVar178 .= '
				';
}
$__compilerVar178 .= '
				
			';
$__compilerVar176 .= $this->callTemplateHook('message_user_info_custom_fields', $__compilerVar178, array(
'user' => $post,
'isQuickReply' => $isQuickReply
));
unset($__compilerVar178);
$__compilerVar176 .= '
			';
}
$__compilerVar176 .= '
			';
if (trim($__compilerVar176) !== '')
{
$__compilerVar171 .= '
		<div class="extraUserInfo">
			' . $__compilerVar176 . '
		</div>
	';
}
unset($__compilerVar176);
$__compilerVar171 .= '
		
';
}
$__compilerVar171 .= '

	<span class="arrow"><span></span></span>
</div>
</div>';
$__compilerVar170 .= $__compilerVar171;
unset($__compilerVar171);
$__compilerVar170 .= '

	<div class="messageInfo primaryContent">
		';
if ($post['isNew'])
{
$__compilerVar170 .= '<strong class="newIndicator"><span></span>' . 'Mới' . '</strong>';
}
$__compilerVar170 .= '
		
		';
$__compilerVar180 = '';
$__compilerVar180 .= '
					';
$__compilerVar181 = '';
$__compilerVar181 .= '
						';
if ($post['warning_message'])
{
$__compilerVar181 .= '
							<li class="warningNotice"><span class="icon Tooltip" title="' . 'Warning' . '" data-tipclass="iconTip flipped"></span>' . htmlspecialchars($post['warning_message'], ENT_QUOTES, 'UTF-8') . '</li>
						';
}
$__compilerVar181 .= '
						';
if ($post['isDeleted'])
{
$__compilerVar181 .= '
							<li class="deletedNotice"><span class="icon Tooltip" title="' . 'Bị xóa' . '" data-tipclass="iconTip flipped"></span>' . 'This message has been removed from public view.' . '</li>
						';
}
else if ($post['isModerated'])
{
$__compilerVar181 .= '
							<li class="moderatedNotice"><span class="icon Tooltip" title="' . 'Awaiting moderation' . '" data-tipclass="iconTip flipped"></span>' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '</li>
						';
}
$__compilerVar181 .= '
						';
if ($post['isIgnored'])
{
$__compilerVar181 .= '
							<li>' . 'You are ignoring content by this member.' . ' <a href="javascript:" class="JsOnly DisplayIgnoredContent">' . 'Show Ignored Content' . '</a></li>
						';
}
$__compilerVar181 .= '
					';
$__compilerVar180 .= $this->callTemplateHook('message_notices', $__compilerVar181, array(
'message' => $post
));
unset($__compilerVar181);
$__compilerVar180 .= '
				';
if (trim($__compilerVar180) !== '')
{
$__compilerVar170 .= '
			<ul class="messageNotices">
				' . $__compilerVar180 . '
			</ul>
		';
}
unset($__compilerVar180);
$__compilerVar170 .= '
		
		';
$__compilerVar182 = '';
$__compilerVar182 .= '
		<div class="messageContent">		
			<article>
				<blockquote class="messageText SelectQuoteContainer ugc baseHtml' . (($post['isIgnored']) ? (' ignored') : ('')) . '">
					';
$__compilerVar183 = '';
$__compilerVar184 = '';
$__compilerVar183 .= $this->callTemplateHook('ad_message_body', $__compilerVar184, array());
unset($__compilerVar184);
$__compilerVar182 .= $__compilerVar183;
unset($__compilerVar183);
$__compilerVar182 .= '
					' . $post['messageHtml'] . '
					<div class="messageTextEndMarker">&nbsp;</div>
				</blockquote>
			</article>
			
			' . $__compilerVar164 . '
		</div>
		';
$__compilerVar170 .= $this->callTemplateHook('message_content', $__compilerVar182, array(
'message' => $post
));
unset($__compilerVar182);
$__compilerVar170 .= '
		
		';
if ($post['last_edit_date'])
{
$__compilerVar170 .= '
			<div class="editDate">
			';
if ($post['user_id'] == $post['last_edit_user_id'])
{
$__compilerVar170 .= '
				' . 'Chỉnh sửa cuối' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['last_edit_date'],array(
'time' => htmlspecialchars($post['last_edit_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
else
{
$__compilerVar170 .= '
				' . 'Last edited by a moderator' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($post['last_edit_date'],array(
'time' => htmlspecialchars($post['last_edit_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
}
$__compilerVar170 .= '
			</div>
		';
}
$__compilerVar170 .= '
		
		';
if ($visitor['content_show_signature'] && $post['signature'])
{
$__compilerVar170 .= '
			<div class="baseHtml signature messageText ugc' . (($post['isIgnored']) ? (' ignored') : ('')) . '"><aside>' . $post['signatureHtml'] . '</aside></div>
		';
}
$__compilerVar170 .= '
		
		' . $__compilerVar167 . '
		
		';
$__compilerVar185 = '';
$__compilerVar170 .= $this->callTemplateHook('dark_postrating_likes_bar', $__compilerVar185, array(
'post' => $post,
'message_id' => $__compilerVar162
));
unset($__compilerVar185);
$__compilerVar170 .= '
	</div>

	';
$__compilerVar186 = '';
$__compilerVar170 .= $this->callTemplateHook('message_below', $__compilerVar186, array(
'post' => $post,
'message_id' => $__compilerVar162
));
unset($__compilerVar186);
$__compilerVar170 .= '
	
	';
$__compilerVar187 = '';
$__compilerVar188 = '';
$__compilerVar187 .= $this->callTemplateHook('ad_message_below', $__compilerVar188, array());
unset($__compilerVar188);
$__compilerVar170 .= $__compilerVar187;
unset($__compilerVar187);
$__compilerVar170 .= '
';
$__compilerVar189 = '';
$__compilerVar170 .= $this->callTemplateCallback('DigitalPointAdPositioning_Callback_AdBelowPost', 'renderAd', $__compilerVar189, array(
'dp_ads' => $dp_ads
));
unset($__compilerVar189);
$__compilerVar170 .= '
</li>';
$__compilerVar161 .= $__compilerVar170;
unset($__compilerVar162, $__compilerVar163, $__compilerVar164, $__compilerVar167, $__compilerVar170);
$__output .= $__compilerVar161;
unset($__compilerVar161);
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
$__compilerVar190 = '';
$__compilerVar191 = '';
$__compilerVar191 .= 'Post Moderation';
$__compilerVar192 = '';
$__compilerVar192 .= '
		';
if ($inlineModOptions['delete'])
{
$__compilerVar192 .= '<option value="delete">' . 'Xóa bài viết' . '...</option>';
}
$__compilerVar192 .= '
		';
if ($inlineModOptions['undelete'])
{
$__compilerVar192 .= '<option value="undelete">' . 'Bỏ xóa bài viết' . '</option>';
}
$__compilerVar192 .= '
		';
if ($inlineModOptions['approve'])
{
$__compilerVar192 .= '<option value="approve">' . 'Duyệt bài viết' . '</option>';
}
$__compilerVar192 .= '
		';
if ($inlineModOptions['unapprove'])
{
$__compilerVar192 .= '<option value="unapprove">' . 'Không duyệt bài viết' . '</option>';
}
$__compilerVar192 .= '
		';
if ($inlineModOptions['move'])
{
$__compilerVar192 .= '<option value="move">' . 'Di chuyển bài viết' . '...</option>';
}
$__compilerVar192 .= '
		';
if ($inlineModOptions['copy'])
{
$__compilerVar192 .= '<option value="copy">' . 'Copy Posts' . '...</option>';
}
$__compilerVar192 .= '
		';
if ($inlineModOptions['merge'])
{
$__compilerVar192 .= '<option value="merge">' . 'Gộp bài' . '...</option>';
}
$__compilerVar192 .= '
		<option value="deselect">' . 'Bỏ chọn bài viết' . '</option>
	';
$__compilerVar193 = '';
$__compilerVar193 .= 'Select / deselect all posts on this page';
$__compilerVar194 = '';
$__compilerVar194 .= 'Bài viết đã chọn';
$__compilerVar195 = '';
$this->addRequiredExternal('css', 'inline_mod');
$__compilerVar195 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/inline_mod.js');
$__compilerVar195 .= '

<span id="InlineModControls">
	<span class="selectionControl secondaryContent">
		<label for="ModerationCheck">
			' . 'Chọn tất cả' . ' <input type="checkbox" id="ModerationCheck" title="' . htmlspecialchars($__compilerVar193, ENT_QUOTES, 'UTF-8') . '" />
		</label>

		<input type="button" class="button ClickNext" value="&darr;" title="' . 'Chuyển xuống' . '" />
		<input type="button" class="button ClickPrev" value="&uarr;" title="' . 'Chuyển lên trên' . '" />
		<a class="SelectionCount">' . htmlspecialchars($__compilerVar194, ENT_QUOTES, 'UTF-8') . ': <em class="InlineModCheckedTotal">0</em></a>
	</span>

	<span class="actionControl sectionFooter">
		<span class="commonActions">
			';
if ($inlineModOptions['delete'])
{
$__compilerVar195 .= '<input type="submit" class="button" value="' . 'Xóa' . '..." name="delete" />';
}
$__compilerVar195 .= '
			';
if ($inlineModOptions['approve'])
{
$__compilerVar195 .= '<input type="submit" class="button" value="' . 'Duyệt bài' . '" name="approve" />';
}
$__compilerVar195 .= '
		</span>

		<span class="otherActions">
			<select name="a" id="ModerationSelect" class="textCtrl">
				<option value="">' . 'Hành động khác' . '...</option>
				<optgroup label="' . 'Hành động Quản lý' . '">
					' . $__compilerVar192 . '
				</optgroup>
				<option value="closeOverlay">' . 'Đóng lớp phủ này' . '</option>
			</select>

			<input type="submit" class="button primary" value="' . 'Tới' . '" />
			<input type="reset" class="button OverlayCloser overylayOnly" value="X" title="' . 'Cancel and close these controls' . '" />
		</span>
	</span>
</span>';
$__compilerVar190 .= $__compilerVar195;
unset($__compilerVar191, $__compilerVar192, $__compilerVar193, $__compilerVar194, $__compilerVar195);
$__output .= $__compilerVar190;
unset($__compilerVar190);
$__output .= '
		</div>
	';
}
$__output .= '

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

</form>

';
$__compilerVar196 = '';
$__compilerVar196 .= '
			';
if ($canQuickReply)
{
$__compilerVar196 .= '
				';
if ($postsRemaining)
{
$__compilerVar196 .= '
					<div class="linkGroup">
						';
if ($postsRemaining == 1)
{
$__compilerVar196 .= '
							<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => ($page + 1)
)) . '" class="postsRemaining">' . '1 tin nhắn thêm' . '...</a>
						';
}
else
{
$__compilerVar196 .= '
							<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array(
'page' => ($page + 1)
)) . '" class="postsRemaining">' . '' . XenForo_Template_Helper_Core::numberFormat($postsRemaining, '0') . ' more messages' . '...</a>
						';
}
$__compilerVar196 .= '
					</div>
				';
}
$__compilerVar196 .= '
			';
}
else
{
$__compilerVar196 .= '
				<div class="linkGroup">
					';
if ($canReply)
{
$__compilerVar196 .= '
						<a href="' . XenForo_Template_Helper_Core::link('threads/reply', $thread, array()) . '" class="callToAction"><span>' . 'Trả lời vào chủ đề' . '</span></a>
					';
}
else if ($visitor['user_id'])
{
$__compilerVar196 .= '
						<span class="element">(' . 'You have insufficient privileges to reply here.' . ')</span>
					';
}
else
{
$__compilerVar196 .= '
						<label for="LoginControl"><a href="' . XenForo_Template_Helper_Core::link('login', false, array()) . '" class="concealed element">(' . 'Bạn phải Đăng nhập hoặc Đăng ký để trả lời bài viết.' . ')</a></label>
					';
}
$__compilerVar196 .= '
				</div>
			';
}
$__compilerVar196 .= '
			<div class="linkGroup"' . ((!$ignoredNames) ? (' style="display: none"') : ('')) . '><a href="javascript:" class="muted JsOnly DisplayIgnoredContent Tooltip" title="' . 'Show hidden content by ' . XenForo_Template_Helper_Core::callHelper('implode', array(
'0' => $ignoredNames,
'1' => ', '
)) . '' . '">' . 'Show Ignored Content' . '</a></div>

			' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($postsPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalPosts, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'threads', $thread, array(), htmlspecialchars($unreadLink, ENT_QUOTES, 'UTF-8'), array())) . '
		';
if (trim($__compilerVar196) !== '')
{
$__output .= '
	<div class="pageNavLinkGroup">
		' . $__compilerVar196 . '
	</div>
';
}
unset($__compilerVar196);
$__output .= '

';
$__compilerVar197 = '';
$__compilerVar198 = '';
$__compilerVar197 .= $this->callTemplateHook('ad_thread_view_below_messages', $__compilerVar198, array());
unset($__compilerVar198);
$__output .= $__compilerVar197;
unset($__compilerVar197);
$__output .= '

';
$__compilerVar199 = '';
$__output .= $this->callTemplateHook('thread_view_qr_before', $__compilerVar199, array(
'thread' => $thread
));
unset($__compilerVar199);
$__output .= '

';
if ($canQuickReply)
{
$__output .= '
	';
$__compilerVar200 = '';
$__compilerVar200 .= XenForo_Template_Helper_Core::link('threads/add-reply', $thread, array());
$__compilerVar201 = '';
$__compilerVar201 .= htmlspecialchars($lastPost['post_date'], ENT_QUOTES, 'UTF-8');
$__compilerVar202 = '';
$__compilerVar202 .= htmlspecialchars($thread['last_post_date'], ENT_QUOTES, 'UTF-8');
$__compilerVar203 = '';
$__compilerVar203 .= '1';
$__compilerVar204 = '';
$__compilerVar204 .= XenForo_Template_Helper_Core::link('threads/multi-quote', $thread, array(
'formId' => '#QuickReply'
));
$__compilerVar205 = '';
$this->addRequiredExternal('css', 'quick_reply');
$__compilerVar205 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar205 .= '

<div class="quickReply message">
	
	';
$__compilerVar206 = '';
$__compilerVar206 .= '1';
$__compilerVar207 = '';
$this->addRequiredExternal('css', 'message_user_info');
$__compilerVar207 .= '

<div class="messageUserInfo" itemscope="itemscope" itemtype="http://data-vocabulary.org/Person">	
<div class="messageUserBlock ' . (($visitor['isOnline']) ? ('online') : ('')) . '">
	';
$__compilerVar208 = '';
$__compilerVar208 .= '
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
$__compilerVar208 .= '<span class="Tooltip onlineMarker" title="' . 'Online Now' . '" data-offsetX="-22" data-offsetY="-8"></span>';
}
$__compilerVar208 .= '
			<!-- slot: message_user_info_avatar -->
		</div>
	';
$__compilerVar207 .= $this->callTemplateHook('message_user_info_avatar', $__compilerVar208, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar206
));
unset($__compilerVar208);
$__compilerVar207 .= '

';
if (!$__compilerVar206)
{
$__compilerVar207 .= '
	';
$__compilerVar209 = '';
$__compilerVar209 .= '
		<h3 class="userText">
			' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($visitor,'',(true),array(
'itemprop' => 'name'
))) . '
			';
$__compilerVar210 = '';
$__compilerVar210 .= XenForo_Template_Helper_Core::callHelper('userTitle', array(
'0' => $visitor,
'1' => '1',
'2' => '1'
));
if (trim($__compilerVar210) !== '')
{
$__compilerVar209 .= '<em class="userTitle" itemprop="title">' . $__compilerVar210 . '</em>';
}
unset($__compilerVar210);
$__compilerVar209 .= '
			' . XenForo_Template_Helper_Core::callHelper('userBanner', array(
'0' => $visitor,
'1' => 'wrapped'
)) . '
			<!-- slot: message_user_info_text -->
		</h3>
	';
$__compilerVar207 .= $this->callTemplateHook('message_user_info_text', $__compilerVar209, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar206
));
unset($__compilerVar209);
$__compilerVar207 .= '
		
	';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar211 = '';
$__compilerVar211 .= '
';
if (!XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar211 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbons');
$__compilerVar211 .= '
';
}
$__compilerVar211 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsBadgeCSS'))
{
$__compilerVar211 .= '
    ';
$this->addRequiredExternal('css', 'userrankribbonsbadge');
$__compilerVar211 .= '
';
}
$__compilerVar211 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsSoftResponsiveFix'))
{
$__compilerVar211 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsSoftResponsiveFix');
$__compilerVar211 .= '
';
}
$__compilerVar211 .= '

';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsXenMoodsFix'))
{
$__compilerVar211 .= '
    ';
$this->addRequiredExternal('css', 'UserRankRibbonsXenMoodsFix');
$__compilerVar211 .= '
';
}
$__compilerVar211 .= '
    
';
if (XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsActive'))
{
$__compilerVar211 .= '

	<ul class="ribbon">
    
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1'))
{
$__compilerVar211 .= '
			<li class="ribbon1">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon1Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2'))
{
$__compilerVar211 .= '
			<li class="ribbon2">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon2Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3'))
{
$__compilerVar211 .= '
			<li class="ribbon3">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon3Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4'))
{
$__compilerVar211 .= '
			<li class="ribbon4">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon4Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5'))
{
$__compilerVar211 .= '
			<li class="ribbon5">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon5Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6'))
{
$__compilerVar211 .= '
			<li class="ribbon6">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon6Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7'))
{
$__compilerVar211 .= '
			<li class="ribbon7">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon7Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8'))
{
$__compilerVar211 .= '
			<li class="ribbon8">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon8Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9'))
{
$__compilerVar211 .= '
			<li class="ribbon9">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon9Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10'))
{
$__compilerVar211 .= '
			<li class="ribbon10">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon10Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11'))
{
$__compilerVar211 .= '
			<li class="ribbon11">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon11Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12'))
{
$__compilerVar211 .= '
			<li class="ribbon12">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon12Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13'))
{
$__compilerVar211 .= '
			<li class="ribbon13">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon13Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14'))
{
$__compilerVar211 .= '
			<li class="ribbon14">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon14Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15'))
{
$__compilerVar211 .= '
			<li class="ribbon15">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon15Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16'))
{
$__compilerVar211 .= '
			<li class="ribbon16">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon16Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17'))
{
$__compilerVar211 .= '
			<li class="ribbon17">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon17Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18'))
{
$__compilerVar211 .= '
			<li class="ribbon18">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon18Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19'))
{
$__compilerVar211 .= '
			<li class="ribbon19">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon19Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20'))
{
$__compilerVar211 .= '
			<li class="ribbon20">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon20Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21'))
{
$__compilerVar211 .= '
			<li class="ribbon21">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon21Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22'))
{
$__compilerVar211 .= '
			<li class="ribbon22">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon22Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23'))
{
$__compilerVar211 .= '
			<li class="ribbon23">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon23Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24'))
{
$__compilerVar211 .= '
			<li class="ribbon24">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon24Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25'))
{
$__compilerVar211 .= '
			<li class="ribbon25">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon25Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26'))
{
$__compilerVar211 .= '
			<li class="ribbon26">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon26Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27'))
{
$__compilerVar211 .= '
			<li class="ribbon27">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon27Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28'))
{
$__compilerVar211 .= '
			<li class="ribbon28">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon28Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29'))
{
$__compilerVar211 .= '
			<li class="ribbon29">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon29Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30'))
{
$__compilerVar211 .= '
			<li class="ribbon30">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon30Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31'))
{
$__compilerVar211 .= '
			<li class="ribbon31">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon31Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32'))
{
$__compilerVar211 .= '
			<li class="ribbon32">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon32Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33'))
{
$__compilerVar211 .= '
			<li class="ribbon33">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon33Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34'))
{
$__compilerVar211 .= '
			<li class="ribbon34">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon34Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
		';
if (XenForo_Template_Helper_Core::callHelper('ismemberof', array(
'0' => $visitor,
'1' => XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35UserGroup')
)) AND XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35'))
{
$__compilerVar211 .= '
			<li class="ribbon35">
				<div class="Rleft"></div>
				<div class="Rright"></div>
				' . XenForo_Template_Helper_Core::styleProperty('UserRankRibbonsRibbon35Title') . '
			</li>
		';
}
$__compilerVar211 .= '
		
	</ul>
';
}
$__compilerVar207 .= $__compilerVar211;
unset($__compilerVar211);
}
$__compilerVar207 .= '
    ';
$__compilerVar212 = '';
$__compilerVar212 .= '
			';
$__compilerVar213 = '';
$__compilerVar213 .= '
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowRegisterDate') AND $visitor['user_id'])
{
$__compilerVar213 .= '
					<dl class="pairsJustified">
						<dt>' . 'Tham gia ngày' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::date($visitor['register_date'], '') . '</dd>
					</dl>
				';
}
$__compilerVar213 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowMessageCount') AND $visitor['user_id'])
{
$__compilerVar213 .= '
					<dl class="pairsJustified">
						<dt>' . 'Bài viết' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('search/member', '', array(
'user_id' => $visitor['user_id']
)) . '" class="concealed" rel="nofollow">' . XenForo_Template_Helper_Core::numberFormat($visitor['message_count'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar213 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTotalLikes') AND $visitor['user_id'])
{
$__compilerVar213 .= '
					<dl class="pairsJustified">
						<dt>' . 'Đã được thích' . ':</dt>
						<dd>' . XenForo_Template_Helper_Core::numberFormat($visitor['like_count'], '0') . '</dd>
					</dl>
				';
}
$__compilerVar213 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowTrophyPoints') AND $visitor['user_id'])
{
$__compilerVar213 .= '
					<dl class="pairsJustified">
						<dt>' . 'Điểm thành tích' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::link('members/trophies', $visitor, array()) . '" class="OverlayTrigger concealed">' . XenForo_Template_Helper_Core::numberFormat($visitor['trophy_points'], '0') . '</a></dd>
					</dl>
				';
}
$__compilerVar213 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowGender') AND $visitor['gender'])
{
$__compilerVar213 .= '
					<dl class="pairsJustified">
						<dt>' . 'Giới tính' . ':</dt>
						<dd itemprop="gender">';
if ($visitor['gender'] == ('male'))
{
$__compilerVar213 .= 'Nam';
}
else
{
$__compilerVar213 .= 'Nữ';
}
$__compilerVar213 .= '</dd>
					</dl>
				';
}
$__compilerVar213 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowOccupation') AND $visitor['occupation'])
{
$__compilerVar213 .= '
					<dl class="pairsJustified">
						<dt>' . 'Nghề nghiệp' . ':</dt>
						<dd itemprop="role">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['occupation'], ENT_QUOTES, 'UTF-8')
)) . '</dd>
					</dl>
				';
}
$__compilerVar213 .= '
				
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowLocation') AND $visitor['location'])
{
$__compilerVar213 .= '
					<dl class="pairsJustified">
						<dt>' . 'Nơi ở' . ':</dt>
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
$__compilerVar213 .= '
			
				';
if (XenForo_Template_Helper_Core::styleProperty('messageShowHomepage') AND $visitor['homepage'])
{
$__compilerVar213 .= '
					<dl class="pairsJustified">
						<dt>' . 'Web' . ':</dt>
						<dd><a href="' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['homepage'], ENT_QUOTES, 'UTF-8'),
'1' => '-'
)) . '" rel="nofollow" target="_blank" itemprop="url">' . XenForo_Template_Helper_Core::string('censor', array(
'0' => htmlspecialchars($visitor['homepage'], ENT_QUOTES, 'UTF-8')
)) . '</a></dd>
					</dl>
				';
}
$__compilerVar213 .= '
							
			';
$__compilerVar212 .= $this->callTemplateHook('message_user_info_extra', $__compilerVar213, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar206
));
unset($__compilerVar213);
$__compilerVar212 .= '			
			';
if (XenForo_Template_Helper_Core::styleProperty('messageShowCustomFields') AND $visitor['customFields'])
{
$__compilerVar212 .= '
			';
$__compilerVar214 = '';
$__compilerVar214 .= '
			
				';
foreach ($userFieldsInfo AS $fieldId => $fieldInfo)
{
$__compilerVar214 .= '
					';
if ($fieldInfo['viewable_message'] AND ($fieldInfo['display_group'] != ('contact') OR $visitor['allow_view_identities'] == ('everyone') OR ($visitor['allow_view_identities'] == ('members') AND $visitor['user_id'])))
{
$__compilerVar214 .= '
						';
$__compilerVar215 = '';
$__compilerVar215 .= XenForo_Template_Helper_Core::callHelper('userFieldValue', array(
'0' => $fieldInfo,
'1' => $visitor,
'2' => $visitor['customFields'][$fieldId]
));
if (trim($__compilerVar215) !== '')
{
$__compilerVar214 .= '
							<dl class="pairsJustified userField_' . htmlspecialchars($fieldId, ENT_QUOTES, 'UTF-8') . '">
								<dt>' . XenForo_Template_Helper_Core::callHelper('userFieldTitle', array(
'0' => $fieldId
)) . ':</dt>
								<dd>' . $__compilerVar215 . '</dd>
							</dl>
						';
}
unset($__compilerVar215);
$__compilerVar214 .= '
					';
}
$__compilerVar214 .= '
				';
}
$__compilerVar214 .= '
				
			';
$__compilerVar212 .= $this->callTemplateHook('message_user_info_custom_fields', $__compilerVar214, array(
'user' => $visitor,
'isQuickReply' => $__compilerVar206
));
unset($__compilerVar214);
$__compilerVar212 .= '
			';
}
$__compilerVar212 .= '
			';
if (trim($__compilerVar212) !== '')
{
$__compilerVar207 .= '
		<div class="extraUserInfo">
			' . $__compilerVar212 . '
		</div>
	';
}
unset($__compilerVar212);
$__compilerVar207 .= '
		
';
}
$__compilerVar207 .= '

	<span class="arrow"><span></span></span>
</div>
</div>';
$__compilerVar205 .= $__compilerVar207;
unset($__compilerVar206, $__compilerVar207);
$__compilerVar205 .= '

	<form action="' . htmlspecialchars($__compilerVar200, ENT_QUOTES, 'UTF-8', (false)) . '" method="post" class="AutoValidator blendedEditor" data-optInOut="OptIn" id="QuickReply">

		' . $qrEditor . '<div class="floatLeft">';
$__compilerVar216 = '';
if ($captcha)
{
$__compilerVar216 .= '
	<dl class="ctrlUnit">
		<dt>' . 'Mã xác nhận' . ':</dt>
		<dd>' . $captcha . '</dd>
	</dl>
';
}
$__compilerVar205 .= $__compilerVar216;
unset($__compilerVar216);
$__compilerVar205 .= '</div>

		<div class="submitUnit">
			<div class="draftUpdate">
				<span class="draftSaved">' . 'Bản thảo đã lưu' . '</span>
				<span class="draftDeleted">' . 'Bản thảo đã xóa' . '</span>
			</div>
			';
if ($xenOptions['multiQuote'] AND $__compilerVar204)
{
$__compilerVar205 .= '<input type="button" class="button JsOnly MultiQuoteWatcher insertQuotes" id="MultiQuote"
				value="' . 'Insert Quotes' . '..."
				tabindex="1"
				data-href="' . htmlspecialchars($__compilerVar204, ENT_QUOTES, 'UTF-8', (false)) . '"
				' . (($multiQuoteCookie) ? ('data-mq-cookie="' . htmlspecialchars($multiQuoteCookie, ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
				data-add="' . '+ Quote' . '"
				data-add-message="' . 'Message added to multi-quote.' . '"
				data-remove="' . '− Quote' . '"
				data-remove-message="' . 'Message removed from multi-quote.' . '"
				data-cacheOverlay="false" />';
}
$__compilerVar205 .= '
			<input type="submit" class="button primary" value="' . 'Gửi trả lời' . '" accesskey="s" />
			';
$__compilerVar217 = '';
if ($attachmentParams)
{
$__compilerVar217 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar217 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar217 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar217 .= '
	';
}
$__compilerVar217 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar217 .= '

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
		data-err-110="' . 'File đã tải lên lớn hơn so với quy định.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '"
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
$__compilerVar217 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar217 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '</a>
	</noscript>

';
}
$__compilerVar205 .= $__compilerVar217;
unset($__compilerVar217);
$__compilerVar205 .= '
			';
if ($__compilerVar203)
{
$__compilerVar205 .= '<input type="submit" class="button DisableOnSubmit" value="' . 'Thêm tùy chọn' . '..." name="more_options" />';
}
$__compilerVar205 .= '
		</div>
		
		';
if ($attachmentParams)
{
$__compilerVar205 .= '
			';
$__compilerVar218 = $attachmentParams['attachments'];
$__compilerVar219 = '';
if ($attachmentParams)
{
$__compilerVar219 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar219 .= '
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar219 .= '
	
	<div class="AttachmentEditor">
	
		';
if ($showUploadButton)
{
$__compilerVar219 .= '
			';
$__compilerVar220 = '';
if ($attachmentParams)
{
$__compilerVar220 .= '

	';
$this->addRequiredExternal('js', 'js/xenforo/attachment_editor.js');
$__compilerVar220 .= '
	';
if ($xenOptions['swfUpload'] AND $visitor['enable_flash_uploader'])
{
$__compilerVar220 .= '
		';
$this->addRequiredExternal('js', 'js/swfupload/swfupload.min.js');
$__compilerVar220 .= '
	';
}
$__compilerVar220 .= '	
	';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar220 .= '

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
		data-err-110="' . 'File đã tải lên lớn hơn so với quy định.' . '"
		data-err-120="' . 'The uploaded file is empty.' . '"
		data-err-130="' . 'The uploaded file does not have an allowed extension.' . '"
		data-err-unknown="' . 'There was a problem uploading your file.' . '">
		
		<span id="SWFUploadPlaceHolder"></span>		
			
		<input type="button" value="' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '"
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
$__compilerVar220 .= '<span class="HiddenInput" data-name="content_data[' . htmlspecialchars($dataKey, ENT_QUOTES, 'UTF-8') . ']" data-value="' . htmlspecialchars($dataValue, ENT_QUOTES, 'UTF-8') . '"></span>
		';
}
$__compilerVar220 .= '
	</span>

	<noscript>
		<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" class="button" target="_blank">' . (($buttonText) ? ($buttonText) : ('Tải lên file đính kèm')) . '</a>
	</noscript>

';
}
$__compilerVar219 .= $__compilerVar220;
unset($__compilerVar220);
$__compilerVar219 .= '
		';
}
$__compilerVar219 .= '
		
		<div class="NoAttachments"></div>
		
		<div class="secondaryContent AttachmentInsertAllBlock JsOnly">
			<span></span>
			<div class="AttachmentText">
				<div class="label">' . 'Chèn các ảnh theo kiểu' . '...</div>
				<div class="controls">
					<!--<input type="button" value="' . 'Delete All' . '" class="button _smallButton AttachmentDeleteAll" />-->
					<input type="button" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInsertAll" name="thumb" />
					<input type="button" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInsertAll" name="image" />
				</div>
			</div>
		</div>
	
		<ol class="AttachmentList New">
			';
$__compilerVar221 = '';
$__compilerVar221 .= '1';
$__compilerVar222 = '';
$__compilerVar223 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar223 .= '

<li id="' . (($__compilerVar221) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($__compilerVar222['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($__compilerVar222 and $__compilerVar222['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($__compilerVar222 and $__compilerVar222['thumbnailUrl'])
{
$__compilerVar223 .= '
			<a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar222, array()) . '" target="_blank"
				data-attachmentId="' . htmlspecialchars($__compilerVar222['attachment_id'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbTrigger" data-href="' . XenForo_Template_Helper_Core::link('misc/lightbox', false, array()) . '"><img
				src="' . htmlspecialchars($__compilerVar222['thumbnailUrl'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($__compilerVar222['filename'], ENT_QUOTES, 'UTF-8') . '"
				class="_not_LbImage" data-src="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar222, array(
'embedded' => '1'
)) . '" /></a>
		';
}
else
{
$__compilerVar223 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar223 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $__compilerVar222, array()) . '" target="_blank">' . (($__compilerVar222) ? (htmlspecialchars($__compilerVar222['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($__compilerVar221)
{
$__compilerVar223 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar223 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($__compilerVar222['thumbnailUrl'])
{
$__compilerVar223 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar223 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $__compilerVar222, array()) . '" />
			
				';
if ($__compilerVar222['thumbnailUrl'])
{
$__compilerVar223 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar223 .= '
			</div>
		';
}
$__compilerVar223 .= '

	</div>
	
</li>';
$__compilerVar219 .= $__compilerVar223;
unset($__compilerVar221, $__compilerVar222, $__compilerVar223);
$__compilerVar219 .= '
			';
if ($__compilerVar218)
{
$__compilerVar219 .= '
				';
foreach ($__compilerVar218 AS $attachment)
{
$__compilerVar219 .= '
					';
if ($attachment['temp_hash'])
{
$__compilerVar219 .= '
						';
$__compilerVar224 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar224 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar224 .= '
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
$__compilerVar224 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar224 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar224 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar224 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar224 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar224 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar224 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar224 .= '
			</div>
		';
}
$__compilerVar224 .= '

	</div>
	
</li>';
$__compilerVar219 .= $__compilerVar224;
unset($__compilerVar224);
$__compilerVar219 .= '
					';
}
$__compilerVar219 .= '
				';
}
$__compilerVar219 .= '
			';
}
$__compilerVar219 .= '
		</ol>
	
		';
if ($__compilerVar218)
{
$__compilerVar219 .= '
			';
$__compilerVar225 = '';
$__compilerVar225 .= '
					';
foreach ($__compilerVar218 AS $attachment)
{
$__compilerVar225 .= '
						';
if (!$attachment['temp_hash'])
{
$__compilerVar225 .= '
							';
$__compilerVar226 = '';
$this->addRequiredExternal('css', 'attachment_editor');
$__compilerVar226 .= '

<li id="' . (($isTemplate) ? ('AttachedFileTemplate') : ('attachment' . htmlspecialchars($attachment['attachment_id'], ENT_QUOTES, 'UTF-8'))) . '"
	class="AttachedFile ' . (($attachment and $attachment['thumbnailUrl']) ? ('AttachedImage') : ('')) . ' secondaryContent">

	<div class="Thumbnail">
		';
if ($attachment and $attachment['thumbnailUrl'])
{
$__compilerVar226 .= '
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
$__compilerVar226 .= '
			<span class="genericAttachment"></span>
		';
}
$__compilerVar226 .= '
	</div>

	<div class="AttachmentText">
		<div class="Filename"><a href="' . XenForo_Template_Helper_Core::link('attachments', $attachment, array()) . '" target="_blank">' . (($attachment) ? (htmlspecialchars($attachment['filename'], ENT_QUOTES, 'UTF-8')) : ('')) . '</a></div>
	
		';
if ($isTemplate)
{
$__compilerVar226 .= '
			<input type="button" value="' . 'Hủy bỏ' . '" class="button smallButton AttachmentCanceller" />
			
			<span class="ProgressMeter"><span class="ProgressGraphic">&nbsp;</span><span class="ProgressCounter">0%</span></span>
		';
}
else
{
$__compilerVar226 .= '
			<noscript>
				<a href="' . XenForo_Template_Helper_Core::link('attachments/upload', '', array(
'_params' => $attachmentParams
)) . '" target="_blank" class="button Smallbutton">' . 'Xóa' . '</a>
			</noscript>
			
			';
if ($attachment['thumbnailUrl'])
{
$__compilerVar226 .= '
				<div class="label JsOnly">' . 'Chèn' . ':</div>
			';
}
$__compilerVar226 .= '
			
			<div class="controls JsOnly">				
				<input type="button" value="' . 'Xóa' . '" class="button smallButton AttachmentDeleter" data-href="' . XenForo_Template_Helper_Core::link('attachments/delete', $attachment, array()) . '" />
			
				';
if ($attachment['thumbnailUrl'])
{
$__compilerVar226 .= '
					<input type="button" name="thumb" value="' . 'Hình thu nhỏ' . '" class="button smallButton AttachmentInserter" />
					<input type="button" name="image" value="' . 'Hình đầy đủ' . '" class="button smallButton AttachmentInserter" />
				';
}
$__compilerVar226 .= '
			</div>
		';
}
$__compilerVar226 .= '

	</div>
	
</li>';
$__compilerVar225 .= $__compilerVar226;
unset($__compilerVar226);
$__compilerVar225 .= '
						';
}
$__compilerVar225 .= '
					';
}
$__compilerVar225 .= '
				';
if (trim($__compilerVar225) !== '')
{
$__compilerVar219 .= '
			<ol class="AttachmentList Existing">
				' . $__compilerVar225 . '
			</ol>
			';
}
unset($__compilerVar225);
$__compilerVar219 .= '
		';
}
$__compilerVar219 .= '
		
		<input type="hidden" name="attachment_hash" value="' . htmlspecialchars($attachmentParams['hash'], ENT_QUOTES, 'UTF-8') . '" />
		
		' . '
		
	</div>
	
';
}
$__compilerVar205 .= $__compilerVar219;
unset($__compilerVar218, $__compilerVar219);
$__compilerVar205 .= '
		';
}
$__compilerVar205 .= '

		<input type="hidden" name="last_date" value="' . htmlspecialchars($__compilerVar201, ENT_QUOTES, 'UTF-8') . '" data-load-value="' . htmlspecialchars($__compilerVar201, ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="last_known_date" value="' . htmlspecialchars($__compilerVar202, ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />

	</form>

</div>';
$__output .= $__compilerVar205;
unset($__compilerVar200, $__compilerVar201, $__compilerVar202, $__compilerVar203, $__compilerVar204, $__compilerVar205);
$__output .= '
';
}
$__output .= '

';
$__compilerVar227 = '';
if ($similarThreads AND $showBelowQuickReply)
{
$__compilerVar227 .= '

';
if (!($showBelowFirstPost AND $showBelowQuickReply) OR $page > 1)
{
$__compilerVar227 .= '

    <div class="sectionMain similarThreadsThreadView">
    
        <div class="primaryContent">
        ';
if ($xenOptions['similarThreadsShowSearchWords'] == 1)
{
$__compilerVar227 .= '
        	' . 'Similar Threads:' . ' ' . htmlspecialchars($searchWord1, ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($searchWord2, ENT_QUOTES, 'UTF-8') . '
        ';
}
$__compilerVar227 .= '
        ';
if ($xenOptions['similarThreadsShowSearchWords'] == 0)
{
$__compilerVar227 .= '
        	' . 'Similar Threads' . '
        ';
}
$__compilerVar227 .= '
        </div>
        
        <table class="dataTable">
        
        <tr class="dataRow">
        <th>' . 'Diễn đàn' . '</th>
        <th>' . 'Tiêu đề' . '</th>
        <th>' . 'Date' . '</th>
        </tr>
        
        ';
foreach ($similarThreads AS $index => $similarThread)
{
$__compilerVar227 .= '
        
            <tr class="dataRow">
            <td>' . htmlspecialchars($similarThread['nodetitle'], ENT_QUOTES, 'UTF-8') . '</td>
            <td><a href="' . XenForo_Template_Helper_Core::link('threads', $similarThread, array()) . '" title="' . htmlspecialchars($similarThread['title'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($similarThread['title'], ENT_QUOTES, 'UTF-8') . '</a></td>
            <td>' . XenForo_Template_Helper_Core::datetime($similarThread['post_date'], '') . '</td>
            </tr>
        
        ';
}
$__compilerVar227 .= '
        
        </table>

    </div>
    <br />

';
}
$__compilerVar227 .= '

';
}
$__output .= $__compilerVar227;
unset($__compilerVar227);
$__output .= '
';
$__compilerVar228 = '';
$__output .= $this->callTemplateHook('thread_view_qr_after', $__compilerVar228, array(
'thread' => $thread
));
unset($__compilerVar228);
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
$__compilerVar229 = '';
$__compilerVar229 .= XenForo_Template_Helper_Core::link('canonical:threads', $thread, array());
$__compilerVar230 = '';
$__compilerVar231 = '';
$__compilerVar231 .= '
			';
$__compilerVar232 = '';
$__compilerVar232 .= '
			';
if ($xenOptions['tweet']['enabled'])
{
$__compilerVar232 .= '
				<div class="tweet shareControl">
					<a href="https://twitter.com/share" class="twitter-share-button"
						data-count="horizontal"
						data-lang="' . XenForo_Template_Helper_Core::callHelper('twitterLang', array(
'0' => $visitorLanguage['language_code']
)) . '"
						data-url="' . htmlspecialchars($__compilerVar229, ENT_QUOTES, 'UTF-8') . '"
						' . (($thread['title']) ? ('data-text="' . XenForo_Template_Helper_Core::callHelper('threadPrefix', array(
'0' => $thread,
'1' => 'escaped'
)) . htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['via']) ? ('data-via="' . htmlspecialchars($xenOptions['tweet']['via'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '
						' . (($xenOptions['tweet']['related']) ? ('data-related="' . htmlspecialchars($xenOptions['tweet']['related'], ENT_QUOTES, 'UTF-8') . '"') : ('')) . '>' . 'Tweet' . '</a>
				</div>
			';
}
$__compilerVar232 .= '
			';
if ($xenOptions['plusone'])
{
$__compilerVar232 .= '
				<div class="plusone shareControl">
					<div class="g-plusone" data-size="medium" data-count="true" data-href="' . htmlspecialchars($__compilerVar229, ENT_QUOTES, 'UTF-8') . '"></div>
				</div>
			';
}
$__compilerVar232 .= '
			';
if ($xenOptions['facebookLike'])
{
$__compilerVar232 .= '
				<div class="facebookLike shareControl">
					';
$__extraData['facebookSdk'] = '';
$__extraData['facebookSdk'] .= '1';
$__compilerVar232 .= '
					<fb:like href="' . htmlspecialchars($__compilerVar229, ENT_QUOTES, 'UTF-8') . '" show_faces="true" width="400" action="' . htmlspecialchars($xenOptions['facebookLikeAction'], ENT_QUOTES, 'UTF-8') . '" font="trebuchet ms" colorscheme="' . XenForo_Template_Helper_Core::styleProperty('fbColorScheme') . '"></fb:like>
				</div>
			';
}
$__compilerVar232 .= '
			';
$__compilerVar231 .= $this->callTemplateHook('share_page_options', $__compilerVar232, array());
unset($__compilerVar232);
$__compilerVar231 .= '
		';
if (trim($__compilerVar231) !== '')
{
$__compilerVar230 .= '
	';
$this->addRequiredExternal('css', 'share_page');
$__compilerVar230 .= '

	<div class="sharePage">
		<h3 class="textHeading larger">' . 'Chia sẻ trang này' . '</h3>
		' . $__compilerVar231 . '
	</div>
';
}
unset($__compilerVar231);
$__output .= $__compilerVar230;
unset($__compilerVar229, $__compilerVar230);
$__output .= '
';
}
