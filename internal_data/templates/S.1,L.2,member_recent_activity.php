<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '\'s Recent Activity';
$__output .= '

';
if ($restricted)
{
$__output .= '
	<div>' . '' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . ' restricts who may view their recent activity.' . '</div>
';
}
else
{
$__output .= '
	';
$this->addRequiredExternal('js', 'js/xenforo/news_feed.js');
$__output .= '
	
	<div class="newsFeed">
		';
$__compilerVar8 = '';
$__compilerVar8 .= 'Không có thông tin hoạt động gần đây của ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '.';
$__compilerVar9 = '';
$this->addRequiredExternal('css', 'events');
$__compilerVar9 .= '
';
$this->addRequiredExternal('css', 'news_feed');
$__compilerVar9 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/news_feed.js');
$__compilerVar9 .= '

';
if ($newsFeed)
{
$__compilerVar9 .= '
	<ol class="eventList">
		';
foreach ($newsFeed AS $item)
{
$__compilerVar9 .= '		
			';
$__compilerVar10 = '';
$__compilerVar10 .= $item['template'];
$__compilerVar11 = '';
$__compilerVar11 .= htmlspecialchars($item['event_date'], ENT_QUOTES, 'UTF-8');
$__compilerVar12 = '';
$__compilerVar12 .= '<li id="item_' . htmlspecialchars($item['news_feed_id'], ENT_QUOTES, 'UTF-8') . '" class="event primaryContent NewsFeedItem" data-author="' . htmlspecialchars($item['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($item,false,array(
'user' => '$item',
'size' => 's',
'class' => 'icon'
),'')) . '
	
	<div class="content">		
		' . $__compilerVar10 . '
		
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($__compilerVar11,array(
'time' => htmlspecialchars($__compilerVar11, ENT_QUOTES, 'UTF-8')
))) . '
	</div>
</li>';
$__compilerVar9 .= $__compilerVar12;
unset($__compilerVar10, $__compilerVar11, $__compilerVar12);
$__compilerVar9 .= '
		';
}
$__compilerVar9 .= '
	</ol>
';
}
else
{
$__compilerVar9 .= '
	' . $__compilerVar8 . '
';
}
$__output .= $__compilerVar9;
unset($__compilerVar8, $__compilerVar9);
$__output .= '
		';
$__compilerVar13 = '';
$__compilerVar13 .= XenForo_Template_Helper_Core::link('members/recent-activity', $user, array());
$__compilerVar14 = '';
if (!$feedEnds)
{
$__compilerVar14 .= '
<div class="NewsFeedEnd">
	<div class="sectionFooter">
		<a href="' . htmlspecialchars($__compilerVar13, ENT_QUOTES, 'UTF-8') . '" class="NewsFeedLoader" data-oldestItemId="' . htmlspecialchars($oldestItemId, ENT_QUOTES, 'UTF-8') . '">' . 'Hiển thị mục cũ hơn' . '</a>
	</div>
</div>
';
}
$__output .= $__compilerVar14;
unset($__compilerVar13, $__compilerVar14);
$__output .= '
	</div>
';
}
