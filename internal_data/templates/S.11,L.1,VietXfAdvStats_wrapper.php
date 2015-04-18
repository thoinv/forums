<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('js', 'js/VietXfAdvStats/frontend.js');
$__output .= '
';
$this->addRequiredExternal('css', 'VietXfAdvStats');
$__output .= '

<div class="VietXfAdvStats sectionMain" data-bulkUpdateUrl="' . htmlspecialchars($bulkUpdateUrl, ENT_QUOTES, 'UTF-8') . '">
	<h3>
		<div class="VietXfAdvStats_Controls">
			';
if (XenForo_Template_Helper_Core::numberFormat(count($itemLimits), '0') > 1)
{
$__output .= '
				<select class="VietXfAdvStats_ItemLimit Tooltip" title="' . 'Item Limit' . '">
					';
foreach ($itemLimits AS $itemLimitValue)
{
$__output .= '
						<option value="' . htmlspecialchars($itemLimitValue, ENT_QUOTES, 'UTF-8') . '" ' . (($itemLimitValue == $itemLimit) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::numberFormat($itemLimitValue, '0') . '</option>
					';
}
$__output .= '
				</select>
			';
}
else
{
$__output .= '
				<input type="hidden" value="' . htmlspecialchars($itemLimit, ENT_QUOTES, 'UTF-8') . '" class="VietXfAdvStats_ItemLimit" />
			';
}
$__output .= '
			
			';
if (XenForo_Template_Helper_Core::numberFormat(count($updateIntervals), '0') > 1)
{
$__output .= '
				<select class="VietXfAdvStats_updateInterval Tooltip" title="' . 'Update Interval (in seconds)' . '">
					';
foreach ($updateIntervals AS $updateIntervalValue)
{
$__output .= '
						<option value="' . htmlspecialchars($updateIntervalValue, ENT_QUOTES, 'UTF-8') . '" ' . (($updateIntervalValue == $updateInterval) ? ' selected="selected"' : '') . '>' . XenForo_Template_Helper_Core::numberFormat($updateIntervalValue, '0') . '</option>
					';
}
$__output .= '
				</select>
			';
}
else
{
$__output .= '
				<input type="hidden" value="' . htmlspecialchars($updateInterval, ENT_QUOTES, 'UTF-8') . '" class="VietXfAdvStats_updateInterval" />
			';
}
$__output .= '
		</div>
		
		';
if ($backLink)
{
$__output .= '
			<a href="' . htmlspecialchars($backLink, ENT_QUOTES, 'UTF-8') . '" class="VietXfAdvStats_Header" target="_blank">' . 'VietXF - Advanced Forum Statistics' . '</a>
		';
}
else
{
$__output .= '
			<div class="VietXfAdvStats_Header">' . 'VietXF - Advanced Forum Statistics' . '</div>
		';
}
$__output .= '
	</h3>
	
	<div id="Block1st">
		<ul class="tabs noLinks">
			<li class="active">
				<select class="VietXfAdvStats_SectionTrigger" data-panes="#Block1stPanes > li">
					';
foreach ($sections1st AS $section)
{
$__output .= '
						<option value="' . htmlspecialchars($section['section_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($section['section_title'], ENT_QUOTES, 'UTF-8') . '</option>
					';
}
$__output .= '
				</select>
			</li>
		</ul>
		<ul id="Block1stPanes">
			';
foreach ($sections1st AS $section)
{
$__output .= '
				';
$__compilerVar1 = '';
$__compilerVar1 .= 'VietXfAdvStats_Block1stContent';
$__compilerVar2 = '';
if ($section['rendered'])
{
$__compilerVar2 .= '
	<li id="' . htmlspecialchars($section['section_id'], ENT_QUOTES, 'UTF-8') . '" class="VietXfAdvStats_BlockContent ' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '">
		' . $section['rendered'] . '
	</li>
';
}
else
{
$__compilerVar2 .= '
	<li id="' . htmlspecialchars($section['section_id'], ENT_QUOTES, 'UTF-8') . '" class="VietXfAdvStats_BlockContent ' . htmlspecialchars($__compilerVar1, ENT_QUOTES, 'UTF-8') . '" data-loadUrl="' . htmlspecialchars($section['section_link'], ENT_QUOTES, 'UTF-8') . '">
		' . 'Loading' . '...
		<noscript><a href="' . htmlspecialchars($section['section_link'], ENT_QUOTES, 'UTF-8') . '\'}">' . 'View' . '</a></noscript>
	</li>
';
}
$__output .= $__compilerVar2;
unset($__compilerVar1, $__compilerVar2);
$__output .= '
			';
}
$__output .= '
		</ul>
	</div>
	<div id="Block2nd">
		<ul class="tabs VietXfAdvStats_SectionTrigger" data-panes="#Block2ndPanes > li">
			';
foreach ($sections2nd AS $section)
{
$__output .= '
				<li><a href="' . htmlspecialchars($requestPaths['requestUri'], ENT_QUOTES, 'UTF-8') . '#' . htmlspecialchars($section['section_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($section['section_title'], ENT_QUOTES, 'UTF-8') . '</a></li>
			';
}
$__output .= '
		</ul>
		<ul id="Block2ndPanes">
			';
foreach ($sections2nd AS $section)
{
$__output .= '
				';
$__compilerVar3 = '';
$__compilerVar3 .= 'VietXfAdvStats_Block2ndContent';
$__compilerVar4 = '';
if ($section['rendered'])
{
$__compilerVar4 .= '
	<li id="' . htmlspecialchars($section['section_id'], ENT_QUOTES, 'UTF-8') . '" class="VietXfAdvStats_BlockContent ' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '">
		' . $section['rendered'] . '
	</li>
';
}
else
{
$__compilerVar4 .= '
	<li id="' . htmlspecialchars($section['section_id'], ENT_QUOTES, 'UTF-8') . '" class="VietXfAdvStats_BlockContent ' . htmlspecialchars($__compilerVar3, ENT_QUOTES, 'UTF-8') . '" data-loadUrl="' . htmlspecialchars($section['section_link'], ENT_QUOTES, 'UTF-8') . '">
		' . 'Loading' . '...
		<noscript><a href="' . htmlspecialchars($section['section_link'], ENT_QUOTES, 'UTF-8') . '\'}">' . 'View' . '</a></noscript>
	</li>
';
}
$__output .= $__compilerVar4;
unset($__compilerVar3, $__compilerVar4);
$__output .= '
			';
}
$__output .= '
		</ul>
	</div>
	<div style="clear: both; height: 0px;">&nbsp;</div>
</div>

';
$__compilerVar5 = '';
$__compilerVar5 .= '<div id="PreviewTooltip">
	<span class="arrow"><span></span></span>
	
	<div class="section">
		<div class="primaryContent previewContent">
			<span class="PreviewContents">' . 'Loading' . '...</span>
		</div>
	</div>
</div>';
$__output .= $__compilerVar5;
unset($__compilerVar5);
