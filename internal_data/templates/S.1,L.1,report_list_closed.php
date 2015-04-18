<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Closed Reports: ' . XenForo_Template_Helper_Core::datetime($minimumTimestamp, 'absolute') . ' - ' . XenForo_Template_Helper_Core::datetime($maximumTimestamp, 'absolute') . '';
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:reports', false, array()), 'value' => 'Reported Items');
$__output .= '

';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= '<a href="' . XenForo_Template_Helper_Core::link('reports', false, array()) . '" class="callToAction"><span>' . 'Active Reports' . '</span></a>';
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
			<a class="title"><span>' . 'Content' . '</span></a>
		</dd>
		<dd class="stats">
			<a class="major"><span>' . 'Comments' . '</span></a>
		</dd>
		<dd class="lastPost"><a><span>' . 'Last Modified' . '</span></a></dd>
	</dl>

	<ol class="discussionListItems">
		';
if ($reports)
{
$__output .= '
			';
foreach ($reports AS $report)
{
$__output .= '
				';
$__compilerVar1 = '';
$this->addRequiredExternal('css', 'report');
$__compilerVar1 .= '
';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar1 .= '

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
$__compilerVar1 .= XenForo_Template_Helper_Core::string('wrap', array(
'0' => htmlspecialchars($report['contentTitle'], ENT_QUOTES, 'UTF-8', (false)),
'1' => '50'
));
}
else
{
$__compilerVar1 .= 'Unknown Content';
}
$__compilerVar1 .= '</a>
			</h3>

			<div class="secondRow">
				<div class="posterDate muted">
					';
if ($report['username'])
{
$__compilerVar1 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($report,'',false,array(
'title' => 'Content creator'
)));
}
else
{
$__compilerVar1 .= 'Guest';
}
$__compilerVar1 .= ',
					<span class="faint">' . 'Reported' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($report['first_report_date'],array(
'time' => '$report.first_report_date'
))) . '</span>
				</div>

				<div class="controls faint">
					' . htmlspecialchars($report['reportState'], ENT_QUOTES, 'UTF-8');
if ($report['assigned_username'] AND $report['isVisible'])
{
$__compilerVar1 .= ' (' . htmlspecialchars($report['assigned_username'], ENT_QUOTES, 'UTF-8') . ')';
}
$__compilerVar1 .= '
				</div>
			</div>
		</div>
	</div>

	<div class="listBlock stats pairsJustified">
		';
if ($report['report_count'])
{
$__compilerVar1 .= '
			<dl class="major"><dt>' . 'Reports' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['report_count'], '0') . '</dd></dl>
			<dl class="minor"><dt>' . 'Comments' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['comment_count'], '0') . '</dd></dl>
		';
}
else
{
$__compilerVar1 .= '
			<dl class="major"><dt>' . 'Comments' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['comment_count'], '0') . '</dd></dl>
		';
}
$__compilerVar1 .= '
	</div>

	<div class="listBlock lastPost">
		<dl class="lastPostInfo">
			<dt>';
if ($report['isVisible'])
{
$__compilerVar1 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($report['lastModifiedInfo'],'',false,array()));
}
else
{
$__compilerVar1 .= 'N/A';
}
$__compilerVar1 .= '</dt>
			<dd class="muted"><a href="' . XenForo_Template_Helper_Core::link('reports', $report, array()) . '" class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($report['lastModifiedInfo']['date'],array(
'time' => '$report.lastModifiedInfo.date'
))) . '</a></dd>
		</dl>
	</div>

</li>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
$__output .= '
			';
}
$__output .= '
		';
}
else
{
$__output .= '
			<li class="primaryContent">' . 'No reports have been closed during this period.' . '</li>
		';
}
$__output .= '
	</ol>
	
	<div class="sectionFooter actionList">
		<a href="' . XenForo_Template_Helper_Core::link('reports/closed', '', array(
'page' => ($page + 1)
)) . '">&larr; ' . 'Older' . '</a>
		';
if ($page > 1)
{
$__output .= '
			<a href="' . XenForo_Template_Helper_Core::link('reports/closed', '', array(
'page' => ($page - 1)
)) . '" class="newerReportsLink">' . 'Newer' . ' &rarr;</a>
		';
}
$__output .= '
	</div>
</div>';
