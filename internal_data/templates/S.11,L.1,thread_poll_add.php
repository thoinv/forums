<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($thread['title'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Add Poll';
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Add Poll';
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

<form action="' . XenForo_Template_Helper_Core::link('threads/poll/add', $thread, array()) . '" method="post" class="xenForm AutoValidator" data-redirect="on">
	';
$__compilerVar3 = '';
$__extraData['head']['pollCss'] = '';
$__extraData['head']['pollCss'] .= '<style>.hasJs .PollNonJsInput { display: none }</style>';
$__compilerVar3 .= '

<dl class="ctrlUnit">
	<dt><label for="ctrl_poll_question">' . 'Question' . ':</label></dt>
	<dd><input type="text" name="poll[question]" class="textCtrl" id="ctrl_poll_question" maxlength="100" value="' . htmlspecialchars($poll['question'], ENT_QUOTES, 'UTF-8') . '" /></dd>
</dl>
<dl class="ctrlUnit">
	<dt>' . 'Possible Responses' . ':</dt>
	<dd>
		<ul class="PollResponseContainer">
			';
if ($poll)
{
$__compilerVar3 .= '
				';
foreach ($poll['responses'] AS $response)
{
$__compilerVar3 .= '
					<li><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Poll choice' . '..." maxlength="100" value="' . htmlspecialchars($response, ENT_QUOTES, 'UTF-8') . '" /></li>
				';
}
$__compilerVar3 .= '
				';
foreach ($poll['extraResponses'] AS $null)
{
$__compilerVar3 .= '
					<li><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Poll choice' . '..." maxlength="100" /></li>
				';
}
$__compilerVar3 .= '
			';
}
$__compilerVar3 .= '
			';
foreach ($pollExtraArray AS $null)
{
$__compilerVar3 .= '
				<li class="PollNonJsInput"><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Poll choice' . '..." maxlength="100" /></li>
			';
}
$__compilerVar3 .= '
			';
if (!$poll)
{
$__compilerVar3 .= '
				<li><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Poll choice' . '..." maxlength="100" /></li>
				<li><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Poll choice' . '..." maxlength="100" /></li>
			';
}
$__compilerVar3 .= '
		</ul>
		<input type="button" value="' . 'Add Additional Response' . '" class="button smallButton FieldAdder JsOnly" data-source="ul.PollResponseContainer li" data-maxfields="' . htmlspecialchars($xenOptions['pollMaximumResponses'], ENT_QUOTES, 'UTF-8') . '" />
	</dd>
</dl>

<!-- slot: after_poll_responses -->
<dl class="ctrlUnit">
	<dt>' . 'Maximum Selectable Responses' . ':</dt>
	<dd>
		<ul>
			<li><label><input type="radio" name="poll[max_votes_type]" value="single" checked="checked" /> ' . 'Single Choice' . '</label></li>
			<li><label><input type="radio" name="poll[max_votes_type]" value="unlimited" /> ' . 'Unlimited' . '</label></li>
			<li><input type="radio" name="poll[max_votes_type]" value="number" class="Disabler" id="ctrl_max_votes_type_value" /> 
				<span id="ctrl_max_votes_type_value_Disabler">
					<input type="number" class="textCtrl number SpinBox" name="poll[max_votes_value]" value="2" min="1" step="1" />
				</span>
			</li>
		</ul>
		<p class="explain">' . 'This is the maximum number of responses a voter may select when voting.' . '</p>
	</dd>
</dl>

<dl class="ctrlUnit">
	<dt>' . 'Options' . ':</dt>
	<dd>
		<ul>
			<li><label><input type="checkbox" name="poll[change_vote]" value="1" checked="checked" /> ' . 'Allow voters to change their votes' . '</label></li>

			<li><label><input type="checkbox" name="poll[public_votes]" value="1" /> ' . 'Display votes publicly' . '</label></li>

			<li><label><input type="checkbox" name="poll[view_results_unvoted]" value="1" checked="checked" /> ' . 'Allow the results to be viewed without voting' . '</label></li>

			<li><label><input type="checkbox" name="poll[close]" value="1" class="Disabler" id="ctrl_poll_close" /> ' . 'Close this poll after' . ':</label>
				<ul id="ctrl_poll_close_Disabler">
					<li>
						<input type="text" size="5" name="poll[close_length]" value="7" class="textCtrl autoSize" />
						<select name="poll[close_units]" class="textCtrl autoSize">
							<option value="hours">' . 'Hours' . '</option>
							<option value="days" selected="selected">' . 'Days' . '</option>
							<option value="weeks">' . 'Weeks' . '</option>
							<option value="months">' . 'Months' . '</option>
						</select>
					</li>
				</ul>
			</li>
		</ul>
	</dd>
</dl>';
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '
	
	<dl class="ctrlUnit submitUnit">
		<dt></dt>
		<dd>
			<input type="submit" value="' . 'Save Changes' . '" accesskey="s" class="button primary" />
		</dd>
	</dl>
	
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
