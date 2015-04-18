<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'node_list');
$__compilerVar3 .= '
';
$this->addRequiredExternal('css', 'node_forum');
$__compilerVar3 .= '

<li class="node forum level_' . htmlspecialchars($level, ENT_QUOTES, 'UTF-8') . ' ' . (($level == 1 AND !$renderedChildren) ? ('groupNoChildren') : ('')) . ' node_' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '">

	';
if ($level == 1)
{
$__compilerVar3 .= '<div class="categoryStrip subHeading"></div>';
}
$__compilerVar3 .= '

	<div class="nodeInfo forumNodeInfo primaryContent ' . (($forum['hasNew']) ? ('unread') : ('')) . '">

		<span class="nodeIcon" title="' . (($forum['hasNew']) ? ('Unread messages') : ('')) . '"></span>

		<div class="nodeText">
			<h3 class="nodeTitle">';
if ($watchCheckBoxName)
{
$__compilerVar3 .= '<input type="checkbox" name="' . htmlspecialchars($watchCheckBoxName, ENT_QUOTES, 'UTF-8') . '" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '" />&nbsp;';
}
$__compilerVar3 .= '<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '" data-description="' . ((XenForo_Template_Helper_Core::styleProperty('nodeListDescriptionTooltips')) ? ('#nodeDescription-' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8')) : ('')) . '">' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
if ($forum['description'] AND XenForo_Template_Helper_Core::styleProperty('nodeListDescriptions'))
{
$__compilerVar3 .= '
				<blockquote class="nodeDescription ' . ((XenForo_Template_Helper_Core::styleProperty('nodeListDescriptionTooltips')) ? ('nodeDescriptionTooltip') : ('')) . ' baseHtml" id="nodeDescription-' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '">' . $forum['description'] . '</blockquote>
			';
}
$__compilerVar3 .= '

			<div class="nodeStats pairsInline">
				<dl><dt>' . 'Đề tài thảo luận' . ':</dt> <dd>' . (($forum['privateInfo']) ? ('&ndash;') : (XenForo_Template_Helper_Core::numberFormat($forum['discussion_count'], '0'))) . '</dd></dl>
				<dl><dt>' . 'Bài viết' . ':</dt> <dd>' . (($forum['privateInfo']) ? ('&ndash;') : (XenForo_Template_Helper_Core::numberFormat($forum['message_count'], '0'))) . '</dd></dl>
				';
if ($renderedChildren AND $level == 2 AND XenForo_Template_Helper_Core::styleProperty('nodeListSubForumPopup'))
{
$__compilerVar3 .= '
					<div class="Popup subForumsPopup">
						<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '" rel="Menu" class="cloaked" data-closemenu="true"><span class="dt">' . 'Diễn đàn con' . ':</span> ' . XenForo_Template_Helper_Core::numberFormat($forum['childCount'], '0') . '</a>
						
						<div class="Menu JsOnly subForumsMenu">
							<div class="primaryContent menuHeader">
								<h3>' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</h3>
								<div class="muted">' . 'Diễn đàn con' . '</div>
							</div>
							<ol class="secondaryContent blockLinksList">
							';
foreach ($renderedChildren AS $child)
{
$__compilerVar3 .= '
								' . $child . '
							';
}
$__compilerVar3 .= '
							</ol>
						</div>
					</div>
				';
}
$__compilerVar3 .= '
			</div>
			
			' . $nodeExtraHtml . '
		</div>

		';
if ($renderedChildren AND $level == 2 AND !XenForo_Template_Helper_Core::styleProperty('nodeListSubForumPopup'))
{
$__compilerVar3 .= '
			<ol class="subForumList">
			';
foreach ($renderedChildren AS $child)
{
$__compilerVar3 .= '
				' . $child . '
			';
}
$__compilerVar3 .= '
			</ol>
		';
}
$__compilerVar3 .= '
		
		';
$__compilerVar4 = '';
$__compilerVar3 .= $this->callTemplateHook('node_forum_level_2_before_lastpost', $__compilerVar4, array(
'forum' => $forum
));
unset($__compilerVar4);
$__compilerVar3 .= '

		<div class="nodeLastPost secondaryContent">
			';
if ($forum['privateInfo'])
{
$__compilerVar3 .= '
				<span class="noMessages muted">(' . 'Private' . ')</span>
			';
}
else if ($forum['lastPost']['date'])
{
$__compilerVar3 .= '
				<span class="lastThreadTitle"><span>' . 'Mới nhất' . ':</span> <a href="' . XenForo_Template_Helper_Core::link('posts', $forum['lastPost'], array()) . '" title="' . htmlspecialchars($forum['lastPost']['title'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($forum['lastPost']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>
				<span class="lastThreadMeta">
					<span class="lastThreadUser">';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $forum['last_post_user_id']
)))
{
$__compilerVar3 .= 'Ignored Member';
}
else
{
$__compilerVar3 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($forum['lastPost'],'',false,array()));
}
$__compilerVar3 .= ',</span>
					' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($forum['lastPost']['date'],array(
'time' => '$forum.lastPost.date',
'class' => 'muted lastThreadDate',
'data-latest' => 'Mới nhất' . ': '
))) . '
				</span>
			';
}
else
{
$__compilerVar3 .= '
				<span class="noMessages muted">(' . 'Chưa có bài viết nào' . ')</span>
			';
}
$__compilerVar3 .= '
		</div>

		<div class="nodeControls">
			<a href="' . XenForo_Template_Helper_Core::link('forums/index.rss', $forum, array()) . '" class="tinyIcon feedIcon" title="' . 'RSS' . '">' . 'RSS' . '</a>
		</div>
		
	</div>

	';
if ($renderedChildren AND $level == 1)
{
$__compilerVar3 .= '
		<ol class="nodeList">
			';
foreach ($renderedChildren AS $child)
{
$__compilerVar3 .= $child;
}
$__compilerVar3 .= '
		</ol>
	';
}
$__compilerVar3 .= '

</li>';
$__output .= $__compilerVar3;
unset($__compilerVar3);
