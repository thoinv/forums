<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '<li id="item_' . htmlspecialchars($item['news_feed_id'], ENT_QUOTES, 'UTF-8') . '" class="event primaryContent NewsFeedItem" data-author="' . htmlspecialchars($item['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($item,false,array(
'user' => '$item',
'size' => 's',
'class' => 'icon'
),'')) . '
	
	<div class="content">		
		' . $itemTemplate . '
		
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($itemDate,array(
'time' => htmlspecialchars($itemDate, ENT_QUOTES, 'UTF-8')
))) . '
	</div>
</li>';
