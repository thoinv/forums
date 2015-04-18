<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Watched Forums';
$__output .= '

<form action="' . XenForo_Template_Helper_Core::link('watched/forums/update', false, array()) . '" method="post" class="sectionMain">

	<h3 class="subHeading">&nbsp;</h3>	
	';
if ($forums)
{
$__output .= '	
		<ol class="nodeList">
		';
foreach ($forums AS $forum)
{
$__output .= '
			';
$forumWatch = $forumsWatched[$forum['node_id']];
$__output .= '
			';
$__compilerVar1 = '2';
$__compilerVar2 = $subForums[$forum['node_id']];
$__compilerVar3 = 'node_ids[]';
$__compilerVar4 = '';
$__compilerVar4 .= '
					';
if ($forumWatch['notify_on'])
{
$__compilerVar4 .= '
						<div class="nodeExtraNote">';
if ($forumWatch['notify_on'] == ('thread'))
{
$__compilerVar4 .= 'New Threads';
}
else
{
$__compilerVar4 .= 'New Messages';
}
if ($forumWatch['send_alert'])
{
$__compilerVar4 .= ', ' . 'Alerts';
}
if ($forumWatch['send_email'])
{
$__compilerVar4 .= ', ' . 'Emails';
}
$__compilerVar4 .= '</div>
					';
}
$__compilerVar4 .= '
				';
$__compilerVar5 = '';
$this->addRequiredExternal('css', 'node_list');
$__compilerVar5 .= '
';
$this->addRequiredExternal('css', 'node_forum');
$__compilerVar5 .= '

<li class="node forum level_' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . ' ' . (($__compilerVar1 == 1 AND !$__compilerVar2) ? ('groupNoChildren') : ('')) . ' node_' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '">

	';
if ($__compilerVar1 == 1)
{
$__compilerVar5 .= '<div class="categoryStrip subHeading"></div>';
}
$__compilerVar5 .= '

	<div class="nodeInfo forumNodeInfo primaryContent ' . (($forum['hasNew']) ? ('unread') : ('')) . '">

		<span class="nodeIcon" title="' . (($forum['hasNew']) ? ('Unread messages') : ('')) . '"></span>

		<div class="nodeText">
			<h3 class="nodeTitle">';
if ($__compilerVar3)
{
$__compilerVar5 .= '<input type="checkbox" name="' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '" />&nbsp;';
}
$__compilerVar5 .= '<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '" data-description="' . ((XenForo_Template_Helper_Core::styleProperty('nodeListDescriptionTooltips')) ? ('#nodeDescription-' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8')) : ('')) . '">' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
if ($forum['description'] AND XenForo_Template_Helper_Core::styleProperty('nodeListDescriptions'))
{
$__compilerVar5 .= '
				<blockquote class="nodeDescription ' . ((XenForo_Template_Helper_Core::styleProperty('nodeListDescriptionTooltips')) ? ('nodeDescriptionTooltip') : ('')) . ' baseHtml" id="nodeDescription-' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '">' . $forum['description'] . '</blockquote>
			';
}
$__compilerVar5 .= '

			<div class="nodeStats pairsInline">
				<dl><dt>' . 'Discussions' . ':</dt> <dd>' . (($forum['privateInfo']) ? ('&ndash;') : (XenForo_Template_Helper_Core::numberFormat($forum['discussion_count'], '0'))) . '</dd></dl>
				<dl><dt>' . 'Messages' . ':</dt> <dd>' . (($forum['privateInfo']) ? ('&ndash;') : (XenForo_Template_Helper_Core::numberFormat($forum['message_count'], '0'))) . '</dd></dl>
				';
if ($__compilerVar2 AND $__compilerVar1 == 2 AND XenForo_Template_Helper_Core::styleProperty('nodeListSubForumPopup'))
{
$__compilerVar5 .= '
					<div class="Popup subForumsPopup">
						<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '" rel="Menu" class="cloaked" data-closemenu="true"><span class="dt">' . 'Sub-Forums' . ':</span> ' . XenForo_Template_Helper_Core::numberFormat($forum['childCount'], '0') . '</a>
						
						<div class="Menu JsOnly subForumsMenu">
							<div class="primaryContent menuHeader">
								<h3>' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</h3>
								<div class="muted">' . 'Sub-Forums' . '</div>
							</div>
							<ol class="secondaryContent blockLinksList">
							';
foreach ($__compilerVar2 AS $child)
{
$__compilerVar5 .= '
								' . $child . '
							';
}
$__compilerVar5 .= '
							</ol>
						</div>
					</div>
				';
}
$__compilerVar5 .= '
			</div>
			
			' . $__compilerVar4 . '
		</div>

		';
if ($__compilerVar2 AND $__compilerVar1 == 2 AND !XenForo_Template_Helper_Core::styleProperty('nodeListSubForumPopup'))
{
$__compilerVar5 .= '
			<ol class="subForumList">
			';
foreach ($__compilerVar2 AS $child)
{
$__compilerVar5 .= '
				' . $child . '
			';
}
$__compilerVar5 .= '
			</ol>
		';
}
$__compilerVar5 .= '
		
		';
$__compilerVar6 = '';
$__compilerVar5 .= $this->callTemplateHook('node_forum_level_2_before_lastpost', $__compilerVar6, array(
'forum' => $forum
));
unset($__compilerVar6);
$__compilerVar5 .= '

		<div class="nodeLastPost secondaryContent">
			';
if ($forum['privateInfo'])
{
$__compilerVar5 .= '
				<span class="noMessages muted">(' . 'Private' . ')</span>
			';
}
else if ($forum['lastPost']['date'])
{
$__compilerVar5 .= '
				<span class="lastThreadTitle"><span>' . 'Latest' . ':</span> <a href="' . XenForo_Template_Helper_Core::link('posts', $forum['lastPost'], array()) . '" title="' . htmlspecialchars($forum['lastPost']['title'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($forum['lastPost']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>
				<span class="lastThreadMeta">
					<span class="lastThreadUser">';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $forum['last_post_user_id']
)))
{
$__compilerVar5 .= 'Ignored Member';
}
else
{
$__compilerVar5 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($forum['lastPost'],'',false,array()));
}
$__compilerVar5 .= ',</span>
					' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($forum['lastPost']['date'],array(
'time' => '$forum.lastPost.date',
'class' => 'muted lastThreadDate',
'data-latest' => 'Latest' . ': '
))) . '
				</span>
			';
}
else
{
$__compilerVar5 .= '
				<span class="noMessages muted">(' . 'Contains no messages' . ')</span>
			';
}
$__compilerVar5 .= '
		</div>

		<div class="nodeControls">
			<a href="' . XenForo_Template_Helper_Core::link('forums/index.rss', $forum, array()) . '" class="tinyIcon feedIcon" title="' . 'RSS' . '">' . 'RSS' . '</a>
		</div>
		
	</div>

	';
if ($__compilerVar2 AND $__compilerVar1 == 1)
{
$__compilerVar5 .= '
		<ol class="nodeList">
			';
foreach ($__compilerVar2 AS $child)
{
$__compilerVar5 .= $child;
}
$__compilerVar5 .= '
		</ol>
	';
}
$__compilerVar5 .= '

</li>';
$__output .= $__compilerVar5;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3, $__compilerVar4, $__compilerVar5);
$__output .= '
		';
}
$__output .= '
		</ol>
	';
}
else
{
$__output .= '
		<div class="primaryContent">
			' . 'You are not watching any forums.' . '
		</div>
	';
}
$__output .= '
	
	<div class="sectionFooter">
		<select name="do" class="textCtrl">
			<option>' . 'With selected' . '...</option>
			<option value="email">' . 'Enable email notification' . '</option>
			<option value="no_email">' . 'Disable email notification' . '</option>
			<option value="alert">' . 'Enable alerts' . '</option>
			<option value="no_alert">' . 'Disable alerts' . '</option>
			<option value="stop">' . 'Stop watching forums' . '</option>
		</select>
		<input type="submit" value="' . 'Go' . '" class="button" class="button" />
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
