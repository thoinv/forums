<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Member Analytics';
$__output .= '

';
$this->addRequiredExternal('css', 'discussion_list');
$__output .= '
';
$this->addRequiredExternal('css', 'better_analytics');
$__output .= '

<h3 class="textHeading">' . 'Other Users Sharing Same Computer With ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '' . '</h3>

';
if ($userBlocksAnalytics)
{
$__output .= '
	' . 'User blocks Google Analytics tracking (can\'t tell if they share a computer based on Analytics tracking).' . '
';
}
else if (!$user['customFields']['analytics_cid'])
{
$__output .= '
	' . 'No Analytics tracking found for user.  Have they visited since you have had the Better Analytics add-on installed?' . '
';
}
else if ($users_sharing)
{
$__output .= '
	' . 'Keep in mind that this does not necessarily mean that the users are the same person.  It simply means both users have used the same computer.' . '

	<div class="section discussionList">
	
		<dl class="sectionHeaders">
			<dd class="main">' . 'User' . '</dd>
			<dd>' . 'Posts' . '</dd>
			<dd>' . 'Last Activity' . '</dd>
		</dl>
	
		<dl>
			';
foreach ($users_sharing AS $user)
{
$__output .= '
				<li class="primaryContent">
					<dd>' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($user,'',(true),array())) . '</dd>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($user['message_count'], '0') . '</dd>
					<dd>' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($user['last_activity'],array(
'time' => '$user.last_activity'
))) . '</dd>
				</li>
			';
}
$__output .= '
		</dl>
	
	</div>
';
}
else
{
$__output .= '
	' . 'No users found.' . '
';
}
$__output .= '

<h3 class="textHeading" style="padding-top: 20px;">' . 'Analytics Insights For Last ' . htmlspecialchars($xenOptions['dpBetterAnalyticsApiInfo']['days'], ENT_QUOTES, 'UTF-8') . ' Days' . '</h3>

';
if (!$xenOptions['dpAnalyticsCredentials']['client_id'] || !$xenOptions['dpAnalyticsCredentials']['client_secret'] || !$xenOptions['dpAnalyticsTokens'])
{
$__output .= '
	' . 'Google API Project Credentials Not Setup (setup under Admin -> Options -> Statistics and Metrics)' . '
';
}
else if ($report_data === false)
{
$__output .= '
	' . 'Not all users can get analytics reports with unlicensed copies of the Better Analytics add-on (you may get reports for any user with a User ID of 100 or less).<br /><br />

You can license a copy <a href="https://marketplace.digitalpoint.com/better-analytics.1787/item" target="_blank">over here</a>.<br /><br />

If this is a valid license, make sure the purchaser of the add-on has verified ownership of this domain <a href="https://forums.digitalpoint.com/marketplace/domain-verification" target="_blank">over here</a>.' . '
';
}
$__output .= '

' . (($canViewRevenue && $report_data['results']) ? ('<div class="revenue">' . 'Revenue:' . ' <b>' . htmlspecialchars($report_data['results']['revenue']['currency'], ENT_QUOTES, 'UTF-8') . XenForo_Template_Helper_Core::numberFormat($report_data['results']['revenue']['data'], '2') . '</b></div>') : ('')) . '

';
if ($report_data['results']['sessions']['sampled_data'] || $report_data['results']['source_medium']['sampled_data'] || $report_data['results']['social']['sampled_data'])
{
$__output .= '
	<ul class="messageNotices">
		<li class="warningNotice"><span class="icon Tooltip" data-tipclass="iconTip"></span>' . 'Some data is sampled data.  You may want to request less days (in Statistics and Metrics options) to get more accurate data.' . '</li>
	</ul>
';
}
$__output .= '

';
if ($report_data['results']['error'])
{
$__output .= '
	<ul class="messageNotices">
		<li class="warningNotice"><span class="icon Tooltip" data-tipclass="iconTip"></span>' . 'Error From API: <b>' . htmlspecialchars($report_data['results']['error'], ENT_QUOTES, 'UTF-8') . ' (' . htmlspecialchars($report_data['code'], ENT_QUOTES, 'UTF-8') . ')' . '</b>' . '</li>
	</ul>
';
}
$__output .= '

' . (($report_data['results']['sessions']['data']) ? ('<div class="chartWrapper"><div id="line_sessions" class="chart_line" ></div></div>') : ('')) . '
' . (($report_data['results']['source_medium']['data']) ? ('<div class="chartWrapper"><div id="pie_source" class="chart_pie" /></div>') : ('')) . '
' . (($report_data['results']['social']['data']) ? ('<div class="chartWrapper"><div id="pie_social" class="chart_pie" /></div>') : ('')) . '

';
if ($report_data['results']['search']['data'])
{
$__output .= '
	<div class="keywordList section discussionList">
		<dl class="sectionHeaders">
			<dd class="main">' . 'Site Search Phrase' . (($report_data['results']['search']['sampled_data']) ? (' ' . '(sampled data!!!)') : ('')) . '</dd>
			<dd>' . 'Total Searches' . '</dd>
		</dl>
		';
foreach ($report_data['results']['search']['data'] AS $keywords)
{
$__output .= '

			<dl>
					
				<li class="primaryContent">
					<dd>' . htmlspecialchars($keywords['term'], ENT_QUOTES, 'UTF-8') . '</dd>
					<dd>' . XenForo_Template_Helper_Core::numberFormat($keywords['total'], '0') . '</dd>
				</li>
			</dl>
		';
}
$__output .= '
	
	</div>
';
}
$__output .= '

<script>

$(document).ready(function(){

setTimeout(function() {

';
if ($report_data['results']['sessions']['data'])
{
$__output .= '
	var data = google.visualization.arrayToDataTable([
		[\'' . 'Date' . '\', \'' . 'Sessions' . '\'],
          	' . $report_data['results']['sessions']['json'] . '
	]);

	var options = {
		title: \'' . 'Visits To Site' . (($report_data['results']['sessions']['sampled_data']) ? (' ' . '(sampled data!!!)') : ('')) . '\',
		width: $(\'#line_sessions\').width(),
		height: $(\'#line_sessions\').width() / 2,
		vAxis: {
			title: \'' . 'Sessions' . '\'
		},

		legend: {position: \'bottom\'}
	};

	var chart = new google.visualization.LineChart(document.getElementById(\'line_sessions\'));

	chart.draw(data, options);
';
}
$__output .= '
';
if ($report_data['results']['source_medium']['data'])
{
$__output .= '
	var data = google.visualization.arrayToDataTable([
		[\'' . 'Source' . '\', \'' . 'Total' . '\'],
          	' . $report_data['results']['source_medium']['json'] . '
	]);

	var options = {
		title: \'' . 'Source / Medium' . (($report_data['results']['source_medium']['sampled_data']) ? (' ' . '(sampled data!!!)') : ('')) . '\',
		width: $(\'#pie_source\').width(),
		height: $(\'#pie_source\').width() / 2,
	};

	var chart = new google.visualization.PieChart(document.getElementById(\'pie_source\'));

	chart.draw(data, options);
';
}
$__output .= '
';
if ($report_data['results']['social']['data'])
{
$__output .= '
	var data = google.visualization.arrayToDataTable([
		[\'' . 'Type' . '\', \'' . 'Interactions' . '\'],
          	' . $report_data['results']['social']['json'] . '
	]);

	var options = {
		title: \'' . 'Social Interaction' . (($report_data['results']['social']['sampled_data']) ? (' ' . '(sampled data!!!)') : ('')) . '\',
		width: $(\'#pie_social\').width(),
		height: $(\'#pie_social\').width() / 2,
	};

	var chart = new google.visualization.PieChart(document.getElementById(\'pie_social\'));

	chart.draw(data, options);
';
}
$__output .= '
}, 1);
});
</script>';
