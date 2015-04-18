<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['head']['robots'] = '';
$__extraData['head']['robots'] .= '
	<meta name="robots" content="noindex" />';
$__output .= '

';
if ($showTabs)
{
$__output .= '
	<ul class="tabs">
	';
foreach ($tabs AS $tabId => $tab)
{
$__output .= '
		<li class="' . (($tabId == $selectedTab) ? ('active') : ('')) . '"><a href="' . htmlspecialchars($tab['href'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($tab['title'], ENT_QUOTES, 'UTF-8') . '</a></li>
	';
}
$__output .= '
	</ul>
';
}
$__output .= '

' . $_subView;
