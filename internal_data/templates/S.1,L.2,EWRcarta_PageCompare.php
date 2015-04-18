<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8');
$__output .= '
';
$__extraData['h1'] = '';
$__extraData['h1'] .= htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . ' - ' . 'Historical';
$__output .= '
';
$__extraData['pageDescription'] = array();
$__extraData['pageDescription']['content'] = '';
$__extraData['pageDescription']['content'] .= 'Applied By' . ' 
	';
if ($history['user_id'])
{
$__extraData['pageDescription']['content'] .= '<a href="' . XenForo_Template_Helper_Core::link('members', $history, array()) . '" class="username">' . htmlspecialchars($history['username'], ENT_QUOTES, 'UTF-8') . '</a>';
}
else
{
$__extraData['pageDescription']['content'] .= htmlspecialchars($history['username'], ENT_QUOTES, 'UTF-8');
}
$__extraData['pageDescription']['content'] .= ': 
	' . '' . XenForo_Template_Helper_Core::date($history['history_date'], '') . ' lúc ' . XenForo_Template_Helper_Core::time($history['history_date'], '') . '' . '
';
$__output .= '

';
$__extraData['quickNavSelected'] = '';
$__extraData['quickNavSelected'] .= 'wiki-' . htmlspecialchars($page['page_id'], ENT_QUOTES, 'UTF-8');
$__output .= '

';
$__extraData['navigation'] = array();
$__extraData['navigation'] = XenForo_Template_Helper_Core::appendBreadCrumbs($__extraData['navigation'], $breadCrumbs);
$__extraData['navigation'][] = array('href' => XenForo_Template_Helper_Core::link('full:wiki/history', $page, array()), 'value' => 'Lịch sử');
$__output .= '

';
$this->addRequiredExternal('css', 'EWRcarta');
$__output .= '

';
if ($compare)
{
$__output .= '
<div class="sectionMain">
	<div class="subHeading">
		<div style="float: right;">
			(<a href="' . XenForo_Template_Helper_Core::link('wiki/history', $page, array()) . '">' . 'Lịch sử' . '</a>)
			';
if ($perms['edit'])
{
$__output .= '
				';
if ($page['page_protect'])
{
$__output .= '
					(<a href="' . XenForo_Template_Helper_Core::link('wiki/edit', $page, array()) . '">' . 'LOCKED' . '</a>)
				';
}
else
{
$__output .= '
					(<a href="' . XenForo_Template_Helper_Core::link('wiki/edit', $page, array()) . '">' . 'Sửa' . '</a>)
				';
}
$__output .= '
			';
}
$__output .= '
		</div>
		' . htmlspecialchars($page['page_name'], ENT_QUOTES, 'UTF-8') . '
	</div>
	' . $compare . '
</div>
';
}
$__output .= '

<div class="sectionMain" style="padding-right: 18px; padding-bottom: 5px;">
	<textarea name="history_content" style="height:260px; width:100%;" class="textCtrl">' . $history['history_content'] . '</textarea>
</div>

';
$__compilerVar2 = '';
$__compilerVar2 .= '<div class="cartaCopy copyright muted">
	<a href="http://xenforo.com/community/resources/98/">XenCarta</a>
	&copy; Jason Axelrod from <a href="http://8wayrun.com/">8WAYRUN.COM</a>
</div>';
$__output .= $__compilerVar2;
unset($__compilerVar2);
