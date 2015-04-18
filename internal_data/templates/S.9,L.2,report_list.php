<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Mục đã được báo cáo nội dung xấu';
$__output .= '

';
$__extraData['topctrl'] = '';
$__extraData['topctrl'] .= '<a href="' . XenForo_Template_Helper_Core::link('reports/closed', false, array()) . '" class="callToAction"><span>' . 'Báo cáo đã đóng' . '</span></a>';
$__output .= '

';
$this->addRequiredExternal('css', 'report');
$__output .= '
';
$this->addRequiredExternal('css', 'discussion_list');
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('reports/search', false, array()) . '" method="post" class="section reportSearchForm">
	' . 'Find reports for member' . ': <input type="text" name="username" class="AutoComplete textCtrl AcSingle" size="25" /> <input type="submit" class="button primary" value="' . 'Tìm kiếm' . '" />
	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>
	
<div class="discussionList section">
	<h3 class="textHeading">' . 'Báo cáo chưa duyệt' . '</h3>
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
if ($reports)
{
$__output .= '
			';
foreach ($reports AS $report)
{
$__output .= '
				';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'report');
$__compilerVar3 .= '
';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar3 .= '

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
$__compilerVar3 .= XenForo_Template_Helper_Core::string('wrap', array(
'0' => htmlspecialchars($report['contentTitle'], ENT_QUOTES, 'UTF-8', (false)),
'1' => '50'
));
}
else
{
$__compilerVar3 .= 'Unknown Content';
}
$__compilerVar3 .= '</a>
			</h3>

			<div class="secondRow">
				<div class="posterDate muted">
					';
if ($report['username'])
{
$__compilerVar3 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($report,'',false,array(
'title' => 'Content creator'
)));
}
else
{
$__compilerVar3 .= 'Khách';
}
$__compilerVar3 .= ',
					<span class="faint">' . 'Reported' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($report['first_report_date'],array(
'time' => '$report.first_report_date'
))) . '</span>
				</div>

				<div class="controls faint">
					' . htmlspecialchars($report['reportState'], ENT_QUOTES, 'UTF-8');
if ($report['assigned_username'] AND $report['isVisible'])
{
$__compilerVar3 .= ' (' . htmlspecialchars($report['assigned_username'], ENT_QUOTES, 'UTF-8') . ')';
}
$__compilerVar3 .= '
				</div>
			</div>
		</div>
	</div>

	<div class="listBlock stats pairsJustified">
		';
if ($report['report_count'])
{
$__compilerVar3 .= '
			<dl class="major"><dt>' . 'Báo cáo' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['report_count'], '0') . '</dd></dl>
			<dl class="minor"><dt>' . 'Bình luận' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['comment_count'], '0') . '</dd></dl>
		';
}
else
{
$__compilerVar3 .= '
			<dl class="major"><dt>' . 'Bình luận' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['comment_count'], '0') . '</dd></dl>
		';
}
$__compilerVar3 .= '
	</div>

	<div class="listBlock lastPost">
		<dl class="lastPostInfo">
			<dt>';
if ($report['isVisible'])
{
$__compilerVar3 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($report['lastModifiedInfo'],'',false,array()));
}
else
{
$__compilerVar3 .= 'N/A';
}
$__compilerVar3 .= '</dt>
			<dd class="muted"><a href="' . XenForo_Template_Helper_Core::link('reports', $report, array()) . '" class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($report['lastModifiedInfo']['date'],array(
'time' => '$report.lastModifiedInfo.date'
))) . '</a></dd>
		</dl>
	</div>

</li>';
$__output .= $__compilerVar3;
unset($__compilerVar3);
$__output .= '
			';
}
$__output .= '
		';
}
else
{
$__output .= '
			<li class="primaryContent">' . 'Hiện tại không có báo cáo nào cần bạn phải chú ý.' . '</li>
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
				<a class="title"><span>' . 'Nội dung' . '</span></a>
			</dd>
			<dd class="stats">
				<a class="major"><span>' . 'Bình luận' . '</span></a>
			</dd>
			<dd class="lastPost"><a><span>' . 'Lần sửa cuối' . '</span></a></dd>
		</dl>
		<ol class="discussionListItems">
		';
foreach ($recentlyClosed AS $report)
{
$__output .= '
			';
$__compilerVar4 = '';
$this->addRequiredExternal('css', 'report');
$__compilerVar4 .= '
';
$this->addRequiredExternal('css', 'discussion_list');
$__compilerVar4 .= '

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
$__compilerVar4 .= XenForo_Template_Helper_Core::string('wrap', array(
'0' => htmlspecialchars($report['contentTitle'], ENT_QUOTES, 'UTF-8', (false)),
'1' => '50'
));
}
else
{
$__compilerVar4 .= 'Unknown Content';
}
$__compilerVar4 .= '</a>
			</h3>

			<div class="secondRow">
				<div class="posterDate muted">
					';
if ($report['username'])
{
$__compilerVar4 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($report,'',false,array(
'title' => 'Content creator'
)));
}
else
{
$__compilerVar4 .= 'Khách';
}
$__compilerVar4 .= ',
					<span class="faint">' . 'Reported' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($report['first_report_date'],array(
'time' => '$report.first_report_date'
))) . '</span>
				</div>

				<div class="controls faint">
					' . htmlspecialchars($report['reportState'], ENT_QUOTES, 'UTF-8');
if ($report['assigned_username'] AND $report['isVisible'])
{
$__compilerVar4 .= ' (' . htmlspecialchars($report['assigned_username'], ENT_QUOTES, 'UTF-8') . ')';
}
$__compilerVar4 .= '
				</div>
			</div>
		</div>
	</div>

	<div class="listBlock stats pairsJustified">
		';
if ($report['report_count'])
{
$__compilerVar4 .= '
			<dl class="major"><dt>' . 'Báo cáo' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['report_count'], '0') . '</dd></dl>
			<dl class="minor"><dt>' . 'Bình luận' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['comment_count'], '0') . '</dd></dl>
		';
}
else
{
$__compilerVar4 .= '
			<dl class="major"><dt>' . 'Bình luận' . ':</dt> <dd>' . XenForo_Template_Helper_Core::numberFormat($report['comment_count'], '0') . '</dd></dl>
		';
}
$__compilerVar4 .= '
	</div>

	<div class="listBlock lastPost">
		<dl class="lastPostInfo">
			<dt>';
if ($report['isVisible'])
{
$__compilerVar4 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($report['lastModifiedInfo'],'',false,array()));
}
else
{
$__compilerVar4 .= 'N/A';
}
$__compilerVar4 .= '</dt>
			<dd class="muted"><a href="' . XenForo_Template_Helper_Core::link('reports', $report, array()) . '" class="dateTime">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($report['lastModifiedInfo']['date'],array(
'time' => '$report.lastModifiedInfo.date'
))) . '</a></dd>
		</dl>
	</div>

</li>';
$__output .= $__compilerVar4;
unset($__compilerVar4);
$__output .= '
		';
}
$__output .= '
		</ol>
	</div>
';
}
