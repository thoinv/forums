<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'search_result_resource_update');
$__output .= '
	
<li id="resource_update-' . htmlspecialchars($update['resource_update_id'], ENT_QUOTES, 'UTF-8') . '" class="searchResult resourceUpdate primaryContent" data-author="' . htmlspecialchars($resource['username'], ENT_QUOTES, 'UTF-8') . '">

	<div class="listBlock posterAvatar">' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 's',
'img' => 'true'
),'')) . '</div>

	';
$updateLinkHtml = '';
$updateLinkHtml .= (($update['isDescriptionUpdate']) ? (XenForo_Template_Helper_Core::link('resources', $resource, array())) : (XenForo_Template_Helper_Core::link('resources', $resource, array(
'update' => $update['resource_update_id']
))));
$__output .= '

	<div class="listBlock main">
		<div class="titleText">
			<span class="contentType">' . (($update['isDescriptionUpdate']) ? ('Resource') : ('Resource Update')) . '</span>
			<h3 class="title">
				<a href="' . $updateLinkHtml . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . ((!$update['isDescriptionUpdate']) ? (htmlspecialchars($resource['resource_title'], ENT_QUOTES, 'UTF-8') . ': ') : ('')) . XenForo_Template_Helper_Core::callHelper('highlight', array(
'0' => $update['title'],
'1' => $search['search_query'],
'2' => 'highlight'
)) . '</a> 
				<span class="muted">' . htmlspecialchars($resource['version_string'], ENT_QUOTES, 'UTF-8') . '</span>
				';
if ($resource['cost'])
{
$__output .= '<span class="cost">' . htmlspecialchars($resource['cost'], ENT_QUOTES, 'UTF-8') . '</span>';
}
$__output .= '
			</h3>
		</div>

		<blockquote class="snippet">
			<a href="' . $updateLinkHtml . '">' . XenForo_Template_Helper_Core::callHelper('snippet', array(
'0' => $update['message'],
'1' => '150',
'2' => array(
'term' => $search['search_query'],
'emClass' => 'highlight'
)
)) . '</a>
		</blockquote>

		<div class="meta">
			' . 'Đăng bởi' . ': ' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($update,'',false,array())) . ',
			' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($update['post_date'],array(
'time' => htmlspecialchars($update['post_date'], ENT_QUOTES, 'UTF-8')
))) . '
			';
if (!$update['isDescriptionUpdate'])
{
$__output .= 'in resource' . ': <a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource,
'1' => 'escaped'
)) . htmlspecialchars($resource['resource_title'], ENT_QUOTES, 'UTF-8') . '</a>, ';
}
$__output .= 'in category' . ': <a href="' . XenForo_Template_Helper_Core::link('resources/categories', $resource, array()) . '">' . htmlspecialchars($resource['category_title'], ENT_QUOTES, 'UTF-8') . '</a>
		</div>
	</div>
</li>';
