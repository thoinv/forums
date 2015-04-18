<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Chủ đề đã đọc';
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
$__compilerVar7 = '2';
$__compilerVar8 = $subForums[$forum['node_id']];
$__compilerVar9 = 'node_ids[]';
$__compilerVar10 = '';
$__compilerVar10 .= '
					';
if ($forumWatch['notify_on'])
{
$__compilerVar10 .= '
						<div class="nodeExtraNote">';
if ($forumWatch['notify_on'] == ('thread'))
{
$__compilerVar10 .= 'Các chủ đề mới';
}
else
{
$__compilerVar10 .= 'Bình luận mới';
}
if ($forumWatch['send_alert'])
{
$__compilerVar10 .= ', ' . 'Thông báo';
}
if ($forumWatch['send_email'])
{
$__compilerVar10 .= ', ' . 'Emails';
}
$__compilerVar10 .= '</div>
					';
}
$__compilerVar10 .= '
				';
$__compilerVar11 = '';
$this->addRequiredExternal('css', 'node_list');
$__compilerVar11 .= '
';
$this->addRequiredExternal('css', 'node_forum');
$__compilerVar11 .= '

<li class="node forum level_' . htmlspecialchars($__compilerVar7, ENT_QUOTES, 'UTF-8') . ' ' . (($__compilerVar7 == 1 AND !$__compilerVar8) ? ('groupNoChildren') : ('')) . ' node_' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '">

	';
if ($__compilerVar7 == 1)
{
$__compilerVar11 .= '<div class="categoryStrip subHeading"></div>';
}
$__compilerVar11 .= '

	<div class="nodeInfo forumNodeInfo primaryContent ' . (($forum['hasNew']) ? ('unread') : ('')) . '">

		<span class="nodeIcon" title="' . (($forum['hasNew']) ? ('Unread messages') : ('')) . '"></span>

		<div class="nodeText">
			<h3 class="nodeTitle">';
if ($__compilerVar9)
{
$__compilerVar11 .= '<input type="checkbox" name="' . htmlspecialchars($__compilerVar9, ENT_QUOTES, 'UTF-8') . '" value="' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '" />&nbsp;';
}
$__compilerVar11 .= '<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '" data-description="' . ((XenForo_Template_Helper_Core::styleProperty('nodeListDescriptionTooltips')) ? ('#nodeDescription-' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8')) : ('')) . '">' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>

			';
if ($forum['description'] AND XenForo_Template_Helper_Core::styleProperty('nodeListDescriptions'))
{
$__compilerVar11 .= '
				<blockquote class="nodeDescription ' . ((XenForo_Template_Helper_Core::styleProperty('nodeListDescriptionTooltips')) ? ('nodeDescriptionTooltip') : ('')) . ' baseHtml" id="nodeDescription-' . htmlspecialchars($forum['node_id'], ENT_QUOTES, 'UTF-8') . '">' . $forum['description'] . '</blockquote>
			';
}
$__compilerVar11 .= '

			<div class="nodeStats pairsInline">
				<dl><dt>' . 'Đề tài thảo luận' . ':</dt> <dd>' . (($forum['privateInfo']) ? ('&ndash;') : (XenForo_Template_Helper_Core::numberFormat($forum['discussion_count'], '0'))) . '</dd></dl>
				<dl><dt>' . 'Bài viết' . ':</dt> <dd>' . (($forum['privateInfo']) ? ('&ndash;') : (XenForo_Template_Helper_Core::numberFormat($forum['message_count'], '0'))) . '</dd></dl>
				';
if ($__compilerVar8 AND $__compilerVar7 == 2 AND XenForo_Template_Helper_Core::styleProperty('nodeListSubForumPopup'))
{
$__compilerVar11 .= '
					<div class="Popup subForumsPopup">
						<a href="' . XenForo_Template_Helper_Core::link('forums', $forum, array()) . '" rel="Menu" class="cloaked" data-closemenu="true"><span class="dt">' . 'Diễn đàn con' . ':</span> ' . XenForo_Template_Helper_Core::numberFormat($forum['childCount'], '0') . '</a>
						
						<div class="Menu JsOnly subForumsMenu">
							<div class="primaryContent menuHeader">
								<h3>' . htmlspecialchars($forum['title'], ENT_QUOTES, 'UTF-8') . '</h3>
								<div class="muted">' . 'Diễn đàn con' . '</div>
							</div>
							<ol class="secondaryContent blockLinksList">
							';
foreach ($__compilerVar8 AS $child)
{
$__compilerVar11 .= '
								' . $child . '
							';
}
$__compilerVar11 .= '
							</ol>
						</div>
					</div>
				';
}
$__compilerVar11 .= '
			</div>
			
			' . $__compilerVar10 . '
		</div>

		';
if ($__compilerVar8 AND $__compilerVar7 == 2 AND !XenForo_Template_Helper_Core::styleProperty('nodeListSubForumPopup'))
{
$__compilerVar11 .= '
			<ol class="subForumList">
			';
foreach ($__compilerVar8 AS $child)
{
$__compilerVar11 .= '
				' . $child . '
			';
}
$__compilerVar11 .= '
			</ol>
		';
}
$__compilerVar11 .= '
		
		';
$__compilerVar12 = '';
$__compilerVar11 .= $this->callTemplateHook('node_forum_level_2_before_lastpost', $__compilerVar12, array(
'forum' => $forum
));
unset($__compilerVar12);
$__compilerVar11 .= '

		<div class="nodeLastPost secondaryContent">
			';
if ($forum['privateInfo'])
{
$__compilerVar11 .= '
				<span class="noMessages muted">(' . 'Private' . ')</span>
			';
}
else if ($forum['lastPost']['date'])
{
$__compilerVar11 .= '
				<span class="lastThreadTitle"><span>' . 'Mới nhất' . ':</span> <a href="' . XenForo_Template_Helper_Core::link('posts', $forum['lastPost'], array()) . '" title="' . htmlspecialchars($forum['lastPost']['title'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($forum['lastPost']['title'], ENT_QUOTES, 'UTF-8') . '</a></span>
				<span class="lastThreadMeta">
					<span class="lastThreadUser">';
if (XenForo_Template_Helper_Core::callHelper('isIgnored', array(
'0' => $forum['last_post_user_id']
)))
{
$__compilerVar11 .= 'Ignored Member';
}
else
{
$__compilerVar11 .= XenForo_Template_Helper_Core::callHelper('usernamehtml', array($forum['lastPost'],'',false,array()));
}
$__compilerVar11 .= ',</span>
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
$__compilerVar11 .= '
				<span class="noMessages muted">(' . 'Chưa có bài viết nào' . ')</span>
			';
}
$__compilerVar11 .= '
		</div>

		<div class="nodeControls">
			<a href="' . XenForo_Template_Helper_Core::link('forums/index.rss', $forum, array()) . '" class="tinyIcon feedIcon" title="' . 'RSS' . '">' . 'RSS' . '</a>
		</div>
		
	</div>

	';
if ($__compilerVar8 AND $__compilerVar7 == 1)
{
$__compilerVar11 .= '
		<ol class="nodeList">
			';
foreach ($__compilerVar8 AS $child)
{
$__compilerVar11 .= $child;
}
$__compilerVar11 .= '
		</ol>
	';
}
$__compilerVar11 .= '

</li>';
$__output .= $__compilerVar11;
unset($__compilerVar7, $__compilerVar8, $__compilerVar9, $__compilerVar10, $__compilerVar11);
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
			' . 'Bạn chưa xem bất kìa môt chủ đề nào cả.' . '
		</div>
	';
}
$__output .= '
	
	<div class="sectionFooter">
		<select name="do" class="textCtrl">
			<option>' . 'Lựa chọn với' . '...</option>
			<option value="email">' . 'Bật thông báo Email' . '</option>
			<option value="no_email">' . 'Tắt thông báo Email' . '</option>
			<option value="alert">' . 'Bật thông báo' . '</option>
			<option value="no_alert">' . 'Tắt thông báo' . '</option>
			<option value="stop">' . 'Ngừng theo dõi diễn đàn' . '</option>
		</select>
		<input type="submit" value="' . 'Tới' . '" class="button" class="button" />
	</div>

	<input type="hidden" name="_xfToken" value="' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
</form>';
