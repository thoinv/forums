<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar4 = '';
$__compilerVar4 .= '
		';
$__compilerVar5 = '';
$__compilerVar5 .= '
' . '

<div class="overlayScroll pollResultsOverlay">

	<ol class="pollResults noResults">
	';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__compilerVar5 .= '
		<li class="pollResult ' . (($response['hasVoted']) ? ('voted') : ('')) . '">
			';
if ($response['hasVoted'])
{
$__compilerVar5 .= '
				<div class="votedIconCell" title="' . 'Bình chọn của bạn' . '">*</div>
			';
}
else
{
$__compilerVar5 .= '
				<div class="votedIconCell"></div>
			';
}
$__compilerVar5 .= '
			<h3 class="optionText" ' . (($response['hasVoted']) ? ('title="' . 'Bình chọn của bạn' . '"') : ('')) . '>
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '
			</h3>

			<div class="count"' . (($poll['voter_count']) ? (' class="Tooltip" title="' . XenForo_Template_Helper_Core::numberFormat((100 * $response['response_vote_count'] / $poll['voter_count']), '1') . '%"') : ('')) . '>
				';
if ($poll['public_votes'] AND $response['response_vote_count'])
{
$__compilerVar5 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array(
'poll_response_id' => $pollResponseId
)) . '" class="concealed OverlayTrigger">' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' phiếu' . '</a>
				';
}
else
{
$__compilerVar5 .= '
					' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' phiếu' . '
				';
}
$__compilerVar5 .= '
			</div>
		</li>
	';
}
$__compilerVar5 .= '
	</ol>
</div>';
$__compilerVar4 .= $__compilerVar5;
unset($__compilerVar5);
$__compilerVar4 .= '
	';
$__compilerVar6 = '';
$this->addRequiredExternal('css', 'wf_default');
$__compilerVar6 .= '
';
$this->addRequiredExternal('css', 'polls');
$__compilerVar6 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar6 .= '

<div id="PollContainer" class="NoAutoHeader PollContainer widget-poll">
	<form action="' . XenForo_Template_Helper_Core::link('threads/poll/vote', $thread, array()) . '" method="post" class="pollBlock AutoValidator PollVoteForm"
		data-container="#PollContainer" data-max-votes="' . htmlspecialchars($poll['max_votes'], ENT_QUOTES, 'UTF-8') . '">

		<div class="pollContent">
			' . $__compilerVar4 . '
		</div>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="_fromWidget" value="1" />
	</form>
</div>';
$__output .= $__compilerVar6;
unset($__compilerVar4, $__compilerVar6);
