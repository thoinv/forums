<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '
' . '

<div class="overlayScroll pollResultsOverlay">

	<ol class="pollResults noResults">
	';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__output .= '
		<li class="pollResult ' . (($response['hasVoted']) ? ('voted') : ('')) . '">
			';
if ($response['hasVoted'])
{
$__output .= '
				<div class="votedIconCell" title="' . 'Your vote' . '">*</div>
			';
}
else
{
$__output .= '
				<div class="votedIconCell"></div>
			';
}
$__output .= '
			<h3 class="optionText" ' . (($response['hasVoted']) ? ('title="' . 'Your vote' . '"') : ('')) . '>
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '
			</h3>

			<div class="count"' . (($poll['voter_count']) ? (' class="Tooltip" title="' . XenForo_Template_Helper_Core::numberFormat((100 * $response['response_vote_count'] / $poll['voter_count']), '1') . '%"') : ('')) . '>
				';
if ($poll['public_votes'] AND $response['response_vote_count'])
{
$__output .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array(
'poll_response_id' => $pollResponseId
)) . '" class="concealed OverlayTrigger">' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' vote(s)' . '</a>
				';
}
else
{
$__output .= '
					' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' vote(s)' . '
				';
}
$__output .= '
			</div>
		</li>
	';
}
$__output .= '
	</ol>
</div>';
