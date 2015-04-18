<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar1 = '';
$this->addRequiredExternal('css', 'node_list');
$__compilerVar1 .= '
';
$this->addRequiredExternal('css', 'node_forum');
$__compilerVar1 .= '

<li class="node forum level_' . htmlspecialchars($level, ENT_QUOTES, 'UTF-8') . ' ' . (($level == 1 AND !$renderedChildren) ? ('groupNoChildren') : ('')) . ' node_' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '">

	';
if ($level == 1)
{
$__compilerVar1 .= '<div class="categoryStrip subHeading"></div>';
}
$__compilerVar1 .= '

	<div class="nodeInfo forumNodeInfo primaryContent ' . (($forum['hasNew']) ? ('unread') : ('')) . '">

		<span class="nodeIcon" title="' . (($forum['hasNew']) ? ('Unread messages') : ('')) . '"></span>

		<div class="nodeText">
			<h3 class="nodeTitle">';
if ($watchCheckBoxName)
{
$__compilerVar1 .= '<input type="checkbox" name="' . htmlspecialchars($watchCheckBoxName, ENT_QUOTES, 'UTF-8') . '" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '" />&nbsp;';
}
$__compilerVar1 .= '<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '" data-description="' . ((XenForo_Template_Helper_Core::styleProperty('nodeListDescriptionTooltips')) ? ('#nodeDescription-' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8')) : ('')) . '">' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
if ($forum['description'] AND XenForo_Template_Helper_Core::styleProperty('nodeListDescriptions'))
{
$__compilerVar1 .= '
				<blockquote class="nodeDescription ' . ((XenForo_Template_Helper_Core::styleProperty('nodeListDescriptionTooltips')) ? ('nodeDescriptionTooltip') : ('')) . ' baseHtml" id="nodeDescription-' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '">' . $forum['description'] . '</blockquote>
			';
}
$__compilerVar1 .= '

			<div class="nodeStats pairsInline">
				<dl><dt>' . 'Discussions' . ':</dt> <dd>' . (($forum['privateInfo']) ? ('&ndash;') : (XenForo_Template_Helper_Core::numberFormat($forum['discussion_count'], '0'))) . '</dd></dl>
				<dl><dt>' . 'Messages' . ':</dt> <dd>' . (($forum['privateInfo']) ? ('&ndash;') : (XenForo_Template_Helper_Core::numberFormat($forum['message_count'], '0'))) . '</dd></dl>
				';
if ($renderedChildren AND $level == 2 AND XenForo_Template_Helper_Core::styleProperty('nodeListSubForumPopup'))
{
$__compilerVar1 .= '
					<div class="Popup subForumsPopup">
						<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '" rel="Menu" class="cloaked" data-closemenu="true"><span class="dt">' . 'Sub-Forums' . ':</span> ' . XenForo_Template_Helper_Core::numberFormat($forum['childCount'], '0') . '</a>
						
						<div class="Menu JsOnly subForumsMenu">
							<div class="primaryContent menuHeader">
								<h3>' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</h3>
								<div class="muted">' . 'Sub-Forums' . '</div>
							</div>
							<ol class="secondaryContent blockLinksList">
							';
foreach ($renderedChildren AS $child)
{
$__compilerVar1 .= '
								' . $child . '
							';
}
$__compilerVar1 .= '
							</ol>
						</div>
					</div>
				';
}
$__compilerVar1 .= '
			</div>
			
			' . $nodeExtraHtml . '
		</div>

		';
if ($renderedChildren AND $level == 2 AND !XenForo_Template_Helper_Core::styleProperty('nodeListSubForumPopup'))
{
$__compilerVar1 .= '
			<ol class="subForumList">
			';
foreach ($renderedChildren AS $child)
{
$__compilerVar1 .= '
				' . $child . '
			';
}
$__compilerVar1 .= '
			</ol>
		';
}
$__compilerVar1 .= '
		
		';
$__compilerVar2 = '';
$__compilerVar1 .= $this->callTemplateHook('node_forum_level_2_before_lastpost', $__compilerVar2, array(
'forum' => $forum
));
unset($__compilerVar2);
$__compilerVar1 .= '

		<div class="nodeLastPost secondaryContent">
			';
if ($forum['privateInfo'])
{
$__compilerVar1 .= '
				<span class="noMessages muted">(' . 'Private' . ')</span>
			';
}
else if ($forum['lastPost']['date'])
{
$__compilerVar1 .= '
				<span class="lastThreadTitle"><span>' . 'Latest' . ':</span> <a href="' . XenForo_Template_Helper_Core::link('posts', $forum['lastPost'], array()) . '" title="' . htmlspecialchars($forum['lastPost']['title'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($forum['lastPost']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>
				<span class="lastThreadMeta">
					<span class="lastThreadUser">';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $forum['last_post_user_id']
)))
{
$__compilerVar1 .= 'Ignored Member';
}
else
{
$__compilerVar1 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($forum['lastPost'],'',false,array()));
}
$__compilerVar1 .= ',</span>
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
$__compilerVar1 .= '
				<span class="noMessages muted">(' . 'Contains no messages' . ')</span>
			';
}
$__compilerVar1 .= '
		</div>

		<div class="nodeControls">
			<a href="' . XenForo_Template_Helper_Core::link('forums/index.rss', $forum, array()) . '" class="tinyIcon feedIcon" title="' . 'RSS' . '">' . 'RSS' . '</a>
		</div>
		
	</div>

	';
if ($renderedChildren AND $level == 1)
{
$__compilerVar1 .= '
		<ol class="nodeList">
			';
foreach ($renderedChildren AS $child)
{
$__compilerVar1 .= $child;
}
$__compilerVar1 .= '
		</ol>
	';
}
$__compilerVar1 .= '

</li>';
$__output .= $__compilerVar1;
unset($__compilerVar1);
