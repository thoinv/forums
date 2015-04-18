<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '\'s Reported Content';
$__output .= '

';
$this->addRequiredExternal('css', 'report');
$__output .= '
';
$this->addRequiredExternal('css', 'discussion_list');
$__output .= '

<div class="discussionList section">
	<dl class="sectionHeaders">
		<dt class="posterAvatar"><a><span></span></a></dt>
		<dd class="main">
			<a class="title"><span>' . 'Nội dung' . '</span></a>
		</dd>
		<dd class="stats">
			<a class="major"><span>' . 'Bình luận' . '</span></a>
		</dd>
		<dd class="lastPost"><a><span>' . 'Lần sửa cuối' . '</span></a></dd>
	</dl>

	<ol class="discussionListItems">
	';
foreach ($reports AS $report)
{
$__output .= '
		';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'report');
$__compilerVar2 .= '
';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar2 .= '

<li id="report-' . htmlspecialchars($report['report_id'], ENT_QUOTES, 'UTF-8') . '" class="discussionListItem ' . (($report['assigned_user_id'] == $visitor['user_id']) ? ('assignedSelf') : ('')) . ' report-' . htmlspecialchars($report['report_state'], ENT_QUOTES, 'UTF-8') . '">

	<div class="listBlock posterAvatar">
		<span class="avatarContainer">
			' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($report,(true),array(
'user' => '$report',
'size' => 's',
'img' => 'true'
),'')) . '
		</span>
	</div>

	<div class="listBlock main">

		<div class="titleText">
			<h3 class="title">
				<a href="' . XenForo_Template_Helper_Core::link('reports', $report, array()) . '">';
if ($report['isVisible'])
{
$__compilerVar2 .= XenForo_Template_Helper_Core::string('wrap', array(
'0' => htmlspecialchars($report['contentTitle'], ENT_QUOTES, 'UTF-8', (false)),
'1' => '50'
));
}
else
{
$__compilerVar2 .= 'Unknown Content';
}
$__compilerVar2 .= '</a>
			</h3>

			<div class="secondRow">
				<div class="posterDate muted">
					';
if ($report['username'])
{
$__compilerVar2 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($report,'',false,array(
'title' => 'Content creator'
)));
}
else
{
$__compilerVar2 .= 'Khách';
}
$__compilerVar2 .= ',
					<span class="faint">' . 'Reported' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($report['first_report_date'],array(
'time' => '$report.first_report_date'
))) . '</span>
				</div>

				<div class="controls faint">
					' . htmlspecialchars($report['reportState'], ENT_QUOTES, 'UTF-8');
if ($report['assigned_username'] AND $report['isVisible'])
{
$__compilerVar2 .= ' (' . htmlspecialchars($report['assigned_username'], ENT_QUOTES, 'UTF-8') . ')';
}
$__compilerVar2 .= '
				</div>
			</div>
		</div>
	</div>

	<div class="listBlock stats pairsJustified">
		';
if ($report['report_count'])
{
$__compilerVar2 .= '
			<dl class="major"><dt>' . 'Báo cáo' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['report_count'], '0') . '</dd></dl>
			<dl class="minor"><dt>' . 'Bình luận' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['comment_count'], '0') . '</dd></dl>
		';
}
else
{
$__compilerVar2 .= '
			<dl class="major"><dt>' . 'Bình luận' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['comment_count'], '0') . '</dd></dl>
		';
}
$__compilerVar2 .= '
	</div>

	<div class="listBlock lastPost">
		<dl class="lastPostInfo">
			<dt>';
if ($report['isVisible'])
{
$__compilerVar2 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($report['lastModifiedInfo'],'',false,array()));
}
else
{
$__compilerVar2 .= 'N/A';
}
$__compilerVar2 .= '</dt>
			<dd class="muted"><a href="' . XenForo_Template_Helper_Core::link('reports', $report, array()) . '" class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($report['lastModifiedInfo']['date'],array(
'time' => '$report.lastModifiedInfo.date'
))) . '</a></dd>
		</dl>
	</div>

</li>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
$__output .= '
	';
}
$__output .= '
	</ol>
</div>

<div class="pageNavLinkGroup">
	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($perPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalReports, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'reports/search', false, array(
'user_id' => $user['user_id']
), false, array())) . '
</div>';
