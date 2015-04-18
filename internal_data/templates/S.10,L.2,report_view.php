<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Reported Content' . ': ' . htmlspecialchars($report['contentTitle'], ENT_QUOTES, 'UTF-8', (false));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($report['contentTitle'], ENT_QUOTES, 'UTF-8', (false));
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:reports', false, array()), 'value' => 'Mục đã được báo cáo nội dung xấu');
$__output .= '

';
$this->addRequiredExternal('css', 'report');
$__output .= '
';
$this->addRequiredExternal('css', 'bb_code');
$__output .= '

<div class="section">
	<h3 class="subHeading">' . 'Nội dung' . '</h3>

	';
$this->addRequiredExternal('css', 'xenforo_member_list_item');
$__output .= '
	<div class="secondaryContent memberListItem">
		' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($report,false,array(
'user' => '$report',
'size' => 's'
),'')) . '

		<div class="member">
			';
if ($report['user_id'])
{
$__output .= '
				<h3 class="username">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($report,'',(true),array())) . '</h3>
				
				<div class="userInfo">
					<div class="userBlurb dimmed">' . XenForo_Template_Helper_Core::callHelper('userBlurb', array(
'0' => $report
)) . '</div>
					<dl class="userStats pairsInline">
						<dt title="' . 'Total messages posted by ' . htmlspecialchars($report['username'], ENT_QUOTES, 'UTF-8') . '' . '">' . 'Bài viết' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['message_count'], '0') . '</dd>
						<dt title="' . 'Number of times something posted by ' . htmlspecialchars($report['username'], ENT_QUOTES, 'UTF-8') . ' has been \'liked\'' . '">' . 'Đã được thích' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['like_count'], '0') . '</dd>
						<dt>' . 'Điểm thành tích' . ':</dt> <dd title="' . 'Điểm thành tích' . '">' . XenForo_Template_Helper_Core::numberFormat($report['trophy_points'], '0') . '</dd>
					</dl>
				</div>	
			';
}
else
{
$__output .= '
				<h3 class="username guest dimmed">' . 'Khách' . '</h3>
			';
}
$__output .= '
		</div>
	</div>
	' . $report['extraContentTemplate'] . '
	';
if ($report['contentLink'])
{
$__output .= '
		<div class="sectionFooter actionList"><a href="' . htmlspecialchars($report['contentLink'], ENT_QUOTES, 'UTF-8') . '" target="_blank" class="button">' . 'Go to content' . '</a></div>
	';
}
$__output .= '
</div>

<div class="section">
	<h3 class="subHeading">' . 'Bình luận' . '</h3>
	<ol>
	';
foreach ($comments AS $comment)
{
$__output .= '
		<li class="primaryContent reportComment ' . ((!$comment['is_report']) ? ('staffComment') : ('')) . '">
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($comment,false,array(
'user' => '$comment',
'size' => 's'
),'')) . '
			<div class="content">
				' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($comment,'',false,array())) . ' <span class="muted">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($comment['comment_date'],array(
'time' => '$comment.comment_date'
))) . '</span>
				';
if ($comment['state_change'])
{
$__output .= '<p class="statusChange">' . 'Status Changed' . ': ' . htmlspecialchars($comment['stateChange'], ENT_QUOTES, 'UTF-8') . '</p>';
}
$__output .= '
				';
if ($comment['message'])
{
$__output .= '<blockquote>' . XenForo_Template_Helper_Core::callHelper('bodyText', array(
'0' => $comment['message']
)) . '</blockquote>';
}
$__output .= '
			</div>
		</li>
	';
}
$__output .= '

		<li class="primaryContent">
			<form action="' . XenForo_Template_Helper_Core::link('reports/comment', $report, array()) . '" method="post" class="reportCommentForm">
				<textarea name="comment" placeholder="' . 'Comment' . '..." rows="3" class="textCtrl Elastic"></textarea>
				<div class="submitRow">
					<span class="reportCommentNote">' . 'Your comment will only be visible to moderators.' . '</span>
					';
if ($report['isClosed'])
{
$__output .= '
						<span class="reportCommentNote">' . 'Bình luận của bạn sẽ mở lại báo cáo này.' . '</span>
						<input type="hidden" name="reopen" value="1" />
					';
}
$__output .= '
					<input type="submit" value="' . 'Bình luận' . '" class="button primary" />
				</div>
					
				<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
			</form>
		</li>
	</ol>
</div>

';
$__extraData['sidebar'] = '';
$__extraData['sidebar'] .= '
	<div class="section">
		<div class="secondaryContent">
			<h3>' . 'Report Info' . '</h3>
			<div class="pairsJustified">
				<dl><dt>' . 'First Reported' . ':</dt> <dd>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($report['first_report_date'],array(
'time' => htmlspecialchars($report['first_report_date'], ENT_QUOTES, 'UTF-8')
))) . '</dd></dl>
				<dl><dt>' . 'Báo cáo' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['report_count'], '0') . '</dd></dl>
				<dl><dt>' . 'Bình luận' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['comment_count'], '0') . '</dd></dl>
				<dl><dt>' . 'Report Status' . ':</dt> <dd>' . htmlspecialchars($report['reportState'], ENT_QUOTES, 'UTF-8') . '</dd></dl>
				';
if ($report['assigned_username'])
{
$__extraData['sidebar'] .= '<dl><dt>' . 'Assigned to' . ':</dt> <dd>' . htmlspecialchars($report['assigned_username'], ENT_QUOTES, 'UTF-8') . '</dd></dl>';
}
$__extraData['sidebar'] .= '
				<dl><dt>' . 'Lần sửa cuối' . ':</dt> <dd>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($report['last_modified_date'],array(
'time' => htmlspecialchars($report['last_modified_date'], ENT_QUOTES, 'UTF-8')
))) . '</dd></dl>
			</div>
		</div>
		';
if ($canAssignReport AND !$canUpdateReport)
{
$__extraData['sidebar'] .= '
			<div class="sectionFooter actionList">
				<form action="' . XenForo_Template_Helper_Core::link('reports/assign', $report, array()) . '" method="post">
					<input type="submit" name="save" value="' . 'Claim and Handle Report' . '" accesskey="s" class="button primary" />
					<input type="hidden" name="viewed_assigned_user_id" value="' . htmlspecialchars($report['assigned_user_id'], ENT_QUOTES, 'UTF-8') . '" />
					<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
				</form>
			</div>
		';
}
$__extraData['sidebar'] .= '
	</div>
	
	';
if ($canUpdateReport)
{
$__extraData['sidebar'] .= '
		<div class="ToggleTriggerAnchor">
			<div class="section">
				<form action="' . XenForo_Template_Helper_Core::link('reports/update', $report, array()) . '" method="post" class="handleReportForm">
					<div class="secondaryContent">
						<h3>' . 'Handle Report' . '</h3>

						';
if ($report['activeAssignedOther'])
{
$__extraData['sidebar'] .= '
							<div class="HandleToggleSelf assignedOtherWarning">
								<p>' . 'This report is currently assigned to ' . htmlspecialchars($report['assigned_username'], ENT_QUOTES, 'UTF-8') . '.' . '</p>
								<input type="button" class="button primary ToggleTrigger" data-target=".HandleToggle" data-hide=".HandleToggleSelf" value="' . 'Handle Report' . '" />
							</div>
						';
}
$__extraData['sidebar'] .= '
						
						<div class="HandleToggle" ' . (($report['activeAssignedOther']) ? ('style="display:none"') : ('')) . '>
							<div class="updateStatus">
								<h4>' . 'Status' . ':</h4>
								<ul>
									<li><label><input type="radio" name="report_state" value="" checked="checked" /> ' . 'Do not change' . '</label></li>
									';
if ($canAssignReport)
{
$__extraData['sidebar'] .= '
										<li><label><input type="radio" name="report_state" value="assigned" /> ' . 'Assigned' . '</label></li>
									';
}
else
{
$__extraData['sidebar'] .= '
										<li><label><input type="radio" name="report_state" value="open" /> ' . 'Unassign' . '</label></li>
									';
}
$__extraData['sidebar'] .= '
									<li><label><input type="radio" name="report_state" value="resolved" /> ' . 'Đã giải quyết' . '</label></li>
									<li><label><input type="radio" name="report_state" value="rejected" /> ' . 'Đã từ chối' . '</label></li>
								</ul>

								<ul>
									<li title="' . 'Optional' . '">
										<label><input type="checkbox" name="send_alert" value="1" id="ctrl_send_alert" class="Disabler" /> ' . 'Send resolution/rejection alert' . ':</label>
										<ul id="ctrl_send_alert_Disabler">
											<li><input type="text" name="alert_comment" class="textCtrl" /></li>
										</ul>
									</li>
								</ul>
							</div>
			
							<textarea name="comment" placeholder="' . 'Comment' . '..." class="textCtrl Elastic" rows="2"></textarea>
							<div class="reportCommentNote">' . 'Your comment will only be visible to moderators.' . '</div>
						</div>
					</div>				
					<div class="sectionFooter actionList HandleToggle" ' . (($report['activeAssignedOther']) ? ('style="display:none"') : ('')) . '>
						<input type="submit" name="save" value="' . 'Update Report' . '" accesskey="s" class="button primary" />
						<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
					</div>
				</form>
			</div>

			<div class="section HandleToggle" ' . (($report['activeAssignedOther']) ? ('style="display:none"') : ('')) . '>
				<div class="secondaryContent">
					<h3>' . 'Reassign Report' . '</h3>
					<div style="text-align: center">
						<a href="' . XenForo_Template_Helper_Core::link('reports/reassign', $report, array()) . '" class="button primary OverlayTrigger">' . 'Reassign Report' . '</a>
					</div>
				</div>
			</div>
		</div>
	';
}
$__extraData['sidebar'] .= '
';
