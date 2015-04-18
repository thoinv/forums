<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'wf_default');
$__output .= '

';
if ($_WidgetFramework_isHook)
{
$__output .= '
	';
$classSection = '';
$classSection .= 'section sectionMain widget-group-' . htmlspecialchars($groupId, ENT_QUOTES, 'UTF-8');
$__output .= '
	';
$classInnerSection = '';
$__output .= '
';
}
else
{
$__output .= '
	';
$classSection = '';
$classSection .= 'section widget-group-' . htmlspecialchars($groupId, ENT_QUOTES, 'UTF-8');
$__output .= '
	';
$classInnerSection = '';
$classInnerSection .= 'secondaryContent';
$__output .= '
';
}
$__output .= '


';
if (XenForo_Template_Helper_Core::numberFormat(count($tabs), '0') > 1)
{
$__output .= '
	';
if (!$isColumns)
{
$__output .= '

		
		<div class="' . htmlspecialchars($classSection, ENT_QUOTES, 'UTF-8') . ' widget-container widget-tabs">
			<div class="primaryContent">
				<ul class="tabs Tabs" data-panes="#widget-tabs-' . htmlspecialchars($normalizedGroupId, ENT_QUOTES, 'UTF-8') . ' > li">
					';
foreach ($tabs AS $tab)
{
$__output .= '
						';
if ($tab['html'])
{
$__output .= '
							<li>
								<a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#widget-tab-' . htmlspecialchars($tab['widget_id'], ENT_QUOTES, 'UTF-8') . '">
									' . $tab['title'] . '
								</a>
							</li>
						';
}
$__output .= '
					';
}
$__output .= '
				</ul>
			</div>
			<div class="' . htmlspecialchars($classInnerSection, ENT_QUOTES, 'UTF-8') . ' widget-panes">
				<ul id="widget-tabs-' . htmlspecialchars($normalizedGroupId, ENT_QUOTES, 'UTF-8') . '">
					';
foreach ($tabs AS $tab)
{
$__output .= '
						';
if ($tab['html'])
{
$__output .= '
							<li class="widget ' . htmlspecialchars($tab['class'], ENT_QUOTES, 'UTF-8') . '" id="widget-tab-' . htmlspecialchars($tab['widget_id'], ENT_QUOTES, 'UTF-8') . '">
								' . $tab['html'] . '
							</li>
						';
}
$__output .= '
					';
}
$__output .= '
				</ul>
			</div>
		</div>

	';
}
else
{
$__output .= '

		

		<div class="' . htmlspecialchars($classSection, ENT_QUOTES, 'UTF-8') . ' widget-container widget-columns" id="widget-columns-' . htmlspecialchars($normalizedGroupId, ENT_QUOTES, 'UTF-8') . '">
			<div style="margin: 0; padding: 0; width: 100%">
				';
foreach ($tabs AS $tab)
{
$__output .= '
					<div style="float: left; margin: 0; padding: 0; width: ' . (100 / XenForo_Template_Helper_Core::numberFormat(count($tabs), '0')) . '%">
						<div class="' . htmlspecialchars($classInnerSection, ENT_QUOTES, 'UTF-8') . ' widget ' . htmlspecialchars($tab['class'], ENT_QUOTES, 'UTF-8') . '" id="widget-' . htmlspecialchars($tab['widget_id'], ENT_QUOTES, 'UTF-8') . '">
							';
if ($tab['html'])
{
$__output .= '
								<h3>
									';
if ($tab['extraData']['link'])
{
$__output .= '
										<a href="' . htmlspecialchars($tab['extraData']['link'], ENT_QUOTES, 'UTF-8') . '">' . $tab['title'] . '</a>
									';
}
else
{
$__output .= '
										' . $tab['title'] . '
									';
}
$__output .= '
								</h3>
								' . $tab['html'] . '
							';
}
$__output .= '
						</div>
					</div>
				';
}
$__output .= '

				<div style="clear: both; height: 0px;">&nbsp;</div>
			</div>
		</div>

	';
}
$__output .= '
';
}
else if (XenForo_Template_Helper_Core::numberFormat(count($tabs), '0') == 1)
{
$__output .= '
	
	<div class="' . htmlspecialchars($classSection, ENT_QUOTES, 'UTF-8') . ' widget-container">
		';
foreach ($tabs AS $tab)
{
$__output .= '
			<div class="' . htmlspecialchars($classInnerSection, ENT_QUOTES, 'UTF-8') . ' widget ' . htmlspecialchars($tab['class'], ENT_QUOTES, 'UTF-8') . '" id="widget-' . htmlspecialchars($tab['widget_id'], ENT_QUOTES, 'UTF-8') . '">
				';
if ($tab['html'])
{
$__output .= '
					<h3>
						';
if ($tab['extraData']['link'])
{
$__output .= '
							<a href="' . htmlspecialchars($tab['extraData']['link'], ENT_QUOTES, 'UTF-8') . '">' . $tab['title'] . '</a>
						';
}
else
{
$__output .= '
							' . $tab['title'] . '
						';
}
$__output .= '
					</h3>
					' . $tab['html'] . '
				';
}
$__output .= '
			</div>
		';
}
$__output .= '
	</div>
';
}
