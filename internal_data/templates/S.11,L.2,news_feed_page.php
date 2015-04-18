<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Thông tin bạn';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'Luồng tin hoạt động của tất cả <a ' . 'href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '"' . '>Thành viên bạn theo dõi</a>.';
$__output .= '

';
$this->addRequiredExternal('js', 'js/xenforo/news_feed.js');
$__output .= '

<div class="newsFeed">
	';
$__compilerVar9 = '';
$__compilerVar9 .= 'Luồng tin của bạn hiện tại đang trống.' . ' <a href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '">' . 'Theo dõi mọi người để hiển thị ở đây.' . '</a>';
$__compilerVar10 = '';
$this->addRequiredExternal('css', 'events');
$__compilerVar10 .= '
';
$this->addRequiredExternal('css', 'news_feed');
$__compilerVar10 .= '
';
$this->addRequiredExternal('js', 'js/xenforo/news_feed.js');
$__compilerVar10 .= '

';
if ($newsFeed)
{
$__compilerVar10 .= '
	<ol class="eventList">
		';
foreach ($newsFeed AS $item)
{
$__compilerVar10 .= '		
			';
$__compilerVar11 = '';
$__compilerVar11 .= $item['template'];
$__compilerVar12 = '';
$__compilerVar12 .= htmlspecialchars($item['event_date'], ENT_QUOTES, 'UTF-8');
$__compilerVar13 = '';
$__compilerVar13 .= '<li id="item_' . htmlspecialchars($item['news_feed_id'], ENT_QUOTES, 'UTF-8') . '" class="event primaryContent NewsFeedItem" data-author="' . htmlspecialchars($item['username'], ENT_QUOTES, 'UTF-8') . '">

	' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($item,false,array(
'user' => '$item',
'size' => 's',
'class' => 'icon'
),'')) . '
	
	<div class="content">		
		' . $__compilerVar11 . '
		
		' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($__compilerVar12,array(
'time' => htmlspecialchars($__compilerVar12, ENT_QUOTES, 'UTF-8')
))) . '
	</div>
</li>';
$__compilerVar10 .= $__compilerVar13;
unset($__compilerVar11, $__compilerVar12, $__compilerVar13);
$__compilerVar10 .= '
		';
}
$__compilerVar10 .= '
	</ol>
';
}
else
{
$__compilerVar10 .= '
	' . $__compilerVar9 . '
';
}
$__output .= $__compilerVar10;
unset($__compilerVar9, $__compilerVar10);
$__output .= '
	';
$__compilerVar14 = '';
$__compilerVar14 .= XenForo_Template_Helper_Core::link('account/news-feed', false, array());
$__compilerVar15 = '';
if (!$feedEnds)
{
$__compilerVar15 .= '
<div class="NewsFeedEnd">
	<div class="sectionFooter">
		<a href="' . htmlspecialchars($__compilerVar14, ENT_QUOTES, 'UTF-8') . '" class="NewsFeedLoader" data-oldestItemId="' . htmlspecialchars($oldestItemId, ENT_QUOTES, 'UTF-8') . '">' . 'Hiển thị mục cũ hơn' . '</a>
	</div>
</div>
';
}
$__output .= $__compilerVar15;
unset($__compilerVar14, $__compilerVar15);
$__output .= '
	';
$__compilerVar16 = '';
$__compilerVar16 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Đang tải' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar16;
unset($__compilerVar16);
$__output .= '
	<div class="extra">
		<a href="' . XenForo_Template_Helper_Core::link('account/following', false, array()) . '" class="button smallButton">' . 'Theo dõi' . '</a>
		<a href="' . XenForo_Template_Helper_Core::link('recent-activity', false, array()) . '" class="button smallButton">' . 'Hoạt động gần đây' . '</a>
	</div>
</div>';
