<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Likes You\'ve Received' . XenForo_Template_Helper_Core::callHelper('pagenumber', array(
'0' => $page
));
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= 'Likes You\'ve Received';
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
$__compilerVar1 = '';
$__compilerVar1 .= $item['listTemplate'];
$__compilerVar2 = '';
$__compilerVar2 .= htmlspecialchars($item['like_date'], ENT_QUOTES, 'UTF-8');
$__compilerVar3 = '';
$__compilerVar3 .= '<li id="item_' . htmlspecialchars($item['news_feed_id'], ENT_QUOTES, 'UTF-8') . '" class="event primaryContent NewsFeedItem" data-author="' . htmlspecialchars($item['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($item,false,array(
'user' => '$item',
'size' => 's',
'class' => 'icon'
),'')) . '
	
	<div class="content">		
		' . $__compilerVar1 . '
		
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($__compilerVar2,array(
'time' => htmlspecialchars($__compilerVar2, ENT_QUOTES, 'UTF-8')
))) . '
	</div>
</li>';
$__output .= $__compilerVar3;
unset($__compilerVar1, $__compilerVar2, $__compilerVar3);
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
	<p>' . 'Unfortunately, none of your content has received any likes yet. You\'ll need to keep posting!' . '</p>
';
}
