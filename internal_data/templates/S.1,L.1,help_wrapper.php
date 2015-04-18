<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'help_wrapper');
$__output .= '
' . '

<div class="container">
	<div class="navigationSideBar ToggleTriggerAnchor">
		<h4 class="heading ToggleTrigger" data-target="> ul">' . 'Help' . ' <span></span></h4>
		<ul data-toggle-class="menuVisible">
			<li class="section">
				<ul>
					';
$__compilerVar1 = '';
$__compilerVar1 .= '
					<li><a href="' . XenForo_Template_Helper_Core::link('help/smilies', false, array()) . '" class="' . (($selected == ('smilies')) ? ('secondaryContent') : ('primaryContent')) . '">' . 'Smilies' . '</a></li>
					<!-- slot: pre_bb_codes -->
					<li><a href="' . XenForo_Template_Helper_Core::link('help/bb-codes', false, array()) . '" class="' . (($selected == ('bbCodes')) ? ('secondaryContent') : ('primaryContent')) . '">' . 'BB Codes' . '</a></li>
					<!-- slot: pre_trophies -->
					<li><a href="' . XenForo_Template_Helper_Core::link('help/trophies', false, array()) . '" class="' . (($selected == ('trophies')) ? ('secondaryContent') : ('primaryContent')) . '">' . 'Trophies' . '</a></li>
					<!-- slot: pre_cookies -->
					<li><a href="' . XenForo_Template_Helper_Core::link('help/cookies', false, array()) . '" class="' . (($selected == ('cookies')) ? ('secondaryContent') : ('primaryContent')) . '">' . 'Cookie Usage' . '</a></li>
					<!-- slot: pre_tos_url -->
					';
if ($tosUrl)
{
$__compilerVar1 .= '
						<li><a href="' . htmlspecialchars($tosUrl, ENT_QUOTES, 'UTF-8') . '" class="' . (($selected == ('terms')) ? ('secondaryContent') : ('primaryContent')) . '">' . 'Terms and Rules' . '</a></li>
					';
}
$__compilerVar1 .= '
					';
$__output .= $this->callTemplateHook('help_sidebar_links', $__compilerVar1, array());
unset($__compilerVar1);
$__output .= '
					';
foreach ($pages AS $page)
{
$__output .= '
						<li><a href="' . XenForo_Template_Helper_Core::link('help', $page, array()) . '" class="' . (($selected == $page['page_name']) ? ('secondaryContent') : ('primaryContent')) . '">' . htmlspecialchars($page['title'], ENT_QUOTES, 'UTF-8') . '</a></li>
					';
}
$__output .= '
				</ul>
			</li>
		</ul>
	</div>
	
	<div class="mainContentBlock section sectionMain">' . $_subView . '</div>
</div>';
