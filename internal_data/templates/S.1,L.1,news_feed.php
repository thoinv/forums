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
$__compilerVar1 = '';
$__compilerVar1 .= $item['template'];
$__compilerVar2 = '';
$__compilerVar2 .= htmlspecialchars($item['event_date'], ENT_QUOTES, 'UTF-8');
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
';
}
else
{
$__output .= '
	' . $noContentHtml . '
';
}
