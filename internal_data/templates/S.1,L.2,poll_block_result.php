<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '

<div class="overlayScroll pollResultsOverlay">

	<ol class="pollResults ' . ((!$poll['canViewResults']) ? ('noResults') : ('')) . '">
	';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__output .= '
		<li class="pollResult ' . (($response['hasVoted']) ? ('voted') : ('')) . '">
			';
if ($response['hasVoted'])
{
$__output .= '
				<div class="votedIconCell" title="' . 'Bình chọn của bạn' . '">*</div>
			';
}
else
{
$__output .= '
				<div class="votedIconCell"></div>
			';
}
$__output .= '
			<h3 class="optionText" ' . (($response['hasVoted']) ? ('title="' . 'Bình chọn của bạn' . '"') : ('')) . '>
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '
			</h3>
			';
if ($poll['canViewResults'])
{
$__output .= '
				<div class="barCell">
					<span class="barContainer">
						';
if ($response['response_vote_count'])
{
$__output .= '<span class="bar" style="width: ' . (100 * $response['response_vote_count'] / $poll['voter_count']) . '%"></span>';
}
$__output .= '
					</span>
				</div>
				<div class="count">
					';
if ($poll['public_votes'] AND $response['response_vote_count'])
{
$__output .= '
						<a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array(
'poll_response_id' => $pollResponseId
)) . '" class="concealed OverlayTrigger">' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' phiếu' . '</a>
					';
}
else
{
$__output .= '
						' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' phiếu' . '
					';
}
$__output .= '
				</div>
				<div class="percentage">
					';
if ($poll['voter_count'])
{
$__output .= '
						' . XenForo_Template_Helper_Core::numberFormat((100 * $response['response_vote_count'] / $poll['voter_count']), '1') . '%
					';
}
else
{
$__output .= '
						' . XenForo_Template_Helper_Core::numberFormat('0', '1') . '%
					';
}
$__output .= '
				</div>
			';
}
$__output .= '
		</li>
	';
}
$__output .= '
	</ol>
	
	<div class="buttons">
		';
$__compilerVar2 = '';
$__compilerVar2 .= '
				';
if ($poll['max_votes'] != 1)
{
$__compilerVar2 .= '
					<span class="multipleNote muted">' . 'Multiple votes are allowed.' . '</span>
				';
}
$__compilerVar2 .= '
				';
if (!$poll['canViewResults'])
{
$__compilerVar2 .= '
					<div class="noResultsNote muted">' . 'Results are only viewable after voting.' . '</div>
				';
}
$__compilerVar2 .= '
			';
if (trim($__compilerVar2) !== '')
{
$__output .= '
			<div class="pollNotes">
			' . $__compilerVar2 . '
			</div>
		';
}
unset($__compilerVar2);
$__output .= '
		
		';
if ($poll['canVote'])
{
$__output .= '
			<a href="' . XenForo_Template_Helper_Core::link('threads/poll/vote', $thread, array()) . '" class="button PollChangeVote nonOverlayOnly">' . 'Change Your Vote' . '</a>
		';
}
$__output .= '
	</div>
</div>';
