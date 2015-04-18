<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'events');
$__output .= '
';
$this->addRequiredExternal('css', 'news_feed');
$__output .= '
';
$this->addRequiredExternal('js', 'js/xenforo/news_feed.js');
$__output .= '

';
if ($newsFeed)
{
$__output .= '
	<ol class="eventList">
		';
foreach ($newsFeed AS $item)
{
$__output .= '		
			';
$__compilerVar4 = '';
$__compilerVar4 .= $item['template'];
$__compilerVar5 = '';
$__compilerVar5 .= htmlspecialchars($item['event_date'], ENT_QUOTES, 'UTF-8');
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
';
}
else
{
$__output .= '
	' . $noContentHtml . '
';
}
