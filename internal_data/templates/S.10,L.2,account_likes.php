<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Được thích' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Được thích';
$__output .= '

';
$this->addRequiredExternal('css', 'events');
$__output .= '

';
if ($totalLikes)
{
$__output .= '
	<div class="newsFeed">
		<ol class="eventList">
			';
foreach ($likes AS $item)
{
$__output .= '
				';
$__compilerVar4 = '';
$__compilerVar4 .= $item['listTemplate'];
$__compilerVar5 = '';
$__compilerVar5 .= htmlspecialchars($item['like_date'], ENT_QUOTES, 'UTF-8');
$__compilerVar6 = '';
$__compilerVar6 .= '<li id="item_' . htmlspecialchars($item['news_feed_id'], ENT_QUOTES, 'UTF-8') . '" class="event primaryContent NewsFeedItem" data-author="' . htmlspecialchars($item['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($item,false,array(
'user' => '$item',
'size' => 's',
'class' => 'icon'
),'')) . '
	
	<div class="content">		
		' . $__compilerVar4 . '
		
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($__compilerVar5,array(
'time' => htmlspecialchars($__compilerVar5, ENT_QUOTES, 'UTF-8')
))) . '
	</div>
</li>';
$__output .= $__compilerVar6;
unset($__compilerVar4, $__compilerVar5, $__compilerVar6);
$__output .= '
			';
}
$__output .= '
		</ol>
	</div>

	' . XenForo_Template_Helper_Core::callHelper('pagenavhtml', array('public', htmlspecialchars($likesPerPage, ENT_QUOTES, 'UTF-8'), htmlspecialchars($totalLikes, ENT_QUOTES, 'UTF-8'), htmlspecialchars($page, ENT_QUOTES, 'UTF-8'), 'account/likes', false, array(), false, array())) . '
	
';
}
else
{
$__output .= '
	<p>' . 'Thật không may, chưa có nội dung nào của bạn được thích. Hãy tiếp tục viết bài nhé!' . '</p>
';
}
