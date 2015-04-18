<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Reported Items';
$__output .= '

';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= '<a href="' . XenForo_Template_Helper_Core::link('reports/closed', false, array()) . '" class="callToAction"><span>' . 'Closed Reports' . '</span></a>';
$__output .= '

';
$this->addRequiredExternal('css', 'report');
$__output .= '
';
$this->addRequiredExternal('css', 'discussion_list');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('reports/search', false, array()) . '" method="post" class="section reportSearchForm">
	' . 'Find reports for member' . ': <input type="text" name="username" class="AutoComplete textCtrl AcSingle" size="25" /> <input type="submit" class="button primary" value="' . 'Search' . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>
	
<div class="discussionList section">
	<h3 class="textHeading">' . 'Active Reports' . '</h3>
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
			<li class="primaryContent">' . 'There are no active reports requiring your attention.' . '</li>
		';
}
$__output .= '
	</ol>
</div>

';
if ($recentlyClosed)
{
$__output .= '
	<div class="discussionList section">
		<h3 class="textHeading">' . 'Recently Closed Reports' . '</h3>
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
foreach ($recentlyClosed AS $report)
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
$__compilerVar2 .= 'Guest';
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
			<dl class="major"><dt>' . 'Reports' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['report_count'], '0') . '</dd></dl>
			<dl class="minor"><dt>' . 'Comments' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['comment_count'], '0') . '</dd></dl>
		';
}
else
{
$__compilerVar2 .= '
			<dl class="major"><dt>' . 'Comments' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['comment_count'], '0') . '</dd></dl>
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
';
}
