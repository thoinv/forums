<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'resource_list_mini');
$__output .= '
<ol>
';
foreach ($resources AS $resource)
{
$__output .= '
	<li class="' . htmlspecialchars($resource['resource_state'], ENT_QUOTES, 'UTF-8') . '">
		<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="resourceTitle">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</a>
		' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($resource,'',(true),array())) . '
		<div class="tagLine">' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8') . '</div>
	</li>
';
}
$__output .= '
</ol>';
