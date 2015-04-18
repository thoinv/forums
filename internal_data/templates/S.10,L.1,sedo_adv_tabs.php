<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$this->addRequiredExternal('css', 'sedo_adv_tabs');
$__output .= '
';
if ($xenOptions['AdvBBcodeBar_debug_devmode'])
{
$__output .= '
	';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/src/advbar_allinone.src.js');
$__output .= '	
';
}
else
{
$__output .= '
	';
$this->addRequiredExternal('js', 'js/sedo/advtoolbar/advbar_allinone.js');
$__output .= '
';
}
$__output .= '

';
$panesHeight = '';
$panesHeight .= ($options['height'] - (XenForo_Template_Helper_Core::styleProperty('advbbcodebar_tabs_title.height') + XenForo_Template_Helper_Core::styleProperty('advbbcodebar_tabs_content.padding-top') + XenForo_Template_Helper_Core::styleProperty('advbbcodebar_tabs_content.padding-bottom')));
$__output .= '

<div id="' . htmlspecialchars($options['uniqid'], ENT_QUOTES, 'UTF-8') . '" class="adv_tabs_wrapper ' . htmlspecialchars($options['blockAlign'], ENT_QUOTES, 'UTF-8') . ' JsOnly ' . (($options['responsiveMode']) ? ('responsive') : ('')) . '" style="width:' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($options['widthType'], ENT_QUOTES, 'UTF-8') . ';height:' . htmlspecialchars($options['height'], ENT_QUOTES, 'UTF-8') . 'px">
	<ul class="advtabs">
		';
$i = 0;
$total = count($options['tabs']);
foreach ($options['tabs'] AS $tab)
{
$i++;
$__output .= '
			<li><a class="' . (($tab['open']) ? ('openMe') : ('')) . '" href="#' . htmlspecialchars($options['uniqid'], ENT_QUOTES, 'UTF-8') . '_' . htmlspecialchars($i, ENT_QUOTES, 'UTF-8') . '" style="text-align:' . htmlspecialchars($tab['align'], ENT_QUOTES, 'UTF-8') . '">' . (($tab['title']) ? ($tab['title']) : ('Tab ' . htmlspecialchars($i, ENT_QUOTES, 'UTF-8'))) . '</a></li>
		';
}
$__output .= '
	</ul>

	<div class="advpanes">
		';
$i = 0;
$total = count($options['panes']);
foreach ($options['panes'] AS $pane)
{
$i++;
$__output .= '
			<div style="height:' . htmlspecialchars($panesHeight, ENT_QUOTES, 'UTF-8') . 'px">' . $pane['content'] . '</div>
		';
}
$__output .= '
	</div>
</div>

<noscript>
	<div id="' . htmlspecialchars($options['uniqid'], ENT_QUOTES, 'UTF-8') . '_noscript" class="adv_tabs_wrapper ' . htmlspecialchars($options['blockAlign'], ENT_QUOTES, 'UTF-8') . ' noscript ' . (($options['responsiveMode']) ? ('responsive') : ('')) . '" style="width:' . htmlspecialchars($options['width'], ENT_QUOTES, 'UTF-8') . htmlspecialchars($options['widthType'], ENT_QUOTES, 'UTF-8') . ';height:' . htmlspecialchars($options['height'], ENT_QUOTES, 'UTF-8') . 'px">
		';
$i = 0;
$total = count($options['tabs']);
foreach ($options['tabs'] AS $tab)
{
$i++;
$__output .= '
			<div id="' . htmlspecialchars($options['uniqid'], ENT_QUOTES, 'UTF-8') . '_' . htmlspecialchars($i, ENT_QUOTES, 'UTF-8') . '" class="adv_tabs_noscript">
				<div class="adv_tabs_noscript_title" style="text-align:' . htmlspecialchars($tab['align'], ENT_QUOTES, 'UTF-8') . '">' . (($tab['title']) ? ($tab['title']) : ('Tab ' . htmlspecialchars($i, ENT_QUOTES, 'UTF-8'))) . '</div>
				<div class="adv_tabs_noscript_content" style="' . (($options['height']) ? ('height:' . htmlspecialchars($options['height'], ENT_QUOTES, 'UTF-8') . 'px;') : ('')) . '">' . XenForo_Template_Helper_Core::callHelper('bbm_strip_noscript', array(
'0' => $tab['content']
)) . '</div>
			</div>
		';
}
$__output .= '
	</div>
</noscript>';
