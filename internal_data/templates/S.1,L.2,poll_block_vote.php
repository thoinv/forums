<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '
		
<div>		
	<ol class="pollOptions">
		';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__output .= '
			<li class="pollOption"><label>';
if ($poll['max_votes'] != 1)
{
$__output .= '
				<input type="checkbox" name="response_multiple[]" class="PollResponse" value="' . htmlspecialchars($pollResponseId, ENT_QUOTES, 'UTF-8') . '" />';
}
else
{
$__output .= '
				<input type="radio" name="response" value="' . htmlspecialchars($pollResponseId, ENT_QUOTES, 'UTF-8') . '" />';
}
$__output .= '
				' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '</label></li>				
		';
}
$__output .= '
	</ol>
	
	<div class="buttons">
		';
$__compilerVar2 = '';
$__compilerVar2 .= '
				';
if ($poll['max_votes'] == 0 OR $poll['max_votes'] > count($poll['responses']))
{
$__compilerVar2 .= '
					<span class="multipleNote muted">' . 'Multiple votes are allowed.' . '</span>
				';
}
else if ($poll['max_votes'] > 1)
{
$__compilerVar2 .= '
					<span class="multipleNote muted">' . 'You may select up to ' . htmlspecialchars($poll['max_votes'], ENT_QUOTES, 'UTF-8') . ' choices.' . '</span>
				';
}
$__compilerVar2 .= '
				';
if ($poll['public_votes'])
{
$__compilerVar2 .= '
					<span class="publicWarning muted">' . 'Your vote will be publicly visible.' . '</span>
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
			
		<input type="submit" class="button primary" value="' . 'Bỏ phiếu của bạn' . '" accesskey="s" />
		';
if ($poll['canViewResults'])
{
$__output .= '
			<input type="button" value="' . 'Xem kết quả' . '" class="button OverlayTrigger JsOnly" data-href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array()) . '" />
			<noscript><a href="' . XenForo_Template_Helper_Core::link('threads/poll/results', $thread, array()) . '" class="button">' . 'Xem kết quả' . '</a></noscript>
		';
}
$__output .= '
	</div>
</div>';
