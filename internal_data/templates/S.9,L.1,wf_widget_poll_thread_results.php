<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$__compilerVar1 .= '
		';
$__compilerVar2 = '';
$__compilerVar2 .= '
' . '

<div class="overlayScroll pollResultsOverlay">

	<ol class="pollResults noResults">
	';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__compilerVar2 .= '
		<li class="pollResult ' . (($response['hasVoted']) ? ('voted') : ('')) . '">
			';
if ($response['hasVoted'])
{
$__compilerVar2 .= '
				<div class="votedIconCell" title="' . 'Your vote' . '">*</div>
			';
}
else
{
$__compilerVar2 .= '
				<div class="votedIconCell"></div>
			';
}
$__compilerVar2 .= '
			<h3 class="optionText" ' . (($response['hasVoted']) ? ('title="' . 'Your vote' . '"') : ('')) . '>
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '
			</h3>

			<div class="count"' . (($poll['voter_count']) ? (' class="Tooltip" title="' . XenForo_Template_Helper_Core::numberFormat((100 * $response['response_vote_count'] / $poll['voter_count']), '1') . '%"') : ('')) . '>
				';
if ($poll['public_votes'] AND $response['response_vote_count'])
{
$__compilerVar2 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array(
'poll_response_id' => $pollResponseId
)) . '" class="concealed OverlayTrigger">' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' vote(s)' . '</a>
				';
}
else
{
$__compilerVar2 .= '
					' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' vote(s)' . '
				';
}
$__compilerVar2 .= '
			</div>
		</li>
	';
}
$__compilerVar2 .= '
	</ol>
</div>';
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
$__compilerVar1 .= '
	';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'wf_default');
$__compilerVar3 .= '
';
$this->addRequiredExternal('css', 'polls');
$__compilerVar3 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar3 .= '

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
$__output .= $__compilerVar3;
unset($__compilerVar1, $__compilerVar3);
