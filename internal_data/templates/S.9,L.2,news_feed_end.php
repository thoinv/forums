<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
if (!$feedEnds)
{
$__output .= '
<div class="NewsFeedEnd">
	<div class="sectionFooter">
		<a href="' . htmlspecialchars($itemLoaderUrl, ENT_QUOTES, 'UTF-8') . '" class="NewsFeedLoader" data-oldestItemId="' . htmlspecialchars($oldestItemId, ENT_QUOTES, 'UTF-8') . '">' . 'Hiển thị mục cũ hơn' . '</a>
	</div>
</div>
';
}
