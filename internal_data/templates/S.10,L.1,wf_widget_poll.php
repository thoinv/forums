<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

';
if ($poll)
{
$__output .= '
	<div class="section">
		<div class="secondaryContent widget ' . htmlspecialchars($widget['class'], ENT_QUOTES, 'UTF-8') . '" id="widget-' . htmlspecialchars($widget['widget_id'], ENT_QUOTES, 'UTF-8') . '">
			<h3><a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '">' . htmlspecialchars($poll['question'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
$__compilerVar1 = '';
$__compilerVar1 .= '
					';
if ($poll['canVote'])
{
$__compilerVar1 .= '
						';
$__compilerVar2 = '';
$__compilerVar2 .= '
		
<div>		
	<ol class="pollOptions">
		';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__compilerVar2 .= '
			<li class="pollOption"><label>';
if ($poll['max_votes'] != 1)
{
$__compilerVar2 .= '
				<input type="checkbox" name="response_multiple[]" class="PollResponse" value="' . htmlspecialchars($pollResponseId, ENT_QUOTES, 'UTF-8') . '" />';
}
else
{
$__compilerVar2 .= '
				<input type="radio" name="response" value="' . htmlspecialchars($pollResponseId, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar2 .= '
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '</label></li>				
		';
}
$__compilerVar2 .= '
	</ol>
	
	<div class="buttons">
		';
$__compilerVar3 = '';
$__compilerVar3 .= '
				';
if ($poll['max_votes'] == 0 OR $poll['max_votes'] > count($poll['responses']))
{
$__compilerVar3 .= '
					<span class="multipleNote muted">' . 'Multiple votes are allowed.' . '</span>
				';
}
else if ($poll['max_votes'] > 1)
{
$__compilerVar3 .= '
					<span class="multipleNote muted">' . 'You may select up to ' . htmlspecialchars($poll['max_votes'], ENT_QUOTES, 'UTF-8') . ' choices.' . '</span>
				';
}
$__compilerVar3 .= '
				';
if ($poll['public_votes'])
{
$__compilerVar3 .= '
					<span class="publicWarning muted">' . 'Your vote will be publicly visible.' . '</span>
				';
}
$__compilerVar3 .= '
				';
if (!$poll['canViewResults'])
{
$__compilerVar3 .= '
					<div class="noResultsNote muted">' . 'Results are only viewable after voting.' . '</div>
				';
}
$__compilerVar3 .= '
			';
if (trim($__compilerVar3) !== '')
{
$__compilerVar2 .= '
			<div class="pollNotes">
			' . $__compilerVar3 . '
			</div>
		';
}
unset($__compilerVar3);
$__compilerVar2 .= '
			
		<input type="submit" class="button primary" value="' . 'Cast Your Vote' . '" accesskey="s" />
		';
if ($poll['canViewResults'])
{
$__compilerVar2 .= '
			<input type="button" value="' . 'View Results' . '" class="button OverlayTrigger JsOnly" data-href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array()) . '" />
			<noscript><a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array()) . '" class="button">' . 'View Results' . '</a></noscript>
		';
}
$__compilerVar2 .= '
	</div>
</div>';
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
$__compilerVar1 .= '
					';
}
else
{
$__compilerVar1 .= '
						';
$__compilerVar4 = '';
$__compilerVar4 .= '
' . '

<div class="overlayScroll pollResultsOverlay">

	<ol class="pollResults noResults">
	';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__compilerVar4 .= '
		<li class="pollResult ' . (($response['hasVoted']) ? ('voted') : ('')) . '">
			';
if ($response['hasVoted'])
{
$__compilerVar4 .= '
				<div class="votedIconCell" title="' . 'Your vote' . '">*</div>
			';
}
else
{
$__compilerVar4 .= '
				<div class="votedIconCell"></div>
			';
}
$__compilerVar4 .= '
			<h3 class="optionText" ' . (($response['hasVoted']) ? ('title="' . 'Your vote' . '"') : ('')) . '>
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '
			</h3>

			<div class="count"' . (($poll['voter_count']) ? (' class="Tooltip" title="' . XenForo_Template_Helper_Core::numberFormat((100 * $response['response_vote_count'] / $poll['voter_count']), '1') . '%"') : ('')) . '>
				';
if ($poll['public_votes'] AND $response['response_vote_count'])
{
$__compilerVar4 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array(
'poll_response_id' => $pollResponseId
)) . '" class="concealed OverlayTrigger">' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' vote(s)' . '</a>
				';
}
else
{
$__compilerVar4 .= '
					' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' vote(s)' . '
				';
}
$__compilerVar4 .= '
			</div>
		</li>
	';
}
$__compilerVar4 .= '
	</ol>
</div>';
$__compilerVar1 .= $__compilerVar4;
unset($__compilerVar4);
$__compilerVar1 .= '
					';
}
$__compilerVar1 .= '
				';
$__compilerVar5 = '';
$this->addRequiredExternal('css', 'wf_default');
$__compilerVar5 .= '
';
$this->addRequiredExternal('css', 'polls');
$__compilerVar5 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar5 .= '

<div id="PollContainer" class="NoAutoHeader PollContainer widget-poll">
	<form action="' . XenForo_Template_Helper_Core::link('threads/poll/vote', $thread, array()) . '" method="post" class="pollBlock AutoValidator PollVoteForm"
		data-container="#PollContainer" data-max-votes="' . htmlspecialchars($poll['max_votes'], ENT_QUOTES, 'UTF-8') . '">

		<div class="pollContent">
			' . $__compilerVar1 . '
		</div>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="_fromWidget" value="1" />
	</form>
</div>';
$__output .= $__compilerVar5;
unset($__compilerVar1, $__compilerVar5);
$__output .= '
		</div>
	</div>
';
}
$__output .= '

' . '
';
