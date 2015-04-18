<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($poll['question'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Edit Poll';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Edit Poll';
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

<form action="' . XenForo_Template_Helper_Core::link('threads/poll/edit', $thread, array()) . '" method="post" class="xenForm">
	<dl class="ctrlUnit">
		<dt><label for="ctrl_question">' . 'Question' . ':</label></dt>
		<dd>
			';
if ($canEditPollDetails)
{
$__output .= '
				<input type="text" name="question" value="' . htmlspecialchars($poll['question'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" id="ctrl_question" maxlength="100" data-liveTitleTemplate="' . 'Edit Poll' . ': <em>%s</em>" />
			';
}
else
{
$__output .= '
				' . htmlspecialchars($poll['question'], ENT_QUOTES, 'UTF-8') . '
			';
}
$__output .= '
		</dd>
	</dl>
	
	<dl class="ctrlUnit">
		<dt>' . 'Possible Responses' . ':</dt>
		<dd>
			<ul class="PollResponseContainer">
			';
foreach ($poll['responses'] AS $pollResponseId => $response)
{
$__output .= '
				<li>
					';
if ($canEditPollDetails)
{
$__output .= '
						<input type="text" name="existing_responses[' . htmlspecialchars($pollResponseId, ENT_QUOTES, 'UTF-8') . ']" value="' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '" class="textCtrl" placeholder="' . 'Poll choice' . '..." maxlength="100" />
					';
}
else
{
$__output .= '
						' . htmlspecialchars($response['response'], ENT_QUOTES, 'UTF-8') . '
					';
}
$__output .= '
				</li>
			';
}
$__output .= '
			';
if (XenForo_Template_Helper_Core::numberFormat(count($poll['responses']), '0') < $xenOptions['pollMaximumResponses'])
{
$__output .= '
				<li><input type="text" name="new_responses[]" class="textCtrl" placeholder="' . 'Poll choice' . '..." maxlength="100" /></li>
			';
}
$__output .= '
			</ul>
			<input type="button" value="' . 'Add Additional Response' . '" class="FieldAdder button smallButton" data-source="ul.PollResponseContainer li" data-maxfields="' . htmlspecialchars($xenOptions['pollMaximumResponses'], ENT_QUOTES, 'UTF-8') . '" />
		</dd>
	</dl>

	';
if ($canEditMaxVotes)
{
$__output .= '
		<dl class="ctrlUnit">
			<dt>' . 'Maximum Selectable Responses' . ':</dt>
			<dd>
				<ul>
					';
if ($poll['max_votes'] == 1 OR !$poll['voter_count'])
{
$__output .= '
						<li><label><input type="radio" name="max_votes_type" value="single" ' . (($poll['max_votes'] == 1) ? ' checked="checked"' : '') . ' /> ' . 'Single Choice' . '</label></li>
					';
}
$__output .= '
					<li><label><input type="radio" name="max_votes_type" value="unlimited" ' . (($poll['max_votes'] == 0) ? ' checked="checked"' : '') . ' /> ' . 'Unlimited' . '</label></li>
					<li><input type="radio" name="max_votes_type" value="number" class="Disabler" id="ctrl_max_votes_type_value" ' . (($poll['max_votes'] > 1) ? ' checked="checked"' : '') . ' /> 
						<span id="ctrl_max_votes_type_value_Disabler">
							<input type="number" class="textCtrl number SpinBox" name="max_votes_value" value="' . (($poll['max_votes'] > 1) ? (htmlspecialchars($poll['max_votes'], ENT_QUOTES, 'UTF-8')) : ('2')) . '" min="1" step="1" />
						</span>
					</li>
				</ul>
				<p class="explain">
					' . 'This is the maximum number of responses a voter may select when voting.' . '
					';
if ($poll['voter_count'] > 0)
{
$__output .= 'This number may only be increased.';
}
$__output .= '
				</p>
			</dd>
		</dl>
	';
}
$__output .= '
	
	<dl class="ctrlUnit">
		<dt>' . 'Options' . ':</dt>
		<dd>
			<ul>
				<li><label><input type="checkbox" name="change_vote" value="1" ' . (($poll['change_vote']) ? ' checked="checked"' : '') . ' /> ' . 'Allow voters to change their votes' . '</label></li>

				';
if ($canEditPublic)
{
$__output .= '
					<li><label><input type="checkbox" name="public_votes" value="1" ' . (($poll['public_votes']) ? ' checked="checked"' : '') . ' /> ' . 'Display votes publicly' . '</label></li>
				';
}
$__output .= '

				<li><label><input type="checkbox" name="view_results_unvoted" value="1" ' . (($poll['view_results_unvoted']) ? ' checked="checked"' : '') . ' /> ' . 'Allow the results to be viewed without voting' . '</label></li>

				';
if ($poll['close_date'])
{
$__output .= '
					<li><label><input type="checkbox" name="close_date" value="' . htmlspecialchars($poll['close_date'], ENT_QUOTES, 'UTF-8') . '" checked="checked" /> ' . 'Close this poll on ' . XenForo_Template_Helper_Core::datetime($poll['close_date'], 'absolute') . '' . '</label></li>
				';
}
else
{
$__output .= '
					<li><label><input type="checkbox" name="close" value="1" class="Disabler" id="ctrl_close" /> ' . 'Close this poll after' . ':</label>
						<ul id="ctrl_close_Disabler">
							<li>
								<input type="text" size="5" name="close_length" value="7" class="textCtrl autoSize" />
								<select name="close_units" class="textCtrl autoSize">
									<option value="hours">' . 'Hours' . '</option>
									<option value="days" selected="selected">' . 'Days' . '</option>
									<option value="weeks">' . 'Weeks' . '</option>
									<option value="months">' . 'Months' . '</option>
								</select>
							</li>
						</ul>
					</li>
				';
}
$__output .= '
			</ul>
		</dd>
	</dl>
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Save Changes' . '" accesskey="s" class="button primary" />
		</dd>
	</dl>
	
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>

';
if ($canResetPoll)
{
$__output .= '
	<form action="' . XenForo_Template_Helper_Core::link('threads/poll/reset', $thread, array()) . '" method="post" class="xenForm">
		<h3 class="textHeading">' . 'Delete Poll' . '</h3>
		<dl class="ctrlUnit">
			<dt></dt>
			<dd>
				<ul>
					<li><label><input type="radio" name="poll_action" value="" checked="checked" /> ' . 'Do nothing' . '</label><li>
					';
if ($poll['voter_count'])
{
$__output .= '
						<li><label><input type="radio" name="poll_action" value="reset" /> ' . 'Reset all votes' . '</label></li>
					';
}
$__output .= '
					<li><label><input type="radio" name="poll_action" value="remove" /> ' . 'Delete entire poll' . '</label></li>
				</ul>
			</dd>
		</dl>

		<dl class="ctrlUnit submitUnit">
			<dt></dt>
			<dd>
				<input type="submit" value="' . 'Delete' . '" class="button primary" />
			</dd>
		</dl>
		
		<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
	</form>
';
}
