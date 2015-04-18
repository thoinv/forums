<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.blockCtrl { text-align: right; margin-top: -40px; }
.monthBlock .primaryContent { border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . '; }
.monthBlock .secondaryContent { border-left: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . '; border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . '; }
.monthBlock .weekday { text-align: center; }
.monthBlock .offMonth { background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; }
.monthBlock .weekends { background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLightest') . '; }
.monthBlock .nowWeek { background: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLightest') . '; }
.monthBlock .nowToday { ' . XenForo_Template_Helper_Core::styleProperty('subHeading.background') . '; }
.monthBlock .nowWeek .birthDays a, .monthBlock .nowWeek li a,
.monthBlock .nowToday .birthDays a, .monthBlock .nowToday li a { color: ' . XenForo_Template_Helper_Core::styleProperty('subHeading.color') . '; }
.monthBlock .dayBlock { min-height: 45px; font-size: 0.8em; padding-bottom: 20px; position: relative; }
.monthBlock .dayNumber { float: right; margin: -10px -10px 0px 5px; font-weight: bold; padding: 8px; }
.monthBlock .overflow { position: absolute; font-weight: bold; }
.monthBlock .overflow .count { font-size: 2em; }
.monthBlock .birthDays { position: absolute; bottom: 0px; }
.monthBlock td { vertical-align: top; width: 14%; }
.monthBlock li { margin-bottom: 10px; max-height: 36px; overflow: hidden; }
.monthBlock li:last-child { margin-bottom: 0px; }
.monthBlock.sideBlock .hasEvent { font-size: 1.2em; font-weight: bold; }
.monthBlock.sideBlock td { vertical-align: middle; text-align: center; padding: 5px; }

.weekBlock .primaryContent { border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . '; }
.weekBlock .secondaryContent { border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . '; }
.weekBlock .birthdays { text-align: right; padding: 5px 5px 2px; }
.weekBlock .dayBlock
{
	background: ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . ';
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighter') . ';
	border-radius: 5px;
	float: left;
	font-size: 5.0em;
	margin: 10px 10px 0px;
	text-align: center;
	width: 110px;
}
.weekBlock .nowToday { background: ' . XenForo_Template_Helper_Core::styleProperty('secondaryLighter') . '; }
.weekBlock .avatar img { height: 20px; width: 20px; }
.weekBlock ul { margin-left: 122px; }
.weekBlock li .avatar { float: left; }
.weekBlock li .avatar .s { height: 20px; width: 20px; background-position: center center; background-size: 20px 20px !important; }
.weekBlock li .eventInfo { margin-left: 30px; padding: 5px; }
' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.weekList'
)) . '

.eventList .primaryContent { margin-top: -10px; font-size: 1.5em; }
.eventList ul { margin-right: -10px; }
.eventList li { width: 50%; float: left; }
.eventList li .secondaryContent { margin-top: 10px; margin-right: 10px; padding: 0px; }
.eventList li .eventInfo { padding: 4px; }
.eventList li .eventDate { font-size: 0.9em; float: right; text-align: right; width: 100px; }
.eventList li .eventTime { font-size: 1.1em; }
.eventList li .eventName { white-space: nowrap; overflow: hidden; }
.eventList li .eventText { white-space: nowrap; overflow: hidden; font-size: 0.8em; max-height: 28px; }
' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.eventList ul'
)) . '

.eventList .username { font-weight: bold; }
.eventList .avatar { float: left; }
.eventList .avatar .s,
.eventDaily .avatar .s { background-position: center center; background-size: 48px 48px !important; }

.rsvpList ul { margin-top: 10px; }
.rsvpList li { position: relative; display: inline-block; width: 150px; }
.rsvpList li .rsvpInfo { margin-left: 25px; padding: 4px; }

.rsvpList .avatar { float: left; }
.rsvpList .avatar img { height: 20px; width: 20px; }
.rsvpList .username.Tooltip { font-weight: bold; font-style: italic; }

.rsvpShortList { font-size: 0.9em; }
.rsvpShortList ul { display: inline; }
.rsvpShortList li { display: inline; }
.rsvpShortList li::after { content: \',\'; }
.rsvpShortList li:last-child::after { content: \'\'; }

.eventModerated .subHeading { text-align: center; font-weight: bold; font-size: 1.5em; }

.messageSimple textarea
{
	height: 54px;
	width: 100%;
	box-sizing: border-box;
	*width: 98%;
	resize: vertical;
}
.messageSimple .submitUnit { margin-top: 5px; text-align: right; }

.xenForm .date
{
	background-image: url("styles/8wayrun/calendar.png");
	background-position: right center;
	background-repeat: no-repeat;
}

.ctrlUnit dd .hint
{
	font-size: 11px;
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	margin-left: ' . XenForo_Template_Helper_Core::styleProperty('formCtrlIndent') . ';
	margin-top: 2px;
}

.copyright { text-align: center; font-size: 11px; margin: 10px; }';
