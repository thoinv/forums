<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'resource_list');
$__output .= '

<ol class="featuredResourceList">
';
foreach ($featuredResources AS $resource)
{
$__output .= '
	<li class="featuredResource">
		<div class="resourceImage">
			';
if ($xenOptions['resourceAllowIcons'])
{
$__output .= '
				<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="resourceIcon"><img src="' . XenForo_Template_Helper_Core::callHelper('resourceiconurl', array(
'0' => $resource
)) . '" alt="" /></a>
			';
}
else
{
$__output .= '
				' . XenForo_Template_Helper_Core::callHelper('avatarhtml', array($resource,(true),array(
'user' => '$resource',
'size' => 'm',
'img' => 'true'
),'')) . '
			';
}
$__output .= '
		</div>
		<div class="resourceInfo">
			<h3 class="title"><a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . XenForo_Template_Helper_Core::callHelper('resourcePrefix', array(
'0' => $resource
)) . htmlspecialchars($resource['title'], ENT_QUOTES, 'UTF-8') . '</a></h3>
			<div class="tagLine muted">' . htmlspecialchars($resource['tag_line'], ENT_QUOTES, 'UTF-8') . '</div>
			<div class="details muted">' . XenForo_Template_Helper_Core::callHelper('usernamehtml', array($resource,'',false,array())) . ',
				<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '" class="faint">' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($resource['resource_date'],array(
'time' => htmlspecialchars($resource['resource_date'], ENT_QUOTES, 'UTF-8')
))) . '</a>
			</div>
		</div>
	</li>
';
}
$__output .= '
</ol>';
