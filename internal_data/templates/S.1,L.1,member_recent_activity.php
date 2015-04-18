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
$__compilerVar1 = '';
$__compilerVar1 .= 'No recent activity information is available for ' . htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') . '.';
$__compilerVar2 = '';
$this->addRequiredExternal('css', 'events');
$__compilerVar2 .= '
';
$this->addRequiredExternal('css', 'news_feed');
$__compilerVar2 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/news_feed.js');
$__compilerVar2 .= '

';
if ($newsFeed)
{
$__compilerVar2 .= '
	<ol class="eventList">
		';
foreach ($newsFeed AS $item)
{
$__compilerVar2 .= '		
			';
$__compilerVar3 = '';
$__compilerVar3 .= $item['template'];
$__compilerVar4 = '';
$__compilerVar4 .= htmlspecialchars($item['event_date'], ENT_QUOTES, 'UTF-8');
$__compilerVar5 = '';
$__compilerVar5 .= '<li id="item_' . htmlspecialchars($item['news_feed_id'], ENT_QUOTES, 'UTF-8') . '" class="event primaryContent NewsFeedItem" data-author="' . htmlspecialchars($item['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($item,false,array(
'user' => '$item',
'size' => 's',
'class' => 'icon'
),'')) . '
	
	<div class="content">		
		' . $__compilerVar3 . '
		
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($__compilerVar4,array(
'time' => htmlspecialchars($__compilerVar4, ENT_QUOTES, 'UTF-8')
))) . '
	</div>
</li>';
$__compilerVar2 .= $__compilerVar5;
unset($__compilerVar3, $__compilerVar4, $__compilerVar5);
$__compilerVar2 .= '
		';
}
$__compilerVar2 .= '
	</ol>
';
}
else
{
$__compilerVar2 .= '
	' . $__compilerVar1 . '
';
}
$__output .= $__compilerVar2;
unset($__compilerVar1, $__compilerVar2);
$__output .= '
		';
$__compilerVar6 = '';
$__compilerVar6 .= XenForo_Template_Helper_Core::link('members/recent-activity', $user, array());
$__compilerVar7 = '';
if (!$feedEnds)
{
$__compilerVar7 .= '
<div class="NewsFeedEnd">
	<div class="sectionFooter">
		<a href="' . htmlspecialchars($__compilerVar6, ENT_QUOTES, 'UTF-8') . '" class="NewsFeedLoader" data-oldestItemId="' . htmlspecialchars($oldestItemId, ENT_QUOTES, 'UTF-8') . '">' . 'Show older items' . '</a>
	</div>
</div>
';
}
$__output .= $__compilerVar7;
unset($__compilerVar6, $__compilerVar7);
$__output .= '
	</div>
';
}
