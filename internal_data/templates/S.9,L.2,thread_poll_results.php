<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($poll['question'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Poll Results';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Poll Results';
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
$__compilerVar9 = '';
$__compilerVar9 .= '
		';
$__compilerVar10 = '';
$__compilerVar10 .= '

<div class="overlayScroll pollResultsOverlay">

	<ol class="pollResults ' . ((!$poll['canViewResults']) ? ('noResults') : ('')) . '">
	';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__compilerVar10 .= '
		<li class="pollResult ' . (($response['hasVoted']) ? ('voted') : ('')) . '">
			';
if ($response['hasVoted'])
{
$__compilerVar10 .= '
				<div class="votedIconCell" title="' . 'Bình chọn của bạn' . '">*</div>
			';
}
else
{
$__compilerVar10 .= '
				<div class="votedIconCell"></div>
			';
}
$__compilerVar10 .= '
			<h3 class="optionText" ' . (($response['hasVoted']) ? ('title="' . 'Bình chọn của bạn' . '"') : ('')) . '>
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '
			</h3>
			';
if ($poll['canViewResults'])
{
$__compilerVar10 .= '
				<div class="barCell">
					<span class="barContainer">
						';
if ($response['response_vote_count'])
{
$__compilerVar10 .= '<span class="bar" style="width: ' . (100 * $response['response_vote_count'] / $poll['voter_count']) . '%"></span>';
}
$__compilerVar10 .= '
					</span>
				</div>
				<div class="count">
					';
if ($poll['public_votes'] AND $response['response_vote_count'])
{
$__compilerVar10 .= '
						<a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array(
'poll_response_id' => $pollResponseId
)) . '" class="concealed OverlayTrigger">' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' phiếu' . '</a>
					';
}
else
{
$__compilerVar10 .= '
						' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' phiếu' . '
					';
}
$__compilerVar10 .= '
				</div>
				<div class="percentage">
					';
if ($poll['voter_count'])
{
$__compilerVar10 .= '
						' . XenForo_Template_Helper_Core::numberFormat((100 * $response['response_vote_count'] / $poll['voter_count']), '1') . '%
					';
}
else
{
$__compilerVar10 .= '
						' . XenForo_Template_Helper_Core::numberFormat('0', '1') . '%
					';
}
$__compilerVar10 .= '
				</div>
			';
}
$__compilerVar10 .= '
		</li>
	';
}
$__compilerVar10 .= '
	</ol>
	
	<div class="buttons">
		';
$__compilerVar11 = '';
$__compilerVar11 .= '
				';
if ($poll['max_votes'] != 1)
{
$__compilerVar11 .= '
					<span class="multipleNote muted">' . 'Multiple votes are allowed.' . '</span>
				';
}
$__compilerVar11 .= '
				';
if (!$poll['canViewResults'])
{
$__compilerVar11 .= '
					<div class="noResultsNote muted">' . 'Results are only viewable after voting.' . '</div>
				';
}
$__compilerVar11 .= '
			';
if (trim($__compilerVar11) !== '')
{
$__compilerVar10 .= '
			<div class="pollNotes">
			' . $__compilerVar11 . '
			</div>
		';
}
unset($__compilerVar11);
$__compilerVar10 .= '
		
		';
if ($poll['canVote'])
{
$__compilerVar10 .= '
			<a href="' . XenForo_Template_Helper_Core::link('threads/poll/vote', $thread, array()) . '" class="button PollChangeVote nonOverlayOnly">' . 'Change Your Vote' . '</a>
		';
}
$__compilerVar10 .= '
	</div>
</div>';
$__compilerVar9 .= $__compilerVar10;
unset($__compilerVar10);
$__compilerVar9 .= '
	';
$__compilerVar12 = '';
$this->addRequiredExternal('css', 'polls');
$__compilerVar12 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar12 .= '

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
$__compilerVar12 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/poll/edit', $thread, array()) . '" class="editLink">' . 'Sửa' . '</a>';
}
$__compilerVar12 .= '
					
					';
if ($poll['close_date'])
{
$__compilerVar12 .= '
						<div class="pollNotes closeDate muted">
							';
if ($poll['open'])
{
$__compilerVar12 .= '
								' . 'This poll will close on ' . XenForo_Template_Helper_Core::datetime($poll['close_date'], 'absolute') . '.' . '
							';
}
else
{
$__compilerVar12 .= '
								' . 'Poll closed ' . XenForo_Template_Helper_Core::datetime($poll['close_date'], '') . '.' . '
							';
}
$__compilerVar12 .= '
						</div>
					';
}
$__compilerVar12 .= '
				</div>
					
				' . $__compilerVar9 . '
			</div>
		</div>
	
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>';
$__output .= $__compilerVar12;
unset($__compilerVar9, $__compilerVar12);
