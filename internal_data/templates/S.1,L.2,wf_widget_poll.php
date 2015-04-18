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
$__compilerVar6 = '';
$__compilerVar6 .= '
					';
if ($poll['canVote'])
{
$__compilerVar6 .= '
						';
$__compilerVar7 = '';
$__compilerVar7 .= '
		
<div>		
	<ol class="pollOptions">
		';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__compilerVar7 .= '
			<li class="pollOption"><label>';
if ($poll['max_votes'] != 1)
{
$__compilerVar7 .= '
				<input type="checkbox" name="response_multiple[]" class="PollResponse" value="' . htmlspecialchars($pollResponseId, ENT_QUOTES, 'UTF-8') . '" />';
}
else
{
$__compilerVar7 .= '
				<input type="radio" name="response" value="' . htmlspecialchars($pollResponseId, ENT_QUOTES, 'UTF-8') . '" />';
}
$__compilerVar7 .= '
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '</label></li>				
		';
}
$__compilerVar7 .= '
	</ol>
	
	<div class="buttons">
		';
$__compilerVar8 = '';
$__compilerVar8 .= '
				';
if ($poll['max_votes'] == 0 OR $poll['max_votes'] > count($poll['responses']))
{
$__compilerVar8 .= '
					<span class="multipleNote muted">' . 'Multiple votes are allowed.' . '</span>
				';
}
else if ($poll['max_votes'] > 1)
{
$__compilerVar8 .= '
					<span class="multipleNote muted">' . 'You may select up to ' . htmlspecialchars($poll['max_votes'], ENT_QUOTES, 'UTF-8') . ' choices.' . '</span>
				';
}
$__compilerVar8 .= '
				';
if ($poll['public_votes'])
{
$__compilerVar8 .= '
					<span class="publicWarning muted">' . 'Your vote will be publicly visible.' . '</span>
				';
}
$__compilerVar8 .= '
				';
if (!$poll['canViewResults'])
{
$__compilerVar8 .= '
					<div class="noResultsNote muted">' . 'Results are only viewable after voting.' . '</div>
				';
}
$__compilerVar8 .= '
			';
if (trim($__compilerVar8) !== '')
{
$__compilerVar7 .= '
			<div class="pollNotes">
			' . $__compilerVar8 . '
			</div>
		';
}
unset($__compilerVar8);
$__compilerVar7 .= '
			
		<input type="submit" class="button primary" value="' . 'Bỏ phiếu của bạn' . '" accesskey="s" />
		';
if ($poll['canViewResults'])
{
$__compilerVar7 .= '
			<input type="button" value="' . 'Xem kết quả' . '" class="button OverlayTrigger JsOnly" data-href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array()) . '" />
			<noscript><a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array()) . '" class="button">' . 'Xem kết quả' . '</a></noscript>
		';
}
$__compilerVar7 .= '
	</div>
</div>';
$__compilerVar6 .= $__compilerVar7;
unset($__compilerVar7);
$__compilerVar6 .= '
					';
}
else
{
$__compilerVar6 .= '
						';
$__compilerVar9 = '';
$__compilerVar9 .= '
' . '

<div class="overlayScroll pollResultsOverlay">

	<ol class="pollResults noResults">
	';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__compilerVar9 .= '
		<li class="pollResult ' . (($response['hasVoted']) ? ('voted') : ('')) . '">
			';
if ($response['hasVoted'])
{
$__compilerVar9 .= '
				<div class="votedIconCell" title="' . 'Bình chọn của bạn' . '">*</div>
			';
}
else
{
$__compilerVar9 .= '
				<div class="votedIconCell"></div>
			';
}
$__compilerVar9 .= '
			<h3 class="optionText" ' . (($response['hasVoted']) ? ('title="' . 'Bình chọn của bạn' . '"') : ('')) . '>
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '
			</h3>

			<div class="count"' . (($poll['voter_count']) ? (' class="Tooltip" title="' . XenForo_Template_Helper_Core::numberFormat((100 * $response['response_vote_count'] / $poll['voter_count']), '1') . '%"') : ('')) . '>
				';
if ($poll['public_votes'] AND $response['response_vote_count'])
{
$__compilerVar9 .= '
					<a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array(
'poll_response_id' => $pollResponseId
)) . '" class="concealed OverlayTrigger">' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' phiếu' . '</a>
				';
}
else
{
$__compilerVar9 .= '
					' . '' . XenForo_Template_Helper_Core::numberFormat($response['response_vote_count'], '0') . ' phiếu' . '
				';
}
$__compilerVar9 .= '
			</div>
		</li>
	';
}
$__compilerVar9 .= '
	</ol>
</div>';
$__compilerVar6 .= $__compilerVar9;
unset($__compilerVar9);
$__compilerVar6 .= '
					';
}
$__compilerVar6 .= '
				';
$__compilerVar10 = '';
$this->addRequiredExternal('css', 'wf_default');
$__compilerVar10 .= '
';
$this->addRequiredExternal('css', 'polls');
$__compilerVar10 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/discussion.js');
$__compilerVar10 .= '

<div id="PollContainer" class="NoAutoHeader PollContainer widget-poll">
	<form action="' . XenForo_Template_Helper_Core::link('threads/poll/vote', $thread, array()) . '" method="post" class="pollBlock AutoValidator PollVoteForm"
		data-container="#PollContainer" data-max-votes="' . htmlspecialchars($poll['max_votes'], ENT_QUOTES, 'UTF-8') . '">

		<div class="pollContent">
			' . $__compilerVar6 . '
		</div>

		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
		<input type="hidden" name="_fromWidget" value="1" />
	</form>
</div>';
$__output .= $__compilerVar10;
unset($__compilerVar6, $__compilerVar10);
$__output .= '
		</div>
	</div>
';
}
$__output .= '

' . '
';
