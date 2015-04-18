<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'resource_view_tabs');
$__output .= '

<div class="resourceTabs">
	';
if ($resource['canWatch'])
{
$__output .= '
		<div class="extraLinks">
			<a href="' . XenForo_Template_Helper_Core::link('resources/watch', $resource, array()) . '" class="OverlayTrigger watchLink" data-cacheoverlay="false">';
if ($resource['is_watched'])
{
$__output .= 'Unwatch This Resource';
}
else
{
$__output .= 'Watch This Resource';
}
$__output .= '</a>
		</div>
	';
}
$__output .= '
	<ul class="tabs">
	';
$__compilerVar1 = '';
$__compilerVar1 .= '
		<li class="resourceTabDescription ' . (($selectedTab == ('description')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources', $resource, array()) . '">' . 'Overview' . '</a>
		</li>
		';
if ($resource['showExtraInfoTab'])
{
$__compilerVar1 .= '
			<li class="resourceTabExtra ' . (($selectedTab == ('extra')) ? ('active') : ('')) . '">
				<a href="' . XenForo_Template_Helper_Core::link('resources/extra', $resource, array()) . '">' . 'Extra Info' . '</a>
			</li>
		';
}
$__compilerVar1 .= '		
		';
if ($resource['customFieldTabs'])
{
$__compilerVar1 .= '
			';
foreach ($resource['customFieldTabs'] AS $fieldId)
{
$__compilerVar1 .= '
				<li class="resourceTabExtra ' . (($selectedTab == ('field_' . $fieldId)) ? ('active') : ('')) . '">
					<a href="' . XenForo_Template_Helper_Core::link('resources/field', $resource, array(
'field' => $fieldId
)) . '">' . XenForo_Template_Helper_Core::callHelper('resourceFieldTitle', array(
'0' => $fieldId
)) . '</a>
				</li>
			';
}
$__compilerVar1 .= '
		';
}
$__compilerVar1 .= '
		';
if ($resource['update_count'] or $resourceUpdateCount)
{
$__compilerVar1 .= '<li class="resourceTabUpdates ' . (($selectedTab == ('updates')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources/updates', $resource, array()) . '">' . 'Updates' . ' (' . XenForo_Template_Helper_Core::numberFormat($resourceUpdateCount, '0') . ')</a>
		</li>';
}
$__compilerVar1 .= '
		';
if ($resource['review_count'])
{
$__compilerVar1 .= '<li class="resourceTabReviews ' . (($selectedTab == ('reviews')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources/reviews', $resource, array()) . '">' . 'Reviews' . ' (' . htmlspecialchars($resource['review_count'], ENT_QUOTES, 'UTF-8') . ')</a>
		</li>';
}
$__compilerVar1 .= '
		';
if (!$resource['isFilelessNoExternal'])
{
$__compilerVar1 .= '<li class="resourceTabHistory ' . (($selectedTab == ('history')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('resources/history', $resource, array()) . '">' . 'Version History' . '</a>
			</li>';
}
$__compilerVar1 .= '
		';
if ($thread)
{
$__compilerVar1 .= '<li class="resourceTabDiscussion ' . (($selectedTab == ('discussion')) ? ('active') : ('')) . '">
			<a href="' . XenForo_Template_Helper_Core::link('threads', $thread, array()) . '">' . 'Discussion' . '</a>
		</li>';
}
$__compilerVar1 .= '
	';
$__output .= $this->callTemplateHook('resource_view_tabs', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '
	</ul>
</div>';
