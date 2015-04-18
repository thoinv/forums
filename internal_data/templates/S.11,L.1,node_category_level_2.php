<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'node_list');
$__output .= '
';
$this->addRequiredExternal('css', 'node_category');
$__output .= '

<li class="node category_forum level_' . htmlspecialchars($level, ENT_QUOTES, 'UTF-8') . ' node_' . htmlspecialchars($category['node_id'], ENT_QUOTES, 'UTF-8') . '">

	<div class="nodeInfo categoryForumNodeInfo ' . (($category['hasNew']) ? ('unread') : ('')) . '">

		<span class="nodeIcon" title="' . (($category['hasNew']) ? ('Unread messages') : ('')) . '"></span>

		<div class="nodeText">
			<h3 class="nodeTitle"><a href="' . XenForo_Template_Helper_Core::link('categories', $category, array()) . '" data-description="' . ((XenForo_Template_Helper_Core::styleProperty('nodeListDescriptionTooltips')) ? ('#nodeDescription-' . htmlspecialchars($category['node_id'], ENT_QUOTES, 'UTF-8')) : ('')) . '">' . htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
if ($category['description'] AND XenForo_Template_Helper_Core::styleProperty('nodeListDescriptions'))
{
$__output .= '
				<blockquote class="nodeDescription ' . ((XenForo_Template_Helper_Core::styleProperty('nodeListDescriptionTooltips')) ? ('nodeDescriptionTooltip') : ('')) . ' baseHtml" id="nodeDescription-' . htmlspecialchars($category['node_id'], ENT_QUOTES, 'UTF-8') . '">' . $category['description'] . '</blockquote>
			';
}
$__output .= '

			<div class="nodeStats pairsInline">
				<dl><dt>' . 'Discussions' . ':</dt> <dd>' . (($category['privateInfo']) ? ('&ndash;') : (XenForo_Template_Helper_Core::numberFormat($category['discussion_count'], '0'))) . '</dd></dl>
				<dl><dt>' . 'Messages' . ':</dt> <dd>' . (($category['privateInfo']) ? ('&ndash;') : (XenForo_Template_Helper_Core::numberFormat($category['message_count'], '0'))) . '</dd></dl>
				';
if ($renderedChildren AND XenForo_Template_Helper_Core::styleProperty('nodeListSubForumPopup'))
{
$__output .= '
					<div class="Popup subForumsPopup">
						<a href="' . XenForo_Template_Helper_Core::link('categories', $category, array()) . '" rel="Menu" class="cloaked" data-closemenu="true"><span class="dt">' . 'Sub-Forums' . ':</span> ' . XenForo_Template_Helper_Core::numberFormat($category['childCount'], '0') . '</a>
						
						<div class="Menu JsOnly subForumsMenu">
							<div class="primaryContent menuHeader">
								<h3>' . htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8') . '</h3>
								<div class="muted">' . 'Sub-Forums' . '</div>
							</div>
							<ol class="secondaryContent blockLinksList">
							';
foreach ($renderedChildren AS $child)
{
$__output .= '
								' . $child . '
							';
}
$__output .= '
							</ol>
						</div>
					</div>
				';
}
$__output .= '
			</div>
			
			' . $nodeExtraHtml . '
		</div>

		';
if ($renderedChildren AND !XenForo_Template_Helper_Core::styleProperty('nodeListSubForumPopup'))
{
$__output .= '
			<ol class="subForumList">
			';
foreach ($renderedChildren AS $child)
{
$__output .= '
				' . $child . '
			';
}
$__output .= '
			</ol>
		';
}
$__output .= '

		<div class="nodeLastPost secondaryContent">
			';
if ($category['privateInfo'])
{
$__output .= '
				<span class="noMessages muted">(' . 'Private' . ')</span>
			';
}
else if ($category['lastPost']['date'])
{
$__output .= '
				<span class="lastThreadTitle"><span>' . 'Latest' . ':</span> <a href="' . XenForo_Template_Helper_Core::link('posts', $category['lastPost'], array()) . '" title="' . htmlspecialchars($category['lastPost']['title'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($category['lastPost']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>
				<span class="lastThreadMeta">
					<span class="lastThreadUser">';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $category['last_post_user_id']
)))
{
$__output .= 'Ignored Member';
}
else
{
$__output .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($category['lastPost'],'',false,array()));
}
$__output .= ',</span>
					' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($category['lastPost']['date'],array(
'time' => '$category.lastPost.date',
'class' => 'muted lastThreadDate',
'data-latest' => 'Latest' . ': '
))) . '
				</span>
			';
}
else
{
$__output .= '
				<span class="noMessages muted">(' . 'Contains no messages' . ')</span>
			';
}
$__output .= '
		</div>

	</div>

</li>';
