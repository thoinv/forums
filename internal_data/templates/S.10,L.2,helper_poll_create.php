<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['head']['pollCss'] = '';
$__extraData['head']['pollCss'] .= '<style>.hasJs .PollNonJsInput { display: none }</style>';
$__output .= '

<dl class="ctrlUnit">
	<dt><label for="ctrl_poll_question">' . 'Câu hỏi' . ':</label></dt>
	<dd><input type="text" name="poll[question]" class="textCtrl" id="ctrl_poll_question" maxlength="100" value="' . htmlspecialchars($poll['question'], ENT_QUOTES, 'UTF-8') . '" /></dd>
</dl>
<dl class="ctrlUnit">
	<dt>' . 'Có thể trả lời' . ':</dt>
	<dd>
		<ul class="PollResponseContainer">
			';
if ($poll)
{
$__output .= '
				';
foreach ($poll['responses'] AS $response)
{
$__output .= '
					<li><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Lựa chọn' . '..." maxlength="100" value="' . htmlspecialchars($response, ENT_QUOTES, 'UTF-8') . '" /></li>
				';
}
$__output .= '
				';
foreach ($poll['extraResponses'] AS $null)
{
$__output .= '
					<li><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Lựa chọn' . '..." maxlength="100" /></li>
				';
}
$__output .= '
			';
}
$__output .= '
			';
foreach ($pollExtraArray AS $null)
{
$__output .= '
				<li class="PollNonJsInput"><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Lựa chọn' . '..." maxlength="100" /></li>
			';
}
$__output .= '
			';
if (!$poll)
{
$__output .= '
				<li><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Lựa chọn' . '..." maxlength="100" /></li>
				<li><input type="text" name="poll[responses][]" class="textCtrl" placeholder="' . 'Lựa chọn' . '..." maxlength="100" /></li>
			';
}
$__output .= '
		</ul>
		<input type="button" value="' . 'Thêm lựa chọn trả lời' . '" class="button smallButton FieldAdder JsOnly" data-source="ul.PollResponseContainer li" data-maxfields="' . htmlspecialchars($xenOptions['pollMaximumResponses'], ENT_QUOTES, 'UTF-8') . '" />
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
	<dt>' . 'Tùy chọn' . ':</dt>
	<dd>
		<ul>
			<li><label><input type="checkbox" name="poll[change_vote]" value="1" checked="checked" /> ' . 'Allow voters to change their votes' . '</label></li>

			<li><label><input type="checkbox" name="poll[public_votes]" value="1" /> ' . 'Hiển thị bình chọn công cộng' . '</label></li>

			<li><label><input type="checkbox" name="poll[view_results_unvoted]" value="1" checked="checked" /> ' . 'Allow the results to be viewed without voting' . '</label></li>

			<li><label><input type="checkbox" name="poll[close]" value="1" class="Disabler" id="ctrl_poll_close" /> ' . 'Đóng bình chọn này sau' . ':</label>
				<ul id="ctrl_poll_close_Disabler">
					<li>
						<input type="text" size="5" name="poll[close_length]" value="7" class="textCtrl autoSize" />
						<select name="poll[close_units]" class="textCtrl autoSize">
							<option value="hours">' . 'Giờ' . '</option>
							<option value="days" selected="selected">' . 'Ngày' . '</option>
							<option value="weeks">' . 'Tuần' . '</option>
							<option value="months">' . 'Tháng' . '</option>
						</select>
					</li>
				</ul>
			</li>
		</ul>
	</dd>
</dl>';
