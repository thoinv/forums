<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($poll['question'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Cast Your Vote';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Cast Your Vote';
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

';
$__compilerVar3 = '';
$__compilerVar3 .= '
		';
$__compilerVar4 = '';
$__compilerVar4 .= '
		
<div>		
	<ol class="pollOptions">
		';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__compilerVar4 .= '
			<li class="pollOption"><label>';
if ($poll['max_votes'] != 1)
{
$__compilerVar4 .= '
				<input type="checkbox" name="response_multiple[]" class="PollResponse" value="' . htmlspecialchars($pollResponseId, ENT_QUOTES, 'UTF-8') . '" />';
}
else
{
$__compilerVar4 .= '
				<input type="radio" name="response" value="' . htmlspecialchars($pollResponseId, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar4 .= '
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '</label></li>				
		';
}
$__compilerVar4 .= '
	</ol>
	
	<div class="buttons">
		';
$__compilerVar5 = '';
$__compilerVar5 .= '
				';
if ($poll['max_votes'] == 0 OR $poll['max_votes'] > count($poll['responses']))
{
$__compilerVar5 .= '
					<span class="multipleNote muted">' . 'Multiple votes are allowed.' . '</span>
				';
}
else if ($poll['max_votes'] > 1)
{
$__compilerVar5 .= '
					<span class="multipleNote muted">' . 'You may select up to ' . htmlspecialchars($poll['max_votes'], ENT_QUOTES, 'UTF-8') . ' choices.' . '</span>
				';
}
$__compilerVar5 .= '
				';
if ($poll['public_votes'])
{
$__compilerVar5 .= '
					<span class="publicWarning muted">' . 'Your vote will be publicly visible.' . '</span>
				';
}
$__compilerVar5 .= '
				';
if (!$poll['canViewResults'])
{
$__compilerVar5 .= '
					<div class="noResultsNote muted">' . 'Results are only viewable after voting.' . '</div>
				';
}
$__compilerVar5 .= '
			';
if (trim($__compilerVar5) !== '')
{
$__compilerVar4 .= '
			<div class="pollNotes">
			' . $__compilerVar5 . '
			</div>
		';
}
unset($__compilerVar5);
$__compilerVar4 .= '
			
		<input type="submit" class="button primary" value="' . 'Cast Your Vote' . '" accesskey="s" />
		';
if ($poll['canViewResults'])
{
$__compilerVar4 .= '
			<input type="button" value="' . 'View Results' . '" class="button OverlayTrigger JsOnly" data-href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array()) . '" />
			<noscript><a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array()) . '" class="button">' . 'View Results' . '</a></noscript>
		';
}
$__compilerVar4 .= '
	</div>
</div>';
$__compilerVar3 .= $__compilerVar4;
unset($__compilerVar4);
$__compilerVar3 .= '
	';
$__compilerVar6 = '';
$this->addRequiredExternal('css', 'polls');
$__compilerVar6 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar6 .= '

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
$__compilerVar6 .= '<a href="' . XenForo_Template_Helper_Core::link('threads/poll/edit', $thread, array()) . '" class="editLink">' . 'Edit' . '</a>';
}
$__compilerVar6 .= '
					
					';
if ($poll['close_date'])
{
$__compilerVar6 .= '
						<div class="pollNotes closeDate muted">
							';
if ($poll['open'])
{
$__compilerVar6 .= '
								' . 'This poll will close on ' . XenForo_Template_Helper_Core::datetime($poll['close_date'], 'absolute') . '.' . '
							';
}
else
{
$__compilerVar6 .= '
								' . 'Poll closed ' . XenForo_Template_Helper_Core::datetime($poll['close_date'], '') . '.' . '
							';
}
$__compilerVar6 .= '
						</div>
					';
}
$__compilerVar6 .= '
				</div>
					
				' . $__compilerVar3 . '
			</div>
		</div>
	
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
</div>';
$__output .= $__compilerVar6;
unset($__compilerVar3, $__compilerVar6);
