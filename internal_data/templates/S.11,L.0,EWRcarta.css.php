<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.wikiNav ul { text-align: center; }
.wikiNav li { margin-bottom: 5px; position: relative; display: inline-block; width: 49%; }
.wikiSub li { margin-left: 5px; margin-top: 5px; }

.wikiPage { font-size: 13px; line-height: 1.27; }
' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.wikiPage .wikiContent'
)) . '

.wikiPage table { text-align: center; }
.wikiPage .wikiContent table { margin-bottom: 0px; width: 100%; }
.wikiPage .wikiContent td { border: 0px; padding: 5px; margin: 0px; font-weight: normal; }
.wikiPage .wikiContent td .bbCodeImage { max-width: 293px; }

.wikiPage .wikiContent h2 { margin: 5px 0px; text-decoration: underline; font-weight: bold; font-size: 1.5em; }
.wikiPage .wikiContent h3 { margin: 5px 0px; text-decoration: underline; font-weight: bold; font-size: 1.2em; }
.wikiPage .wikiContent h4 { margin: 5px 0px; text-decoration: underline; font-weight: bold; font-size: 1.0em; }
.wikiPage .wikiContent h5 { margin: 5px 0px; text-decoration: underline; font-weight: bold; font-size: 0.85em; }
.wikiPage .wikiContent h6 { margin: 5px 0px; text-decoration: underline; font-weight: bold; font-size: 0.7em; }
.wikiPage .wikiContent .gototop,
.wikiPage .wikiContent .toggle { margin-left: 5px; text-decoration: none; font-size: 10px; display: inline-block; }

.wikiPage .wikiContent li { margin: 5px 0px 5px 30px; list-style: disc; }
.wikiPage .wikiContent li.col2 { margin-left: 10px; list-style: none; }
.wikiPage .wikiContent li.col3 { margin-left: 30px; }
.wikiPage .wikiContent li.col4 { margin-left: 50px; }
.wikiPage .wikiContent li.col5 { margin-left: 70px; }
.wikiPage .wikiContent li.col6 { margin-left: 90px; }

.wikiPage .wikiContent .iconList { text-align: center; }
.wikiPage .wikiContent .iconList ul { text-align: center; }
.wikiPage .wikiContent .iconList li { margin: 10px 2px 0px; position: relative; display: inline-block; width: 96px; }
.wikiPage .wikiContent .iconList li .secondaryContent { padding: 5px; font-size: 0.9em; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

.wikiPage .letterGrid { float: left; width: 33.3%; }
.wikiPage .letterGrid h2 { margin-top: 15px; }
.wikiPage .letterGrid .pageGrid { margin-left: 10px; }

.wikiPage .attachedFiles { margin: 0px; }
.wikiPage .attachmentList { padding-right: 0px !important; }
.wikiPage .attachment { width: 33.3%; }

.wikiPage .tabs { padding: 0 ' . XenForo_Template_Helper_Core::styleProperty('profilePageTabInset') . '; background: transparent; }
.wikiPage .tabs li a { font-weight: bold; padding-left: ' . XenForo_Template_Helper_Core::styleProperty('profilePageTabHeight') . '; padding-right: ' . XenForo_Template_Helper_Core::styleProperty('profilePageTabHeight') . '; }
.wikiPage .tabs.mainTabs { margin-bottom: -' . XenForo_Template_Helper_Core::styleProperty('subHeading.margin-top') . '; }
.wikiPage .tabs.controlTabs { margin-bottom: -' . (XenForo_Template_Helper_Core::styleProperty('subHeading.margin-top') + XenForo_Template_Helper_Core::styleProperty('profilePageTabHeight') - 1) . 'px; }
.wikiPage .tabs.controlTabs li { float: right; }
.wikiPage .jsOnly { display: block; padding: 20px; }
.wikiThread .tabs.mainTabs { margin-bottom: -' . XenForo_Template_Helper_Core::styleProperty('section.margin-top') . '; }

.wikiHistory .reverted { text-decoration: line-through; font-size: 0.8em; }

.wikiEdit .userGroups li { float: left; width: 33%; }
' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.wikiEdit .userGroups'
)) . '

.wikiEditors .editorAcitivy { float: right; padding: 10px; font-size: 11px; }
.wikiEditors .editorUser { float: left; position: relative; display: inline-block; width: 180px; }
.wikiEditors .editorUser .userInfo { margin-left: 35px; padding: 10px; }
.wikiEditors .avatar { float: left; }
.wikiEditors .avatar img { height: 30px; width: 30px; }

.wikiEditors .editorInfo { margin: 0px 0px 0px 200px; padding: 10px; border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('primaryLighterStill') . '; }
' . XenForo_Template_Helper_Core::callHelper('clearfix', array(
'0' => '.wikiEditors .editor'
)) . '

.Differences { width: 100%; }
.Differences td { padding: 3px; font-size: 0.8em; }
.Differences th { padding: 3px; text-align: center; font-weight: bold; }
.Differences del { color: #FF0000; font-weight: bold; }
.Differences ins { color: #0000FF; font-weight: bold; }
.Differences .ChangeReplace .Left, .Differences .ChangeDelete .Left { border: 1px dashed #FF0000; }
.Differences .ChangeReplace .Right, .Differences .ChangeInsert .Right { border: 1px dashed #0000FF; }

.framedata { color: #000000; }
.fdatk, .fdcmd, .fdlvl { white-space: nowrap; }
.string { background-color: #FFFFCC; }
.neutral { background-color: #CCFFCC; }
.positive { background-color: #CCCCFF; }
.negative { background-color: #FFCCCC; }

.LbTrigger .bbCodeImage { border: 2px solid silver; max-height: 120px; }
.LbTrigger:hover .bbCodeImage { border-color: gray; }

.redirect
{
	' . XenForo_Template_Helper_Core::styleProperty('dicussionListIcon') . '
	background-position: -48px -16px;
	float: left;
	margin-right: 5px;
}

.ctrlUnit dd .hint
{
	font-size: 11px;
	color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
	margin-left: ' . XenForo_Template_Helper_Core::styleProperty('formCtrlIndent') . ';
	margin-top: 2px;
}

.copyright { text-align: center; font-size: 11px; margin: 10px; }';
