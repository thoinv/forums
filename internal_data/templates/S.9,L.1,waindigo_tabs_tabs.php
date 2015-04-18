<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'waindigo_tabs_tabs');
$__output .= '

';
$__compilerVar1 = '';
$__compilerVar1 .= '
			';
$__compilerVar2 = '';
if ($canAddExistingContentToTab)
{
$__compilerVar2 .= '
	<a href="' . htmlspecialchars($addTabsLink, ENT_QUOTES, 'UTF-8') . '" class="OverlayTrigger addLink">' . 'Add Tab' . '</a>
';
}
$__compilerVar1 .= $__compilerVar2;
unset($__compilerVar2);
$__compilerVar1 .= '
			';
if ($canAddExistingContentToTab or $tabContents)
{
$__compilerVar1 .= '
				<ul class="tabs">
					';
if ($tabContents)
{
$__compilerVar1 .= '
						';
foreach ($tabContents AS $tab)
{
$__compilerVar1 .= '
							' . $tab['template'] . '
						';
}
$__compilerVar1 .= '
					';
}
$__compilerVar1 .= '
				</ul>
			';
}
$__compilerVar1 .= '
		';
if (trim($__compilerVar1) !== '')
{
$__output .= '
	<div class="allTabs">
		' . $__compilerVar1 . '
	</div>
';
}
unset($__compilerVar1);
$__output .= '

';
$__compilerVar3 = '';
$this->addRequiredExternal('css', 'waindigo_tabs_tabs');
$__output .= $__compilerVar3;
unset($__compilerVar3);
