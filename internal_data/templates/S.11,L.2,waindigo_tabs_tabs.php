<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'waindigo_tabs_tabs');
$__output .= '

';
$__compilerVar4 = '';
$__compilerVar4 .= '
			';
$__compilerVar5 = '';
if ($canAddExistingContentToTab)
{
$__compilerVar5 .= '
	<a href="' . htmlspecialchars($addTabsLink, ENT_QUOTES, 'UTF-8') . '" class="OverlayTrigger addLink">' . 'Add Tab' . '</a>
';
}
$__compilerVar4 .= $__compilerVar5;
unset($__compilerVar5);
$__compilerVar4 .= '
			';
if ($canAddExistingContentToTab or $tabContents)
{
$__compilerVar4 .= '
				<ul class="tabs">
					';
if ($tabContents)
{
$__compilerVar4 .= '
						';
foreach ($tabContents AS $tab)
{
$__compilerVar4 .= '
							' . $tab['template'] . '
						';
}
$__compilerVar4 .= '
					';
}
$__compilerVar4 .= '
				</ul>
			';
}
$__compilerVar4 .= '
		';
if (trim($__compilerVar4) !== '')
{
$__output .= '
	<div class="allTabs">
		' . $__compilerVar4 . '
	</div>
';
}
unset($__compilerVar4);
$__output .= '

';
$__compilerVar6 = '';
$this->addRequiredExternal('css', 'waindigo_tabs_tabs');
$__output .= $__compilerVar6;
unset($__compilerVar6);
